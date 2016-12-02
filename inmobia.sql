

CREATE DATABASE inmobi;
USE inmobi;

--
-- Definition of table `accion`
--

DROP TABLE IF EXISTS `accion`;
CREATE TABLE `accion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accion`
--

/*!40000 ALTER TABLE `accion` DISABLE KEYS */;
INSERT INTO `accion` (`id`,`nombre`) VALUES
 (1,'Vender'),
 (2,'Alquilar'),
 (3,'Comprar');
/*!40000 ALTER TABLE `accion` ENABLE KEYS */;


--
-- Definition of table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `idadmin` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `nivel` int(10) unsigned NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  PRIMARY KEY (`idadmin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`idadmin`,`usuario`,`nivel`,`contrasena`) VALUES
 (1,'jose',2,'81dc9bdb52d04dc20036dbd8313ed055');
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
  `accion` int(10) unsigned NOT NULL COMMENT 'v= vender, a= alquilar',
  `descripcion` varchar(255) NOT NULL,
  `LTN` double DEFAULT NULL,
  `LGT` double DEFAULT NULL,
  `idusuario` int(10) unsigned NOT NULL,
  `estatus` enum('D','A') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idpublicacion`) USING BTREE,
  KEY `FK_usupub` (`idusuario`),
  CONSTRAINT `FK_usupub` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publicacion`
--

/*!40000 ALTER TABLE `publicacion` DISABLE KEYS */;
INSERT INTO `publicacion` (`idpublicacion`,`titulo`,`direccion`,`tipo`,`precio`,`accion`,`descripcion`,`LTN`,`LGT`,`idusuario`,`estatus`) VALUES
 (1,'DSDFGSDF','SDFGDSFG','ASDF','4234.00',2,'ASDFGSFG',18.583163,-70.44079,15,'A'),
 (2,'aasdfa','asdfasdf','ASDF','34234.00',1,'asdfasdfasdf',18.614401,-70.473749,15,'A'),
 (3,'Casa para ti','por ahi ','ASDF','888888.00',1,'m;m;lm;l',18.562335,-70.715448,15,'A'),
 (4,'ggg','mmmmmm','ASDF','88888.00',1,'kklklkllk',18.832904,-70.451777,15,'A'),
 (5,'ikik','kikiji','Apartamento','122222.00',1,'klklkl',18.510253,-70.462763,20,'D'),
 (6,'qqq','qqqqqqqqqqq','Apartamento','99999999999.99',2,'qqqqqqqqqqqqqqqqqqq',18.55192,-70.64953,20,'A'),
 (7,'lmlmlml','mlmlml','Apartamento','3212.00',2,'l,lklk',0,0,20,'A'),
 (8,'kkk','kkkk','1','231321.00',2,'213212',0,0,20,'A'),
 (9,'jnjnj','njnjnj','Apartamento','321233.00',2,'312313213',0,0,20,'A'),
 (10,'qqq','qq','Apartamento','16.00',2,'1132132',0,0,20,'A'),
 (11,'klcedkmklkm','k jdkjd','Apartamento','222.00',2,'rttr',0,0,20,'A'),
 (12,',.m,m.,m.,M.,M,.M.,M.,','M.,M.,M.,M,','Casa','555.00',1,'4444',0,0,20,'A'),
 (13,'UUUU','UUUUUUUU','Apartamento','1111.00',1,'111',0,0,20,'A'),
 (14,'Es mia oh','asdf','1','123333.00',1,'sdfsdfg',18.792284439025156,-69.97802734375,1,'A'),
 (15,'asdfadsf','asdf','1','3432.00',1,'asdfasdf',18.780904851819123,-70.94616132812502,1,'A'),
 (16,'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','asdfasdf','1','2131.00',1,'asfasdf',0,0,1,'A'),
 (17,'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','asdfasdf','1','2131.00',1,'asfasdf',0,0,1,'A'),
 (18,'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','asdfasdf','1','2131.00',1,'asfasdf',0,0,1,'A'),
 (19,'aawwwwwwwwwwwwwwwwww','asdfasdf','1','3423.00',1,'asdfasdf',19.154936050224745,-70.81432539062502,1,'A'),
 (20,'asdfadsf','asdfasdfwerqwerwe','1','123123.00',2,'asdfasdf',0,0,1,'A'),
 (21,'asadfasdf','asdfa','1','234324.00',1,'sdfasdf',0,0,1,'A'),
 (22,'asdfasdf','234234','3','234.00',1,'asdfasdfasdf',0,0,1,'A'),
 (23,'asdfasdf','234234','3','234.00',1,'asdfasdfasdf',0,0,1,'A'),
 (24,'asdfasdf','234234','3','234.00',1,'asdfasdfasdf',0,0,1,'A'),
 (25,'asdfasdf','234234','3','234.00',1,'asdfasdfasdf',0,0,1,'A');
/*!40000 ALTER TABLE `publicacion` ENABLE KEYS */;


--
-- Definition of table `tipo`
--

DROP TABLE IF EXISTS `tipo`;
CREATE TABLE `tipo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipo`
--

/*!40000 ALTER TABLE `tipo` DISABLE KEYS */;
INSERT INTO `tipo` (`id`,`nombre`) VALUES
 (1,'Casa'),
 (2,'Finca'),
 (3,'Apartamento');
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
  `estatus` enum('A','D') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `cedula` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=201 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`idusuario`,`cedula`,`correo`,`nombre`,`apellido`,`telefono`,`celular`,`fax`,`contrasena`,`usuario`,`mas_informacion`,`estatus`) VALUES
 (1,'23423423423','j-e@h.com','Jos','ass','809-569-2214','849-633-5512','','81dc9bdb52d04dc20036dbd8313ed055','j-e','asdfasdf','A'),
 (6,'32423423423','j-e@h.co','JOse Gabriel','dasda','23423','12','234234','81dc9bdb52d04dc20036dbd8313ed055','j-e','asdfasdf','D'),
 (12,'fasdfa','asd@as.co','dfasdf','fasdfas','asdfasdfasdf','asdfasd','asdfasd','912ec803b2ce49e4a541068d495ab570','asd','','A'),
 (13,'asdf','a@a.c','asdfasd','asdfa','asdf','asdf','asdf','912ec803b2ce49e4a541068d495ab570','a','asdf','A'),
 (14,'asdfa','a@a.c','asdf','asdf','23423','','','202cb962ac59075b964b07152d234b70','a','','A'),
 (15,'11111','jo@a.com','jose','apol','8095553333','','','884ce4bb65d328ecb03c598409e2b168','jo','asdf','D'),
 (16,'9','jose@p.con','mateo ','mati','8096665554','','','743c41a921516b04afde48bb48e28ce6','jose','hola\r\n','A'),
 (18,'96','jose@p.con','mateo ','mati','8096665554','','','dbd22ba3bd0df8f385bdac3e9f8be207','jose','hola\r\n','A'),
 (19,'966','jose@p.con','mateo ','mati','8096665554','','','e17a5a399de92e1d01a56c50afb2a68e','jose','hola\r\n','A'),
 (20,'12','j-e@h.com','asdfasdf','asdfasdf','31231','2312','123123','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','j-e','asdfasdf','A'),
 (22,'123','j-e@h.com','asdfasdf','asdfasdf','31231','2312','123123','202cb962ac59075b964b07152d234b70','j-e','asdfasdf','A'),
 (23,'1234','j-e@h.com','asdfasdf','asdfasdf','31231','2312','123123','202cb962ac59075b964b07152d234b70','j-e','asdfasdf','A'),
 (24,'12343','j-e@h.com','asdfasdf','asdfasdf','31231','2312','123123','37a749d808e46495a8da1e5352d03cae','j-e','asdfasdf','A'),
 (25,'123436','j-e@h.com','asdfasdf','asdfasdf','31231','2312','123123','202cb962ac59075b964b07152d234b70','j-e','asdfasdf','A'),
 (26,'23423423','je@h.co','jose','asdadf','80595555','','','7bccfde7714a1ebadf06c5f4cea752c1','je','sadfasdf\r\n','A');
