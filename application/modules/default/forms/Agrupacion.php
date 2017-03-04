<?php
class Form_Agrupacion extends EasyBib_Form
{
	public function init()
	{
		$AgrupacionDB = Model_AgrupacionMapper::getInstance();
		$this->setName('agrupacionform');
		$this->setAttrib('class','form-horizontal');
 
		$agrupacion_id = new Zend_Form_Element_Hidden('agrupacion_id');
		$agrupacion_id->addFilter('Int');
		$this->addElement($agrupacion_id);

		$aabreviatura = new Zend_Form_Element_Text('aabreviatura');
        $aabreviatura->setLabel('Abreviatura:');
		$aabreviatura->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$aabreviatura->setAttrib('class', ' ');
 		$this->addElement($aabreviatura);

		$alabel = new Zend_Form_Element_Text('alabel');
        $alabel->setLabel('* Label:');    
		$alabel->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$alabel->setRequired(true);
		$alabel->setAttrib('class', '  required ');
 		$this->addElement($alabel);

		$atipoagrupacion = new Zend_Form_Element_Hidden('atipoagrupacion');
		$atipoagrupacion->setRequired(true);
		$this->addElement($atipoagrupacion);
		$cancel = new Zend_Form_Element_Button('cancelagrupacion');
		$cancel->setLabel('Cancelar');
		$cancel->setAttrib('class', 'btn closeform');
		$this->addElement($cancel);
		
        $SaveAndNew = new Zend_Form_Element_Button('saveandnewagrupacion');
        $SaveAndNew->setLabel( 'Guardar y nuevo');
        $SaveAndNew->setAttrib('class', 'btn btn-success saveandnew hidden-phone');
        $this->addElement($SaveAndNew);
		
		$submit = new Zend_Form_Element_Button('submitagrupacion');
		$submit->setLabel( 'Guardar');
		$submit->setAttrib('class', 'btn btn-primary saveform');
		$this->addElement($submit);
		

        $this->addDisplayGroup(array("submitagrupacion", "saveandnewagrupacion", "cancelagrupacion"), 'submitagrupaciongroup');
        // set decorators
        EasyBib_Form_Decorator::setFormDecorator($this, EasyBib_Form_Decorator::BOOTSTRAP, 'submitagrupacion', 'cancelagrupacion', 'saveandnewagrupacion');
	}
	
	public function _populateHidden($data)
	{
		return $data;
	}
	

}
