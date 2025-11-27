<?php
    $codigo = $_POST["codigo"];

    $conn = new mysqli("localhost", "root", "", "chatAnonimo");

    $stmt = $conn->prepare("SELECT * FROM chats WHERE codigo = ?");
    $stmt->bind_param("s", $codigo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $chat = $result->fetch_assoc();
        // Aquí iría la lógica del chat real
        echo "<h1>Bienvenido al chat</h1>";
        echo "<p>Nickname: " . $chat["nickname"] . "</p>";
        echo "<p>Código: " . $chat["codigo"] . "</p>";
    } else {
        echo "<h1>Código no válido</h1>";
    }

    $stmt->close();
    $conn->close();
    ?>
