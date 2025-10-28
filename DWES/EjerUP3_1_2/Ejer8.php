<?php

    $mensaje = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $correo = $_POST["correo"];
        $publi = $_POST["publi"];

        $mensaje = "Dirección de correo enviada: " . $correo;

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

        <form method="POST">
            <label>Introduzca el correo electrónico</label><br>
            <input type="email" name="correo" placeholder="ejemplo@gmail.com" required><br><br>
            <input type="checkbox" name="publi" value="si"> Quiero recibir publicidad<br><br>
            <input type="submit" name="enviar" value="Enviar">
            <input type="reset" name="borrar" value="Borrar">
        </form>

        <?php echo "<p style='font-weight:bold;'>$mensaje</p>" ?>
    </body>
</html>