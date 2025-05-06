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
        public function crearresenas($estrellas, $descripcion, $id_usuario, $tipo) {
        $sql = "INSERT INTO resenas (estrellas, descripcion, id_usuario, tipo) VALUES ($estrellas, '$descripcion', $id_usuario, $tipo)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$this->estrellas, $this->descripcion, $this->id_usuario, $this->tipo]);
    }

    public function leerresenas($id, $pdo) {
        $sql = "SELECT * FROM resenas WHERE id = $id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>