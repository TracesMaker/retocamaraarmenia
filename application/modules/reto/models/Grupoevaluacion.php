<?php
/**
 * Clase que procesas los get y set de los campos de esta estidad
 *
 * @author EasyDev:Team
 **/
class Reto_Model_Grupoevaluacion extends Model_DomainObjectAbstract
{
	private $_nombre = null;
	private $_orden = null;
	private $_peso = null;
    public function getNombre() {
        return $this->_nombre;
    }
    public function setNombre($nombre) {
        $this->_nombre = $nombre;
    }	
    public function getOrden() {
        return $this->_orden;
    }
    public function setOrden($orden) {
        $this->_orden = $orden;
    }	
    public function getPeso() {
        return $this->_peso;
    }
    public function setPeso($peso) {
        $this->_peso = $peso;
    }	

	public function get_Label_model(){
		$label = "";
		$label .= $this->_nombre." "; 
		return $label;
	}	
}
