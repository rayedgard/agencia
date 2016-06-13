<?php

class Programa
{
    private $id;
    private $fechainicio;
    private $fechafin;
    private $disponible;
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
    public function Listar($idPrograma)
    {
        $this->pdo = new Conexion();
        try
        {
            $result = array();
            
            $stm = $this->pdo->prepare('SELECT p.id,p.fechainicio,p.fechafin,p.disponible,p.subcategoria_id,p.estado,s.nombre AS subcategoria_nombre FROM Programa p INNER JOIN subcategoria s ON s.id=p.subcategoria_id WHERE p.subcategoria_id='.$idPrograma);
            $stm->execute();
            
            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new Programa();
                $alm->__SET('id',$r->id);
                $alm->__SET('fechainicio',$r->fechainicio);
                $alm->__SET('fechafin',$r->fechafin);
                $alm->__SET('disponible',$r->disponible);
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
    

    public function programaSubcategoria($idPrograma)
    {
        $this->pdo = new Conexion();
        try
        {
            $result = array();
            
            $stm = $this->pdo->prepare('SELECT p.id,p.fechainicio,p.fechafin,p.disponible,p.subcategoria_id,p.estado,s.nombre AS subcategoria_nombre FROM Programa p INNER JOIN subcategoria s ON s.id=p.subcategoria_id WHERE p.subcategoria_id='.$idPrograma);
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
     * lista la el id y fechainicio para cargar en un combo
     * retorna: id, fechainicio
     * estado = 1 (activo)
     */
    public function ListarCombo()
    {
        $this->pdo = new Conexion();
        try
        {
            $result = array();
            
            $stm = $this->pdo->prepare('SELECT id, fechainicio FROM programa WHERE estado=1');
            $stm->execute();
            
            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new Programa();
                $alm->__SET('id',$r->id);
                $alm->__SET('fechainicio',$r->fechainicio);
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
                    ->prepare("SELECT * FROM programa WHERE id =?");
            
            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $alm = new Programa();
            
            $alm->__SET('id',$r->id);
            $alm->__SET('fechainicio',$r->fechainicio);
            $alm->__SET('fechafin',$r->fechafin);
            $alm->__SET('disponible',$r->disponible);
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
            $stm = $this->pdo->prepare('DELETE FROM programa WHERE id=?');
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
    public function Actualizar(Programa $data)
    {
        $this->pdo = new Conexion();
        try
        {
            $sql = "UPDATE programa SET 
                            fechainicio=?,
                            fechafin=?,
                            disponible=?,
                            subcategoria_id=?,
                            estado=?
                            
                    WHERE id=? ";
            $this->pdo->prepare($sql)
                    ->execute(
                        array(
                                $data->__GET('fechainicio'),
                                $data->__GET('fechafin'),
                                $data->__GET('disponible'),
                                $data->__GET('subcategoria_id'),
                                $data->__GET('estado'),
                                $data->__GET('id')
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
    public function Registrar(Programa $data)
    {
        $this->pdo = new Conexion();
        
        try
        {
            $sql ="INSERT INTO programa (fechainicio,fechafin,disponible,subcategoria_id,estado)
                   VALUES (?, ?, ?, ?, ?)";
            $this->pdo->prepare($sql)
                    ->execute(
                        array(
                                $data->__GET('fechainicio'),
                                $data->__GET('fechafin'),
                                $data->__GET('disponible'),
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
