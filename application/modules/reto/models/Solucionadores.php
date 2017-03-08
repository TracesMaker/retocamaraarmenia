<?php
/**
 * Clase que procesas los get y set de los campos de esta estidad
 *
 * @author EasyDev:Team
 **/
class Reto_Model_Solucionadores extends Model_DomainObjectAbstract
{
	private $_titulo = null;
	private $_duracionenmeses = null;
	private $_correoelectronico = null;
	private $_resumenejecutivo = null;
	private $_impactodesolucion = null;
	private $_nombredelaempresa = null;
	private $_nit = null;
	private $_telefono = null;
	private $_paginaweb = null;
	private $_nombredepersonadecontacto = null;
	private $_celulardelproponente = null;
	private $_correoelectronicoproponente = null;
	private $_descripciondesolucion = null;
	private $_diagramasolucion = null;
	private $_porquelasolucion = null;
    private $_inspiracion = null;
	private $_requisitosusuario = null;
	private $_personal = null;
	private $_serviciotecnico = null;
	private $_equipos = null;
	private $_software = null;
	private $_materialeseinsumos = null;
	private $_viajes = null;
	private $_otrosrubros = null;
	private $_descripciontrayectoria = null;
	private $_propiedadintelectual = null;
	private $_descripcionpropiedadintelecual = null;
	private $_politicapropiedadintelectual = null;
	private $_descripcionpoliticapropiedadintelecual = null;
	private $_autenticidad = null;
	private $_descripcionautorpropiedad = null;
	private $_cuando = null;
	private $_conquien = null;
	private $_presentacionpublica = null;
	private $_acuerdoconfidencialidadconautor = null;
	private $_usuario = null;
	private $_usuarioObject = null;
	private $_reto = null;
	private $_retoObject = null;
    private $_estadodemadurez = null;
	private $_estadodemadurezotro = null;
	private $_estadodemadurezObject = null;
    private $_progreso = null;
    private $_enviado = null;
    public function getTitulo() {
        return $this->_titulo;
    }
    public function setTitulo($titulo) {
        $this->_titulo = $titulo;
    }	
    public function getDuracionenmeses() {
        return $this->_duracionenmeses;
    }
    public function setDuracionenmeses($duracionenmeses) {
        $this->_duracionenmeses = $duracionenmeses;
    }	
    public function getCorreoelectronico() {
        return $this->_correoelectronico;
    }
    public function setCorreoelectronico($correoelectronico) {
        $this->_correoelectronico = $correoelectronico;
    }	
    public function getResumenejecutivo() {
        return $this->_resumenejecutivo;
    }
    public function setResumenejecutivo($resumenejecutivo) {
        $this->_resumenejecutivo = $resumenejecutivo;
    }	
    public function getImpactodesolucion() {
        return $this->_impactodesolucion;
    }
    public function setImpactodesolucion($impactodesolucion) {
        $this->_impactodesolucion = $impactodesolucion;
    }	
    public function getNombredelaempresa() {
        return $this->_nombredelaempresa;
    }
    public function setNombredelaempresa($nombredelaempresa) {
        $this->_nombredelaempresa = $nombredelaempresa;
    }	
    public function getNit() {
        return $this->_nit;
    }
    public function setNit($nit) {
        $this->_nit = $nit;
    }	
    public function getTelefono() {
        return $this->_telefono;
    }
    public function setTelefono($telefono) {
        $this->_telefono = $telefono;
    }	
    public function getPaginaweb() {
        return $this->_paginaweb;
    }
    public function setPaginaweb($paginaweb) {
        $this->_paginaweb = $paginaweb;
    }	
    public function getNombredepersonadecontacto() {
        return $this->_nombredepersonadecontacto;
    }
    public function setNombredepersonadecontacto($nombredepersonadecontacto) {
        $this->_nombredepersonadecontacto = $nombredepersonadecontacto;
    }	
    public function getCelulardelproponente() {
        return $this->_celulardelproponente;
    }
    public function setCelulardelproponente($celulardelproponente) {
        $this->_celulardelproponente = $celulardelproponente;
    }	
    public function getCorreoelectronicoproponente() {
        return $this->_correoelectronicoproponente;
    }
    public function setCorreoelectronicoproponente($correoelectronicoproponente) {
        $this->_correoelectronicoproponente = $correoelectronicoproponente;
    }
    public function getDescripciondesolucion() {
        return $this->_descripciondesolucion;
    }
    public function setDescripciondesolucion($descripciondesolucion) {
        $this->_descripciondesolucion = $descripciondesolucion;
    }
    public function getDiagramasolucion() {
        return $this->_diagramasolucion;
    }
    public function setDiagramasolucion($diagramasolucion) {
        $this->_diagramasolucion = $diagramasolucion;
    }	
    public function getPorquelasolucion() {
        return $this->_porquelasolucion;
    }
    public function setPorquelasolucion($porquelasolucion) {
        $this->_porquelasolucion = $porquelasolucion;
    }   
    public function getInspiracion() {
        return $this->_inspiracion;
    }
    public function setInspiracion($inspiracion) {
        $this->_inspiracion = $inspiracion;
        
    }   	
    public function getRequisitosusuario() {
        return $this->_requisitosusuario;
    }
    public function setRequisitosusuario($requisitosusuario) {
        $this->_requisitosusuario = $requisitosusuario;
    }	
    public function getPersonal() {
        return $this->_personal;
    }
    public function setPersonal($personal) {
        $this->_personal = $personal;
    }
    public function getServiciotecnico() {
        return $this->_serviciotecnico;
    }
    public function setServiciotecnico($serviciotecnico) {
        $this->_serviciotecnico = $serviciotecnico;
    }
    public function getEquipos() {
        return $this->_equipos;
    }
    public function setEquipos($equipos) {
        $this->_equipos = $equipos;
    }	
    public function getSoftware() {
        return $this->_software;
    }
    public function setSoftware($software) {
        $this->_software = $software;
    }	
    public function getMaterialeseinsumos() {
        return $this->_materialeseinsumos;
    }
    public function setMaterialeseinsumos($materialeseinsumos) {
        $this->_materialeseinsumos = $materialeseinsumos;
    }	
    public function getViajes() {
        return $this->_viajes;
    }
    public function setViajes($viajes) {
        $this->_viajes = $viajes;
    }	
    public function getOtrosrubros() {
        return $this->_otrosrubros;
    }
    public function setOtrosrubros($otrosrubros) {
        $this->_otrosrubros = $otrosrubros;
    }	
    public function getDescripciontrayectoria() {
        return $this->_descripciontrayectoria;
    }
    public function setDescripciontrayectoria($descripciontrayectoria) {
        $this->_descripciontrayectoria = $descripciontrayectoria;
    }	
    public function getPropiedadintelectual() {
        return $this->_propiedadintelectual;
    }
    public function setPropiedadintelectual($propiedadintelectual) {
        $this->_propiedadintelectual = $propiedadintelectual;
    }	
    public function getDescripcionpropiedadintelecual() {
        return $this->_descripcionpropiedadintelecual;
    }
    public function setDescripcionpropiedadintelecual($descripcionpropiedadintelecual) {
        $this->_descripcionpropiedadintelecual = $descripcionpropiedadintelecual;
    }	
    public function getPoliticapropiedadintelectual() {
        return $this->_politicapropiedadintelectual;
    }
    public function setPoliticapropiedadintelectual($politicapropiedadintelectual) {
        $this->_politicapropiedadintelectual = $politicapropiedadintelectual;
    }	
    public function getDescripcionpoliticapropiedadintelecual() {
        return $this->_descripcionpoliticapropiedadintelecual;
    }
    public function setDescripcionpoliticapropiedadintelecual($descripcionpoliticapropiedadintelecual) {
        $this->_descripcionpoliticapropiedadintelecual = $descripcionpoliticapropiedadintelecual;
    }	
    public function getAutenticidad() {
        return $this->_autenticidad;
    }
    public function setAutenticidad($autenticidad) {
        $this->_autenticidad = $autenticidad;
    }	
    public function getDescripcionautorpropiedad() {
        return $this->_descripcionautorpropiedad;
    }
    public function setDescripcionautorpropiedad($descripcionautorpropiedad) {
        $this->_descripcionautorpropiedad = $descripcionautorpropiedad;
    }	
    public function getCuando() {
        return $this->_cuando;
    }
    public function setCuando($cuando) {
        $this->_cuando = $cuando;
    }	
    public function getConquien() {
        return $this->_conquien;
    }
    public function setConquien($conquien) {
        $this->_conquien = $conquien;
    }	
    public function getPresentacionpublica() {
        return $this->_presentacionpublica;
    }
    public function setPresentacionpublica($presentacionpublica) {
        $this->_presentacionpublica = $presentacionpublica;
    }	
    public function getAcuerdoconfidencialidadconautor() {
        return $this->_acuerdoconfidencialidadconautor;
    }
    public function setAcuerdoconfidencialidadconautor($acuerdoconfidencialidadconautor) {
        $this->_acuerdoconfidencialidadconautor = $acuerdoconfidencialidadconautor;
    }		
    public function getUsuario() {
        return $this->_usuario;
    }
    public function setUsuario($usuario) {
        $this->_usuario = $usuario;
    }
    public function getUsuarioObject() {
        return $this->_usuarioObject;
    }
    public function setUsuarioObject($Object) {
        $this->_usuarioObject = $Object;
    }    
    public function getReto() {
        return $this->_reto;
    }
    public function setReto($reto) {
        $this->_reto = $reto;
    }
    public function getRetoObject() {
        return $this->_retoObject;
    }
    public function setRetoObject($Object) {
        $this->_retoObject = $Object;
    }    
    public function getEstadodemadurez() {
        return $this->_estadodemadurez;
    }
    public function setEstadodemadurez($estadodemadurez) {
        $this->_estadodemadurez = $estadodemadurez;
    }    
    public function getEstadodemadurezotro() {
        return $this->_estadodemadurezotro;
    }
    public function setEstadodemadurezotro($estadodemadurezotro) {
        $this->_estadodemadurezotro = $estadodemadurezotro;
    }
    public function getEstadodemadurezObject() {
        return $this->_estadodemadurezObject;
    }
    public function setEstadodemadurezObject($Object) {
        $this->_estadodemadurezObject = $Object;
    }    

    public function getProgreso (){
        return $this->_progreso;
    }

    public function setProgreso ($progreso){
        $this->_progreso = $progreso;
    }   

    public function getEnviado (){
        return $this->_enviado;
    }

    public function setEnviado ($enviado){
        $this->_enviado = $enviado;
    }

	public function get_Label_model(){
		$label = "";
		$label .= $this->_titulo." "; 
		return $label;
	}	
}
