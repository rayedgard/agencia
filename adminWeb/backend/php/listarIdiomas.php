<?php 

include('../models/Idioma.php');

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
class listarIdiomas
{
	
	public function mostraIdiomas(){
		// print_r("llega normal");

		$idioma = new Idioma();

		try
        {
            $idiomaCombo = array();
             
            $idiomaCombo = $idioma->ListarIdioma();

            $comoLleno="";
            $combo="";
            for ($i=0; $i < count($idiomaCombo) ; $i++) { 
					 
					$combo = "<option class='".$idiomaCombo[$i]['nombre']."' value='".$idiomaCombo[$i]['id']."'> ".$idiomaCombo[$i]['nombre']."</option>";
					if ($idiomaCombo[$i]['nombre']=="Español") {
						$comoLleno = $combo.''.$comoLleno;
					}else{
						$comoLleno = $comoLleno." ".$combo;
					}
            		
            }

            print_r($comoLleno);
        } 
        catch (Exception $ex) 
        {
            die($ex->getMessage());

        }


	}
}

$lista = new listarIdiomas();
$lista->mostraIdiomas();

 ?>