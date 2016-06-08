<?php

require_once '../models/ControlesTag.php';

$ruta = fopen("../../config/ruta.txt", "r");
$linea = fgets($ruta);
fclose($ruta);
require_once $_SERVER['DOCUMENT_ROOT'].$linea;
$controles=new ControlesTags();
if(isset($_REQUEST['actionIdiomaBox']))
{
	$contt=$controles->ListarTags('3');
	print_r($contt);
}
?>