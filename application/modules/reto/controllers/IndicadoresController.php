<?php
class Reto_IndicadoresController extends Zend_Controller_Action
{
	Private $IndicadoresDB;


	public function init()
	{
		if($this->_request->isXmlHttpRequest())
			$this->_helper->layout()->disableLayout();
		$this->IndicadoresDB = Reto_Model_IndicadoresMapper::getInstance();
		$this->_redirector = $this->_helper->getHelper('Redirector');
	}
    public function indexAction()
    { 
        $this->IndicadoresDB->_populateFiltros(array("solucionador" => $this->getRequest()->getParam('solucionador')));
    	$this->view->pagination = $this->IndicadoresDB->getList();
    	$this->view->permisos = $this->getPermisosBotonera();
    	
    }

    public function listAction()
    {  
        $this->IndicadoresDB->_populateFiltros(array("solucionador" => $this->getRequest()->getParam('solucionador')));
    	$this->view->pagination = $this->IndicadoresDB->getList();
    	$this->view->permisos = $this->getPermisosBotonera();
    }

    public function listbyidAction()
    {  
        $id = $this->getRequest()->getParam('id');
		$Obj = $this->IndicadoresDB->getById($id);
		$datosArray = $this->IndicadoresDB->_depopulate($Obj);
		$this->_helper->json(array("datos"=>$datosArray));
    }
	/**
	 * Acción que permite ver los datos en detalle para un registro de Qué indicadores se podrían usar para medir la eficiencia de esta solución cuando esta esté en funcionamiento 
	 * El resgistro a ver es recibido con el parametro id => $id.
	 *
	 * @return View 
	 * @author EasyDev:Team
	 **/
	public function detailAction()
	{
		$id = $this->getRequest()->getParam('id');
		$Obj = $this->IndicadoresDB->getById($id);
		$this->view->datos = $Obj;
	}
	/**
	 * Acción que permite agregar o insertar registros en Qué indicadores se podrían usar para medir la eficiencia de esta solución cuando esta esté en funcionamiento 
	 *
	 * @return View 
	 * @author EasyDev:Team
	 **/
	public function addAction()
	{
		$form = new Reto_Form_Indicadores();
		$form->removeElement("indicadores_id");
		$this->view->form = $form;
        $filterreceived = "";
        $this->view->filterreceived = $filterreceived;
		if ($this->getRequest()->isPost()){
			$this->Save($form);
		} else {
		}
	}


	/**
	 * Acción que permite editar o actualizar registros en Qué indicadores se podrían usar para medir la eficiencia de esta solución cuando esta esté en funcionamiento 
	 * El resgistro a editar es recibido con el parametro id => $id.
	 *
	 * @return View 
	 * @author EasyDev:Team
	 **/
	public function editAction()
	{
		$form = new Reto_Form_Indicadores();
		$this->view->form=$form;
		$filterreceived = "";
		if ($this->getRequest()->isPost()){	
			$this->Save($form);
		}else{	
			$id = $this->_getParam('id', 0);
			$object= $this->IndicadoresDB->getById($id);
			if($object->getId()=="")
				$this->_helper->redirector('add');
			$datosArray = $this->IndicadoresDB->_depopulate($object);
			$datosArray = $form->_populateHidden($datosArray );
			$form->populate($datosArray );
        	$this->view->filterreceived = $filterreceived;			
		}
		
	}
	public function deleteAction()
	{
		$id = $this->getRequest()->getParam('id');
		$this->IndicadoresDB->DeleteData($id);
		$this->_helper->json(array("id"=>$id));
	}

	/**
	 * Función que guarda o actualiza registros en  Qué indicadores se podrían usar para medir la eficiencia de esta solución cuando esta esté en funcionamiento 
	 * $form: Formulario a guardar
	 * @return View 
	 * @author EasyDev:Team
	 **/
	public function Save(&$form)
	{
		$formData = $this->getRequest()->getPost();
		if ($form->isValid($formData)) {				
			$datosForm = $form->getValues();

			if(!isset($datosForm["indicadores_id"]) || $datosForm["indicadores_id"] == 0){
				$id = $this->IndicadoresDB->add($datosForm);
			} else {
				$this->IndicadoresDB->UpdateData($datosForm);
				$id = $datosForm["indicadores_id"];
			}
			$object = $this->IndicadoresDB->getById($id);
			if($this->_request->isXmlHttpRequest())
				$this->_helper->json(array("id"=>$id,"nombre"=>$object->get_Label_model()));
			else
				$this->_helper->redirector('index');
		} else {
			 $formData = $form->_populateHidden($formData );
			 $form->populate($formData);
			 if($this->_request->isXmlHttpRequest())
			 	$this->_helper->json(array("id"=>-1,"form"=>$form->render()));
		}
	}
	/**
	 * Retorna array con los permisos para la botonera de los listados
	 *
	 * @return Array 
	 * @author EasyDev:Team
	 **/
	private function getPermisosBotonera()
	{
		$auth = new Zend_Session_Namespace('veoliaZend_Auth');	
		$rol = Zend_Registry::get('role');
		$permisos = array();
		$permisos["edit"] = ($auth->_acl->isAllowed($rol,"reto:indicadores","edit"))? true : false;
		$permisos["add"] = ($auth->_acl->isAllowed($rol,"reto:indicadores","add"))? true : false;
		$permisos["delete"] = ($auth->_acl->isAllowed($rol,"reto:indicadores","delete"))? true : false;
		$permisos["detail"] = ($auth->_acl->isAllowed($rol,"reto:indicadores","detail"))? true : false;
		return $permisos;
	}

}
