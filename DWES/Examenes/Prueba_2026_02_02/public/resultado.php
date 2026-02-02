<?php


// Obtenemos el id del aprendiz o es null

// Si no hay id, mostramos mensaje de error y detenemos la ejecución 
//if () {
//     die("Acceso no permitido.");
// }

// Conectamos a la base de datos 

// Buscamos el aprendiz por su id

// Si no se encuentra el aprendiz, mostramos mensaje de error y detenemos la ejecución
// if () {
//     die("Aprendiz no encontrado.");
// }
// ?>

<!--Pon un h1 con el texto "Aprendiz registrado correctamente" y tu nombre-->

<?php
 
    /***
     * Se deben mostrar todos los datos del aprendiz (de la foto mostrar el nommbre y la imagen)
     * Se puede imprimir el HTML directamente aquí (desde PHP) o poner el HTML fuera del bloque PHP.
     * La primera opción demuestra más dominio de PHP, la segunda es más sencilla.
     */
?>


<?php

session_start();

// Recuperamos el JSON del aprendiz desde la sesión y lo convertimos en array
$datos = [];
if (isset($_SESSION['aprendiz'])) {
	$json = $_SESSION['aprendiz'];
	$tmp  = json_decode($json, true);
	if (is_array($tmp)) {
		$datos = $tmp;
	}
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Resultado del examen</title>
	<style>
		body { font-family: Arial, sans-serif; background:#111; color:#eee; }
		.tarjeta { border:1px solid #555; padding:1rem; max-width:600px; margin:2rem auto; background:#1b1b1b; }
		img { max-width:150px; display:block; margin-bottom:1rem; }
		dt { font-weight:bold; }
	</style>
</head>
<body>
	<div>
		<h1>Resultado del examen PHP</h1>

		<?php if (!empty($datos)): ?>

            <dt>Nombre</dt>
            <dd><?= htmlspecialchars($datos['nombre'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></dd>

            <dt>Casa</dt>
            <dd><?= htmlspecialchars($datos['casa'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></dd>

            <?php if (!empty($datos['varita'])): ?>
                <dt>Varita</dt>
                <dd><?= htmlspecialchars($datos['varita'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></dd>
            <?php endif; ?>

            <?php if (!empty($datos['asignaturas'])): ?>
                <dt>Asignaturas</dt>
                <dd><?= htmlspecialchars($datos['asignaturas'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></dd>
            <?php endif; ?>

            <dt>Nivel de Mago</dt>
                <dd><?= htmlspecialchars($datos['nivelMago'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></dd>
            <?php endif; ?>

            <?php if (!empty($datos['foto'])): ?>
				<img src="<?= htmlspecialchars($datos['foto'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>" alt="Foto del aprendiz">
			<?php endif; ?>
        
        <!-- Agregar botón "Volver al formulario" (NO enlace). Ejecuta el script volver.php-->

		<form action="volver.php" method="post">
			<button type="submit">Volver al formulario</button>
		</form>
	</div>
</body>
</html>
