<?php
/**
 * Clase que procesas los get y set de los campos de esta estidad
 *
 * @author EasyDev:Team
 **/
class Reto_Model_Caracteristicasprincipalesimplementacion extends Model_DomainObjectAbstract
{
	private $_estadodeldesarrollo = null;
	private $_gradodeldesarrollo = null;
	private $_aspectospendientes = null;
	private $_atributobasico = null;
	private $_atributobasicoObject = null;
	private $_solucionador = null;
	private $_solucionadorObject = null;
    public function getEstadodeldesarrollo() {
        return $this->_estadodeldesarrollo;
    }
    public function setEstadodeldesarrollo($estadodeldesarrollo) {
        $this->_estadodeldesarrollo = $estadodeldesarrollo;
    }	
    public function getGradodeldesarrollo() {
        return $this->_gradodeldesarrollo;
    }
    public function setGradodeldesarrollo($gradodeldesarrollo) {
        $this->_gradodeldesarrollo = $gradodeldesarrollo;
    }	
    public function getAspectospendientes() {
        return $this->_aspectospendientes;
    }
    public function setAspectospendientes($aspectospendientes) {
        $this->_aspectospendientes = $aspectospendientes;
    }	
    public function getAtributobasico() {
        return $this->_atributobasico;
    }
    public function setAtributobasico($atributobasico) {
        $this->_atributobasico = $atributobasico;
    }
    public function getAtributobasicoObject() {
        return $this->_atributobasicoObject;
    }
    public function setAtributobasicoObject($Object) {
        $this->_atributobasicoObject = $Object;
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
