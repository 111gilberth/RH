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
    <link href="bootstrap.css" rel="stylesheet">
    <!--******-->
  <title>Datos de los hijos</title>
  <style type="text/css" media="screen">
    html, body { width: 100%; height: 100%; margin: 0px; padding: 0px; overflow: hidden;}
    .ColorTextBox{ font-family: verdana; font-size: 10px; color: white; background-color:#666;}
    SELECT{ font-family: verdana; font-size: 10px; color: black; background-color:white;} 
    .Radios { font-family: Arial; font-size: 10px;} 
        .img{width: 180px; height: 180px;}
        .row { margin-right: -15px; margin-left: -15px;}
        .col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;}
        body { background: #ECF9D9; }
  </style>
    <!--Estilos para esta plantilla -->
	<!--Estilos para esta plantila -->
</head>
<body onload="doOnLoad()">
	<div>
  
                        <h3 class="col-sm-12" class="form-signin-heading" align="center">Datos del Hijo(a)</h3>
                         <tr>
                             </tr>  

                    <br>
                    <br> 
</div>
        <!--Comienzo del 
        form
        -->
        <br>
        <br>
        <form  id="form1" name="form1" method="post" enctype="multipart/form-data">
        <input type="text" name="iduser" value="<?php echo $iduser; ?>" style="display: none">
        <table width="100%">
        <tr>
        <td>

        <table width="100%">
        <tr>
        <td>
<!--   -->
<tr>
  <td>
    <label for="nombre">Nombre</label>
  </td>
  <td>
     
    <label for="paterno">Ap. paterno</label>
  </td>
  <td>
    <label for="materno">Ap. materno</label>
  </td>
  <td>
    <label for="fecha">Fecha de Nacimiento</label>
  </td>
  <td>
    <label for="sexo">Sexo</label>
  </td>
  </tr>
   <tr>
  <td>
    <input type="text" class="Radios" id="nombre" name="nombre" placeholder="Nombre">
  </td>
  <td>
    <input type="text" class="Radios" id="paterno" name="paterno" placeholder="Apellido paterno"> 
  </td>
  <td>
  <input type="text" class="Radios" id="materno" name="materno" placeholder="Apellido materno"> 
  </td>
  <td>
  <input type="date" class="Radios" name="fecha" id="fecha">  
  </td>
  <td>
  <input type="text" class="Radios" id="sexo" name="sexo" placeholder="sexo">
  </td>
  </tr>

  <tr>
  <td>
    <label for="grado">Grado en que cursa</label>
  </td>
  <td>
    <label for="institucion">Instituci&oacute;n</label>
  </td>
  <td> 
    <label for="parentesco">Parentesco</label>
  </td>
  <td>
    <label for="trabaja">Trabaja/Estudia</label>
  </td>
  </tr>

  <tr>
  <td>
    <input type="text" class="Radios" name="grado" id="grado" placeholder="Grado en que cursa">
  </td>
  <td>
    <input type="text" class="Radios" name="institucion" id="instutucion" placeholder="Instituci&oacute;n">
  </td>
  <td>
    <input type="text" name="parentesco" id="parentesco" class="Radios" placeholder="Parentesco">
  </td>
  <td>
    <input type="text" name="trabaja" class="Radios" id="trabaja" placeholder="Trabaja o Estudia">
  </td>
</tr>
 </table>
 </td>
</tr>
   </table>
        <!-- -->
        <td>
        <br>
        <br>
      <center>
       <a class="botonBlueLight" role="button" type="button" onclick="validaDatos()" href="datosConyugue.php">Siguiente</a>
       </center>
        </td>
        </form>
</body>
        <script type="text/javascript" languaje="javascript">
        function validaDatos()

        {
            var arrayValidaDatos =["nombre","paterno","materno","fecha","sexo","grado","institucion","parentesco","trabaja"]
            totalCampos =arrayValidaDatos.length
            var bandera=0;
            for  ( i= 0; i< totalCampos; i++)
            {

                document.getElementById(arrayValidaDatos[i]).style.backgroundColor="#fff";
                //Coloreamos de blanco los campos donde hallamos escrito o hallamos utilizado el campo 
                if (document.getElementById(arrayValidaDatos[i]).value==''){
                    document.getElementById(arrayValidaDatos[i]).style.backgroundColor="#ffff00";
                //coloreamos los campos donde hallamos NO insertado los datos
                 alert("Por favor llena los campos y da click en aceptar.!");
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
</html>