<?php
    session_start();
    include($_SERVER['DOCUMENT_ROOT']."/funciones.php");
    include($_SERVER['DOCUMENT_ROOT']."/FuncionesCrearGraficas.php");
    $con= new ecomssa;
    $ConectaGraficas = new Graficas; 
    $ConexionGraficas=$ConectaGraficas->CrearConeccion(6); //Conectamos con el seervidor especifico1  
?>
<!DOCTYPE  html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
        .ColorTextBox{ font-family: verdana; font-size: 14px; color: white; background-color:#666;}
        SELECT{ font-family: verdana; font-size: 14px; color: black; background-color:white;} 
        .Radios { font-family: Arial; font-size: 14px;} 
        body { background: #cce6ff; }
    </style>
	<!--Estilos para esta plantila -->
</head>
<body onload="doOnLoad()">
		<div>
				<tr>
				<td>
					<center><h3 class="form-signin-heading">Datos del c&oacute;nyuge</h3></center></td></tr>
				<tr>
				<td>
				<br>
        <!--Comienzo del 
        form
        -->
    	<label for="inputafore" class="col-sm-2 control-label">Nombre</label>
        <div class="col-sm-2">
        <input type="text" class="Radios" id="inputname" placeholder="Nombre" required autofocus>
        </div>
        <div>
      <label for="inputam" class="col-sm-2 control-label">Fecha de nacimiento</label>
         <div class="col-sm-2">
        <input type="date" class="Radios" id="naci" required autofocus>
         </div>
         <div>
       <label for="inputam" class="col-sm-2 control-label">Profesi&oacute;n</label>
         <div class="col-sm-2">
       <input type="text" class="Radios" id="profesion" placeholder="Profesi&oacute;n">
         </div>
            <br>
            <br>
            <br>
       <div>
       <label for="inputdi" class="col-sm-2 control-label">Trabaja</label>
         <div class="col-sm-2">
         <select name="size" id="genero">
              <option value="small" >Si</option>
              <option value="medium">No</option>
              </select>
         </div>
          <div>
      <label for="inputam" class="col-sm-2 control-label"></label>
         <div class="col-sm-2">
       </div>
         <div>
       <label for="inputam" class="col-sm-2 control-label"></label>
         <div class="col-sm-2">
       </div>
           </div>
           <br>
           <br>
          <div class="col-sm-12" align="center">
          <a class="botonBlueLight" href="nuevo.php" role="button">Anterior</a>
       <a class="botonBlueLight" type="submit" role="button" onclick="validaDatos()">Aceptar</a>
            </div> 
			  </div>
</body>
    <script type="text/javascript" languaje="javascript">
        function validaDatos()

        {
            var arrayValidarDatos =["inputname","naci","profesion","genero"]
            totalCampos =arrayValidarDatos.length
            var bandera=0;
            for  ( i= 0; i< totalCampos; i++)
            {

                document.getElementById(arrayValidarDatos[i]).style.backgroundColor="#fff";
                //Coloreamos de blanco los campos donde hallamos escrito o hallamos utilizado el campo 
                if (document.getElementById(arrayValidarDatos[i]).value==''){
                    document.getElementById(arrayValidarDatos[i]).style.backgroundColor="#ffff00";
                //coloreamos los campos donde hallamos NO insertado los datos
                 alert("Para seguir se deben llenar todos los campos");
                } 
                else
                {
                    bandera = 1 
                }

            }

            if (bandera==0) {
                return false;
            }
            form1.submit()
        }
    </script>
</html>