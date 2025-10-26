
function contarCaracter() {
    let texto = prompt("Introduce el texto:");
    let caracter = prompt("Carácter que quieres contar:");

    if (texto.split(" ").filter(p => p !== "").length < 3) {
        alert("El texto debe tener al menos 3 palabras.");
        return;
    }

    if (caracter.length !== 1) {
        alert("Debes introducir solo un carácter.");
        return;
    }

    let contador = 0;
    for (let char of texto) {
        if (char === caracter) contador++;
    }

    alert(`En el texto "${texto}", el carácter "${caracter}" aparece ${contador} veces.`);
}

