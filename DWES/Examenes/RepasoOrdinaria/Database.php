<?php

class Database {
    /**
     * Configuración de la base de datos
     */

    private $host = "localhost:33006";
    private $db = "starwars";
    private $usuario = "lucia";
    private $contrasena = "dwes2024";
    private $charset = "utf8mb4";

    public function conectar() {
        $dsn = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";
        $opciones = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        return new PDO($dsn, $this->usuario, $this->contrasena, $opciones);
    }
}
