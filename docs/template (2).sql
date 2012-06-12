-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 12-06-2012 a las 23:05:46
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
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `cl_id` int(11) NOT NULL AUTO_INCREMENT,
  `cl_ruc` varchar(11) NOT NULL,
  `cl_razon_social` varchar(255) NOT NULL,
  `cl_direccion` varchar(255) DEFAULT NULL,
  `cl_telefono` varchar(11) DEFAULT NULL,
  `cl_contacto` varchar(255) DEFAULT NULL,
  `cl_email` varchar(255) DEFAULT NULL,
  `cl_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cl_estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cl_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`cl_id`, `cl_ruc`, `cl_razon_social`, `cl_direccion`, `cl_telefono`, `cl_contacto`, `cl_email`, `cl_fecha`, `cl_estado`) VALUES
(5, '52656565', '454555', '5545', '54545', '454', '545', '2012-06-12 18:02:46', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prendas`
--

CREATE TABLE IF NOT EXISTS `prendas` (
  `pr_id` int(11) NOT NULL AUTO_INCREMENT,
  `pr_nombre` varchar(300) NOT NULL,
  `pr_metraje` float NOT NULL,
  `pr_foto` varchar(255) DEFAULT NULL,
  `pr_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `prendas`
--

INSERT INTO `prendas` (`pr_id`, `pr_nombre`, `pr_metraje`, `pr_foto`, `pr_fecha`) VALUES
(4, 'Vestido', 1.2, 'abrigo.png', '2012-06-12 15:24:38'),
(5, 'Polo para Dama', 0.8, '6_1.jpg', '2012-06-12 14:14:40');

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
(3, 'Polipima', 13, 'Strech', '2012-06-11 08:44:07', 1);

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
