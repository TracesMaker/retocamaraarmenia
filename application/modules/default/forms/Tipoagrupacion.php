<?php
class Form_Tipoagrupacion extends EasyBib_Form
{
	public function init()
	{
		$AgrupacionDB = Model_AgrupacionMapper::getInstance();
		$this->setName('tipoagrupacionform');
		$this->setAttrib('class','form-horizontal');
 
		$tipoagrupacion_id = new Zend_Form_Element_Hidden('tipoagrupacion_id');
		$tipoagrupacion_id->addFilter('Int');
		$this->addElement($tipoagrupacion_id);

		$tanombre = new Zend_Form_Element_Text('tanombre');
        $tanombre->setLabel('Nombre:');
		$tanombre->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$tanombre->setAttrib('class', ' ');
 		$this->addElement($tanombre);
		$cancel = new Zend_Form_Element_Button('canceltipoagrupacion');
		$cancel->setLabel('Cancelar');
		$cancel->setAttrib('class', 'btn closeform');
		$this->addElement($cancel);
		
        $SaveAndNew = new Zend_Form_Element_Button('saveandnewtipoagrupacion');
        $SaveAndNew->setLabel( 'Guardar y nuevo');
        $SaveAndNew->setAttrib('class', 'btn btn-success saveandnew hidden-phone');
        $this->addElement($SaveAndNew);
		
		$submit = new Zend_Form_Element_Button('submittipoagrupacion');
		$submit->setLabel( 'Guardar');
		$submit->setAttrib('class', 'btn btn-primary saveform');
		$this->addElement($submit);
		

        $this->addDisplayGroup(array("submittipoagrupacion", "saveandnewtipoagrupacion", "canceltipoagrupacion"), 'submittipoagrupaciongroup');
        // set decorators
        EasyBib_Form_Decorator::setFormDecorator($this, EasyBib_Form_Decorator::BOOTSTRAP, 'submittipoagrupacion', 'canceltipoagrupacion', 'saveandnewtipoagrupacion');
	}
	
	public function _populateHidden($data)
	{
		return $data;
	}
	

}
