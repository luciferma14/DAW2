<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Lucía Ferrandis Martínez</title>
    </head>
    <body>
        <h2>Lucía Ferrandis Martínez</h1>
        <br><hr>
        <h1>Conversor</h1>
        <form method="POST">
            <label>Cantidad</label>
            <input type="number" name="dinero"><br>
            
            <input type="radio" name="conversion" value="eurosPes" required> Euros a Pesetas <br>
            <input type="radio" name="conversion" value="pesetasEu" required> Pesetas a Euros <br>

            <input type="submit" name="enviar" value="Convertir">
        </form>


        <?php

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $dinero = $_POST["dinero"];
                $conversion = $_POST["conversion"];

                $pesetas = 166.386;

                if($conversion == "eurosPes"){
                    $final = round($dinero * $pesetas, 2);
                    
                    echo "<p>$dinero euros son $final ptas</p>";
                }else if($conversion == "pesetasEu"){
                    $final = round($dinero / $pesetas, 2);

                    echo "<p>$dinero ptas son $final euros</p>";
                }
            }
        ?>
    </body>
</html>