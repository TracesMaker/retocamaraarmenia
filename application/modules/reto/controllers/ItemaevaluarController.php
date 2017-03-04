<?php
class Reto_ItemaevaluarController extends Zend_Controller_Action
{
	Private $ItemaevaluarDB;


	public function init()
	{
		if($this->_request->isXmlHttpRequest())
			$this->_helper->layout()->disableLayout();
		$this->ItemaevaluarDB = Reto_Model_ItemaevaluarMapper::getInstance();
		$this->_redirector = $this->_helper->getHelper('Redirector');
	}
    public function indexAction()
    { 
        $formBuscar = new Reto_Form_Itemaevaluarbuscar();
        $formData = $this->_getAllParams();
        $filterreceived = "";
		
		$formBuscar->setAction($this->getRequest()->getBaseUrl()."/reto/itemaevaluar/index".$filterreceived);
        $this->view->filterreceived = $filterreceived;
        if ($formBuscar->isValid($formData)){
            $this->ItemaevaluarDB->_populateFiltros($formBuscar->getValues());
        }
        $this->view->formBuscar = $formBuscar;
		if($this->getRequest()->getParam('download')== 1){
        	$this->_helper->layout()->disableLayout();
        	$this->view->pagination = $this->ItemaevaluarDB->getList();
        	$this->render('indexexcel');
        }else{
       		$this->view->pagination = $this->ItemaevaluarDB->getPaginator($this->_getParam('irapagina',1),$this->_getParam('nregistros',10));
        	$this->view->permisos = $this->getPermisosBotonera();
        }
    }
	/**
	 * Acción que permite agregar o insertar registros en Items a evaluar 
	 *
	 * @return View 
	 * @author EasyDev:Team
	 **/
	public function addAction()
	{
		$form = new Reto_Form_Itemaevaluar();
		$form->removeElement("itemaevaluar_id");
		$this->view->form = $form;
        $filterreceived = "";
        $this->view->filterreceived = $filterreceived;
		if ($this->getRequest()->isPost()){
			$this->Save($form);
		} else {
		}
	}


	/**
	 * Acción que permite editar o actualizar registros en Items a evaluar 
	 * El resgistro a editar es recibido con el parametro id => $id.
	 *
	 * @return View 
	 * @author EasyDev:Team
	 **/
	public function editAction()
	{
		$form = new Reto_Form_Itemaevaluar();
		$this->view->form=$form;
		$filterreceived = "";
		if ($this->getRequest()->isPost()){	
			$this->Save($form);
		}else{	
			$id = $this->_getParam('id', 0);
			$object= $this->ItemaevaluarDB->getById($id);
			if($object->getId()=="")
				$this->_helper->redirector('add');
			$datosArray = $this->ItemaevaluarDB->_depopulate($object);
			$datosArray = $form->_populateHidden($datosArray );
			$form->populate($datosArray );
        	$this->view->filterreceived = $filterreceived;			
		}
		
	}
	public function deleteAction()
	{
		$id = $this->getRequest()->getParam('id');
		$this->ItemaevaluarDB->DeleteData($id);
		$this->_helper->json(array("id"=>$id));
	}

	/**
	 * Función que guarda o actualiza registros en  Items a evaluar 
	 * $form: Formulario a guardar
	 * @return View 
	 * @author EasyDev:Team
	 **/
	public function Save(&$form)
	{
		$formData = $this->getRequest()->getPost();
		if ($form->isValid($formData)) {				
			$datosForm = $form->getValues();

			if(!isset($datosForm["itemaevaluar_id"]) || $datosForm["itemaevaluar_id"] == 0){
				$id = $this->ItemaevaluarDB->add($datosForm);
			} else {
				$this->ItemaevaluarDB->UpdateData($datosForm);
				$id = $datosForm["itemaevaluar_id"];
			}
			$object = $this->ItemaevaluarDB->getById($id);
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
		$permisos["edit"] = ($auth->_acl->isAllowed($rol,"reto:itemaevaluar","edit"))? true : false;
		$permisos["add"] = ($auth->_acl->isAllowed($rol,"reto:itemaevaluar","add"))? true : false;
		$permisos["delete"] = ($auth->_acl->isAllowed($rol,"reto:itemaevaluar","delete"))? true : false;
		$permisos["detail"] = ($auth->_acl->isAllowed($rol,"reto:itemaevaluar","detail"))? true : false;
		return $permisos;
	}

}
