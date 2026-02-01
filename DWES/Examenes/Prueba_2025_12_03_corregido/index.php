<?php
$errores = [];
$datos = [];

if (isset($_POST['validar'])) {

    // Nombre
    if (trim($_POST['nombre']) === '') {
        $errores[] = "El nombre es obligatorio";
    } else {
        $datos['nombre'] = htmlspecialchars($_POST['nombre']);
    }

    // Contraseña
    if (strlen($_POST['password']) < 6) {
        $errores[] = "La contraseña debe tener al menos 6 caracteres";
    } else {
        $datos['password'] = $_POST['password'];
    }

    // Nivel estudios
    if (!isset($_POST['estudios'])) {
        $errores[] = "Selecciona un nivel de estudios";
    } else {
        $datos['estudios'] = $_POST['estudios'];
    }

    // Nacionalidad
    if (!isset($_POST['nacionalidad'])) {
        $errores[] = "Selecciona una nacionalidad";
    } else {
        $datos['nacionalidad'] = $_POST['nacionalidad'];
    }

    // Idiomas
    if (!isset($_POST['idiomas'])) {
        $errores[] = "Selecciona al menos un idioma";
    } else {
        $datos['idiomas'] = $_POST['idiomas'];
    }

    // Email
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errores[] = "Email no válido";
    } else {
        $datos['email'] = $_POST['email'];
    }

    // Foto
    if (!is_uploaded_file($_FILES['foto']['tmp_name'])) {
        $errores[] = "Debes subir una foto";
    } else {
        $ext = explode('.', $_FILES['foto']['name']);
        $ext = strtolower(end($ext));
        $permitidas = ['jpg','png','gif'];

        if (!in_array($ext, $permitidas)) {
            $errores[] = "Extensión no válida";
        }

        if ($_FILES['foto']['size'] > 51200) {
            $errores[] = "La imagen supera los 50KB";
        }

        if (!is_dir("uploads")) {
            $errores[] = "No existe el directorio uploads";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Formulario</title>
    </head>
    <body>

        <h2>Formulario</h2>

        <?php if ($errores): ?>
        <ul style="color:red;">
            <?php foreach ($errores as $e): ?>
                <li><?= $e ?></li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>

        <?php if (isset($_POST['validar']) && !$errores): ?>
        <p style="color:green;"><strong>Formulario validado correctamente</strong></p>

        <p><b>Nombre:</b> <?= $datos['nombre'] ?></p>
        <p><b>Estudios:</b> <?= $datos['estudios'] ?></p>
        <p><b>Nacionalidad:</b> <?= $datos['nacionalidad'] ?></p>
        <p><b>Email:</b> <?= $datos['email'] ?></p>
        <p><b>Idiomas:</b> <?= implode(', ', $datos['idiomas']) ?></p>

        <p><b>Imagen subida:</b></p>
        <p style="color:red;">Debes volver a subir la imagen para enviar</p>
        <?php endif; ?>

        <form method="post" enctype="multipart/form-data">
            Nombre: <input type="text" name="nombre" value="<?= $_POST['nombre'] ?? '' ?>"><br><br>

            Contraseña: <input type="password" name="password"><br><br>

            Nivel estudios: <br>
            <select name="estudios">
            <option value="">--Selecciona--</option>
            <option value="ESO">ESO</option>
            <option value="Bachillerato">Bachillerato</option>
            <option value="FP">FP</option>
            <option value="Universitarios">Universitarios</option>
            </select><br><br>

            Nacionalidad: <br>
            <input type="radio" name="nacionalidad" value="Española">Española <br>
            <input type="radio" name="nacionalidad" value="Otra">Otra<br><br>

            Idiomas:<br>
            <input type="checkbox" name="idiomas[]" value="Español">Español <br>
            <input type="checkbox" name="idiomas[]" value="Inglés">Inglés <br>
            <input type="checkbox" name="idiomas[]" value="Francés">Francés <br>
            <input type="checkbox" name="idiomas[]" value="Alemán">Alemán <br>
            <input type="checkbox" name="idiomas[]" value="Italiano">Italiano<br><br>

            Email: <input type="text" name="email"><br><br>

            Foto: <input type="file" name="foto"><br><br>

            <input type="reset" value="Limpiar">
            <input type="submit" name="validar" value="Validar">
            <input type="submit" formaction="Ejer11-3-12.php" value="Enviar">
        </form>

    </body>
</html>
