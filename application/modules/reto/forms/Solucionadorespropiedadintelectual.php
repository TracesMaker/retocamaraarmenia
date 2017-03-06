<?php
class Reto_Form_Solucionadorespropiedadintelectual extends EasyBib_Form
{
	public function init()
	{
		$AgrupacionDB = Model_AgrupacionMapper::getInstance();
		$this->setName('propiedadform');
		$this->setAttrib('class','form-horizontal');
		 
		$solucionadores_id = new Zend_Form_Element_Hidden('solucionadores_id');
		$solucionadores_id->addFilter('Int');
		$this->addElement($solucionadores_id);

			$propiedadintelectual = new Zend_Form_Element_Select('propiedadintelectual');
	        $propiedadintelectual->setLabel('La solución tecnologica presentada, como solución al reto, está protegida actualmente, por algún tipo de propiedad intelectual?:');
			$propiedadintelectual->addMultiOption("0", "No");
			$propiedadintelectual->addMultiOption("1", "Sí");
		$propiedadintelectual->setAttrib('class', ' form-control');
 		$this->addElement($propiedadintelectual);

		$descripcionpropiedadintelecual = new Zend_Form_Element_Textarea('descripcionpropiedadintelecual');
		$descripcionpropiedadintelecual->setAttrib('rows', 5);
		$descripcionpropiedadintelecual->setAttrib('cols', 2);
        $descripcionpropiedadintelecual->setLabel('Si la respuesta es afirmativa, por favor describa brevemente.:');
        $descripcionpropiedadintelecual->setDescription('Máximo 400 palabras.');
		$descripcionpropiedadintelecual->setAttrib('class', ' form-control');
 		$this->addElement($descripcionpropiedadintelecual);

			$politicapropiedadintelectual = new Zend_Form_Element_Select('politicapropiedadintelectual');
	        $politicapropiedadintelectual->setLabel('¿Tiene una politica de propiedad intelectual?:');
			$politicapropiedadintelectual->addMultiOption("0", "No");
			$politicapropiedadintelectual->addMultiOption("1", "Sí");
		$politicapropiedadintelectual->setAttrib('class', ' form-control');
 		$this->addElement($politicapropiedadintelectual);

		$descripcionpoliticapropiedadintelecual = new Zend_Form_Element_Textarea('descripcionpoliticapropiedadintelecual');
		$descripcionpoliticapropiedadintelecual->setAttrib('rows', 5);
		$descripcionpoliticapropiedadintelecual->setAttrib('cols', 2);
        $descripcionpoliticapropiedadintelecual->setLabel('Si la respuesta es afirmativa, por favor describa brevemente.:');
        $descripcionpoliticapropiedadintelecual->setDescription('Máximo 400 palabras.');
		$descripcionpoliticapropiedadintelecual->setAttrib('class', ' form-control');
 		$this->addElement($descripcionpoliticapropiedadintelecual);

			$autenticidad = new Zend_Form_Element_Select('autenticidad');
	        $autenticidad->setLabel('¿Esta propuesta y su contenido es de tu propiedad?:');
			$autenticidad->addMultiOption("0", "No");
			$autenticidad->addMultiOption("1", "Sí");
		$autenticidad->setAttrib('class', ' form-control');
 		$this->addElement($autenticidad);

		$descripcionautorpropiedad = new Zend_Form_Element_Textarea('descripcionautorpropiedad');
		$descripcionautorpropiedad->setAttrib('rows', 5);
		$descripcionautorpropiedad->setAttrib('cols', 2);
        $descripcionautorpropiedad->setLabel('Si la respuesta es negativa, por favor define de quien es la propiedad:');
		$descripcionautorpropiedad->setAttrib('class', ' form-control');
 		$this->addElement($descripcionautorpropiedad);

		$cuando = new Zend_Form_Element_Text('cuando');
        $cuando->setLabel('¿Cuando?:');
		$cuando->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$cuando->setAttrib('class', ' form-control');
 		$this->addElement($cuando);

		$conquien = new Zend_Form_Element_Text('conquien');
        $conquien->setLabel('¿Con quien?:');
		$conquien->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$conquien->setAttrib('class', ' form-control');
 		$this->addElement($conquien);

			$presentacionpublica = new Zend_Form_Element_Select('presentacionpublica');
	        $presentacionpublica->setLabel('¿se ha hecho presentación publica de esta solución?:');
			$presentacionpublica->addMultiOption("0", "No");
			$presentacionpublica->addMultiOption("1", "Sí");
		$presentacionpublica->setAttrib('class', ' form-control');
 		$this->addElement($presentacionpublica);

			$acuerdoconfidencialidadconautor = new Zend_Form_Element_Select('acuerdoconfidencialidadconautor');
	        $acuerdoconfidencialidadconautor->setLabel('¿se hizo algún acuerdo de confidencialidad con esta persona?:');
			$acuerdoconfidencialidadconautor->addMultiOption("0", "No");
			$acuerdoconfidencialidadconautor->addMultiOption("1", "Sí");
		$acuerdoconfidencialidadconautor->setAttrib('class', ' form-control');
 		$this->addElement($acuerdoconfidencialidadconautor);
		
		$submit = new Zend_Form_Element_Button('submitsolucionadores');	
		$submit->setLabel( 'Guardar');
		$submit->setAttrib('class', 'btn btn-primary saveform pull-right');
		$submit->setAttrib('onclick', 'clicksaveformpropiedad();');
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
