<?php
    $nombreFoto = time() . "_" . $_FILES['foto']['name'];
    $ruta = "imagenesSubidas/" . $nombreFoto;

    move_uploaded_file($_FILES['foto']['tmp_name'], $ruta);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Resultado</title>
    </head>
    <body>

        <h2>Formulario procesado con éxito</h2>

        <p><b>Nombre:</b> <?= $_POST['nombre'] ?></p>
        <p><b>Estudios:</b> <?= $_POST['estudios'] ?></p>
        <p><b>Nacionalidad:</b> <?= $_POST['nacionalidad'] ?></p>
        <p><b>Email:</b> <?= $_POST['email'] ?></p>
        <p><b>Idiomas:</b> <?= implode(', ', $_POST['idiomas']) ?></p>

        <p><b>Imagen:</b></p>
        <img src="<?= $ruta ?>" width="200"><br><br>

        <form action="index.php">
        <input type="submit" value="Volver">
        </form>

    </body>
</html>
