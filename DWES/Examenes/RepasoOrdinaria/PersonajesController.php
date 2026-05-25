<?php

/*
    TODO: Incluir el archivo Personajes.php 
*/
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
        /*
            TODO: Establecer cabecera Content-Type: application/json
        */
        header('Content-Type: application/json');

        /*
            TODO: Obtener el método HTTP desde $_SERVER["REQUEST_METHOD"]
        */
        $method = $_SERVER['REQUEST_METHOD'];

        /*
            TODO: Obtener la URI desde $_SERVER["REQUEST_URI"]
            TODO: Dividir la URI en segmentos
            TODO: Extraer el recurso (personajes) y el ID (si existe)
        */
        $uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $resource = isset($uri[0]) ? $uri[0] : null;
        $id = isset($uri[1]) ? $uri[1] : null;


        /*
            TODO: Comprobar que el recurso sea "personajes"
            TODO: Si no lo es, devolver 404 con mensaje JSON
        */
        if ($resource !== 'personajes') {
            http_response_code(404);
            echo json_encode(["error" => "Resource not found"]);
            exit;
        }
        /*
            ============================================
            RUTA ESPECIAL: GET /personajes/importarSWAPI
            ============================================
            TODO: Detectar esta ruta y llamar a cargarDatosDesdeSWAPI()
        */
        if($method === 'GET' && $id === 'importarSWAPI'){
            $this->cargarDatosDesdeSWAPI();
            exit;
        }

        /*
            ============================
            RUTAS CRUD
            ============================
        */
        if ($method === 'GET'){

            /*
                TODO: GET /personajes
                - Si no hay ID, devolver todos los personajes
                - Llamar a Personajes::getAll()
            */
            if (!$id) {
                http_response_code(200);
                echo json_encode(Personajes::getAll());
                exit;
            }

            /*
                TODO: GET /personajes/{id}
                - Si hay ID, devolver un personaje concreto
                - Llamar a Personajes::getById($id)
            */
            $personaje = Personajes::getById($id);
            if ($personaje) {
                http_response_code(200);
                echo json_encode($personaje);
                exit;
            } else {
                http_response_code(404);
                echo json_encode(["error" => "Character not found"]);
                exit;
            }

        }

        if ($method === 'POST'){
            /*
                TODO: POST /personajes
                - Leer JSON desde php://input
                - Llamar a Personajes::create($data)
            */
            $raw= file_get_contents("php://input");
            $input = json_decode($raw, true); 
            
            $nuevoPers = Personajes::create($input);
            http_response_code(201);
            echo json_encode($nuevoPers);
            exit;
        }

        if($method === 'PUT'){
            /*
                TODO: PUT /personajes/{id}
                - Leer JSON desde php://input
                - Llamar a Personajes::update($id, $data)
            */
            $raw= file_get_contents("php://input");
            $input = json_decode($raw, true); 

            $persActu = Personajes::update($id, $input);

            http_response_code(200);
            echo json_encode($persActu);
            exit;

        }   
            
        if($method === 'DELETE'){
             /*
                TODO: DELETE /personajes/{id}
                - Llamar a Personajes::delete($id)
                - Devolver código 204
            */

            $resultado = Personajes::delete($id);

            if ($resultado) {
                http_response_code(204);
                exit;
            } else {
                http_response_code(404);
                echo json_encode(["error" => "Character not found"]);
                exit;
            }
        }

        /*
            TODO: Si ninguna ruta coincide, devolver 404
        */
        http_response_code(404);
        echo json_encode(["error" => "Route not found"]);
        exit;   
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
        //$json = file_get_contents("https://swapi.dev/api/people/");
        $json = file_get_contents("swapi.json");
        $input = json_decode($json, true); 

        if(!isset($input['results'])){
            http_response_code(500);
            echo json_encode(["error" => "No se han podido cargar los datos"]);
            return;   
        }

        foreach($input['results'] as $personaje){
            Personajes::create([
                "name" => $personaje['name'],
                "gender" => $personaje['gender'],
                "height" => $personaje['height']
            ]);
        }

        http_response_code(200);
        echo json_encode(["mensaje" => "Datos cargados correctamente"]);
    }
}
?>
