<?php

class Bannerdestino
{
    private $id;
    private $titulo;
    private $detalle;
    private $foto;
    private $destino_id;

    private $destino_nombre;
   


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
            
            $stm = $this->pdo->prepare('SELECT b.id,b.titulo,b.detalle,b.foto,b.destino_id,d.nombre AS destino_nombre FROM bannerdestino b INNER JOIN destino d ON d.id=b.destino_id WHERE b.destino_id='.$idDestino);
            $stm->execute();
            
            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new Bannerdestino();
                $alm->__SET('id',$r->id);
                $alm->__SET('titulo',$r->titulo);
                $alm->__SET('detalle',$r->detalle);
                $alm->__SET('foto',$r->foto);
                $alm->__SET('destino_id',$r->destino_id);
                $alm->__SET('destino_nombre',$r->destino_nombre);
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
     * lista la el id y titulo para cargar en un combo
     * retorna: id, titulo
     * estado = 1 (activo)
     */
    public function ListarCombo()
    {
        $this->pdo = new Conexion();
        try
        {
            $result = array();
            
            $stm = $this->pdo->prepare('SELECT id, titulo FROM bannerdestino');
            $stm->execute();
            
            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new Bannerdestino();
                $alm->__SET('id',$r->id);
                $alm->__SET('titulo',$r->titulo);
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
                    ->prepare("SELECT * FROM bannerdestino WHERE id =?");
            
            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $alm = new Bannerdestino();
            
            $alm->__SET('id',$r->id);
            $alm->__SET('titulo',$r->titulo);
            $alm->__SET('detalle',$r->detalle);
            $alm->__SET('foto',$r->foto);
            $alm->__SET('destino_id',$r->destino_id);
                                 
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
            $stm = $this->pdo->prepare('DELETE FROM bannerdestino WHERE id=?');
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
    public function Actualizar(Bannerdestino $data)
    {
        $this->pdo = new Conexion();
        try
        {
            $sql = "UPDATE bannerdestino SET 
                            titulo=?,
                            detalle=?,
                            foto=?,
                            destino_id=?
                            
                    WHERE id=? ";
            $this->pdo->prepare($sql)
                    ->execute(
                        array(
                                $data->__GET('titulo'),
                                $data->__GET('detalle'),
                                $data->__GET('foto'),
                                $data->__GET('destino_id'),
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
    public function Registrar(Bannerdestino $data)
    {
        $this->pdo = new Conexion();
        
        try
        {
            $sql ="INSERT INTO bannerdestino (titulo,detalle,foto,destino_id)
                   VALUES (?, ?, ?, ?)";
            $this->pdo->prepare($sql)
                    ->execute(
                        array(
                                $data->__GET('titulo'),
                                $data->__GET('detalle'),
                                $data->__GET('foto'),
                                $data->__GET('destino_id'),
                           
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
