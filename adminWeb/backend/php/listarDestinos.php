<?php 

include('../models/Destino.php');

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
class listarDestinos
{
	
	public function mostrarDestinos(){
		// print_r("llega normal");

		$destinoModelo = new Destino();
		$idIdioma= $_POST["idIdioma"];
		// print_r($idIdioma);
		
		try
        {
            $listaDestinos = array();
             
            $listaDestinos = $destinoModelo->ListarDestino($idIdioma);
            // print_r($listaDestinos);
       	// '<div class="col-md-3 portfolio-item"> <div class="text-center"> <span class="fa-stack fa-lg"> <img src="../adminWeb/backend/images/bannerDestino/'.$listaDestinos[$i]["fot_destino"].'" class="img-responsive img-circle" style="width:100%; height:100%; "> </span>' <h3><a href="#">Strategy</a></h3> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> </div> </div>
        //     print_r($listaDestinos);
            // print_r($_POST["index"]);
            // print_r($_POST["accion"]);
            if($_POST["accion"] == "index")
            {
                $listaDestinosIndex="";
                for ($i=0; $i < count($listaDestinos) ; $i++) { 

                        $descrip = strip_tags($listaDestinos[$i]["detalle"]);
                        $descrip = substr($descrip, 0, 151);

                        $imagen='<div class="col-md-3 portfolio-item"> <div class="text-center"> <span class="fa-stack fa-lg"> <img src="../adminWeb/backend/images/bannerDestino/'.$listaDestinos[$i]["foto_destino"].'" class="img-responsive img-circle" style="width:100%; height:100%; border-radius: 50%;"> </span>';
                        $titulo = '<h3><a href="#">'.$listaDestinos[$i]["nombre"].'</a></h3>';
                        $descripcion = '<p>'.$descrip.'</p></div> </div>';
                        $lista = $imagen.$titulo.$descripcion;
                        $listaDestinosIndex= $listaDestinosIndex.$lista;
                }
            }
            
            if($_POST["accion"] == "destino")
            {
                $listaDestinosIndex="";
                for ($i=0; $i < count($listaDestinos) ; $i++) { 

                        // <div class="row blogu"> <div class="col-sm-4 col-md-4 "> <div class="blog-thumb"> <a href="single-post.html"> <img class="img-responsive" src="../adminWeb/backend/images/bannerDestino/
                        //  blog-photo1.jpg" alt="photo"> </a> </div> </div> <div class="col-sm-8 col-md-8"> <h2 class="blog-title">
                        //   <a href="single-post.html">Post title 1</a>

                        //     </h2>
                        //     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, veritatis, tempora, necessitatibus inventore nisi quam quia repellat ut tempore laborum possimus eum dicta id animi corrupti debitis ipsum officiis rerum.
                        //     </p> </div> </div>
                        $descrip = strip_tags($listaDestinos[$i]["detalle"]);
                        $descrip = substr($descrip, 0, 220);

                        $imagen='<div class="row blogu"> <div class="col-sm-4 col-md-4 "> <div class="blog-thumb"> <a href="#"> <img class="img-responsive" src="../adminWeb/backend/images/bannerDestino/'.$listaDestinos[$i]["foto_destino"].'" alt="photo"> </a> </div> </div> <div class="col-sm-8 col-md-8"> <h2 class="blog-title">';
                        $titulo = '<a href="#" id="'.$listaDestinos[$i]["id"].'" class="linkDestino">'.$listaDestinos[$i]["nombre"].'</a>';
                        $descripcion = '</h2> <p>'.$descrip.'</p> </div> </div> <br> <hr>';
                        $lista = $imagen.$titulo.$descripcion;
                        $listaDestinosIndex= $listaDestinosIndex.$lista;
                }
            }

            print_r($listaDestinosIndex);
        } 
        catch (Exception $ex) 
        {
            die($ex->getMessage());

        }
	}
}

$destinos = new listarDestinos();
$destinos->mostrarDestinos();

 ?>
