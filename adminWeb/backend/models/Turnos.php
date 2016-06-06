<?php



/**
 * Description of Rol
 *
 * @author Edgard Rayme
 */
class Turnos
{
    //put your code here

    private $NombreTurno;
    private $Nomenclatura;
    private $HoraEntrada;
    private $HoraSalida;
    private $Detalles;
    private $idTurno;
 
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
     * @return \Rol
     */
    public function Listar()
    {
        $this->pdo = new Conexion();
        try
        {
            $result= array();
            $stm = $this->pdo->prepare("SELECT NombreTurno,Nomenclatura,HoraEntrada,HoraSalida,Detalles FROM tahor_turnos GROUP BY idTurno");
            $stm->execute();
            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new Turnos();
                $alm->__SET('NombreTurno',$r->NombreTurno);
                $alm->__SET('Nomenclatura',$r->Nomenclatura);
                $alm->__SET('HoraEntrada',$r->HoraEntrada);
                $alm->__SET('HoraSalida',$r->HoraSalida);
                $alm->__SET('Detalles',$r->Detalles);
                
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
     * lista los valores de las columnas solicitadas
     * @param type $table 
     * @param type $rows
     * @return \Rol
     */
    public function ListaTurno($dni,$fecha)
    {
        $this->pdo = new Conexion();
        try
        {
            $stm = $this->pdo->prepare("SELECT idTurno FROM tnuevo_dia WHERE DocumentoDNI=? AND fecha= ?");

            $stm->execute(array($dni,$fecha));
            $r = $stm->fetch(PDO::FETCH_ASSOC);

            return $r['idTurno'];
         } 
        catch (Exception $ex) 
        {
            die($ex->getMessage());
        }
    }
}




?>



