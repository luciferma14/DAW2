<?php
    class Bicicleta {

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

        public function hacerCaballito() {
            echo "La bicicleta hace un caballito<br>\n";
        }

        public function ponerCadena() {
            echo "Cadena puesta a la bicicleta<br>\n";
        }

        public function verKMRecorridos() {
            return "La bicicleta lleva {$this->kmRecorridos} km<br>\n";
        }

        public static function verKMTotales() {
            return "Kilómetros totales: " . self::$kmTotales . "<br>\n";
        }

        public static function verVehiculosCreados() {
            return "Vehículos creados: " . self::$vehiculosCreados . "<br>\n";
        }
    }
?>
