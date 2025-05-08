<?php
require 'autoloader.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $nuevoEstado = 'completado';

    $obj = new model(); 
    $obj->updateEstado($id, $nuevoEstado);
}

header("Location: index.php"); 
exit();
