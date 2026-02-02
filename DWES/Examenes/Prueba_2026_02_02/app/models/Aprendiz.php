<?php

class Aprendiz {
    /**
     * Clase modelo para representar un aprendiz de Hogwarts
     * Atributos: nombre, casa, varita, asignaturas, nivel, foto
     * Métodos: __construct, guardar()
    */
    private String $nombre;
    private String $casa;
    private String $varita;
    private array $asignaturas;
    private int $nivelMago;
    private ?string $foto;


    public function __construct(array $datos) {
        $this -> nombre = $datos["nombre"] ?? '';
        $this -> casa = $datos["casa"] ?? '';
        $this -> varita = $datos["varita"] ?? '';
        $this -> asignaturas = $datos["asignaturas"] ?? [];  
        $this -> nivelMago = $datos["nivelMago"] ?? '';
        $this -> foto = $datos["foto"] ?? null;
    }


    public function getNombre(): string{
        return $this -> nombre;
    }

    public function getCasa(): string{
        return $this -> casa;
    }

    public function getVarita(): string {
        return $this -> varita;
    }

    public function getAsignaturas(): array{
        return $this -> asignaturas;
    }

    public function getNivelMago(): int {
        return $this -> nivelMago;
    }

    public function getFoto(): string{
        return $this -> foto;
    }

    public static function insertar($nombre, $edad, $email) {
        $db = Database::conectar();
        
        $sql = $db->prepare(
            "INSERT INTO aprendices (nombre, edad, email) VALUES (?, ?, ?)"
        );
        return $sql->execute([$nombre, $edad, $email]);
    }

    public static function obtenerTodos() {
        $db = Database::conectar();
        $sql = $db->query("SELECT * FROM aprendices");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function guardar() {        
        /**
         * Guarda el aprendiz en la base de datos
         * Devuelve el ID del aprendiz insertado
         */
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'];
        $edad   = $_POST['edad'];
        $email  = $_POST['email'];

        Aprendiz::insertar($nombre, $edad, $email);

        header('Location: ../../public/resultado.php');
        exit;
    }
    }


}
