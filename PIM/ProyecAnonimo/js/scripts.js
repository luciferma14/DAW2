function validarRegistro() {
    if (document.getElementById("nick").value.trim() === "") return false;
    if (document.getElementById("pass").value.trim() === "") return false;
    return true;
}

function validarLogin() {
    if (document.getElementById("codigo").value.trim() === "") return false;
    return true;
}
