<?php
    session_start();
	include($_SERVER['DOCUMENT_ROOT']."/funciones.php");
	include($_SERVER['DOCUMENT_ROOT']."/FuncionesCrearGraficas.php");
	$con= new ecomssa;
	$ConectaGraficas = new Graficas; 
	$ConexionGraficas=$ConectaGraficas->CrearConeccion(6); //Conectamos con el seervidor especifico1
?>
<!DOCTYPE html>
<html>
<head>
	<title>Init from script</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<link rel="stylesheet" type="text/css" href="roboto.css"/>
	<link rel="stylesheet" type="text/css" href="dhtmlxtabbar.css"/> 
	<?php echo libreriasJava(); ?>
	<script src="dhtmlxtabbar.js"></script>
	<style>
		div#layoutObj {
			margin-top: 0px;
			margin-left: 0px;
			width: 100%;
			height:100%;
		}
		html, body { width: 100%; height: 100%; margin: 0px; padding: 0px; overflow: hidden;}
		.ColorTextBox{ font-family: verdana; font-size: 10px; color: white; background-color:#666;}
		SELECT{ font-family: verdana; font-size: 10px; color: black; background-color:white;} 
		.Radios { font-family: Arial; font-size: 10px;} 
	</style>
	<script>
	var dhxWins,main_dhxLayout;
	function doOnLoad()
	{
	//return false;
		main_dhxLayout = new dhtmlXLayoutObject(document.body, "2U");
		//***;
		main_dhxLayout.cells("a").setWidth("250");
		//Ocultar la toolbar del layout//
		//---------------------------//
		main_dhxLayout.cells("a").hideHeader();
		main_dhxLayout.cells("b").hideHeader();	
		main_dhxLayout.cells("a").attachURL('altaEmpleado/modificarCatalogosConsulta.php');
		///FUNCION PARA ABRIRI VENTANA EMERGENTE//BOTON DE NUEVO ESTA FUNCION LO ABRE//
		//////////////////////////////////////
		dhxWins = new dhtmlXWindows();
		dhxWins.enableAutoViewport(false);
		dhxWins.attachViewportTo(document.body);
		//dhxWins.detachContextMenu();
		main_dhxLayout.cells("b").attachURL('altaEmpleado/sexo.php');
		dhxWins = new dhtmlXWindows();
		dhxWins.enableAutoViewport(false);
		dhxWins.attachViewportTo(document.body);
		//dhxWins.detachContextMenu();
	}
</script>
</head>
<body onload="doOnLoad();">
</body>
</html>