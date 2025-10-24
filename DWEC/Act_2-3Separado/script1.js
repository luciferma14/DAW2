function multiPrompt() {
    let numMulti = parseFloat(prompt("Introduce un número para multiplicar:"));

    if (isNaN(numMulti) || numMulti === 0 || numMulti === 1 || numMulti === -1) {
        console.log("Ese valor no está permitido.");
        return;
    }

    let cont = 0;
    let valor = numMulti;

    while (valor < Infinity) {
        let anterior = valor;
        valor = valor * numMulti;
        cont++;

        console.log(numMulti + " x " + anterior + " = " + valor + " Se ha multiplicado por sí mismo " + cont + " veces");
    }
}
