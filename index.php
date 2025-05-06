<?php
    require "autoloader.php";
    $modelo = new Model();
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
    <?php $modelo->drawAllWorks();?>
</body>
</html>