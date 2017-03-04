<?php
	class EasyBib_Helper_Steps  extends Zend_Controller_Action_Helper_Abstract{
		public function __construct(){
			$this->step = 0;
			$this->modelos_id = 0;
		}

		public function setStep($var){
			$this->step = $var;
		}
		public function setModelos($var){
			$this->modelos_id = $var;
		}

		public function getStepvar(){
			$actual_step = $this->step;
			$step_conten = array(
				array(
						'label' => 'Cree su proyecto',
						'title' => '',
						'content' => ''
						),
				array(
						'label' => 'Creale modulos',
						'title' => 'Módulo',
						'content' => 'Es el conjunto de entidades que funcionan de manera autonoma y se relacionan entre si, para brindar funcionalidades con un objetivo en común.'
						),
				array(
						'label' => 'Agregale entidades',
						'title' => 'Entidad',
						'content' => 'Se trata de un objeto del que se recoge información de interés de cara a la base de datos.'
						),
				array(
						'label' => 'Asignale atributos',
						'title' => 'Atributos',
						'content' => 'Se define como cada una de las atributos de una entidad. Ej.Nombre'
						),
				array(
						'label' => 'Agrega el menú',
						'title' => 'Menús',
						'content' => 'Define los menús generales que hay en tu proyecto'
						),
				array(
						'label' => 'Genere ',
						'title' => 'Resultados',
						'content' => 'Genera tu aplicacion 100% funcional, totalmente online, a un menor tiempo y bajos costos.'
						),
			);
			$html = '<div class="fuelux"><div class="wizard"><ul class="steps">';
						foreach ($step_conten as $key => $step) {
								$active = $actual_step >=$key ? "complete" : "";
								$html .= '<li data-target="#<?php echo $key; ?>"';
								if (empty($title)) {
									$html .= ' data-original-title="' . $step['title'] . '" ';
									$html .= ' data-content="' . $step['content'] . '" ';
									$html .= ' class="isToolTip '.$active.'" ';
									$html .= ' data-placement="bottom" rel="popover" ';
								}else{
									$html .= ' class="'.$active.'" ';
								}
								$html .= '><span class="badge-number badge-info">'.($key+1).'</span>';
								$html .= $step['label'];
								$html .= ($key == 5 && $actual_step == 1) ? 
								'<div class="btn-group">
									<button  id="validar" class="btn btn-success" rel="#">Generar</button>
									<a data-original-title="Ten en cuenta" rel="popover" data-placement="bottom" data-content="Ahora puede ver el proyecto generado dando click aquí. Si realiza cambios en el modelo debe volver a generar para ver los nuevos cambios." href="http://proyectos.easydev.co/'.$this->modelos_id.'" class="btn btn-info" target="_blank" id="link_proyect">Ver</a>
									<button class="btn loaddownload" rel="'.$this->modelos_id.'" title="Descargar código"><i class="icon-download"></i></button>
								</div>' : '';
								$html .= '<span class="chevron"></span></li>';
							
							}
			$html .= '</ul></div></div>';
			return $html;
		}

	}
	
	
		
?>


<!-- <div class="fuelux">
	<div class="wizard">
		<ul class="steps">
			<li class="active" data-target="#step1"><span class="badge-number badge-info">1</span>Crea tu proyecto<span class="chevron"></span></li>
			<li data-target="#step2" data-original-title="Módulo" data-content="Es el conjunto de entidades que funcionan de manera autonoma y se relacionan entre si, para brindar funcionalidades con un objetivo en común." data-placement="top" rel="popover" class="isToolTip"><span class="badge-number badge-info">2</span>Crea los modulos<span class="chevron"></span></li>
			<li data-target="#step3" data-original-title="Entidad" data-content="Se trata de un objeto del que se recoge información de interés de cara a la base de datos." data-placement="top" rel="popover" class="isToolTip"><span class="badge-number badge-info">3</span>Crea las entidades<span class="chevron"></span></li>
			<li data-target="#step4" data-original-title="Entidad" data-content="Se define como cada una de las propiedades de una entidad. Ej.Nombre" data-placement="top" rel="popover" class="isToolTip"><span class="badge-number badge-info">4</span>Asignale atributos<span class="chevron"></span></li>
			<li data-target="#step5" data-original-title="Menús" data-content="Define los menús generales que hay en tu proyecto" data-placement="top" rel="popover" class="isToolTip"><span class="badge-number badge-info">5</span>Crea los menus<span class="chevron"></span></li>
			<li data-target="#step5" data-original-title="Resultados" data-content="Genera tu aplicacion 100% funcional, totalmente online, a un menor tiempo y bajos costos." data-placement="top" rel="popover" class="isToolTip"><span class="badge-number badge-info">6</span>Genera tu aplicación<span class="chevron"></span></li>
		</ul>
	</div>
</div> -->