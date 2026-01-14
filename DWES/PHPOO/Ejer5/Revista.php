<?php

    include_once "Publicacion.php";

    class Revista extends Publicacion {

        private $numero;

        public function __construct($isbn, $titulo, $anyo, $numero) {
            parent::__construct($isbn, $titulo, $anyo);
            $this->numero = $numero;
        }

        public function __toString() {
            return "ISBN: {$this->isbn}, título: {$this->titulo}, año de publicación: {$this->anyo}, número: {$this->numero}<br>\n";
        }
    }
?>
