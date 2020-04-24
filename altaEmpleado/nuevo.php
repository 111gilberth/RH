<?php
	session_start();
	include($_SERVER['DOCUMENT_ROOT']."/funciones.php");
	include($_SERVER['DOCUMENT_ROOT']."/FuncionesCrearGraficas.php");
	include($_SERVER['DOCUMENT_ROOT']."/funciones_llenar_graficas.php");
	$con= new ecomssa;
	$ConectaGraficas = new Graficas; 
	$ConexionGraficas=$ConectaGraficas->CrearConeccion(6); //Conectamos con el seervidor especifico1
	$fecha = date("Y-m-d");
	//"nombre","paterno","materno","telefono","estudia","estudios","institucion","parentesco"
	/*$variablePHP = “<script> document.getElementById("nombre").value=variable;</script>”;
	echo 'nbsp;'.$variablePHP;
	$var[0]=$_REQUEST['nombre'];
	$var[1]=$_REQUEST['paterno'];
	foreach ($var as $variable) {
		# code...
		echo '<br>'.$var;
	}*/

?>	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="https://fonts.googleapis.com/css?family=Basic|Prata|Roboto|Yrsa" rel="stylesheet">
	<?php echo libreriasJava(); ?> 
	<title>Agregar hijo </title> 
	<style type="text/css" media="screen, projection"> 
		.ColorTextBox{ font-family: verdana; font-size: 10px; background-color:#dbdbdb;}
		SELECT{ font-family: verdana; font-size: 10px; color: black;} 
		.Radios { font-family: Arial; font-size: 10px;} 
		html, body { width: 100%; height: 100%; margin: 0px; padding: 0px; overflow: hidden;font-family: 'Yrsa', serif;}
		.banner { height: 6000px; width: 1600px; 
        			background-color: #CEECF5; border-color: #A9E2F3; border: 5px; 
        		}
       	body { background: #cce6ff; }
	</style>
</head>
<body onload='doOnload()' > 
		<form name='form1' id='form' method='POST' action='guardarSeguimiento.php'>
	
		<table class='tablaBlueLigth' width='100%' height='100%'>
			<tr>
				<td valign ='TOP' width='600px'> 
					<div id= 'divImportes' name= 'divImportes' style=' width: 100%; height: 23px; margin: 0px; padding: 0px;' ></div>
					<div style=' width: 99.5%; height: 135px; margin: 0px; padding: 0px; overflow-y:scroll; border-style: ridge;' >
					<input type='hidden' name='maxContadorFails' id='maxContadorFails'  value= '0'>
					<table  class='tableResumenGraficas' id='tblImpacto' width= "100%">
						<tbody name='bodyCampos' id='bodyCampos' >  
						<tr><td>Nombre<td>Apellido paterno<td>Apellido materno<td>Fecha de nacimiento<td>Genero</td><td>Telefono<td>Trabaja/Estudia<td>Estudios<td>Institucion<td>Parentesco<td>Eliminar</td></td></td></td></td></td></td></td></td></td></tr>
						</tbody>
					</table>
					</div>
				</td >
			</tr>
		</table> 
		<br>
		<div Id="FondoSeccionC" align ='center'  style='width:100%'>    
       <a class="botonBlueLight" role="button" type="button" onclick="validaDatos();recargar()">Aceptar</a>   
	</form>
</body>
<script>//
	//function validaNumber(event)	{
		//var chCode = ('charCode' in event) ? event.charCode : event.keyCode; // returns false if a numeric 
		//character has been entered
	//	if(((chCode < 48)||(chCode > 57))&&(chCode != 46)) return (false);
	//	else return (true);
	//}
		var arrayValorJava = new Array(<?php echo $arrayValorJava; ?>);
	var arrayTextoJava = new Array(<?php echo $arrayTextoJava ?>);
	
	function doOnload(objeto)	{
		var toolbar = new dhtmlXToolbarObject({parent: "divImportes"});  
		toolbar.addButton('btnSeguimientosNuevo', 20, 'Agregar Familiar', '/imagenes/iconos/novo.PNG');  
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
				var botones =  "<img src='/imagenes/iconos/papelera3.png' width='20px' height='20px' alt='Eliminar' onclick='eliminarFilaTabla(\""+NombreControles+"\"," + NumeroSeries + ");'>";
				////////////////////////////////////////////////////////////////
				var objTR = document.createElement("tr");//grega una nueva fila
				objTR.id = "tr"+NombreControles +"_" + NumeroSeries;
				objTd1 = document.createElement("label");//agrega una nueva celda
				objTd1.id = "td"+NombreControles + "_"  + NumeroSeries + "_" + 3;
				objTR.appendChild(objTd1);
				ele = document.createElement('input');//
				ele.setAttribute("type", "text");//atributo del input
				ele.className = "Radios";  //clase del input para el estilo.css
				ele.style.backgroundColor  ='lightyellow'; 
				ele.style.textAlign='center'; 
				ele.placeholder="Nombre"
				objTd1.appendChild(ele);
				objTR.appendChild(objTd1);
				///////////////////////////////////////////////////////////////
				var objTr = document.createElement("tr");//grega una nueva fila
				objTr.id = "tr"+NombreControles +"_" + NumeroSeries;
				objTd1 = document.createElement("td");//agrega una nueva celda
				objTd1.id = "td"+NombreControles + "_"  + NumeroSeries + "_" + 3;
				objTr.appendChild(objTd1);
				ele = document.createElement('input');//
				ele.setAttribute("type", "text");//atributo del input
				ele.setAttribute("id","nombre");
				ele.style.height="10px";
				ele.style.width ="100%";
				ele.className = "Radios";  //clase del input para el estilo.css
				ele.style.backgroundColor  ='lightyellow'; 
				ele.style.textAlign ='center'; 
				ele.placeholder="Nombre"
				objTd1.appendChild(ele);
				objTr.appendChild(objTd1);
				///////////////////////////////////////////////////////////////
				objTd1 = document.createElement("td");//agrega una nueva celda
				ele = document.createElement('input');//
				ele.setAttribute("type", "text");//atributo del input
				ele.setAttribute("id","paterno");
				ele.style.width = "100%";
				ele.className = "Radios";  //clase del input para el estilo.css
				ele.style.backgroundColor  ='lightyellow'; 
				ele.style.textAlign   ='center'; 
				ele.placeholder="Apellido p."
				objTd1.appendChild(ele);
				objTr.appendChild(objTd1);
				///////////////////////////
				objTd1 = document.createElement("td");//agrega una nueva celda
				ele = document.createElement('input');//
				ele.setAttribute("type", "text");//atributo del input
				ele.setAttribute("id","materno");
				ele.style.width = "100%";
				ele.className = "Radios";  //clase del input para el estilo.css
				ele.style.backgroundColor  ='lightyellow'; 
				ele.style.textAlign   ='center'; 
				ele.placeholder="Apellido m."
				objTd1.appendChild(ele);
				objTr.appendChild(objTd1);
				////////////////////////////////////////
				objTd1 = document.createElement("td");//agrega una nueva celda
				ele = document.createElement('input');//
				ele.setAttribute("type","date");//atributo del input
				ele.style.width="100%";
				ele.className="Radios";//clase del input para el estilo.css
				ele.style.backgroundColor='lightyellow'; 
				ele.style.textAlign='center'; 
				objTd1.appendChild(ele);
				objTr.appendChild(objTd1);
				/////////////////////////////////////////////////////////////
				objTd1 = document.createElement("td");//agrega una nueva celda
				objTd1.id = "td"+NombreControles + "_"  + NumeroSeries + "_" + 1;
				ele = document.createElement('select');//
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
				//////////////////////////////////////
				objTd1 = document.createElement("td");//agrega una nueva celda
				ele = document.createElement('input');//
				ele.setAttribute("type", "text");//atributo del input
				ele.setAttribute("id","telefono");
				ele.style.width = "100%";
				ele.className = "Radios";  //clase del input para el estilo.css
				ele.style.backgroundColor  ='lightyellow'; 
				ele.style.textAlign   ='center'; 
				ele.placeholder="Telefono"
				objTd1.appendChild(ele);
				objTr.appendChild(objTd1);
				//////////////////////////////////////
				objTd1 = document.createElement("td");//agrega una nueva celda
				ele = document.createElement('input');//
				ele.setAttribute("type", "text");//atributo del input
				ele.setAttribute("id","estudia");
				ele.style.width = "100%";
				ele.className = "Radios";  //clase del input para el estilo.css
				ele.style.backgroundColor  ='lightyellow'; 
				ele.style.textAlign   ='center'; 
				ele.placeholder="Tabaja/Estudia"
				objTd1.appendChild(ele);
				objTr.appendChild(objTd1);
				//////////////////////////////////////
				objTd1 = document.createElement("td");//agrega una nueva celda
				ele = document.createElement('input');//
				ele.setAttribute("type", "text");//atributo del input
				ele.setAttribute("id","estudios");
				ele.style.width = "100%";
				ele.className = "Radios";  //clase del input para el estilo.css
				ele.style.backgroundColor  ='lightyellow'; 
				ele.style.textAlign   ='center'; 
				ele.placeholder="Nivel de estudios"
				objTd1.appendChild(ele);
				objTr.appendChild(objTd1);
				////////////////////////////////////
				objTd1 = document.createElement("td");//agrega una nueva celda
				ele = document.createElement('input');//
				ele.setAttribute("type", "text");//atributo del input
				ele.setAttribute("id","institucion");
				ele.style.width = "100%";
				ele.className = "Radios";  //clase del input para el estilo.css
				ele.style.backgroundColor  ='lightyellow'; 
				ele.style.textAlign   ='center'; 
				ele.placeholder="Institucion"
				ele.style.id="institucion";
				objTd1.appendChild(ele);
				objTr.appendChild(objTd1);
				///////////////////////////
				objTd1 = document.createElement("td");//agrega una nueva celda
				ele = document.createElement('input');//
				ele.setAttribute("type", "text");//atributo del input
				ele.setAttribute("id","parentesco");
				ele.style.width = "100%";//medida de la anchura
				ele.className = "Radios";  //clase del input para el estilo.css
				ele.style.backgroundColor  ='lightyellow';//color de fondo
				ele.style.textAlign   ='center'; 
				ele.placeholder="Parentesco"
				objTd1.appendChild(ele);
				objTr.appendChild(objTd1);
				///////////////////////////
				var objTd2 = document.createElement("td");
				objTd2.id = "td"+NombreControles +  "_" + NumeroSeries + "_" + 4;
				objTd2.innerHTML = botones;
				objTr.appendChild(objTd2);
				var objTbody = document.getElementById(contenedor);
				objTbody.appendChild(objTr);
				var objId = myCalendar.attachObj("fechaFinal_"+NumeroSeries);
				return false;	//evita que haya un submit por equivocacion.
		/////////////////////////////////////////////////////////////
	}
	function eliminarFilaTabla(nombreTR,oId){
				var objHijo = document.getElementById('tr'+nombreTR+'_' + oId);
				var objPadre = objHijo.parentNode;
				objPadre.removeChild(objHijo);
				calcularImportes()
				return false;
	}

	 function validaDatos()

        {
            var arrayValidarDatos =["nombre","paterno","materno","telefono","estudia","estudios","institucion","parentesco"]
            totalCampos =arrayValidarDatos.length
            var bandera=0;
            for  ( i= 0; i< totalCampos; i++)
            {

                document.getElementById(arrayValidarDatos[i]).style.backgroundColor="#fff";
                //Coloreamos de blanco los campos donde hallamos escrito o hallamos utilizado el campo 
                if (document.getElementById(arrayValidarDatos[i]).value==''){
                    document.getElementById(arrayValidarDatos[i]).style.backgroundColor="#ffff00";
                //coloreamos los campos donde hallamos NO insertado los datos
                 alert("Para seguir se deben llenar todos los campos");
                } 
                else
                {
                    bandera = 1 
                }

            }

            if (bandera==0) {
                return false;
            }
            form1.submit()
        }
        function recargar()
		{
			var variable1=document.getElementById("nombre").value;
			var variable2=document.getElementById("paterno").value;
			var variable3=document.getElementById("materno").value;
			var variable4=document.getElementById("telefono").value;
			var variable5=document.getElementById("estudia").value;
			var variable6=document.getElementById("estudios").value;
			var variable7=document.getElementById("institucion").value;
			var variable8=document.getElementById("parentesco").value;
			document.write(variable1)+document.write(variable2)+document.write(variable3)+document.write(variable4)+document.write(variable5)+document.write(variable6)+document.write(variable7)+document.write(variable8);
		}
</script>
</html>