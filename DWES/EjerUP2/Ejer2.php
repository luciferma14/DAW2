<?php
    function permu($vec2) {

        $tam = count($vec2);

        for ($i = 0; $i < $tam / 2; $i++) {
            $temp = $vec2[$i];
            $vec2[$i] = $vec2[$tam - 1 - $i];
            $vec2[$tam - 1 - $i] = $temp;
        }
        return $vec2;
    }

    $tamanyo = readline("Tamaño del vector: ");

    $vec = [];

    for($i = 1; $i <= $tamanyo; $i++){
        $valor = readline("Número de la posición $i: ");
        $vec[] = $valor;
    }

    $resul = permu($vec);

    echo($resul);

?>
