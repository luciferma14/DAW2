const inputMinutos = document.getElementById('minutos-input');
const iniciarBtn = document.getElementById('boton-control');
const detenerBtn = document.getElementById('detenerBtn');
const temporizadorDiv = document.getElementById('temporizador');
const tiempo = document.getElementById('tiempo');
const estado = document.getElementById('estado');

let intervalo; // Variable para guardar el ID de setInterval
let segundosRestantes;

// Función para formatear tiempo (segundos a MM:SS)
function formatearTiempo(segundos) {
    const mins = Math.floor(segundos / 60);
    const secs = segundos % 60;
    return `${String(mins).padStart(2, '0')}:${String(secs).padStart(2, '0')}`;
}

// Función para iniciar el temporizador
function iniciarTemporizador() {
    const minutosUsuario = parseInt(inputMinutos.value); // Obtener minutos del input
    if (isNaN(minutosUsuario) || minutosUsuario <= 0) {
        alert('Por favor, introduce un número válido de minutos.');
        return;
    }

    segundosRestantes = minutosUsuario * 60;
    tiempo.textContent = formatearTiempo(segundosRestantes);

    inputMinutos.disabled = true;
    iniciarBtn.disabled = true;
    detenerBtn.disabled = false;

    // Iniciar el intervalo (cada segundo)
    intervalo = setInterval(() => {
        segundosRestantes--;
        tiempo.textContent = formatearTiempo(segundosRestantes);

        if(segundosRestantes > 180){
            temporizadorDiv.classList.remove('finalizado', 'alerta');
            estado.textContent = "Descontando tiempo"
            
        }else if(segundosRestantes <= 180){
            temporizadorDiv.classList.add('alerta');
            estado.textContent = "Quedan menos de 3 mins";

        }
        if(segundosRestantes <= 10){
            temporizadorDiv.classList.add('finalizado');
            estado.textContent = "Quedan menos de 10 segs";
        }

        if (segundosRestantes <= 0) {
            clearInterval(intervalo); // Detener el temporizador
            estado.textContent = "¡Tiempo Agotado!";
            // Reestablecer botones
            inputMinutos.disabled = false;
            iniciarBtn.disabled = false;
            detenerBtn.disabled = true;
        }
    }, 1000); 
}

// Función para detener el temporizador
function detenerTemporizador() {
    clearInterval(intervalo);
    estado.textContent = "Temporizador detenido";
    // Reestablecer botones
    inputMinutos.disabled = false;
    iniciarBtn.disabled = false;
    detenerBtn.disabled = true;
}

iniciarBtn.addEventListener('click', iniciarTemporizador);
detenerBtn.addEventListener('click', detenerTemporizador);