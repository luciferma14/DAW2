const botonToggle = document.getElementById('toggle');
const contenido = document.getElementById('contenido');

botonToggle.addEventListener('click', function() {
    if (contenido.classList.contains('oculto')) {
        contenido.classList.remove('oculto');
        botonToggle.innerText = 'Ocultar Contenido';
    } else {
        contenido.classList.add('oculto');
        botonToggle.innerText = 'Mostrar Contenido';
    }
});