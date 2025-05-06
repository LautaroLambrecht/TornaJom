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
    public function crearresenas() {
        $sql = "INSERT INTO resenas (estrellas, descripcion, id_usuario, tipo) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$this->estrellas, $this->descripcion, $this->id_usuario, $this->tipo]);
    }

    public static function leerresenas($pdo) {
        $sql = "SELECT * FROM resenas";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function leerPorIdresenas($id, $pdo) {
        $sql = "SELECT * FROM resenas WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function actualizarresenas($id, $estrellas, $descripcion, $id_usuario, $tipo, $pdo) {
        $sql = "UPDATE resenas SET estrellas = ?, descripcion = ?, id_usuario = ?, tipo = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$estrellas, $descripcion, $id_usuario, $tipo, $id]);
    }

    public static function eliminarresenas($id, $pdo) {
        $sql = "DELETE FROM resenas WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$id]);
    }

?>