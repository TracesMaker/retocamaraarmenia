<?php
/**
 * Clase que procesas los get y set de los campos de esta estidad
 *
 * @author EasyDev:Team
 **/
class Model_Aclusuariosonline extends Model_DomainObjectAbstract
{
	private $_ultimoacceso = null;
	private $_tiempo = null;
	private $_ip = null;
	private $_usuario_id = null;
	private $_usuario_idObject = null;
    public function getUltimoacceso() {
        return $this->_ultimoacceso;
    }
    public function setUltimoacceso($ultimoacceso) {
        $this->_ultimoacceso = $ultimoacceso;
    }	
    public function getTiempo() {
        return $this->_tiempo;
    }
    public function setTiempo($tiempo) {
        $this->_tiempo = $tiempo;
    }	
    public function getIp() {
        return $this->_ip;
    }
    public function setIp($ip) {
        $this->_ip = $ip;
    }	
    public function getUsuario_id() {
        return $this->_usuario_id;
    }
    public function setUsuario_id($usuario_id) {
        $this->_usuario_id = $usuario_id;
    }
    public function getUsuario_idObject() {
        return $this->_usuario_idObject;
    }
    public function setUsuario_idObject($Object) {
        $this->_usuario_idObject = $Object;
    }    

	public function get_Label_model(){
		$label = "";
		return $label;
	}	
}
