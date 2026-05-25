<?php
/*
    TODO: Incluir el archivo database.php
*/
require_once 'Database.php';

/**
 * Clase para manejar operaciones relacionadas con los personajes de Star Wars.
 * Operaciones CRUD: Crear, Leer, Actualizar, Borrar en la tabla 'characters'.
 */

class Personajes {

    /*
        TODO: Implementar método getAll()
        - Debe obtener todos los registros de la tabla 'characters'
        - Usar la conexión PDO
        - Ejecutar SELECT 
        - Devolver los resultados como array asociativo
    */
    public static function getAll() {
        // TODO
        $database = new Database();
        $db = $database->conectar();
        $result = $db->query("SELECT * FROM characters;");
        return $result->fetchAll();
    }

    /*
        TODO: Implementar método getById($id)
        - Debe obtener un personaje por su ID
        - Usar consulta preparada con WHERE id 
        - Ejecutar y devolver un único registro
    */
    public static function getById($id) {
        // TODO
        $database = new Database();
        $db = $database->conectar();
        $stmt = $db->prepare("SELECT * FROM characters WHERE id = ?;");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    /*
        TODO: Implementar método create($data)
        - Insertar un nuevo personaje en la tabla
        - Campos: name, gender, height
        - Usar consulta preparada INSERT
        - Ejecutar con los valores recibidos en $data
        - Devolver el personaje recién creado usando getById()
    */
    public static function create($data) {
        // TODO
        $database = new Database();
        $db = $database->conectar();
        $stmt = $db->prepare("INSERT INTO characters (name, gender, height) VALUES (?, ?, ?)");
        $stmt->execute([$data['name'], $data['gender'], $data['height']]);
        $nuevoId = $db->lastInsertId();
        return self::getById($nuevoId);
    }

    /*
        TODO: Implementar método update($id, $data)
        - Actualizar un personaje existente
        - Usar UPDATE 
        - Ejecutar con los valores de $data y el id
        - Devolver el personaje actualizado usando getById()
    */
    public static function update($id, $data) {
        // TODO
        $database = new Database();
        $db = $database->conectar();
        $stmt = $db->prepare("UPDATE characters SET name = ?, gender = ?, height = ? WHERE id = ?");
        $stmt->execute([$data['name'], $data['gender'], $data['height'], $id]);
        return self::getById($id);
    }

    /*
        TODO: Implementar método delete($id)
        - Borrar un personaje por su ID
        - Usar DELETE 
        - Ejecutar consulta preparada
        - Devolver true/false según éxito
    */
    public static function delete($id) {
        // TODO
        $database = new Database();
        $db = $database->conectar();
        $stmt = $db->prepare("DELETE FROM characters WHERE id = ?" );
        $result = $stmt->execute([$id]);
        if ($result === false){
            return false;
        }else{
            return true;
        }
    }
}
