<?php
class Reto_Form_Solucionadoressolucionysupertinencia extends EasyBib_Form
{
	public function init()
	{
		$AgrupacionDB = Model_AgrupacionMapper::getInstance();
		$this->setName('solucionysupertinenciaform');
		$this->setAttrib('class','form-horizontal');
		 
		$solucionadores_id = new Zend_Form_Element_Hidden('solucionadores_id');
		$solucionadores_id->addFilter('Int');
		$this->addElement($solucionadores_id);

		$descripciondesolucion = new Zend_Form_Element_Textarea('descripciondesolucion');
		$descripciondesolucion->setAttrib('rows', 5);
		$descripciondesolucion->setAttrib('cols', 2);
        $descripciondesolucion->setLabel('* Para iniciar, describa la solución innovadora desde la tecnología:');    
		$descripciondesolucion->setRequired(true);
		$descripciondesolucion->setAttrib('class', ' form-control required ');
 		$this->addElement($descripciondesolucion);

		$diagramasolucion = new Zend_Form_Element_File('diagramasolucion');
        $diagramasolucion->setLabel('Anexe un dibujo que explique cómo funciona su solución. Dentro de este, por favor, señale sus principales componentes y la conexión entre estos. Puedes dibujar: equipos a desarrollar, procedimientos a realizar, personas involucradas o todo lo que exprese concretamente todo lo que exprese la solución.:');
		$diagramasolucion->setDestination(APPLICATION_PATH.'/../Files/temp/solucionadoresdiagramasolucion');
		$diagramasolucion->setAttrib('class', ' form-control');
 		$this->addElement($diagramasolucion);

		$porquelasolucion = new Zend_Form_Element_Textarea('porquelasolucion');
		$porquelasolucion->setAttrib('rows', 5);
		$porquelasolucion->setAttrib('cols', 2);
        $porquelasolucion->setLabel('¿Por qué la solución que propone, quizás de muchas posibles, es mejor alternativa para atender la necesidad insatisfecha?:');
		$porquelasolucion->setAttrib('class', ' form-control');
 		$this->addElement($porquelasolucion);

 		$inspiracion = new Zend_Form_Element_Textarea('inspiracion');
		$inspiracion->setAttrib('rows', 5);
		$inspiracion->setAttrib('cols', 2);
        $inspiracion->setLabel('Por favor, señala la fuente de inspiración de la solución que sugieres en esta propuesta');
		$inspiracion->setAttrib('class', ' form-control');
 		$this->addElement($inspiracion);

		// $cancel = new Zend_Form_Element_Button('cancelsolucionadores');
		// $cancel->setLabel('Cancelar');
		// $cancel->setAttrib('class', 'btn closeform');
		// $this->addElement($cancel);

		$submit = new Zend_Form_Element_Button('submitsolucionadores');	
		$submit->setLabel( 'Guardar');
		$submit->setAttrib('class', 'btn btn-primary saveform pull-right');
		$submit->setAttrib('onclick', 'clicksaveformsolucion();');
		$this->addElement($submit);

	}
	
	public function _populateHidden($data)
	{
		return $data;
	}
	


	
	public function cleanForm()
	{
	}
}
