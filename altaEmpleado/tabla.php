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
  <style type="text/css" media="screen">
    div#layoutObj {
      position: relative;
      margin-top: 10px;
      margin-left: 10px;
      width: 600px;
      height: 400px;
    }

    html, body { width: 100%; height: 100%; margin: 0px; padding: 0px; overflow: hidden;}
    .ColorTextBox{ font-family: verdana; font-size: 10px; color: white; background-color:#666;}
    SELECT{ font-family: verdana; font-size: 10px; color: black; background-color:white;} 
    .Radios { font-family: Arial; font-size: 10px;} 
  </style>
  <script>
    var myLayout, myTabbar,tab;
    function doOnLoad(){
      myLayout = new dhtmlXLayoutObject({
        parent: "layoutObj",
        pattern: "3L"
      });
      myTabbar = myLayout.cells("a").attachTabbar({
        tabs: [
          { id: "a1", text: "Tab 1"},
          { id: "a2", text: "Tab 2"}
        ] 
      });
    }
  </script>
</head>
<body onload="doOnLoad();">
  <div id="layoutObj"></div>

</body>
</html>