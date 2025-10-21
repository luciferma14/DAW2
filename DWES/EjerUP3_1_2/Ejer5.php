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
            <input type="number" name="porcent"><br><br>
                
            <input type="submit" name="calcular" value="Calcular">
        </form>    


        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nombres = $_POST["nombres"];
                $salarios = $_POST["salarios"];
                $opciones = $_POST["opciones"];
                $porcent = $_POST["porcent"];

                $trabajadores = array_combine("nombres", "salarios");
                function salMax($trab) {
                    return max($trab);
                }

                function salMin($trab) {
                    return min($trab);
                }

                function salMed($trab) {
                    return array_sum($trab) / count($trab); // Suma todos los elementos del array --> array_sum()
                }


                // $trabajadores = [];
                // $num = (int)readline("Número de trabajadores: ");

                // for ($i = 1; $i <= $num; $i++) {
                //     $nombre = readline("Nombre del trabajador $i: ");
                //     $salario = (float)readline("Salario de $nombre: ");
                //     $trabajadores[$nombre] = $salario;
                // }

                // echo("\nSalarios iniciales\n");
                // foreach ($trabajadores as $nombre => $salario) {
                //     echo("$nombre: $salario €\n");
                // }

                // $max = salMax($trabajadores);
                // $min = salMin($trabajadores);
                // $media = salMed($trabajadores);

                // echo("\nSalario máximo: $max €");
                // echo("\nSalario mínimo: $min €");
                // echo("\nSalario medio: " . round($media, 2) . " €\n");
                // // Redondea un número decimal y las decimas que quieras --> round()

                // $incremento = (float)readline("\nIntroduce el porcentaje de incremento salarial (%): ");

                // foreach ($trabajadores as $nombre => $salario) {
                //     $trabajadores[$nombre] = $salario + ($salario * $incremento / 100);
                // }

                // echo("\nSalarios tras incremento del $incremento%\n");
                // foreach ($trabajadores as $nombre => $salario) {
                //     echo("$nombre: " . round($salario, 2) . " €\n");
                // }

                // $max = salMax($trabajadores);
                // $min = salMin($trabajadores);
                // $media = salMed($trabajadores);

                // echo("\nNuevo salario máximo: $max €");
                // echo("\nNuevo salario mínimo: $min €");
                // echo("\nNuevo salario medio: " . round($media, 2) . " €\n");
            }
        ?>
    </body>
</html>