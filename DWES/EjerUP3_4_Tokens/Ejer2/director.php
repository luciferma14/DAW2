<?php
    session_start();

    if ($_SESSION['rol'] !== 'Director') {
        header("Location: centro_form.php");
        exit();
    }
?>

<h1>Perfil Director</h1>
<p>Lucía Ferrandis Martínez</p>

<a href="logout.php?token=<?php echo $_SESSION['token']; ?>">Cerrar sesión</a>
