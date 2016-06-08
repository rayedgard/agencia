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

if(isset($_REQUEST['actionIdioma']))
{
	//recuperamos registros de consultas
	$contt=$controles->ListarTags('3','linkMenu');
	$destinosList=$destinos->ListarComboArray('3','linkMenu');
	$categoriaList=$categoria->ListarComboArray('3','linkMenu');
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
					 	$combo = "<li  id='".$contt[$i]['id']."'> <a href='#".$contt[$i]['nombre']."'>".$contt[$i]['nombre']."</a></li>";
            		 	array_push($botones,$combo);
					 }
					 if($dataCont=='link_destinos')
					 {
					 	$cc="<li> <a href='#".$nameCont."'>". $nameCont." </a><ul>";
					 	//listando botones destino
            				array_push($botones,$cc);
            				
            				for ($j=0; $j <count($destinosList) ; $j++) { 
            				$dataDestino=$destinosList[$j]['nombre'];
            				
            				$combo2= "<li id='".$destinosList[$j]['id']."'> <a href='#".$dataDestino."'>".$dataDestino."</a></li>";
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
            					$combo3= "<li id='".$dataIdCategoria."'> <a href='#".$dataCategoria."'>".$dataCategoria."</a></li>";
            					array_push($botones,$combo3);
            					}
            					$finalPaquetes="</ul></li>";
           					array_push($botones,$finalPaquetes);
					 }

            }
           
            //-----------------------
           	for ($h=0; $h <count($botones) ; $h++) { 
           		echo $botones[$h];
           	}


        } 
        catch (Exception $ex) 
        {
            die($ex->getMessage());

        }
 
}

if (isset($_REQUEST['actionIdiomaLavels'])) 
{
	
	$controles1=new ControlesTags();
	$botonesReadMore=$controles1->ListarTags('3','BtnLavel');//btones "read more"
	$listaAbout=$controles1->ListarTags('3','H2Lavel');//titulos del index
	$listarAboutTexto=$controles1->ListarTags('3','p_texto');//texto de "acerca de nosotros"
	$listarBotonesForm=$controles1->ListarTags('3','form_lvl'); // texto de items del formulario de envio

	$Hlavels=array();
	$stringCabecera="|";
	$stringLvl="";
	
	array_push($Hlavels,$stringCabecera);
	$data=$listarAboutTexto[0]['nombre']."|";
	array_push($Hlavels,$data);
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