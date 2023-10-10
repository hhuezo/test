-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 14-08-2023 a las 15:47:48
-- Versión del servidor: 10.6.12-MariaDB-cll-lve
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u564656048_nrseguros`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

DROP TABLE IF EXISTS `municipio`;
CREATE TABLE IF NOT EXISTS `municipio` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(70) NOT NULL,
  `Activo` int(11) DEFAULT 1,
  `Departamento` int(11) NOT NULL,
  `Distrito` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Departamento` (`Departamento`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`Id`, `Nombre`, `Activo`, `Departamento`, `Distrito`) VALUES
(1, 'Ahuachapán Norte', 1, 1, 0),
(2, 'Ahuachapán Centro', 1, 1, 0),
(3, 'Ahuachapán Sur', 1, 1, 0),
(4, 'San Salvador Norte', 1, 2, 0),
(5, 'San Salvador Oeste', 1, 2, 0),
(6, 'San Salvador Este', 1, 2, 0),
(7, 'San Salvador Centro', 1, 2, 0),
(8, 'San Salvador Sur', 1, 2, 0),
(9, 'La Libertad Norte', 1, 3, 0),
(10, 'La Libertad Centro', 1, 3, 0),
(11, 'La Libertad Oeste', 1, 3, 0),
(12, 'La Libertad Este', 1, 3, 0),
(13, 'La Libertad Costa', 1, 3, 0),
(14, 'La Libertad Sur', 1, 3, 0),
(15, 'Chalatenango Norte', 1, 4, 0),
(16, 'Chalatenango Centro', 1, 4, 0),
(17, 'Chalatenango Sur', 1, 4, 0),
(18, 'Cuscatlán Norte', 1, 5, 0),
(19, 'Cuscatlán Sur', 1, 5, 0),
(20, 'Cabañas Este', 1, 6, 0),
(21, 'Cabañas Oeste', 1, 6, 0),
(22, 'La Paz Oeste', 1, 7, 0),
(23, 'La Paz Centro', 1, 7, 0),
(24, ' La Paz Este', 1, 7, 0),
(25, 'La Unión Norte', 1, 8, 0),
(26, 'La Unión Sur', 1, 8, 0),
(27, 'Usulután Norte', 1, 9, 0),
(28, 'Usulután Este', 1, 9, 0),
(29, 'Usulután Oeste', 1, 9, 0),
(30, 'Sonsonate Norte', 1, 10, 0),
(31, 'Sonsonate Centro', 1, 10, 0),
(32, 'Sonsonate Este', 1, 10, 0),
(33, 'Sonsonate Oeste', 1, 10, 0),
(34, 'Santa Ana Norte', 1, 11, 0),
(35, 'Santa Ana Centro', 1, 11, 0),
(36, 'Santa Ana Este', 1, 11, 0),
(37, 'Santa Ana Oeste', 1, 11, 0),
(38, 'San Vicente Norte', 1, 12, 0),
(39, 'San Vicente Sur', 1, 12, 0),
(40, 'San Miguel Norte', 1, 13, 0),
(41, 'San Miguel Centro', 1, 13, 0),
(42, 'San Miguel Oeste', 1, 13, 0),
(43, 'Morazán Norte', 1, 14, 0),
(44, 'Morazán Sur', 1, 14, 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `municipio_ibfk_1` FOREIGN KEY (`Departamento`) REFERENCES `departamento` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
