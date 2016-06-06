<?php
require_once 'models/Idioma.php';
// Logica
$idioma = new Idioma();



if(isset($_REQUEST['actionIdioma']))
{
	//recuperamos variables para desemcriptarlos
	$listaIdioma=array();
	//----------------------------------------------
	$idioma->Listar('idioma');
	return json_encode($idioma);
}
?>