<?php
session_start();
require_once 'validaciones.php';

/***
 * Formulario para registrar un aprendiz de Hogwarts
 * Requiere sesión para guardar los datos entre peticiones 
 * y un token CSRF para evitar ataques.
 * Se debe validar usando el fichero validaciones.php
 **/


/**
 * PROCESAR FORMULARIO
 */

// Inicializar errores
$errores = [];

// Comprobar token CSRF y finalizar si no es válido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['token']) || !validarToken($_POST['token'])) {
        die("Token CSRF no válido");
    }
}

// Si se pulsa VALIDAR
if (isset($_POST['validar'])) {

    /**
     * VALIDACIONES y guardar valores en sesión
     */

    // nombre
    if (empty($_POST['nombre'])) {
        $errores[] = "El nombre es obligatorio";
    } else {
        $_SESSION['nombre'] = $_POST['nombre'];
    }

    // casa
    if (empty($_POST['casa'])) {
        $errores[] = "Debes seleccionar una casa";
    } else {
        $_SESSION['casa'] = $_POST['casa'];
    }

    // varita
    if (empty($_POST['varita'])) {
        $errores[] = "La varita es obligatoria";
    } else {
        $_SESSION['varita'] = $_POST['varita'];
    }

    // asignaturas
    if (empty($_POST['asignaturas'])) {
        $errores[] = "Selecciona al menos una asignatura";
    } else {
        $_SESSION['asignaturas'] = $_POST['asignaturas'];
    }

    // nivel mágico
    if (!isset($_POST['nivel']) || $_POST['nivel'] < 1 || $_POST['nivel'] > 100) {
        $errores[] = "Nivel mágico incorrecto";
    } else {
        $_SESSION['nivel'] = $_POST['nivel'];
    }

    // foto
    // Si no hay foto en sesión, validamos la subida
    if (!isset($_SESSION['foto'])) {

        // Validar que se ha subido una foto
        if ($_FILES['foto']['error'] !== 0) {
            $errores[] = "Debes subir una foto";
        } else {
            // Validar extensiones y tamaño
            $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
            $extPermitidas = ['jpg', 'jpeg', 'png', 'gif'];

            if (!in_array($ext, $extPermitidas)) {
                $errores[] = "Extensión de imagen no válida";
            }

            if ($_FILES['foto']['size'] > $_POST['tamano_maximo']) {
                $errores[] = "La imagen supera el tamaño permitido";
            }

            // Si todo OK, guardar datos de la foto en sesión
            if (empty($errores)) {

                /***
                 * GUARDAR LA FOTO EN EL SERVIDOR
                 */

                // Si no existe se crea la carpeta uploads
                if (!is_dir('uploads')) {
                    mkdir('uploads');
                }

                // Generamos el nombre final del archivo
                // nombreAprendiz_timestamp.extensión
                $nombreFinal = $_SESSION['nombre'] . '_' . time() . '.' . $ext;

                // Mover el archivo subido a la carpeta uploads
                move_uploaded_file($_FILES['foto']['tmp_name'], 'uploads/' . $nombreFinal);

                // Guardar el nombre final en sesión
                $_SESSION['foto'] = $nombreFinal;
            }
        }
    }
}

// Si se pulsa ENVIAR
if (isset($_POST['enviar']) && empty($errores)) {

    /**
     * GUARDAR EN BASE DE DATOS
     * Los datos ya están validados y se guardan en sesión ($_SESSION)
     * Se redirige a resultado.php con el id del aprendiz
     */

    header("Location: resultado.php");
    exit;
}

// Generar token
$token = generarToken();
?>

<!-- FORMULARIO HTML, pon tu nombre con h1 -->
<h1>Registro Aprendiz Hogwarts</h1>

<!-- El listado de errores si los hay -->
<?php if (!empty($errores)): ?>
    <ul>
        <?php foreach ($errores as $error): ?>
            <li><?= htmlspecialchars($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<!-- completar las opciones necesarias del formulario -->
<form action="index.php" method="POST" enctype="multipart/form-data">

    <!-- Campo oculto para el token CSRF -->
    <input type="hidden" name="token" value="<?= $token ?>">

    <p>
        <label>Nombre:</label><br>
        <input type="text" name="nombre" value="<?= $_SESSION['nombre'] ?? '' ?>">
    </p>

    <p>
        <label>Casa:</label><br>
        <select name="casa">
            <option value="">-- Selecciona --</option>
            <option value="Gryffindor">Gryffindor</option>
            <option value="Slytherin">Slytherin</option>
            <option value="Hufflepuff">Hufflepuff</option>
            <option value="Ravenclaw">Ravenclaw</option>
        </select>
    </p>

    <p>
        <label>Varita:</label><br>
        <input type="text" name="varita" value="<?= $_SESSION['varita'] ?? '' ?>">
    </p>

    <p>
        <label>Asignaturas:</label><br>
        <input type="checkbox" name="asignaturas[]" value="Hechizos"> Hechizos
        <input type="checkbox" name="asignaturas[]" value="Pociones"> Pociones
        <input type="checkbox" name="asignaturas[]" value="Defensa"> Defensa
    </p>

    <p>
        <label>Nivel mágico (1-100):</label><br>
        <input type="number" name="nivel" min="1" max="100" value="<?= $_SESSION['nivel'] ?? '' ?>">
    </p>

    <!-- Campo para subir la foto -->
    <!-- Si ya hay foto en sesión, no mostramos el campo de subida -->
    <?php if (!isset($_SESSION['foto'])): ?>
        <p>
            <label>Foto del aprendiz:</label><br>
            <input type="file" name="foto">
        </p>
    <?php endif; ?>

    <!-- Campo oculto para el tamaño máximo de la foto (2MB) -->
    <input type="hidden" name="tamano_maximo" value="2000000">

    <br>

    <!-- VALIDAR visible si:
         - NO es POST
         - O es POST con errores -->
    <?php if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !empty($errores)): ?>
        <button type="submit" name="validar">VALIDAR</button>
    <?php endif; ?>

    <!-- ENVIAR visible si:
         - ES POST
         - Y NO hay errores -->
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($errores)): ?>
        <button type="submit" name="enviar">ENVIAR</button>
    <?php endif; ?>

</form>
