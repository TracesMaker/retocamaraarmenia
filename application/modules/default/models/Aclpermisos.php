<?php
/**
 * Clase que procesas los get y set de los campos de esta estidad
 *
 * @author EasyDev:Team
 **/
class Model_Aclpermisos extends Model_DomainObjectAbstract
{
	private $_perpermiso = null;
	private $_perrol = null;
	private $_perrolObject = null;
	private $_peraccion = null;
	private $_peraccionObject = null;
    public function getPerpermiso() {
        return $this->_perpermiso;
    }
    public function setPerpermiso($perpermiso) {
        $this->_perpermiso = $perpermiso;
    }	
    public function getPerrol() {
        return $this->_perrol;
    }
    public function setPerrol($perrol) {
        $this->_perrol = $perrol;
    }
    public function getPerrolObject() {
        return $this->_perrolObject;
    }
    public function setPerrolObject($Object) {
        $this->_perrolObject = $Object;
    }    
    public function getPeraccion() {
        return $this->_peraccion;
    }
    public function setPeraccion($peraccion) {
        $this->_peraccion = $peraccion;
    }
    public function getPeraccionObject() {
        return $this->_peraccionObject;
    }
    public function setPeraccionObject($Object) {
        $this->_peraccionObject = $Object;
    }    

	public function get_Label_model(){
		$label = "";
		return $label;
	}	
}
