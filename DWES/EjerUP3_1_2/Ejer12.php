<?php   
    function codPos($cp){
        if (preg_match("/^(03|12|46)[0-9]{3}$/", $cp)) {
            echo "Código postal dentro de la Comunidad Valenciana<br><br>";
        } else {
            echo "Código postal fuera de la Comunidad Valenciana<br><br>";
        }
    }

    function nif($dni){
        if (preg_match("/\d{8}[A-Za-z]$/", $dni)) {
            echo "NIF válido<br><br>";
        } else {
            echo "NIF no válido<br><br>";
        }
    }

    function fecha($fech){
        if (preg_match("/^(0[1-9]|[12][0-9]|3[0-1])[\/-](0[1-9]|1[0-2])[\/-](19|20\d{2})$/", $fech)) {
            echo "Fecha válida<br><br>";
        } else {
            echo "Fecha no válida<br><br>";
        }
    }

    function mayMin($envi){
        if (preg_match("/enviado/i", $envi)) {
            echo "Se encontró la palabra 'enviado'<br><br>";
        } else {
            echo "No se encontró<br><br>";
        }
    }

    function mayMinEsp($cad){
        if (preg_match("/^[a-zA-ZñÑ\s]+$/", $cad)) {
            echo "Texto válido<br><br>";
        } else {
            echo "Texto no válido<br><br>";
        }
    }

    function soloNum($sNum){
        if (preg_match("/^\d{1,}\S$/", $sNum)) {
            echo "Número válido<br><br>";
        } else {
            echo "Número no válido<br><br>";
        }
    }

    function numEsp($num){
        if (preg_match("/^\d{1,}\s$/", $num)) {
            echo "Número válido<br><br>";
        } else {
            echo "Número no válido<br><br>";
        }
    }

    function numMayMinEspAcent($cadMMEA){
        if (preg_match("/^[A-Za-zÁÉÍÓÚÜáéíóúüÑñ0-9\s]+$/", $cadMMEA)) {
            echo "Texto válido<br><br>";
        } else {
            echo "Texto no válido<br><br>";
        }
    }

    function anteriorSigPunts($cadSP){
        if (preg_match("/^[A-Za-zÁÉÍÓÚÜáéíóúüÑñ0-9\s'.,;:\-]+$/", $cadSP)) {
            echo "Texto válido<br><br>";
        } else {
            echo "Texto no válido<br><br>";
        }
    }

    function email($email){
        if (preg_match("/^[\w\.-]+@[\w\.-]+\.\w{2,4}$/", $email)) {
            echo "Email válido<br><br>";
        } else {
            echo "Email no válido<br><br>";
        }
    }

    function url($url){
        if (preg_match("/^https?:\/\/(www\.)?[A-Za-z0-9\-]+\.[A-Za-z]{2,}(\/[\w\-?=&%.]*)?$/", $url)) {
            echo "URL válida<br><br>";
        } else {
            echo "URL no válida<br><br>";
        }
    }

    function contra($contra){
        if (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/", $contra)) {
            echo "Contraseña válida<br><br>";
        } else {
            echo "Contraseña no válida<br><br>";
        }
    }

    function iPv4($ip){
        if (preg_match("/^((25[0-5]|2[0-4][0-9]|1?[0-9]{1,2})\.){3}(25[0-5]|2[0-4][0-9]|1?[0-9]{1,2})$/", $ip)) {
            echo "IP válida<br><br>";
        } else {
            echo "IP no válida<br><br>";
        }
    }

    function mac($mac){
        if (preg_match("/^([0-9A-Fa-f]{2}:){5}[0-9A-Fa-f]{2}$/", $mac)) {
            echo "MAC válida<br><br>";
        } else {
            echo "MAC no válida<br><br>";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<h2>Resultados</h2>";
        
        codPos($_POST["cp"]);
        nif($_POST["dni"]);
        fecha($_POST["fecha"]);
        mayMin($_POST["enviado"]);
        mayMinEsp($_POST["cad"]);
        soloNum($_POST["sNum"]);
        numEsp($_POST["num"]);
        numMayMinEspAcent($_POST["cadMMEA"]);
        anteriorSigPunts($_POST["cadSP"]);
        email($_POST["email"]);
        url($_POST["url"]);
        contra($_POST["contra"]);
        iPv4($_POST["ipv4"]);
        mac($_POST["mac"]);
    }
?>