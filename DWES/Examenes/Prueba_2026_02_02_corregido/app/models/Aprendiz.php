<?php

require_once __DIR__ . "/../database/Database.php";


class Aprendiz {
    private string $nombre;
    private string $casa;
    private string $varita;
    private array $asignaturas;
    private int $nivelMago;
    private ?string $foto;
    private $db;

    public function __construct(array $datos = []) {
        $this->nombre = $datos['nombre'] ?? '';
        $this->casa = $datos['casa'] ?? '';
        $this->varita = $datos['varita'] ?? '';
        $this->asignaturas = $datos['asignaturas'] ?? [];
        $this->nivelMago = $datos['nivelMago'] ?? 0;
        $this->foto = $datos['foto'] ?? null;

        $this->db = (new Database())->connect();
    }

    // Inserta aprendiz y devuelve el ID
    public function insertar(array $datos): int {
        $sql = "INSERT INTO aprendices 
                (nombre, casa, varita, asignaturas, nivel, foto)
                VALUES (:nombre, :casa, :varita, :asignaturas, :nivel, :foto)";
        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            ':nombre'      => $datos['nombre'] ?? $this->nombre,
            ':casa'        => $datos['casa'] ?? $this->casa,
            ':varita'      => $datos['varita'] ?? $this->varita,
            ':asignaturas' => json_encode($datos['asignaturas'] ?? $this->asignaturas),
            ':nivel'       => $datos['nivelMago'] ?? $this->nivelMago,
            ':foto'        => $datos['foto'] ?? $this->foto
        ]);

        return (int) $this->db->lastInsertId();
    }

    // Obtiene aprendiz por ID
    public function obtenerPorId(int $id): ?array {
        $stmt = $this->db->prepare("SELECT * FROM aprendices WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            $resultado['asignaturas'] = json_decode($resultado['asignaturas'], true);
            return $resultado;
        }

        return null;
    }
}
