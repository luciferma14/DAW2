<?php
session_start();

require_once __DIR__ . '/../validaciones.php';
require_once __DIR__ . '/../models/Aprendiz.php';

/**
 * Limpiar la sesión del formulario
 */
function limpiarSesionFormulario(): void {
    unset($_SESSION['datos_form'], $_SESSION['errores'], $_SESSION['aprendiz']);
}

/**
 * Validar los datos del formulario
 */
function validarFormularioAprendiz(array $datos, array &$errores = []): array {
    $limpios = [];

    // Nombre
    $nombre = trim($datos['nombre'] ?? '');
    if ($nombre === '') $errores['nombre'] = 'El nombre es obligatorio';
    $limpios['nombre'] = htmlspecialchars($nombre, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

    // Casa
    $casa = $datos['casa'] ?? '';
    if ($casa === '') $errores['casa'] = 'Debes seleccionar una casa';
    $limpios['casa'] = $casa;

    // Varita
    $varita = $datos['varita'] ?? '';
    if ($varita === '') $errores['varita'] = 'Debes seleccionar una varita';
    $limpios['varita'] = $varita;

    // Asignaturas
    $asignaturas = $datos['asignaturas'] ?? [];
    if (!is_array($asignaturas) || empty($asignaturas)) $errores['asignaturas'] = 'Selecciona al menos una asignatura';
    $limpios['asignaturas'] = $asignaturas;

    // Nivel mágico
    $nivel = trim($datos['nivelMago'] ?? '');
    if ($nivel === '') {
        $errores['nivelMago'] = 'El nivel mágico es obligatorio';
        $limpios['nivelMago'] = null;
    } elseif (!ctype_digit($nivel) || (int)$nivel < 1 || (int)$nivel > 100) {
        $errores['nivelMago'] = 'Nivel mágico inválido (1 a 100)';
        $limpios['nivelMago'] = null;
    } else {
        $limpios['nivelMago'] = (int)$nivel;
    }

    $_SESSION['datos_form'] = $limpios;
    return $limpios;
}

/**
 * Controlador de Aprendiz
 */
class AprendizController {

    public function guardar() {
        $accion = $_POST['accion'] ?? '';

        switch ($accion) {

            case 'eliminar':
                limpiarSesionFormulario();
                header('Location: ../../public/index.php');
                exit;

            case 'validar':
                $errores = validarFormulario($_POST, $_FILES);
                validarFormularioAprendiz($_POST, $errores);
                $_SESSION['errores'] = $errores;
                header('Location: ../../public/index.php');
                exit;

            case 'enviar':
            default:
                $errores = validarFormulario($_POST, $_FILES);
                $datosLimpios = validarFormularioAprendiz($_POST, $errores);

                if (!empty($errores)) {
                    $_SESSION['errores'] = $errores;
                    header('Location: ../../public/index.php');
                    exit;
                }

                // Subir foto
                $rutaFoto = null;
                if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === 0) {
                    $ext = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
                    $nombreFinal = "aprendiz_" . time() . "." . $ext;
                    $destino = __DIR__ . '/../../public/uploads/' . $nombreFinal;

                    if (!file_exists(__DIR__ . '/../../public/uploads')) {
                        mkdir(__DIR__ . '/../../public/uploads', 0777, true);
                    }

                    move_uploaded_file($_FILES['imagen']['tmp_name'], $destino);
                    $rutaFoto = 'uploads/' . $nombreFinal;
                }

                // Crear objeto Aprendiz
                $aprendiz = new Aprendiz(
                    $datosLimpios['nombre'],
                    $datosLimpios['casa'],
                    $datosLimpios['varita'],
                    $datosLimpios['asignaturas'],
                    $datosLimpios['nivelMago'],
                    $rutaFoto
                );

                $_SESSION['aprendiz'] = $aprendiz;
                unset($_SESSION['errores']);

                // Redirigir a resultados.php
                header('Location: ../../public/resultado.php');
                exit;
        }
    }
}
