INSERT INTO ve_aclroles (
aclroles_id, rolnombre
)VALUES (1 , 'Guests');

INSERT INTO ve_aclroles (
aclroles_id, rolnombre
)VALUES (2 , 'Administrator');

INSERT INTO ve_aclusuarios (
aclusuarios_id, username, password, role
) VALUES ( NULL, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2');


INSERT INTO ve_aclacciones(
 accrecurso, accaccion
) VALUES
('default:aclroles', ''), 
('default:aclroles', 'index'),
('default:aclroles', 'add'),
('default:aclroles', 'detail'),
('default:aclroles', 'edit'),
('default:aclroles', 'delete');

INSERT INTO ve_aclacciones(
 accrecurso, accaccion
) VALUES
('default:aclacciones', ''), 
('default:aclacciones', 'index'),
('default:aclacciones', 'add'),
('default:aclacciones', 'detail'),
('default:aclacciones', 'edit'),
('default:aclacciones', 'delete');

INSERT INTO ve_aclacciones(
 accrecurso, accaccion
) VALUES
('default:aclpermisos', ''), 
('default:aclpermisos', 'index'),
('default:aclpermisos', 'add'),
('default:aclpermisos', 'detail'),
('default:aclpermisos', 'edit'),
('default:aclpermisos', 'delete');

INSERT INTO ve_aclacciones(
 accrecurso, accaccion
) VALUES
('default:aclusuarios', ''), 
('default:aclusuarios', 'estado'),
('default:aclusuarios', 'index'),
('default:aclusuarios', 'add'),
('default:aclusuarios', 'detail'),
('default:aclusuarios', 'validateonly'),
('default:aclusuarios', 'edit'),
('default:aclusuarios', 'password'),
('default:aclusuarios', 'delete');

INSERT INTO ve_aclacciones(
 accrecurso, accaccion
) VALUES
('default:aclusuariosonline', ''), 
('default:aclusuariosonline', 'index'),
('default:aclusuariosonline', 'add'),
('default:aclusuariosonline', 'detail'),
('default:aclusuariosonline', 'edit'),
('default:aclusuariosonline', 'delete');

INSERT INTO ve_aclacciones(
 accrecurso, accaccion
) VALUES
('default:tipoagrupacion', ''), 
('default:tipoagrupacion', 'index'),
('default:tipoagrupacion', 'add'),
('default:tipoagrupacion', 'detail'),
('default:tipoagrupacion', 'menulateral'),
('default:tipoagrupacion', 'edit'),
('default:tipoagrupacion', 'delete');

INSERT INTO ve_aclacciones(
 accrecurso, accaccion
) VALUES
('default:agrupacion', ''), 
('default:agrupacion', 'index'),
('default:agrupacion', 'add'),
('default:agrupacion', 'detail'),
('default:agrupacion', 'edit'),
('default:agrupacion', 'delete');

INSERT INTO ve_aclacciones(
 accrecurso, accaccion
) VALUES
('default:aclhistorialusuarios', ''), 
('default:aclhistorialusuarios', 'index'),
('default:aclhistorialusuarios', 'add'),
('default:aclhistorialusuarios', 'detail'),
('default:aclhistorialusuarios', 'edit'),
('default:aclhistorialusuarios', 'delete');

INSERT INTO ve_aclacciones(
 accrecurso, accaccion
) VALUES
('reto:solucionadores', ''), 
('reto:solucionadores', 'index'),
('reto:solucionadores', 'add'),
('reto:solucionadores', 'detail'),
('reto:solucionadores', 'menulateral'),
('reto:solucionadores', 'edit'),
('reto:solucionadores', 'informaciongeneralpropuesta'),
('reto:solucionadores', 'informaciongeneralproponente'),
('reto:solucionadores', 'solucionysupertinencia'),
('reto:solucionadores', 'planteamientopresupuestal'),
('reto:solucionadores', 'trayectoria'),
('reto:solucionadores', 'propiedadintelectual'),
('reto:solucionadores', 'delete');

INSERT INTO ve_aclacciones(
 accrecurso, accaccion
) VALUES
('encuesta:tiposdeorganizaciones', ''), 
('encuesta:tiposdeorganizaciones', 'index'),
('encuesta:tiposdeorganizaciones', 'add'),
('encuesta:tiposdeorganizaciones', 'detail'),
('encuesta:tiposdeorganizaciones', 'edit'),
('encuesta:tiposdeorganizaciones', 'delete');

INSERT INTO ve_aclacciones(
 accrecurso, accaccion
) VALUES
('reto:reto', ''), 
('reto:reto', 'index'),
('reto:reto', 'add'),
('reto:reto', 'detail'),
('reto:reto', 'edit'),
('reto:reto', 'delete');

INSERT INTO ve_aclacciones(
 accrecurso, accaccion
) VALUES
('reto:caracteristicasprincipalessolucion', ''), 
('reto:caracteristicasprincipalessolucion', 'index'),
('reto:caracteristicasprincipalessolucion', 'add'),
('reto:caracteristicasprincipalessolucion', 'detail'),
('reto:caracteristicasprincipalessolucion', 'edit'),
('reto:caracteristicasprincipalessolucion', 'delete');

INSERT INTO ve_aclacciones(
 accrecurso, accaccion
) VALUES
('reto:elementostangibles', ''), 
('reto:elementostangibles', 'index'),
('reto:elementostangibles', 'add'),
('reto:elementostangibles', 'detail'),
('reto:elementostangibles', 'edit'),
('reto:elementostangibles', 'delete');

INSERT INTO ve_aclacciones(
 accrecurso, accaccion
) VALUES
('reto:indicadores', ''), 
('reto:indicadores', 'index'),
('reto:indicadores', 'add'),
('reto:indicadores', 'detail'),
('reto:indicadores', 'edit'),
('reto:indicadores', 'delete');

INSERT INTO ve_aclacciones(
 accrecurso, accaccion
) VALUES
('reto:actividadesfundamentales', ''), 
('reto:actividadesfundamentales', 'index'),
('reto:actividadesfundamentales', 'add'),
('reto:actividadesfundamentales', 'detail'),
('reto:actividadesfundamentales', 'edit'),
('reto:actividadesfundamentales', 'delete');

INSERT INTO ve_aclacciones(
 accrecurso, accaccion
) VALUES
('reto:riesgos', ''), 
('reto:riesgos', 'index'),
('reto:riesgos', 'add'),
('reto:riesgos', 'detail'),
('reto:riesgos', 'edit'),
('reto:riesgos', 'delete');

INSERT INTO ve_aclacciones(
 accrecurso, accaccion
) VALUES
('reto:caracteristicasprincipalesimplementacion', ''), 
('reto:caracteristicasprincipalesimplementacion', 'index'),
('reto:caracteristicasprincipalesimplementacion', 'add'),
('reto:caracteristicasprincipalesimplementacion', 'detail'),
('reto:caracteristicasprincipalesimplementacion', 'edit'),
('reto:caracteristicasprincipalesimplementacion', 'delete');

INSERT INTO ve_aclacciones(
 accrecurso, accaccion
) VALUES
('reto:estadosdemadurez', ''), 
('reto:estadosdemadurez', 'index'),
('reto:estadosdemadurez', 'add'),
('reto:estadosdemadurez', 'detail'),
('reto:estadosdemadurez', 'edit'),
('reto:estadosdemadurez', 'delete');

INSERT INTO ve_aclacciones(
 accrecurso, accaccion
) VALUES
('reto:otrosdesarrollos', ''), 
('reto:otrosdesarrollos', 'index'),
('reto:otrosdesarrollos', 'add'),
('reto:otrosdesarrollos', 'detail'),
('reto:otrosdesarrollos', 'edit'),
('reto:otrosdesarrollos', 'delete');

INSERT INTO ve_aclacciones(
 accrecurso, accaccion
) VALUES
('reto:riesgostecnicos', ''), 
('reto:riesgostecnicos', 'index'),
('reto:riesgostecnicos', 'add'),
('reto:riesgostecnicos', 'detail'),
('reto:riesgostecnicos', 'edit'),
('reto:riesgostecnicos', 'delete');

INSERT INTO ve_aclacciones(
 accrecurso, accaccion
) VALUES
('encuesta:beneficiosesperados', ''), 
('encuesta:beneficiosesperados', 'index'),
('encuesta:beneficiosesperados', 'add'),
('encuesta:beneficiosesperados', 'detail'),
('encuesta:beneficiosesperados', 'edit'),
('encuesta:beneficiosesperados', 'delete');

INSERT INTO ve_aclacciones(
 accrecurso, accaccion
) VALUES
('reto:solucionessimilares', ''), 
('reto:solucionessimilares', 'index'),
('reto:solucionessimilares', 'add'),
('reto:solucionessimilares', 'detail'),
('reto:solucionessimilares', 'edit'),
('reto:solucionessimilares', 'delete');

INSERT INTO ve_aclacciones(
 accrecurso, accaccion
) VALUES
('reto:estadosdelreto', ''), 
('reto:estadosdelreto', 'index'),
('reto:estadosdelreto', 'add'),
('reto:estadosdelreto', 'detail'),
('reto:estadosdelreto', 'edit'),
('reto:estadosdelreto', 'delete');

INSERT INTO ve_aclacciones(
 accrecurso, accaccion
) VALUES
('encuesta:resuladosconcretos', ''), 
('encuesta:resuladosconcretos', 'index'),
('encuesta:resuladosconcretos', 'add'),
('encuesta:resuladosconcretos', 'detail'),
('encuesta:resuladosconcretos', 'edit'),
('encuesta:resuladosconcretos', 'delete');

INSERT INTO ve_aclacciones(
 accrecurso, accaccion
) VALUES
('encuesta:experienciacomosolucionador', ''), 
('encuesta:experienciacomosolucionador', 'index'),
('encuesta:experienciacomosolucionador', 'add'),
('encuesta:experienciacomosolucionador', 'detail'),
('encuesta:experienciacomosolucionador', 'edit'),
('encuesta:experienciacomosolucionador', 'delete');
INSERT INTO ve_aclacciones(
 accrecurso, accaccion
) VALUES 
('default:asignarpermisos', 'index');
INSERT INTO ve_aclacciones(
 accrecurso, accaccion
) VALUES 
('default:authentication', 'login'),
('default:error', 'error'),
('default:index', 'index'),
('default:authentication', 'logout'),
('default:authentication', 'recovery');

INSERT INTO ve_aclpermisos SELECT NULL,1,1,aclacciones_id FROM ve_aclacciones WHERE accaccion = "recovery";

INSERT INTO ve_aclacciones(
 accrecurso, accaccion
) VALUES 
('default:asignarpermisos', 'index');
