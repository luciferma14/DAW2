<?php
    session_start();

    $zona_anterior = $_COOKIE["zona_anterior"] ?? "No guardada";
    $hora_anterior = $_COOKIE["hora_anterior"] ?? "No guardada";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $zona = $_POST["zona"] ?? "";

        $_SESSION["zona_actual"] = $zona;

        date_default_timezone_set($zona);
        $hora_actual = date("H:i:s");

        setcookie("zona_anterior", $zona, time() + 3600);
        setcookie("hora_anterior", $hora_actual, time() + 3600);

        $_SESSION["hora_actual"] = $hora_actual;

        echo "<hr>";
        echo "<h3>Ejecución actual (SESSION):</h3>";
        echo "<p><strong>Zona horaria:</strong> {$_SESSION['zona_actual']}</p>";
        echo "<p><strong>Hora actual:</strong> {$_SESSION['hora_actual']}</p>";

        echo "<h3>Ejecución anterior (COOKIES):</h3>";
        echo "<p><strong>Zona guardada:</strong> {$zona_anterior}</p>";
        echo "<p><strong>Hora guardada:</strong> {$hora_anterior}</p>";
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Lucía Ferrandis</title>
    </head>
    <body>
        <h1>Lucía Ferrandis Martínez</h1>
        <hr>
        <h2>Zona Horaria</h2>

        <form method="POST">
            <label>Elige una zona horaria:</label><br>
            <select name="zona" required>
                <option value="Europe/Madrid">Europa / Madrid</option>
                <option value="Europe/London">Europa / Londres</option>
                <option value="America/New_York">América / Nueva York</option>
                <option value="America/Mexico_City">América / México</option>
                <option value="Asia/Tokyo">Asia / Tokio</option>
            </select><br><br>

            <input type="submit" value="Ver hora">
        </form>
    </body>
</html>
