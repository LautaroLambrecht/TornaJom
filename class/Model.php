<?php 

    require_once "Conection.php";

    class Model extends Conection{

        public function getAllWorks(){
            $sql = "SELECT * FROM trabajo where estado <> 'completado'";
            $result = $this->conn->query($sql);
            return $result;
        }

        public function drawAllWorks(){
            $result = $this->getAllWorks();
            if ($result->rowCount() > 0){
                while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                    echo "<div style='width:50%; height:320px'; display:flex; flex-direction:row;>
                        <img src='img\Electricista.jpg' style='justify-content:center'>
                        <h1 style='font-size:15px;width:135px;'>".$row['titulo']."</h1>
                        <p style=''>".$row['descripcion']."</p>
                    </div>";
                }
            }
        }
        
    }

?>