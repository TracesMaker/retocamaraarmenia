<?php
class Reto_Form_Reto extends EasyBib_Form
{
	public function init()
	{
		$AgrupacionDB = Model_AgrupacionMapper::getInstance();
		$this->setName('retoform');
		$this->setAttrib('class','form-horizontal');
 
		$reto_id = new Zend_Form_Element_Hidden('reto_id');
		$reto_id->addFilter('Int');
		$this->addElement($reto_id);

		$titulo = new Zend_Form_Element_Text('titulo');
        $titulo->setLabel('* Tìtulo:');    
		$titulo->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$titulo->setRequired(true);
		$titulo->setAttrib('class', '  required ');
 		$this->addElement($titulo);

		$descripcioncorta = new Zend_Form_Element_Textarea('descripcioncorta');
		$descripcioncorta->setAttrib('rows', 5);
		$descripcioncorta->setAttrib('cols', 2);
        $descripcioncorta->setLabel('* Descripciòn corta:');    
		$descripcioncorta->setRequired(true);
		$descripcioncorta->setAttrib('class', '  required ');
 		$this->addElement($descripcioncorta);

		$descripcioncompleta = new Zend_Form_Element_Textarea('descripcioncompleta');
		$descripcioncompleta->setAttrib('rows', 5);
		$descripcioncompleta->setAttrib('cols', 2);
        $descripcioncompleta->setLabel('* Descripciòn completa:');    
		$descripcioncompleta->setRequired(true);
		$descripcioncompleta->setAttrib('class', '  required ');
 		$this->addElement($descripcioncompleta);

		$urlvideo = new Zend_Form_Element_Text('urlvideo');
        $urlvideo->setLabel('URL del video:');
		$urlvideo->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$urlvideo->setAttrib('class', ' ');
 		$this->addElement($urlvideo);

		$imagen = new Zend_Form_Element_File('imagen');
        $imagen->setLabel('Imagen:');
		$imagen->setDestination('Files/retoimagen');
		$imagen->setAttrib('class', ' ');
 		$this->addElement($imagen);

		$fechainicio = new Zend_Form_Element_Text('fechainicio');
        $fechainicio->setLabel('* Fecha de inicio:');    
		$valiDate = new Zend_Validate_Date();
		$valiDate->setFormat('YYYY-mm-dd');
		$fechainicio->setAttrib('placeholder','YYYY-mm-dd');
		$fechainicio->addValidator($valiDate);
		$fechainicio->addFilter('null');
		$fechainicio->setRequired(true);
		$fechainicio->setAttrib('class', '  date  required ');
 		$this->addElement($fechainicio);

		$fechafin = new Zend_Form_Element_Text('fechafin');
        $fechafin->setLabel('* Fecha de finalizaciòn:');    
		$valiDate = new Zend_Validate_Date();
		$valiDate->setFormat('YYYY-mm-dd');
		$fechafin->setAttrib('placeholder','YYYY-mm-dd');
		$fechafin->addValidator($valiDate);
		$fechafin->addFilter('null');
		$fechafin->setRequired(true);
		$fechafin->setAttrib('class', '  date  required ');
 		$this->addElement($fechafin);

		$estado = new Zend_Form_Element_Select('estado');
        $estado->setLabel('* Estado del reto:');    
		$EstadosdelretoDB = Reto_Model_EstadosdelretoMapper::getInstance();
		$ArrayOption=$EstadosdelretoDB->getArrayOption($estado);
		$estado->setMultiOptions($ArrayOption);
		$estado->setRequired(true);
 		$estado->setAttrib('class', '    required ');
 		$estado->addFilter('null');
 		$this->addElement($estado);
		$cancel = new Zend_Form_Element_Button('cancelreto');
		$cancel->setLabel('Cancelar');
		$cancel->setAttrib('class', 'btn closeform');
		$this->addElement($cancel);
		$submit = new Zend_Form_Element_Submit('submitreto');		
		$submit->setLabel( 'Guardar');
		$submit->setAttrib('class', 'btn btn-primary saveform');
		$this->addElement($submit);
		


		$this->addDisplayGroup(array("submitreto", "cancelreto"), 'submitretogroup');
        // set decorators
        EasyBib_Form_Decorator::setFormDecorator($this, EasyBib_Form_Decorator::BOOTSTRAP, 'submitreto', 'cancelreto');
	}
	
	public function _populateHidden($data)
	{
		return $data;
	}
	

}
