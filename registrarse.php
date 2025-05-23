<?php

  require "autoloader.php";
  $modelo = new Model();
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['movil']) && isset($_POST['direccion'])  && isset($_POST['contrasena'])){
      $modelo->createUser(($_POST['nombre']) ,($_POST['apellido']) ,($_POST['movil']) ,($_POST['direccion']),($_POST['contrasena']));
      echo "
            <form id='postForm' action='verificarlogin.php' method='POST'>
                <input type='hidden' name='movil' value='".$_POST['movil']."'>
                <input type='hidden' name='contrasena' value='".$_POST['contrasena']."'>
            </form>
            <script>document.getElementById('postForm').submit();</script>";
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
          background-color:#74ACDF;
          font-family: 'Segoe UI', sans-serif;
          margin: 0;
          padding: 2rem;
          display: flex;
          justify-content: center;
          align-items: center;
          min-height: 100vh;
        }

        form {
          background-color: white;
          padding: 2rem 2.5rem;
          border-radius: 1rem;
          box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
          width: 100%;
          max-width: 500px;
        }

        form h2 {
          text-align: center;
          color: #74ACDF;
          margin-bottom: 1.5rem;
        }

        label {
          display: block;
          margin-top: 1rem;
          font-weight: 600;
          color: #333;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select,
        textarea {
          width: 100%;
          padding: 0.75rem;
          margin-top: 0.5rem;
          border: 2px solid #e0e0e0;
          border-radius: 0.5rem;
          transition: border-color 0.3s ease;
        }

        input:focus,
        select:focus,
        textarea:focus {
          outline: none;
          border-color: #74ACDF;
          box-shadow: 0 0 0 3px rgba(116, 172, 223, 0.2);
        }

        button {
          background-color: #74ACDF;
          color: white;
          border: none;
          padding: 0.75rem 1.5rem;
          margin-top: 1.5rem;
          width: 100%;
          border-radius: 0.5rem;
          font-size: 1rem;
          font-weight: 600;
          cursor: pointer;
          transition: background-color 0.3s ease;
        }

        button:hover {
          background-color: #5a98c4;
        }
        input[type="submit"] {
          background-color: #74ACDF;
          color: white;
          border: none;
          padding: 0.75rem 1.5rem;
          margin-top: 1.5rem;
          width: 100%;
          border-radius: 0.5rem;
          font-size: 1rem;
          font-weight: 600;
          cursor: pointer;
          transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
          background-color: #5a98c4;
        }
    </style>
    <link rel="icon" type="image/x-icon" href="img\LogoMinimalista.png" style="border: radius 5px;">
    <title>Document</title>
</head>
<body>
    <form method='post' style='display:flex; flex-direction:column; gap:10px; align-items:center;''>
        <label name='nombre'>Nombre</label>
        <input type='text' name='nombre'>
        <label name='apellido'>Apellidos</label>
        <input type='text' name='apellido'>
        <label name='movil'>móvil</label>
        <input type='num' name='movil'>
        <label name='direccion'>direccion</label>
        <input type='text' name='direccion'>
        <label name='contrasena'>contraseña</label>
        <input type='password' name='contrasena'>
        <button type='submit' name="nuevo" value="nuevo">Enviar</button>
    </form>
</body>
</html>