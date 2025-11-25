<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $tabla_anterior = $_COOKIE["mensa"] ?? "Ninguna";

        $num = $_POST["num"];

        $_SESSION["num"] = $num;

        echo "<hr><h3>Tabla actual (SESION):</h3>";

        $tabla_completa = "";

        for ($i = 1; $i <= 10; $i++){
            $resultado = $_SESSION["num"] * $i;
            $mensaje = "$_SESSION[num] x $i = $resultado";

            echo "<p><strong>$mensaje</strong></p>";

            $tabla_completa .= "<p>$mensaje</p>";
        }

        setcookie("num", $num, time() + 3600);
        setcookie("mensa", $tabla_completa, time() + 3600);

        echo "<h3>Tabla anterior (COOKIE):</h3>";

        if ($tabla_anterior != "Ninguna") {
            echo $tabla_anterior;
        } else {
            echo "<p>No hay datos anteriores guardados.</p>";
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
        <h2>Lucía Ferrandis Martínez</h2>
        <hr>
        <h1>Tabla de multiplicar</h1>

        <form method="POST">
            <label>Número a multiplicar:</label>
            <input type="number" name="num" required><br><br>
            
            <input type="submit" name="enviar" value="Generar tabla">
        </form>
    </body>
</html>
