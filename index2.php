<?php
	session_start();
	include($_SERVER['DOCUMENT_ROOT']."/funciones.php");
	include($_SERVER['DOCUMENT_ROOT']."/FuncionesCrearGraficas.php");
	$con= new ecomssa;
	$ConectaGraficas = new Graficas; 
	$ConexionGraficas=$ConectaGraficas->CrearConeccion(6); //Conectamos con el seervidor especifico1
?>		
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" type="text/css" href="boostrap.css">
	<link rel="stylesheet" type="text/css" href="dhtmlx_custom.css"/>
	<?php echo libreriasJava(); ?>
	<title>Pantalla Principal</title>
	<style type="text/css" media="screen">
		html, body { width: 100%; height: 100%; margin: 0px; padding: 0px; overflow: hidden; font-family: 'Roboto', sans-serif; }
		.ColorTextBox{ font-family: verdana; font-size: 10px; color: white; background-color:#666;}
		SELECT{ font-family: verdana; font-size: 10px; color: black; background-color:white;} 
		.Radios { font-family: Arial; font-size: 10px;}
	</style>	
</head>	
<body onload="doOnLoad()">
</body>
<script>
	var dhxWins,main_dhxLayout;
	function doOnLoad()
	{
	//return false;
		main_dhxLayout = new dhtmlXLayoutObject(document.body, "2E");
		//***;
		main_dhxLayout.cells("a").setWidth("250px");
		//Ocultar la toolbar del layout//
		//---------------------------//
		main_dhxLayout.cells("a").hideHeader();
		main_dhxLayout.cells("b").hideHeader();	

		toolbar = main_dhxLayout.cells("a").hideHeader();
		main_dhxLayout.cells("a").attachURL('index3.php');
		//////////////////////////////////////
		dhxWins = new dhtmlXWindows();
		dhxWins.enableAutoViewport(false);
		dhxWins.attachViewportTo(document.body);
		//dhxWins.detachContextMenu();

		//AGREGAR TOOLBAR(BOTONES 6 EN LA LIBRETA )AGREGAR LA PARTE DEL IF CON EL ID SIN MOVIMIENTO SIN NADA DENTRO DEL IF
		main_dhxLayout.cells("b").attachURL("tabbar.php");
		//*******...//
		toolbar = main_dhxLayout.cells("b").hideHeader();//attachToolbar//hideheader()
		toolbar.addButton('btnNvo', 10, 'Ingresar datos de los hijos');
		dhxWins = new dhtmlXWindows();
		dhxWins.enableAutoViewport(false);
		dhxWins.attachViewportTo(document.body);
		//dhxWins.detachContextMenu();
		dhxWins.setImagePath("/dhtmlxSuite/dhtmlxWindows/codebase/imgs/");
	}
</script>
</html>