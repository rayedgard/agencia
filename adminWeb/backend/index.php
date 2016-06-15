<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Sistema de administracion de datos </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Matriculas ICPNA" />
<script type="application/x-javascript"> 
	addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
	 function hideURLbar(){
	  window.scrollTo(0,1); 
	} 
</script>


<script src="js/modales.js"></script>
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






<!--/////////////// CODIGO PRA EL POPUP INICIAL ////////////////-->
	<link rel="stylesheet" type="text/css" href="../css/popup.css">
	<script src="../js/popup.min.js"></script>
	<script src="../js/jquery.colorbox.js"></script>
<!--/////////////// FIN POPUP INICIAL ////////////////-->
















<!----extensiones para el editor--->

<!-- place in header of your html document -->
<!-- TinyMCE -->
<script type="text/javascript" src="../tiny_mce/tiny_mce.js"></script>
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












</head> 
   
 <body class="sticky-header left-side-collapsed"  onload="initMap()">

    <section>







<?php


$ruta = fopen("../config/ruta.txt", "r");
$linea = fgets($ruta);
fclose($ruta);

require_once $_SERVER['DOCUMENT_ROOT'].$linea;



require_once'../config/funciones.php';

//recupera variableS para  uso posterior

$action='';
//acceso a las clases

// Logica
//$menu = new Menu();





if(isset($_SESSION['usuario']))
{
		//obtenemos los items del menu permitidos por el rol que presenta
	$p = desencripta($_GET['p'],"rayedgard");
}
else
{
 echo "<meta http-equiv ='refresh' content='0;url=http://".$_SERVER["SERVER_NAME"]."/incaperuworld/adminWeb/ '>";
}





if(isset($_GET['action']))
	$action=$_GET['action'];



?>


    <!-- left side start-->
		<div class="left-side sticky-left-side">

			<!--logo and iconic logo start-->
			<div class="logo">
				<h1><a href="index.php">ITDECSA<span>Admin</span></a></h1>
			</div>



			<div class="logo-icon text-center">
				<a href="index.php"><i class="lnr lnr-home"></i> </a>
			</div>



			<!--logo and iconic logo end-->
			<div class="left-side-inner">

				<!--sidebar nav start-->
					<ul class="nav nav-pills nav-stacked custom-nav">


        				<li class="menu-list"><a href="#"><i class="lnr lnr-apartment"></i><span>Configuraci&oacute;n</span></a>

        					<ul class="sub-menu-list">
							
														
								<li><a href="index.php?p=<?php echo urlencode(encripta('idioma.php','rayedgard')); ?>"><i class="lnr lnr-chart-bars">&nbsp;</i>Idioma</a></li>

						
								<li><a href="#"  name="?" class="modala"><i class="lnr lnr-camera-video">&nbsp;</i>Banner General</a></li>

																
								<li><a href="#"  name="?" class="modalb"><i class="lnr lnr-camera">&nbsp;</i>Galeria General</a></li>

								<!--/////////////// CODIGO QUE LLAMA EL POPUP INICIAL ////////////////-->
									  <script>
								    $('.modala').click(function(){

								      function openColorBox(){
								        $.colorbox({iframe:true, overlayClose: false, fixed: true ,width:"60%", height:"80%", href:"views/bannergeneral.php"});
								      }
								      setTimeout(openColorBox, 1000);
								      });
								    </script>
								<!--/////////////// FIN EL POPUP INICIAL ////////////////-->


								<!--/////////////// CODIGO QUE LLAMA EL POPUP INICIAL ////////////////-->
									  <script>
								    $('.modalb').click(function(){

								      function openColorBox(){
								        $.colorbox({iframe:true, overlayClose: false, fixed: true ,width:"60%", height:"80%", href:"views/galeriageneral.php"});
								      }
								      setTimeout(openColorBox, 1000);
								      });
								    </script>
								<!--/////////////// FIN EL POPUP INICIAL ////////////////-->









							</ul>

        				</li>


        				<li class="menu-list"><a href="#"><i class="lnr lnr-car"></i><span>Viajes</span></a>

        					<ul class="sub-menu-list">
							
								<li><a href="index.php?p=<?php echo urlencode(encripta('categoria.php','rayedgard')); ?>"><i class="lnr lnr-bus">&nbsp;</i>Categorias</a></li>

								<li><a href="index.php?p=<?php echo urlencode(encripta('subcategoria.php','rayedgard')); ?>"><i class="lnr lnr-bicycle">&nbsp;</i>Paquetes</a></li>
									
								<li><a href="index.php?p=<?php echo urlencode(encripta('destino.php','rayedgard')); ?>"><i class="lnr lnr-train">&nbsp;</i>Destinos</a></li>
									
							</ul>

        				</li>


        				<li class="menu-list"><a href="#"><i class="lnr lnr-users"></i><span>Perfiles</span></a>

        					<ul class="sub-menu-list">
							
								<li><a href="index.php?p=<?php echo urlencode(encripta('usuario.php','rayedgard')); ?>"><i class="lnr lnr-users">&nbsp;</i>Usuarios</a></li>

								<li><a href="index.php?p=<?php echo urlencode(encripta('perfil.php','rayedgard')); ?>"><i class="lnr lnr-user">&nbsp;</i>Perfiles</a></li>
									
								<li><a href="index.php?p=<?php echo urlencode(encripta('gia.php','rayedgard')); ?>"><i class="lnr lnr-shirt">&nbsp;</i>Guias</a></li>
									
							</ul>

        				</li>

        				<li class="menu-list"><a href="#"><i class="lnr lnr-earth"></i><span>Actividades</span></a>

        					<ul class="sub-menu-list">

        						<li><a href="index.php?p=<?php echo urlencode(encripta('testimonio.php','rayedgard')); ?>"><i class="lnr lnr-smartphone">&nbsp;</i>Testimonios</a></li>
							
								<li><a href="index.php?p=<?php echo urlencode(encripta('evento.php','rayedgard')); ?>"><i class="lnr lnr-volume-high">&nbsp;</i>Eventos</a></li>

								<li><a href="index.php?p=<?php echo urlencode(encripta('noticia.php','rayedgard')); ?>"><i class="lnr lnr-question-circle">&nbsp;</i>Noticias</a></li>


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
										 	


										 
											

											<p><?php  print_r($_SESSION['usuario']);?> <span>Administrador</span></p>
										 </div>
										 <i class="lnr lnr-chevron-down"></i>
										 <i class="lnr lnr-chevron-up"></i>
										<div class="clearfix"></div>	
									</div>	
								</a>

								<ul class="dropdown-menu drp-mnu">
								

									<li> <a href="#" class="pass"><i class="fa fa-cog"></i>Cambia mi Contraseña</a> </li> 
									
									<li> <a href="../config/cerrar_sesion.php"><i class="fa fa-sign-out"></i> Cerrar Sesi&oacute;n</a> </li>
								</ul>



										<!--/////////////// CODIGO QUE LLAMA EL POPUP INICIAL ////////////////-->
											  <script>
										    $('.pass').click(function(){

										      function openColorBox(){
										        $.colorbox({iframe:true, overlayClose: false, fixed: true ,width:"35%", height:"61%", href:"views/cambiaContrasenia.php"});
										      }
										      setTimeout(openColorBox, 1000);
										      });
										    </script>
										<!--/////////////// FIN EL POPUP INICIAL ////////////////-->



							</li>

						</ul>



					</div>	
				
				</div>
			 </div>
			<!--notification menu end -->
			</div>
		<!-- //header-ends -->








  				<?php  // codigo para insertar las paginas 




  				  if ($p)
                  {
                
  

                      include("views/".$p); 
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
			   <p>&copy 2016. All Rights Reserved ITDECSA| Design by <a href="http://www.itdecsa.com/" target="_blank">itdecsa</a></p>
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