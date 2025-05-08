<?php
    require_once "../autoloader.php";

    $detalles = new Model();
    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $mostrar = $detalles->getWorksId($id);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    
.container {
  max-width: 800px;
  margin: 40px auto;
  padding: 20px;
  background-color: white;
  border: 2px solid #74ACDF;
  border-radius: 16px;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
  font-family: 'Segoe UI', sans-serif;
}

/* Tabla */
table {
  width: 100%;
  border-collapse: collapse;
}


td {
  padding: 14px 16px;
  border-bottom: 1px solid #ddd;
  color: #333;

}

th {
  background-color: #74ACDF;
  color: white;
  padding: 14px 16px;
  text-align: left;
  border-bottom: 2px solid #5d94c3;
}
button {
  background-color: #74ACDF;
  color: white;
  border: none;
  padding: 0.75rem 1.5rem;
  margin-top: 1.5rem;
  width: 10%;
  display:flex;
  justify-content:center;
  border-radius: 0.5rem;
  font-size: 1rem;
  font-weight: 600;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

button:hover {
  background-color: #5a98c4;
}


</style>
<body>
    <?php 
    
    if ($mostrar) {
        echo "<table class='container'>
                <tr><td>" . $mostrar['estado'] . "</td></tr> 
                <tr><td>" . $mostrar['titulo'] . "</td></tr>
                <tr><td>" . $mostrar['descripcion'] . "</td></tr>
                <tr><td>" . $mostrar['zona'] . "</td></tr>
                <tr><td>" . $mostrar['id_especialidad'] . "</td></tr>
              </table>";
    }
?>
<div style="display:flex; justify-content:center;"> 
    <button ><a href='index.php'>Volver</a></button>
</div>


</body>
</html>