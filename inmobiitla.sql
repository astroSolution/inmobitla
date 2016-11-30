-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.7.14


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema inmobi
--

CREATE DATABASE IF NOT EXISTS inmobi;
USE inmobi;

--
-- Definition of table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `idadmin` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `nivel` int(10) unsigned NOT NULL,
  `pass` varchar(100) NOT NULL,
  PRIMARY KEY (`idadmin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;


--
-- Definition of table `publicacion`
--

DROP TABLE IF EXISTS `publicacion`;
CREATE TABLE `publicacion` (
  `idpublicacion` int(10) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(70) NOT NULL,
  `direccion` text NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `precio` decimal(13,2) NOT NULL,
  `accion` enum('V','A') NOT NULL COMMENT 'v= vender, a= alquilar',
  `descripcion` varchar(255) NOT NULL,
  `LTN` decimal(13,6) DEFAULT NULL,
  `LGT` decimal(13,6) NOT NULL,
  `idusuario` int(10) unsigned NOT NULL,
  `estatus` enum('D','A') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idpublicacion`) USING BTREE,
  KEY `FK_usupub` (`idusuario`),
  CONSTRAINT `FK_usupub` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publicacion`
--

/*!40000 ALTER TABLE `publicacion` DISABLE KEYS */;
INSERT INTO `publicacion` (`idpublicacion`,`titulo`,`direccion`,`tipo`,`precio`,`accion`,`descripcion`,`LTN`,`LGT`,`idusuario`,`estatus`) VALUES 
 (1,'DSDFGSDF','SDFGDSFG','ASDF','4234.00','A','ASDFGSFG','18.583163','-70.440790',15,'A'),
 (2,'aasdfa','asdfasdf','ASDF','34234.00','V','asdfasdfasdf','18.614401','-70.473749',15,'A');
/*!40000 ALTER TABLE `publicacion` ENABLE KEYS */;


--
-- Definition of table `tipo`
--

DROP TABLE IF EXISTS `tipo`;
CREATE TABLE `tipo` (
  `idtipo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`idtipo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipo`
--

/*!40000 ALTER TABLE `tipo` DISABLE KEYS */;
INSERT INTO `tipo` (`idtipo`,`nombre`) VALUES 
 (1,'ASDF');
/*!40000 ALTER TABLE `tipo` ENABLE KEYS */;


--
-- Definition of table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
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
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `cedula` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`idusuario`,`cedula`,`correo`,`nombre`,`apellido`,`telefono`,`celular`,`fax`,`contrasena`,`usuario`,`mas_informacion`) VALUES 
 (1,'23423423423','j-e@h.com','Jos','ass','809-569-2214','849-633-5512','','81dc9bdb52d04dc20036dbd8313ed055','j-e','asdfasdf'),
 (6,'32423423423','j-e@h.co','JOse Gabriel','dasda','23423','12','234234','81dc9bdb52d04dc20036dbd8313ed055','j-e','asdfasdf'),
 (12,'fasdfa','asd@as.co','dfasdf','fasdfas','asdfasdfasdf','asdfasd','asdfasd','912ec803b2ce49e4a541068d495ab570','asd',''),
 (13,'asdf','a@a.c','asdfasd','asdfa','asdf','asdf','asdf','912ec803b2ce49e4a541068d495ab570','a','asdf'),
 (14,'asdfa','a@a.c','asdf','asdf','23423','','','202cb962ac59075b964b07152d234b70','a',''),
 (15,'11111','jo@a.com','jose','apol','8095553333','','','884ce4bb65d328ecb03c598409e2b168','jo','asdf'),
 (16,'9','jose@p.con','mateo ','mati','8096665554','','','743c41a921516b04afde48bb48e28ce6','jose','hola\r\n'),
 (18,'96','jose@p.con','mateo ','mati','8096665554','','','dbd22ba3bd0df8f385bdac3e9f8be207','jose','hola\r\n'),
 (19,'966','jose@p.con','mateo ','mati','8096665554','','','e17a5a399de92e1d01a56c50afb2a68e','jose','hola\r\n'),
 (20,'12','j-e@h.com','asdfasdf','asdfasdf','31231','2312','123123','202cb962ac59075b964b07152d234b70','j-e','asdfasdf'),
 (22,'123','j-e@h.com','asdfasdf','asdfasdf','31231','2312','123123','202cb962ac59075b964b07152d234b70','j-e','asdfasdf'),
 (23,'1234','j-e@h.com','asdfasdf','asdfasdf','31231','2312','123123','202cb962ac59075b964b07152d234b70','j-e','asdfasdf'),
 (24,'12343','j-e@h.com','asdfasdf','asdfasdf','31231','2312','123123','37a749d808e46495a8da1e5352d03cae','j-e','asdfasdf'),
 (25,'123436','j-e@h.com','asdfasdf','asdfasdf','31231','2312','123123','202cb962ac59075b964b07152d234b70','j-e','asdfasdf'),
 (26,'23423423','je@h.co','jose','asdadf','80595555','','','7bccfde7714a1ebadf06c5f4cea752c1','je','sadfasdf\r\n');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
