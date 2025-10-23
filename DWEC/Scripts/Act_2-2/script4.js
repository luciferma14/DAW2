
function generarPalabra(event) {

    event.preventDefault();
    let p1 = document.getElementById("palabra1").value.trim();
    let p2 = document.getElementById("palabra2").value.trim();
    let p3 = document.getElementById("palabra3").value.trim();

    if (p1.length < 4 || p2.length < 5 || p3.length < 6) {
        document.getElementById("resultado4").textContent = "Las palabras no cumplen las longitudes mínimas (4, 5 y 6 caracteres).";
        return;
    }

    let inicio = p1.slice(0, 2).toUpperCase();

    let mitad = "";
    let len2 = p2.length;
    if (len2 % 2 === 0) {
        mitad = p2.slice(len2 / 2 - 1, len2 / 2 + 1).toLowerCase();
    } else {
        mitad = p2.slice(Math.floor(len2 / 2) - 1, Math.floor(len2 / 2) + 2).toLowerCase();
    }
 
    let final = p3.slice(-2).toUpperCase();

    let resultado = inicio + mitad + final;

    document.getElementById("resultado4").textContent = "La nueva palabra es: " + resultado;
}