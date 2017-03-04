<?php
class Plugin_AccessCheck extends Zend_Controller_Plugin_Abstract{
	private $auth;
	private $_navigation;
	
	public function __construct(){
		$this->auth = new Zend_Session_Namespace('veoliaZend_Auth');
		$this->_navigation = new Zend_Session_Namespace('veoliaZend_Navigation');
	}
	
	public function preDispatch(Zend_Controller_Request_Abstract $request){
	
		if(!isset($this->auth->_acl)){
			$this->auth->_acl = new Model_LibraryAcl();
		}
		
		/* //Se comenta el navigation para que no se procese en todas las peticiones ajax y quede activo el item especifico en el menu
		if(!isset($this->_navigation->renderMenu)){
			$view = Zend_Controller_Front::getInstance()
					->getParam('bootstrap')
					->getResource('layout')
					->getView();
			$navContainerConfig = new Zend_Config_Xml('../menus/menuprincipal.xml', 'nav');
			$navContainer = new Zend_Navigation($navContainerConfig);
			$view->navigation($navContainer)
				->setAcl($this->auth->_acl)
				->setRole(Zend_Registry::get('role'));			
			$this->_navigation->renderMenu = $view->navigation()->menu()->renderMenu($view->navPrincipal, array('ulClass' => 'nav'));
		}*/
		
		/*
		if (isset($this->auth->usuario_id)){
			$tableUsuariosOnline = Model_AclusuariosonlineMapper::getInstance();
			$Obj_useron=$tableUsuariosOnline->getByPropiedad("usuario_id", $this->auth->usuario_id);		
			$this->actualizarUsuarioOnline($Obj_useron);
			if (($Obj_useron->getId() > 0)&&($Obj_useron->getId()==$this->auth->aclusuariosonline_id)){
				$tableUsuariosOnline->UpdateData(array('ultimoacceso' => date('Y-n-j H:i:s'), 
														'aclusuariosonline_id' =>  $Obj_useron->getId() ));
			}else{
				// Se borra la identidad del usuario inactivo y se redirecciona a la pagina de login
				Zend_Auth::getInstance()->clearIdentity();
				Zend_Session::destroy();
        		$request->setControllerName('authentication')->setActionName('login');
			}
		}		
		 * */
		$this->VerificarPermiso($request);
	}
	
	private function VerificarPermiso($request){
		// Si algun usuario trata de entrar a alguna pagina o utilizar algun recurso que no tiene autorizado se
		// redirrecciona a la pagina de login
		$module=$request->getModuleName();
		$resource=$request->getControllerName();
		$action=$request->getActionName();	
		$rol = Zend_Registry::get('role');
		if (!$this->auth->_acl->isAllowed($rol,$module.':'.$resource,$action)){
			$request->setControllerName('authentication')->setActionName('login');
		}	
	}
	
	private function actualizarUsuarioOnline($obj_useron){
		$now=date("Y-n-j H:i:s");
		$tableUsuariosOnline = Model_AclusuariosonlineMapper::getInstance();
    		$time_online = (strtotime($now)-strtotime($obj_useron->getUltimoacceso()));
    		if($time_online>=1440)
    			$tableUsuariosOnline->DeleteData($obj_useron->getId());
			else
           		$tableUsuariosOnline->UpdateData(array('tiempo' => $time_online, 'aclusuariosonline_id' =>  $obj_useron->getId() ));
	}
}

