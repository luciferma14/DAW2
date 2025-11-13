const nuevoItem = document.getElementById("nuevo-item");
const botAgregar = document.getElementById("agregar");
const lista = document.getElementById("lista");

function agregarItem(){
    const texto = nuevoItem.value.trim();

    if(texto === ""){
        alert("Por favor, escribe un producto");
        return;
    }

    const item = document.createElement("li");
    const textoSpan = document.createElement("span");
    textoSpan.innerText = texto;

    const botEliminar = document.createElement("button");
    botEliminar.innerText = "Eliminar";
    botEliminar.className = "eliminar";

    botEliminar.addEventListener("click", function() {
        lista.removeChild(item);
    });

    item.appendChild(textoSpan);
    item.appendChild(botEliminar);

    lista.appendChild(item);

    nuevoItem.value = "";
    nuevoItem.focus();
}

botAgregar.addEventListener("click", agregarItem);

nuevoItem.addEventListener("keydown", function(event){
    if(event.key === "Enter"){
        agregarItem();
    }
});