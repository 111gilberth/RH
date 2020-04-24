<?php
    session_start();
    include($_SERVER['DOCUMENT_ROOT']."/funciones.php");
    include($_SERVER['DOCUMENT_ROOT']."/FuncionesCrearGraficas.php");
    $con= new ecomssa;
    $ConectaGraficas = new Graficas; 
    $ConexionGraficas=$ConectaGraficas->CrearConeccion(6); //Conectamos con el seervidor especifico1  
?>
<!DOCTYPE  html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html  xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo libreriasJava(); ?>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="shortcut icon" href="http://getbootstrap.com/docs-assets/ico/favicon.png">
	 <!-- Bootstrap core CSS -->
    <link href="http://getbootstrap.com/dist/css/bootstrap.css" rel="stylesheet">
    <!--******-->
	<!--Poner librerias java-->
	<!--Java-->
	<!--Falta poner librerias java -->
	<title>Ejemplo Cuerpo2</title>
	<!-- Falta poner el style css-->
  <style type="text/css" media="screen">
        html, body { width: 100%; height: 100%; margin: 0px; padding: 0px; overflow: hidden;}
        .ColorTextBox{ font-family: verdana; font-size: 10px; color: white; background-color:#666;}
        SELECT{ font-family: verdana; font-size: 10px; color: black; background-color:white;} 
        .Radios { font-family: Arial; font-size: 10px;} 
    </style>
	<!--Estilos para esta plantila -->
</head>
<body onload="doOnLoad()">
		<div>
  			<tr>
				<td>
					<h3 class="form-signin-heading" align="center">En caso de emergencia</h3></td></tr>

				<tr>
				<td>
				<br>
        <!--Comienzo del 
        form
        -->
    	<label for="inputafore" class="col-sm-2 control-label">Contacto</label>
    		<div class="col-sm-2">
      	<input type="text" class="Radios" id="inputpes" placeholder="Contacto" required autofocus>
    		</div>
  			</div>
  			<div>
    	<label for="inputam" class="col-sm-2 control-label">Parentesco</label>
   			 <div class="col-sm-2">
      	<input type="text" min="1" step="any" class="Radios" id="inputpa" placeholder="Parentesco" required autofocus>
    		 </div>
             </div>
    		 <div>
   		 <label for="inputam" class="col-sm-2 control-label">Telefono</label>
    		 <div class="col-sm-2">
     	 <input type="tel" class="Radios" id="inputel" placeholder="Telefono">
    		 </div>
    		 </div>
        
        <br>
        <br>
        <br>
         <div align="center">
   			  <a href="datosmedicos.php" class="botonBlueLight" role="button">Anterior</a>
    	 <a class="botonBlueLight" href="datosConyugue.php" role="button">Siguiente</a>

    	      </div>
</body>
</html>