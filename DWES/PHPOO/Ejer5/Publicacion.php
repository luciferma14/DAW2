<?php

    abstract class Publicacion {

        protected $isbn;
        protected $titulo;
        protected $anyo;

        public function __construct($isbn, $titulo, $anyo = 2024) {
            $this->isbn = $isbn;
            $this->titulo = $titulo;
            $this->anyo = $anyo;
        }

        abstract public function __toString();
    }
?>
