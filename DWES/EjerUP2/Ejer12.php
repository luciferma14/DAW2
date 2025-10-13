<?php
    function anyadirLibro(&$biblioteca) {
        $titulo = readline("Título del libro: ");
        $autor = readline("Autor: ");
        $anyo = (int)readline("Año de publicación: ");

        $biblioteca[$titulo] = [
            'autor' => $autor,
            'anyo' => $anyo,
            'prestado' => false
        ];

        echo "Libro '$titulo' añadido a la biblioteca.\n";
    }

    function listarLibros($biblioteca) {
        if (empty($biblioteca)) {
            echo "No hay libros en la biblioteca.\n";
            return;
        }

        echo "\n--- LIBROS EN BIBLIOTECA ---\n";
        foreach ($biblioteca as $titulo => $datos) {
            $estado = $datos['prestado'] ? 'Prestado' : 'Disponible';
            echo "Título: $titulo | Autor: {$datos['autor']} | Año: {$datos['anyo']} | Estado: $estado\n";
        }
        echo "\n";
    }

    function prestarLibro(&$biblioteca) {
        $titulo = readline("Título del libro a prestar: ");

        $igual = false;
        foreach ($biblioteca as $key => $datos) {
            if ($key == $titulo) {
                if ($biblioteca[$titulo]['prestado']) {
                    echo "El libro '$titulo' ya está prestado.\n";
                } else {
                    $biblioteca[$titulo]['prestado'] = true;
                    echo "Libro '$titulo' prestado correctamente.\n";
                }
                $igual = true;
                break;
            }
        }

        if (!$igual) {
            echo "Libro '$titulo' no encontrado.\n";
        }
    }

    function devolverLibro(&$biblioteca) {
        $titulo = readline("Título del libro a devolver: ");

        $igual = false;
        foreach ($biblioteca as $key => $datos) {
            if ($key == $titulo) {
                if (!$biblioteca[$titulo]['prestado']) {
                    echo "El libro '$titulo' no estaba prestado.\n";
                } else {
                    $biblioteca[$titulo]['prestado'] = false;
                    echo "Libro '$titulo' devuelto correctamente.\n";
                }
                $igual = true;
                break;
            }
        }

        if (!$igual) {
            echo "Libro '$titulo' no encontrado.\n";
        }
    }

    function buscarPorAutor($biblioteca) {
        $autorBuscado = readline("Nombre del autor a buscar: ");
        $encontrados = [];

        foreach ($biblioteca as $titulo => $datos) {
            if ($datos['autor'] == $autorBuscado) {
                $encontrados[$titulo] = $datos;
            }
        }

        if (empty($encontrados)) {
            echo "No se encontraron libros del autor '$autorBuscado'.\n";
        } else {
            echo "\n--- Libros de '$autorBuscado' ---\n";
            foreach ($encontrados as $titulo => $datos) {
                $estado = $datos['prestado'] ? 'Prestado' : 'Disponible';
                echo "Título: $titulo | Año: {$datos['anyo']} | Estado: $estado\n";
            }
            echo "\n";
        }
    }

    $biblioteca = [];

    do {
        echo "\n--- MENÚ BIBLIOTECA ---\n";
        echo "1) Añadir libro\n";
        echo "2) Listar libros\n";
        echo "3) Prestar libro\n";
        echo "4) Devolver libro\n";
        echo "5) Buscar libros por autor\n";
        echo "6) Salir\n";

        $opcion = (int)readline("Elige una opción: ");

        switch ($opcion) {
            case 1:
                anyadirLibro($biblioteca);
                break;
            case 2:
                listarLibros($biblioteca);
                break;
            case 3:
                prestarLibro($biblioteca);
                break;
            case 4:
                devolverLibro($biblioteca);
                break;
            case 5:
                buscarPorAutor($biblioteca);
                break;
            case 6:
                echo "Saliendo del programa...\n";
                break;
            default:
                echo "Opción no válida.\n";
        }

    } while ($opcion != 6);
?>
