<?php
    session_start();

    require_once "autoloader.php";
    $modelo = new Model();

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $modelo->verificarUsuario($_POST['movil'], $_POST['contrasena']);
    }

    if (is_string($id)){
        $_SESSION['error'] = "Usuario o contraseña incorrectos.";
        header("Location: login.php");
    }
    else{
        $_SESSION['usuario_id'] = $id;
        header("Location: index.php");
    }