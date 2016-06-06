<?php

class Testimonio
{
    private $id;
    private $nombre;
    private $correo;
    private $fecha;
    private $detalle;
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
            
            $stm = $this->pdo->prepare('SELECT t.id,t.nombre,t.correo,t.fecha,t.detalle,t.foto,t.idioma_id,t.estado,i.nombre AS idioma_nombre FROM testimonio t INNER JOIN idioma i ON i.id=t.idioma_id WHERE t.estado=1');
            $stm->execute();
            
            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new Testimonio();
                $alm->__SET('id',$r->id);
                $alm->__SET('nombre',$r->nombre);
                $alm->__SET('correo',$r->correo);
                $alm->__SET('fecha',$r->fecha);
                $alm->__SET('detalle',$r->detalle);
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
            
            $stm = $this->pdo->prepare('SELECT id, nombre FROM testimonio WHERE estado=1');
            $stm->execute();
            
            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new Testimonio();
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
                    ->prepare("SELECT * FROM testimonio WHERE id =?");
            
            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $alm = new Testimonio();
            
            $alm->__SET('id',$r->id);
            $alm->__SET('nombre',$r->nombre);
            $alm->__SET('correo',$r->correo);
            $alm->__SET('fecha',$r->fecha);
            $alm->__SET('detalle',$r->detalle);
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
            $stm = $this->pdo->prepare('DELETE FROM testimonio WHERE id=?');
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
    public function Actualizar(Testimonio $data)
    {
        $this->pdo = new Conexion();
        try
        {
            $sql = "UPDATE testimonio SET 
                            nombre=?,
                            correo=?,
                            fecha=?,
                            detalle=?,
                            foto=?,
                            idioma_id=?,
                            estado=?
                            
                    WHERE id=? ";
            $this->pdo->prepare($sql)
                    ->execute(
                        array(
                                $data->__GET('nombre'),
                                $data->__GET('correo'),
                                $data->__GET('fecha'),
                                $data->__GET('detalle'),
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
    public function Registrar(Testimonio $data)
    {
        $this->pdo = new Conexion();
        
        try
        {
            $sql ="INSERT INTO testimonio (nombre,correo,fecha,detalle,foto,idioma_id,estado)
                   VALUES (?, ?, ?, ?, ?, ?, ?)";
            $this->pdo->prepare($sql)
                    ->execute(
                        array(
                                $data->__GET('nombre'),
                                $data->__GET('correo'),
                                $data->__GET('fecha'),
                                $data->__GET('detalle'),
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
