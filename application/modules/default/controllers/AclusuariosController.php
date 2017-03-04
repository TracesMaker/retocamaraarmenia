<?php
class AclusuariosController extends Zend_Controller_Action
{
	Private $AclusuariosDB;


	public function init()
	{
		$this->_helper->layout()->setLayout("layout_back");
		if($this->_request->isXmlHttpRequest())
			$this->_helper->layout()->disableLayout();
		$this->AclusuariosDB = Model_AclusuariosMapper::getInstance();
		$this->_redirector = $this->_helper->getHelper('Redirector');
	}
    public function indexAction()
    {
        $formBuscar = new Form_Aclusuariosbuscar();
        $formData = $this->_getAllParams();
        $filterreceived = "";

		$formBuscar->setAction($this->getRequest()->getBaseUrl()."/default/aclusuarios/index".$filterreceived);
        $this->view->filterreceived = $filterreceived;
        if ($formBuscar->isValid($formData)){
            $this->AclusuariosDB->_populateFiltros($formBuscar->getValues());
        }
        $this->view->formBuscar = $formBuscar;
		if($this->getRequest()->getParam('download')== 1){
        	$this->_helper->layout()->disableLayout();
        	$this->view->pagination = $this->AclusuariosDB->getList();
        	$this->render('indexexcel');
        }else{
       		$this->view->pagination = $this->AclusuariosDB->getPaginator($this->_getParam('irapagina',1),$this->_getParam('nregistros',10));
        	$this->view->permisos = $this->getPermisosBotonera();
        }
    }
	/**
	 * Acción que permite agregar o insertar registros en Usuarios
	 *
	 * @return View
	 * @author EasyDev:Team
	 **/
	public function addAction()
	{
		$form = new Form_Aclusuarios();
		$form->removeElement("aclusuarios_id");
		$this->view->form = $form;
        $filterreceived = "";
        $this->view->filterreceived = $filterreceived;
		if ($this->getRequest()->isPost()){
			$this->Save($form);
		} else {
			$this->view->form->populateDefault();
		}
	}

	/**
	 * Acción que permite validar si un campo es unico
	 * $propiedad : Propiedad en la tabla Usuarios para verificar si es unico
	 * $valor : Valor a buscar para propiedad unica
	 *
	 * @return Json
	 * @author EasyDev:Team
	 **/
	function validateonlyAction()
	{
		$propiedad = $this->getRequest()->getParam('propiedad');
		$valor = $this->getRequest()->getParam('valor');
		$Obj = $this->AclusuariosDB->getByPropiedad($propiedad, $valor);
		$this->_helper->json($Obj->getId());
	}

	/**
	 * Acción que permite editar o actualizar registros en Usuarios
	 * El resgistro a editar es recibido con el parametro id => $id.
	 *
	 * @return View
	 * @author EasyDev:Team
	 **/
	public function editAction()
	{
		$form = new Form_Aclusuarios();
		$this->view->form=$form;
		$filterreceived = "";
		if ($this->getRequest()->isPost()){
			$this->Save($form);
		}else{
			$id = $this->_getParam('id', 0);
			$object= $this->AclusuariosDB->getById($id);
			if($object->getId()=="")
				$this->_helper->redirector('add');
			$datosArray = $this->AclusuariosDB->_depopulate($object);
			$datosArray = $form->_populateHidden($datosArray );
			$form->populate($datosArray );
            $form->password->setValue("");
        	$this->view->filterreceived = $filterreceived;
		}

	}
	public function deleteAction()
	{
		$id = $this->getRequest()->getParam('id');
		$this->AclusuariosDB->DeleteData($id);
		$this->_helper->json(array("id"=>$id));
	}

	public function estadoAction(){
		$id = $this->getRequest()->getParam('id');
		$data = array(	'aclusuarios_id' => $id,
						'activo' => new Zend_Db_Expr('NOT activo'));
		$aclusuariosDB = Model_AclusuariosMapper::getInstance();
		$aclusuariosDB->UpdateData($data);
		$this->_helper->json("");
	}

	/**
	 * Función que guarda o actualiza registros en  Usuarios
	 * $form: Formulario a guardar
	 * @return View
	 * @author EasyDev:Team
	 **/
	public function Save(&$form)
	{
		$formData = $this->getRequest()->getPost();
		if ($form->isValid($formData)) {
			$datosForm = $form->getValues();

			if(!isset($datosForm["aclusuarios_id"]) || $datosForm["aclusuarios_id"] == 0){
				$id = $this->AclusuariosDB->add($datosForm);
			} else {
				$datosForm["password0"] = $this->getParam("password0");
				$this->AclusuariosDB->UpdateData($datosForm);
				$id = $datosForm["aclusuarios_id"];
			}
			$object = $this->AclusuariosDB->getById($id);
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
		$permisos["edit"] = ($auth->_acl->isAllowed($rol,"default:aclusuarios","edit"))? true : false;
		$permisos["add"] = ($auth->_acl->isAllowed($rol,"default:aclusuarios","add"))? true : false;
		$permisos["delete"] = ($auth->_acl->isAllowed($rol,"default:aclusuarios","delete"))? true : false;
		$permisos["password"] = ($auth->_acl->isAllowed($rol,"default:aclusuarios","password"))? true : false;
		$permisos["estado"] = ($auth->_acl->isAllowed($rol,"default:aclusuarios","estado"))? true : false;
		$permisos["detail"] = ($auth->_acl->isAllowed($rol,"default:aclusuarios","detail"))? true : false;
		return $permisos;
	}

	/**
	 * Acción que permite editar o actualizar registros en aclusuarios
	 * El resgistro a editar es recibido con el parametro id => $id.
	 *
	 * @return View
	 * @author EasyDev:Team
	 **/
	public function passwordAction()
	{
		$form = new Form_Aclusuariospassword();
		$this->view->form=$form;
		if ($this->getRequest()->isPost()){
			$form->cleanForm();
			$this->Save($form);
		}else{
			$id = $this->_getParam('id', 0);
			if($id == 0)
				$id = $this->_getParam('aclusuarios_id', 0);
			$object = $this->AclusuariosDB->getById($id);
			$form->populateDefault();
			if($object->getId() == "")
				$this->_helper->redirector('add');
			if ( $object->getId() > 0 ) {
				$datosArray = $this->AclusuariosDB->_depopulate($object);
				$form->populate($datosArray );
			}
			$this->view->object = $object;
		}
	}

	/**
	 * Acción que permite actualizar la información del usuarios en sesssion
	 *
	 * @return View
	 * @author EasyDev:Team
	 **/
	public function perfilAction(){
		$form = new Form_Perfil();
		$this->view->form=$form;
		if ($this->getRequest()->isPost()){
			$formData = $this->getRequest()->getPost();
			if ($form->isValid($formData))
			 $success = $this->AclusuariosDB->UpdateData($form->getValues());
			 $this->_helper->json(array("id"=>$success));
		}else{
			$_id = Zend_Auth::getInstance()->getIdentity()->aclusuarios_id;
			$this->view->aclusuarios_id = $_id;
			$object= $this->AclusuariosDB->getById($_id);
			if($object->getId()=="")
				return null;
			$datosArray = $this->AclusuariosDB->_depopulate($object);
			$datosArray = $form->_populateHidden($datosArray );
			$form->populate($datosArray );
		}
	}

	/**
	 * Acción que permite cambiar la contraseña del usuarios en sesssion
	 *
	 * @return View
	 * @author EasyDev:Team
	 **/
	public function passAction(){
		$form = new Form_Pass();
		$this->view->form=$form;
		if ($this->getRequest()->isPost()){
			$formData = $this->getRequest()->getPost();
			if ($form->isValid($formData))
			$success = $this->AclusuariosDB->UpdateData($formData);
			$this->_helper->json(array("id"=>$success));
		}else{
			$_id = Zend_Auth::getInstance()->getIdentity()->aclusuarios_id;
			$this->view->aclusuarios_id = $_id;
			$object= $this->AclusuariosDB->getById($_id);
			if($object->getId()=="")
				return null;
			$datosArray = $this->AclusuariosDB->_depopulate($object);
			$datosArray = $form->_populateHidden($datosArray );
			$form->populate($datosArray );
		}
	}

	/**
	 * Acción que permite agregar o insertar registros en Usuarios
	 *
	 * @return View
	 * @author EasyDev:Team
	 **/
	public function agregarAction()
	{
		$form = new Form_Solucionadores();
		$form->removeElement("aclusuarios_id");
		$this->view->form = $form;
        $filterreceived = "";
        $this->view->filterreceived = $filterreceived;
		if ($this->getRequest()->isPost()){
			$this->Save2($form);
		} else {
			$this->view->form->populateDefault();
		}
	}

	/**
	 * Función que guarda o actualiza registros en  Usuarios
	 * $form: Formulario a guardar
	 * @return View
	 * @author EasyDev:Team
	 **/
	public function Save2(&$form)
	{
		$formData = $this->getRequest()->getPost();
		if ($form->isValid($formData)) {
			$datosForm = $form->getValues();

			if(!isset($datosForm["aclusuarios_id"]) || $datosForm["aclusuarios_id"] == 0){
				$datosForm["role"] = 3;
				$datosForm["username"] = $datosForm["email"];
				$id = $this->AclusuariosDB->add($datosForm);
			} else {
				$datosForm["password0"] = $this->getParam("password0");
				$this->AclusuariosDB->UpdateData($datosForm);
				$id = $datosForm["aclusuarios_id"];
			}
			
			if($this->_request->isXmlHttpRequest())
				$this->_helper->json(array("id"=>$id));
			else
				$this->_helper->redirector('index');
		} else {
			 $formData = $form->_populateHidden($formData );
			 $form->populate($formData);
			 if($this->_request->isXmlHttpRequest())
			 	$this->_helper->json(array("id"=>-1,"form"=>$form->render()));
		}
	}
}
