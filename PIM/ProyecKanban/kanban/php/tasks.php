<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

if ($_SERVER["REQUEST_METHOD"] === "OPTIONS") {
    http_response_code(200);
    exit;
}

header("Content-Type: application/json");

require "db.php";

$method = $_SERVER["REQUEST_METHOD"];
$id = $_GET["id"] ?? null;

switch ($method) {

    case "GET":
        try {
            $stmt = $pdo->query("SELECT * FROM tasks ORDER BY created_at DESC");
            echo json_encode($stmt->fetchAll());
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(["error" => "Error al obtener tareas"]);
        }
        break;

    case "POST":
        $data = json_decode(file_get_contents("php://input"), true);

        if (!isset($data["description"])) {
            http_response_code(400);
            echo json_encode(["error" => "La descripción es obligatoria"]);
            exit;
        }

        $status = $data["status"] ?? "Some day";
        $priority = $data["priority"] ?? "medium";

        try {
            $stmt = $pdo->prepare("INSERT INTO tasks (description, status, priority) VALUES (:d, :s, :p)");
            $stmt->execute([
                ":d" => $data["description"],
                ":s" => $status,
                ":p" => $priority
            ]);

            $id = $pdo->lastInsertId();
            $stmt = $pdo->prepare("SELECT * FROM tasks WHERE id = ?");
            $stmt->execute([$id]);

            http_response_code(201);
            echo json_encode($stmt->fetch());

        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(["error" => "Error al crear tarea"]);
        }

        break;

    case "PUT":
        if (!$id) {
            http_response_code(400);
            echo json_encode(["error" => "ID requerido"]);
            exit;
        }

        $data = json_decode(file_get_contents("php://input"), true);

        try {
            $stmt = $pdo->prepare("UPDATE tasks SET description=:d, status=:s, priority=:p WHERE id=:id");
            $stmt->execute([
                ":d" => $data["description"],
                ":s" => $data["status"],
                ":p" => $data["priority"],
                ":id" => $id
            ]);

            $stmt = $pdo->prepare("SELECT * FROM tasks WHERE id=?");
            $stmt->execute([$id]);

            echo json_encode($stmt->fetch());

        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(["error" => "Error al actualizar tarea"]);
        }

        break;

    case "DELETE":
        if (!$id) {
            http_response_code(400);
            echo json_encode(["error" => "ID requerido"]);
            exit;
        }

        try {
            $stmt = $pdo->prepare("SELECT * FROM tasks WHERE id=?");
            $stmt->execute([$id]);
            $task = $stmt->fetch();

            if (!$task) {
                http_response_code(404);
                echo json_encode(["error" => "Tarea no encontrada"]);
                exit;
            }

            $pdo->prepare("DELETE FROM tasks WHERE id=?")->execute([$id]);

            echo json_encode(["message" => "Tarea eliminada", "deleted" => $task]);

        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(["error" => "Error al eliminar tarea"]);
        }

        break;
}

