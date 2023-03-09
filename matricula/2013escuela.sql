-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 12-03-2014 a las 15:47:42
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `2013escuela`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE IF NOT EXISTS `alumnos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `nit` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `fechan` date NOT NULL,
  `folio` varchar(255) NOT NULL,
  `curso` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `director` varchar(255) NOT NULL,
  `pension` varchar(255) NOT NULL,
  `barrio` varchar(255) NOT NULL,
  `sangre` varchar(255) NOT NULL,
  `grado` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombre`, `apellido`, `nit`, `telefono`, `fechan`, `folio`, `curso`, `estado`, `director`, `pension`, `barrio`, `sangre`, `grado`) VALUES
(17, 'DIEGO', 'MARTINEZ', '123333', '667873', '1978-05-07', '45678', '7', 's', 'JORGE VASQUEZ', '350000', 'CARACOLES', '', ''),
(18, ' JORGE', 'VASQUEZ J.', '1128059636', '6679159', '2013-09-19', '10203', '11', 's', 'JORGE VASQUEZ', '350000', 'CARACOLES', '', ''),
(19, 'MINDA', 'HERNANDEZ SALVADOR', '1244973778', '6678176', '2013-09-19', '82837', '11', 's', 'JORGE VASQUEZ', '350000', 'CARACOLES', '', ''),
(20, 'FABIOLA', 'HERNANDEZ', '233948', '6637749 - 17728839', '2013-09-19', '388477', '1', 's', 'JORGE VASQUEZ', '350000', 'CARACOLES', '', ''),
(21, 'OSCAR', 'GUITIERREZ', '28839948', '7738998', '2013-09-19', '388499', '1', 's', 'JORGE VASQUEZ', '350000', 'CARACOLES', '', ''),
(22, 'FABIAN', 'GARCIAS', '3949948', '2223333', '2013-09-19', '1212', '1', 's', 'JORGE VASQUEZ', '350000', 'CARACOLES', '', ''),
(23, 'TERESA', 'JULIO JULIO', '6578399', '66782776', '2013-09-19', '987', '11', 's', 'JORGE VASQUEZ', '350000', 'CARACOLES', '', ''),
(24, 'CESAR ANDRES', 'GARCIAS LOPEZ', '2345564', '6673847', '2013-09-19', '4567', '1', 's', 'JORGE VASQUEZ', '350000', 'CARACOLES', '', ''),
(25, 'ANDRES', 'LOPEZ', '9887887', '6671836 - 413 8763 7789', '2013-09-19', '1234', '11', 's', 'JORGE VASQUEZ', '350000', 'CARACOLES', '', ''),
(26, 'CRISTIAN JOSE', 'TAPIA CONTRERAS', '124556555', '6679148', '1988-05-06', '38899', '5', 's', 'JORGE VASQUEZ', '350000', 'CARACOLES', '', ''),
(28, 'CINDY', 'DE LOS REYES CHICA', '1232134433', '6679159', '2014-03-11', '123', '2', 's', 'JORGE VASQUEZ', '350000', 'CARACOLES', 'O POSITIVO', 'PRIMERO'),
(29, 'CINDY', 'DE LOS REYES CHICA', '1232134433', '6679159', '2014-03-11', '123', '2', 's', 'JORGE VASQUEZ', '300000', 'CARACOLES', 'O POSITIVO', ''),
(30, 'CINDY', 'DE LOS REYES CHICA', '1232134433', '6679159', '2014-03-11', '123', '2', 's', 'JORGE VASQUEZ', '300000', 'CARACOLES', 'O POSITIVO', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE IF NOT EXISTS `pagos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alumno` varchar(255) NOT NULL,
  `concepto` varchar(255) NOT NULL,
  `nota` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `valor` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `alumno`, `concepto`, `nota`, `fecha`, `valor`) VALUES
(2, '1232134433', 'OTRO', '', '2014-03-11', '300000'),
(3, '1232134433', 'MATRICULA', '', '2014-03-11', '230000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salones`
--

CREATE TABLE IF NOT EXISTS `salones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `curso` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `salones`
--

INSERT INTO `salones` (`id`, `nombre`, `curso`, `estado`) VALUES
(1, 'A1 Matematicas', 'Curso de Matematicas', 's'),
(2, 'A2 Matematicas', 'Curso de Matematicas', 's'),
(3, 'B1 Ciencias', 'Curso de Ciencias', 's'),
(4, 'B2 Ciencias', 'Curso de Ciencias', 's'),
(5, 'C1 Programacion', 'Programacion en PHP', 's'),
(6, 'C2 Programacion', 'Programacion PHP', 's'),
(7, 'D1 Manualidades', 'Manualidades Basicas', 's'),
(11, 'Temporal', 'Temporal', 's');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `ced` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `usu` varchar(255) NOT NULL,
  `con` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  PRIMARY KEY (`ced`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ced`, `estado`, `nom`, `usu`, `con`, `tipo`) VALUES
('1128059636', 's', 'Jorge Vasquez', 'jlvasquez', 'america', 'a');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
