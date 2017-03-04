<?php
/**
 * Clase que procesas los get y set de los campos de esta estidad
 *
 * @author EasyDev:Team
 **/
class Reto_Model_Elementostangibles extends Model_DomainObjectAbstract
{
	private $_elementofisico = null;
	private $_descripcion = null;
	private $_funcionenlasolucion = null;
	private $_solucionador = null;
	private $_solucionadorObject = null;
    public function getElementofisico() {
        return $this->_elementofisico;
    }
    public function setElementofisico($elementofisico) {
        $this->_elementofisico = $elementofisico;
    }	
    public function getDescripcion() {
        return $this->_descripcion;
    }
    public function setDescripcion($descripcion) {
        $this->_descripcion = $descripcion;
    }	
    public function getFuncionenlasolucion() {
        return $this->_funcionenlasolucion;
    }
    public function setFuncionenlasolucion($funcionenlasolucion) {
        $this->_funcionenlasolucion = $funcionenlasolucion;
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
		$label .= $this->_elementofisico." "; 
		return $label;
	}	
}
