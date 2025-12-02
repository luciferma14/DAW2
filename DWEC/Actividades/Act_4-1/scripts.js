//Encontrar elemento
const texto = document.getElementById("cambiar-texto");

texto.style.color = "black";

const boton = document.getElementById("btnCambiarColor");

//Cambiar elemento de color
boton.addEventListener("click", function(){
    if(texto.style.color === "black"){
        texto.style.color = "red";
        texto.innerText = "He cambiado de color!!"
    }else{
        texto.style.color = "black";
        texto.innerText = "Clica el botón y cambiaré de color :o"
    }
});

//Crear elemento
const botonCrear = document.getElementById("btnCrear");

botonCrear.addEventListener("click", () => {
    const texto = document.getElementById("textoNuevo").value;

    if (texto.trim() !== "") {
        const p = document.createElement("p");
        p.textContent = texto;
        document.getElementById("lista").appendChild(p);
    }
});

//Borrar último elemento
const botonBorrar = document.getElementById("btnBorrar");

botonBorrar.addEventListener("click", () => {
    const lista = document.getElementById("lista");
    if (lista.lastChild) {
        lista.removeChild(lista.lastChild);
    }
});