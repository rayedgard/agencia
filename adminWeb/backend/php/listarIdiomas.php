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
class listarIdiomas
{
	
	public function mostraIdiomas(){
		// print_r("llega normal");

		$idioma = new Idioma();

        $id= $_POST["id"];

        // print_r($_SESSION["idioma"]);
        
        if (isset($_SESSION["idioma"])) {
                    try
                {
                    $idiomaCombo = array();
                     
                    $idiomaCombo = $idioma->ListarIdioma();
                    // print_r($idiomaCombo);

                    $comoLleno="";
                    $combo="";
                    // print_r($_SESSION["idioma"]);
                                            
                    // $_SESSION["idIdioma"]= $id;
                    for ($i=0; $i < count($idiomaCombo) ; $i++) { 
                         
                        $combo = "<option class='".$idiomaCombo[$i]['nombre']."' value='".$idiomaCombo[$i]['id']."'> ".$idiomaCombo[$i]['nombre']."<img src='adminWeb/backend/images/idiomas/".$idiomaCombo[$i]['icono']."'></option>";
                        if ($idiomaCombo[$i]['nombre']== $_SESSION["idioma"]) {
                            $_SESSION["idioma"]= $idiomaCombo[$i]['nombre'];
                            $comoLleno = $combo.''.$comoLleno;
                        }else{
                            $comoLleno = $comoLleno." ".$combo;
                        }
                        
                    }
                        // print_r($_SESSION["idioma"]);
                    print_r($comoLleno);
                } 
                catch (Exception $ex) 
                {
                    die($ex->getMessage());

                }
        }else{

            $_SESSION["idIdioma"] = 3;  

        try
        {
                $idiomaCombo = array();
                 
                $idiomaCombo = $idioma->ListarIdioma();

                $comoLleno="";
                $combo="";
                // print_r($_SESSION["idioma"]);
                    for ($i=0; $i < count($idiomaCombo) ; $i++) { 
                         
                        $combo = "<option class='".$idiomaCombo[$i]['nombre']."' value='".$idiomaCombo[$i]['id']."'> ".$idiomaCombo[$i]['nombre']."<img src='adminWeb/backend/images/idiomas/".$idiomaCombo[$i]['icono']."'></option>";
                        if ($idiomaCombo[$i]['id']== $_SESSION["idIdioma"]) {
                            $_SESSION["idioma"]= $idiomaCombo[$i]['nombre'];
                            // $_SESSION["idIdioma"]= $idiomaCombo[$i]['id'];
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
}

$lista = new listarIdiomas();
$lista->mostraIdiomas();

 ?>