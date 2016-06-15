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

            $arregloBotones = $controles->ListarTags($idIdioma,"BtnLavel");

            // print_r($listaModelo);

            // <div class="col-md-4 col-sm-12 col-xs-12 portfolio-item"> <figure class="effect-oscar"> <img src="../adminWeb/backend/images/perfil/'.$listaModelo[$i]["foto"].'" alt="img09" class="img-responsive" /> <figcaption> <h2>'.$listaModelo[$i]["nombre"].'</h2> <a href="#">View more</a> </figcaption> </figure> <p class="text-center">'.$listaModelo[$i]["nombre"].'</p> <div class="text-center"><a class="btn btn-primary btn-noborder-radius hvr-bounce-to-bottom">Read More</a></div> </div> 
            //       $imagen="";
            $listaPaquetes="";
            // print_r($_POST["accion"]);
            if ($_POST["accion"]=="index") {

                // ListaCategoria
                $listaModelo = $categoria->ListaCategoria($idIdioma);

                for ($i=0; $i < count($listaModelo) ; $i++) { 

                        // $descrip = strip_tags($listaModelo[$i]["detalle"]);
                        // $descrip = substr($descrip, 0, 151);
                    // $imagen = '<div class="col-md-4 col-sm-12 col-xs-12 portfolio-item"> <figure class="effect-oscar"> <img src="../adminWeb/backend/images/perfil/'.$listaModelo[$i]["foto"].'" alt="img09" class="img-responsive" /> ';
                         
                        $imagen = '<div class="col-md-4 col-sm-12 col-xs-12 portfolio-item"> <figure class="effect-oscar"> <img src="adminWeb/backend/images/categoria/'.$listaModelo[$i]["foto"].'" alt="img09" class="img-responsive" /> ';
                        $nombre = '<figcaption> <h2>'.$listaModelo[$i]["nombre"].'</h2></figcaption> </figure>';
                        // $detalle = '<p class="text-center">'.$listaModelo[$i]["nombre"].'</p> <div class="text-center"><a class="btn btn-primary btn-noborder-radius hvr-bounce-to-bottom">Read More</a></div> </div>';
                        $detalle = '<form method="post" action="Listado_de_Categorias.php"> <div class="text-center"><a class="btn btn-primary btn-noborder-radius hvr-bounce-to-bottom" style="background-color: #58AAF5;"><input type="submit" style="border:none ; background:transparent; " id="'.$listaModelo[$i]["id"].'" class="linkDestino" value="'.$arregloBotones[0]["nombre"].'" > </a> <input type="text" style="visibility:hidden; height: 0px; width:0px;" name="id_fijo" value="'.$listaModelo[$i]["id"].'"></div> </form></div>';
                        $lista = $imagen.$nombre.$detalle;
                         
                        $listaPaquetes = $listaPaquetes.$lista;                      
                }
            }

            if ($_POST["accion"]=="viajes") {

                $listaModelo = $categoria->ListarCategoria($idIdioma);
                
                for ($i=0; $i < count($listaModelo) ; $i++) { 

                        // $descrip = strip_tags($listaModelo[$i]["detalle"]);
                        // $descrip = substr($descrip, 0, 151);
                    // $imagen = '<div class="col-md-4 col-sm-12 col-xs-12 portfolio-item"> <figure class="effect-oscar"> <img src="../adminWeb/backend/images/perfil/'.$listaModelo[$i]["foto"].'" alt="img09" class="img-responsive" /> ';

                        $imagen='<form method="post" action="Listado_de_Categorias.php"><div class="row blogu"> <div class="col-sm-4 col-md-4 "> <div class="blog-thumb"> <a href="#"> <img class="img-responsive" src="adminWeb/backend/images/categoria/'.$listaModelo[$i]["foto"].'" alt="photo"> </a> </div> </div> <div class="col-sm-8 col-md-8"> <h2 class="blog-title">';
                        $titulo = '<input type="submit" style="border:none ; background:transparent; color:#3BC496
; " id="'.$listaModelo[$i]["id"].'" class="linkDestino" value="'.$listaModelo[$i]["nombre"].'" >';
                        $id='<input type="text" style="visibility:hidden; height: 0px; width: 0px;" name="id_fijo" value="'.$listaModelo[$i]["id"].'">';
                        $descripcion = '</h2> </div> </div> <br> <hr></form>';
                        $lista = $imagen.$titulo.$id.$descripcion;
                        $listaPaquetes= $listaPaquetes.$lista;
                         
                        // $imagen = '<div class="col-md-4 col-sm-12 col-xs-12 portfolio-item"> <figure class="effect-oscar"> <img src="../adminWeb/backend/images/categoria/'.$listaModelo[$i]["foto"].'" alt="img09" class="img-responsive" /> ';
                        // $nombre = '<figcaption> <h2>'.$listaModelo[$i]["nombre"].'</h2> <a href="#">View more</a> </figcaption> </figure>';
                        // // $detalle = '<p class="text-center">'.$listaModelo[$i]["nombre"].'</p> <div class="text-center"><a class="btn btn-primary btn-noborder-radius hvr-bounce-to-bottom">Read More</a></div> </div>';
                        // $detalle = '<div class="text-center"><a class="btn btn-primary btn-noborder-radius hvr-bounce-to-bottom" style="background-color: #58AAF5;">'.$arregloBotones[0]["nombre"].'</a></div> </div>';
                        // $lista = $imagen.$nombre.$detalle;
                         
                        // $listaPaquetes = $listaPaquetes.$lista;                      
                }
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