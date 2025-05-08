<?php
  require "autoloader.php";
 $modelo = new Model();
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['movil']) && isset($_POST['direccion'])  && isset($_POST['contrasena'])){
        $modelo->createUser(($_POST['nombre']) ,($_POST['apellido']) ,($_POST['movil']) ,($_POST['direccion']),($_POST['contrasena']));
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img\LogoMinimalista.png" style="border: radius 5px;">
    <title>Document</title>
</head>
<body>
    <form method='post' style='display:flex; flex-direction:column; gap:10px; align-items:center;''>
                <label name='nombre'>nombre</label>
                <input type='text' name='nombre'>
                <label name='apellido'>apellido</label>
                <input type='text' name='apellido'>
                <label name='movil'>movil</label>
                <input type='num' name='movil'>
                <label name='direccion'>direccion</label>
                <input type='text' name='direccion'>
                <label name='contrasena'>contrasena</label>
                <input type='password' name='contrasena'>
                <button type='submit' name="nuevo" value="nuevo">Enviar</button>
        </form>
</body>
</html>