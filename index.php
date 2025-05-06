<?php
    require "autoloader.php";
    $modelo = new Model();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['modificar'])){
        if (isset($_POST['estado']) && isset($_POST['titulo'])  && isset($_POST['descripcion']) && isset($_POST['id_publicacion'])
        && isset($_POST['id_realizacion'])&& isset($_POST['zona'])&& isset($_POST['especialidad'])){
            $modelo->updateWorks($_POST['id'], $_POST['estado'], $_POST['titulo'], $_POST['descripcion'], $_POST['id_publicacion'], $_POST['id_realizacion'], $_POST['zona'], $_POST['descripcion']);
        
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
    <header style="background-color:#74ACDF; width: 100%; height:120px"></header>
    <?php $modelo->drawAllWorks();  
    

    $trabajos = $modelo->getAllWorks();

    echo "<form action='update.php' method='POST'>";
    foreach($trabajos as $trabajo){
        echo "
            <input type='hidden' name='id' value='".$trabajo['id']."'> 
            <input type='hidden' name='titulo' value='".$trabajo['titulo']."'>
            <input type='hidden' name='descripcion' value='".$trabajo['descripcion']."'>
            <input type='hidden' name='estado' value='".$trabajo['estado']."'>
            <input type='hidden' name='id_publicacion' value='".$trabajo['id_publicacion']."'>
            <input type='hidden' name='id_realizacion' value='".$trabajo['id_realizacion']."'>
            <input type='hidden' name='zona' value='".$trabajo['zona']."'>
            <input type='hidden' name='especialidad' value='".$trabajo['especialidad']."'>
            <button type='submit'>MODIFICAR</button>";
    }
    echo "</form>";
    
?>
</body>
</html>