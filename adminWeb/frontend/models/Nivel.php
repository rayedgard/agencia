<?php
require_once '/../../config/conexion.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Periodo
 *
 * @author CR
 */
class Nivel {
    //put your code here
    
    
    private $id;
    private $nombre;
    private $nomeclatura;
    private $estado;
    //put your code here
    
    public function __get($name) {
        return $this->$name;
    }
    
    public function __set($name, $value) {
        return $this->$name = $value;
    }
    
    private $pdo;
    
    /**
     * lista los valores de las columnas solicitadas
     * @param type $table 
     * @param type $rows
     * @return \Nivel
     */
    public function Listar($table, $rows="*")
    {
        $this->pdo = new Conexion();
        try
        {
            $result= array();
            $stm = $this->pdo->prepare('SELECT '.$rows.' FROM '.$table);
            $stm->execute();
            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new Horario();
                $alm->__SET('id',$r->id);
                $alm->__SET('nombre',$r->nombre);
                $alm->__SET('nomeclatura',$r->nomeclatura);
                $alm->__SET('estado',$r->estado);
                $result[]=$alm;
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
     * @return \Nivel
     */
    public function Obtener($id)
    {
        $this->pdo = new Conexion();
        try{
            
            $stm = $this->pdo
                    ->prepare("SELECT * FROM nivel WHERE id =?");
            
            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $alm = new Nivel();
            
            $alm->__SET('id',$r->id);
            $alm->__SET('nombre',$r->nombre);
            $alm->__SET('nomeclatura',$r->nomeclatura);
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
            $stm = $this->pdo->prepare('DELETE FROM nivel WHERE id=?');
            $stm->execute(array($id));
        } 
        catch (Exception $ex) 
        {
            die($ex->getMessage());
        }
    }
    
    /**
     * Actualiza los datos en la BD
     * @param Nivel $data
     */
    public function Actualizar(Nivel $data)
    {
        $this->pdo = new Conexion();
        try
        {
            $sql = "UPDATE sede SET 
                            nombre =?,
                            nomeclatura=?,
                            estado=?
                    WHERE id=? ";
            $this->pdo->prepare($sql)
                    ->execute(
                        array(
                                $data->__GET('nombre'),
                                $data->__GET('nomeclatura'),
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
     * @param Nivel $data
     */
    public function Registrar(Nivel $data)
    {
        $this->pdo = new Conexion();
        
        try
        {
            $sql ="INSERT INTO nivel (nombre, nomeclatura,  estado)
                   VALUES (?, ?, ?, ?)";
            $this->pdo->prepare($sql)
                    ->execute(
                        array(
                                $data->__GET('nombre'),
                                $data->__GET('nomeclatura'),
                                $data->__GET('horarFin'),
                                $data->__GET('estado')
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



