<?php
    $nickname = $_POST["nickname"];

    // generar código según la hora
    $codigo = "CHAT" . time();

    // conexión mínima
    $conn = new mysqli("localhost", "root", "", "chatAnonimo");

    // guardar en BD
    $stmt = $conn->prepare("INSERT INTO chats (codigo, nickname) VALUES (?, ?)");
    $stmt->bind_param("ss", $codigo, $nickname);
    $stmt->execute();
    $stmt->close();
    $conn->close();
?>

<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8"><title>Código generado</title>
    </head>
    <body>
        <h1>Tu código de chat</h1>
        <p><strong><?php echo $codigo; ?></strong></p>

        <p>Guárdalo. Lo necesitarás para entrar al chat.</p>

        <a href="chatAnonimo.html">Volver</a>
    </body>
</html>
