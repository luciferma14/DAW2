<?php
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
        $apellidos = $_POST["apellidos"];
        $edad = trim($_POST["edad"]);
        $peso = $_POST["peso"] ?? "";
        $sexo = $_POST["sexo"] ?? "";
        $estadoCivil = $_POST["estadoCivil"] ?? "";
        $otroEstado = $_POST["otroEst"] ?? "";
        $aficiones = $_POST["aficiones"] ?? [];

        if (empty($nombre)) {
            $errores["nombre"] = "El nombre es obligatorio.";
        }
        if (empty($apellidos)) {
            $errores["apellidos"] = "Los apellidos son obligatorios.";
        }
        if (empty($edad)){
            $errores["edad"] = "Introduce una edad válida.";
        }
        if (empty($peso)) {
            $errores["peso"] = "Introduce un peso válido.";
        }
        if (empty($sexo)) {
            $errores["sexo"] = "Selecciona su sexo.";
        }
        if (empty($estadoCivil)) {
            $errores["estadoCivil"] = "Selecciona tu estado civil.";
        }
        if (empty($aficiones)) {
            $errores["aficiones"] = "Selecciona sus aficiones.";
        }

        if (isset($_POST["enviar"]) && empty($errores)) {
            session_start();
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
            header("Location: Ejer10.php");
            exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Lucía Ferrandis Martínez</title>

        <style>
            label{
                font-weight: bold;
            }
        </style>
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
            <input type="number" name="edad" value="<?= $edad ?>"size="25"><br>
            <span style="color:red"><?= $errores["edad"] ?? "" ?></span><br><br>

            <label>Peso</label><br>
            <input type="number" name="peso" min="10" max="150" value="<?= $peso ?>"size="25"><br>
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
            <input type="checkbox" name="aficiones[]" value="Cine" <?= in_array("Cine",$aficiones)?"checked":"" ?>>Cine<br>
            <input type="checkbox" name="aficiones[]" value="Deporte" <?= in_array("Deporte",$aficiones)?"checked":"" ?>>Deporte<br>
            <input type="checkbox" name="aficiones[]" value="Literatura" <?= in_array("Literatura",$aficiones)?"checked":"" ?>>Literatura<br>
            <input type="checkbox" name="aficiones[]" value="Música" <?= in_array("Música",$aficiones)?"checked":"" ?>>Música<br>
            <input type="checkbox" name="aficiones[]" value="Cómics" <?= in_array("Cómics",$aficiones)?"checked":"" ?>>Cómics<br>
            <input type="checkbox" name="aficiones[]" value="Series" <?= in_array("Series",$aficiones)?"checked":"" ?>>Series<br>
            <input type="checkbox" name="aficiones[]" value="Videojuegos" <?= in_array("Videojuegos",$aficiones)?"checked":"" ?>>Videojuegos<br>
            <span style="color:red"><?= $errores["aficiones"] ?? "" ?></span><br><br>

            <input type="reset" name="borrar" value="Borrar">
            <input type="submit" name="validar" value="Validar">
            <input type="submit" name="enviar" value="Enviar">
        </form>
    </body>
</html>