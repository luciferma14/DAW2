<?php

    include_once "Publicacion.php";

    class Libro extends Publicacion {

        private $prestado = false;

        public function presta() {
            if ($this->prestado) {
                echo "No se ha podido prestar, el libro '{$this->titulo}' ya está prestado.<br>\n";
            } else {
                $this->prestado = true;
                echo "Se ha prestado el libro '{$this->titulo}'.<br>\n";
            }
        }

        public function devuelve() {
            $this->prestado = false;
            echo "Se ha devuelto el libro '{$this->titulo}'.<br>\n";
        }

        public function estaPrestado() {
            return $this->prestado;
        }

        public function mostrarPrestado() {
            if ($this->prestado) {
                echo "El libro '{$this->titulo}' está prestado<br>\n";
            } else {
                echo "El libro '{$this->titulo}' no está prestado<br>\n";
            }
        }

        public function __toString() {
            $estado = $this->prestado ? "prestado" : "no prestado";
            return "ISBN: {$this->isbn}, título: {$this->titulo}, año de publicación: {$this->anyo} ({$estado})<br>\n";
        }
    }
?>
