const añoActual = new Date().getFullYear();
const finAño = new Date(añoActual, 11, 31, 0, 0, 0);

function iniciarCuentaAtras() {
    const ahora = new Date();
    const diferencia = finAño - ahora;

    if (diferencia <= 0) {
        document.getElementById("countdown").textContent = "¡Feliz Navidad!";
        return;
    }

    let dias = Math.floor(diferencia / (1000 * 60 * 60 * 24));
    let horas = Math.floor((diferencia % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    let minutos = Math.floor((diferencia % (1000 * 60 * 60)) / (1000 * 60));
    let segundos = Math.floor((diferencia % (1000 * 60)) / 1000);

    horas = horas < 10 ? "0" + horas : horas;
    minutos = minutos < 10 ? "0" + minutos : minutos;
    segundos = segundos < 10 ? "0" + segundos : segundos;

    document.getElementById("countdown").textContent = `${dias} días, ${horas}:${minutos}:${segundos}`;
        
}

setInterval(iniciarCuentaAtras, 1000);