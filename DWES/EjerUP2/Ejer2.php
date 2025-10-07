<?php

function perma($vec2){

    $tam = count($vec2);
    $pos = 0;
    for($i = 1; $i < $tam; $i++){

        $tam = count($vec2);
        
        $vec2[$tam-$i] = $vec2[$pos];
        $pos++;
    }

    echo "<pre>";
    print_r($vec2);
    echo "</pre>";

    // $vec[$tam-1] = $vec[0];
    // $vec[$tam-2] = $vec[1];
    // $vec[$tam-3] = $vec[2];
}

$vec = [1,2,3,4,5,6];

echo perma($vec);

?>
