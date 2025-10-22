<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Lucía Ferrandis Martínez</title>
    </head>
    <body>
        <h2>Lucía Ferrandis Martínez</h2>
        <hr> 
        <h1>Salarios máximos, mínimos y medios</h1>

        <form method="POST">
            <label>Trabajador 1: <input type="text" name="nombres[]" required></label>
            <label>Salario: <input type="number" name="salarios[]" required></label><br><br>

            <label>Trabajador 2: <input type="text" name="nombres[]" required></label>
            <label>Salario: <input type="number" name="salarios[]" required></label><br><br>

            <label>Trabajador 3: <input type="text" name="nombres[]" required></label>
            <label>Salario: <input type="number" name="salarios[]" required></label><br><br>

            <p>¿Qué quieres calcular?</p>
            <input type="checkbox" name="opciones[]" value="max"> Salario máximo<br>
            <input type="checkbox" name="opciones[]" value="min"> Salario mínimo<br>
            <input type="checkbox" name="opciones[]" value="medio"> Salario medio<br><br>

            <p>¿Quieres aplicar un porcentaje?</p>
            <label>Porcentaje (%):</label> 
            <input type="number" name="porcent" step="0.01"><br><br>
                
            <input type="submit" name="calcular" value="Calcular">
        </form>    

        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nombres = $_POST["nombres"];
                $salarios = $_POST["salarios"];
                $opciones = $_POST["opciones"] ?? [];
                $porcent = $_POST["porcent"] ?? 0;

                $trabajadores = array_combine($nombres, $salarios);

                function salMax($trab) {
                    return max($trab);
                }

                function salMin($trab) {
                    return min($trab);
                }

                function salMed($trab) {
                    return array_sum($trab) / count($trab);
                }
                
                echo "<h3>Resultados:</h3>";

                if (in_array("max", $opciones)) {
                    echo "Salario máximo: " . salMax($trabajadores) . " €<br>";
                }
                if (in_array("min", $opciones)) {
                    echo "Salario mínimo: " . salMin($trabajadores) . " €<br>";
                }
                if (in_array("medio", $opciones)) {
                    echo "Salario medio: " . number_format(salMed($trabajadores), 2) . " €<br>";
                }

                if ($porcent != 0) {
                    echo "<h4>Aplicando un $porcent% a los salarios:</h4>";
                    foreach ($trabajadores as $nombre => $salario) {
                        $nuevo = $salario + ($salario * $porcent / 100);
                        echo "$nombre: antes = $salario €, después = " . number_format($nuevo, 2) . " €<br>";
                    }
                }
            }
        ?>
    </body>
</html>
