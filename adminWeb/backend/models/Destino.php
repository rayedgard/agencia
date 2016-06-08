<?php

class Destino
{
    private $id;
    private $nombre;
    private $etiqueta;
    private $detalle;
    private $mapa;
    private $clima;
    private $comollegar;
    private $servicios;
    private $idioma_id;
    private $estado;

    private $idioma_nombre;
   


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
            
            $stm = $this->pdo->prepare('SELECT d.id,d.nombre,d.etiqueta,d.detalle,d.mapa,d.clima,d.comollegar,d.servicios,d.idioma_id,d.estado,i.nombre AS idioma_nombre  FROM destino d INNER JOIN idioma i ON i.id=d.idioma_id WHERE d.estado=1');
            $stm->execute();
            
            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new Destino();
                $alm->__SET('id',$r->id);
                $alm->__SET('nombre',$r->nombre);
                $alm->__SET('etiqueta',$r->etiqueta);
                $alm->__SET('detalle',$r->detalle);
                $alm->__SET('mapa',$r->mapa);
                $alm->__SET('clima',$r->clima);
                $alm->__SET('comollegar',$r->comollegar);
                $alm->__SET('servicios',$r->servicios);
                $alm->__SET('idioma_id',$r->idioma_id);
                $alm->__SET('estado',$r->estado);
                $alm->__SET('idioma_nombre',$r->idioma_nombre);
                $result[] = $alm;
            }
            return $result;
        } 
        catch (Exception $ex) 
        {
            die($ex->getMessage());

        }
    }

        public function ListarDestino($id)
    {
        $this->pdo = new Conexion();
        try
        {
            $result = array();
            
            $stm = $this->pdo->prepare('SELECT d.id,d.nombre,d.etiqueta,d.detalle, b.foto AS foto_destino  FROM destino d INNER JOIN bannerdestino b ON b.destino_id=d.id WHERE d.estado=1 and d.idioma_id='.$id);
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
            
            $stm = $this->pdo->prepare('SELECT id, nombre FROM destino WHERE estado=1');
            $stm->execute();
            
            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new Destino();
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
    /*
    lista id y nombre para cargar un combo , pero devulve un arreglo
    de tales datos

    */
        public function ListarComboArray($idioma)
    {
        $this->pdo = new Conexion();
        try
        {
            $result = array();
            
            $stm = $this->pdo->prepare('SELECT id, nombre FROM destino WHERE estado=1 and idioma_id='.$idioma);
            $stm->execute();
            
            foreach($stm->fetchAll(PDO::FETCH_ASSOC) as $r)
            {
                 array_push($result,$r);
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
                    ->prepare("SELECT * FROM destino WHERE id =?");
            
            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $alm = new Destino();
            
            $alm->__SET('id',$r->id);
            $alm->__SET('nombre',$r->nombre);
            $alm->__SET('etiqueta',$r->etiqueta);
            $alm->__SET('detalle',$r->detalle);
            $alm->__SET('mapa',$r->mapa);
            $alm->__SET('clima',$r->clima);
            $alm->__SET('comollegar',$r->comollegar);
            $alm->__SET('servicios',$r->servicios);
            $alm->__SET('idioma_id',$r->idioma_id);
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
            $stm = $this->pdo->prepare('DELETE FROM destino WHERE id=?');
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
    public function Actualizar(Destino $data)
    {
        $this->pdo = new Conexion();
        try
        {
            $sql = "UPDATE destino SET 
                            nombre=?,
                            etiqueta=?,
                            detalle=?,
                            mapa=?,
                            clima=?,
                            comollegar=?,
                            servicios=?,
                            idioma_id=?,
                            estado=?
                            
                    WHERE id=? ";
            $this->pdo->prepare($sql)
                    ->execute(
                        array(
                                $data->__GET('nombre'),
                                $data->__GET('etiqueta'),
                                $data->__GET('detalle'),
                                $data->__GET('mapa'),
                                $data->__GET('clima'),
                                $data->__GET('comollegar'),
                                $data->__GET('servicios'),
                                $data->__GET('idioma_id'),
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
    public function Registrar(Destino $data)
    {
        $this->pdo = new Conexion();
        
        try
        {
            $sql ="INSERT INTO destino (nombre,etiqueta,detalle,mapa,clima,comollegar,servicios,idioma_id,estado)
                   VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $this->pdo->prepare($sql)
                    ->execute(
                        array(
                                $data->__GET('nombre'),
                                $data->__GET('etiqueta'),
                                $data->__GET('detalle'),
                                $data->__GET('mapa'),
                                $data->__GET('clima'),
                                $data->__GET('comollegar'),
                                $data->__GET('servicios'),
                                $data->__GET('idioma_id'),
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
