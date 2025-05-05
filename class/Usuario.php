<?php

    class Usuario {

        private $id;
        private $nombre;
        private $apellido;
        private $movil;
        private $direccion;
        private $creditos;

        public function __construct($nombre, $apellido, $movil, $direccion, $creditos = 15){

            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->movil = $movil;
            $this->direccion = $direccion;
            $this->creditos = $creditos;

        }

        public function getId(){
            return $this->id;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function getApellido(){
            return $this->apellido;
        }

        public function getMovil(){
            return $this->movil;
        }

        public function getDireccion(){
            return $this->direccion;
        }

        public function getCreditos(){
            return $this->creditos;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function setApellido($apellido){
            $this->apellido = $apellido;
        }

        public function setMovil($movil){
            $this->movil = $movil;
        }

        public function setDireccion($direccion){
            $this->direccion = $direccion;
        }

        public function setCreditos($creditos, $operacion){
            if ($operacion == "Suma"){
                $this->creditos += $creditos;
            }
            else{
                $this->creditos -= $creditos;
            }
        }

    }

?>