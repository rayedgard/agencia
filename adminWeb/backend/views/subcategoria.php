<script src="../js/modales.js"></script>
<?php
require_once 'models/Subcategoria.php';
require_once 'models/Categoria.php';
require_once 'models/Perfil.php';

$p = desencripta($_GET['p'],"rayedgard");



// Logica
$subcategoria = new Subcategoria();
$categoria = new Categoria();
$perfil=new Perfil();
$titulo = "Gesti&oacute;n y Administraci&oacute;n de Paquetes/Tours";

if(isset($_REQUEST['action']))
{
	//recuperamos variables para desemcriptarlos
	$action=desencripta($_REQUEST['action'],"rayedgard");
	$id=desencripta($_REQUEST['id'],"rayedgard");
	//----------------------------------------------
	switch($action)
	{
		case 'actualizar':
			$subcategoria->__SET('id',         $id);
			$subcategoria->__SET('nombre',     $_REQUEST['nombre']);
			$subcategoria->__SET('detalle',     $_REQUEST['detalle']);
			$subcategoria->__SET('mapa',     $_REQUEST['mapa']);
			$subcategoria->__SET('video',     $_REQUEST['video']);
			$subcategoria->__SET('tarifa',     $_REQUEST['tarifa']);
			$subcategoria->__SET('incluye',     $_REQUEST['incluye']);
			$subcategoria->__SET('hoteles',     $_REQUEST['hoteles']);
			$subcategoria->__SET('restaurante',     $_REQUEST['restaurante']);
			$subcategoria->__SET('perfil_id',     $_REQUEST['perfil_id']);
			$subcategoria->__SET('categoria_id',     $_REQUEST['categoria_id']);
			$subcategoria->__SET('estado', $_REQUEST['estado']);
			
			//echo $_REQUEST['nombre'];



			$subcategoria->Actualizar($subcategoria);
			//header('Location: index.php');
			/*/------------PARA LAS ACCIONES-----------------/*/ 			
			echo "<meta http-equiv ='refresh' content='0;url=index.php?p=". urlencode(encripta($p,'rayedgard'))."'>"; 			/*/------------FIN ACCIONES-----------------/*/
			break;

		case 'registrar':
			
			$subcategoria->__SET('nombre',     $_REQUEST['nombre']);
			$subcategoria->__SET('detalle',     $_REQUEST['detalle']);
			$subcategoria->__SET('mapa',     $_REQUEST['mapa']);
			$subcategoria->__SET('video',     $_REQUEST['video']);
			$subcategoria->__SET('tarifa',     $_REQUEST['tarifa']);
			$subcategoria->__SET('incluye',     $_REQUEST['incluye']);
			$subcategoria->__SET('hoteles',     $_REQUEST['hoteles']);
			$subcategoria->__SET('restaurante',     $_REQUEST['restaurante']);
			$subcategoria->__SET('perfil_id',     $_REQUEST['perfil_id']);
			$subcategoria->__SET('categoria_id',     $_REQUEST['categoria_id']);
			$subcategoria->__SET('estado', $_REQUEST['estado']);

			$subcategoria->Registrar($subcategoria);
			//header('Location: index.php');
			/*/------------PARA LAS ACCIONES-----------------/*/ 			
			echo "<meta http-equiv ='refresh' content='0;url=index.php?p=". urlencode(encripta($p,'rayedgard'))."'>"; 			/*/------------FIN ACCIONES-----------------/*/
			break;

		case 'eliminar':
			$subcategoria->Eliminar($id);
			//header('Location: index.php');
			break;

		case 'editar':
			$subcategoria = $subcategoria->Obtener($id);
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
								<form class="form-horizontal" action="index.php?p=<?php echo urlencode(encripta($p,'rayedgard'));?>&action=<?php echo $subcategoria->id > 0 ?  encripta("actualizar","rayedgard") :  encripta("registrar","rayedgard"); ?>&id=<?php echo encripta($subcategoria->id,'rayedgard');?>" method="post" enctype="multipart/form-data">

									
										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Nombre de subcategoria</label>
											<div class="col-sm-8">

														
												<!--CAMBIO EN name y value-->
												<input type="text" name="nombre" value="<?php echo $subcategoria->__GET('nombre'); ?>" class="form-control1" id="focusedinput" placeholder="Escriba un nombre de subcategoria de medida" title="Escriba nombre de subcategoria" required="">										


											</div>										
										</div>

										
										
										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Detalle</label>
											<div class="col-sm-8">

														
												<!--CAMBIO EN name y value-->
												<textarea  name="detalle"  id="txtarea" class="form-control1"><?php echo $subcategoria->__GET('detalle'); ?></textarea> 										


											</div>										
										</div>

										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Mapa</label>
											<div class="col-sm-8">

														
												<!--CAMBIO EN name y value-->
												
												<textarea  name="mapa"  id="txtarea6"  class="form-control1"><?php echo $subcategoria->__GET('mapa'); ?></textarea> 

											</div>										
										</div>

										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">video</label>
											<div class="col-sm-8">

														
												<!--CAMBIO EN name y value-->
												<textarea  name="video"  id="txtarea2" class="form-control1"><?php echo $subcategoria->__GET('video'); ?></textarea> 



											</div>										
										</div>

										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Tarifa</label>
											<div class="col-sm-8">

														
												<!--CAMBIO EN name y value-->
												<textarea  name="tarifa"  id="txtarea3"  class="form-control1"><?php echo $subcategoria->__GET('tarifa'); ?></textarea> 								

											</div>										
										</div>

										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Que Incluye</label>
											<div class="col-sm-8">
																					
												<textarea  name="incluye"  id="txtarea4" class="form-control1"><?php echo $subcategoria->__GET('incluye'); ?></textarea> 					

											</div>										
										</div>


										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Hoteles Asociados</label>
											<div class="col-sm-8">
																					
												<textarea  name="hoteles"  id="txtarea5" class="form-control1"><?php echo $subcategoria->__GET('hoteles'); ?></textarea> 					

											</div>										
										</div>



										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Restaurantes asociados</label>
											<div class="col-sm-8">
																					
												<textarea  name="restaurante"  id="txtarea7" class="form-control1"><?php echo $subcategoria->__GET('restaurante'); ?></textarea> 					

											</div>										
										</div>


										<div class="form-group">
											<label for="txtarea1" class="col-sm-2 control-label">Perfil del Trabajador</label>
											<div class="col-sm-8">
												<select name="perfil_id" id="selector1" class="form-control1">
													
													<?php 
														
												foreach($perfil->ListarCombo() as $r): ?>		

									                    <option name="perfil_id" value="<?php echo $r->__GET('id'); ?>" <?php echo $subcategoria->__GET('perfil_id') == $r->__GET('id') ? 'selected/' : ''; ?>><?php echo $r->__GET('nombre'); ?>
									                    </option >

								                	<?php endforeach; ?>
												</select>
											</div>
										</div>



										<div class="form-group">
											<label for="txtarea1" class="col-sm-2 control-label">Categoria</label>
											<div class="col-sm-8">
												<select name="categoria_id" id="selector1" class="form-control1">
													
													<?php 
														
												foreach($categoria->ListarCombo() as $r): ?>		

									                    <option name="categoria_id" value="<?php echo $r->__GET('id'); ?>" <?php echo $subcategoria->__GET('categoria_id') == $r->__GET('id') ? 'selected/' : ''; ?>><?php echo $r->__GET('nombre').'-->'.$r->__GET('idioma_nombre') ; ?>
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
													<label><input type="radio" name="estado"  value="1" <?php if(null ===$subcategoria->__GET('estado')) echo 'checked'; if($subcategoria->__GET('estado')==1) echo  'checked' ; else echo ''; ?> > Activo </label>
														
													<!--CAMBIO EN name y value-->
													<label><input type="radio" name="estado" value="0" <?php if(null !==$subcategoria->__GET('estado')) {
														if($subcategoria->__GET('estado')==0) echo  'checked';  else echo '';
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
								  <th>Nombre de Paquete</th>
								  <th>Categoria</th>
								  <th>idioma</th>
								  <th>estado</th>
								  <th></th>
								  <th></th>
								  <th></th>
								</tr>
							  </thead>
							  <tbody>

								
								<?php 
								$cont=1;
								foreach($subcategoria->Listar() as $r): ?>
			                        <tr <?php echo $r->__GET('estado') == 1 ? 'class="colorrowactivo"' : 'class="colorinactivo"'    ?>>
			                        	<td><?php echo $cont++; ?></td>
			                            <td><?php echo $r->__GET('nombre'); ?></td>
			                        	<td><?php echo $r->__GET('categoria_nombre'); ?></td>
			                        	<td><?php echo $r->__GET('idioma_nombre'); ?> </td>
			                            <td><?php echo $r->__GET('estado') == 1 ? 'Activo' : 'Inactivo'; ?></td>
			                        	<td> 

                                        

                                        <a title="Editar" href="?p=<?php echo urlencode(encripta($p,'rayedgard'));?>&action=<?php echo urlencode(encripta('editar','rayedgard'));?>&id=<?php echo urlencode(encripta($r->id,'rayedgard')); ?>" class="btn btn-xs btn-primary">E</a>
                                      

                                      <a href="#" title="Eliminar" onclick="javascript:direc('?p=<?php echo urlencode(encripta($p,'rayedgard'));?>&action=<?php echo urlencode(encripta('eliminar','rayedgard'));?>&id=<?php echo urlencode(encripta($r->id,'rayedgard')); ?>','<?php echo $r->__GET('nombre'); ?>')" class="btn btn-sm btn-danger">X</a>
                                       

                                          </td>

                                           <td>
                                     
                                      <a href="#" title="Galeria Fotografico" name="?idd=<?php echo urlencode(encripta($r->id,'rayedgard'));?>&n=<?php echo urlencode(encripta($r->nombre,'rayedgard'));?>" class="modal1 btn btn-xs btn-warning warning_33" id="modalGaleriaPaquete">G</a>

                                      
                                      <a href="#" title="Gestion de Banner" name="?idd=<?php echo urlencode(encripta($r->id,'rayedgard'));?>&n=<?php echo urlencode(encripta($r->nombre,'rayedgard'));?>" class="modal2 btn btn-xs btn-warning warning_33" id="modalBannerPaquete">B</a>
                                      
                                        </td>

                                          <td>
                                     
                                      <a href="#" title="Gestion de Programa" name="?idd=<?php echo urlencode(encripta($r->id,'rayedgard'));?>&n=<?php echo urlencode(encripta($r->nombre,'rayedgard'));?>" class="modal3 btn btn-xs btn-warning warning_33" id="modalPrograma">P</a>

                                      
                                      <a href="#" title="Gestion de Itinerario" name="?idd=<?php echo urlencode(encripta($r->id,'rayedgard'));?>&n=<?php echo urlencode(encripta($r->nombre,'rayedgard'));?>" class="modal4 btn btn-xs btn-warning warning_33" id="modalItinerario">I</a>
                                      
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

//FUNCION PARA GENERAR O ABRIR EL POPUP
//-----------------------------------------
//.codsearch--> representa la clase de referencia del control
//prop("id")--> captura el valor del id del control 
$(document).on("click",".modal3",function(){
		var idBoton = $(this).prop("id");
		var urll = $(this).prop("name");		
		openModal(idBoton,urll);									
});

//FUNCION PARA GENERAR O ABRIR EL POPUP
//-----------------------------------------
//.codsearch--> representa la clase de referencia del control
//prop("id")--> captura el valor del id del control 
$(document).on("click",".modal4",function(){
		var idBoton = $(this).prop("id");
		var urll = $(this).prop("name");		
		openModal(idBoton,urll);									
});

</script>
