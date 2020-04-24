<?php
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="ejemploVariable.php" id="formulario" method="post" name="formulario">
    <input id="variable" name="variable" type="text" />
    <input id="aceptar" type="submit" value="Aceptar" onclick="recargar()" />
</form>
</body>
<script>
function recargar()
{
var hola=document.getElementById("variable").value;
document.write(hola);
}
</script>

</html>