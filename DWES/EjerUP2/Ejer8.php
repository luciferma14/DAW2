<?php
    function crearMenu(&$opciones, &$identificador, &$fin) {
        $numOpciones = (int)readline("Número de opciones del menú: ");
        $identificador = readline("Escribe un número o una letra: ");

        for ($i = 1; $i <= $numOpciones; $i++) {
            $opciones[$identificador . "-" . $i] = readline("Texto de la opción $i: ");
        }

        $fin = readline("Carácter para terminar el programa: ");
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

            $igual = false;
            foreach ($opciones as $key => $texto) {
                if ($eleccion == $key) {
                    echo "Has elegido: " . $texto . "\n";
                    $igual = true;
                    break;
                }
            }

            if (!$igual) {
                echo "Opción no válida.\n";
            }

        } while (true);
    }

    $opciones = [];
    $identificador = '';
    $fin = '';

    crearMenu($opciones, $identificador, $fin);
    mostrarMenu($opciones, $fin);
    procesarEleccion($opciones, $fin);
?>
