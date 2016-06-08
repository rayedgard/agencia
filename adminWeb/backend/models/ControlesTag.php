<?php

class ControlesTags
{
    private $idControl;
    private $tipoTag;
    private $nombre;
    private $identificador;
    private $idIdioma;

   


    public function __get($name) {
        return $this->$name;
    }
    
    public function __set($name, $value) {
        return $this->$name=$value;
        
    }
    
    private $pdo;
    
    /**
     * lista los valores de las columnas 
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
            
            $stm = $this->pdo->prepare('SELECT *  FROM controlestags  WHERE tipoTag="linkMenu"');
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
    /*
    listar botones segun el idioma
    */
     /**
     * Obtiene los datos de un registro segun el idioma
     * @param type $id
     * @return \Sede
     */
    public function ListarTags($idIdioma,$link)
    {
        $this->pdo = new Conexion();
        try
        {
            $result = array();
            
            $stm = $this->pdo->prepare('SELECT *  FROM controlestags  WHERE id='.$idIdioma.' AND tipoTag="'.$link.'"' );
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
    

    public function ListarTagsLavelsUni($idIdioma,$link,$control)
    {
    	$this->pdo = new Conexion();
        try
        {
            $result = array();
            
            $stm = $this->pdo->prepare('SELECT *  FROM controlestags  WHERE id='.$idIdioma.' AND tipoTag="'.$link.'"  and identificador = "'.$control."'" );
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
 
    
}


?>


