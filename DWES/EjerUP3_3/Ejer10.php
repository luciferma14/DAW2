
<?php
    $correo_anterior = $_COOKIE["correo"] ?? "Ninguno";
    $publi_anterior = $_COOKIE["publi"] ?? "Ninguno";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $correo = $_POST["correo"];
        $correo2 = $_POST["correo2"];
        $publi = isset($_POST["publi"]) ? "Sí" : "No";

        if ($correo != $correo2) {
            echo "<p style='color:red;'>La dirección de correo no coincide.</p>";
            echo "<form action='Ejer10.php' method='get'>
                    <button type='submit'>Volver</button>
                </form>";
            exit; 
        }

        setcookie("correo", $correo, time() + 3600);
        setcookie("publi", $publi, time() + 3600);

        echo "<h3>Resultado actual</h3>";
        echo "<p><strong>Correo:</strong> $correo</p>";
        echo "<p><strong>Acepta publicidad:</strong> $publi</p>";

        echo "<hr><h3>Resultado anterior (Cookie)</h3>";
        echo "<p><strong>Correo anterior:</strong> $correo_anterior</p>";
        echo "<p><strong>Aceptaba publicidad:</strong> $publi_anterior</p>";

        echo "<br><form action='Ejer10.php' method='get'>
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
        <h1>Formulario</h1>

        <form method="POST" action="Ejer10.php">
            <label>Introduzca el correo electrónico</label><br>
            <input type="email" name="correo" placeholder="ejemplo@gmail.com" size="25" required><br><br>

            <label>Confirme el correo electrónico</label><br>
            <input type="email" name="correo2" placeholder="ejemplo@gmail.com" size="25" required><br><br>

            <input type="checkbox" name="publi"> Quiero recibir publicidad<br><br>

            <input type="submit" name="enviar" value="Enviar">
            <input type="reset" name="borrar" value="Borrar">
        </form>
    </body>
</html>