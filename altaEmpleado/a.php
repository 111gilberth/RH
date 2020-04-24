<?php
    session_start();
    include($_SERVER['DOCUMENT_ROOT']."/funciones.php");
    include($_SERVER['DOCUMENT_ROOT']."/FuncionesCrearGraficas.php");
    $con= new ecomssa;
    $ConectaGraficas = new Graficas; 
    $ConexionGraficas=$ConectaGraficas->CrearConeccion(6);
    //Conectamos con el servidor especifico1
	$consul="SELECT t_idus,t_emno,t_nama,t_namb,t_namc,t_fini,t_idsx,t_idoc,t_iddp,t_boss,t_idub,t_tnss,t_idsg,t_trfc,t_curp,t_pict,t_stat FROM trhusr001ex2";
	$resul= $ConectaGraficas->tipoBD_query($consul,$ConexionGraficas);
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
$t_nama=$_REQUEST['nombre'];
$t_namb=$_REQUEST['paterno'];
$t_namc=$_REQUEST['materno'];
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
	<title>Ejemplo Cuerpo1</title>
	<style type="text/css" media="screen">
		html, body { width: 100%; height: 100%; margin: 0px; padding: 0px; overflow: auto;}
		.ColorTextBox{ font-family: verdana; font-size: 14px; color: white; background-color:#666;}
		SELECT{ font-family: verdana; font-size: 14px; color: black; background-color:white;} 
		.Radios { font-family: Arial; font-size: 14px;} 
        .img{width: 180px; height: 180px;}
        .row { margin-right: -15px; margin-left: -15px;}
        .col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;}
        .banner { height: 20px; width: 1600px; 
        			font-size: 32px; font-family: "Times New Roman",Georgia,Serif;
        			background-color: #A9E2F3; border-color: #A9E2F3; border: 5px; 
        		}
	</style>
</head>
<body>
<table width="100%"  class="features-table">
	<?php
	 $sqlGenero="select
                              t_idus,
                             (t_nama +' '+ t_namb+' '+ t_namc) as Nombre
                            from trhusr001ex2";
     $resultGenero = $ConectaGraficas->tipoBD_query($sqlGenero,$ConexionGraficas);
	 echo '<tr>';
		   echo	'<th>'.'<strong>'.'ID'.'</strong>'.'</th>';
		   echo '<th>'.'<strong>'.'<center>'.'Nombre Completo'.'</center>'.'</strong>'.'</th>';
		   echo '</tr>';

	 while ($row =$ConectaGraficas->tipoBD_fetch_array($resultGenero)) {
		  
		    echo '<tr>';
		    echo '<td>'.$row['t_idus'].'</td>';
		    echo '<td>'.$row['Nombre'].'</td>';
		    echo '</tr>';
		    }
		    echo mysql_error(); 
	 ?>
</table>
	<!--<input type="date" name="user_date" id="user_date" />
	<input type="button" value="">-->
</body>


<script type="text/javascript">
	/*function isValidDate(day,month,year)
	{
		var dteDate;
		month=month-1;
		return((day==dteDate.getDate())&&(month==dteDate.getDate())&&(month==dteDate.getMonth())&&(year==dteDate.getFullYear()));
	}
	function validate_fecha(fecha)
	{
		var patron=new RegExp("^(19|20)+([0-9]{2})([-])([0-9]){1,2})$");
		if (fecha.search(patron)==0)
		{
			var values=fecha.split("-");
			if(isValidDate(values[2],values[1],Values[0]))
			{
				return true;
			}
		}
		return false;
	}
	<input type="date">
	function calcularEdad()
	{
		var
		fecha=document.getElemntById("user_date").value;
		if(validate_fecha(fecha)==true)
		{
			var fecha_hoy=new Date();
			var ahora_ano=fecha_hoy.getYear();
			var ahora_mes= fecha_hoy.getMonth()+1;
			var ahora_dia=fecha_hoy.getDate();
			var edad=(ahora_ano+1900)-ano;
			if(ahora_mes<mes)
			{
				edad--;
			}
			if edad>1900;
			{
				edad-=1900;
			}
			var meses=0;
			if(ahora_mes>mes)
				meses=ahora_mes-mes;
			if(ahora_mes>mes)
				meses=ahora_mes-mes;
			if(ahora_mes<mes)
				meses=11;
			
			var dias=0;
			if(ahora_dia>dia)
				dias=ahora_dia-dia;
			if(ahora_dia<dia)
			{
				ultimoDdiaMes=new DatE(ahora_ano, ahora_mes,0);
				dias=ultimoDiaMes.getDate()-(dia-ahora_dia);
			}
			document.getElementById("result").innerHTML0"Tienes"+edad+"años,"+meses+"meses y"+dias+"dias";
		}else{
			document.getElementById("result").innerHTML="La fecha"+fecha+"es incorrecta";
		}
	}*/
</script>
</html>