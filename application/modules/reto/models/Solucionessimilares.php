<?php
/**
 * Clase que procesas los get y set de los campos de esta estidad
 *
 * @author EasyDev:Team
 **/
class Reto_Model_Solucionessimilares extends Model_DomainObjectAbstract
{
	private $_soluciondesarrollada = null;
	private $_anodesarrollo = null;
	private $_quienladesarrollo = null;
	private $_resultadosobtenidos = null;
	private $_dificultadespresentadas = null;
	private $_solucionador = null;
	private $_solucionadorObject = null;
    public function getSoluciondesarrollada() {
        return $this->_soluciondesarrollada;
    }
    public function setSoluciondesarrollada($soluciondesarrollada) {
        $this->_soluciondesarrollada = $soluciondesarrollada;
    }	
    public function getAnodesarrollo() {
        return $this->_anodesarrollo;
    }
    public function setAnodesarrollo($anodesarrollo) {
        $this->_anodesarrollo = $anodesarrollo;
    }	
    public function getQuienladesarrollo() {
        return $this->_quienladesarrollo;
    }
    public function setQuienladesarrollo($quienladesarrollo) {
        $this->_quienladesarrollo = $quienladesarrollo;
    }	
    public function getResultadosobtenidos() {
        return $this->_resultadosobtenidos;
    }
    public function setResultadosobtenidos($resultadosobtenidos) {
        $this->_resultadosobtenidos = $resultadosobtenidos;
    }	
    public function getDificultadespresentadas() {
        return $this->_dificultadespresentadas;
    }
    public function setDificultadespresentadas($dificultadespresentadas) {
        $this->_dificultadespresentadas = $dificultadespresentadas;
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
