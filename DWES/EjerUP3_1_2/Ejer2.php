<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Lucía Ferrandis Martínez</title>
    </head>
    <body>
        <h2>Lucía Ferrandis Martínez</h1>
        <hr> 
        <h1>Salarios Semanales y Mensuales</h1>
        <h4>Salario semanal teniendo en cuenta que las horas ordinarias (40 primeras horas) se pagan a 12 euros la hora.</h4>
        <h4>A partir de la hora 41, se pagan a 16 euros la hora.</h4>

        <form method="POST"">
            <label>Nombre</label>
            <input type="text" name="nombre" id="nombre"><br><br>

            <label>Horas trabajadas</label>
            <input type="number" name="horas" id="horas"><br><br>

            <input type="checkbox" name="mes" id="mes">Calcular mensual<br><br>

            <input type="submit" name="enviar" value="Calcular">
        </form>    
        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $nombre = $_POST["nombre"];
                $horas = $_POST["horas"];
                
                if($horas <= 40){
                    $pHoras = 12;
                    $salario = $horas * $pHoras;
                    echo "<p>Trabajando $horas h a la semana, $nombre gana $salario €/s</p>";

                }else if ($horas >= 41){
                    $pHoras = 16;
                    $salario = $horas * $pHoras;
                    echo "<p>Trabajando $horas h a la semana, $nombre gana $salario €/s</p>";
                    
                }
                
                if ($horas <= 40 && isset($_POST["mes"])){
                    $pHoras = 12;
                    $salarioSemana = $horas * $pHoras;
                    $horasMes = $horas * 4;
                    $salarioMes = $horasMes * $pHoras;
                    
                    echo "<p>Trabajando $horasMes h al mes, $nombre gana $salarioMes €/m</p>";

                }else if ($horas >= 41 && isset($_POST["mes"])){
                    $pHoras = 16;
                    $salarioSemana = $horas * $pHoras;
                    $horasMes = $horas * 4;
                    $salarioMes = $horasMes * $pHoras;
                    
                    echo "<p>Trabajando $horasMes h al mes, $nombre gana $salarioMes €/m</p>";
                }
            }
        ?>
    </body>
</html>