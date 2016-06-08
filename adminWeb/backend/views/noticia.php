<?php
require_once 'models/Noticia.php';

require_once 'models/Idioma.php';

$p = desencripta($_GET['p'],"rayedgard");



// Logica
$idioma = new Idioma();
$noticia = new Noticia();
$titulo = "Gesti&oacute;n y Administraci&oacute;n de noticias";

if(isset($_REQUEST['action']))
{
	//recuperamos variables para desemcriptarlos
	$action=desencripta($_REQUEST['action'],"rayedgard");
	$id=desencripta($_REQUEST['id'],"rayedgard");
	//----------------------------------------------
	switch($action)
	{
		case 'actualizar':
			$noticia->__SET('id',         $id);
			$noticia->__SET('nombre',     $_REQUEST['nombre']);
			$noticia->__SET('detalle',     $_REQUEST['detalle']);
			$noticia->__SET('link',     $_REQUEST['link']);
			$noticia->__SET('fecha',    $_REQUEST['fecha']);
			




			$nombre_temporal1= $_FILES["foto"]["tmp_name"];
			$nombre_archivo1 =$_FILES["foto"]["name"];
			$tipo_archivo1 = $_FILES["foto"]["type"]; 
			$tamano_archivo1 =$_FILES["foto"]["size"];
			$path1="images/noticia/";

			if($_FILES['foto']['name']!="")
			{				
			   if (!((strpos($tipo_archivo1, "gif") || strpos($tipo_archivo1, "png") || strpos($tipo_archivo1,"jpeg") || strpos($tipo_archivo1,"jpg")  && ($tamano_archivo1 < 3000000)))) 
				{ 
					echo "La extensión o el tamaño del archivo de IMAGEN no es correcta. <br><br><table><tr><td><li>Se permiten archivos *.gif, *.png o *.jpg<br><li>se permiten archivos de 3Mb maximo.</td></tr></table><br>";
				}
				else{ 
					  $noticia->__SET('foto', $nombre_archivo1);
					//antes de enviar los caracteres que pasamos por la URL debemos ponerlo en buen recaudo encriptar
					if(is_uploaded_file($nombre_temporal1)){
						copy($nombre_temporal1, $path1.$nombre_archivo1);
						if($_REQUEST['foto1']!=null or $_REQUEST['foto1']!="")
							unlink("images/noticia/".$_REQUEST['foto1']);
					}
					else{echo "<br>Ocurrio un error al subir los archivos. intentelo otra ves.";}
				}
		    }
		    else
		    {
		    	$noticia->__SET('foto',  $_REQUEST['foto1']);
		    }



		    
			$noticia->__SET('idioma_id',     $_REQUEST['idioma_id']);
			$noticia->__SET('estado', $_REQUEST['estado']);





			//echo $_REQUEST['nombre'];
			$noticia->Actualizar($noticia);
			//header('Location: index.php');
			/*/------------PARA LAS ACCIONES-----------------/*/ 			
			echo "<meta http-equiv ='refresh' content='0;url=index.php?p=". urlencode(encripta($p,'rayedgard'))."'>"; 			/*/------------FIN ACCIONES-----------------/*/
			break;








		case 'registrar':
			$noticia->__SET('nombre',     $_REQUEST['nombre']);
			$noticia->__SET('detalle',     $_REQUEST['detalle']);
			$noticia->__SET('link',     $_REQUEST['link']);
			$noticia->__SET('fecha',    $_REQUEST['fecha']);




			/*------linea de codigo para guardar la imagen o foto-------------*/
			$nombre_temporal1= $_FILES["foto"]["tmp_name"];
			$nombre_archivo1 =$_FILES["foto"]["name"];
			$tipo_archivo1 = $_FILES["foto"]["type"]; 
			$tamano_archivo1 =$_FILES["foto"]["size"];
			$path1="images/noticia/";

			if (!((strpos($tipo_archivo1, "gif") || strpos($tipo_archivo1, "png") || strpos($tipo_archivo1,"jpeg") || strpos($tipo_archivo1,"jpg")  && ($tamano_archivo1 < 3000000)))) 
			{ 
				echo "La extensión o el tamaño del archivo de IMAGEN no es correcta. <br><br><table><tr><td><li>Se permiten archivos *.gif, *.png o *.jpg<br><li>se permiten archivos de 3Mb maximo.</td></tr></table><br>";
						
			}
			else{ 
				  $noticia->__SET('foto', $nombre_archivo1);

				//antes de enviar los caracteres que pasamos por la URL debemos ponerlo en buen recaudo encriptar
				if(is_uploaded_file($nombre_temporal1)){
					copy($nombre_temporal1, $path1.$nombre_archivo1);	
				}
				else{echo "<br>Ocurrio un error al subir los archivos. intentelo otra ves.";}
		 				
			}

			/*-------Fin guarda imagenes-----------------*/

			$noticia->__SET('idioma_id',     $_REQUEST['idioma_id']);
			$noticia->__SET('estado', $_REQUEST['estado']);

			
			$noticia->Registrar($noticia);
			//header('Location: index.php');
			/*/------------PARA LAS ACCIONES-----------------/*/ 			
			echo "<meta http-equiv ='refresh' content='0;url=index.php?p=". urlencode(encripta($p,'rayedgard'))."'>"; 			/*/------------FIN ACCIONES-----------------/*/
			break;









		case 'eliminar':

			$noticia->Eliminar($id);
			$fot=desencripta($_GET['fot'],"rayedgard");
			if($fot!=null or $fot!="")
							unlink("images/noticia/".$fot);
			//header('Location: index.php');
			break;

		case 'editar':
			$noticia = $noticia->Obtener($id);
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
								<form class="form-horizontal" action="index.php?p=<?php echo urlencode(encripta($p,'rayedgard'));?>&action=<?php echo $noticia->id > 0 ?  urlencode(encripta("actualizar","rayedgard")) :  urlencode(encripta("registrar","rayedgard")); ?>&id=<?php echo urlencode(encripta($noticia->id,'rayedgard'));?>" method="post" enctype="multipart/form-data">

									
										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Nombre del noticia</label>
											<div class="col-sm-8">

														
												<!--CAMBIO EN name y value-->
												<input type="text" name="nombre" value="<?php echo $noticia->__GET('nombre'); ?>" class="form-control1" id="focusedinput" placeholder="Escriba un nombre de noticia de medida" title="Escriba nombre de noticia" required="">										


											</div>										
										</div>

										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Detalle</label>
											<div class="col-sm-8">

														
												<!--CAMBIO EN name y value-->
												<textarea  name="detalle"  id="txtarea3"  class="form-control1"><?php echo $noticia->__GET('detalle'); ?></textarea> 								

											</div>										
										</div>


									
								


										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Link</label>
											<div class="col-sm-8">

														
												<!--CAMBIO EN name y value-->
												<input type="text" name="link" value="<?php echo $noticia->__GET('link'); ?>" class="form-control1" id="focusedinput" placeholder="Escriba el link de referencia" title="Escriba el link de referencia" required="">										


											</div>										
										</div>


										<div class="form-group">
							              <label class="col-sm-2 control-label">Fecha del noticia</label>
							              <div class="col-sm-8">
							              	<input type="date" name="fecha" value="<?php echo $noticia->__GET('fecha'); ?>" class="form-control1 ng-invalid ng-invalid-required" ng-model="model.date" required="">
							              </div>
							            </div>


										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Foto</label>
											<div class="col-sm-4">
												<input  type="file" name="foto" id="exampleInputFile" value="<?php echo $noticia->__GET('foto'); ?>" >												
												<input type="hidden" name="MAX_FILE_SIZE" value="900000">
												<p class="help-block">Formatos PNG, JPG, GIF.</p>
												<input type="text" name="foto1" id="exampleInputFile" value="<?php echo $noticia->__GET('foto'); ?>" hidden/>
											</div>	

											<div class="col-sm-4">

												 <img src="images/noticia/<?php echo $noticia->__GET('foto');  ?>" height="60" width="60"/> 
													

											</div>	
										</div>


										


										<div class="form-group">
											<label for="txtarea1" class="col-sm-2 control-label">Idioma</label>
											<div class="col-sm-8">
												<select name="idioma_id" id="selector1" class="form-control1">
													
													<?php 
														
												foreach($idioma->ListarCombo() as $r): ?>		

									                    <option name="idioma_id" value="<?php echo $r->__GET('id'); ?>" <?php echo $noticia->__GET('idioma_id') == $r->__GET('id') ? 'selected/' : ''; ?>><?php echo $r->__GET('nombre'); ?>
									                    </option >

								                	<?php endforeach; ?>
												</select>
											</div>
										</div>


										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Estado</label>
											<div class="col-sm-8">
												<div class="radio block">
													<!--CAMBIO EN name y value-->												
													<label><input type="radio" name="estado"  value="1" <?php if(null ===$noticia->__GET('estado')) echo 'checked'; if($noticia->__GET('estado')==1) echo  'checked' ; else echo ''; ?> > Activo </label>
														
													<!--CAMBIO EN name y value-->
													<label><input type="radio" name="estado" value="0" <?php if(null !==$noticia->__GET('estado')) {
														if($noticia->__GET('estado')==0) echo  'checked';  else echo '';
														}  ?> >  Inactivo</label>
												</div>


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
															<a href="index.php?p=<?php echo urlencode(encripta($p,'rayedgard'));?>&idm=<?php echo urlencode(encripta($idm,'rayedgard'));?>" class="btn btn-sm btn-danger">Cancelar</a>
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
								  <th>Nombre</th>
								  <th>fecha</th>
								  <th>Foto</th>
								  <th>Idioma</th>
								  <th>Estado</th>
								  <th></th>
								  <th></th>
								</tr>
							  </thead>
							  <tbody>

								
								<?php 
								$cont=1;
								foreach($noticia->Listar('noticia') as $r): ?>
			                        <tr <?php echo $r->__GET('estado') == 1 ? 'class="colorrowactivo"' : 'class="colorinactivo"'    ?>>
			                        	<td><?php echo $cont++; ?></td>
			                            <td><?php echo $r->__GET('nombre'); ?></td>
			                            <td><?php echo $r->__GET('fecha'); ?></td>
			                            
			                        	 <td>
			                       			<img src="images/noticia/<?php echo $r->__GET('foto');  ?>" height="30" width="30"/> 
			                             </td>
			                            <td><?php echo $r->__GET('idioma_nombre'); ?></td>
			                            <td><?php echo $r->__GET('estado') == 1 ? 'Activo' : 'Inactivo'; ?></td>
			                        	<td> 

                                        

                                        <a title="Editar" href="?p=<?php echo urlencode(encripta($p,'rayedgard'));?>&action=<?php echo urlencode(encripta('editar','rayedgard'));?>&id=<?php echo urlencode(encripta($r->id,'rayedgard')); ?>" class="btn btn-xs btn-primary">E</a>
                                      

                                      <a href="#" title="Eliminar" onclick="javascript:direc('?p=<?php echo urlencode(encripta($p,'rayedgard'));?>&action=<?php echo urlencode(encripta('eliminar','rayedgard'));?>&id=<?php echo urlencode(encripta($r->id,'rayedgard')); ?>&fot=<?php echo urlencode(encripta($r->foto,'rayedgard')); ?>','<?php echo $r->__GET('nombre'); ?>')" class="btn btn-sm btn-danger">X</a>
                                       

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




