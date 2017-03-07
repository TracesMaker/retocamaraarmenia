<?php
class Reto_Form_Solucionadoresinformaciongeneralproponente extends EasyBib_Form
{
	public function init()
	{
		$AgrupacionDB = Model_AgrupacionMapper::getInstance();
		$this->setName('proponenteform');
		$this->setAttrib('class','form-horizontal');
		 
		$solucionadores_id = new Zend_Form_Element_Hidden('solucionadores_id');
		$solucionadores_id->addFilter('Int');
		$this->addElement($solucionadores_id);

		$nombredelaempresa = new Zend_Form_Element_Text('nombredelaempresa');
        $nombredelaempresa->setLabel('Nombre de la empresa / persona natural:');
		$nombredelaempresa->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$nombredelaempresa->setAttrib('class', ' form-control ');
 		$this->addElement($nombredelaempresa);

		$nit = new Zend_Form_Element_Text('nit');
        $nit->setLabel('Nit / C.C.:');
		$nit->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$nit->setAttrib('class', 'form-control ');
 		$this->addElement($nit);

		$telefono = new Zend_Form_Element_Text('telefono');
        $telefono->setLabel('Teléfono:');
		$telefono->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$telefono->setAttrib('class', ' form-control ');
 		$this->addElement($telefono);

		$paginaweb = new Zend_Form_Element_Text('paginaweb');
        $paginaweb->setLabel('Página Web:');
		$paginaweb->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$paginaweb->setAttrib('class', ' form-control ');
 		$this->addElement($paginaweb);

		$nombredepersonadecontacto = new Zend_Form_Element_Text('nombredepersonadecontacto');
        $nombredepersonadecontacto->setLabel('Nombre de persona de contacto:');
		$nombredepersonadecontacto->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$nombredepersonadecontacto->setAttrib('class', ' form-control ');
 		$this->addElement($nombredepersonadecontacto);

		$celulardelproponente = new Zend_Form_Element_Text('celulardelproponente');
        $celulardelproponente->setLabel('Número de Celular:');
		$celulardelproponente->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$celulardelproponente->setAttrib('class', ' form-control ');
 		$this->addElement($celulardelproponente);

		// $correoelectronicoproponente = new Zend_Form_Element_Text('correoelectronicoproponente');
  //       $correoelectronicoproponente->setLabel('Correo electrónico:');
		// $correoelectronicoproponente->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		// $correoelectronicoproponente->setAttrib('class', ' form-control ');
 	// 	$this->addElement($correoelectronicoproponente);


		// $cancel = new Zend_Form_Element_Button('cancelsolucionadores');
		// $cancel->setLabel('Cancelar');
		// $cancel->setAttrib('class', 'btn closeform');
		// $this->addElement($cancel);
		
		$submit = new Zend_Form_Element_Button('submitsolucionadores');	
		$submit->setLabel( 'Guardar');
		$submit->setAttrib('class', 'btn btn-primary saveform pull-right');
		$submit->setAttrib('onclick', 'clicksaveformproponente();');
		$this->addElement($submit);

		 // set decorators
        EasyBib_Form_Decorator::setFormDecorator($this, EasyBib_Form_Decorator::BOOTSTRAP, 'submitsolucionadores', 'cancelsolucionadores');

	}
	
	public function _populateHidden($data)
	{
		return $data;
	}
	


	
	public function cleanForm()
	{
	}
}
