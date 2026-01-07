<?php
    session_start();

    $_SESSION["token"] = bin2hex(openssl_random_pseudo_bytes(24));
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Formulario Centro - Lucía Ferrandis Martínez</title>
    </head>
    <body>

    <h1>Formulario Centro Educativo</h1>
    <h2>Lucía Ferrandis Martínez</h2>
    <hr>

    <form action="centro_procesar.php" method="post">

        <label>Nombre:
            <input type="text" name="usuario" required>
        </label>
        <br><br>

        <label>Rol:</label><br>
        <input type="radio" name="rol" value="Delegado" required> Delegado<br>
        <input type="radio" name="rol" value="Estudiante"> Estudiante<br>
        <input type="radio" name="rol" value="Profesor"> Profesor<br>
        <input type="radio" name="rol" value="Director"> Director<br><br>

        <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">

        <input type="submit" value="Acceder">
    </form>

    </body>
</html>
