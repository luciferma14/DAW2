let porcentajeCarga = 0;

const contador = document.querySelector('.contador');
const barraFront = document.querySelector('.barraFront');
const titulo = document.querySelector('h1');

function actualizarCarga() {
    porcentajeCarga += 0.5;
    if (porcentajeCarga > 100) {
        porcentajeCarga = 100;
    }

    const porcentajeRedondeado = Math.round(porcentajeCarga);
    contador.textContent = `${porcentajeRedondeado}%`;
    barraFront.style.width = `${porcentajeCarga}%`;

    if (porcentajeCarga > 80) {
        barraFront.classList.add('alerta-final');
    } else {
        barraFront.classList.remove('alerta-final');
    }

    if (porcentajeCarga === 100) {
        clearInterval(idIntervalo);

        titulo.textContent = "¡Carga Completa!";
    }
}

const idIntervalo = setInterval(actualizarCarga, 50);
