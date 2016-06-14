<script src="../js/modales.js"></script>
<?php
require_once 'models/Destino.php';
require_once 'models/Idioma.php';

$p = desencripta($_GET['p'],"rayedgard");



// Logica
$destino = new Destino();
$idioma = new idioma();
$titulo = "Gesti&oacute;n y Administraci&oacute;n de destinos";

if(isset($_REQUEST['action']))
{
	//recuperamos variables para desemcriptarlos
	$action=desencripta($_REQUEST['action'],"rayedgard");
	$id=desencripta($_REQUEST['id'],"rayedgard");
	//----------------------------------------------
	switch($action)
	{
		case 'actualizar':
			$destino->__SET('id',          $id);
			$destino->__SET('nombre',     $_REQUEST['nombre']);
			$destino->__SET('etiqueta',     $_REQUEST['etiqueta']);








			$nombre_temporal1= $_FILES["foto"]["tmp_name"];
			$nombre_archivo1 =$_FILES["foto"]["name"];
			$tipo_archivo1 = $_FILES["foto"]["type"]; 
			$tamano_archivo1 =$_FILES["foto"]["size"];
			$path1="images/destino/";

			if($_FILES['foto']['name']!="")
			{				
			   if (!((strpos($tipo_archivo1, "gif") || strpos($tipo_archivo1, "png") || strpos($tipo_archivo1,"jpeg") || strpos($tipo_archivo1,"jpg")  && ($tamano_archivo1 < 3000000)))) 
				{ 
					echo "La extensión o el tamaño del archivo de IMAGEN no es correcta. <br><br><table><tr><td><li>Se permiten archivos *.gif, *.png o *.jpg<br><li>se permiten archivos de 3Mb maximo.</td></tr></table><br>";
				}
				else{ 
					  $destino->__SET('foto', $nombre_archivo1);
					//antes de enviar los caracteres que pasamos por la URL debemos ponerlo en buen recaudo encriptar
					if(is_uploaded_file($nombre_temporal1)){
						copy($nombre_temporal1, $path1.$nombre_archivo1);
						if($_REQUEST['foto1']!=null or $_REQUEST['foto1']!="")
							unlink("images/destino/".$_REQUEST['foto1']);
					}
					else{echo "<br>Ocurrio un error al subir los archivos. intentelo otra ves.";}
				}
		    }
		    else
		    {
		    	$destino->__SET('foto',  $_REQUEST['foto1']);
		    }
















			$destino->__SET('detalle',     $_REQUEST['detalle']);
			$destino->__SET('mapa',     $_REQUEST['mapa']);
			$destino->__SET('clima',     $_REQUEST['clima']);
			$destino->__SET('comollegar',     $_REQUEST['comollegar']);
			$destino->__SET('servicios',     $_REQUEST['servicios']);
			$destino->__SET('idioma_id',     $_REQUEST['idioma_id']);
			$destino->__SET('estado', $_REQUEST['estado']);
			
			//echo $_REQUEST['nombre'];
			$destino->Actualizar($destino);
			//header('Location: index.php');
			/*/------------PARA LAS ACCIONES-----------------/*/ 			
			echo "<meta http-equiv ='refresh' content='0;url=index.php?p=". urlencode(encripta($p,'rayedgard'))."'>"; 			/*/------------FIN ACCIONES-----------------/*/
			break;

		case 'registrar':
			$destino->__SET('nombre',     $_REQUEST['nombre']);
			$destino->__SET('etiqueta',     $_REQUEST['etiqueta']);










				/*------linea de codigo para guardar la imagen o foto-------------*/
			$nombre_temporal1= $_FILES["foto"]["tmp_name"];
			$nombre_archivo1 =$_FILES["foto"]["name"];
			$tipo_archivo1 = $_FILES["foto"]["type"]; 
			$tamano_archivo1 =$_FILES["foto"]["size"];
			$path1="images/destino/";

			if (!((strpos($tipo_archivo1, "gif") || strpos($tipo_archivo1, "png") || strpos($tipo_archivo1,"jpeg") || strpos($tipo_archivo1,"jpg")  && ($tamano_archivo1 < 3000000)))) 
			{ 
				echo "La extensión o el tamaño del archivo de IMAGEN no es correcta. <br><br><table><tr><td><li>Se permiten archivos *.gif, *.png o *.jpg<br><li>se permiten archivos de 3Mb maximo.</td></tr></table><br>";
						
			}
			else{ 
				  $destino->__SET('foto', $nombre_archivo1);

				//antes de enviar los caracteres que pasamos por la URL debemos ponerlo en buen recaudo encriptar
				if(is_uploaded_file($nombre_temporal1)){
					copy($nombre_temporal1, $path1.$nombre_archivo1);	
				}
				else{echo "<br>Ocurrio un error al subir los archivos. intentelo otra ves.";}
		 				
			}

			/*-------Fin guarda imagenes-----------------*/


















			$destino->__SET('detalle',     $_REQUEST['detalle']);
			$destino->__SET('mapa',     $_REQUEST['mapa']);
			$destino->__SET('clima',     $_REQUEST['clima']);
			$destino->__SET('comollegar',     $_REQUEST['comollegar']);
			$destino->__SET('servicios',     $_REQUEST['servicios']);
			$destino->__SET('idioma_id',     $_REQUEST['idioma_id']);
			$destino->__SET('estado', $_REQUEST['estado']);

			
			$destino->Registrar($destino);
			//header('Location: index.php');
			/*/------------PARA LAS ACCIONES-----------------/*/ 			
			echo "<meta http-equiv ='refresh' content='0;url=index.php?p=". urlencode(encripta($p,'rayedgard'))."'>"; 			/*/------------FIN ACCIONES-----------------/*/
			break;

		case 'eliminar':
		



			$id=desencripta($_REQUEST['id'],"rayedgard");
			$nombreFoto=desencripta($_GET['nn'],"rayedgard");//captuamos en nombre de la foto para eliminarla
			$destino->Eliminar($id);

			if($nombreFoto!=null or $nombreFoto!="")
				unlink("images/destino/".$nombreFoto); //elimina en la carpeta







			break;

		case 'editar':
			$destino = $destino->Obtener($id);
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
								<form class="form-horizontal" action="index.php?p=<?php echo urlencode(encripta($p,'rayedgard'));?>&action=<?php echo $destino->id > 0 ?  encripta("actualizar","rayedgard") :  encripta("registrar","rayedgard"); ?>&id=<?php echo encripta($destino->id,'rayedgard');?>" method="post" enctype="multipart/form-data">

									
										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Nombre de destino</label>
											<div class="col-sm-8">

														
												<!--CAMBIO EN name y value-->
												<input type="text" name="nombre" value="<?php echo $destino->__GET('nombre'); ?>" class="form-control1" id="focusedinput" placeholder="Escriba un nombre de destino de medida" title="Escriba nombre de destino" required="">										


											</div>										
										</div>

										
										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Etiqueta</label>
											<div class="col-sm-8">

														
												<!--CAMBIO EN name y value-->
												<input type="text" name="etiqueta" value="<?php echo $destino->__GET('etiqueta'); ?>" class="form-control1" id="focusedinput" placeholder="Escriba la etiqueta" title="Escriba la etiqueta" required="">										


											</div>										
										</div>







										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Foto</label>
											<div class="col-sm-4">
												<input  type="file" name="foto" id="exampleInputFile" value="<?php echo $destino->__GET('foto'); ?>" >												
												<input type="hidden" name="MAX_FILE_SIZE" value="900000">
												<p class="help-block">Formatos PNG, JPG, GIF.</p>
												<input type="text" name="foto1" id="exampleInputFile" value="<?php echo $destino->__GET('foto'); ?>" hidden/>
											</div>	
											<div class="col-sm-4">

												 <img src="images/destino/<?php echo $destino->__GET('foto');  ?>" height="60" width="60"/> 
													

											</div>	

										</div>






										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Detalle</label>
											<div class="col-sm-8">

														
												<!--CAMBIO EN name y value-->
												<textarea  name="detalle"  id="txtarea" class="form-control1"><?php echo $destino->__GET('detalle'); ?></textarea> 										


											</div>										
										</div>

										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Mapa</label>
											<div class="col-sm-8">

														
												<!--CAMBIO EN name y value-->
												
												<input type="text" name="mapa" value="<?php echo $destino->__GET('mapa'); ?>" class="form-control1" id="focusedinput" placeholder="inserte la url del mapa" title="inserte la url del mapa" required="">	

											</div>										
										</div>

										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Clima</label>
											<div class="col-sm-8">

														
												<!--CAMBIO EN name y value-->
												<textarea  name="clima"  id="txtarea2" class="form-control1"><?php echo $destino->__GET('clima'); ?></textarea> 



											</div>										
										</div>

										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Como llegar</label>
											<div class="col-sm-8">

														
												<!--CAMBIO EN name y value-->
												<textarea  name="comollegar"  id="txtarea3"  class="form-control1"><?php echo $destino->__GET('comollegar'); ?></textarea> 									


											</div>										
										</div>

										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Servicios</label>
											<div class="col-sm-8">

														
																					
												<textarea  name="servicios"  id="txtarea4" class="form-control1"><?php echo $destino->__GET('servicios'); ?></textarea> 					

											</div>										
										</div>


																		



										<div class="form-group">
											<label for="txtarea1" class="col-sm-2 control-label">Idioma</label>
											<div class="col-sm-8">
												<select name="idioma_id" id="selector1" class="form-control1">
													
													<?php 
														
												foreach($idioma->ListarCombo() as $r): ?>		

									                    <option name="idioma_id" value="<?php echo $r->__GET('id'); ?>" <?php echo $destino->__GET('idioma_id') == $r->__GET('id') ? 'selected/' : ''; ?>><?php echo $r->__GET('nombre'); ?>
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
													<label><input type="radio" name="estado"  value="1" <?php if(null ===$destino->__GET('estado')) echo 'checked'; if($destino->__GET('estado')==1) echo  'checked' ; else echo ''; ?> > Activo </label>
														
													<!--CAMBIO EN name y value-->
													<label><input type="radio" name="estado" value="0" <?php if(null !==$destino->__GET('estado')) {
														if($destino->__GET('estado')==0) echo  'checked';  else echo '';
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
								  <th>Nombre de destino</th>
								  <th>Etiqueta</th>
								  <th>Foto</th>
								  <th>idioma</th>
								  <th>estado</th>
								  <th></th>
								  <th></th>
								  
								</tr>
							  </thead>
							  <tbody>

								
								<?php 
								$cont=1;
								foreach($destino->Listar('destino') as $r): ?>
			                        <tr <?php echo $r->__GET('estado') == 1 ? 'class="colorrowactivo"' : 'class="colorinactivo"'    ?>>
			                        	<td><?php echo $cont++; ?></td>
			                            <td width="300"><?php echo $r->__GET('nombre'); ?></td>
			                        	<td><?php echo $r->__GET('etiqueta'); ?></td>

			                        	 <td>
			                       			<img src="images/destino/<?php echo $r->__GET('foto');  ?>" height="30" width="30"/> 
			                             </td>


			                        	<td><?php echo $r->__GET('idioma_nombre'); ?></td>
			                        	
			                            <td><?php echo $r->__GET('estado') == 1 ? 'Activo' : 'Inactivo'; ?></td>

			                        	<td> 
                                        <a href="?p=<?php echo urlencode(encripta($p,'rayedgard'));?>&action=<?php echo urlencode(encripta('editar','rayedgard'));?>&id=<?php echo urlencode(encripta($r->id,'rayedgard')); ?>" class="btn btn-xs btn-primary">Editar</a>
										
                                      <a href="#"  onclick="javascript:direc('?p=<?php echo urlencode(encripta($p,'rayedgard'));?>&action=<?php echo urlencode(encripta('eliminar','rayedgard'));?>&id=<?php echo urlencode(encripta($r->id,'rayedgard')); ?>','<?php echo $r->__GET('nombre'); ?>')" class="btn btn-sm btn-danger">Eliminar</a>
                                      
                                      </td>
                                      <td>
                                     
                                      <a href="#" name="?idd=<?php echo urlencode(encripta($r->id,'rayedgard'));?>&n=<?php echo urlencode(encripta($r->nombre,'rayedgard'));?>" class="modal1 btn btn-xs btn-warning warning_33" id="modalGaleriaDestino">Galeria</a>

                                      
                                      <a href="#" name="?idd=<?php echo urlencode(encripta($r->id,'rayedgard'));?>&n=<?php echo urlencode(encripta($r->nombre,'rayedgard'));?>" class="modal2 btn btn-xs btn-warning warning_33" id="modalBannerDestino">Banner</a>
                                      
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



<script>
//FUNCION PARA GENERAR O ABRIR EL POPUP
//-----------------------------------------
//.codsearch--> representa la clase de referencia del control
//prop("id")--> captura el valor del id del control 
$(document).on("click",".modal1",function(){
		var idBoton = $(this).prop("id");
		var urll = $(this).prop("name");		
		openModal(idBoton,urll);									
});

//FUNCION PARA GENERAR O ABRIR EL POPUP
//-----------------------------------------
//.codsearch--> representa la clase de referencia del control
//prop("id")--> captura el valor del id del control 
$(document).on("click",".modal2",function(){
		var idBoton = $(this).prop("id");
		var urll = $(this).prop("name");		
		openModal(idBoton,urll);									
});


</script>
