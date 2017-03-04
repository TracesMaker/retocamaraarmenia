<?php
class Reto_Form_Indicadores extends EasyBib_Form
{
	public function init()
	{
		$AgrupacionDB = Model_AgrupacionMapper::getInstance();
		$this->setName('indicadoresform');
		$this->setAttrib('class','form-horizontal');
 
		$indicadores_id = new Zend_Form_Element_Hidden('indicadores_id');
		$indicadores_id->addFilter('Int');
		$this->addElement($indicadores_id);

		$indicador = new Zend_Form_Element_Text('indicador');
        $indicador->setLabel('* Indicador:');    
		$indicador->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$indicador->setRequired(true);
		$indicador->setAttrib('class', '  required ');
 		$this->addElement($indicador);

		$descripcion = new Zend_Form_Element_Textarea('descripcion');
		$descripcion->setAttrib('rows', 5);
		$descripcion->setAttrib('cols', 2);
        $descripcion->setLabel('Descripción:');
		$descripcion->setAttrib('class', ' ');
 		$this->addElement($descripcion);
		$cancel = new Zend_Form_Element_Button('cancelindicadores');
		$cancel->setLabel('Cancelar');
		$cancel->setAttrib('class', 'btn closeform');
		$this->addElement($cancel);
		
        $SaveAndNew = new Zend_Form_Element_Button('saveandnewindicadores');
        $SaveAndNew->setLabel( 'Guardar y nuevo');
        $SaveAndNew->setAttrib('class', 'btn btn-success saveandnew hidden-phone');
        $this->addElement($SaveAndNew);
		
		$submit = new Zend_Form_Element_Button('submitindicadores');
		$submit->setLabel( 'Guardar');
		$submit->setAttrib('class', 'btn btn-primary saveform');
		$this->addElement($submit);
		

        $this->addDisplayGroup(array("submitindicadores", "saveandnewindicadores", "cancelindicadores"), 'submitindicadoresgroup');
        // set decorators
        EasyBib_Form_Decorator::setFormDecorator($this, EasyBib_Form_Decorator::BOOTSTRAP, 'submitindicadores', 'cancelindicadores', 'saveandnewindicadores');
	}
	
	public function _populateHidden($data)
	{
		return $data;
	}
	

}
