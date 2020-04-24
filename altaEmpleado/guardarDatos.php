<?php
    session_start();
    include($_SERVER['DOCUMENT_ROOT']."/funciones.php");
    include($_SERVER['DOCUMENT_ROOT']."/FuncionesCrearGraficas.php");
    $con= new ecomssa;
    $ConectaGraficas = new Graficas; 
    $ConexionGraficas=$ConectaGraficas->CrearConeccion(6); //Conectamos con el seervidor especifico1  
    //mandamos los datos del form1 a la pantalla para ver que se haga bien el traslado de datos//
    $iduser=$_REQUEST['iduser'];
    $t_emno=$_REQUEST['nomina'];
    $t_nama=$_REQUEST['nombre'];
    $t_namb=$_REQUEST['paterno'];
    $t_namc=$_REQUEST['materno'];
    $t_fini=$_REQUEST['ingreso'];
    $t_idsx=$_REQUEST['sexo'];
    $t_idoc=$_REQUEST['departamento'];
    $t_iddp=$_REQUEST['puesto'];//[departamento]
    $jefe=$_REQUEST['inmediato'];
    $t_idub=$_REQUEST['sede'];
    $t_tnss=$_REQUEST['nss'];
    $t_idsg=$_REQUEST['clinica'];
    $t_trfc=$_REQUEST['rfc'];
    $t_curp=$_REQUEST['curp'];
    echo "Sexo:"."<br>".$t_idsx;
    echo "Jefe:".$jefe;
    //
    $timg=$_REQUEST['myfile'];
    echo "Foto:".$timg;
    echo "HOLA";
//
/////////**************PARA GUARDAR IMAGEN EN CARPETA*********//////////////////////////
//capturamos los datos del fichero subido    
$name=$_FILES['myfile']['name'];
$tmp_name = $_FILES['myfile']['tmp_name'];

$extencion=end(explode(".",$name));//[explode]convierte en arrray todo, trae el ultimo miembro del array
//$timg=$iduser.".".$extencion;
//$pic=$iduser.".".$extencion;
//echo "Foto:".$pic;


if($iduser=="")
    { 
        echo "hola";
        $iduser="";//**float
        //Consulta*dentro de values poner las variables que previamente obtuvimos
        $max="SELECT isnull (max(convert(int,t_idus))+1, 1) as idmax from trhusr001ex2";
        $resultmax=$ConectaGraficas->tipoBD_query($max,$ConexionGraficas)or die("Error al generar");
        while ($row=$ConectaGraficas->tipoBD_fetch_array($resultmax))
                 {
                   echo "hola";
                  $iduser=$row[0];
                  $timg=$iduser.".".$extencion;//la imagen va a tener el valor de iduser que acabo de crear
                }
        //****//
        $sqlconsulta="insert into trhusr001ex2(t_idus,t_emno,t_nama,t_namb,t_namc,t_fini,t_idsx,t_idoc,t_iddp,t_boss,t_idub,t_tnss,t_idsg,t_trfc,t_curp,t_pict,t_stat)values('$iduser','$t_emno','$t_nama','$t_namb','$t_namc','$t_fini','$t_idsx','$t_idoc','$t_iddp','$jefe','$t_idub','$t_tnss','$t_idsg','$t_trfc','$t_curp','$timg','1')"; echo "<br>".$sqlconsulta;
        $result=$ConectaGraficas->tipoBD_query($sqlconsulta,$ConexionGraficas)or die("Error:");
        }elseif ($iduser<>""){
            $update="UPDATE trhusr001ex2 set    t_idus='$iduser',
                                                t_emno='$t_emno',
                                                t_nama='$t_nama',
                                                t_namb='$t_namb',
                                                t_namc='$t_namc',
                                                t_fini='$t_fini',
                                                t_idsx='$t_idsx',
                                                t_idoc='$t_idoc',
                                                t_iddp='$t_iddp',
                                                t_boss='$jefe',
                                                t_idub='$t_idub',
                                                t_tnss='$t_tnss',
                                                t_idsg='$t_idsg',
                                                t_trfc='$t_trfc',
                                                t_curp='$t_curp',
                                                t_pict='$timg',
                                                t_stat='1', where t_idus='$iduser' ";
            $resup==$ConectaGraficas->tipoBD_query($update,$ConexionGraficas);
    }
          //Creamos una nueva ruta (nuevo path)
            //Así guardaremos nuestra imagen en la carpeta "images" ubicada en htdocs/images.
            $nuevo_path=$_SERVER['DOCUMENT_ROOT']."/imagenes/empleados/".$iduser.".".$extencion;
            echo "<br>->".$nuevo_path;
            //Movemos el archivo desde u ubicación temporal hacia la nueva ruta
            # $tmp_name: la ruta temporal del fichero
            # $nuevo_path: la nueva ruta que creamos
            move_uploaded_file($tmp_name,$nuevo_path);
            //Extraer la extensión del archivo. P.e: jpg
            # Con explode() segmentamos la cadena de acuerdo al separador que definamos. En este caso punto (.)
            $array=explode('.',$nuevo_path);
            # Capturamos el último elemento del array anterior que vendría a ser la extensión
            $ext= end($array);
            //Imprimimos un texto de subida exitosa.
            echo "<h3>La imagen se subio correctamente</h3>";
            // Los posible valores que puedes obtener de la imagen son:
            //echo "<b>Info de la imagen subida:</b>";
            header("Location: /recursosHumanos/altaEmpleado/datosgenerales.php"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html  xmlns="http://www.w3.org/1999/xhtml">
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
            <title></title>
            <style type="text/css" media="screen">
                html, body { width: 100%; height: 100%; margin: 0px; padding: 0px; overflow: hidden;}
                .ColorTextBox{ font-family: verdana; font-size: 10px; color: white; background-color:#666;}
                SELECT{ font-family: verdana; font-size: 10px; color: black; background-color:white;} 
                .Radios { font-family: Arial; font-size: 10px;} 
                .img{width: 180px; height: 180px;}
            </style>
            <!--Estilos para esta plantilla -->
        </head>
 

<body>




</body>





</html>