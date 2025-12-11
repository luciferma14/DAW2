<?php
session_start();
if (!isset($_SESSION["codigo"])) { die("No has iniciado sesión"); }
$codigo = $_SESSION["codigo"];
?>

<!DOCTYPE html>
<html>
<body>

<h1>Chat: <?php echo $codigo; ?></h1>

<div id="mensajes"></div>

<form id="formMensaje">
    <input type="text" id="msg" placeholder="Escribe..." required>
    <button>Enviar</button>
</form>

<script>
setInterval(async ()=>{
    let r = await fetch("leer.php?codigo=<?php echo $codigo; ?>");
    let datos = await r.text();
    document.getElementById("mensajes").innerHTML = datos;
}, 1500);

document.getElementById("formMensaje").onsubmit = async (e)=>{
    e.preventDefault();
    let txt = document.getElementById("msg").value;

    let fd = new FormData();
    fd.append("codigo", "<?php echo $codigo; ?>");
    fd.append("mensaje", txt);

    await fetch("enviar.php", { method:"POST", body: fd });
    document.getElementById("msg").value = "";
}
</script>

</body>
</html>
