<?php
    session_start();
    include($_SERVER['DOCUMENT_ROOT']."/funciones.php");
    include($_SERVER['DOCUMENT_ROOT']."/FuncionesCrearGraficas.php");
    $con= new ecomssa;
    $ConectaGraficas = new Graficas; 
    $ConexionGraficas=$ConectaGraficas->CrearConeccion(6);
    //Conectamos con el servidor especifico1  
    //mandamos los datos del form1 a la pantalla para ver que se haga bien el traslado de datos//
    /////////////////////////////////////////////////////////////////////////////////////////////
    ///Comprobamos que no se dupliquen los datos/// 
    $t_idoc=$_REQUEST['id_max'];
    $t_dsca=$_REQUEST['puesto'];
    $consul = "SELECT * FROM trhpst001ex2 WHERE t_idoc='$t_idoc' AND t_dsca='$t_dsca'";
    $resultado=$ConectaGraficas->tipoBD_query($consul,$ConexionGraficas); 
    $row=$ConectaGraficas->tipoBD_fetch_array($resultado);
     if ($row==0) {
              $insert="INSERT INTO trhpst001ex2 (t_idoc, t_dsca) VALUES ('$t_idoc','$t_dsca')";
              $resulta=$ConectaGraficas->tipoBD_query($insert,$ConexionGraficas)or die("Error.!");
           }else{
           echo '<script language="javascript">alert("Ya existe ese campo, ingresa otro");</script>';
           }    
           /* {
                 $idoc_actual=$row['t_idoc'];
                 $dsca_emno=$row['t_dsca'];
                      
            }
    /*$consul = "SELECT t_idoc,t_dsca FROM trhpst001ex2";
    $resultado = $ConectaGraficas->tipoBD_query($consul,$ConexionGraficas);
    while ($row=$ConectaGraficas->tipoBD_fetch_array($resultado))
                  {
                      $t_idoc=$row['id_max'];
                      $t_dsca=$row['puesto'];
                  }
    $t_idoc=$_REQUEST['id_max'];
    $t_dsca=$_REQUEST['puesto'];
    $cons="SELECT COUNT(t_idoc) from trhpst001ex2 where t_idoc='$t_idoc'";
    $resu=$ConectaGraficas->tipoBD_query($cons,$ConexionGraficas);  
    if ($row=$ConectaGraficas->tipoBD_fetch_array($cons)==0) 
    {
    $SQL="INSERT INTO trhpst001ex2 (t_idoc, t_dsca) VALUES ('$t_idoc','$t_dsca')";
    echo "<br>".$SQL;
    $resulta=$ConectaGraficas->tipoBD_query($SQL,$ConexionGraficas)or die("Error.!");
    }else{
       echo '<script language="javascript">alert("Ya existe ese campo, ingresa otro");</script>'; 
    }*/
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
  <title>Puesto</title>
  <style type="text/css" media="screen">
    html, body { width: 100%; height: 100%; margin: 0px; padding: 0px; overflow: hidden;}
    .ColorTextBox{ font-family: verdana; font-size: 10px; color: white; background-color:#666;}
    SELECT{ font-family: verdana; font-size: 10px; color: black; background-color:white;} 
    .Radios { font-family: Arial; font-size: 10px;} 
        .img{width: 180px; height: 180px;}
        .row { margin-right: -15px; margin-left: -15px;}
        .col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;}
  </style>
    <!--Estilos para esta plantilla -->
</head>
<body>
<div>
  
                        <h3 class="col-sm-12" class="form-signin-heading" align="center">Puesto</h3>
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
        <form  id="form3" name="form3"  method="post" enctype="multipart/form-data">
<!---->
<table width="100%">
<tr>
  <td>
    <label for="id_max">ID Puesto</label>
  </td>
  <td>
    <input type="text" name="id_max" placeholder="id sexo max" id="id_max">
  </td>
</tr>
<tr>
  <td>
    <label for="clinica" >Puesto</label>
  </td>
  <td>
    <input type="text" name="puesto" id="puesto" placeholder="Puesto">
    </select>
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

</body>

    <script type="text/javascript" languaje="javascript">
        function validaDatos()

        {
            var arrayValidarDatos =["id_max","puesto"]
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
            form3.submit()
        }
    </script>
</html>