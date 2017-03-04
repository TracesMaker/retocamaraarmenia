<?php
class Reto_RetoController extends Zend_Controller_Action
{
	Private $RetoDB;


	public function init()
	{
		$this->_helper->layout()->setLayout("layout_back");
		if($this->_request->isXmlHttpRequest())
			$this->_helper->layout()->disableLayout();
		$this->RetoDB = Reto_Model_RetoMapper::getInstance();
		$this->_redirector = $this->_helper->getHelper('Redirector');
	}
    public function indexAction()
    {				
        $formBuscar = new Reto_Form_Retobuscar();
        $formData = $this->_getAllParams();
        $filterreceived = "";

		$formBuscar->setAction($this->getRequest()->getBaseUrl()."/reto/reto/index".$filterreceived);
        $this->view->filterreceived = $filterreceived;
        if ($formBuscar->isValid($formData)){
            $this->RetoDB->_populateFiltros($formBuscar->getValues());
        }
        $this->view->formBuscar = $formBuscar;
		if($this->getRequest()->getParam('download')== 1){
        	$this->_helper->layout()->disableLayout();
        	$this->view->pagination = $this->RetoDB->getList();
        	$this->render('indexexcel');
        }else{       		
       		$this->view->pagination = $this->RetoDB->getPaginator($this->_getParam('irapagina',1),$this->_getParam('nregistros',10));

        	$this->view->permisos = $this->getPermisosBotonera();
        }
    }
	/**
	 * Acción que permite ver los datos en detalle para un registro de Reto
	 * El resgistro a ver es recibido con el parametro id => $id.
	 *
	 * @return View
	 * @author EasyDev:Team
	 **/
	public function detailAction()
	{
		$id = $this->getRequest()->getParam('id');
		$Obj = $this->RetoDB->getById($id);
		$this->view->datos = $Obj;
	}
	/**
	 * Acción que permite agregar o insertar registros en Reto
	 *
	 * @return View
	 * @author EasyDev:Team
	 **/
	public function addAction()
	{
		$form = new Reto_Form_Reto();
		$form->removeElement("reto_id");
		$this->view->form = $form;
        $filterreceived = "";
        $this->view->filterreceived = $filterreceived;
		$form->setAction($this->getRequest()->getBaseUrl()."/reto/reto/add");
		if ($this->getRequest()->isPost()){
			$this->Save($form);
		} else {
		}
	}


	/**
	 * Acción que permite editar o actualizar registros en Reto
	 * El resgistro a editar es recibido con el parametro id => $id.
	 *
	 * @return View
	 * @author EasyDev:Team
	 **/
	public function editAction()
	{
		$form = new Reto_Form_Reto();
		$this->view->form=$form;
		$filterreceived = "";
		$form->setAction($this->getRequest()->getBaseUrl()."/reto/reto/edit");
		if ($this->getRequest()->isPost()){
			$this->Save($form);
		}else{
			$id = $this->_getParam('id', 0);
			$object= $this->RetoDB->getById($id);
			if($object->getId()=="")
				$this->_helper->redirector('add');
			$datosArray = $this->RetoDB->_depopulate($object);
			$datosArray = $form->_populateHidden($datosArray );
			$form->populate($datosArray );
        	$this->view->filterreceived = $filterreceived;
		}

	}
	public function deleteAction()
	{
		$id = $this->getRequest()->getParam('id');
		$this->RetoDB->DeleteData($id);
		$this->_helper->json(array("id"=>$id));
	}

	/**
	 * Función que guarda o actualiza registros en  Reto
	 * $form: Formulario a guardar
	 * @return View
	 * @author EasyDev:Team
	 **/
	public function Save(&$form)
	{
		$formData = $this->getRequest()->getPost();
		if ($form->isValid($formData)) {
			$datosForm = $form->getValues();

			if(!isset($datosForm["reto_id"]) || $datosForm["reto_id"] == 0){
				$id = $this->RetoDB->add($datosForm);
			} else {
				$this->RetoDB->UpdateData($datosForm);
				$id = $datosForm["reto_id"];
			}
			$object = $this->RetoDB->getById($id);
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
		$permisos["edit"] = ($auth->_acl->isAllowed($rol,"reto:reto","edit"))? true : false;
		$permisos["add"] = ($auth->_acl->isAllowed($rol,"reto:reto","add"))? true : false;
		$permisos["delete"] = ($auth->_acl->isAllowed($rol,"reto:reto","delete"))? true : false;
		$permisos["detail"] = ($auth->_acl->isAllowed($rol,"reto:reto","detail"))? true : false;
		return $permisos;
	}

}
