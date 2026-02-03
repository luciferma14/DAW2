// const botonesAgregar = document.querySelectorAll('.agregar-carrito');
const selectCategoria = document.querySelector('#filtro-categoria');
// const vaciarCarritoBtn = document.querySelector('#vaciar-carrito');

// Contenedor de resultados
const loading = document.getElementById('loading');

let articulosCarrito = [];

const datosBusqueda = {
    filtroCategoria: ''
};

document.addEventListener('DOMContentLoaded', obtenerProductos);
loading.addEventListener('submit', consultarApi);

async function obtenerProductos() {
    try {
        const productos = 'productos.json';
        const respuesta = await fetch(productos);

        if (!respuesta.ok) {
            throw new Error('Error al obtener productos');
        }

        const datos = await respuesta.json();

        datos.forEach(prod => {
            const { nombre } = prod;

            const option = document.createElement('option');
            option.value = nombre;

            selectCategoria.appendChild(option);
        });

    } catch (error) {
        console.error(error);
        mostrarError('No se pudieron cargar los productos');
    }
}

async function consultarApi(){
    try{
        const productos = `productos.json`;
        const respuesta = await fetch(productos);

        if(!respuesta.ok){
            throw new Error("Error en la consulta");
        }

        const datos = await respuesta.json();
        pintarCards(datos);

    }catch(error){
        console.error(error);
        mostrarError("No se han podido obtener los datos");
    }
}

function pintarCards(datos){
    limpiarHTML(loading);

    datos.forEach(dato => {
        const { nombre , precio } = dato;

        loading.innerHTML += `
            <div>
                <p class="font-bold">${nombre} <span class="font-light">Nombre</span></p>
                <p class="font-bold">${precio} <span class="font-light">Precio</span></p>

            </div>
        `;
    });

    sincronizarStorage();
}

function filtrarProduc() {
    const loading = producs
        .filter(filtrarTodo);
    if (loading.length) {
        mostrarProduc(loading);
    } else {
        noResultado();
    }
}
// Filtro todos los productos
function filtrarTodo(produc) {
    const { filtroCategoria } = datosBusqueda;
    if (filtroCategoria) {
        return coche.filtroCategoria === filtroCategoria;
    }
    return produc;
}

// Eliminar producto
function eliminarProduc(id) {
    let nuevoCarrito = [];

    for (let i = 0; i < articulosCarrito.length; i++) {
        if (articulosCarrito[i].id !== id) {
            nuevoCarrito.push(articulosCarrito[i]);
        }
    }

    articulosCarrito = nuevoCarrito;
    pintarCarrito();
}

// Vaciar carrito
function gestionarCarrito(e) {
    e.preventDefault();

    const produc = e.currentTarget.parentElement.parentElement;
    leerDatosCurso(produc);

    articulosCarrito = [];
    limpiarHTML();

    //BORRAR localStorage
    localStorage.removeItem('carrito');
}

// Limpiar HTML
function limpiarHTML() {
    while (loading.firstChild) {
        loading.removeChild(loading.firstChild);
    }
}

// Guardar en localStorage
function sincronizarStorage() {
    localStorage.setItem('carrito', JSON.stringify(articulosCarrito));
}

function mostrarError(mensaje){
    const errorExistente = document.getElementById('loading');

    if(!errorExistente){
        const divError = document.createElement('div');
        divError.textContent = mensaje;

        loading.appendChild(divError);

        setTimeout(() => {
            divError.remove();
        }, 2000);
    }
}