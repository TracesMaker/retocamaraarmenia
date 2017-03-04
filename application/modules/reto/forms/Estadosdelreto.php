<?php
class Reto_Form_Estadosdelreto extends EasyBib_Form
{
	public function init()
	{
		$AgrupacionDB = Model_AgrupacionMapper::getInstance();
		$this->setName('estadosdelretoform');
		$this->setAttrib('class','form-horizontal');
 
		$estadosdelreto_id = new Zend_Form_Element_Hidden('estadosdelreto_id');
		$estadosdelreto_id->addFilter('Int');
		$this->addElement($estadosdelreto_id);

		$nombre = new Zend_Form_Element_Text('nombre');
        $nombre->setLabel('* Nombre:');    
		$nombre->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$nombre->setRequired(true);
		$nombre->setAttrib('class', '  required ');
 		$this->addElement($nombre);
		$cancel = new Zend_Form_Element_Button('cancelestadosdelreto');
		$cancel->setLabel('Cancelar');
		$cancel->setAttrib('class', 'btn closeform');
		$this->addElement($cancel);
		
        $SaveAndNew = new Zend_Form_Element_Button('saveandnewestadosdelreto');
        $SaveAndNew->setLabel( 'Guardar y nuevo');
        $SaveAndNew->setAttrib('class', 'btn btn-success saveandnew hidden-phone');
        $this->addElement($SaveAndNew);
		
		$submit = new Zend_Form_Element_Button('submitestadosdelreto');
		$submit->setLabel( 'Guardar');
		$submit->setAttrib('class', 'btn btn-primary saveform');
		$this->addElement($submit);
		

        $this->addDisplayGroup(array("submitestadosdelreto", "saveandnewestadosdelreto", "cancelestadosdelreto"), 'submitestadosdelretogroup');
        // set decorators
        EasyBib_Form_Decorator::setFormDecorator($this, EasyBib_Form_Decorator::BOOTSTRAP, 'submitestadosdelreto', 'cancelestadosdelreto', 'saveandnewestadosdelreto');
	}
	
	public function _populateHidden($data)
	{
		return $data;
	}
	

}
