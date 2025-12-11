<?php
    session_start();

    $nombre_anterior = $_COOKIE["nombre"] ?? "Ninguno";
    $idioma_anterior = $_COOKIE["idioma"] ?? "Ninguno";
    $color_anterior = $_COOKIE["color"] ?? "Ninguno";
    $ciudad_anterior = $_COOKIE["ciudad"] ?? "Ninguna";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nombre_actual = $_POST["nombre"];
        $idioma_actual = $_POST["idioma"];
        $color_actual = $_POST["color"];
        $ciudad_actual = $_POST["ciudad"];

        $_SESSION["nombre"] = $nombre_actual;
        $_SESSION["idioma"] = $idioma_actual;
        $_SESSION["color"] = $color_actual;
        $_SESSION["ciudad"] = $ciudad_actual;

        setcookie("nombre", $nombre_actual, time() + 3600);
        setcookie("idioma", $idioma_actual, time() + 3600);
        setcookie("color", $color_actual, time() + 3600);
        setcookie("ciudad", $ciudad_actual, time() + 3600);

        echo "<h3>Datos actuales:</h3>";
        echo "Nombre: <strong>{$nombre_actual}</strong><br>";
        echo "Idioma preferente: <strong>{$idioma_actual}</strong><br>";
        echo "Color: <strong><span style='color:{$color_actual}'>{$color_actual}</span></strong><br>";
        echo "Ciudad: <strong>{$ciudad_actual}</strong><br><br>";

        echo "<h3>Datos anteriores</h3>";
        echo "Nombre: <strong>{$nombre_anterior}</strong><br>";
        echo "Idioma: <strong>{$idioma_anterior}</strong><br>";
        echo "Color favorito: <strong><span style='color:{$color_anterior}'>{$color_anterior}</span></strong><br>";
        echo "Ciudad: <strong>{$ciudad_anterior}</strong><br><br>"; 
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
        <h2>Preferencias</h2>

        <form method="post" action="">
            <label>Nombre:</label>
            <input type="text" name="nombre" id="nombre" required><br><br>

            <label>Preferencia de idioma:</label><br>
            <input type="radio" name="idioma" value="Español">Español<br>
            <input type="radio" name="idioma" value="Frances">Francés<br>
            <input type="radio" name="idioma" value="Italiano">Italiano<br>
            <input type="radio" name="idioma" value="Inglés">Inglés<br><br>

            <label>Color</label><br>
            <input type="color" name="color"><br><br>

            <label>Ciudad</label><br>
            <input type="radio" name="ciudad" value="Valencia">Valencia<br>
            <input type="radio" name="ciudad" value="Barcelona">Barcelona<br>
            <input type="radio" name="ciudad" value="Madrid">Madrid<br>
            <input type="radio" name="ciudad" value="Cuenca">Cuenca<br><br>

            <input type="submit" value="Enviar">
        </form>
    </body>
</html>