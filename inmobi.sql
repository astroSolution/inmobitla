-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2016 at 07:53 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inmobi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(10) UNSIGNED NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `nivel` int(10) UNSIGNED NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `publicacion`
--

CREATE TABLE `publicacion` (
  `idpublicacion` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(70) NOT NULL,
  `direccion` text NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `precio` decimal(13,2) NOT NULL,
  `accion` enum('V','A') NOT NULL COMMENT 'v= vender, a= alquilar',
  `descripcion` varchar(255) NOT NULL,
  `LTN` decimal(13,6) DEFAULT NULL,
  `LGT` decimal(13,6) NOT NULL,
  `idusuario` int(10) UNSIGNED NOT NULL,
  `estatus` enum('D','A') NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publicacion`
--

INSERT INTO `publicacion` (`idpublicacion`, `titulo`, `direccion`, `tipo`, `precio`, `accion`, `descripcion`, `LTN`, `LGT`, `idusuario`, `estatus`) VALUES
(1, 'ikik', 'kikiji', 'Apartamento', '122222.00', 'V', 'klklkl', '18.510253', '-70.462763', 20, 'A'),
(2, 'qqq', 'qqqqqqqqqqq', 'Apartamento', '99999999999.99', 'A', 'qqqqqqqqqqqqqqqqqqq', '18.551920', '-70.649530', 20, 'A'),
(3, 'lmlmlml', 'mlmlml', 'Apartamento', '3212.00', 'A', 'l,lklk', '0.000000', '0.000000', 20, 'A'),
(4, 'kkk', 'kkkk', 'Casa', '231321.00', 'A', '213212', '0.000000', '0.000000', 20, 'A'),
(5, 'jnjnj', 'njnjnj', 'Apartamento', '321233.00', 'A', '312313213', '0.000000', '0.000000', 20, 'A'),
(6, 'qqq', 'qq', 'Apartamento', '16.00', 'A', '1132132', '0.000000', '0.000000', 20, 'A'),
(7, 'klcedkmklkm', 'k jdkjd', 'Apartamento', '222.00', 'A', 'rttr', '0.000000', '0.000000', 20, 'A'),
(8, ',.m,m.,m.,M.,M,.M.,M.,', 'M.,M.,M.,M,', 'Casa', '555.00', 'V', '4444', '0.000000', '0.000000', 20, 'A'),
(9, 'UUUU', 'UUUUUUUU', 'Apartamento', '1111.00', 'V', '111', '0.000000', '0.000000', 20, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tipo`
--

CREATE TABLE `tipo` (
  `idtipo` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipo`
--

INSERT INTO `tipo` (`idtipo`, `nombre`) VALUES
(1, 'Casa'),
(2, 'Apartamento');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(10) UNSIGNED NOT NULL,
  `cedula` varchar(13) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `celular` varchar(12) DEFAULT NULL,
  `fax` varchar(12) DEFAULT NULL,
  `contrasena` varchar(100) NOT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `mas_informacion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`idusuario`, `cedula`, `correo`, `nombre`, `apellido`, `telefono`, `celular`, `fax`, `contrasena`, `usuario`, `mas_informacion`) VALUES
(1, '23423423423', 'j-e@h.com', 'Jos', 'ass', '809-569-2214', '849-633-5512', '', '81dc9bdb52d04dc20036dbd8313ed055', 'j-e', 'asdfasdf'),
(6, '32423423423', 'j-e@h.co', 'JOse Gabriel', 'dasda', '23423', '12', '234234', '81dc9bdb52d04dc20036dbd8313ed055', 'j-e', 'asdfasdf'),
(12, 'fasdfa', 'asd@as.co', 'dfasdf', 'fasdfas', 'asdfasdfasdf', 'asdfasd', 'asdfasd', '912ec803b2ce49e4a541068d495ab570', 'asd', ''),
(13, 'asdf', 'a@a.c', 'asdfasd', 'asdfa', 'asdf', 'asdf', 'asdf', '912ec803b2ce49e4a541068d495ab570', 'a', 'asdf'),
(14, 'asdfa', 'a@a.c', 'asdf', 'asdf', '23423', '', '', '202cb962ac59075b964b07152d234b70', 'a', ''),
(15, '11111', 'jo@a.com', 'jose', 'apol', '8095553333', '', '', '884ce4bb65d328ecb03c598409e2b168', 'jo', 'asdf'),
(16, '9', 'jose@p.con', 'mateo ', 'mati', '8096665554', '', '', '743c41a921516b04afde48bb48e28ce6', 'jose', 'hola\r\n'),
(18, '96', 'jose@p.con', 'mateo ', 'mati', '8096665554', '', '', 'dbd22ba3bd0df8f385bdac3e9f8be207', 'jose', 'hola\r\n'),
(19, '966', 'jose@p.con', 'mateo ', 'mati', '8096665554', '', '', 'e17a5a399de92e1d01a56c50afb2a68e', 'jose', 'hola\r\n'),
(20, '12', 'j-e@h.com', 'asdfasdf', 'asdfasdf', '31231', '2312', '123123', '202cb962ac59075b964b07152d234b70', 'j-e', 'asdfasdf'),
(22, '123', 'j-e@h.com', 'asdfasdf', 'asdfasdf', '31231', '2312', '123123', '202cb962ac59075b964b07152d234b70', 'j-e', 'asdfasdf'),
(23, '1234', 'j-e@h.com', 'asdfasdf', 'asdfasdf', '31231', '2312', '123123', '202cb962ac59075b964b07152d234b70', 'j-e', 'asdfasdf'),
(24, '12343', 'j-e@h.com', 'asdfasdf', 'asdfasdf', '31231', '2312', '123123', '37a749d808e46495a8da1e5352d03cae', 'j-e', 'asdfasdf'),
(25, '123436', 'j-e@h.com', 'asdfasdf', 'asdfasdf', '31231', '2312', '123123', '202cb962ac59075b964b07152d234b70', 'j-e', 'asdfasdf'),
(26, '23423423', 'je@h.co', 'jose', 'asdadf', '80595555', '', '', '7bccfde7714a1ebadf06c5f4cea752c1', 'je', 'sadfasdf\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `publicacion`
--
ALTER TABLE `publicacion`
  ADD PRIMARY KEY (`idpublicacion`) USING BTREE,
  ADD KEY `FK_usupub` (`idusuario`),
  ADD KEY `titulo` (`titulo`),
  ADD KEY `tipo` (`tipo`);

--
-- Indexes for table `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`idtipo`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `cedula` (`cedula`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `idpublicacion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tipo`
--
ALTER TABLE `tipo`
  MODIFY `idtipo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
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
