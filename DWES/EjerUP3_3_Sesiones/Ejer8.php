<?php
    session_start();

    $numeros_anteriores = $_COOKIE["numeros"] ?? "Ningunos";
    $calculo_anterior = $_COOKIE["calculo"] ?? "Ninguno";
    $resultado_anterior = $_COOKIE["resultado"] ?? "Ninguno";

    $mensaje = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $numeros = $_POST["numeros"] ?? "";
        $calculo = $_POST["calculo"] ?? [];
        $resultado = [];

        $_SESSION["numeros"] = $numeros;
        $_SESSION["calculo"] = $calculo;

        // Convertir la cadena en array de números
        $numeros_array = array_map('floatval', explode(",", $numeros));
        sort($numeros_array);
        $cantidad = count($numeros_array);

        // Calcular operaciones
        foreach ($calculo as $calc) {
            switch ($calc) {

                case "Media":
                    $media = array_sum($numeros_array) / $cantidad;
                    $resultado[] = "Media: $media";
                break;

                case "Mediana":
                    if ($cantidad % 2 == 0) {
                        $mediana = ($numeros_array[$cantidad/2 - 1] + $numeros_array[$cantidad/2]) / 2;
                    } else {
                        $mediana = $numeros_array[floor($cantidad / 2)];
                    }

                    $resultado[] = "Mediana: $mediana";
                break;

                case "Moda":
                    $moda = "";
                    $max_repeticiones = 0;

                    for ($i = 0; $i < $cantidad; $i++) {
                        $repeticiones = 0;

                        for ($j = 0; $j < $cantidad; $j++) {
                            if ($numeros_array[$i] == $numeros_array[$j]) {
                                $repeticiones++;
                            }
                        }

                        if ($repeticiones > $max_repeticiones) {
                            $max_repeticiones = $repeticiones;
                            $moda = $numeros_array[$i];
                        }
                    }

                    $resultado[] = "Moda: $moda";
                break;
            }
        }

        // Mensaje final
        $mensaje = implode(" | ", $resultado);
        $_SESSION["resultado"] = $mensaje;

        // Guardar en cookies
        setcookie("numeros", $numeros, time() + 3600);
        setcookie("calculo", implode(", ", $calculo), time() + 3600);
        setcookie("resultado", $mensaje, time() + 3600);
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Lucía Ferrandis Martínez</title>
    </head>
    <body>
        <h2>Lucía Ferrandis Martínez</h2>
        <hr>
        <h1>Cálculo de Media, Mediana y Moda</h1>

        <form method="POST">
            <label>Introduce números separados por comas:</label><br>
            <input type="text" name="numeros" required><br><br>
            
            <input type="checkbox" name="calculo[]" value="Media"> Media<br>
            <input type="checkbox" name="calculo[]" value="Mediana"> Mediana<br>
            <input type="checkbox" name="calculo[]" value="Moda"> Moda<br><br>

            <input type="submit" value="Calcular">
        </form>

        <hr>

        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
            <h3>Cálculo actual (SESSION):</h3>
            <p><strong>Números:</strong> <?= $_SESSION["numeros"] ?></p>
            <p><strong>Cálculos:</strong> <?= implode(", ", $_SESSION["calculo"]) ?></p>
            <p><strong>Resultado:</strong> <?= $_SESSION["resultado"] ?></p>

            <h3>Cálculo anterior (COOKIES):</h3>
            <?php if ($numeros_anteriores != "Ningunos"): ?>
                <p><strong>Números anteriores:</strong> <?= $numeros_anteriores ?></p>
                <p><strong>Cálculo anterior:</strong> <?= $calculo_anterior ?></p>
                <p><strong>Resultado anterior:</strong> <?= $resultado_anterior ?></p>
            <?php else: ?>
                <p>No hay datos anteriores guardados.</p>
            <?php endif; ?>
        <?php endif; ?>

    </body>
</html>
