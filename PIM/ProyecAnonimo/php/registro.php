<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php
require "generador_base36.php";
$conexion = new mysqli("localhost", "usuario", "contraseña", "proyecanonimo_db");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
$nickname = isset($_POST['nickname']) ? $_POST['nickname'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// proteger contraseña
if ($password !== '') {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
} else {
    $hashedPassword = '';
}

// generar código único
$codigo = generarCodigo();

$stmt = $conexion->prepare("INSERT INTO usuarios (nickname, password, codigo) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nickname, $hash, $codigo);
$stmt->execute();

echo "<h1>Registro completado</h1>";
echo "<p>Tu código es: <b>".$codigo."</b></p>";
echo "<a href='../index.html'>Volver</a>";
?>
