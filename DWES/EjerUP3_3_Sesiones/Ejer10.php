<?php
    session_start();

    $correo_anterior = $_COOKIE["correo"] ?? "Ninguno";
    $publi_anterior = $_COOKIE["publi"] ?? "Ninguno";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $correo = $_POST["correo"];
        $correo2 = $_POST["correo2"];
        $publi = isset($_POST["publi"]) ? "Sí" : "No";

        // Guardar en sesión
        $_SESSION["correo_actual"] = $correo;
        $_SESSION["publi_actual"] = $publi;

        // Comprobación de coincidencia
        if ($correo != $correo2) {
            echo "<p style='color:red;'>La dirección de correo no coincide.</p>";
            echo "<form method='get'>
                    <button type='submit'>Volver</button>
                </form>";
            exit; 
        }

        // Guardar cookies
        setcookie("correo", $correo, time() + 3600);
        setcookie("publi", $publi, time() + 3600);

        // Mostrar resultados dentro de PHP
        echo "<h3>Resultado actual (SESSION)</h3>";
        echo "<p><strong>Correo:</strong> {$_SESSION['correo_actual']}</p>";
        echo "<p><strong>Acepta publicidad:</strong> {$_SESSION['publi_actual']}</p>";

        echo "<hr><h3>Resultado anterior (COOKIE)</h3>";
        echo "<p><strong>Correo anterior:</strong> {$correo_anterior}</p>";
        echo "<p><strong>Aceptaba publicidad:</strong> {$publi_anterior}</p>";

        echo "<br><form method='get'>
                <button type='submit'>Volver</button>
            </form>";

        exit;
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
    <h1>Formulario de correo</h1>

    <form method="POST">
        <label>Introduzca el correo electrónico</label><br>
        <input type="email" name="correo" placeholder="ejemplo@gmail.com" size="25" required><br><br>

        <label>Confirme el correo electrónico</label><br>
        <input type="email" name="correo2" placeholder="ejemplo@gmail.com" size="25" required><br><br>

        <input type="checkbox" name="publi"> Quiero recibir publicidad<br><br>

        <input type="submit" value="Enviar">
        <input type="reset" value="Borrar">
    </form>

    </body>
</html>
