<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>tab_javascript</title>
<script type="text/javascript" >
function tab(tab_id) {//funcion tab que recibe el parametro del id
	var tab_contenido = document.getElementsByTagName("div");//definimos el elemento que sera devuelto
		for(var x=0; x<tab_contenido.length; x++) {//almacenamos los elementos divs
			name = tab_contenido[x].getAttribute("name");//recibimos el nombre de la clase
			if (name == 'tab_contenido') {//comparamos el valor del nombre
				if (tab_contenido[x].id == tab_id) {//comparamos el numero de contenido
				tab_contenido[x].style.display = 'block';//mostramos el contenido correspondiente
			}else {
				tab_contenido[x].style.display = 'none';//ocultamos los otros contenidos.
			}
		}
	}
}
</script>
<style>
/*----clase pra las pestañas---*/
#tab{
text-transform: uppercase;
padding:5px;
text-decoration:none;
color:#ccc;
font: 14px/100% Arial, Helvetica, sans-serif;
 background: #4162a8;
 border: 1px solid #19253f;
-webkit-border-top-left-radius: 10px;
-webkit-border-top-right-radius: 10px;
-moz-border-radius-topleft: 10px;
-moz-border-radius-topright: 10px;
border-top-left-radius: 10px;
border-top-right-radius: 10px;
}
/*----clase para las pestañas activadas----*/
#tab:active{ 
color:#000;
background:#ccc;
}
/*----clase para el contenido------*/
.tab_contenido{
text-align:left;
padding: 8px;
display:none;
width:550px;
height: 250px;
color:#000;
background:#ccc;
border:dimgray 1px solid;
}
</style>
<body>
 <br> <br> <br>
	<!-----pestañas de la tab--->
	<a id="tab" href="javascript:tab('tab_contenido1');" >Contenido 1</a>
	<a id="tab" href="javascript:tab('tab_contenido2');" >Contenido 2</a>
	<a id="tab" href="javascript:tab('tab_contenido3');" >Contenido 3</a>
	<!----contenidos de la tab--->
	<div name="tab_contenido" id="tab_contenido1" class="tab_contenido"style="display: block;">
	Contenido 1Contenido 1Contenido 1Contenido 1<br>Contenido 1Contenido 1Contenido 1Contenido 1<br>
	<br><br><br><br>Tellez.franco.aldo@gmail.com
		</div>
		<div name="tab_contenido" id="tab_contenido2" class="tab_contenido">
		Contenido 2Contenido 2Contenido 2Contenido 2<br>Contenido 2Contenido 2Contenido 2Contenido 2
		</div>
		<div name="tab_contenido" id="tab_contenido3" class="tab_contenido">
		Contenido 3Contenido 3Contenido 3Contenido 3<br>Contenido 3Contenido 3Contenido 3Contenido 3
		</div>
</body>
</html>