<?php 

// session_start();

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

        // print_r($_SESSION["idIdioma"]);

        $id = $_POST["id"];
        $_SESSION['idIdioma'] = $id;
        

		try
        {
            $idiomaCombo = array();
             
            $idiomaCombo = $idioma->buscarIdioma($id);

            if (isset($idiomaCombo)) {
            	$_SESSION['idioma'] = $idiomaCombo[0]['nombre'];
            	// print_r($_SESSION['idioma']);
            }

            print_r("true");
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