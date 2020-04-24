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
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="shortcut icon" href="http://getbootstrap.com/docs-assets/ico/favicon.png">
	 <!-- Bootstrap core CSS -->
    <link href="http://getbootstrap.com/dist/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <!--******-->
	<!--Poner librerias java-->
	<!--Java-->
	<!--librerias java -->
    <?php echo libreriasJava(); ?>
	<title>Estudios Acreditados</title>
	<!--style css-->
    <style type="text/css" media="screen">
        html, body { width: 100%; height: 100%; margin: 0px; padding: 0px; overflow: hidden;}
        .ColorTextBox{ font-family: verdana; font-size: 10px; color: white; background-color:#666;}
        SELECT{ font-family: verdana; font-size: 10px; color: black; background-color:white;} 
        .Radios { font-family: Arial; font-size: 10px;} 
         body { background: #cce6ff; }
    </style>
	<!--Estilos para esta plantila -->
</head>
<body onload="doOnLoad()">
		<div>
    <!--
				<tr>
				<td>
					<h3 align="center" class="form-signin-heading">&Uacute;ltimos Estudios</h3></td></tr>-->
				<tr>
				<td>
				<br>
        <!--Comienzo del 
        form
        -->
	
    	<label for="inputafore" class="col-sm-2 control-label">Nivel de estudios</label>
    		<div class="col-sm-2">
      	<input type="text" class="Radios" id="nivel" placeholder="Nivel de estudios" required autofocus>
    		</div>
  		

  			<div>
    	<label for="inputam" class="col-sm-2 control-label">Carrera</label>
   			 <div class="col-sm-2">
      	<input type="number" min="1" step="any" class="Radios" id="carrera" placeholder="Carrera" required autofocus>
    		 </div>
             

    		 <div>
   		 <label for="inputam" class="col-sm-2 control-label">Documento</label>
    		 <div class="col-sm-2">
     	 <input type="text" class="Radios" id="do" placeholder="Documento">
    		 </div>
    		 
            <br>
            <br>
          
 			 <div>
    	 <label for="inputdi" class="col-sm-2 control-label">Instituci&oacute;n</label>
    		 <div class="col-sm-2">
      	 <input type="text" class="Radios" id="inst" placeholder="Institucci&oacute;n">
    		 </div>

              <div>
         <label for="inputdi" class="col-sm-2 control-label"></label>
             <div class="col-sm-2">
             </div>
             
              <div>
         <label for="inputdi" class="col-sm-2 control-label"></label>
             <div class="col-sm-2">
             </div>
             <br>
    		 <h4 align="center">Estudios Actuales</h4>
    		 
    		 <!--Comienzo del form-->
    		 <!--****-->

     		   <label for="inputdi" class="col-sm-2">Nivel</label>
      <div class="col-sm-2">
        <input type="text" class="Radios" id="calle" placeholder="Nivel">
      </div>
    <label for="inputdir" class="col-sm-2">Institucion</label>
      <div class="col-sm-2">
        <input type="text" class="Radios" id="colonia" placeholder="Institucion">
      </div>
    <label for="inputnum" class="col-sm-2">Horario</label>
      <div class="col-sm-2">
        <input type="time" class="Radios" id="postal" placeholder="Horario" required autofocus>
      </div>
          <br>
          <br>
      </div>
    <label for="inputdi" class="col-sm-2">Fecha termino</label>
      <div class="col-sm-2">
        <input type="date" class="Radios" id="fecha" placeholder="Fecha termino" required autofocus>
      </div>
    <label for="inputdir" class="col-sm-2"></label>
      <div class="col-sm-2">
        
      </div>
    <label for="inputnum" class="col-sm-2"></label>
      <div class="col-sm-2">
        
      </div>
      </div>
    		  <div class="col-sm-12" align="center">
     <a class="botonBlueLight" role="button" type="button" onclick="validaDatos()">Aceptar</a> 
    	 </div>
			  </div>
</body>
<script type="text/javascript">
    
         function validaDatos()

        {
            var arrayValidarDatos =["fecha","postal","colonia","calle","inst","do","carrera","nivel"]
            totalCampos =arrayValidarDatos.length
            var bandera=0;
            for  ( i= 0; i< totalCampos; i++)
            {

                document.getElementById(arrayValidarDatos[i]).style.backgroundColor="#fff";
                //Coloreamos de blanco los campos donde hallamos escrito o hallamos utilizado el campo 
                if (document.getElementById(arrayValidarDatos[i]).value==''){
                    document.getElementById(arrayValidarDatos[i]).style.backgroundColor="#ffff00";
                //coloreamos los campos donde hallamos NO insertado los datos
                } 
                else
                {
                    bandera = 1 
                }

            }

            if (bandera==0) {
                 alert("Para seguir se deben llenar todos los campos");
                return false;
            }
            form1.submit()
        }
  </script>

</html>