<?php
class Reto_Form_Riesgos extends EasyBib_Form
{
	public function init()
	{
		$AgrupacionDB = Model_AgrupacionMapper::getInstance();
		$this->setName('riesgosform');
		$this->setAttrib('class','form-horizontal');
 
		$riesgos_id = new Zend_Form_Element_Hidden('riesgos_id');
		$riesgos_id->addFilter('Int');
		$this->addElement($riesgos_id);

		$riesgo = new Zend_Form_Element_Textarea('riesgo');
		$riesgo->setAttrib('rows', 5);
		$riesgo->setAttrib('cols', 2);
        $riesgo->setLabel('Riesgo:');
		$riesgo->setAttrib('class', ' ');
 		$this->addElement($riesgo);

		$descripcion = new Zend_Form_Element_Textarea('descripcion');
		$descripcion->setAttrib('rows', 5);
		$descripcion->setAttrib('cols', 2);
        $descripcion->setLabel('Descripción :');
		$descripcion->setAttrib('class', ' ');
 		$this->addElement($descripcion);

		$impacto = new Zend_Form_Element_Textarea('impacto');
		$impacto->setAttrib('rows', 5);
		$impacto->setAttrib('cols', 2);
        $impacto->setLabel('Impacto sobre el desarrollo de la solución propuesta :');
		$impacto->setAttrib('class', ' ');
 		$this->addElement($impacto);

		$probabilidad = new Zend_Form_Element_Textarea('probabilidad');
		$probabilidad->setAttrib('rows', 5);
		$probabilidad->setAttrib('cols', 2);
        $probabilidad->setLabel('Probabilidad de ocurrencia :');
		$probabilidad->setAttrib('class', ' ');
 		$this->addElement($probabilidad);
		$cancel = new Zend_Form_Element_Button('cancelriesgos');
		$cancel->setLabel('Cancelar');
		$cancel->setAttrib('class', 'btn closeform');
		$this->addElement($cancel);
		
        $SaveAndNew = new Zend_Form_Element_Button('saveandnewriesgos');
        $SaveAndNew->setLabel( 'Guardar y nuevo');
        $SaveAndNew->setAttrib('class', 'btn btn-success saveandnew hidden-phone');
        $this->addElement($SaveAndNew);
		
		$submit = new Zend_Form_Element_Button('submitriesgos');
		$submit->setLabel( 'Guardar');
		$submit->setAttrib('class', 'btn btn-primary saveform');
		$this->addElement($submit);
		

        $this->addDisplayGroup(array("submitriesgos", "saveandnewriesgos", "cancelriesgos"), 'submitriesgosgroup');
        // set decorators
        EasyBib_Form_Decorator::setFormDecorator($this, EasyBib_Form_Decorator::BOOTSTRAP, 'submitriesgos', 'cancelriesgos', 'saveandnewriesgos');
	}
	
	public function _populateHidden($data)
	{
		return $data;
	}
	

}
