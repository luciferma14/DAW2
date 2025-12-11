function comprobarRequisitos() {
    let nombre;
    let nivel;
    let clasePersonaje;

    // Bucle para pedir datos hasta que TODO sea válido
    while (true) {

        nombre = prompt("Introduce el nombre del personaje:");
        nivel = parseInt(prompt("Indique el nivel (número entero):"));
        clasePersonaje = prompt("Indique la clase del personaje (Mago/Guerrero):");

        // Validaciones
        const nombreValido = nombre !== null && nombre.trim() !== "";
        const nivelValido = Number.isInteger(nivel);
        const claseValida = (clasePersonaje === "Mago" || clasePersonaje === "Guerrero");

        if (!nombreValido) {
            alert("El nombre no puede estar vacío.");
            continue;
        }

        if (!nivelValido) {
            alert("El nivel debe ser un número entero.");
            continue;
        }

        if (!claseValida) {
            alert("La clase debe ser 'Mago' o 'Guerrero'.");
            continue;
        }

        // LÓGICA NO ANIDADA
        const esMagoValido = (clasePersonaje === "Mago" && nivel > 35);
        const esGuerreroValido = (clasePersonaje === "Guerrero" && nivel > 40);

        if (esMagoValido || esGuerreroValido) {
            alert("ACCESO CONCEDIDO: Puedes entrar a la misión ÉLITE");
            break;     // FIN DEL BUCLE
        }

        alert("ACCESO DENEGADO: Tu nivel es demasiado bajo. Inténtalo de nuevo.");
    }
}

// Ejecutamos automáticamente
comprobarRequisitos();
