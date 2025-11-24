<?php
    session_start(); // Iniciamos sesión

    $errores = [];
    $nombre = "";
    $apellidos = "";
    $edad = "";
    $peso = "";
    $sexo = "";
    $estadoCivil = "";
    $otroEstado = "";
    $aficiones = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = trim($_POST["nombre"]);
        $apellidos = trim($_POST["apellidos"]);
        $edad = trim($_POST["edad"]);
        $peso = $_POST["peso"] ?? "";
        $sexo = $_POST["sexo"] ?? "";
        $estadoCivil = $_POST["estadoCivil"] ?? "";
        $otroEstado = $_POST["otroEst"] ?? "";
        $aficiones = $_POST["aficiones"] ?? [];

        // Validaciones
        if (empty($nombre)) $errores["nombre"] = "El nombre es obligatorio.";
        if (empty($apellidos)) $errores["apellidos"] = "Los apellidos son obligatorios.";
        if (empty($edad)) $errores["edad"] = "Introduce una edad válida.";
        if (empty($peso)) $errores["peso"] = "Introduce un peso válido.";
        if (empty($sexo)) $errores["sexo"] = "Selecciona su sexo.";
        if (empty($estadoCivil)) $errores["estadoCivil"] = "Selecciona tu estado civil.";
        if (empty($aficiones)) $errores["aficiones"] = "Selecciona sus aficiones.";

        // Guardar en sesión y redirigir si no hay errores
        if (isset($_POST["enviar"]) && empty($errores)) {
            $_SESSION["datos"] = [
                "nombre" => $nombre,
                "apellidos" => $apellidos,
                "edad" => $edad,
                "peso" => $peso,
                "sexo" => $sexo,
                "estadoCivil" => $estadoCivil,
                "otroEst" => $otroEstado,
                "aficiones" => $aficiones
            ];
            header("Location: Ejer12.php");
            exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Lucía Ferrandis Martínez</title>
        <style>label{font-weight: bold;}</style>
    </head>
    <body>
        <h2>Lucía Ferrandis Martínez</h2>
        <hr>
        <h1>Recoger datos</h1>

        <form method="POST" action="index.php">
            <label>Nombre</label><br>
            <input type="text" name="nombre" value="<?= $nombre ?>" size="25"><br>
            <span style="color:red"><?= $errores["nombre"] ?? "" ?></span><br><br>

            <label>Apellidos</label><br>
            <input type="text" name="apellidos" value="<?= $apellidos ?>" size="25"><br>
            <span style="color:red"><?= $errores["apellidos"] ?? "" ?></span><br><br>

            <label>Edad</label><br>
            <input type="number" name="edad" value="<?= $edad ?>" size="25"><br>
            <span style="color:red"><?= $errores["edad"] ?? "" ?></span><br><br>

            <label>Peso</label><br>
            <input type="number" name="peso" min="10" max="150" value="<?= $peso ?>" size="25"><br>
            <span style="color:red"><?= $errores["peso"] ?? "" ?></span><br><br>

            <label>Sexo</label><br>
            <select name="sexo">
                <option value="">Seleccione...</option>
                <option value="Hombre" <?= $sexo=="Hombre"?"selected":"" ?>>Hombre</option>
                <option value="Mujer" <?= $sexo=="Mujer"?"selected":"" ?>>Mujer</option>
            </select><br>
            <span style="color:red"><?= $errores["sexo"] ?? "" ?></span><br><br>

            <label>Estado Civil</label><br>
            <input type="radio" name="estadoCivil" value="Soltero" <?= $estadoCivil=="Soltero"?"checked":"" ?>>Soltero<br>
            <input type="radio" name="estadoCivil" value="Casado" <?= $estadoCivil=="Casado"?"checked":"" ?>>Casado<br>
            <input type="radio" name="estadoCivil" value="Viudo" <?= $estadoCivil=="Viudo"?"checked":"" ?>>Viudo<br>
            <input type="radio" name="estadoCivil" value="Divorciado" <?= $estadoCivil=="Divorciado"?"checked":"" ?>>Divorciado<br>
            <input type="radio" name="estadoCivil" value="Otro" <?= $estadoCivil=="Otro"?"checked":"" ?>>Otro:
            <input type="text" name="otroEst" size="25" value="<?= $otroEstado ?>"><br>
            <span style="color:red"><?= $errores["estadoCivil"] ?? "" ?></span><br><br>

            <label>Aficiones</label><br>
            <?php
            $opcionesAficiones = ["Cine","Deporte","Literatura","Música","Cómics","Series","Videojuegos"];
            foreach($opcionesAficiones as $opc){
                $checked = in_array($opc,$aficiones) ? "checked" : "";
                echo "<input type='checkbox' name='aficiones[]' value='$opc' $checked>$opc<br>";
            }
            ?>
            <span style="color:red"><?= $errores["aficiones"] ?? "" ?></span><br><br>

            <input type="reset" value="Borrar">
            <input type="submit" name="enviar" value="Enviar">
        </form>
    </body>
</html>
