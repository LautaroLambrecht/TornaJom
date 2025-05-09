<?php

    session_start();

    require_once "require_login.php";
    require_login();

    require "autoloader.php";
    $modelo = new Model();
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
      if ( isset($_POST['titulo']) && isset($_POST['descripcion']) && isset($_POST['zona'])  && isset($_POST['id_especialidad'])){
          $modelo->createWorks(($_POST['titulo']) ,($_POST['descripcion']) ,($_POST['zona']),($_POST['id_especialidad']));
      }
    }
?>
<style>
    body {
      background-color:#74ACDF;
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 2rem;
      height: 650px;
    }

    div {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    form{
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

    button, a {
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

    .btn-index{
      display: flex;
      justify-content: center;
      width: 20%;
    }

    a{
      margin-top: 5px;
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img\LogoMinimalista.png" style="border: radius 5px;">
    <title>Document</title>
</head>
<body>
    <div style='display:flex; justify-content:center;'>
      <form method='post' style='display:flex; flex-direction:column; gap:10px; align-items:center;'>
          <label name='titulo'>titulo</label>
          <input type='text' name='titulo'>
          <label name='descripcion'>descripcion</label>
          <textarea name="descripcion"></textarea>
          <label name='zona'>zona</label>
          <input type='text' name='zona'>
          <label name='id_especialidad'>especialidad</label>
          <select name="id_especialidad">
            <option disabled selected'>selecciona</option>
            <option value='1'>pintura</option>
            <option value='2'>electricidad</option>
            <option value='3'>fontaneria</option>
            <option value='4'>jardineria</option>
          </select>
          <button type='submit' name="nuevo" value="nuevo">Enviar</button>
        </form>
    </div>
    <div style='display:flex; justify-content:center;'>
      <button class="btn-index"><a href="index.php">Volver a inicio</a></button>
    </div>
</body>
</html>