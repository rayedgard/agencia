<?php
session_start();
class Login
{


    
    private $pdo;
 
 	//------------------------------

   


	//para el login 
    public function logueo($usuario,$contrasenia)
    {
        
        $this->pdo = new Conexion();
        try 
        {
            
            $stm = $this->pdo
                    ->prepare("SELECT nombre FROM usuario WHERE nombre = ? AND pass = ? AND estado=1");

            $stm->execute(array($usuario,$contrasenia));
            $r = $stm->fetch(PDO::FETCH_ASSOC);

            if($r['nombre'])
			{
			    $_SESSION['usuario'] = $r['nombre'];
				
				return TRUE;
			}
            
        }
        catch(PDOException $e){
            
            print "Error!: " . $e->getMessage();
            
        }  

    }



     // Evita que el objeto se pueda clonar
    public function __clone()
    {

        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);

    }

}