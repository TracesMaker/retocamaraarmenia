<?php
class Reto_Form_Solucionadoresmadurez extends EasyBib_Form
{
	public function init()
	{
		$AgrupacionDB = Model_AgrupacionMapper::getInstance();
		$this->setName('solucionadoresmadurezform');
		$this->setAttrib('class','');
		 
		$solucionadores_id = new Zend_Form_Element_Hidden('solucionadores_id');
		$solucionadores_id->addFilter('Int');
		$this->addElement($solucionadores_id);


		$estadodemadurez = new Zend_Form_Element_Radio('estadodemadurez');
	    $estadodemadurez->setLabel('A partir de lo expuesto durante todo el formato, por favor define en la lista expuesta a continuación,  ¿cuál es el estado de madurez de la solución? ');
		$EstadosdemadurezDB = Reto_Model_EstadosdemadurezMapper::getInstance();
		$ArrayOption=$EstadosdemadurezDB->getArrayOption($estadodemadurez);
		$estadodemadurez->setMultiOptions($ArrayOption);	
		$estadodemadurez->setRequired(true);	
		$estadodemadurez->addFilter('null');
		$estadodemadurez->setAttrib('class', 'required  ');
		$estadodemadurez->setAttrib('onchange', 'clickestadodemadurezotro()');
 		$this->addElement($estadodemadurez);

 		$estadodemadurezotro = new Zend_Form_Element_Text('estadodemadurezotro');
        $estadodemadurezotro->setLabel('Por favor describalo');
		$estadodemadurezotro->setAttrib('class', '  form-control ');
 		$this->addElement($estadodemadurezotro);

		// $submit = new Zend_Form_Element_Button('submitsolucionadores');	
		// $submit->setLabel( 'Guardar');
		// $submit->setAttrib('class', 'btn btn-primary saveform pull-right');
		// $submit->setAttrib('onclick', 'clicksaveformmadurez();');
		// $this->addElement($submit);


		// set decorators
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
