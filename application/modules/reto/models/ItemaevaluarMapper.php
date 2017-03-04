<?php
/**
 * Clase que procesas las consultas de personalizadas para las vistas
 *
 * @author EasyDev:Team
 **/
class Reto_Model_ItemaevaluarMapper extends Model_DataMapperAbstract
{
    private static $_instance = null;    
	private $_objectFilter = null;


    public function  __construct() {
		$this->_objectFilter = new Reto_Model_Itemaevaluar();		
		$this->_primarykey = 'itemaevaluar_id';
   		$this->_nametable = $this->_prefijo.'_itemaevaluar';
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
    	if( !$id > 0)return new Reto_Model_Itemaevaluar();
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
		$where = array(0 => "itemaevaluar_id = ".$data["itemaevaluar_id"]);
		return $db->update($this->_nametable, $data, $where);
	}	

	/**
	 * Elimina un registro de la BD por el ID
	 * @author EasyDev:Team
	 */
    public function DeleteData($id){
    	$db = $this->getDb();
   		$where = array(0 => "itemaevaluar_id = ".$id);
		$db->delete($this->_nametable, $where);		
	}


	protected function BuildWhere($select){
		if($this->_objectFilter->getGrupoevaluacion() > 0) 
			$select->where("a.grupoevaluacion = ?",$this->_objectFilter->getGrupoevaluacion());
        if($this->_objectFilter->getEvaluable() != "" ) 
            $select->where("a.evaluable = ?",$this->_objectFilter->getEvaluable());

		if(strlen($this->_objectFilter->get_Fbuscar())>1){
			$select->where(' a.titulo like "%'.$this->_objectFilter->get_Fbuscar().'%" OR a.tabla like "%'.$this->_objectFilter->get_Fbuscar().'%" OR a.columna like "%'.$this->_objectFilter->get_Fbuscar().'%" ');
		}
		if(count($this->_objectFilter->getOrderBy())>0){
			$select->order($this->_objectFilter->getOrderBy());
		}else{

            $select->order("itemaevaluar_id desc");
		}
		
		return $select;
	}



	/**
     * Pobla el objeto con los valores del array de datos
     * @author EasyDev:Team
     * @param  Array con la info de la BD
     */
	public function _populate($data){
		$object = new Reto_Model_Itemaevaluar();
		if($data == null)return $object;
		$label = null;
		if(array_key_exists("itemaevaluar_id", $data))$object->setId($data["itemaevaluar_id"]);
		if(array_key_exists("titulo", $data))$object->setTitulo($data["titulo"]);
		if(array_key_exists("tabla", $data))$object->setTabla($data["tabla"]);
		if(array_key_exists("columna", $data))$object->setColumna($data["columna"]);
		if(array_key_exists("evaluable", $data))$object->setEvaluable($data["evaluable"]);
		if(array_key_exists("orden", $data))$object->setOrden($data["orden"]);
	if(array_key_exists("grupoevaluacion", $data)){
		$object->setGrupoevaluacion($data["grupoevaluacion"]);
		if($this->getPerezoso()){
			$grupoevaluacionDB = new Reto_Model_GrupoevaluacionMapper();
			$grupoevaluacionDB->setPerezoso(false);
			//$objectRelacion = $grupoevaluacionDB->getById(0);	
			$objectRelacion = $grupoevaluacionDB->getById($data["grupoevaluacion"]);	
			$object->setGrupoevaluacionObject($objectRelacion);
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
		$_array["itemaevaluar_id"]=$object->getId();
		$_array["titulo"] = $object->getTitulo();
		$_array["tabla"] = $object->getTabla();
		$_array["columna"] = $object->getColumna();
		$_array["evaluable"] = $object->getEvaluable();
		$_array["orden"] = $object->getOrden();
		$_array["grupoevaluacion"] = $object->getGrupoevaluacion();
 		return $_array;
	}

	/**
	 * Agrega los filtros del buscador en la consulta
	 * @author EasyDev:Team
	 */
	public function _populateFiltros($data){
		$this->_objectFilter = new Reto_Model_Itemaevaluar();
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
		$this->_objectFilter = new Reto_Model_Itemaevaluar();
	}	

  
    public static function getInstance(){
        if(is_null(self::$_instance)){
            $c = __CLASS__;
            self::$_instance = new $c;
        }
        return self::$_instance;
    }

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author
	 **/
	public function getItems($items)
	{
		$db = $this->getDb();
		$query = "
			SELECT 	*
				FROM
				ve_itemaevaluar
				where itemaevaluar_id in (".implode(",", $items).")
			";
		$rst = $db->query($query);
		return $rst->fetchAll();
	}

}
