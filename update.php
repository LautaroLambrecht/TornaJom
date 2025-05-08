<?php
require_once "autoloader.php";
$modelo = new Model();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['modificar'])){
    if (isset($_POST['id']) && isset($_POST['estado']) && isset($_POST['titulo'])  && isset($_POST['descripcion'])
    && isset($_POST['zona'])&& isset($_POST['id_especialidad'])){
        $modelo->updateWorks($_POST['id'], $_POST['estado'], $_POST['titulo'], $_POST['descripcion'], $_POST['zona'], $_POST['id_especialidad'] );
    
}
}

?>
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Document</title>
</head>
<body>
<form method="post">
    <input type="hidden" name="id" value="<?php echo $_POST['id'];?>">
    <label for="titulo">Titulo</label>
    <input type="text" name="titulo" value="<?php echo $_POST['titulo'];?>">
    <label for="descripcion">Descripción</label>
    <input type="text" name="descripcion" value="<?php echo $_POST['descripcion'];?>">
    <label for="estado">Estado</label>
    <input type="text" name="estado" value="<?php echo $_POST['estado'];?>">
    <label for="zona">Zona</label>
    <input type="text" name="zona" value="<?php echo $_POST['zona'];?>">
    <label for="id_especialidad">Especialidad</label>
    <input type="text" name="id_especialidad" value="<?php echo $_POST['id_especialidad'];?>">
    <input type="submit" name="modificar" value="modificar">
    <button><a href="index.php" class="btn-index">Index</a></button>

</form>
</body>
</html>