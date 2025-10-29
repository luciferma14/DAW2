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

        <form method="POST" action="Ejer9.php">
            
            <label>Nombre</label><br>
            <input type="text" name="nombre" size="25" required><br><br>
            
            <label>Apellidos</label><br>
            <input type="text" name="apellidos" size="25" required><br><br>
           
            <label>Correo electrónico</label><br>
            <input type="email" name="correo" placeholder="ejemplo@gmail.com" size="25" required><br><br>
            
            <label>Nivel de estudios</label><br>
            <select name="estudios">
                <option value="">Seleccione...</option>
                <option value="ESO">ESO</option>
                <option value="Bachillerato">Bachillerato</option>
                <option value="Grado Medio">Grado Medio</option>
                <option value="Grado Superior">Grado Superior</option>
                <option value="Universidad">Universidad</option>
            </select><br><br>

            <label>Situación actual</label><br>
            <input type="checkbox" name="situacion[]" value="estudiando">Estudiando<br>
            <input type="checkbox" name="situacion[]" value="trabajando">Trabajando<br>
            <input type="checkbox" name="situacion[]" value="buscando">Buscando empleo<br>
            <input type="checkbox" name="situacion[]" value="desempleado">Desempleado<br><br>

            <label>Hobbies</label><br>
            <input type="checkbox" name="hobbies[]" value="musica">Escuchar música<br>
            <input type="checkbox" name="hobbies[]" value="juegos">Jugar videojuegos<br>
            <input type="checkbox" name="hobbies[]" value="deporte">Hacer deporte<br>
            <input type="checkbox" name="hobbies[]" value="otro" id="otroHobbie">Otro: 
            <input type="text" name="otroHbb" id="otroHobbie" placeholder="Leer comics..." size="25"><br><br>

            <input type="submit" name="validar" value="Validar">
            <input type="submit" name="enviar" value="Enviar">
        </form>
    </body>
</html>