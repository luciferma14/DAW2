function analizar(event) {
    event.preventDefault();

    let frase1 = document.getElementById("frase1").value;
    let frase2 = document.getElementById("frase2").value;
    let textoAnalizar = "";

    if (frase1.length >= frase2.length) {
        textoAnalizar = frase1;
        document.getElementById("resultado3").textContent = "Analizaremos la primera frase: '" + frase1 + "'";
    } else {
        textoAnalizar = frase2;
        document.getElementById("resultado3").textContent = "Analizaremos la segunda frase: '" + frase2 + "'";
    }

    let caracteresUnicos = "";

    for (let char of textoAnalizar) {

        if (!caracteresUnicos.includes(char) && char.trim() !== "") {
            caracteresUnicos += char + ", ";
        }
    }

    document.getElementById("resultado3").textContent = "En el texto '" + textoAnalizar + "', no se repiten estas letras " + caracteresUnicos;
}