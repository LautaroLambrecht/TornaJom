<?php

    class Trabajo{

        private $id;
        private $estado;
        private $titulo;
        private $descripcion;
        private $id_publicacion;
        private $id_realizacion;
        private $zona;
        private $especialiadad; //esto va encadenado a la tabla tipodetrabajo?

        public function __construct($estado, $titulo, $descripcion, $id_publicacion, $id_realizacion, $zona, $especialiadad){
            $this->estado = $estado;
            $this->titulo = $titulo;
            $this->descripcion = $descripcion;
            $this->id_publicacion = $id_publicacion;
            $this->id_realizacion = $id_realizacion;
            $this->zona = $zona;
            $this->especialiadad = $especialiadad;
        }

        public function getId(){
            return $this->id;
        }

        public function getEstado(){
            return $this->estado;
        }

        public function getTitulo(){
            return $this->titulo;
        }

        public function getDescripcion(){
            return $this->descripcion;
        }

        public function getIdPublicacion(){
            return $this->id_publicacion;
        }

        public function getIdRealizacion(){
            return $this->id_realizacion;
        }

        public function getZona(){
            return $this->zona;
        }

        public function getEspecialidad(){
            return $this->especialiadad;
        }

        public function setEstado(){
            if ($this->estado == "pendiente"){
                $this->estado = "completado";
            }
        }

        public function setTitulo($titulo){
            $this->titulo = $titulo;
        }

        public function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
        }

        public function setIdRealizacion($id_realizacion){
            $this->id_realizacion = $id_realizacion;
        }

        public function setEspecialidad($especialiadad){
            $this->especialiadad = $especialiadad;
        }
    }

?>