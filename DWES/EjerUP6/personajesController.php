<?php
require_once "database.php";
require_once "personajes.php";

class PersonajesController {

    private $model;

    public function __construct($pdo) {
        $this->model = new Personajes($pdo);
    }

    public function handleRequest() {

        header("Content-Type: application/json");

        $method = $_SERVER["REQUEST_METHOD"];
        $uri = explode("/", trim($_SERVER["REQUEST_URI"], "/"));

        $resource = $uri[0] ?? null;
        $param = $uri[1] ?? null;

        if ($resource !== "personajes") {
            http_response_code(404);
            echo json_encode(["error" => "Recurso no encontrado"]);
            exit;
        }

        if ($method === "GET" && $param === "importarSWAPI") {
            $result = $this->model->importarSWAPI();
            http_response_code(201);
            echo json_encode(["importados" => $result]);
            exit;
        }

        if ($method === "GET") {
            if ($param) {
                $data = $this->model->getById($param);
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
            echo json_encode($this->model->getAll());
            exit;
        }

        if ($method === "POST") {
            $input = json_decode(file_get_contents("php://input"), true);
            $nuevo = $this->model->create($input);

            http_response_code(201);
            echo json_encode($nuevo);
            exit;
        }

        if ($method === "PUT" && $param) {
            $input = json_decode(file_get_contents("php://input"), true);

            if ($this->model->update($param, $input)) {
                http_response_code(200);
                echo json_encode(["success" => true]);
            } else {
                http_response_code(404);
                echo json_encode(["error" => "No encontrado"]);
            }
            exit;
        }

        if ($method === "DELETE" && $param) {
            if ($this->model->delete($param)) {
                http_response_code(204);
            } else {
                http_response_code(404);
                echo json_encode(["error" => "No encontrado"]);
            }
            exit;
        }

        http_response_code(400);
        echo json_encode(["error" => "Petición incorrecta"]);
        exit;
    }
}
