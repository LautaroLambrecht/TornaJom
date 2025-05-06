<?php 

    require_once "Conection.php";

    class Model extends Conection{

        public function getAllWorks(){
            $sql = "SELECT * FROM trabajo";
            $result = $this->conn->query($sql);
            return $result;
        }

        public function drawAllWorks(){
            $result = $this->getAllWorks();
            $contador = 0;
            if ($result->rowCount() > 0){
                while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                    if ($contador % 2 == 0){
                        echo "<div style='display:flex; flex-direction:row; gap:50px; justify-content:center'>";
                    }
                    echo "<div class='trabajo' style='width:40%; height:320px';>
                        <img src='img\Electricista.jpg' style='justify-content:center; width:100%;'>
                        <h1 style='font-size:15px;width:100%;'>".$row['titulo']."</h1>
                        <p>".$row['descripcion']."</p>
                    </div>";
                    $contador++;
                    if ($contador % 2 == 0){
                        echo "</div>";
                    }
                }
                if ($contador % 2 != 0){
                    echo "</div>";
                }
            }
        }
        
    }

?>