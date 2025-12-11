<?php
$conexion = new mysqld("localhost","root","","chat");

$codigo = $_POST["codigo"];
$mensaje = $_POST["mensaje"];

$stmt = $conexion->prepare("INSERT INTO mensajes (codigo, usuario, mensaje) VALUES (?, 'Anon', ?)");
$stmt->bind_param("ss", $codigo, $mensaje);
$stmt->execute();
?>
