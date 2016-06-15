<?php
session_start();
require_once 'conexion.php';
require_once '../backend/models/Login.php';
//accedemos al método singleton que es quién crea la instancia
//de nuestra clase y así podemos acceder sin necesidad de
//crear nuevas instancias, lo que ahorra consumo de recursos
$login = new Login();


 
if(isset($_POST['usuario']))
{
	$usuario = $_POST['usuario'];
	$contrasenia = $_POST['contrasenia'];
	//accedemos al método usuarios y los mostramos


	$contrasenia = md5($contrasenia);


	$usuario1 = $login->logueo($usuario,$contrasenia);
	
	if($usuario1 == TRUE)
	{
		// Si el proceso de logueo es corecto
		header("Location:../backend/index.php");
		//print_r($_SESSION['idArea']);
		//print_r($_SESSION['nombre']);
	}
	else
	{
		//Cuando el pro
		//print_r($_SESSION['idArea']);
		//print_r($_SESSION['nombre']);
		header("Location:../index.php");
		
	}	
}
?>