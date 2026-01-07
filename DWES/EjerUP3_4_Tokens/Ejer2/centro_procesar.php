<?php
    session_start();

    if (!isset($_POST['token'])) {
        die("No se ha encontrado token");
    }

    if (!hash_equals($_SESSION['token'], $_POST['token'])) {
        die("El token no coincide");
    }

    /* Token correcto */
    $_SESSION['usuario'] = $_POST['usuario'];
    $_SESSION['rol'] = $_POST['rol'];

    header("Location: " . strtolower($_SESSION['rol']) . ".php");
exit();
