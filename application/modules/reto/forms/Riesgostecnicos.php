<?php
class Reto_Form_Riesgostecnicos extends EasyBib_Form
{
	public function init()
	{
		$AgrupacionDB = Model_AgrupacionMapper::getInstance();
		$this->setName('riesgostecnicosform');
		$this->setAttrib('class','form-horizontal');
 
		$riesgostecnicos_id = new Zend_Form_Element_Hidden('riesgostecnicos_id');
		$riesgostecnicos_id->addFilter('Int');
		$this->addElement($riesgostecnicos_id);

		$nombredelriesgo = new Zend_Form_Element_Text('nombredelriesgo');
        $nombredelriesgo->setLabel('Nombre del riesgo:');
		$nombredelriesgo->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$nombredelriesgo->setAttrib('class', ' ');
 		$this->addElement($nombredelriesgo);

		$descripcion = new Zend_Form_Element_Textarea('descripcion');
		$descripcion->setAttrib('rows', 5);
		$descripcion->setAttrib('cols', 2);
        $descripcion->setLabel('Descripción :');
		$descripcion->setAttrib('class', ' ');
 		$this->addElement($descripcion);

		$probabilidad = new Zend_Form_Element_Textarea('probabilidad');
		$probabilidad->setAttrib('rows', 5);
		$probabilidad->setAttrib('cols', 2);
        $probabilidad->setLabel('Probabilidad de ocurrencia :');
		$probabilidad->setAttrib('class', ' ');
 		$this->addElement($probabilidad);

		$impacto = new Zend_Form_Element_Textarea('impacto');
		$impacto->setAttrib('rows', 5);
		$impacto->setAttrib('cols', 2);
        $impacto->setLabel('impacto esperado, si se presenta :');
		$impacto->setAttrib('class', ' ');
 		$this->addElement($impacto);

		$prevencion = new Zend_Form_Element_Textarea('prevencion');
		$prevencion->setAttrib('rows', 5);
		$prevencion->setAttrib('cols', 2);
        $prevencion->setLabel('Posibles medidas de prevención o mitigación:');
		$prevencion->setAttrib('class', ' ');
 		$this->addElement($prevencion);
		$cancel = new Zend_Form_Element_Button('cancelriesgostecnicos');
		$cancel->setLabel('Cancelar');
		$cancel->setAttrib('class', 'btn closeform');
		$this->addElement($cancel);
		
        $SaveAndNew = new Zend_Form_Element_Button('saveandnewriesgostecnicos');
        $SaveAndNew->setLabel( 'Guardar y nuevo');
        $SaveAndNew->setAttrib('class', 'btn btn-success saveandnew hidden-phone');
        $this->addElement($SaveAndNew);
		
		$submit = new Zend_Form_Element_Button('submitriesgostecnicos');
		$submit->setLabel( 'Guardar');
		$submit->setAttrib('class', 'btn btn-primary saveform');
		$this->addElement($submit);
		

        $this->addDisplayGroup(array("submitriesgostecnicos", "saveandnewriesgostecnicos", "cancelriesgostecnicos"), 'submitriesgostecnicosgroup');
        // set decorators
        EasyBib_Form_Decorator::setFormDecorator($this, EasyBib_Form_Decorator::BOOTSTRAP, 'submitriesgostecnicos', 'cancelriesgostecnicos', 'saveandnewriesgostecnicos');
	}
	
	public function _populateHidden($data)
	{
		return $data;
	}
	

}
