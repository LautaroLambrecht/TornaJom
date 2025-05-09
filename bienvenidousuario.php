<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: loginusuario.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/x-icon" href="img\LogoMinimalista.png" style="border: radius 5px;">
    <title>Bienvenido</title>
</head>
<body>
    <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</h2>
    <a href="cierresesion.php">Cerrar sesión</a>
</body>
</html>