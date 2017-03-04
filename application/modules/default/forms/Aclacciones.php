<?php
class Form_Aclacciones extends EasyBib_Form
{
	public function init()
	{
		$AgrupacionDB = Model_AgrupacionMapper::getInstance();
		$this->setName('aclaccionesform');
		$this->setAttrib('class','form-horizontal');
 
		$aclacciones_id = new Zend_Form_Element_Hidden('aclacciones_id');
		$aclacciones_id->addFilter('Int');
		$this->addElement($aclacciones_id);

		$accrecurso = new Zend_Form_Element_Text('accrecurso');
        $accrecurso->setLabel('* Recurso:');    
		$accrecurso->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$accrecurso->setRequired(true);
		$accrecurso->setAttrib('class', '  required ');
 		$this->addElement($accrecurso);

		$accaccion = new Zend_Form_Element_Text('accaccion');
        $accaccion->setLabel('* Acción:');    
		$accaccion->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$accaccion->setRequired(true);
		$accaccion->setAttrib('class', '  required ');
 		$this->addElement($accaccion);
		$cancel = new Zend_Form_Element_Button('cancelaclacciones');
		$cancel->setLabel('Cancelar');
		$cancel->setAttrib('class', 'btn closeform');
		$this->addElement($cancel);
		
        $SaveAndNew = new Zend_Form_Element_Button('saveandnewaclacciones');
        $SaveAndNew->setLabel( 'Guardar y nuevo');
        $SaveAndNew->setAttrib('class', 'btn btn-success saveandnew hidden-phone');
        $this->addElement($SaveAndNew);
		
		$submit = new Zend_Form_Element_Button('submitaclacciones');
		$submit->setLabel( 'Guardar');
		$submit->setAttrib('class', 'btn btn-primary saveform');
		$this->addElement($submit);
		

        $this->addDisplayGroup(array("submitaclacciones", "saveandnewaclacciones", "cancelaclacciones"), 'submitaclaccionesgroup');
        // set decorators
        EasyBib_Form_Decorator::setFormDecorator($this, EasyBib_Form_Decorator::BOOTSTRAP, 'submitaclacciones', 'cancelaclacciones', 'saveandnewaclacciones');
	}
	
	public function _populateHidden($data)
	{
		return $data;
	}
	

}
