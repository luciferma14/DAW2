<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Lucía Ferrandis Martínez</title>
    </head>
    <body>

        <h1>Formulario de clase</h1>
        <h2>Lucía Ferrandis Martínez</h2>
        <hr>

        <form method="POST" action="procesar_login.php">

            <label>Nombre:
                <input type="text" name="nombre" required>
            </label><br><br>
            <label>Apellido:
                <input type="text" name="apellido" required>
            </label><br><br>
            <label>Asignatura:
                <input type="text" name="asignatura" required>
            </label><br><br>
            <label>Grupo:
                <input type="text" name="grupo" required>
            </label><br><br>

            <label>Edad:</label><br>
            <select name="edad">
                <option value="mayor">Mayor de edad</option>
                <option value="menor">Menor de edad</option>
            </select><br><br>

            <label>Cargo:</label><br>
            <input type="radio" name="cargo" value="Sin cargo" required> Sin cargo<br>
            <input type="radio" name="cargo" value="Con cargo" required> Con cargo<br><br>

            <input type="submit" value="Acceder">
        </form>
    </body>
</html>