<?php
/***
 * Formulario para registrar un aprendiz de Hogwarts
 * Requiere sesión para guardar los datos entre peticiones 
 * y un token CSRF para evitar ataques.
 * Se debe validar usando el fichero validaciones.php
 **/

/**
 * PROCESAR FORMULARIO
 */

    // Comprobar token CSRF y finalizar si no es válido

    // Si se pulsa ENVIAR
    
        
        /**
         * GUARDAR EN BASE DE DATOS
         * Los datos ya están validados y se guardan en sesión ($_SESSION)
         * Se redirige a resultado.php con el id del aprendiz
         */
       

    // Si se pulsa VALIDAR
    
        /**
         * VALIDACIONES y guardar valores en sesión
         */

        //nombre
       
        //casa 
       

        //varita
        

        //asignaturas
       

        //nivel mágico
        

        //foto

        //Si no hay foto en sesión, validamos la subida

            // Validar que se ha subido una foto
           
                // Validar extensiones y tamaño de la foto.
                //Si todo OK, guardar datos de la foto en sesión
                
                    /***
                     * GUARDAR LA FOTO EN EL SERVIDOR
                     */
                    
                    //Si no existe se crea la carpeta Uploads
                    
                    //Generamos el nombre final del archivo
                   
                    // nombreAprendiz_timestamp.extensión es el formato final
                   

                    // Mover el archivo subido a la carpeta uploads
                    
                    // Guardar el nombre final en sesión
                    
             //fin validación foto subida
         //fin foto en sesión
     //fin botón validar
  
?>
<!-- FORMULARIO HTML, pon tu nombre con h1 -->



<!-- El listado de errores si los hay -->

<!-- completar las opciones necesarias del formulario -->
<form action="index.php" method="XXX" >
    <!-- Campo oculto para el token CSRF -->
    <input type="XXX" name="token" value="">
    <!-- En cada campo debemos devolver los datos correctos 
        $_SESSION['nombre'] ?? '' Si no hay valor en la sesión devolvemos vacío para no devolver null -->
 

   <p><label>Nivel mágico (1-100):</label>
   
    </p>
    <!-- Campo para subir la foto -->
    <!-- Si ya hay foto en sesión, no mostramos el campo de subida -->
    
    <p><label>Foto del aprendiz:</label>

    </p>
    <!-- Campo oculto para el tamaño máximo de la foto (2MB) -->
    <input type="hidden" name="tamano_maximo" value="2000000">

    <br><br>

    <!-- VALIDAR visible si:
         - NO es POST
         - O es POST con errores -->
   
        <button type="submit" name="validar">VALIDAR</button>
  

    <!-- ENVIAR visible si:
         - ES POST
         - Y NO hay errores -->
   
        <button type="submit" name="enviar">ENVIAR</button>
 
</form>
<?php
// aquí empieza el examen

// recuperamos datos previos y errores
$datos   = $_SESSION['datos_form'] ?? [];
$errores = $_SESSION['errores'] ?? [];

//si no hay token, creamos uno nuevo
if (!isset($_SESSION['token'])) {
	crearTokenFormularioAlternativo();
}

//funcion para limpiar lo que ponemos en el form
function valor(string $campo, $porDefecto = '')
{
	global $datos;
	return htmlspecialchars($datos[$campo] ?? $porDefecto, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

//comprueba si en la variable errores esta ese campo (key del diccionario errores)
function tieneError(string $campo): bool
{
	global $errores;
	return isset($errores[$campo]);
}


//funcion para mostrar el texto de error de un campo (valor del diccionario errores)
function textoError(string $campo): string
{
	global $errores;
	return $errores[$campo] ?? '';
}

//funcion para comprobar si la habilidad esta en la sesion
function checkedAsign(string $valor): string
{
	global $datos;
	$lista = $datos['asignaturas'] ?? [];
	return (is_array($lista) && in_array($valor, $lista, true)) ? 'checked' : '';
}

//funcion para comprobar si el rol seleccionado es el que esta en la sesion
function selectedCasa(string $valor): string
{
	global $datos;
	return (($datos['casa'] ?? '') === $valor) ? 'selected' : '';
}

function selectedVarita(string $valor): string
{
	global $datos;
	return (($datos['varita'] ?? '') === $valor) ? 'selected' : '';
}

function selectedAsig(string $valor): string
{
	global $datos;
	return (($datos['asignatura'] ?? '') === $valor) ? 'selected' : '';
}

//continuamos en aprendizcontrollers.php para procesar el formulario
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Examen PHP - Aprendiz de Hogwarts</title>
</head>
<body>
	<h1>Examen PHP - Formulario Aprendiz de Hogwarts</h1>


	<?php if (!empty($errores)): ?>
		<p class="error">Revisa los campos marcados en rojo antes de continuar.</p>
	<?php endif; ?>

	<form action="../app/controllers/AprendizControllers.php" method="POST" enctype="multipart/form-data" autocomplete="on">
		<input type="hidden" name="token" value="<?= htmlspecialchars($_SESSION['token'] ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>">

		
			<h2>Datos del aprendiz</h2>

			<label>Nombre
				<input type="text" name="nombre" value="<?= valor('nombre'); ?>">
				<?php if (tieneError('nombre')): ?><span class="error"><?= textoError('nombre'); ?></span><?php endif; ?>
			</label>

			<label>Casa
				<select name="casa">
					<option value="">-- Elige tu casa --</option>
					<option value="Gryffindor" <?= selectedCasa('Gryffindor'); ?>>Gryffindor</option>
					<option value="Slytherin" <?= selectedCasa('Slytherin'); ?>>Slytherin</option>
					<option value="Ravenclaw" <?= selectedCasa('Ravenclaw'); ?>>Ravenclaw</option>
					<option value="Hufflepuff" <?= selectedCasa('Hufflepuff'); ?>>Hufflepuff</option>
				</select>
				<?php if (tieneError('casa')): ?><span class="error"><?= textoError('casa'); ?></span><?php endif; ?>
			</label>

			<label>Varita
				<select name="varita">
					<option value="">-- Elige tu varita --</option>
					<option value="Roble con núcleo de fénix" <?= selectedVarita('Roble con núcleo de fénix'); ?>>Roble con núcleo de fénix</option>
					<option value="Sauce con núcleo de unicornio" <?= selectedVarita('Sauce con núcleo de unicornio'); ?>>Sauce con núcleo de unicornio</option>
					<option value="Acebo de núcleo de dragón" <?= selectedVarita('Acebo de núcleo de dragón'); ?>>Acebo de núcleo de dragón</option>
				</select>
				<?php if (tieneError('varita')): ?><span class="error"><?= textoError('varita'); ?></span><?php endif; ?>
			</label>

            <p>Asignaturas</p>
			<label>
				<input type="checkbox" name="asignaturas[]" value="pociones" <?= checkedAsign('pociones'); ?>> Pociones
			</label>
			<label>
				<input type="checkbox" name="asignaturas[]" value="transformaciones" <?= checkedAsign('transformaciones'); ?>> Transformaciones
			</label>
			<label>
				<input type="checkbox" name="asignaturas[]" value="encantamientos" <?= checkedAsign('encantamientos'); ?>> Encantamientos
			</label>
			<label>
				<input type="checkbox" name="asignaturas[]" value="defensa" <?= checkedAsign('defensa'); ?>> Defensa contra las Artes Oscuras
			</label>

            <label>Nivel mágico (1-100):
				<input type="text" name="nivelMago" value="<?= valor('nivelMago'); ?>">
				<?php if (tieneError('nivelMago')): ?><span class="error"><?= textoError('nivelMago'); ?></span><?php endif; ?>
			</label>

		
			<h2>Foto</h2>

			<label>Sube una foto tipo carnet mágico
				<input type="file" name="imagen">
			</label>
		

		<div class="acciones">
			<button type="submit" name="accion" value="validar">Validar</button>
			<button type="submit" name="accion" value="enviar">Enviar</button>
			<button type="submit" name="accion" value="eliminar">Eliminar</button>
		</div>
	</form>
</body>
</html>



