<?php
    session_start();

    $correcta = "1234";

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
        $_SESSION["pass_actual"] = $pass;

        $intentos++;
        setcookie("intentos", $intentos, time() + 60);

        if ($historial === "") {
            $nuevoHistorial = $pass;
        } else {
            $nuevoHistorial = $historial . "," . $pass;
        }

        setcookie("historial", $nuevoHistorial, time() + 60);
        $historial = $nuevoHistorial;

        if ($pass === $correcta) {
            $mensaje = "Contraseña correcta";

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
        <title>Lucía Ferrandis</title>
    </head>
    <body>
        <h1>Lucía Ferrandis Martínez</h1>
        <hr>
        <h2>Caja fuerte</h2>

        <form method="POST">
            <label>Contraseña:</label>
            <input type="text" name="pass" maxlength="4" required>
            <button type="submit">Enviar</button>
        </form>

        <p><?php echo $mensaje; ?></p>

        <p><b>Contraseña correcta:</b> <?php echo $correcta; ?></p>

        <p><b>Contraseñas introducidas:</b> <?php echo $historial; ?></p>

        <p><b>Intentos:</b> <?php echo $intentos; ?></p>

        <p><b>Última contraseña (SESSION):</b> 
            <?php echo $_SESSION["pass_actual"] ?? "Ninguna"; ?>
        </p>

        <p><b>Resultado (SESSION):</b> 
            <?php echo $_SESSION["resultado"] ?? "Ninguno"; ?>
        </p>
    </body>
</html>
