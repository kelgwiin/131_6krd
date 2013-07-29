-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-07-2013 a las 22:51:48
-- Versión del servidor: 5.5.31
-- Versión de PHP: 5.3.10-1ubuntu3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `daweb_krd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consumible`
--

CREATE TABLE IF NOT EXISTS `consumible` (
  `id_consumible` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador único autoincrementable.',
  `id_reserva_ocupa` int(11) NOT NULL COMMENT 'Clave foránea en la tabla\nid_reserva_ocupa.',
  `ids_consumible_almacen` int(11) NOT NULL COMMENT 'Clave foránea en id_consumible almancen.',
  `cantidad` int(11) NOT NULL COMMENT 'cantidad adquirida de un producto.',
  PRIMARY KEY (`id_consumible`,`id_reserva_ocupa`),
  KEY `fk_consumible_almacen_consumible` (`ids_consumible_almacen`) USING BTREE,
  KEY `fk_consumible_reserva_ocupa` (`id_reserva_ocupa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Se guardán los productos asociados al minibar en función de ' AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `consumible`
--

INSERT INTO `consumible` (`id_consumible`, `id_reserva_ocupa`, `ids_consumible_almacen`, `cantidad`) VALUES
(1, 1, 2, 4),
(2, 1, 5, 2),
(3, 1, 10, 4),
(4, 1, 11, 4),
(5, 1, 8, 4);

--
-- Disparadores `consumible`
--
DROP TRIGGER IF EXISTS `restar_consumible_almacen`;
DELIMITER //
CREATE TRIGGER `restar_consumible_almacen` AFTER INSERT ON `consumible`
 FOR EACH ROW BEGIN
    UPDATE consumible_almacen SET cantidad = cantidad - NEW.cantidad
    WHERE consumible_almacen.id_consumible_almacen = NEW.ids_consumible_almacen;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consumible_almacen`
--

CREATE TABLE IF NOT EXISTS `consumible_almacen` (
  `id_consumible_almacen` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador único \nautoincrementable.',
  `nombre` varchar(50) NOT NULL COMMENT 'Descripción del elemento\n\nDominio{llamada_internacional. llamada_nacional, cerveza,\nvino, alcohol, agua, refresco}',
  `precio` float NOT NULL COMMENT 'Valor monetario del item\no servicio.',
  `categoria` enum('N','B','A') NOT NULL COMMENT 'Dominio {N, B, A}\n\nNormal: N\nBusiness: B\nAlta: A\n\nSegún la categoria\ncambia el precio\n',
  `cantidad` int(11) DEFAULT NULL COMMENT 'Cantidad de items existentes\nen inventario.',
  `marca` varchar(200) DEFAULT NULL COMMENT 'Marca del item. Aplica sólo\ncuando es un item, no para\nlos servicios. ',
  PRIMARY KEY (`id_consumible_almacen`),
  KEY `NOMBRE` (`nombre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Aquí se guardarán los precios y descripciones actuales de ca' AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `consumible_almacen`
--

INSERT INTO `consumible_almacen` (`id_consumible_almacen`, `nombre`, `precio`, `categoria`, `cantidad`, `marca`) VALUES
(1, 'cerveza', 5, 'N', 1000, 'Polar Light'),
(2, 'cerveza', 10, 'B', 496, 'Solera'),
(3, 'cerveza', 15, 'A', 300, 'Polar Xtreme'),
(4, 'vino', 10, 'N', 100, 'San Andrés'),
(5, 'vino', 11, 'B', 228, 'Caminos de San Joaquín'),
(6, 'vino', 12, 'A', 250, 'Uvas del Cochinal'),
(7, 'alcohol', 25, 'N', 100, 'Vokda Glacial'),
(8, 'alcohol', 35, 'B', 146, 'Santa Teresa'),
(9, 'alcohol', 75, 'A', 200, 'Droché 80 años - Edición Especial'),
(10, 'agua', 5, 'N', 496, 'Minalba Pura de Manatial, eso dice la etiqueta'),
(11, 'refresco', 3, 'N', 896, 'Pepsi-Cola'),
(12, 'llamada_internacional', 5, 'N', NULL, NULL),
(13, 'llamada_nacional', 1, 'N', NULL, NULL),
(14, 'cama_niño', 10, 'N', NULL, NULL),
(15, 'habitacion_individual', 40, 'N', NULL, NULL),
(16, 'habitacion_doble', 70, 'N', NULL, NULL),
(17, 'alojamiento', 1, 'N', NULL, NULL),
(18, 'alojamiento', 1.3, 'B', NULL, NULL),
(19, 'alojamiento', 2, 'A', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE IF NOT EXISTS `factura` (
  `id_factura` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador único\nautoincrementable de\nla tabla factura.',
  `id_usuario` varchar(100) DEFAULT NULL COMMENT 'id del usuario. Clave\nforánea en la tabla\nusuario.',
  `fecha_emision` date NOT NULL COMMENT 'Fecha de emisión de\nla factura.\n\nFormato: YY:MM:DD',
  `estatus_factura` enum('actual','vieja') NOT NULL DEFAULT 'actual' COMMENT 'Dominio{actual, vieja}',
  PRIMARY KEY (`id_factura`),
  KEY `fk_factura_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Facturas de cada usuario.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

CREATE TABLE IF NOT EXISTS `habitacion` (
  `id_habitacion` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador único autoincrementable\n',
  `tipo` int(11) NOT NULL DEFAULT '1' COMMENT 'Está dado por el número\nde camas estándares:\n\nDominio:{1,2}\n1: Individual\n2: Doble',
  `categoria` enum('N','B','A') NOT NULL DEFAULT 'N' COMMENT 'Dominio {N, B, A}\nNormal: N\nBusiness: B\nAlta: A\n\nSegún la categoria\ncambia el precio\n',
  `serv_tv` tinyint(1) DEFAULT '0' COMMENT 'Booleano que identifica\nsi posee o no el servicio de\ntelevisión',
  `serv_ducha` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Booleano que identifica\nsi posee o no el servicio de\nducha. Por defecto todas\nlas habitaciones lo posee',
  `serv_yacusi` tinyint(1) DEFAULT '0' COMMENT 'Booleano que identifica\nsi posee o no el servicio de\nyacusi',
  `serv_musica` tinyint(1) DEFAULT '0' COMMENT 'Booleano que identifica\nsi posee o no el servicio de\nmúsica',
  `serv_masaje` tinyint(1) DEFAULT '0' COMMENT 'Booleano que identifica\nsi posee o no el servicio de\nmasaje',
  `estatus_habitacion` enum('ocupada','libre') NOT NULL DEFAULT 'libre' COMMENT 'Para saber qué estatus tiene\nla habitación y así\npoder asociarla posteriormente\na una reserva.',
  PRIMARY KEY (`id_habitacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Habitaciones que se encuentran en el hotel.' AUTO_INCREMENT=121 ;

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`id_habitacion`, `tipo`, `categoria`, `serv_tv`, `serv_ducha`, `serv_yacusi`, `serv_musica`, `serv_masaje`, `estatus_habitacion`) VALUES
(1, 1, 'N', 0, 1, 0, 0, 0, 'libre'),
(2, 1, 'N', 0, 1, 0, 0, 0, 'libre'),
(3, 1, 'N', 0, 1, 0, 0, 0, 'libre'),
(4, 1, 'N', 0, 1, 0, 0, 0, 'libre'),
(5, 1, 'N', 0, 1, 0, 0, 0, 'libre'),
(6, 1, 'N', 0, 1, 0, 0, 0, 'libre'),
(7, 1, 'N', 0, 1, 0, 0, 0, 'libre'),
(8, 1, 'N', 0, 1, 0, 0, 0, 'libre'),
(9, 1, 'N', 0, 1, 0, 0, 0, 'libre'),
(10, 1, 'N', 0, 1, 0, 0, 0, 'libre'),
(11, 1, 'N', 0, 1, 0, 0, 0, 'libre'),
(12, 1, 'N', 0, 1, 0, 0, 0, 'libre'),
(13, 1, 'N', 0, 1, 0, 0, 0, 'libre'),
(14, 1, 'N', 0, 1, 0, 0, 0, 'libre'),
(15, 1, 'N', 0, 1, 0, 0, 0, 'libre'),
(16, 1, 'N', 0, 1, 0, 0, 0, 'libre'),
(17, 1, 'N', 0, 1, 0, 0, 0, 'libre'),
(18, 1, 'N', 0, 1, 0, 0, 0, 'libre'),
(19, 1, 'N', 0, 1, 0, 0, 0, 'libre'),
(20, 1, 'N', 0, 1, 0, 0, 0, 'libre'),
(21, 2, 'N', 0, 1, 0, 0, 0, 'libre'),
(22, 2, 'N', 0, 1, 0, 0, 0, 'libre'),
(23, 2, 'N', 0, 1, 0, 0, 0, 'libre'),
(24, 2, 'N', 0, 1, 0, 0, 0, 'libre'),
(25, 2, 'N', 0, 1, 0, 0, 0, 'libre'),
(26, 2, 'N', 0, 1, 0, 0, 0, 'libre'),
(27, 2, 'N', 0, 1, 0, 0, 0, 'libre'),
(28, 2, 'N', 0, 1, 0, 0, 0, 'libre'),
(29, 2, 'N', 0, 1, 0, 0, 0, 'libre'),
(30, 2, 'N', 0, 1, 0, 0, 0, 'libre'),
(31, 2, 'N', 0, 1, 0, 0, 0, 'libre'),
(32, 2, 'N', 0, 1, 0, 0, 0, 'libre'),
(33, 2, 'N', 0, 1, 0, 0, 0, 'libre'),
(34, 2, 'N', 0, 1, 0, 0, 0, 'libre'),
(35, 2, 'N', 0, 1, 0, 0, 0, 'libre'),
(36, 2, 'N', 0, 1, 0, 0, 0, 'libre'),
(37, 2, 'N', 0, 1, 0, 0, 0, 'libre'),
(38, 2, 'N', 0, 1, 0, 0, 0, 'libre'),
(39, 2, 'N', 0, 1, 0, 0, 0, 'libre'),
(40, 2, 'N', 0, 1, 0, 0, 0, 'libre'),
(41, 1, 'B', 0, 1, 0, 0, 0, 'ocupada'),
(42, 1, 'B', 0, 1, 0, 0, 0, 'libre'),
(43, 1, 'B', 0, 1, 0, 0, 0, 'libre'),
(44, 1, 'B', 0, 1, 0, 0, 0, 'libre'),
(45, 1, 'B', 0, 1, 0, 0, 0, 'libre'),
(46, 1, 'B', 0, 1, 0, 0, 0, 'libre'),
(47, 1, 'B', 0, 1, 0, 0, 0, 'libre'),
(48, 1, 'B', 0, 1, 0, 0, 0, 'libre'),
(49, 1, 'B', 0, 1, 0, 0, 0, 'libre'),
(50, 1, 'B', 0, 1, 0, 0, 0, 'libre'),
(51, 1, 'B', 0, 1, 0, 0, 0, 'libre'),
(52, 1, 'B', 0, 1, 0, 0, 0, 'libre'),
(53, 1, 'B', 0, 1, 0, 0, 0, 'libre'),
(54, 1, 'B', 0, 1, 0, 0, 0, 'libre'),
(55, 1, 'B', 0, 1, 0, 0, 0, 'libre'),
(56, 1, 'B', 0, 1, 0, 0, 0, 'libre'),
(57, 1, 'B', 0, 1, 0, 0, 0, 'libre'),
(58, 1, 'B', 0, 1, 0, 0, 0, 'libre'),
(59, 1, 'B', 0, 1, 0, 0, 0, 'libre'),
(60, 1, 'B', 0, 1, 0, 0, 0, 'libre'),
(61, 2, 'B', 0, 1, 0, 0, 0, 'libre'),
(62, 2, 'B', 0, 1, 0, 0, 0, 'libre'),
(63, 2, 'B', 0, 1, 0, 0, 0, 'libre'),
(64, 2, 'B', 0, 1, 0, 0, 0, 'libre'),
(65, 2, 'B', 0, 1, 0, 0, 0, 'libre'),
(66, 2, 'B', 0, 1, 0, 0, 0, 'libre'),
(67, 2, 'B', 0, 1, 0, 0, 0, 'libre'),
(68, 2, 'B', 0, 1, 0, 0, 0, 'libre'),
(69, 2, 'B', 0, 1, 0, 0, 0, 'libre'),
(70, 2, 'B', 0, 1, 0, 0, 0, 'libre'),
(71, 2, 'B', 0, 1, 0, 0, 0, 'libre'),
(72, 2, 'B', 0, 1, 0, 0, 0, 'libre'),
(73, 2, 'B', 0, 1, 0, 0, 0, 'libre'),
(74, 2, 'B', 0, 1, 0, 0, 0, 'libre'),
(75, 2, 'B', 0, 1, 0, 0, 0, 'libre'),
(76, 2, 'B', 0, 1, 0, 0, 0, 'libre'),
(77, 2, 'B', 0, 1, 0, 0, 0, 'libre'),
(78, 2, 'B', 0, 1, 0, 0, 0, 'libre'),
(79, 2, 'B', 0, 1, 0, 0, 0, 'libre'),
(80, 2, 'B', 0, 1, 0, 0, 0, 'libre'),
(81, 1, 'A', 0, 1, 0, 0, 0, 'libre'),
(82, 1, 'A', 0, 1, 0, 0, 0, 'libre'),
(83, 1, 'A', 0, 1, 0, 0, 0, 'libre'),
(84, 1, 'A', 0, 1, 0, 0, 0, 'libre'),
(85, 1, 'A', 0, 1, 0, 0, 0, 'libre'),
(86, 1, 'A', 0, 1, 0, 0, 0, 'libre'),
(87, 1, 'A', 0, 1, 0, 0, 0, 'libre'),
(88, 1, 'A', 0, 1, 0, 0, 0, 'libre'),
(89, 1, 'A', 0, 1, 0, 0, 0, 'libre'),
(90, 1, 'A', 0, 1, 0, 0, 0, 'libre'),
(91, 1, 'A', 0, 1, 0, 0, 0, 'libre'),
(92, 1, 'A', 0, 1, 0, 0, 0, 'libre'),
(93, 1, 'A', 0, 1, 0, 0, 0, 'libre'),
(94, 1, 'A', 0, 1, 0, 0, 0, 'libre'),
(95, 1, 'A', 0, 1, 0, 0, 0, 'libre'),
(96, 1, 'A', 0, 1, 0, 0, 0, 'libre'),
(97, 1, 'A', 0, 1, 0, 0, 0, 'libre'),
(98, 1, 'A', 0, 1, 0, 0, 0, 'libre'),
(99, 1, 'A', 0, 1, 0, 0, 0, 'libre'),
(100, 1, 'A', 0, 1, 0, 0, 0, 'libre'),
(101, 2, 'A', 0, 1, 0, 0, 0, 'libre'),
(102, 2, 'A', 0, 1, 0, 0, 0, 'libre'),
(103, 2, 'A', 0, 1, 0, 0, 0, 'libre'),
(104, 2, 'A', 0, 1, 0, 0, 0, 'libre'),
(105, 2, 'A', 0, 1, 0, 0, 0, 'libre'),
(106, 2, 'A', 0, 1, 0, 0, 0, 'libre'),
(107, 2, 'A', 0, 1, 0, 0, 0, 'libre'),
(108, 2, 'A', 0, 1, 0, 0, 0, 'libre'),
(109, 2, 'A', 0, 1, 0, 0, 0, 'libre'),
(110, 2, 'A', 0, 1, 0, 0, 0, 'libre'),
(111, 2, 'A', 0, 1, 0, 0, 0, 'libre'),
(112, 2, 'A', 0, 1, 0, 0, 0, 'libre'),
(113, 2, 'A', 0, 1, 0, 0, 0, 'libre'),
(114, 2, 'A', 0, 1, 0, 0, 0, 'libre'),
(115, 2, 'A', 0, 1, 0, 0, 0, 'libre'),
(116, 2, 'A', 0, 1, 0, 0, 0, 'libre'),
(117, 2, 'A', 0, 1, 0, 0, 0, 'libre'),
(118, 2, 'A', 0, 1, 0, 0, 0, 'libre'),
(119, 2, 'A', 0, 1, 0, 0, 0, 'libre'),
(120, 2, 'A', 0, 1, 0, 0, 0, 'libre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items_factura`
--

CREATE TABLE IF NOT EXISTS `items_factura` (
  `id_items_factura` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador único de la\ntabla de items de factura.',
  `id_factura` int(11) NOT NULL COMMENT 'id de factura. Permite identificar a qué factura\npertenece un determinado\nitem.\n\nClave foránea en factura.',
  `nombre` varchar(50) DEFAULT NULL COMMENT 'Nombre del item agregado',
  `precio` float NOT NULL COMMENT 'Precio del item. Si es más\nde un item se guarda\nel total y se rellena ',
  `cantidad` int(11) DEFAULT NULL COMMENT 'Cantidad de productos.\nNo aplica para los servicios.',
  `num_habitacion` int(11) NOT NULL COMMENT 'Número de la habitación\nal cual se encuentra\nasociado el item\nfacturado.',
  PRIMARY KEY (`id_items_factura`,`id_factura`),
  KEY `fk_factura_items_factura` (`id_factura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Items asociados a la factura.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `llamadas_tlfs`
--

CREATE TABLE IF NOT EXISTS `llamadas_tlfs` (
  `id_llamadas_tlf` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador \núnico de la tabla de\nllamada. El cual es un\nentero auto-incrementable',
  `fecha` date NOT NULL COMMENT 'Fecha de realización\nde la llamada.',
  `hora_ini` time NOT NULL COMMENT 'Hora de inicio de la\nllamada hecha',
  `hora_fin` time NOT NULL COMMENT 'Hora de culminación\nde la llamada realizada',
  `numero` varchar(30) NOT NULL COMMENT 'Número al cual se\nrealizó la llamada',
  `id_reserva_ocupa` int(11) NOT NULL COMMENT 'Domino{N,I}\n\nN: Nacional\nI: Internacional',
  `tipo` enum('N','I') NOT NULL COMMENT 'Dominio{N,I}\nN: llamada Nacional\nI: llamada Internacional\n',
  PRIMARY KEY (`id_llamadas_tlf`),
  KEY `fk_llamadas_tlfs_reserva_ocupa` (`id_reserva_ocupa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Para contabilizar las llamadas telefónicas asociadas a una r' AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `llamadas_tlfs`
--

INSERT INTO `llamadas_tlfs` (`id_llamadas_tlf`, `fecha`, `hora_ini`, `hora_fin`, `numero`, `id_reserva_ocupa`, `tipo`) VALUES
(1, '2013-08-16', '12:22:01', '12:23:00', '9532132132168', 1, 'I'),
(2, '2013-08-17', '12:40:00', '12:50:00', '04265842524', 1, 'N'),
(3, '2013-08-18', '12:22:01', '12:23:00', '04264484827', 17, 'N'),
(4, '2013-08-19', '12:40:00', '13:40:00', '04145844721', 17, 'N'),
(5, '2013-08-20', '22:40:00', '22:50:00', '892312132131', 17, 'I'),
(6, '2013-08-16', '09:30:00', '09:50:22', '02418236631', 23, 'N'),
(7, '2013-08-17', '09:30:00', '09:50:22', '04145855539', 23, 'N'),
(8, '2013-08-20', '12:30:00', '12:40:34', '04120388544', 34, 'I');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo_sistema`
--

CREATE TABLE IF NOT EXISTS `modulo_sistema` (
  `id_nombre_modulo_sistema` varchar(100) NOT NULL COMMENT 'Identificador único autoincrementable.',
  `descripcion` varchar(200) NOT NULL COMMENT 'Nombre del módulo del\nsistema.',
  `id_rol` int(11) NOT NULL COMMENT 'id del rol. Clave foránea \nen la tabla rol.',
  PRIMARY KEY (`id_nombre_modulo_sistema`,`descripcion`),
  KEY `fk_modulo_sistema_rol` (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Para la inserción de los módulos del sistema previamente deb';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva_ocupa`
--

CREATE TABLE IF NOT EXISTS `reserva_ocupa` (
  `id_reserva_ocupa` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador único de\nla tabla autoincrementable.',
  `id_habitacion_usr_hab` int(11) DEFAULT NULL COMMENT 'Clave foránea en habitación',
  `id_usuario` varchar(100) NOT NULL COMMENT 'Clave foránea en la\ntabla usuario',
  `num_camas_infantiles` int(11) NOT NULL DEFAULT '0' COMMENT 'Cantidad de camas\ninfantiles asociadas a\nla habitación.',
  `fecha_ini` date NOT NULL COMMENT 'fecha de inicio de la\nreserva',
  `fecha_fin` date NOT NULL COMMENT 'Fecha final de la reserva.',
  `categoria_habitacion` enum('N','B','A') NOT NULL DEFAULT 'N' COMMENT 'Dominio {N, B, A}\nNormal: N\nBusiness: B\nAlta: A\n\nSegún la categoria\ncambia el precio\n',
  `tipo_habitacion` int(11) NOT NULL DEFAULT '1' COMMENT 'Está dado por el número\nde camas estándares:\n\nDominio:{1,2}\n1: Individual\n2: Doble',
  `estatus_reserva` enum('activa','ocupada','cerrada','cancelada') NOT NULL DEFAULT 'activa' COMMENT 'Dominio{activa,ocupada,\n,cerrada,cancelada}\n\nactiva: Son las reservas\nque aun no han sido\nocupadas\n\nocupada: habitación\nasignada\n\ncerrada: culminó la\nestadía y facturo.\n\ncancelada: las reservas\nque han sido canceladas.',
  `caso_especial` tinyint(1) DEFAULT '0' COMMENT 'Atributo utilizado para \nel caso de que a un \nusuario se le asigne\nuna habitación "doble"\ncuando ha solicitado una \n"individual". Este hecho \nocurre por falta de\nhabitaciones del tipo\nindividual.',
  PRIMARY KEY (`id_reserva_ocupa`),
  KEY `fk_reserva_ocupa_habitacion` (`id_habitacion_usr_hab`),
  KEY `fk_reserva_ocupa_usuario` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Permite identificar las reservas asociadas a un usuario.' AUTO_INCREMENT=35 ;

--
-- Volcado de datos para la tabla `reserva_ocupa`
--

INSERT INTO `reserva_ocupa` (`id_reserva_ocupa`, `id_habitacion_usr_hab`, `id_usuario`, `num_camas_infantiles`, `fecha_ini`, `fecha_fin`, `categoria_habitacion`, `tipo_habitacion`, `estatus_reserva`, `caso_especial`) VALUES
(1, 41, 'baltazar666', 0, '2013-08-15', '2013-08-30', 'B', 2, 'ocupada', 0),
(2, NULL, 'baltazar666', 0, '2013-08-15', '2013-08-30', 'B', 2, 'activa', 0),
(3, NULL, 'baltazar666', 0, '2013-08-15', '2013-08-30', 'B', 2, 'activa', 0),
(4, NULL, 'baltazar666', 0, '2013-08-15', '2013-08-30', 'B', 2, 'activa', 0),
(5, NULL, 'baltazar666', 0, '2013-08-15', '2013-08-30', 'B', 2, 'activa', 0),
(6, NULL, 'baltazar666', 0, '2013-08-15', '2013-08-30', 'B', 2, 'activa', 0),
(7, NULL, 'baltazar666', 0, '2013-08-20', '2013-08-30', 'B', 2, 'activa', 0),
(8, NULL, 'baltazar666', 0, '2013-08-20', '2013-08-30', 'B', 2, 'activa', 0),
(9, NULL, 'baltazar666', 0, '2013-08-20', '2013-08-30', 'B', 2, 'activa', 0),
(10, NULL, 'baltazar666', 0, '2013-08-20', '2013-08-30', 'B', 2, 'activa', 0),
(11, NULL, 'baltazar666', 0, '2013-08-20', '2013-08-30', 'B', 2, 'activa', 0),
(12, NULL, 'baltazar666', 0, '2013-08-20', '2013-08-30', 'B', 2, 'activa', 0),
(13, NULL, 'baltazar666', 0, '2013-08-20', '2013-08-30', 'N', 1, 'activa', 0),
(14, NULL, 'baltazar666', 0, '2013-08-20', '2013-08-30', 'N', 1, 'activa', 0),
(15, NULL, 'baltazar666', 0, '2013-08-20', '2013-08-30', 'N', 1, 'activa', 0),
(16, NULL, 'sandrab86', 0, '2013-08-15', '2013-08-20', 'B', 2, 'activa', 0),
(17, NULL, 'sandrab86', 0, '2013-08-15', '2013-08-20', 'B', 2, 'activa', 0),
(18, NULL, 'sandrab86', 0, '2013-08-15', '2013-08-20', 'B', 2, 'activa', 0),
(19, NULL, 'sandrab86', 0, '2013-08-15', '2013-08-20', 'A', 1, 'activa', 0),
(20, NULL, 'sandrab86', 0, '2013-08-15', '2013-08-20', 'A', 2, 'activa', 0),
(21, NULL, 'rr_gutierrez', 0, '2013-08-16', '2013-08-18', 'B', 2, 'activa', 0),
(22, NULL, 'rr_gutierrez', 0, '2013-08-16', '2013-08-18', 'N', 2, 'activa', 0),
(23, NULL, 'rr_gutierrez', 0, '2013-08-16', '2013-08-18', 'N', 2, 'activa', 0),
(24, NULL, 'rr_gutierrez', 0, '2013-08-16', '2013-08-18', 'B', 1, 'activa', 0),
(25, NULL, 'rr_gutierrez', 0, '2013-08-16', '2013-08-18', 'B', 1, 'activa', 0),
(26, NULL, 'rr_gutierrez', 0, '2013-08-16', '2013-08-18', 'B', 1, 'activa', 0),
(27, NULL, 'paola', 0, '2013-08-15', '2013-08-20', 'B', 2, 'activa', 0),
(28, NULL, 'paola', 0, '2013-08-15', '2013-08-20', 'B', 2, 'activa', 0),
(29, NULL, 'paola', 0, '2013-08-15', '2013-08-20', 'B', 2, 'activa', 0),
(30, NULL, 'paola', 0, '2013-08-15', '2013-08-20', 'B', 2, 'activa', 0),
(31, NULL, 'paola', 0, '2013-08-15', '2013-08-20', 'N', 1, 'activa', 0),
(32, NULL, 'paola', 0, '2013-08-15', '2013-08-20', 'A', 1, 'activa', 0),
(33, NULL, 'paola', 0, '2013-08-15', '2013-08-20', 'A', 1, 'activa', 0),
(34, NULL, 'paola', 0, '2013-08-15', '2013-08-21', 'A', 1, 'activa', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador único autoincrementable.',
  `descripcion` enum('admin','estandar') DEFAULT NULL COMMENT '\nDominio {admin,estandar}\nadmin: Usuario administrador\n\nEstándar:Usuario estándar\nque posee una vista más\nlimitada',
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Determinan qué modulos del sistema tendrá acceso un determin' AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `descripcion`) VALUES
(1, 'admin'),
(2, 'estandar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` varchar(100) NOT NULL COMMENT 'Nombre del usuario,\nes una cadena única \nalfanumérica.',
  `clave` varchar(100) NOT NULL COMMENT 'Clave asociada al usuario',
  `nombre` varchar(50) NOT NULL COMMENT 'Nombre del usuario',
  `apellido` varchar(50) NOT NULL COMMENT 'Apellido del usuario',
  `correo` varchar(100) NOT NULL COMMENT 'Correo asociado al usuario',
  `sexo` enum('F','M') NOT NULL COMMENT 'Sexo asociado al usuario.\n\nDominio {F,M}',
  `cedula` varchar(30) NOT NULL COMMENT 'Cédula de Identidad del\nusuario.',
  `fecha_nac` date NOT NULL COMMENT 'Fecha de nacimiento',
  `num_tarjeta` varchar(16) DEFAULT NULL COMMENT 'Número de tarjeta de \ncrédito o débito.',
  `tipo_cuenta` enum('ahorro','corriente') DEFAULT NULL COMMENT 'Tipo de cuenta\n\nDominio{ahorro,corriente}',
  `nacionalidad` enum('V','E') NOT NULL COMMENT 'Domino{V,E}\nV: venezolano\nE: extranjero',
  `rif` varchar(45) NOT NULL COMMENT 'RIF: Registro de Información\nFiscal del usuario.',
  `id_rol` int(11) NOT NULL DEFAULT '1' COMMENT 'id del rol que posee. Clave\nforánea en la tabla rol.',
  PRIMARY KEY (`id_usuario`),
  KEY `fk_usuario_rol` (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='La información de la persona será manejada exclusivamente a ';

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `clave`, `nombre`, `apellido`, `correo`, `sexo`, `cedula`, `fecha_nac`, `num_tarjeta`, `tipo_cuenta`, `nacionalidad`, `rif`, `id_rol`) VALUES
('baltazar666', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Baltazar', 'Bueno', 'baltazar@gmail.com', 'M', '1000000', '1666-06-06', '422559658215569', 'corriente', 'E', 'E-1000000-9', 1),
('ktrina', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Ktrina', 'Smith', 'ktrina@gmail.com', 'F', '20888999', '2013-07-24', NULL, NULL, 'V', 'V-20888999-6', 2),
('paola', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Paola', 'Parra', 'paolapp@gmail.com', 'F', '20888666', '1990-05-22', '525222358345989', 'ahorro', 'V', 'V-20888666-5', 1),
('rr_gutierrez', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Ramon', 'Gutierrez', 'rgutierrez@gmail.com', 'M', '7500800', '1970-05-16', '525482358345589', 'ahorro', 'V', 'V-7500800-3', 1),
('sandrab86', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Sandra', 'Baron', 'sandrab86@hotmail.com', 'F', '21255897', '1993-06-18', '425412358389489', 'corriente', 'V', 'V-21255897-6', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `consumible`
--
ALTER TABLE `consumible`
  ADD CONSTRAINT `fk_consumible_almacen_consumible` FOREIGN KEY (`ids_consumible_almacen`) REFERENCES `consumible_almacen` (`id_consumible_almacen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_consumible_reserva_ocupa` FOREIGN KEY (`id_reserva_ocupa`) REFERENCES `reserva_ocupa` (`id_reserva_ocupa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `fk_factura_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `items_factura`
--
ALTER TABLE `items_factura`
  ADD CONSTRAINT `fk_factura_items_factura` FOREIGN KEY (`id_factura`) REFERENCES `factura` (`id_factura`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `llamadas_tlfs`
--
ALTER TABLE `llamadas_tlfs`
  ADD CONSTRAINT `fk_llamadas_tlfs_reserva_ocupa` FOREIGN KEY (`id_reserva_ocupa`) REFERENCES `reserva_ocupa` (`id_reserva_ocupa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `modulo_sistema`
--
ALTER TABLE `modulo_sistema`
  ADD CONSTRAINT `fk_modulo_sistema_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reserva_ocupa`
--
ALTER TABLE `reserva_ocupa`
  ADD CONSTRAINT `fk_reserva_ocupa_habitacion` FOREIGN KEY (`id_habitacion_usr_hab`) REFERENCES `habitacion` (`id_habitacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_reserva_ocupa_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
