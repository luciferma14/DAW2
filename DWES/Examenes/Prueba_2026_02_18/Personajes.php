<?php
/*
    TODO: Incluir el archivo database.php
*/

require_once("Database.php");
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
        try {
            $db = (new Database())->connect();
        } catch (PDOException $e) {
            print "No se ha podido realizar la conexión: " . $e->getMessage();
        }
        $stmt = $db->query("SELECT * FROM characters");
        if ($stmt) {
            //array asociativo
        } else {
            print "No se han obtenido resultados a mostar!\n";
        }
    }

    /*
        TODO: Implementar método getById($id)
        - Debe obtener un personaje por su ID
        - Usar consulta preparada con WHERE id 
        - Ejecutar y devolver un único registro
    */
    public static function getById($id) {
        try {
            $db = (new Database())->connect();
        } catch (PDOException $e) {
            print "No se ha podido realizar la conexión: " . $e->getMessage();
        }
        $stmt = $db->query("SELECT * FROM characters WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            return $resultado;
        }

        return null;
    }

    /*
        TODO: Implementar método create($data)
        - Insertar un nuevo personaje en la tabla
        - Campos: name, gender, height
        - Usar consulta preparada INSERT
        - Ejecutar con los valores recibidos en $data
        - Devolver el personaje recién creado usando getById()
    */
    public static function create($data): void {
        try {
            $db = (new Database())->connect();
        } catch (PDOException $e) {
            print "No se ha podido realizar la conexión: " . $e->getMessage();
        }
        $sql = $db->exec("INSERT INTO characters (name, gender, height)
                VALUES (:name, :gender, :height)");
        $stmt = $db->prepare($sql);

        $stmt->execute([
            ':name'      => $data['name'],
            ':gender'    => $data['gender'], 
            ':height'    => $data['height'] 
        ]);

       if (false === $sql) { // Comprobamos si da falso el método usado
            $error = $db->errorInfo();
            print "No se ha podido realizar la inserción!\n";
            print "SQL Error={$error[0]}, DB Error={$error[1]}, Message={$error[2]}\n";
        } else {
            print "Se han insertado " . $sql . " filas.\n";
        }
    }

    /*
        TODO: Implementar método update($id, $data)
        - Actualizar un personaje existente
        - Usar UPDATE 
        - Ejecutar con los valores de $data y el id
        - Devolver el personaje actualizado usando getById()
    */
    public static function update($id, $data) {
        try {
            $db = (new Database())->connect();
        } catch (PDOException $e) {
            print "No se ha podido realizar la conexión: " . $e->getMessage();
        }
        $sql = $db->exec("UPDATE characters SET name=$data
        WHERE id=$id");

        if (false === $sql) { // Comprobamos si da falso el método usado
            $error = $db->errorInfo();
            print "No se ha podido realizar la actualización!\n";
            print "SQL Error={$error[0]}, DB Error={$error[1]}, Message={$error[2]}\n";
        } else {
            print "Se han actualizado " . $sql . " filas.";
        } 
    }

    /*
        TODO: Implementar método delete($id)
        - Borrar un personaje por su ID
        - Usar DELETE 
        - Ejecutar consulta preparada
        - Devolver true/false según éxito
    */
    public static function delete($id) {
        try {
            $db = (new Database())->connect();
        } catch (PDOException $e) {
            print "No se ha podido realizar la conexión: " . $e->getMessage();
        }
        $sql = $db->exec("DELETE FROM characters WHERE id=$id;");
        if (false === $sql) { // Comprobamos si da falso el método usado
                $error = $db->errorInfo();
                print "No se ha podido realizar el borrado!\n";
                print "SQL Error={$error[0]}, DB Error={$error[1]}, Message={$error[2]}\n";
            } else {
                print "Se han eliminado " . $sql . " filas.";
        }
    }
}
