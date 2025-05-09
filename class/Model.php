<?php 

    class Model extends Conection{

        public function getAllWorks(){
            $sql = "SELECT * FROM trabajo where estado = 'pendiente'";
            $result = $this->conn->query($sql);
            return $result;
        }

        public function getCountPaginated($limit, $offset){
            $sql = "SELECT COUNT(*) FROM trabajo limit $limit OFFSET $offset ";
            $stmt = $this->conn->query($sql);
            return $stmt->fetchColumn();
;
        }

        public function getPaginatedTask($limit, $offset) {
        $sql = "SELECT * FROM trabajo WHERE estado = 'pendiente' LIMIT $limit OFFSET $offset";
        $stmt = $this->conn->query($sql);
            if ($stmt) {
                $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $this->cantidadResultadosPagina = count($resultados);
                return $resultados;
            }
        return [];
        }

       
       public function showPaginator($limit, $offset){
            $result = $this->getPaginatedTask($limit, $offset);
            $contador = 0;
            $total = count($result);

            if ($total > 0){
                foreach ($result as $row) {
                    if ($contador % 2 == 0){
                        echo "<div class='trabajoPares'>";
                    }

                    if ($total % 2 != 0 && $contador == $total - 1){
                        echo "<div class='trabajo ultimo'>";
                    } else {
                        echo "<div class='trabajo'>";
                    }

                    switch ($row['id_especialidad']) {
                        case 1: echo "<img src='img/Pintura.png'>"; break;
                        case 2: echo "<img src='img/Electricista.jpg'>"; break;
                        case 3: echo "<img src='img/Fontaneria.jpg'>"; break;
                        case 4: echo "<img src='img/Jardineria.png'>"; break;
                    }

                    echo "
                        <h1>".$row['titulo']."</h1>
                        <p>".$row['descripcion']."</p>
                        <form action='claimWork.php' method='get'>
                            <input type='hidden' name='id' value='".$row['id']."'>
                            <div class='consultor'>
                                <button type='submit'>Consultar</button>
                            </div>
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

        
        public function countTrabajo(){
            $sql= "select count(*) as total from trabajo where estado = 'pendiente'";
            $stmt = $this->conn->query($sql);
            return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
        }

        public function drawAllWorks(){
            $result = $this->getAllWorks();
            $contador = 0;
            $total = $this->countTrabajo();
            if ($result->rowCount() > 0){
                while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                    if ($contador % 2 == 0){
                        echo "<div class='trabajoPares'>";
                    }
                    if ($total % 2 != 0 && $contador == $total - 1){
                         echo "<div class='trabajo ultimo'>";
                    }
                    else{
                        echo "<div class='trabajo'>";
                    }
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
                    </form>
                    <form action='claimWork.php' method='get'>
                            <input type='hidden' name='id' value='".$row['id']."'>
                            <div class='consultor'>
                                <button type='submit'>Consultar</button>
                            </div>
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
            return $stmt;
        }

        public function drawWorkId($id){
            $result = $this->getWorksId($id);
            if ($result->rowCount() > 0){
                while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                    echo "<div class='trabajoClaim trabajo'>";
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
                    <p>".$row['zona']."</p>
                    </div>";
                }
            }
        }

        public function updateEstado($id, $estado, $id_realizacion) {
            $id = (int)$id;
            if ($id_realizacion === null && $estado == 'pendiente') {
                $sql = "UPDATE trabajo SET estado = '$estado', id_realizacion = NULL WHERE id = $id";
            } 
            if  ($id_realizacion === null && $estado == 'completado'){
                $sql = "UPDATE trabajo SET estado = '$estado' WHERE id = $id";
            }

            if (!empty($id_realizacion) && $estado == 'reclamado')
            $this->conn->query($sql);
        }
        
        public function getUsuarioID($id){
            $sql = "SELECT nombre as nombre FROM usuario where id = $id";
            $stmt = $this->conn->query($sql);
            return $stmt->fetch(PDO::FETCH_ASSOC)['nombre'];
        }
        
        public function createWorks($titulo, $descripcion, $zona, $id_especialidad){
            $sql = "INSERT INTO trabajo (titulo, descripcion, zona , id_especialidad)  values
            ('$titulo', '$descripcion', '$zona', $id_especialidad)";
            $this->conn->query($sql);
        }
        public function createUser($nombre,$apellido,$movil,$direccion, $contrasena ){
            $sql = "INSERT INTO usuario (nombre, apellido, movil, direccion, creditos, contrasena) values 
            ('$nombre', '$apellido', '$movil', '$direccion', '10','$contrasena')";
            $this->conn->query($sql);
        }
        
        public function verificarUsuario($movil, $contrasena){
            $output = "";
            $sql = "SELECT movil as movil, id as id, contrasena as pass FROM usuario where movil = $movil";
            $stmt = $this->conn->query($sql);
            if ($stmt) {
                $stmt = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($stmt && $stmt['movil'] == $movil && $stmt['pass'] == $contrasena) {
                    return $stmt['id'];
                } else {
                    $output = "Contraseña incorrecta";
                }
            } else {
            $output = "Usuario no encontrado";
        }
    
    return $output;
        }

        public function getWorksUser($id){
            $sql = "SELECT * FROM trabajo where id_publicacion = $id AND (estado = 'pendiente' OR estado = 'reclamado')";
            $stmt = $this->conn->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function countWorkUser($id){
            $sql = "SELECT COUNT(*) as total FROM trabajo where id_publicacion = $id";
            $stmt = $this->conn->query($sql);
            return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
        }

        public function drawWorksUser($id){
            $result = $this->getWorksUser($id);
            $contador = 0;
            $total = $this->countWorkUser($id);
            if (!empty($result)){
                foreach($result as $row){
                    if ($contador % 2 == 0){
                        echo "<div class='trabajoPares' style='margin-top: 2%'>";
                    }
                    if ($total % 2 != 0 && $contador == $total - 1){
                         echo "<div class='trabajo ultimo'>";
                    }
                    else{
                        echo "<div class='trabajo'>";
                    }
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
                    <div class='dropdown'>
                        <button style='background-color:#74ACDF'class='btn btn-secondary dropdown-toggle acciones' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
                            Acciones
                        </button>
                        <ul class='dropdown-menu'>
                            <li><a class='dropdown-item' href='detalles.php?id=".$row['id']."'>Consultar</a></li>
                            <li><a class='dropdown-item' href='updateEstado.php?id=".$row['id']."&estado=completado'>Marca como realizado</a></li>
                            <li>
                                <form action='update.php' method='POST' style='margin: 0; padding: 0;'>
                                    <input type='hidden' name='id' value='". $row['id']."'> 
                                    <input type='hidden' name='titulo' value='". $row['titulo']."'>
                                    <input type='hidden' name='descripcion' value='". $row['descripcion']."'>
                                    <input type='hidden' name='estado' value='". $row['estado']."'>
                                    <input type='hidden' name='id_publicacion' value='". $row['id_publicacion']."'>
                                    <input type='hidden' name='id_realizacion' value='". $row['id_realizacion']."'>
                                    <input type='hidden' name='zona' value='". $row['zona']."'>
                                    <input type='hidden' name='id_especialidad' value='". $row['id_especialidad']."'>
                                    <button type='submit' class='dropdown-item'>Modificar</button>
                                </form>
                            </li>
                        </ul>
                    </div>
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

        public function getClaimedWork($id){
            $sql = "SELECT * FROM trabajo where id_realizacion = $id";
            $stmt = $this->conn->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getCountClaimed($id){
            $sql = "SELECT COUNT(*) as total FROM trabajo where id_realizacion = $id";
            $stmt = $this->conn->query($sql);
            return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
        }

        public function drawClaimedWorks($id){
            $result = $this->getClaimedWork($id);
            $contador = 0;
            $total = $this->getCountClaimed($id);
            if (!empty($result)){
                foreach($result as $row){
                    if ($contador % 2 == 0){
                        echo "<div class='trabajoPares' style='margin-top: 2%'>";
                    }
                    if ($total % 2 != 0 && $contador == $total - 1){
                         echo "<div class='trabajo ultimo'>";
                    }
                    else{
                        echo "<div class='trabajo'>";
                    }
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
                    <div class='dropdown'>
                        <button style='background-color:#74ACDF'class='btn btn-secondary dropdown-toggle acciones' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
                            Acciones
                        </button>
                        <ul class='dropdown-menu'>
                            <li><a class='dropdown-item' href='detalles.php?id=".$row['id']."'>Consultar</a></li>
                            <li>
                                <form action='updateEstado.php' method='GET' style='margin: 0; padding: 0;'>
                                    <input type='hidden' name='id' value='". $row['id']."'> 
                                    <input type='hidden' name='estado' value='pendiente'>
                                    <button type='submit' class='dropdown-item'>Cancelar trabajo</button>
                                </form>
                            </li>
                        </ul>
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