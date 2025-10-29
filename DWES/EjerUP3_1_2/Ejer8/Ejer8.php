<?php
    $mensaje = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $correo = $_POST["correo"];
        $correo2 = $_POST["correo2"];
        $publi = isset($_POST["publi"]) ? "Sí" : "No";

        if ($correo != $correo2) {
            echo "<p style='color:red;'>La dirección de correo no coincide.</p>";
            echo "<form action='index.php' method='get'>
                    <button type='submit'>Volver</button>
                  </form>";
        } else {
            echo "<h3>Resultado</h3>";
            echo "<p><strong>Correo:</strong> $correo</p>";
            echo "<p><strong>Acepta publicidad:</strong> $publi</p>";
            echo "<form action='index.php' method='get'>
                    <button type='submit'>Volver</button>
                  </form>";
        }
    }
?>