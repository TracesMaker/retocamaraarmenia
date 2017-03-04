<?php
class AgrupacionController extends Zend_Controller_Action
{
	Private $AgrupacionDB;


	public function init()
	{
		if($this->_request->isXmlHttpRequest())
			$this->_helper->layout()->disableLayout();
		$this->AgrupacionDB = Model_AgrupacionMapper::getInstance();
		$this->_redirector = $this->_helper->getHelper('Redirector');
	}
    public function indexAction()
    { 
        $formBuscar = new Form_Agrupacionbuscar();
        $formData = $this->_getAllParams();
        $filterreceived = "";
		if($this->_getParam("tipoagrupacion_id", 0) > 0){
        	$formData["atipoagrupacion"] = $this->_getParam("tipoagrupacion_id");
        	$filterreceived .= "/tipoagrupacion_id/".$formData["atipoagrupacion"];
        }
        
		
		$formBuscar->setAction($this->getRequest()->getBaseUrl()."/default/agrupacion/index".$filterreceived);
        $this->view->filterreceived = $filterreceived;
        if ($formBuscar->isValid($formData)){
            $this->AgrupacionDB->_populateFiltros($formBuscar->getValues());
        }
        $this->view->formBuscar = $formBuscar;
		if($this->getRequest()->getParam('download')== 1){
        	$this->_helper->layout()->disableLayout();
        	$this->view->pagination = $this->AgrupacionDB->getList();
        	$this->render('indexexcel');
        }else{
       		$this->view->pagination = $this->AgrupacionDB->getPaginator($this->_getParam('irapagina',1),$this->_getParam('nregistros',10));
        	$this->view->permisos = $this->getPermisosBotonera();
        }
    }
	/**
	 * Acción que permite agregar o insertar registros en Agrupacion 
	 *
	 * @return View 
	 * @author EasyDev:Team
	 **/
	public function addAction()
	{
		$form = new Form_Agrupacion();
		$form->removeElement("agrupacion_id");
		$this->view->form = $form;
        $filterreceived = "";
		if($this->_getParam("tipoagrupacion_id", 0) > 0){
        	$formData["atipoagrupacion"] = $this->_getParam("tipoagrupacion_id");
        	$filterreceived .= "/tipoagrupacion_id/".$formData["atipoagrupacion"];
        }
        $this->view->filterreceived = $filterreceived;
		if ($this->getRequest()->isPost()){
			$this->Save($form);
		} else {
			$form->atipoagrupacion->setValue($this->_getParam("tipoagrupacion_id"));
		}
	}


	/**
	 * Acción que permite editar o actualizar registros en Agrupacion 
	 * El resgistro a editar es recibido con el parametro id => $id.
	 *
	 * @return View 
	 * @author EasyDev:Team
	 **/
	public function editAction()
	{
		$form = new Form_Agrupacion();
		$this->view->form=$form;
		$filterreceived = "";
		if ($this->getRequest()->isPost()){	
			$this->Save($form);
		}else{	
			$id = $this->_getParam('id', 0);
			$object= $this->AgrupacionDB->getById($id);
			if($object->getId()=="")
				$this->_helper->redirector('add');
			$datosArray = $this->AgrupacionDB->_depopulate($object);
			$datosArray = $form->_populateHidden($datosArray );
			$form->populate($datosArray );
       		$filterreceived .= "/tipoagrupacion_id/".$object->getAtipoagrupacion();
        	$this->view->filterreceived = $filterreceived;			
		}
		
	}
	public function deleteAction()
	{
		$id = $this->getRequest()->getParam('id');
		$this->AgrupacionDB->DeleteData($id);
		$this->_helper->json(array("id"=>$id));
	}

	/**
	 * Función que guarda o actualiza registros en  Agrupacion 
	 * $form: Formulario a guardar
	 * @return View 
	 * @author EasyDev:Team
	 **/
	public function Save(&$form)
	{
		$formData = $this->getRequest()->getPost();
		if ($form->isValid($formData)) {				
			$datosForm = $form->getValues();

			if(!isset($datosForm["agrupacion_id"]) || $datosForm["agrupacion_id"] == 0){
				$id = $this->AgrupacionDB->add($datosForm);
			} else {
				$this->AgrupacionDB->UpdateData($datosForm);
				$id = $datosForm["agrupacion_id"];
			}
			$object = $this->AgrupacionDB->getById($id);
			if($this->_request->isXmlHttpRequest())
				$this->_helper->json(array("id"=>$id,"nombre"=>$object->get_Label_model()));
			else
				$this->_redirector->gotoSimple('menulateral', 'tipoagrupacion', 'default', array("tipoagrupacion_id"=>$object->getAtipoagrupacion()));
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
		$permisos["edit"] = ($auth->_acl->isAllowed($rol,"default:agrupacion","edit"))? true : false;
		$permisos["add"] = ($auth->_acl->isAllowed($rol,"default:agrupacion","add"))? true : false;
		$permisos["delete"] = ($auth->_acl->isAllowed($rol,"default:agrupacion","delete"))? true : false;
		$permisos["detail"] = ($auth->_acl->isAllowed($rol,"default:agrupacion","detail"))? true : false;
		return $permisos;
	}

}
