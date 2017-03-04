
CREATE TABLE ve_aclroles(
	aclroles_id bigint not null auto_increment,
	rolnombre Varchar (256) ,
	rolpadre bigint DEFAULT NULL,
	PRIMARY KEY(aclroles_id )
)ENGINE=InnoDB AUTO_INCREMENT=0;
CREATE TABLE ve_aclacciones(
	aclacciones_id bigint not null auto_increment,
	accrecurso Varchar (256) ,
	accaccion Varchar (256) ,
	PRIMARY KEY(aclacciones_id )
)ENGINE=InnoDB AUTO_INCREMENT=0;
CREATE TABLE ve_aclpermisos(
	aclpermisos_id bigint not null auto_increment,
	perpermiso boolean default false,
	perrol bigint DEFAULT NULL,
	peraccion bigint DEFAULT NULL,
	PRIMARY KEY(aclpermisos_id )
)ENGINE=InnoDB AUTO_INCREMENT=0;
CREATE TABLE ve_aclusuarios(
	aclusuarios_id bigint not null auto_increment,
	nombre Varchar (256) ,
	cargo Varchar (256) ,
	username Varchar (25)  UNIQUE ,
	password Varchar (50) ,
	activo boolean default false,
	email Varchar (256) ,
	manejodedatos boolean default false,
	divulgacionpostulacion boolean default false,
	role bigint DEFAULT NULL,
	PRIMARY KEY(aclusuarios_id )
)ENGINE=InnoDB AUTO_INCREMENT=0;
CREATE TABLE ve_aclusuariosonline(
	aclusuariosonline_id bigint not null auto_increment,
	ultimoacceso datetime  ,
	tiempo int  ,
	ip Varchar (256) ,
	usuario_id bigint DEFAULT NULL,
	PRIMARY KEY(aclusuariosonline_id )
)ENGINE=InnoDB AUTO_INCREMENT=0;
CREATE TABLE ve_tipoagrupacion(
	tipoagrupacion_id bigint not null auto_increment,
	tanombre Varchar (256) ,
	PRIMARY KEY(tipoagrupacion_id )
)ENGINE=InnoDB AUTO_INCREMENT=0;
CREATE TABLE ve_agrupacion(
	agrupacion_id bigint not null auto_increment,
	aabreviatura Varchar (256) ,
	alabel Varchar (256) ,
	atipoagrupacion bigint DEFAULT NULL,
	PRIMARY KEY(agrupacion_id )
)ENGINE=InnoDB AUTO_INCREMENT=0;
CREATE TABLE ve_aclhistorialusuarios(
	aclhistorialusuarios_id bigint not null auto_increment,
	aclhfecha datetime  ,
	aclhip Varchar (256) ,
	aclhusuario bigint DEFAULT NULL,
	PRIMARY KEY(aclhistorialusuarios_id )
)ENGINE=InnoDB AUTO_INCREMENT=0;
CREATE TABLE ve_solucionadores(
	solucionadores_id bigint not null auto_increment,
	titulo Varchar (256) ,
	duracionenmeses int  ,
	correoelectronico Varchar (256) ,
	resumenejecutivo text ,
	impactodesolucion text ,
	nombredelaempresa Varchar (256) ,
	nit Varchar (256) ,
	telefono Varchar (256) ,
	paginaweb Varchar (256) ,
	nombredepersonadecontacto Varchar (256) ,
	celulardelproponente Varchar (256) ,
	correoelectronicoproponente Varchar (256) ,
	descripciondesolución text ,
	diagramasolucion longtext ,
	porquelasolucion text ,
	inspiracion text ,
	personal double  ,
	serviciotécnico double  ,
	equipos double  ,
	software double  ,
	materialeseinsumos double  ,
	viajes double  ,
	otrosrubros double  ,
	descripciontrayectoria text ,
	propiedadintelectual boolean default false,
	descripcionpropiedadintelecual text ,
	politicapropiedadintelectual boolean default false,
	descripcionpoliticapropiedadintelecual text ,
	autenticidad boolean default false,
	descripcionautorpropiedad text ,
	cuando Varchar (256) ,
	conquien Varchar (256) ,
	presentacionpublica boolean default false,
	acuerdoconfidencialidadconautor boolean default false,
	usuario bigint DEFAULT NULL,
	PRIMARY KEY(solucionadores_id )
)ENGINE=InnoDB AUTO_INCREMENT=0;
CREATE TABLE ve_tiposdeorganizaciones(
	tiposdeorganizaciones_id bigint not null auto_increment,
	nombre Varchar (256) ,
	PRIMARY KEY(tiposdeorganizaciones_id )
)ENGINE=InnoDB AUTO_INCREMENT=0;
CREATE TABLE ve_reto(
	reto_id bigint not null auto_increment,
	titulo Varchar (256) ,
	descripcioncorta text ,
	descripcioncompleta text ,
	urlvideo Varchar (256) ,
	imagen longtext ,
	fechainicio date  ,
	fechafin date  ,
	estado bigint DEFAULT NULL,
	PRIMARY KEY(reto_id )
)ENGINE=InnoDB AUTO_INCREMENT=0;
CREATE TABLE ve_caracteristicasprincipalessolucion(
	caracteristicasprincipalessolucion_id bigint not null auto_increment,
	atributo text ,
	descripcionatributo text ,
	diferenciador boolean default false,
	ventajas text ,
	solucionador bigint DEFAULT NULL,
	PRIMARY KEY(caracteristicasprincipalessolucion_id )
)ENGINE=InnoDB AUTO_INCREMENT=0;
CREATE TABLE ve_elementostangibles(
	elementostangibles_id bigint not null auto_increment,
	elementofisico text ,
	descripcion text ,
	funcionenlasolucion text ,
	solucionador bigint DEFAULT NULL,
	PRIMARY KEY(elementostangibles_id )
)ENGINE=InnoDB AUTO_INCREMENT=0;
CREATE TABLE ve_indicadores(
	indicadores_id bigint not null auto_increment,
	indicador Varchar (256) ,
	descripcion text ,
	solucionador bigint DEFAULT NULL,
	PRIMARY KEY(indicadores_id )
)ENGINE=InnoDB AUTO_INCREMENT=0;
CREATE TABLE ve_actividadesfundamentales(
	actividadesfundamentales_id bigint not null auto_increment,
	actividades text ,
	resultadoactividad text ,
	tiempoactividad double  ,
	solucionador bigint DEFAULT NULL,
	PRIMARY KEY(actividadesfundamentales_id )
)ENGINE=InnoDB AUTO_INCREMENT=0;
CREATE TABLE ve_riesgos(
	riesgos_id bigint not null auto_increment,
	riesgo text ,
	descripcion text ,
	impacto text ,
	probabilidad text ,
	solucionador bigint DEFAULT NULL,
	PRIMARY KEY(riesgos_id )
)ENGINE=InnoDB AUTO_INCREMENT=0;
CREATE TABLE ve_caracteristicasprincipalesimplementacion(
	caracteristicasprincipalesimplementacion_id bigint not null auto_increment,
	estadodeldesarrollo text ,
	gradodeldesarrollo text ,
	aspectospendientes text ,
	atributobasico bigint DEFAULT NULL,
	solucionador bigint DEFAULT NULL,
	PRIMARY KEY(caracteristicasprincipalesimplementacion_id )
)ENGINE=InnoDB AUTO_INCREMENT=0;
CREATE TABLE ve_estadosdemadurez(
	estadosdemadurez_id bigint not null auto_increment,
	nombre Varchar (256) ,
	PRIMARY KEY(estadosdemadurez_id )
)ENGINE=InnoDB AUTO_INCREMENT=0;
CREATE TABLE ve_otrosdesarrollos(
	otrosdesarrollos_id bigint not null auto_increment,
	desarrollocomplementario text ,
	porque text ,
	solucionador bigint DEFAULT NULL,
	PRIMARY KEY(otrosdesarrollos_id )
)ENGINE=InnoDB AUTO_INCREMENT=0;
CREATE TABLE ve_riesgostecnicos(
	riesgostecnicos_id bigint not null auto_increment,
	nombredelriesgo Varchar (256) ,
	descripcion text ,
	probabilidad text ,
	impacto text ,
	prevencion text ,
	solucionador bigint DEFAULT NULL,
	PRIMARY KEY(riesgostecnicos_id )
)ENGINE=InnoDB AUTO_INCREMENT=0;
CREATE TABLE ve_beneficiosesperados(
	beneficiosesperados_id bigint not null auto_increment,
	describasuexpectativa double  ,
	solucionador bigint DEFAULT NULL,
	expectativa bigint DEFAULT NULL,
	nivelimportancia bigint DEFAULT NULL,
	PRIMARY KEY(beneficiosesperados_id )
)ENGINE=InnoDB AUTO_INCREMENT=0;
CREATE TABLE ve_solucionessimilares(
	solucionessimilares_id bigint not null auto_increment,
	soluciondesarrollada Varchar (256) ,
	anodesarrollo Varchar (256) ,
	quienladesarrollo Varchar (256) ,
	resultadosobtenidos Varchar (256) ,
	dificultadespresentadas Varchar (256) ,
	solucionador bigint DEFAULT NULL,
	PRIMARY KEY(solucionessimilares_id )
)ENGINE=InnoDB AUTO_INCREMENT=0;
CREATE TABLE ve_estadosdelreto(
	estadosdelreto_id bigint not null auto_increment,
	nombre Varchar (256) ,
	PRIMARY KEY(estadosdelreto_id )
)ENGINE=InnoDB AUTO_INCREMENT=0;
CREATE TABLE ve_resuladosconcretos(
	resuladosconcretos_id bigint not null auto_increment,
	resultado Varchar (256) ,
	descripcion text ,
	fuentedeverificacion text ,
	solucionador bigint DEFAULT NULL,
	PRIMARY KEY(resuladosconcretos_id )
)ENGINE=InnoDB AUTO_INCREMENT=0;
CREATE TABLE ve_experienciacomosolucionador(
	experienciacomosolucionador_id bigint not null auto_increment,
	equipodetrabajo Varchar (256) ,
	formacion Varchar (256) ,
	experienciageneral Varchar (256) ,
	experienciaespecifica Varchar (256) ,
	conocimientosespecificos Varchar (256) ,
	relaciondirectaconlasolucionpropuesta Varchar (256) ,
	solucionador bigint DEFAULT NULL,
	PRIMARY KEY(experienciacomosolucionador_id )
)ENGINE=InnoDB AUTO_INCREMENT=0;



ALTER TABLE ve_aclroles
ADD CONSTRAINT rolpadre0 
FOREIGN KEY (rolpadre) 
REFERENCES ve_aclroles (aclroles_id)
ON DELETE RESTRICT ;

ALTER TABLE ve_aclpermisos
ADD CONSTRAINT perrol1 
FOREIGN KEY (perrol) 
REFERENCES ve_aclroles (aclroles_id)
ON DELETE RESTRICT ;

ALTER TABLE ve_aclpermisos
ADD CONSTRAINT peraccion2 
FOREIGN KEY (peraccion) 
REFERENCES ve_aclacciones (aclacciones_id)
ON DELETE RESTRICT ;

ALTER TABLE ve_aclusuarios
ADD CONSTRAINT role3 
FOREIGN KEY (role) 
REFERENCES ve_aclroles (aclroles_id)
ON DELETE RESTRICT ;

ALTER TABLE ve_aclusuariosonline
ADD CONSTRAINT usuario_id4 
FOREIGN KEY (usuario_id) 
REFERENCES ve_aclusuarios (aclusuarios_id)
ON DELETE CASCADE ;

ALTER TABLE ve_agrupacion
ADD CONSTRAINT atipoagrupacion5 
FOREIGN KEY (atipoagrupacion) 
REFERENCES ve_tipoagrupacion (tipoagrupacion_id)
ON DELETE RESTRICT ;

ALTER TABLE ve_aclhistorialusuarios
ADD CONSTRAINT aclhusuario6 
FOREIGN KEY (aclhusuario) 
REFERENCES ve_aclusuarios (aclusuarios_id)
ON DELETE RESTRICT ;

ALTER TABLE ve_solucionadores
ADD CONSTRAINT usuario7 
FOREIGN KEY (usuario) 
REFERENCES ve_aclusuarios (aclusuarios_id)
ON DELETE RESTRICT ;

ALTER TABLE ve_reto
ADD CONSTRAINT estado8 
FOREIGN KEY (estado) 
REFERENCES ve_estadosdelreto (estadosdelreto_id)
ON DELETE RESTRICT ;

ALTER TABLE ve_caracteristicasprincipalessolucion
ADD CONSTRAINT solucionador9 
FOREIGN KEY (solucionador) 
REFERENCES ve_solucionadores (solucionadores_id)
ON DELETE RESTRICT ;

ALTER TABLE ve_elementostangibles
ADD CONSTRAINT solucionador10 
FOREIGN KEY (solucionador) 
REFERENCES ve_solucionadores (solucionadores_id)
ON DELETE RESTRICT ;

ALTER TABLE ve_indicadores
ADD CONSTRAINT solucionador11 
FOREIGN KEY (solucionador) 
REFERENCES ve_solucionadores (solucionadores_id)
ON DELETE RESTRICT ;

ALTER TABLE ve_actividadesfundamentales
ADD CONSTRAINT solucionador12 
FOREIGN KEY (solucionador) 
REFERENCES ve_solucionadores (solucionadores_id)
ON DELETE RESTRICT ;

ALTER TABLE ve_riesgos
ADD CONSTRAINT solucionador13 
FOREIGN KEY (solucionador) 
REFERENCES ve_solucionadores (solucionadores_id)
ON DELETE RESTRICT ;

ALTER TABLE ve_caracteristicasprincipalesimplementacion
ADD CONSTRAINT atributobasico14 
FOREIGN KEY (atributobasico) 
REFERENCES ve_caracteristicasprincipalessolucion (caracteristicasprincipalessolucion_id)
ON DELETE RESTRICT ;

ALTER TABLE ve_caracteristicasprincipalesimplementacion
ADD CONSTRAINT solucionador15 
FOREIGN KEY (solucionador) 
REFERENCES ve_solucionadores (solucionadores_id)
ON DELETE RESTRICT ;

ALTER TABLE ve_otrosdesarrollos
ADD CONSTRAINT solucionador16 
FOREIGN KEY (solucionador) 
REFERENCES ve_solucionadores (solucionadores_id)
ON DELETE RESTRICT ;

ALTER TABLE ve_riesgostecnicos
ADD CONSTRAINT solucionador17 
FOREIGN KEY (solucionador) 
REFERENCES ve_solucionadores (solucionadores_id)
ON DELETE RESTRICT ;

ALTER TABLE ve_beneficiosesperados
ADD CONSTRAINT solucionador18 
FOREIGN KEY (solucionador) 
REFERENCES ve_solucionadores (solucionadores_id)
ON DELETE RESTRICT ;

ALTER TABLE ve_solucionessimilares
ADD CONSTRAINT solucionador19 
FOREIGN KEY (solucionador) 
REFERENCES ve_solucionadores (solucionadores_id)
ON DELETE RESTRICT ;

ALTER TABLE ve_resuladosconcretos
ADD CONSTRAINT solucionador20 
FOREIGN KEY (solucionador) 
REFERENCES ve_solucionadores (solucionadores_id)
ON DELETE RESTRICT ;

ALTER TABLE ve_experienciacomosolucionador
ADD CONSTRAINT solucionador21 
FOREIGN KEY (solucionador) 
REFERENCES ve_solucionadores (solucionadores_id)
ON DELETE RESTRICT ;

