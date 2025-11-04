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
        <p><strong>Edad:</strong> ' . $datos["edad"] . '</p>
        <p><strong>Peso:</strong> ' . $datos["peso"] . '</p>
        <p><strong>Sexo</strong> ' . $datos["sexo"] . '</p>
        <p><strong>Estado civil:</strong> ' . $datos["estadoCivil"] . '</p>
        <p><strong>Aficiones:</strong> ' . implode(", ", $datos["aficiones"]) . '</p>';

    if (!empty($datos["otroEst"])) {
        echo '<p><strong>Otro estado civil:</strong> ' . $datos["otroEst"] . '</p>';
    }

    echo '<form action="index.php" method="get">
            <input type="submit" value="Volver al formulario">
        </form>';
?>
