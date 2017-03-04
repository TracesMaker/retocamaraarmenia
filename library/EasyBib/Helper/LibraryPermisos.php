<?php
class EasyBib_Helper_LibraryPermisos  extends Zend_Controller_Action_Helper_Abstract{
	private $_auth;
	private $_redirector;
	public function __construct(){
		$this->_auth = new Zend_Session_Namespace('fantaxiasZend_Auth');
		$this->_redirector = new Zend_Controller_Action_Helper_Redirector();
	}

	/**
	* Valida si el usuario tiene permisos de trabajar en el proyecto actual
	*
	* 
	* @author EasyDev:Wgarcia
	**/
	public function validarProyecto($idProyecto){
		$modelosDB = Model_ModelosMapper::getInstance();
		$Proyecto = $modelosDB->getById($idProyecto);
		if($Proyecto->getMousuario()  != $this->_auth->usuario_id)
			$this->_redirector->gotoSimple('restringido', 'error' );
	}

	/**
	* Valida si el usuario tiene permisos de trabajar en el modulo actual
	*
	* 
	* @author EasyDev:Wgarcia
	**/
	public function validarModulo($idModulo){		
		$modulosDB = Model_ModulosMapper::getInstance();		
		$Modulo = $modulosDB->getById($idModulo);
		$idProyecto = $Modulo->getModmodelo();	
		$this->validarProyecto($idProyecto);
	}

	/**
	* Valida si el usuario tiene permisos de trabajar entidad estatica actual // parametros
	*
	* 
	* @author EasyDev:Wgarcia
	**/
	public function validarEstatica($idEstatica){		
		$estaticasDB = Model_EstaticasMapper::getInstance();
		$Estatica = $estaticasDB->getById($idEstatica);
		$idProyecto = $Estatica->getEstamodelo();		
		$this->validarProyecto($idProyecto);		
	}

	/**
	* Valida si el usuario tiene permisos de trabajar con las opciones de los paramentros//estaticas
	*
	* 
	* @author EasyDev:Wgarcia
	**/
	public function validarOpcion($idopcion){		
		$opcionesDB = Model_OpcionesMapper::getInstance();
		$Opcion = $opcionesDB->getById($idopcion);
		$idEstatica = $Opcion->getOpcestatica();
		$this->validarEstatica($idEstatica);		
	}

	public function validarMenu($idMenu){		
		$MenuDB = Model_MenuprincipalMapper::getInstance();		
		$Menu = $MenuDB->getById($idMenu);
		$idProyecto = $Menu->getMenmodelo();
		$this->validarProyecto($idProyecto);
	}

	public function validarEntidad($idEntidad){		
		$EntidadDB = Model_EntidadesMapper::getInstance();
		$EntidadDB->setPerezoso(true);
		$Entidad = $EntidadDB->getById($idEntidad);
		$IdModelo = $Entidad->getEntimoduloObject()->getModmodelo();
		$this->validarProyecto($IdModelo);
	}

	public function validarPropiedad($idPropiedad){		
		$DB = Model_PropiedadesMapper::getInstance();		
		$Propiedad = $DB->getById($idPropiedad);
		$idEntidad = $Propiedad->getProentidad();
		$this->validarEntidad($idEntidad);
	}

	public function validarRelacion($idRelacion){		
		$DB = Model_RelacionesMapper::getInstance();		
		$Relacion = $DB->getById($idRelacion);
		$idEntidad = $Relacion->getRelentidad();
		$this->validarEntidad($idEntidad);
	}

	public function validarMenuLateral($idMenuLateral){		
		$MenulateralDB = Model_MenulateralMapper::getInstance();		
		$menuLateral = $MenulateralDB->getById($idMenuLateral);
		$idEntidad = $menuLateral->getMlentidades();
		$this->validarEntidad($idEntidad);
	}

	public function validarGruposCampos($idGrupoCampos){		
		$GruposDB = Model_GruposcamposMapper::getInstance();	
		$grupo = $GruposDB->getById($idGrupoCampos);
		$idEntidad = $grupo->getGcentidad();
		$this->validarEntidad($idEntidad);
	}

}

