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

                $suma1 = 0;
                $suma2 = 0;
                $suma3 = 0;
                $suma4 = 0;
                $suma5 = 0;

                if($uno > 3){
                    $suma1 = 10 + (($uno - 3) * 5);
                } else {
                    $suma1 = 10;
                }
                echo "<p>La 1ª llamada de $uno mins cuesta $suma1 céntimos</p>";

                if($dos > 3){
                    $suma2 = 10 + (($dos - 3) * 5);
                } else {
                    $suma2 = 10;
                }
                echo "<p>La 2ª llamada de $dos mins cuesta $suma2 céntimos</p>";

                if($tres > 3){
                    $suma3 = 10 + (($tres - 3) * 5);
                } else {
                    $suma3 = 10;
                }
                echo "<p>La 3ª llamada de $tres mins cuesta $suma3 céntimos</p>";

                if($cuatro > 3){
                    $suma4 = 10 + (($cuatro - 3) * 5);
                } else {
                    $suma4 = 10;
                }
                echo "<p>La 4ª llamada de $cuatro mins cuesta $suma4 céntimos</p>";

                if($cinco > 3){
                    $suma5 = 10 + (($cinco - 3) * 5);
                } else {
                    $suma5 = 10;
                }
                echo "<p>La 5ª llamada de $cinco mins cuesta $suma5 céntimos</p>";

                $total = $suma1 + $suma2 + $suma3 + $suma4 + $suma5;
                echo "<hr>";
                echo "<p> El total de las 5 llamadas es de $total céntimos</p>";
            }
        ?>
    </body>
</html>
