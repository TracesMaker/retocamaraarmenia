<?php
class Model_LibraryAcl extends Zend_Acl {
	public function __construct(){
		$AclrolesDB = Model_AclrolesMapper::getInstance();
		$AclrolesDB->setPerezoso(false);
		$roles = $AclrolesDB->getList();
 
		foreach ($roles as $key => $Obj_rol)
			$this->addRole(new Zend_Acl_Role($Obj_rol->getId()));		

		// Se obtiene el nombre del recurso y accion que el usuario esta utilizando
		$_db = Zend_Db_Table::getDefaultAdapter();
		$select = $_db->select();
       	$select->from(array('a' => 've_aclacciones'));   
       	$select->group('accrecurso');
		$stmt = $select->query();
		foreach ($stmt->fetchAll() as $row){
			$this->addResource(new Zend_Acl_Resource($row["accrecurso"]));			
		}

		$this->allow('1','default:authentication','login');		
		
		$AclpermisosDB = Model_AclpermisosMapper::getInstance();
		$AclpermisosDB->_populateFiltros(array("perrol"=>Zend_Registry::get('role'), "perpermiso"=>"1" 	));
		//$AclpermisosDB->setPerezoso(false);
		foreach ($AclpermisosDB->getList() as $obj) {
				$rol = $obj->getPerrol();
				$accion = $obj->getPeraccionObject()->getAccaccion();
				$recurso = $obj->getPeraccionObject()->getAccrecurso();	
				if(strlen($recurso) > 0)
					if(strlen($accion) > 0)
						$this->allow($rol,$recurso,$accion);	
					else
						$this->allow($rol,$recurso);
		} 	
		
		$this->allow(2);
	}
}

