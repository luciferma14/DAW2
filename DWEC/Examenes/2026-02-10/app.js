const listaProductos = document.querySelector('#lista-vinilos');
const carritoContenedor = document.querySelector('#carrito-items');
const contadorCarrito = document.querySelector('#contador-productos');
const precioTotalHTML = document.querySelector('#precio-total');
const filtroCategoria = document.querySelector('#filtro-categoria');
const loading = document.querySelector('#loading');
const btnVaciar = document.querySelector('#vaciar-carrito');

let articulosCarrito = [];
let vinilosDB = [];
let categoriaActual = "todos";

document.addEventListener('DOMContentLoaded', () => {
    articulosCarrito = JSON.parse(localStorage.getItem('carrito')) || [];

    obtenerVinilos();
});

// función que carga los productos desde el JSON con fetch y async/await
async function obtenerVinilos(){

    try{
        const respuesta = await fetch('vinilos.json');
        if (!respuesta.ok){
            throw new Error("Error en red");
        }

        vinilosDB = await respuesta.json();

        loading.style.display = 'none';

        //al cargar, sincronizamos con lo que hay en el carrito
        sincronizarStockInicial();

        aplicarFiltroActual();
        actualizarCarritoHTML();

    }catch(error){
        loading.textContent = "Error al cargar los productos";
        console.error(error);
    }
}

//aplicamos la lógica de filtrado segúb el género seleccionado
function aplicarFiltroActual(){
    //limpiamos antes de pintar
    limpiarHTML(listaProductos);

    const productosAMostrar = (categoriaActual === 'todos')
        ? vinilosDB
        : vinilosDB.filter(v => v.categoria === categoriaActual);
    
    mostrarVinilos(productosAMostrar);
}

//renderizamos las card de productos
function mostrarVinilos(lista){
    lista.forEach(v => {
        const { id, nombre, artista, precio, stock } = v;
        const card = document.createElement('div');
        card.classList.add('producto-card');
        if(stock === 0){
            card.classList.add('agotado');
        }

        card.innerHTML = `
            <h3>${nombre}</h3>
            <p>Artista: ${artista}</p>
            <p class="precio">${precio}€</p>
            <p>Stock: ${stock}</p>
            <button class="btn-add" data-id="${id}" ${stock === 0 ? 'disabled' : ''}>
                ${stock === 0 ? 'paramsAGOTADO' : 'Añadir al carrito'}
            </button>
        `;
        listaProductos.appendChild(card);
    });
}

function actualizarCarritoHTML(){
    limpiarHTML(carritoContenedor);
    let subtotal = 0;

    articulosCarrito.forEach(item => {
        subtotal += item.precio * item.cantidad;
        const li = document.createElement('li');
        li.classList.add('carrito-item');
        li.innerHTML = `
            ${item.nombre} (x${item.cantidad})
            <button class="btn-remove" data-id="${item.id}">-</button>
        `;
        carritoContenedor.appendChild(li);
    });

    //actulizamos el subtotal del carrito
    precioTotalHTML.textContent = `${subtotal.toFixed(2)}`;

    //actualizamos el contador superior
    contadorCarrito.textContent = articulosCarrito.reduce((acc, item) => acc + item.cantidad, 0);

    //usamos la persistencia del carrito en LocalStorage
    localStorage.setItem('carrito', JSON.stringify(articulosCarrito));
}

function agregarVinilo(){
    listaProductos.addEventListener('click', (e) => {
    if(e.target.classList.contains('btn-add')){
        const id = parseInt(e.target.getAttribute('data-id'));
        const vinilo = vinilosDB.find(v => v.id === id);

        if(vinilo && vinilo.stock > 0){
            vinilo.stock--;

            const existe = articulosCarrito.find(item => item.id === id); 
            if(existe){
                existe.cantidad++;
            }else{
                articulosCarrito.push({ ...vinilo, cantidad: 1});
            }

            //refrescamos el mantenimiento del filtro
            aplicarFiltroActual();
            actualizarCarritoHTML();
        }
    }
});
}

function eliminarVinilo(){
    carritoContenedor.addEventListener('click', (e) => {
    if(e.target.classList.contains('btn-remove')){
        const id = parseInt(e.target.getAttribute('data-id'));
        const item = articulosCarrito.find(i => i.id === id);

        //devuelve el stock a la base de datos local
        const productoOriginal = vinilosDB.find(v => v.id === id);
        productoOriginal.stock++;

        if(item.cantidad > 1){
            item.cantidad--;
        }else{
            articulosCarrito = articulosCarrito.filter(i => i.id !== id);
        }

        aplicarFiltroActual();
        actualizarCarritoHTML();
    }
});
}

filtroCategoria.addEventListener('change', (e) => {
    categoriaActual = e.target.value;
    aplicarFiltroActual();
});

btnVaciar.addEventListener('click', () => {
    //devuelve el stock de todo lo que habrá en el carrito a la base de datos
    articulosCarrito.forEach(item => {
        const vini = vinilosDB.find(v => v.id === item.id);
        if(vini){
            vini.stock +=  item.cantidad;
        }
    });

    articulosCarrito = [];

    aplicarFiltroActual();
    actualizarCarritoHTML();
});

function limpiarHTML(contenedor){
    while(contenedor.firstChild){
        contenedor.removeChild(contenedor.firstChild);
    }
}

//sincroniza el stock con lo que hay en el carrito
function sincronizarStockInicial(){
    articulosCarrito.forEach(item => {
        const vini = vinilosDB.find(v => v.id === item.id);
        if(vini) vini.stock -= item.cantidad;
    });
}

agregarVinilo();
eliminarVinilo();