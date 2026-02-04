<?php
// resultado.php
session_start();

// Comprobar si hay datos del aprendiz en sesión
$datosAprendiz = $_SESSION['datos_form'] ?? null;

if (!$datosAprendiz) {
    die("Acceso no permitido.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lucía Ferrandis Martínez</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        img { margin-top: 10px; border: 1px solid #ccc; }
        p { margin: 5px 0; }
    </style>
</head>
<body>

    <h1>Lucía Ferrandis Martínez</h1>

    <p><strong>Nombre:</strong> <?= htmlspecialchars($datosAprendiz['nombre']); ?></p>
    <p><strong>Casa:</strong> <?= htmlspecialchars($datosAprendiz['casa']); ?></p>
    <p><strong>Varita:</strong> <?= htmlspecialchars($datosAprendiz['varita']); ?></p>
    <p><strong>Asignaturas:</strong> <?= htmlspecialchars(implode(', ', $datosAprendiz['asignaturas'] ?? [])); ?></p>
    <p><strong>Nivel mágico:</strong> <?= htmlspecialchars($datosAprendiz['nivelMago']); ?></p>

    <?php if (!empty($datosAprendiz['imagen'])): ?>
        <p><strong>Foto:</strong></p>
        <img src="<?= htmlspecialchars($datosAprendiz['imagen']); ?>" alt="Foto del aprendiz" width="200">
    <?php endif; ?>

    <!-- Botón para volver al formulario -->
    <form action="index.php" method="post" style="margin-top:20px;">
        <button type="submit">Volver al formulario</button>
    </form>

</body>
</html>
