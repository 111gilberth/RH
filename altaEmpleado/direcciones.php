<?php
    session_start();
    include($_SERVER['DOCUMENT_ROOT']."/funciones.php");
    include($_SERVER['DOCUMENT_ROOT']."/FuncionesCrearGraficas.php");
    $con= new ecomssa;
    $ConectaGraficas = new Graficas; 
    $ConexionGraficas=$ConectaGraficas->CrearConeccion(6);
  	$t_idus=$_REQUEST['usuario'];
	  $t_idco=$_REQUEST['pais'];
    $t_idst=$_REQUEST['estado'];
    $t_idcd=$_REQUEST['ciudad'];
    $t_calle=$_REQUEST['calle'];
    $t_noex=$_REQUEST['exterior'];
    $t_noin=$_REQUEST['interior'];
    $t_czip=$_REQUEST['postal'];
    ////////////////////////////////////////////////////////
    $consult= "SELECT * FROM trhusr003ex2 WHERE t_idus='$t_idus'";
    $resultad=$ConectaGraficas->tipoBD_query($consult,$ConexionGraficas); 
    $row=$ConectaGraficas->tipoBD_fetch_array($resultad);
    if($row==0){
              $insert="INSERT INTO trhusr003ex2 (t_idus,t_idco,t_idst,t_idcd,t_calle,t_noex,t_noin,t_czip) VALUES ('$t_idus','$t_idco','$t_idst','$t_idcd','$t_calle','$t_noex','$t_noin','$t_czip')";
              $resulta=$ConectaGraficas->tipoBD_query($insert,$ConexionGraficas)or die("Error.!");
              $consulta=" SELECT * FROM trhusr001ex2 where t_idus='$t_idus"; 
              $resultado=$ConectaGraficas->tipoBD_query($consulta,$ConexionGraficas);
              if($row==0){
        	    $update="UPDATE trhusr001ex2 set t_idln='$t_idcd' WHERE t_idus='$t_idus'";
              $resultado=$ConectaGraficas->tipoBD_query($update,$ConexionGraficas)or die("Error.!");
           }
        } 
?>
<!DOCTYPE html>
<html>
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
  <title>Direccion</title>
  <style type="text/css" media="screen">
    html, body { width: 100%; height: 100%; margin: 0px; padding: 0px; overflow: hidden;}
    .ColorTextBox{ font-family: verdana; font-size: 10px; color: white; background-color:#666;}
    SELECT{ font-family: verdana; font-size: 10px; color: black; background-color:white;} 
    .Radios { font-family: Arial; font-size: 10px;} 
     body { background: #cce6ff; }
  </style>
    <!--Estilos para esta plantilla -->
</head>
<body>
<br>
        <!--Comienzo del 
        form
        -->
        <form  id="form1" name="form1"  method="post" enctype="multipart/form-data">

<table width="100%">
<tr>
<td>
      <label for="usuario">ID Usuario</label>
  </td>
  <td>
  	<input type="text" name="usuario" id="usuario" placeholder="ID Usuario">
  </td>
  <td>
    <label for="estado" >ID Estado</label>
  </td>
  <td>
   <input type="text" name="estado" id="estado" placeholder="Estado">
  </td>
  <td>
    <label for="pais" > ID Pa&iacute;s</label>
  </td>
  <td><select name="pais" id="pais" onchange="nuevaOpcion(this.value)">
                 <?php
                        $sqlGenero="select
                                      t_idco,
									  t_dsca
                                    from trhcon001ex2";
                        $resultGenero = $ConectaGraficas->tipoBD_query($sqlGenero,$ConexionGraficas);
                        while ($row=$ConectaGraficas->tipoBD_fetch_array($resultGenero))
                         {
                                echo"<option value='".trim($row[0])."'".($banco_Actual ==
                                trim($row[0]) ?'selected':'').">".$row[1]."</option>";  
                                # code...
                        }
                  ?>
              <option value="medium">Otro</option>
              </select>
  </td>
  </tr>
<tr>
  <td>
    <label for="ciudad" >ID Ciudad</label>
  </td>
  <td>
   <input type="text" name="ciudad" id="ciudad" placeholder="Ciudad">
  </td>
  <td>
    <label for="calle" >ID Calle</label>
  </td>
  <td>
   <input type="text" name="calle" id="calle" placeholder="Calle">
  </td>
  <td>
    <label for="exterior" >No. Exterior</label>
  </td>
  <td>
   <input type="text" name="exterior" id="exterior" placeholder="No. Exterior">
  </td>
</tr>
<tr>
  <td>
    <label for="interior" >No. Interior</label>
  </td>
  <td>
   <input type="text" name="interior" id="interior" placeholder="No. Interior">
  </td>
  <td>
    <label for="postal" >Codigo Postal</label>
  </td>
  <td>
   <input type="text" name="postal" id="postal" placeholder="Codigo Postal">
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
            var arrayValidarDatos =["usuario"]
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
            form1.submit()
        }
    </script>
</html>