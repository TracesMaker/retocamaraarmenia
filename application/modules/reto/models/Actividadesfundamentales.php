<?php
/**
 * Clase que procesas los get y set de los campos de esta estidad
 *
 * @author EasyDev:Team
 **/
class Reto_Model_Actividadesfundamentales extends Model_DomainObjectAbstract
{
	private $_actividades = null;
	private $_resultadoactividad = null;
	private $_tiempoactividad = null;
	private $_solucionador = null;
	private $_solucionadorObject = null;
    public function getActividades() {
        return $this->_actividades;
    }
    public function setActividades($actividades) {
        $this->_actividades = $actividades;
    }	
    public function getResultadoactividad() {
        return $this->_resultadoactividad;
    }
    public function setResultadoactividad($resultadoactividad) {
        $this->_resultadoactividad = $resultadoactividad;
    }	
    public function getTiempoactividad() {
        return $this->_tiempoactividad;
    }
    public function setTiempoactividad($tiempoactividad) {
        $this->_tiempoactividad = $tiempoactividad;
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
