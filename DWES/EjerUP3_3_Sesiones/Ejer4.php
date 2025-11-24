<?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Datos anteriores guardados en cookies
        $num_anterior = $_COOKIE["num"] ?? "Ninguno";
        $resultado_anterior = $_COOKIE["resultado"] ?? "Ninguno";

        // Valor actual enviado
        $num_actual = $_POST["num"];

        // Guardamos el número actual en sesión
        $_SESSION["num"] = $num_actual;

        // Cálculo usando SESIÓN
        if ($_SESSION["num"] <= 0 || $_SESSION["num"] > 31) {
            $_SESSION["resultado"] = "El día no existe";
        } else {
            if ($_SESSION["num"] <= 15) {
                $_SESSION["resultado"] = "Primera quincena. Día: {$_SESSION['num']}";
            } else {
                $_SESSION["resultado"] = "Segunda quincena. Día: {$_SESSION['num']}";
            }
        }

        // Guardar valores actuales en cookies
        setcookie("num", $_SESSION["num"], time() + 3600);
        setcookie("resultado", $_SESSION["resultado"], time() + 3600);

        echo "<h3>Datos actuales (SESION):</h3>";
        echo "Resultado: <strong>{$_SESSION['resultado']}</strong><br>";

        echo "<h3>Datos anteriores (COOKIE):</h3>";
        echo "Resultado anterior: <strong>{$resultado_anterior}</strong><br>";

        exit();
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
        <h2>Quincena del mes</h2>

        <form method="post" action="">
            <label>Día del mes:</label>
            <input type="number" name="num" required><br><br>

            <input type="submit" value="Calcular">
        </form>
    </body>
</html>
