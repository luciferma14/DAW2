<?php 
    class Incidencia{

        private static $cont = 0;
        private static $pendiente = 0;

        private $codigo;
        private $puesto;
        private $descripcion;

        private $estado;
        private $resolucion;

        public function __construct($puesto, $descripcion){
            self::$cont++;
            self::$pendiente++;

            $this->codigo = self::$cont;
            $this->puesto = $puesto;
            $this->descripcion = $descripcion;
            $this->estado = "Pendiente";
        }

        public function resuelve($resolucion){
            if($this->estado = "Pendiente"){
                $this->estado = "Resuelta";
                $this->resolucion = $resolucion;
                self::$pendiente--;
            }
        }

        public static function getPendientes(){
            return self::$pendiente;
        }

        public function __toString(){
            $texto = "Incidencia: {$this->codigo} - Puesto: {$this->puesto} - {$this->descripcion} - {$this->estado}";

            if($this->estado = "Resuelta"){
                $texto .= " - {$this->resolucion}";
            }

            return  $texto . "<br>";
        }

    }
?>