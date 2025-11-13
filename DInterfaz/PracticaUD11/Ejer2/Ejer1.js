const boton = document.getElementById("saludar");
const mensaje = document.getElementById("mensaje");

boton.addEventListener("click", function(){
    mensaje.innerText = "¡Hola!";
    mensaje.style.color = "green";

    setTimeout(function() {
        mensaje.innerText = "";
        mensaje.style.color = "";
    }, 2000);
});

