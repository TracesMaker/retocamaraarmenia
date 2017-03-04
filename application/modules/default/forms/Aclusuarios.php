<?php
class Form_Aclusuarios extends EasyBib_Form
{
	public function init()
	{
		$AgrupacionDB = Model_AgrupacionMapper::getInstance();
		$this->setName('aclusuariosform');
		$this->setAttrib('class','form-horizontal');
 
		$aclusuarios_id = new Zend_Form_Element_Hidden('aclusuarios_id');
		$aclusuarios_id->addFilter('Int');
		$this->addElement($aclusuarios_id);

		$nombre = new Zend_Form_Element_Text('nombre');
        $nombre->setLabel('Nombre:');
		$nombre->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$nombre->setAttrib('class', ' ');
 		$this->addElement($nombre);

		$cargo = new Zend_Form_Element_Text('cargo');
        $cargo->setLabel('Cargo:');
		$cargo->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$cargo->setAttrib('class', ' ');
 		$this->addElement($cargo);

		$role = new Zend_Form_Element_Select('role');
        $role->setLabel('* Rol:');    
		$AclrolesDB = Model_AclrolesMapper::getInstance();
		$ArrayOption=$AclrolesDB->getArrayOption($role);
		$role->setMultiOptions($ArrayOption);
		$role->setRequired(true);
 		$role->setAttrib('class', '    required ');
 		$role->addFilter('null');
 		$role->setAttrib('title', 'Rol del usuario');
 		$this->addElement($role);

		$username = new Zend_Form_Element_Text('username');
        $username->setLabel('* Username:');    
		$username->addValidator(new Zend_Validate_StringLength(array('max' => 25)));
		$username->setRequired(true);
		$username->setAttrib('class', '  required ');
 		$username->setAttrib('title', 'Nombre de usuario');
 		$this->addElement($username);

		$password = new Zend_Form_Element_Text('password');
        $password->setLabel('* Password:');    
		$password->addValidator(new Zend_Validate_StringLength(array('max' => 50)));
		$password->setRequired(true);

		$password->setAttrib('class', '  required  verificar ');
 		$this->addElement($password);

			$activo = new Zend_Form_Element_Checkbox('activo');
	        $activo->setLabel('Activo:');
		$activo->setAttrib('class', ' ');
 		$activo->setAttrib('title', 'Usuario activo en el sistema');
 		$this->addElement($activo);

		$email = new Zend_Form_Element_Text('email');
        $email->setLabel('Email:');
		$email->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$email->setAttrib('class', ' ');
 		$this->addElement($email);

			$manejodedatos = new Zend_Form_Element_Checkbox('manejodedatos');
	        $manejodedatos->setLabel('Acepta Manejo de datos:');
		$manejodedatos->setAttrib('class', ' ');
 		$this->addElement($manejodedatos);

			$divulgacionpostulacion = new Zend_Form_Element_Checkbox('divulgacionpostulacion');
	        $divulgacionpostulacion->setLabel('Acepta Divulgaciòn de la postulaciòn:');
		$divulgacionpostulacion->setAttrib('class', ' ');
 		$this->addElement($divulgacionpostulacion);
		$cancel = new Zend_Form_Element_Button('cancelaclusuarios');
		$cancel->setLabel('Cancelar');
		$cancel->setAttrib('class', 'btn closeform');
		$this->addElement($cancel);
		
        $SaveAndNew = new Zend_Form_Element_Button('saveandnewaclusuarios');
        $SaveAndNew->setLabel( 'Guardar y nuevo');
        $SaveAndNew->setAttrib('class', 'btn btn-success saveandnew hidden-phone');
        $this->addElement($SaveAndNew);
		
		$submit = new Zend_Form_Element_Button('submitaclusuarios');
		$submit->setLabel( 'Guardar');
		$submit->setAttrib('class', 'btn btn-primary saveform');
		$this->addElement($submit);
		

        $this->addDisplayGroup(array("submitaclusuarios", "saveandnewaclusuarios", "cancelaclusuarios"), 'submitaclusuariosgroup');
        // set decorators
        EasyBib_Form_Decorator::setFormDecorator($this, EasyBib_Form_Decorator::BOOTSTRAP, 'submitaclusuarios', 'cancelaclusuarios', 'saveandnewaclusuarios');
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
