// Selección de elementos del DOM
const combo = document.querySelector(".combo");
const lista = document.querySelector(".forma_pago");
const textoCombo = combo.querySelector("p");
const opciones = document.querySelectorAll(".forma_pago li");

// Mostrar / ocultar el combo
combo.addEventListener("click", () => {
    lista.classList.toggle("oculto");
    combo.classList.toggle("gira");
});

// Selección de una forma de pago
opciones.forEach(opcion => {
    opcion.addEventListener("click", () => {
        const textoSeleccionado = opcion.querySelector("p").textContent;

        // Cambiar el texto del combo
        textoCombo.textContent = textoSeleccionado;

        // Cerrar el combo y devolver la flecha a su posición
        lista.classList.add("oculto");
        combo.classList.remove("gira");
    });
});
