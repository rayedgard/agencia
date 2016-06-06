<?php


class Rol{
    //put your code here

    private $idDia;
    private $DocumentoDNI;
    private $idTurno;
    private $fecha;
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
     * Elimnar un registro
     * @param type $id
     */
    public function Eliminar($dni,$fecha)
    {   
        $this->pdo = new Conexion();
        try
        {
            $stm = $this->pdo->prepare('DELETE FROM tnuevo_dia WHERE DocumentoDNI=? AND fecha=? ');
            $stm->execute(array($dni,$fecha));
        } 
        catch (Exception $ex) 
        {
            die($ex->getMessage());
        }
    }
    
    

    /**
     * Registra los datos en la BD
     * @param Accion $data
     */
    public function Registrar(Rol $data)
    {
        $this->pdo = new Conexion();
        
        try
        {
            $sql ="INSERT INTO tnuevo_dia(idDia, DocumentoDNI,idTurno,fecha,estado)
                   VALUES (?, ?, ?, ?, ?)";
            $this->pdo->prepare($sql)
                    ->execute(
                        array(
                                $data->__GET('idDia'),
                                $data->__GET('DocumentoDNI'),
                                $data->__GET('idTurno'),
                                $data->__GET('fecha'),
                                $data->__GET('estado')
                        )
                            );
        } 
        catch (Exception $ex) 
        {
            die($ex->getMessage());

        }
    }




       /**
     * lista los valores de las columnas solicitadas
     * @param type $table 
     * @param type $rows
     * @return \Rol
     */
    public function ListaTurno($dni,$anio,$mes)
    {
        $this->pdo = new Conexion();
        try
        {
            $result= array();
            $stm = $this->pdo->prepare("SELECT idTurno,fecha FROM tnuevo_dia WHERE DocumentoDNI=? AND  YEAR(fecha)=? AND MONTH(fecha)=?");

            $stm->execute(array($dni,$anio,$mes));
            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new Rol();
                $alm->__SET('idTurno',$r->idTurno);
                $alm->__SET('fecha',$r->fecha);
                
                $result[]=$alm;
            }

             return $result;
                     

         } 
        catch (Exception $ex) 
        {
            die($ex->getMessage());
        }
    }



}



?>