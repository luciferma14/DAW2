<?php
/*  TODO: Controlar sesión */
session_start();

/*
    TODO: Comprobar si el usuario está autenticado.
    - Si NO está autenticado:
        - Devolver código 401
        - Mostrar mensaje indicando que debe iniciar sesión
        - exit;
*/
$file="users.json";

$usuarios =json_decode(file_get_contents($file),true);

$uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
$resource = isset($uri[0]) ? $uri[0] : null;
$id = isset($uri[1]) ? $uri[1] : null;

if ($resource !== 'users') {
    http_response_code(404);
    echo json_encode(["error" => "Usuario no encontrado, debe iniciar sesión"]);
    exit;
}

// TODO: Obtener la URI solicitada
$uri = $_SERVER["REQUEST_URI"];

/*
    TODO: Si la URI es "/" o "/index.php":
        - Preparar un mensaje de bienvenida usando el nombre almacenado en sesión
        - Crear un array con los endpoints disponibles
        - Mostrar el mensaje y los endpoints en formato HTML (lista)
        - exit;
*/
if($uri[0] == "/" || $uri[0] == "/index.php") {
    http_response_code(200);
}
/*
    TODO: Comprobar que la ruta empieza por "/personajes"
    - Si NO empieza por "/personajes":
        - Devolver 404
        - Mostrar mensaje de recurso no encontrado
        - exit;
*/

/*
    TODO: Incluir el controlador de personajes 
*/
require_once 'PersonajesController.php';

/*
    TODO: Crear instancia del controlador y llamar a handleRequest()
    
*/
$controller = new PersonajesController();
$controller->handleRequest();
