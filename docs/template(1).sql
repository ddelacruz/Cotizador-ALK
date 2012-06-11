-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 09-06-2012 a las 16:12:04
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `template`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telas`
--

CREATE TABLE IF NOT EXISTS `telas` (
  `te_id` int(11) NOT NULL AUTO_INCREMENT,
  `te_nombre` varchar(60) CHARACTER SET utf8 NOT NULL,
  `te_precio` float NOT NULL,
  `te_descripcion` text,
  `te_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `te_estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`te_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `telas`
--

INSERT INTO `telas` (`te_id`, `te_nombre`, `te_precio`, `te_descripcion`, `te_fecha`, `te_estado`) VALUES
(1, 'Milano', 15.5, 'editando ', '2012-06-09 11:11:23', 1),
(2, 'Polystel Casimir', 25, NULL, '2012-06-08 17:20:26', 1),
(3, 'Polipima', 13, '', '2012-06-09 10:39:58', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `us_id` int(11) NOT NULL AUTO_INCREMENT,
  `us_nick` varchar(30) CHARACTER SET utf8 NOT NULL,
  `us_clave` varchar(30) CHARACTER SET utf8 NOT NULL,
  `us_rol` varchar(20) NOT NULL,
  `us_estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`us_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`us_id`, `us_nick`, `us_clave`, `us_rol`, `us_estado`) VALUES
(1, 'daniel', 'micaela', 'admin', 1);
