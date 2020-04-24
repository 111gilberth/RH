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
    <link href="bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" href="bootstrap.js"></script>
    <script type="text/javascript" href="bootstrap.min.js"></script>
  <!--******-->
	<title>Ejemplo Cuerpo1</title>
	<style type="text/css" media="screen">
		html, body { width: 100%; height: 100%; margin: 0px; padding: 0px; overflow: hidden;}
		.ColorTextBox{ font-family: verdana; font-size: 14px; color: white; background-color:#666;}
		SELECT{ font-family: verdana; font-size: 14px; color: black; background-color:white;} 
		.Radios { font-family: Arial; font-size: 14px;} 
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
   <div>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button> -->
            <a class="navbar-brand" href="sexo.php">Genero&nbsop;</a>
             <a class="navbar-brand" href="">Genero&nbsp;</a>
                             <a  class="navbar-brand" href="sexo.php">Puesto&nbsp;</a>
                                        <a class="navbar-brand" href="">Departamento&nbsp;</a>
                                                        <a class="navbar-brand" href="">Jefe Inmediato&nbsp;</a>
                                                                    <a class="navbar-brand" href="">Sede&nbsp;</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
       <!-- <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> --> 
            <!--<ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li class="page-scroll">
                    <a href="#portfolio">Portfolio</a>
                </li>
                <li class="page-scroll">
                    <a href="#about">About</a>
                </li>
                <li class="page-scroll">
                    <a href="#contact">Contact</a>
                </li>
            </ul>-->  
        </div>
        <!-- /.navbar-collapse -->
    </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
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