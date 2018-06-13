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
	(2,'Técnico'),
	(3,'Media'),
	(4,'Básica'),
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



# Volcado de tabla Postulacion
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Postulacion`;

CREATE TABLE `Postulacion` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `rut` VARCHAR(15) NOT NULL DEFAULT '',
  `fecha_nacimiento` DATE NOT NULL,
  `sexo` VARCHAR(1) NOT NULL DEFAULT '',
  `telefono` VARCHAR(20) NOT NULL DEFAULT '',
  `email` VARCHAR(50) NOT NULL DEFAULT '',
  `direccion` VARCHAR(50) NOT NULL DEFAULT '',
  `comuna` INT(11) UNSIGNED NOT NULL,
  `educacion` INT(11) UNSIGNED NOT NULL,
  `experiencia_programacion` BIT(1) NOT NULL,
  `cantidad_anhos` INT(11) DEFAULT NULL,
  `modalidad` VARCHAR(50) NOT NULL DEFAULT '',
  `curso` VARCHAR(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `RelacionUsuarioPostulacion` (`rut`),
  KEY `ComunaPostulacion` (`comuna`),
  KEY `Educacion` (`educacion`),
  CONSTRAINT `ComunaPostulacion` FOREIGN KEY (`comuna`) REFERENCES `Comuna` (`id`),
  CONSTRAINT `Educacion` FOREIGN KEY (`educacion`) REFERENCES `Educacion` (`id`),
  CONSTRAINT `RelacionUsuarioPostulacion` FOREIGN KEY (`rut`) REFERENCES `Usuario` (`rut`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;





/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;