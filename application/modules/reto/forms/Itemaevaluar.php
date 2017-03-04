<?php
class Reto_Form_Itemaevaluar extends EasyBib_Form
{
	public function init()
	{
		$AgrupacionDB = Model_AgrupacionMapper::getInstance();
		$this->setName('itemaevaluarform');
		$this->setAttrib('class','form-horizontal');
 
		$itemaevaluar_id = new Zend_Form_Element_Hidden('itemaevaluar_id');
		$itemaevaluar_id->addFilter('Int');
		$this->addElement($itemaevaluar_id);

		$titulo = new Zend_Form_Element_Text('titulo');
        $titulo->setLabel('Título:');
		$titulo->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$titulo->setAttrib('class', ' ');
 		$this->addElement($titulo);

		$tabla = new Zend_Form_Element_Text('tabla');
        $tabla->setLabel('Tabla:');
		$tabla->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$tabla->setAttrib('class', ' ');
 		$this->addElement($tabla);

		$columna = new Zend_Form_Element_Text('columna');
        $columna->setLabel('columna:');
		$columna->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$columna->setAttrib('class', ' ');
 		$this->addElement($columna);

			$evaluable = new Zend_Form_Element_Select('evaluable');
	        $evaluable->setLabel('Evaluable:');
			$evaluable->addMultiOption("0", "No");
			$evaluable->addMultiOption("1", "Sí");
		$evaluable->setAttrib('class', ' ');
 		$this->addElement($evaluable);

		$orden= new Zend_Form_Element_Text('orden');
        $orden->setLabel('Orden:');
		$orden->addValidator(new Zend_Validate_Int());
		$orden->setAttrib('class', '  number ');
 		$this->addElement($orden);

		$grupoevaluacion = new Zend_Form_Element_Select('grupoevaluacion');
        $grupoevaluacion->setLabel('Grupo Evaluacion:');
		$GrupoevaluacionDB = Reto_Model_GrupoevaluacionMapper::getInstance();
		$ArrayOption=$GrupoevaluacionDB->getArrayOption($grupoevaluacion);
		$grupoevaluacion->setMultiOptions($ArrayOption);
 		$grupoevaluacion->setAttrib('class', '   ');
 		$grupoevaluacion->addFilter('null');
 		$this->addElement($grupoevaluacion);
		$cancel = new Zend_Form_Element_Button('cancelitemaevaluar');
		$cancel->setLabel('Cancelar');
		$cancel->setAttrib('class', 'btn closeform');
		$this->addElement($cancel);
		
        $SaveAndNew = new Zend_Form_Element_Button('saveandnewitemaevaluar');
        $SaveAndNew->setLabel( 'Guardar y nuevo');
        $SaveAndNew->setAttrib('class', 'btn btn-success saveandnew hidden-phone');
        $this->addElement($SaveAndNew);
		
		$submit = new Zend_Form_Element_Button('submititemaevaluar');
		$submit->setLabel( 'Guardar');
		$submit->setAttrib('class', 'btn btn-primary saveform');
		$this->addElement($submit);
		

        $this->addDisplayGroup(array("submititemaevaluar", "saveandnewitemaevaluar", "cancelitemaevaluar"), 'submititemaevaluargroup');
        // set decorators
        EasyBib_Form_Decorator::setFormDecorator($this, EasyBib_Form_Decorator::BOOTSTRAP, 'submititemaevaluar', 'cancelitemaevaluar', 'saveandnewitemaevaluar');
	}
	
	public function _populateHidden($data)
	{
		return $data;
	}
	

	public function populateDefault()
	{
		$this->evaluable->setValue("1");
	}
}
