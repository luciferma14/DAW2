const botonesAgregar = document.querySelectorAll('.agregar-carrito');
const contenedorCarrito = document.querySelector('#lista-carrito tbody');
const vaciarCarritoBtn = document.querySelector('#vaciar-carrito');

let articulosCarrito = [];

cargarEventListeners();

function cargarEventListeners() {
    // Agregar cursos
    for (let i = 0; i < botonesAgregar.length; i++) {
        botonesAgregar[i].addEventListener('click', agregarCurso);
    }

    // Vaciar carrito
    vaciarCarritoBtn.addEventListener('click', vaciarCarrito);
}

// Añadir curso
function agregarCurso(e) {
    e.preventDefault();

    const curso = e.currentTarget.parentElement.parentElement;

    leerDatosCurso(curso);
}

// Leer datos del curso
function leerDatosCurso(curso) {
    const infoCurso = {
        imagen: curso.querySelector('img').src,
        titulo: curso.querySelector('h4').textContent,
        precio: curso.querySelector('.precio span').textContent,
        id: curso.querySelector('a').getAttribute('data-id'),
        cantidad: 1
    };

    let existe = false;

    for (let i = 0; i < articulosCarrito.length; i++) {
        if (articulosCarrito[i].id === infoCurso.id) {
            articulosCarrito[i].cantidad++;
            existe = true;
        }
    }

    if (!existe) {
        articulosCarrito.push(infoCurso);
    }

    pintarCarrito();
}

// Pintar carrito
function pintarCarrito() {
    limpiarHTML();

    for (let i = 0; i < articulosCarrito.length; i++) {
        const curso = articulosCarrito[i];

        const row = document.createElement('tr');

        row.innerHTML = `
            <td>
                <img src="${curso.imagen}" width="100">
            </td>
            <td>${curso.titulo}</td>
            <td>${curso.precio}</td>
            <td>${curso.cantidad}</td>
            <td>
                <a href="#" class="borrar-curso" onclick="eliminarCurso('${curso.id}')">X</a>
            </td>
        `;

        contenedorCarrito.appendChild(row);
    }
}

// Eliminar curso
function eliminarCurso(id) {
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
function vaciarCarrito(e) {
    e.preventDefault();
    articulosCarrito = [];
    limpiarHTML();
}

// Limpiar HTML
function limpiarHTML() {
    while (contenedorCarrito.firstChild) {
        contenedorCarrito.removeChild(contenedorCarrito.firstChild);
    }
}
