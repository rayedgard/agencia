<html>
	<head>
	
		<script src="../js/tableHeadFixer.js"></script>
		<link rel="stylesheet" href="../assets/bootstrap-3.3.2/css/bootstrap.css">
		<html>
	
		<style>
			#parent {
				height: 360px;
			}
			
			#fixTable {
				width: 900px;
			}
		</style>

		<script>
			$(document).ready(function() {
				$("#fixTable").tableHeadFixer({"left" : 3}); 
			});
		</script>
	</head>

	<body>

<?php
require_once 'models/Empleado.php';
require_once 'models/Turnos.php';
require_once 'models/Rol.php';
require_once '../config/funciones.php';
$empleado = new Empleado();
$turnos = new Turnos();
$rol = new Rol();
$p=desencripta($_GET['p'],'rayedgard');

///----parametros iciciales----//
$diasdelmes=date("t");

//--formato para cambiar el idioma del dia
setlocale(LC_ALL,"es_ES@euro","es_ES","esp","es");
$dias = array('','Lun','Mar','Mie','Jue','Vie','Sab','Dom');
$dialetra = $dias[date('N')];



$anio=date("Y");
$mes=date("m");
//$dialetra=date("l");
$dianumero=date("d");
		


if(isset($_REQUEST['action']))
{
	//recuperamos variables para desemcriptarlos
	$action=desencripta($_REQUEST['action'],"rayedgard");
	//----------------------------------------------
	switch($action)
	{
		case 'registrar':
			 
			

			foreach($_POST['check'] as $dnis)
			{
				//primeramente eliminamos todos los datos chekados anteriormente
				//$menuaccion->Eliminar($id,$check);
					$cont=1;
					foreach($_REQUEST['check1'.$dnis] as $ch)
					{
						$fechaHoy=$anio.'-'.$mes.'-'.$cont;

						$rol->Eliminar($dnis,$fechaHoy);
												
						$rol->__SET('idDia', $cont);
						$rol->__SET('DocumentoDNI',  $dnis);
						$rol->__SET('idTurno',  $ch);
						$rol->__SET('fecha',  $fechaHoy);
						$rol->__SET('estado',  '0');
						
						//guardamos los datos chekados	
						$rol->Registrar($rol);
						$cont++;
					}
				
			
			}
			
			
			//header('Location: index.php');
			//echo "<meta http-equiv ='refresh' content='0;url=privilegios.php?id=". $id."&t=". $titulo."'>";


			echo "
			<script>
				$(document).ready(function(){
				cerrar('Asignación de aciones guardados satisfactoriamente');
				});
			</script>
			";
			break;

	
		
	}
}

?>


<div id="page-wrapper">




		<h2>Administraci&oacute;n de ROLES</h2>
		<h2><?php echo date("Y-m-d");?></h2>
		


		
		<form class="form-horizontal" action="index.php?p=<?php echo urlencode(encripta($p,'rayedgard'));?>&id=<?php echo $id;?>&action=<?php echo urlencode(encripta("registrar","rayedgard")); ?>" method="post">





			<div id="parent">

			<table id="fixTable" class="table">

				

				<thead>
					<tr>
					<th>N°</th>
					<th>DNI</th>
					<th >Nombres</th>
					<?php for($i=1;$i<=$diasdelmes;$i++){?>
						<th><?php echo $dias[date('N',strtotime($anio.'-'.$mes.'-'.$i))]." ".$i;?></th>
					<?php }?>
					</tr>
				</thead>
				<tbody>
				
				<?php $contador=1; foreach ($empleado->Listar($_SESSION['idArea']) as $r) {


					
					?>

					<tr>
						<td><?php echo $contador; ?></td>
						<td>
							<!--<input tipe="checkbox" value="<?php echo $r->DocumentoDNI;?>" name="check[]" checked="checked"  hidden />-->
							<input tipe="text" value="<?php echo $r->DocumentoDNI;?>" name="check[]"  hidden />
							<?php echo $r->DocumentoDNI;?>
						</td>
						<td>

							<?php echo $r->Nombres;?>
						</td>

						<?php

					
						 


						 for($f=1;$f<=$diasdelmes;$f++){


						?>
												
						<td>  
											            
							<select name="check1<?php echo $r->DocumentoDNI;?>[]" id="selector1" >
								

							


									<?php 
									
									$fecha = $anio.'-'.$mes.'-'.$f;
									$m = $turnos->ListaTurno($r->DocumentoDNI,$fecha);
						
						
									
									
										foreach($turnos->Listar() as $rr):

										 
								?>		

										
										<option  value="<?php echo $rr->__GET('Nomenclatura'); ?>" 
										  <?php
										  	echo $m == $rr->__GET('Nomenclatura') ? 'selected/' : '';
										  ?>
										  >
										<?php   echo $rr->__GET('Nomenclatura'); ?>
				                            </option >
										
									

			                	<?php endforeach; ?>
							


							</select>
											









				        </td>
				        <?php }//fin for de dias del mes
				        
				        ?>
					</tr>
				<?php $contador++;}//fin foreach de empleados
				?>
				</tbody>

				
			</table>
			</div><!--fin parent-->

			<button class="btn-success btn" type="submit">Guardar</button>
			</form>






			<div>
			<h2>Leyenda</h2>
				<!--tabla para mostrar los valores de la nomnclatura-->
				<table >
					<thead>
						<tr style="color:blue;">
							<th >N°</th>
							<th>Nomenclatura</th>
							<th>Nombre</th>
							<th>Horario</th>
							<th>Detalle</th>
						</tr>
					
					<tbody>
						<?php
							$cont=1;
							foreach($turnos->Listar() as $m):
						 ?>
						<tr>
					
							<td><?php echo $cont; ?></th>
							<td style="color:blue;"><?php echo $m->__GET('Nomenclatura'); ?></td>
							<td><?php echo $m->__GET('NombreTurno'); ?></td>
							<td style="color:red;" width="150" ><?php echo $m->__GET('HoraEntrada')." - ".$m->__GET('HoraSalida'); ?></td>
							<td style="color:green;"><?php echo $m->__GET('Detalles'); ?></td>
							
						</tr>
						<?php
							$cont++;
							endforeach;
						?>	
					</tbody>
				</table>

			</div>





		
</div>
	</body>
</html>