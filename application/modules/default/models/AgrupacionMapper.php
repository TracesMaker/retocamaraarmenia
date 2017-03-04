<?php
/**
 * Clase que procesas las consultas de personalizadas para las vistas
 *
 * @author EasyDev:Team
 **/
class Model_AgrupacionMapper extends Model_DataMapperAbstract
{
    private static $_instance = null;    
	private $_objectFilter = null;


    public function  __construct() {
		$this->_objectFilter = new Model_Agrupacion();		
		$this->_primarykey = 'agrupacion_id';
   		$this->_nametable = $this->_prefijo.'_agrupacion';
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
    	if( !$id > 0)return new Model_Agrupacion();
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
		return $id;	
	}

	public function UpdateData($data){
		$db = $this->getDb();
		$where = array(0 => "agrupacion_id = ".$data["agrupacion_id"]);
		return $db->update($this->_nametable, $data, $where);
	}	

	/**
	 * Elimina un registro de la BD por el ID
	 * @author EasyDev:Team
	 */
    public function DeleteData($id){
    	$db = $this->getDb();
   		$where = array(0 => "agrupacion_id = ".$id);
		$db->delete($this->_nametable, $where);		
	}


	protected function BuildWhere($select){
		if($this->_objectFilter->getAtipoagrupacion() > 0) 
			$select->where("a.atipoagrupacion = ?",$this->_objectFilter->getAtipoagrupacion());

		if(strlen($this->_objectFilter->get_Fbuscar())>1){
			$select->where(' a.aabreviatura like "%'.$this->_objectFilter->get_Fbuscar().'%" OR a.alabel like "%'.$this->_objectFilter->get_Fbuscar().'%" ');
		}
		if(count($this->_objectFilter->getOrderBy())>0){
			$select->order($this->_objectFilter->getOrderBy());
		}else{

            $select->order("agrupacion_id desc");
		}
		
		return $select;
	}



	/**
     * Pobla el objeto con los valores del array de datos
     * @author EasyDev:Team
     * @param  Array con la info de la BD
     */
	public function _populate($data){
		$object = new Model_Agrupacion();
		if($data == null)return $object;
		$label = null;
		if(array_key_exists("agrupacion_id", $data))$object->setId($data["agrupacion_id"]);
		if(array_key_exists("aabreviatura", $data))$object->setAabreviatura($data["aabreviatura"]);
		if(array_key_exists("alabel", $data))$object->setAlabel($data["alabel"]);
	if(array_key_exists("atipoagrupacion", $data)){
		$object->setAtipoagrupacion($data["atipoagrupacion"]);
		if($this->getPerezoso()){
			$atipoagrupacionDB = new Model_TipoagrupacionMapper();
			$atipoagrupacionDB->setPerezoso(false);
			//$objectRelacion = $atipoagrupacionDB->getById(0);	
			$objectRelacion = $atipoagrupacionDB->getById($data["atipoagrupacion"]);	
			$object->setAtipoagrupacionObject($objectRelacion);
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
		$_array["agrupacion_id"]=$object->getId();
		$_array["aabreviatura"] = $object->getAabreviatura();
		$_array["alabel"] = $object->getAlabel();
		$_array["atipoagrupacion"] = $object->getAtipoagrupacion();
 		return $_array;
	}

	/**
	 * Agrega los filtros del buscador en la consulta
	 * @author EasyDev:Team
	 */
	public function _populateFiltros($data){
		$this->_objectFilter = new Model_Agrupacion();
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
		$this->_objectFilter = new Model_Agrupacion();
	}	

  
    public static function getInstance(){
        if(is_null(self::$_instance)){
            $c = __CLASS__;
            self::$_instance = new $c;
        }
        return self::$_instance;
    }



}
