<?php
    session_start();

    if ($_SESSION["rol"] != "Nominas") {
        header("Location: index.php");
        exit();
    }

    $trab = $_SESSION["trabajadores"];
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Responsable de Nóminas</title>
    </head>
    <body>

        <h1>Perfil: Responsable de Nóminas</h1>
        <h2>Lucía Ferrandis Martínez</h2>
        <hr>

        <p>Salario máximo: <?= max($trab) ?> €</p>
        <p>Salario mínimo: <?= min($trab) ?> €</p>

        <form action="logout.php" method="POST">
            <input type="submit" value="Cerrar sesión">
        </form>
    </body>
</html>
