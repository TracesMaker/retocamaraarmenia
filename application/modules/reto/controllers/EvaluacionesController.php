<?php
class Reto_EvaluacionesController extends Zend_Controller_Action
{
	Private $EvaluacionesDB;


	public function init()
	{
		if($this->_request->isXmlHttpRequest())
			$this->_helper->layout()->disableLayout();
		$this->EvaluacionesDB = Reto_Model_EvaluacionesMapper::getInstance();
		$this->_redirector = $this->_helper->getHelper('Redirector');
	}
    public function indexAction()
    { 
        $formBuscar = new Reto_Form_Evaluacionesbuscar();
        $formData = $this->_getAllParams();
        $filterreceived = "";
		
		$formBuscar->setAction($this->getRequest()->getBaseUrl()."/reto/evaluaciones/index".$filterreceived);
        $this->view->filterreceived = $filterreceived;
        if ($formBuscar->isValid($formData)){
            $this->EvaluacionesDB->_populateFiltros($formBuscar->getValues());
        }
        $this->view->formBuscar = $formBuscar;
		if($this->getRequest()->getParam('download')== 1){
        	$this->_helper->layout()->disableLayout();
        	$this->view->pagination = $this->EvaluacionesDB->getList();
        	$this->render('indexexcel');
        }else{
       		$this->view->pagination = $this->EvaluacionesDB->getPaginator($this->_getParam('irapagina',1),$this->_getParam('nregistros',10));
        	$this->view->permisos = $this->getPermisosBotonera();
        }
    }
	/**
	 * Acción que permite agregar o insertar registros en Evaluaciones 
	 *
	 * @return View 
	 * @author EasyDev:Team
	 **/
	public function addAction()
	{
		$form = new Reto_Form_Evaluaciones();
	
		if ($this->getRequest()->isPost()){
			$formData = $this->getRequest()->getPost();
			if ($formData['evaluaciones_id'] == '') {				
				//var_dump($formData['evaluaciones_id']); exit();
				$form->removeElement("evaluaciones_id");				
			} 
			$this->Save($form);			
		} else {
		}
		$this->view->form = $form;
        $filterreceived = "";
        $this->view->filterreceived = $filterreceived;
	}


	/**
	 * Acción que permite editar o actualizar registros en Evaluaciones 
	 * El resgistro a editar es recibido con el parametro id => $id.
	 *
	 * @return View 
	 * @author EasyDev:Team
	 **/
	public function editAction()
	{
		$form = new Reto_Form_Evaluaciones();
		$this->view->form=$form;
		$filterreceived = "";
		if ($this->getRequest()->isPost()){	
			$this->Save($form);
		}else{	
			$id = $this->_getParam('id', 0);
			$object= $this->EvaluacionesDB->getById($id);
			if($object->getId()=="")
				$this->_helper->redirector('add');
			$datosArray = $this->EvaluacionesDB->_depopulate($object);
			$datosArray = $form->_populateHidden($datosArray );
			$form->populate($datosArray );
        	$this->view->filterreceived = $filterreceived;			
		}
		
	}
	
	public function deleteAction()
	{
		$id = $this->getRequest()->getParam('id');
		$this->EvaluacionesDB->DeleteData($id);
		$this->_helper->json(array("id"=>$id));
	}

	/**
	 * Función que guarda o actualiza registros en  Evaluaciones 
	 * $form: Formulario a guardar
	 * @return View 
	 * @author EasyDev:Team
	 **/
	public function Save(&$form)
	{
		$formData = $this->getRequest()->getPost();
		if ($form->isValid($formData)) {				
			$datosForm = $form->getValues();

			if(!isset($datosForm["evaluaciones_id"]) || $datosForm["evaluaciones_id"] == 0){
				$id = $this->EvaluacionesDB->add($datosForm);
			} else {
				$this->EvaluacionesDB->UpdateData($datosForm);
				$id = $datosForm["evaluaciones_id"];
			}
			$object = $this->EvaluacionesDB->getById($id);
			if($this->_request->isXmlHttpRequest())
				$this->_helper->json(array("id"=>$id,"nombre"=>"Guardando evaluación"));
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
		$permisos["edit"] = ($auth->_acl->isAllowed($rol,"reto:evaluaciones","edit"))? true : false;
		$permisos["add"] = ($auth->_acl->isAllowed($rol,"reto:evaluaciones","add"))? true : false;
		$permisos["delete"] = ($auth->_acl->isAllowed($rol,"reto:evaluaciones","delete"))? true : false;
		$permisos["detail"] = ($auth->_acl->isAllowed($rol,"reto:evaluaciones","detail"))? true : false;
		return $permisos;
	}

}
