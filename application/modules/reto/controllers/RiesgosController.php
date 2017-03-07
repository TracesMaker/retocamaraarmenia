<?php
class Reto_RiesgosController extends Zend_Controller_Action
{
	Private $RiesgosDB;


	public function init()
	{
		if($this->_request->isXmlHttpRequest())
			$this->_helper->layout()->disableLayout();
		$this->RiesgosDB = Reto_Model_RiesgosMapper::getInstance();
		$this->_redirector = $this->_helper->getHelper('Redirector');
		$_auth = new Zend_Session_Namespace('veoliaZend_Auth');
		$this->solucionador = $_auth->solucionador;
	}
    public function indexAction()
    {  
        $this->RiesgosDB->_populateFiltros(array("solucionador" => $this->getRequest()->getParam('solucionador')));
    	$this->view->pagination = $this->RiesgosDB->getList();
    	$this->view->permisos = $this->getPermisosBotonera();    	
    }
    public function listAction()
    {  
        $this->RiesgosDB->_populateFiltros(array("solucionador" => $this->solucionador));
    	$this->view->pagination = $this->RiesgosDB->getList();
    	$this->view->permisos = $this->getPermisosBotonera();
    }

    public function listbyidAction()
    {  
        $id = $this->getRequest()->getParam('id');
		$Obj = $this->RiesgosDB->getById($id);
		$datosArray = $this->RiesgosDB->_depopulate($Obj);
		$this->_helper->json(array("datos"=>$datosArray));
    }

    
	/**
	 * Acción que permite ver los datos en detalle para un registro de Qué riesgos técnicos identifica que se pueden presentar para llegar a la implementación de esta solución? 
	 * El resgistro a ver es recibido con el parametro id => $id.
	 *
	 * @return View 
	 * @author EasyDev:Team
	 **/
	public function detailAction()
	{
		$id = $this->getRequest()->getParam('id');
		$Obj = $this->RiesgosDB->getById($id);
		$this->view->datos = $Obj;
	}
	/**
	 * Acción que permite agregar o insertar registros en Qué riesgos técnicos identifica que se pueden presentar para llegar a la implementación de esta solución? 
	 *
	 * @return View 
	 * @author EasyDev:Team
	 **/
	public function addAction()
	{
		$form = new Reto_Form_Riesgos();
		$form->removeElement("riesgos_id");
		$this->view->form = $form;
        $filterreceived = "";
        $this->view->filterreceived = $filterreceived;
		if ($this->getRequest()->isPost()){
			$this->Save($form);
		} else {
		}
	}


	/**
	 * Acción que permite editar o actualizar registros en Qué riesgos técnicos identifica que se pueden presentar para llegar a la implementación de esta solución? 
	 * El resgistro a editar es recibido con el parametro id => $id.
	 *
	 * @return View 
	 * @author EasyDev:Team
	 **/
	public function editAction()
	{
		$form = new Reto_Form_Riesgos();
		$this->view->form=$form;
		$filterreceived = "";
		if ($this->getRequest()->isPost()){	
			$this->Save($form);
		}else{	
			$id = $this->_getParam('id', 0);
			$object= $this->RiesgosDB->getById($id);
			if($object->getId()=="")
				$this->_helper->redirector('add');
			$datosArray = $this->RiesgosDB->_depopulate($object);
			$datosArray = $form->_populateHidden($datosArray );
			$form->populate($datosArray );
        	$this->view->filterreceived = $filterreceived;			
		}
		
	}
	public function deleteAction()
	{
		$id = $this->getRequest()->getParam('id');
		$this->RiesgosDB->DeleteData($id);
		$this->_helper->json(array("id"=>$id));
	}

	/**
	 * Función que guarda o actualiza registros en  Qué riesgos técnicos identifica que se pueden presentar para llegar a la implementación de esta solución? 
	 * $form: Formulario a guardar
	 * @return View 
	 * @author EasyDev:Team
	 **/
	public function Save(&$form)
	{
		$formData = $this->getRequest()->getPost();
		if ($form->isValid($formData)) {				
			$datosForm = $form->getValues();

			if(!isset($datosForm["riesgos_id"]) || $datosForm["riesgos_id"] == 0){
				$datosForm['solucionador'] = $this->solucionador;
				$id = $this->RiesgosDB->add($datosForm);
			} else {
				$this->RiesgosDB->UpdateData($datosForm);
				$id = $datosForm["riesgos_id"];
			}
			$object = $this->RiesgosDB->getById($id);
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
		$permisos["edit"] = ($auth->_acl->isAllowed($rol,"reto:riesgos","edit"))? true : false;
		$permisos["add"] = ($auth->_acl->isAllowed($rol,"reto:riesgos","add"))? true : false;
		$permisos["delete"] = ($auth->_acl->isAllowed($rol,"reto:riesgos","delete"))? true : false;
		$permisos["detail"] = ($auth->_acl->isAllowed($rol,"reto:riesgos","detail"))? true : false;
		return $permisos;
	}

}
