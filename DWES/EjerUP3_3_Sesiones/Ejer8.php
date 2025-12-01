<?php
    session_start();

    $numeros_anteriores = $_COOKIE["numeros"] ?? "Ningunos";
    $calculo_anterior = $_COOKIE["calculo"] ?? "Ninguno";
    $resultado_anterior = $_COOKIE["resultado"] ?? "Ninguno";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $_SESSION["numeros"] = $_POST["numeros"] ?? "";
        $_SESSION["calculo"] = $_POST["calculo"] ?? [];
        $_SESSION["resultado"] = $_POST["resultado"] ?? "";

        setcookie("numeros", $_SESSION["numeros"], time() + 3600);
        setcookie("calculo", implode(", ", $_SESSION["calculo"]), time() + 3600);
        setcookie("resultado", $_SESSION["resultado"], time() + 3600);

        echo "<h3>Cálculo actual (SESSION):</h3>";
        echo "<p><strong>Números:</strong> " . $_SESSION["numeros"] . "</p>";
        echo "<p><strong>Cálculos:</strong> " . implode(', ', $_SESSION["calculo"]) . "</p>";
        echo "<p><strong>Resultado:</strong> " . $_SESSION["resultado"] . "</p>";

        echo "<h3>Cálculo anterior (COOKIES):</h3>";

        if ($numeros_anteriores !== "Ningunos") {
            echo "<p><strong>Números anteriores:</strong> $numeros_anteriores</p>";
            echo "<p><strong>Cálculo anterior:</strong> $calculo_anterior</p>";
            echo "<p><strong>Resultado anterior:</strong> $resultado_anterior</p>";
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
        <h1>Lucía Ferrandis Martínez</h1>
        <hr>
        <h2>Cálculo de Media, Mediana y Moda</h2>

        <form method="POST">
            <label>Introduce números separados por comas:</label><br>
            <input type="text" name="numeros" required><br><br>
            
            <input type="checkbox" name="calculo[]" value="Media"> Media<br>
            <input type="checkbox" name="calculo[]" value="Mediana"> Mediana<br>
            <input type="checkbox" name="calculo[]" value="Moda"> Moda<br><br>

            <input type="submit" value="Calcular">
        </form>
    </body>
</html>