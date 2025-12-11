<?php
    session_start();

    $usuarioAnterior = isset($_COOKIE["usuario"]) ? $_COOKIE["usuario"] : "Ninguno";
    $accionAnterior = isset($_COOKIE["accion"]) ? $_COOKIE["accion"] : "Ninguna";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = trim($_POST["nombre"]);
        $accion = $_POST["accion"];

        $_SESSION["usuario"] = $nombre;
        $_SESSION["accion"] = $accion;

        setcookie("usuario", $nombre, time() + 3600);
        setcookie("accion", $accion, time() + 3600);

        echo "<h3>Resultados:</h3>";
        echo "<p><strong>Usuario actual:</strong> $nombre</p>";
        echo "<p><strong>Acción actual:</strong> $accion</p>";

        echo "<p><strong>Usuario anterior:</strong> $usuarioAnterior</p>";
        echo "<p><strong>Acción anterior:</strong> $accionAnterior</p>";

        if ($accion == "Saludo") {
            echo "<p>Hola, $nombre!</p>";
        } else {
            echo "<p>Adiós, $nombre!</p>";
        }
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
        <h2>Elegir una opción</h2>

        <form method="post">
            <label for="nombre">Introduce tu nombre:</label><br>
            <input type="text" name="nombre" id="nombre" required>
            <br><br>

            <label>Elige una opción:</label><br>
            <input type="radio" name="accion" value="Saludo" required> Saludo<br>
            <input type="radio" name="accion" value="Despedida"> Despedida<br><br>

            <input type="submit" value="Enviar">
        </form>
    </body>
</html>