-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.3.2-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para bpmver
CREATE DATABASE IF NOT EXISTS `bpmver` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `bpmver`;

-- Volcando estructura para tabla bpmver.inscrito
CREATE TABLE IF NOT EXISTS `inscrito` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `id_est` int(11) NOT NULL DEFAULT 0,
  `id_mat` int(11) NOT NULL DEFAULT 0,
  `comprobante` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`cod`),
  KEY `FK_inscrito_persona` (`id_est`),
  KEY `FK_inscrito_materia` (`id_mat`),
  CONSTRAINT `FK_inscrito_materia` FOREIGN KEY (`id_mat`) REFERENCES `materia` (`id`),
  CONSTRAINT `FK_inscrito_persona` FOREIGN KEY (`id_est`) REFERENCES `persona` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla bpmver.inscrito: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `inscrito` DISABLE KEYS */;
INSERT INTO `inscrito` (`cod`, `id_est`, `id_mat`, `comprobante`) VALUES
	(1, 1, 1, '6855426');
/*!40000 ALTER TABLE `inscrito` ENABLE KEYS */;

-- Volcando estructura para tabla bpmver.materia
CREATE TABLE IF NOT EXISTS `materia` (
  `id` int(11) NOT NULL,
  `sigla` varchar(6) DEFAULT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla bpmver.materia: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `materia` DISABLE KEYS */;
INSERT INTO `materia` (`id`, `sigla`, `nombre`, `estado`) VALUES
	(1, 'INF111', 'Introduccion a la informatica', 1),
	(2, 'LAB111', 'Laboratorio de INF111', 0);
/*!40000 ALTER TABLE `materia` ENABLE KEYS */;

-- Volcando estructura para tabla bpmver.persona
CREATE TABLE IF NOT EXISTS `persona` (
  `id` int(11) NOT NULL,
  `matricula` varchar(11) DEFAULT NULL,
  `ci` varchar(11) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `paterno` varchar(50) DEFAULT NULL,
  `materno` varchar(50) DEFAULT NULL,
  `direccion` varchar(60) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla bpmver.persona: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` (`id`, `matricula`, `ci`, `nombre`, `paterno`, `materno`, `direccion`, `fecha_nac`) VALUES
	(1, '1741134', '9170872', 'Rodrigo Moises', 'Machaca', 'Mamani', 'Villa el carmen', '1996-05-04'),
	(2, '1741145', '8898554', 'Daniel', 'Velarde', 'Quispe', 'Villa Fatima', '1998-12-03');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;

-- Volcando estructura para tabla bpmver.seguimiento
CREATE TABLE IF NOT EXISTS `seguimiento` (
  `nro` int(11) NOT NULL AUTO_INCREMENT,
  `flujo` varchar(3) DEFAULT NULL,
  `proceso` varchar(3) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `fecha_ini` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  PRIMARY KEY (`nro`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla bpmver.seguimiento: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `seguimiento` DISABLE KEYS */;
INSERT INTO `seguimiento` (`nro`, `flujo`, `proceso`, `id`, `fecha_ini`, `fecha_fin`) VALUES
	(1, 'F1', 'P1', 1, '2021-05-30', '2021-12-15'),
	(2, 'F1', 'P2', 1, '2021-12-15', NULL),
	(5, 'F2', 'P1', 2, '2021-05-30', NULL),
	(6, 'F2', 'P1', 2, '2021-05-30', NULL),
	(7, 'F2', 'P1', 2, '2021-05-30', NULL),
	(13, 'F2', 'P1', 2, '2021-05-30', NULL),
	(15, 'F2', 'P1', 2, '2021-05-30', NULL),
	(16, 'F2', 'P1', 2, '2021-05-30', NULL);
/*!40000 ALTER TABLE `seguimiento` ENABLE KEYS */;

-- Volcando estructura para tabla bpmver.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `rol` int(11) DEFAULT NULL,
  KEY `FK_usuario_persona` (`id`),
  CONSTRAINT `FK_usuario_persona` FOREIGN KEY (`id`) REFERENCES `persona` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla bpmver.usuario: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id`, `user`, `pass`, `rol`) VALUES
	(1, 'rmachaca4', 'moises123', 1),
	(2, 'dvelarde5', 'daniel123', 2);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
