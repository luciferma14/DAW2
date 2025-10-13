<?php
   
    $num = (int)readline("Introduce el tamaño de las matrices: ");

    $opc = readline("Elige la operación (s = suma, r = resta, m = multiplicación, d = división): ");

    for ($i = 0; $i < $num; $i++) {
        for ($j = 0; $j < $num; $j++) {
            $mA[$i][$j] = rand(1, 20);
            $mB[$i][$j] = rand(1, 20);
        }
    }

    for ($i = 0; $i < $num; $i++) {
        for ($j = 0; $j < $num; $j++) {
            if ($opc == 's') $mF[$i][$j] = $mA[$i][$j] + $mB[$i][$j];
            elseif ($opc == 'r') $mF[$i][$j] = $mA[$i][$j] - $mB[$i][$j];
            elseif ($opc == 'm') $mF[$i][$j] = $mA[$i][$j] * $mB[$i][$j];
            elseif ($opc == 'd') $mF[$i][$j] = ($mB[$i][$j] != 0) ? round($mA[$i][$j] / $mB[$i][$j], 2) : 0;
            else $mF[$i][$j] = 0;
        }
    }

    echo "\nMatriz A:\n";
    for ($i = 0; $i < $num; $i++) {
        for ($j = 0; $j < $num; $j++) {
            echo $mA[$i][$j] . "\t";
        }
        echo "\n";
    }

    echo "\nMatriz B:\n";
    for ($i = 0; $i < $num; $i++) {
        for ($j = 0; $j < $num; $j++) {
            echo $mB[$i][$j] . "\t";
        }
        echo "\n";
    }

    echo "\nMatriz Final:\n";
    for ($i = 0; $i < $num; $i++) {
        for ($j = 0; $j < $num; $j++) {
            echo $mF[$i][$j] . "\t";
        }
        echo "\n";
    }
?>
