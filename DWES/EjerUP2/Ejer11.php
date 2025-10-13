<?php
    function crearPedido(&$pedidos) {
        $numeroPedido = (int)readline("Número de pedido: ");
        $cliente = readline("Nombre del cliente: ");

        $pedido = [
            'numeroPedido' => $numeroPedido,
            'cliente' => $cliente,
            'platos' => []
        ];

        $pedidos[$numeroPedido] = $pedido;
        echo "Pedido creado para $cliente con número $numeroPedido.\n";
    }

    function anyadirPlato(&$pedidos) {
        $numeroPedido = (int)readline("Número de pedido al que añadir el plato: ");

        $igual = false;
        foreach ($pedidos as $key => $pedido) {
            if ($key == $numeroPedido) {
                $igual = true;

                $nombrePlato = readline("Nombre del plato: ");
                $precioPlato = (double)readline("Precio del plato: ");

                $plato = [
                    'nombre' => $nombrePlato,
                    'precio' => $precioPlato
                ];

                $pedidos[$numeroPedido]['platos'][] = $plato;
                echo "Plato '$nombrePlato' añadido al pedido $numeroPedido.\n";
                break;
            }
        }

        if (!$igual) {
            echo "Pedido no encontrado.\n";
        }
    }

    function verDetalle($pedidos) {

        listarPedidos($pedidos);

        $numeroPedido = (int)readline("Número de pedido a consultar: ");

        $igual = false;
        foreach ($pedidos as $key => $pedido) {
            if ($key == $numeroPedido) {
                $igual = true;
                echo "\nPedido $numeroPedido - Cliente: {$pedido['cliente']}\n";
                echo "Platos:\n";
                $total = 0;
                foreach ($pedido['platos'] as $plato) {
                    echo "- {$plato['nombre']} : {$plato['precio']}€\n";
                    $total += $plato['precio'];
                }
                echo "Total: $total €\n\n";
                break;
            }
        }

        if (!$igual) {
            echo "Pedido no encontrado.\n";
        }
    }

    function listarPedidos($pedidos) {
        if (empty($pedidos)) {
            echo "No hay pedidos.\n";
            return;
        }

        echo "\n--- LISTADO DE PEDIDOS ---\n";
        foreach ($pedidos as $pedido) {
            echo "Pedido {$pedido['numeroPedido']} - Cliente: {$pedido['cliente']} - Platos: " . count($pedido['platos']) . "\n";
        }
        echo "\n";
    }

    $pedidos = [];

    do {
        echo "\n--- MENÚ RESTAURANTE ---\n";
        echo "1) Crear un pedido\n";
        echo "2) Añadir plato a un pedido\n";
        echo "3) Ver detalle de un pedido\n";
        echo "4) Listar todos los pedidos\n";
        echo "5) Salir\n";

        $opcion = (int)readline("Elige una opción: ");

        switch ($opcion) {
            case 1:
                crearPedido($pedidos);
                break;
            case 2:
                anyadirPlato($pedidos);
                break;
            case 3:
                verDetalle($pedidos);
                break;
            case 4:
                listarPedidos($pedidos);
                break;
            case 5:
                echo "Saliendo del programa...\n";
                break;
            default:
                echo "Opción no válida.\n";
        }

    } while ($opcion != 5);
?>
