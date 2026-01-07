<?php
    session_start();

    if ($_SESSION['rol'] !== 'Profesor') {
        header("Location: centro_form.php");
        exit();
    }
?>

<h1>Perfil Profesor</h1>
<p>Lucía Ferrandis Martínez</p>

<a href="logout.php?token=<?php echo $_SESSION['token']; ?>">Cerrar sesión</a>
