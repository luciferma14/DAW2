<?php
require_once __DIR__ . "/../models/Aprendiz.php";

class AprendizController {

    private $modelo;

    public function __construct(array $datos = []) {
        $this->modelo = new Aprendiz($datos); // Pasa los datos directamente al modelo
    }

    // Guarda aprendiz y devuelve el ID
    public function guardar(): int {
        $datos = [
            'nombre' => $this->modelo->getNombre(),
            'casa' => $this->modelo->getCasa(),
            'varita' => $this->modelo->getVarita(),
            'asignaturas' => $this->modelo->getAsignaturas(),
            'nivelMago' => $this->modelo->getNivelMago(),
            'foto' => $this->modelo->getFoto()
        ];

        return $this->modelo->insertar($datos);
    }

    // Muestra aprendiz por ID
    public function mostrar(int $id): ?array {
        return $this->modelo->obtenerPorId($id);
    }
}
