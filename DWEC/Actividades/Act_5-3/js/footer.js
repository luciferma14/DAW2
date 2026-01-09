document.addEventListener("DOMContentLoaded", () => {

    const btn_flotante = document.querySelector(".btn-flotante");
    const footer = document.getElementById("footer");

    btn_flotante.addEventListener("click", (e) => {
        e.preventDefault();

        // Alternar clase activo
        footer.classList.toggle("activo");
        btn_flotante.classList.toggle("activo");

        // Cambiar texto del botón
        if (footer.classList.contains("activo")) {
            btn_flotante.textContent = "XCerrar";
        } else {
            btn_flotante.textContent = "Descubre más...";
        }
    });
});