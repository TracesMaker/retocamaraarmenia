<?php
class Reto_SolucionessimilaresController extends Zend_Controller_Action
{
	Private $SolucionessimilaresDB;


	public function init()
	{
		if($this->_request->isXmlHttpRequest())
			$this->_helper->layout()->disableLayout();
		$this->SolucionessimilaresDB = Reto_Model_SolucionessimilaresMapper::getInstance();
		$this->_redirector = $this->_helper->getHelper('Redirector');
		$_auth = new Zend_Session_Namespace('veoliaZend_Auth');
		$this->solucionador = $_auth->solucionador;
	}
    public function indexAction()
    {  
        $this->SolucionessimilaresDB->_populateFiltros(array("solucionador" => $this->getRequest()->getParam('solucionador')));
    	$this->view->pagination = $this->SolucionessimilaresDB->getList();
    	$this->view->permisos = $this->getPermisosBotonera();
    }

    public function listAction()
    {  
        $this->SolucionessimilaresDB->_populateFiltros(array("solucionador" => $this->solucionador));
    	$this->view->pagination = $this->SolucionessimilaresDB->getList();
    	$this->view->permisos = $this->getPermisosBotonera();
    }

    public function listbyidAction()
    {  
        $id = $this->getRequest()->getParam('id');
		$Obj = $this->SolucionessimilaresDB->getById($id);
		$datosArray = $this->SolucionessimilaresDB->_depopulate($Obj);
		$this->_helper->json(array("datos"=>$datosArray));
    }
	/**
	 * Acción que permite ver los datos en detalle para un registro de Qué soluciones similares a la presentada a la propuesta ha desarrollado recientemente 
	 * El resgistro a ver es recibido con el parametro id => $id.
	 *
	 * @return View 
	 * @author EasyDev:Team
	 **/
	public function detailAction()
	{
		$id = $this->getRequest()->getParam('id');
		$Obj = $this->SolucionessimilaresDB->getById($id);
		$this->view->datos = $Obj;
	}
	/**
	 * Acción que permite agregar o insertar registros en Qué soluciones similares a la presentada a la propuesta ha desarrollado recientemente 
	 *
	 * @return View 
	 * @author EasyDev:Team
	 **/
	public function addAction()
	{
		$form = new Reto_Form_Solucionessimilares();
		$form->removeElement("solucionessimilares_id");
		$this->view->form = $form;
        $filterreceived = "";
        $this->view->filterreceived = $filterreceived;
		if ($this->getRequest()->isPost()){
			$this->Save($form);
		} else {
		}
	}


	/**
	 * Acción que permite editar o actualizar registros en Qué soluciones similares a la presentada a la propuesta ha desarrollado recientemente 
	 * El resgistro a editar es recibido con el parametro id => $id.
	 *
	 * @return View 
	 * @author EasyDev:Team
	 **/
	public function editAction()
	{
		$form = new Reto_Form_Solucionessimilares();
		$this->view->form=$form;
		$filterreceived = "";
		if ($this->getRequest()->isPost()){	
			$this->Save($form);
		}else{	
			$id = $this->_getParam('id', 0);
			$object= $this->SolucionessimilaresDB->getById($id);
			if($object->getId()=="")
				$this->_helper->redirector('add');
			$datosArray = $this->SolucionessimilaresDB->_depopulate($object);
			$datosArray = $form->_populateHidden($datosArray );
			$form->populate($datosArray );
        	$this->view->filterreceived = $filterreceived;			
		}
		
	}
	public function deleteAction()
	{
		$id = $this->getRequest()->getParam('id');
		$this->SolucionessimilaresDB->DeleteData($id);
		$this->_helper->json(array("id"=>$id));
	}

	/**
	 * Función que guarda o actualiza registros en  Qué soluciones similares a la presentada a la propuesta ha desarrollado recientemente 
	 * $form: Formulario a guardar
	 * @return View 
	 * @author EasyDev:Team
	 **/
	public function Save(&$form)
	{
		$formData = $this->getRequest()->getPost();
		if ($form->isValid($formData)) {				
			$datosForm = $form->getValues();

			if(!isset($datosForm["solucionessimilares_id"]) || $datosForm["solucionessimilares_id"] == 0){
				$datosForm['solucionador'] = $this->solucionador;
				$id = $this->SolucionessimilaresDB->add($datosForm);
			} else {
				
				$this->SolucionessimilaresDB->UpdateData($datosForm);
				$id = $datosForm["solucionessimilares_id"];
			}
			$object = $this->SolucionessimilaresDB->getById($id);
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
		$permisos["edit"] = ($auth->_acl->isAllowed($rol,"reto:solucionessimilares","edit"))? true : false;
		$permisos["add"] = ($auth->_acl->isAllowed($rol,"reto:solucionessimilares","add"))? true : false;
		$permisos["delete"] = ($auth->_acl->isAllowed($rol,"reto:solucionessimilares","delete"))? true : false;
		$permisos["detail"] = ($auth->_acl->isAllowed($rol,"reto:solucionessimilares","detail"))? true : false;
		return $permisos;
	}

}
