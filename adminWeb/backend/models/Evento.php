<?php

class Evento
{
    private $id;
    private $nombre;
    private $detalle;
    private $mapa;
    private $fechaEvento;
    private $foto;
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
            
            $stm = $this->pdo->prepare('SELECT e.id,e.nombre,e.detalle,e.mapa,e.fechaEvento,e.foto,e.idioma_id,e.estado,i.nombre AS idioma_nombre FROM evento e INNER JOIN idioma i ON i.id=e.idioma_id');
            $stm->execute();
            
            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new Evento();
                $alm->__SET('id',$r->id);
                $alm->__SET('nombre',$r->nombre);
                $alm->__SET('detalle',$r->detalle);
                $alm->__SET('mapa',$r->mapa);
                $alm->__SET('fechaEvento',$r->fechaEvento);
                $alm->__SET('foto',$r->foto);
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
            
            $stm = $this->pdo->prepare('SELECT id, nombre FROM evento WHERE estado=1');
            $stm->execute();
            
            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new Evento();
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
                    ->prepare("SELECT * FROM evento WHERE id =?");
            
            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $alm = new Evento();
            
            $alm->__SET('id',$r->id);
            $alm->__SET('nombre',$r->nombre);
            $alm->__SET('detalle',$r->detalle);
            $alm->__SET('mapa',$r->mapa);
            $alm->__SET('fechaEvento',$r->fechaEvento);
            $alm->__SET('foto',$r->foto);
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
            $stm = $this->pdo->prepare('DELETE FROM evento WHERE id=?');
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
    public function Actualizar(Evento $data)
    {
        $this->pdo = new Conexion();
        try
        {
            $sql = "UPDATE evento SET 
                            nombre=?,
                            detalle=?,
                            mapa=?,
                            fechaEvento=?,
                            foto=?,
                            idioma_id=?,
                            estado=?
                            
                    WHERE id=? ";
            $this->pdo->prepare($sql)
                    ->execute(
                        array(
                                $data->__GET('nombre'),
                                $data->__GET('detalle'),
                                $data->__GET('mapa'),
                                $data->__GET('fechaEvento'),
                                $data->__GET('foto'),
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
    public function Registrar(Evento $data)
    {
        $this->pdo = new Conexion();
        
        try
        {
            $sql ="INSERT INTO evento (nombre,detalle,mapa,fechaEvento,foto,idioma_id,estado)
                   VALUES (?, ?, ?, ?, ?, ?, ?)";
            $this->pdo->prepare($sql)
                    ->execute(
                        array(
                                $data->__GET('nombre'),
                                $data->__GET('detalle'),
                                $data->__GET('mapa'),
                                $data->__GET('fechaEvento'),
                                $data->__GET('foto'),
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
