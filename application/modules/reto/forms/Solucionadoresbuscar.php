<?php
class Reto_Form_Solucionadoresbuscar extends Zend_Form
{
	public function init()
	{
		$AgrupacionDB = Model_AgrupacionMapper::getInstance();
		
		$this->setName('solucionadoresformbuscar');
	    $this->setAttrib('class', 'searchform');
	
		$page= new Zend_Form_Element_Hidden('irapagina');
		$this->addElement($page);
		
		$sort= new Zend_Form_Element_Hidden('sort');
		$this->addElement($sort);
		
		$order= new Zend_Form_Element_Hidden('order');
		$this->addElement($order);
		
		$nregistros= new Zend_Form_Element_Hidden('nregistros');
		$this->addElement($nregistros);
	
		$buscar= new Zend_Form_Element_Text('buscar');
		$buscar->setAttrib('class', 'input-tercio');
		$buscar->setLabel('Buscar:');
		$this->addElement($buscar);

        $usuario= new Zend_Form_Element_Hidden('usuario');
        $this->addElement($usuario);
		
		$this->setElementDecorators(array('Label', 'ViewHelper', array('HtmlTag', array( 'class' => ''))));
		
		$submit = new Zend_Form_Element_Button('submitsolucionadoresbuscar');
		$submit->setLabel( 'Buscar');
		$submit->addDecorators(array('ViewHelper', array('HtmlTag', array( 'class' => 'span2'))));
		$submit->setAttrib('class', 'btn btn-primary savefiltros');
		$this->addElement($submit);

		$clean = new Zend_Form_Element_Button('cleansolucionadoresbuscar');
		$clean->setLabel( 'Limpiar');
		$clean->addDecorators(array('ViewHelper', array('HtmlTag', array( 'class' => 'span2'))));
		$clean->setAttrib('class', 'btn btn-inverse clean');
		$clean->setAttrib('idButtonSubmit', 'submitsolucionadoresbuscar');
		$this->addElement($clean);
	}

}
