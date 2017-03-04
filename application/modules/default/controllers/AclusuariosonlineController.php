<?php
class AclusuariosonlineController extends Zend_Controller_Action
{
	Private $AclusuariosonlineDB;


	public function init()
	{
		if($this->_request->isXmlHttpRequest())
			$this->_helper->layout()->disableLayout();
		$this->AclusuariosonlineDB = Model_AclusuariosonlineMapper::getInstance();
		$this->_redirector = $this->_helper->getHelper('Redirector');
	}
    public function indexAction()
    { 
        $formBuscar = new Form_Aclusuariosonlinebuscar();
        $formData = $this->_getAllParams();
        $filterreceived = "";
		
		$formBuscar->setAction($this->getRequest()->getBaseUrl()."/default/aclusuariosonline/index".$filterreceived);
        $this->view->filterreceived = $filterreceived;
        if ($formBuscar->isValid($formData)){
            $this->AclusuariosonlineDB->_populateFiltros($formBuscar->getValues());
        }
        $this->view->formBuscar = $formBuscar;
		if($this->getRequest()->getParam('download')== 1){
        	$this->_helper->layout()->disableLayout();
        	$this->view->pagination = $this->AclusuariosonlineDB->getList();
        	$this->render('indexexcel');
        }else{
       		$this->view->pagination = $this->AclusuariosonlineDB->getPaginator($this->_getParam('irapagina',1),$this->_getParam('nregistros',10));
        	$this->view->permisos = $this->getPermisosBotonera();
        }
    }

	/**
	 * Acción que permite editar o actualizar registros en Usuarios Online 
	 * El resgistro a editar es recibido con el parametro id => $id.
	 *
	 * @return View 
	 * @author EasyDev:Team
	 **/
	public function editAction()
	{
		$form = new Form_Aclusuariosonline();
		$this->view->form=$form;
		$filterreceived = "";
		if ($this->getRequest()->isPost()){	
			$this->Save($form);
		}else{	
			$id = $this->_getParam('id', 0);
			$object= $this->AclusuariosonlineDB->getById($id);
			if($object->getId()=="")
				$this->_helper->redirector('add');
			$datosArray = $this->AclusuariosonlineDB->_depopulate($object);
			$datosArray = $form->_populateHidden($datosArray );
			$form->populate($datosArray );
        	$this->view->filterreceived = $filterreceived;			
		}
		
	}

	/**
	 * Función que guarda o actualiza registros en  Usuarios Online 
	 * $form: Formulario a guardar
	 * @return View 
	 * @author EasyDev:Team
	 **/
	public function Save(&$form)
	{
		$formData = $this->getRequest()->getPost();
		if ($form->isValid($formData)) {				
			$datosForm = $form->getValues();

			if(!isset($datosForm["aclusuariosonline_id"]) || $datosForm["aclusuariosonline_id"] == 0){
				$id = $this->AclusuariosonlineDB->add($datosForm);
			} else {
				$this->AclusuariosonlineDB->UpdateData($datosForm);
				$id = $datosForm["aclusuariosonline_id"];
			}
			$object = $this->AclusuariosonlineDB->getById($id);
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
		$permisos["edit"] = ($auth->_acl->isAllowed($rol,"default:aclusuariosonline","edit"))? true : false;
		$permisos["detail"] = ($auth->_acl->isAllowed($rol,"default:aclusuariosonline","detail"))? true : false;
		return $permisos;
	}

}
