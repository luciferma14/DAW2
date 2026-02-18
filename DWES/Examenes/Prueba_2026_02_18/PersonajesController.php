<?php

/*
    TODO: Incluir el archivo Personajes.php 
*/
require_once "Personajes.php";

/**
 * Controlador para manejar las solicitudes HTTP relacionadas con los 
 * personajes de Star Wars.
 */
class PersonajesController
{
    private $model;

    /**
     * Maneja los endpoints de la API RESTful para personajes.
     * Procesa las solicitudes HTTP: GET, POST, PUT, DELETE.
     */
    public function handleRequest()
    {
        /*
            TODO: Establecer cabecera Content-Type: application/json
        */
        header("Content-Type: application/json");

        /*
            TODO: Obtener el método HTTP desde $_SERVER["REQUEST_METHOD"]
        */

        $method = $_SERVER["REQUEST_METHOD"];
        
        /*
            TODO: Obtener la URI desde $_SERVER["REQUEST_URI"]
            TODO: Dividir la URI en segmentos
            TODO: Extraer el recurso (personajes) y el ID (si existe)
        */

        $uri = explode("/", trim($_SERVER["REQUEST_URI"], "/"));

        $resource = $uri[0] ?? null;
        $param = $uri[1] ?? null;
        /*
            TODO: Comprobar que el recurso sea "personajes"
            TODO: Si no lo es, devolver 404 con mensaje JSON
        */

        if ($resource !== "personajes") {
            http_response_code(404);
            echo json_encode(["error" => "Recurso no encontrado"]);
            exit;
        }
        
        /*
            ============================================
            RUTA ESPECIAL: GET /personajes/importarSWAPI
            ============================================
            TODO: Detectar esta ruta y llamar a cargarDatosDesdeSWAPI()
        */
        if ($method === "GET" && $param === "importarSWAPI") {
            $result = $this->model->importarSWAPI();
            http_response_code(201);
            echo json_encode(["importados" => $result]);
            exit;
        }

        /*
            ============================
            RUTAS CRUD
            ============================
        */

        /*
            TODO: GET /personajes/{id}
            - Si hay ID, devolver un personaje concreto
            - Llamar a Personajes::getById($id)
        */

        /*
            TODO: GET /personajes
            - Si no hay ID, devolver todos los personajes
            - Llamar a Personajes::getAll()
        */
            

            if ($method === "GET") {
            if ($param) {
                $data = Personajes::getById($param);
                if ($data) {
                    http_response_code(200);
                    echo json_encode($data);
                } else {
                    http_response_code(404);
                    echo json_encode(["error" => "Personaje no encontrado"]);
                }
                exit;
            }

            http_response_code(200);
            echo json_encode(Personajes::getAll());
            exit;
        }
        
        /*
            TODO: POST /personajes
            - Leer JSON desde php://input
            - Llamar a Personajes::create($data)
        */

        if ($method === "POST") {
            $input = json_decode(file_get_contents("php://input"), true);
            $nuevo = Personajes::create($input);

            http_response_code(201);
            echo json_encode($nuevo);
            exit;
        }

        /*
            TODO: PUT /personajes/{id}
            - Leer JSON desde php://input
            - Llamar a Personajes::update($id, $data)
        */

        if ($method === "PUT" && $param) {
            $input = json_decode(file_get_contents("php://input"), true);

            if (Personajes::update($param, $input)) {
                http_response_code(200);
                echo json_encode(["success" => true]);
            } else {
                http_response_code(404);
                echo json_encode(["error" => "No encontrado"]);
            }
            exit;
        }

        /*
            TODO: DELETE /personajes/{id}
            - Llamar a Personajes::delete($id)
            - Devolver código 204
        */
        
        if ($method === "DELETE" && $param) {
            if (Personajes::delete($param)) {
                http_response_code(204);
            } else {
                http_response_code(404);
                echo json_encode(["error" => "No encontrado"]);
            }
            exit;
        }

        /*
            TODO: Si ninguna ruta coincide, devolver 404
        */
    }

    /**
     * Carga los datos JSON de la API SWAPI (personajes)
     * y los inserta en la base de datos local.
     */
    public function cargarDatosDesdeSWAPI()
    {
        /*
            TODO: Obtener datos desde la URL https://swapi.dev/api/people/
            TODO: Leer contenido JSON
            TODO: Decodificar JSON
            TODO: Comprobar que existe 'results'
            TODO: Recorrer los personajes recibidos
            TODO: Insertar cada uno usando Personajes::create()
            TODO: Devolver mensaje JSON de éxito o error
        */
    }
}
?>
