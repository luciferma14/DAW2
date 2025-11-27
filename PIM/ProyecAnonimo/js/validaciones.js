// Validación muy simple antes de enviar formularios

function validarCrear() {
    let nick = document.getElementById("nickname").value.trim();

    if (nick.length === 0) {
        alert("Introduce un nickname.");
        return false;
    }

    return true; // permite enviar
}

function validarEntrar() {
    let codigo = document.getElementById("codigo").value.trim();

    if (codigo.length === 0) {
        alert("Debes poner un código.");
        return false;
    }

    return true;
}
