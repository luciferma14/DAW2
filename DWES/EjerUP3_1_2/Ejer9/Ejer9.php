<?php
    session_start();
    if (!isset($_SESSION["datos"])) {
        header("Location: index.php");
        exit;
    }

    $datos = $_SESSION["datos"];
    session_unset();
    session_destroy();

    echo '
        <h2>Datos introducidos</h2>
        <hr>
        <p><strong>Nombre:</strong> ' . $datos["nombre"] . '</p>
        <p><strong>Apellidos:</strong> ' . $datos["apellidos"] . '</p>
        <p><strong>Correo:</strong> ' . $datos["correo"] . '</p>
        <p><strong>Nivel de estudios:</strong> ' . $datos["estudios"] . '</p>
        <p><strong>Situación actual:</strong> ' . implode(", ", $datos["situacion"]) . '</p>
        <p><strong>Hobbies:</strong> ' . implode(", ", $datos["hobbies"]) . '</p>';

    if (!empty($datos["otroHbb"])) {
        echo '<p><strong>Otro hobby:</strong> ' . $datos["otroHbb"] . '</p>';
    }

    echo '<form action="index.php" method="get">
            <input type="submit" value="Volver al formulario">
        </form>';
?>
