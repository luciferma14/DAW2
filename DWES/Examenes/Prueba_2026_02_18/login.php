<?php

/*
    TODO: Iniciar sesión
*/
session_start();
/*
    TODO: Incluir validaciones.php
*/
include("validaciones.php");
/*
    TODO: Leer el archivo users.json y decodificarlo.
    TODO: Extraer solo los nombres autorizados con array_column().
    TODO: Guardar la lista de usuarios autorizados en $_SESSION['listaUsuarios'].
*/
$file = "users.json";

$users =json_decode(file_get_contents($file),true);

$names = array_column($users, 'name');


/*
    Array para almacenar errores (lo usarán ellos)
*/
$errores = $_SESSION['errores'] ?? [];
$errores = [];

/*
    TODO: Recoger el nombre enviado por POST (si existe)
*/
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $nombre = [
        "id"=> $newId,
        "name" => isset($input["name"]) ? $input["name"] : "Unnamed"
    ];
    $listaUsuarios[] = $nombre;
    file_put_contents($file, json_encode($listaUsuarios, JSON_PRETTY_PRINT)); //actualiza fichero
    echo json_encode($nombre);

/*
    TODO: Comprobar si la petición es POST
*/
}

if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));

    $datos = $_SESSION['datos_form'] ?? [];

    /* ============================
       BOTÓN VALIDAR
       ============================ */
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['accion'] ?? '') === 'validar') {

        /*
            TODO: Validar el nombre usando:
                - validaRequerido()
                - validaAlfabeto()
            TODO: Si es válido, guardar el nombre en sesión.
            TODO: Si NO es válido, añadir mensajes al array $errores.
        */

        $datos['nombre'] = trim($_POST['nombre']);

        if(validaRequerido($datos['nombre']) && validaAlfabeto($datos['nombre'])){
            $_SESSION['datos_form'] = $datos['nombre'];
            $auth = true;
        }else{
            $auth = false;
            $errores[] = 'Error al guardar el nombre';
        }
    }

    /* ============================
       BOTÓN ACCEDER
       ============================ */
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['accion'] ?? '') === 'acceder') {

        /*
            TODO: Recuperar el nombre guardado en sesión.
            TODO: Comprobar si está en la lista de usuarios autorizados.
            TODO: Si está autorizado:
                    - Guardar auth = true
                    - Redirigir a index.php
            TODO: Si NO está autorizado:
                    - Destruir la sesión
                    - Vaciar $nombre
                    - Añadir error "Usuario no autorizado"
        */
        $_SESSION['datos_form'] = ['nombre' => $_POST['nombre'] ?? ''];

        if(validaAlfabeto($datos['nombre']) && validaRequerido($datos['nombre'])){
            $auth = true;
            header('Location: index.php');
        }else{
            session_destroy();
            $nombre = null;
            $errores[] = 'Usuario no autorizado';
        }
    }
}

?>
<!-- 
    TODO: Indica TU NOMBRE en el título
-->
<h1>Acceso a la API de Star Wars - Lucía Ferrandis Martínez</h1>

<!-- 
    TODO: Mostrar errores en lista roja recorriendo el array $errores
-->
<?php if (!empty($errores)): ?>
<ul class="error">
    <?php foreach ($errores as $error): ?>
        <li><?= $error; ?></li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>

<form action="login.php" method="POST">

    <label>Nombre:</label>

    <!-- 
        TODO: Rellenar el campo con el nombre validado o recuperado de sesión
    -->
    <input type="text" name="nombre" value="<?='nombre'?>">

    <br><br>

    <!-- 
        TODO: Mostrar botón VALIDAR si no se ha validado o hay errores
    -->
    <button type="submit" name="accion" value="validar">VALIDAR</button>

    <!-- 
        TODO: Mostrar botón ACCEDER si se ha validado correctamente
    -->
    <button type="submit" name="accion" value="acceder">ACCEDER</button>
</form>
