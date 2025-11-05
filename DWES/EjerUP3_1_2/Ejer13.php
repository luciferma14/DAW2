<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Lucía Ferrandis Martínez</title>
    </head>
    <body>
        <h2>Lucía Ferrandis Martínez</h2>
        <hr> 
        <h1>Validación de datos con expresiones regulares</h1>

        <form action="Ejer12.php" method="POST">

            <label>Código Postal:</label><br>
            <input type="text" name="cp"><br><br>

            <label>NIF:</label><br>
            <input type="text" name="dni"><br><br>

            <label>Fecha (dd/mm/aaaa o dd-mm-aaaa):</label><br>
            <input type="text" name="fecha"><br><br>

            <label>Texto con palabra "enviado":</label><br>
            <input type="text" name="enviado"><br><br>

            <label>Texto con letras mayúsculas/minúsculas y espacios:</label><br>
            <input type="text" name="cad"><br><br>

            <label>Texto solo números, sin espacios:</label><br>
            <input type="text" name="sNum"><br><br>

            <label>Texto solo números con espacios:</label><br>
            <input type="text" name="num"><br><br>

            <label>Texto con acentos, números y espacios:</label><br>
            <input type="text" name="cadMMEA"><br><br>

            <label>Texto con puntuación:</label><br>
            <input type="text" name="cadSP"><br><br>

            <label>Email:</label><br>
            <input type="text" name="email"><br><br>

            <label>URL:</label><br>
            <input type="text" name="url"><br><br>

            <label>Contraseña:</label><br>
            <input type="password" name="contra"><br><br>

            <label>IPv4:</label><br>
            <input type="text" name="ip"><br><br>

            <label>Dirección MAC:</label><br>
            <input type="text" name="mac"><br><br>

            <button type="submit">Validar</button>
        </form>
    </body>
</html>
