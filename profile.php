<?php

    session_start();

    require_once "autoloader.php";
    $modelo = new Model();

    require_once "require_login.php";
    require_login();

    $usuario_id = $_SESSION['usuario_id'];
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
    <title>Perfil de usuario</title>
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
<div class="profile" >
    <h3 class="profile" >Hola, <?php echo $modelo->getUsuarioID($usuario_id) ?>!</h3>
    <p style="width: 10%; height: 10%; margin-top: 7%;">Tienes <?php echo $modelo->getCredits($usuario_id) ?> creditos</p>
</div>

<div style="display: flex; justify-content: center;">
    <?php
        $modelo->drawResenas($usuario_id);
    ?>
</div>
</body>
</html>