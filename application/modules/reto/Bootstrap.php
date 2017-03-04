<?php
class Reto_Bootstrap extends Zend_Application_Module_Bootstrap
{
	protected function _initAutoload()
    {
        $modelLoader = new Zend_Application_Module_Autoloader(array(
                        'namespace' => 'Reto_',
                        'basePath' => APPLICATION_PATH.'/modules/reto'));
        return $modelLoader;
    }	
	
}
