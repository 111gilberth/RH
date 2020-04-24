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
  <link rel="stylesheet" type="text/css" href="boostrap.css">
  <?php echo libreriasJava(); ?>
	<title>Fullscreen init</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<link rel="stylesheet" type="text/css" href="roboto.css"/>
	<link rel="stylesheet" type="text/css" href="dhtmlx.css"/>
	<script src="dhtmlx.js"></script>
<script>
		var myTabbar;
		function doOnLoad() {
			
			myTabbar = new dhtmlXTabBar("my_tabbar");
			
			myTabbar.addTab("a1", "Tab 1-1", null, null, true);
			myTabbar.addTab("a2", "Tab 1-2");
			myTabbar.addTab("a3", "Tab 1-3");
			
			myTabbar.tabs("a1").attachURL('altaEmpleado/datosgenerales2.php');
			myTabbar.tabs("a2").attachURL('altaEmpleado/nuevo.php');
			myTabbar.tabs("a3").attachURL('altaEmpleado/datosmedicos.php');
			
		}
	</script>
</head>
<body onload="doOnLoad();">
	<div id="my_tabbar" style="width:395px; height:390px;"></div>
	<div id="html_1" style="display: none;"><img border="0" src="../common/page_a.gif"></div>
	<div id="html_2" style="display: none;"><img border="0" src="../common/page_b.gif"></div>
</body>
</html>