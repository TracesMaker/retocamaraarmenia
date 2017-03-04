<?php
class Reto_Form_Caracteristicasprincipalessolucion extends EasyBib_Form
{
	public function init()
	{
		$AgrupacionDB = Model_AgrupacionMapper::getInstance();
		$this->setName('caracteristicasprincipalessolucionform');
		$this->setAttrib('class','form-horizontal');
 
		$caracteristicasprincipalessolucion_id = new Zend_Form_Element_Hidden('caracteristicasprincipalessolucion_id');
		$caracteristicasprincipalessolucion_id->addFilter('Int');
		$this->addElement($caracteristicasprincipalessolucion_id);

		$atributo = new Zend_Form_Element_Textarea('atributo');
		$atributo->setAttrib('rows', 5);
		$atributo->setAttrib('cols', 2);
        $atributo->setLabel('Atributo:');
		$atributo->setAttrib('class', ' ');
 		$this->addElement($atributo);

		$descripcionatributo = new Zend_Form_Element_Textarea('descripcionatributo');
		$descripcionatributo->setAttrib('rows', 5);
		$descripcionatributo->setAttrib('cols', 2);
        $descripcionatributo->setLabel('¿Por qué este atributo es importante en la solución?:');
		$descripcionatributo->setAttrib('class', ' ');
 		$this->addElement($descripcionatributo);

			$diferenciador = new Zend_Form_Element_Select('diferenciador');
	        $diferenciador->setLabel('¿Es un atributo diferenciador frente a otras posibles soluciones que se encuentran en el mercado?:');
			$diferenciador->addMultiOption("0", "No");
			$diferenciador->addMultiOption("1", "Si");		
		$diferenciador->setAttrib('class', ' ');
 		$this->addElement($diferenciador);

		$ventajas = new Zend_Form_Element_Textarea('ventajas');
		$ventajas->setAttrib('rows', 5);
		$ventajas->setAttrib('cols', 2);
        $ventajas->setLabel('Si en la casilla anterior, su respuesta fue afirmativa, por favor, explique por qué es diferenciador.:');
		$ventajas->setAttrib('class', ' ');
 		$this->addElement($ventajas);
		$cancel = new Zend_Form_Element_Button('cancelcaracteristicasprincipalessolucion');
		$cancel->setLabel('Cancelar');
		$cancel->setAttrib('class', 'btn closeform');
		$this->addElement($cancel);
		
        $SaveAndNew = new Zend_Form_Element_Button('saveandnewcaracteristicasprincipalessolucion');
        $SaveAndNew->setLabel( 'Guardar y nuevo');
        $SaveAndNew->setAttrib('class', 'btn btn-success saveandnew hidden-phone');
        $this->addElement($SaveAndNew);
		
		$submit = new Zend_Form_Element_Button('submitcaracteristicasprincipalessolucion');
		$submit->setLabel( 'Guardar');
		$submit->setAttrib('class', 'btn btn-primary saveform');
		$this->addElement($submit);
		

        $this->addDisplayGroup(array("submitcaracteristicasprincipalessolucion", "saveandnewcaracteristicasprincipalessolucion", "cancelcaracteristicasprincipalessolucion"), 'submitcaracteristicasprincipalessoluciongroup');
        // set decorators
        EasyBib_Form_Decorator::setFormDecorator($this, EasyBib_Form_Decorator::BOOTSTRAP, 'submitcaracteristicasprincipalessolucion', 'cancelcaracteristicasprincipalessolucion', 'saveandnewcaracteristicasprincipalessolucion');
	}
	
	public function _populateHidden($data)
	{
		return $data;
	}
	

}
