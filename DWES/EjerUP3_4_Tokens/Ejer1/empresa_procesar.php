<?php
    session_start();

    if (!isset($_POST['token'])) {
        die("No se ha encontrado token");
    }

    if (!hash_equals($_SESSION['token'], $_POST['token'])) {
        die("El token no coincide");
    }

    $_SESSION['usuario'] = $_POST['usuario'];
    $_SESSION['rol'] = $_POST['rol'];

    switch ($_SESSION['rol']) {
        case 'Gerente':
            header("Location: gerente.php");
            break;
        case 'Sindicalista':
            header("Location: sindicalista.php");
            break;
        case 'Nominas':
            header("Location: nominas.php");
            break;
    }
exit();
