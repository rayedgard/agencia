<?php 

include('../models/GaleriaGeneral.php');

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
class listaGaleriaGeneral
{
	
	public function mostrarGaleriaGeneral(){
		// print_r("llega normal");

		$galeria = new GaleriaGeneral();

		try
        {
            $galeriaModelo = array();
             
            $galeriaModelo = $galeria->ListarGaleria();
            
            // <li data-type="development" data-id="id-1" class="port3"> <a href="#" id="development1"><img src="images/port1.jpg" alt=""></a> </li> 
            $imagen="";
            $galeria="";
            for ($i=0; $i < count($galeriaModelo) ; $i++) { 
					 
					 $imagen = '<li data-type="development" data-id="id-1" class="port3"> <a href="#" id="development1"><img src="adminWeb/backend/images/galeriageneral/'.$galeriaModelo[$i]["nombre"].'" alt=""></a> </li>';
					 
            		$galeria = $galeria.$imagen;						 
            }
            echo($galeria);
            // print_r($galeria);
        } 
        catch (Exception $ex) 
        {
            die($ex->getMessage());

        }


	}
}

$galeria = new listaGaleriaGeneral();
$galeria->mostrarGaleriaGeneral();

 ?>