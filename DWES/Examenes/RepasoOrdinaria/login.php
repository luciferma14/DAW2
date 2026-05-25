<?php

/*
    TODO: Iniciar sesión
*/
session_start();
/*
    TODO: Incluir validaciones.php
*/
require_once 'validaciones.php';
/*
    TODO: Leer el archivo users.json y decodificarlo.
    TODO: Extraer solo los nombres autorizados con array_column().
    TODO: Guardar la lista de usuarios autorizados en $_SESSION['listaUsuarios'].
*/
$json = file_get_contents("users.json");
$usuarios = json_decode($json, true); 

$nombres = array_column($usuarios, 'name');
$_SESSION['listaUsuarios'] = $nombres;

/*
    Array para almacenar errores (lo usarán ellos)
*/
$errores = [];

/*
    TODO: Recoger el nombre enviado por POST (si existe)
*/
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;

/*
    TODO: Comprobar si la petición es POST
*/
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    /* ============================
       BOTÓN VALIDAR
       ============================ */
    if (isset($_POST['validar'])) {
        /*
            TODO: Validar el nombre usando:
                - validaRequerido()
                - validaAlfabeto()
            TODO: Si es válido, guardar el nombre en sesión.
            TODO: Si NO es válido, añadir mensajes al array $errores.
        */

        if (!validaRequerido($nombre)) {
            $errores[] = "El nombre es obligatorio.";
        } elseif (!validaAlfabeto($nombre)) {
            $errores[] = "El nombre solo puede contener letras.";
        } else {
            $_SESSION['nombre'] = $nombre;
        }
    }

    /* ============================
       BOTÓN ACCEDER
       ============================ */
    if (isset($_POST['acceder'])) {

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
        $nuevoNom = $_SESSION['nombre'];

        if(in_array($nuevoNom, $_SESSION['listaUsuarios'])){
            $_SESSION['auth']  = true;    
            header('Location: index.php');
            exit;
        }else{
            session_destroy();
            $nombre = "";
            $errores[] = "Usuario no autorizado";
        }
    }
}
?>
<!-- 
    TODO: Indica TU NOMBRE en el título
-->
<h1>Acceso a la API de Star Wars - NOMBRE</h1>

<!-- 
    TODO: Mostrar errores en lista roja recorriendo el array $errores
-->

<form action="login.php" method="POST">

    <label>Nombre:</label>

    <!-- 
        TODO: Rellenar el campo con el nombre validado o recuperado de sesión
    -->
    <input type="text" name="nombre" value="">

    <br><br>

    <!-- 
        TODO: Mostrar botón VALIDAR si no se ha validado o hay errores
    -->

    <!-- 
        TODO: Mostrar botón ACCEDER si se ha validado correctamente
    -->

</form>
