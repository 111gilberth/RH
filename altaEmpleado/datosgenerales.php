<?php
    session_start();
    include($_SERVER['DOCUMENT_ROOT']."/funciones.php");
    include($_SERVER['DOCUMENT_ROOT']."/FuncionesCrearGraficas.php");
    $con= new ecomssa;
    $ConectaGraficas = new Graficas; 
    $ConexionGraficas=$ConectaGraficas->CrearConeccion(6);
    //Conectamos con el seervidor especifico1 
    $iduser=$_POST['iduser'];
    $iduser="";
    $consul = "SELECT t_idus,t_emno,t_nama,t_namb,t_namc,t_fini,t_idsx,t_idoc,t_iddp,t_boss,t_idub,t_tnss,t_idsg,t_trfc,t_curp,t_pict,t_stat FROM trhusr001ex2 WHERE (t_idus  = '$iduser') AND t_stat <>3";
    $resultado = $ConectaGraficas->tipoBD_query($consul,$ConexionGraficas);
    while ($row=$ConectaGraficas->tipoBD_fetch_array($resultado))
                  {
                      $id_actual= $row['t_idus'];
                      $t_emno=$row['t_emno'];
                      $nombre_actual=$row['t_nama'];
                      $apellidop_actual=$row['t_namb'];
                      $apellidom_actual=$row['t_namc'];
                      $fecha_actual=$row['t_fini'];
                      $sexo_actual=$row['t_idsx'];
                      $puesto_actual=$row['t_idoc'];
                      $departamento_actual=$row['t_iddp'];
                      $jefe_actual=$row['t_boss'];
                      $sede_actual=$row['t_idub'];
                      $nss_actual=$row['t_tnss'];
                      $clinica_actual=$row['t_idsg'];
                      $rfc_actual=$row['t_trfc'];
                      $curp_actual=$row['t_curp'];
                      $pict_actual=$row['t_pict'];

                      //echo "<br>->".$pict_actual;
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
    <link href="https://fonts.googleapis.com/css?family=Basic|Prata|Roboto|Yrsa" rel="stylesheet">
	  <!-- Bootstrap core CSS -->
    <link href="bootstrap.css" rel="stylesheet">
    <!--******-->
	<title>Ejemplo Cuerpo1</title>
	<style type="text/css" media="screen">
		html, body { width: 100%; height: 100%; margin: 0px; padding: 0px; overflow: hidden;}
		.ColorTextBox{ font-family: verdana; font-size: 10px; color: white; background-color:#666;}
		SELECT{ font-family: verdana; font-size: 10px; color: black; background-color:white;} 
		.Radios { font-family: Arial; font-size: 10px;} 
    .img{width: 180px; height: 180px;}
    .row { margin-right: -15px; margin-left: -15px;}
    .col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, 
    .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, 
    .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, 
    .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11,
    .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12{position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;}
        body { background: #e6f2ff; }
   .banner {position: absolute; left: 50%; display: block; margin: 5px -50px; width: 300px; height: 60px; border: 1px solid #D8D8D8; font: normal 30px/60px 'Arial'; text-align: center;color: #451; background: #F2F2F2; border-radius: 4px; box-shadow: 0 0 30px rgba(0,0,0,.15);}
   .banner::before, .banner::after { content: ''; position: absolute; z-index: -1; left: -70px; top: 24px; display: block; width: 40px; height: 0px; border: px solid #D8D8D8; border-right: 20px solid #791; border-bottom-color: #E6E6E6; border-left-color: transparent; transform: rotate(-5deg);}
   .banner::after { left: auto; right: -70px; border-left: 20px solid #791; border-right: 30px solid transparent; transform: rotate(5deg); }
	    </style>
<!--Estilos para esta plantilla -->
</head>
<body>
        <br>
        <br>
        <form  id="form1" name="form1" action="guardarDatos.php" method="post" enctype="multipart/form-data">
        <input type="text" name="iduser" value="<?php echo $iduser; ?>" style="display: none">
        <table width="100%">
        <center>
        <tr>
        <td>
        <table width="100%">
        <tr>
        <td>
    <label for="nomina">No. nomina</label>
    </td>
    <td>
     <input type="text" class="Radios" id="nomina" placeholder="No. nomina" name="nomina" value="<?php echo $t_emno; ?>" > 
        </td>
      <td></td>
      <td></td>
      <td></td>
      </tr>
<!--   -->
<tr>
  <td>
    <label for="nombre">Nombre</label>
    </td>
    <td>
     <input type="text" class="Radios" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $nombre_actual; ?>"> 
    </td>
    <td>
    <label for="paterno">Ap. paterno</label>
  </td>
  <td>
     <input type="text" class="Radios" id="paterno" name="paterno" placeholder="Apellido paterno" value="<?php echo $apellidop_actual ?>"> 
  </td>
  <td>  
    <label for="materno">Ap. materno</label>
  </td>
  <td>
     <input type="text" class="Radios" id="materno" name="materno" placeholder="Apellido materno" value="<?php echo $apellidom_actual ?>"> 
  </td>
  </tr>
<!--    -->
<tr>
<td>
    <label for="ingreso">Fecha ingreso</label>
</td>
<td>
     <input type="date" class="Radios" name="ingreso" id="ingreso" value="<?php echo $fecha_actual ?>"> 
</td>
<td>
    <label for="sexo">G&eacute;nero</label>
</td>
<td>
        <select onchange="nuevaOpcion(this.value)" name="sexo" id="sexo">
           <!--Consulta sql--> 
            <?php
                $sqlGenero="select
                            t_idsx,
                            t_dsca
                        from
                            trhsex001ex2 ";
                $resultGenero = $ConectaGraficas->tipoBD_query($sqlGenero,$ConexionGraficas);
                while ($row=$ConectaGraficas->tipoBD_fetch_array($resultGenero))
                 {
                        echo"<option value='".trim($row[0])."' ".($genero_Actual ==
                        trim($row[0]) ?'selected':'') .">".$row[1]."</option>";  # code...
                }
            ?>
            <option value='otros_sexo'>Otros</option>
        </select>
 </td>
 <td>
    <label></label>
  </td>
  <td>
    <label></label>
  </td>
  </tr>
  <br>
 
<!--    -->
<tr>
<td>
    <label for="puesto">Puesto</label>
    </td>
    <td>
        <select onchange="nuevaOpcion(this.value)" name="puesto" id="puesto"> 
            <?php
                $sqlGenero="select
                            t_idoc,
                            t_dsca
                        from
                            trhpst001ex2 ";
                $resultGenero = $ConectaGraficas->tipoBD_query($sqlGenero,$ConexionGraficas);
                while ($row=$ConectaGraficas->tipoBD_fetch_array($resultGenero))
                 {
                        echo"<option value='".trim($row[0])."' ".($puesto_Actual ==
                        trim($row[0]) ?'selected':'') .">".$row[1]."</option>";  # code...
                }
            ?> 
        <option value="otros_puesto">Otros</option>
        </select>
    </td>
    <td>
    <label for="departamento">Departamento</label>
      </td>
      <td>
        <select onchange="nuevaOpcion(this.value)" name="departamento" id="departamento">
                  <!--Consulta sql-->
                  <?php
                        $sqlGenero="select
                                    t_iddp,
                                    t_dsca
                                from
                                    trhdpt001ex2";
                        $resultGenero = $ConectaGraficas->tipoBD_query($sqlGenero,$ConexionGraficas);
                        while ($row=$ConectaGraficas->tipoBD_fetch_array($resultGenero))
                         {
                                echo"<option value='".trim($row[0])."' ".($departamento_Actual ==
                                trim($row[0]) ?'selected':'') .">".$row[1]."</option>";  # code...
                        }
                  ?> 
            <option value="otros_departamentos">Otros</option>
         </select>
    </td>
    <td>
    <label for="inmediato">Jefe inmediato</label>
    </td>
    <td>
    <select name="inmediato" id="inmediato"> 
              <!--Concatenar dos campos en sql -->
               <?php
                        $sqlGenero="select
                                      t_idus,
                                     t_nama
                                      +''+ 
                                      t_namb
                                    from trhusr001ex2";
                        $resultGenero = $ConectaGraficas->tipoBD_query($sqlGenero,$ConexionGraficas);
                        while ($row=$ConectaGraficas->tipoBD_fetch_array($resultGenero))
                         {
                                echo"<option value=' ".trim($row[0])."' ".($inmediato_Actual ==
                                trim($row[0]) ?'selected':'') .">".$row[1]."</option>";  # code...
                        }
                  ?> 
            <option value="otros_jefes_inmediatos">Ninguno</option> 
    </select> 
    </td>
    </tr>
    <tr>
    <td>
    <label for="sede">Sede</label>
    </td>
    <td>
    <select onchange="nuevaOpcion(this.value)" name="sede" id="sede">
                <?php
                        $sqlGenero="select
                                    t_idub,
                                    t_dsca
                                from
                                    trhplc001ex2";
                        $resultGenero = $ConectaGraficas->tipoBD_query($sqlGenero,$ConexionGraficas);
                        while ($row=$ConectaGraficas->tipoBD_fetch_array($resultGenero))
                         {
                                echo"<option value=' ".trim($row[0])."' ".($sede_Actual ==
                                trim($row[0]) ?'selected':'') .">".$row[1]."</option>";  # code...
                        }
                  ?> 
            <option value="otros_sedes">Otros</option> 
    </select>
   </td>
   <td>
    <label for="nss">NSS</label>
     </td>
     <td>
     <input type="text" class="Radios" id="nss" name="nss" placeholder="NSS" value="<?php echo $nss_actual ?>"> 
     </td>
     <td>
    <label for="clinica">No. cl&iacute;nica</label>
    </td>
    <td>
    <select onchange="nuevaOpcion(this.value)" name="clinica" id="clinica">
              <?php
                        $sqlGenero="select
                                    t_idsg,
                                    t_dsca
                                from
                                    trhseg001ex2";
                        $resultGenero = $ConectaGraficas->tipoBD_query($sqlGenero,$ConexionGraficas);
                        while ($row=$ConectaGraficas->tipoBD_fetch_array($resultGenero))
                         {
                                echo"<option value='".trim($row[0])."'".($clinica_Actual ==
                                trim($row[0]) ?'selected':'').">".$row[1]."</option>";  
                                # code...
                        }
                  ?> 
            <option value="otros_clinica">Otros</option> 
    </select>
    </td>
    </tr>
    <tr>
    <td>
    <label for="rfc">RFC</label>
    </td>
    <td>
     <input type="text" class="Radios" id="rfc" name="rfc" placeholder="RFC" value="<?php echo $rfc_actual ?>"> 
    </td>
    <td>
    <label for="curp">CURP</label>
     </td>
     <td>
     <input type="text" class="Radios" id="curp" name="curp" placeholder="CURP" value="<?php echo $curp_actual ?>"> 
 </td>
 </tr>
 </table>
 </td>

<td>
<?php
$img_actual="/Imagenes/iconos/usuario.png".$pict_actual;//quitar el user.png
//echo "$img_actual";
if (!file_exists($_SERVER['DOCUMENT_ROOT'].$img_actual)) 
  {
  $img_actual= '/usuario.PNG';
  //echo '<img src="\images\user.png" border="0" height="150px" width="150px"/>';
  //echo '<img src=\"$imagen\" border=\"0\"/>';
}
//echo "<br>".$img_actual;

?>

    <td>
    
        <center>
        <img src="<?php echo $img_actual; ?>" onclick="abreFile()" width='130px' height='130px'> 
        </center>
        <input type="file" id="myfile" name="myfile"  onchange="previewFile()" style="display: none">
  </td>
        
    </td>

</tr>
   </table>
   <br>
        <!-- -->
        <td>
      </td>
</table>        
      <center><a class="botonBlueLight" role="button" type="button" onclick="validaDatos()">Aceptar</a></center>
        </form>

</body>

    <script type="text/javascript" languaje="javascript">
        function validaDatos()

        {
            var arrayValidarDatos =["nomina","nombre","paterno","materno","ingreso","puesto","departamento","inmediato","sede","nss","clinica","rfc","curp"]
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
					alert("Para seguir se deben llenar todos los campos");
                    bandera = 1 
                }

            }

            if (bandera==0) {
                return false;
            }
            form1.submit()
        }

                  //Script de imagen para subir
                  var fileSelect = document.getElementById("fileSelect"),
                      fileElem = document.getElementById("fileElem");

                  fileSelect.addEventListener("click", function (e) {
                         if (fileElem) {
                      fileElem.click();
                    }
                       e.preventDefault(); // prevent navigation to "#"
                  }, false);

                  function abreFile()
                    {
                      document.getElementById("myfile").click(); 
                    }

                    function previewFile() {
                      var preview = document.querySelector('img');
                      var file    = document.querySelector('input[type=file]').files[0];
                      var reader  = new FileReader(); 
                      reader.onloadend = function () {
                        preview.src = reader.result;
                      }

                      if (file) {
                        reader.readAsDataURL(file);
                      } else {
                        preview.src = "";
                      }
                    }
    </script>

</html>