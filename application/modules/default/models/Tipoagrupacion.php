<?php
/**
 * Clase que procesas los get y set de los campos de esta estidad
 *
 * @author EasyDev:Team
 **/
class Model_Tipoagrupacion extends Model_DomainObjectAbstract
{
	private $_tanombre = null;
    public function getTanombre() {
        return $this->_tanombre;
    }
    public function setTanombre($tanombre) {
        $this->_tanombre = $tanombre;
    }	

	public function get_Label_model(){
		$label = "";
		$label .= $this->_tanombre." "; 
		return $label;
	}	
}
