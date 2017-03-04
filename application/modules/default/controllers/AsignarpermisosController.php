<?php
class AsignarpermisosController extends Zend_Controller_Action
{
	public function init(){
		
		if($this->_request->isXmlHttpRequest())
			$this->_helper->layout()->disableLayout();
			
		$this->view->control = "asignarpermisos";
		$this->view->modulo = "default";
		$this->view->titleheader = "Asignar Permisos";
	}
	
 	public function indexAction(){
		$RellenoDB = Model_AclpermisosMapper::getInstance();
		$LecturaDB = Model_AclaccionesMapper::getInstance();
		
		$AtributoMaestro = $this->_getParam('aclroles_id', 0);
		
		$FormRelleno = new Form_Aclpermisos(); 
		$FormRelleno->removeElement("peraccion");
		$FormRelleno->removeElement("perrol");		
				
		$FieldMaestro = new Zend_Form_Element_Hidden('perrol');
		$FieldMaestro->setValue($AtributoMaestro);		
		$FormRelleno->addElement($FieldMaestro);
		
		$FieldLectura = new Zend_Form_Element_Hidden('peraccion');
		$FormRelleno->addElement($FieldLectura);
		
		$FormRelleno->setElementDecorators(array( 'ViewHelper', array('HtmlTag', array('tag' => 'div', 'class' => 'input-append'))));
		$FieldMaestro->addDecorators(array('ViewHelper', array('HtmlTag', array('class' => 'hidden'))));
		$FieldLectura->addDecorators(array('ViewHelper', array('HtmlTag', array('class' => 'hidden'))));
		
		$formBuscar = new Form_Aclaccionesbuscar();		
		$formData = $this->_getAllParams();
		if ($formBuscar->isValid($formData))
			$LecturaDB->_populateFiltros($formBuscar->getValues());
		
		$FieldAtributoMaestreo = new Zend_Form_Element_Hidden('aclroles_id');
		$FieldAtributoMaestreo->setValue($AtributoMaestro);		
		$formBuscar->addElement($FieldAtributoMaestreo);
		$formBuscar->submitaclaccionesbuscar->setAttrib('control', 'asignarpermisos');
		$formBuscar->submitaclaccionesbuscar->setAttrib('modulo', 'default');
		
		$this->view->formBuscar = $formBuscar;	
		
		$this->view->ListLectura= $LecturaDB->getPaginator($this->_getParam('irapagina',1),$this->_getParam('nregistros',10));
		$RellenoDB->_populateFiltros(array("perrol"=>$AtributoMaestro));
		$ArrayRelleno = array();
		foreach ($this->view->ListLectura->_objects as $obj){
			$idlectura  = $obj->getId();
			$RellenoDB->_populateFiltros(array( "peraccion"=>$idlectura,
												"perrol"=>$AtributoMaestro));
			$List = $RellenoDB->getList();
			if(count($List)>0) $ArrayRelleno[$obj->getId()] = $List[0];
			else $ArrayRelleno[$obj->getId()] = null;
		}
		
		$this->view->ArrayRelleno = $ArrayRelleno;
		$this->view->FormRelleno = $FormRelleno;
		$this->view->entidad="asignarpermisos";
	}
}
