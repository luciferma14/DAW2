<?php
    session_start();

    if (isset($_SESSION["rol"])) {
        header("Location: procesar_login.php");
        exit();
    }
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

            <label>Perfil:</label><br>
            <input type="radio" name="rol" value="Delegado" required> Delegado<br>
            <input type="radio" name="rol" value="Estudiante" required> Estudiante<br>
            <input type="radio" name="rol" value="Profesor" required> Profesor<br>
            <input type="radio" name="rol" value="Director" required> Director<br><br>

            <label>Edad:</label><br>
            <select name="edad">
                <option value="Mayor de edad">Mayor de edad</option>
                <option value="Menor de edad">Menor de edad</option>
            </select><br><br>

            <label>Cargo:</label><br>
            <input type="radio" name="cargo" value="Sin cargo" required> Sin cargo<br>
            <input type="radio" name="cargo" value="Con cargo" required> Con cargo<br><br>

            <input type="submit" value="Acceder">
        </form>
    </body>
</html>