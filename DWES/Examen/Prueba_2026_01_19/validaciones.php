<?php
// Archivo de validaciones para completar por el alumnado
// Debéis implementar las funciones usando las funciones de php vistas en clase (diapositivas)
// No se permite usar expresiones regulares en este ejercicio.

function validaRequerido($valor){
    // Debe devolver true si el valor NO está vacío
    return trim($valor) === '';
    return false; // <-- completar
}

function validaEmail($valor){
   
    if (filter_var($valor, FILTER_VALIDATE_EMAIL)) {
        return false;
    }else{
        return true;
    }
    
    return false; // <-- completar
}

function validaAlfabeto($valor){
    // Debe devolver true si el valor contiene SOLO letras
    if(ctype_alpha($valor) ){
        return true;
    }
    return false; // <-- completar
}

function validaAlfanum($valor){
    // Debe devolver true si el valor contiene SOLO letras y números 
    if (ctype_alnum($valor)){
        return true;
    }
    return false; // <-- completar
}

function validaNumero($valor){
    // Debe devolver true si el valor contiene SOLO números 
    
    return false; // <-- completar
}


function esVacio(string $valor): bool {
    return trim($valor) === '';
}


function tieneLongitudMinima(string $valor, int $min): bool {
    return strlen($valor) >= $min;
}

function esAlfanumerico(string $valor): bool {
    return (bool) preg_match('/^[a-zA-Z0-9]+$/', $valor);
}

function validarPasswordCampo(string $password): array {
    $errores = [];

    if (esVacio($password)) {
        $errores[] = "La contraseña es obligatoria.";
        return $errores;
    }

    if (!tieneLongitudMinima($password, 6)) {
        $errores[] = "La contraseña debe tener al menos 6 caracteres.";
    }

    if (!esAlfanumerico($password)) {
        $errores[] = "La contraseña debe ser alfanumérica (solo letras y números, sin símbolos).";
    }

    return $errores;
}
?>
