function convertir() {
    const input = document.getElementById("numero").value.trim();
    const resultado = document.getElementById("resultado3");
    let decimal;

    if (!input) {
        resultado.textContent = "Por favor, introduce un número.";
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
        resultado.textContent = "Número inválido o negativo.";
        return;
    }

    resultado.innerHTML = 
    `Decimal: ${decimal}<br>` +
    `Binario: ${decimal.toString(2)}<br>` +
    `Octal: ${decimal.toString(8)}<br>` +
    `Hexadecimal: ${decimal.toString(16).toUpperCase()}`;
}