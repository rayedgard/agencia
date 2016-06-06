<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Easy Admin Panel an Admin Panel Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Easy Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> 
	addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
	 function hideURLbar(){
	  window.scrollTo(0,1); 
	} 
</script>
 <!-- Bootstrap Core CSS -->
<link href="../css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="../css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<!-- lined-icons -->
<link rel="stylesheet" href="../css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<!-- chart -->
<script src="../js/Chart.js"></script>
<!-- //chart -->
<!--animate-->
<link href="../css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="../js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!----webfonts--->
<link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<!---//webfonts---> 
 <!-- Meters graphs -->
<script src="../js/jquery-1.10.2.min.js"></script>
<!-- Placed js at the end of the document so the pages load faster -->

</head> 
   
 <body class="sticky-header left-side-collapsed"  onload="initMap()">
    <section>




<?php
include("../config/funciones.php");


$p = desencripta($_GET['p'],"rayedgard");
$action=''; 
if(isset($_GET['action']))
	$action=$_GET['action'];

  if($p==7)
  {$titulo="Gesti&oacute;n y Administraci&oacute;n de Alumnos";}
  if($p==10)
  {$titulo="Gesti&oacute;n de Pre-Matriculas";}
  if($p==11)
  {$titulo="Gesti&oacute;n de Pago";}
  if($p==12)
  {$titulo="Gesti&oacute;n de Matricula";}
  if($p==19)
  {$titulo="Gesti&oacute;n de Reportes Alumnos";}
  if($p==20)
  {$titulo="Gesti&oacute;n de Tutoriales";}
?>


    <!-- left side start-->
		<div class="left-side sticky-left-side">

			<!--logo and iconic logo start-->
			<div class="logo">
				<h1><a href="index.php">ICPNA <span>Cusco</span></a></h1>
			</div>



			<div class="logo-icon text-center">
				<a href="index.php"><i class="lnr lnr-home"></i> </a>
			</div>



			<!--logo and iconic logo end-->
			<div class="left-side-inner">

				<!--sidebar nav start-->
					<ul class="nav nav-pills nav-stacked custom-nav">

						<li class="menu-list"> 
							<a href="#">
								<i class="fa fa-magic"></i>
								<span>Ges. Acad&eacute;mica</span>
							</a>
								<ul class="sub-menu-list">
									<li><a href="index.php?p=<?php echo encripta('7','rayedgard'); ?>"><i class="fa fa-user" >&nbsp;</i>Datos Personales</a> </li>
								</ul>
						</li>

						<li class="menu-list">
							<a href="#">
								<i class="fa fa-list-alt"></i>
								<span>Matr&iacute;culas</span>
							</a>
							<ul class="sub-menu-list">

								<li><a href="index.php?p=<?php echo encripta('10','rayedgard'); ?>"><i class="fa fa-edit" >&nbsp;</i>Pre Matr&iacute;cula</a> </li>
								<li><a href="index.php?p=<?php echo encripta('11','rayedgard'); ?>"><i class="fa fa-credit-card" >&nbsp;</i>Pasarela de Pagos</a></li>
								<li><a href="index.php?p=<?php echo encripta('12','rayedgard'); ?>"><i class="fa fa-edit" >&nbsp;</i>Matr&iacute;cula</a></li>
							</ul>
						</li>

						<li class="menu-list">
							<a href="#">
								<i class="fa fa-file-text"></i>
								<span>Reportes</span>
							</a>
								
						</li>


						<li class="menu-list"><a href="#"><i class="fa fa-puzzle-piece"></i> <span>Tutoriales</span></a>
							<ul class="sub-menu-list">
								<li><a href="index.php?p=<?php echo encripta('20','rayedgard'); ?>"><i class="fa fa-film" >&nbsp;</i>Videos</a> </li>						
								<li><a href="index.php?p=<?php echo encripta('19','rayedgard'); ?>"><i class="fa fa-list" >&nbsp;</i>Documentos</a> </li>			
							</ul>
						</li>   
				
					</ul>
				<!--sidebar nav end-->
			</div>
		</div>
		<!-- left side end-->

    
		<!-- main content start-->
		<div class="main-content">
			<!-- header-starts -->
			<div class="header-section">
			 
			<!--toggle button start-->
			<a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>
			<!--toggle button end-->


			<!--notification menu start -->
			<div class="menu-right">
				<div class="user-panel-top">  
					
					<div class="profile_details">		
						<ul>
							<li class="dropdown profile_details_drop">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<div class="profile_img">	
										<span style="background:url(images/1.jpg) no-repeat center"> </span> 
										 <div class="user-name">
											<p>Lionel<span>Estudiante</span></p>
										 </div>
										 <i class="lnr lnr-chevron-down"></i>
										 <i class="lnr lnr-chevron-up"></i>
										<div class="clearfix"></div>	
									</div>	
								</a>
								<ul class="dropdown-menu drp-mnu">
									<li> <a href="#"><i class="fa fa-user"></i>Mis Datos Personales</a> </li> 

									<li> <a href="#"><i class="fa fa-cog"></i>Cambia mi Contraseña</a> </li> 
									
									<li> <a href="sign-up.html"><i class="fa fa-sign-out"></i> Logout</a> </li>
								</ul>
							</li>
							<div class="clearfix"> </div>
						</ul>
					</div>	
					<div class="clearfix"></div>
				</div>
			 </div>
			<!--notification menu end -->
			</div>
		<!-- //header-ends -->


  <?php  // codigo para insertar las paginas 
                  if ($p) {
                    switch ($p) {
                      
                   
                       case 7:
                       		include("views/alumno.php");                      
                      break;

                     

                       case 10:
                       		include("views/prematriculas.php");                      
                      break;

                       case 11:
                       		include("views/pago.php");                      
                      break;

                       case 12:
                       		include("views/matricula.php");                      
                      break;
                    
                       case 19:
                       		include("views/reportealumno.php");                      
                      break;

                       case 20:
                       		include("views/tutoriales.php");                      
                      break;

                    } 
                  }
                  else
                  {
                    include("views/home.php");
                  }
                  //fin codigo para isertar paginas
                ?>








<!--###########################################################################-->

			 <!--body wrapper end-->
		</div>
        <!--footer section start-->
			<footer>
			   <p>&copy 2015 Easy Admin Panel. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">ITDECSA.</a></p>
			</footer>
        <!--footer section end-->

      <!-- main content end-->
   </section>
  
<script src="../js/jquery.nicescroll.js"></script>
<script src="../js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="../js/bootstrap.min.js"></script>
</body>
</html>