<?php
    session_start();

    if ($_SESSION["rol"] != "Sindicalista") {
        header("Location: index.php");
        exit();
    }

    $trab = $_SESSION["trabajadores"];
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Sindicalista</title>
    </head>
    <body>
        <h1>Perfil: Sindicalista</h1>
        <h2>Lucía Ferrandis Martínez</h2>
        <hr>

        <p>Salario medio: <?= number_format(array_sum($trab)/count($trab), 2) ?> €</p>

        <form action="logout.php" method="POST">
            <input type="submit" value="Cerrar sesión">
        </form>
    </body>
</html>
