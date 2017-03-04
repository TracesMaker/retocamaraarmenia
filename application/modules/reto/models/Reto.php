<?php
/**
 * Clase que procesas los get y set de los campos de esta estidad
 *
 * @author EasyDev:Team
 **/
class Reto_Model_Reto extends Model_DomainObjectAbstract
{
	private $_titulo = null;
	private $_descripcioncorta = null;
	private $_descripcioncompleta = null;
	private $_urlvideo = null;
	private $_imagen = null;
	private $_fechainicio = null;
	private $_fechafin = null;
    private $_estado = null;
	private $_conteosolucionadores = null;
	private $_estadoObject = null;
    public function getTitulo() {
        return $this->_titulo;
    }
    public function setTitulo($titulo) {
        $this->_titulo = $titulo;
    }   
    public function getConteosolucionadores() {
        return $this->_conteosolucionadores;
    }
    public function setConteosolucionadores($conteosolucionadores) {
        $this->_conteosolucionadores = $conteosolucionadores;
    }	
    public function getDescripcioncorta() {
        return $this->_descripcioncorta;
    }
    public function setDescripcioncorta($descripcioncorta) {
        $this->_descripcioncorta = $descripcioncorta;
    }	
    public function getDescripcioncompleta() {
        return $this->_descripcioncompleta;
    }
    public function setDescripcioncompleta($descripcioncompleta) {
        $this->_descripcioncompleta = $descripcioncompleta;
    }	
    public function getUrlvideo() {
        return $this->_urlvideo;
    }
    public function setUrlvideo($urlvideo) {
        $this->_urlvideo = $urlvideo;
    }	
    public function getImagen() {
        return $this->_imagen;
    }
    public function setImagen($imagen) {
        $this->_imagen = $imagen;
    }	
    public function getFechainicio() {
        return $this->_fechainicio;
    }
    public function setFechainicio($fechainicio) {
        $this->_fechainicio = $fechainicio;
    }	
    public function getFechafin() {
        return $this->_fechafin;
    }
    public function setFechafin($fechafin) {
        $this->_fechafin = $fechafin;
    }	
    public function getEstado() {
        return $this->_estado;
    }
    public function setEstado($estado) {
        $this->_estado = $estado;
    }
    public function getEstadoObject() {
        return $this->_estadoObject;
    }
    public function setEstadoObject($Object) {
        $this->_estadoObject = $Object;
    }    

	public function get_Label_model(){
		$label = "";
		$label .= $this->_titulo." "; 
		$label .= $this->_urlvideo." "; 
		return $label;
	}	
}
