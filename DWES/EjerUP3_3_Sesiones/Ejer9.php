<?php
    session_start();

    $zona_anterior = $_COOKIE["zona_anterior"] ?? "No guardada";
    $hora_anterior = $_COOKIE["hora_anterior"] ?? "No guardada";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $zona = $_POST["zona"] ?? "";

        // Guardar zona en sesión
        $_SESSION["zona_actual"] = $zona;

        // Establecer zona horaria y obtener hora actual
        date_default_timezone_set($zona);
        $hora_actual = date("H:i:s");

        // Guardar cookies
        setcookie("zona_anterior", $zona, time() + 3600);
        setcookie("hora_anterior", $hora_actual, time() + 3600);

        // Guardar hora en sesión
        $_SESSION["hora_actual"] = $hora_actual;

        // Mostrar resultados dentro del mismo PHP
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
        <title>Lucía Ferrandis Martínez</title>
    </head>
    <body>

    <h2>Lucía Ferrandis Martínez</h2>
    <hr>
    <h1>Zona Horaria</h1>

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
