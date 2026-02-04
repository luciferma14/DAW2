<?php
session_start();

// Recuperamos datos previos
$datos = $_SESSION['datos_form'] ?? [];
$errores = $_SESSION['errores'] ?? [];

// Si no hay token, creamos uno
if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}

// Si se pulsa VALIDAR
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['accion'] ?? '') === 'validar') {
    $errores = [];
    $datos = [];

    // Recogemos datos
    $datos['nombre'] = trim($_POST['nombre'] ?? '');
    $datos['casa'] = $_POST['casa'] ?? '';
    $datos['varita'] = $_POST['varita'] ?? '';
    $datos['asignaturas'] = $_POST['asignaturas'] ?? [];
    $datos['nivelMago'] = trim($_POST['nivelMago'] ?? '');
    $datos['imagen'] = $_FILES['imagen']['name'] ?? '';

    // Validaciones
    if ($datos['nombre'] === '') $errores['nombre'] = "El nombre no puede estar vacío.";
    if ($datos['casa'] === '') $errores['casa'] = "Debe seleccionar una casa.";
    if ($datos['varita'] === '') $errores['varita'] = "Debe seleccionar una varita.";
    if (empty($datos['asignaturas'])) $errores['asignaturas'] = "Seleccione al menos una asignatura.";
    if ($datos['nivelMago'] === '' || !is_numeric($datos['nivelMago']) || $datos['nivelMago'] < 1 || $datos['nivelMago'] > 100) {
        $errores['nivelMago'] = "Ingrese un nivel mágico entre 1 y 100.";
    }

    // Validar imagen si hay archivo
    if (!empty($_FILES['imagen']['name'])) {
        $ext = strtolower(pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION));
        $permitidas = ['jpg','jpeg','png','gif'];
        if (!in_array($ext, $permitidas)) $errores['imagen'] = "Solo se permiten imágenes jpg, png o gif.";
        if ($_FILES['imagen']['size'] > 2000000) $errores['imagen'] = "La imagen no puede superar los 2MB.";
    }

    $_SESSION['datos_form'] = $datos;
    $_SESSION['errores'] = $errores;
}

// Si se pulsa LIMPIAR
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['accion'] ?? '') === 'limpiar') {
    unset($_SESSION['datos_form'], $_SESSION['errores']);
    $datos = [];
    $errores = [];
}

// Si se pulsa ENVIAR
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['accion'] ?? '') === 'enviar') {
    // Guardamos datos en sesión
    $_SESSION['datos_form'] = [
        'nombre' => $_POST['nombre'] ?? '',
        'casa' => $_POST['casa'] ?? '',
        'varita' => $_POST['varita'] ?? '',
        'asignaturas' => $_POST['asignaturas'] ?? [],
        'nivelMago' => $_POST['nivelMago'] ?? '',
        'imagen' => $_FILES['imagen']['name'] ?? ''
    ];

    // Subir la imagen si hay archivo
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === 0) {
        $ext = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
        $nombreFinal = "aprendiz_" . time() . "." . $ext;
        $rutaDestino = __DIR__ . '/uploads/' . $nombreFinal;
        if (!file_exists(__DIR__ . '/uploads')) mkdir(__DIR__ . '/uploads', 0777, true);
        move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino);
        $_SESSION['datos_form']['imagen'] = 'uploads/' . $nombreFinal;
    }

    // Redirigir a resultado.php
    header('Location: resultado.php');
    exit;
}

// Funciones auxiliares para el formulario
function valor($campo, $porDefecto = '') { 
    global $datos; 
    return htmlspecialchars($datos[$campo] ?? $porDefecto, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); 
}
function checkedAsign($valor) { 
    global $datos; 
    $lista = $datos['asignaturas'] ?? []; return (is_array($lista) && in_array($valor, $lista, true)) ? 'checked' : ''; 
}
function selectedCasa($valor) { 
    global $datos; 
    return (($datos['casa'] ?? '') === $valor) ? 'selected' : ''; 
}
function selectedVarita($valor) { 
    global $datos; 
    return (($datos['varita'] ?? '') === $valor) ? 'selected' : ''; 
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lucía Ferrandis Martínez</title>
    <style>.error { color: red; } label { display: block; margin-top: 10px; }</style>
</head>
<body>
<h1>Lucía Ferrandis Martínez</h1>

<?php if (!empty($errores)): ?>
    <ul class="error">
        <?php foreach ($errores as $error): ?>
            <li><?= htmlspecialchars($error); ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form action="" method="post" enctype="multipart/form-data" autocomplete="on">
    <input type="hidden" name="token" value="<?= $_SESSION['token']; ?>">

    <label>Nombre
        <input type="text" name="nombre" value="<?= valor('nombre'); ?>">
    </label>

    <label>Casa
        <select name="casa">
            <option value="">-- Elige tu casa --</option>
            <option value="Gryffindor" <?= selectedCasa('Gryffindor'); ?>>Gryffindor</option>
            <option value="Slytherin" <?= selectedCasa('Slytherin'); ?>>Slytherin</option>
            <option value="Ravenclaw" <?= selectedCasa('Ravenclaw'); ?>>Ravenclaw</option>
            <option value="Hufflepuff" <?= selectedCasa('Hufflepuff'); ?>>Hufflepuff</option>
        </select>
    </label>

    <label>Varita
        <select name="varita">
            <option value="">-- Elige tu varita --</option>
            <option value="Roble con núcleo de fénix" <?= selectedVarita('Roble con núcleo de fénix'); ?>>Roble con núcleo de fénix</option>
            <option value="Sauce con núcleo de unicornio" <?= selectedVarita('Sauce con núcleo de unicornio'); ?>>Sauce con núcleo de unicornio</option>
            <option value="Acebo de núcleo de dragón" <?= selectedVarita('Acebo de núcleo de dragón'); ?>>Acebo de núcleo de dragón</option>
        </select>
    </label>

    <p>Asignaturas:</p>
    <label><input type="checkbox" name="asignaturas[]" value="pociones" <?= checkedAsign('pociones'); ?>> pociones</label>
    <label><input type="checkbox" name="asignaturas[]" value="transformaciones" <?= checkedAsign('transformaciones'); ?>> transformaciones</label>
    <label><input type="checkbox" name="asignaturas[]" value="encantamientos" <?= checkedAsign('encantamientos'); ?>> encantamientos</label>
    <label><input type="checkbox" name="asignaturas[]" value="defensa" <?= checkedAsign('defensa'); ?>> defensa contra las Artes Oscuras</label>

    <label>Nivel mágico (1-100):
        <input type="number" name="nivelMago" value="<?= valor('nivelMago'); ?>" min="1" max="100">
    </label>

    <label>Foto del aprendiz
        <input type="file" name="imagen">
    </label>
    <input type="hidden" name="tamano_maximo" value="2000000">

    <div class="acciones" style="margin-top:20px;">
        <button type="submit" name="accion" value="validar">VALIDAR</button>
        <button type="submit" name="accion" value="enviar">ENVIAR</button>
        <button type="submit" name="accion" value="limpiar">LIMPIAR</button>
    </div>
</form>
