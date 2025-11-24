<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Tabla anterior guardada en cookie
        $tabla_anterior = $_COOKIE["mensa"] ?? "Ninguna";

        // Número actual enviado por el formulario
        $num = $_POST["num"];

        // Guardamos el número actual en sesión
        $_SESSION["num"] = $num;

        echo "<hr><h3>Tabla actual (SESION):</h3>";

        $tabla_completa = "";

        for ($i = 1; $i <= 10; $i++){
            $resultado = $_SESSION["num"] * $i; // ✔ SESIÓN USADA CORRECTAMENTE
            $mensaje = "$_SESSION[num] x $i = $resultado";

            echo "<p><strong>$mensaje</strong></p>";

            // Guardamos la tabla para la cookie
            $tabla_completa .= "<p>$mensaje</p>";
        }

        // Guardamos valores en cookies para la próxima ejecución
        setcookie("num", $num, time() + 3600);
        setcookie("mensa", $tabla_completa, time() + 3600);

        echo "<h3>Tabla anterior (COOKIE):</h3>";

        if ($tabla_anterior != "Ninguna") {
            echo $tabla_anterior; // ✔ Mostramos HTML tal cual
        } else {
            echo "<p>No hay datos anteriores guardados.</p>";
        }
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
        <h1>Tabla de multiplicar</h1>

        <form method="POST">
            <label>Número a multiplicar:</label>
            <input type="number" name="num" required><br><br>
            
            <input type="submit" name="enviar" value="Generar tabla">
        </form>
    </body>
</html>
