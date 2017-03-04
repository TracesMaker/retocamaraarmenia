<?php
class Form_Aclpermisos extends EasyBib_Form
{
	public function init()
	{
		$AgrupacionDB = Model_AgrupacionMapper::getInstance();
		$this->setName('aclpermisosform');
		$this->setAttrib('class','form-horizontal');
 
		$aclpermisos_id = new Zend_Form_Element_Hidden('aclpermisos_id');
		$aclpermisos_id->addFilter('Int');
		$this->addElement($aclpermisos_id);

			$perpermiso = new Zend_Form_Element_Checkbox('perpermiso');
	        $perpermiso->setLabel('* Permiso:');    
		$perpermiso->setRequired(true);
		$perpermiso->setAttrib('class', '  required ');
 		$this->addElement($perpermiso);

		$perrol = new Zend_Form_Element_Select('perrol');
        $perrol->setLabel('* Rol:');    
		$AclrolesDB = Model_AclrolesMapper::getInstance();
		$ArrayOption=$AclrolesDB->getArrayOption($perrol);
		$perrol->setMultiOptions($ArrayOption);
		$perrol->setRequired(true);
 		$perrol->setAttrib('class', '    required ');
 		$perrol->addFilter('null');
 		$this->addElement($perrol);

		$peraccion = new Zend_Form_Element_Select('peraccion');
        $peraccion->setLabel('* Accion:');    
		$AclaccionesDB = Model_AclaccionesMapper::getInstance();
		$ArrayOption=$AclaccionesDB->getArrayOption($peraccion);
		$peraccion->setMultiOptions($ArrayOption);
		$peraccion->setRequired(true);
 		$peraccion->setAttrib('class', '    required ');
 		$peraccion->addFilter('null');
 		$this->addElement($peraccion);
		$cancel = new Zend_Form_Element_Button('cancelaclpermisos');
		$cancel->setLabel('Cancelar');
		$cancel->setAttrib('class', 'btn closeform');
		$this->addElement($cancel);
		
        $SaveAndNew = new Zend_Form_Element_Button('saveandnewaclpermisos');
        $SaveAndNew->setLabel( 'Guardar y nuevo');
        $SaveAndNew->setAttrib('class', 'btn btn-success saveandnew hidden-phone');
        $this->addElement($SaveAndNew);
		
		$submit = new Zend_Form_Element_Button('submitaclpermisos');
		$submit->setLabel( 'Guardar');
		$submit->setAttrib('class', 'btn btn-primary saveform');
		$this->addElement($submit);
		

        $this->addDisplayGroup(array("submitaclpermisos", "saveandnewaclpermisos", "cancelaclpermisos"), 'submitaclpermisosgroup');
        // set decorators
        EasyBib_Form_Decorator::setFormDecorator($this, EasyBib_Form_Decorator::BOOTSTRAP, 'submitaclpermisos', 'cancelaclpermisos', 'saveandnewaclpermisos');
	}
	
	public function _populateHidden($data)
	{
		return $data;
	}
	

}
