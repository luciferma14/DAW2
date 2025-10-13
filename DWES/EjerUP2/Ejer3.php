<?php
    function salMax($trab) {
        return max($trab);
    }

    function salMin($trab) {
        return min($trab);
    }

    function salMed($trab) {
        return array_sum($trab) / count($trab); // Suma todos los elementos del array --> array_sum()
    }


    $trabajadores = [];
    $num = (int)readline("Número de trabajadores: ");

    for ($i = 1; $i <= $num; $i++) {
        $nombre = readline("Nombre del trabajador $i: ");
        $salario = (float)readline("Salario de $nombre: ");
        $trabajadores[$nombre] = $salario;
    }

    echo("\nSalarios iniciales\n");
    foreach ($trabajadores as $nombre => $salario) {
        echo("$nombre: $salario €\n");
    }

    $max = salMax($trabajadores);
    $min = salMin($trabajadores);
    $media = salMed($trabajadores);

    echo("\nSalario máximo: $max €");
    echo("\nSalario mínimo: $min €");
    echo("\nSalario medio: " . round($media, 2) . " €\n");
    // Redondea un número decimal y las decimas que quieras --> round()

    $incremento = (float)readline("\nIntroduce el porcentaje de incremento salarial (%): ");

    foreach ($trabajadores as $nombre => $salario) {
        $trabajadores[$nombre] = $salario + ($salario * $incremento / 100);
    }

    echo("\nSalarios tras incremento del $incremento%\n");
    foreach ($trabajadores as $nombre => $salario) {
        echo("$nombre: " . round($salario, 2) . " €\n");
    }

    $max = salMax($trabajadores);
    $min = salMin($trabajadores);
    $media = salMed($trabajadores);

    echo("\nNuevo salario máximo: $max €");
    echo("\nNuevo salario mínimo: $min €");
    echo("\nNuevo salario medio: " . round($media, 2) . " €\n");
?>
