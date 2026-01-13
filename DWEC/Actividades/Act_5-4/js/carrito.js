const listaCursos = document.querySelector('#lista-cursos');
const carrito = document.querySelector('#carrito');
const contenedorCarrito = document.querySelector('#lista-carrito tbody');
const vaciarCarritoBtn = document.querySelector('#vaciar-carrito');

let articulosCarrito = [];

cargarEventListeners();

function cargarEventListeners() {
    // Agregar curso
    listaCursos.addEventListener('click', agregarCurso);

    // Eliminar curso
    carrito.addEventListener('click', eliminarCurso);

    // Vaciar carrito
    vaciarCarritoBtn.addEventListener('click', vaciarCarrito);
}
// Añadir curso al carrito
function agregarCurso(e) {
    e.preventDefault();

    if (e.target.classList.contains('agregar-carrito')) {
        const cursoSeleccionado = e.target.parentElement.parentElement;
        leerDatosCurso(cursoSeleccionado);
    }
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

    // Comprobar si el curso ya existe
    const existe = articulosCarrito.some(curso => curso.id === infoCurso.id);

    if (existe) {
        articulosCarrito.forEach(curso => {
            if (curso.id === infoCurso.id) {
                curso.cantidad++;
            }
        });
    } else {
        articulosCarrito.push(infoCurso);
    }

    carritoHTML();
}

// Mostrar carrito en el HTML
function carritoHTML() {
    limpiarHTML();

    articulosCarrito.forEach(curso => {
        const row = document.createElement('tr');

        row.innerHTML = `
            <td>
                <img src="${curso.imagen}" width="100">
            </td>
            <td>${curso.titulo}</td>
            <td>${curso.precio}</td>
            <td>${curso.cantidad}</td>
            <td>
                <a href="#" class="borrar-curso" data-id="${curso.id}"> X </a>
            </td>
        `;

        contenedorCarrito.appendChild(row);
    });
}

// Eliminar un curso
function eliminarCurso(e) {
    if (e.target.classList.contains('borrar-curso')) {
        const cursoId = e.target.getAttribute('data-id');

        articulosCarrito = articulosCarrito.filter(curso => curso.id !== cursoId);

        carritoHTML();
    }
}

// Vaciar carrito
function vaciarCarrito() {
    articulosCarrito = [];
    limpiarHTML();
}

// Limpiar HTML del carrito
function limpiarHTML() {
    while (contenedorCarrito.firstChild) {
        contenedorCarrito.removeChild(contenedorCarrito.firstChild);
    }
}
