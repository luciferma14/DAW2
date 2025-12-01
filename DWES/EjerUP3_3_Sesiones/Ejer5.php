<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $dinero_anterior = $_COOKIE["dinero"] ?? "Ninguno";
        $conversion_anterior = $_COOKIE["conversion"] ?? "Ninguna";
        $resultado_anterior = $_COOKIE["resultado"] ?? "Ninguno";

        $dinero = $_POST["dinero"];
        $conversion = $_POST["conversion"];
        $pesetas = 166.386;

        $_SESSION["dinero"] = $dinero;
        $_SESSION["conversion"] = $conversion;

        if ($_SESSION["conversion"] == "Euros a Pesetas") {
            $resultado = round($_SESSION["dinero"] * $pesetas, 2);
            $mensaje = "{$_SESSION['dinero']} euros son $resultado pesetas.";
        } else {
            $resultado = round($_SESSION["dinero"] / $pesetas, 2);
            $mensaje = "{$_SESSION['dinero']} pesetas son $resultado euros.";
        }

        setcookie("dinero", $_SESSION["dinero"], time() + 3600);
        setcookie("conversion", $_SESSION["conversion"], time() + 3600);
        setcookie("resultado", $mensaje, time() + 3600);

        echo "<hr><h3>Conversión actual (SESION):</h3>";
        echo "<p><strong>$mensaje</strong></p>";

        echo "<h3>Conversión anterior (COOKIE):</h3>";

        if ($dinero_anterior != "Ninguno") {
            echo "<p>Cantidad: <strong>$dinero_anterior</strong></p>";
            echo "<p>Tipo de conversión: <strong>$conversion_anterior</strong></p>";
            echo "<p>Resultado anterior: <strong>$resultado_anterior</strong></p>";
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
        <h2>Conversor Euros ↔ Pesetas</h2>

        <form method="POST">
            <label>Cantidad:</label>
            <input type="number" name="dinero" step="0.01" required><br><br>
            
            <input type="radio" name="conversion" value="Euros a Pesetas" required> Euros a Pesetas<br>
            <input type="radio" name="conversion" value="Pesetas a Euros" required> Pesetas a Euros<br><br>

            <input type="submit" name="enviar" value="Convertir">
        </form>
    </body>
</html>
