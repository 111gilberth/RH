<?php
    session_start();
    include($_SERVER['DOCUMENT_ROOT']."/funciones.php");
    include($_SERVER['DOCUMENT_ROOT']."/FuncionesCrearGraficas.php");
    $con= new ecomssa;
    $ConectaGraficas = new Graficas; 
    $ConexionGraficas=$ConectaGraficas->CrearConeccion(6);
    $t_idec="1";
    //Conectamos con el servidor especifico1  
    //mandamos los datos del form1 a la pantalla para ver que se haga bien el traslado de datos//
    /////////////////////////////////////////////////////////////////////////////////////////////
    $t_idec=$_REQUEST['id_estado'];
    $t_dsca=$_REQUEST['estado_civil'];
    $consult= "SELECT * FROM trhedc001ex2 WHERE t_idec='$t_idub' AND t_dsca='$t_dsca'";
    $resultad=$ConectaGraficas->tipoBD_query($consult,$ConexionGraficas); 
    $row=$ConectaGraficas->tipoBD_fetch_array($resultad);
     if ($row==0) {
              $insert="INSERT INTO trhedc001ex2 (t_idec,t_dsca) VALUES ('$t_idec','$t_dsca')";
              $resulta=$ConectaGraficas->tipoBD_query($insert,$ConexionGraficas)or die("Error.!");
           }else{
             echo '<script language="javascript">alert("Ya existe ese campo, ingresa otro");</script>';
           }
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
<title>Estado Civil</title>
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
  
                        <h3 class="col-sm-12" class="form-signin-heading" align="center">Estado Civ&iacute;l</h3>
                         <tr>
                             </tr>  
                    <br>
                    <br> 
</div>
<div class="col-sm-4"></div>
<div class="col-sm-4">
        <!--Comienzo del 
        form
        -->
        <br>
        <br>
        <form  id="form1" name="form6"  method="post" enctype="multipart/form-data">
<!---->
 <table width="100%">
<tr>
  <td>
    <label for="id_estado">ID max estado civ&iacute;l</label>
  </td>
  <td>
    <input type="text" name="id_estado" id="id_estado" placeholder="ID max estado civ&iacute;l">
  </td>
</tr>
<tr>
  <td>
    <label for="estado_civil" >Estado civil</label>
  </td>
  <td>
    <input type="text" name="estado_civil" id="estado_civil" placeholder="Estado civil">
  </td>
</tr>
</table>
        <!-- -->
        <td>
        <br> 
        <center>
       <a class="botonBlueLight" role="button" type="button" onclick="validaDatos()">Aceptar</a>
       </center>
        </td>
        </form>
         <script type="text/javascript" languaje="javascript">
        function validaDatos()

        {
            var arrayValidarDatos =["id_estado","estado_civil"]
            totalCampos =arrayValidarDatos.length
            var bandera=0;
            for  ( i= 0; i< totalCampos; i++)
            {

                document.getElementById(arrayValidarDatos[i]).style.backgroundColor="#fff";
                //Coloreamos de blanco los campos donde hallamos escrito o hallamos utilizado el campo 
                if (document.getElementById(arrayValidarDatos[i]).value==''){
                    document.getElementById(arrayValidarDatos[i]).style.backgroundColor="#ffff00";
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
            form6.submit()
        }
    </script>
       
</body>
</html>