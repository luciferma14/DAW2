<?php
    session_start();

    $errores = [];
    $nombre = "";
    $apellidos = "";
    $correo = "";
    $estudios = "";
    $situacion = [];
    $hobbies = [];
    $otroHobbie = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nombre = trim($_POST["nombre"]);
        $apellidos = trim($_POST["apellidos"]);
        $correo = trim($_POST["correo"]);
        $estudios = $_POST["estudios"] ?? "";
        $situacion = $_POST["situacion"] ?? [];
        $hobbies = $_POST["hobbies"] ?? [];
        $otroHobbie = $_POST["otroHbb"] ?? "";

        if (empty($nombre)) $errores["nombre"] = "El nombre es obligatorio.";
        if (empty($apellidos)) $errores["apellidos"] = "Los apellidos son obligatorios.";
        if (empty($correo)) $errores["correo"] = "Introduce un correo válido.";
        if (empty($estudios)) $errores["estudios"] = "Selecciona tu nivel de estudios.";
        if (empty($situacion)) $errores["situacion"] = "Selecciona al menos una situación.";
        if (empty($hobbies)) $errores["hobbies"] = "Selecciona al menos un hobbie.";

        if (isset($_POST["enviar"]) && empty($errores)) {
            $_SESSION["datos"] = [
                "nombre" => $nombre,
                "apellidos" => $apellidos,
                "correo" => $correo,
                "estudios" => $estudios,
                "situacion" => $situacion,
                "hobbies" => $hobbies,
                "otroHbb" => $otroHobbie
            ];

            header("Location: Ejer11.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Lucía Ferrandis</title>
    </head>
    <body>
        <h1>Lucía Ferrandis Martínez</h1>
        <hr>
        <h2>Recoger datos</h2>

        <form method="POST">

            <label>Nombre:</label><br>
            <input type="text" name="nombre" value="<?= $nombre ?>" size="25">
            <br><span class="error"><?= $errores["nombre"] ?? "" ?></span><br><br>

            <label>Apellidos:</label><br>
            <input type="text" name="apellidos" value="<?= $apellidos ?>" size="25">
            <br><span class="error"><?= $errores["apellidos"] ?? "" ?></span><br><br>

            <label>Correo electrónico:</label><br>
            <input type="email" name="correo" value="<?= $correo ?>" size="25">
            <br><span class="error"><?= $errores["correo"] ?? "" ?></span><br><br>

            <label>Nivel de estudios:</label><br>
            <select name="estudios">
                <option value="">Seleccione...</option>
                <?php
                $opciones = ["ESO", "Bachillerato", "Grado Medio", "Grado Superior", "Universidad"];
                foreach ($opciones as $op) {
                    $sel = ($estudios == $op) ? "selected" : "";
                    echo "<option value='$op' $sel>$op</option>";
                }
                ?>
            </select>
            <br><span class="error"><?= $errores["estudios"] ?? "" ?></span><br><br>

            <label>Situación actual:</label><br>
            <?php
            $situaciones = ["estudiando" => "Estudiando", "trabajando" => "Trabajando", "buscando" => "Buscando empleo", "desempleado" => "Desempleado"];
            foreach ($situaciones as $val => $txt) {
                $chk = in_array($val, $situacion) ? "checked" : "";
                echo "<input type='checkbox' name='situacion[]' value='$val' $chk>$txt<br>";
            }
            ?>
            <span class="error"><?= $errores["situacion"] ?? "" ?></span><br><br>

            <label>Hobbies:</label><br>
            <?php
            $hobbys = [
                "musica" => "Escuchar música",
                "juegos" => "Jugar videojuegos",
                "deporte" => "Hacer deporte",
                "otro" => "Otro"
            ];
            foreach ($hobbys as $val => $txt) {
                $chk = in_array($val, $hobbies) ? "checked" : "";
                if ($val == "otro") {
                    echo "<input type='checkbox' name='hobbies[]' value='$val' $chk>$txt: <input type='text' name='otroHbb' placeholder='Leer comics...' size='25' value='" . htmlspecialchars($otroHobbie) . "'><br>";
                } else {
                    echo "<input type='checkbox' name='hobbies[]' value='$val' $chk>$txt<br>";
                }
            }
            ?>
            <span class="error"><?= $errores["hobbies"] ?? "" ?></span><br><br>

            <input type="submit" name="enviar" value="Enviar">
            <input type="reset" value="Borrar">
        </form>
    </body>
</html>
