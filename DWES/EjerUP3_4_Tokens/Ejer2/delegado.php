<?php
    session_start();

    if ($_SESSION['rol'] !== 'Delegado') {
        header("Location: centro_form.php");
        exit();
    }
?>

<h1>Perfil Delegado</h1>
<p>Lucía Ferrandis Martínez</p>

<a href="logout.php?token=<?php echo $_SESSION['token']; ?>">Cerrar sesión</a>
