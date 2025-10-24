
function generarPalabra() {

    let p1 = prompt("Palabra de 4 letras mínimo :");
    let p2 = prompt("Palabra de 5 letras mínimo :")
    let p3 = prompt("Palabra de 6 letras mínimo :")

    if (p1.length < 4 || p2.length < 5 || p3.length < 6) {
        alert("Las palabras no cumplen las longitudes mínimas (4, 5 y 6 caracteres).");
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

    alert("La nueva palabra es: " + resultado);
}