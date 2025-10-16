<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Lucía Ferrandis Martínez</title>
    </head>
    <body>
        <h2>Lucía Ferrandis Martínez</h2>
        <hr> 
        <h1>Precio de las llamadas</h1>

        <form method="POST">
            <label>1ª llamada</label>
            <input type="number" name="uno" id="uno" required><br><br>
            <label>2ª llamada</label>
            <input type="number" name="dos" id="dos" required><br><br>
            <label>3ª llamada</label>
            <input type="number" name="tres" id="tres" required><br><br>
            <label>4ª llamada</label>
            <input type="number" name="cuatro" id="cuatro" required><br><br>
            <label>5ª llamada</label>
            <input type="number" name="cinco" id="cinco" required><br><br>

            <input type="submit" name="enviar" value="Calcular Precio">
        </form>    

        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $uno = $_POST["uno"];
                $dos = $_POST["dos"];
                $tres = $_POST["tres"];
                $cuatro = $_POST["cuatro"];
                $cinco = $_POST["cinco"];

                if($uno > 3){
                    $pUno = 5;
                    $suma1 = 0;
                    for($i = 0; $i < $uno - 3; $i++){
                        $suma1 = $pUno + $suma1;
                    }
                    $suma1 = $suma1 + 10;
                    echo "<p>La 1ª llamada de $uno mins cuesta $suma1 céntimos</p>";
                } else {
                    $pUno = 10;
                    echo "<p>La 1ª llamada de $uno mins cuesta $pUno céntimos</p>";

                }
                if($dos > 3){
                    $pDos = 5;
                    $suma2 = 0;
                    for($i = 0; $i < $dos - 3; $i++){
                        $suma2 = $pDos + $suma2;
                    }
                    $suma2 = $suma2 + 10;
                    echo "<p>La 2ª llamada de $dos mins cuesta $suma2 céntimos</p>";
                } else {
                    $pDos = 10;
                    echo "<p>La 2ª llamada de $dos mins cuesta $pDos céntimos</p>";

                }
                if($tres > 3){
                    $pTres = 5;
                    $suma3 = 0;
                    for($i = 0; $i < $tres - 3; $i++){
                        $suma3 = $pTres + $suma3;
                    }
                    $suma3 = $suma3 + 10;
                    echo "<p>La 3ª llamada de $tres mins cuesta $suma3 céntimos</p>";
                } else {
                    $pTres = 10;
                    echo "<p>La 3ª llamada de $tres mins cuesta $pTres céntimos</p>";
                }
                if($cuatro > 3){
                    $pCuatro = 5;
                    $suma4 = 0;
                    for($i = 0; $i < $cuatro - 3; $i++){
                        $suma4 = $pCuatro + $suma4;
                    }
                    $suma4 = $suma4 + 10;
                    echo "<p>La 4ª llamada de $cuatro mins cuesta $suma4 céntimos</p>";
                } else {
                    $pCuatro = 10;
                    echo "<p>La 4ª llamada de $cuatro mins cuesta $pCuatro céntimos</p>";

                }
                if($cinco > 3){
                    $pCinco = 5;
                    $suma5 = 0;
                    for($i = 0; $i < $cinco - 3; $i++){
                        $suma5 = $pCinco + $suma5;
                    }
                    $suma5 = $suma5 + 10;
                    echo "<p>La 5ª llamada de $cinco mins cuesta $suma5 céntimos</p>";
                } else {
                    $pCinco = 10;
                    echo "<p>La 5ª llamada de $cinco mins cuesta $pCinco céntimos</p>";

                }
            }
        ?>
    </body>
</html>
