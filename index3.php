<!DOCTYPE html>
<html>
<head>
	<title>Init from script</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<link rel="stylesheet" type="text/css" href="roboto.css"/>
    <link href="https://fonts.googleapis.com/css?family=Basic|Prata|Roboto|Yrsa" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="dhtmlxtabbar.css"/>
	<script src="dhtmlxtabbar.js"></script>
	 <style type="text/css" media="screen">
    html, body { width: 100%; height: 100%; margin: 0px; padding: 0px; overflow: hidden;font-family: 'Yrsa', serif;}
    .ColorTextBox{ font-family: verdana; font-size: 10px; color: white; background-color:#666;}
    SELECT{ font-family: verdana; font-size: 10px; color: black; background-color:white;} 
    .Radios { font-family: Arial; font-size: 10px;} 
  </style>
</head>
<body onload="doOnLoad();">
	<div id="my_tabbar" style="width:100%; height:100%;"></div>
</body>
	<script>

		function doOnLoad() {
			myTabbar = new dhtmlXTabBar("my_tabbar");
			myTabbar.addTab("a1", "Datos del Trabajador", null, null, true);
			myTabbar.tabs("a1").attachURL('altaEmpleado/datosgenerales.php');
		}
	</script>
</html>