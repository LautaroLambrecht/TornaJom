<?php

    session_start();

    require_once "require_login.php";
    require_login();

    $usuario_id = $_SESSION['usuario_id'];

    require 'autoloader.php'; 

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $nuevoEstado = $_GET['estado'];

        $obj = new model(); 

        if ($nuevoEstado == 'pendiente'){
            $id_realizacion = null;
            $obj->updateEstado($id, $nuevoEstado, $id_realizacion);
            header("Location: index.php");
        }

        if ($nuevoEstado == 'reclamado'){
            $id_realizacion = $_GET['id_realizacion'];
            $obj->updateEstado($id, $nuevoEstado, $id_realizacion);
            header("Location: index.php");
        }

        if ($nuevoEstado == 'completado'){
            $id_realizacion = null;
            $obj->updateEstado($id, $nuevoEstado, $id_realizacion);
            $id_realizacion = $obj->getIdRealizacion($id);
            $creditos = $obj->getPaid($_GET['id']);
            $obj->addCredits($id_realizacion, $creditos);
            echo "
            <form id='postForm' action='createResena.php' method='POST'>
                <input type='hidden' name='id_trabajo' value='".$_GET['id']."'>
                <input type='hidden' name='id_realizacion' value='".$id_realizacion."'>
            </form>
            <script>document.getElementById('postForm').submit();</script>";
            exit();
        }
    }
