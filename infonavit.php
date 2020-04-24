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
    <?php echo libreriasJava(); ?>
	<title>Init config from xml</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<link rel="stylesheet" type="text/css" href="roboto.css"/>
	<link rel="stylesheet" type="text/css" href="dhtmlxtabbar.css"/>
	<script src="dhtmlxtabbar.js"></script>
	<script>
		var myTabbar;
		function doOnLoad() {
			myTabbar = new dhtmlXTabBar("my_tabbar");
			myTabbar.loadStruct("../common/tabbar.xml");//enlace para poner en el cuerpo
		}
	</script>
	<style type="text/css" media="screen">
		html, body { width: 100%; height: 100%; margin: 0px; padding: 0px; overflow: hidden;}
		.ColorTextBox{ font-family: verdana; font-size: 10px; color: white; background-color:#666;}
		SELECT{ font-family: verdana; font-size: 10px; color: black; background-color:white;} 
		.Radios { font-family: Arial; font-size: 10px;} 
	</style>
</head>
<body onload="doOnLoad();">
	<div id="my_tabbar" style="width:100%px; height:100%;"></div>
</body>
</html>