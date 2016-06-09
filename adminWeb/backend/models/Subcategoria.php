<?php

class Subcategoria
{
    private $id;
    private $nombre;
    private $detalle;
    private $foto;
    private $mapa;
    private $video;
    private $tarifa;
    private $incluye;
    private $hoteles;
    private $restaurante;
    private $perfil_id;
    private $categoria_id;
    private $estado;

    private $categoria_nombre;
    private $perfil_nombre;
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
            
            $stm = $this->pdo->prepare('SELECT s.id,s.nombre,s.detalle,s.foto,s.mapa,s.video,s.tarifa,s.incluye,s.hoteles,s.restaurante,s.perfil_id,s.categoria_id,s.estado,c.nombre AS categoria_nombre,p.nombre AS perfil_nombre,i.nombre AS idioma_nombre FROM subcategoria s INNER JOIN categoria c ON c.id=s.categoria_id   INNER JOIN perfil p ON p.id=s.perfil_id INNER JOIN idioma i ON i.id = c.idioma_id');
            $stm->execute();
            
            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new Subcategoria();
                $alm->__SET('id',$r->id);
                $alm->__SET('nombre',$r->nombre);
                $alm->__SET('detalle',$r->detalle);
                $alm->__SET('foto',$r->foto);
                $alm->__SET('mapa',$r->mapa);
                $alm->__SET('video',$r->video);
                $alm->__SET('tarifa',$r->tarifa);
                $alm->__SET('incluye',$r->incluye);
                $alm->__SET('hoteles',$r->hoteles);
                $alm->__SET('restaurante',$r->restaurante);
                $alm->__SET('perfil_id',$r->perfil_id);
                $alm->__SET('categoria_id',$r->categoria_id);
                $alm->__SET('estado',$r->estado);
                
                $alm->__SET('categoria_nombre',$r->categoria_nombre);
                $alm->__SET('perfil_nombre',$r->perfil_nombre);
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
            
            $stm = $this->pdo->prepare('SELECT id, nombre FROM subcategoria WHERE estado=1');
            $stm->execute();
            
            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new Subcategoria();
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
                    ->prepare("SELECT * FROM subcategoria WHERE id =?");
            
            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $alm = new Subcategoria();
            
            $alm->__SET('id',$r->id);
            $alm->__SET('nombre',$r->nombre);
            $alm->__SET('detalle',$r->detalle);
            $alm->__SET('foto',$r->foto);
            $alm->__SET('mapa',$r->mapa);
            $alm->__SET('video',$r->video);
            $alm->__SET('tarifa',$r->tarifa);
            $alm->__SET('incluye',$r->incluye);
            $alm->__SET('hoteles',$r->hoteles);
            $alm->__SET('restaurante',$r->restaurante);
            $alm->__SET('perfil_id',$r->perfil_id);
            $alm->__SET('categoria_id',$r->categoria_id);
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
            $stm = $this->pdo->prepare('DELETE FROM subcategoria WHERE id=?');
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
    public function Actualizar(Subcategoria $data)
    {
        $this->pdo = new Conexion();
        try
        {
            $sql = "UPDATE subcategoria SET 
                            nombre=?,
                            detalle=?,
                            foto=?,
                            mapa=?,
                            video=?,
                            tarifa=?,
                            incluye=?,
                            hoteles=?,
                            restaurante=?,
                            perfil_id=?,
                            categoria_id=?,
                            estado=?
                            
                    WHERE id=? ";
            $this->pdo->prepare($sql)
                    ->execute(
                        array(
                                $data->__GET('nombre'),
                                $data->__GET('detalle'),
                                $data->__GET('foto'),
                                $data->__GET('mapa'),
                                $data->__GET('video'),
                                $data->__GET('tarifa'),
                                $data->__GET('incluye'),
                                $data->__GET('hoteles'),
                                $data->__GET('restaurante'),
                                $data->__GET('perfil_id'),
                                $data->__GET('categoria_id'),
                                $data->__GET('estado'),
                                $data->__GET('id'),
                                )
                        );
                    
                    
        } catch (Exception $ex) 
        {
            die($ex->getMessage());
        }
    }
    
 
    public function Registrar(Subcategoria $data)
    {
        $this->pdo = new Conexion();
        
        try
        {
            $sql ="INSERT INTO subcategoria (nombre,detalle,foto,mapa,video,tarifa,incluye,hoteles,restaurante,perfil_id,categoria_id,estado)
                   VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $this->pdo->prepare($sql)
                    ->execute(
                        array(
                                $data->__GET('nombre'),
                                $data->__GET('detalle'),
                                $data->__GET('mapa'),
                                $data->__GET('video'),
                                $data->__GET('tarifa'),
                                $data->__GET('incluye'),
                                $data->__GET('hoteles'),
                                $data->__GET('restaurante'),
                                $data->__GET('perfil_id'),
                                $data->__GET('categoria_id'),
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

