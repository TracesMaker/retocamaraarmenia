<?php
/**
 * Clase que procesas los get y set de los campos de esta estidad
 *
 * @author EasyDev:Team
 **/
class Model_Aclacciones extends Model_DomainObjectAbstract
{
	private $_accrecurso = null;
	private $_accaccion = null;
    public function getAccrecurso() {
        return $this->_accrecurso;
    }
    public function setAccrecurso($accrecurso) {
        $this->_accrecurso = $accrecurso;
    }	
    public function getAccaccion() {
        return $this->_accaccion;
    }
    public function setAccaccion($accaccion) {
        $this->_accaccion = $accaccion;
    }	

	public function get_Label_model(){
		$label = "";
		$label .= $this->_accrecurso." "; 
		$label .= $this->_accaccion." "; 
		return $label;
	}	
}
