<?php

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
<script type="text/javascript">
selectNivelConocimientoDD = document.createElement("select");
selectNivelConocimientoDD.id = "selectNivelConocimientoDD" + sufix;
selectNivelConocimientoDD.name = "selectNivelConocimientoDD" + sufix;
selectNivelConocimientoDD.style.width ="200px";
selectNivelConocimientoDD.length = arrLnivCon[0].length -1;

//llenamos las opciones del select de nivel de conocimiento
for(foro = 0; foro < arrLnivCon[0].length - 1; foro++){

if(arrListProfileChatacteristics[form][3] == arrLnivCon[2][foro]){
selectNivelConocimientoDD.options[foro] = new Option(arrLnivCon[0][foro],arrLnivCon[1][foro]); 
selectNivelConocimientoDD.options[foro].selected = "true";
}else{
selectNivelConocimientoDD.options[foro] = new Option(arrLnivCon[0][foro],arrLnivCon[1][foro]); 
} 
}
tdNivelConocimientoDD.appendChild(selectNivelConocimientoDD);
</script>
</html>