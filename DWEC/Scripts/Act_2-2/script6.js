function generarCadenas(event) {
    event.preventDefault();

    const ABCNUM = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    const num = parseInt(document.getElementById("numCadenas").value);
    const resultado = document.getElementById("resultado6");

    if (isNaN(num) || num <= 0) {
        resultado.textContent = "Introduce un número válido mayor que 0.";
        return;
    }

    let vacias = 0;
    let textoResultado = "Cadenas generadas:<br>";

    for (let i = 1; i <= num; i++) {
        // Longitud aleatoria de 0 a 10
        let longitud = Math.floor(Math.random() * 11);
        let cadena = "";

        // Generar la cadena carácter a carácter
        for (let j = 0; j < longitud; j++) {
            cadena += ABCNUM[Math.floor(Math.random() * ABCNUM.length)];
        }

        if (cadena === "") vacias++;
        textoResultado += `Cadena ${i}: "${cadena}"<br>`;
    }

    textoResultado += `<br>Número de cadenas vacías: ${vacias}`;
    resultado.innerHTML = textoResultado;
}
