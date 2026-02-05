/**
 * SOLUCIÓN EXAMEN TECHSTORE - 2º DAW
 */

// Variables para los selectores del DOM
const listaProductos = document.querySelector('#lista-productos');
const carritoContenedor = document.querySelector('#carrito-items');
const contadorCarrito = document.querySelector('#contador-productos');
const precioTotalHTML = document.querySelector('#precio-total');
const filtroCategoria = document.querySelector('#filtro-categoria');
const loading = document.querySelector('#loading');
const btnVaciar = document.querySelector('#vaciar-carrito');

// Variables para controlar el estado de la aplicaciÃ³n
let articulosCarrito = [];
let productosDB = [];
let categoriaActual = 'todos'; // Controla quÃ© estamos viendo

// Inicio
document.addEventListener('DOMContentLoaded', () => {
    // 1. Recuperar LocalStorage (Actividad 5.9)
    articulosCarrito = JSON.parse(localStorage.getItem('carrito')) || [];
    
    // 2. Cargar Datos AsÃ­ncronos (Unidad 6)
    obtenerProductos();
});

// Realizamos la carga de productos desde el JSON con fetch y async/await
async function obtenerProductos() {
    // Manejo de errores con try/catch
    try {
        const res = await fetch('productos.json'); // Ruta relativa al archivo JSON
        if(!res.ok) throw new Error("Error en red"); // Comprobamos respuesta
        productosDB = await res.json(); // Parseamos JSON a objeto JS
        
        loading.style.display = 'none';
        
        // Al cargar, sincronizamos el stock con lo que ya hay en el carrito
        sincronizarStockInicial();
        
        // Renderizado inicial
        aplicarFiltroActual();
        actualizarCarritoHTML();
    } catch (error) {
        loading.textContent = "Error al cargar productos.";
        console.error(error);
    }
}

// Aplicamos la lÃ³gica de filtrado segÃºn la categorÃ­a seleccionada
function aplicarFiltroActual() {
    // Limpiamos la vista antes de pintar
    limpiarHTML(listaProductos);

    const productosAMostrar = (categoriaActual === 'todos') 
        ? productosDB 
        : productosDB.filter(p => p.categoria === categoriaActual);

    pintarCards(productosAMostrar);
}

// Renderizamos las cards de productos
function pintarCards(lista) {
    // No llamamos a limpiarHTML aquÃ­ porque ya lo hace aplicarFiltroActual
    lista.forEach(p => {
        const { id, nombre, precio, stock } = p;
        const card = document.createElement('div');
        card.classList.add('producto-card');
        if(stock === 0) card.classList.add('agotado');

        card.innerHTML = `
            <h3>${nombre}</h3>
            <p class="precio">${precio}â‚¬</p>
            <p>Stock: ${stock}</p>
            <button class="btn-add" data-id="${id}" ${stock === 0 ? 'disabled' : ''}>
                ${stock === 0 ? 'AGOTADO' : 'AÃ±adir al carrito'}
            </button>
        `;
        listaProductos.appendChild(card);
    });
}

function actualizarCarritoHTML() {
    limpiarHTML(carritoContenedor);
    let subtotal = 0;

    articulosCarrito.forEach(item => {
        subtotal += item.precio * item.cantidad;
        const li = document.createElement('li');
        li.classList.add('item-carrito');
        li.innerHTML = `
            ${item.nombre} (x${item.cantidad})
            <button class="btn-remove" data-id="${item.id}">-</button>
        `;
        carritoContenedor.appendChild(li);
    });

    // Actualizamos subtotal del carrito
    precioTotalHTML.textContent = `${subtotal.toFixed(2)}â‚¬`;

    // Actualizamos contador superior
    contadorCarrito.textContent = articulosCarrito.reduce((acc, item) => acc + item.cantidad, 0);
    
    // Usamos la persistencia del carrito en LocalStorage
    localStorage.setItem('carrito', JSON.stringify(articulosCarrito));
}

// Eventos con delegaciÃ³n (utilizando event bubbling: 
// para mejorar el rendimiento del DOM al no tener que asignar 
// muchos event listeners a cada botÃ³n individualmente)
// Se implementa en el elemento padre comÃºn. DespuÃ©s se filtra 
// por la clase o atributo del objetivo (target). En nuestro caso,
// los botones dentro de listaProductos y carritoContenedor.
// Lo podÃ©is encontrar explicado en la Unidad 5, secciÃ³n 1.9 PropagaciÃ³n de eventos.

// Escuchamos el evento 'click' en el contenedor de productos y aplicamos delegaciÃ³n
// para los botones de aÃ±adir al carrito que se encuentran dentro de las Cards de producto.

// Luego escuchamos el evento 'click' en el contenedor del carrito para los botones de eliminar/restar.
// usando la misma tÃ©cnica de delegaciÃ³n.

listaProductos.addEventListener('click', (e) => {
    if(e.target.classList.contains('btn-add')) {
        const id = parseInt(e.target.getAttribute('data-id'));
        const producto = productosDB.find(p => p.id === id);

        if(producto && producto.stock > 0) {
            producto.stock--;
            
            const existe = articulosCarrito.find(item => item.id === id);
            if(existe) {
                existe.cantidad++;
            } else {
                articulosCarrito.push({ ...producto, cantidad: 1 });
            }
            
            // Refrescar manteniendo el filtro
            aplicarFiltroActual();
            actualizarCarritoHTML();
        }
    }
});

carritoContenedor.addEventListener('click', (e) => {
    if(e.target.classList.contains('btn-remove')) {
        const id = parseInt(e.target.getAttribute('data-id'));
        const item = articulosCarrito.find(i => i.id === id);
        
        // Devolver stock a la "base de datos" local
        const productoOriginal = productosDB.find(p => p.id === id);
        productoOriginal.stock++;

        if(item.cantidad > 1) {
            item.cantidad--;
        } else {
            articulosCarrito = articulosCarrito.filter(i => i.id !== id);
        }

        aplicarFiltroActual();
        actualizarCarritoHTML();
    }
});

filtroCategoria.addEventListener('change', (e) => {
    categoriaActual = e.target.value;
    aplicarFiltroActual();
});

// --- FLUJO VACIAR CARRITO CORREGIDO ---
btnVaciar.addEventListener('click', () => {
    // 1. Devolver el stock de todo lo que habÃ­a en el carrito a la DB
    articulosCarrito.forEach(item => {
        const prod = productosDB.find(p => p.id === item.id);
        if(prod) prod.stock += item.cantidad;
    });

    // 2. Resetear array
    articulosCarrito = [];

    // 3. Actualizar UI respetando el filtro que el usuario estÃ© viendo
    aplicarFiltroActual();
    actualizarCarritoHTML();
});

// --- UTILIDADES ---
function limpiarHTML(contenedor) {
    while(contenedor.firstChild) {
        contenedor.removeChild(contenedor.firstChild);
    }
}

function sincronizarStockInicial() {
    // Si el usuario carga la pÃ¡gina con productos en el carrito,
    // debemos restar ese stock del total disponible.
    articulosCarrito.forEach(item => {
        const prod = productosDB.find(p => p.id === item.id);
        if(prod) prod.stock -= item.cantidad;
    });
}