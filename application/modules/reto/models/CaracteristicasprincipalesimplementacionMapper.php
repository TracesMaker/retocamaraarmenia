<?php
/**
 * Clase que procesas las consultas de personalizadas para las vistas
 *
 * @author EasyDev:Team
 **/
class Reto_Model_CaracteristicasprincipalesimplementacionMapper extends Model_DataMapperAbstract
{
    private static $_instance = null;    
	private $_objectFilter = null;


    public function  __construct() {
		$this->_objectFilter = new Reto_Model_Caracteristicasprincipalesimplementacion();		
		$this->_primarykey = 'caracteristicasprincipalesimplementacion_id';
   		$this->_nametable = $this->_prefijo.'_caracteristicasprincipalesimplementacion';
		$this->_global = new Zend_Session_Namespace('veoliaZend_Auth');
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
    	if( !$id > 0)return new Reto_Model_Caracteristicasprincipalesimplementacion();
    	$db = $this->getDb();
		$select = $this->getSelectInit();
		$select->where('a.'.$this->_primarykey.' = ?', $id);
		if($this->_global->solucionador_id > 0)
			$select->where('a.solucionador = ?', $this->_global->solucionadores_id);		
       	
		$result = $db->fetchRow($select);
		return $this->_populate($result);
    }

	/**
	 * Función para agregar un registro a la base de dato
	 * @author EasyDev:Team
	 * @param  $data Array de argumentos
	 */
	public function Add($data){
		if($this->_global->solucionadores_id>0)
			$data['solucionador'] = $this->_global->solucionadores_id;

		$bckData = $data;
		$db = $this->getDb();
		$db->insert($this->_nametable, $data);
		$id =  $db->lastInsertId($this->_nametable);
		return $id;	
	}

	public function UpdateData($data){
		$db = $this->getDb();
		$where = array(0 => "caracteristicasprincipalesimplementacion_id = ".$data["caracteristicasprincipalesimplementacion_id"]);
		if($this->_global->solucionadores_id > 0)
			$where[] = 'solucionador = '.$this->_global->solucionadores_id;		
		return $db->update($this->_nametable, $data, $where);
	}	

	/**
	 * Elimina un registro de la BD por el ID
	 * @author EasyDev:Team
	 */
    public function DeleteData($id){
    	$db = $this->getDb();
   		$where = array(0 => "caracteristicasprincipalesimplementacion_id = ".$id);
		if($this->_global->solucionadores_id > 0)
			$where[] = 'solucionador = '.$this->_global->solucionadores_id;		
		$db->delete($this->_nametable, $where);		
	}


	protected function BuildWhere($select){
		if($this->_objectFilter->getAtributobasico() > 0) 
			$select->where("a.atributobasico = ?",$this->_objectFilter->getAtributobasico());
		
		if($this->_objectFilter->getSolucionador() > 0)
		$select->where("a.solucionador = ?",$this->_objectFilter->getSolucionador());

		if(strlen($this->_objectFilter->get_Fbuscar())>1){
			$select->where(' a.estadodeldesarrollo like "%'.$this->_objectFilter->get_Fbuscar().'%" OR a.gradodeldesarrollo like "%'.$this->_objectFilter->get_Fbuscar().'%" OR a.aspectospendientes like "%'.$this->_objectFilter->get_Fbuscar().'%" ');
		}
		if(count($this->_objectFilter->getOrderBy())>0){
			$select->order($this->_objectFilter->getOrderBy());
		}else{

            $select->order("caracteristicasprincipalesimplementacion_id desc");
		}
		
		return $select;
	}



	/**
     * Pobla el objeto con los valores del array de datos
     * @author EasyDev:Team
     * @param  Array con la info de la BD
     */
	public function _populate($data){
		$object = new Reto_Model_Caracteristicasprincipalesimplementacion();
		if($data == null)return $object;
		$label = null;
		if(array_key_exists("caracteristicasprincipalesimplementacion_id", $data))$object->setId($data["caracteristicasprincipalesimplementacion_id"]);
		if(array_key_exists("estadodeldesarrollo", $data))$object->setEstadodeldesarrollo($data["estadodeldesarrollo"]);
		if(array_key_exists("gradodeldesarrollo", $data))$object->setGradodeldesarrollo($data["gradodeldesarrollo"]);
		if(array_key_exists("aspectospendientes", $data))$object->setAspectospendientes($data["aspectospendientes"]);
	if(array_key_exists("atributobasico", $data)){
		$object->setAtributobasico($data["atributobasico"]);
		if($this->getPerezoso()){
			$atributobasicoDB = new Reto_Model_CaracteristicasprincipalessolucionMapper();
			$atributobasicoDB->setPerezoso(false);
			//$objectRelacion = $atributobasicoDB->getById(0);	
			$objectRelacion = $atributobasicoDB->getById($data["atributobasico"]);	
			$object->setAtributobasicoObject($objectRelacion);
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
		$_array["caracteristicasprincipalesimplementacion_id"]=$object->getId();
		$_array["estadodeldesarrollo"] = $object->getEstadodeldesarrollo();
		$_array["gradodeldesarrollo"] = $object->getGradodeldesarrollo();
		$_array["aspectospendientes"] = $object->getAspectospendientes();
		$_array["atributobasico"] = $object->getAtributobasico();
		$_array["solucionador"] = $object->getSolucionador();
 		return $_array;
	}

	/**
	 * Agrega los filtros del buscador en la consulta
	 * @author EasyDev:Team
	 */
	public function _populateFiltros($data){
		$this->_objectFilter = new Reto_Model_Caracteristicasprincipalesimplementacion();
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
		$this->_objectFilter = new Reto_Model_Caracteristicasprincipalesimplementacion();
	}	

  
    public static function getInstance(){
        if(is_null(self::$_instance)){
            $c = __CLASS__;
            self::$_instance = new $c;
        }
        return self::$_instance;
    }

    public function getArrayOptionInforme($solucionador){
		$arrayOption = array();
		$arrayOption[NULL]="Seleccione opción";
		 $this->_populateFiltros(array("solucionador" => $solucionador));
		foreach ($this->getList(false) as $Obj)
			$arrayOption[$Obj->getId()] = $Obj->get_Label_model();
		return $arrayOption;
	}



}
