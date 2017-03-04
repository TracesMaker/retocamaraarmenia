<?php
/**
 * Clase que procesas los get y set de los campos de esta estidad
 *
 * @author EasyDev:Team
 **/
class Model_Agrupacion extends Model_DomainObjectAbstract
{
	private $_aabreviatura = null;
	private $_alabel = null;
	private $_atipoagrupacion = null;
	private $_atipoagrupacionObject = null;
    public function getAabreviatura() {
        return $this->_aabreviatura;
    }
    public function setAabreviatura($aabreviatura) {
        $this->_aabreviatura = $aabreviatura;
    }	
    public function getAlabel() {
        return $this->_alabel;
    }
    public function setAlabel($alabel) {
        $this->_alabel = $alabel;
    }	
    public function getAtipoagrupacion() {
        return $this->_atipoagrupacion;
    }
    public function setAtipoagrupacion($atipoagrupacion) {
        $this->_atipoagrupacion = $atipoagrupacion;
    }
    public function getAtipoagrupacionObject() {
        return $this->_atipoagrupacionObject;
    }
    public function setAtipoagrupacionObject($Object) {
        $this->_atipoagrupacionObject = $Object;
    }    

	public function get_Label_model(){
		$label = "";
		$label .= $this->_alabel." "; 
		return $label;
	}	
}
