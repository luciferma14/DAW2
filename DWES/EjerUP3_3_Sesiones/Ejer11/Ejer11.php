<?php
    session_start();

    if (!isset($_SESSION["datos"])) {
        header("Location: index.php");
        exit;
    }

    $datos = $_SESSION["datos"];
    session_unset();
    session_destroy();
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Datos introducidos</title>
    </head>
    <body>

    <h2>Datos introducidos</h2>
    <hr>
    <p><strong>Nombre:</strong> <?= htmlspecialchars($datos["nombre"]) ?></p>
    <p><strong>Apellidos:</strong> <?= htmlspecialchars($datos["apellidos"]) ?></p>
    <p><strong>Correo:</strong> <?= htmlspecialchars($datos["correo"]) ?></p>
    <p><strong>Nivel de estudios:</strong> <?= htmlspecialchars($datos["estudios"]) ?></p>
    <p><strong>Situación actual:</strong> <?= implode(", ", $datos["situacion"]) ?></p>
    <p><strong>Hobbies:</strong> <?= implode(", ", $datos["hobbies"]) ?></p>
    <?php if (!empty($datos["otroHbb"])): ?>
    <p><strong>Otro hobby:</strong> <?= htmlspecialchars($datos["otroHbb"]) ?></p>
    <?php endif; ?>

    <form action="index.php" method="get">
        <input type="submit" value="Volver al formulario">
    </form>

    </body>
</html>
