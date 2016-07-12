<!DOCTYPE html>
<?php
session_start();
//llamar clases del model
require_once'adminWeb/backend/models/Subcategoria.php';
require_once'adminWeb/backend/models/Banner.php';
require_once'adminWeb/backend/models/Categoria.php';
require_once'adminWeb/backend/models/Programa.php';
require_once'adminWeb/backend/models/Itinerario.php';
require_once'adminWeb/backend/models/Testimonio.php';
require_once'adminWeb/backend/models/Galeria.php';
require_once'adminWeb/backend/models/Perfil.php';
require_once'adminWeb/backend/models/ControlesTag.php';
$ruta = fopen("adminWeb/config/ruta.txt","r");
$linea = fgets($ruta);
fclose($ruta);
// $idIdiomaTags="3";
//--------------------
$direccionMapa ="";
if (isset($_SESSION["idIdioma"])) {
$idIdiomaTags=$_SESSION["idIdioma"];
}
else{
	$idIdiomaTags="3";
}
?>

<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>MUNDO INKA</title>
		<!-- Bootstrap Core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom Fonts -->
		<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Custom CSS -->
		<link rel="stylesheet" href="css/patros.css" >
		<!-- CSS Propiestarios -->
		<link rel="stylesheet" type="text/css" href="css/cssPropios.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.min.css" />
		<!-- <script type="text/javascript" src="/js/funcionesDestino.js"></script> -->
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
			<![endif]-->
	</head>

	<body data-spy="scroll">
		<div class="container-fluid navbar-fixed-top" style="height: 25px; z-index:100;">

				<div class="row">
					<div class="col-md-3 col-xs-12" style="padding-right: 0px; padding-left: 110px; color: #fff;">
						<h6 id="correoFijo" ><span class="glyphicon glyphicon-envelope"> </span> informes@incaperuworld.com</h6>
					</div>
					<div class="col-md-7 col-xs-12" style="padding-left: 0px; ">
						<h6 style="float: left; color: #fff; margin-top: 4px;"><span class="glyphicon glyphicon-phone"> </span> 00 51 54 600139</h6>
					</div>

					<div class="col-md-2 col-xs-12">
						<select id="idiomas" class="form-control" >
							<!-- comobo de idomas de base de datos -->
						</select>
					</div>
				</div>
		</div>
		<!-- Navigation -->
		<nav class="navbar navbar-inverse navbar-fixed-top" id="navegadorId" style="z-index:1; margin-bottom: 0px; padding-bottom: 0px; background: transparent;">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="company logo" /></a> -->
					<div id="logo-div" style="margin-top: 10px;">
					   <a id="logo-img" href="index.html" >
					      <img style=" width:150px; height:150px;" src="adminWeb/images/logo.png" >
					   </a>
					</div>  
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<div class="miMenu" style="float: right;">
						<nav>
							<ul id="listaMenu" style="margin-bottom: 0px;">
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</nav>

		<!-- Header Carousel -->
		<header id="home" class="carousel slide">
			<ul class="cb-slideshow" id="banerGeneral">
				<?php
					include($_SERVER['DOCUMENT_ROOT'].$linea);

					$idsubcategoria=$_POST['id_fijo'];

					$baner = new Banner();

					$banerLista = $baner->bannerSubcategoria($idsubcategoria);

					$tiempo=0;
					$listaBaner="";
					$nImagenes = count($banerLista);

					// if ( 36 % $nImagenes == 0) {
					// 	$tiempoL = 36 / $nImagenes;
					// }else{
						$r = 36 / $nImagenes;
						// $c = 36 % $nImagenes;
						$tiempoL = $r;
					// }
											// print_r($tiempoL);

		            for ($i=0; $i < $nImagenes ; $i++) {
		            		if($i == 0)
		            		{
		            			$imagen='<li> <span style="background-image: url(adminWeb/backend/images/bannerPaquete/'.$banerLista[$i]["foto"].'); > Imagen</span> 

										<div class="container"> 
											<div class="row"> 
												<div class="col-lg-12"> 
													<div class="text-center">';
			                    $titulo = '<h3>'.$banerLista[$i]["titulo"].'</h3> </div> </div> </div> ';
			                    $descripcion = '<h4>'.$banerLista[$i]["detalle"].'</h4> </div> </li>';
			                    $tiempo= $tiempo + $tiempoL;
			                    $lista = $imagen.$titulo.$descripcion;
		            		}
		            		else{

								$imagen='<li>
								<span style="background-image: url(adminWeb/backend/images/bannerPaquete/'.$banerLista[$i]["foto"].');  -webkit-animation-delay: '.$tiempo.'s; -moz-animation-delay: '.$tiempo.'s; -o-animation-delay: '.$tiempo.'s; -ms-animation-delay: '.$tiempo.'s; animation-delay: '.$tiempo.'s;"> Imagen</span> <div class="container" style="-webkit-animation-delay: '.$tiempo.'s; -moz-animation-delay: '.$tiempo.'s; -o-animation-delay: '.$tiempo.'s; -ms-animation-delay: '.$tiempo.'s; animation-delay: '.$tiempo.'s;"> <div class="row" style="-webkit-animation-delay: '.$tiempo.'s; -moz-animation-delay: '.$tiempo.'s; -o-animation-delay: '.$tiempo.'s; -ms-animation-delay: '.$tiempo.'s; animation-delay: '.$tiempo.'s;"> <div class="col-lg-12" style="-webkit-animation-delay: '.$tiempo.'s; -moz-animation-delay: '.$tiempo.'s; -o-animation-delay: '.$tiempo.'s; -ms-animation-delay: '.$tiempo.'s; animation-delay: '.$tiempo.'s;"> <div class="text-center" style="-webkit-animation-delay: '.$tiempo.'s; -moz-animation-delay: '.$tiempo.'s; -o-animation-delay: '.$tiempo.'s; -ms-animation-delay: '.$tiempo.'s; animation-delay: '.$tiempo.'s;">';
								
								$tiempo= $tiempo + $tiempoL;
			                    $titulo = '<h3>'.$banerLista[$i]["titulo"].'</h3> </div> </div> </div> ';
			                    $descripcion = '<h4>'.$banerLista[$i]["detalle"].'</h4> </div> </li>';
			            		$lista = $imagen.$titulo.$descripcion;

		            		}
		                    $listaBaner= $listaBaner.$lista;
		                }
		                echo $listaBaner;
				?>
			</ul>
			<div class="intro-scroller">
				<a class="inner-link" href="#about">
					<div class="mouse-icon" style="opacity: 0.6;">
						<div class="wheel"></div>
					</div>
				</a> 
			</div>          
		</header>
			
		<div class="container-fluid">
			
			<div class="row">
				<div class="col-md-8" style=" padding-left: 90px;">
					<?php
					$listaTagsDestinos=new ControlesTags();
					  $reservas=$listaTagsDestinos->ListarTagsLavelStr($idIdiomaTags,'H2LavelTestimonios','txt_listaTestPrograma'); 
					  $reservas2=$listaTagsDestinos->ListarTagsLavelStr($idIdiomaTags,'H2LavelTestimonios','txt_listaTestTarifa'); 
					 $reservas3=$listaTagsDestinos->ListarTagsLavelStr($idIdiomaTags,'H2LavelTestimonios','txt_listaTestItinerario'); 
					  //print_r($reservaItinerario);
					//instanciado objeto
					$subcategoria=new Subcategoria();

					$itinerario = new Itinerario();

					$programa = new Programa();

					if (isset($_POST['id_fijo'])) {
						$idsubcategoria=$_POST['id_fijo'];

						$arraySubcategoria=$subcategoria->mostrarSubCategoria($idsubcategoria);

						$arrayItinerario=$itinerario->ItinerarioSubcategoria($idsubcategoria);
						$reservas4=$listaTagsDestinos->ListarTagsLavelStr($idIdiomaTags,'H2LavelTestimonios','cap_inicio');
						$reservas5=$listaTagsDestinos->ListarTagsLavelStr($idIdiomaTags,'H2LavelTestimonios','cap_fin'); 
						$reservas6=$listaTagsDestinos->ListarTagsLavelStr($idIdiomaTags,'H2LavelTestimonios','cap_disponibilidad');  
						$arrayPrograma=$programa->programaSubcategoria($idsubcategoria);


						$direccionMapa = $arraySubcategoria[0]['mapa'];

						

						$reservas3=$listaTagsDestinos->ListarTagsLavelStr($idIdiomaTags,'H2LavelTestimonios','txt_listaTestItinerario'); 
						$tabla='<div class="table-responsive"> <table class="table"> <tr> <th> Inicio</th>  <th> Fin</th> <th> Disponibilidad</th></tr>';


						$desplegable='<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">';
						// print_r($arraySubcategoria);
						$cuerpo="";
						$listasJuntas="";
						//traduccion ultima tabla
						$listaTagsDestinos33=new ControlesTags();
					  $reservasIncluye=$listaTagsDestinos33->ListarTagsLavelStr($idIdiomaTags,'Box_destinos','BoxDestinos_incluye'); 
					  $reservasHoteles=$listaTagsDestinos33->ListarTagsLavelStr($idIdiomaTags,'Box_destinos','BoxDestinos_Hoteles');
					  $reservasRestaurantes=$listaTagsDestinos33->ListarTagsLavelStr($idIdiomaTags,'Box_destinos','BoxDestinos_Restaurantes');

						for ($i=0; $i <count($arraySubcategoria) ; $i++) {
							$perfil = $arraySubcategoria[$i]["perfil_id"];
							for ($d=0; $d < count($arrayPrograma); $d++) { 
								$linea = ' <tr> <td>'.$arrayPrograma[$d]['fechainicio'].' </td> <td>'.$arrayPrograma[$d]['fechafin'].'</td> <td>'.$arrayPrograma[$d]['disponible'].'</td> </tr>';
								$cuerpo = $cuerpo.$linea;
							}

							$tabla=$tabla.$cuerpo.'</table> </div>';
							
							echo "<h2>".$arraySubcategoria[$i]['nombre']."</h2>";
							echo "<h3>".$arraySubcategoria[$i]['detalle']."</h3>";
							echo "<h3> ". $reservas."</h3>";
							echo $tabla;

							for ($j=0; $j < count($arrayItinerario); $j++) { 
								$lista = '<div class="panel panel-default"> <div class="panel-heading" role="tab" id="heading'.$j.'"> <h4 class="panel-title"> <a  class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$j.'" aria-expanded="false" aria-controls="collapse'.$j.'"> '.$arrayItinerario[$j]['nombre'].' </a> </h4> </div> <div id="collapse'.$j.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne"> <div class="panel-body">'.$arrayItinerario[$j]['detalle'].'</div> </div> </div>';
								$listasJuntas = $listasJuntas.$lista;
							}

							$desplegable=$desplegable.$listasJuntas.'</div>';
							echo "<h3> ".$reservas2."</h3>";
							echo "<h4>".$arraySubcategoria[$i]['tarifa']."</h4>";
							  
							echo "<h3>".$reservas3."</h3>";
							echo $desplegable;

							echo '<ul class="nav nav-tabs" id="tages"> <li class="active"><a data-toggle="tab" href="#Incluye">'.$reservasIncluye.'</a></li> <li><a data-toggle="tab" href="#Hoteles">'.$reservasHoteles.'</a></li> <li><a data-toggle="tab" href="#Restaurantes">'.$reservasRestaurantes.'</a></li> </ul> <div class="tab-content"> <div id="Incluye" class="tab-pane fade in active"> <br> <h4>'.$arraySubcategoria[$i]['incluye'].'</h4> </div> <div id="Hoteles" class="tab-pane fade"> <br> <h4>'.$arraySubcategoria[$i]['hoteles'].' </h4> </div> <div id="Restaurantes" class="tab-pane fade"> <br> <h4>'.$arraySubcategoria[$i]['restaurante'].' </h4> </div> </div> <hr>';
							// echo "<h4>".$DestinoLista[$i]['comollegar']."</h4>";
							// echo "<h4>".$DestinoLista[$i]['servicios']."</h4>";


							// <div class="panel panel-default"> <div class="panel-heading" role="tab" id="headingOne"> <h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> Collapsible Group Item 1 </a> </h4> </div> <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne"> <div class="panel-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div> </div> </div> 

							echo "<iframe width='100%' height='400' src='https://www.youtube.com/embed/".$arraySubcategoria[$i]['video']."' frameborder='0' allowfullscreen></iframe>";
						}
					}
					
					?>
				</div>
				<aside class="col-md-4 sidebar-padding">

						<!-- Recent Posts -->
		                <div class="blog-sidebar">
		                    <h4 class="sidebar-title"><i class="fa fa-user" aria-hidden="true"> </i> <?php  $listaTagsDestinos=new ControlesTags();
				 			echo $reservas=$listaTagsDestinos->ListarTagsLavelStr($idIdiomaTags,'H4LavelCategoria','txt_autor'); 
							?></h4>
		                    <hr style="margin-bottom: 5px;">

		                    <div id=div_destinos class="row">
								<!-- lista destinos -->
								
								<?php
									$perf = new Perfil();

									$arreglo=$perf->buscarPerfil($perfil);
									for ($i=0; $i <count($arreglo) ; $i++) { 
										echo " <div align='center' class='col-md-4'><img  class='img-responsive img-circle' style='height: 120px; width: 120px; ' src='adminWeb/backend/images/perfil/".$arreglo[$i]['foto']."'> </div> 
					
											<div class='col-md-8'><h4>".$arreglo[$i]['nombre']."</h4> <h6>".$arreglo[$i]['cargo']."</h6> <h6>".$arreglo[$i]['telefono']."</h6> <h6>".$arreglo[$i]['correo']."</h6> <h6><i class='fa fa-star' aria-hidden='true'></i><i class='fa fa-star' aria-hidden='true'></i><i class='fa fa-star' aria-hidden='true'></i><i class='fa fa-star-o' aria-hidden='true'></i><i class='fa fa-star-o' aria-hidden='true'></i></h6></div>";
									}
								?>
								
								<div class="col-md-12" align="center">
									<button type="button" class="btn btn-primary" style="background:#58AAF5;" data-toggle="modal" data-target=".bs-example-modal-lg"> <?php  $listaTagsDestinos=new ControlesTags();
				 			echo $reservas=$listaTagsDestinos->ListarTagsLavelStr($idIdiomaTags,'BtnLavel','btn_leerMas'); 
							?></button>
								</div>
							</div>
						</div>

							<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
							  <div class="modal-dialog modal-lg" >
							    <div class="modal-content" style="width: 1000px;">

				       <!-- <div class="modal-dialog"> -->
					  					<!-- <div class="modal-content"> -->
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									        <h4 class="modal-title"> <?php  $listaTagsDestinos=new ControlesTags();
				 			echo $reservas=$listaTagsDestinos->ListarTagsLavelStr($idIdiomaTags,'H4LavelCategoria','txt_autor'); 
							?></h4>
									      </div>
									      <div class="modal-body">
									    		<div class="contend">
									    			<div class="row">
									    				<div class="col-md-4">
									    					<?php
																$perf = new Perfil();

																$arreglo=$perf->buscarPerfil($perfil);
																for ($i=0; $i <count($arreglo) ; $i++) { 
																	echo " <div align='center'><img  class='img-responsive img-circle' style='height: 200px; width: 200px; ' src='adminWeb/backend/images/perfil/".$arreglo[$i]['foto']."'> </div> <h4>".$arreglo[$i]['nombre']."</h4> <h6>".$arreglo[$i]['cargo']."</h6> <h6>".$arreglo[$i]['telefono']."</h6> <h6>".$arreglo[$i]['correo']."</h6>";
																
															?>
									    				</div>
									    				<div class="col-md-8">
									    					<?php
									    						echo $arreglo[$i]['detalle'];
									    						}
									    					?>
									    				</div>
									    			</div>
									    		</div>
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-default" data-dismiss="modal"> <?php  $listaTagsDestinos=new ControlesTags();
				 			echo $reservas=$listaTagsDestinos->ListarTagsLavelStr($idIdiomaTags,'H2LavelTestimonios','btn_close'); 
							?></button>
									      </div>
									    <!-- </div> -->
									  <!-- </div> -->

							    </div>
							  </div>
							</div>
		                <!-- <hr> -->
		                
		                <!-- Blog Categories -->
		                <div class="blog-sidebar">
		                    <h4 class="sidebar-title"><i class="fa fa-list-ul"></i> <?php  $listaTagsDestinos=new ControlesTags();
				 			echo $reservas=$listaTagsDestinos->ListarTagsLavelStr($idIdiomaTags,'H2LavelDestinos','txt_reserva'); 
							?>	</h4>
		                    <hr>
		                    <div id="div_reservas">					
		    				<form class="form-inline" >
		    					<div class="form-group">
									<label class="sr-only" for=""><?php  $listaTagsDestinos=new ControlesTags();
				 			echo $reservas=$listaTagsDestinos->ListarTagsLavelStr($idIdiomaTags,'H2LavelDestinos','txt_nombre'); 
							?></label>  
									
									<input id="" name="" type="text" placeholder="<?php  $listaTagsDestinos=new ControlesTags();
				 			echo $reservas=$listaTagsDestinos->ListarTagsLavelStr($idIdiomaTags,'H2LavelDestinos','txt_nombre'); 
							?>" class="form-control">
								</div>
								<div class="form-group" >
									<label class="sr-only" for=""><?php  $listaTagsDestinos=new ControlesTags();
				 			echo $reservas=$listaTagsDestinos->ListarTagsLavelStr($idIdiomaTags,'H2LavelDestinos','txt_correo'); 
							?></label>    

									<input id="" name="" type="email" placeholder="<?php  $listaTagsDestinos=new ControlesTags();
				 			echo $reservas=$listaTagsDestinos->ListarTagsLavelStr($idIdiomaTags,'H2LavelDestinos','txt_correo'); 
							?>" class="form-control">
								</div>
								<hr>
								<div class="form-group">
									<label class="sr-only" for=""><?php  $listaTagsDestinos=new ControlesTags();
				 			echo $reservas=$listaTagsDestinos->ListarTagsLavelStr($idIdiomaTags,'H2LavelDestinos','txt_pais'); 
							?></label>  
									<input id="" name="" type="text" placeholder="<?php  $listaTagsDestinos=new ControlesTags();
				 			echo $reservas=$listaTagsDestinos->ListarTagsLavelStr($idIdiomaTags,'H2LavelDestinos','txt_pais'); 
							?>" class="form-control">
								</div>
		   					
		    				
		    				    <div class="form-group">
									<label class="sr-only" for=""><?php  $listaTagsDestinos=new ControlesTags();
				 			echo $reservas=$listaTagsDestinos->ListarTagsLavelStr($idIdiomaTags,'H2LavelDestinos','txt_telefono'); 
							?></label>  
									<input id="" name="" type="text" placeholder="<?php  $listaTagsDestinos=new ControlesTags();
				 			echo $reservas=$listaTagsDestinos->ListarTagsLavelStr($idIdiomaTags,'H2LavelDestinos','txt_telefono'); 
							?>" class="form-control input-md">
								</div>
								<br>
								<br>
								
								
								<div class="form-group">

									<label><?php  $listaTagsDestinos=new ControlesTags();
				 			echo $reservas=$listaTagsDestinos->ListarTagsLavelStr($idIdiomaTags,'H2LavelAll','cap_retorno'); 
							?></label>
									<br>
					                <div class='input-group date' id='datetimepicker1' style="width: 340px; z-index:0;">
					                    <input type='date' class="form-control" />
					                    <!-- <span class="input-group-addon">
					                        <span class="glyphicon glyphicon-calendar"></span>
					                    </span> -->
					                </div>
					            </div>
								<br>
								<br>
								<div class="form-group">
						            <label class="text" for=""><?php  $listaTagsDestinos=new ControlesTags();
				 			echo $reservas=$listaTagsDestinos->ListarTagsLavelStr($idIdiomaTags,'H2LavelDestinos','txt_alojamiento'); 
							?></label>
									<br>
						            <label class="radio-inline">
									  <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> <?php  $listaTagsDestinos=new ControlesTags();
				 			echo $reservas=$listaTagsDestinos->ListarTagsLavelStr($idIdiomaTags,'H2LavelDestinos','txt_economico'); 
							?>
									</label>
									<label class="radio-inline">
									  <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> <?php  $listaTagsDestinos=new ControlesTags();
				 			echo $reservas=$listaTagsDestinos->ListarTagsLavelStr($idIdiomaTags,'H2LavelDestinos','txt_medio'); 
							?>
									</label>
									<label class="radio-inline">
									  <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> <?php  $listaTagsDestinos=new ControlesTags();
				 			echo $reservas=$listaTagsDestinos->ListarTagsLavelStr($idIdiomaTags,'H2LavelDestinos','txt_lujoso'); 
							?>
									</label>
								</div>
								
								<br>
								<br>
				
		            		 	<div class="form-group">
										<label class="col-md-12 control-label" for="textarea"></label>
					  					<div class="col-md-12">                     
											<textarea class="form-control" id="textarea" name="textarea">Mensaje</textarea>
										</div>
								</div>

								<br>
								<br>
								<div align="center">
			    					<button class="btn btn-info btn-lg btn-block"><?php  $listaTagsDestinos=new ControlesTags();
				 			echo $reservas=$listaTagsDestinos->ListarTagsLavelStr($idIdiomaTags,'H2LavelDestinos','txt_reserva'); 
							?></button>

								</div>

							</form>

						</div>
		                </div>
		                <!-- Recent Posts -->
		                <div class="blog-sidebar">
		                    <h4 class="sidebar-title"><i class="fa fa-map-marker"> </i> Destinos</h4>
		                    <hr style="margin-bottom: 5px;">

		                    <div id=div_destinos>
								<!-- lista destinos -->
								
								<?php
									$catego = new Categoria();

									$DestinoListaTotal=$catego->ListarComboArray(3);
									for ($i=0; $i <count($DestinoListaTotal) ; $i++) { 
										echo " <ul><i class='fa fa-thumb-tack' aria-hidden='true'> </i>  ".$DestinoListaTotal[$i]['nombre']."</ul>";
									}
								?>

							</div>
		                </div>

		                <div class="blog-sidebar">
		                    <h4 class="sidebar-title"><i class="fa fa-comments"></i> Testimonios</h4>
		                    <hr style="margin-bottom: 5px;">
							<div id="div_testimonios">
								
								<div style="width: 380px; height: 400px; overflow-y: scroll;">
									<ul>
								<?php 
								$dataTestimonio=new Testimonio();
								$testimonioLista=$dataTestimonio->ListarArray();
								for ($i=0; $i <count($testimonioLista) ; $i++) { 

									
									echo "<li><h3><i class='fa fa-thumbs-up' aria-hidden='true'>&nbsp</i>".$testimonioLista[$i]['nombre']."</h3></li>";
									echo "<li>".$testimonioLista[$i]['detalle']."</li>";
									echo "<li>".$testimonioLista[$i]['correo']."&nbsp &nbsp ".$testimonioLista[$i]['fecha']."</li> <hr>";

								}


								?>
								</ul>
								</div>
							</div>
						</div>

					</aside>
			</div>

		</div>
	</div>

		<section id="portfolio1">
		<div class="container">
		<div class="row">
			<div class="text-center">
			<h2><?php  $listaTagsDestinos=new ControlesTags();
				 			echo $reservas=$listaTagsDestinos->ListarTagsLavelStr($idIdiomaTags,'H2Lavel','h2_galeria'); 
							?></h2>
			<img class="img-responsive displayed" src="images/short.png" alt="about">
			</div>
 
			<ul class="port2" id="galeriaIndex">

				
				<?php
					$galeriaSubcategoria = new Galeria();

					$arreglo = $galeriaSubcategoria->galeriaSubcategoria($idsubcategoria);

					for ($i=0; $i < count($arreglo); $i++) { 
						echo '<li data-type="development" data-id="id-1" class="port3"> <a href="#" id="development1"><img src="adminWeb/backend/images/galeriaPaquete/'.$arreglo[$i]['nombre'].'" alt=""></a></li>';

						 }
				?>
			  <!-- <li data-type="development" data-id="id-1" class="port3">
				<a href="#" id="development1"><img src="images/port1.jpg" alt=""></a></li>
			  <li data-type="webdesign" data-id="id-2" class="port3">
				<a href="#" id="webdesign1"><img src="images/port2.jpg" alt=""></a>
			  </li>
			  <li data-type="mobileapps" data-id="id-3" class="port3">
				<a href="#" id="mobileapps1"><img src="images/port3.jpg" alt=""></a>
			  </li>
				<li data-type="development" data-id="id-4" class="port3">
				<a href="#" id="development2"><img src="images/port4.jpg" alt=""></a>
			  </li>
			  <li data-type="webdesign" data-id="id-5" class="port3">
				<a href="#" id="webdesign2"><img src="images/port5.jpg" alt=""></a>
			  </li>
			  <li data-type="mobileapps" data-id="id-6" class="port3">
				<a href="#" id="mobileapps2"><img src="images/port6.jpg" alt=""></a>
			  </li> -->
			</ul>
		  </div> 
		</div>
		</section>

		<div id="location">
			<div class="row prodmap">
				<?php
					echo '<iframe src="'. $direccionMapa . '" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>';
				?>
				
			</div>
		</div>

		<section id="contact">
			<div class="container"> 
				<div class="row">
					<div class="col-md-12">
						<div class="col-lg-12">
							<div class="text-center color-elements">
							<h2><?php  $listaTagsDestinos=new ControlesTags();
				 			echo $reservas=$listaTagsDestinos->ListarTagsLavelStr($idIdiomaTags,'H2LavelDestinos','txt_contacto'); 
							?></h2>
							</div>
						</div>
						<div class="col-lg-6 col-md-8">
							<form class="inline" id="contactForm" method="post" >
								<div class="row">
									<div class="col-sm-6 height-contact-element">
										<div class="form-group">
											<input type="text" name="first_name" class="form-control custom-labels" id="name" placeholder="<?php  $listaTagsDestinos=new ControlesTags();
				 			echo $reservas=$listaTagsDestinos->ListarTagsLavelStr($idIdiomaTags,'form_lvl','form_texto'); 
							?>" required data-validation-required-message="Please write your name!"/>
											<p class="help-block text-danger"></p>
										</div>
									</div>
									<div class="col-sm-6 height-contact-element">
										<div class="form-group">
											<input type="email" name="email" class="form-control custom-labels" id="email" placeholder="<?php  $listaTagsDestinos=new ControlesTags();
				 			echo $reservas=$listaTagsDestinos->ListarTagsLavelStr($idIdiomaTags,'form_lvl','form_email'); 
							?>" required data-validation-required-message="Please write your email!"/>
											<p class="help-block text-danger"></p>
										</div>
									</div>
									<div class="col-sm-12 height-contact-element">
										<div class="form-group">
											<input type="text" name="message" class="form-control custom-labels" id="message" placeholder="<?php  $listaTagsDestinos=new ControlesTags();
				 			echo $reservas=$listaTagsDestinos->ListarTagsLavelStr($idIdiomaTags,'form_lvl','form_pensando'); 
							?>" required data-validation-required-message="Please write a message!"/>
										</div>
									</div>
									<div class="col-sm-3 col-xs-6 height-contact-element">
										<div class="form-group">
											<input type="submit" class="btn btn-md btn-custom btn-noborder-radius" value=" 
											<?php  $listaTagsDestinos=new ControlesTags();
				 			echo $reservas=$listaTagsDestinos->ListarTagsLavelStr($idIdiomaTags,'form_lvl','form_envio'); 
							?>


											"/>
										</div>
									</div>
									<div class="col-sm-3 col-xs-6 height-contact-element">
										<div class="form-group">
											<button type="button" class="btn btn-md btn-noborder-radius btn-custom" name="reset"><?php  $listaTagsDestinos=new ControlesTags();
				 			echo $reservas=$listaTagsDestinos->ListarTagsLavelStr($idIdiomaTags,'form_lvl','form_resetear'); 
							?>
											</button>
										</div>
									</div>
									<div class="col-sm-3 col-xs-6 height-contact-element">
										<div class="form-group">
											<div id="response_holder"></div>
										</div>
									</div>
									<div class="col-sm-12 contact-msg">
									<div id="success"></div>
									</div>
								</div>
							</form>
						</div>
						<div class="col-lg-5 col-md-3 col-lg-offset-1 col-md-offset-1">
							<div class="row">
								<div class="col-md-12 height-contact-element">
									<div class="form-group">
										<i class="fa fa-2x fa-map-marker"></i>
										<span class="text"><?php  $listaTagsDestinos=new ControlesTags();
				 			echo $reservas=$listaTagsDestinos->ListarTagsLavelStr($idIdiomaTags,'form_lvl','form_ubicacion'); 
							?></span>
									</div>
								</div>
								<div class="col-md-12 height-contact-element">
									<div class="form-group">
										<i class="fa fa-2x fa-phone"></i>
										<span class="text">0051 768622115</span>
									 </div>
								 </div>
								<div class="col-md-12 height-contact-element">    
									<div class="form-group">
										<i class="fa fa-2x fa-envelope"></i>
										<span class="text">informes@incaperuworld.com</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="follow-us">
			<div class="container"> 
				<div class="text-center height-contact-element">
					<h2><?php  $listaTagsDestinos=new ControlesTags();
				 			echo $reservas=$listaTagsDestinos->ListarTagsLavelStr($idIdiomaTags,'H2LavelDestinos','txt_contacto'); 
							?></h2>
				</div>
				<img class="img-responsive displayed" src="images/short.png" alt="short" />
				<div class="text-center height-contact-element">
					<ul class="list-unstyled list-inline list-social-icons">
						<li class="active"><a href="#"><i class="fa fa-facebook social-icons"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter social-icons"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus social-icons"></i></a></li>
						<li><a href="#"><i class="fa fa-linkedin social-icons"></i></a></li>
					</ul>
				</div>
			</div>
		</section>

		<footer id="footer">
			<div class="container">
				<div class="row myfooter">
					<div class="col-sm-6"><div class="pull-left">
					<!-- <a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a> -->
					© Derechos reservados 
					</div></div>
					<div class="col-sm-6">
						<div class="pull-right">Designed by ITECSA</div>
					</div>
				</div>
			</div>
		</footer>

		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		<!-- Bootstrap Core JavaScript -->
		<!-- <script src="js/bootstrap.min.js"></script> -->
		<script type="text/javascript" src="js/bootstrap.min.js"></script>

		<!-- Google Map -->
		<script src="//maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=true&amp;libraries=places"></script>

		<!-- Portfolio -->
		<script src="js/jquery.quicksand.js"></script>	    
	

		<!--Jquery Smooth Scrolling-->
		<script>

			jQuery(function(){
		        jQuery(window).scroll(function(){
		            if(jQuery(this).scrollTop() > 200) {
		                jQuery('#logo-img img')
		                    .css({'width':'50px','height':'50px'})
		                    .attr('src','adminWeb/images/logo.png');
		            }
		            if(jQuery(this).scrollTop() < 200) {
		                jQuery('#logo-img img')
		                    .css({'width':'150px',
		                        'height':'150px',
		                        '-webkit-transition':'all 0.5s ease',
		                        '-moz-transition':'all 0.5s ease',
		                        '-ms-transition':'all 0.5s ease',
		                        '-o-transition':'all 0.5s ease',
		                        'transition':'all 0.5s ease'
		                        })    
		                    .attr('src','adminWeb/images/logo.png');
		            }

		            if(jQuery(this).scrollTop() > 200) {
		                jQuery('#navegadorId')
		                	.css({'background': '#EC7F5D'});
		            }
		             if(jQuery(this).scrollTop() < 200) {
		                jQuery('#navegadorId')
		                	.css({'background': 'transparent'});
		            }
		        });
		    });

			$(document).ready(function(){
				$('#tages a').click(function (e) {
				  e.preventDefault()
				  $(this).tab('show')
				});

				// $('#datetimepicker1').datepicker();

				$('.custom-menu a[href^="#"], .intro-scroller .inner-link').on('click',function (e) {
					e.preventDefault();

					var target = this.hash;
					var $target = $(target);

					$('html, body').stop().animate({
						'scrollTop': $target.offset().top
					}, 900, 'swing', function () {
						window.location.hash = target;
					});
				});

				$('a.page-scroll').bind('click', function(event) {
					var $anchor = $(this);
					$('html, body').stop().animate({
						scrollTop: $($anchor.attr('href')).offset().top
					}, 1500, 'easeInOutExpo');
					event.preventDefault();
				});

			   $(".nav a").on("click", function(){
					 $(".nav").find(".active").removeClass("active");
					$(this).parent().addClass("active");
				});

				$('body').append('<div id="toTop" class="btn btn-primary color1"><span class="glyphicon glyphicon-chevron-up"></span></div>');
					$(window).scroll(function () {
						if ($(this).scrollTop() != 0) {
							$('#toTop').fadeIn();
						} else {
							$('#toTop').fadeOut();
						}
					}); 
				$('#toTop').click(function(){
					$("html, body").animate({ scrollTop: 0 }, 700);
					return false;
				});

			});

		</script>

		<script>
		function gallery(){};

		var $itemsHolder = $('ul.port2');
		var $itemsClone = $itemsHolder.clone(); 
		var $filterClass = "";
		$('ul.filter li').click(function(e) {
		e.preventDefault();
		$filterClass = $(this).attr('data-value');
			if($filterClass == 'all'){ var $filters = $itemsClone.find('li'); }
			else { var $filters = $itemsClone.find('li[data-type='+ $filterClass +']'); }
			$itemsHolder.quicksand(
			  $filters,
			  { duration: 1000 },
			  gallery
			  );
		});

		$(document).ready(gallery);
		</script>


		<script type="text/javascript">
	$(document).ready(function(){
		// inicializemap()
		// $('#datetimepicker1').datepicker();

		$('#accordion').on('submit', function(e){
			e.preventDefault();
			e.stopPropagation();

			// get values from FORM
			var name = $("#name").val();
			var email = $("#email").val();
			var message = $("#message").val();
			var goodToGo = false;
			var messgaeError = 'Request can not be send';
			var pattern = new RegExp(/^(('[\w-\s]+')|([\w-]+(?:\.[\w-]+)*)|('[\w-\s]+')([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);


			 if (name && name.length > 0 && $.trim(name) !='' && message && message.length > 0 && $.trim(message) !='' && email && email.length > 0 && $.trim(email) !='') {
				  if (pattern.test(email)) {
					 goodToGo = true;
				  } else {
					 messgaeError = 'Please check your email address';
					 goodToGo = false; 
				  }
			 } else {
			   messgaeError = 'You must fill all the form fields to proceed!';
			   goodToGo = false;
			 }

			 
			if (goodToGo) {
			   $.ajax({
				 data: $('#contactForm').serialize(),
				 beforeSend: function() {
				   $('#success').html('<div class="col-md-12 text-center"><img src="images/spinner1.gif" alt="spinner" /></div>');
				 },
				 success:function(response){
				   if (response==1) {
					 $('#success').html('<div class="col-md-12 text-center">Your email was sent successfully</div>');
					 window.location.reload();
				   } else {
					 $('#success').html('<div class="col-md-12 text-center">E-mail was not sent. Please try again!</div>');
				   }
				 },
				 error:function(e){
				   $('#success').html('<div class="col-md-12 text-center">We could not fetch the data from the server. Please try again!</div>');
				 },
				 complete: function(done){
				   console.log('Finished');
				 },
				 type: 'POST',
				 url: 'js/send_email.php', 
			   });
			   return true;
			} else {
			   $('#success').html('<div class="col-md-12 text-center">'+messgaeError+'</div>');
			   return false;
			}
			return false;
		});
	});

	var map = null;
	 var latitude;
	 var longitude;
	 function inicializemap(){
	   latitude = 41.3349509; 
	   longitude = 19.8217028;

	  var egglabs = new google.maps.LatLng(latitude, longitude);
	  var egglabs1 = new google.maps.LatLng(43.0630171, 89.2296082);
	  var egglabs2 = new google.maps.LatLng(13.0630171, 80.2296082 );


	  var image = new google.maps.MarkerImage('images/marker.png', new google.maps.Size(84,56), new google.maps.Point(0,0), new google.maps.Point(42,56));
	  var mapCoordinates = new google.maps.LatLng(latitude, longitude);
	  var mapOptions = {
	   backgroundColor: '#ffffff',
	   zoom: 10,
	   disableDefaultUI: true,
	   center: mapCoordinates,
	   mapTypeId: google.maps.MapTypeId.ROADMAP,
	   scrollwheel: true,
	   draggable: true, 
	   zoomControl: false,
	   disableDoubleClickZoom: true,
	   mapTypeControl: false,
	   styles: [
					{
						"featureType": "all",
						"elementType": "labels.text.fill",
						"stylers": [
							{
								"color": "#1f242f"
							}
						]
					},
					{
						"featureType": "all",
						"elementType": "labels.icon",
						"stylers": [
							{
								"hue": "#ff9d00"
							}
						]
					},
					{
						"featureType": "landscape.man_made",
						"elementType": "geometry.fill",
						"stylers": [
							{
								"color": "#fef8ef"
							}
						]
					},
					{
						"featureType": "poi.medical",
						"elementType": "geometry.fill",
						"stylers": [
							{
								"hue": "#ff0000"
							}
						]
					},
					{
						"featureType": "poi.park",
						"elementType": "geometry.fill",
						"stylers": [
							{
								"color": "#c9d142"
							},
							{
								"lightness": "0"
							},
							{
								"visibility": "on"
							},
							{
								"weight": "1"
							},
							{
								"gamma": "1.98"
							}
						]
					},
					{
						"featureType": "road",
						"elementType": "geometry",
						"stylers": [
							{
								"weight": "1.00"
							}
						]
					},
					{
						"featureType": "road",
						"elementType": "geometry.fill",
						"stylers": [
							{
								"color": "#d7b19c"
							},
							{
								"weight": "1"
							}
						]
					},
					{
						"featureType": "road.highway",
						"elementType": "geometry",
						"stylers": [
							{
								"visibility": "on"
							}
						]
					},
					{
						"featureType": "road.highway",
						"elementType": "geometry.fill",
						"stylers": [
							{
								"weight": "4.03"
							}
						]
					},
					{
						"featureType": "road.highway",
						"elementType": "geometry.stroke",
						"stylers": [
							{
								"visibility": "off"
							},
							{
								"color": "#ffed00"
							}
						]
					},
					{
						"featureType": "road.highway.controlled_access",
						"elementType": "geometry.fill",
						"stylers": [
							{
								"visibility": "on"
							}
						]
					},
					{
						"featureType": "road.arterial",
						"elementType": "geometry",
						"stylers": [
							{
								"visibility": "on"
							}
						]
					},
					{
						"featureType": "road.local",
						"elementType": "geometry",
						"stylers": [
							{
								"visibility": "on"
							}
						]
					},
					{
						"featureType": "transit.line",
						"elementType": "geometry.fill",
						"stylers": [
							{
								"color": "#cbcbcb"
							}
						]
					},
					{
						"featureType": "water",
						"elementType": "geometry.fill",
						"stylers": [
							{
								"color": "#0b727f"
							}
						]
					}
				]
					  };

	  map = new google.maps.Map(document.getElementById('map-canvas-holder'),mapOptions);
	  marker = new google.maps.Marker({position: egglabs, raiseOnDrag: false, icon: image, map: map, draggable: false,  title: 'ATIS1'}); 
	  marker = new google.maps.Marker({position: egglabs1, raiseOnDrag: false, icon: image, map: map, draggable: false,  title: 'ATIS2'}); 
	  marker = new google.maps.Marker({position: egglabs2, raiseOnDrag: false, icon: image, map: map, draggable: false,  title: 'ATIS3'}); 
	  google.maps.event.addListener(map, 'zoom_changed', function() {
	   var center = map.getCenter();
	   google.maps.event.trigger(map, 'resize');
	   map.setCenter(center);
	  });
	 }

</script>

<script type="text/javascript" src="js/funcionesViajes.js"></script> 

</body>
</html>




