<?php

class Aprendiz {
    /**
     * Clase modelo para representar un aprendiz de Hogwarts
     * Atributos: nombre, casa, varita, asignaturas, nivelMago, foto
     * Métodos: __construct, getters y guardar()
     */
    private string $nombre;
    private string $casa;
    private string $varita;
    private array $asignaturas;
    private int $nivelMago;
    private ?string $foto;

    // Constructor recibe un array con los datos del aprendiz
    public function __construct(array $datos) {
        $this->nombre = $datos['nombre'] ?? '';
        $this->casa = $datos['casa'] ?? '';
        $this->varita = $datos['varita'] ?? '';
        $this->asignaturas = $datos['asignaturas'] ?? [];
        $this->nivelMago = $datos['nivelMago'] ?? 0;
        $this->foto = $datos['foto'] ?? null;
    }

    // Getters
    public function getNombre(): string { 
        return $this->nombre; 
    }
    public function getCasa(): string { 
        return $this->casa; 
    }
    public function getVarita(): string { 
        return $this->varita; 
    }
    public function getAsignaturas(): array { 
        return $this->asignaturas; 
    }
    public function getNivelMago(): int { 
        return $this->nivelMago; 
    }
    public function getFoto(): ?string { 
        return $this->foto; 
    }

    /**
     * Guarda el aprendiz
     * Devuelve un ID único para usar en resultado.php
     */
    public function guardar(): int {
        // Para simplificar, guardamos en sesión y usamos timestamp como id
        if (!isset($_SESSION['aprendices'])) {
            $_SESSION['aprendices'] = [];
        }

        $id = time(); // id único simple
        $_SESSION['aprendices'][$id] = [
            'nombre' => $this->nombre,
            'casa' => $this->casa,
            'varita' => $this->varita,
            'asignaturas' => $this->asignaturas,
            'nivelMago' => $this->nivelMago,
            'foto' => $this->foto
        ];

        return $id;
    }
}
