<?php
class Form_Aclhistorialusuarios extends EasyBib_Form
{
	public function init()
	{
		$AgrupacionDB = Model_AgrupacionMapper::getInstance();
		$this->setName('aclhistorialusuariosform');
		$this->setAttrib('class','form-horizontal');
 
		$aclhistorialusuarios_id = new Zend_Form_Element_Hidden('aclhistorialusuarios_id');
		$aclhistorialusuarios_id->addFilter('Int');
		$this->addElement($aclhistorialusuarios_id);

		$aclhusuario = new Zend_Form_Element_Select('aclhusuario');
        $aclhusuario->setLabel('Usuario:');
		$AclusuariosDB = Model_AclusuariosMapper::getInstance();
		$ArrayOption=$AclusuariosDB->getArrayOption($aclhusuario);
		$aclhusuario->setMultiOptions($ArrayOption);
 		$aclhusuario->setAttrib('class', '   ');
 		$aclhusuario->addFilter('null');
 		$this->addElement($aclhusuario);
		$cancel = new Zend_Form_Element_Button('cancelaclhistorialusuarios');
		$cancel->setLabel('Cancelar');
		$cancel->setAttrib('class', 'btn closeform');
		$this->addElement($cancel);
		
        $SaveAndNew = new Zend_Form_Element_Button('saveandnewaclhistorialusuarios');
        $SaveAndNew->setLabel( 'Guardar y nuevo');
        $SaveAndNew->setAttrib('class', 'btn btn-success saveandnew hidden-phone');
        $this->addElement($SaveAndNew);
		
		$submit = new Zend_Form_Element_Button('submitaclhistorialusuarios');
		$submit->setLabel( 'Guardar');
		$submit->setAttrib('class', 'btn btn-primary saveform');
		$this->addElement($submit);
		

        $this->addDisplayGroup(array("submitaclhistorialusuarios", "saveandnewaclhistorialusuarios", "cancelaclhistorialusuarios"), 'submitaclhistorialusuariosgroup');
        // set decorators
        EasyBib_Form_Decorator::setFormDecorator($this, EasyBib_Form_Decorator::BOOTSTRAP, 'submitaclhistorialusuarios', 'cancelaclhistorialusuarios', 'saveandnewaclhistorialusuarios');
	}
	
	public function _populateHidden($data)
	{
		return $data;
	}
	

}
