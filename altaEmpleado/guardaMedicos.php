<?php
 session_start();
include($_SERVER['DOCUMENT_ROOT']."/funciones.php");
include($_SERVER['DOCUMENT_ROOT']."/FuncionesCrearGraficas.php");
$con= new ecomssa;
$ConectaGraficas = new Graficas; 
$ConexionGraficas=$ConectaGraficas->CrearConeccion(6); //Conectamos con el seervidor especifico1 
$peso=$_REQUEST['peso'];
$esta=$_REQUEST['estatura'];
$talla=$_REQUEST['talla'];
$sangre=$_REQUEST['sangre'];
$aler=$_REQUEST['alergias'];
$len=$_REQUEST['lentes'];
$pade=$_REQUEST['padecimiento'];
$medi=$_REQUEST['medicacion'];
echo "<p>".$peso;
echo "<p>".$esta;
echo "<p>".$talla;
echo "<p>".$sangre;
echo "<p>".$aler;
echo "<p>".$len;//
echo "<p>".$pade;//
echo "<p>".$medi;//
//->attrib:name<->"peso","estatura","talla","sangre","alergias","lentes","padecimiento","medicacion"
?>