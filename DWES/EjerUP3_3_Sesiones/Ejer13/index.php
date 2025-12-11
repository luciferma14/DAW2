<?php
    session_start();

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

        if (empty($nombre)) $errores["nombre"] = "El nombre completo es obligatorio.";
        if (strlen($contrasena) < 6) $errores["contrasena"] = "La contraseña debe tener al menos 6 caracteres.";
        if (empty($estudios)) $errores["estudios"] = "Selecciona tu nivel de estudios.";
        if (empty($nacionalidad)) $errores["nacionalidad"] = "Selecciona tu nacionalidad.";
        if (empty($idiomas)) $errores["idiomas"] = "Selecciona al menos un idioma.";
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errores["email"] = "Introduce un correo electrónico válido.";

        if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] == 0) {
            $foto = $_FILES["foto"];
            $nombreArchivo = $foto["name"];
            $tamano = $foto["size"];
            $tmp = $foto["tmp_name"];

            $partes = explode(".", $nombreArchivo);
            $extension = strtolower(end($partes));
            $extensionesValidas = ["jpg", "jpeg", "png", "gif"];

            if ($tamano > 50000) $errores["foto"] = "La imagen no puede superar los 50 KB.";
            if (!in_array($extension, $extensionesValidas)) $errores["foto"] = "Formato no válido. Solo JPG, PNG o GIF.";

            if (empty($errores["foto"])) {
                $directorio = "imagenesSubidas";
                if (!is_dir($directorio)) mkdir($directorio, 0777, true);

                $nombreUnico = uniqid("img_") . "." . $extension;
                $rutaDestino = $directorio . "/" . $nombreUnico;

                if (!move_uploaded_file($tmp, $rutaDestino)) {
                    $errores["foto"] = "Error al guardar la imagen.";
                }
            }
        }

        if (isset($_POST["enviar"]) && empty($errores)) {
            $_SESSION["datos"] = [
                "nombre" => $nombre,
                "estudios" => $estudios,
                "nacionalidad" => $nacionalidad,
                "idiomas" => $idiomas,
                "email" => $email,
                "foto" => [
                    "nombre" => $nombreArchivo,
                    "ruta" => $rutaDestino ?? "",
                    "extension" => $extension ?? "",
                    "tamano" => $tamano ?? 0
                ]
            ];
            header("Location: Ejer13.php");
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
        <h2>Lucía Ferrandis Martínez</h2>
        <hr>
        <h1>Formulario de datos personales</h1>

        <form method="POST" action="index.php" enctype="multipart/form-data">
            <label>Nombre completo:</label><br>
            <input type="text" name="nombre" value="<?= $nombre ?>"><br>
            <span style="color:red"><?= $errores["nombre"] ?? "" ?></span><br><br>

            <label>Contraseña:</label><br>
            <input type="password" name="contrasena" value="<?= $contrasena ?>"><br>
            <span style="color:red"><?= $errores["contrasena"] ?? "" ?></span><br><br>

            <label>Nivel de estudios:</label><br>
            <select name="estudios">
                <option value="">Seleccione...</option>
                <option value="Sin estudios" <?= $estudios=="Sin estudios"?"selected":"" ?>>Sin estudios</option>
                <option value="ESO" <?= $estudios=="ESO"?"selected":"" ?>>ESO</option>
                <option value="Bachillerato" <?= $estudios=="Bachillerato"?"selected":"" ?>>Bachillerato</option>
                <option value="FP" <?= $estudios=="FP"?"selected":"" ?>>FP</option>
                <option value="Universitarios" <?= $estudios=="Universitarios"?"selected":"" ?>>Universitarios</option>
            </select><br>
            <span style="color:red"><?= $errores["estudios"] ?? "" ?></span><br><br>

            <label>Nacionalidad:</label><br>
            <input type="radio" name="nacionalidad" value="Española" <?= $nacionalidad=="Española"?"checked":"" ?>>Española<br>
            <input type="radio" name="nacionalidad" value="Otra" <?= $nacionalidad=="Otra"?"checked":"" ?>>Otra<br>
            <span style="color:red"><?= $errores["nacionalidad"] ?? "" ?></span><br><br>

            <label>Idiomas:</label><br>
            <?php
                $listaIdiomas = ["Español","Inglés","Francés","Alemán","Italiano"];
                foreach($listaIdiomas as $idioma){
                    $checked = in_array($idioma,$idiomas) ? "checked" : "";
                    echo "<input type='checkbox' name='idiomas[]' value='$idioma' $checked>$idioma<br>";
                }
            ?>
            <span style="color:red"><?= $errores["idiomas"] ?? "" ?></span><br><br>

            <label>Email:</label><br>
            <input type="email" name="email" value="<?= $email ?>"><br>
            <span style="color:red"><?= $errores["email"] ?? "" ?></span><br><br>

            <label>Adjuntar foto:</label><br>
            <input type="file" name="foto" accept=".jpg,.jpeg,.png,.gif"><br>
            <span style="color:red"><?= $errores["foto"] ?? "" ?></span><br><br>

            <input type="reset" value="Limpiar">
            <input type="submit" name="enviar" value="Enviar">
        </form>
    </body>
</html>
