<?php
	session_start();
	include($_SERVER['DOCUMENT_ROOT']."/funciones.php");
	include($_SERVER['DOCUMENT_ROOT']."/FuncionesCrearGraficas.php");
	include($_SERVER['DOCUMENT_ROOT']."/funciones_llenar_graficas.php");
	$con= new ecomssa;
	$ConectaGraficas = new Graficas; 
	$ConexionGraficas=$ConectaGraficas->CrearConeccion(6); //Conectamos con el seervidor especifico1
  $t_idus=$_REQUEST['usuario'];
	 //$fecha = date("Y-m-d");
   /////////////////////////////
  $tabla[0]=$_REQUEST['usuario'];
  $tabla[1]=$_REQUEST['afore'];
  $tabla[2]=$_REQUEST['nacionalidad'];
  $tabla[3]=$_REQUEST['civil'];
  $tabla[4]=$_REQUEST['vehiculo'];//||°°°°||
  $tabla[5]=$_REQUEST['licencia'];//||°°°°||
  $tabla[6]=$_REQUEST['pasaporte'];//||°°°||
  $tabla[7]=$_REQUEST['visa'];////////°°°°°°°°°°°°°
  $tabla[8]=$_REQUEST['fecha'];//banco,no.de cuenta
  foreach ($tabla as $variable){
  echo "&nbsp;".$variable;
      # code...
    }
    /*$consult="SELECT * FROM trhusr001ex2 WHERE t_idus='$t_idus'";
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
             $conexion=$ConectaGraficas->tipoBD_query($UPDATE,$ConexionGraficas)or die("Errorx1.!");
             //echo '<script language="javascript">alert("EXISTE...UPDATE!");</script>';
             echo $UPDATE;
           }
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $t_idus=$_REQUEST['id'];
    $t_idbn=$_REQUEST['banco'];
    $t_tcta=$_REQUEST['cuenta'];
    $SQL="SELECT * FROM trhusr002ex2 WHERE t_idus='$t_idus'";
    $exitosa=$ConectaGraficas->tipoBD_query($SQL,$ConexionGraficas);
    $col=$ConectaGraficas->tipoBD_fetch_array($exitosa);
    if($col==0){
                      $insert="INSERT INTO trhusr002ex2(t_idus,t_idbn,t_tcta) VALUES('$t_idus','$t_idbn','$t_tcta')";
                      $sql=$ConectaGraficas->tipoBD_query($insert,$ConexionGraficas)or die("ERROR........!!!!!!!.!");
                      echo $insert;
         }else{
                      echo '<script language="javascript">alert("No SE PUDO INSERTAR EN BANCO.!!");</script>';
    }*/
?>	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="shortcut icon" href="http://getbootstrap.com/docs-assets/ico/favicon.png">
	<!-- Bootstrap core CSS -->
    <link href="http://getbootstrap.com/dist/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
	<?php echo libreriasJava(); ?> 
	<title>Agregar hijo </title> 
	<style type="text/css" media="screen, projection"> 
	.ColorTextBox{ font-family: verdana; font-size: 10px; background-color:#dbdbdb;}
	SELECT{ font-family: verdana; font-size: 10px; color: black;} 
	.Radios { font-family: Arial; font-size: 10px;} 
	html, body { width: 100%; height: 100%; margin: 0px; padding: 0px; overflow: hidden;}
	body { background: #cce6ff; }
	</style>	
</head>
<body onload='doOnload()' > 
  <form id="form1" name="form1"  method="post" enctype="multipart/form-data">
		<div id= 'divImportes' name= 'divImportes' style=' width: 1155px;  margin: 0px; padding: 0px;' ></div>
		<table align="right" class='tablaBlueLigth' width='250px' height='350px'>

			<td valign ='TOP' width='200px'>

			<div style=' width: 250px; height: 350px; margin: 0px; padding: 0px; overflow-y:scroll; border-style: ridge;' >
					<input type='hidden' name='maxContadorFails' id='maxContadorFails'  value= '0'> 

					<table align="right" class='tableResumenGraficas' id='tblImpacto' width= "100%">
					<tbody name='bodyCampos' id='bodyCampos' >  </tbody>
          </div>
					<tr>
				</td>
			</tr>
			
    		</table>

		</table>
    <table width="70%">
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
                                    t_dsca,
                                    t_idco
                                from
                                    trhcon001ex2";
                        $resultGenero = $ConectaGraficas->tipoBD_query($sqlGenero,$ConexionGraficas);
                        while ($row=$ConectaGraficas->tipoBD_fetch_array($resultGenero))
                         {
                                echo"<option value='".trim($row[0])."'".($nacionalidad ==
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
    </table>
 </form>
 <br>
 		  <td>
 		  <center>
               <a class="botonBlueLight" role="button" type="button" onclick="validaDatos();salvarVidas()">Aceptar</a>
          </center>
          </td>	
</body>
<script>//
	var arrayValorJava = new Array(<?php echo $arrayValorJava; ?>);
	var arrayTextoJava = new Array(<?php echo $arrayTextoJava ?>);
	
	function doOnload(objeto)	{
		var toolbar = new dhtmlXToolbarObject({parent: "divImportes"});  
		toolbar.addButton('btnSeguimientosNuevo', 20, 'Agregar Dato Bancario', '/imagenes/iconos/novo.PNG');  
		toolbar.setAlign("right");  
		toolbar.attachEvent("onClick", function(id)  {	 
			if(id=='btnSeguimientosNuevo') agregarFilaTabla("tblImpacto","bodyCampos","maxContadorFails","Fails" )
		});
	}
	function agregarFilaTabla(tabla,contenedor,contadorCamposTabla,NombreControles){
				var objTd1;
				var NumeroSeries =parseInt(document.getElementById(contadorCamposTabla).value);
				var valorCampo="", NombreCampo="";
				document.getElementById(contadorCamposTabla).value=NumeroSeries+1;
				var botones =  "<img src='/imagenes/iconos/papelera3.png' width='20px' height='20px' alt='Eliminar' onclick='eliminarFilaTabla(\""+NombreControles+"\"," + NumeroSeries + ");'>";
				////////////////////////////////////////////////////////////////
				var objTR = document.createElement("tr");//grega una nueva fila
				objTR.id = "tr"+NombreControles +"_" + NumeroSeries;
				objTd1 = document.createElement("label");//agrega una nueva celda
				objTd1.id = "td"+NombreControles + "_"  + NumeroSeries + "_" + 3;
				objTR.appendChild(objTd1);
				ele = document.createElement('input');//
        // Obtenemos el valor por el Nombre
				ele.setAttribute("type", "text");//atributo del input
				ele.className = "Radios";  //clase del input para el estilo.css
				ele.style.backgroundColor  ='lightyellow'; 
				ele.style.textAlign='center'; 
				ele.placeholder="Nombre"
				objTd1.appendChild(ele);
				objTR.appendChild(objTd1);
				///////////////////////////////////////////////////////////////
				var objTr = document.createElement("tr");//grega una nueva fila
				objTr.id = "tr"+NombreControles +"_" + NumeroSeries;
				objTd1 = document.createElement("td");//agrega una nueva celda
				objTd1.id = "td"+NombreControles + "_"  + NumeroSeries + "_" + 3;
				objTr.appendChild(objTd1);
				ele = document.createElement('input');//
				ele.setAttribute("type", "text");//atributo del input
        ele.setAttribute("id","ID");
				ele.style.height="20px";
				ele.style.width ="100%";
				ele.className = "Radios";  //clase del input para el estilo.css
				ele.style.backgroundColor  ='ColorTextBox'; 
				ele.style.textAlign ='center'; 
				ele.placeholder="ID";
        ele.style.name="id ";
        //
				objTd1.appendChild(ele);
				objTr.appendChild(objTd1);
				///////////////////////////////////////////////////////////////
				objTd1 = document.createElement("td");//agrega una nueva celda
				ele = document.createElement('input');//
				ele.setAttribute("type", "text");//atributo del input
        ele.setAttribute("id","banco");
        ele.style.height="20px";
				ele.style.width = "100%";
				ele.className = "Radios";  //clase del input para el estilo.css
				ele.style.backgroundColor  ='ColorTextBox'; 
				ele.style.textAlign   ='center'; 
				ele.placeholder="BANCO"
        ele.style.name="banco";
				objTd1.appendChild(ele);
				objTr.appendChild(objTd1);
				///////////////////////////
				objTd1 = document.createElement("td");//agrega una nueva celda
				ele = document.createElement('input');//
				ele.setAttribute("type", "text");//atributo del input
        ele.setAttribute("id","cuenta");
        ele.style.height="20px";
				ele.style.width = "100%";
				ele.className = "Radios";  //clase del input para el estilo.css
				ele.style.backgroundColor  =''; 
				ele.style.textAlign   ='center'; 
				ele.placeholder="CUENTA"
				ele.style.id="cuenta";
        ele.style.name="cuenta";
				objTd1.appendChild(ele);
				objTr.appendChild(objTd1);
				////////////////////////////////////////
				var objTd2 = document.createElement("td");
				objTd2.id = "td"+NombreControles +  "_" + NumeroSeries + "_" + 4;
				objTd2.innerHTML = botones;
				objTr.appendChild(objTd2);
				var objTbody = document.getElementById(contenedor);
				objTbody.appendChild(objTr);
				var objId = myCalendar.attachObj("fechaFinal_"+NumeroSeries);
				return false;	//evita que haya un submit por equivocacion.
		/////////////////////////////////////////////////////////////
	}
	function eliminarFilaTabla(nombreTR,oId){
				var objHijo = document.getElementById('tr'+nombreTR+'_' + oId);
				var objPadre = objHijo.parentNode;
				objPadre.removeChild(objHijo);
				calcularImportes()
				return false;
	}
 function validaDatos()

        {
            var arrayValidarDatos =["usuario","ID","banco","cuenta"]
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
            form1.submit()
        }
        function recargar()
    {
      var variable1=document.getElementById("ID").value;
      var variable2=document.getElementById("banco").value;
      var variable3=document.getElementById("cuenta").value;
              document.write(variable1);
              document.write(variable2);
              document.write(variable3);
    }
</script>
</html>