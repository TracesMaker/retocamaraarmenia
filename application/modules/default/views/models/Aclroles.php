<?php
/**
 * Clase que procesas los get y set de los campos de esta estidad
 *
 * @author EasyDev:Team
 **/
class Model_Aclroles extends Model_DomainObjectAbstract
{
	private $_rolnombre = null;
	private $_rolpadre = null;
	private $_rolpadreObject = null;
    public function getRolnombre() {
        return $this->_rolnombre;
    }
    public function setRolnombre($rolnombre) {
        $this->_rolnombre = $rolnombre;
    }	
    public function getRolpadre() {
        return $this->_rolpadre;
    }
    public function setRolpadre($rolpadre) {
        $this->_rolpadre = $rolpadre;
    }
    public function getRolpadreObject() {
        return $this->_rolpadreObject;
    }
    public function setRolpadreObject($Object) {
        $this->_rolpadreObject = $Object;
    }    

	public function get_Label_model(){
		$label = "";
		$label .= $this->_rolnombre." "; 
		return $label;
	}	
}
