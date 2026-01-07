<?php
    session_start();

    if ($_SESSION['rol'] !== 'Gerente') {
        header("Location: empresa_form.php");
        exit();
    }
?>

<h1>Perfil Gerente</h1>
<p>Lucía Ferrandis Martínez</p>

<a href="logout.php?token=<?php echo $_SESSION['token']; ?>">Cerrar sesión</a>
