const luces = document.querySelectorAll(".luz");
const botonSiguiente = document.getElementById("siguiente");

let estadoActual = 0;
 
const secuencia = ["roja", "verde", "amarilla"];

botonSiguiente.addEventListener("click", function(){
    luces.forEach(luz => luz.classList.remove("activa"));
    estadoActual = (estadoActual + 1) % secuencia.length;

    const luzActiva = document.querySelector(`.${secuencia[estadoActual]}`);
    luzActiva.classList.add("activa");
});