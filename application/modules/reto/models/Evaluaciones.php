<?php
/**
 * Clase que procesas los get y set de los campos de esta estidad
 *
 * @author EasyDev:Team
 **/
class Reto_Model_Evaluaciones extends Model_DomainObjectAbstract
{
	private $_concepto = null;
	private $_valor = null;
	private $_reto = null;
	private $_retoObject = null;
	private $_evaluador = null;
	private $_evaluadorObject = null;
	private $_itemaevaluar = null;
	private $_itemaevaluarObject = null;
	private $_solucionador = null;
	private $_solucionadorObject = null;
    public function getConcepto() {
        return $this->_concepto;
    }
    public function setConcepto($concepto) {
        $this->_concepto = $concepto;
    }	
    public function getValor() {
        return $this->_valor;
    }
    public function setValor($valor) {
        $this->_valor = $valor;
    }	
    public function getReto() {
        return $this->_reto;
    }
    public function setReto($reto) {
        $this->_reto = $reto;
    }
    public function getRetoObject() {
        return $this->_retoObject;
    }
    public function setRetoObject($Object) {
        $this->_retoObject = $Object;
    }    
    public function getEvaluador() {
        return $this->_evaluador;
    }
    public function setEvaluador($evaluador) {
        $this->_evaluador = $evaluador;
    }
    public function getEvaluadorObject() {
        return $this->_evaluadorObject;
    }
    public function setEvaluadorObject($Object) {
        $this->_evaluadorObject = $Object;
    }    
    public function getItemaevaluar() {
        return $this->_itemaevaluar;
    }
    public function setItemaevaluar($itemaevaluar) {
        $this->_itemaevaluar = $itemaevaluar;
    }
    public function getItemaevaluarObject() {
        return $this->_itemaevaluarObject;
    }
    public function setItemaevaluarObject($Object) {
        $this->_itemaevaluarObject = $Object;
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
