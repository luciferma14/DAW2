let DANO_BASE = 50;

function calcularDano(DANO_BASE, multiplicador = 3) {
    console.log("Daño base:", DANO_BASE);
    console.log("Multiplicador:", multiplicador);
    return DANO_BASE * multiplicador;
}

console.log("-----Ejercicio 4------");
console.log("Daño total 1:", calcularDano(DANO_BASE));
console.log("Daño total 2:", calcularDano(DANO_BASE, 5));
