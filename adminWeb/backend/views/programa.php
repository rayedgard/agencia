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
require_once '../models/Programa.php';
require_once '../../config/funciones.php';

//---------------------/////////
//-----para la conexdion de la base de datos--
$ruta = fopen("../../config/ruta.txt", "r");
$linea = fgets($ruta);
fclose($ruta);

require_once $_SERVER['DOCUMENT_ROOT'].$linea;
//---------------------///////////









//variables
$nombre = desencripta($_GET['n'],"rayedgard");
$idd=desencripta($_GET['idd'],"rayedgard");

// Logica
$programa = new Programa();
$titulo = "Gesti&oacute;n de programas";

if(isset($_REQUEST['action']))
{
	//recuperamos variables para desemcriptarlos
	$action=desencripta($_REQUEST['action'],"rayedgard");
	$id=desencripta($_REQUEST['id'],"rayedgard");
	//----------------------------------------------
	switch($action)
	{

		case 'actualizar':
			$programa->__SET('id', $id);
			$programa->__SET('fechainicio',     $_REQUEST['fechainicio']);
			$programa->__SET('fechafin',     $_REQUEST['fechafin']);
			$programa->__SET('disponible',     $_REQUEST['disponible']);
			$programa->__SET('subcategoria_id', $idd);
			$programa->__SET('estado', $_REQUEST['estado']);
			
			//echo $_REQUEST['nombre'];
			$programa->Actualizar($programa);
			//header('Location: index.php');
			/*/------------PARA LAS ACCIONES-----------------/*/ 			
			echo "<meta http-equiv ='refresh' content='0;url=programa.php?idd=". urlencode(encripta($idd,'rayedgard'))."&n=".urlencode(encripta($nombre,'rayedgard'))." '>";
			/*/------------FIN ACCIONES-----------------/*/
			break;

		case 'registrar':
		
		
			$programa->__SET('fechainicio',     $_REQUEST['fechainicio']);
			$programa->__SET('fechafin',     $_REQUEST['fechafin']);
			$programa->__SET('disponible',     $_REQUEST['disponible']);
			$programa->__SET('subcategoria_id', $idd);
			$programa->__SET('estado', $_REQUEST['estado']);
			
			$programa->Registrar($programa);
			//header('Location: index.php');
			/*/------------PARA LAS ACCIONES-----------------/*/ 			
			
			echo "<meta http-equiv ='refresh' content='0;url=programa.php?idd=". urlencode(encripta($idd,'rayedgard'))."&n=".urlencode(encripta($nombre,'rayedgard'))." '>"; 	
			
		/*/------------FIN ACCIONES-----------------/*/
			break;
		case 'eliminar':
		
			$programa->Eliminar($id);//elima en la base de datos

		
			break;
		case 'editar':
			$programa = $programa->Obtener($id);
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
           background: #fff url(../images/red_asterisk.png) no-repeat 98% center;
           border-color: #F69988;
          
         } 

         .col-sm-8 input:required:valid { 
          background: #fff url(../images/valid.png) no-repeat 98% center; 
          box-shadow: 0 0 5px #5cd053;
           border-color: #C5E1A5;
            background-color: #F1F8E9;
            }

			  .col-sm-8 input:focus:invalid { 
          background: #fff url(../images/invalid.png) no-repeat 98% center;
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
								<form class="form-horizontal" action="programa.php?&action=<?php echo $programa->id > 0 ?  encripta("actualizar","rayedgard") :  encripta("registrar","rayedgard"); ?>&id=<?php echo urlencode(encripta($programa->id,'rayedgard'));?>&idd=<?php echo urlencode(encripta($idd,'rayedgard'));?>&n=<?php echo urlencode(encripta($nombre,'rayedgard'));?>" method="post" enctype="multipart/form-data">

									
										<div class="form-group">
											
											<h2 class="blank1"><?php echo $nombre;?></h2>								
										</div>

										
										<div class="form-group">
							              <label class="col-sm-2 control-label">Fecha de Inicio de programa</label>
							              <div class="col-sm-8">
							              	<input type="date" name="fechainicio" value="<?php echo $programa->__GET('fechainicio'); ?>" class="form-control1 ng-invalid ng-invalid-required" ng-model="model.date" required="">
							              </div>
							            </div>

							            <div class="form-group">
							              <label class="col-sm-2 control-label">Fecha Fin de programa</label>
							              <div class="col-sm-8">
							              	<input type="date" name="fechafin" value="<?php echo $programa->__GET('fechafin'); ?>" class="form-control1 ng-invalid ng-invalid-required" ng-model="model.date" required="">
							              </div>
							            </div>

										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Cupos disponibles</label>
											<div class="col-sm-8">

														
												<!--CAMBIO EN name y value-->
												<input type="text" name="disponible" value="<?php echo $programa->__GET('disponible'); ?>" class="form-control1" id="focusedinput" placeholder="Escriba el numero de disponibilidad del programa" title="Escriba el numero de disponiblilidad del programa" required="">										

											</div>										
										</div>


										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Estado</label>
											<div class="col-sm-8">
												<div class="radio block">
													<!--CAMBIO EN name y value-->												
													<label><input type="radio" name="estado"  value="1" <?php if(null ===$programa->__GET('estado')) echo 'checked'; if($programa->__GET('estado')==1) echo  'checked' ; else echo ''; ?> > Activo </label>
														
													<!--CAMBIO EN name y value-->
													<label><input type="radio" name="estado" value="0" <?php if(null !==$programa->__GET('estado')) {
														if($programa->__GET('estado')==0) echo  'checked';  else echo '';
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
															<a href="programa.php?&id=<?php echo urlencode(encripta($r->id,'rayedgard')); ?>&idd=<?php echo urlencode(encripta($idd,'rayedgard')); ?>&n=<?php echo urlencode(encripta($nombre,'rayedgard')); ?>" class="btn btn-sm btn-danger">Cancelar</a>
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
								  <th>Fecha Inicio</th>
								  <th>Fecha Fin</th>
								  <th>Disponible</th>
								  <th>Paquete</th>
								  <th>estado</th>
								  <th></th>
								</tr>
							  </thead>
							  <tbody>

								
								<?php 
								$cont=1;
								foreach($programa->Listar($idd) as $r): ?>
			                        <tr  <?php echo $r->__GET('estado') == 1 ? 'class="colorrowactivo"' : 'class="colorinactivo"'    ?>>
			                        	<td><?php echo $cont++; ?></td>
			                            <td><?php echo $r->__GET('fechainicio'); ?></td>
			                            <td><?php echo $r->__GET('fechafin'); ?></td>
			                        	<td><?php echo $r->__GET('disponible'); ?></td>
			                            <td><?php echo $r->__GET('subcategoria_nombre'); ?></td>
			                            <td><?php echo $r->__GET('estado') == 1 ? 'Activo' : 'Inactivo'; ?></td>
			                        	<td> 

                            			 <a title="Editar" href="?action=<?php echo urlencode(encripta('editar','rayedgard'));?>&id=<?php echo urlencode(encripta($r->id,'rayedgard')); ?>&idd=<?php echo urlencode(encripta($idd,'rayedgard')); ?>&n=<?php echo urlencode(encripta($nombre,'rayedgard')); ?>" class="btn btn-xs btn-primary">E</a>


                                      <a href="#" title="Eliminar" onclick="javascript:direc('?action=<?php echo urlencode(encripta('eliminar','rayedgard'));?>&id=<?php echo urlencode(encripta($r->id,'rayedgard')); ?>&idd=<?php echo urlencode(encripta($idd,'rayedgard')); ?>&n=<?php echo urlencode(encripta($nombre,'rayedgard')); ?>','<?php echo $r->__GET('fechainicio'); ?>')" class="btn btn-sm btn-danger">X</a>
                                       

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
