<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> 
    <title>Datos procesados</title>
</head>
    <body>
        <h2>Lucía Ferrandis Martínez</h2>
        <hr>
        <h1 style="color: green">Formulario procesado con éxito!!</h1>
        <p><strong>Nombre:</strong> <?=$_POST['nombre']?></p>
        <p><strong>Estudios:</strong> <?= $_POST['estudios']?></p>
        <p><strong>Nacionalidad:</strong> <?= $_POST['nacionalidad']?></p>
        <p><strong>Idiomas:</strong> <?= implode(", ",$_POST['idiomas']) ?></p>
        <p><strong>Email:</strong> <?= $_POST['email'] ?></p>
        <p><strong>Foto subida:</strong></p>
        <img src="<?= $_FILES['foto']?>" width="120"><br><br>

        <form action="index.php" method="get">
            <input type="submit" value="Volver al formulario">
        </form>
    </body>
</html>
