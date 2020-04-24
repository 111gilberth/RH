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
	<?php echo libreriasJava(); ?>
	<title>Pantalla Principal</title>
	<style type="text/css" media="screen">
		html, body { width: 100%; height: 100%; margin: 0px; padding: 0px; overflow: hidden;}
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
		main_dhxLayout = new dhtmlXLayoutObject(document.body, "2U");
		//***;
		main_dhxLayout.cells("a").setWidth("250");
		//Ocultar la toolbar del layout//
		//---------------------------//
		main_dhxLayout.cells("a").hideHeader();
		main_dhxLayout.cells("b").hideHeader();	
		main_dhxLayout.cells("a").attachURL('altaEmpleado/a.php');
		toolbar = main_dhxLayout.cells("a").attachToolbar();
		toolbar.addButton('boton0', 10,'Recursos Humanos','/Imagenes/iconos/rh.PNG');//10,SIGUIENTE BOTON,20, SIGUIENTE 30,..ETC
		///FUNCION PARA ABRIRI VENTANA EMERGENTE//BOTON DE NUEVO ESTA FUNCION LO ABRE//
		//////////////////////////////////////
		dhxWins = new dhtmlXWindows();
		dhxWins.enableAutoViewport(false);
		dhxWins.attachViewportTo(document.body);
		//dhxWins.detachContextMenu();
		dhxWins.setImagePath("/dhtmlxSuite/dhtmlxWindows/codebase/imgs/");
		toolbar.attachEvent("onClick", function(id) 
		{	
	    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
			/*if(id=='boton0') 
			{ 
				idVentana="windowsPermiso";	
				if(dhxWins.window(idVentana)) return false;
				dhxWins.createWindow(idVentana,1160,1200,1160,1200);
				dhxWins.window(idVentana).center();
				dhxWins.window(idVentana).setText("Infonavit");
			}*/
		});

		main_dhxLayout.cells("b").attachURL("index2.php");
		//*******...//
		toolbar = main_dhxLayout.cells("b").attachToolbar();//attachToolbar//hideheader()
		toolbar.addButton('boton', 10,'Inicio','/Imagenes/iconos/inicio.PNG');
		toolbar.addButton('boton0', 20,'Infonavit','/Imagenes/iconos/infonavit.PNG');//10,SIGUIENTE BOTON,20, SIGUIENTE 30,..ETC
		///FUNCION PARA ABRIRI VENTANA EMERGENTE//BOTON DE NUEVO ESTA FUNCION LO ABRE//
		toolbar.addButton('boton1', 30,'Pensiones','/Imagenes/iconos/pension.PNG');
		toolbar.addButton('boton2', 40,'Reporte Gral de Asistencias','/Imagenes/iconos/asistencia.PNG');
		toolbar.addButton('boton3', 50,'Reporte Gral de Vacaciones','/Imagenes/iconos/vaca.PNG');
		toolbar.addButton('boton4', 60,'Modificar Catalogos','/Imagenes/iconos/modifi.PNG');
		dhxWins = new dhtmlXWindows();
		dhxWins.enableAutoViewport(false);
		dhxWins.attachViewportTo(document.body);
		//dhxWins.detachContextMenu();
		dhxWins.setImagePath("/dhtmlxSuite/dhtmlxWindows/codebase/imgs/");
			toolbar.attachEvent("onClick", function(id) 
		{	
	    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
			if(id=='boton') 
			{ 
				/*
				idVentana="windowsPermiso";	
				if(dhxWins.window(idVentana)) return false;
				dhxWins.createWindow(idVentana,1160,1200,1160,1200);
				dhxWins.window(idVentana).center();
				dhxWins.window(idVentana).setText("Infonavit");
				*/
				main_dhxLayout.cells("b").attachURL("index2.php"); 
			}
		});
		toolbar.attachEvent("onClick", function(id) 
		{	
	    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
			if(id=='boton0') 
			{ 
				/*
				idVentana="windowsPermiso";	
				if(dhxWins.window(idVentana)) return false;
				dhxWins.createWindow(idVentana,1160,1200,1160,1200);
				dhxWins.window(idVentana).center();
				dhxWins.window(idVentana).setText("Infonavit");
				*/
				main_dhxLayout.cells("b").attachURL("infonavit.php"); 
			}
		});

		toolbar.attachEvent("onClick", function(id) 
		{	
	    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
			if(id=='boton1') 
			{ 
				/*
				idVentana="windowsPermiso";	
				if(dhxWins.window(idVentana)) return false;
				dhxWins.createWindow(idVentana,1160,1200,1160,1200);
				dhxWins.window(idVentana).center();
				dhxWins.window(idVentana).setText("Pensiones");
				dhxWins.window(idVentana).attachURL("tabbar.php");
				*/
				main_dhxLayout.cells("b").attachURL("pensiones.php"); 
			}
		});
			toolbar.attachEvent("onClick", function(id) 
		{	
	    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
			if(id=='boton2') 
			{ 
				/*
				idVentana="windowsPermiso";	
				if(dhxWins.window(idVentana)) return false;
				dhxWins.createWindow(idVentana,1160,1200,1160,1200);
				dhxWins.window(idVentana).center();
				dhxWins.window(idVentana).setText("Reporte Gral de Asistencias");
				dhxWins.window(idVentana).attachURL("tabbar.php"); 
				*/
				main_dhxLayout.cells("b").attachURL("asistencia.php"); 
			}
		});

	toolbar.attachEvent("onClick", function(id) 
		{	
	    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
			if(id=='boton3') 
			{ 
				/*
				idVentana="windowsPermiso";	
				if(dhxWins.window(idVentana)) return false;
				dhxWins.createWindow(idVentana,1160,1200,1160,1200);
				dhxWins.window(idVentana).center();
				dhxWins.window(idVentana).setText("Reporte Gral de Vacaciones");
				dhxWins.window(idVentana).attachURL("tabbar.php"); 
				*/
				main_dhxLayout.cells("b").attachURL("vacaciones.php"); 
			}
		});

	toolbar.attachEvent("onClick", function(id) 
		{	
	    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
			if(id=='boton4') 
			{ 
				/*
				idVentana="windowsPermiso";	
				if(dhxWins.window(idVentana)) return false;
				dhxWins.createWindow(idVentana,1160,1200,1160,1200);
				dhxWins.window(idVentana).center();
				dhxWins.window(idVentana).setText("Modificar Catalogos");
				dhxWins.window(idVentana).attachURL("tabbar.php"); 
				*/
				main_dhxLayout.cells("b").attachURL("modificar.php"); 
			}
		});
		//10,SIGUIENTE BOTON,20, SIGUIENTE 30,..ETC
		///FUNCION PARA ABRIRI VENTANA EMERGENTE//BOTON DE NUEVO ESTA FUNCION LO ABRE////
		//////////////////////////////////////
	}
</script>
</html>