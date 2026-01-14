<?php

    class Persona {

        const INFRAPESO  = -1;
        const PESO_IDEAL = 0;
        const SOBREPESO  = 1;

        private $nombre = "";
        private $edad = 0;
        private $dni;
        private $sexo = "H";
        private $peso = 0;
        private $altura = 0;


        public function __construct() {
            $this->dni = $this->generarDNI();
        }

        public static function consNomEdSex($nombre, $edad, $sexo) {
            $p = new Persona();
            $p->nombre = $nombre;
            $p->edad = $edad;
            $p->comprobarSexo($sexo);
            return $p;
        }

        public static function consFull($nombre, $edad, $sexo, $peso, $altura) {
            $p = new Persona();
            $p->nombre = $nombre;
            $p->edad = $edad;
            $p->peso = $peso;
            $p->altura = $altura;
            $p->comprobarSexo($sexo);
            return $p;
        }

        private function comprobarSexo($sexo) {
            if ($sexo === 'H' || $sexo === 'M') {
                $this->sexo = $sexo;
            } else {
                $this->sexo = 'H';
            }
        }

        private function generarDNI() {
            $numero = rand(10000000, 99999999);
            $letra = $this->generaLetraDNI($numero % 23);
            return $numero . $letra;
        }

        private function generaLetraDNI($idLetra) {
            $letras = ['T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E'];
            return $letras[$idLetra];
        }


        public function calcularIMC() {
            $imc = $this->peso / ($this->altura * $this->altura);

            if ($imc < 20) {
                return self::INFRAPESO;
            } elseif ($imc <= 25) {
                return self::PESO_IDEAL;
            } else {
                return self::SOBREPESO;
            }
        }

        public function strIMC() {
            $resultado = $this->calcularIMC();

            if ($resultado == self::INFRAPESO) {
                return "{$this->nombre} está por debajo de su peso ideal<br>\n";
            } elseif ($resultado == self::PESO_IDEAL) {
                return "{$this->nombre} está en su peso ideal<br>\n";
            } else {
                return "{$this->nombre} tiene sobrepeso<br>\n";
            }
        }

        public function mostrarIMC() {
            return $this->strIMC();
        }

        public function esMayorDeEdad() {
            if ($this->edad >= 18) {
                echo "{$this->nombre} con DNI {$this->dni} es mayor de edad<br>\n";
            } else {
                echo "{$this->nombre} con DNI {$this->dni} es menor de edad<br>\n";
            }
        }


        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        public function setEdad($edad) {
            $this->edad = $edad;
        }

        public function setSexo($sexo) {
            $this->comprobarSexo($sexo);
        }

        public function setPeso($peso) {
            $this->peso = $peso;
        }

        public function setAltura($altura) {
            $this->altura = $altura;
        }


        public function __toString() {
            $sexoTxt = ($this->sexo === 'H') ? "Hombre" : "Mujer";

            return "Informacion de la persona:<br>
            DNI: {$this->dni}<br>
            Nombre: {$this->nombre}<br>
            Sexo: {$sexoTxt}<br>
            Edad: {$this->edad}<br>
            Peso: {$this->peso} Kg<br>
            Altura: {$this->altura} metros<br>
            Resultado IMC: {$this->strIMC()}";
        }
    }
?>
