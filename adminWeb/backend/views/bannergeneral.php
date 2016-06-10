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
require_once '../models/BannerGeneral.php';
require_once '../models/Idioma.php';
require_once '../../config/funciones.php';

//---------------------/////////
//-----para la conexdion de la base de datos--
$ruta = fopen("../../config/ruta.txt", "r");
$linea = fgets($ruta);
fclose($ruta);

require_once $_SERVER['DOCUMENT_ROOT'].$linea;
//---------------------///////////









//variables


// Logica
$banner = new BannerGeneral();
$idioma = new Idioma();
$titulo = "Gesti&oacute;n de Banners General";

if(isset($_REQUEST['action']))
{
	//recuperamos variables para desemcriptarlos
	$action=desencripta($_REQUEST['action'],"rayedgard");
	
	//----------------------------------------------
	switch($action)
	{
		case 'registrar':
		
		
			$banner->__SET('titulo',     $_REQUEST['titulo']);
			$banner->__SET('detalle',     $_REQUEST['detalle']);

			/*------linea de codigo para guardar la imagen o foto-------------*/
			$nombre_temporal1= $_FILES["foto"]["tmp_name"];
			$nombre_archivo1 =$_FILES["foto"]["name"];
			$tipo_archivo1 = $_FILES["foto"]["type"]; 
			$tamano_archivo1 =$_FILES["foto"]["size"];
			$path1="../images/bannergeneral/";

			if (!((strpos($tipo_archivo1, "gif") || strpos($tipo_archivo1, "png") || strpos($tipo_archivo1,"jpeg") || strpos($tipo_archivo1,"jpg")  && ($tamano_archivo1 < 60000000)))) 
			{ 
				echo "La extensión o el tamaño del archivo de IMAGEN no es correcta. <br><br><table><tr><td><li>Se permiten archivos *.gif, *.png o *.jpg<br><li>se permiten archivos de 3Mb maximo.</td></tr></table><br>";
						
			}
			else{ 
				  $banner->__SET('foto', $nombre_archivo1);

				//antes de enviar los caracteres que pasamos por la URL debemos ponerlo en buen recaudo encriptar
				if(is_uploaded_file($nombre_temporal1)){
					copy($nombre_temporal1, $path1.$nombre_archivo1);	
				}
				else{echo "<br>Ocurrio un error al subir los archivos. intentelo otra ves.";}
		 				
			}

			/*-------Fin guarda imagenes-----------------*/

			$banner->__SET('idioma_id',		$_REQUEST['idioma_id']);

			$banner->Registrar($banner);
			//header('Location: index.php');
			/*/------------PARA LAS ACCIONES-----------------/*/ 			
			
			echo "<meta http-equiv ='refresh' content='0;url=bannergeneral.php?'>"; 	
					/*/------------FIN ACCIONES-----------------/*/
			break;

		case 'eliminar':

			$id=desencripta($_REQUEST['id'],"rayedgard");
			$nombreFoto=desencripta($_GET['nn'],"rayedgard");//captuamos en nombre de la foto para eliminarla
			$banner->Eliminar($id);//elima en la base de datos

			//header('Location: index.php');
			if($nombreFoto!=null or $nombreFoto!="")
				unlink("../images/bannergeneral/".$nombreFoto); //elimina en la carpeta
			break;

	
	}
}

?>

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
			<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1"><?php echo $titulo;?></h3>
						<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form" >
							<div class="bs-example4" data-example-id="contextual-table">
								<!--CAMBIO EN action  y method-->
								<form class="form-horizontal" action="bannergeneral.php?action=<?php echo urlencode(encripta("registrar","rayedgard")); ?>" method="post" enctype="multipart/form-data">

									
									

										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Titulo</label>
											<div class="col-sm-8">

														
												<!--CAMBIO EN name y value-->
												<input type="text" name="titulo" value="<?php echo $banner->__GET('titulo'); ?>" class="form-control1" id="focusedinput" placeholder="Escriba un titulo" title="Escriba un titulo" required="">										

											</div>										
										</div>


										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Detalle</label>
											<div class="col-sm-8">

														
												<!--CAMBIO EN name y value-->
												<input type="text" name="detalle" value="<?php echo $banner->__GET('detalle'); ?>" class="form-control1" id="focusedinput" placeholder="Escriba el detalle" title="Escriba el detalle" required="">										

											</div>										
										</div>


										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">foto</label>
											<div class="col-sm-4">
												<input  type="file" name="foto" id="exampleInputFile" value="<?php echo $banner->__GET('nombre'); ?>" >												
												<input type="hidden" name="MAX_FILE_SIZE" value="900000">
												<p class="help-block">Formatos PNG, JPG, GIF.</p>
											
											</div>	

											
										</div>


										<div class="form-group">
											<label for="txtarea1" class="col-sm-2 control-label">Idioma</label>
											<div class="col-sm-8">
												<select name="idioma_id" id="selector1" class="form-control1">
													
													<?php 
														
												foreach($idioma->ListarCombo() as $r): ?>		

									                    <option name="idioma_id" value="<?php echo $r->__GET('id'); ?>" <?php echo $banner->__GET('idioma_id') == $r->__GET('id') ? 'selected/' : ''; ?>><?php echo $r->__GET('nombre'); ?>
									                    </option >

								                	<?php endforeach; ?>
												</select>
											</div>
										</div>

										 <div class="panel-footer">
											<div class="row">
												<div class="col-sm-8 col-sm-offset-2">
													

															<button class="btn-success btn" type="submit">Guardar</button>
												



													<?php
													if(isset($_REQUEST['action']))
													{
														$action=desencripta($_REQUEST['action'],"rayedgard");
														if($action=='editar')
														{
															
													?>
															<!--PARA LA ACCION-->
															<a href="index.php?p=<?php echo urlencode(encripta($p,'rayedgard'));?>" class="btn btn-sm btn-danger">Cancelar</a>
															<!--FIN ACCION-->
													<?php
														}
													}
													?>

													
												</div>
											</div>
										 </div>
								</form>

							</div>
							</br>

						<div class="bs-example4" data-example-id="contextual-table">
							<table class="table">
							  <thead>
								<tr>
								  <th>#</th>
								  <th>Titulo</th>
								  <th>Detalle</th>
								  <th>foto</th>
								  <th>Idioma</th>
								  <th>Option</th>
								  <th></th>
								</tr>
							  </thead>
							  <tbody>

								
								<?php 
								$cont=1;
								foreach($banner->Listar() as $r): ?>
			                        <tr>
			                        	<td><?php echo $cont++; ?></td>
			                            <td><?php echo $r->__GET('titulo'); ?></td>
			                            <td><?php echo $r->__GET('detalle'); ?></td>
			                        	 <td>
			                       			<img src="../images/bannergeneral/<?php echo $r->__GET('foto');  ?>" height="30" width="30"/> 
			                             </td>

			                            <td><?php echo $r->__GET('idioma_nombre'); ?></td>

			                        	<td>
			                        	
                                            <a href="#"  onclick="javascript:direc('?action=<?php echo urlencode(encripta('eliminar','rayedgard'));?>&id=<?php echo urlencode(encripta($r->id,'rayedgard')); ?>&nn=<?php echo urlencode(encripta($r->foto,'rayedgard')); ?>','<?php echo $r->__GET('titulo'); ?>')" class="btn btn-sm btn-danger">Eliminar</a>
                                       

                                          </td>
			                        </tr>
			                    <?php endforeach; ?>

							  </tbody>
							</table>
					   </div>
						</div>
					</div>
				</div>
			</div>








