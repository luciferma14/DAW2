<?php
    // Datos de entrada: comunidades (municipios) y su infraestructura de agua
    $comunidades = [
        ["nombre" => "Paiporta", "poblacion" => 5000, "pozos" => 8, "acueducto" => true],
        ["nombre" => "Picanya", "poblacion" => 3000, "pozos" => 3, "acueducto" => false],
        ["nombre" => "Sedavi", "poblacion" => 7000, "pozos" => 12, "acueducto" => true],
    ];
    // Función lambda para calcular el acceso a agua potable
    $calcularAcceso = function($comunidad) {
        $accesoBase = $comunidad["acueducto"] ? 0.9 : 0.4; // 90% o 40% de cobertura base
        $bonoPozos = min($comunidad["pozos"] / $comunidad["poblacion"] * 1000, 0.3); // Bono por pozos (1 pozo cada 1000 personas = +10%)
        return $accesoBase + $bonoPozos;
    };
    // Calcular población total y con acceso
    $poblacionTotal = 0;
    $poblacionConAcceso = 0;

    foreach ($comunidades as $comunidad) {
        $poblacionTotal += $comunidad["poblacion"];
        $acceso = $calcularAcceso($comunidad);
        $poblacionConAcceso += $comunidad["poblacion"] * $acceso;
    }
    // Error 1: La función lambda puede devolver un valor > 1 (ej. 1.2), lo que no tiene sentido para un porcentaje.
    // Error 2: El bono por pozos no está limitado a un máximo (ej. no puede superar el 30%). (Hecho)
    // Error 3: No se valida si $acceso es negativo (ej. si hay muy pocos pozos).
    // Error 4: Falta redondear el porcentaje final para legibilidad.
    // Error 5: No se muestra el resultado del cálculo (solo se acumula en $poblacionConAcceso). (Hecho)
    echo "Cálculo completado: $poblacionConAcceso\n";
?>