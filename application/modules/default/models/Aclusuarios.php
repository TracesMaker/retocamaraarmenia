<?php
/**
 * Clase que procesas los get y set de los campos de esta estidad
 *
 * @author EasyDev:Team
 **/
class Model_Aclusuarios extends Model_DomainObjectAbstract
{
	private $_nombre = null;
	private $_cargo = null;
	private $_username = null;
	private $_password = null;
	private $_activo = null;
	private $_email = null;
	private $_manejodedatos = null;
	private $_divulgacionpostulacion = null;
	private $_role = null;
	private $_roleObject = null;
    public function getNombre() {
        return $this->_nombre;
    }
    public function setNombre($nombre) {
        $this->_nombre = $nombre;
    }	
    public function getCargo() {
        return $this->_cargo;
    }
    public function setCargo($cargo) {
        $this->_cargo = $cargo;
    }	
    public function getUsername() {
        return $this->_username;
    }
    public function setUsername($username) {
        $this->_username = $username;
    }	
    public function getPassword() {
        return $this->_password;
    }
    public function setPassword($password) {
        $this->_password = $password;
    }	
    public function getActivo() {
        return $this->_activo;
    }
    public function setActivo($activo) {
        $this->_activo = $activo;
    }	
    public function getEmail() {
        return $this->_email;
    }
    public function setEmail($email) {
        $this->_email = $email;
    }	
    public function getManejodedatos() {
        return $this->_manejodedatos;
    }
    public function setManejodedatos($manejodedatos) {
        $this->_manejodedatos = $manejodedatos;
    }	
    public function getDivulgacionpostulacion() {
        return $this->_divulgacionpostulacion;
    }
    public function setDivulgacionpostulacion($divulgacionpostulacion) {
        $this->_divulgacionpostulacion = $divulgacionpostulacion;
    }	
    public function getRole() {
        return $this->_role;
    }
    public function setRole($role) {
        $this->_role = $role;
    }
    public function getRoleObject() {
        return $this->_roleObject;
    }
    public function setRoleObject($Object) {
        $this->_roleObject = $Object;
    }    

	public function get_Label_model(){
		$label = "";
		$label .= $this->_nombre." "; 
		return $label;
	}	
}
