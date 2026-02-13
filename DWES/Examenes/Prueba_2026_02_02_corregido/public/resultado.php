<?php
session_start();

require_once __DIR__ . "/../app/controller/AprendizController.php";

// Recogemos los datos del formulario
$datos = [
    'nombre' => $_POST['nombre'] ?? '',
    'casa' => $_POST['casa'] ?? '',
    'varita' => $_POST['varita'] ?? '',
    'asignaturas' => $_POST['asignaturas'] ?? [],
    'nivelMago' => $_POST['nivelMago'] ?? 0,
    'foto' => $_FILES['foto']['name'] ?? null
];

// Guardamos la foto en carpeta uploads si se envió
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $destino = __DIR__ . "/uploads/" . basename($_FILES['foto']['name']);
    move_uploaded_file($_FILES['foto']['tmp_name'], $destino);
}

// Creamos controlador con los datos
$controlador = new AprendizController($datos);

// Guardamos y obtenemos el ID
$id = $controlador->guardar();

// Obtenemos el aprendiz guardado
$aprendiz = $controlador->mostrar($id);

if (!$aprendiz) {
    die("Aprendiz no encontrado");
}
?>

<h1>Aprendiz Guardado</h1>

<p><strong>Nombre:</strong> <?= htmlspecialchars($aprendiz['nombre']) ?></p>
<p><strong>Casa:</strong> <?= htmlspecialchars($aprendiz['casa']) ?></p>
<p><strong>Varita:</strong> <?= htmlspecialchars($aprendiz['varita']) ?></p>
<p><strong>Asignaturas:</strong> <?= htmlspecialchars(implode(', ', $aprendiz['asignaturas'])) ?></p>
<p><strong>Nivel mágico:</strong> <?= htmlspecialchars($aprendiz['nivel']) ?></p>

<?php if (!empty($aprendiz['foto'])): ?>
    <p><strong>Foto:</strong></p>
    <img src="uploads/<?= htmlspecialchars($aprendiz['foto']) ?>" width="200">
<?php endif; ?>
