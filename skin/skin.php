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
	<title>Material Skin</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<link rel="stylesheet" type="text/css" href="roboto.css"/>
	<link rel="stylesheet" type="text/css" href="dhtmlx.css"/>
	<script src="dhtmlx.js"></script>
	<style type="text/css" media="screen">
		html, body { width: 100%; height: 100%; margin: 0px; padding: 0px; overflow: hidden; font-family: 'Roboto', sans-serif; }
		.ColorTextBox{ font-family: verdana; font-size: 10px; color: white; background-color:#666;}
		SELECT{ font-family: verdana; font-size: 10px; color: black; background-color:white;} 
		.Radios { font-family: Arial; font-size: 10px;}
	</style>
	<script>
		var myGrid;
		function doOnLoad(){
			myGrid = new dhtmlXGridObject('gridbox');
			myGrid.setImagePath("../../../codebase/imgs/");
			myGrid.setHeader("Sales, Title, Description, Price", null, ["text-align:center;"]);
			myGrid.setInitWidths("80,200,*,80");
			myGrid.setColAlign("left,left,left,left");
			myGrid.setColTypes("dyn,ed,txt,price");
			myGrid.setColSorting("int,str,str,int");
			myGrid.init();
			myGrid.enableAutoHeight(true);
			myGrid.load("../common/grid_big_18_styles_skins.xml", function(){
		    myGrid.selectRowById(3)
			});
		}
	</script>
</head>
<body onLoad="doOnLoad()">

	<div id="gridbox" style="width:100%;height:840px; margin:0px; background-color:white;"></div>
</body>
</html>