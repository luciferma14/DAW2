<?php

// Iniciamos la sesión (según UP33 - sesiones)
session_start();

// Incluimos las funciones de validación
require_once 'validaciones.php';

// Leemos el archivo users.json y lo decodificamos a array asociativo (según UP5 JSON)
$contenidoJson = file_get_contents('users.json');
$usuarios = json_decode($contenidoJson, true);

// Extraemos solo los nombres con array_column para tener la lista de usuarios autorizados
$listaUsuarios = array_column($usuarios, 'name');

// Guardamos la lista de usuarios autorizados en la sesión
$_SESSION['listaUsuarios'] = $listaUsuarios;

// Array para almacenar errores
$errores = [];

// Recogemos el nombre enviado por POST (si existe), si no, lo cogemos de la sesión
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : ($_SESSION['nombreValidado'] ?? '');

// Comprobamos si la petición es POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // ============================
    // BOTÓN VALIDAR
    // ============================
    if (isset($_POST['validar'])) {

        // Recogemos el nombre del formulario
        $nombre = $_POST['nombre'];

        // Validamos que el campo no esté vacío (validaRequerido de validaciones.php)
        if (!validaRequerido($nombre)) {
            $errores[] = "El nombre es obligatorio";
        }

        // Validamos que solo tenga letras del alfabeto (validaAlfabeto de validaciones.php)
        // Usamos trim por si tiene espacios al principio o al final
        // Nota: validaAlfabeto usa ctype_alpha que no acepta espacios,
        // así que quitamos espacios antes de validar
        $nombreSinEspacios = str_replace(' ', '', trim($nombre));
        if (validaRequerido($nombre) && !validaAlfabeto($nombreSinEspacios)) {
            $errores[] = "El nombre solo puede contener letras";
        }

        // Si no hay errores, guardamos el nombre en la sesión como validado
        if (empty($errores)) {
            $_SESSION['nombreValidado'] = $nombre;
        }
    }

    // ============================
    // BOTÓN ACCEDER
    // ============================
    if (isset($_POST['acceder'])) {

        // Recuperamos el nombre guardado en sesión
        $nombreSesion = $_SESSION['nombreValidado'] ?? '';

        // Comprobamos si el nombre está en la lista de usuarios autorizados
        if (in_array($nombreSesion, $_SESSION['listaUsuarios'])) {
            // Si está autorizado, guardamos auth = true y redirigimos a index.php
            $_SESSION['auth'] = true;
            $_SESSION['nombre'] = $nombreSesion;
            header("Location: index.php");
            exit;
        } else {
            // Si NO está autorizado, destruimos la sesión y mostramos error
            session_destroy();
            session_start();
            $nombre = '';
            $errores[] = "Usuario no autorizado";
        }
    }
}
?>
<!-- El título incluye mi nombre como pide el enunciado -->
<h1>Acceso a la API de Star Wars - Silvia</h1>

<!-- Mostramos errores en lista roja recorriendo el array $errores -->
<?php if (!empty($errores)): ?>
    <ul style="color: red;">
        <?php foreach ($errores as $error): ?>
            <li><?php echo $error; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form action="login.php" method="POST">

    <label>Nombre:</label>

    <!-- Rellenamos el campo con el nombre validado o recuperado de sesión -->
    <input type="text" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>">

    <br><br>

    <!-- Mostramos el botón VALIDAR si no se ha validado o hay errores -->
    <?php if (!isset($_SESSION['nombreValidado']) || !empty($errores)): ?>
        <input type="submit" name="validar" value="Validar">
    <?php endif; ?>

    <!-- Mostramos el botón ACCEDER solo si el nombre ya se ha validado correctamente -->
    <?php if (isset($_SESSION['nombreValidado']) && empty($errores)): ?>
        <input type="submit" name="acceder" value="Acceder">
    <?php endif; ?>

</form>
