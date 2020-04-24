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
	<title>Integration with dhtmlxTabbar</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<link rel="stylesheet" type="text/css" href="../../../codebase/dhtmlx.css"/>
	<script src="../../../codebase/dhtmlx.js"></script>
	<style>
		div#layoutObj {
			position: relative;
			margin-top: 10px;
			margin-left: 10px;
			width: 600px;
			height: 400px;
		}
	</style>
   <script>
		var myLayout, myTabbar;
		function doOnLoad() {
			myLayout = new dhtmlXLayoutObject({
				parent: "layoutObj",
				pattern: "3L"
			});
			
			myTabbar = myLayout.cells("a").attachTabbar({
				tabs: [
					{ id: "a1", text: "Tab 1", active: true },
					{ id: "a2", text: "Tab 2" }
				]
			});
		}
	</script>	
</head>
<body onload="doOnLoad();">
	<div id="my_tabbar" style="width:395px; height:390px;"></div>
	<div id="html_1" style="display: none;"><img border="0" src="../common/page_a.gif"></div>
	<div id="html_2" style="display: none;"><img border="0" src="../common/page_b.gif"></div>
</body>
</html>