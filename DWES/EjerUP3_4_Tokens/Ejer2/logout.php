<?php
    session_start();

    if (!isset($_GET['token'])) {
        die("Token no recibido");
    }

    if (!hash_equals($_SESSION['token'], $_GET['token'])) {
        die("Token incorrecto");
    }

    session_destroy();
    header("Location: centro_form.php");
exit();
