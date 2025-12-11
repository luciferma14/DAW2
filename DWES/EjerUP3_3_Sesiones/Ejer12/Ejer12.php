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
        <p><strong>Edad:</strong> <?= $datos["edad"] ?></p>
        <p><strong>Peso:</strong> <?= $datos["peso"] ?></p>
        <p><strong>Sexo:</strong> <?= $datos["sexo"] ?></p>
        <p><strong>Estado civil:</strong> <?= $datos["estadoCivil"] ?></p>
        <p><strong>Aficiones:</strong> <?= implode(", ", $datos["aficiones"]) ?></p>

        <?php if(!empty($datos["otroEst"])): ?>
            <p><strong>Otro estado civil:</strong> <?= $datos["otroEst"] ?></p>
        <?php endif; ?>

        <form action="index.php" method="get">
            <input type="submit" value="Volver al formulario">
        </form>
    </body>
</html>
