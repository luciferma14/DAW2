function generarCadenas() {

    const ABCNUM = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    let num = parseInt(prompt("Número de cadenas que quieres crear:"));

    if (isNaN(num) || num <= 0) {
        console.log("Introduce un número válido mayor que 0.");
        return;
    }

    let vacias = 0;
    let textoResultado = "Cadenas generadas:<br>";

    for (let i = 1; i <= num; i++) {
        let longitud = Math.floor(Math.random() * 11);
        let cadena = "";

        for (let j = 0; j < longitud; j++) {
            cadena += ABCNUM[Math.floor(Math.random() * ABCNUM.length)];
        }

        if (cadena === "") vacias++;
        textoResultado += console.log(`Cadena ${i}: "${cadena}"`);
    }

    textoResultado += console.log(`Número de cadenas vacías: ${vacias}`);
}
