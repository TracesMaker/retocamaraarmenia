<?php
class Form_Aclusuariosonline extends EasyBib_Form
{
	public function init()
	{
		$AgrupacionDB = Model_AgrupacionMapper::getInstance();
		$this->setName('aclusuariosonlineform');
		$this->setAttrib('class','form-horizontal');
 
		$aclusuariosonline_id = new Zend_Form_Element_Hidden('aclusuariosonline_id');
		$aclusuariosonline_id->addFilter('Int');
		$this->addElement($aclusuariosonline_id);

		$usuario_id = new Zend_Form_Element_Select('usuario_id');
        $usuario_id->setLabel('* Usuario:');    
		$AclusuariosDB = Model_AclusuariosMapper::getInstance();
		$ArrayOption=$AclusuariosDB->getArrayOption($usuario_id);
		$usuario_id->setMultiOptions($ArrayOption);
		$usuario_id->setRequired(true);
 		$usuario_id->setAttrib('class', '    required ');
 		$usuario_id->addFilter('null');
 		$this->addElement($usuario_id);
		$cancel = new Zend_Form_Element_Button('cancelaclusuariosonline');
		$cancel->setLabel('Cancelar');
		$cancel->setAttrib('class', 'btn closeform');
		$this->addElement($cancel);
		
        $SaveAndNew = new Zend_Form_Element_Button('saveandnewaclusuariosonline');
        $SaveAndNew->setLabel( 'Guardar y nuevo');
        $SaveAndNew->setAttrib('class', 'btn btn-success saveandnew hidden-phone');
        $this->addElement($SaveAndNew);
		
		$submit = new Zend_Form_Element_Button('submitaclusuariosonline');
		$submit->setLabel( 'Guardar');
		$submit->setAttrib('class', 'btn btn-primary saveform');
		$this->addElement($submit);
		

        $this->addDisplayGroup(array("submitaclusuariosonline", "saveandnewaclusuariosonline", "cancelaclusuariosonline"), 'submitaclusuariosonlinegroup');
        // set decorators
        EasyBib_Form_Decorator::setFormDecorator($this, EasyBib_Form_Decorator::BOOTSTRAP, 'submitaclusuariosonline', 'cancelaclusuariosonline', 'saveandnewaclusuariosonline');
	}
	
	public function _populateHidden($data)
	{
		return $data;
	}
	

}
