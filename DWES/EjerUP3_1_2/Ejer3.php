<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Lucía Ferrandis Martínez</title>
    </head>
    <body>
        <h2>Lucía Ferrandis Martínez</h2>
        <hr> 
        <h1>¿Qué es el carácter?</h1>

        <form method="POST">
            <label>Carácter</label>
            <input type="text" name="caracter" id="caracter" maxlength="1" required><br><br>
            <input type="submit" name="enviar" value="Determinar">
        </form>    

        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $caracter = $_POST["caracter"];

                $ascii = ord($caracter); // Convierte el carácter a su código ASCII

                function mayus($ascii, $caracter){
                    if ($ascii >= 65 && $ascii <= 90) {
                        echo "<p>$caracter es una letra mayúscula</p>";
                    }
                }

                function minus($ascii, $caracter){
                    if ($ascii >= 97 && $ascii <= 122) {
                        echo "<p>$caracter es una letra minúscula</p>";
                    }
                }

                function numero($ascii, $caracter){
                    if ($ascii >= 48 && $ascii <= 57) {
                        echo "<p>$caracter es un carácter numérico</p>";
                    }
                }

                function blanco($ascii, $caracter){
                    if ($ascii == 32) {
                        echo "<p>Es un carácter blanco (espacio)</p>";
                    }
                }

                function puntuacion($ascii, $caracter){
                    if (($ascii >= 39 && $ascii <= 47) || 
                        ($ascii >= 58 && $ascii <= 64) ||
                        ($ascii >= 91 && $ascii <= 96) ||
                        ($ascii >= 123 && $ascii <= 126)) {
                        echo "<p>$caracter es un carácter de puntuación</p>";
                    }
                }

                function especial($ascii, $caracter){
                    if ($ascii >= 35 && $ascii <= 38 || $ascii == 64) {
                        echo "<p>$caracter es un carácter especial</p>";
                    }
                }
                

                mayus($ascii, $caracter);
                minus($ascii, $caracter);
                numero($ascii, $caracter);
                blanco($ascii, $caracter);
                puntuacion($ascii, $caracter);
                especial($ascii, $caracter);
            }
        ?>
    </body>
</html>
