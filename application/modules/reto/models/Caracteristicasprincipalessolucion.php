<?php
/**
 * Clase que procesas los get y set de los campos de esta estidad
 *
 * @author EasyDev:Team
 **/
class Reto_Model_Caracteristicasprincipalessolucion extends Model_DomainObjectAbstract
{
	private $_atributo = null;
	private $_descripcionatributo = null;
	private $_diferenciador = null;
	private $_ventajas = null;
	private $_solucionador = null;
	private $_solucionadorObject = null;
    public function getAtributo() {
        return $this->_atributo;
    }
    public function setAtributo($atributo) {
        $this->_atributo = $atributo;
    }	
    public function getDescripcionatributo() {
        return $this->_descripcionatributo;
    }
    public function setDescripcionatributo($descripcionatributo) {
        $this->_descripcionatributo = $descripcionatributo;
    }	
    public function getDiferenciador() {
        return $this->_diferenciador;
    }
    public function setDiferenciador($diferenciador) {
        $this->_diferenciador = $diferenciador;
    }	
    public function getVentajas() {
        return $this->_ventajas;
    }
    public function setVentajas($ventajas) {
        $this->_ventajas = $ventajas;
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
		$label .= $this->_atributo." "; 
		return $label;
	}	
}
