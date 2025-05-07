<?php
    require "autoloader.php";
    $modelo = new Model();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['modificar'])){
        if (isset($_POST['estado']) && isset($_POST['titulo'])  && isset($_POST['descripcion']) && isset($_POST['id_publicacion'])
        && isset($_POST['id_realizacion'])&& isset($_POST['zona'])&& isset($_POST['id_especialidad'])){
            $modelo->updateWorks($_POST['id'], $_POST['estado'], $_POST['titulo'], $_POST['descripcion'], $_POST['zona'], $_POST['id_especialidad']);
        
    }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>TornaJom</title>
</head>
<body>
    <header></header>
    <main>
        <?php 
        $modelo->drawAllWorks();
        ?>
    </main>
</body>
</html>