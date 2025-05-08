<?php 

    /*require_once "../autoloader.php";
    require_once "../autoloaderPages.php";*/

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
                        echo "<div class='trabajoPares'>";
                    }
                        echo "<div class='trabajo'>";
                        if ($row['id_especialidad'] == 2){
                            echo "<img src='img\Electricista.jpg'>";
                        }
                        elseif ($row['id_especialidad'] == 1){
                            echo "<img src='img\Pintura.png'>";
                        }
                        elseif ($row['id_especialidad'] == 3){
                            echo "<img src='img\Fontaneria.jpg'>";
                        }
                        elseif ($row['id_especialidad'] == 4){
                            echo "<img src='img\Jardineria.png'>";
                        }
                        echo "
                        <h1>".$row['titulo']."</h1>
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
                                <div class='consultor'>
                                    <button type='submit'>Consultar</button>
                                </div>
                        </form>
                        <form method='POST' action='updateEstado.php'>
                        <input type='hidden' name='id' value='" . $row['id'] . "'>
                        <input type='submit' value='Marcar como completado'>
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
        public function updateEstado($id, $estado) { 
            $sql = "UPDATE trabajo SET estado='$estado' WHERE id='$id'";
            $this->conn->query($sql); 
        }
        
        public function getUsuarioID($id){
            $sql = "SELECT nombre as nombre FROM usuario where id = $id";
            $stmt = $this->conn->query($sql);
            return $stmt->fetch(PDO::FETCH_ASSOC)['nombre'];
        }
        
        public function createWorks( $titulo, $descripcion,$zona, $id_especialidad){
            $sql = "INSERT INTO trabajo (titulo, descripcion, zona , id_especialidad)  values
             ('$titulo', '$descripcion', '$zona', '$id_especialidad')";
             $this->conn->query($sql);
        }
        public function createUser($nombre,$apellido,$movil,$direccion, $contrasena ){
            $sql = "INSERT INTO usuario (nombre, apellido, movil, direccion, creditos, contrasena) values 
            ('$nombre', '$apellido', '$movil', '$direccion', '10','$contrasena')";
            $this->conn->query($sql);
        }
        public function getPaginatedTask($limit, $offset){
            $sql = "SELECT * FROM trabajo limit $limit OFFSET $offset ";
            return $this->conn->query($sql);
       }
       
       public function showPaginator($limit, $offset){
        $output = [];
        $result = $this->getPaginatedTask($limit, $offset);
        if($result->rowCount() > 0){
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                $output[] = $row;
            }
        }else{
            $output[] = "no resultado"; 
        } return $output;
        }
        
        public function countTrabajo(){
            $sql= "select count(*) as total from trabajo";
            $stmt = $this->conn->query($sql);
            return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
        }
    }

?>