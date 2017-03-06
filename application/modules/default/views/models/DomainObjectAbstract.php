<?php
abstract class Model_DomainObjectAbstract{
	
	private $_paginator = null;
	private $_label = null;
	private $_id = null;
	private $_Fbuscar = "";
	private $_OrderBy = array();
	
    public function setId($id){
        if(!is_null($this->_id)){
            throw new Exception('ID is immutable');
        }
        $this->_id = $id;
    }
    public function getId() {
        return $this->_id;
    }
	
	public function setLabel($label){
		$this->_label = $label;
	}
	public function getLabel(){
		return $this->_label;
	}
	    
	public function set_Fbuscar($texto){
		$this->_Fbuscar = $texto;
	}
	public function get_Fbuscar(){
		return $this->_Fbuscar;
	}
	
	public function addOrderBy($orden){
		$this->_OrderBy[]=$orden;
	}
	public function setOrderBy($arrayorden){
		$this->_OrderBy=$arrayorden;
	}
	public function getOrderBy(){
		return $this->_OrderBy;
	}    
}
