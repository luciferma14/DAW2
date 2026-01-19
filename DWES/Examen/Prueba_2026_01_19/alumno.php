<?php
    session_start();

    /* Generar token */
    $_SESSION["token"] = bin2hex(openssl_random_pseudo_bytes(24));

    //Incluir el archivo de validaciones
    include 'validaciones.php';

    //Inicializar variables y errores
    $errores = [];

    $usuario = "";
    $password = "";
    $nombre = "";
    $email = "";
    $direccion = "";
    $codPost = "";
    $rol = "";
    $alojamiento = [];
    $servicios = [];
    $foto = "";

    //Verificar si el formulario ha sido enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recoger datos
        $usuario = trim($_POST['usuario'] ?? '');
        $password = trim($_POST['password'] ?? '');
        $nombre = trim($_POST['nombre'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $direccion = trim($_POST['direccion'] ?? '');
        $codPost = trim($_POST['codPost'] ?? '');
        $rol = trim($_POST['rol'] ?? '');
        $alojamiento = trim($_POST['alojamiento'] ?? []);
        $servicios = trim($_POST['servicios'] ?? []);
        $foto = $_POST['foto'] ?? '';

        //Realizar validaciones llamando a las funciones
        $error_nombre = validaRequerido($nombre);
        if ($error_nombre !== true) {
            $errores[] = $error_nombre;
        }

        $error_email = validaEmail($email);
        if ($error_email !== true) {
            $errores[] = $error_email;
        }

        $error_numero = validaAlfabeto($usuario);
        if ($error_numero !== true) {
            $errores[] = $error_numero;
        }

        $error_numero = validarPasswordCampo($password);
        if ($error_numero !== true) {
            $errores[] = $error_numero;
        }

        //Si no hay errores, procesar 
        if (empty($errores)) {
            echo "¡Datos validados correctamente!";
        } else {
            echo "Se encontraron errores:";
            foreach ($errores as $error) {
                echo "<br>- " . $error;
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lucía Ferrandis</title>
</head>
<body>
    <form method="POST" action="alumno.php" enctype="multipart/form-data">

        <label>Usuario:</label>
        <input type="text" name="usuario" required><br><br>

        <label>Password:</label>
        <input type="password" name="password" required><br><br>

        <label>Nombre</label>
        <input type="text" name="nombre" required><br><br>

        <label>Email</label>
        <input type="text" name="email" required><br><br>

        <label>Dirección:</label>
        <input type="text" name="direccion" required><br><br>

        <label>Código postal</label>
        <input type="number" name="codPost" required><br><br>
       
        <label>Rol:</label><br>
        <input type="radio" name="rol" value="Ya registrado" required> Ya estoy registrado<br>
        <input type="radio" name="rol" value="Usuario nuevo">Usuario nuevo<br><br>

        <label>Tipo alojamiento</label><br>
         <select name="alojamiento[]" multiple>
            <option value="Chalet">Chalet</option>
            <option value="Piso">Piso</option>
            <option value="Apartamento">Apartamento</option>
            <option value="Cabaña">Cabaña</option>
            <option value="Casa Rural">Casa Rural</option>
        </select><br><br>

        <label>Preferencias de servicios</label><br>
        <input type="checkbox" name="servicios[]" value="Zona Comercial">Zona Comercial<br>
        <input type="checkbox" name="servicios[]" value="Piscina">Piscina<br>
        <input type="checkbox" name="servicios[]" value="Parking">Parking<br>
        <input type="checkbox" name="servicios[]" value="Parque Infantil">Parque Infantil<br>
        <input type="checkbox" name="servicios[]" value="Transporte publico">Transporte público<br>
        <input type="checkbox" name="servicios[]" value="Amueblado">Amueblado<br><br>

        <label>Adjuntar foto:</label><br>
        <input type="file" name="foto" accept=".jpg,.jpeg,.png,.gif"><br><br>

        <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">

        <input type="reset" name="limpiar" value="Limpiar">
        <input type="submit" name="validar" value="Validar">
        <input type="submit" name="enviar" value="Enviar" formaction="alumno_ok.php">
    </form>
</body>
</html>