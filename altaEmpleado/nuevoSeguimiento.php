<?php
	session_start();
	include($_SERVER['DOCUMENT_ROOT']."/funciones.php");
	include($_SERVER['DOCUMENT_ROOT']."/FuncionesCrearGraficas.php");
	include($_SERVER['DOCUMENT_ROOT']."/funciones_llenar_graficas.php");
	$con= new ecomssa;
	$ConectaGraficas = new Graficas; 
	$ConexionGraficas=$ConectaGraficas->CrearConeccion(1); //Conectamos con el seervidor especifico1 
	 
	$sqlTipoMonto="Select [t_idsx] ,[t_dsca] from [Anexo_LNDB].[dbo].[trhsex001ex2]";
	$resultTipoMonto = $ConectaGraficas->tipoBD_query($sqlTipoMonto,$ConexionGraficas);
	while($row=$ConectaGraficas->tipoBD_fetch_array ($resultTipoMonto))
	{
		$arrayValorJava.="'".$row[0]."',";
		$arrayTextoJava.="'".$row[1]."',"; 
	} 
	$arrayValorJava = substr($arrayValorJava,0,-1);
	$arrayTextoJava =  substr($arrayTextoJava,0,-1);
?>	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />  
	<?php echo libreriasJava(); ?> 
	<title>Reportes</title> 
	<style type="text/css" media="screen, projection"> 
		.ColorTextBox{ font-family: verdana; font-size: 10px; background-color:#dbdbdb;}
		SELECT{ font-family: verdana; font-size: 10px; color: black;} 
		.Radios { font-family: Arial; font-size: 10px;} 
		html, body { width: 100%; height: 100%; margin: 0px; padding: 0px; overflow: hidden;}
		
		.popup {position: absolute; width: 260px; height: 245px; top: 15px; left: 255px; z-index: 999; color: #000000; background-color: #ffffff;  align: center}
		.close-image {  cursor: pointer; display: block; float: right; z-index: 3; position: absolute; right:-15px; top: -15px; } 
	</style>	
</head>
<body onload='doOnload()' > 
	<form name='form1' id='form' method='POST' action='guardarSeguimiento.php'>

		<table class='tablaBlueLigth' width='100%' height='100%'>
			<tr>
				<td valign ='TOP' width='600px'> 
					<div id= 'divImportes' name= 'divImportes' style=' width: 100%; height: 23px; margin: 0px; padding: 0px;' ></div>
					<div style=' width: 99%; height: 95px; margin: 0px; padding: 0px; overflow-y:scroll; border-style: ridge;' >
					<input type='hidden' name='maxContadorFails' id='maxContadorFails'  value= '0'>
					<table  class='tableResumenGraficas' id='tblImpacto' width= "100%">
						<tbody name='bodyCampos' id='bodyCampos' >  </tbody>
					</table>
					</div>
				</td >
			</tr> 
		</table> 
	</form>
</body>

<script>
  
	var arrayValorJava = new Array(<?php echo $arrayValorJava; ?>);
	var arrayTextoJava = new Array(<?php echo $arrayTextoJava; ?>);
	
	function doOnload(objeto)	{
		var toolbar = new dhtmlXToolbarObject({parent: "divImportes"});  
		toolbar.addButton('btnSeguimientosNuevo', 20, 'Nuevo Importe', '/imagenes/iconos/new.gif');  
		toolbar.setAlign("right");  
		toolbar.attachEvent("onClick", function(id)  {	 
			if(id=='btnSeguimientosNuevo') agregarFilaTabla("tblImpacto","bodyCampos","maxContadorFails","Fails" )
		});
	}
	function agregarFilaTabla(tabla,contenedor,contadorCamposTabla,NombreControles){
		var objTd1;
		var NumeroSeries =parseInt(document.getElementById(contadorCamposTabla).value);
		var valorCampo="", NombreCampo="";
		document.getElementById(contadorCamposTabla).value=NumeroSeries+1;
		var botones =  "<img src='/imagenes/iconos/papelera3.png' width='20px' alt='Eliminar' onclick='eliminarFilaTabla(\""+NombreControles+"\"," + NumeroSeries + ");'>";
		var objTr = document.createElement("tr");
		objTr.id = "tr"+NombreControles +"_" + NumeroSeries;
		objTd1 = document.createElement("td");
		objTd1.id = "td"+NombreControles + "_"  + NumeroSeries + "_" + 1;
		objTr.appendChild(objTd1);
		ele = document.createElement('select');
		ele.name = "slsImpacto_"+NumeroSeries;
		ele.id = "slsImpacto_"+NumeroSeries; 
		ele.onchange = function () {  validaOtros(this); };	
			//Create and append the options
		for (var i = 0; i < arrayTextoJava.length; i++) {
			var option = document.createElement("option");
			option.value = arrayValorJava[i];
			option.text = arrayTextoJava[i];
			ele.appendChild(option);
		} 
		objTd1.appendChild(ele); 
		objTr.appendChild(objTd1);
		var objTbody = document.getElementById(contenedor);
		objTbody.appendChild(objTr);
		var objId = myCalendar.attachObj("fechaFinal_"+NumeroSeries);
		return false;	//evita que haya un submit por equivocacion.
	} 
	 	function eliminarFilaTabla(nombreTR,oId){
		var objHijo = document.getElementById('tr'+nombreTR+'_' + oId);
		var objPadre = objHijo.parentNode;
		objPadre.removeChild(objHijo);
		calcularImportes()
		return false;
	}	
</script>
</html>