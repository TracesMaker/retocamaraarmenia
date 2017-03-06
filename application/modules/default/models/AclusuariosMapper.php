<?php
/**
 * Clase que procesas las consultas de personalizadas para las vistas
 *
 * @author EasyDev:Team
 **/
class Model_AclusuariosMapper extends Model_DataMapperAbstract
{
    private static $_instance = null;    
	private $_objectFilter = null;


    public function  __construct() {
		$this->_objectFilter = new Model_Aclusuarios();		
		$this->_primarykey = 'aclusuarios_id';
   		$this->_nametable = $this->_prefijo.'_aclusuarios';
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
    	if( !$id > 0)return new Model_Aclusuarios();
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
		if($data["password"] != $data["password0"])
            	return false;
        $data["password"] = md5($data["password"]);
        $data["activo"] = 1;
        unset($data["password0"]);
		$db = $this->getDb();
		$db->insert($this->_nametable, $data);
		$id =  $db->lastInsertId($this->_nametable);
		return $id;	
	}

	public function UpdateData($data){
		if(array_key_exists("password", $data)){
			$original = $this->getById($data["aclusuarios_id"]);
    	if($data["password0"] != $original->getPassword())
        	return false;
    	unset($data["password0"]);
		}
		$db = $this->getDb();
		$where = array(0 => "aclusuarios_id = ".$data["aclusuarios_id"]);
		return $db->update($this->_nametable, $data, $where);
	}	

	/**
	 * Elimina un registro de la BD por el ID
	 * @author EasyDev:Team
	 */
    public function DeleteData($id){
    	$db = $this->getDb();
   		$where = array(0 => "aclusuarios_id = ".$id);
		$db->delete($this->_nametable, $where);		
	}


	protected function BuildWhere($select){
		if($this->_objectFilter->getRole() > 0) 
			$select->where("a.role = ?",$this->_objectFilter->getRole());
        if($this->_objectFilter->getActivo() != "" ) 
            $select->where("a.activo = ?",$this->_objectFilter->getActivo());
        if($this->_objectFilter->getManejodedatos() != "" ) 
            $select->where("a.manejodedatos = ?",$this->_objectFilter->getManejodedatos());
        if($this->_objectFilter->getDivulgacionpostulacion() != "" ) 
            $select->where("a.divulgacionpostulacion = ?",$this->_objectFilter->getDivulgacionpostulacion());

		if(strlen($this->_objectFilter->get_Fbuscar())>1){
			$select->where(' a.nombre like "%'.$this->_objectFilter->get_Fbuscar().'%" OR a.cargo like "%'.$this->_objectFilter->get_Fbuscar().'%" OR a.username like "%'.$this->_objectFilter->get_Fbuscar().'%" OR a.password like "%'.$this->_objectFilter->get_Fbuscar().'%" OR a.email like "%'.$this->_objectFilter->get_Fbuscar().'%" ');
		}
		if(count($this->_objectFilter->getOrderBy())>0){
			$select->order($this->_objectFilter->getOrderBy());
		}else{

            $select->order("aclusuarios_id desc");
		}
		
		return $select;
	}



	/**
     * Pobla el objeto con los valores del array de datos
     * @author EasyDev:Team
     * @param  Array con la info de la BD
     */
	public function _populate($data){
		$object = new Model_Aclusuarios();
		if($data == null)return $object;
		$label = null;
		if(array_key_exists("aclusuarios_id", $data))$object->setId($data["aclusuarios_id"]);
		if(array_key_exists("nombre", $data))$object->setNombre($data["nombre"]);
		if(array_key_exists("cargo", $data))$object->setCargo($data["cargo"]);
		if(array_key_exists("username", $data))$object->setUsername($data["username"]);
		if(array_key_exists("password", $data))$object->setPassword($data["password"]);
		if(array_key_exists("activo", $data))$object->setActivo($data["activo"]);
		if(array_key_exists("email", $data))$object->setEmail($data["email"]);
		if(array_key_exists("resetdate", $data))$object->setResetdate($data["resetdate"]);
		if(array_key_exists("manejodedatos", $data))$object->setManejodedatos($data["manejodedatos"]);
		if(array_key_exists("divulgacionpostulacion", $data))$object->setDivulgacionpostulacion($data["divulgacionpostulacion"]);
	if(array_key_exists("role", $data)){
		$object->setRole($data["role"]);
		if($this->getPerezoso()){
			$roleDB = new Model_AclrolesMapper();
			$roleDB->setPerezoso(false);
			//$objectRelacion = $roleDB->getById(0);	
			$objectRelacion = $roleDB->getById($data["role"]);	
			$object->setRoleObject($objectRelacion);
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
		$_array["aclusuarios_id"]=$object->getId();
		$_array["nombre"] = $object->getNombre();
		$_array["cargo"] = $object->getCargo();
		$_array["username"] = $object->getUsername();
		$_array["password"] = $object->getPassword();
		$_array["activo"] = $object->getActivo();
		$_array["email"] = $object->getEmail();
		$_array["manejodedatos"] = $object->getManejodedatos();
		$_array["divulgacionpostulacion"] = $object->getDivulgacionpostulacion();
		$_array["role"] = $object->getRole();
		$_array["resetdate"] = $object->getResetdate();
 		return $_array;
	}

	/**
	 * Agrega los filtros del buscador en la consulta
	 * @author EasyDev:Team
	 */
	public function _populateFiltros($data){
		$this->_objectFilter = new Model_Aclusuarios();
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
		$this->_objectFilter = new Model_Aclusuarios();
	}	

  
    public static function getInstance(){
        if(is_null(self::$_instance)){
            $c = __CLASS__;
            self::$_instance = new $c;
        }
        return self::$_instance;
    }



}
