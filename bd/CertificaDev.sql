# ************************************************************
# Sequel Pro SQL dump
# Versión 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.20)
# Base de datos: CertificaDev
# Tiempo de Generación: 2018-06-12 7:45:14 p. m. +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


SET NAMES utf8;

SET SQL_MODE='';

create database if not exists `certificadev`;

USE `certificadev`;

# Volcado de tabla Comuna
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Comuna`;

CREATE TABLE `Comuna` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

LOCK TABLES `Comuna` WRITE;
/*!40000 ALTER TABLE `Comuna` DISABLE KEYS */;

INSERT INTO `Comuna` (`id`, `descripcion`)
VALUES
	(1,'Cerrillos'),
	(2,'Cerro Navia'),
	(3,'Conchali'),
	(4,'El Bosque'),
	(5,'Estacion Central'),
	(6,'Huechuraba'),
	(7,'Independencia'),
	(8,'La Cisterna'),
	(9,'La Florida'),
	(10,'La Granja'),
	(11,'La Pintana'),
	(12,'La Reina'),
	(13,'Las Condes'),
	(14,'Lo Barnechea'),
	(15,'Lo Espejo'),
	(16,'Lo Prado'),
	(17,'Macul'),
	(18,'Maipu'),
	(19,'Nunoa'),
	(20,'Padre Hurtado'),
	(21,'Pedro Aguirre Cerda'),
	(22,'Penalolen'),
	(23,'Providencia'),
	(24,'Pudahuel'),
	(25,'Puente Alto'),
	(26,'Quilicura'),
	(27,'Quinta Normal'),
	(28,'Recoleta'),
	(29,'Renca'),
	(30,'San Bernardo'),
	(31,'San Joaquin'),
	(32,'San Miguel'),
	(33,'San Ramon'),
	(34,'Santiago'),
	(35,'Vitacura');

/*!40000 ALTER TABLE `Comuna` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla Educacion
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Educacion`;

CREATE TABLE `Educacion` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

LOCK TABLES `Educacion` WRITE;
/*!40000 ALTER TABLE `Educacion` DISABLE KEYS */;

INSERT INTO `Educacion` (`id`, `descripcion`)
VALUES
	(1,'Profesional'),
	(2,'Tecnico'),
	(3,'Media'),
	(4,'Basica'),
	(5,'No Posee');

/*!40000 ALTER TABLE `Educacion` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla Usuario
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Usuario`;

CREATE TABLE `Usuario` (
  `rut` varchar(15) NOT NULL DEFAULT '',
  `nombre` varchar(50) NOT NULL DEFAULT '',
  `apellido_paterno` varchar(50) NOT NULL DEFAULT '',
  `apellido_materno` varchar(50) NOT NULL DEFAULT '',
  `contrasena` varchar(100) NOT NULL DEFAULT '',
  `perfil` varchar(20) NOT NULL DEFAULT 'Postulante',
  PRIMARY KEY (`rut`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `usuario` */

insert into `usuario` (`rut`,`nombre`,`apellido_paterno`,`apellido_materno`,`contrasena`,`perfil`) values ('1-1','Arturo','Vargas','Reyes','arturo','Ejecutivo'),('2-2','Juan','Perez','Tapia','123','Postulante');


# Volcado de tabla Postulacion
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Postulacion`;

CREATE TABLE `Postulacion` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rut` varchar(15) NOT NULL DEFAULT '',
  `fecha_nacimiento` date NOT NULL,
  `sexo` varchar(1) NOT NULL DEFAULT '',
  `telefono` varchar(20) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `direccion` varchar(50) NOT NULL DEFAULT '',
  `comuna` int(11) unsigned NOT NULL,
  `educacion` int(11) unsigned NOT NULL,
  `experiencia_programacion` bit(1) NOT NULL,
  `cantidad_anhos` int(11) DEFAULT NULL,
  `modalidad` varchar(50) NOT NULL DEFAULT '',
  `curso` varchar(50) NOT NULL DEFAULT '',
  `fecha_postulacion` date NOT NULL,
  `estado` varchar(20) NOT NULL DEFAULT 'Pendiente',
  PRIMARY KEY (`id`),
  KEY `RelacionUsuarioPostulacion` (`rut`),
  KEY `ComunaPostulacion` (`comuna`),
  KEY `Educacion` (`educacion`),
  CONSTRAINT `ComunaPostulacion` FOREIGN KEY (`comuna`) REFERENCES `Comuna` (`id`),
  CONSTRAINT `Educacion` FOREIGN KEY (`educacion`) REFERENCES `Educacion` (`id`),
  CONSTRAINT `RelacionUsuarioPostulacion` FOREIGN KEY (`rut`) REFERENCES `Usuario` (`rut`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;