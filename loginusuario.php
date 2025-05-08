<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Iniciar sesión</h2>
    <?php
    if (isset($_SESSION['error'])) {
        echo "<p style='color:red'>" . $_SESSION['error'] . "</p>";
        unset($_SESSION['error']);
    }
    ?>
    <form action="verificarlogin.php" method="POST">
        <label>Usuario:</label><br>
        <input type="text" name="usuario" required><br>
        <label>Contraseña:</label><br>
        <input type="password" name="contrasena" required><br><br>
        <input type="submit" value="Ingresar">
    </form>
</body>
</html>