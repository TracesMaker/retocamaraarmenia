<?php
/**
 * Clase que procesas las consultas de personalizadas para las vistas
 *
 * @author EasyDev:Team
 **/
class Reto_Model_EvaluacionesMapper extends Model_DataMapperAbstract
{
    private static $_instance = null;    
	private $_objectFilter = null;


    public function  __construct() {
		$this->_objectFilter = new Reto_Model_Evaluaciones();		
		$this->_primarykey = 'evaluaciones_id';
   		$this->_nametable = $this->_prefijo.'_evaluaciones';
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
    	if( !$id > 0)return new Reto_Model_Evaluaciones();
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
		$where = array(0 => "evaluaciones_id = ".$data["evaluaciones_id"]);
		return $db->update($this->_nametable, $data, $where);
	}	

	/**
	 * Elimina un registro de la BD por el ID
	 * @author EasyDev:Team
	 */
    public function DeleteData($id){
    	$db = $this->getDb();
   		$where = array(0 => "evaluaciones_id = ".$id);
		$db->delete($this->_nametable, $where);		
	}


	protected function BuildWhere($select){
		if($this->_objectFilter->getReto() > 0) 
			$select->where("a.reto = ?",$this->_objectFilter->getReto());
		if($this->_objectFilter->getEvaluador() > 0) 
			$select->where("a.evaluador = ?",$this->_objectFilter->getEvaluador());
		if($this->_objectFilter->getItemaevaluar() > 0) 
			$select->where("a.itemaevaluar = ?",$this->_objectFilter->getItemaevaluar());
		if($this->_objectFilter->getSolucionador() > 0) 
			$select->where("a.solucionador = ?",$this->_objectFilter->getSolucionador());

		if(strlen($this->_objectFilter->get_Fbuscar())>1){
			$select->where(' a.concepto like "%'.$this->_objectFilter->get_Fbuscar().'%" ');
		}
		if(count($this->_objectFilter->getOrderBy())>0){
			$select->order($this->_objectFilter->getOrderBy());
		}else{

            $select->order("evaluaciones_id desc");
		}
		
		return $select;
	}



	/**
     * Pobla el objeto con los valores del array de datos
     * @author EasyDev:Team
     * @param  Array con la info de la BD
     */
	public function _populate($data){
		$object = new Reto_Model_Evaluaciones();
		if($data == null)return $object;
		$label = null;
		if(array_key_exists("evaluaciones_id", $data))$object->setId($data["evaluaciones_id"]);
		if(array_key_exists("concepto", $data))$object->setConcepto($data["concepto"]);
		if(array_key_exists("valor", $data))$object->setValor($data["valor"]);
	if(array_key_exists("reto", $data)){
		$object->setReto($data["reto"]);
		if($this->getPerezoso()){
			$retoDB = new Reto_Model_RetoMapper();
			$retoDB->setPerezoso(false);
			//$objectRelacion = $retoDB->getById(0);	
			$objectRelacion = $retoDB->getById($data["reto"]);	
			$object->setRetoObject($objectRelacion);
		}	
	}

	if(array_key_exists("evaluador", $data)){
		$object->setEvaluador($data["evaluador"]);
		if($this->getPerezoso()){
			$evaluadorDB = new Model_AclusuariosMapper();
			$evaluadorDB->setPerezoso(false);
			//$objectRelacion = $evaluadorDB->getById(0);	
			$objectRelacion = $evaluadorDB->getById($data["evaluador"]);	
			$object->setEvaluadorObject($objectRelacion);
		}	
	}

	if(array_key_exists("itemaevaluar", $data)){
		$object->setItemaevaluar($data["itemaevaluar"]);
		if($this->getPerezoso()){
			$itemaevaluarDB = new Reto_Model_ItemaevaluarMapper();
			$itemaevaluarDB->setPerezoso(false);
			//$objectRelacion = $itemaevaluarDB->getById(0);	
			$objectRelacion = $itemaevaluarDB->getById($data["itemaevaluar"]);	
			$object->setItemaevaluarObject($objectRelacion);
		}	
	}

	if(array_key_exists("solucionador", $data)){
		$object->setSolucionador($data["solucionador"]);
		if($this->getPerezoso()){
			$solucionadorDB = new Reto_Model_SolucionadoresMapper();
			$solucionadorDB->setPerezoso(false);
			//$objectRelacion = $solucionadorDB->getById(0);	
			$objectRelacion = $solucionadorDB->getById($data["solucionador"]);	
			$object->setSolucionadorObject($objectRelacion);
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
		$_array["evaluaciones_id"]=$object->getId();
		$_array["concepto"] = $object->getConcepto();
		$_array["valor"] = $object->getValor();
		$_array["reto"] = $object->getReto();
		$_array["evaluador"] = $object->getEvaluador();
		$_array["itemaevaluar"] = $object->getItemaevaluar();
		$_array["solucionador"] = $object->getSolucionador();
 		return $_array;
	}

	/**
	 * Agrega los filtros del buscador en la consulta
	 * @author EasyDev:Team
	 */
	public function _populateFiltros($data){
		$this->_objectFilter = new Reto_Model_Evaluaciones();
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
		$this->_objectFilter = new Reto_Model_Evaluaciones();
	}	

  
    public static function getInstance(){
        if(is_null(self::$_instance)){
            $c = __CLASS__;
            self::$_instance = new $c;
        }
        return self::$_instance;
    }

    public function getDatosGuardados($reto, $solucionador, $evaluador){
		$db = $this->getDb();

		$query = "SELECT * FROM ". $this->_nametable ." where ";
		$query .= " reto = ".$reto." AND ";
		$query .= " solucionador = ".$solucionador." AND ";
		$query .= " evaluador = ".$evaluador;
		$query .= " order by itemaevaluar asc ";

		
		$stmt = $db->query($query);
		$res = $stmt->fetchAll();

		return $res;
	}

	public function getValoresbyItem($reto, $solucionador, $item){
		$db = $this->getDb();

		$query = "SELECT concepto,valor FROM ve_evaluaciones
					 WHERE itemaevaluar = ".$item."
					 AND reto = ".$reto."
					 AND solucionador = ".$solucionador."";
		
		$stmt = $db->query($query);
		$res = $stmt->fetchAll();

		return $res;
	}

}
