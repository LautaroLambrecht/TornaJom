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
        public function creartipo() {
            $sql = "INSERT INTO tipos (descripcion) VALUES (?)";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([$this->descripcion]);
        }

        public static function leertipo($id, $pdo) {
            $sql = "SELECT * FROM tipos WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        
    }

?>