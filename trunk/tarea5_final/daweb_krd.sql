-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 14-06-2013 a las 22:17:40
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
-- Estructura de tabla para la tabla `dir_contacto`
--

CREATE TABLE IF NOT EXISTS `dir_contacto` (
  `cod_contacto` int(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `sexo` char(1) DEFAULT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `edo_civil` varchar(100) DEFAULT 'soltero',
  `pais` varchar(100) DEFAULT NULL,
  `direccion` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`cod_contacto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tabla para gestionar los contactos' AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `dir_contacto`
--

INSERT INTO `dir_contacto` (`cod_contacto`, `nombre`, `apellido`, `sexo`, `telefono`, `edo_civil`, `pais`, `direccion`) VALUES
(1, 'Juan', 'Colmenarez', 'M', '04255113', 'soltero', NULL, NULL),
(2, 'Maria', 'Sandoval', 'F', '5465', 'soltero', 'Venezuela', 'por ahiii'),
(3, 'Cris', 'Tovar', 'M', '1654123', 'Viudo', 'Canada', 'ssdalsdjsdl'),
(4, 'Cecilia', 'Cachon', 'F', '650652623', 'Casada', NULL, NULL),
(11, 'Jesus', 'Perez', 'M', '0425215641', 'soltero', 'Venezuela', 'Tssss ssss'),
(12, 'kelwin', 'ssss', NULL, '34243', 'soltero', NULL, NULL),
(16, 'Elba ', 'Barradas', 'F', '34343214', 'casada', 'Venezuela', 'Valencia'),
(19, 'Alguien', 'Nunez', 'F', '01521215', 'no aplica', 'Yugoslavia', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dir_msj_contactar`
--

CREATE TABLE IF NOT EXISTS `dir_msj_contactar` (
  `cod_msj` int(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `web` varchar(50) DEFAULT NULL,
  `cuerpo_msj` varchar(500) NOT NULL,
  PRIMARY KEY (`cod_msj`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Mensajes de las personas cuando envían información para cont' AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `dir_msj_contactar`
--

INSERT INTO `dir_msj_contactar` (`cod_msj`, `nombre`, `email`, `web`, `cuerpo_msj`) VALUES
(1, 'Josae', 'da', 'df', 'fasd'),
(2, 'das', 'dasd', 'dsad', 'dasdsadasdasdafewegsdg'),
(3, 'Pepe', 'kerk@hotmail.com', 'dad', 'dasd'),
(4, 'dad', 'dsas@fsf.com', 'sada', 'dsa'),
(5, 'Kelwin', 'das@.com', NULL, 'gdfg'),
(6, 'fsd', 'fsdf@dfsfsdfsd', NULL, 'dsd');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
