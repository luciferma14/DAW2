<?php

class Database {
    /**
     * Configuración de la base de datos
     */

    private $host = "192.168.1.200";
    private $db = "lucia";
    private $usuario = "dwes";
    private $contrasena = "dbdwespass";
    private $charset = "utf8mb4";
    private ?PDO $pdo = null;

   public function connect(): PDO {
        if ($this->pdo === null) {
            $dsn = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";
            $this->pdo = new PDO($dsn, $this->usuario, $this->contrasena);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $this->pdo;
    }
}
