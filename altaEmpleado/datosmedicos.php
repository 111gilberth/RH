<?php
    session_start();
    include($_SERVER['DOCUMENT_ROOT']."/funciones.php");
    include($_SERVER['DOCUMENT_ROOT']."/FuncionesCrearGraficas.php");
    $con= new ecomssa;
    $ConectaGraficas = new Graficas; 
    $ConexionGraficas=$ConectaGraficas->CrearConeccion(6); //Conectamos con el seervidor especifico1
    //["id","peso","estatura","talla","sangre","alergias","lentes","padecimiento","medicacion"]
    //t_peso  t_talt  t_idtl  t_blod  t_alrg  t_glass t_pade  t_medi
    $t_idus=$_REQUEST['usuario'];
    $t_peso=$_REQUEST['peso'];
    $t_talt=$_REQUEST['estatura'];
    $t_idtl=$_REQUEST['talla'];//||°°°°||
    $t_blod=$_REQUEST['sangre'];//||°°°°||
    $t_alrg=$_REQUEST['alergias'];//||°°°||
    $t_glass=$_REQUEST['lentes'];//||°°°|| 
    $t_pade=$_REQUEST['padecimiento'];
    $t_medi=$_REQUEST['medicacion'];
    $consult="SELECT * FROM trhusr001ex2 WHERE t_idus='$t_idus'";
    $resultad=$ConectaGraficas->tipoBD_query($consult,$ConexionGraficas);
    $row=$ConectaGraficas->tipoBD_fetch_array($resultad);
    if ($row<>0){
             $UPDATE="UPDATE trhusr001ex2 set t_peso='$t_peso',
                                              t_talt='$t_talt',
                                              t_idtl='$t_idtl',
                                              t_blod='$t_blod',
                                              t_alrg='$t_alrg',
                                              t_glass='$t_glass',
                                              t_pade='$t_pade',
                                              t_medi='$t_medi'
                                                      WHERE t_idus='$t_idus'";
             $conexion=$ConectaGraficas->tipoBD_query($UPDATE,$ConexionGraficas)or die("Error.!");
             echo '<script language="javascript">alert("EXISTE...UPDATE!");</script>';
             //echo $UPDATE;
           }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
	<title>Datos Medicos</title>
	<!-- Falta poner el style css-->
  <!--style css-->
    <style type="text/css" media="screen">
        html, body { width: 100%; height: 100%; margin: 0px; padding: 0px; overflow: hidden;}
        .ColorTextBox{ font-family: verdana; font-size: 10px; color: black; background-color: white;}
        SELECT{ font-family: verdana; font-size: 10px; color: black; background-color: white;} 
        .Radios { font-family: Arial; font-size: 10px;}

    body { background: #cce6ff; }

       .banner {position: absolute;
  left: 50%;
  display: block;
  margin: 35px -100px;
  width: 300px;
  height: 60px;
  border: 1px solid #D8D8D8;
  font: normal 30px/60px 'Arial';
  text-align: center;
  color: #451;
  background: #F2F2F2;
  border-radius: 4px;
  box-shadow: 0 0 30px rgba(0,0,0,.15);}
.banner::before,
.banner::after {
  content: '';
  position: absolute;
  z-index: -1;
  left: -70px;
  top: 24px;
  display: block;
  width: 40px;
  height: 0px;
  border: px solid #D8D8D8;
  border-right: 20px solid #791;
  border-bottom-color: #E6E6E6;
  border-left-color: transparent;
  transform: rotate(-5deg);
}

.banner::after {
  left: auto;
  right: -70px;
  border-left: 20px solid #791;
  border-right: 30px solid transparent;
  transform: rotate(5deg);
}
  </style>
	<!--Estilos para esta plantila -->
</head>
<body onload="doOnLoad()">
        <!--<div class="banner">
        <h3 class="form-signin-heading" align="center">Datos m&eacute;dicos</h3>
        </div>
        <tr>
        <td>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        Comienzo del 
        form
        -->
        <br>
        <form id="form0" name="form0" method="post"
         enctype="multipart/form-data">
        <label for="inputafore" class="col-sm-2 control-label">ID</label>
        <div class="col-sm-2">
        <input type="text" class="ColorTextBox" name="usuario" id="usuario" placeholder="ID de Usuario" class="Radios">
        </div>
        </div>
       <div>
       <label for="inputdi" class="col-sm-2 control-label"></label>
         <div class="col-sm-2">
         </div>
         </div>
         <div>
       <label for="inputdir" class="col-sm-2 control-label"></label>
         <div class="col-sm-2">
          </div>
          </div>
          <br>
          <br>
      <label for="inputafore" class="col-sm-2 control-label">Peso(kg)</label>
        <div class="col-sm-2">
        <input type="text" class="Radios ColorTextBox" id="peso" name="peso" placeholder="Peso(kg)" required autofocus>
        </div>
        </div>
       <div>
       <label for="inputdi" class="col-sm-2 control-label">Estatura</label>
         <div class="col-sm-2">
         <input type="text" class="Radios ColorTextBox" id="estatura" name="estatura" placeholder="Estatura" required autofocus>
         </div>
         </div>
         <div>
       <label for="inputdir" class="col-sm-2 control-label">Talla</label>
         <div class="col-sm-2">
         <input type="number" min="1" step="any" class="Radios ColorTextBox" id="talla" name="talla" placeholder="Talla" required autofocus>
          </div>
          </div>
          <br>
          <br>

           <label for="inputafore" class="col-sm-2 control-label">Tipo de sangre</label>
        <div class="col-sm-2">
        <input type="text" class="Radios ColorTextBox" id="sangre" name="sangre" placeholder="Tipo de sangre" required autofocus>
        </div>
        </div>
       <div>
       <label for="inputdi" class="col-sm-2 control-label">Alergias</label>
         <div class="col-sm-2">
         <input type="text" class="Radios ColorTextBox" id="alergias" name="alergias" placeholder="Alergias" required autofocus>
         </div>
         </div>
         <div>
       <label for="inputdir" class="col-sm-2 control-label">Lentes</label>
         <div class="col-sm-2">
          <select name="lentes" id="lentes">
              <option value="Si">Si</option>
              <option value="No">No</option>
              </select>
          </div>
          </div>
          <br>
          <br>
          <div>
         <label for="inputnum" class="col-sm-2 control-label">Padecimiento</label>
          <div class="col-sm-2">
         <input type="text" class="Radios ColorTextBox" name="padecimiento" id="padecimiento" placeholder="Padecimiento">
          </div>
              </div>
          <div>
       <label for="inputcol" class="col-sm-2 control-label">Medicaci&oacute;n</label>
            <div class="col-sm-2">
       <input type="text" class="Radios ColorTextBox" id="medicacion" name="medicacion" placeholder="Medicaci&oacute;n">
            </div>
            </div>
                  <div>
       <label for="inputcol" class="col-sm-2 control-label"></label>
            <div class="col-sm-2">
          </div>
            </div>

          </div>
         </div>
      </form>
      <br>
      <br>
      <div class="col-sm-12" align="center">
     <a class="botonBlueLight" role="button" type="button" onclick="validaDatos()">Aceptar</a>  
    </div>
</body>
  <script type="text/javascript">
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
            form0.submit()
        }
  </script>

</html>