<?php 

include('../models/BannerGeneral.php');

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
class listarBanerGeneral
{
	
	public function mostraBanerGeneral(){
		// print_r("llega normal");

		$banerModelo = new BannerGeneral();

		try
        {
            $banerLista = array();
             $ids = $_POST["id"];
            // print_r($ids);
            $banerLista = $banerModelo->listarBaner($ids);

            // print_r($banerLista);

//             <li>
// <span><img src="images/alumnos/'+obj[j].foto+'"/></span> <div class="container"> <div class="row"> <div class="col-lg-12"> <div class="text-center"> <h3>SEARCH ENGINE OPTIMIZATION!</h3> </div> </div> </div> <h4>Lorem Ipsum is simply dummy text of typesetting industry.</h4> </div> </li>
            $listaBaner='';
            // $imagenInicio='<li><span><img src="../images/bannergeneral/'.$bannergeneral[$i]["foto"].'"/></span> <div class="container"> <div class="row"> <div class="col-lg-12"> <div class="text-center">';
            // $titulo = '<h3>'.$bannergeneral[$i]["titulo"].'</h3> </div> </div> </div> ';
            // $descripcion = '<h4>'.$bannergeneral[$i]["detalle"].'</h4> </div> </li>';
            // -webkit-animation-delay: 6s; -moz-animation-delay: 6s; -o-animation-delay: 6s; -ms-animation-delay: 6s; animation-delay: 6s; 
            $tiempo=0;
            for ($i=0; $i < count($banerLista) ; $i++) {
					$imagen='<li><span style="background-image: url(../adminWeb/backend/images/bannergeneral/'.$banerLista[$i]["foto"].');  -webkit-animation-delay: '.$tiempo.'s; -moz-animation-delay: '.$tiempo.'s; -o-animation-delay: '.$tiempo.'s; -ms-animation-delay: '.$tiempo.'s; animation-delay: '.$tiempo.'s;"> Imagen</span> <div class="container" style="-webkit-animation-delay: '.$tiempo.'s; -moz-animation-delay: '.$tiempo.'s; -o-animation-delay: '.$tiempo.'s; -ms-animation-delay: '.$tiempo.'s; animation-delay: '.$tiempo.'s;"> <div class="row" style="-webkit-animation-delay: '.$tiempo.'s; -moz-animation-delay: '.$tiempo.'s; -o-animation-delay: '.$tiempo.'s; -ms-animation-delay: '.$tiempo.'s; animation-delay: '.$tiempo.'s;"> <div class="col-lg-12" style="-webkit-animation-delay: '.$tiempo.'s; -moz-animation-delay: '.$tiempo.'s; -o-animation-delay: '.$tiempo.'s; -ms-animation-delay: '.$tiempo.'s; animation-delay: '.$tiempo.'s;"> <div class="text-center" style="-webkit-animation-delay: '.$tiempo.'s; -moz-animation-delay: '.$tiempo.'s; -o-animation-delay: '.$tiempo.'s; -ms-animation-delay: '.$tiempo.'s; animation-delay: '.$tiempo.'s;">';
                    $tiempo= $tiempo + 6;
                    $titulo = '<h3>'.$banerLista[$i]["titulo"].'</h3> </div> </div> </div> ';
                    $descripcion = '<h4>'.$banerLista[$i]["detalle"].'</h4> </div> </li>';
            		$lista = $imagen.$titulo.$descripcion;
                    $listaBaner= $listaBaner.$lista;
                    // print_r($listaBaner);
            }

            print_r($listaBaner);
        } 
        catch (Exception $ex) 
        {
            die($ex->getMessage());

        }


	}
}

$baner = new listarBanerGeneral();
$baner->mostraBanerGeneral();

 ?>