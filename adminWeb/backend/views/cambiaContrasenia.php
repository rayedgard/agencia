 <?php session_start(); ?>
 <!-- Bootstrap Core CSS -->
<link href="../../css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="../css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="../../css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<!-- lined-icons -->
<link rel="stylesheet" href="../../css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<!-- chart -->
<script src="../../js/Chart.js"></script>
<!-- //chart -->
<!--animate-->
<link href="../../css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="../../js/wow.min.js"></script>
<script src="../../js/jquery-1.10.2.min.js"></script>

<!--/////////////// CODIGO PRA EL POPUP INICIAL ////////////////-->
	<link rel="stylesheet" type="text/css" href="../../css/popup.css">
	<script src="../../js/popup.min.js"></script>
	<script src="../../js/jquery.colorbox.js"></script>
<!--/////////////// FIN POPUP INICIAL ////////////////-->




<?php

require_once '../models/Usuario.php';

require_once '../../config/funciones.php';


//---------------------/////////
//-----para la conexdion de la base de datos--
$ruta = fopen("../../config/ruta.txt", "r");
$linea = fgets($ruta);
fclose($ruta);

require_once $_SERVER['DOCUMENT_ROOT'].$linea;
//---------------------///////////



// Logica
$usuario = new Usuario();




//variables para asignar usuario
if(isset($_GET['ide']))
	$ide = $_GET['ide'];

if(isset($_GET['n']))
	$nombreusuario = $_GET['n'];

	




if(isset($_REQUEST['action']))
{
	//recuperamos variables para desemcriptarlos
	$action=desencripta($_REQUEST['action'],"rayedgard");

	//----------------------------------------------
	switch($action)
	{
		case 'verifica':

			//echo $_SESSION['idusuario']."<br>";
			//echo $_REQUEST['contraseniaAnterior']."<br>";
			//echo $_REQUEST['contraseniaNueva']."<br>";

			$mensaje=$usuario->cambiaContrasenia($_SESSION['usuario'],$_REQUEST['contraseniaAnterior'],$_REQUEST['contraseniaNueva']);
			

			echo "
			<script>
				$(document).ready(function(){
				cerrar('".$mensaje."');
				});
			</script>
			";
			break;

				
	}
}

?>
<script>
// funcion para cerrar el modal
function cerrar(cad)
{
var r=confirm(cad);
if (r==true)
  {
  	window.location="../../config/cerrar_sesion.php";
  	parent.$.fn.colorbox.close();

  }

}

function cerrar1()
{
	parent.$.fn.colorbox.close();
}
</script>




<script>
//recojemos los parametros d=url enviado del boton elimiar y u=el nombre del elemento que se eliminara
//DONDE u=DIRECCION DEL PAQUETE
//      d=NOMBRE DEL PAQUETE
function direc(d,u)
{
var r=confirm("¿Esta seguro que desea eliminar este elemento: "+u+"?");
if (r==true)
  {
	window.location=d;//redirige la url
  }
else
  {
	window.location=document.location.href;//reguresa a la misma direccion
  }
}
</script>

<!-- Inicio Css para validación -->
<style type="text/css">
	     .col-sm-8 input:required {
           background: #fff url(images/red_asterisk.png) no-repeat 98% center;
           border-color: #F69988;
           
         } 

         .col-sm-8 input:required:valid { 
          background: #fff url(images/valid.png) no-repeat 98% center; 
          box-shadow: 0 0 5px #5cd053;
           border-color: #C5E1A5;
            background-color: #F1F8E9;
            }

			  .col-sm-8 input:focus:invalid { 
          background: #fff url(images/invalid.png) no-repeat 98% center;
          box-shadow: 0 0 5px #d45252;
          border-color: #F69988;
          background-color: #FDE0DC;
          }
</style>

<!--Fin de Css para validación -->
	<!-- //header-ends -->
	
								<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">


						<div class="bs-example4" data-example-id="contextual-table">

							<form class="form-horizontal" action="cambiaContrasenia.php?action=<?php echo encripta('verifica','rayedgard');?>" method="post">

								
									<div class="form-group">
										<label for="focusedinput" class="col-sm-2 control-label">Contraseña Anterior</label>
										<div class="col-sm-8">


											<input type="password" name="contraseniaAnterior" class="form-control1" id="focusedinput" placeholder="Escriba su contraseña actual" title="" pattern="[A-Za-z 0-9-]{1,16}" required="" >


										</div>										
									</div>

									<div class="form-group">
										<label for="focusedinput" class="col-sm-2 control-label">Contarseña Nueva</label>
										<div class="col-sm-8">


											<input type="password" name="contraseniaNueva"  class="form-control1" id="focusedinput" placeholder="Escriba su contraseña nueva" title="" required="" >
										
										</div>										
									</div>

									
									<div class="panel-footer">
											<div class="row">
												<div class="col-sm-8 col-sm-offset-2">
													<button class="btn-success btn" type="submit">Guardar</button>

													<input name="button" type="button"  class="btn btn-sm btn-danger" onclick="cerrar1();" value="Cancelar" /> 

													
												</div>
											</div>
										 </div>
							</form>
						</div>

						

				
			</div>
	
