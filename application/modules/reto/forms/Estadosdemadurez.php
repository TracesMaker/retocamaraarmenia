<?php
class Reto_Form_Estadosdemadurez extends EasyBib_Form
{
	public function init()
	{
		$AgrupacionDB = Model_AgrupacionMapper::getInstance();
		$this->setName('estadosdemadurezform');
		$this->setAttrib('class','form-horizontal');
 
		$estadosdemadurez_id = new Zend_Form_Element_Hidden('estadosdemadurez_id');
		$estadosdemadurez_id->addFilter('Int');
		$this->addElement($estadosdemadurez_id);

		$nombre = new Zend_Form_Element_Text('nombre');
        $nombre->setLabel('Nombre:');
		$nombre->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$nombre->setAttrib('class', ' ');
 		$this->addElement($nombre);
		$cancel = new Zend_Form_Element_Button('cancelestadosdemadurez');
		$cancel->setLabel('Cancelar');
		$cancel->setAttrib('class', 'btn closeform');
		$this->addElement($cancel);
		
        $SaveAndNew = new Zend_Form_Element_Button('saveandnewestadosdemadurez');
        $SaveAndNew->setLabel( 'Guardar y nuevo');
        $SaveAndNew->setAttrib('class', 'btn btn-success saveandnew hidden-phone');
        $this->addElement($SaveAndNew);
		
		$submit = new Zend_Form_Element_Button('submitestadosdemadurez');
		$submit->setLabel( 'Guardar');
		$submit->setAttrib('class', 'btn btn-primary saveform');
		$this->addElement($submit);
		

        $this->addDisplayGroup(array("submitestadosdemadurez", "saveandnewestadosdemadurez", "cancelestadosdemadurez"), 'submitestadosdemadurezgroup');
        // set decorators
        EasyBib_Form_Decorator::setFormDecorator($this, EasyBib_Form_Decorator::BOOTSTRAP, 'submitestadosdemadurez', 'cancelestadosdemadurez', 'saveandnewestadosdemadurez');
	}
	
	public function _populateHidden($data)
	{
		return $data;
	}
	

}
