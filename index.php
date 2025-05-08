<?php
session_start(); 
require_once "autoloader.php";

$modelo = new Model();

$usuario_id = $_SESSION['usuario_id'] ?? null;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['modificar'])) {
    if (isset($_POST['estado'], $_POST['titulo'], $_POST['descripcion'], $_POST['id_publicacion'],
            $_POST['id_realizacion'], $_POST['zona'], $_POST['id_especialidad'])) {
        $modelo->updateWorks(
            $_POST['id'], 
            $_POST['estado'], 
            $_POST['titulo'], 
            $_POST['descripcion'], 
            $_POST['zona'], 
            $_POST['id_especialidad']
        );
    }
}
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['movil']) && isset($_POST['direccion']) && isset($_POST['creditos']) && isset($_POST['contrasena'])){
            $modelo->createUser(($_POST['nombre']) ,($_POST['apellido']) ,($_POST['movil']) ,($_POST['direccion']),($_POST['creditos']),($_POST['contrasena']));
    }
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if ( isset($_POST['titulo']) && isset($_POST['descripcion']) && isset($_POST['zona'])  && isset($_POST['id_especialidad'])){
            $modelo->createWorks(($_POST['titulo']) ,($_POST['descripcion']) ,($_POST['zona']),($_POST['id_especialidad']));
    }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" type="image/x-icon" href="img\LogoMinimalista.png" style="border: radius 5px;">
    <title>TornaJom</title> 
</head>
<body>
    <header>
        <img class="logo" src="img/LogoMinimalista.png" alt="">
        <button class="btn btn-primary boton-header" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
  <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
</svg></button>
        <div class="offcanvas offcanvas-end" style="width: 23%;" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">
                <?php

                    if ($usuario_id === null ){
                        echo "<h2>Hola, click aqui para registrarte o iniciar sesion!</h2>";
                    }
                    else{
                        echo "<h2>Hola, $modelo->getUsuarioID($usuario_id);</h2>";
                    }

                ?>
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            ...
        </div>
        </div>
        </div>
    </header>
    <main>
        <?php 
        $modelo->drawAllWorks();
        ?>
    </main>
    <td> <button><a href='registrarse.php'>registrarse</a></button></td>
    <td> <button><a href='createWorks.php'>crear nuevo trabajo</a></button></td>
</body>
</html>