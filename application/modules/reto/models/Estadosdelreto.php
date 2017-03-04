<?php
/**
 * Clase que procesas los get y set de los campos de esta estidad
 *
 * @author EasyDev:Team
 **/
class Reto_Model_Estadosdelreto extends Model_DomainObjectAbstract
{
	private $_nombre = null;
    public function getNombre() {
        return $this->_nombre;
    }
    public function setNombre($nombre) {
        $this->_nombre = $nombre;
    }

	public function get_Label_model(){
		$label = $this->_nombre;
		return $label;
	}
}
