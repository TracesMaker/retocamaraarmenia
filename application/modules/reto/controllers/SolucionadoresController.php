<?php
class Reto_SolucionadoresController extends Zend_Controller_Action
{
	Private $SolucionadoresDB;


	public function init()
	{
		if($this->_request->isXmlHttpRequest())
			$this->_helper->layout()->disableLayout();
		$this->SolucionadoresDB = Reto_Model_SolucionadoresMapper::getInstance();
		$this->_redirector = $this->_helper->getHelper('Redirector');
	}
    public function indexAction()
    {
			$this->_helper->layout()->setLayout("layout_back");
        $formBuscar = new Reto_Form_Solucionadoresbuscar();
        $formData = $this->_getAllParams();
        $filterreceived = "";
		if($this->_getParam("aclusuarios_id", 0) > 0){
        	$formData["usuario"] = $this->_getParam("aclusuarios_id");
        	$filterreceived .= "/aclusuarios_id/".$formData["usuario"];
        }


		$formBuscar->setAction($this->getRequest()->getBaseUrl()."/reto/solucionadores/index".$filterreceived);
        $this->view->filterreceived = $filterreceived;
        if ($formBuscar->isValid($formData)){
            $this->SolucionadoresDB->_populateFiltros($formBuscar->getValues());
        }
        $this->view->formBuscar = $formBuscar;
		if($this->getRequest()->getParam('download')== 1){
        	$this->_helper->layout()->disableLayout();
        	$this->view->pagination = $this->SolucionadoresDB->getList();
        	$this->render('indexexcel');
        }else{
       		$this->view->pagination = $this->SolucionadoresDB->getPaginator($this->_getParam('irapagina',1),$this->_getParam('nregistros',10));
        	$this->view->permisos = $this->getPermisosBotonera();
        }
    }

    public function byretoAction()
    {
        $this->_helper->layout()->setLayout("layout_back");
        if($this->_getParam("reto", 0) != 0){
            $this->SolucionadoresDB->_populateFiltros(array('reto' => $this->_getParam("reto")));
            $this->view->pagination = $this->SolucionadoresDB->getList();        
            $this->view->permisos = $this->getPermisosBotonera();
        }
    }

	/**
	 * Acción que permite ver los datos en detalle para un registro de Solucionadores
	 * El resgistro a ver es recibido con el parametro id => $id.
	 *
	 * @return View
	 * @author EasyDev:Team
	 **/
	public function detailAction()
	{
		$this->_helper->layout()->setLayout("layout_back");
		$id = $this->getRequest()->getParam('id');
		$Obj = $this->SolucionadoresDB->getById($id);
		$this->view->datos = $Obj;
	}


	public function evaluarAction()
	{
		$this->_helper->layout()->setLayout("layout_back");
		$id = $this->getRequest()->getParam('id');
		$Obj = $this->SolucionadoresDB->getById($id);
		$this->view->datos = $this->SolucionadoresDB->_depopulate($Obj);

		$ItemaevaluarDB = Reto_Model_ItemaevaluarMapper::getInstance();
		$ItemaevaluarDB->_populateFiltros(array("sort" => "orden","evaluable" => 1));
		$this->view->itemaevaluar = $ItemaevaluarDB->getList();

		$_auth = new Zend_Session_Namespace('veoliaZend_Auth');
		$this->view->evaluador = $_auth->usuario_id;

		$EvaluacionesDB = Reto_Model_EvaluacionesMapper::getInstance();
		
		$this->view->resultados = $EvaluacionesDB->getDatosGuardados($this->view->datos['reto'], $this->view->datos['solucionadores_id'], $_auth->usuario_id);
	
		$madurezDB = Reto_Model_EstadosdemadurezMapper::getInstance();
		$this->view->estadosMadurez = $madurezDB->getArrayOption();
	}

	public function reporteAction()
	{
		$this->_helper->layout()->setLayout("layout_back");
		$id = $this->getRequest()->getParam('id');
		$Obj = $this->SolucionadoresDB->getById($id);
		$this->view->datos = $this->SolucionadoresDB->_depopulate($Obj);

		$ItemaevaluarDB = Reto_Model_ItemaevaluarMapper::getInstance();
		$ItemaevaluarDB->_populateFiltros(array("sort" => "orden","evaluable" => 1));
		$this->view->itemaevaluar = $ItemaevaluarDB->getList();

		$_auth = new Zend_Session_Namespace('veoliaZend_Auth');
		$this->view->evaluador = $_auth->usuario_id;

		$EvaluacionesDB = Reto_Model_EvaluacionesMapper::getInstance();
		
		$resultados = $EvaluacionesDB->getDatosGuardados($this->view->datos['reto'], $this->view->datos['solucionadores_id'], $_auth->usuario_id);

		$arrayconsolidado = array();

		foreach ($resultados as $key1 => $value) {
			$item = $value['itemaevaluar'];
			$ar = $EvaluacionesDB->getValoresbyItem($this->view->datos['reto'], $this->view->datos['solucionadores_id'], $item);
			$value['valor'] = array();
			foreach ($ar as $key2 => $subvalue) {
				$value['valor'][]   = array($subvalue['concepto'], $subvalue['valor']) ;
			}
			$arrayconsolidado[] = $value;
		}
		
		$this->view->resultados = $arrayconsolidado;
	
		$madurezDB = Reto_Model_EstadosdemadurezMapper::getInstance();
		$this->view->estadosMadurez = $madurezDB->getArrayOption();
	}


	/**
	 * undocumented function
	 *
	 * @return void
	 * @author
	 **/
	public function getprogresoAction()
	{
		$p = $this->_getAllParams();

		$response = $this->SolucionadoresDB->getProgresoPorSeccion($p['solucion'], $p['seccion']);


		if($this->_request->isXmlHttpRequest())
			$this->_helper->json($response);

	}

	/**
	 * Acción que permite agregar o insertar registros en Solucionadores
	 *
	 * @return View
	 * @author EasyDev:Team
	 **/
	public function addAction()
	{
		$form = new Reto_Form_Solucionadores();
		$form->removeElement("solucionadores_id");
		$this->view->form = $form;
        $filterreceived = "";
		if($this->_getParam("aclusuarios_id", 0) > 0){
        	$formData["usuario"] = $this->_getParam("aclusuarios_id");
        	$filterreceived .= "/aclusuarios_id/".$formData["usuario"];
        }
        $this->view->filterreceived = $filterreceived;
		$form->setAction($this->getRequest()->getBaseUrl()."/reto/solucionadores/add");
		if ($this->getRequest()->isPost()){
			$this->Save($form);
		} else {
			//$form->usuario->setValue($this->_getParam("aclusuarios_id"));
		}
	}


	/**
	 * Acción que permite editar o actualizar registros en Solucionadores
	 * El resgistro a editar es recibido con el parametro id => $id.
	 *
	 * @return View
	 * @author EasyDev:Team
	 **/
	public function editAction()
	{
		$form = new Reto_Form_Solucionadores();
		$this->view->form=$form;
		$filterreceived = "";
		$form->setAction($this->getRequest()->getBaseUrl()."/reto/solucionadores/edit");
		if ($this->getRequest()->isPost()){
			$this->Save($form);
		}else{
			$id = $this->_getParam('id', 0);
			$object= $this->SolucionadoresDB->getById($id);
			if($object->getId()=="")
				$this->_helper->redirector('add');
			$datosArray = $this->SolucionadoresDB->_depopulate($object);
			$datosArray = $form->_populateHidden($datosArray );
			$form->populate($datosArray );
       		$filterreceived .= "/aclusuarios_id/".$object->getUsuario();
        	$this->view->filterreceived = $filterreceived;
		}

	}
	public function deleteAction()
	{
		$id = $this->getRequest()->getParam('id');
		$this->SolucionadoresDB->DeleteData($id);
		$this->_helper->json(array("id"=>$id));
	}

	/**
	 * Acción que permite descargar un archivo para el registro Solucionadores
	 * El archivos a descargar es recibido con el parametro id => $id y file => $file
	 *
	 * @return File
	 * @author EasyDev:Team
	 **/
	public function descargarAction()
	{
		$id = $this->_getParam('id', 0);
		$file = $this->_getParam('file', 0);
		$filename = "";
		$solucionadoresObject= $this->SolucionadoresDB->getById($id);
		if ($solucionadoresObject->getId() == "")
			$this->_helper->redirector('add');
		if ($file == "diagramasolucion") {
			$filepatch=APPLICATION_PATH."/../Files/solucionadoresdiagramasolucion/".$id;
			$filename = $solucionadoresObject->getDiagramasolucion();
		}
		if($filename != "") {
			$this->getResponse()
			->setHeader('Content-Description','File Transfer')
    		->setHeader('Content-Type','application/octet-stream')
			->setHeader('Content-Disposition','attachment; filename='.basename($filename))
			->setHeader('Content-Transfer-Encoding','binary')
			->setHeader('Expires','0')
			->setHeader('Cache-Control','must-revalidate')
			->setHeader('Pragma','public')
			->setHeader('Content-Length',filesize($filepatch));
    		$this->getResponse()->sendResponse();
           	readfile($filepatch);
        }
		exit(0);
	}
	/**
	 * Función que guarda o actualiza registros en  Solucionadores
	 * $form: Formulario a guardar
	 * @return View
	 * @author EasyDev:Team
	 **/
	public function Save(&$form)
	{
		$formData = $this->getRequest()->getPost();
		if ($form->isValid($formData)) {
			$datosForm = $form->getValues();

			if(!isset($datosForm["solucionadores_id"]) || $datosForm["solucionadores_id"] == 0){
				$id = $this->SolucionadoresDB->add($datosForm);
			} else {
				$this->SolucionadoresDB->UpdateData($datosForm);
				$id = $datosForm["solucionadores_id"];
			}
			$object = $this->SolucionadoresDB->getById($id);
			//if($this->_request->isXmlHttpRequest())
				$this->_helper->json(array("success"=>true,"id"=>$id,"nombre"=>$object->get_Label_model()));
			//else
				//$this->_helper->redirector('index');
		} else {
			 $formData = $form->_populateHidden($formData );
			 $form->populate($formData);
			 if($this->_request->isXmlHttpRequest())
			 	$this->_helper->json(array("success"=>false,"id"=>-1,"form"=>$form->render()));
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
		$permisos["edit"] = ($auth->_acl->isAllowed($rol,"reto:solucionadores","edit"))? true : false;
		$permisos["evaluar"] = ($auth->_acl->isAllowed($rol,"reto:solucionadores","evaluar"))? true : false;
		$permisos["add"] = ($auth->_acl->isAllowed($rol,"reto:solucionadores","add"))? true : false;
		$permisos["delete"] = ($auth->_acl->isAllowed($rol,"reto:solucionadores","delete"))? true : false;
		$permisos["menulateral"] = ($auth->_acl->isAllowed($rol,"reto:solucionadores","menulateral"))? true : false;
		$permisos["informaciongeneralpropuesta"] = ($auth->_acl->isAllowed($rol,"reto:solucionadores","informaciongeneralpropuesta"))? true : false;
		$permisos["informaciongeneralproponente"] = ($auth->_acl->isAllowed($rol,"reto:solucionadores","informaciongeneralproponente"))? true : false;
		$permisos["solucionysupertinencia"] = ($auth->_acl->isAllowed($rol,"reto:solucionadores","solucionysupertinencia"))? true : false;
		$permisos["planteamientopresupuestal"] = ($auth->_acl->isAllowed($rol,"reto:solucionadores","planteamientopresupuestal"))? true : false;
		$permisos["trayectoria"] = ($auth->_acl->isAllowed($rol,"reto:solucionadores","trayectoria"))? true : false;
		$permisos["madurez"] = ($auth->_acl->isAllowed($rol,"reto:solucionadores","madurez"))? true : false;
		$permisos["propiedadintelectual"] = ($auth->_acl->isAllowed($rol,"reto:solucionadores","propiedadintelectual"))? true : false;
		$permisos["detail"] = ($auth->_acl->isAllowed($rol,"reto:solucionadores","detail"))? true : false;
		$permisos["reporteevaluacion"] = ($auth->_acl->isAllowed($rol,"reto:solucionadores","reporte"))? true : false;
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
		$permisos["solucionadores"] = ($auth->_acl->isAllowed($rol,"reto:solucionadores","informaciongeneral"))? true : false;
		$permisos["solucionadores"] = ($auth->_acl->isAllowed($rol,"reto:solucionadores","informaciongeneral"))? true : false;
		$permisos["solucionadores"] = ($auth->_acl->isAllowed($rol,"reto:solucionadores","solucion"))? true : false;
		$permisos["solucionadores"] = ($auth->_acl->isAllowed($rol,"reto:solucionadores","solucion"))? true : false;
		$permisos["solucionadores"] = ($auth->_acl->isAllowed($rol,"reto:solucionadores","solucion"))? true : false;
		$permisos["solucionadores"] = ($auth->_acl->isAllowed($rol,"reto:solucionadores","solucion"))? true : false;
		$this->view->permisos = $permisos;
	}

	/**
	 * Acción que permite editar o actualizar registros en solucionadores
	 * El resgistro a editar es recibido con el parametro id => $id.
	 *
	 * @return View
	 * @author EasyDev:Team
	 **/
	public function informaciongeneralpropuestaAction()
	{
		$form = new Reto_Form_Solucionadoresinformaciongeneralpropuesta();
		$this->view->form=$form;
		if ($this->getRequest()->isPost()){
			$form->cleanForm();
			$this->Save($form);
		}else{
			$id = $this->_getParam('id', 0);
			if($id == 0)
				$id = $this->_getParam('solucionadores_id', 0);
			$object = $this->SolucionadoresDB->getById($id);
			if($object->getId() == "")
				$this->_helper->redirector('add');
			if ( $object->getId() > 0 ) {
				$datosArray = $this->SolucionadoresDB->_depopulate($object);
				$form->populate($datosArray );
			}
			$this->view->object = $object;
		}
	}

	/**
	 * Acción que permite editar o actualizar registros en solucionadores
	 * El resgistro a editar es recibido con el parametro id => $id.
	 *
	 * @return View
	 * @author EasyDev:Team
	 **/
	public function informaciongeneralproponenteAction()
	{
		$form = new Reto_Form_Solucionadoresinformaciongeneralproponente();
		$this->view->form=$form;
		if ($this->getRequest()->isPost()){
			$form->cleanForm();
			$this->Save($form);
		}else{
			$id = $this->_getParam('id', 0);
			if($id == 0)
				$id = $this->_getParam('solucionadores_id', 0);
			$object = $this->SolucionadoresDB->getById($id);
			if($object->getId() == "")
				$this->_helper->redirector('add');
			if ( $object->getId() > 0 ) {
				$datosArray = $this->SolucionadoresDB->_depopulate($object);
				$form->populate($datosArray );
			}
			$this->view->object = $object;
		}
	}

	/**
	 * Acción que permite editar o actualizar registros en solucionadores
	 * El resgistro a editar es recibido con el parametro id => $id.
	 *
	 * @return View
	 * @author EasyDev:Team
	 **/
	public function solucionysupertinenciaAction()
	{
		$form = new Reto_Form_Solucionadoressolucionysupertinencia();
		$this->view->form=$form;
		if ($this->getRequest()->isPost()){
			$form->cleanForm();
			$this->Save($form);
		}else{
			$id = $this->_getParam('id', 0);
			if($id == 0)
				$id = $this->_getParam('solucionadores_id', 0);
			$object = $this->SolucionadoresDB->getById($id);
			if($object->getId() == "")
				$this->_helper->redirector('add');
			if ( $object->getId() > 0 ) {
				$datosArray = $this->SolucionadoresDB->_depopulate($object);
				$form->populate($datosArray );
			}
			$this->view->object = $object;
		}
	}

	public function solucionysupertinenciafileAction()
	{ 	
		if ($this->getRequest()->isPost()){
			$formData = $this->getRequest()->getPost();
			$idactualizar = ($formData["solucionadores_id"]);
			$nombrefile = $_FILES['file']['name'];
			$ret = $this->SolucionadoresDB->UpdateDatafile(array('solucionadores_id'=> $idactualizar,'diagramasolucion'=> $nombrefile, 'file'=>$_FILES ));
			if($ret > 0){
				$this->_helper->json(array("success"=>true,"id"=>$idactualizar));	
			}
		}
	}


	/**
	 * Acción que permite editar o actualizar registros en solucionadores
	 * El resgistro a editar es recibido con el parametro id => $id.
	 *
	 * @return View
	 * @author EasyDev:Team
	 **/
	public function planteamientopresupuestalAction()
	{
		$form = new Reto_Form_Solucionadoresplanteamientopresupuestal();
		$this->view->form=$form;
		if ($this->getRequest()->isPost()){
			$form->cleanForm();
			$this->Save($form);
		}else{
			$id = $this->_getParam('id', 0);
			if($id == 0)
				$id = $this->_getParam('solucionadores_id', 0);
			$object = $this->SolucionadoresDB->getById($id);
			if($object->getId() == "")
				$this->_helper->redirector('add');
			if ( $object->getId() > 0 ) {
				$datosArray = $this->SolucionadoresDB->_depopulate($object);
				$form->populate($datosArray );
			}
			$this->view->object = $object;
		}
	}

	/**
	 * Acción que permite editar o actualizar registros en solucionadores
	 * El resgistro a editar es recibido con el parametro id => $id.
	 *
	 * @return View
	 * @author EasyDev:Team
	 **/
	public function trayectoriaAction()
	{
		$form = new Reto_Form_Solucionadorestrayectoria();
		$this->view->form=$form;
		if ($this->getRequest()->isPost()){
			$form->cleanForm();
			$this->Save($form);
		}else{
			$id = $this->_getParam('id', 0);
			if($id == 0)
				$id = $this->_getParam('solucionadores_id', 0);
			$object = $this->SolucionadoresDB->getById($id);
			if($object->getId() == "")
				$this->_helper->redirector('add');
			if ( $object->getId() > 0 ) {
				$datosArray = $this->SolucionadoresDB->_depopulate($object);
				$form->populate($datosArray );
			}
			$this->view->object = $object;
		}
	}

	public function madurezAction()
	{
		$form = new Reto_Form_Solucionadoresmadurez();
		$this->view->form=$form;
		if ($this->getRequest()->isPost()){
			$form->cleanForm();
			$this->Save($form);
		}else{
			$id = $this->_getParam('id', 0);
			if($id == 0)
				$id = $this->_getParam('solucionadores_id', 0);
			$object = $this->SolucionadoresDB->getById($id);
			if($object->getId() == "")
				$this->_helper->redirector('add');
			if ( $object->getId() > 0 ) {
				$datosArray = $this->SolucionadoresDB->_depopulate($object);
				$form->populate($datosArray );
			}
			$this->view->object = $object;
		}
	}

	/**
	 * Acción que permite editar o actualizar registros en solucionadores
	 * El resgistro a editar es recibido con el parametro id => $id.
	 *
	 * @return View
	 * @author EasyDev:Team
	 **/
	public function propiedadintelectualAction()
	{
		$form = new Reto_Form_Solucionadorespropiedadintelectual();
		$this->view->form=$form;
		if ($this->getRequest()->isPost()){
			$form->cleanForm();
			$enviado =  $this->getRequest()->getParam('enviado');
			$solucionadores_id = $this->getRequest()->getParam('solucionadores_id');
			$fecha_fin = $this->SolucionadoresDB->getFechafinBySolucionador($solucionadores_id);
			//var_dump(date("Y-m-d G:i") < $fecha_fin['fechafin']." 18:00");
			if(date("Y-m-d G:i") < $fecha_fin['fechafin']." 18:00"){
				$this->Save($form);
              }else{
                $this->_helper->json(array(
                	"success"=>false,
                	"cerro"=>true)
                );
              }
		}else{
			$id = $this->_getParam('id', 0);
			if($id == 0)
				$id = $this->_getParam('solucionadores_id', 0);
			$object = $this->SolucionadoresDB->getById($id);
			if($object->getId() == "")
				$this->_helper->redirector('add');
			if ( $object->getId() > 0 ) {
				$datosArray = $this->SolucionadoresDB->_depopulate($object);
				$form->populate($datosArray );
			}
			$this->view->object = $object;
		}
	}

}
