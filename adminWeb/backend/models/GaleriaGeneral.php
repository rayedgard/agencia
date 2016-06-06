<?php

class GaleriaGeneral
{
    private $id;
    private $nombre;



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
    public function Listar($idDestino)
    {
        $this->pdo = new Conexion();
        try
        {
            $result = array();
            
            $stm = $this->pdo->prepare('SELECT id,nombre, FROM galeriaGeneral');
            $stm->execute();
            
            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new GaleriaGeneral();
                $alm->__SET('id',$r->id);
                $alm->__SET('nombre',$r->nombre);
          
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
     * lista la el id y nombre para cargar en un combo
     * retorna: id, nombre
     * estado = 1 (activo)
     */
    public function ListarCombo()
    {
        $this->pdo = new Conexion();
        try
        {
            $result = array();
            
            $stm = $this->pdo->prepare('SELECT id, nombre FROM galeriageneral');
            $stm->execute();
            
            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new GaleriaGeneral();
                $alm->__SET('id',$r->id);
                $alm->__SET('nombre',$r->nombre);
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
                    ->prepare("SELECT * FROM galeriageneral WHERE id =?");
            
            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $alm = new GaleriaGeneral();
            
            $alm->__SET('id',$r->id);
            $alm->__SET('nombre',$r->nombre);
                              
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
            $stm = $this->pdo->prepare('DELETE FROM galeriageneral WHERE id=?');
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
    public function Actualizar(GaleriaGeneral $data)
    {
        $this->pdo = new Conexion();
        try
        {
            $sql = "UPDATE galeriageneral SET 
                            nombre=?,
                                           
                    WHERE id=? ";
            $this->pdo->prepare($sql)
                    ->execute(
                        array(
                                $data->__GET('nombre'),
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
    public function Registrar(GaleriaGeneral $data)
    {
        $this->pdo = new Conexion();
        
        try
        {
            $sql ="INSERT INTO Galeriageneral (nombre)
                   VALUES (?)";
            $this->pdo->prepare($sql)
                    ->execute(
                        array(
                                $data->__GET('nombre'),
                                                          
                            )
                        );
        } 
        catch (Exception $ex) 
        {
            die($ex->getMessage());

        }
    }
}


?>

