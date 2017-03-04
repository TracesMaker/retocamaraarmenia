<?php
class Form_Aclusuariospassword extends EasyBib_Form
{
	public function init()
	{
		$AgrupacionDB = Model_AgrupacionMapper::getInstance();
		$this->setName('aclusuariosform');
		$this->setAttrib('class','form-horizontal');
		 
		$aclusuarios_id = new Zend_Form_Element_Hidden('aclusuarios_id');
		$aclusuarios_id->addFilter('Int');
		$this->addElement($aclusuarios_id);

		$password = new Zend_Form_Element_Text('password');
        $password->setLabel('* Password:');    
		$password->addValidator(new Zend_Validate_StringLength(array('max' => 50)));
		$password->setRequired(true);

		$password->setAttrib('class', '  required  verificar ');
 		$this->addElement($password);


		$cancel = new Zend_Form_Element_Button('cancelaclusuarios');
		$cancel->setLabel('Cancelar');
		$cancel->setAttrib('class', 'btn closeform');
		$this->addElement($cancel);
		
		$submit = new Zend_Form_Element_Button('submitaclusuarios');	
		$submit->setLabel( 'Guardar');
		$submit->setAttrib('class', 'btn btn-primary saveform');
		$this->addElement($submit);



		$this->addDisplayGroup(array("submitaclusuarios", "saveandnewaclusuarios", "cancelaclusuarios"), 'submitaclusuariosgroup');
		
        EasyBib_Form_Decorator::setFormDecorator($this, EasyBib_Form_Decorator::BOOTSTRAP, 'submitaclusuarios', 'cancelaclusuarios', 'saveandnewaclusuarios');     
	}
	
	public function _populateHidden($data)
	{
		$data["password"] = "";
		return $data;
	}
	

	public function populateDefault()
	{
	}

	
	public function cleanForm()
	{
	}
}
