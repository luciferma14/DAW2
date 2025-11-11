<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $num1_anterior = $_COOKIE["num1"] ?? "Ninguno";
        $num2_anterior = $_COOKIE["num2"] ?? "Ninguno";
        $operador_anterior = $_COOKIE["operador"] ?? "Ninguno";

        $num1_actual = $_POST["num1"];
        $num2_actual = $_POST["num2"];
        $operador_actual = $_POST["operador"];
        $resultado = $_POST["resultado"];

        switch($operador_actual){
            case "+":
                $resultado = $num1_actual + $num2_actual;
            break;
        }

        setcookie("num1", $num1_actual, time() + 3600);
        setcookie("num2", $num2_actual, time() + 3600);
        setcookie("operador", $operador_actual, time() + 3600);
        setcookie("resultado", $resultado, time() + 3600);


        echo "<h3>Datos actuales:</h3>";
        echo "Número 1: <strong>{$num1_actual}</strong><br>";
        echo "Número 2: <strong>{$num2_actual}</strong><br>";
        echo "Operador: <strong>{$operador_actual}</strong><br>";
        echo "Resultado: <strong>{$resultado}</strong><br><br>";

        echo "<h3>Datos anteriores</h3>";
        echo "Número 1: <strong>{$num1_anterior}</strong><br>";
        echo "Número 2: <strong>{$num2_anterior}</strong><br>";
        echo "Operador: <strong>{$operador_anterior}</strong><br><br>";
        echo "Resultado: <strong>{$resultado}</strong><br><br>";
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
        <h2>Preferencias</h2>

        <form method="post" action="">
            <label>Número 1:</label>
            <input type="number" name="num1" required><br>
            <label>Número 2:</label>
            <input type="number" name="num2" required><br><br>

            <label>Operador:</label>
            <select name="operador">
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="x">x</option>
                <option value="/">/</option>
            </select><br><br>

            <p name="resultado"></p>

            <input type="submit" value="Enviar">
        </form>
    </body>
</html>