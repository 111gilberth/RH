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
	<style type="text/css" media="screen">
    html, body { width: 100%; height: 100%; margin: 0px; padding: 0px; overflow: hidden;font-family: 'Yrsa', serif;}
    .ColorTextBox{ font-family: verdana; font-size: 10px; color: white; background-color:#666;}
    SELECT{ font-family: verdana; font-size: 10px; color: black; background-color:white;} 
    .Radios { font-family: Arial; font-size: 10px;} 
  </style>
</head>
<body onload="doOnLoad();">
	<div id="my_tabbar" style="width:100%; height:150%;"></div>
</body>
<script>
 		function doOnLoad() {
			myTabbar = new dhtmlXTabBar("my_tabbar");
			myTabbar.addTab("a1", "Generales", null, null, true);
			myTabbar.addTab("a2", "Familiares");
			myTabbar.addTab("a3", "M&eacute;dicos"); 
			

			myTabbar2 = myTabbar.tabs("a1").attachTabbar({
				tabs: [
					{ id: "a1", text: "Trabajador", active: true },
					{ id: "a2", text: "Direccion" },
					{ id: "a3", text: "Estudios" }
				]
			});
            myTabbar2.tabs("a1").attachURL('altaEmpleado/nuevoSeguimientoCascaron.php');
            myTabbar2.tabs("a2").attachURL('altaEmpleado/direccion.php');
            myTabbar2.tabs("a3").attachURL('altaEmpleado/estudiosacreditados.php');
            myTabbar3 = myTabbar.tabs("a2").attachTabbar({
				tabs: [
					{ id: "a1", text: "", active: true },
				]
			}); 
			myTabbar3.tabs("a1").attachURL('altaEmpleado/nuevo.php');
            myTabbar4 = myTabbar.tabs("a3").attachTabbar({
				tabs: [
					{ id: "aa", text: "Generales", active: true },
				]
			});
            myTabbar4.tabs("aa").attachURL('altaEmpleado/datosmedicos.php');
		}
	</script>

</html>