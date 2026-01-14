<?php
    class Coche {

        private static $vehiculosCreados = 0;
        private static $kmTotales = 0;

        private $kmRecorridos = 0;

        public function __construct() {
            self::$vehiculosCreados++;
        }

        public function avanza($km) {
            $this->kmRecorridos += $km;
            self::$kmTotales += $km;
        }

        public function quemaRueda() {
            echo "El coche quema rueda<br>\n";
        }

        public function llenarDeposito() {
            return "Depósito del coche lleno<br>\n";
        }

        public function verKMRecorridos() {
            return "El coche lleva {$this->kmRecorridos} km<br>\n";
        }

        public static function verKMTotales() {
            return "Kilómetros totales: " . self::$kmTotales . "<br>\n";
        }

        public static function verVehiculosCreados() {
            return "Vehículos creados: " . self::$vehiculosCreados . "<br>\n";
        }
    }
?>
