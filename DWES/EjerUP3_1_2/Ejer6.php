<?php
    $contra = 1234;
    $mensaje = "";
    $maxInten = 4;

    if (isset($_POST["intentos"])){
        $intentos = $_POST["intentos"];
    }else {
        $intentos = $maxInten;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $comb = $_POST["comb"];

        if($comb == $contra){
            $mensaje = "Has acertado la combinación";
            $color = "green";
            $intentos = $maxInten;
        } else {
            $intentos--;
            $color = "red";
            $mensaje = "Has fallado. Te quedan $intentos";

            if($intentos <= 0){
            $mensaje = "Te has quedado sin intentos";
            $color = "red";
        }
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Lucía Ferrandis Martínez</title>
    </head>
    <body>

        <h2>Lucía Ferrandis Martínez</h2>
        <hr> 
        <h1>Abre la caja fuerte</h1>

        <form method="POST">
            <label>(Combinación: 1234)</label><br><br>
            <label>Combinación: <input type="text" name="comb" maxlength="4" required></label>
            <input type="hidden" name="intentos" value="<?php echo $intentos; ?>">

            <input type="submit" name="comprobar" value="Comprobar">
        </form>

        <?php echo "<p style='color:$color; font-weight:bold;'>$mensaje</p>" ?>

    </body>
</html>