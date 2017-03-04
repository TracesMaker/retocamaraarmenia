<?php
class Reto_RiesgostecnicosController extends Zend_Controller_Action
{
	Private $RiesgostecnicosDB;


	public function init()
	{
		if($this->_request->isXmlHttpRequest())
			$this->_helper->layout()->disableLayout();
		$this->RiesgostecnicosDB = Reto_Model_RiesgostecnicosMapper::getInstance();
		$this->_redirector = $this->_helper->getHelper('Redirector');
	}
    public function indexAction()
    {  
        $this->RiesgostecnicosDB->_populateFiltros(array("solucionador" => $this->getRequest()->getParam('solucionador')));
    	$this->view->pagination = $this->RiesgostecnicosDB->getList();
    	$this->view->permisos = $this->getPermisosBotonera();
    }

    public function listAction()
    {  
        $this->RiesgostecnicosDB->_populateFiltros(array("solucionador" => $this->getRequest()->getParam('solucionador')));
    	$this->view->pagination = $this->RiesgostecnicosDB->getList();
    	$this->view->permisos = $this->getPermisosBotonera();
    }

    public function listbyidAction()
    {  
        $id = $this->getRequest()->getParam('id');
		$Obj = $this->RiesgostecnicosDB->getById($id);
		$datosArray = $this->RiesgostecnicosDB->_depopulate($Obj);
		$this->_helper->json(array("datos"=>$datosArray));
    }
	/**
	 * Acción que permite ver los datos en detalle para un registro de Qué riesgos técnicos o de funcionalidad se pueden presentar cuando la solución esté completamente implementada 
	 * El resgistro a ver es recibido con el parametro id => $id.
	 *
	 * @return View 
	 * @author EasyDev:Team
	 **/
	public function detailAction()
	{
		$id = $this->getRequest()->getParam('id');
		$Obj = $this->RiesgostecnicosDB->getById($id);
		$this->view->datos = $Obj;
	}
	/**
	 * Acción que permite agregar o insertar registros en Qué riesgos técnicos o de funcionalidad se pueden presentar cuando la solución esté completamente implementada 
	 *
	 * @return View 
	 * @author EasyDev:Team
	 **/
	public function addAction()
	{
		$form = new Reto_Form_Riesgostecnicos();
		$form->removeElement("riesgostecnicos_id");
		$this->view->form = $form;
        $filterreceived = "";
        $this->view->filterreceived = $filterreceived;
		if ($this->getRequest()->isPost()){
			$this->Save($form);
		} else {
		}
	}


	/**
	 * Acción que permite editar o actualizar registros en Qué riesgos técnicos o de funcionalidad se pueden presentar cuando la solución esté completamente implementada 
	 * El resgistro a editar es recibido con el parametro id => $id.
	 *
	 * @return View 
	 * @author EasyDev:Team
	 **/
	public function editAction()
	{
		$form = new Reto_Form_Riesgostecnicos();
		$this->view->form=$form;
		$filterreceived = "";
		if ($this->getRequest()->isPost()){	
			$this->Save($form);
		}else{	
			$id = $this->_getParam('id', 0);
			$object= $this->RiesgostecnicosDB->getById($id);
			if($object->getId()=="")
				$this->_helper->redirector('add');
			$datosArray = $this->RiesgostecnicosDB->_depopulate($object);
			$datosArray = $form->_populateHidden($datosArray );
			$form->populate($datosArray );
        	$this->view->filterreceived = $filterreceived;			
		}
		
	}
	public function deleteAction()
	{
		$id = $this->getRequest()->getParam('id');
		$this->RiesgostecnicosDB->DeleteData($id);
		$this->_helper->json(array("id"=>$id));
	}

	/**
	 * Función que guarda o actualiza registros en  Qué riesgos técnicos o de funcionalidad se pueden presentar cuando la solución esté completamente implementada 
	 * $form: Formulario a guardar
	 * @return View 
	 * @author EasyDev:Team
	 **/
	public function Save(&$form)
	{
		$formData = $this->getRequest()->getPost();
		if ($form->isValid($formData)) {				
			$datosForm = $form->getValues();

			if(!isset($datosForm["riesgostecnicos_id"]) || $datosForm["riesgostecnicos_id"] == 0){
				$id = $this->RiesgostecnicosDB->add($datosForm);
			} else {
				$this->RiesgostecnicosDB->UpdateData($datosForm);
				$id = $datosForm["riesgostecnicos_id"];
			}
			$object = $this->RiesgostecnicosDB->getById($id);
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
		$permisos["edit"] = ($auth->_acl->isAllowed($rol,"reto:riesgostecnicos","edit"))? true : false;
		$permisos["add"] = ($auth->_acl->isAllowed($rol,"reto:riesgostecnicos","add"))? true : false;
		$permisos["delete"] = ($auth->_acl->isAllowed($rol,"reto:riesgostecnicos","delete"))? true : false;
		$permisos["detail"] = ($auth->_acl->isAllowed($rol,"reto:riesgostecnicos","detail"))? true : false;
		return $permisos;
	}

}
