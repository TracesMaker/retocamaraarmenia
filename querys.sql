INSERT INTO `ve_aclacciones` (`aclacciones_id`, `accrecurso`, `accaccion`) VALUES (202, 'default:index', 'terminosycondiciones');

INSERT INTO `ve_aclpermisos` (`aclpermisos_id`, `perpermiso`, `perrol`, `peraccion`) VALUES (NULL, '1', '1', '202');


ALTER TABLE `ve_solucionadores` ADD `requisitosusuario` TEXT NOT NULL AFTER `inspiracion`;


INSERT INTO `ve_estadosdemadurez` (`estadosdemadurez_id`, `nombre`) VALUES ('1', 'Desarrollo a nivel de idea sin desarrollo conceptual o prueba');
INSERT INTO `ve_estadosdemadurez` (`estadosdemadurez_id`, `nombre`) VALUES ('2', 'Planteamiento conceptual debidamente sustentado según teoría(s)');
INSERT INTO `ve_estadosdemadurez` (`estadosdemadurez_id`, `nombre`) VALUES ('3', 'Prototipo preliminar que funciona bajo condiciones controladas y permite probar atributos básicos');
INSERT INTO `ve_estadosdemadurez` (`estadosdemadurez_id`, `nombre`) VALUES ('4', 'Prototipo que funciona bajo condiciones reales del ambiente en que la solución sería implementada');
INSERT INTO `ve_estadosdemadurez` (`estadosdemadurez_id`, `nombre`) VALUES ('5', 'Solución probada con todos sus atributos y en condiciones reales de funcionamiento');
INSERT INTO `ve_estadosdemadurez` (`estadosdemadurez_id`, `nombre`) VALUES ('6', 'Solución implementada totalmente por un usuario y que funciona exitosamente');
INSERT INTO `ve_estadosdemadurez` (`estadosdemadurez_id`, `nombre`) VALUES ('7', 'Otro: (por favor, describirlo)');

INSERT INTO ve_aclacciones( accrecurso, accaccion ) VALUES ('reto:solucionadores', 'getprogreso');
INSERT INTO ve_aclpermisos (perpermiso, perrol, peraccion ) 
	VALUES ('1', 3, (SELECT aclacciones_id FROM ve_aclacciones WHERE accrecurso = 'reto:solucionadores' AND accaccion = 'getprogreso') );
