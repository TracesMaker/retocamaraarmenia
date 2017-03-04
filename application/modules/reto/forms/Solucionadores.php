<?php
class Reto_Form_Solucionadores extends EasyBib_Form
{
	public function init()
	{
		$AgrupacionDB = Model_AgrupacionMapper::getInstance();
		$this->setName('solucionadoresform');
		$this->setAttrib('class','form-horizontal');
 
		$solucionadores_id = new Zend_Form_Element_Hidden('solucionadores_id');
		$solucionadores_id->addFilter('Int');
		$this->addElement($solucionadores_id);

		$titulo = new Zend_Form_Element_Text('titulo');
        $titulo->setLabel('* Tìtulo de la solución:');    
		$titulo->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$titulo->setRequired(true);
		$titulo->setAttrib('class', '  required ');
 		$this->addElement($titulo);

		$duracionenmeses= new Zend_Form_Element_Text('duracionenmeses');
        $duracionenmeses->setLabel('* Duración del proyecto en meses:');    
		$duracionenmeses->addValidator(new Zend_Validate_Int());
		$duracionenmeses->setRequired(true);
		$duracionenmeses->setAttrib('class', '  number  required ');
 		$this->addElement($duracionenmeses);

		$correoelectronico = new Zend_Form_Element_Text('correoelectronico');
        $correoelectronico->setLabel('Correo electrónico de contacto:');
		$correoelectronico->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$correoelectronico->setAttrib('class', ' ');
 		$this->addElement($correoelectronico);

		$resumenejecutivo = new Zend_Form_Element_Textarea('resumenejecutivo');
		$resumenejecutivo->setAttrib('rows', 5);
		$resumenejecutivo->setAttrib('cols', 2);
        $resumenejecutivo->setLabel('* Resumen ejecutivo de la idea de solución:');    
		$resumenejecutivo->setRequired(true);
		$resumenejecutivo->setAttrib('class', '  required ');
 		$this->addElement($resumenejecutivo);

		$impactodesolucion = new Zend_Form_Element_Textarea('impactodesolucion');
		$impactodesolucion->setAttrib('rows', 5);
		$impactodesolucion->setAttrib('cols', 2);
        $impactodesolucion->setLabel('* Impacto de la solución innovadora:');    
		$impactodesolucion->setRequired(true);
		$impactodesolucion->setAttrib('class', '  required ');
 		$this->addElement($impactodesolucion);

		$nombredelaempresa = new Zend_Form_Element_Text('nombredelaempresa');
        $nombredelaempresa->setLabel('Nombre de la empresa / persona natural:');
		$nombredelaempresa->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$nombredelaempresa->setAttrib('class', ' ');
 		$this->addElement($nombredelaempresa);

		$nit = new Zend_Form_Element_Text('nit');
        $nit->setLabel('Nit / C.C.:');
		$nit->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$nit->setAttrib('class', ' ');
 		$this->addElement($nit);

		$telefono = new Zend_Form_Element_Text('telefono');
        $telefono->setLabel('Teléfono:');
		$telefono->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$telefono->setAttrib('class', ' ');
 		$this->addElement($telefono);

		$paginaweb = new Zend_Form_Element_Text('paginaweb');
        $paginaweb->setLabel('Página Web:');
		$paginaweb->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$paginaweb->setAttrib('class', ' ');
 		$this->addElement($paginaweb);

		$nombredepersonadecontacto = new Zend_Form_Element_Text('nombredepersonadecontacto');
        $nombredepersonadecontacto->setLabel('Nombre de persona de contacto:');
		$nombredepersonadecontacto->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$nombredepersonadecontacto->setAttrib('class', ' ');
 		$this->addElement($nombredepersonadecontacto);

		$celulardelproponente = new Zend_Form_Element_Text('celulardelproponente');
        $celulardelproponente->setLabel('Número de Celular:');
		$celulardelproponente->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$celulardelproponente->setAttrib('class', ' ');
 		$this->addElement($celulardelproponente);

		$correoelectronicoproponente = new Zend_Form_Element_Text('correoelectronicoproponente');
        $correoelectronicoproponente->setLabel('Correo electrónico:');
		$correoelectronicoproponente->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$correoelectronicoproponente->setAttrib('class', ' ');
 		$this->addElement($correoelectronicoproponente);

		$descripciondesolución = new Zend_Form_Element_Textarea('descripciondesolución');
		$descripciondesolución->setAttrib('rows', 5);
		$descripciondesolución->setAttrib('cols', 2);
        $descripciondesolución->setLabel('* Para iniciar, describa la solución innovadora desde la tecnología:');    
		$descripciondesolución->setRequired(true);
		$descripciondesolución->setAttrib('class', '  required ');
 		$this->addElement($descripciondesolución);

		$diagramasolucion = new Zend_Form_Element_File('diagramasolucion');
        $diagramasolucion->setLabel('Anexe un dibujo que explique cómo funciona su solución. Dentro de este, por favor, señale sus principales componentes y la conexión entre estos. Puedes dibujar: equipos a desarrollar, procedimientos a realizar, personas involucradas o todo lo que exprese concretamente todo lo que exprese la solución.:');
		$diagramasolucion->setDestination(APPLICATION_PATH.'/../Files/temp/solucionadoresdiagramasolucion');
		$diagramasolucion->setAttrib('class', ' ');
 		$this->addElement($diagramasolucion);

		$porquelasolucion = new Zend_Form_Element_Textarea('porquelasolucion');
		$porquelasolucion->setAttrib('rows', 5);
		$porquelasolucion->setAttrib('cols', 2);
        $porquelasolucion->setLabel('¿Por qué la solución que propone, quizás de muchas posibles, es mejor alternativa para atender la necesidad insatisfecha?:');
		$porquelasolucion->setAttrib('class', ' ');
 		$this->addElement($porquelasolucion);

		$inspiracion = new Zend_Form_Element_Textarea('inspiracion');
		$inspiracion->setAttrib('rows', 5);
		$inspiracion->setAttrib('cols', 2);
        $inspiracion->setLabel('Por favor, señale la fuente de la inspiración de la solución que sugieres en esta propuesta:');
		$inspiracion->setAttrib('class', ' ');
 		$this->addElement($inspiracion);

		$personal = new Zend_Form_Element_Text('personal');
        $personal->setLabel('Personal:');
		$personal->addValidator(new Zend_Validate_Float(array('locale' => 'en')));
		$personal->setAttrib('class', '  number ');
 		$this->addElement($personal);

		$serviciotécnico = new Zend_Form_Element_Text('serviciotécnico');
        $serviciotécnico->setLabel('Servicio técnico:');
		$serviciotécnico->addValidator(new Zend_Validate_Float(array('locale' => 'en')));
		$serviciotécnico->setAttrib('class', '  number ');
 		$this->addElement($serviciotécnico);

		$equipos = new Zend_Form_Element_Text('equipos');
        $equipos->setLabel('Equipos:');
		$equipos->addValidator(new Zend_Validate_Float(array('locale' => 'en')));
		$equipos->setAttrib('class', '  number ');
 		$this->addElement($equipos);

		$software = new Zend_Form_Element_Text('software');
        $software->setLabel('Software:');
		$software->addValidator(new Zend_Validate_Float(array('locale' => 'en')));
		$software->setAttrib('class', '  number ');
 		$this->addElement($software);

		$materialeseinsumos = new Zend_Form_Element_Text('materialeseinsumos');
        $materialeseinsumos->setLabel('Materiales e insumos:');
		$materialeseinsumos->addValidator(new Zend_Validate_Float(array('locale' => 'en')));
		$materialeseinsumos->setAttrib('class', '  number ');
 		$this->addElement($materialeseinsumos);

		$viajes = new Zend_Form_Element_Text('viajes');
        $viajes->setLabel('Viajes:');
		$viajes->addValidator(new Zend_Validate_Float(array('locale' => 'en')));
		$viajes->setAttrib('class', '  number ');
 		$this->addElement($viajes);

		$otrosrubros = new Zend_Form_Element_Text('otrosrubros');
        $otrosrubros->setLabel('Otros rubros necesarios para el desarrollo de la solución:');
		$otrosrubros->addValidator(new Zend_Validate_Float(array('locale' => 'en')));
		$otrosrubros->setAttrib('class', '  number ');
 		$this->addElement($otrosrubros);

		$descripciontrayectoria = new Zend_Form_Element_Textarea('descripciontrayectoria');
		$descripciontrayectoria->setAttrib('rows', 5);
		$descripciontrayectoria->setAttrib('cols', 2);
        $descripciontrayectoria->setLabel('Por favor, señale su trayectoria para presentarse en esta propuesta:');
		$descripciontrayectoria->setAttrib('class', ' ');
 		$this->addElement($descripciontrayectoria);

			$propiedadintelectual = new Zend_Form_Element_Select('propiedadintelectual');
	        $propiedadintelectual->setLabel('La solución tecnologica presentada, como solución al reto, está protegida actualmente, por algún tipo de propiedad intelectual?:');
			$propiedadintelectual->addMultiOption("0", "No");
			$propiedadintelectual->addMultiOption("1", "Sí");
		$propiedadintelectual->setAttrib('class', ' ');
 		$this->addElement($propiedadintelectual);

		$descripcionpropiedadintelecual = new Zend_Form_Element_Textarea('descripcionpropiedadintelecual');
		$descripcionpropiedadintelecual->setAttrib('rows', 5);
		$descripcionpropiedadintelecual->setAttrib('cols', 2);
        $descripcionpropiedadintelecual->setLabel('Si la respuesta es afirmativa, por favor describa brevemente.:');
		$descripcionpropiedadintelecual->setAttrib('class', ' ');
 		$this->addElement($descripcionpropiedadintelecual);

			$politicapropiedadintelectual = new Zend_Form_Element_Select('politicapropiedadintelectual');
	        $politicapropiedadintelectual->setLabel('¿Tiene una politica de propiedad intelectual?:');
			$politicapropiedadintelectual->addMultiOption("0", "No");
			$politicapropiedadintelectual->addMultiOption("1", "Sí");
		$politicapropiedadintelectual->setAttrib('class', ' ');
 		$this->addElement($politicapropiedadintelectual);

		$descripcionpoliticapropiedadintelecual = new Zend_Form_Element_Textarea('descripcionpoliticapropiedadintelecual');
		$descripcionpoliticapropiedadintelecual->setAttrib('rows', 5);
		$descripcionpoliticapropiedadintelecual->setAttrib('cols', 2);
        $descripcionpoliticapropiedadintelecual->setLabel('Si la respuesta es afirmativa, por favor describa brevemente.:');
		$descripcionpoliticapropiedadintelecual->setAttrib('class', ' ');
 		$this->addElement($descripcionpoliticapropiedadintelecual);

			$autenticidad = new Zend_Form_Element_Select('autenticidad');
	        $autenticidad->setLabel('¿Esta propuesta y su contenido es de tu propiedad?:');
			$autenticidad->addMultiOption("0", "No");
			$autenticidad->addMultiOption("1", "Sí");
		$autenticidad->setAttrib('class', ' ');
 		$this->addElement($autenticidad);

		$descripcionautorpropiedad = new Zend_Form_Element_Textarea('descripcionautorpropiedad');
		$descripcionautorpropiedad->setAttrib('rows', 5);
		$descripcionautorpropiedad->setAttrib('cols', 2);
        $descripcionautorpropiedad->setLabel('Si la respuesta es negativa, por favor define de quien es la propiedad:');
		$descripcionautorpropiedad->setAttrib('class', ' ');
 		$this->addElement($descripcionautorpropiedad);

		$cuando = new Zend_Form_Element_Text('cuando');
        $cuando->setLabel('¿Cuando?:');
		$cuando->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$cuando->setAttrib('class', ' ');
 		$this->addElement($cuando);

		$conquien = new Zend_Form_Element_Text('conquien');
        $conquien->setLabel('¿Con quien?:');
		$conquien->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$conquien->setAttrib('class', ' ');
 		$this->addElement($conquien);

			$presentacionpublica = new Zend_Form_Element_Select('presentacionpublica');
	        $presentacionpublica->setLabel('¿se ha hecho presentación publica de esta solución?:');
			$presentacionpublica->addMultiOption("0", "No");
			$presentacionpublica->addMultiOption("1", "Sí");
		$presentacionpublica->setAttrib('class', ' ');
 		$this->addElement($presentacionpublica);

			$acuerdoconfidencialidadconautor = new Zend_Form_Element_Select('acuerdoconfidencialidadconautor');
	        $acuerdoconfidencialidadconautor->setLabel('¿se hizo algún acuerdo de confidencialidad con esta persona?:');
			$acuerdoconfidencialidadconautor->addMultiOption("0", "No");
			$acuerdoconfidencialidadconautor->addMultiOption("1", "Sí");
		$acuerdoconfidencialidadconautor->setAttrib('class', ' ');
 		$this->addElement($acuerdoconfidencialidadconautor);

		$reto = new Zend_Form_Element_Select('reto');
        $reto->setLabel('Reto:');
		$RetoDB = Reto_Model_RetoMapper::getInstance();
		$ArrayOption=$RetoDB->getArrayOption($reto);
		$reto->setMultiOptions($ArrayOption);
 		$reto->setAttrib('class', '   ');
 		$reto->addFilter('null');
 		$this->addElement($reto);

		$estadodemadurez = new Zend_Form_Element_Select('estadodemadurez');
        $estadodemadurez->setLabel('Estado de madurez:');
		$EstadosdemadurezDB = Reto_Model_EstadosdemadurezMapper::getInstance();
		$ArrayOption=$EstadosdemadurezDB->getArrayOption($estadodemadurez);
		$estadodemadurez->setMultiOptions($ArrayOption);
 		$estadodemadurez->setAttrib('class', '   ');
 		$estadodemadurez->addFilter('null');
 		$this->addElement($estadodemadurez);

		$requisitosusuario = new Zend_Form_Element_Text('requisitosusuario');
        $requisitosusuario->setLabel('Qué tipo de requerimientos, por parte de los empresarios (usuarios del servicio), necesita la solución:');
		$requisitosusuario->addValidator(new Zend_Validate_StringLength(array('max' => 256)));
		$requisitosusuario->setAttrib('class', ' ');
 		$this->addElement($requisitosusuario);
		$cancel = new Zend_Form_Element_Button('cancelsolucionadores');
		$cancel->setLabel('Cancelar');
		$cancel->setAttrib('class', 'btn closeform');
		$this->addElement($cancel);
		$submit = new Zend_Form_Element_Submit('submitsolucionadores');		
		$submit->setLabel( 'Guardar');
		$submit->setAttrib('class', 'btn btn-primary saveform');
		$this->addElement($submit);
		


		$this->addDisplayGroup(array("submitsolucionadores", "cancelsolucionadores"), 'submitsolucionadoresgroup');
        // set decorators
        EasyBib_Form_Decorator::setFormDecorator($this, EasyBib_Form_Decorator::BOOTSTRAP, 'submitsolucionadores', 'cancelsolucionadores');
	}
	
	public function _populateHidden($data)
	{
		return $data;
	}
	

}
