<?php
class Form_Recovery extends Zend_Form
{
    public function init()
    {
 		$this->setName('login');
		$this->setMethod('post');
        $this->setAction(Zend_Controller_Front::getInstance()->getBaseUrl().'/authentication/recovery');
        
 		// Se crea el elemento texto del formulario con nombre username y se define que no puede tener un valor vacio 
        $username=new Zend_Form_Element_Text('username');
		$username->setAttrib('class', 'input-medio');
        $username->setLabel('* Nombre de usuario:')
        ->setRequired(true);
		$this->addElement($username);

        // Se crea elemento password del folmulario con nombre password y se define que no puede tener un valor vacio
        $useremail=new Zend_Form_Element_Text('useremail');
        $useremail->setAttrib('class', 'input-medio');
        $useremail->setLabel('* Correo:')->setRequired(true);
        $this->addElement($useremail);   
		
        $this->setElementDecorators(array('Label', 'ViewHelper', array('HtmlTag', array( 'class' => ''))));
		
        // Se crea el boton submit con nombre login
        $enviar=new Zend_Form_Element_Submit('enviar');
		$enviar->setAttrib('class', 'btn btn-primary');
        $enviar->setLabel('Enviar');
		$enviar->addDecorators(array('ViewHelper', array('HtmlTag', array( 'class' => ''))));
		$this->addElement($enviar);

        $cancelar = new Zend_Form_Element_Button('cancelar');
        $cancelar->setLabel('Atras');
        $cancelar->setAttrib('class', 'btn');
        $cancelar->setAttrib('onclick','window.location =\''.$this->getView()->url(array('controller'=>'index','action'=>'index')).'\' ');
        $this->addElement($cancelar);

        $this->addDisplayGroup(array("enviar","cancelar"), 'submitrecoverygroup');
        EasyBib_Form_Decorator::setFormDecorator($this, EasyBib_Form_Decorator::BOOTSTRAP, 'enviar', 'cancelar', 'saveandnewasociado');

    }
}
