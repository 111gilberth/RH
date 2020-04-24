<?php
	session_start();
	include($_SERVER['DOCUMENT_ROOT']."/funciones.php");
	include($_SERVER['DOCUMENT_ROOT']."/FuncionesCrearGraficas.php");
	include($_SERVER['DOCUMENT_ROOT']."/funciones_llenar_graficas.php");
	$con= new ecomssa;
	$ConectaGraficas = new Graficas; 
	$ConexionGraficas=$ConectaGraficas->CrearConeccion(6); //Conectamos con el seervidor especifico1
	$fecha = date("Y-m-d");
?>	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo libreriasJava(); ?> 
	<title>Agregar hijo </title> 
	<style type="text/css" media="screen, projection"> 
		.ColorTextBox{ font-family: verdana; font-size: 10px; background-color:#dbdbdb;}
		SELECT{ font-family: verdana; font-size: 10px; color: black;} 
		.Radios { font-family: Arial; font-size: 10px;} 
		html, body { width: 100%; height: 100%; margin: 0px; padding: 0px; overflow: hidden;}
	</style>	
</head>
<body>
                          <?php
									$sqlconsulta ="SELECT t_idus,
						                                          t_nama,
						                                          t_namb,
						                                          t_namc,
						                                          t_fini,
						                                          t_idsx,
						                                          t_iddp,
						                                          t_idub,
						                                          t_tnss,
						                                          t_idsg,
						                                          t_trfc,		
                                        					  	  t_curp FROM trhusr001ex2
									   							 WHERE t_idus =1";
													$resultado = $ConectaGraficas->tipoBD_query($sqlconsulta,$ConexionGraficas);
												    while ($row=$ConectaGraficas->tipoBD_fetch_array($resultado))
														{
														   echo"".trim($row[0])."&nbsp; ".($consulta_Actual ==
														   trim($row[1]) ?'selected':'') ."".$row[2]."&nbsp;".$row[3]."&nbsp;".$row[4]."&nbsp;".$row[5]."&nbsp;".$row[6];  # code...
															$id_actual= $row[0];
															$nombre_actual=$row[1];
															$apellidop_actual=$row[2];
															$apellidom_actual=$row[3];
															$fecha_actual=$row[4];
															$sexo_actual=$row[5];

															echo "<p>Id es $id_actual";
															echo "<p>Nombre: $nombre_actual";
															echo "<p>Apellido paterno: es $apellidop_actual";
															echo "<p>Apellido materno es $apellidom_actual";
															echo "<p>Fecha de inicio es: $fecha_actual";
															echo "<p>Su genero es: $sexo_actual";
															

								                		}
								            
			               ?>
	
</body>
</html>