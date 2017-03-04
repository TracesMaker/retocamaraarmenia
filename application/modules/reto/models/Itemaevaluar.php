<?php
/**
 * Clase que procesas los get y set de los campos de esta estidad
 *
 * @author EasyDev:Team
 **/
class Reto_Model_Itemaevaluar extends Model_DomainObjectAbstract
{
	private $_titulo = null;
	private $_tabla = null;
	private $_columna = null;
	private $_evaluable = null;
	private $_orden = null;
	private $_grupoevaluacion = null;
	private $_grupoevaluacionObject = null;
    public function getTitulo() {
        return $this->_titulo;
    }
    public function setTitulo($titulo) {
        $this->_titulo = $titulo;
    }	
    public function getTabla() {
        return $this->_tabla;
    }
    public function setTabla($tabla) {
        $this->_tabla = $tabla;
    }	
    public function getColumna() {
        return $this->_columna;
    }
    public function setColumna($columna) {
        $this->_columna = $columna;
    }	
    public function getEvaluable() {
        return $this->_evaluable;
    }
    public function setEvaluable($evaluable) {
        $this->_evaluable = $evaluable;
    }	
    public function getOrden() {
        return $this->_orden;
    }
    public function setOrden($orden) {
        $this->_orden = $orden;
    }	
    public function getGrupoevaluacion() {
        return $this->_grupoevaluacion;
    }
    public function setGrupoevaluacion($grupoevaluacion) {
        $this->_grupoevaluacion = $grupoevaluacion;
    }
    public function getGrupoevaluacionObject() {
        return $this->_grupoevaluacionObject;
    }
    public function setGrupoevaluacionObject($Object) {
        $this->_grupoevaluacionObject = $Object;
    }    

	public function get_Label_model(){
		$label = "";
		return $label;
	}	
}
