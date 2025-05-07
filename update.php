<?php
require_once "autoloader.php";
$modelo = new Model();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['modificar'])){
    if (isset($_POST['estado']) && isset($_POST['titulo'])  && isset($_POST['descripcion']) && isset($_POST['id_publicacion'])
    && isset($_POST['id_realizacion'])&& isset($_POST['zona'])&& isset($_POST['especialidad'])){
        $modelo->updateTarea($_POST['id'], $_POST['estado'], $_POST['titulo'], $_POST['descripcion'], $_POST['id_publicacion'], $_POST['id_realizacion'], $_POST['zona'], $_POST['descripcion']);
    
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
<form method="post">

    <label for="titulo">Titulo</label>
    <input type="text" name="titulo" value="<?php echo $_POST['titulo'];?>">

    <label for="descripcion">Descripción</label>
    <input type="text" name="descripcion" value="<?php echo $_POST['descripcion'];?>">


    <label for="estado">Estado</label>
    <input type="text" name="estado" value="<?php echo $_POST['estado'];?>">

    <label for="id_publicacion">ID Publicante</label>
    <input type="text" name="id_publicacion" value="<?php echo $_POST['id_publicacion'];?>">

    <label for="id_realizacion">ID Realización</label>
    <input type="text" name="id_realizacion" value="<?php echo $_POST['id_realizacion'];?>">

    <label for="zona">Zona</label>
    <input type="text" name="zona" value="<?php echo $_POST['zona'];?>">

    <label for="especialidad">Especialidad</label>
    <input type="text" name="especialidad" value="<?php echo $_POST['especialidad'];?>">

    <input type="submit" name="modificar" value="modificar">
</form>

</body>
</html>