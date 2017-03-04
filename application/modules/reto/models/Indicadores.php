<?php
/**
 * Clase que procesas los get y set de los campos de esta estidad
 *
 * @author EasyDev:Team
 **/
class Reto_Model_Indicadores extends Model_DomainObjectAbstract
{
	private $_indicador = null;
	private $_descripcion = null;
	private $_solucionador = null;
	private $_solucionadorObject = null;
    public function getIndicador() {
        return $this->_indicador;
    }
    public function setIndicador($indicador) {
        $this->_indicador = $indicador;
    }	
    public function getDescripcion() {
        return $this->_descripcion;
    }
    public function setDescripcion($descripcion) {
        $this->_descripcion = $descripcion;
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
