/*
SQLyog Ultimate v8.61 
MySQL - 5.5.16 : Database - prueba
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`prueba` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `prueba`;

/*Table structure for table `asigrup` */

DROP TABLE IF EXISTS `asigrup`;

CREATE TABLE `asigrup` (
  `idas` int(11) NOT NULL AUTO_INCREMENT,
  `idg` int(11) DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`idas`),
  KEY `idg` (`idg`),
  KEY `idusuario` (`idusuario`),
  CONSTRAINT `asigrup_ibfk_1` FOREIGN KEY (`idg`) REFERENCES `grupos` (`idg`),
  CONSTRAINT `asigrup_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `asigrup` */

LOCK TABLES `asigrup` WRITE;

UNLOCK TABLES;

/*Table structure for table `grupos` */

DROP TABLE IF EXISTS `grupos`;

CREATE TABLE `grupos` (
  `idg` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `orden` varchar(100) DEFAULT NULL,
  `estatus` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idg`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `grupos` */

LOCK TABLES `grupos` WRITE;

insert  into `grupos`(`idg`,`nombre`,`avatar`,`orden`,`estatus`) values (1,'Tic-12','asdas','SDAD','activo'),(2,'Tic-67','asdas','SDAD','activo'),(3,'Tic-43','no','1','activo'),(4,'Tic-73','no','1','activo'),(5,'Tic-54','no','1','activo'),(6,'','','','');

UNLOCK TABLES;

/*Table structure for table `materias` */

DROP TABLE IF EXISTS `materias`;

CREATE TABLE `materias` (
  `idm` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `orden` varchar(100) DEFAULT NULL,
  `estatus` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idm`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `materias` */

LOCK TABLES `materias` WRITE;

insert  into `materias`(`idm`,`nombre`,`avatar`,`orden`,`estatus`) values (1,'Matematicas',NULL,NULL,'activo'),(2,'Redes',NULL,NULL,'activo'),(3,'Socio Cultural',NULL,NULL,'activo'),(4,'Aplicaciones 2',NULL,NULL,'activo'),(5,'Economia',NULL,NULL,'activo'),(6,'Base de datos',NULL,NULL,'activo');

UNLOCK TABLES;

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `apellido_paterno` varchar(50) COLLATE utf8_bin NOT NULL,
  `apellido_materno` varchar(50) COLLATE utf8_bin NOT NULL,
  `telefono` int(20) NOT NULL,
  `calle` varchar(50) COLLATE utf8_bin NOT NULL,
  `numero_externo` int(11) NOT NULL,
  `numero_interno` int(11) NOT NULL,
  `colonia` varchar(50) COLLATE utf8_bin NOT NULL,
  `municipio` varchar(50) COLLATE utf8_bin NOT NULL,
  `estado` varchar(50) COLLATE utf8_bin NOT NULL,
  `CP` int(5) NOT NULL,
  `correo` varchar(50) COLLATE utf8_bin NOT NULL,
  `usuario` varchar(50) COLLATE utf8_bin NOT NULL,
  `contrasena` varchar(50) COLLATE utf8_bin NOT NULL,
  `nivel` varchar(50) COLLATE utf8_bin NOT NULL,
  `status` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `usuario` */

LOCK TABLES `usuario` WRITE;

insert  into `usuario`(`idusuario`,`nombre`,`apellido_paterno`,`apellido_materno`,`telefono`,`calle`,`numero_externo`,`numero_interno`,`colonia`,`municipio`,`estado`,`CP`,`correo`,`usuario`,`contrasena`,`nivel`,`status`) values (1,'Putinnnnn','lara','garcia',2147483647,'acueducto sur',100,0,'guadalupe hidalgo','ocoyoacac','mexico',52740,'al221110311@gmail.com','puti','12345','1','desactivado'),(2,'Rodrigo','Peres','garcia',2147483647,'acu',100,0,'guada','ocop','mex',75400,'al@gmail.com','roro','12345','2','active'),(3,'Josue','Gonzales','garcia',2147483647,'acu',100,0,'guada','ocop','mex',75400,'al@gmail.com','jo','12345','1','active'),(4,'Pablo','Reyes','garcia',2147483647,'acu',100,0,'guada','ocop','mex',75400,'al@gmail.com','pa','12345','2','active'),(5,'Marco','Casarrubias','Roman',0,'',0,0,'','','',0,'','ma','123','1','active'),(16,'Mariana','JimÃ©nez','LÃ³pez',0,'',0,0,'','','',0,'','mari','123','2','active'),(17,'Gabriela','FernÃ¡ndez','Ramires',0,'',0,0,'','','',0,'','ga','123','3','active'),(18,'Gabriela','FernÃ¡ndez','Ramires',0,'',0,0,'','','',0,'','gab','123','3','active'),(19,'Gabriela','FernÃ¡ndez','Ramires',0,'',0,0,'','','',0,'','gb','123','3','active'),(20,'Rodrigo','Martinez','GÃ³mez',0,'',0,0,'','','',0,'','ro','123','3','active'),(21,'Arturo','PÃ©rez','Melcocha',0,'',0,0,'','','',0,'','ar','123','3','active');

UNLOCK TABLES;

/*Table structure for table `vinculamateria` */

DROP TABLE IF EXISTS `vinculamateria`;

CREATE TABLE `vinculamateria` (
  `idv` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) DEFAULT NULL,
  `idm` int(11) DEFAULT NULL,
  PRIMARY KEY (`idv`),
  KEY `idusuario` (`idusuario`),
  KEY `idm` (`idm`),
  CONSTRAINT `vinculamateria_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`),
  CONSTRAINT `vinculamateria_ibfk_2` FOREIGN KEY (`idm`) REFERENCES `materias` (`idm`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

/*Data for the table `vinculamateria` */

LOCK TABLES `vinculamateria` WRITE;

insert  into `vinculamateria`(`idv`,`idusuario`,`idm`) values (44,4,3),(48,18,6),(49,17,6),(50,17,2),(51,16,6),(52,16,6),(54,17,3),(55,17,5),(56,2,6),(58,19,6),(59,17,1),(61,4,6),(62,4,4),(63,19,1),(64,2,5);

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
