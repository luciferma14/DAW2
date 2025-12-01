<?php
    session_start();

    if (!isset($_SESSION["datos"])) {
        header("Location: index.php");
    }

    $datos = $_SESSION["datos"];
    session_unset();
    session_destroy();
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
        <h2>Datos introducidos</h2>
        
        <p><strong>Nombre:</strong> <?= $datos["nombre"] ?></p>
        <p><strong>Apellidos:</strong> <?= $datos["apellidos"] ?></p>
        <p><strong>Correo:</strong> <?= $datos["correo"] ?></p>
        <p><strong>Nivel de estudios:</strong> <?= $datos["estudios"] ?></p>
        <p><strong>Situación actual:</strong> <?= implode(", ", $datos["situacion"]) ?></p>
        <p><strong>Hobbies:</strong> <?= implode(", ", $datos["hobbies"]) ?></p>
        <?php if (!empty($datos["otroHbb"])): ?>
        <p><strong>Otro hobby:</strong> <?= $datos["otroHbb"] ?></p>
        <?php endif; ?>

        <form action="index.php" method="get">
            <input type="submit" value="Volver al formulario">
        </form>
    </body>
</html>
