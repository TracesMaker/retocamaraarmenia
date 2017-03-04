<?php
class Reto_Form_Solucionessimilares extends EasyBib_Form
{
	public function init()
	{
		$AgrupacionDB = Model_AgrupacionMapper::getInstance();
		$this->setName('solucionessimilaresform');
		$this->setAttrib('class','form-horizontal');
 
		$solucionessimilares_id = new Zend_Form_Element_Hidden('solucionessimilares_id');
		$solucionessimilares_id->addFilter('Int');
		$this->addElement($solucionessimilares_id);

		$soluciondesarrollada = new Zend_Form_Element_Text('soluciondesarrollada');
        $soluciondesarrollada->setLabel('Solución desarrollada :');
		$soluciondesarrollada->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$soluciondesarrollada->setAttrib('class', ' ');
 		$this->addElement($soluciondesarrollada);

		$anodesarrollo = new Zend_Form_Element_Text('anodesarrollo');
        $anodesarrollo->setLabel('Año en el que se desarrolló la solución:');
		$anodesarrollo->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$anodesarrollo->setAttrib('class', ' ');
 		$this->addElement($anodesarrollo);

		$quienladesarrollo = new Zend_Form_Element_Text('quienladesarrollo');
        $quienladesarrollo->setLabel('Quien la desarrolló:');
		$quienladesarrollo->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$quienladesarrollo->setAttrib('class', ' ');
 		$this->addElement($quienladesarrollo);

		$resultadosobtenidos = new Zend_Form_Element_Text('resultadosobtenidos');
        $resultadosobtenidos->setLabel('Resultados obtenidos obtenidos :');
		$resultadosobtenidos->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$resultadosobtenidos->setAttrib('class', ' ');
 		$this->addElement($resultadosobtenidos);

		$dificultadespresentadas = new Zend_Form_Element_Text('dificultadespresentadas');
        $dificultadespresentadas->setLabel('¿Qué dificultades se presentaron durante el desarrollo de la solución?:');
		$dificultadespresentadas->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$dificultadespresentadas->setAttrib('class', ' ');
 		$this->addElement($dificultadespresentadas);
		$cancel = new Zend_Form_Element_Button('cancelsolucionessimilares');
		$cancel->setLabel('Cancelar');
		$cancel->setAttrib('class', 'btn closeform');
		$this->addElement($cancel);
		
        $SaveAndNew = new Zend_Form_Element_Button('saveandnewsolucionessimilares');
        $SaveAndNew->setLabel( 'Guardar y nuevo');
        $SaveAndNew->setAttrib('class', 'btn btn-success saveandnew hidden-phone');
        $this->addElement($SaveAndNew);
		
		$submit = new Zend_Form_Element_Button('submitsolucionessimilares');
		$submit->setLabel( 'Guardar');
		$submit->setAttrib('class', 'btn btn-primary saveform');
		$this->addElement($submit);
		

        $this->addDisplayGroup(array("submitsolucionessimilares", "saveandnewsolucionessimilares", "cancelsolucionessimilares"), 'submitsolucionessimilaresgroup');
        // set decorators
        EasyBib_Form_Decorator::setFormDecorator($this, EasyBib_Form_Decorator::BOOTSTRAP, 'submitsolucionessimilares', 'cancelsolucionessimilares', 'saveandnewsolucionessimilares');
	}
	
	public function _populateHidden($data)
	{
		return $data;
	}
	

}
