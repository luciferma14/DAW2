<?php
require "generador_base36.php";
$conexion = new mysqli("localhost", "root", "", "chat");

$nickname = $_POST["nickname"];
$password = $_POST["password"];

// proteger contraseña
$hash = password_hash($password, PASSWORD_DEFAULT);

// generar código único
$codigo = generarCodigo();

$stmt = $conexion->prepare("INSERT INTO usuarios (nickname, password, codigo) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nickname, $hash, $codigo);
$stmt->execute();

echo "<h1>Registro completado</h1>";
echo "<p>Tu código es: <b>".$codigo."</b></p>";
echo "<a href='./index.html'>Volver</a>";
?>
