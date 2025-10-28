<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $curso = $_POST["curso"] ?? "";
        $modulos = $_POST["modulos"] ?? [];
        $horas = $_POST["horas"] ?? [];

        if (!empty($curso) && !empty($modulos) && !empty($horas)) {
            echo "<h2>Horario generado</h2>";
            echo "<table border='1' cellpadding='8'>";
            echo "<tr><th>Curso</th><th>Módulo</th><th>Hora</th></tr>";
            echo "<tr>";
            echo "<td>$curso</td>";
            echo "<td>" . implode(" // ", $modulos) . "</td>";
            echo "<td>" . implode(" // ", $horas) . "</td>";
            echo "</tr>";
         

            echo "</table>";
        } else {
            echo "<p style='color:red;'>Por favor, selecciona todas las opciones.</p>";
        }

    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Lucía Ferrandis Martínez</title>
    </head>
    <body>

        <h2>Lucía Ferrandis Martínez</h2>
        <hr> 
        <h1>Genera horario</h1>

        <form method="POST">
            <label>Selecciona el curso</label><br>
            <input type="radio" name="curso" value="Curso 1">Curso 1<br>
            <input type="radio" name="curso" value="Curso 2">Curso 2<br><br>
            <label>Selecciona los módulos </label><br>
            <select name="modulos[]" multiple>
                <option value="DWES">DWES</option>
                <option value="Digitalización">Digitalización</option>
                <option value="Diseño interfaces">Diseño interfaces</option>
            </select><br><br>
            <label>Selecciona las horas</label><br>
            <input type="checkbox" name="horas[]" value="14:10 - 16:00"> 14:10 - 16:00<br>
            <input type="checkbox" name="horas[]" value="16:00 - 18:05"> 16:00 - 18:05<br>
            <input type="checkbox" name="horas[]" value="18:05 - 20:00"> 18:05 - 20:00<br><br>

            <input type="submit" name="generar" value="Generar">
        </form>
    </body>
</html>