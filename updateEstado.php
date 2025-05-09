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

        var_dump($nuevoEstado);

        if ($nuevoEstado == 'pendiente'){
            $id_realizacion = null;
            $obj->updateEstado($id, $nuevoEstado, $id_realizacion);
        }

        if ($nuevoEstado == 'reclamado'){
            $id_realizacion = $_GET['id_realizacion'];
            $obj->updateEstado($id, $nuevoEstado, $id_realizacion);
        }

        if ($nuevoEstado == 'completado'){
            $id_realizacion = null;
            $obj->updateEstado($id, $nuevoEstado, $id_realizacion);
        }
    }

    header("Location: profile.php"); 
    exit();
