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
        <h2>Formulario procesado con éxito</h2>

        <p><strong>Nombre:</strong> <?= $datos["nombre"] ?></p>
        <p><strong>Estudios:</strong> <?= $datos["estudios"] ?></p>
        <p><strong>Nacionalidad:</strong> <?= $datos["nacionalidad"] ?></p>
        <p><strong>Idiomas:</strong> <?= implode(", ", $datos["idiomas"]) ?></p>
        <p><strong>Email:</strong> <?= $datos["email"] ?></p>

        <p><strong>Foto subida:</strong></p>
        <p>Nombre: <?= $datos["foto"]["nombre"] ?></p>
        <p>Extensión: <?= $datos["foto"]["extension"] ?></p>
        <p>Tamaño: <?= $datos["foto"]["tamano"] ?> bytes</p>
        <img src="<?= $datos["foto"]["ruta"] ?>" width="120"><br><br>

        <form action="index.php" method="get">
            <input type="submit" value="Volver al formulario">
        </form>
    </body>
</html>
