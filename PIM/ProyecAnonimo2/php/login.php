<?php
session_start();
$conexion = new mysqld("localhost", "root", "", "chat");

$codigo = $_POST["codigo"];

$sql = $conexion->prepare("SELECT nickname FROM usuarios WHERE codigo=?");
$sql->bind_param("s", $codigo);
$sql->execute();
$result = $sql->get_result();

if ($result->num_rows == 1) {
    $_SESSION["codigo"] = $codigo;
    header("Location: chat.php");
} else {
    echo "Código incorrecto";
}
?>
