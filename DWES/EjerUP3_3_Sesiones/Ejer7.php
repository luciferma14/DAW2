<?php
    session_start();

    $correcta = "1234";

    // Inicializar cookies si no existen
    if (!isset($_COOKIE["intentos"])) {
        setcookie("intentos", 0, time() + 60);
        $intentos = 0;
    } else {
        $intentos = $_COOKIE["intentos"];
    }

    if (!isset($_COOKIE["historial"])) {
        setcookie("historial", "", time() + 60);
        $historial = "";
    } else {
        $historial = $_COOKIE["historial"];
    }

    $mensaje = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $pass = $_POST["pass"];
        $_SESSION["pass_actual"] = $pass;  // Guardamos contraseña actual en sesión

        // Actualizar intentos
        $intentos++;
        setcookie("intentos", $intentos, time() + 60);

        // Actualizar historial
        if ($historial === "") {
            $nuevoHistorial = $pass;
        } else {
            $nuevoHistorial = $historial . "," . $pass;
        }

        setcookie("historial", $nuevoHistorial, time() + 60);
        $historial = $nuevoHistorial;

        // Comprobar contraseña
        if ($pass === $correcta) {
            $mensaje = "Contraseña correcta";

            // Reiniciar historial e intentos
            setcookie("intentos", 0, time() + 60);
            setcookie("historial", "", time() + 60);

            $intentos = 0;
            $historial = "";

            $_SESSION["resultado"] = "ACIERTO";

        } else {
            $mensaje = "Contraseña incorrecta";
            $_SESSION["resultado"] = "FALLO";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Caja fuerte</title>
    </head>
    <body>

    <h2>Caja fuerte</h2>

    <form method="POST">
        <label>Contraseña:</label>
        <input type="text" name="pass" maxlength="4" required>
        <button type="submit">Enviar</button>
    </form>

    <hr>

    <p><?php echo $mensaje; ?></p>

    <p><b>Contraseña correcta:</b> <?php echo $correcta; ?></p>

    <p><b>Contraseñas introducidas:</b> <?php echo $historial; ?></p>

    <p><b>Intentos:</b> <?php echo $intentos; ?></p>

    <hr>

    <p><b>Última contraseña (SESSION):</b> 
        <?php echo $_SESSION["pass_actual"] ?? "Ninguna"; ?>
    </p>

    <p><b>Resultado (SESSION):</b> 
        <?php echo $_SESSION["resultado"] ?? "Ninguno"; ?>
    </p>

    </body>
</html>
