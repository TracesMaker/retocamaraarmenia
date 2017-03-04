<?php
class Form_Aclroles extends EasyBib_Form
{
	public function init()
	{
		$AgrupacionDB = Model_AgrupacionMapper::getInstance();
		$this->setName('aclrolesform');
		$this->setAttrib('class','form-horizontal');
 
		$aclroles_id = new Zend_Form_Element_Hidden('aclroles_id');
		$aclroles_id->addFilter('Int');
		$this->addElement($aclroles_id);

		$rolnombre = new Zend_Form_Element_Text('rolnombre');
        $rolnombre->setLabel('* Nombre:');    
		$rolnombre->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$rolnombre->setRequired(true);
		$rolnombre->setAttrib('class', '  required ');
 		$this->addElement($rolnombre);

		$rolpadre = new Zend_Form_Element_Select('rolpadre');
        $rolpadre->setLabel('Padre:');
		$AclrolesDB = Model_AclrolesMapper::getInstance();
		$ArrayOption=$AclrolesDB->getArrayOption($rolpadre);
		$rolpadre->setMultiOptions($ArrayOption);
 		$rolpadre->setAttrib('class', '   ');
 		$rolpadre->addFilter('null');
 		$this->addElement($rolpadre);
		$cancel = new Zend_Form_Element_Button('cancelaclroles');
		$cancel->setLabel('Cancelar');
		$cancel->setAttrib('class', 'btn closeform');
		$this->addElement($cancel);
		
        $SaveAndNew = new Zend_Form_Element_Button('saveandnewaclroles');
        $SaveAndNew->setLabel( 'Guardar y nuevo');
        $SaveAndNew->setAttrib('class', 'btn btn-success saveandnew hidden-phone');
        $this->addElement($SaveAndNew);
		
		$submit = new Zend_Form_Element_Button('submitaclroles');
		$submit->setLabel( 'Guardar');
		$submit->setAttrib('class', 'btn btn-primary saveform');
		$this->addElement($submit);
		

        $this->addDisplayGroup(array("submitaclroles", "saveandnewaclroles", "cancelaclroles"), 'submitaclrolesgroup');
        // set decorators
        EasyBib_Form_Decorator::setFormDecorator($this, EasyBib_Form_Decorator::BOOTSTRAP, 'submitaclroles', 'cancelaclroles', 'saveandnewaclroles');
	}
	
	public function _populateHidden($data)
	{
		return $data;
	}
	

}
