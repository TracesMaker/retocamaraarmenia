<?php
class Reto_Form_Solucionadorestrayectoria extends EasyBib_Form
{
	public function init()
	{
		$AgrupacionDB = Model_AgrupacionMapper::getInstance();
		$this->setName('solucionadorestrayectoriaform');
		$this->setAttrib('class','form-horizontal');
		 
		$solucionadores_id = new Zend_Form_Element_Hidden('solucionadores_id');
		$solucionadores_id->addFilter('Int');
		$this->addElement($solucionadores_id);

		$descripciontrayectoria = new Zend_Form_Element_Textarea('descripciontrayectoria');
		$descripciontrayectoria->setAttrib('rows', 5);
		$descripciontrayectoria->setAttrib('cols', 2);
        $descripciontrayectoria->setLabel('* Por favor, señale su trayectoria para presentarse en esta propuesta:');    
		$descripciontrayectoria->setRequired(true);
		$descripciontrayectoria->setAttrib('class', ' form-control required ');
 		$this->addElement($descripciontrayectoria);

		// $submit = new Zend_Form_Element_Button('submitsolucionadores');	
		// $submit->setLabel( 'Guardar');
		// $submit->setAttrib('class', 'btn btn-primary saveform pull-right');
		// $submit->setAttrib('onclick', 'clicksaveformtrayectoria();');
		// $this->addElement($submit);

		EasyBib_Form_Decorator::setFormDecorator($this, EasyBib_Form_Decorator::BOOTSTRAP, 'submitsolucionadores');
	}
	
	public function _populateHidden($data)
	{
		return $data;
	}
	


	
	public function cleanForm()
	{
	}
}
