<?php
class Form_Solucionadores extends EasyBib_Form
{
	public function init()
	{
		$AgrupacionDB = Model_AgrupacionMapper::getInstance();
		$this->setName('aclusuariosform');
 
		$aclusuarios_id = new Zend_Form_Element_Hidden('aclusuarios_id');
		$aclusuarios_id->addFilter('Int');
		$this->addElement($aclusuarios_id);

		$nombre = new Zend_Form_Element_Text('nombre');
        //$nombre->setLabel('Nombre:');
		$nombre->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$nombre->setAttrib('class', ' form-control  required');
		$nombre->setAttrib('placeholder', 'Nombre');
 		$this->addElement($nombre);

 		$email = new Zend_Form_Element_Text('email');
        //$email->setLabel('Email:');
		$email->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$email->setAttrib('class', ' required form-control ');
		$email->setAttrib('placeholder', 'Correo');
 		$this->addElement($email);

		$password = new Zend_Form_Element_Text('password');
        //$password->setLabel('* Password:');    
		$password->addValidator(new Zend_Validate_StringLength(array('max' => 50)));
		$password->setRequired(true);
		$password->setAttrib('placeholder', 'Contraseña');

		$password->setAttrib('class', '  required  form-control');
 		$this->addElement($password);

		$password0 = new Zend_Form_Element_Text('password0');
        //$password0->setLabel('* Repetir Contraseña:');    
		$password0->addValidator(new Zend_Validate_StringLength(array('max' => 50)));
		$password0->setRequired(true);
		$password0->setAttrib('placeholder', 'Repetir Contraseña');
		$password0->setAttrib('class', '  required  form-control');
 		$this->addElement($password0);

		


		$manejodedatos = new Zend_Form_Element_Checkbox('manejodedatos');
	    //$manejodedatos->setLabel('He leído y acepto los términos y condiciones');
		$manejodedatos->setAttrib('class', ' required ' );
		$manejodedatos->getDecorator('Label')->setOption('escape', false);
 		$this->addElement($manejodedatos);

		// $divulgacionpostulacion = new Zend_Form_Element_Checkbox('divulgacionpostulacion');
	 	// $divulgacionpostulacion->setLabel('Acepta Divulgaciòn de la postulaciòn:');
		// $divulgacionpostulacion->setAttrib('class', ' ');
 		// $this->addElement($divulgacionpostulacion);

	
		
		$submit = new Zend_Form_Element_Button('submitaclusuarios');
		$submit->setLabel( 'Guardar');
		$submit->setAttrib('class', 'btn btn-primary btn-block bg-color-3 border-color-3');
		$submit->setAttrib('onclick', 'clickcrearusuario();');
		$this->addElement($submit);




		// set decorators
        EasyBib_Form_Decorator::setFormDecorator($this, EasyBib_Form_Decorator::BOOTSTRAP, 'submitaclusuarios');
		

	}
	
	public function _populateHidden($data)
	{
		$data["password"] = "";
		return $data;
	}
	

	public function populateDefault()
	{
		$this->activo->setValue("true");
		$this->manejodedatos->setValue("0");
		$this->divulgacionpostulacion->setValue("0");
	}
}
