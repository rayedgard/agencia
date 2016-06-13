<?php 

include('../models/Perfil.php');

//---------------------/////////
//-----para la conexdion de la base de datos--
$ruta = fopen("../../config/ruta.txt","r");
$linea = fgets($ruta);
fclose($ruta);

include($_SERVER['DOCUMENT_ROOT'].$linea);
//---------------------///////////
// include("conexion2.php");
// fclose("/agencia/adminWeb/config/conexion.php")

/**
* 
*/
class listaPerfil
{
	
	public function mostrarPerfil(){
		// print_r("llega normal");

		$perfil = new Perfil();

		$idIdioma= $_POST["idIdioma"];

		try
        {
            $listaModelo = array();
             
            $listaModelo = $perfil->ListarPerfil($idIdioma);
            // print_r($listaPerfil);

            // <div class="col-xs-12 col-sm-6 col-md-3"> <div class="team-member"> <div class="team-img"> <img class="img-responsive" src="../adminWeb/backend/images/perfiles/'.$galeriaModelo[$i]["foto"].'" alt=""> </div> <div class="team-info"> <h3>'.$galeriaModelo[$i]["nombre"].'</h3> <span>'.$galeriaModelo[$i]["cargo"].'</span> </div>'.$galeriaModelo[$i]["detalle"].'<ul class="social-icons"> <li><a href="#"><i class="fa fa-facebook"></i></a></li> <li><a href="#"><i class="fa fa-twitter"></i></a></li> <li><a href="#"><i class="fa fa-google-plus"></i></a></li> <li><a href="#"><i class="fa fa-linkedin"></i></a></li> </ul> </div> </div>
      //       $imagen="";
            $listaNombres="";
            for ($i=0; $i < count($listaModelo) ; $i++) { 

            		$descrip = strip_tags($listaModelo[$i]["detalle"]);
		            $descrip = substr($descrip, 0, 151);
					 
					$imagen = '<div class="col-xs-12 col-sm-6 col-md-3"> <div class="team-member"> <div class="team-img"> <img class="img-responsive" src="adminWeb/backend/images/perfil/'.$listaModelo[$i]["foto"].'" alt=""> </div>';
					$nombre = '<div class="team-info"> <h3>'.$listaModelo[$i]["nombre"].'</h3>';
                    $cargo = '<span>'.$listaModelo[$i]["cargo"].'</span>';
                    $detalle = '</div>'.$descrip.'... </div> </div>';
            		$lista = $imagen.$nombre.$cargo.$detalle;
					 
            		$listaNombres = $listaNombres.$lista;						 
            }
      //       echo($galeria);
            print_r($listaNombres);
        } 
        catch (Exception $ex) 
        {
            die($ex->getMessage());

        }


	}
}

$perfil = new listaPerfil();
$perfil->mostrarPerfil();

 ?>