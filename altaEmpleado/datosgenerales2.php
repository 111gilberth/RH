<?php
    session_start();
    include($_SERVER['DOCUMENT_ROOT']."/funciones.php");
    include($_SERVER['DOCUMENT_ROOT']."/FuncionesCrearGraficas.php");
    $con= new ecomssa;
    $ConectaGraficas = new Graficas; 
    $ConexionGraficas=$ConectaGraficas->CrearConeccion(6); //Conectamos con el seervidor especifico1  
    $t_idus=$_REQUEST['usuario'];
    /////////////////////////////
    $t_idaf=$_REQUEST['afore'];
    $t_tnac=$_REQUEST['nacionalidad'];
    $t_idec=$_REQUEST['civil'];
    $t_vehi=$_REQUEST['vehiculo'];//||°°°°||
    $t_lice=$_REQUEST['licencia'];//||°°°°||
    $t_pass=$_REQUEST['pasaporte'];//||°°°||
    $t_visa=$_REQUEST['visa'];
    $t_date=$_REQUEST['fecha'];//banco,no.de cuenta
    $consult="SELECT * FROM trhusr001ex2 WHERE t_idus='$t_idus'";
    $resultad=$ConectaGraficas->tipoBD_query($consult,$ConexionGraficas);
    $row=$ConectaGraficas->tipoBD_fetch_array($resultad);
    if ($row==0) {
              echo '<script language="javascript">alert("No EXISTE.!!");</script>';
           }else{
             $UPDATE="UPDATE trhusr001ex2 set t_visa='$t_visa',
                                              t_tnac='$t_tnac',
                                              t_idec='$t_idec',
                                              t_idaf='$t_idaf',
                                              t_vehi='$t_vehi',
                                              t_lice='$t_lice',
                                              t_pass='$t_pass',
                                              t_date='$t_date'
                                                      WHERE t_idus='$t_idus'";
             $conexion=$ConectaGraficas->tipoBD_query($UPDATE,$ConexionGraficas)or die("Error.!");
             $cons="SELECT * FROM trhusr002ex2";
             $resultado=$ConectaGraficas->tipoBD_query($cons,$ConexionGraficas);
             while ($row=$ConectaGraficas->tipoBD_fetch_array($resultado))
                        {
                          $insert="INSERT INTO trhusr001ex2(t_idus,t_idbn,t_tcta)Values('$')";
                          $resultado=$ConectaGraficas->tipoBD_query($insert,$ConexionGraficas)or die("Error2.!");
                        }
             //echo '<script language="javascript">alert("EXISTE...UPDATE!");</script>';
             //echo $UPDATE;
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
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <!--******-->
	<!--Poner librerias java-->
	<!--Java-->
	<!--Falta poner librerias java -->
	<title>Ejemplo Cuerpo2</title>
	<!-- Falta poner el style css-->
  <style type="text/css" media="screen">
    html, body { width: 900px; height: 600px; margin: 0px; padding: 0px; overflow: hidden;}
    .ColorTextBox{ font-family: verdana; font-size: 14px; color: white; background-color:#666;}
    SELECT{ font-family: verdana; font-size: 14px; color: black; background-color:white;} 
    .Radios { font-family: Arial; font-size: 14px;} 
     body { background: #cce6ff; }

  </style>
	<!--Estilos para esta plantila -->
</head>
<body onload="doOnLoad()">
	<!--Comienzo del form-->
    <center>
     <table width="100%">
    <form id="form4" name="form4"  method="post" enctype="multipart/form-data">
      <tr>
              <td>
              <label for="usuario">ID</label>
              </td>
              <td>
              <input type="usuario" name="usuario" id="usuario" placeholder="usuario">
              </td>
              <td>
              <label for="fecha">Nacimiento</label>
              </td>
              <td>
              <input type="date" name="fecha" id="fecha">
              </td>
        <td>
       	<label for="afore">Afore</label>
        </td>
    		<td>
        <select name="afore" id="afore" onchange="nuevaOpcion(this.value)">
                 <?php
                        $sqlGenero="select
                                    t_idaf,
                                    t_dsca
                                from
                                    trhafr001ex2";
                        $resultGenero = $ConectaGraficas->tipoBD_query($sqlGenero,$ConexionGraficas);
                        while ($row=$ConectaGraficas->tipoBD_fetch_array($resultGenero))
                         {
                                echo"<option value='".trim($row[0])."'".($afore_Actual ==
                                trim($row[0]) ?'selected':'').">".$row[1]."</option>";  
                                # code...
                        }
                  ?>
              <option value="medium">Otro</option>
              </select>
              </td>
              </tr>
              <br>
    	   <tr>
          <td>
          <label for="inputdi" id="licencia">Licencia</label>
          </td>
          <td>
           <select name="licencia" id="licencia">
                  <option value="Si">Si</option>
                  <option value="No">No</option>
                  </select>
            </td>
          <td>
       <label for="pasaporte">Pasaporte</label>
          </td>
         <td>
          <select name="pasaporte" id="pasaporte" onchange="nuevaOpcion(this.value)">
              <option value="Si">Si</option>
              <option value="No">No</option>
              </select>
         </td>
         <td>
       <label for="visa">Visa</label>
         </td>
         <td>
         <select name="visa" id="visa">
              <option value="Si">Si</option>
              <option value="No">No</option>
              </select>
          </td>
          </tr>
          <br>
          <tr>
          <td>
         <label for="ciudad">Nacionalidad</label>
    		  </td>
          <td>
          <select name="nacionalidad" id="nacionalidad" onchange="nuevaOpcion(this.value)">
                 <?php
                        $sqlGenero="select
                                    t_idco,
                                    t_inac
                                from
                                    trhcon001ex2";
                        $resultGenero = $ConectaGraficas->tipoBD_query($sqlGenero,$ConexionGraficas);
                        while ($row=$ConectaGraficas->tipoBD_fetch_array($resultGenero))
                         {
                                echo"<option value='".trim($row[0])."'".($estadoCivil_Actual ==
                                trim($row[0]) ?'selected':'').">".$row[1]."</option>";  
                                # code...
                        }
                  ?>
              <option value="medium">Otro</option>
              </select>
    		  </td>
        <td>
       <label for="civil">Estado civil</label>
            </td>
            <td>
            <select name="civil" id="civil" onchange="nuevaOpcion(this.value)">
                 <?php
                        $sqlGenero="select
                                    t_idec,
                                    t_dsca
                                from
                                    trhedc001ex2";
                        $resultGenero = $ConectaGraficas->tipoBD_query($sqlGenero,$ConexionGraficas);
                        while ($row=$ConectaGraficas->tipoBD_fetch_array($resultGenero))
                         {
                                echo"<option value='".trim($row[0])."'".($estadoCivil_Actual ==
                                trim($row[0]) ?'selected':'').">".$row[1]."</option>";  
                                # code...
                        }
                  ?>
              <option value="medium">Otro</option>
              </select>
            </td>
          <td>
       <label for="vehiculo">Veh&iacute;culo</label>
            </td>
            <td>
            <select name="vehiculo" id="vehiculo">
              <option value="si">S&iacute;</option> 
              <option value="No">No</option>                
              <option value="medium">Otro</option>
              </select>
            </td>
          </tr>
 </form>
 </table>
 </center>
 <br>
           <td>
           <center>
               <a class="botonBlueLight" role="button" type="button" onclick="validaDatos()">Aceptar</a>
          </center>
          </td>
</body>
<script type="text/javascript" languaje="javascript">
        function validaDatos()
        {
            var arrayValidarDatos =["usuario"]//"afore","nacionalidad","civil"
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
                 alert("Por favor llena los campos y da click en aceptar.!");
                return false;
            }
            form4.submit()
        }
    </script>
</html>