<?php
//llamar clases del model
require_once '../agencia/adminWeb/backend/models/Destino.php';
require_once '../agencia/adminWeb/backend/models/Testimonio.php';
require_once '../agencia/adminWeb/backend/models/ControlesTag.php';
$ruta = fopen("../agencia/adminWeb/config/ruta.txt","r");
$linea = fgets($ruta);
fclose($ruta);
include($_SERVER['DOCUMENT_ROOT'].$linea);

// $idIdiomaTags="3";
//--------------------

if (isset($_SESSION["idIdioma"])) {
$idIdiomaTags=$_SESSION["idIdioma"];
}
else{
	$idIdiomaTags="3";
}
?>
<!DOCTYPE html>
<html lang="es">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

        <title>PATROS - HTML5 FREE TEMPLATE</title>

        <!-- Bootstrap Core CSS -->

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- Custom CSS -->
		<link rel="stylesheet" href="css/patros.css" >

		<!-- CSS Propiestarios -->
		<link rel="stylesheet" type="text/css" href="css/cssPropios.css">
        
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
						<h6 id="correoFijo" ><span class="glyphicon glyphicon-envelope"> </span> qasdfasd@aaaaaatours.com</h6>
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
		<nav class="navbar navbar-inverse navbar-fixed-top" style="z-index:1; margin-bottom: 0px; padding-bottom: 0px;">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="company logo" /></a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<div class="miMenu" style="float: right;">
						<nav>
							<ul id="listaMenu" style="margin-bottom: 0px;">
							</ul>
						</nav>
						<!-- <li class="active"><a href="#home">Home</a></li>
						<li><a href="#about">About</a></li>
						<li class="dropdown">
        					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1
        					<span class="caret"></span></a>
        						<ul class="dropdown-menu">
         							 <li><a href="#">Page 1-1</a></li>
         							 <li><a href="#">Page 1-2</a></li>
         							 <li><a href="#">Page 1-3</a></li>
       							 </ul>
      					</li>
						<li><a href="#meet-team">Team</a></li>
						<li><a href="#portfolio1">Portofolio</a></li>
						<li><a href="#contact">Contact</a></li>
						<li><a href="blog.html">Blog</a></li>
						<li><a href="single-post.html">Single</a></li> -->
						<!-- <li>
							<a href="#">data</a>
							<ul>
								<li>
									<a href="">data2 </a>
								</li>
							</ul>
						</li> -->
					</ul>
				</div>
			</div>
		</nav>

		<!-- Page Content -->
		<section class="container-fluid blog" >

			<div id="prueba">
				
			</div>
			<div class="row">
		        <!-- Blog Column -->
		        <div class="col-md-8" style=" padding-left: 90px;">
		            <h1 class="page-header sidebar-title">
		                <?php  $listaTagsDestinos=new ControlesTags();
				 			echo $reservas=$listaTagsDestinos->ListarTagsLavelStr($idIdiomaTags,'H2Lavel','h2_destinos'); 
							?>	
		            </h1>
		            <div id="listaDestinos">
		            	
		            </div>
		            <!-- First Blog Post -->
		            
		        </div>
		            <!-- Blog Sidebar Column -->
		            <aside class="col-md-4 sidebar-padding">
		                
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
									
									<input id="" name="" type="text" placeholder="Nombre" class="form-control">
								</div>
								<div class="form-group" >
									<label class="sr-only" for=""><?php  $listaTagsDestinos=new ControlesTags();
				 			echo $reservas=$listaTagsDestinos->ListarTagsLavelStr($idIdiomaTags,'H2LavelDestinos','txt_correo'); 
							?></label>    

									<input id="" name="" type="email" placeholder="Email" class="form-control">
								</div>
								<hr>
								<div class="form-group">
									<label class="sr-only" for=""><?php  $listaTagsDestinos=new ControlesTags();
				 			echo $reservas=$listaTagsDestinos->ListarTagsLavelStr($idIdiomaTags,'H2LavelDestinos','txt_pais'); 
							?></label>  
									<input id="" name="" type="text" placeholder="Pais" class="form-control">
								</div>
		   					
		    				
		    				    <div class="form-group">
									<label class="sr-only" for=""><?php  $listaTagsDestinos=new ControlesTags();
				 			echo $reservas=$listaTagsDestinos->ListarTagsLavelStr($idIdiomaTags,'H2LavelDestinos','txt_telefono'); 
							?></label>  
									<input id="" name="" type="text" placeholder="Telefono" class="form-control input-md">
								</div>
								<br>
								<br>
								
								
								<div class="form-group">

									<label>Retorno</label>
									<br>
					                <div class='input-group date' id='datetimepicker1' style="width: 340px; z-index:0;">
					                    <input type='text' class="form-control" />
					                    <span class="input-group-addon">
					                        <span class="glyphicon glyphicon-calendar"></span>
					                    </span>
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
		                    <h4 class="sidebar-title"><i class="fa fa-map-marker"> </i> <?php  $listaTagsDestinos=new ControlesTags();
				 			echo $reservas=$listaTagsDestinos->ListarTagsLavelStr($idIdiomaTags,'H2Lavel','h2_destinos'); 
							?></h4>
		                    <hr style="margin-bottom: 5px;">

		                    <div id=div_destinos>
								<!-- lista destinos -->
								
								<?php
									$destinos = new Destino();

									$DestinoListaTotal=$destinos->ListarDestinoArrayTodo();
									for ($i=0; $i <count($DestinoListaTotal) ; $i++) { 
										echo " <ul><i class='fa fa-thumb-tack' aria-hidden='true'> </i>  ".$DestinoListaTotal[$i]['nombre']."
													<li>
													".$DestinoListaTotal[$i]['etiqueta']."
													</li>
											</ul>";
									}
								?>

							</div>
		                </div>

		                <div class="blog-sidebar">
		                    <h4 class="sidebar-title"><i class="fa fa-comments"></i> <?php  $listaTagsDestinos=new ControlesTags();
				 			echo $reservas=$listaTagsDestinos->ListarTagsLavelStr($idIdiomaTags,'H2LavelDestinos','txt_testimonios'); 
							?></h4>
		                    <hr style="margin-bottom: 5px;">
							<div id="div_testimonios">
								
								<div style="width: 380px; height: 400px; overflow-y: scroll;">
									<ul>
								<?php 
								$dataTestimonio=new Testimonio();
								$testimonioLista=$dataTestimonio->ListarArray();
								for ($i=0; $i <count($testimonioLista) ; $i++) { 
									echo "<li><img  class='img-responsive img-thumbnail' src='adminWeb/backend/images/testimonio/".$testimonioLista[$i]['foto']." '></li>";
									echo "<li>".$testimonioLista[$i]['nombre']."</li>";
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
		    </section>

        
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
											<input type="submit" class="btn btn-md btn-custom btn-noborder-radius" value="<?php  $listaTagsDestinos=new ControlesTags();
				 			echo $reservas=$listaTagsDestinos->ListarTagsLavelStr($idIdiomaTags,'form_lvl','form_envio'); 
							?>"/>
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
										<span class="text">info@company.com</span>
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
				 			echo $reservas=$listaTagsDestinos->ListarTagsLavelStr($idIdiomaTags,'form_lvl','form_siguenos'); 
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
					© Copyright Company 2016 | <a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a>
					</div></div>
					<div class="col-sm-6">
						<div class="pull-right">Designed by <a href="http://www.atis.al">ATIS</a></div>
					</div>
				</div>
			</div>
		</footer>


        <!-- jQuery -->
        <script src="js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>


        <!--Jquery Smooth Scrolling-->
        <script>
            $(document).ready(function(){
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
		<!-- <script type="text/javascript" src="js/funcionesWeb.js"></script>  -->
		<script type="text/javascript" src="js/funcionesDestino.js"></script>
    </body>
</html>