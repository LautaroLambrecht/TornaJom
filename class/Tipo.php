<?php

    class Tipo{

        private $id;
        private $descripcion;

        public function __construct($descripcion){
            $this->descripcion = $descripcion;
        }

        public function getId(){
            return $this->id;
        }

        public function getDescripcion(){
            return $this->descripcion;
        }
        
    }

?>