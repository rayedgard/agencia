<?php

class BannerGeneral
{
    private $id;
    private $titulo;
    private $detalle;
    private $foto;
    private $idioma_id;

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
            
            $stm = $this->pdo->prepare('SELECT b.id,b.titulo,b.detalle,b.foto,b.idioma_id, i.nombre AS idioma_nombre FROM bannergeneral b INNER JOIN idioma i ON i.id=b.idioma_id');
            $stm->execute();
            
            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new BannerGeneral();
                $alm->__SET('id',$r->id);
                $alm->__SET('titulo',$r->titulo);
                $alm->__SET('detalle',$r->detalle);
                $alm->__SET('foto',$r->foto);
                $alm->__SET('idioma_id',$r->idioma_id);
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

        public function listarBaner($id)
    {
        $this->pdo = new Conexion();
        try
        {
            $result = array();
            
            $stm = $this->pdo->prepare('SELECT id,titulo,detalle,foto FROM bannergeneral WHERE idioma_id ='.$id);
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
     * Obtiene los datos de un registro especifico
     * @param type $id
     * @return \Sede
     */
    public function Obtener($id)
    {
        $this->pdo = new Conexion();
        try{
            
            $stm = $this->pdo
                    ->prepare("SELECT * FROM bannergeneral WHERE id =?");
            
            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $alm = new BannerGeneral();
            
            $alm->__SET('id',$r->id);
            $alm->__SET('titulo',$r->titulo);
            $alm->__SET('detalle',$r->detalle);
            $alm->__SET('foto',$r->foto);
            $alm->__SET('idioma_id',$r->idioma_id);

 
                                 
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
            $stm = $this->pdo->prepare('DELETE FROM bannergeneral WHERE id=?');
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
    public function Actualizar(BannerGeneral $data)
    {
        $this->pdo = new Conexion();
        try
        {
            $sql = "UPDATE bannergeneral SET 
                            titulo=?,
                            detalle=?,
                            foto=?,
                            idioma_id
                                                      
                    WHERE id=? ";
            $this->pdo->prepare($sql)
                    ->execute(
                        array(
                                $data->__GET('titulo'),
                                $data->__GET('detalle'),
                                $data->__GET('foto'),
                                $data->__GET('idioma_id'),
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
    public function Registrar(BannerGeneral $data)
    {
        $this->pdo = new Conexion();
        
        try
        {
            $sql ="INSERT INTO bannergeneral (titulo,detalle,foto,idioma_id)
                   VALUES (?, ?, ?, ?)";
            $this->pdo->prepare($sql)
                    ->execute(
                        array(
                                $data->__GET('titulo'),
                                $data->__GET('detalle'),
                                $data->__GET('foto'),
                                $data->__GET('idioma_id'),
                             
                           
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
