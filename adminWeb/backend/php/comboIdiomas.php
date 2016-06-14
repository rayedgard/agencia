<?php 

session_start();

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
class comboIdiomas
{
	
	public function mostraIdiomas(){
		// print_r("llega normal");

		$idioma = new Idioma();

        // $id= $_POST["id"];
        
        // $_SESSION["idIdioma"] = $id;

        // print_r($_SESSION["idIdioma"]);

        

		try
        {
            $idiomaCombo = array();
             
            $idiomaCombo = $idioma->ListarIdioma();

            $comoLleno="";
            $combo="";
            // print_r($_SESSION["idioma"]);
            // if($_SESSION["idIdioma"] == "v")
            // {
            //     // print_r('no definida');

            //     for ($i=0; $i < count($idiomaCombo) ; $i++) { 
                     
            //         $combo = "<option class='".$idiomaCombo[$i]['nombre']."' value='".$idiomaCombo[$i]['id']."'> ".$idiomaCombo[$i]['nombre']."</option>";
            //         if ($idiomaCombo[$i]['nombre']=="Español") {
            //             $_SESSION["idioma"]= $idiomaCombo[$i]['nombre'];
            //             $_SESSION["idIdioma"]= $idiomaCombo[$i]['id'];
            //             $comoLleno = $combo.''.$comoLleno;
            //         }else{
            //             $comoLleno = $comoLleno." ".$combo;
            //         }
                    
            //     }
            // }else{
                
                // $_SESSION["idIdioma"]= $id;
                for ($i=0; $i < count($idiomaCombo) ; $i++) { 
                     
                    $combo = "<option class='".$idiomaCombo[$i]['nombre']."' value='".$idiomaCombo[$i]['id']."'> ".$idiomaCombo[$i]['nombre']."</option>";
                    if ($idiomaCombo[$i]['nombre']== $_SESSION["idioma"]) {
                        // $_SESSION["idioma"]= $idiomaCombo[$i]['nombre'];
                        $comoLleno = $combo.''.$comoLleno;
                    }else{
                        $comoLleno = $comoLleno." ".$combo;
                    }
                    
                }
            //     print_r($_SESSION["idioma"]);
            // }


            print_r($comoLleno);
        } 
        catch (Exception $ex) 
        {
            die($ex->getMessage());

        }


	}
}

$lista = new comboIdiomas();
$lista->mostraIdiomas();

 ?>