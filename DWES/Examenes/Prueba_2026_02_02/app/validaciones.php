<?php
    function validaRequerido($valor){ //Obliga a introducir datos en campos requeridos
        if(trim($valor) == ''){
            return false;
        }else{
            return true;
        }
    }

    function validaEmail($valor){ //valida que se haya introducido un email user@ejemplo.com
        if(filter_var($valor, FILTER_VALIDATE_EMAIL) === FALSE){
            return false;
        }else{
            return true;
        }
    }

    function validaAlfabeto ($valor){
        if (ctype_alpha($valor)===FALSE){
            return false;
        }else{
            return true;
        }
    }

    function validaAlfanum ($valor){
        if (ctype_alnum($valor)===FALSE){
            return false;
        }else{
            return true;
        }
    }

    function validaNumero ($valor){
        if (ctype_digit($valor)===FALSE){
            return false;
        }else{
            return true;
        }
    }

// ---------------- TOKEN CSRF ----------------

function crearTokenFormulario()
{
	$_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(24));
	return $_SESSION['token'];
}

// Alternativa sin openssl_random_pseudo_bytes (por si la extensión no está disponible)
// Mantiene la idea de token aleatorio pero usando funciones estándar de PHP.
function crearTokenFormularioAlternativo()
{
	if (function_exists('random_bytes')) {
		$_SESSION['token'] = bin2hex(random_bytes(24));
	} else {
		// Fallback menos seguro pero válido para entorno de prácticas/examen sin extensiones
		$entropia = uniqid((string)mt_rand(), true) . session_id() . microtime(true);
		$_SESSION['token'] = hash('sha256', $entropia);
	}

	return $_SESSION['token'];
}

function verificarToken(string $tokenEnviado): bool
{
	if (isset($_SESSION['token']) && hash_equals($_SESSION['token'], $tokenEnviado)) {
		return true;
	}
	return false;
}

// ---------------- SUBIDA DE IMAGEN ----------------

function subirImagen(string $input = 'imagen', string $directorio = 'uploads/')
{
	if (isset($_FILES[$input]) && is_uploaded_file($_FILES[$input]['tmp_name'])) {
		if (!is_dir($directorio)) {
			// Intentamos crear el directorio si no existe (modo examen: simple).
			@mkdir($directorio, 0777, true);
		}

		$nombre = time() . '_' . basename($_FILES[$input]['name']);
		$ruta   = rtrim($directorio, '/\\') . '/' . $nombre;

		if (move_uploaded_file($_FILES[$input]['tmp_name'], $ruta)) {
			$_SESSION['foto'] = $ruta;
			return $ruta;
		}
	}

	return false;
}

// ---------------- VALIDACIÓN FORMULARIO HARRY POTTER ----------------

/**
 * Valida los datos del formulario de aprendiz (Harry Potter).
 * Devuelve un array con los datos saneados y rellena $errores si algo falla.
 */
function validarFormularioAprendiz(array $datos, array &$errores = []): array
{
	$limpios = [];

	// Nombre (obligatorio)
	$nombre = trim($datos['nombre'] ?? '');
	if ($nombre === '') {
		$errores['nombre'] = 'El nombre es obligatorio.';
	}
	$limpios['nombre'] = htmlspecialchars($nombre, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

	//casa / característica (obligatorio)
	$casa = $datos['casa'] ?? '';
	if ($casa === '') {
		$errores['casa'] = 'Debes seleccionar una casa.';
	}
	$limpios['casa'] = $casa;

	// Varita (opcional)
	$varita = trim($datos['varita'] ?? '');
	$limpios['varita'] = $varita !== ''
		? htmlspecialchars($varita, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8')
		: null;

	// Asignaturas (checkbox múltiple)
	$asignaturas = $datos['asignaturas'] ?? [];
	if (!is_array($asignaturas)) {
		$asignaturas = [];
	}

	$limpios['asignaturas'] = $asignaturas;
	// Guardamos datos limpios en sesión para recargar el formulario
	$_SESSION['datos_form'] = $limpios;

	return $limpios;
}

function limpiarSesionFormulario(): void
{
	unset($_SESSION['datos_form'], $_SESSION['errores'], $_SESSION['foto'], $_SESSION['aprendiz']);
}


    
?>