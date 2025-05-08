<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: loginusuario.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" type="image/x-icon" href="../img/LogoMinimalista.png" style="border: radius 5px;">
    <title>TornaJom</title> 
    <style>
         .cards-container {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 30px;
        flex-wrap: wrap;
      }
      
      .card {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        text-align: center;
        width: 250px;
      }
      
      .card h3 {
        margin-bottom: 10px;
      }
      
      .card button {
        margin-top: 10px;
        padding: 8px 16px;
        background-color: #6ba8d6;
        border: none;
        color: white;
        border-radius: 6px;
        cursor: pointer;
      }
      
      .card button:hover {
        background-color: #5893c4;
      }


    </style>
</head>
<body class="perfil">
<header>
        <img class="logo" src="../img/LogoMinimalista.png" alt="">
        <button class="btn btn-primary boton-header" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
  <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
</svg></button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">Offcanvas right</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            ...
        </div>
        </div>
        </div>
    </header>
        
    <h2 class="perfil_contenido">Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</h2>
    

            <a href="../index.php">
    <input type="button" value="Ir al inicio">
</a>



<div class="cards-container">
  
<div class="card">
    <h3>Publicar trabajo</h3>
    <p>Ofrece un trabajo.</p>
    <a href="../createworks.php"> <button>Publicar trabajo</button></a>
  </div>
  <div class="card">
    <h3>Ir al inicio</h3>
    <p>vamos a ver que se cuece hoy por TornaJom.</p>
    <a href="../index.php"> <button>Ir al inicio</button> </a>
  </div>
  <div class="card">
    <h3>Cierre de sesion</h3>
    <p>¡Esperamos que vuelvas pronto!</p>
    <a href="cierresesion.php"> <button>Cerrar sesion</button> </a>
  </div>
</div>
    
</body>
</html>