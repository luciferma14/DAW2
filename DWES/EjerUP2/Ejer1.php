<?php
    function potencias($num, $exp){

        for($i = 1; $i <= $exp; $i++){
            $vec[] = pow($num, $i);
        }
        return $vec;
    }

    $num = readline("Número: ");
    $exp = readline("Exponente: ");

    $resul = potencias($num, $exp);

    $suma = 0;
    foreach($resul as $i => $valor){
        echo("Potencia " . ($i + 1) . " = $valor\n");
        $suma += $valor;
    }
    echo("Suma de las potencias: $suma\n");
?>
