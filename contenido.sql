-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-08-2020 a las 13:22:01
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bbdd_blog`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

CREATE TABLE IF NOT EXISTS `contenido` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `Fecha` datetime NOT NULL,
  `Comentario` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Imagen` varchar(75) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=28 ;

--
-- Volcado de datos para la tabla `contenido`
--

INSERT INTO `contenido` (`Id`, `Titulo`, `Fecha`, `Comentario`, `Imagen`) VALUES
(22, 'Primera Entrada', '2020-08-08 12:30:26', 'Esta es la Primera Entrada del Blog Personal ', 'appleaudifonos.webp'),
(23, 'Segunda Entrada', '2020-08-08 12:59:12', 'Esta es la segunda entrada al Blog', 'GatoAlaUltima.jpg'),
(24, 'Tercera Entrada', '2020-08-08 13:29:04', 'Esta es la tercera Entrada', 'appleaudifonos.webp'),
(25, 'Cuarta Entrada', '2020-08-08 13:29:27', 'Esta es la cuarta Entrada', 'coche01.gif'),
(26, 'Quinta Entrada', '2020-08-08 13:51:52', 'Esto es el comentario de la quinta entrada', 'CristoConcorvado.jpg'),
(27, 'Sexta Entrada', '2020-08-09 13:12:39', 'Esta es la Sexta Entrada del Blog Personal.\r\nHa sido realizada el Domingo 9 de Agosto.\r\nSubir&eacute; la foto del gran Coliseo,tomada durante mis vacaciones en Roma el verano pasado', 'coliseo.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
