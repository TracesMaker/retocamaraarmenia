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
        $descripciondesolucion->setLabel('* Para iniciar, describa la solución innovadora que propones');    
        $descripciondesolucion->setDescription('(En máximo 400 palabras, cuenta de manera sencilla cómo funciona la solución que propones y cómo es que es tu solución cumple con el  resultado esperado) ');    
		$descripciondesolucion->setRequired(true);
		$descripciondesolucion->setAttrib('class', ' form-control required ');
 		$this->addElement($descripciondesolucion);

		// $diagramasolucion = new Zend_Form_Element_File('diagramasolucion');
  //       $diagramasolucion->setLabel('Anexe un dibujo que explique cómo funciona su solución. Dentro de este, por favor, señale sus principales componentes y la conexión entre estos. Puedes dibujar: equipos a desarrollar, procedimientos a realizar, personas involucradas o todo lo que exprese concretamente todo lo que exprese la solución.:');
		// $diagramasolucion->setDestination(APPLICATION_PATH.'/../Files/temp/solucionadoresdiagramasolucion');
		// $diagramasolucion->setAttrib('class', ' form-control');
 	// 	$this->addElement($diagramasolucion);

		$porquelasolucion = new Zend_Form_Element_Textarea('porquelasolucion');
		$porquelasolucion->setAttrib('rows', 5);
		$porquelasolucion->setAttrib('cols', 2);
		$porquelasolucion->setDescription('(Explica en máximo 400 palabras');
        $porquelasolucion->setLabel('¿Por qué la solución que propone, quizás de muchas posibles, es mejor alternativa para atender la necesidad insatisfecha?:');
		$porquelasolucion->setAttrib('class', ' form-control');
 		$this->addElement($porquelasolucion);

 		$inspiracion = new Zend_Form_Element_Textarea('inspiracion');
		$inspiracion->setAttrib('rows', 5);
		$inspiracion->setAttrib('cols', 2);
        $inspiracion->setLabel('Por favor, señala la fuente de inspiración de la solución que sugieres en esta propuesta');
		$inspiracion->setAttrib('class', ' form-control');
 		$this->addElement($inspiracion);

 		$requisitosusuario = new Zend_Form_Element_Textarea('requisitosusuario');
		$requisitosusuario->setAttrib('rows', 5);
		$requisitosusuario->setAttrib('cols', 2);
        $requisitosusuario->setLabel('Qué tipo de requerimientos, por parte de los empresarios (usuarios del servicio), necesitaría tu solución');
        $requisitosusuario->setDescription('(En máximo 400 palabra  ,indique si los requerimientos de, tiempo, personal, recursos y demás que se necesitarán por parte del empresario para la prestación del servicio. )');
		$requisitosusuario->setAttrib('class', ' form-control');
 		$this->addElement($requisitosusuario);

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
