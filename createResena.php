<?php

    session_start();

    require_once "autoloader.php";
    $modelo = new Model();

    require_once "require_login.php";
    require_login();

    $usuario_id = $_SESSION['usuario_id'];


    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
      if (isset($_POST['id_trabajo']) && isset($_POST['estrella']) && isset($_POST['descripcion'])  && isset($_POST['id_realizacion'])){
        $modelo->createresenas(($_POST['estrella']) ,($_POST['descripcion']),($_POST['id_realizacion']),($_POST['id_trabajo']));
        header("Location: index.php");
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
        <a class="logo" href="index.php">
            <img src="img/LogoMinimalista.png" alt="Logo" style="border-radius: 5px;">
        </a>
        <button class="btn btn-primary boton-header" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical three-points" viewBox="0 0 16 16">
  <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
</svg></button>
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
    <form class="creadorResenas" method="POST">
      <label for="estrella">Cuantas estrellas?</label>
      <div style="display: flex; flex-direction: row; justify-content:center;">
        <input type="radio" name="estrella" id="estrella5" value="5"><label for="estrella5">★</label>
        <input type="radio" name="estrella" id="estrella4" value="4"><label for="estrella4">★</label>
        <input type="radio" name="estrella" id="estrella3" value="3"><label for="estrella3">★</label>
        <input type="radio" name="estrella" id="estrella2" value="2"><label for="estrella2">★</label>
        <input type="radio" name="estrella" id="estrella1" value="1"><label for="estrella1">★</label>
      </div>
      <label for="descripcion">Comentanos sobre tu experiencia:</label>
      <textarea name="descripcion"></textarea>
      <input type="hidden" name="id_trabajo" value="<?php echo $_POST['id_trabajo'] ?>">
      <input type="hidden" name="id_realizacion" value="<?php echo $_POST['id_realizacion'] ?>">
      <input style="width:15%; margin: 10px auto;" type="submit" value="Enviar Reseña" class="btn btn-primary">
    </form>
</body>
</html>