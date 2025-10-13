<?php
    function crearMenu(&$fin) {
        $opciones = [];

        $numOpciones = (int)readline("Número de opciones del menú: ");
        $identificador = readline("Escribe un número o una letra: ");

        for ($i = 1; $i <= $numOpciones; $i++) {
            $texto = readline("Texto de la opción $i: ");
            $opciones[$identificador . "-" . $i] = $texto; // Array asociativo
        }

        $fin = readline("Carácter para terminar el programa: ");
        return $opciones;
    }
    function mostrarMenu($opciones, $fin) {
        echo "\n--- MENÚ ---\n";
        foreach ($opciones as $key => $texto) {
            echo "$key) $texto\n";
        }
        echo "$fin) Salir\n";
    }
    function procesarEleccion($opciones, $fin) {
        do {
            $eleccion = readline("Elige una opción: ");
            if ($eleccion == $fin) {
                echo "Has salido del programa.\n";
                break;
            }

            $encontrada = false;
            foreach ($opciones as $key => $texto) {
                if ($eleccion == $key) {
                    echo "Has elegido: $texto\n";
                    $encontrada = true;
                    break;
                }
            }

            if (!$encontrada) {
                echo "Opción no válida.\n";
            }

        } while (true);
    }

    $fin = '';
    $opciones = crearMenu($fin);
    mostrarMenu($opciones, $fin);
    procesarEleccion($opciones, $fin);
?>
