<?php
class Reto_Form_Solucionadoresplanteamientopresupuestal extends EasyBib_Form
{
	public function init()
	{
		$AgrupacionDB = Model_AgrupacionMapper::getInstance();
		$this->setName('presupuestalform');
		$this->setAttrib('class','form-horizontal');
		 
		$solucionadores_id = new Zend_Form_Element_Hidden('solucionadores_id');
		$solucionadores_id->addFilter('Int');
		$this->addElement($solucionadores_id);

		$personal = new Zend_Form_Element_Text('personal');
        $personal->setLabel('Personal:');
		$personal->addValidator(new Zend_Validate_Float(array('locale' => 'en')));
		$personal->setAttrib('class', ' form-control number ');
 		$this->addElement($personal);

		$serviciotecnico = new Zend_Form_Element_Text('serviciotecnico');
        $serviciotecnico->setLabel('Servicio Técnico:');
		$serviciotecnico->addValidator(new Zend_Validate_Float(array('locale' => 'en')));
		$serviciotecnico->setAttrib('class', ' form-control number ');
 		$this->addElement($serviciotecnico);

		$equipos = new Zend_Form_Element_Text('equipos');
        $equipos->setLabel('Equipos:');
		$equipos->addValidator(new Zend_Validate_Float(array('locale' => 'en')));
		$equipos->setAttrib('class', ' form-control number ');
 		$this->addElement($equipos);

		$software = new Zend_Form_Element_Text('software');
        $software->setLabel('Software:');
		$software->addValidator(new Zend_Validate_Float(array('locale' => 'en')));
		$software->setAttrib('class', ' form-control number ');
 		$this->addElement($software);

		$materialeseinsumos = new Zend_Form_Element_Text('materialeseinsumos');
        $materialeseinsumos->setLabel('Materiales e insumos:');
		$materialeseinsumos->addValidator(new Zend_Validate_Float(array('locale' => 'en')));
		$materialeseinsumos->setAttrib('class', ' form-control number ');
 		$this->addElement($materialeseinsumos);

		$viajes = new Zend_Form_Element_Text('viajes');
        $viajes->setLabel('Viajes:');
		$viajes->addValidator(new Zend_Validate_Float(array('locale' => 'en')));
		$viajes->setAttrib('class', ' form-control number ');
 		$this->addElement($viajes);

		$otrosrubros = new Zend_Form_Element_Text('otrosrubros');
        $otrosrubros->setLabel('Otros rubros necesarios para el desarrollo de la solución:');
		$otrosrubros->addValidator(new Zend_Validate_Float(array('locale' => 'en')));
		$otrosrubros->setAttrib('class', 'form-control number ');
 		$this->addElement($otrosrubros);

		$submit = new Zend_Form_Element_Button('submitsolucionadores');	
		$submit->setLabel( 'Guardar');
		$submit->setAttrib('class', 'btn btn-primary saveform pull-right');
		$submit->setAttrib('onclick', 'clicksaveformpresupuesto();');
		$this->addElement($submit);

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
