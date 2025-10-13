<?php
function crearMenu($textoMenu) {
        echo "\n$textoMenu\n";
        $opciones = [];
        $numOpciones = (int)readline("Número de opciones: ");
        $identificador = readline("Carácter para identificar las opciones: ");

        for ($i = 1; $i <= $numOpciones; $i++) {
            $opciones[$identificador . $i] = readline("Texto de la opción $i: ");
        }

        return $opciones;
    }
    function mostrarMenu($opciones, $fin) {
        foreach ($opciones as $key => $texto) {
            echo "$key) $texto\n";
        }
        echo "$fin) Salir\n";
    }
    function procesarMenu($opciones, $fin, $nombreMenu) {
        do {
            $eleccion = readline("Elige una opción del $nombreMenu: ");

            if ($eleccion == $fin) {
                echo "Has salido del $nombreMenu.\n";
                break;
            }

            $encontrada = false;
            foreach ($opciones as $key => $texto) {
                if ($eleccion == $key) {
                    echo "Has elegido '$texto' del $nombreMenu.\n";
                    $encontrada = true;
                    break;
                }
            }

            if (!$encontrada) {
                echo "Opción no válida.\n";
            }

        } while (true);
    }

    echo "--- Menú Principal ---\n";
    $menuPrincipal = crearMenu("Menú principal");
    $finPrincipal = readline("Carácter para terminar el programa principal: ");

    echo "\n--- MENÚ PRINCIPAL ---\n";
    mostrarMenu($menuPrincipal, $finPrincipal);

    do {
        $eleccionPrincipal = readline("Elige una opción del Menú principal: ");

        if ($eleccionPrincipal == $finPrincipal) {
            echo "Has salido del programa.\n";
            break;
        }

        $igual = false;
        foreach ($menuPrincipal as $key => $textoPrincipal) {
            if ($eleccionPrincipal == $key) {
                echo "Has elegido '$textoPrincipal' del Menú principal.\n";
                $igual = true;

                $tieneSub = readline("¿Quiéres que tenga un submenú? (s/n): ");
                if ($tieneSub == 's' || $tieneSub == 'S') {
                    $subMenu = crearMenu("SubMenú DE '$textoPrincipal'");
                    $finSub = readline("Carácter para salir del submenú: ");

                    echo "\n--- SUBMENÚ ---\n";
                    mostrarMenu($subMenu, $finSub);
                    procesarMenu($subMenu, $finSub, "SubMenú de '$textoPrincipal'");
                }

                break;
            }
        }

        if (!$igual) {
            echo "Opción no válida.\n";
        }

    } while (true);
?>
