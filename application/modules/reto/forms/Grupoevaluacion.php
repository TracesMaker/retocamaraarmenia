<?php
class Reto_Form_Grupoevaluacion extends EasyBib_Form
{
	public function init()
	{
		$AgrupacionDB = Model_AgrupacionMapper::getInstance();
		$this->setName('grupoevaluacionform');
		$this->setAttrib('class','form-horizontal');
 
		$grupoevaluacion_id = new Zend_Form_Element_Hidden('grupoevaluacion_id');
		$grupoevaluacion_id->addFilter('Int');
		$this->addElement($grupoevaluacion_id);

		$nombre = new Zend_Form_Element_Text('nombre');
        $nombre->setLabel('* Nombre:');    
		$nombre->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$nombre->setRequired(true);
		$nombre->setAttrib('class', '  required ');
 		$this->addElement($nombre);

		$orden = new Zend_Form_Element_Text('orden');
        $orden->setLabel('Orden:');
		$orden->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$orden->setAttrib('class', ' ');
 		$this->addElement($orden);

		$peso= new Zend_Form_Element_Text('peso');
        $peso->setLabel('* Peso:');    
		$peso->addValidator(new Zend_Validate_Int());
		$peso->setRequired(true);
		$peso->setAttrib('class', '  number  required ');
 		$this->addElement($peso);
		$cancel = new Zend_Form_Element_Button('cancelgrupoevaluacion');
		$cancel->setLabel('Cancelar');
		$cancel->setAttrib('class', 'btn closeform');
		$this->addElement($cancel);
		
        $SaveAndNew = new Zend_Form_Element_Button('saveandnewgrupoevaluacion');
        $SaveAndNew->setLabel( 'Guardar y nuevo');
        $SaveAndNew->setAttrib('class', 'btn btn-success saveandnew hidden-phone');
        $this->addElement($SaveAndNew);
		
		$submit = new Zend_Form_Element_Button('submitgrupoevaluacion');
		$submit->setLabel( 'Guardar');
		$submit->setAttrib('class', 'btn btn-primary saveform');
		$this->addElement($submit);
		

        $this->addDisplayGroup(array("submitgrupoevaluacion", "saveandnewgrupoevaluacion", "cancelgrupoevaluacion"), 'submitgrupoevaluaciongroup');
        // set decorators
        EasyBib_Form_Decorator::setFormDecorator($this, EasyBib_Form_Decorator::BOOTSTRAP, 'submitgrupoevaluacion', 'cancelgrupoevaluacion', 'saveandnewgrupoevaluacion');
	}
	
	public function _populateHidden($data)
	{
		return $data;
	}
	

}
