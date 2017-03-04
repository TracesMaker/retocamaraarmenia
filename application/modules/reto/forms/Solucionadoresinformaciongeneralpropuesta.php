<?php
class Reto_Form_Solucionadoresinformaciongeneralpropuesta extends EasyBib_Form
{
	public function init()
	{
		$AgrupacionDB = Model_AgrupacionMapper::getInstance();
		$this->setName('solucionadoresform');
		$this->setAttrib('class','form');
		 
		$solucionadores_id = new Zend_Form_Element_Hidden('solucionadores_id');
		$solucionadores_id->addFilter('Int');
		$this->addElement($solucionadores_id);

		$titulo = new Zend_Form_Element_Text('titulo');
        $titulo->setLabel('* Tìtulo de la solución:');    
		$titulo->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$titulo->setRequired(true);
		$titulo->setAttrib('class', ' form-control required ');
 		$this->addElement($titulo);

		$duracionenmeses= new Zend_Form_Element_Text('duracionenmeses');
        $duracionenmeses->setLabel('* Duración del proyecto en meses:');    
		$duracionenmeses->addValidator(new Zend_Validate_Int());
		$duracionenmeses->setRequired(true);
		$duracionenmeses->setAttrib('class', 'form-control  number  required ');
 		$this->addElement($duracionenmeses);

		$correoelectronico = new Zend_Form_Element_Text('correoelectronico');
        $correoelectronico->setLabel('Correo electrónico de contacto:');
		$correoelectronico->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$correoelectronico->setAttrib('class', 'form-control ');
 		$this->addElement($correoelectronico);

		$resumenejecutivo = new Zend_Form_Element_Textarea('resumenejecutivo');
		$resumenejecutivo->setAttrib('rows', 5);
		$resumenejecutivo->setAttrib('cols', 2);
        $resumenejecutivo->setLabel('* Resumen ejecutivo de la idea de solución:');    
		$resumenejecutivo->setRequired(true);
		$resumenejecutivo->setAttrib('class', 'form-control  required ');
 		$this->addElement($resumenejecutivo);

		$impactodesolucion = new Zend_Form_Element_Textarea('impactodesolucion');
		$impactodesolucion->setAttrib('rows', 5);
		$impactodesolucion->setAttrib('cols', 2);
        $impactodesolucion->setLabel('* Impacto de la solución innovadora:');    
		$impactodesolucion->setRequired(true);
		$impactodesolucion->setAttrib('class', 'form-control  required ');
 		$this->addElement($impactodesolucion);

		
		$submit = new Zend_Form_Element_Button('submitsolucionadores');	
		$submit->setLabel( 'Guardar');
		$submit->setAttrib('class', 'btn btn-primary saveform pull-right');
		$submit->setAttrib('onclick', 'clicksaveformsolucionadores();');
		$this->addElement($submit);

         
	}
	
	public function _populateHidden($data)
	{
		return $data;
	}
	


	
	public function cleanForm()
	{
	}
}
