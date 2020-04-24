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
  <title>Integration with dhtmlxTabbar</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <link rel="stylesheet" type="text/css" href="roboto.css"/>
  <link rel="stylesheet" type="text/css" href="dhtmlx.css"/>
  <link href="https://fonts.googleapis.com/css?family=Prata|Roboto|Yrsa" rel="stylesheet">
  <script src="dhtmlx.js"></script>
  <script>
    var myTabbar;
    function doOnLoad() {
      
      myTabbar = new dhtmlXTabBar("my_tabbar");
      
      myTabbar.addTab("a1", "Datos Generales", null, null, true);
      myTabbar.addTab("a2", "Datos Familiares");
      myTabbar.addTab("a3", "Datos Medicos");

      myTabbar.tabs("a1").attachURL('altaEmpleado/datosgenerales2.php');
      myTabbar.tabs("a2").attachURL('altaEmpleado/nuevo.php');
      myTabbar.tabs("a3").attachURL('altaEmpleado/datosmedicos.php');
    }
    
  </script>
  <style type="text/css" media="screen">
    html, body { width: 100%; height: 100%; margin: 0px; padding: 0px; overflow: hidden;font-family: 'Yrsa', serif;}
    .ColorTextBox{ font-family: verdana; font-size: 10px; color: white; background-color:#666;}
    SELECT{ font-family: verdana; font-size: 10px; color: black; background-color:white;} 
    .Radios { font-family: Arial; font-size: 10px;} 
  </style>
</head>
<body onload="doOnLoad();">
 <div id="my_tabbar" style="width:1500px; height:380px;"></div>
</body>
</html>