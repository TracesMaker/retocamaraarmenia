<?php
/**
 * Clase que procesas los get y set de los campos de esta estidad
 *
 * @author EasyDev:Team
 **/
class Model_Aclhistorialusuarios extends Model_DomainObjectAbstract
{
	private $_aclhfecha = null;
	private $_aclhip = null;
	private $_aclhusuario = null;
	private $_aclhusuarioObject = null;
    public function getAclhfecha() {
        return $this->_aclhfecha;
    }
    public function setAclhfecha($aclhfecha) {
        $this->_aclhfecha = $aclhfecha;
    }	
    public function getAclhip() {
        return $this->_aclhip;
    }
    public function setAclhip($aclhip) {
        $this->_aclhip = $aclhip;
    }	
    public function getAclhusuario() {
        return $this->_aclhusuario;
    }
    public function setAclhusuario($aclhusuario) {
        $this->_aclhusuario = $aclhusuario;
    }
    public function getAclhusuarioObject() {
        return $this->_aclhusuarioObject;
    }
    public function setAclhusuarioObject($Object) {
        $this->_aclhusuarioObject = $Object;
    }    

	public function get_Label_model(){
		$label = "";
		return $label;
	}	
}
