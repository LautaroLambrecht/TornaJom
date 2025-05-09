<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilos.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" type="image/x-icon" href="../img/LogoMinimalista.png" style="border: radius 5px;">
    <title>TornaJom</title> 
</head>
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(to right, #6a11cb, #2575fc);
        background-size: cover;
        display: flex;
        justify-content: center;
        margin: 0;
        flex-direction: column;
    }

    form {
        background-color: #ffffff;
        padding: 40px 30px;
        border-radius: 12px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 350px;
        height: 51%;
        margin-left: 39%;
    }
    h1 {
        
        color: #333;
        margin-bottom: 20px;
    }

    h2 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 6px;
        font-weight: bold;
        color: #555;
    }

    input[type="text"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 16px;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-sizing: border-box;
        transition: 0.3s border;
    }

    input[type="text"]:focus,
    input[type="password"]:focus {
        border-color: #2575fc;
        outline: none;
    }

    input[type="submit"] {
        width: 100%;
        background-color: #2575fc;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 8px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #1e60d2;
    }

    p {
        color: red;
        text-align: center;
        margin-top: 10px;
    }
    .login {
        text-align: center;
        font-size: 2em;
        color: #333;
    }

    .logo{
        width: 5%;
    }

    header{
        margin-top: 3%;
        display: flex;
        justify-content: center;
    }

</style>
<body>
    <header>
        <img class="logo" src="img/LogoMinimalista.png" alt="">
    </header>
    <h1 class="login">¡Bienvenido a TornaJom!</h1>
    <h2>  Iniciar sesión</h2>
    <?php
    if (isset($_SESSION['error'])) {
        echo "<p style='color:red'>" . $_SESSION['error'] . "</p>";
        unset($_SESSION['error']);
    }
    ?>
    <form action="verificarlogin.php"  method="POST">
        <label>Movil:</label><br>
        <input type="text" name="movil" required><br>
        <label>Contraseña:</label><br>
        <input type="password" name="contrasena" required><br><br>
        <input type="submit" value="Ingresar">
    </form>
</body>
</html>