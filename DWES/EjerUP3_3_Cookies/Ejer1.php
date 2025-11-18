<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $usuario_anterior = $_COOKIE["usuario"] ?? "Ninguno";
        $accion_anterior = $_COOKIE["accion"] ?? "Ninguna";

        $usuario_actual = $_POST["nombre"];
        $accion_actual = $_POST["accion"];

        setcookie("usuario", $usuario_actual, time() + 3600);
        setcookie("accion", $accion_actual, time() + 3600);

        echo "<h3>Valores actuales:</h3>";
        echo "Usuario actual: <strong>$usuario_actual</strong><br>";
        echo "Acción actual: <strong>$accion_actual</strong><br><br>";

        echo "<h3>Valores anteriores (guardados en cookie):</h3>";
        echo "Usuario anterior: <strong>$usuario_anterior</strong><br>";
        echo "Acción anterior: <strong>$accion_anterior</strong><br>";

        if ($accion_actual == "saludo") {
            echo "<p>¡Hola, $usuario_actual!</p>";
        } else {
            echo "<p>¡Adiós, $usuario_actual!</p>";
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
        <h2>Lucía Ferrandis Martínez</h1>
        <hr>
        <h2>Formulario de saludo o despedida</h2>

        <form method="post" action="">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required><br><br>

            <label>Elige una opción:</label><br>
            <input type="radio" name="accion" value="saludo" required> Saludo<br>
            <input type="radio" name="accion" value="despedida"> Despedida<br><br>

            <input type="submit" value="Enviar">
        </form>
    </body>
</html>
