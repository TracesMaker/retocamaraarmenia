<?php
class Reto_Form_Solucionfile extends EasyBib_Form
{
	public function init()
	{
		$this->setName('solucionfileform');
		$this->setAttrib('class','form-horizontal');
		 
		$solucionadores_id = new Zend_Form_Element_Hidden('solucionadores_id');
		$solucionadores_id->addFilter('Int');
		$this->addElement($solucionadores_id);

		$diagramasolucion = new Zend_Form_Element_File('diagramasolucion');
		$diagramasolucion->setDestination(APPLICATION_PATH.'/../Files/temp/solucionadoresdiagramasolucion');
		$diagramasolucion->setAttrib('class', ' form-control');
 		$this->addElement($diagramasolucion);

		// $submit = new Zend_Form_Element_Button('submitsolucionfile');	
		// $submit->setLabel( 'Guardar');
		// $submit->setAttrib('class', 'btn btn-primary saveform pull-right');
		// $submit->setAttrib('onclick', 'clicksaveformsolucionfile();');
		// $this->addElement($submit);

	}
	
	public function _populateHidden($data)
	{
		return $data;
	}
	


	
	public function cleanForm()
	{
	}
}
