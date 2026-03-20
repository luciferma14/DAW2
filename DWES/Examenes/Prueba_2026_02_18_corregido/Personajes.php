<?php
// Incluimos el archivo de la base de datos para poder conectarnos
require_once 'Database.php';


/**
 * Clase para manejar operaciones relacionadas con los personajes de Star Wars.
 * Operaciones CRUD: Crear, Leer, Actualizar, Borrar en la tabla 'characters'.
 */

class Personajes {

    // Obtiene todos los personajes de la tabla characters
    public static function getAll() {
        $db = new Database();
        $pdo = $db->conectar();

        // Ejecutamos el SELECT y devolvemos todos los resultados como array
        $stmt = $pdo->query("SELECT * FROM characters");
        return $stmt->fetchAll();
    }

    // Obtiene un personaje concreto por su ID
    public static function getById($id) {
        $db = new Database();
        $pdo = $db->conectar();

        // Usamos consulta preparada con ? para evitar inyección SQL (según UP5)
        $stmt = $pdo->prepare("SELECT * FROM characters WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    // Inserta un nuevo personaje y devuelve el personaje creado
    public static function create($data) {
        $db = new Database();
        $pdo = $db->conectar();

        // Consulta preparada INSERT con los campos name, gender y height
        $stmt = $pdo->prepare("INSERT INTO characters (name, gender, height) VALUES (?, ?, ?)");
        $stmt->execute([
            $data['name'],
            $data['gender'] ?? null,
            $data['height'] ?? null
        ]);

        // Obtenemos el ID del personaje recién insertado
        $nuevoId = $pdo->lastInsertId();

        // Devolvemos el personaje recién creado usando getById
        return self::getById($nuevoId);
    }

    // Actualiza un personaje existente y devuelve el personaje actualizado
    public static function update($id, $data) {
        $db = new Database();
        $pdo = $db->conectar();

        // Consulta preparada UPDATE con los campos a modificar
        $stmt = $pdo->prepare("UPDATE characters SET name = ?, gender = ?, height = ? WHERE id = ?");
        $stmt->execute([
            $data['name'],
            $data['gender'] ?? null,
            $data['height'] ?? null,
            $id
        ]);

        // Devolvemos el personaje actualizado
        return self::getById($id);
    }

    // Borra un personaje por su ID y devuelve true o false
    public static function delete($id) {
        $db = new Database();
        $pdo = $db->conectar();

        // Consulta preparada DELETE
        $stmt = $pdo->prepare("DELETE FROM characters WHERE id = ?");
        $stmt->execute([$id]);

        // rowCount() devuelve el número de filas afectadas
        return $stmt->rowCount() > 0;
    }
}
