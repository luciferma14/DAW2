<?php
    
    $filas = 5;
    $columnas = 5;
    $matriz = [];

    for ($i = 0; $i < $filas; $i++) {
        for ($j = 0; $j < $columnas; $j++) {
            $matriz[$i][$j] = $i + $j;
        }
    }

    for ($i = 0; $i < $filas; $i++) {
        for ($j = 0; $j < $columnas; $j++) {
            echo $matriz[$i][$j] . "\t";
        }
        echo "\n";
    }

    echo "\nSuma filas:\n";
    for ($i = 0; $i < $filas; $i++) {
        $sumaFila = 0;
        for ($j = 0; $j < $columnas; $j++) {
            $sumaFila += $matriz[$i][$j];
        }
        echo "Fila $i: $sumaFila\n";
    }

    echo "\nSuma columnas:\n";
    for ($j = 0; $j < $columnas; $j++) {
        $sumaCol = 0;
        for ($i = 0; $i < $filas; $i++) {
            $sumaCol += $matriz[$i][$j];
        }
        echo "Columna $j: $sumaCol\n";
    }
?>
