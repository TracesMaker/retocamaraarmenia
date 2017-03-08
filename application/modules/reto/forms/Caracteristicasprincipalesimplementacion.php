<?php
class Reto_Form_Caracteristicasprincipalesimplementacion extends EasyBib_Form
{
	public function init()
	{
		$AgrupacionDB = Model_AgrupacionMapper::getInstance();
		$this->setName('caracteristicasprincipalesimplementacionform');
		$this->setAttrib('class','form-horizontal');
 
		$caracteristicasprincipalesimplementacion_id = new Zend_Form_Element_Hidden('caracteristicasprincipalesimplementacion_id');
		$caracteristicasprincipalesimplementacion_id->addFilter('Int');
		$this->addElement($caracteristicasprincipalesimplementacion_id);

		$atributobasico = new Zend_Form_Element_Select('atributobasico');
        $atributobasico->setLabel('* Atributo Básico (característica sin la cual la solución no existe):');    
		$CaracteristicasprincipalessolucionDB = Reto_Model_CaracteristicasprincipalessolucionMapper::getInstance();
		$ArrayOption=$CaracteristicasprincipalessolucionDB->getArrayOption($atributobasico);
		$atributobasico->setMultiOptions($ArrayOption);
		//$atributobasico->setRequired(true);
 		//$atributobasico->setAttrib('class', '    required ');
 		$atributobasico->addFilter('null');
 		$this->addElement($atributobasico);

		$estadodeldesarrollo = new Zend_Form_Element_Textarea('estadodeldesarrollo');
		$estadodeldesarrollo->setAttrib('rows', 5);
		$estadodeldesarrollo->setAttrib('cols', 2);
        $estadodeldesarrollo->setLabel('* Tecnología que puede dar soporte a la existencia de este atributo:');    
		$estadodeldesarrollo->setRequired(true);
		//$estadodeldesarrollo->setAttrib('class', '  required ');
 		$this->addElement($estadodeldesarrollo);

		$gradodeldesarrollo = new Zend_Form_Element_Textarea('gradodeldesarrollo');
		$gradodeldesarrollo->setAttrib('rows', 5);
		$gradodeldesarrollo->setAttrib('cols', 2);
        $gradodeldesarrollo->setLabel('* Grado de dificultad para involucrar la tecnología a la información:');    
		$gradodeldesarrollo->setRequired(true);
		//$gradodeldesarrollo->setAttrib('class', '  required ');
 		$this->addElement($gradodeldesarrollo);

		$aspectospendientes = new Zend_Form_Element_Textarea('aspectospendientes');
		$aspectospendientes->setAttrib('rows', 5);
		$aspectospendientes->setAttrib('cols', 2);
        $aspectospendientes->setLabel('* Explicación del grado de dificultad otorgado:');    
		$aspectospendientes->setRequired(true);
		//$aspectospendientes->setAttrib('class', '  required ');
 		$this->addElement($aspectospendientes);
		$cancel = new Zend_Form_Element_Button('cancelcaracteristicasprincipalesimplementacion');
		$cancel->setLabel('Cancelar');
		$cancel->setAttrib('class', 'btn closeform');
		$this->addElement($cancel);
		
        $SaveAndNew = new Zend_Form_Element_Button('saveandnewcaracteristicasprincipalesimplementacion');
        $SaveAndNew->setLabel( 'Guardar y nuevo');
        $SaveAndNew->setAttrib('class', 'btn btn-success saveandnew hidden-phone');
        $this->addElement($SaveAndNew);
		
		$submit = new Zend_Form_Element_Button('submitcaracteristicasprincipalesimplementacion');
		$submit->setLabel( 'Guardar');
		$submit->setAttrib('class', 'btn btn-primary saveform');
		$this->addElement($submit);
		

        $this->addDisplayGroup(array("submitcaracteristicasprincipalesimplementacion", "saveandnewcaracteristicasprincipalesimplementacion", "cancelcaracteristicasprincipalesimplementacion"), 'submitcaracteristicasprincipalesimplementaciongroup');
        // set decorators
        EasyBib_Form_Decorator::setFormDecorator($this, EasyBib_Form_Decorator::BOOTSTRAP, 'submitcaracteristicasprincipalesimplementacion', 'cancelcaracteristicasprincipalesimplementacion', 'saveandnewcaracteristicasprincipalesimplementacion');
	}
	
	public function _populateHidden($data)
	{
		return $data;
	}
	

}
