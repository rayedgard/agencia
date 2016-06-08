<?php 

include('../models/Categoria.php');
include('../models/ControlesTag.php');

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
class listaCategoria
{
	
	public function mostrarCategoria(){
		// print_r("llega normal");

		$categoria = new Categoria();

        $controles = new ControlesTags();

		$idIdioma= $_POST["idIdioma"];

		try
        {
            $listaModelo = array();
             
            $listaModelo = $categoria->ListarCategoria($idIdioma);

            $arregloBotones = $controles->ListarTags($idIdioma,"BtnLavel");

            // print_r($listaModelo);

            // <div class="col-md-4 col-sm-12 col-xs-12 portfolio-item"> <figure class="effect-oscar"> <img src="../adminWeb/backend/images/perfil/'.$listaModelo[$i]["foto"].'" alt="img09" class="img-responsive" /> <figcaption> <h2>'.$listaModelo[$i]["nombre"].'</h2> <a href="#">View more</a> </figcaption> </figure> <p class="text-center">'.$listaModelo[$i]["nombre"].'</p> <div class="text-center"><a class="btn btn-primary btn-noborder-radius hvr-bounce-to-bottom">Read More</a></div> </div> 
            //       $imagen="";
            $listaPaquetes="";
            for ($i=0; $i < count($listaModelo) ; $i++) { 

            		// $descrip = strip_tags($listaModelo[$i]["detalle"]);
		            // $descrip = substr($descrip, 0, 151);
            	// $imagen = '<div class="col-md-4 col-sm-12 col-xs-12 portfolio-item"> <figure class="effect-oscar"> <img src="../adminWeb/backend/images/perfil/'.$listaModelo[$i]["foto"].'" alt="img09" class="img-responsive" /> ';
					 
					$imagen = '<div class="col-md-4 col-sm-12 col-xs-12 portfolio-item"> <figure class="effect-oscar"> <img src="../adminWeb/backend/images/categoria/'.$listaModelo[$i]["foto"].'" alt="img09" class="img-responsive" /> ';
					$nombre = '<figcaption> <h2>'.$listaModelo[$i]["nombre"].'</h2> <a href="#">View more</a> </figcaption> </figure>';
                    // $detalle = '<p class="text-center">'.$listaModelo[$i]["nombre"].'</p> <div class="text-center"><a class="btn btn-primary btn-noborder-radius hvr-bounce-to-bottom">Read More</a></div> </div>';
                    $detalle = '<div class="text-center"><a class="btn btn-primary btn-noborder-radius hvr-bounce-to-bottom" style="background-color: #58AAF5;">'.$arregloBotones[0]["nombre"].'</a></div> </div>';
            		$lista = $imagen.$nombre.$detalle;
					 
            		$listaPaquetes = $listaPaquetes.$lista;						 
            }
      //       echo($galeria);
            print_r($listaPaquetes);
        } 
        catch (Exception $ex) 
        {
            die($ex->getMessage());

        }


	}
}

$categoria = new listaCategoria();
$categoria->mostrarCategoria();

 ?>