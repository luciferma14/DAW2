<?php
    class Terminal {

        protected $numero;
        protected $tiempo = 0;

        public function __construct($numero) {
            $this->numero = $numero;
        }

        public function getTiempo() {
            return $this->tiempo;
        }

        protected function sumarTiempo($segundos) {
            $this->tiempo += $segundos;
        }

        public function __toString() {
            $m = intdiv($this->tiempo, 60);
            $s = $this->tiempo % 60;
            return "Nº {$this->numero} – {$m} m y {$s}s de conversación en total";
        }
    }

    class Movil extends Terminal {

        private $tarifa;
        private $tarificado = 0;
        private $importe = 0;

        private static $precios = [
            "rata" => 0.06,
            "mono" => 0.12,
            "bisonte" => 0.30
        ];

        public function __construct($numero, $tarifa) {
            parent::__construct($numero);
            $this->tarifa = $tarifa;
        }

        public function llama($terminal, $segundos) {
            $this->sumarTiempo($segundos);
            $terminal->sumarTiempo($segundos);

            $this->tarificado += $segundos;
            $this->importe += ($segundos / 60) * self::$precios[$this->tarifa];
        }

        public function __toString() {
            $mt = intdiv($this->tiempo, 60);
            $st = $this->tiempo % 60;

            $mf = intdiv($this->tarificado, 60);
            $sf = $this->tarificado % 60;

            return "Nº {$this->numero} – {$mt} m y {$st}s de conversación en total - tarificados {$mf} m y {$sf} s por un importe de " .
                round($this->importe, 2) . " euros";
        }
    }
?>