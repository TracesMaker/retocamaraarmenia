<?php
class Reto_ElementostangiblesController extends Zend_Controller_Action
{
	Private $ElementostangiblesDB;


	public function init()
	{
		if($this->_request->isXmlHttpRequest())
			$this->_helper->layout()->disableLayout();
		$this->ElementostangiblesDB = Reto_Model_ElementostangiblesMapper::getInstance();
		$this->_redirector = $this->_helper->getHelper('Redirector');
		$_auth = new Zend_Session_Namespace('veoliaZend_Auth');
		$this->solucionador = $_auth->solucionador;
	}
    public function indexAction()
    {   	
        $this->ElementostangiblesDB->_populateFiltros(array("solucionador" => $this->getRequest()->getParam('solucionador')));
    	$this->view->pagination = $this->ElementostangiblesDB->getList();        
    }

    public function listAction()
    {  
        $this->ElementostangiblesDB->_populateFiltros(array("solucionador" => $this->solucionador));
    	$this->view->pagination = $this->ElementostangiblesDB->getList();
    	$this->view->permisos = $this->getPermisosBotonera();
    }
    public function listbyidAction()
    {  
        $id = $this->getRequest()->getParam('id');
		$Obj = $this->ElementostangiblesDB->getById($id);
		$datosArray = $this->ElementostangiblesDB->_depopulate($Obj);
		$this->_helper->json(array("datos"=>$datosArray));
    }
	/**
	 * Acción que permite ver los datos en detalle para un registro de Elementos tangibles 
	 * El resgistro a ver es recibido con el parametro id => $id.
	 *
	 * @return View 
	 * @author EasyDev:Team
	 **/
	public function detailAction()
	{
		$id = $this->getRequest()->getParam('id');
		$Obj = $this->ElementostangiblesDB->getById($id);
		$this->view->datos = $Obj;
	}
	/**
	 * Acción que permite agregar o insertar registros en Elementos tangibles 
	 *
	 * @return View 
	 * @author EasyDev:Team
	 **/
	public function addAction()
	{
		$form = new Reto_Form_Elementostangibles();
		$form->removeElement("elementostangibles_id");
		$this->view->form = $form;
        $filterreceived = "";
        $this->view->filterreceived = $filterreceived;
		if ($this->getRequest()->isPost()){
			$this->Save($form);
		} else {
		}
	}


	/**
	 * Acción que permite editar o actualizar registros en Elementos tangibles 
	 * El resgistro a editar es recibido con el parametro id => $id.
	 *
	 * @return View 
	 * @author EasyDev:Team
	 **/
	public function editAction()
	{
		$form = new Reto_Form_Elementostangibles();
		$this->view->form=$form;
		$filterreceived = "";
		if ($this->getRequest()->isPost()){	
			$this->Save($form);
		}else{	
			$id = $this->_getParam('id', 0);
			$object= $this->ElementostangiblesDB->getById($id);
			if($object->getId()=="")
				$this->_helper->redirector('add');
			$datosArray = $this->ElementostangiblesDB->_depopulate($object);
			$datosArray = $form->_populateHidden($datosArray );
			$form->populate($datosArray );
        	$this->view->filterreceived = $filterreceived;			
		}
		
	}
	public function deleteAction()
	{
		$id = $this->getRequest()->getParam('id');
		$this->ElementostangiblesDB->DeleteData($id);
		$this->_helper->json(array("id"=>$id));
	}

	/**
	 * Función que guarda o actualiza registros en  Elementos tangibles 
	 * $form: Formulario a guardar
	 * @return View 
	 * @author EasyDev:Team
	 **/
	public function Save(&$form)
	{
		$formData = $this->getRequest()->getPost();
		if ($form->isValid($formData)) {				
			$datosForm = $form->getValues();

			if(!isset($datosForm["elementostangibles_id"]) || $datosForm["elementostangibles_id"] == 0){
				$datosForm['solucionador'] = $this->solucionador;
				$id = $this->ElementostangiblesDB->add($datosForm);
			} else {
				$this->ElementostangiblesDB->UpdateData($datosForm);
				$id = $datosForm["elementostangibles_id"];
			}
			$object = $this->ElementostangiblesDB->getById($id);
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
		$permisos["edit"] = ($auth->_acl->isAllowed($rol,"reto:elementostangibles","edit"))? true : false;
		$permisos["add"] = ($auth->_acl->isAllowed($rol,"reto:elementostangibles","add"))? true : false;
		$permisos["delete"] = ($auth->_acl->isAllowed($rol,"reto:elementostangibles","delete"))? true : false;
		$permisos["detail"] = ($auth->_acl->isAllowed($rol,"reto:elementostangibles","detail"))? true : false;
		return $permisos;
	}

}
