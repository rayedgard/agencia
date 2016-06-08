<?php

class Usuario
{
    private $id;
    private $nombre;
    private $pass;
    private $correo;
    private $estado;



    public function __get($name) {
        return $this->$name;
    }
    
    public function __set($name, $value) {
        return $this->$name=$value;
        
    }
    
    private $pdo;
    
    /**
     * lista los valores de las columnas solicitadas
     * @param type $table 
     * @param type $rows
     * @return \Sede
     */
    public function Listar()
    {
        $this->pdo = new Conexion();
        try
        {
            $result = array();
            
            $stm = $this->pdo->prepare('SELECT * FROM usuario WHERE estado=1');
            $stm->execute();
            
            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new Usuario();
                $alm->__SET('id',$r->id);
                $alm->__SET('nombre',$r->nombre);
                $alm->__SET('pass',$r->pass);
                $alm->__SET('correo',$r->correo);
                $alm->__SET('estado',$r->estado);
                $result[] = $alm;
            }
            return $result;
        } 
        catch (Exception $ex) 
        {
            die($ex->getMessage());

        }
    }
    
 
    
    /**
     * Obtiene los datos de un registro especifico
     * @param type $id
     * @return \Sede
     */
    public function Obtener($id)
    {
        $this->pdo = new Conexion();
        try{
            
            $stm = $this->pdo
                    ->prepare("SELECT * FROM usuario WHERE id =?");
            
            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $alm = new Usuario();
            
            $alm->__SET('id',$r->id);
            $alm->__SET('nombre',$r->nombre);
            $alm->__SET('pass',$r->pass);
            $alm->__SET('correo',$r->correo);
            $alm->__SET('estado',$r->estado);
                        
            return $alm;
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }
    
    /**
     * Elimnar un registro
     * @param type $id
     */
    public function Eliminar($id)
    {   
        $this->pdo = new Conexion();
        try
        {
            $stm = $this->pdo->prepare('DELETE FROM usuario WHERE id=?');
            $stm->execute(array($id));
        } 
        catch (Exception $ex) 
        {
            die($ex->getMessage());
        }
    }
    
    /**
     * Actualiza los datos en la BD
     * @param Sede $data
     */
    public function Actualizar(Usuario $data)
    {
        $this->pdo = new Conexion();
        try
        {
            $sql = "UPDATE usuario SET 
                            nombre=?,
                            pass=?,
                            correo=?,
                            estado=?
                            
                    WHERE id=? ";
            $this->pdo->prepare($sql)
                    ->execute(
                        array(
                                $data->__GET('nombre'),
                                md5($data->__GET('pass')),
                                $data->__GET('correo'),
                                $data->__GET('estado'),
                                $data->__GET('id'),
                                )
                        );
                    
                    
        } catch (Exception $ex) 
        {
            die($ex->getMessage());
        }
    }


     public function ActualizarSinPass(Usuario $data)
    {
        $this->pdo = new Conexion();
        try
        {
            $sql = "UPDATE usuario SET 
                            nombre=?,
                            correo=?,
                            estado=?
                            
                    WHERE id=? ";
            $this->pdo->prepare($sql)
                    ->execute(
                        array(
                                $data->__GET('nombre'),
                                $data->__GET('correo'),
                                $data->__GET('estado'),
                                $data->__GET('id'),
                                )
                        );
                    
                    
        } catch (Exception $ex) 
        {
            die($ex->getMessage());
        }
    }
    /**
     * Registra los datos en la BD
     * @param Sede $data
     */
    public function Registrar(Usuario $data)
    {
        $this->pdo = new Conexion();
        
        try
        {
            $sql ="INSERT INTO Usuario (nombre,pass,correo,estado)
                   VALUES (?, ?, ?, ?)";
            $this->pdo->prepare($sql)
                    ->execute(
                        array(
                                $data->__GET('nombre'),
                                md5($data->__GET('pass')),
                                $data->__GET('correo'),
                                $data->__GET('estado'),
                            )
                        );
        } 
        catch (Exception $ex) 
        {
            die($ex->getMessage());

        }
    }



     public function CambiaContrasenia($usuario,$contraseniaActual,$contraseniaNueva)
    {


       $this->pdo = new Conexion();
           
        try
        {
            $sql = "UPDATE usuario SET pass =? WHERE nombre=? AND pass=?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array(md5($contraseniaNueva),$usuario,md5($contraseniaActual)));
            $numero = $stm->rowCount();
             
              
            if($numero==1)
            {
                return "LOS DATOS DE GUARDARON SATISFACTORIAMENTE";
            }
            else
            {
                return "LA CONTRASEÑA ANTERIOR QUE INTRODUCIO ESTA ERRADA";
            }


        } catch (Exception $ex) 
        {
            die($ex->getMessage());
        }
    }


}


?>

