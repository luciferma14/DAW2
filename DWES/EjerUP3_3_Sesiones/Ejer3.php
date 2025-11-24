<?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Datos anteriores (COOKIE)
        $num1_anterior = $_COOKIE["num1"] ?? "Ninguno";
        $num2_anterior = $_COOKIE["num2"] ?? "Ninguno";
        $operador_anterior = $_COOKIE["operador"] ?? "Ninguno";
        $resultado_anterior = $_COOKIE["resultado"] ?? "Ninguno";

        // Datos actuales del formulario
        $_SESSION["num1"] = $_POST["num1"];
        $_SESSION["num2"] = $_POST["num2"];
        $_SESSION["operador"] = $_POST["operador"];

        $n1 = $_SESSION["num1"];
        $n2 = $_SESSION["num2"];
        $op = $_SESSION["operador"];

        // Calcular usando SESIÓN (✔)
        switch($op){
            case "+":
                $_SESSION["resultado"] = $n1 + $n2;
                break;
            case "-":
                $_SESSION["resultado"] = $n1 - $n2;
                break;
            case "x":
                $_SESSION["resultado"] = $n1 * $n2;
                break;
            case "/":
                $_SESSION["resultado"] = ($n2 != 0) ? $n1 / $n2 : "Error (división por 0)";
                break;
            default:
                $_SESSION["resultado"] = "Operador no válido";
        }

        // Guardar en cookies para próxima ejecución
        setcookie("num1", $n1, time() + 3600);
        setcookie("num2", $n2, time() + 3600);
        setcookie("operador", $op, time() + 3600);
        setcookie("resultado", $_SESSION["resultado"], time() + 3600);

        echo "<h3>Datos actuales (SESION):</h3>";
        echo "Número 1: <strong>{$n1}</strong><br>";
        echo "Número 2: <strong>{$n2}</strong><br>";
        echo "Operador: <strong>{$op}</strong><br>";
        echo "Resultado: <strong>{$_SESSION['resultado']}</strong><br><br>";

        echo "<h3>Datos anteriores (COOKIE):</h3>";
        echo "Número 1: <strong>{$num1_anterior}</strong><br>";
        echo "Número 2: <strong>{$num2_anterior}</strong><br>";
        echo "Operador: <strong>{$operador_anterior}</strong><br>";
        echo "Resultado: <strong>{$resultado_anterior}</strong><br><br>";

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
        <h2>Calculadora con Sesiones</h2>

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

            <input type="submit" value="Calcular">
        </form>
    </body>
</html>
