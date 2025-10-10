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
        print_r("Potencia " . ($i + 1) . " = $valor\n");
        $suma += $valor;
    }
    print_r("Suma de las potencias: $suma\n");
?>
