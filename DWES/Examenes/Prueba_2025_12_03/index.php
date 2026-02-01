<?php
    $errores = [];
    $nombre = "";
    $contrasena = "";
    $estudios = "";
    $nacionalidad = "";
    $idiomas = [];
    $email = "";
    $foto = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = trim($_POST["nombre"]);
        $contrasena = $_POST["contrasena"];
        $estudios = $_POST["estudios"] ?? "";
        $nacionalidad = $_POST["nacionalidad"] ?? "";
        $idiomas = $_POST["idiomas"] ?? [];
        $email = trim($_POST["email"]);
        $foto = $_POST["foto"];

        if (empty($nombre)) {
            $errores["nombre"] = "El nombre completo es obligatorio.";
        }
        // función que cuenta los caracteres del string
        if (strlen($contrasena) < 6) {
            $errores["contrasena"] = "La contraseña debe tener al menos 6 caracteres.";
        }

        if (empty($estudios)) {
            $errores["estudios"] = "Selecciona tu nivel de estudios.";
        }

        if (empty($nacionalidad)) {
            $errores["nacionalidad"] = "Selecciona tu nacionalidad.";
        }

        if (empty($idiomas)) {
            $errores["idiomas"] = "Selecciona al menos un idioma.";
        }
        // función para validar si el formato del email es correcto
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errores["email"] = "Introduce un correo electrónico válido.";
        }

        if (!isset($_FILES["foto"]) || $_FILES["foto"]["error"] != 0) {
        } else {
            $foto = $_FILES["foto"];
            $nombreArchivo = $foto["name"];
            $tamano = $foto["size"];
            $tmp = $foto["tmp_name"];

            if ($tamano > 50000) {
                $errores["foto"] = "La imagen no puede superar los 50 KB.";
            }

            $partes = explode(".", $nombreArchivo);
            $extension = strtolower(end($partes)); // pasamos a minúsculas el string
            $extensionesValidas = ["jpg" , "png", "gif"];

            if (!in_array($extension, $extensionesValidas)) {
                $errores["foto"] = "Formato no válido. Solo se permiten JPG, PNG o GIF.";
            }

            if (empty($errores["foto"])) {
                $directorio = "imagenesSubidas";
                if (!is_dir($directorio)) { // comprobamos que es un directorio y creamos la carpeta con sus permisos
                    mkdir($directorio, 0777, true);
                }

                $nombreUnico = uniqid("img_") . "." . $extension;
                $rutaDestino = $directorio . "/" . $nombreUnico;

                if (!move_uploaded_file($tmp, $rutaDestino)) {
                    $errores["foto"] = "Error al guardar la imagen.";
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lucía Ferrandis Martínez</title>
</head>
    <body>
        <h2>Lucía Ferrandis Martínez</h2>
        <hr>
        <h1>Formulario de datos personales</h1>

        <form method="POST" action="index.php" enctype="multipart/form-data">
            <label>Nombre completo:</label><br>
            <input type="text" name="nombre" value="<?= $nombre ?>"><br><br>

            <label>Contraseña:</label><br>
            <input type="password" name="contrasena" value="<?= $contrasena ?>"><br><br>

            <label>Nivel de estudios:</label><br>
            <select name="estudios">
                <option value="">Seleccione...</option>
                <option value="Sin estudios" <?= $estudios=="Sin estudios"?"selected":"" ?>>Sin estudios</option>
                <option value="ESO" <?= $estudios=="ESO"?"selected":"" ?>>Educación Secundaria Obligatoria</option>
                <option value="Bachillerato" <?= $estudios=="Bachillerato"?"selected":"" ?>>Bachillerato</option>
                <option value="FP" <?= $estudios=="FP"?"selected":"" ?>>Formación Profesional</option>
                <option value="Universitarios" <?= $estudios=="Universitarios"?"selected":"" ?>>Estudios Universitarios</option>
            </select><br><br>

            <label>Nacionalidad:</label><br>
            <input type="radio" name="nacionalidad" value="Española" <?= $nacionalidad=="Española"?"checked":"" ?>>Española<br>
            <input type="radio" name="nacionalidad" value="Otra" <?= $nacionalidad=="Otra"?"checked":"" ?>>Otra<br><br>

            <label>Idiomas:</label><br>
            <?php
                $listaIdiomas = ["Español", "Inglés", "Francés", "Alemán", "Italiano"];
                foreach ($listaIdiomas as $idioma) {
                    $checked = in_array($idioma, $idiomas) ? "checked" : "";
                    echo "<input type='checkbox' name='idiomas[]' value='$idioma' $checked>$idioma<br>";
                }
            ?>
            <br>
            <label>Email:</label><br>
            <input type="text" name="email" value="<?= $email ?>"><br><br>

            <label>Adjuntar foto:</label><br>
            <input type="file" name="foto" accept=".jpg,.png,.gif"><br><br>

            <ul>
                <li style="color:red"><?= $errores["nombre"] ?? "" ?></li><br>
                <li style="color:red"><?= $errores["contrasena"] ?? "" ?></li><br>
                <li style="color:red"><?= $errores["estudios"] ?? "" ?></li><br>
                <li style="color:red"><?= $errores["nacionalidad"] ?? "" ?></li><br>
                <li style="color:red"><?= $errores["idiomas"] ?? "" ?></li><br>
                <li style="color:red"><?= $errores["email"] ?? "" ?></li><br>
            </ul>

            <input type="reset" name="limpiar" value="Limpiar">
            <input type="submit" name="validar" value="Validar" formaction="index.php">
            <input type="submit" name="enviar" value="Enviar" formaction="Ejer11-3-12.php">
        </form>
    </body>
</html>
