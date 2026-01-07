<?php
    session_start();

    /* Generar token */
    $_SESSION["token"] = bin2hex(openssl_random_pseudo_bytes(24));
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Formulario Empresa - Lucía Ferrandis Martínez</title>
    </head>
    <body>

    <h1>Formulario de la Empresa</h1>
    <h2>Lucía Ferrandis Martínez</h2>
    <hr>

    <form action="empresa_procesar.php" method="post">

        <label>Nombre:
            <input type="text" name="usuario" required>
        </label>
        <br><br>

        <label>Rol:</label><br>
        <input type="radio" name="rol" value="Gerente" required> Gerente<br>
        <input type="radio" name="rol" value="Sindicalista"> Sindicalista<br>
        <input type="radio" name="rol" value="Nominas"> Responsable de Nóminas<br><br>

        <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">

        <input type="submit" value="Acceder">
    </form>

    </body>
</html>
