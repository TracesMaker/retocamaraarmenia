<?php
class Reto_Form_Otrosdesarrollos extends EasyBib_Form
{
	public function init()
	{
		$AgrupacionDB = Model_AgrupacionMapper::getInstance();
		$this->setName('otrosdesarrollosform');
		$this->setAttrib('class','form-horizontal');
 
		$otrosdesarrollos_id = new Zend_Form_Element_Hidden('otrosdesarrollos_id');
		$otrosdesarrollos_id->addFilter('Int');
		$this->addElement($otrosdesarrollos_id);

		$desarrollocomplementario = new Zend_Form_Element_Textarea('desarrollocomplementario');
		$desarrollocomplementario->setAttrib('rows', 5);
		$desarrollocomplementario->setAttrib('cols', 2);
        $desarrollocomplementario->setLabel('Desarrollo complementario requerido:');
		$desarrollocomplementario->setAttrib('class', ' ');
 		$this->addElement($desarrollocomplementario);

		$porque = new Zend_Form_Element_Textarea('porque');
		$porque->setAttrib('rows', 5);
		$porque->setAttrib('cols', 2);
        $porque->setLabel('¿Por qué se requiere este desarrollo?:');
		$porque->setAttrib('class', ' ');
 		$this->addElement($porque);
		$cancel = new Zend_Form_Element_Button('cancelotrosdesarrollos');
		$cancel->setLabel('Cancelar');
		$cancel->setAttrib('class', 'btn closeform');
		$this->addElement($cancel);
		
        $SaveAndNew = new Zend_Form_Element_Button('saveandnewotrosdesarrollos');
        $SaveAndNew->setLabel( 'Guardar y nuevo');
        $SaveAndNew->setAttrib('class', 'btn btn-success saveandnew hidden-phone');
        $this->addElement($SaveAndNew);
		
		$submit = new Zend_Form_Element_Button('submitotrosdesarrollos');
		$submit->setLabel( 'Guardar');
		$submit->setAttrib('class', 'btn btn-primary saveform');
		$this->addElement($submit);
		

        $this->addDisplayGroup(array("submitotrosdesarrollos", "saveandnewotrosdesarrollos", "cancelotrosdesarrollos"), 'submitotrosdesarrollosgroup');
        // set decorators
        EasyBib_Form_Decorator::setFormDecorator($this, EasyBib_Form_Decorator::BOOTSTRAP, 'submitotrosdesarrollos', 'cancelotrosdesarrollos', 'saveandnewotrosdesarrollos');
	}
	
	public function _populateHidden($data)
	{
		return $data;
	}
	

}
