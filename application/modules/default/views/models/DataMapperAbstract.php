<?php
abstract class Model_DataMapperAbstract{
    private static $_db = null;
    protected $_primarykey = null;
    protected $_prefijo = 've';
    protected $_nametable = null;  
    protected $_perezoso = true;  
	
    /**
     * Funcion retorna la BD en la que es esta conectando
     * @author EasyDev:Team
     * @return Zend_Db_Table
     */
    protected function getDb() {
        if(is_null(self::$_db)){
            self::$_db = Zend_Db_Table::getDefaultAdapter();
        }
        return self::$_db;
    }



	public function getArrayOption(){
		$arrayOption = array();
		$arrayOption[NULL]="Seleccione opción";
		
		foreach ($this->getList(false) as $Obj)
			$arrayOption[$Obj->getId()] = $Obj->get_Label_model();
		return $arrayOption;
	}

	public function getArrayOptionInforme(){
		$arrayOption = array();
		$arrayOption[NULL]="Seleccione opción";
		
		foreach ($this->getList(false) as $Obj)
			$arrayOption[$Obj->getId()] = $Obj->get_Label_model();
		return $arrayOption;
	}

	/**
	 * Optiene la información de un registro especifico por un campo unico diferente al Id
	 *
	 * @author EasyDev:Team
	 */
	public function getByPropiedad($propiedad, $valor){
		$db = $this->getDb();
		$select = $this->getSelectInit();
        $select->where($propiedad.' = ?', $valor);
		$result = $db->fetchRow($select);
        $this->_perezoso = false;
		return $this->_populate($result);
	}	

	protected function getListSelect() {    
		$select=$this->getSelectInit(); 
		$select=$this->BuildWhere($select);
        return $select;
    }


	/**
	 * Retorna la cantidad de registros en la base de datos.
	 *
	 * @return int
	 * @author EasyDev:Team
	 **/
	public function getCount(){
		$db = $this->getDb();

		$query = "SELECT COUNT(*) AS count FROM ". $this->_nametable ."";

		$rst = $db->query($query);
		$res = $rst->fetch();
		return $res["count"];
	}
	
	
 
 	/**
     * Define el tipo de consulta true para traes en las consultas los campos padres (lazy)
     * @author EasyDev:Team
     */
 	public function setPerezoso($val){
 		$this->_perezoso = $val;
 	}
 	
 	/**
     * Devuelve el estado lazy de las consultas
     * @author EasyDev:Team
     * @return boolean 
     */
 	public function getPerezoso(){
 		return $this->_perezoso;
 	}
 	
 	abstract protected function getSelectInit();
    abstract protected function _populate($data);
    abstract protected function _depopulate($object);
}
