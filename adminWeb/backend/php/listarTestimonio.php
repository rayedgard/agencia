<?php 
session_start();

include('../models/Testimonio.php');

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
class listarTestimonio
{
	
	public function mostraTestimonios(){
		// print_r("llega normal");

		$testimonioObjeto = new Testimonio();

        // print_r($_SESSION["idIdioma"]);

        $id = $_POST["id"];
        $fecha = $_POST["fecha"];
        // $_SESSION['idIdioma'] = $id;
        

		try
        {
            $arregloTestimonio = array();
             
            $arregloTestimonio = $testimonioObjeto->busquedaAños($id, $fecha);
            $listaTestimonios = "";
            for ($i=0; $i <count($arregloTestimonio) ; $i++) { 

                        $descrip = strip_tags($arregloTestimonio[$i]["detalle"]);
                    
                        $imagen='<form method="post" action="destinos.php"><div class="row blogu"> <div class="col-sm-4 col-md-4 "> <div class="blog-thumb"> <a href="#"> <img class="img-responsive" src="adminWeb/backend/images/testimonio/'.$arregloTestimonio[$i]["foto"].'" alt="photo"> </a> </div> </div> <div class="col-sm-8 col-md-8"> <h2 class="blog-title">';
                        $titulo = '<input type="submit" style="border:none ; background:transparent; color:#3BC496
; " id="'.$arregloTestimonio[$i]["id"].'" class="linkDestino" value="'.$arregloTestimonio[$i]["nombre"].'" >';
                        $id='<input type="text" style="visibility:hidden; height: 0px; width: 0px;" name="id_fijo" value="'.$arregloTestimonio[$i]["id"].'">';
                        $descripcion = '</h2> <p style="color: #000">'.$descrip.'</p> ';
                        $datos= '<h6><i class="fa fa-envelope" aria-hidden="true">: </i>'.$arregloTestimonio[$i]["correo"].'  <i class="fa fa-calendar" aria-hidden="true">: </i>'.$arregloTestimonio[$i]["fecha"].'<h6>  </div> </div><br> <hr></form>';
                        $lista = $imagen.$titulo.$id.$descripcion.$datos;
                        $listaTestimonios= $listaTestimonios.$lista;  
            }
            echo $listaTestimonios;
        } 
        catch (Exception $ex) 
        {
            die($ex->getMessage());

        }


	}
}

$testimonio = new listarTestimonio();
$testimonio->mostraTestimonios();

 ?>
