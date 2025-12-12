const inputMinutos = document.getElementById('minutos-input');
const iniciarBtn = document.getElementById('boton-control');
const temporizadorDiv = document.getElementById('temporizador');
const tiempo = document.getElementById('tiempo');
const estado = document.getElementById('estado');

let intervalo;
let segundosRestantes = 0;

// Estado general del temporizador:
// "inactivo", "corriendo", "pausado"
let estadoTemporizador = "inactivo";

// Formatear tiempo MM:SS
function formatearTiempo(segundos) {
    const mins = Math.floor(segundos / 60);
    const secs = segundos % 60;
    return `${String(mins).padStart(2, '0')}:${String(secs).padStart(2, '0')}`;
}

// Iniciar desde cero
function iniciarTemporizador() {
    const minutosUsuario = parseInt(inputMinutos.value);
    if (isNaN(minutosUsuario) || minutosUsuario <= 0) {
        alert('Introduce minutos válidos');
        return;
    }

    segundosRestantes = minutosUsuario * 60;
    tiempo.textContent = formatearTiempo(segundosRestantes);
    inputMinutos.disabled = true;

    intervalo = setInterval(() => actualizarTiempo(), 1000);
    estado.textContent = "Temporizador en marcha";
}

// Pausar
function pausarTemporizador() {
    clearInterval(intervalo);
    estado.textContent = "Temporizador pausado";
}

// Reanudar
function reanudarTemporizador() {
    intervalo = setInterval(() => actualizarTiempo(), 1000);
    estado.textContent = "Temporizador reanudado";
}

// Actualizar cada segundo
function actualizarTiempo() {
    segundosRestantes--;
    tiempo.textContent = formatearTiempo(segundosRestantes);

    if (segundosRestantes > 180) {
        temporizadorDiv.classList.remove('finalizado', 'alerta');
        estado.textContent = "Descontando tiempo";

    } else if (segundosRestantes <= 180 && segundosRestantes > 10) {
        temporizadorDiv.classList.add('alerta');
        estado.textContent = "Quedan menos de 3 minutos";

    } else if (segundosRestantes <= 10 && segundosRestantes > 0) {
        temporizadorDiv.classList.add('finalizado');
        estado.textContent = "Quedan menos de 10 segundos";
    }

    if (segundosRestantes <= 0) {
        clearInterval(intervalo);
        estado.textContent = "¡Tiempo agotado!";
        iniciarBtn.textContent = "Reiniciar";
        estadoTemporizador = "inactivo";
        inputMinutos.disabled = false;
    }
}

// Control de el botón iniciar sesión
iniciarBtn.addEventListener('click', () => {

    if (estadoTemporizador === "inactivo") {
        iniciarTemporizador();
        actualizarTiempo();
        estadoTemporizador = "corriendo";
        iniciarBtn.textContent = "Pausar Sesión";
    }

    else if (estadoTemporizador === "corriendo") {
        pausarTemporizador();
        estadoTemporizador = "pausado";
        iniciarBtn.textContent = "Reanudar Sesión";
    }

    else if (estadoTemporizador === "pausado") {
        reanudarTemporizador();
        estadoTemporizador = "corriendo";
        iniciarBtn.textContent = "Pausar Sesión";
    }
});