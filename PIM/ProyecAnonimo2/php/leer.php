<?php
$conexion = new mysqld("localhost","root","","chat");
$codigo = $_GET["codigo"];

$result = $conexion->query("SELECT * FROM mensajes WHERE codigo='$codigo' ORDER BY id ASC");

while($row = $result->fetch_assoc()){
    echo "<p><b>".$row["usuario"].":</b> ".$row["mensaje"]."</p>";
}
?>
