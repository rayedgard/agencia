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










<!----extensiones para el editor--->

<!-- place in header of your html document -->
<!-- TinyMCE -->
<script type="text/javascript" src="../../tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks,jfilebrowser",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect,jfilebrowser",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<!-- /TinyMCE -->



<!------fin extensiones del editor-------->


















<?php
require_once '../models/Itinerario.php';
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
$itinerario = new Itinerario();
$titulo = "Gesti&oacute;n de itinerarios";

if(isset($_REQUEST['action']))
{
	//recuperamos variables para desemcriptarlos
	$action=desencripta($_REQUEST['action'],"rayedgard");
	$id=desencripta($_REQUEST['id'],"rayedgard");
	//----------------------------------------------
	switch($action)
	{

		case 'actualizar':
			$itinerario->__SET('id', $id);
			$itinerario->__SET('nombre',     $_REQUEST['nombre']);
			$itinerario->__SET('detalle',     $_REQUEST['detalle']);
			$itinerario->__SET('subcategoria_id', $idd);
			$itinerario->__SET('estado', $_REQUEST['estado']);
			
			//echo $_REQUEST['nombre'];
			$itinerario->Actualizar($itinerario);
			//header('Location: index.php');
			/*/------------PARA LAS ACCIONES-----------------/*/ 			
			echo "<meta http-equiv ='refresh' content='0;url=itinerario.php?idd=". urlencode(encripta($idd,'rayedgard'))."&n=".urlencode(encripta($nombre,'rayedgard'))." '>";
			/*/------------FIN ACCIONES-----------------/*/
			break;

		case 'registrar':
		
		
			$itinerario->__SET('nombre',     $_REQUEST['nombre']);
			$itinerario->__SET('detalle',     $_REQUEST['detalle']);
			$itinerario->__SET('subcategoria_id', $idd);
			$itinerario->__SET('estado', $_REQUEST['estado']);
			
			$itinerario->Registrar($itinerario);
			//header('Location: index.php');
			/*/------------PARA LAS ACCIONES-----------------/*/ 			
			
			echo "<meta http-equiv ='refresh' content='0;url=itinerario.php?idd=". urlencode(encripta($idd,'rayedgard'))."&n=".urlencode(encripta($nombre,'rayedgard'))." '>"; 	
			
		/*/------------FIN ACCIONES-----------------/*/
			break;
		case 'eliminar':
		
			$itinerario->Eliminar($id);//elima en la base de datos

		
			break;
		case 'editar':
			$itinerario = $itinerario->Obtener($id);
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
								<form class="form-horizontal" action="itinerario.php?&action=<?php echo $itinerario->id > 0 ?  encripta("actualizar","rayedgard") :  encripta("registrar","rayedgard"); ?>&id=<?php echo urlencode(encripta($itinerario->id,'rayedgard'));?>&idd=<?php echo urlencode(encripta($idd,'rayedgard'));?>&n=<?php echo urlencode(encripta($nombre,'rayedgard'));?>" method="post" enctype="multipart/form-data">

									
										<div class="form-group">
											
											<h2 class="blank1"><?php echo $nombre;?></h2>								
										</div>

										
										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Nombre</label>
											<div class="col-sm-8">

														
												<!--CAMBIO EN name y value-->
												<input type="text" name="nombre" value="<?php echo $itinerario->__GET('nombre'); ?>" class="form-control1" id="focusedinput" placeholder="Escriba un nombre" title="Escriba un nombre" required="">										

											</div>										
										</div>

							          
										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Detalle</label>
											<div class="col-sm-8">

														
												<!--CAMBIO EN name y value-->
												<textarea  name="detalle"  id="txtarea" class="form-control1"><?php echo $itinerario->__GET('detalle'); ?></textarea> 										


											</div>										
										</div>


										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Estado</label>
											<div class="col-sm-8">
												<div class="radio block">
													<!--CAMBIO EN name y value-->												
													<label><input type="radio" name="estado"  value="1" <?php if(null ===$itinerario->__GET('estado')) echo 'checked'; if($itinerario->__GET('estado')==1) echo  'checked' ; else echo ''; ?> > Activo </label>
														
													<!--CAMBIO EN name y value-->
													<label><input type="radio" name="estado" value="0" <?php if(null !==$itinerario->__GET('estado')) {
														if($itinerario->__GET('estado')==0) echo  'checked';  else echo '';
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
															<a href="itinerario.php?&id=<?php echo urlencode(encripta($r->id,'rayedgard')); ?>&idd=<?php echo urlencode(encripta($idd,'rayedgard')); ?>&n=<?php echo urlencode(encripta($nombre,'rayedgard')); ?>" class="btn btn-sm btn-danger">Cancelar</a>
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
								  <th>Paquete</th>
								  <th>estado</th>
								  <th></th>
								</tr>
							  </thead>
							  <tbody>

								
								<?php 
								$cont=1;
								foreach($itinerario->Listar($idd) as $r): ?>
			                        <tr  <?php echo $r->__GET('estado') == 1 ? 'class="colorrowactivo"' : 'class="colorinactivo"'    ?>>
			                        	<td><?php echo $cont++; ?></td>
			                            <td><?php echo $r->__GET('nombre'); ?></td>
			                            <td><?php echo $r->__GET('subcategoria_nombre'); ?></td>
			                            <td><?php echo $r->__GET('estado') == 1 ? 'Activo' : 'Inactivo'; ?></td>
			                        	<td> 

                            			 <a title="Editar" href="?action=<?php echo urlencode(encripta('editar','rayedgard'));?>&id=<?php echo urlencode(encripta($r->id,'rayedgard')); ?>&idd=<?php echo urlencode(encripta($idd,'rayedgard')); ?>&n=<?php echo urlencode(encripta($nombre,'rayedgard')); ?>" class="btn btn-xs btn-primary">E</a>


                                      <a href="#" title="Eliminar" onclick="javascript:direc('?action=<?php echo urlencode(encripta('eliminar','rayedgard'));?>&id=<?php echo urlencode(encripta($r->id,'rayedgard')); ?>&idd=<?php echo urlencode(encripta($idd,'rayedgard')); ?>&n=<?php echo urlencode(encripta($nombre,'rayedgard')); ?>','<?php echo $r->__GET('nombre'); ?>')" class="btn btn-sm btn-danger">X</a>
                                       

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
