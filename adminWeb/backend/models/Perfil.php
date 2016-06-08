<?php

class Perfil
{
    private $id;
    private $nombre;
    private $cargo;
    private $telefono;
    private $correo;
    private $foto;
    private $detalle;
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
            
            $stm = $this->pdo->prepare('SELECT p.id,p.nombre,p.cargo,p.telefono,p.correo,p.foto,p.detalle,p.idioma_id,p.estado,i.nombre AS idioma_nombre FROM perfil p INNER JOIN idioma i ON i.id=p.idioma_id WHERE p.estado=1');
            $stm->execute();
            
            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new Perfil();
                $alm->__SET('id',$r->id);
                $alm->__SET('nombre',$r->nombre);
                $alm->__SET('cargo',$r->cargo);
                $alm->__SET('telefono',$r->telefono);
                $alm->__SET('correo',$r->correo);
                $alm->__SET('foto',$r->foto);
                $alm->__SET('detalle',$r->detalle);
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
    

        public function ListarPerfil($id)
    {
        $this->pdo = new Conexion();
        try
        {
            $result = array();
            
            $stm = $this->pdo->prepare('SELECT p.id,p.nombre,p.cargo,p.telefono,p.correo,p.foto,p.detalle,p.idioma_id,p.estado FROM perfil p WHERE p.estado=1 and p.idioma_id ='.$id);
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
            
            $stm = $this->pdo->prepare('SELECT id, nombre FROM perfil WHERE estado=1');
            $stm->execute();
            
            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new Perfil();
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
                    ->prepare("SELECT * FROM perfil WHERE id =?");
            
            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $alm = new Perfil();
            
            $alm->__SET('id',$r->id);
            $alm->__SET('nombre',$r->nombre);
            $alm->__SET('cargo',$r->cargo);
            $alm->__SET('telefono',$r->telefono);
            $alm->__SET('correo',$r->correo);
            $alm->__SET('foto',$r->foto);
            $alm->__SET('detalle',$r->detalle);
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
            $stm = $this->pdo->prepare('DELETE FROM perfil WHERE id=?');
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
    public function Actualizar(Perfil $data)
    {
        $this->pdo = new Conexion();
        try
        {
            $sql = "UPDATE perfil SET 
                            nombre=?,
                            cargo=?,
                            telefono=?,
                            correo=?,
                            foto=?,
                            detalle=?,
                            idioma_id=?,
                            estado=?
                            
                    WHERE id=? ";
            $this->pdo->prepare($sql)
                    ->execute(
                        array(
                                $data->__GET('nombre'),
                                $data->__GET('cargo'),
                                $data->__GET('telefono'),
                                $data->__GET('correo'),
                                $data->__GET('foto'),
                                $data->__GET('detalle'),
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
    public function Registrar(Perfil $data)
    {
        $this->pdo = new Conexion();
        
        try
        {
            $sql ="INSERT INTO perfil (nombre,cargo,telefono,correo,foto,detalle,idioma_id,estado)
                   VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $this->pdo->prepare($sql)
                    ->execute(
                        array(
                                $data->__GET('nombre'),
                                $data->__GET('cargo'),
                                $data->__GET('telefono'),
                                $data->__GET('correo'),
                                $data->__GET('foto'),
                                $data->__GET('detalle'),
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

