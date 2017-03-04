<?php
class Reto_Form_Evaluaciones extends EasyBib_Form
{
	public function init()
	{
		$AgrupacionDB = Model_AgrupacionMapper::getInstance();
		$this->setName('evaluacionesform');
		$this->setAttrib('class','form-horizontal');
 
		$evaluaciones_id = new Zend_Form_Element_Hidden('evaluaciones_id');
		$evaluaciones_id->addFilter('Int');
		$this->addElement($evaluaciones_id);

		$reto = new Zend_Form_Element_Select('reto');
        $reto->setLabel('Reto:');
		$RetoDB = Reto_Model_RetoMapper::getInstance();
		$ArrayOption=$RetoDB->getArrayOption($reto);
		$reto->setMultiOptions($ArrayOption);
 		$reto->setAttrib('class', '   ');
 		$reto->addFilter('null');
 		$this->addElement($reto);

		$evaluador = new Zend_Form_Element_Select('evaluador');
        $evaluador->setLabel('Evaluador:');
		$AclusuariosDB = Model_AclusuariosMapper::getInstance();
		$ArrayOption=$AclusuariosDB->getArrayOption($evaluador);
		$evaluador->setMultiOptions($ArrayOption);
 		$evaluador->setAttrib('class', '   ');
 		$evaluador->addFilter('null');
 		$this->addElement($evaluador);

		$itemaevaluar = new Zend_Form_Element_Select('itemaevaluar');
        $itemaevaluar->setLabel('Item a evaluar:');
		$ItemaevaluarDB = Reto_Model_ItemaevaluarMapper::getInstance();
		$ArrayOption=$ItemaevaluarDB->getArrayOption($itemaevaluar);
		$itemaevaluar->setMultiOptions($ArrayOption);
 		$itemaevaluar->setAttrib('class', '   ');
 		$itemaevaluar->addFilter('null');
 		$this->addElement($itemaevaluar);

		$solucionador = new Zend_Form_Element_Select('solucionador');
        $solucionador->setLabel('Solucionador:');
		$SolucionadoresDB = Reto_Model_SolucionadoresMapper::getInstance();
		$ArrayOption=$SolucionadoresDB->getArrayOption($solucionador);
		$solucionador->setMultiOptions($ArrayOption);
 		$solucionador->setAttrib('class', '   ');
 		$solucionador->addFilter('null');
 		$this->addElement($solucionador);

		$concepto = new Zend_Form_Element_Textarea('concepto');
		$concepto->setAttrib('rows', 5);
		$concepto->setAttrib('cols', 2);
        $concepto->setLabel('Concepto:');
		$concepto->setAttrib('class', ' ');
 		$this->addElement($concepto);

		$valor= new Zend_Form_Element_Text('valor');
        $valor->setLabel('Evaluación cuantitativa:');
		$valor->addValidator(new Zend_Validate_Int());
		$valor->setAttrib('class', '  number ');
 		$this->addElement($valor);
		$cancel = new Zend_Form_Element_Button('cancelevaluaciones');
		$cancel->setLabel('Cancelar');
		$cancel->setAttrib('class', 'btn closeform');
		$this->addElement($cancel);
		
        $SaveAndNew = new Zend_Form_Element_Button('saveandnewevaluaciones');
        $SaveAndNew->setLabel( 'Guardar y nuevo');
        $SaveAndNew->setAttrib('class', 'btn btn-success saveandnew hidden-phone');
        $this->addElement($SaveAndNew);
		
		$submit = new Zend_Form_Element_Button('submitevaluaciones');
		$submit->setLabel( 'Guardar');
		$submit->setAttrib('class', 'btn btn-primary saveform');
		$this->addElement($submit);
		

        $this->addDisplayGroup(array("submitevaluaciones", "saveandnewevaluaciones", "cancelevaluaciones"), 'submitevaluacionesgroup');
        // set decorators
        EasyBib_Form_Decorator::setFormDecorator($this, EasyBib_Form_Decorator::BOOTSTRAP, 'submitevaluaciones', 'cancelevaluaciones', 'saveandnewevaluaciones');
	}
	
	public function _populateHidden($data)
	{
		return $data;
	}
	

}
