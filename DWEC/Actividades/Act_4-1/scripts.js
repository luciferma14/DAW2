const texto = document.getElementById("cambiar-texto");
const color = document.getElementById("color");

texto.style.color = "black";

const boton = document.getElementById("btnCambiarColor");

boton.addEventListener("click", function(){
    if(texto.style.color === "black"){
        texto.style.color = "color";
    }else{
        texto.style.color = "black";
    }
});