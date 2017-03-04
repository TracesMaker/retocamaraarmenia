<?php
class Form_LoginForm extends Zend_Form
{
    public function init()
    {
 		$this->setName('login');
		$this->setMethod('post');
        $this->setAction(Zend_Controller_Front::getInstance()->getBaseUrl().'/authentication/login');
        
 		// Se crea el elemento texto del formulario con nombre username y se define que no puede tener un valor vacio 
        $username=new Zend_Form_Element_Text('username');
		$username->setAttrib('class', 'input-medio');
        $username->setLabel('Nombre de usuario:')
        ->setRequired(true);
		$this->addElement($username);
        
        // Se crea elemento password del folmulario con nombre password y se define que no puede tener un valor vacio
        $password=new Zend_Form_Element_Password('password');
		$password->setAttrib('class', 'input-medio');
        $password->setLabel('Contraseña:')
        ->setRequired(true);
		$this->addElement($password);
		
        $this->setElementDecorators(array('Label', 'ViewHelper', array('HtmlTag', array( 'class' => ''))));		
        // Se crea el boton submit con nombre login
        $login=new Zend_Form_Element_Submit('login');
		$login->setAttrib('class', 'btn btn-primary');
        $login->setLabel('Login');
		$login->addDecorators(array('ViewHelper', array('HtmlTag', array( 'class' => ''))));
		$this->addElement($login);

        // Se crea el boton recordar contraseña
        $recovery = new Zend_Form_Element_Button('recovery');
        $recovery->setLabel('¿No recuerda su contraseña?');
        $recovery->setAttrib('class', 'btn btn-link');
        $recovery->setAttrib('onclick','window.location =\''.$this->getView()->url(array('controller'=>'authentication','action'=>'recovery')).'\' ');
        $this->addElement($recovery);

    }
}
