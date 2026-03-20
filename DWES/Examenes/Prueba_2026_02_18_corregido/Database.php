<?php

class Database {
    /**
     * Configuración de la base de datos
     */

    private $host = "192.168.1.200:3306";
    private $db = "lucia";
    private $usuario = "dwes";
    private $contrasena = "dbdwespass";
    private $charset = "utf8mb4";

    public function conectar() {
        // El DSN indica el driver, host, nombre de BD y charset
        $dsn = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";
        $opciones = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        // Si falla la conexión, lanza una PDOException
        return new PDO($dsn, $this->usuario, $this->contrasena, $opciones);
    }
}
