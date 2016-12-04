-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 04, 2016 at 03:21 PM
-- Server version: 5.5.49-cll-lve
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inmobiitla`
--

-- --------------------------------------------------------

--
-- Table structure for table `accion`
--

CREATE TABLE IF NOT EXISTS `accion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `accion`
--

INSERT INTO `accion` (`id`, `nombre`) VALUES
(1, 'Vender'),
(2, 'Alquilar'),
(3, 'Comprar'),
(4, 'Prestar');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `idadmin` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `nivel` int(10) unsigned NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  PRIMARY KEY (`idadmin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `usuario`, `nivel`, `contrasena`) VALUES
(2, 'admin', 1, '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `publicacion`
--

CREATE TABLE IF NOT EXISTS `publicacion` (
  `idpublicacion` int(10) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(70) NOT NULL,
  `direccion` text NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `precio` decimal(13,2) NOT NULL,
  `accion` int(10) unsigned NOT NULL COMMENT 'v= vender, a= alquilar',
  `descripcion` varchar(255) NOT NULL,
  `LTN` double DEFAULT NULL,
  `LGT` double DEFAULT NULL,
  `idusuario` int(10) unsigned NOT NULL,
  `estatus` enum('D','A') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idpublicacion`) USING BTREE,
  KEY `FK_usupub` (`idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `publicacion`
--

INSERT INTO `publicacion` (`idpublicacion`, `titulo`, `direccion`, `tipo`, `precio`, `accion`, `descripcion`, `LTN`, `LGT`, `idusuario`, `estatus`) VALUES
(1, 'Casa en Samana', 'C/4', '2', '120000.00', 4, 'Raul Luna', 18.73149106426112, -71.03679853515627, 201, 'A'),
(2, 'Casa en Samana', 'C/ penetracion', '2', '350000.00', 2, 'No hay', 18.395616880139293, -70.17711835937502, 201, 'A'),
(3, 'Esto es una prueba', 'Lejos por alla', '1', '8343.00', 2, 'jajaja', 19.13677343310063, -71.56139570312502, 202, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tipo`
--

CREATE TABLE IF NOT EXISTS `tipo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tipo`
--

INSERT INTO `tipo` (`id`, `nombre`) VALUES
(1, 'Casa'),
(2, 'Finca'),
(3, 'Apartamento');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cedula` varchar(13) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `celular` varchar(12) DEFAULT NULL,
  `fax` varchar(12) DEFAULT NULL,
  `contrasena` varchar(100) NOT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `mas_informacion` varchar(255) NOT NULL,
  `estatus` enum('A','D') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `cedula` (`cedula`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=203 ;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`idusuario`, `cedula`, `correo`, `nombre`, `apellido`, `telefono`, `celular`, `fax`, `contrasena`, `usuario`, `mas_informacion`, `estatus`) VALUES
(201, '402-2507365-5', 'enmanuellperez98@hotmail.com', 'Raul', 'Luna', '8099880748', '8294505444', '45', '202cb962ac59075b964b07152d234b70', 'enmanuellperez98', 'Nada que agregar\r\n', 'A'),
(202, '001-1760082-5', 'adamix@gmail.com', 'Amadis', 'Suarez', '8096548524', '8096548524', '', '202cb962ac59075b964b07152d234b70', 'adamix', 'jajaja', 'A');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `publicacion`
--
ALTER TABLE `publicacion`
  ADD CONSTRAINT `FK_usupub` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
