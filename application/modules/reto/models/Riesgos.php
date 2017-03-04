<?php
/**
 * Clase que procesas los get y set de los campos de esta estidad
 *
 * @author EasyDev:Team
 **/
class Reto_Model_Riesgos extends Model_DomainObjectAbstract
{
	private $_riesgo = null;
	private $_descripcion = null;
	private $_impacto = null;
	private $_probabilidad = null;
	private $_solucionador = null;
	private $_solucionadorObject = null;
    public function getRiesgo() {
        return $this->_riesgo;
    }
    public function setRiesgo($riesgo) {
        $this->_riesgo = $riesgo;
    }	
    public function getDescripcion() {
        return $this->_descripcion;
    }
    public function setDescripcion($descripcion) {
        $this->_descripcion = $descripcion;
    }	
    public function getImpacto() {
        return $this->_impacto;
    }
    public function setImpacto($impacto) {
        $this->_impacto = $impacto;
    }	
    public function getProbabilidad() {
        return $this->_probabilidad;
    }
    public function setProbabilidad($probabilidad) {
        $this->_probabilidad = $probabilidad;
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
