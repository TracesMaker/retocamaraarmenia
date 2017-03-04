<?php
class Reto_Form_Elementostangibles extends EasyBib_Form
{
	public function init()
	{
		$AgrupacionDB = Model_AgrupacionMapper::getInstance();
		$this->setName('elementostangiblesform');
		$this->setAttrib('class','form-horizontal');
 
		$elementostangibles_id = new Zend_Form_Element_Hidden('elementostangibles_id');
		$elementostangibles_id->addFilter('Int');
		$this->addElement($elementostangibles_id);

		$elementofisico = new Zend_Form_Element_Textarea('elementofisico');
		$elementofisico->setAttrib('rows', 5);
		$elementofisico->setAttrib('cols', 2);
        $elementofisico->setLabel('* Elemento físico:');    
		$elementofisico->setRequired(true);
		$elementofisico->setAttrib('class', '  required ');
 		$this->addElement($elementofisico);

		$descripcion = new Zend_Form_Element_Textarea('descripcion');
		$descripcion->setAttrib('rows', 5);
		$descripcion->setAttrib('cols', 2);
        $descripcion->setLabel('* Descripción:');    
		$descripcion->setRequired(true);
		$descripcion->setAttrib('class', '  required ');
 		$this->addElement($descripcion);

		$funcionenlasolucion = new Zend_Form_Element_Textarea('funcionenlasolucion');
		$funcionenlasolucion->setAttrib('rows', 5);
		$funcionenlasolucion->setAttrib('cols', 2);
        $funcionenlasolucion->setLabel('* Utilidad o función dentro de la solución:');    
		$funcionenlasolucion->setRequired(true);
		$funcionenlasolucion->setAttrib('class', '  required ');
 		$this->addElement($funcionenlasolucion);
		$cancel = new Zend_Form_Element_Button('cancelelementostangibles');
		$cancel->setLabel('Cancelar');
		$cancel->setAttrib('class', 'btn closeform');
		$this->addElement($cancel);
		
        $SaveAndNew = new Zend_Form_Element_Button('saveandnewelementostangibles');
        $SaveAndNew->setLabel( 'Guardar y nuevo');
        $SaveAndNew->setAttrib('class', 'btn btn-success saveandnew hidden-phone');
        $this->addElement($SaveAndNew);
		
		$submit = new Zend_Form_Element_Button('submitelementostangibles');
		$submit->setLabel( 'Guardar');
		$submit->setAttrib('class', 'btn btn-primary saveform');
		$this->addElement($submit);
		

        $this->addDisplayGroup(array("submitelementostangibles", "saveandnewelementostangibles", "cancelelementostangibles"), 'submitelementostangiblesgroup');
        // set decorators
        EasyBib_Form_Decorator::setFormDecorator($this, EasyBib_Form_Decorator::BOOTSTRAP, 'submitelementostangibles', 'cancelelementostangibles', 'saveandnewelementostangibles');
	}
	
	public function _populateHidden($data)
	{
		return $data;
	}
	

}
