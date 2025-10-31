function palabras() {
    let palabras = [];
    let palabra;

    while (true) {
        palabra = prompt("Escribe una palabra:");

        if (palabra === null || palabra === "") {
            break;
        }

        palabra = palabra.trim();

        let tienenum = false;

        for (let i = 0; i < palabra.length; i++) {
            if (palabra[i] >= "0" && palabra[i] <= "9") {
                tienenum = true;
                break;
            }
        }

        if ((palabra !== "") && (tienenum === false) && (!palabra.includes(" "))) {
            palabras.push(palabra);
        }
    }

    palabras.sort().reverse();

    for (let i = 0; i < palabras.length; i++) {
        console.log(`El elemento ${i + 1} es: ${palabras[i]}`);
    }
}