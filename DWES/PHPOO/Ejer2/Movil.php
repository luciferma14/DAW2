<?php
    class Terminal{
        public $numero;
        public $tarifa;
        public $tiempo;
        

    }

    class Movil extends Terminal{

        public function __construct($numero, $tarifa){
            
            $this->numero = $numero;
            $this->tarifa = $tarifa;
        }
        public function llama($terminal, $segundosDeLlamada){

        }
    }
?>