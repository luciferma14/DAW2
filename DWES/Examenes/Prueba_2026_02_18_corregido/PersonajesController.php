<?php

// Incluimos la clase Personajes para poder usarla en el controlador
require_once 'Personajes.php';


/**
 * Controlador para manejar las solicitudes HTTP relacionadas con los 
 * personajes de Star Wars.
 */
class PersonajesController
{
    /**
     * Maneja los endpoints de la API RESTful para personajes.
     * Procesa las solicitudes HTTP: GET, POST, PUT, DELETE.
     */
    public function handleRequest()
    {
        // Indicamos que la respuesta es JSON (según UP6)
        header("Content-Type: application/json");

        // Obtenemos el método HTTP (GET, POST, PUT, DELETE)
        $method = $_SERVER["REQUEST_METHOD"];

        // Obtenemos la URI y la dividimos en partes para sacar recurso e ID
        // Ejemplo: /personajes/1 → ['', 'personajes', '1']
        $uri = $_SERVER["REQUEST_URI"];
        $partes = explode('/', trim($uri, '/'));

        // La primera parte es el recurso y la segunda (si existe) es el ID
        $recurso = isset($partes[0]) ? $partes[0] : null;
        $id = isset($partes[1]) ? $partes[1] : null;

        // Comprobamos que el recurso sea "personajes", si no devolvemos 404
        if ($recurso !== 'personajes') {
            http_response_code(404);
            echo json_encode(["error" => "Recurso no encontrado"]);
            exit;
        }

        // ============================================
        // RUTA ESPECIAL: GET /personajes/importarSWAPI
        // ============================================
        if ($method === 'GET' && $id === 'importarSWAPI') {
            $this->cargarDatosDesdeSWAPI();
            exit;
        }

        // ============================
        // RUTAS CRUD
        // ============================

        // GET /personajes → devuelve todos los personajes
        if ($method === 'GET' && !$id) {
            $personajes = Personajes::getAll();
            http_response_code(200);
            echo json_encode($personajes);
            exit;
        }

        // GET /personajes/{id} → devuelve un personaje concreto
        if ($method === 'GET' && $id) {
            $personaje = Personajes::getById($id);
            if ($personaje) {
                http_response_code(200);
                echo json_encode($personaje);
            } else {
                http_response_code(404);
                echo json_encode(["error" => "Personaje no encontrado"]);
            }
            exit;
        }

        // POST /personajes → crea un nuevo personaje
        if ($method === 'POST') {
            // Leemos el JSON del cuerpo de la petición (php://input según UP6)
            $datos = json_decode(file_get_contents("php://input"), true);
            $personaje = Personajes::create($datos);
            http_response_code(201);
            echo json_encode($personaje);
            exit;
        }

        // PUT /personajes/{id} → actualiza un personaje existente
        if ($method === 'PUT' && $id) {
            // Leemos el JSON del cuerpo de la petición
            $datos = json_decode(file_get_contents("php://input"), true);
            $personaje = Personajes::update($id, $datos);
            if ($personaje) {
                http_response_code(200);
                echo json_encode($personaje);
            } else {
                http_response_code(404);
                echo json_encode(["error" => "Personaje no encontrado"]);
            }
            exit;
        }

        // DELETE /personajes/{id} → borra un personaje
        if ($method === 'DELETE' && $id) {
            $resultado = Personajes::delete($id);
            if ($resultado) {
                http_response_code(204); // No Content - borrado OK
            } else {
                http_response_code(404);
                echo json_encode(["error" => "Personaje no encontrado"]);
            }
            exit;
        }

        // Si ninguna ruta coincide, devolvemos 404
        http_response_code(404);
        echo json_encode(["error" => "Ruta no encontrada"]);
    }

    /**
     * Carga los datos JSON de la API SWAPI (personajes)
     * y los inserta en la base de datos local.
     */
    public function cargarDatosDesdeSWAPI()
    {
        // Leemos el fichero swapi.json local (ya que la API externa puede no funcionar)
        $contenido = file_get_contents('swapi.json');

        // Decodificamos el JSON a array asociativo (true = array, según UP5 json_decode)
        $datos = json_decode($contenido, true);

        // Comprobamos que exista la clave 'results' en el JSON
        if (!isset($datos['results'])) {
            http_response_code(500);
            echo json_encode(["error" => "No se han encontrado resultados en SWAPI"]);
            return;
        }

        $insertados = 0;

        // Recorremos cada personaje del array results
        foreach ($datos['results'] as $personaje) {
            // Preparamos los datos del personaje para insertarlos
            $nuevo = [
                'name'   => $personaje['name'],
                'gender' => $personaje['gender'],
                'height' => is_numeric($personaje['height']) ? (int)$personaje['height'] : null
            ];

            // Insertamos el personaje usando el método create de la clase Personajes
            Personajes::create($nuevo);
            $insertados++;
        }

        http_response_code(200);
        echo json_encode(["mensaje" => "Se han importado $insertados personajes desde SWAPI"]);
    }
}
?>
