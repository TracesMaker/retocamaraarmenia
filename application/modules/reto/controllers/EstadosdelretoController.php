<?php
class Reto_EstadosdelretoController extends Zend_Controller_Action
{
	Private $EstadosdelretoDB;


	public function init()
	{
		$this->_helper->layout()->setLayout("layout_back");
		if($this->_request->isXmlHttpRequest())
			$this->_helper->layout()->disableLayout();
		$this->EstadosdelretoDB = Reto_Model_EstadosdelretoMapper::getInstance();
		$this->_redirector = $this->_helper->getHelper('Redirector');		
	}
    public function indexAction()
    {
        $formBuscar = new Reto_Form_Estadosdelretobuscar();
        $formData = $this->_getAllParams();
        $filterreceived = "";

		$formBuscar->setAction($this->getRequest()->getBaseUrl()."/reto/estadosdelreto/index".$filterreceived);
        $this->view->filterreceived = $filterreceived;
        if ($formBuscar->isValid($formData)){
            $this->EstadosdelretoDB->_populateFiltros($formBuscar->getValues());
        }
        $this->view->formBuscar = $formBuscar;
		if($this->getRequest()->getParam('download')== 1){
        	$this->_helper->layout()->disableLayout();
        	$this->view->pagination = $this->EstadosdelretoDB->getList();
        	$this->render('indexexcel');
        }else{
       		$this->view->pagination = $this->EstadosdelretoDB->getPaginator($this->_getParam('irapagina',1),$this->_getParam('nregistros',10));
        	$this->view->permisos = $this->getPermisosBotonera();
        }
    }
	/**
	 * Acción que permite agregar o insertar registros en Estados del reto
	 *
	 * @return View
	 * @author EasyDev:Team
	 **/
	public function addAction()
	{
		$form = new Reto_Form_Estadosdelreto();
		$form->removeElement("estadosdelreto_id");
		$this->view->form = $form;
        $filterreceived = "";
        $this->view->filterreceived = $filterreceived;
		if ($this->getRequest()->isPost()){
			$this->Save($form);
		} else {
		}
	}


	/**
	 * Acción que permite editar o actualizar registros en Estados del reto
	 * El resgistro a editar es recibido con el parametro id => $id.
	 *
	 * @return View
	 * @author EasyDev:Team
	 **/
	public function editAction()
	{
		$form = new Reto_Form_Estadosdelreto();
		$this->view->form=$form;
		$filterreceived = "";
		if ($this->getRequest()->isPost()){
			$this->Save($form);
		}else{
			$id = $this->_getParam('id', 0);
			$object= $this->EstadosdelretoDB->getById($id);
			if($object->getId()=="")
				$this->_helper->redirector('add');
			$datosArray = $this->EstadosdelretoDB->_depopulate($object);
			$datosArray = $form->_populateHidden($datosArray );
			$form->populate($datosArray );
        	$this->view->filterreceived = $filterreceived;
		}

	}
	public function deleteAction()
	{
		$id = $this->getRequest()->getParam('id');
		$this->EstadosdelretoDB->DeleteData($id);
		$this->_helper->json(array("id"=>$id));
	}

	/**
	 * Función que guarda o actualiza registros en  Estados del reto
	 * $form: Formulario a guardar
	 * @return View
	 * @author EasyDev:Team
	 **/
	public function Save(&$form)
	{
		$formData = $this->getRequest()->getPost();
		if ($form->isValid($formData)) {
			$datosForm = $form->getValues();

			if(!isset($datosForm["estadosdelreto_id"]) || $datosForm["estadosdelreto_id"] == 0){
				$id = $this->EstadosdelretoDB->add($datosForm);
			} else {
				$this->EstadosdelretoDB->UpdateData($datosForm);
				$id = $datosForm["estadosdelreto_id"];
			}
			$object = $this->EstadosdelretoDB->getById($id);
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
		$permisos["edit"] = ($auth->_acl->isAllowed($rol,"reto:estadosdelreto","edit"))? true : false;
		$permisos["add"] = ($auth->_acl->isAllowed($rol,"reto:estadosdelreto","add"))? true : false;
		$permisos["delete"] = ($auth->_acl->isAllowed($rol,"reto:estadosdelreto","delete"))? true : false;
		$permisos["detail"] = ($auth->_acl->isAllowed($rol,"reto:estadosdelreto","detail"))? true : false;
		return $permisos;
	}

}
