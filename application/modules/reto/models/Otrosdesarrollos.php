<?php
/**
 * Clase que procesas los get y set de los campos de esta estidad
 *
 * @author EasyDev:Team
 **/
class Reto_Model_Otrosdesarrollos extends Model_DomainObjectAbstract
{
	private $_desarrollocomplementario = null;
	private $_porque = null;
	private $_solucionador = null;
	private $_solucionadorObject = null;
    public function getDesarrollocomplementario() {
        return $this->_desarrollocomplementario;
    }
    public function setDesarrollocomplementario($desarrollocomplementario) {
        $this->_desarrollocomplementario = $desarrollocomplementario;
    }	
    public function getPorque() {
        return $this->_porque;
    }
    public function setPorque($porque) {
        $this->_porque = $porque;
    }	
    public function getSolucionador() {
        return $this->_solucionador;
    }
    public function setSolucionador($solucionador) {
        $this->_solucionador = $solucionador;
    }
    public function getSolucionadorObject() {
        return $this->_solucionadorObject;
    }
    public function setSolucionadorObject($Object) {
        $this->_solucionadorObject = $Object;
    }    

	public function get_Label_model(){
		$label = "";
		return $label;
	}	
}
