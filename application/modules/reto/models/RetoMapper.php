
<?php
/**
 * Clase que procesas las consultas de personalizadas para las vistas
 *
 * @author EasyDev:Team
 **/
class Reto_Model_RetoMapper extends Model_DataMapperAbstract
{
    private static $_instance = null;    
	private $_objectFilter = null;


    public function  __construct() {
		$this->_objectFilter = new Reto_Model_Reto();		
		$this->_primarykey = 'reto_id';
   		$this->_nametable = $this->_prefijo.'_reto';
    }    

	protected function getSelectInit(){
		$db = $this->getDb();

        $select = $db->select();
       	$select->from(array('a' => $this->_nametable));
       	$select->columns(array( 'a.*'));
		return $select;
	}

	/**
	* Optiene la información de un registro especifico por el Id
	*
	* @author EasyDev:Team
	*/
    public function getById($id){
    	if( !$id > 0)return new Reto_Model_Reto();
    	$db = $this->getDb();
		$select = $this->getSelectInit();
		$select->where('a.'.$this->_primarykey.' = ?', $id);
       	
		$result = $db->fetchRow($select);
		return $this->_populate($result);
    }

	/**
	 * Función para agregar un registro a la base de dato
	 * @author EasyDev:Team
	 * @param  $data Array de argumentos
	 */
	public function Add($data){

		$bckData = $data;
		$db = $this->getDb();
		$db->insert($this->_nametable, $data);
		$id =  $db->lastInsertId($this->_nametable);
		$this->filePublico($data, $id);
		return $id;	
	}

	public function UpdateData($data){
		if(array_key_exists('imagen', $data) && $data['imagen']=="")
			unset($data['imagen']);
		else
			$this->filePublico($data, $data["reto_id"]);
		
		$db = $this->getDb();
		$where = array(0 => "reto_id = ".$data["reto_id"]);
		return $db->update($this->_nametable, $data, $where);
	}	

	/**
	 * Elimina un registro de la BD por el ID
	 * @author EasyDev:Team
	 */
    public function DeleteData($id){
    	$db = $this->getDb();
   		$where = array(0 => "reto_id = ".$id);
		$db->delete($this->_nametable, $where);		
	}


	protected function BuildWhere($select){
		if($this->_objectFilter->getEstado() > 0) 
			$select->where("a.estado = ?",$this->_objectFilter->getEstado());

		if(strlen($this->_objectFilter->get_Fbuscar())>1){
			$select->where(' a.titulo like "%'.$this->_objectFilter->get_Fbuscar().'%" OR a.descripcioncorta like "%'.$this->_objectFilter->get_Fbuscar().'%" OR a.descripcioncompleta like "%'.$this->_objectFilter->get_Fbuscar().'%" OR a.urlvideo like "%'.$this->_objectFilter->get_Fbuscar().'%" ');
		}
		if(count($this->_objectFilter->getOrderBy())>0){
			$select->order($this->_objectFilter->getOrderBy());
		}else{

            $select->order("reto_id desc");
		}
		
		return $select;
	}



	/**
     * Pobla el objeto con los valores del array de datos
     * @author EasyDev:Team
     * @param  Array con la info de la BD
     */
	public function _populate($data){
		$object = new Reto_Model_Reto();
		if($data == null)return $object;
		$label = null;
		if(array_key_exists("reto_id", $data)){
			$object->setId($data["reto_id"]);
			$object->setConteosolucionadores($this->getCountSolucionadores($data["reto_id"]));
		}
		if(array_key_exists("titulo", $data))$object->setTitulo($data["titulo"]);
		if(array_key_exists("descripcioncorta", $data))$object->setDescripcioncorta($data["descripcioncorta"]);
		if(array_key_exists("descripcioncompleta", $data))$object->setDescripcioncompleta($data["descripcioncompleta"]);
		if(array_key_exists("urlvideo", $data))$object->setUrlvideo($data["urlvideo"]);
		if(array_key_exists("imagen", $data))$object->setImagen($data["imagen"]);
		if(array_key_exists("fechainicio", $data))$object->setFechainicio($data["fechainicio"]);
		if(array_key_exists("fechafin", $data))$object->setFechafin($data["fechafin"]);
	if(array_key_exists("estado", $data)){
		$object->setEstado($data["estado"]);
		if($this->getPerezoso()){
			$estadoDB = new Reto_Model_EstadosdelretoMapper();
			$estadoDB->setPerezoso(false);
			//$objectRelacion = $estadoDB->getById(0);	
			$objectRelacion = $estadoDB->getById($data["estado"]);	
			$object->setEstadoObject($objectRelacion);
		}	
	}




 		return $object;
	}

	/**
     * Combirte el objeto enviado en un array de atributos
     * @author EasyDev:Team
     * @return  Array con los atrubutos del mapper
     */
	public function _depopulate($object){
		$_array = array(); 
		if($object == null)return $_array;
		$_array["reto_id"]=$object->getId();
		$_array["titulo"] = $object->getTitulo();
		$_array["descripcioncorta"] = $object->getDescripcioncorta();
		$_array["descripcioncompleta"] = $object->getDescripcioncompleta();
		$_array["urlvideo"] = $object->getUrlvideo();
		$_array["imagen"] = $object->getImagen();
		$_array["fechainicio"] = $object->getFechainicio();
		$_array["fechafin"] = $object->getFechafin();
		$_array["estado"] = $object->getEstado();
 		return $_array;
	}

	/**
	 * Agrega los filtros del buscador en la consulta
	 * @author EasyDev:Team
	 */
	public function _populateFiltros($data){
		$this->_objectFilter = new Reto_Model_Reto();
		if($data == null)return;
		$this->setPerezoso(false);
		$this->_objectFilter = $this->_populate($data);
		if(array_key_exists("buscar", $data)) $this->_objectFilter->set_Fbuscar($data["buscar"]);
		if(array_key_exists("sort", $data) && strlen($data["sort"]) > 1)	$this->_objectFilter->addOrderBy($data["sort"]);
	}


	/**
	 * Retorna listado resultado de una consulta con o sin filtro.
	 *
	 * @author EasyDev:Team
	 **/
	public function getList($perezoso = true){
		$select = $this->getListSelect();
		$stmt = $select->query();
		$objects = array();
		$this->setPerezoso($perezoso);
		foreach ($stmt->fetchAll() as $row){
			$objects[]= $this->_populate($row);
		}
		return $objects;
	}
	
	/**
	 * Retorna Contador de resultado de una consulta con o sin filtro.
	 *
	 * @author EasyDev:Team
	 **/
	public function getCountList(){
		$select = $this->getListSelect();
		$stmt = $select->query();
		$objects = array();
		return count($stmt->fetchAll());
	}

	public function getPaginator($page, $nregistro){ 
		$paginator= new Zend_Paginator(new Zend_Paginator_Adapter_DbSelect($this->getListSelect()));
		$paginator->setItemCountPerPage($nregistro)->setCurrentPageNumber($page);
		$paginator->_objects = array();
		$this->setPerezoso(true);
		foreach ($paginator as $row){
			$paginator->_objects[]= $this->_populate($row);
		}
		return $paginator;
	}


	/**
	 * Reinicia el objeto de filtros.
	 *
	 * @author EasyDev:Team
	 **/
	public function CleanFilter(){
		$this->_objectFilter = new Reto_Model_Reto();
	}	

  
    public static function getInstance(){
        if(is_null(self::$_instance)){
            $c = __CLASS__;
            self::$_instance = new $c;
        }
        return self::$_instance;
    }

    public function getCountSolucionadores($idReto){
		$db = $this->getDb();

		$query = "SELECT COUNT(*) AS count FROM ve_solucionadores where reto = ".$idReto;

		$rst = $db->query($query);
		$res = $rst->fetch();
		return $res["count"];
	}

	private function filePublico($data, $id)
	{
		if(array_key_exists('archivo', $data) && strlen($data['archivo'])>0 )
		{
			$archivo = $data['archivo'];
			$extension = end(explode('.',$archivo));
			copy("Files/temp/retoimagen/".$data['archivo'], "Files/retoimagen/".$id.".".$extension);
			unlink("Files/temp/retoimagen/".$data['archivo']);
		}
	}

}
