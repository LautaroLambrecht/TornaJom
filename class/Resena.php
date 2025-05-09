<?php

    class Resena{

        private $id;
        private $estrellas;
        private $descripcion;
        private $id_usuario;
        private $tipo;

        public function __construct($estrellas, $descripcion, $id_usuario, $tipo){
            $this->estrellas = $estrellas;
            $this->descripcion = $descripcion;
            $this->id_usuario = $id_usuario;
            $this->tipo = $tipo;
        }

        public function getId(){
            return $this->id;
        }

        public function getEstrellas(){
            return $this->estrellas;
        }

        public function getIdUsuario(){
            return $this->id_usuario;
        }

        public function getTipo(){
            return $this->tipo;
        }
        
    }
?>