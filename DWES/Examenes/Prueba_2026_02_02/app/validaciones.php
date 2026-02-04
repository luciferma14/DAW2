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

	function generarToken(): string {
		if (empty($_SESSION['token'])) {
			$_SESSION['token'] = bin2hex(random_bytes(32));
		}
		return $_SESSION['token'];
	}

	function validarToken(string $token): bool {
		return isset($_SESSION['token']) && hash_equals($_SESSION['token'], $token);
	}

	function validarFormulario(array $post, array $files): array {
		$errores = [];

		if (empty($post['nombre'])) {
			$errores[] = "El nombre es obligatorio";
		}

		if (!isset($post['nivelMago']) || !is_numeric($post['nivelMago'])) {
			$errores[] = "Nivel de mago incorrecto";
		}

		if (empty($post['asignaturas'])) {
			$errores[] = "Debes seleccionar al menos una asignatura";
		}

		if ($files['imagen']['error'] !== 0) {
			$errores[] = "Error al subir la imagen";
		}

		return $errores;
	}

	function subirImagen(array $imagen): string {
		$nombre = uniqid() . "_" . $imagen['name'];
		$ruta = __DIR__ . "/uploads/" . $nombre;

		move_uploaded_file($imagen['tmp_name'], $ruta);

		return $nombre;
	}
