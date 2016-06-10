<?php
require_once '../models/Categoria.php';
require_once '../models/Destino.php';
require_once '../models/Subcategoria.php';
require_once '../models/ControlesTag.php';

$ruta = fopen("../../config/ruta.txt", "r");
$linea = fgets($ruta);
fclose($ruta);
require_once $_SERVER['DOCUMENT_ROOT'].$linea;

// instanciando objetos
$destinos=new Destino();
$subCategoria =new Subcategoria();
$categoria=new Categoria();
$controles=new ControlesTags();

if($_POST["accion"]=='actionIdioma')
{
    $id = $_POST["idIdioma"];
	//recuperamos registros de consultas
	$contt=$controles->ListarTags($id,'linkMenu');
	$destinosList=$destinos->ListarComboArray($id,'linkMenu');
	$categoriaList=$categoria->ListarComboArray($id,'linkMenu');
	//----------------------------------------------
		//$direcciones=array("#home",);
		$combo="";
		$combo2="";
		$botones=array();
		//cabecera destinos

//-----------------------------------------------------

		try
        {
            //listado de botones comunes
            for ($i=0; $i < count($contt) ; $i++) { 
					 $dataCont=$contt[$i]['identificador'];
					 $nameCont=$contt[$i]['nombre'];

					 if ($dataCont!='link_destinos' && $dataCont!='link_paquetes') {
					 	$combo = "<li> <a href='#".$contt[$i]['nombre']."' id='".$contt[$i]['idioma_id']."'>".$contt[$i]['nombre']."</a></li>";
            		 	array_push($botones,$combo);
					 }

					 if($dataCont=='link_destinos')
					 {
					 	$cc="<li> <a href='#".$nameCont."'>". $nameCont." </a><ul>";
					 	//listando botones destino
            				array_push($botones,$cc);
            				
            				for ($j=0; $j <count($destinosList) ; $j++) { 
            				$dataDestino=$destinosList[$j]['nombre'];
            				
            				$combo2= "<li> <a href='#".$dataDestino."' id='".$destinosList[$j]['id']."'>".$dataDestino."</a></li>";
            				array_push($botones,$combo2);
            				}
            				$finalCabecera="</ul></li>";
            			array_push($botones,$finalCabecera);
					 }
					 
					 if($dataCont=='link_paquetes')
					 {
					 	 //listado botones paquetes
					 		$cc2="<li> <a href='#".$nameCont."'>". $nameCont." </a><ul>";
           					array_push($botones,$cc2);
            				for ($h=0; $h <count($categoriaList) ; $h++) { 
            					$dataCategoria=$categoriaList[$h]['nombre'];
            					$dataIdCategoria=$categoriaList[$h]['id'];
            					$combo3= "<li> <a href='#".$dataCategoria."' id='".$dataIdCategoria."'>".$dataCategoria."</a></li>";
            					array_push($botones,$combo3);
            					}
            					$finalPaquetes="</ul></li>";
           					array_push($botones,$finalPaquetes);
					 }

            }
           // print_r(count($botones));
            //-----------------------
           	for ($x=0; $x <count($botones) ; $x++) { 
           		echo $botones[$x];
           	}


        } 
        catch (Exception $ex) 
        {
            die($ex->getMessage());

        }
 
}

if ($_POST["accion"]=='actionIdiomaLavels') 
{
    $id = $_POST["idIdioma"];
	
	$controles1=new ControlesTags();
	$botonesReadMore=$controles1->ListarTags($id,'BtnLavel');//btones "read more"
	$listaAbout=$controles1->ListarTags($id,'H2Lavel');//titulos del index
	$listarAboutTexto=$controles1->ListarTags($id,'p_texto');//texto de "acerca de nosotros"
	$listarBotonesForm=$controles1->ListarTags($id,'form_lvl'); // texto de items del formulario de envio

	$Hlavels=array();
	$stringCabecera="|";
	$stringLvl="";
    array_push($Hlavels,$stringCabecera);
	if(sizeof($listarAboutTexto)>0)
    {
        $data=$listarAboutTexto[0]['nombre']."|";
        array_push($Hlavels,$data);
    }
	

	try
        {
        	for ($i=0; $i <count($listaAbout) ; $i++) 
        	{ 
        		$stringLvl="<h2>".$listaAbout[$i]['nombre']."</<h2>|";
        		array_push($Hlavels,$stringLvl);
        	}
        	for ($j=0; $j < count($botonesReadMore); $j++) { 
        		$botones="<a class='btn btn-primary btn-noborder-radius hvr-bounce-to-bottom' id='".$botonesReadMore[$j]['idControl'].$botonesReadMore[$j]['identificador']."'>".$botonesReadMore[$j]['nombre']."</a>|";
        		array_push($Hlavels,$botones);
        	}
        	for ($u=0; $u <count($listarBotonesForm) ; $u++) { 
        		$itemsForm=$listarBotonesForm[$u]['nombre']."|";
        		array_push($Hlavels,$itemsForm);
        	}
            print_r(count($Hlavels));
        	for ($h=0; $h <count($Hlavels) ; $h++) 
        	{ 
           		echo $Hlavels[$h];
           	}
           	

        }catch(Exception $ex) 
    	{
    		die($ex->getMessage());
    	}
}
?>