function convertirPrompt() {
    const input = prompt("Introduce un número con prefijo (0b, 0o, 0x o decimal):");
    const resultado = document.getElementById("resultado3");
    let decimal;

    if (!input) {
        console.log("Por favor, introduce un número.");
        return;
    }

    if (input.startsWith("0b")) {
        decimal = parseInt(input.substring(2), 2);
    } else if (input.startsWith("0o")) {
        decimal = parseInt(input.substring(2), 8);
    } else if (input.startsWith("0x")) {
        decimal = parseInt(input.substring(2), 16);
    } else {
        decimal = parseInt(input, 10);
    }

    if (isNaN(decimal) || decimal < 0) {
        console.log("Número inválido o negativo.");
        return;
    }

    console.log(`Decimal: ${decimal}`);
    console.log(`Binario: ${decimal.toString(2)}`);
    console.log(`Octal: ${decimal.toString(8)}`);
    console.log(`Hexadecimal: ${decimal.toString(16).toUpperCase()}`);
}