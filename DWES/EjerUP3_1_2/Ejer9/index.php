<?php
    $errores = [];
    $nombre = "";
    $apellidos = "";
    $correo = "";
    $estudios = "";
    $situacion = [];
    $hobbies = [];
    $otroHobbie = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = trim($_POST["nombre"]);
        $apellidos = $_POST["apellidos"];
        $correo = trim($_POST["correo"]);
        $estudios = $_POST["estudios"] ?? "";
        $situacion = $_POST["situacion"] ?? [];
        $hobbies = $_POST["hobbies"] ?? [];
        $otroHobbie = $_POST["otroHbb"] ?? "";

        if (empty($nombre)) {
            $errores["nombre"] = "El nombre es obligatorio.";
        }
        if (empty($apellidos)) {
            $errores["apellidos"] = "Los apellidos son obligatorios.";
        }
        if (empty($correo)){
            $errores["correo"] = "Introduce un correo válido.";
        }
        if (empty($estudios)) {
            $errores["estudios"] = "Selecciona tu nivel de estudios.";
        }
        if (empty($situacion)) {
            $errores["situacion"] = "Selecciona al menos una situación.";
        }
        if (empty($hobbies)) {
            $errores["hobbies"] = "Selecciona al menos un hobbie.";
        }

        if (isset($_POST["enviar"]) && empty($errores)) {
            session_start();
            $_SESSION["datos"] = [
                "nombre" => $nombre,
                "apellidos" => $apellidos,
                "correo" => $correo,
                "estudios" => $estudios,
                "situacion" => $situacion,
                "hobbies" => $hobbies,
                "otroHbb" => $otroHobbie
            ];
            header("Location: Ejer9.php");
            exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Lucía Ferrandis Martínez</title>

        <style>
            label{
                font-weight: bold;
            }
        </style>
    </head>
    <body>

        <h2>Lucía Ferrandis Martínez</h2>
        <hr> 
        <h1>Recoger datos</h1>

        <form method="POST" action="index.php">
            
            <label>Nombre</label><br>
            <input type="text" name="nombre" value="<?= $nombre ?>" size="25"><br>
            <span style="color:red"><?= $errores["nombre"] ?? "" ?></span><br><br>
            
            <label>Apellidos</label><br>
            <input type="text" name="apellidos" value="<?= $apellidos ?>" size="25"><br>
            <span style="color:red"><?= $errores["apellidos"] ?? "" ?></span><br><br>
           
            <label>Correo electrónico</label><br>
            <input type="email" name="correo" placeholder="ejemplo@gmail.com"  value="<?= $correo ?>"size="25"><br>
            <span style="color:red"><?= $errores["correo"] ?? "" ?></span><br><br>
            
            <label>Nivel de estudios</label><br>
            <select name="estudios">
                <option value="">Seleccione...</option>
                <option value="ESO" <?= $estudios=="ESO"?"selected":"" ?>>ESO</option>
                <option value="Bachillerato" <?= $estudios=="Bachillerato"?"selected":"" ?>>Bachillerato</option>
                <option value="Grado Medio" <?= $estudios=="Grado Medio"?"selected":"" ?>>Grado Medio</option>
                <option value="Grado Superior" <?= $estudios=="Grado Superior"?"selected":"" ?>>Grado Superior</option>
                <option value="Universidad" <?= $estudios=="Universidad"?"selected":"" ?>>Universidad</option>
            </select><br>
            <span style="color:red"><?= $errores["estudios"] ?? "" ?></span><br><br>


            <label>Situación actual</label><br>
            <input type="checkbox" name="situacion[]" value="estudiando" <?= in_array("estudiando",$situacion)?"checked":"" ?>>Estudiando<br>
            <input type="checkbox" name="situacion[]" value="trabajando" <?= in_array("trabajando",$situacion)?"checked":"" ?>>Trabajando<br>
            <input type="checkbox" name="situacion[]" value="buscando" <?= in_array("buscando",$situacion)?"checked":"" ?>>Buscando empleo<br>
            <input type="checkbox" name="situacion[]" value="desempleado" <?= in_array("desempleado",$situacion)?"checked":"" ?>>Desempleado<br>
            <span style="color:red"><?= $errores["situacion"] ?? "" ?></span><br><br>

            <label>Hobbies</label><br>
            <input type="checkbox" name="hobbies[]" value="musica" <?= in_array("musica",$hobbies)?"checked":"" ?>>Escuchar música<br>
            <input type="checkbox" name="hobbies[]" value="juegos" <?= in_array("juegos",$hobbies)?"checked":"" ?>>Jugar videojuegos<br>
            <input type="checkbox" name="hobbies[]" value="deporte" <?= in_array("deporte",$hobbies)?"checked":"" ?>>Hacer deporte<br>
            <input type="checkbox" name="hobbies[]" value="otro" id="otroHobbie" <?= in_array("otro",$hobbies)?"checked":"" ?>>Otro: 
            <input type="text" name="otroHbb" id="otroHobbie" placeholder="Leer comics..." size="25" value="<?= $otroHobbie ?>"><br>
            <span style="color:red"><?= $errores["hobbies"] ?? "" ?></span><br><br>

            <input type="submit" name="validar" value="Validar">
            <input type="submit" name="enviar" value="Enviar">
        </form>
    </body>
</html>