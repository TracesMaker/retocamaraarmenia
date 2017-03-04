<?php
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	protected function _initAutoload(){
        $modelLoader = new Zend_Application_Module_Autoloader(array(
                        'namespace' => '',
                        'basePath' => APPLICATION_PATH.'/modules/default'));

        // Se verifica si el usuario ya a iniciado sesion en la plataforma
        $auth=Zend_Auth::getInstance();
		$auth->setStorage(new Zend_Auth_Storage_Session('veoliaauth'));
        if($auth->hasIdentity()){
       		Zend_Registry::set('role',Zend_Auth::getInstance()->getStorage()->read()->role);
       		Zend_Registry::set('aclusuarios_id',Zend_Auth::getInstance()->getStorage()->read()->aclusuarios_id);
	
       	}else
        	Zend_Registry::set('role', '1');        
        
        $fc=Zend_Controller_Front::getInstance(); 
        $fc->registerPlugin(new Plugin_AccessCheck());
        
        $autoloader = Zend_Loader_Autoloader::getInstance();
		$autoloader->registerNamespace('EasyBib');
        
        return $modelLoader;
    }	
	
	function _initViewHelpers(){
		$this->bootstrap('layout');
		$layout = $this->getResource('layout');
		$view = $layout->getView();
		
		$view->setHelperPath(APPLICATION_PATH.'/helpers', '');
		
		$view->doctype('HTML4_STRICT');
		$view->headMeta()->appendHttpEquiv('Content-type', 'text/html;charset=utf-8')
						->appendName('description', '14')
						->appendName('autor', 'FaunoCo');
		
		$view->headTitle()->setSeparator(' - ')
			 ->headTitle('VEOLIA');
			 
		require_once('EasyBib/View/Helper/BootstrapMenu.php');
		$view->addHelperPath(
		        APPLICATION_PATH . "/../library/EasyBib/View/Helper",
		        'EasyBib_View_Helper_'
		);
	}
}
