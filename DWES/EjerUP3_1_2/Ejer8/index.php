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

        <form method="POST" action="Ejer8.php">
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