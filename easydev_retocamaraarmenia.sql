-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 03, 2017 at 10:35 PM
-- Server version: 5.1.71
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `easydev_retocamaraarmenia`
--

-- --------------------------------------------------------

--
-- Table structure for table `ve_aclacciones`
--

CREATE TABLE IF NOT EXISTS `ve_aclacciones` (
  `aclacciones_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `accrecurso` varchar(256) DEFAULT NULL,
  `accaccion` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`aclacciones_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=202 ;

--
-- Dumping data for table `ve_aclacciones`
--

INSERT INTO `ve_aclacciones` (`aclacciones_id`, `accrecurso`, `accaccion`) VALUES
(1, 'default:aclroles', ''),
(2, 'default:aclroles', 'index'),
(3, 'default:aclroles', 'add'),
(4, 'default:aclroles', 'detail'),
(5, 'default:aclroles', 'edit'),
(6, 'default:aclroles', 'delete'),
(7, 'default:aclacciones', ''),
(8, 'default:aclacciones', 'index'),
(9, 'default:aclacciones', 'add'),
(10, 'default:aclacciones', 'detail'),
(11, 'default:aclacciones', 'edit'),
(12, 'default:aclacciones', 'delete'),
(13, 'default:aclpermisos', ''),
(14, 'default:aclpermisos', 'index'),
(15, 'default:aclpermisos', 'add'),
(16, 'default:aclpermisos', 'detail'),
(17, 'default:aclpermisos', 'edit'),
(18, 'default:aclpermisos', 'delete'),
(19, 'default:aclusuarios', ''),
(20, 'default:aclusuarios', 'estado'),
(21, 'default:aclusuarios', 'index'),
(22, 'default:aclusuarios', 'add'),
(23, 'default:aclusuarios', 'detail'),
(24, 'default:aclusuarios', 'validateonly'),
(25, 'default:aclusuarios', 'edit'),
(26, 'default:aclusuarios', 'password'),
(27, 'default:aclusuarios', 'delete'),
(28, 'default:aclusuariosonline', ''),
(29, 'default:aclusuariosonline', 'index'),
(30, 'default:aclusuariosonline', 'add'),
(31, 'default:aclusuariosonline', 'detail'),
(32, 'default:aclusuariosonline', 'edit'),
(33, 'default:aclusuariosonline', 'delete'),
(34, 'default:tipoagrupacion', ''),
(35, 'default:tipoagrupacion', 'index'),
(36, 'default:tipoagrupacion', 'add'),
(37, 'default:tipoagrupacion', 'detail'),
(38, 'default:tipoagrupacion', 'menulateral'),
(39, 'default:tipoagrupacion', 'edit'),
(40, 'default:tipoagrupacion', 'delete'),
(41, 'default:agrupacion', ''),
(42, 'default:agrupacion', 'index'),
(43, 'default:agrupacion', 'add'),
(44, 'default:agrupacion', 'detail'),
(45, 'default:agrupacion', 'edit'),
(46, 'default:agrupacion', 'delete'),
(47, 'default:aclhistorialusuarios', ''),
(48, 'default:aclhistorialusuarios', 'index'),
(49, 'default:aclhistorialusuarios', 'add'),
(50, 'default:aclhistorialusuarios', 'detail'),
(51, 'default:aclhistorialusuarios', 'edit'),
(52, 'default:aclhistorialusuarios', 'delete'),
(53, 'reto:solucionadores', ''),
(54, 'reto:solucionadores', 'index'),
(55, 'reto:solucionadores', 'add'),
(56, 'reto:solucionadores', 'detail'),
(57, 'reto:solucionadores', 'menulateral'),
(58, 'reto:solucionadores', 'edit'),
(59, 'reto:solucionadores', 'informaciongeneralpropuesta'),
(60, 'reto:solucionadores', 'informaciongeneralproponente'),
(61, 'reto:solucionadores', 'solucionysupertinencia'),
(62, 'reto:solucionadores', 'planteamientopresupuestal'),
(63, 'reto:solucionadores', 'trayectoria'),
(64, 'reto:solucionadores', 'propiedadintelectual'),
(65, 'reto:solucionadores', 'delete'),
(66, 'encuesta:tiposdeorganizaciones', ''),
(67, 'encuesta:tiposdeorganizaciones', 'index'),
(68, 'encuesta:tiposdeorganizaciones', 'add'),
(69, 'encuesta:tiposdeorganizaciones', 'detail'),
(70, 'encuesta:tiposdeorganizaciones', 'edit'),
(71, 'encuesta:tiposdeorganizaciones', 'delete'),
(72, 'reto:reto', ''),
(73, 'reto:reto', 'index'),
(74, 'reto:reto', 'add'),
(75, 'reto:reto', 'detail'),
(76, 'reto:reto', 'edit'),
(77, 'reto:reto', 'delete'),
(78, 'reto:caracteristicasprincipalessolucion', ''),
(79, 'reto:caracteristicasprincipalessolucion', 'index'),
(80, 'reto:caracteristicasprincipalessolucion', 'add'),
(81, 'reto:caracteristicasprincipalessolucion', 'detail'),
(82, 'reto:caracteristicasprincipalessolucion', 'edit'),
(83, 'reto:caracteristicasprincipalessolucion', 'delete'),
(84, 'reto:elementostangibles', ''),
(85, 'reto:elementostangibles', 'index'),
(86, 'reto:elementostangibles', 'add'),
(87, 'reto:elementostangibles', 'detail'),
(88, 'reto:elementostangibles', 'edit'),
(89, 'reto:elementostangibles', 'delete'),
(90, 'reto:indicadores', ''),
(91, 'reto:indicadores', 'index'),
(92, 'reto:indicadores', 'add'),
(93, 'reto:indicadores', 'detail'),
(94, 'reto:indicadores', 'edit'),
(95, 'reto:indicadores', 'delete'),
(96, 'reto:actividadesfundamentales', ''),
(97, 'reto:actividadesfundamentales', 'index'),
(98, 'reto:actividadesfundamentales', 'add'),
(99, 'reto:actividadesfundamentales', 'detail'),
(100, 'reto:actividadesfundamentales', 'edit'),
(101, 'reto:actividadesfundamentales', 'delete'),
(102, 'reto:riesgos', ''),
(103, 'reto:riesgos', 'index'),
(104, 'reto:riesgos', 'add'),
(105, 'reto:riesgos', 'detail'),
(106, 'reto:riesgos', 'edit'),
(107, 'reto:riesgos', 'delete'),
(108, 'reto:caracteristicasprincipalesimplementacion', ''),
(109, 'reto:caracteristicasprincipalesimplementacion', 'index'),
(110, 'reto:caracteristicasprincipalesimplementacion', 'add'),
(111, 'reto:caracteristicasprincipalesimplementacion', 'detail'),
(112, 'reto:caracteristicasprincipalesimplementacion', 'edit'),
(113, 'reto:caracteristicasprincipalesimplementacion', 'delete'),
(114, 'reto:estadosdemadurez', ''),
(115, 'reto:estadosdemadurez', 'index'),
(116, 'reto:estadosdemadurez', 'add'),
(117, 'reto:estadosdemadurez', 'detail'),
(118, 'reto:estadosdemadurez', 'edit'),
(119, 'reto:estadosdemadurez', 'delete'),
(120, 'reto:otrosdesarrollos', ''),
(121, 'reto:otrosdesarrollos', 'index'),
(122, 'reto:otrosdesarrollos', 'add'),
(123, 'reto:otrosdesarrollos', 'detail'),
(124, 'reto:otrosdesarrollos', 'edit'),
(125, 'reto:otrosdesarrollos', 'delete'),
(126, 'reto:riesgostecnicos', ''),
(127, 'reto:riesgostecnicos', 'index'),
(128, 'reto:riesgostecnicos', 'add'),
(129, 'reto:riesgostecnicos', 'detail'),
(130, 'reto:riesgostecnicos', 'edit'),
(131, 'reto:riesgostecnicos', 'delete'),
(132, 'encuesta:beneficiosesperados', ''),
(133, 'encuesta:beneficiosesperados', 'index'),
(134, 'encuesta:beneficiosesperados', 'add'),
(135, 'encuesta:beneficiosesperados', 'detail'),
(136, 'encuesta:beneficiosesperados', 'edit'),
(137, 'encuesta:beneficiosesperados', 'delete'),
(138, 'reto:solucionessimilares', ''),
(139, 'reto:solucionessimilares', 'index'),
(140, 'reto:solucionessimilares', 'add'),
(141, 'reto:solucionessimilares', 'detail'),
(142, 'reto:solucionessimilares', 'edit'),
(143, 'reto:solucionessimilares', 'delete'),
(144, 'reto:estadosdelreto', ''),
(145, 'reto:estadosdelreto', 'index'),
(146, 'reto:estadosdelreto', 'add'),
(147, 'reto:estadosdelreto', 'detail'),
(148, 'reto:estadosdelreto', 'edit'),
(149, 'reto:estadosdelreto', 'delete'),
(150, 'encuesta:resuladosconcretos', ''),
(151, 'encuesta:resuladosconcretos', 'index'),
(152, 'encuesta:resuladosconcretos', 'add'),
(153, 'encuesta:resuladosconcretos', 'detail'),
(154, 'encuesta:resuladosconcretos', 'edit'),
(155, 'encuesta:resuladosconcretos', 'delete'),
(156, 'encuesta:experienciacomosolucionador', ''),
(157, 'encuesta:experienciacomosolucionador', 'index'),
(158, 'encuesta:experienciacomosolucionador', 'add'),
(159, 'encuesta:experienciacomosolucionador', 'detail'),
(160, 'encuesta:experienciacomosolucionador', 'edit'),
(161, 'encuesta:experienciacomosolucionador', 'delete'),
(162, 'default:asignarpermisos', 'index'),
(163, 'default:authentication', 'login'),
(164, 'default:error', 'error'),
(165, 'default:index', 'index'),
(166, 'default:authentication', 'logout'),
(167, 'default:authentication', 'recovery'),
(168, 'default:asignarpermisos', 'index'),
(169, 'default:index', 'reto'),
(170, 'default:index', 'solucion'),
(184, 'default:authentication', ''),
(185, 'default:aclusuarios', 'agregar'),
(186, 'reto:itemaevaluar', ''),
(187, 'reto:itemaevaluar', 'index'),
(188, 'reto:itemaevaluar', 'add'),
(189, 'reto:itemaevaluar', 'detail'),
(190, 'reto:itemaevaluar', 'edit'),
(191, 'reto:itemaevaluar', 'delete'),
(192, 'reto:evaluaciones', ''),
(193, 'reto:evaluaciones', 'index'),
(194, 'reto:evaluaciones', 'add'),
(195, 'reto:evaluaciones', 'detail'),
(196, 'reto:evaluaciones', 'edit'),
(197, 'reto:evaluaciones', 'delete'),
(198, 'reto:solucionadores', 'byreto'),
(199, 'reto:solucionadores', 'evaluar'),
(200, 'reto:solucionadores', 'getprogreso'),
(201, 'reto:solucionadores', 'reporte');

-- --------------------------------------------------------

--
-- Table structure for table `ve_aclhistorialusuarios`
--

CREATE TABLE IF NOT EXISTS `ve_aclhistorialusuarios` (
  `aclhistorialusuarios_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `aclhfecha` datetime DEFAULT NULL,
  `aclhip` varchar(256) DEFAULT NULL,
  `aclhusuario` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`aclhistorialusuarios_id`),
  KEY `aclhusuario6` (`aclhusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ve_aclpermisos`
--

CREATE TABLE IF NOT EXISTS `ve_aclpermisos` (
  `aclpermisos_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `perpermiso` tinyint(1) DEFAULT '0',
  `perrol` bigint(20) DEFAULT NULL,
  `peraccion` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`aclpermisos_id`),
  KEY `perrol1` (`perrol`),
  KEY `peraccion2` (`peraccion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `ve_aclpermisos`
--

INSERT INTO `ve_aclpermisos` (`aclpermisos_id`, `perpermiso`, `perrol`, `peraccion`) VALUES
(1, 1, 1, 167),
(2, 1, 1, 165),
(3, 1, 3, 165),
(4, 1, 4, 165),
(5, 1, 1, 169),
(6, 1, 3, 169),
(7, 1, 4, 169),
(8, 1, 1, 170),
(9, 1, 3, 170),
(10, 1, 4, 170),
(11, 1, 1, 184),
(12, 1, 3, 184),
(13, 1, 4, 184),
(14, 1, 1, 185),
(15, 1, 3, 185),
(16, 1, 4, 185),
(17, 1, 4, 54),
(18, 1, 4, 72),
(19, 1, 3, 55),
(20, 1, 3, 58),
(21, 1, 3, 78),
(22, 1, 3, 84),
(23, 1, 3, 90),
(24, 1, 3, 96),
(25, 1, 3, 102),
(26, 1, 3, 108),
(27, 1, 3, 114),
(28, 1, 3, 120),
(29, 1, 3, 126),
(30, 1, 3, 138),
(31, 1, 4, 55),
(32, 1, 4, 58),
(33, 1, 4, 78),
(34, 1, 4, 84),
(35, 1, 4, 90),
(36, 1, 4, 96),
(37, 1, 4, 102),
(38, 1, 4, 108),
(39, 1, 4, 114),
(40, 1, 4, 120),
(41, 1, 4, 126),
(42, 1, 4, 138);

-- --------------------------------------------------------

--
-- Table structure for table `ve_aclroles`
--

CREATE TABLE IF NOT EXISTS `ve_aclroles` (
  `aclroles_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `rolnombre` varchar(256) DEFAULT NULL,
  `rolpadre` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`aclroles_id`),
  KEY `rolpadre0` (`rolpadre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ve_aclroles`
--

INSERT INTO `ve_aclroles` (`aclroles_id`, `rolnombre`, `rolpadre`) VALUES
(1, 'Guests', NULL),
(2, 'Administrator', NULL),
(3, 'Proponente', NULL),
(4, 'Evaluadores', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ve_aclusuarios`
--

CREATE TABLE IF NOT EXISTS `ve_aclusuarios` (
  `aclusuarios_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(256) DEFAULT NULL,
  `cargo` varchar(256) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '0',
  `email` varchar(256) DEFAULT NULL,
  `manejodedatos` tinyint(1) DEFAULT '0',
  `divulgacionpostulacion` tinyint(1) DEFAULT '0',
  `role` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`aclusuarios_id`),
  UNIQUE KEY `username` (`username`),
  KEY `role3` (`role`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ve_aclusuarios`
--

INSERT INTO `ve_aclusuarios` (`aclusuarios_id`, `nombre`, `cargo`, `username`, `password`, `activo`, `email`, `manejodedatos`, `divulgacionpostulacion`, `role`) VALUES
(1, NULL, NULL, 'admin', '21232f297a57a5a743894a0e4a801fc3', 0, NULL, 0, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ve_aclusuariosonline`
--

CREATE TABLE IF NOT EXISTS `ve_aclusuariosonline` (
  `aclusuariosonline_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ultimoacceso` datetime DEFAULT NULL,
  `tiempo` int(11) DEFAULT NULL,
  `ip` varchar(256) DEFAULT NULL,
  `usuario_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`aclusuariosonline_id`),
  KEY `usuario_id4` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ve_actividadesfundamentales`
--

CREATE TABLE IF NOT EXISTS `ve_actividadesfundamentales` (
  `actividadesfundamentales_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `actividades` text,
  `resultadoactividad` text,
  `tiempoactividad` double DEFAULT NULL,
  `solucionador` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`actividadesfundamentales_id`),
  KEY `solucionador12` (`solucionador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ve_agrupacion`
--

CREATE TABLE IF NOT EXISTS `ve_agrupacion` (
  `agrupacion_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `aabreviatura` varchar(256) DEFAULT NULL,
  `alabel` varchar(256) DEFAULT NULL,
  `atipoagrupacion` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`agrupacion_id`),
  KEY `atipoagrupacion5` (`atipoagrupacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `ve_agrupacion`
--

INSERT INTO `ve_agrupacion` (`agrupacion_id`, `aabreviatura`, `alabel`, `atipoagrupacion`) VALUES
(1, '', 'Alto', 1),
(2, '', 'Medio', 1),
(3, '', 'Bajo', 1),
(4, '', '5. Importancia muy alta', 2),
(5, '', '4. Importancia alta', 2),
(6, '', '3. Importancia media', 2),
(7, '', '2. Importancia baja', 2),
(8, '', '1. No importante', 2),
(9, '', 'Otro.  ¿Cuál?', 3),
(10, '', 'Creación de una nueva unidad de negocio o una empresa', 3),
(11, '', 'Manejo de propiedad intelectual', 3),
(12, '', 'Reconocimiento público', 3),
(13, '', 'Beneficio económico', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ve_beneficiosesperados`
--

CREATE TABLE IF NOT EXISTS `ve_beneficiosesperados` (
  `beneficiosesperados_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `describasuexpectativa` double DEFAULT NULL,
  `solucionador` bigint(20) DEFAULT NULL,
  `expectativa` bigint(20) DEFAULT NULL,
  `nivelimportancia` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`beneficiosesperados_id`),
  KEY `solucionador18` (`solucionador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ve_caracteristicasprincipalesimplementacion`
--

CREATE TABLE IF NOT EXISTS `ve_caracteristicasprincipalesimplementacion` (
  `caracteristicasprincipalesimplementacion_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `estadodeldesarrollo` text,
  `gradodeldesarrollo` text,
  `aspectospendientes` text,
  `atributobasico` bigint(20) DEFAULT NULL,
  `solucionador` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`caracteristicasprincipalesimplementacion_id`),
  KEY `atributobasico14` (`atributobasico`),
  KEY `solucionador15` (`solucionador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ve_caracteristicasprincipalessolucion`
--

CREATE TABLE IF NOT EXISTS `ve_caracteristicasprincipalessolucion` (
  `caracteristicasprincipalessolucion_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `atributo` text,
  `descripcionatributo` text,
  `diferenciador` tinyint(1) DEFAULT '0',
  `ventajas` text,
  `solucionador` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`caracteristicasprincipalessolucion_id`),
  KEY `solucionador9` (`solucionador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ve_elementostangibles`
--

CREATE TABLE IF NOT EXISTS `ve_elementostangibles` (
  `elementostangibles_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `elementofisico` text,
  `descripcion` text,
  `funcionenlasolucion` text,
  `solucionador` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`elementostangibles_id`),
  KEY `solucionador10` (`solucionador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ve_estadosdelreto`
--

CREATE TABLE IF NOT EXISTS `ve_estadosdelreto` (
  `estadosdelreto_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`estadosdelreto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ve_estadosdemadurez`
--

CREATE TABLE IF NOT EXISTS `ve_estadosdemadurez` (
  `estadosdemadurez_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`estadosdemadurez_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ve_evaluaciones`
--

CREATE TABLE IF NOT EXISTS `ve_evaluaciones` (
  `evaluaciones_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `concepto` text,
  `valor` int(11) DEFAULT NULL,
  `reto` bigint(20) DEFAULT NULL,
  `evaluador` bigint(20) DEFAULT NULL,
  `itemaevaluar` bigint(20) DEFAULT NULL,
  `solucionador` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`evaluaciones_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ve_experienciacomosolucionador`
--

CREATE TABLE IF NOT EXISTS `ve_experienciacomosolucionador` (
  `experienciacomosolucionador_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `equipodetrabajo` varchar(256) DEFAULT NULL,
  `formacion` varchar(256) DEFAULT NULL,
  `experienciageneral` varchar(256) DEFAULT NULL,
  `experienciaespecifica` varchar(256) DEFAULT NULL,
  `conocimientosespecificos` varchar(256) DEFAULT NULL,
  `relaciondirectaconlasolucionpropuesta` varchar(256) DEFAULT NULL,
  `solucionador` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`experienciacomosolucionador_id`),
  KEY `solucionador21` (`solucionador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ve_grupoevaluacion`
--

CREATE TABLE IF NOT EXISTS `ve_grupoevaluacion` (
  `grupoevaluacion_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(256) DEFAULT NULL,
  `orden` varchar(256) DEFAULT NULL,
  `peso` int(11) DEFAULT NULL,
  PRIMARY KEY (`grupoevaluacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ve_indicadores`
--

CREATE TABLE IF NOT EXISTS `ve_indicadores` (
  `indicadores_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `indicador` varchar(256) DEFAULT NULL,
  `descripcion` text,
  `solucionador` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`indicadores_id`),
  KEY `solucionador11` (`solucionador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ve_itemaevaluar`
--

CREATE TABLE IF NOT EXISTS `ve_itemaevaluar` (
  `itemaevaluar_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(256) DEFAULT NULL,
  `tabla` varchar(256) DEFAULT NULL,
  `columna` varchar(256) DEFAULT NULL,
  `evaluable` tinyint(1) DEFAULT '0',
  `orden` int(11) DEFAULT NULL,
  `grupoevaluacion` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`itemaevaluar_id`),
  KEY `grupoevaluacion24` (`grupoevaluacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `ve_itemaevaluar`
--

INSERT INTO `ve_itemaevaluar` (`itemaevaluar_id`, `titulo`, `tabla`, `columna`, `evaluable`, `orden`, `grupoevaluacion`) VALUES
(1, 'Título de la solución', 've_solucionadores', 'titulo', 0, 1, NULL),
(2, 'Duración del proyecto en meses', 've_solucionadores', 'duracionenmeses', 0, 2, NULL),
(3, 'Correo electrónico de contacto', 've_solucionadores', 'correoelectronico', 0, 3, NULL),
(4, 'Resumen ejecutivo de la idea de solución', 've_solucionadores', 'resumenejecutivo', 1, 4, NULL),
(5, 'Impacto de la solución innovadora', 've_solucionadores', 'impactodesolucion', 1, 5, NULL),
(6, 'Para iniciar, por favor, describe la solución innovadora desde la tecnología que propone', 've_solucionadores', 'descripciondesolucion', 1, 6, NULL),
(7, 'Anexa un dibujo que explique cómo funciona su solución. Dentro de éste, por favor, señala sus principales componente y la conexión entre estos. Puedes dibujar equipos a desarrollar, procedimientos a realizar, personas involucradas o todo aquello que expres', 'vistacustom', 'diagramasolucion', 1, 7, NULL),
(8, '¿Por qué la solución que propone, quizás de muchas posibles, es la mejor alternativa para atender la necesidad insatisfecha?', 've_solucionadores', 'porquelasolucion', 1, 8, NULL),
(9, '¿Cuáles son las características principales (atributos) de la solución?', 'otratabla', 've_caracteristicasprincipalessolucion', 1, 9, NULL),
(10, '¿cuáles podrían ser elementos tangibles que conformarían la solución final cuando ésta estuviera totalmente implementada?', 'otratabla', 've_elementostangibles', 1, 10, NULL),
(11, '¿Qué indicadores se podrían usar para medir su eficiencia cuando ésta esté funcionando?', 'otratabla', 've_indicadores', 1, 11, NULL),
(12, 'señala la fuente de inspiración de la solución que sugieres en esta propuesta', 've_solucionadores', 'inspiracion', 1, 12, NULL),
(13, '¿Qué actividades serían claves ejecutar para ir desde el diseño conceptual que se presenta en esta propuesta hasta una implementación final?', 'otratabla', 've_actividadesfundamentales', 1, 13, NULL),
(14, '¿Qué riesgos técnicos identifica que se pueden presentar para llegar a la implementación de la solución?', 'otratabla', 've_riesgos', 1, 14, NULL),
(15, '¿cuál es el grado de dificultad existente hoy día para alcanzar dicho atributo?', 'otratabla', 've_caracteristicasprincipalesimplementacion', 1, 15, NULL),
(16, '¿cuál es el estado de madurez de la solución?', 'vistacustom', 'madurezsolucion', 1, 16, NULL),
(17, '¿Qué otros desarrollos complementarios se deberían realizar en VEOLIA para una óptima implementación de la solución?', 'otratabla', 've_otrosdesarrollos', 1, 17, NULL),
(18, '¿Qué riesgos técnicos o de funcionamiento se podrían presentar cuando la solución esté totalmente implementada?', 'otratabla', 've_riesgostecnicos', 1, 18, NULL),
(19, 'planteamiento presupuestal de la propuesta', 'vistacustom', 'planteamientopresupuestal', 1, 19, NULL),
(20, 'trayectoria para presentarse esta propuesta', 've_solucionadores', 'descripciontrayectoria', 1, 20, NULL),
(21, '¿Qué soluciones similares a la presentada en la propuesta ha desarrollado previamente?', 'otratabla', 've_solucionessimilares', 1, 21, NULL),
(22, '¿La solución tecnológica presentada como propuesta al reto, está protegida actualmente por algún tipo de  propiedad intelectual?', 'vistacustom', 'esprotegida', 1, 22, NULL),
(23, '¿Tiene una política de propiedad intelectual?', 'vistacustom', 'tienepolitica', 1, 23, NULL),
(24, '¿Esta propuesta y su contenido es de tu propiedad?', 'vistacustom', 'elautoresproponente', 1, 24, NULL),
(25, '¿Se ha hablado con alguna otra organización sobre la solución que estás proponiendo, se le ha mostrado a alguien anteriormente o está operando en algún otro lugar?', 'vistacustom', 'exposiciondelasolucion', 1, 25, NULL),
(26, 'nombredelaempresa', 've_solucionadores', 'nombredelaempresa', 0, 1, NULL),
(27, 'nit', 've_solucionadores', 'nit', 0, 1, NULL),
(28, 'telefono', 've_solucionadores', 'telefono', 0, 1, NULL),
(29, 'paginaweb', 've_solucionadores', 'paginaweb', 0, 1, NULL),
(30, 'nombredepersonadecontacto', 've_solucionadores', 'nombredepersonadecontacto', 0, 1, NULL),
(31, 'celulardelproponente', 've_solucionadores', 'celulardelproponente', 0, 1, NULL),
(32, 'correoelectronicoproponente', 've_solucionadores', 'correoelectronicoproponente', 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ve_otrosdesarrollos`
--

CREATE TABLE IF NOT EXISTS `ve_otrosdesarrollos` (
  `otrosdesarrollos_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `desarrollocomplementario` text,
  `porque` text,
  `solucionador` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`otrosdesarrollos_id`),
  KEY `solucionador16` (`solucionador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ve_resuladosconcretos`
--

CREATE TABLE IF NOT EXISTS `ve_resuladosconcretos` (
  `resuladosconcretos_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `resultado` varchar(256) DEFAULT NULL,
  `descripcion` text,
  `fuentedeverificacion` text,
  `solucionador` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`resuladosconcretos_id`),
  KEY `solucionador20` (`solucionador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ve_reto`
--

CREATE TABLE IF NOT EXISTS `ve_reto` (
  `reto_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(256) DEFAULT NULL,
  `descripcioncorta` text,
  `descripcioncompleta` text,
  `urlvideo` varchar(256) DEFAULT NULL,
  `imagen` longtext,
  `fechainicio` date DEFAULT NULL,
  `fechafin` date DEFAULT NULL,
  `estado` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`reto_id`),
  KEY `estado8` (`estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `ve_riesgos`
--

CREATE TABLE IF NOT EXISTS `ve_riesgos` (
  `riesgos_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `riesgo` text,
  `descripcion` text,
  `impacto` text,
  `probabilidad` text,
  `solucionador` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`riesgos_id`),
  KEY `solucionador13` (`solucionador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ve_riesgostecnicos`
--

CREATE TABLE IF NOT EXISTS `ve_riesgostecnicos` (
  `riesgostecnicos_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombredelriesgo` varchar(256) DEFAULT NULL,
  `descripcion` text,
  `probabilidad` text,
  `impacto` text,
  `prevencion` text,
  `solucionador` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`riesgostecnicos_id`),
  KEY `solucionador17` (`solucionador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ve_solucionadores`
--

CREATE TABLE IF NOT EXISTS `ve_solucionadores` (
  `solucionadores_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `reto` bigint(20) DEFAULT NULL,
  `titulo` varchar(256) DEFAULT NULL,
  `duracionenmeses` int(11) DEFAULT NULL,
  `correoelectronico` varchar(256) DEFAULT NULL,
  `resumenejecutivo` text,
  `impactodesolucion` text,
  `nombredelaempresa` varchar(256) DEFAULT NULL,
  `nit` varchar(256) DEFAULT NULL,
  `telefono` varchar(256) DEFAULT NULL,
  `paginaweb` varchar(256) DEFAULT NULL,
  `nombredepersonadecontacto` varchar(256) DEFAULT NULL,
  `celulardelproponente` varchar(256) DEFAULT NULL,
  `correoelectronicoproponente` varchar(256) DEFAULT NULL,
  `descripciondesolucion` text CHARACTER SET latin1,
  `diagramasolucion` longtext,
  `porquelasolucion` text,
  `inspiracion` text,
  `requisitosusuario` text,,
  `personal` double DEFAULT NULL,
  `serviciotecnico` double DEFAULT NULL,
  `equipos` double DEFAULT NULL,
  `software` double DEFAULT NULL,
  `materialeseinsumos` double DEFAULT NULL,
  `viajes` double DEFAULT NULL,
  `otrosrubros` double DEFAULT NULL,
  `descripciontrayectoria` text,
  `propiedadintelectual` tinyint(1) DEFAULT '0',
  `descripcionpropiedadintelecual` text,
  `politicapropiedadintelectual` tinyint(1) DEFAULT '0',
  `descripcionpoliticapropiedadintelecual` text,
  `autenticidad` tinyint(1) DEFAULT '0',
  `descripcionautorpropiedad` text,
  `cuando` varchar(256) DEFAULT NULL,
  `conquien` varchar(256) DEFAULT NULL,
  `presentacionpublica` tinyint(1) DEFAULT '0',
  `acuerdoconfidencialidadconautor` tinyint(1) DEFAULT '0',
  `usuario` bigint(20) DEFAULT NULL,
  `estadodemadurez` int(10) DEFAULT NULL,
  PRIMARY KEY (`solucionadores_id`),
  KEY `usuario7` (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ve_solucionessimilares`
--

CREATE TABLE IF NOT EXISTS `ve_solucionessimilares` (
  `solucionessimilares_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `soluciondesarrollada` varchar(256) DEFAULT NULL,
  `anodesarrollo` varchar(256) DEFAULT NULL,
  `quienladesarrollo` varchar(256) DEFAULT NULL,
  `resultadosobtenidos` varchar(256) DEFAULT NULL,
  `dificultadespresentadas` varchar(256) DEFAULT NULL,
  `solucionador` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`solucionessimilares_id`),
  KEY `solucionador19` (`solucionador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ve_tipoagrupacion`
--

CREATE TABLE IF NOT EXISTS `ve_tipoagrupacion` (
  `tipoagrupacion_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tanombre` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`tipoagrupacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ve_tipoagrupacion`
--

INSERT INTO `ve_tipoagrupacion` (`tipoagrupacion_id`, `tanombre`) VALUES
(1, 'Nivel'),
(2, 'Nivel importancia'),
(3, 'Expectativa');

-- --------------------------------------------------------

--
-- Table structure for table `ve_tiposdeorganizaciones`
--

CREATE TABLE IF NOT EXISTS `ve_tiposdeorganizaciones` (
  `tiposdeorganizaciones_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`tiposdeorganizaciones_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ve_aclhistorialusuarios`
--
ALTER TABLE `ve_aclhistorialusuarios`
  ADD CONSTRAINT `aclhusuario6` FOREIGN KEY (`aclhusuario`) REFERENCES `ve_aclusuarios` (`aclusuarios_id`);

--
-- Constraints for table `ve_aclpermisos`
--
ALTER TABLE `ve_aclpermisos`
  ADD CONSTRAINT `peraccion2` FOREIGN KEY (`peraccion`) REFERENCES `ve_aclacciones` (`aclacciones_id`),
  ADD CONSTRAINT `perrol1` FOREIGN KEY (`perrol`) REFERENCES `ve_aclroles` (`aclroles_id`);

--
-- Constraints for table `ve_aclroles`
--
ALTER TABLE `ve_aclroles`
  ADD CONSTRAINT `rolpadre0` FOREIGN KEY (`rolpadre`) REFERENCES `ve_aclroles` (`aclroles_id`);

--
-- Constraints for table `ve_aclusuarios`
--
ALTER TABLE `ve_aclusuarios`
  ADD CONSTRAINT `role3` FOREIGN KEY (`role`) REFERENCES `ve_aclroles` (`aclroles_id`);

--
-- Constraints for table `ve_aclusuariosonline`
--
ALTER TABLE `ve_aclusuariosonline`
  ADD CONSTRAINT `usuario_id4` FOREIGN KEY (`usuario_id`) REFERENCES `ve_aclusuarios` (`aclusuarios_id`) ON DELETE CASCADE;

--
-- Constraints for table `ve_actividadesfundamentales`
--
ALTER TABLE `ve_actividadesfundamentales`
  ADD CONSTRAINT `solucionador12` FOREIGN KEY (`solucionador`) REFERENCES `ve_solucionadores` (`solucionadores_id`);

--
-- Constraints for table `ve_agrupacion`
--
ALTER TABLE `ve_agrupacion`
  ADD CONSTRAINT `atipoagrupacion5` FOREIGN KEY (`atipoagrupacion`) REFERENCES `ve_tipoagrupacion` (`tipoagrupacion_id`);

--
-- Constraints for table `ve_beneficiosesperados`
--
ALTER TABLE `ve_beneficiosesperados`
  ADD CONSTRAINT `solucionador18` FOREIGN KEY (`solucionador`) REFERENCES `ve_solucionadores` (`solucionadores_id`);

--
-- Constraints for table `ve_caracteristicasprincipalesimplementacion`
--
ALTER TABLE `ve_caracteristicasprincipalesimplementacion`
  ADD CONSTRAINT `solucionador15` FOREIGN KEY (`solucionador`) REFERENCES `ve_solucionadores` (`solucionadores_id`),
  ADD CONSTRAINT `atributobasico14` FOREIGN KEY (`atributobasico`) REFERENCES `ve_caracteristicasprincipalessolucion` (`caracteristicasprincipalessolucion_id`);

--
-- Constraints for table `ve_caracteristicasprincipalessolucion`
--
ALTER TABLE `ve_caracteristicasprincipalessolucion`
  ADD CONSTRAINT `solucionador9` FOREIGN KEY (`solucionador`) REFERENCES `ve_solucionadores` (`solucionadores_id`);

--
-- Constraints for table `ve_elementostangibles`
--
ALTER TABLE `ve_elementostangibles`
  ADD CONSTRAINT `solucionador10` FOREIGN KEY (`solucionador`) REFERENCES `ve_solucionadores` (`solucionadores_id`);

--
-- Constraints for table `ve_experienciacomosolucionador`
--
ALTER TABLE `ve_experienciacomosolucionador`
  ADD CONSTRAINT `solucionador21` FOREIGN KEY (`solucionador`) REFERENCES `ve_solucionadores` (`solucionadores_id`);

--
-- Constraints for table `ve_indicadores`
--
ALTER TABLE `ve_indicadores`
  ADD CONSTRAINT `solucionador11` FOREIGN KEY (`solucionador`) REFERENCES `ve_solucionadores` (`solucionadores_id`);

--
-- Constraints for table `ve_itemaevaluar`
--
ALTER TABLE `ve_itemaevaluar`
  ADD CONSTRAINT `grupoevaluacion24` FOREIGN KEY (`grupoevaluacion`) REFERENCES `ve_grupoevaluacion` (`grupoevaluacion_id`);

--
-- Constraints for table `ve_otrosdesarrollos`
--
ALTER TABLE `ve_otrosdesarrollos`
  ADD CONSTRAINT `solucionador16` FOREIGN KEY (`solucionador`) REFERENCES `ve_solucionadores` (`solucionadores_id`);

--
-- Constraints for table `ve_resuladosconcretos`
--
ALTER TABLE `ve_resuladosconcretos`
  ADD CONSTRAINT `solucionador20` FOREIGN KEY (`solucionador`) REFERENCES `ve_solucionadores` (`solucionadores_id`);

--
-- Constraints for table `ve_reto`
--
ALTER TABLE `ve_reto`
  ADD CONSTRAINT `estado8` FOREIGN KEY (`estado`) REFERENCES `ve_estadosdelreto` (`estadosdelreto_id`);

--
-- Constraints for table `ve_riesgos`
--
ALTER TABLE `ve_riesgos`
  ADD CONSTRAINT `solucionador13` FOREIGN KEY (`solucionador`) REFERENCES `ve_solucionadores` (`solucionadores_id`);

--
-- Constraints for table `ve_riesgostecnicos`
--
ALTER TABLE `ve_riesgostecnicos`
  ADD CONSTRAINT `solucionador17` FOREIGN KEY (`solucionador`) REFERENCES `ve_solucionadores` (`solucionadores_id`);

--
-- Constraints for table `ve_solucionadores`
--
ALTER TABLE `ve_solucionadores`
  ADD CONSTRAINT `usuario7` FOREIGN KEY (`usuario`) REFERENCES `ve_aclusuarios` (`aclusuarios_id`);

--
-- Constraints for table `ve_solucionessimilares`
--
ALTER TABLE `ve_solucionessimilares`
  ADD CONSTRAINT `solucionador19` FOREIGN KEY (`solucionador`) REFERENCES `ve_solucionadores` (`solucionadores_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
