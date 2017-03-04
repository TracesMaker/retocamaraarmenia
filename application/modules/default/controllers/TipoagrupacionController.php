<?php
class TipoagrupacionController extends Zend_Controller_Action
{
	Private $TipoagrupacionDB;


	public function init()
	{
		if($this->_request->isXmlHttpRequest())
			$this->_helper->layout()->disableLayout();
		$this->TipoagrupacionDB = Model_TipoagrupacionMapper::getInstance();
		$this->_redirector = $this->_helper->getHelper('Redirector');
	}
    public function indexAction()
    { 
        $formBuscar = new Form_Tipoagrupacionbuscar();
        $formData = $this->_getAllParams();
        $filterreceived = "";
		
		$formBuscar->setAction($this->getRequest()->getBaseUrl()."/default/tipoagrupacion/index".$filterreceived);
        $this->view->filterreceived = $filterreceived;
        if ($formBuscar->isValid($formData)){
            $this->TipoagrupacionDB->_populateFiltros($formBuscar->getValues());
        }
        $this->view->formBuscar = $formBuscar;
		if($this->getRequest()->getParam('download')== 1){
        	$this->_helper->layout()->disableLayout();
        	$this->view->pagination = $this->TipoagrupacionDB->getList();
        	$this->render('indexexcel');
        }else{
       		$this->view->pagination = $this->TipoagrupacionDB->getPaginator($this->_getParam('irapagina',1),$this->_getParam('nregistros',10));
        	$this->view->permisos = $this->getPermisosBotonera();
        }
    }
	/**
	 * Acción que permite agregar o insertar registros en Tipo de Agrupacion 
	 *
	 * @return View 
	 * @author EasyDev:Team
	 **/
	public function addAction()
	{
		$form = new Form_Tipoagrupacion();
		$form->removeElement("tipoagrupacion_id");
		$this->view->form = $form;
        $filterreceived = "";
        $this->view->filterreceived = $filterreceived;
		if ($this->getRequest()->isPost()){
			$this->Save($form);
		} else {
		}
	}


	/**
	 * Acción que permite editar o actualizar registros en Tipo de Agrupacion 
	 * El resgistro a editar es recibido con el parametro id => $id.
	 *
	 * @return View 
	 * @author EasyDev:Team
	 **/
	public function editAction()
	{
		$form = new Form_Tipoagrupacion();
		$this->view->form=$form;
		$filterreceived = "";
		if ($this->getRequest()->isPost()){	
			$this->Save($form);
		}else{	
			$id = $this->_getParam('id', 0);
			$object= $this->TipoagrupacionDB->getById($id);
			if($object->getId()=="")
				$this->_helper->redirector('add');
			$datosArray = $this->TipoagrupacionDB->_depopulate($object);
			$datosArray = $form->_populateHidden($datosArray );
			$form->populate($datosArray );
        	$this->view->filterreceived = $filterreceived;			
		}
		
	}
	public function deleteAction()
	{
		$id = $this->getRequest()->getParam('id');
		$this->TipoagrupacionDB->DeleteData($id);
		$this->_helper->json(array("id"=>$id));
	}

	/**
	 * Función que guarda o actualiza registros en  Tipo de Agrupacion 
	 * $form: Formulario a guardar
	 * @return View 
	 * @author EasyDev:Team
	 **/
	public function Save(&$form)
	{
		$formData = $this->getRequest()->getPost();
		if ($form->isValid($formData)) {				
			$datosForm = $form->getValues();

			if(!isset($datosForm["tipoagrupacion_id"]) || $datosForm["tipoagrupacion_id"] == 0){
				$id = $this->TipoagrupacionDB->add($datosForm);
			} else {
				$this->TipoagrupacionDB->UpdateData($datosForm);
				$id = $datosForm["tipoagrupacion_id"];
			}
			$object = $this->TipoagrupacionDB->getById($id);
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
		$permisos["edit"] = ($auth->_acl->isAllowed($rol,"default:tipoagrupacion","edit"))? true : false;
		$permisos["add"] = ($auth->_acl->isAllowed($rol,"default:tipoagrupacion","add"))? true : false;
		$permisos["delete"] = ($auth->_acl->isAllowed($rol,"default:tipoagrupacion","delete"))? true : false;
		$permisos["menulateral"] = ($auth->_acl->isAllowed($rol,"default:tipoagrupacion","menulateral"))? true : false;
		$permisos["detail"] = ($auth->_acl->isAllowed($rol,"default:tipoagrupacion","detail"))? true : false;
		return $permisos;
	}
	
	/**
	 * Retorna array con los permisos del menu lateral
	 *
	 * @permisos Array de permisos para cada tab del menú
	 * @author EasyDev:Team
	 **/
	public function menulateralAction()
	{
		$this->_helper->layout()->setLayout("layout_1");
		$auth = new Zend_Session_Namespace('veoliaZend_Auth');	
		$rol = Zend_Registry::get('role');
		$permisos = array();
		$permisos["agrupacion"] = ($auth->_acl->isAllowed($rol,"default:agrupacion","index"))? true : false;
		$this->view->permisos = $permisos;
		$_id = $this->_getParam('tipoagrupacion_id', 0);
		$this->view->tipoagrupacion_id = $_id;
		$object= $this->TipoagrupacionDB->getById($_id);
		if($object->getId() == "")
			$this->_helper->redirector('add');
		$this->view->object = $object;
	}

}
