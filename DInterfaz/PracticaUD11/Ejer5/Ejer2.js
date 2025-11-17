const imagenes = [
    'https://picsum.photos/400/300?random=1',
    'https://picsum.photos/400/300?random=2',
    'https://picsum.photos/400/300?random=3'
];

let imagenActual = 0;

const imagen = document.getElementById('imagen-actual');
const contador = document.getElementById('contador');
const botonAnterior = document.getElementById('anterior');
const botonSiguiente = document.getElementById('siguiente');

function actualizarGaleria() {
    imagen.src = imagenes[imagenActual];
    imagen.alt = `Imagen ${imagenActual + 1}`;
    
    contador.innerText = `${imagenActual + 1} / ${imagenes.length}`;
    
    botonAnterior.disabled = imagenActual === 0;
    botonSiguiente.disabled = imagenActual === imagenes.length - 1;
}

botonSiguiente.addEventListener('click', function() {
    if (imagenActual < imagenes.length - 1) {
        imagenActual++;
    } else {
        imagenActual = 0;
    }
    actualizarGaleria();
});

botonAnterior.addEventListener('click', function() {
    if (imagenActual > 0) {
        imagenActual--;
    } else {
        imagenActual = imagenes.length - 1;
    }
    actualizarGaleria();
});

actualizarGaleria();
