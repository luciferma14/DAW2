<?php

class Incidencia {
    private static $incidencias = []; // Simula la BD
    private static $contador = 1;

    private $codigo;
    private $alumno;
    private $descripcion;
    private $resolucion;
    private $fecha;

    // Constructor privado para controlar la creación
    private function __construct($alumno, $descripcion) {
        $this->codigo = self::$contador++;
        $this->alumno = $alumno;
        $this->descripcion = $descripcion;
        $this->resolucion = "";
        $this->fecha = date("Y-m-d H:i:s");
        self::$incidencias[$this->codigo] = $this;
    }

    // Crea una nueva incidencia
    public static function creaIncidencia($alumno, $descripcion) {
        return new self($alumno, $descripcion);
    }

    // Resuelve la incidencia
    public function resuelve($resolucion) {
        $this->resolucion = $resolucion;
        $this->fecha = date("Y-m-d H:i:s");
    }

    // Actualiza los datos de la incidencia
    public function actualizaIncidencia($alumno="", $descripcion="", $resolucion="", $fecha="") {
        if ($alumno !== "") $this->alumno = $alumno;
        if ($descripcion !== "") $this->descripcion = $descripcion;
        if ($resolucion !== "") $this->resolucion = $resolucion;
        if ($fecha !== "") $this->fecha = $fecha;
    }

    // Borra la incidencia
    public function borraIncidencia() {
        unset(self::$incidencias[$this->codigo]);
    }

    // Devuelve el código
    public function getCodigo() {
        return $this->codigo;
    }

    // Lee una incidencia por código
    public static function leeIncidencia($codigo) {
        if (isset(self::$incidencias[$codigo])) {
            echo self::$incidencias[$codigo] . "<br>";
        } else {
            echo "Incidencia $codigo no encontrada.<br>";
        }
    }

    // Lee todas las incidencias
    public static function leeTodasIncidencias() {
        if (empty(self::$incidencias)) {
            echo "No hay incidencias.<br>";
        } else {
            foreach(self::$incidencias as $inc) {
                echo $inc . "<br>";
            }
        }
    }

    // Devuelve el número de incidencias pendientes (sin resolver)
    public static function getPendientes() {
        $count = 0;
        foreach(self::$incidencias as $inc) {
            if ($inc->resolucion === "") $count++;
        }
        return $count;
    }

    // Resetea la "BD"
    public static function resetearBD() {
        self::$incidencias = [];
        self::$contador = 1;
    }

    // Representación de la incidencia como string
    public function __toString() {
        return "Código: {$this->codigo} | Alumno: {$this->alumno} | Descripción: {$this->descripcion} | Resolución: {$this->resolucion} | Fecha: {$this->fecha}";
    }
}
?>
