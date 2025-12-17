<?php
    session_start();
    
    $nombre   = $_SESSION["nombre"]   ?? "";
    $apellido = $_SESSION["apellido"] ?? "";
    $asignatura   = $_SESSION["asignatura"]   ?? "";
    $grupo = $_SESSION["grupo"] ?? "";
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Director</title>
    </head>
    <body>

        <h1>Lucía Ferrandis Martínez</h1>
        <h2>Perfil: Director</h2>
        <hr>

        <h3>
            <?php echo "Nombre: " . $nombre . " " . $apellido; ?>
        </h3>

        <h3>
            <?php echo "Asignatura: " . $asignatura; ?>
        </h3>

        <h3>
            <?php echo "Grupo: " . $grupo; ?>
        </h3>

        <form action="logout.php" method="POST">
            <input type="submit" value="Cerrar sesión">
        </form>
    </body>
</html>
