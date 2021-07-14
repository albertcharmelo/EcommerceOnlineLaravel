-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.33 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para devian
CREATE DATABASE IF NOT EXISTS `devian` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `devian`;

-- Volcando estructura para tabla devian.producto_has_image
CREATE TABLE IF NOT EXISTS `producto_has_image` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `producto_id` bigint(20) NOT NULL DEFAULT '0',
  `path` varchar(300) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `path` (`path`),
  KEY `producto_id` (`producto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla devian.producto_has_image: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `producto_has_image` DISABLE KEYS */;
INSERT INTO `producto_has_image` (`id`, `producto_id`, `path`, `created_at`, `updated_at`) VALUES
	(1, 39, 'productoImagenes/1626220847DSC00729.JPG', '2021-07-14 00:00:47', '2021-07-14 00:00:47'),
	(2, 39, 'productoImagenes/1626220847DSC00730.JPG', '2021-07-14 00:00:47', '2021-07-14 00:00:47'),
	(3, 39, 'productoImagenes/1626220847DSC00731.JPG', '2021-07-14 00:00:47', '2021-07-14 00:00:47'),
	(4, 39, 'productoImagenes/1626220847DSC00732.JPG', '2021-07-14 00:00:47', '2021-07-14 00:00:47'),
	(5, 39, 'productoImagenes/1626220847DSC00733.JPG', '2021-07-14 00:00:47', '2021-07-14 00:00:47'),
	(6, 39, 'productoImagenes/1626220847DSC00734.JPG', '2021-07-14 00:00:47', '2021-07-14 00:00:47');
/*!40000 ALTER TABLE `producto_has_image` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
