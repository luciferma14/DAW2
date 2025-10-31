function arraysAleatorios() {
    let numeros = [];
    for (let i = 0; i < 20; i++) {
        numeros[i] = Math.floor(Math.random() * 11);
    }

    console.log("Array inicial:", numeros);

    let pares = [];
    let impares = [];
    for (let i = 0; i < numeros.length; i++) {
        if (numeros[i] % 2 === 0) {
            pares[pares.length] = numeros[i];
        } else {
            impares[impares.length] = numeros[i];
        }
    }

    console.log("Array PARES:", pares);
    console.log("Array IMPARES:", impares);

    let paresSin = [];
    for (let i = 1; i < pares.length - 1; i++) {
        paresSin[paresSin.length] = pares[i];
    }

    let imparesSin = [];
    let tam = impares.length;
    let mitad = Math.floor(tam / 2);
    for (let i = 0; i < tam; i++) {
        if (tam % 2 === 0) {
            if (i !== mitad && i !== mitad - 1) {
                imparesSin[imparesSin.length] = impares[i];
            }
        } else {
            if (i !== mitad) {
                imparesSin[imparesSin.length] = impares[i];
            }
        }
    }

    console.log("Array PARES sin 1º y último:", paresSin);
    console.log("Array IMPARES sin elementos centrales:", imparesSin);

    let sumaPares = 0;
    for (let i = 0; i < paresSin.length; i++) {
        sumaPares += paresSin[i];
    }
    paresSin[paresSin.length] = sumaPares;

    let sumaImpares = 0;
    for (let i = 0; i < imparesSin.length; i++) {
        sumaImpares += imparesSin[i];
    }
    imparesSin[imparesSin.length] = sumaImpares;

    console.log("Array PARES con suma al final:", paresSin);
    console.log("Array IMPARES con suma al final:", imparesSin);

    let mediaPares = Math.floor(sumaPares / (paresSin.length - 1));
    let mediaImpares = Math.floor(sumaImpares / (imparesSin.length - 1));

    for (let i = paresSin.length; i > 0; i--) {
        paresSin[i] = paresSin[i - 1];
    }
    paresSin[0] = mediaPares;

    for (let i = imparesSin.length; i > 0; i--) {
        imparesSin[i] = imparesSin[i - 1];
    }
    imparesSin[0] = mediaImpares;

    console.log("Array PARES con media al inicio:", paresSin);
    console.log("Array IMPARES con media al inicio:", imparesSin);

    let paresMult = [];
    let imparesMult = [];

    for (let i = 0; i < paresSin.length; i++) {
        paresMult[i] = Math.floor(paresSin[i] * paresSin[0]);
    }

    for (let i = 0; i < imparesSin.length; i++) {
        imparesMult[i] = Math.floor(imparesSin[i] * imparesSin[0]);
    }

    console.log("Array PARES multiplicados por su media:", paresMult);
    console.log("Array IMPARES multiplicados por su media:", imparesMult);

    let combinado = [];
    let pos = 0;
    for (let i = 0; i < paresMult.length; i++) {
        combinado[pos++] = paresMult[i];
    }
    for (let i = 0; i < imparesMult.length; i++) {
        combinado[pos++] = imparesMult[i];
    }

    for (let i = 0; i < combinado.length - 1; i++) {
        for (let j = 0; j < combinado.length - 1 - i; j++) {
            if (combinado[j] > combinado[j + 1]) {
                let temp = combinado[j];
                combinado[j] = combinado[j + 1];
                combinado[j + 1] = temp;
            }
        }
    }

    console.log("Array FINAL ORDENADO:", combinado);

    let sinRepetidos = [];
    for (let i = 0; i < combinado.length; i++) {
        let repetido = false;
        for (let j = 0; j < sinRepetidos.length; j++) {
            if (combinado[i] === sinRepetidos[j]) {
                repetido = true;
                break;
            }
        }
        if (!repetido) {
            sinRepetidos[sinRepetidos.length] = combinado[i];
        }
    }

    console.log("Array FINAL ORDENADO SIN REPETIDOS:", sinRepetidos);
}