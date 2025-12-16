<?php
    session_start();

    $_SESSION["usuario"] = $_POST["usuario"];
    $_SESSION["rol"] = $_POST["rol"];

    $nombres = $_POST["nombres"];
    $salarios = $_POST["salarios"];

    switch ($_SESSION["rol"]) {
        case "Deleagdo":
            header("Location: delagado.php");
            break;
        case "Estudiante":
            header("Location: estudiante.php");
            break;
        case "Profesor":
            header("Location: profesor.php");
            break;
        case "Director":
            header("Location: director.php");
         
    }
    exit();
?>