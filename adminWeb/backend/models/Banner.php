<?php

class Banner
{
    private $id;
    private $titulo;
    private $detalle;
    private $foto;
    private $subcategoria_id;

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
    public function Listar($idDestino)
    {
        $this->pdo = new Conexion();
        try
        {
            $result = array();
            
            $stm = $this->pdo->prepare('SELECT b.id,b.titulo,b.detalle,b.foto,b.subcategoria_id,s.nombre AS subcategoria_nombre FROM banner b INNER JOIN subcategoria s ON s.id=b.subcategoria_id WHERE b.subcategoria_id='.$idDestino);
            $stm->execute();
            
            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new Banner();
                $alm->__SET('id',$r->id);
                $alm->__SET('titulo',$r->titulo);
                $alm->__SET('detalle',$r->detalle);
                $alm->__SET('foto',$r->foto);
                $alm->__SET('subcategoria_id',$r->subcategoria_id);
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


    public function bannerSubcategoria($idDestino)
    {
        $this->pdo = new Conexion();
        try
        {
            $result = array();
            
            $stm = $this->pdo->prepare('SELECT b.id,b.titulo,b.detalle,b.foto,b.subcategoria_id,s.nombre AS subcategoria_nombre FROM banner b INNER JOIN subcategoria s ON s.id=b.subcategoria_id WHERE b.subcategoria_id='.$idDestino);
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
            
            $stm = $this->pdo->prepare('SELECT id, titulo FROM banner');
            $stm->execute();
            
            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new Banner();
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
                    ->prepare("SELECT * FROM banner WHERE id =?");
            
            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $alm = new Banner();
            
            $alm->__SET('id',$r->id);
            $alm->__SET('titulo',$r->titulo);
            $alm->__SET('detalle',$r->detalle);
            $alm->__SET('foto',$r->foto);
            $alm->__SET('subcategoria_id',$r->subcategoria_id);
                                 
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
            $stm = $this->pdo->prepare('DELETE FROM banner WHERE id=?');
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
    public function Actualizar(Banner $data)
    {
        $this->pdo = new Conexion();
        try
        {
            $sql = "UPDATE banner SET 
                            titulo=?,
                            detalle=?,
                            foto=?,
                            subcategoria_id=?
                            
                    WHERE id=? ";
            $this->pdo->prepare($sql)
                    ->execute(
                        array(
                                $data->__GET('titulo'),
                                $data->__GET('detalle'),
                                $data->__GET('foto'),
                                $data->__GET('subcategoria_id'),
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
    public function Registrar(Banner $data)
    {
        $this->pdo = new Conexion();
        
        try
        {
            $sql ="INSERT INTO banner (titulo,detalle,foto,subcategoria_id)
                   VALUES (?, ?, ?, ?)";
            $this->pdo->prepare($sql)
                    ->execute(
                        array(
                                $data->__GET('titulo'),
                                $data->__GET('detalle'),
                                $data->__GET('foto'),
                                $data->__GET('subcategoria_id'),
                           
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

