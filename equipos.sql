-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.37-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para equipos
CREATE DATABASE IF NOT EXISTS `equipos` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `equipos`;

-- Volcando estructura para tabla equipos.equipos
CREATE TABLE IF NOT EXISTS `equipos` (
  `Codigo` char(10) NOT NULL,
  `Nombre` varchar(75) NOT NULL,
  `Integrantes` bigint(20) unsigned NOT NULL,
  `Estado` enum('Activo','Inactivo') NOT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla equipos.equipos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `equipos` DISABLE KEYS */;
INSERT INTO `equipos` (`Codigo`, `Nombre`, `Integrantes`, `Estado`) VALUES
	('1', 'Real Madrid', 23, 'Activo');
/*!40000 ALTER TABLE `equipos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
