<?php
// Ejecutar: php -S localhost:8000 --> Navegador: http://localhost:8000/DWES/EjerUP2/Ejer1.php
function potencias($num, $exp){

    for($i = 1; $i <= $exp; $i++){
        $vec[] = pow($num, $i);
    }
    return $vec;
}

$resul = potencias(5, 4);

foreach($resul as $i => $valor){
    echo "Potencia " . ($i+1) . " = $valor <br>";
    $suma += $valor;
}
echo "Suma de las potencias: " . $suma;
?>
