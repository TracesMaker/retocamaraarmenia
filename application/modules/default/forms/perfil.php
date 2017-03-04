<?php
class Form_Perfil extends EasyBib_Form
{
	public function init()
	{
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

 		$useremail= new Zend_Form_Element_Text('useremail');
		$useremail->setLabel('E-mail:');
		$useremail->addValidator(new Zend_Validate_EmailAddress());
		$useremail->addValidator(new Zend_Validate_StringLength(array('max' => 250)));
		$useremail->setRequired(true);
		$useremail->setAttrib('class', '  email  required ');
 		$this->addElement($useremail);
		
		$usernombres= new Zend_Form_Element_Text('usernombres');
		$usernombres->setLabel('Nombres:');
		$usernombres->addValidator(new Zend_Validate_StringLength(array('max' => 250)));
		$usernombres->setRequired(true);
		$usernombres->setAttrib('class', '  required ');
 		$this->addElement($usernombres);
 		

		$userapellidos= new Zend_Form_Element_Text('userapellidos');
		$userapellidos->setLabel('Apellidos:');
		$userapellidos->addValidator(new Zend_Validate_StringLength(array('max' => 250)));
		$userapellidos->setRequired(true);
		$userapellidos->setAttrib('class', '  required ');
 		$this->addElement($userapellidos);

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

		$this->addDisplayGroup(array('username','useremail','usernombres','userapellidos'), 'acluusuarioinfoperson');
		$this->acluusuarioinfoperson->setLegend("Información Personal");
		$this->addDisplayGroup(array("submitaclusuarios", "cancel"), 'submitaclusuariosgroup');
	
		// set decorators
        EasyBib_Form_Decorator::setFormDecorator($this, EasyBib_Form_Decorator::BOOTSTRAP, 'submitaclusuarios', 'cancel');
	}
	
	public function _populateHidden($data){
		return $data;
	}

}   
