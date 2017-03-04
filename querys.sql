CREATE TABLE ve_itemaevaluar(
	itemaevaluar_id bigint not null auto_increment,
	titulo Varchar (256) ,
	tabla Varchar (256) ,
	columna Varchar (256) ,
	evaluable boolean default false,
	orden int  ,
	PRIMARY KEY(itemaevaluar_id )
)ENGINE=InnoDB AUTO_INCREMENT=0;
CREATE TABLE ve_evaluaciones(
	evaluaciones_id bigint not null auto_increment,
	concepto text ,
	valor int  ,
	reto bigint DEFAULT NULL,
	evaluador bigint DEFAULT NULL,
	itemaevaluar bigint DEFAULT NULL,
	solucionador bigint DEFAULT NULL,
	PRIMARY KEY(evaluaciones_id )
)ENGINE=InnoDB AUTO_INCREMENT=0;


INSERT INTO ve_aclacciones(
 accrecurso, accaccion
) VALUES
('reto:itemaevaluar', ''),
('reto:itemaevaluar', 'index'),
('reto:itemaevaluar', 'add'),
('reto:itemaevaluar', 'detail'),
('reto:itemaevaluar', 'edit'),
('reto:itemaevaluar', 'delete');

INSERT INTO ve_aclacciones(
 accrecurso, accaccion
) VALUES
('reto:evaluaciones', ''),
('reto:evaluaciones', 'index'),
('reto:evaluaciones', 'add'),
('reto:evaluaciones', 'detail'),
('reto:evaluaciones', 'edit'),
('reto:evaluaciones', 'delete');


/* accion para listar los solucionadores de un reto */
 ALTER TABLE ve_solucionadores ADD COLUMN 'reto' BIGINT(20) NULL AFTER 'solucionadores_id';
INSERT INTO ve_aclacciones( accrecurso, accaccion ) VALUES ('reto:solucionadores', 'byreto');
INSERT INTO ve_aclacciones( accrecurso, accaccion ) VALUES ('reto:solucionadores', 'evaluar');

/* Campo faltante para asignar el estado de madurez */
ALTER TABLE `ve_solucionadores` ADD COLUMN `estadodemadurez` INT(10) NULL;

/* Scripts para itemsaevaluar */
 INSERT INTO ve_itemaevaluar (titulo, tabla, columna, evaluable, orden )
 VALUES
('Título de la solución', 've_solucionadores', 'titulo', '0', '1'),
('Duración del proyecto en meses', 've_solucionadores', 'duracionenmeses', '0', '2'),
('Correo electrónico de contacto', 've_solucionadores', 'correoelectronico', '0', '3'),
('Resumen ejecutivo de la idea de solución', 've_solucionadores', 'resumenejecutivo', '1', '4'),
('Impacto de la solución innovadora', 've_solucionadores', 'impactodesolucion', '1', '5'),
('Para iniciar, por favor, describe la solución innovadora desde la tecnología que propone', 've_solucionadores', 'descripciondesolución', '1', '6'),
('Anexa un dibujo que explique cómo funciona su solución. Dentro de éste, por favor, señala sus principales componente y la conexión entre estos. Puedes dibujar equipos a desarrollar, procedimientos a realizar, personas involucradas o todo aquello que exprese concretamente como sería la solución', 've_solucionadores', 'diagramasolucion', '1', '7'),
('¿Por qué la solución que propone, quizás de muchas posibles, es la mejor alternativa para atender la necesidad insatisfecha?', 've_solucionadores', 'porquelasolucion', '1', '8'),
('¿Cuáles son las características principales (atributos) de la solución?', 've_caracteristicasprincipalessolucion', NULL, '1', '9'),
('¿cuáles podrían ser elementos tangibles que conformarían la solución final cuando ésta estuviera totalmente implementada?', 've_elementostangibles', NULL, '1', '10'),
('¿Qué indicadores se podrían usar para medir su eficiencia cuando ésta esté funcionando?', 've_indicadores', NULL, '1', '11'),
('señala la fuente de inspiración de la solución que sugieres en esta propuesta', 've_solucionadores', 'inspiracion', '1', '12'),
('¿Qué actividades serían claves ejecutar para ir desde el diseño conceptual que se presenta en esta propuesta hasta una implementación final?', 've_actividadesfundamentales', NULL, '1', '13'),
('¿Qué riesgos técnicos identifica que se pueden presentar para llegar a la implementación de la solución?', 've_riesgos', NULL, '1', '14'),
('¿cuál es el grado de dificultad existente hoy día para alcanzar dicho atributo?', 've_caracteristicasprincipalesimplementacion', NULL, '1', '15'),
('¿cuál es el estado de madurez de la solución?', 'madurezsolucion', NULL, '1', '16'),
('¿Qué otros desarrollos complementarios se deberían realizar en VEOLIA para una óptima implementación de la solución?', 've_otrosdesarrollos', NULL, '1', '17'),
('¿Qué riesgos técnicos o de funcionamiento se podrían presentar cuando la solución esté totalmente implementada?', 've_riesgostecnicos', NULL, '1', '18'),
('planteamiento presupuestal de la propuesta', 'planteamientopresupuestal', NULL, '1', '19'),
('trayectoria para presentarse esta propuesta', 've_solucionadores', 'descripciontrayectoria', '1', '20'),
('¿Qué soluciones similares a la presentada en la propuesta ha desarrollado previamente?', 've_solucionessimilares', NULL, '1', '21'),
('¿La solución tecnológica presentada como propuesta al reto, está protegida actualmente por algún tipo de  propiedad intelectual?', 'esprotegida', NULL, '1', '22'),
('¿Tiene una política de propiedad intelectual?', 'tienepolitica', NULL, '1', '23'),
('¿Esta propuesta y su contenido es de tu propiedad?', 'elautoresproponente', NULL, '1', '24'),
('¿Se ha hablado con alguna otra organización sobre la solución que estás proponiendo, se le ha mostrado a alguien anteriormente o está operando en algún otro lugar?', 'exposiciondelasolucion', NULL, '1', '25');


/* Corrección de datos en tabla para impresión dinámica de evaluación */
UPDATE ve_itemaevaluar SET tabla = 'otratabla' , columna = 've_caracteristicasprincipalessolucion' WHERE tabla = 've_caracteristicasprincipalessolucion';
UPDATE ve_itemaevaluar SET tabla = 'otratabla' , columna = 've_elementostangibles' WHERE tabla = 've_elementostangibles';
UPDATE ve_itemaevaluar SET tabla = 'otratabla' , columna = 've_indicadores' WHERE tabla = 've_indicadores';
UPDATE ve_itemaevaluar SET tabla = 'otratabla' , columna = 've_actividadesfundamentales' WHERE tabla = 've_actividadesfundamentales';
UPDATE ve_itemaevaluar SET tabla = 'otratabla' , columna = 've_riesgos' WHERE tabla = 've_riesgos';
UPDATE ve_itemaevaluar SET tabla = 'otratabla' , columna = 've_caracteristicasprincipalesimplementacion' WHERE tabla = 've_caracteristicasprincipalesimplementacion';
UPDATE ve_itemaevaluar SET tabla = 'otratabla' , columna = 've_otrosdesarrollos' WHERE tabla = 've_otrosdesarrollos';
UPDATE ve_itemaevaluar SET tabla = 'otratabla' , columna = 've_riesgostecnicos' WHERE tabla = 've_riesgostecnicos';
UPDATE ve_itemaevaluar SET tabla = 'otratabla' , columna = 've_solucionessimilares' WHERE tabla = 've_solucionessimilares';
UPDATE ve_itemaevaluar SET tabla = 'vistacustom' , columna = 'madurezsolucion' WHERE tabla = 'madurezsolucion';
UPDATE ve_itemaevaluar SET tabla = 'vistacustom' , columna = 'planteamientopresupuestal' WHERE tabla = 'planteamientopresupuestal';
UPDATE ve_itemaevaluar SET tabla = 'vistacustom' , columna = 'esprotegida' WHERE tabla = 'esprotegida';
UPDATE ve_itemaevaluar SET tabla = 'vistacustom' , columna = 'tienepolitica' WHERE tabla = 'tienepolitica';
UPDATE ve_itemaevaluar SET tabla = 'vistacustom' , columna = 'elautoresproponente' WHERE tabla = 'elautoresproponente';
UPDATE ve_itemaevaluar SET tabla = 'vistacustom' , columna = 'exposiciondelasolucion' WHERE tabla = 'exposiciondelasolucion';

ALTER TABLE `ve_solucionadores` CHANGE `descripciondesolución` `descripciondesolucion` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL , CHANGE `serviciotécnico` `serviciotecnico` DOUBLE NULL ;
UPDATE `ve_itemaevaluar` SET `columna`='descripciondesolucion' WHERE `columna`='descripciondesolución';
UPDATE `ve_itemaevaluar` SET `tabla`='vistacustom',`columna`='diagramasolucion' WHERE `tabla`='ve_solucionadores' and `columna`='diagramasolucion';

/* accion para verificar progreso de formulario */
INSERT INTO ve_aclacciones( accrecurso, accaccion ) VALUES ('reto:solucionadores', 'getprogreso');


 INSERT INTO ve_itemaevaluar (titulo, tabla, columna, evaluable, orden )
 VALUES
('nombredelaempresa', 've_solucionadores', 'nombredelaempresa', '0', '1'),
('nit', 've_solucionadores', 'nit', '0', '1'),
('telefono', 've_solucionadores', 'telefono', '0', '1'),
('paginaweb', 've_solucionadores', 'paginaweb', '0', '1'),
('nombredepersonadecontacto', 've_solucionadores', 'nombredepersonadecontacto', '0', '1'),
('celulardelproponente', 've_solucionadores', 'celulardelproponente', '0', '1'),
('correoelectronicoproponente', 've_solucionadores', 'correoelectronicoproponente', '0', '1');

-- agregar grupos evaluacion y relacion con items a evaluar
CREATE TABLE ve_grupoevaluacion(
	grupoevaluacion_id bigint not null auto_increment,
	nombre Varchar (256) ,
	orden Varchar (256) ,
	peso int  ,
	PRIMARY KEY(grupoevaluacion_id )
)ENGINE=InnoDB AUTO_INCREMENT=0;

ALTER TABLE ve_itemaevaluar ADD COLUMN grupoevaluacion bigint default NULL;

ALTER TABLE ve_itemaevaluar
ADD CONSTRAINT grupoevaluacion24
FOREIGN KEY (grupoevaluacion)
REFERENCES ve_grupoevaluacion (grupoevaluacion_id)
ON DELETE RESTRICT ;

INSERT INTO ve_aclacciones(accrecurso, accaccion) VALUES ('reto:solucionadores', 'reporte');