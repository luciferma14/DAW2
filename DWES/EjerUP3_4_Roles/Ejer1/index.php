<?php
    session_start();

    if (isset($_SESSION["rol"])) {
        header("Location: procesar_login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Lucía Ferrandis Martínez</title>
    </head>
    <body>

        <h1>Formulario de la Empresa</h1>
        <h2>Lucía Ferrandis Martínez</h2>
        <hr>

        <form method="POST" action="procesar_login.php">

            <label>Nombre usuario:
                <input type="text" name="usuario" required>
            </label>
            <br><br>

            <label>Perfil:</label><br>
            <input type="radio" name="rol" value="Gerente" required> Gerente<br>
            <input type="radio" name="rol" value="Sindicalista"> Sindicalista<br>
            <input type="radio" name="rol" value="Nominas"> Responsable de Nóminas<br><br>

            <h3>Empleados</h3>

            <?php for ($i = 1; $i <= 3; $i++): ?>
                Trabajador <?= $i ?>:
                <input type="text" name="nombres[]" required>
                Salario:
                <input type="number" name="salarios[]" required>
                <br><br>
            <?php endfor; ?>

            <input type="submit" value="Acceder">
        </form>
    </body>
</html>
