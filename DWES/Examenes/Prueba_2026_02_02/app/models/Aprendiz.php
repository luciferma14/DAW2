<?php
require_once __DIR__ . '/../database/Database.php';

class Aprendiz {

     /**
     * Clase modelo para representar un aprendiz de Hogwarts
     * Atributos: nombre, casa, varita, asignaturas, nivel, foto
     * Métodos: __construct, guardar()
    */
    private string $nombre;
    private int $nivelMago;
    private array $asignaturas;
    private string $imagen;

    public function __construct(array $datos) {
        $this->nombre = $datos['nombre'];
        $this->nivelMago = (int)$datos['nivelMago'];
        $this->asignaturas = $datos['asignaturas'];
        $this->imagen = $datos['imagen'];
    }

    public function guardar(): bool {
        /**
         * Guarda el aprendiz en la base de datos
         * Devuelve el ID del aprendiz insertado
         */
        $db = new Database();
        $pdo = $db->connect();

        $stmt = $pdo->prepare(
            "INSERT INTO aprendices (nombre, nivelMago, asignaturas, imagen)
             VALUES (:nombre, :nivelMago, :asignaturas, :imagen)"
        );

        return $stmt->execute([
            ':nombre' => $this->nombre,
            ':nivelMago' => $this->nivelMago,
            ':asignaturas' => json_encode($this->asignaturas),
            ':imagen' => $this->imagen
        ]);
    }
}
