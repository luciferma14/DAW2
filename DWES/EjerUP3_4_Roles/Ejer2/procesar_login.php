<?php
    session_start();

    $edad  = $_POST["edad"]  ?? "";
    $cargo = $_POST["cargo"] ?? "";
    $_SESSION["nombre"] = $_POST["nombre"];
    $_SESSION["apellido"] = $_POST["apellido"];
    $_SESSION["asignatura"] = $_POST["asignatura"];
    $_SESSION["grupo"] = $_POST["grupo"];

    if ($edad === "menor" && $cargo === "Con cargo") {
        header("Location: delegado.php");
        exit();
    }
    if ($edad === "menor" && $cargo === "Sin cargo") {
        header("Location: estudiante.php");
        exit();
    }
    if ($edad === "mayor" && $cargo === "Sin cargo") {
        header("Location: profesor.php");
        exit();
    }
    if ($edad === "mayor" && $cargo === "Con cargo") {
        header("Location: director.php");
        exit();
    }
?>