function mapFunction(){

    const rango = parseInt(prompt("Introduce el rango máximo (por ejemplo, 10):"));
    const repeticiones = parseInt(prompt("Introduce el número de repeticiones (por ejemplo, 10000):"));

    if (isNaN(rango) || isNaN(repeticiones) || rango <= 0 || repeticiones <= 0) {
        console.log("Los valores introducidos no son válidos.");
    } else {
        const contador = new Map();

        for (let i = 1; i <= rango; i++) {
            contador.set(i, 0);
        }

        for (let i = 0; i < repeticiones; i++) {
            const num = Math.floor(Math.random() * rango) + 1;
            contador.set(num, contador.get(num) + 1);
        }

        console.log("Repeticiones de salida de cada número:");
        console.log(`Muestra: Números aleatorios del 1 al ${rango} con ${repeticiones} repeticiones\n`);

        let i = 1;
        for (const veces of contador.values()) {
            console.log(`Número ${i}: ${veces}`);
            i++;
        }
    }
}   