<?php
// Iniciamos la sesión para poder acceder a las variables de sesión (según UP33)
session_start();

// Comprobamos si el usuario está autenticado mirando la variable de sesión
 if (!isset($_SESSION['auth']) || $_SESSION['auth'] !== true) {
     http_response_code(401);
     echo "No estás autenticado. Por favor, inicia sesión en login.php";
     exit;
}

// Obtenemos la URI solicitada
$uri = $_SERVER["REQUEST_URI"];

// Si la URI es "/" o "/index.php", mostramos el mensaje de bienvenida
if ($uri === '/' || $uri === '/index.php') {
    $nombre = $_SESSION['nombre'] ?? 'Usuario';

    $endpoints = [
        "GET /personajes/importarSWAPI - Importa personajes desde SWAPI",
        "GET /personajes - Lista todos los personajes",
        "GET /personajes/{id} - Muestra un personaje concreto",
        "POST /personajes - Crea un nuevo personaje",
        "PUT /personajes/{id} - Actualiza un personaje existente",
        "DELETE /personajes/{id} - Borra un personaje"
    ];

    echo "<h1>Bienvenido/a, $nombre!</h1>";
    echo "<h2>Endpoints disponibles:</h2>";
    echo "<ul>";
    foreach ($endpoints as $endpoint) {
        echo "<li>$endpoint</li>";
    }
    echo "</ul>";
    exit;
}

// Comprobamos que la ruta empieza por "/personajes"
if (strpos($uri, '/personajes') !== 0) {
    http_response_code(404);
    echo "Recurso no encontrado";
    exit;
}

// Incluimos el controlador de personajes
require_once 'PersonajesController.php';

// Creamos la instancia del controlador y llamamos a handleRequest
$controller = new PersonajesController();
$controller->handleRequest();