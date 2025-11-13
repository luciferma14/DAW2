const titulo = document.getElementById("titulo");
titulo.innerText = "¡Hola Mundo!";

const descripcion = document.querySelector(".descripcion");
descripcion.innerText = "Texto modificado con JavaScript";

titulo.style.color = "blue";

const boton = document.getElementById("cambiar");

boton.addEventListener("click", function(){
    if(titulo.style.color === "blue"){
        titulo.style.color = "red";
        titulo.innerText = "¡Texto cambiado!"
    }else{
        titulo.style.color = "blue";
        titulo.innerText = "¡Hola mundo!"
    }
});