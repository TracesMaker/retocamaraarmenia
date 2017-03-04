<?php
class Form_Pass extends EasyBib_Form
{
	public function init()
	{
		$AgrupacionDB = Model_AgrupacionMapper::getInstance();
		$this->setName('aclusuariosform');
		$this->setAttrib('class','form-horizontal');
 
		$aclusuarios_id= new Zend_Form_Element_Hidden('aclusuarios_id');
		$aclusuarios_id->addFilter('Int');
		$this->addElement($aclusuarios_id);

		$username= new Zend_Form_Element_Text('username');
		$username->setLabel('Username:');
		$username->addValidator(new Zend_Validate_StringLength(array('max' => 100)));
		$username->setRequired(true);
		$username->setAttrib('class', '  required ');
 		$this->addElement($username);

		$password= new Zend_Form_Element_Text('password');
		$password->setLabel('Password:');
		$password->addValidator(new Zend_Validate_StringLength(array('max' => 500)));
		$password->setRequired(true);		
		$password->setAttrib('class', '  required  verificar ');
 		$this->addElement($password);		

		$cancel = new Zend_Form_Element_Button('cancel');
		$cancel->setLabel('Cancelar');
		$cancel->setAttrib('class', 'btn close_modal');
		$this->addElement($cancel);
		
		$submit = new Zend_Form_Element_Button('submitaclusuarios');
		$submit->setLabel( 'Guardar');
		$submit->setAttrib('class', 'btn btn-primary saveform');
		$submit->setAttrib('idform', 'aclusuariosform');
		$submit->setAttrib('control', 'aclusuarios');
		$submit->setAttrib('modulo', 'default');
		$submit->setAttrib('autofocus', 'autofucus');
		$this->addElement($submit);


		$this->addDisplayGroup(array('username','password'), 'aclusuarios');
		$this->aclusuarios->setLegend("Información de acceso");
		$this->addDisplayGroup(array("submitaclusuarios", "cancel"), 'submitaclusuariosgroup');
	
		// set decorators
        EasyBib_Form_Decorator::setFormDecorator($this, EasyBib_Form_Decorator::BOOTSTRAP, 'submitaclusuarios', 'cancel');
	}
	
	public function _populateHidden($data){
		$data["password"]="";
		return $data;
	}

}
