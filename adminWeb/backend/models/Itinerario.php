<?php

class Itinerario
{
    private $id;
    private $nombre;
    private $detalle;
   
    private $subcategoria_id;
    private $estado;

    private $subcategoria_nombre;
   


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
    public function Listar($idItinerario)
    {
        $this->pdo = new Conexion();
        try
        {
            $result = array();
            
            $stm = $this->pdo->prepare('SELECT i.id,i.nombre,i.detalle,i.subcategoria_id,i.estado,s.nombre AS subcategoria_nombre FROM Itinerario i INNER JOIN subcategoria s ON s.id=i.subcategoria_id WHERE i.subcategoria_id='.$idItinerario);
            $stm->execute();
            
            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new Itinerario();
                $alm->__SET('id',$r->id);
                $alm->__SET('nombre',$r->nombre);
                $alm->__SET('detalle',$r->detalle);
                $alm->__SET('subcategoria_id',$r->subcategoria_id);
                $alm->__SET('estado',$r->estado);
                $alm->__SET('subcategoria_nombre',$r->subcategoria_nombre);
                $result[] = $alm;
            }
            return $result;
        } 
        catch (Exception $ex) 
        {
            die($ex->getMessage());

        }
    }


        public function ItinerarioSubcategoria($idItinerario)
    {
        $this->pdo = new Conexion();
        try
        {
            $result = array();
            
            $stm = $this->pdo->prepare('SELECT i.id,i.nombre,i.detalle,i.subcategoria_id,i.estado,s.nombre AS subcategoria_nombre FROM Itinerario i INNER JOIN subcategoria s ON s.id=i.subcategoria_id WHERE i.subcategoria_id='.$idItinerario);
            $stm->execute();
            
            foreach($stm->fetchAll(PDO::FETCH_ASSOC) as $r)
            {
               array_push($result, $r);
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
            
            $stm = $this->pdo->prepare('SELECT id, nombre FROM itinerario WHERE estado=1');
            $stm->execute();
            
            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new Itinerario();
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
                    ->prepare("SELECT * FROM itinerario WHERE id =?");
            
            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $alm = new Itinerario();
            
            $alm->__SET('id',$r->id);
            $alm->__SET('nombre',$r->nombre);
            $alm->__SET('detalle',$r->detalle);
            $alm->__SET('subcategoria_id',$r->subcategoria_id);
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
            $stm = $this->pdo->prepare('DELETE FROM itinerario WHERE id=?');
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
    public function Actualizar(Itinerario $data)
    {
        $this->pdo = new Conexion();
        try
        {
            $sql = "UPDATE itinerario SET 
                            nombre=?,
                            detalle=?,
                            subcategoria_id=?,
                            estado=?
                            
                    WHERE id=? ";
            $this->pdo->prepare($sql)
                    ->execute(
                        array(
                                $data->__GET('nombre'),
                                $data->__GET('detalle'),
                                $data->__GET('subcategoria_id'),
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
    public function Registrar(Itinerario $data)
    {
        $this->pdo = new Conexion();
        
        try
        {
            $sql ="INSERT INTO itinerario (nombre,detalle,subcategoria_id,estado)
                   VALUES (?, ?, ?, ?)";
            $this->pdo->prepare($sql)
                    ->execute(
                        array(
                                $data->__GET('nombre'),
                                $data->__GET('detalle'),
                                $data->__GET('subcategoria_id'),
                                $data->__GET('estado'),
                           
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
