<?php
    function generarArray($tam, $min, $max) {
        $array = [];
        for ($i = 0; $i < $tam; $i++) {
            $array[] = rand($min, $max);
        }
        return $array;
    }

    function calCuadrados($numeros) {
        $cuadrados = [];
        foreach ($numeros as $n) {
            $cuadrados[] = $n ** 2;
        }
        return $cuadrados;
    }

    function calCubos($numeros) {
        $cubos = [];
        foreach ($numeros as $n) {
            $cubos[] = $n ** 3;
        }
        return $cubos;
    }

    function mostrarArrays($numeros, $cuadrados, $cubos) {
        echo "Número    2       3\n";
        echo "-----------------------\n";
        for ($i = 0; $i < count($numeros); $i++) {
            echo $numeros[$i] . "\t" . $cuadrados[$i] . "\t" . $cubos[$i] . "\n";
        }
    }
    
    $tamano = 20;
    $numeros = generarArray($tamano, 0, 100);
    $cuadrados = calCuadrados($numeros);
    $cubos = calCubos($numeros);

    mostrarArrays($numeros, $cuadrados, $cubos);
?>
