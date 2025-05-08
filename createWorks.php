<?php
  require "autoloader.php";
 $modelo = new Model();
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
    <title>Document</title>
</head>
<body>
    <form method='post' style='display:flex; flex-direction:column; gap:10px; align-items:center;''>
                <label name='titulo'>titulo</label>
                <input type='text' name='titulo'>
                <label name='descripcion'>descripcion</label>
                <textarea name="descripcion"></textarea>
                <label name='zona'>zona</label>
                <input type='text' name='zona'>
                <label name='id_especialidad'>especialidad</label>
                <select name="id_especialidad">
                <option value='1'>seleciona</option>
                <option value='2'>electricidad</option>
                <option value='3'>fontaneria</option>
                <option value='4'>plomeria</option>
                </select>
                <button type='submit' name="nuevo" value="nuevo">Enviar</button>
        </form>
        <button><a href="index.php" class="btn-index">Index</a></button>
</body>
</html>