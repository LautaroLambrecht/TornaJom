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
                    echo "<div class='trabajo' style='width:40%; height:340px';>
                        <img src='img\Electricista.jpg' style='justify-content:center; width:100%;'>
                        <h1 style='font-size:15px;width:100%;'>".$row['titulo']."</h1>
                        <p>".$row['descripcion']."</p>
                        <form action='update.php' method='POST'>
                        <input type='hidden' name='id' value='".$row['id']."'> 
                        <input type='hidden' name='titulo' value='".$row['titulo']."'>
                        <input type='hidden' name='descripcion' value='".$row['descripcion']."'>
                        <input type='hidden' name='estado' value='".$row['estado']."'>
                        <input type='hidden' name='id_publicacion' value='".$row['id_publicacion']."'>
                        <input type='hidden' name='id_realizacion' value='".$row['id_realizacion']."'>
                        <input type='hidden' name='zona' value='".$row['zona']."'>
                        <input type='hidden' name='id_especialidad' value='".$row['id_especialidad']."'>
                        <button type='submit' >MODIFICAR</button>
                        </form>
                        <form action='detalles.php' method='get'>
                                <input type='hidden' name='id' value='".$row['id']."'>
                                <button type='submit'>Consultar</button>
                        </form>
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
        

        public function updateWorks($id, $estado, $titulo, $descripcion, $zona, $id_especialidad){
            $sql= "update trabajo set titulo='$titulo', estado='$estado', descripcion='$descripcion', zona='$zona', id_especialidad = '$id_especialidad' where id='$id'";
            $this->conn->query($sql);
            
        }

        public function getWorksId($id){
            $sql = "SELECT * FROM trabajo WHERE id=$id";
            $stmt = $this->conn->query($sql);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }

?>