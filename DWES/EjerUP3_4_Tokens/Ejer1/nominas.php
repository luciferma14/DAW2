<?php
    session_start();

    if ($_SESSION['rol'] !== 'Nominas') {
        header("Location: empresa_form.php");
        exit();
    }
?>

<h1>Perfil Responsable de Nóminas</h1>
<p>Lucía Ferrandis Martínez</p>

<a href="logout.php?token=<?php echo $_SESSION['token']; ?>">Cerrar sesión</a>
