<?php
 session_start();
    include($_SERVER['DOCUMENT_ROOT']."/funciones.php");
    include($_SERVER['DOCUMENT_ROOT']."/FuncionesCrearGraficas.php");
    $con= new ecomssa;
    $ConectaGraficas = new Graficas; 
    $ConexionGraficas=$ConectaGraficas->CrearConeccion(6); //Conectamos con el seervidor especifico1 
    $vehi=$_REQUEST['vehiculo'];
    $lice=$_REQUEST['licencia'];
    $pasa=$_REQUEST['pasaporte'];
    $visa=$_REQUEST['visa'];
    echo "<p>"."Vehiculo:"	.$vehi;
    echo "<p>"."Licencia:".$lice;
    echo "<p>"."Pasaporte:".$pasa;
    echo "<p>"."Visa:",$visa;
?>