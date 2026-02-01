<?php
    //session_start();

    //if (!hash_equals($_SESSION['token'], $_GET['token'])) {
        //die("Token incorrecto");
    //}

    //session_destroy();
    //header("Location: alumno.php");
//?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> 
    <title>Datos procesados</title>
</head>
    <body>
        <h2>Lucía Ferrandis Martínez</h2>
        <hr>
        <h1 style="color: blue">Formulario procesado con éxito!!</h1>
        <p><strong>Usuario:</strong> <?=$_POST['usuario']?></p>
        <p><strong>Nombre:</strong> <?= $_POST['nombre']?></p>
        <p><strong>Email:</strong> <?= $_POST['email'] ?></p>
        <p><strong>Dirección:</strong> <?= $_POST['direccion']?></p>
        <p><strong>Código Postal:</strong> <?= $_POST['codPost']?></p>
        <p><strong>Rol:</strong> <?= $_POST['rol']?></p>
        <p><strong>Tipo de alojamiento:</strong> <?= $_POST['alojamiento']?></p>
        <p><strong>Preferencia de servicios:</strong> <?= $_POST['servicios']?></p>
        <p><strong>Foto subida:</strong></p>
        <img src="<?= $_FILES['foto']?>" width="120"><br><br>

        <form action="alumno.php" method="get">
            <input type="submit" value="Volver al formulario">
        </form>
    </body>
</html>
