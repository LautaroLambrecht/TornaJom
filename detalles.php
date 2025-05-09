<?php
    require_once "autoloader.php";

    $modelo = new Model();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    .container {
        max-width: 800px;
        margin: 40px auto;
        padding: 20px;
        background-color: white;
        border: 2px solid #74ACDF;
        border-radius: 16px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        font-family: 'Segoe UI', sans-serif;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }


    td {
        padding: 14px 16px;
        border-bottom: 1px solid #ddd;
        color: #333;

    }

    th {
        background-color: #74ACDF;
        color: white;
        padding: 14px 16px;
        text-align: left;
        border-bottom: 2px solid #5d94c3;
    }
    button {
        background-color: #74ACDF;
        color: white;
        border: none;
        padding: 0.75rem 1.5rem;
        margin-top: 1.5rem;
        width: 10%;
        display:flex;
        justify-content:center;
        border-radius: 0.5rem;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #5a98c4;
    }
</style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" type="image/x-icon" href="img\LogoMinimalista.png" style="border: radius 5px;">
    <title>Document</title>
</head>
<body>
  <header>
        <a class="logo" href="index.php">
            <img src="img/LogoMinimalista.png" alt="Logo" style="border-radius: 5px;">
        </a>
        <button class="btn btn-primary boton-header" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical three-points" viewBox="0 0 16 16">
            <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
            </svg>
        </button>
        <div class="offcanvas offcanvas-end" style="width: 23%;" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">
                <?php

                    if ($usuario_id === null ){
                        echo "<p>Hola, <a href='registrarse.php'>registrate</a> o <a href='login.php'>inicia sesion</a>!</p>";
                    }
                    else{
                        echo "<p>Hola, ".$modelo->getUsuarioID($usuario_id)."</p>";
                    }

                ?>
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <?php

                    if ($usuario_id !== null){
                        echo "
                            <a href='profile.php'><p>Ver mi perfil</p></a>
                            <a href='createWorks.php'><p>Crear Trabajo</p></a>
                            <a href='trabajosPublicados.php'><p>Trabajos Publicados</p></a>
                            <a href='trabajosPendientes.php'><p>Tus trabajos pendientes</p></a>
                            <a style='position:absolute; bottom:0;' href='cerrarsesion.php'><p>Cerrar sesion</p></a>";
                    }
            
            ?>
        </div>
        </div>
        </div>
    </header>
    
    <?php
        if(isset($_GET['id'])){
            $id = (int)$_GET['id'];
            $modelo->drawWorkId($id);
        }
    ?>

<div style="display:flex; justify-content:center;"> 
    <button ><a href='index.php'>Volver</a></button>
</div>
</body>
</html>