<?php
class Reto_Form_Actividadesfundamentales extends EasyBib_Form
{
	public function init()
	{
		$AgrupacionDB = Model_AgrupacionMapper::getInstance();
		$this->setName('actividadesfundamentalesform');
		$this->setAttrib('class','form-horizontal');
 
		$actividadesfundamentales_id = new Zend_Form_Element_Hidden('actividadesfundamentales_id');
		$actividadesfundamentales_id->addFilter('Int');
		$this->addElement($actividadesfundamentales_id);

		$actividades = new Zend_Form_Element_Textarea('actividades');
		$actividades->setAttrib('rows', 5);
		$actividades->setAttrib('cols', 2);
        $actividades->setLabel('Nombre de la actividad:');
		$actividades->setAttrib('class', ' ');
 		$this->addElement($actividades);

		$resultadoactividad = new Zend_Form_Element_Textarea('resultadoactividad');
		$resultadoactividad->setAttrib('rows', 5);
		$resultadoactividad->setAttrib('cols', 2);
        $resultadoactividad->setLabel('Qué se espera obtener de esta actividad:');
		$resultadoactividad->setAttrib('class', ' ');
 		$this->addElement($resultadoactividad);

		$tiempoactividad = new Zend_Form_Element_Text('tiempoactividad');
        $tiempoactividad->setLabel('Cuanto tiempo dura la actividad?:');
		$tiempoactividad->addValidator(new Zend_Validate_Float(array('locale' => 'en')));
		$tiempoactividad->setAttrib('class', '  number ');
 		$this->addElement($tiempoactividad);
		$cancel = new Zend_Form_Element_Button('cancelactividadesfundamentales');
		$cancel->setLabel('Cancelar');
		$cancel->setAttrib('class', 'btn closeform');
		$this->addElement($cancel);
		
        $SaveAndNew = new Zend_Form_Element_Button('saveandnewactividadesfundamentales');
        $SaveAndNew->setLabel( 'Guardar y nuevo');
        $SaveAndNew->setAttrib('class', 'btn btn-success saveandnew hidden-phone');
        $this->addElement($SaveAndNew);
		
		$submit = new Zend_Form_Element_Button('submitactividadesfundamentales');
		$submit->setLabel( 'Guardar');
		$submit->setAttrib('class', 'btn btn-primary saveform');
		$this->addElement($submit);
		

        $this->addDisplayGroup(array("submitactividadesfundamentales", "saveandnewactividadesfundamentales", "cancelactividadesfundamentales"), 'submitactividadesfundamentalesgroup');
        // set decorators
        EasyBib_Form_Decorator::setFormDecorator($this, EasyBib_Form_Decorator::BOOTSTRAP, 'submitactividadesfundamentales', 'cancelactividadesfundamentales', 'saveandnewactividadesfundamentales');
	}
	
	public function _populateHidden($data)
	{
		return $data;
	}
	

}
