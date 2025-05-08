<?php
session_start();

$usuario_valido = "admin";
$contrasena_valida = "1234";

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

if ($usuario === $usuario_valido && $contrasena === $contrasena_valida) {
    $_SESSION['usuario'] = $usuario;
    header("Location: bienvenidousuario.php");
    exit();
} else {
    $_SESSION['error'] = "Usuario o contraseña incorrectos.";
    header("Location: loginusuario.php");
    exit();
}