<?php
// resultado.php

// Obtenemos el id del aprendiz desde el GET o POST, si existe
$idAprendiz = $_GET['id'] ?? null;

// Si no hay id, mostramos mensaje de error y detenemos la ejecución
if (!$idAprendiz) {
    die("Acceso no permitido.");
}

// Incluir el modelo Aprendiz
include_once 'Aprendiz.php';

// Crear una instancia del modelo
$aprendiz = new Aprendiz();

// Buscar el aprendiz por su id
$datosAprendiz = $aprendiz->buscarPorId($idAprendiz);

// Si no se encuentra el aprendiz, mostramos mensaje de error y detenemos la ejecución
if (!$datosAprendiz) {
    die("Aprendiz no encontrado.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado Aprendiz</title>
</head>
<body>

    <!-- Título con mensaje de confirmación -->
    <h1>Aprendiz registrado correctamente - Tu Nombre</h1>

    <!-- Mostrar los datos del aprendiz -->
    <p><strong>Nombre:</strong> <?php echo htmlspecialchars($datosAprendiz['nombre']); ?></p>
    <p><strong>Edad:</strong> <?php echo htmlspecialchars($datosAprendiz['edad']); ?></p>
    <p><strong>Curso:</strong> <?php echo htmlspecialchars($datosAprendiz['curso']); ?></p>

    <!-- Mostrar foto si existe -->
    <?php if (!empty($datosAprendiz['foto'])): ?>
        <p><strong>Foto:</strong> <?php echo htmlspecialchars($datosAprendiz['foto']); ?></p>
        <img src="uploads/<?php echo htmlspecialchars($datosAprendiz['foto']); ?>" alt="Foto del aprendiz" width="200">
    <?php endif; ?>

    <!-- Botón para volver al formulario -->
    <form action="volver.php" method="post">
        <button type="submit">Volver al formulario</button>
    </form>

</body>
</html>
