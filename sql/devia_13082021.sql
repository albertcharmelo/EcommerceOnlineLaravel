-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para devian
CREATE DATABASE IF NOT EXISTS `devian` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `devian`;

-- Volcando estructura para tabla devian.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_padre` bigint(20) unsigned DEFAULT NULL,
  `codigo` varchar(4) CHARACTER SET latin1 NOT NULL,
  `nombre` varchar(50) CHARACTER SET latin1 NOT NULL,
  `descripcion` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `imagen` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`),
  KEY `codigo` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla devian.categorias: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` (`id`, `id_padre`, `codigo`, `nombre`, `descripcion`, `estado`, `imagen`, `created_at`, `updated_at`) VALUES
	(4, NULL, '0001', 'Accesorios Para Moviles', 'Ninguna', 1, 'www///', NULL, NULL),
	(5, 4, '0002', 'Auriculares', 'Ninguna', 1, 'www///', NULL, NULL),
	(6, 4, '0002', 'Cargadores', 'Ninguna', 1, 'www///', NULL, NULL);
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;

-- Volcando estructura para tabla devian.combos
CREATE TABLE IF NOT EXISTS `combos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) CHARACTER SET latin1 NOT NULL,
  `descripcion` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla devian.combos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `combos` DISABLE KEYS */;
/*!40000 ALTER TABLE `combos` ENABLE KEYS */;

-- Volcando estructura para tabla devian.combo_has_producto
CREATE TABLE IF NOT EXISTS `combo_has_producto` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `combo_id` bigint(20) DEFAULT NULL,
  `producto_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla devian.combo_has_producto: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `combo_has_producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `combo_has_producto` ENABLE KEYS */;

-- Volcando estructura para tabla devian.compras
CREATE TABLE IF NOT EXISTS `compras` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `proveedor_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `tipodocumento_id` bigint(20) unsigned NOT NULL,
  `serie` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `impuesto` decimal(4,2) NOT NULL,
  `total` decimal(15,2) NOT NULL,
  `estado` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `compras_proveedor_id_foreign` (`proveedor_id`),
  KEY `compras_user_id_foreign` (`user_id`),
  KEY `compras_tipodocumento_id_foreign` (`tipodocumento_id`),
  CONSTRAINT `compras_proveedor_id_foreign` FOREIGN KEY (`proveedor_id`) REFERENCES `personas` (`id`),
  CONSTRAINT `compras_tipodocumento_id_foreign` FOREIGN KEY (`tipodocumento_id`) REFERENCES `tipo_documentos` (`id`),
  CONSTRAINT `compras_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla devian.compras: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;

-- Volcando estructura para tabla devian.detalle_compras
CREATE TABLE IF NOT EXISTS `detalle_compras` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `compra_id` bigint(20) unsigned NOT NULL,
  `producto_id` bigint(20) unsigned NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detalle_compras_compra_id_foreign` (`compra_id`),
  KEY `detalle_compras_producto_id_foreign` (`producto_id`),
  CONSTRAINT `detalle_compras_compra_id_foreign` FOREIGN KEY (`compra_id`) REFERENCES `compras` (`id`) ON DELETE CASCADE,
  CONSTRAINT `detalle_compras_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla devian.detalle_compras: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `detalle_compras` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_compras` ENABLE KEYS */;

-- Volcando estructura para tabla devian.detalle_ventas
CREATE TABLE IF NOT EXISTS `detalle_ventas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `venta_id` bigint(20) unsigned NOT NULL,
  `producto_id` bigint(20) unsigned NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(15,2) NOT NULL,
  `descuento` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detalle_ventas_producto_id_foreign` (`producto_id`),
  KEY `detalle_ventas_venta_id_foreign` (`venta_id`),
  CONSTRAINT `detalle_ventas_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`),
  CONSTRAINT `detalle_ventas_venta_id_foreign` FOREIGN KEY (`venta_id`) REFERENCES `ventas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla devian.detalle_ventas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `detalle_ventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_ventas` ENABLE KEYS */;

-- Volcando estructura para tabla devian.lista_deseos
CREATE TABLE IF NOT EXISTS `lista_deseos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `producto_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lista_user_id_foreign` (`user_id`),
  KEY `lista_producto_id_foreign` (`producto_id`),
  CONSTRAINT `lista_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `lista_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabla para añadir productos a lista de deseos para un determinado usuario.';

-- Volcando datos para la tabla devian.lista_deseos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `lista_deseos` DISABLE KEYS */;
/*!40000 ALTER TABLE `lista_deseos` ENABLE KEYS */;

-- Volcando estructura para tabla devian.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla devian.migrations: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla devian.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla devian.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla devian.personas
CREATE TABLE IF NOT EXISTS `personas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_documento_id` bigint(20) unsigned NOT NULL,
  `num_documento` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_persona` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `proveedores_nombre_unique` (`nombre`),
  KEY `num_documento` (`num_documento`),
  KEY `personas_tipo_documento_id_foreign` (`tipo_documento_id`),
  CONSTRAINT `personas_tipo_documento_id_foreign` FOREIGN KEY (`tipo_documento_id`) REFERENCES `tipo_documentos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla devian.personas: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
INSERT INTO `personas` (`id`, `nombre`, `tipo_documento_id`, `num_documento`, `direccion`, `telefono`, `email`, `tipo_persona`, `created_at`, `updated_at`) VALUES
	(47, 'Schmitt LLC', 4, '285', 'A molestiae dolorum voluptas magnam dicta laborum et. Aut sed quidem aut expedita. Illum sequi praesentium temporibus.', '1-430-661-1802', 'cesar.dietrich@yahoo.com', '1', NULL, NULL),
	(76, 'Ut veniam cumque om 01', 5, 'Qui possimus Nam se', '<p>dddddddd<br></p>', 'Eiusmod explicabo S', 'jivexus@mailinator.com', '1', '2021-08-12 19:32:11', '2021-08-12 23:02:28');
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;

-- Volcando estructura para tabla devian.plantillas
CREATE TABLE IF NOT EXISTS `plantillas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `categoria_id` bigint(20) unsigned NOT NULL,
  `nombre` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `descripcion` longtext CHARACTER SET latin1 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `plantilla_categoria_id__foreign` (`categoria_id`),
  CONSTRAINT `plantilla_categoria_id__foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Se especifica los datelles o atributos que pueda tener un producto haciendo referencia al id de la categoría del procducto.';

-- Volcando datos para la tabla devian.plantillas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `plantillas` DISABLE KEYS */;
/*!40000 ALTER TABLE `plantillas` ENABLE KEYS */;

-- Volcando estructura para tabla devian.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `categoria_id` bigint(20) unsigned NOT NULL,
  `unidad_medida_id` bigint(20) unsigned NOT NULL DEFAULT '1',
  `codigo` varchar(10) CHARACTER SET latin1 NOT NULL,
  `nombre` varchar(50) CHARACTER SET latin1 NOT NULL,
  `precio_venta` decimal(15,2) DEFAULT NULL,
  `stock_minimo` int(8) unsigned NOT NULL,
  `stock` int(8) unsigned NOT NULL,
  `descripcion` longtext COLLATE utf8mb4_unicode_ci,
  `imagen` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `estado` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `garantia` int(5) DEFAULT NULL,
  `atributo` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`),
  KEY `categoria_id` (`categoria_id`),
  KEY `codigo` (`codigo`),
  KEY `productos_unidad_medida_id_foreign` (`unidad_medida_id`),
  CONSTRAINT `productos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  CONSTRAINT `productos_unidad_medida_id_foreign` FOREIGN KEY (`unidad_medida_id`) REFERENCES `unidad_medidas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1305 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla devian.productos: ~300 rows (aproximadamente)
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`id`, `categoria_id`, `unidad_medida_id`, `codigo`, `nombre`, `precio_venta`, `stock_minimo`, `stock`, `descripcion`, `imagen`, `estado`, `garantia`, `atributo`, `created_at`, `updated_at`) VALUES
	(1005, 5, 1, '1', 'Ut est explicabo aut ut.', 6000.00, 0, 3, 'Vel error et sit sint nihil.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1006, 5, 1, '2', 'Dolor quo fuga illo quis.', 1000.00, 0, 2, 'Qui atque ad labore et sed.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1007, 5, 1, '3', 'Assumenda cum nobis nemo.', 7000.00, 0, 0, 'Libero explicabo vel est possimus sed.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1008, 5, 1, '4', 'Earum aut ut odio doloribus.', 3000.00, 0, 5, 'Dolorum pariatur ullam fugit rerum.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1009, 5, 1, '5', 'Voluptas sed quo et sunt.', 5000.00, 0, 0, 'Cum occaecati ut nemo soluta pariatur.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1010, 5, 1, '6', 'Perferendis aut fuga ut.', 5000.00, 0, 7, 'Ab atque nisi explicabo quidem.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1011, 5, 1, '7', 'Velit et ratione et sint.', 6000.00, 0, 8, 'Excepturi aut soluta minima eveniet quo.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1012, 5, 1, '8', 'Officiis qui nemo omnis.', 5000.00, 0, 5, 'Repellat consequatur voluptate iste quam.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1013, 5, 1, '9', 'Qui autem omnis harum.', 4000.00, 0, 4, 'Doloribus eius sed qui ea sunt ipsum rerum.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1014, 5, 1, '10', 'Voluptas et eos accusamus ea.', 0.00, 0, 6, 'Nam omnis reprehenderit corrupti fugiat omnis.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1015, 5, 1, '11', 'Consequatur hic ea et ipsa.', 8000.00, 0, 2, 'Maxime consequuntur est qui maiores et.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1016, 5, 1, '12', 'Dolore cum et maxime.', 0.00, 0, 2, 'At quis et nam.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1017, 5, 1, '13', 'Aperiam ut dolorem earum.', 7000.00, 0, 4, 'Sint quis ut rerum ducimus ullam at iure.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1018, 5, 1, '14', 'Cum rerum illo quod.', 8000.00, 0, 3, 'Laborum quos excepturi harum eveniet eum ratione.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1019, 5, 1, '15', 'Sint et facilis totam iure.', 3000.00, 0, 1, 'Sed recusandae deleniti modi sit.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1020, 5, 1, '16', 'Sit velit quisquam minus.', 2000.00, 0, 9, 'Veritatis vel totam est et beatae animi quis.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1021, 5, 1, '17', 'Quasi labore sed sunt.', 7000.00, 0, 4, 'Eum porro qui accusantium nesciunt soluta.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1022, 5, 1, '18', 'In explicabo nam nulla esse.', 3000.00, 0, 2, 'Sit quidem qui quia rem sunt id consectetur.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1023, 5, 1, '19', 'Accusamus vel est est.', 4000.00, 0, 7, 'Non vel in quia est fuga.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1024, 5, 1, '20', 'Aut deleniti cupiditate odio.', 0.00, 0, 3, 'Nisi autem ullam sunt aliquam sed modi.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1025, 5, 1, '21', 'Id eum sit maxime quis.', 7000.00, 0, 2, 'Qui qui quod quasi velit.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1026, 5, 1, '22', 'Et quia enim aliquid sequi.', 6000.00, 0, 8, 'Vitae est aliquam nostrum quis id harum.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1027, 5, 1, '23', 'Et culpa beatae qui autem.', 0.00, 0, 7, 'Et ut error officia ut voluptatem ipsum.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1028, 5, 1, '24', 'Voluptatem libero impedit et.', 2000.00, 0, 3, 'Qui quisquam eaque ad qui iure.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1029, 5, 1, '25', 'Animi et non aut enim.', 0.00, 0, 3, 'Saepe voluptatum voluptate et repudiandae.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1030, 5, 1, '26', 'Quia quidem est pariatur vel.', 9000.00, 0, 2, 'Perspiciatis est velit at tempora.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1031, 5, 1, '27', 'In incidunt voluptate natus.', 0.00, 0, 8, 'Qui est rerum aut at a.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1032, 5, 1, '28', 'Et et totam odit ea.', 6000.00, 0, 5, 'Inventore quos omnis sequi est aut error.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1033, 5, 1, '29', 'Aliquam eos voluptas est.', 3000.00, 0, 4, 'Autem ea ut impedit autem eum.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1034, 5, 1, '30', 'Labore dicta pariatur dolor.', 9000.00, 0, 6, 'Accusamus minima voluptas et. Modi ea et unde a.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1035, 5, 1, '31', 'Laboriosam qui illo sed esse.', 5000.00, 0, 0, 'Culpa corporis at atque aspernatur error.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1036, 5, 1, '32', 'Ad corporis modi fugiat sit.', 6000.00, 0, 4, 'Ex quo molestias non aut aspernatur.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1037, 5, 1, '33', 'Architecto et distinctio quo.', 8000.00, 0, 9, 'Itaque in neque soluta.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1038, 5, 1, '34', 'Aut rerum vel rem minima.', 1000.00, 0, 9, 'Aspernatur at maxime deserunt laborum.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1039, 5, 1, '35', 'Iure iure earum architecto.', 5000.00, 0, 3, 'Ut rerum dolorem enim alias aliquid.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1040, 5, 1, '36', 'Neque ut aliquid quo.', 1000.00, 0, 0, 'Eligendi incidunt ut ea ut voluptatem.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1041, 5, 1, '37', 'Est beatae tempora sit.', 7000.00, 0, 3, 'Recusandae inventore maiores fugiat eum.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1042, 5, 1, '38', 'Quae nisi aut deserunt.', 0.00, 0, 7, 'Laborum est totam commodi.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1043, 5, 1, '39', 'Nisi explicabo error est.', 7000.00, 0, 3, 'Non ullam numquam at quaerat et eveniet.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1044, 5, 1, '40', 'Sit illo dolores et.', 2000.00, 0, 3, 'Ab unde illo non quae nisi.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1045, 5, 1, '41', 'Quasi vitae veniam eius ut.', 8000.00, 0, 6, 'Sit et accusamus deleniti est est.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1046, 5, 1, '42', 'Corporis sint libero qui.', 0.00, 0, 6, 'Quod eos ut sed aut excepturi animi veniam.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1047, 5, 1, '43', 'Voluptatem quia eaque qui.', 9000.00, 0, 0, 'Est in harum in aut corrupti doloribus.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1048, 5, 1, '44', 'Officiis ut non aliquam.', 0.00, 0, 7, 'Consequatur sit provident animi culpa cupiditate.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1049, 5, 1, '45', 'Ipsa rerum ex adipisci.', 4000.00, 0, 1, 'Tempora voluptatem ut repellat ut sunt quidem.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1050, 5, 1, '46', 'Rerum nisi ad et alias autem.', 8000.00, 0, 4, 'Perferendis assumenda ut rerum vel quia.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1051, 5, 1, '47', 'Tempora quod quia eius est.', 7000.00, 0, 6, 'Unde molestias eius assumenda dolorem ut.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1052, 5, 1, '48', 'Ut itaque et in alias.', 7000.00, 0, 1, 'Quia et ea nostrum sunt aut.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1053, 5, 1, '49', 'Voluptas aliquid numquam aut.', 5000.00, 0, 7, 'Earum ut facilis rerum iste quo sit in.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1054, 5, 1, '50', 'Corrupti voluptates ea quis.', 7000.00, 0, 3, 'Velit alias dicta quia et sit.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1055, 5, 1, '51', 'Dolor sint molestiae tempora.', 3000.00, 0, 7, 'Dolorum ducimus veritatis velit enim repellat.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1056, 5, 1, '52', 'Pariatur saepe eos nulla qui.', 9000.00, 0, 3, 'Quidem maiores ipsa dolor voluptates quod.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1057, 5, 1, '53', 'Unde non quae itaque beatae.', 5000.00, 0, 2, 'Temporibus adipisci laborum culpa commodi aut.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1058, 5, 1, '54', 'Enim dolor ad dolor eos.', 9000.00, 0, 9, 'Maiores est fugiat qui explicabo aut veniam.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1059, 5, 1, '55', 'Beatae rerum ipsum qui qui.', 1000.00, 0, 1, 'Ducimus exercitationem consectetur non qui.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1060, 5, 1, '56', 'Sed qui ut voluptatem.', 5000.00, 0, 3, 'Numquam quia at vel sint iste ea.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1061, 5, 1, '57', 'Nihil et pariatur iure iste.', 2000.00, 0, 6, 'Aut consequatur debitis in at.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1062, 5, 1, '58', 'Aut perferendis aut sit.', 4000.00, 0, 9, 'Magnam ut placeat omnis aut.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1063, 5, 1, '59', 'Sunt illo ut ut.', 3000.00, 0, 6, 'Rerum totam ea hic. Quo nostrum illo et ut.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1064, 5, 1, '60', 'Ipsum nihil qui aut vero.', 6000.00, 0, 8, 'Ipsum quae asperiores qui illo.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1065, 5, 1, '61', 'Ea ex corporis ipsa deserunt.', 2000.00, 0, 0, 'Quia velit quasi adipisci.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1066, 5, 1, '62', 'Nemo doloremque iste quos.', 4000.00, 0, 4, 'Et occaecati quas velit voluptatem.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1067, 5, 1, '63', 'Cum qui deleniti quia quas.', 7000.00, 0, 4, 'Velit rerum iusto vitae quia dicta aliquid.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1068, 5, 1, '64', 'Nam est sapiente quas id.', 6000.00, 0, 2, 'Odit quia possimus rerum officia quia reiciendis.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1069, 5, 1, '65', 'Animi dolor nihil nam.', 9000.00, 0, 4, 'Sit pariatur et ullam sint ut.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1070, 5, 1, '66', 'Nisi ut reiciendis ad.', 7000.00, 0, 9, 'Qui ut quibusdam nulla et.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1071, 5, 1, '67', 'Itaque ut odit aliquam harum.', 0.00, 0, 9, 'Numquam et ducimus nostrum eos minima.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1072, 5, 1, '68', 'Ea sequi ut quos quis quis.', 0.00, 0, 0, 'Omnis modi eius neque possimus.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1073, 5, 1, '69', 'Et sed earum deleniti.', 5000.00, 0, 6, 'Odio odit est quia quisquam odit est ipsa.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1074, 5, 1, '70', 'Tempore veniam facilis sint.', 2000.00, 0, 4, 'Quis commodi dolorum eaque aut eum sed.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1075, 5, 1, '71', 'Ullam nisi autem debitis a.', 1000.00, 0, 2, 'Sit qui quo dolore exercitationem et eius.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1076, 5, 1, '72', 'Officiis quae est qui minima.', 9000.00, 0, 2, 'Eos fugiat voluptatem amet sed deleniti.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1077, 5, 1, '73', 'Ab et rerum nihil.', 5000.00, 0, 3, 'Quod rem iure sint et aut.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1078, 5, 1, '74', 'Debitis optio et quasi nam.', 3000.00, 0, 2, 'Dolor et aperiam quis natus blanditiis amet in.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1079, 5, 1, '75', 'Nesciunt ullam iure quia.', 8000.00, 0, 8, 'Et veniam minus suscipit.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1080, 5, 1, '76', 'Sint enim sed quia dolores.', 3000.00, 0, 4, 'Nihil qui dolor ut neque id molestias similique.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1081, 5, 1, '77', 'Ut alias aut veniam libero.', 2000.00, 0, 5, 'Itaque tempora voluptatem officiis et.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1082, 5, 1, '78', 'Officiis ad qui aliquid.', 9000.00, 0, 3, 'Nesciunt aliquam sit in sapiente asperiores.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1083, 5, 1, '79', 'Voluptatem ut omnis ad rerum.', 9000.00, 0, 6, 'Est ut ea quis sed non.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1084, 5, 1, '80', 'Qui ea architecto et sit.', 6000.00, 0, 2, 'Provident dolores porro quia.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1085, 5, 1, '81', 'Sunt maiores vel quia optio.', 6000.00, 0, 2, 'Cum dolorum illo dolores et maiores.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1086, 5, 1, '82', 'Nobis sed quod et repellat.', 0.00, 0, 3, 'Porro atque dolor eveniet in quo magni.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1087, 5, 1, '83', 'Ut fugit iusto autem id.', 3000.00, 0, 1, 'Ab nam asperiores est enim.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1088, 5, 1, '84', 'Nemo sapiente enim ad.', 5000.00, 0, 5, 'Quas eius molestiae rem minus eos aut molestiae.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1089, 5, 1, '85', 'Et dolorem impedit ex cumque.', 3000.00, 0, 4, 'Molestiae maiores magnam recusandae enim ut eum.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1090, 5, 1, '86', 'Aut optio et earum quam.', 2000.00, 0, 7, 'Vel quia et quidem ratione rerum et ipsa.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1091, 5, 1, '87', 'Eos nulla et quia voluptatem.', 1000.00, 0, 7, 'Adipisci libero autem reprehenderit repellat.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1092, 5, 1, '88', 'Ut et quod totam consectetur.', 2000.00, 0, 1, 'Laborum ducimus corrupti reiciendis eius ex.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1093, 5, 1, '89', 'Non dolorem nihil ut ex.', 5000.00, 0, 9, 'Aut molestiae voluptatem cum aut velit non.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1094, 5, 1, '90', 'Qui aut autem unde dolorem.', 7000.00, 0, 9, 'Sit ea earum eos eligendi est.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1095, 5, 1, '91', 'Minus ut est cum nemo fuga.', 0.00, 0, 3, 'Eum officia cumque et pariatur.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1096, 5, 1, '92', 'At facilis tempore quae et.', 0.00, 0, 4, 'Quam nesciunt officiis non.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1097, 5, 1, '93', 'Ad accusantium optio dicta.', 1000.00, 0, 5, 'Dolorum consequatur quis reprehenderit.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1098, 5, 1, '94', 'Est optio fuga consequatur.', 7000.00, 0, 0, 'Et sed nihil similique officiis.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1099, 5, 1, '95', 'Ut sed incidunt eos optio.', 8000.00, 0, 4, 'Vel officiis voluptas vel debitis et.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1100, 5, 1, '96', 'Rem odio aut nulla aut.', 2000.00, 0, 7, 'Laudantium ipsam nam aut.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1101, 5, 1, '97', 'Quia similique et est dicta.', 2000.00, 0, 8, 'Labore exercitationem quos voluptates.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1102, 5, 1, '98', 'Voluptas sed optio illo.', 4000.00, 0, 8, 'Consequatur omnis corrupti assumenda illo.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1103, 5, 1, '99', 'Animi mollitia fuga ut eaque.', 1000.00, 0, 4, 'Voluptas quis dolorum ea quaerat nulla qui iusto.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1104, 5, 1, '100', 'Qui nam quia impedit esse.', 7000.00, 0, 2, 'Et sed sit consequatur temporibus in.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1105, 5, 1, '101', 'Et et quos quia porro.', 6000.00, 0, 1, 'Et quos in officia non consectetur voluptatem ut.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1106, 5, 1, '102', 'Et et quas quae voluptas.', 5000.00, 0, 4, 'Tenetur nisi cum commodi autem numquam sit.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1107, 5, 1, '103', 'Ut qui magni hic non sit.', 8000.00, 0, 1, 'Facere quo aut ipsam aut magnam.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1108, 5, 1, '104', 'Eum in qui quaerat aut.', 1000.00, 0, 6, 'Illum qui corrupti maiores.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1109, 5, 1, '105', 'Esse et id provident qui aut.', 0.00, 0, 3, 'Quibusdam quae quos voluptas error et et illum.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1110, 5, 1, '106', 'Recusandae est a aut.', 4000.00, 0, 6, 'Nam voluptate quis deleniti quas.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1111, 5, 1, '107', 'Ad pariatur est rem iste ab.', 3000.00, 0, 1, 'Consectetur itaque fugiat tempore fugit neque.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1112, 5, 1, '108', 'Ea nobis corrupti amet.', 5000.00, 0, 0, 'Aliquam dolorem accusamus ex sit.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1113, 5, 1, '109', 'Omnis nihil repellat qui aut.', 3000.00, 0, 8, 'Quae possimus maiores omnis.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1114, 5, 1, '110', 'Quo consectetur et odio non.', 2000.00, 0, 9, 'Quas ea delectus necessitatibus.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1115, 5, 1, '111', 'Ipsum at sed omnis quae.', 5000.00, 0, 6, 'Ex maxime nam tenetur dolores ab neque.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1116, 5, 1, '112', 'Provident ut sed qui ad.', 8000.00, 0, 8, 'Voluptas nisi sapiente et expedita qui.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1117, 5, 1, '113', 'Iste in et eos explicabo qui.', 8000.00, 0, 1, 'Enim dicta soluta ut consequuntur voluptates.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1118, 5, 1, '114', 'Facilis maiores et quo omnis.', 7000.00, 0, 3, 'Enim vel distinctio consectetur hic nostrum.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1119, 5, 1, '115', 'Laborum qui voluptates et et.', 9000.00, 0, 8, 'Molestias nihil accusamus rerum.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1120, 5, 1, '116', 'Quia ullam sapiente est.', 2000.00, 0, 0, 'Ab distinctio fugit eligendi.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1121, 5, 1, '117', 'Ut nostrum expedita quam.', 5000.00, 0, 6, 'Ipsum quos dolorem culpa quo quam.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1122, 5, 1, '118', 'Et quia necessitatibus quasi.', 4000.00, 0, 6, 'Quas laborum impedit et ex modi.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1123, 5, 1, '119', 'Aliquam ullam minus fuga est.', 3000.00, 0, 2, 'Et alias harum harum ullam.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1124, 5, 1, '120', 'Cumque ut eum et cumque.', 2000.00, 0, 3, 'Ut neque culpa consequatur consequuntur ipsa.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1125, 5, 1, '121', 'Temporibus sint vitae amet.', 4000.00, 0, 8, 'A occaecati est nemo harum doloremque.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1126, 5, 1, '122', 'Eum doloribus adipisci omnis.', 9000.00, 0, 9, 'Qui rerum cumque nisi sunt.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1127, 5, 1, '123', 'Velit ea et neque.', 9000.00, 0, 7, 'In deleniti optio aliquam nulla.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1128, 5, 1, '124', 'Quia blanditiis minus ipsam.', 9000.00, 0, 4, 'Omnis sit voluptatem quia voluptatem.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1129, 5, 1, '125', 'Et magni sunt ipsam.', 0.00, 0, 7, 'Quod nulla ut ab suscipit unde minus quisquam.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1130, 5, 1, '126', 'Sed nulla est quis.', 3000.00, 0, 5, 'Similique dolorem rem expedita debitis qui.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1131, 5, 1, '127', 'Rerum quasi non et cum id.', 0.00, 0, 5, 'Magni sunt sit facilis ut est minus unde quod.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1132, 5, 1, '128', 'Ea et rerum voluptas qui.', 0.00, 0, 1, 'Est numquam qui aut nihil maxime ea.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1133, 5, 1, '129', 'Fugiat tempore et magnam aut.', 8000.00, 0, 9, 'Quaerat perferendis eaque ea illo quam a animi.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1134, 5, 1, '130', 'Eum est odit sint est.', 6000.00, 0, 0, 'Et molestiae iure earum ut quis.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1135, 5, 1, '131', 'Ut doloribus dolor ut.', 0.00, 0, 4, 'Qui numquam aut pariatur est fugit.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1136, 5, 1, '132', 'Vero et sit sint ipsa.', 9000.00, 0, 4, 'Sint et maiores dolor soluta est eveniet.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1137, 5, 1, '133', 'Voluptas ut amet quis et.', 8000.00, 0, 0, 'Necessitatibus ut nulla distinctio.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1138, 5, 1, '134', 'Et ut quod ex.', 3000.00, 0, 0, 'Asperiores deleniti et consequatur iste.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1139, 5, 1, '135', 'Sint est est tempore.', 9000.00, 0, 8, 'Vel et aliquam nihil et.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1140, 5, 1, '136', 'Culpa est est provident.', 5000.00, 0, 9, 'Assumenda et nisi numquam non optio.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1141, 5, 1, '137', 'Illum optio repellendus illo.', 2000.00, 0, 5, 'Eligendi ea eum in debitis odit.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1142, 5, 1, '138', 'Hic non at autem.', 8000.00, 0, 2, 'Ut officia dolor cumque quod dolorum nulla.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1143, 5, 1, '139', 'Quia aperiam earum qui qui.', 7000.00, 0, 2, 'Commodi sint provident ipsa quia porro et.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1144, 5, 1, '140', 'Molestias quos ea facere.', 2000.00, 0, 9, 'Quaerat nostrum ut omnis.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1145, 5, 1, '141', 'Et rerum sunt quas nisi.', 9000.00, 0, 1, 'Aut voluptatum sed recusandae possimus.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1146, 5, 1, '142', 'Molestiae vitae numquam quia.', 7000.00, 0, 6, 'Magnam recusandae et natus culpa quo omnis.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1147, 5, 1, '143', 'Est sit omnis dolores.', 3000.00, 0, 3, 'Et ducimus nostrum atque quo quia.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1148, 5, 1, '144', 'Eum quis animi ea rerum quia.', 5000.00, 0, 2, 'Ipsa suscipit voluptatem optio corporis.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1149, 5, 1, '145', 'Aperiam id autem amet aut.', 9000.00, 0, 7, 'Suscipit libero tempore earum a.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1150, 5, 1, '146', 'Optio nemo et atque rem.', 2000.00, 0, 6, 'Dolorum quisquam sequi eos perspiciatis.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1151, 5, 1, '147', 'In ut molestiae eius ducimus.', 3000.00, 0, 6, 'Amet tempora porro pariatur placeat amet.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1152, 5, 1, '148', 'Et nisi sed occaecati.', 2000.00, 0, 6, 'Officia esse nam quidem qui totam ut.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1153, 5, 1, '149', 'Ea repellendus vel sunt aut.', 3000.00, 0, 3, 'Sequi impedit deleniti quo.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1154, 5, 1, '150', 'Id eius odit et consequatur.', 3000.00, 0, 1, 'Illum quaerat optio numquam perferendis odit.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1155, 5, 1, '151', 'Fuga esse ducimus sed et.', 1000.00, 0, 0, 'Mollitia non ipsum nemo.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1156, 5, 1, '152', 'Voluptates nam sit qui.', 4000.00, 0, 0, 'Non quia expedita eligendi ex voluptas molestias.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1157, 5, 1, '153', 'Qui et culpa ipsam provident.', 1000.00, 0, 3, 'Vel iusto veniam similique ipsa.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1158, 5, 1, '154', 'Quae non eos voluptates.', 7000.00, 0, 3, 'Quasi ea voluptas amet possimus.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1159, 5, 1, '155', 'Et vero similique officia.', 8000.00, 0, 5, 'Quo facere mollitia autem ab autem aperiam.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1160, 5, 1, '156', 'Veritatis aut dicta mollitia.', 7000.00, 0, 1, 'Eos velit sed omnis vel.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1161, 5, 1, '157', 'Maiores optio nam quam.', 6000.00, 0, 1, 'Autem accusamus pariatur delectus officiis.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1162, 5, 1, '158', 'Ducimus dolor enim ab amet.', 2000.00, 0, 9, 'Ea aperiam animi assumenda quia et.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1163, 5, 1, '159', 'Eum atque enim mollitia ea.', 2000.00, 0, 6, 'Et aut voluptas suscipit.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1164, 5, 1, '160', 'Ex laudantium fugiat iste.', 8000.00, 0, 2, 'Perferendis ut illo maxime voluptate.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1165, 5, 1, '161', 'Dolor et vero sit corrupti.', 6000.00, 0, 9, 'Reprehenderit nihil rerum mollitia.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1166, 5, 1, '162', 'Non itaque ea qui non rerum.', 0.00, 0, 6, 'Aut et et enim voluptates voluptatem molestiae.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1167, 5, 1, '163', 'Sequi aliquam quis alias qui.', 2000.00, 0, 3, 'Id omnis omnis aut eum non ipsa rerum.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1168, 5, 1, '164', 'Eaque ut nam aliquam ea.', 6000.00, 0, 5, 'Qui qui earum non nihil.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1169, 5, 1, '165', 'Sunt saepe ullam sunt.', 0.00, 0, 2, 'Beatae excepturi aliquid expedita veritatis ut.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1170, 5, 1, '166', 'Et ratione quia quam aliquam.', 8000.00, 0, 1, 'Sequi qui ipsa placeat non quisquam consequatur.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1171, 5, 1, '167', 'Voluptas dolor et qui velit.', 2000.00, 0, 1, 'Sequi omnis consequatur non dolorem quis placeat.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1172, 5, 1, '168', 'Voluptas nisi quam officia.', 3000.00, 0, 6, 'Esse atque in autem qui.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1173, 5, 1, '169', 'Aut eos cumque et blanditiis.', 0.00, 0, 6, 'Non sunt et qui quasi ut.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1174, 5, 1, '170', 'Sapiente et sint nihil dicta.', 3000.00, 0, 7, 'Impedit quis fugiat animi et voluptate.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1175, 5, 1, '171', 'Quos ut odit id eius dolore.', 0.00, 0, 0, 'Provident qui maxime unde velit.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1176, 5, 1, '172', 'Non inventore ad natus eos.', 2000.00, 0, 8, 'Porro omnis similique quo tempora quo corporis.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1177, 5, 1, '173', 'Tenetur maxime odio ab et.', 8000.00, 0, 5, 'Hic assumenda ullam nihil nulla accusamus.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1178, 5, 1, '174', 'Ut aut rerum totam.', 6000.00, 0, 3, 'Animi nisi veniam eos quidem neque.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1179, 5, 1, '175', 'Eos sit distinctio et.', 7000.00, 0, 4, 'Iusto repellendus vel quo inventore enim enim.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1180, 5, 1, '176', 'Aliquam alias rerum aut.', 2000.00, 0, 0, 'Quasi est cumque reprehenderit id odio.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1181, 5, 1, '177', 'Dolorum est qui ut.', 5000.00, 0, 4, 'Autem illum in enim repudiandae et sed ea.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1182, 5, 1, '178', 'Odit harum totam rerum.', 8000.00, 0, 6, 'Eaque numquam nihil quae.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1183, 5, 1, '179', 'Maiores expedita qui autem.', 5000.00, 0, 7, 'Minima tempora voluptatem ad aut dolores.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1184, 5, 1, '180', 'Sed aliquid qui consequuntur.', 4000.00, 0, 4, 'Ipsum minima sunt nobis et beatae.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1185, 5, 1, '181', 'Maxime dolore eum amet.', 6000.00, 0, 3, 'Libero debitis non quod excepturi.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1186, 5, 1, '182', 'Natus optio eius qui.', 1000.00, 0, 6, 'A iusto repudiandae exercitationem et animi.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1187, 5, 1, '183', 'Et dignissimos qui sit.', 8000.00, 0, 7, 'Sit vel ducimus ea soluta id ratione aut.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1188, 5, 1, '184', 'In ab sequi distinctio.', 1000.00, 0, 8, 'Nobis qui cupiditate iusto et.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1189, 5, 1, '185', 'Quia qui deleniti ipsum ab.', 8000.00, 0, 5, 'Deserunt vero quo officia qui omnis et est.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1190, 5, 1, '186', 'Enim et dolorem ut.', 9000.00, 0, 6, 'Qui hic ea iure sint eaque blanditiis ab ipsa.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1191, 5, 1, '187', 'Nostrum dolorem quos et.', 1000.00, 0, 7, 'Ab quae fuga sed perferendis unde.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1192, 5, 1, '188', 'Recusandae et quaerat ut.', 1000.00, 0, 7, 'Natus iure sapiente nihil non consequatur.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1193, 5, 1, '189', 'Quas dicta unde ut.', 9000.00, 0, 0, 'Ipsam est quia reprehenderit repellendus.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1194, 5, 1, '190', 'Sed sint sunt eos doloremque.', 6000.00, 0, 0, 'Nihil excepturi odit vitae incidunt a.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1195, 5, 1, '191', 'Ipsa qui cupiditate corrupti.', 7000.00, 0, 6, 'Illo sunt ut quis sed.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1196, 5, 1, '192', 'Enim neque consequatur nihil.', 9000.00, 0, 7, 'Sed maiores aperiam error culpa.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1197, 5, 1, '193', 'Sit et quo sunt praesentium.', 6000.00, 0, 6, 'Hic animi commodi in quia voluptates.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1198, 5, 1, '194', 'Molestias et vel aperiam quo.', 8000.00, 0, 2, 'Eveniet laboriosam non suscipit placeat.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1199, 5, 1, '195', 'Aut aut rem et dicta.', 7000.00, 0, 9, 'Molestiae ex adipisci cupiditate qui.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1200, 5, 1, '196', 'Fugiat non cumque nihil.', 5000.00, 0, 8, 'Quas perspiciatis provident consequatur totam.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1201, 5, 1, '197', 'Ex dolorum nisi velit.', 9000.00, 0, 6, 'Ab unde iusto ullam asperiores itaque et illo.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1202, 5, 1, '198', 'Et sint aut ducimus odit.', 2000.00, 0, 9, 'Quasi corrupti possimus sit incidunt.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1203, 5, 1, '199', 'Eum praesentium ex adipisci.', 5000.00, 0, 1, 'Voluptas eum enim id est consectetur voluptas.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1204, 5, 1, '200', 'Est sit voluptatum et quae.', 5000.00, 0, 6, 'Numquam id ullam sunt nobis aliquam minima.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1205, 5, 1, '201', 'Ea fuga sunt laudantium.', 9000.00, 0, 0, 'Sint autem quidem et.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1206, 5, 1, '202', 'Fugit sit aut ut.', 8000.00, 0, 8, 'Vitae id harum aut eos.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1207, 5, 1, '203', 'Nam omnis maiores vero.', 4000.00, 0, 0, 'Neque ea ut blanditiis aut ut.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1208, 5, 1, '204', 'Eos laborum et qui in.', 0.00, 0, 7, 'Accusamus qui qui voluptatum cumque.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1209, 5, 1, '205', 'Asperiores similique cum et.', 5000.00, 0, 4, 'Illo repellendus nihil consequatur doloremque.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1210, 5, 1, '206', 'Ab sed molestias sed.', 3000.00, 0, 3, 'Suscipit a doloribus et voluptatem.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1211, 5, 1, '207', 'Pariatur dolore ea iste.', 7000.00, 0, 5, 'Est quam placeat aperiam voluptatem aut error.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1212, 5, 1, '208', 'Quo et quia vitae nam et.', 0.00, 0, 3, 'Sed fuga impedit tempore praesentium.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1213, 5, 1, '209', 'Et corrupti hic officiis.', 5000.00, 0, 7, 'Est doloribus et quis iusto.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1214, 5, 1, '210', 'Earum ut recusandae a.', 5000.00, 0, 5, 'Sunt temporibus quia dolorem harum totam.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1215, 5, 1, '211', 'Libero esse non ut et culpa.', 1000.00, 0, 7, 'Architecto voluptas mollitia quaerat sunt quod.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1216, 5, 1, '212', 'Ut sit ut facilis quae qui.', 9000.00, 0, 0, 'Corrupti consequatur dignissimos vero sint.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1217, 5, 1, '213', 'Non et fugit pariatur.', 0.00, 0, 1, 'Aut similique ut voluptatum aspernatur.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1218, 5, 1, '214', 'Sit nesciunt impedit quo.', 6000.00, 0, 4, 'Ut ipsum cupiditate cupiditate veniam.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1219, 5, 1, '215', 'Quis quo quia et est est nam.', 9000.00, 0, 7, 'Et ut sed id asperiores eveniet.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1220, 5, 1, '216', 'Maiores ad nihil optio.', 8000.00, 0, 3, 'Vel pariatur occaecati quibusdam quis.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1221, 5, 1, '217', 'Ex quas qui est placeat quis.', 0.00, 0, 5, 'Vitae fugit numquam officiis.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1222, 5, 1, '218', 'Quos et commodi dicta.', 1000.00, 0, 7, 'Sequi ex ipsa debitis ipsum et id ex.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1223, 5, 1, '219', 'Rem quas laboriosam ex id.', 7000.00, 0, 8, 'Et unde atque enim quae maiores omnis.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1224, 5, 1, '220', 'Quasi voluptates aut aperiam.', 1000.00, 0, 0, 'Maiores dolores eius suscipit quia.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1225, 5, 1, '221', 'Sed iure harum non accusamus.', 5000.00, 0, 4, 'Non aut tenetur aut esse sunt tempore quisquam.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1226, 5, 1, '222', 'Ratione aliquam at sit.', 7000.00, 0, 3, 'Eveniet earum eos et ipsum.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1227, 5, 1, '223', 'Voluptas eos corporis quasi.', 4000.00, 0, 2, 'Qui qui blanditiis adipisci hic.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1228, 5, 1, '224', 'Culpa libero aperiam ea.', 5000.00, 0, 1, 'Omnis recusandae fugiat voluptas rerum.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1229, 5, 1, '225', 'Dolore accusamus vel totam.', 3000.00, 0, 3, 'Ut in minus maxime repudiandae voluptas.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1230, 5, 1, '226', 'Et ratione in illum corrupti.', 4000.00, 0, 6, 'Ipsum nam ullam itaque minima dolores eaque aut.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1231, 5, 1, '227', 'Quia eum praesentium aperiam.', 6000.00, 0, 5, 'Nam qui fuga veniam velit fugit iusto et fugiat.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1232, 5, 1, '228', 'Qui sed eos omnis sit sint.', 7000.00, 0, 9, 'Eligendi ut aspernatur nobis nulla vel harum et.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1233, 5, 1, '229', 'Qui et hic in eius vero.', 1000.00, 0, 7, 'Quisquam sed sed deserunt placeat quidem nulla.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1234, 5, 1, '230', 'Dolorem ab autem asperiores.', 6000.00, 0, 2, 'Omnis natus ut molestiae corporis.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1235, 5, 1, '231', 'Et et quas aut eum ut.', 4000.00, 0, 8, 'Deleniti ipsa dolor nulla ut.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1236, 5, 1, '232', 'Nulla non vel modi similique.', 7000.00, 0, 7, 'Magnam eum quia voluptate.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1237, 5, 1, '233', 'In a impedit id quia.', 5000.00, 0, 5, 'Sunt id odio dolores aut odit fugiat dolorum.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1238, 5, 1, '234', 'Et vel neque dolore.', 7000.00, 0, 4, 'Natus in reiciendis asperiores sint possimus.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1239, 5, 1, '235', 'Vel amet eum molestiae nemo.', 7000.00, 0, 5, 'Quod tempora ea dolores libero.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1240, 5, 1, '236', 'Fuga et neque iste id.', 4000.00, 0, 2, 'Aut reiciendis aut et est.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1241, 5, 1, '237', 'Autem dolor aut eos.', 5000.00, 0, 6, 'Velit consequatur libero incidunt ducimus.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1242, 5, 1, '238', 'Sequi fugit aliquid amet.', 2000.00, 0, 2, 'Id dolorum facilis illum optio.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1243, 5, 1, '239', 'Ut iure aut quae.', 3000.00, 0, 0, 'Ea explicabo quo dolorum consectetur.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1244, 5, 1, '240', 'Aut et quod esse.', 7000.00, 0, 9, 'Deserunt in magni omnis soluta non.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1245, 5, 1, '241', 'Eos aliquid qui aut.', 7000.00, 0, 0, 'Unde et molestias dolore placeat maiores optio.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1246, 5, 1, '242', 'Pariatur et dolorem est ipsa.', 6000.00, 0, 3, 'Non dolor quia sunt et fugiat.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1247, 5, 1, '243', 'Est omnis quod ut rem id sed.', 0.00, 0, 9, 'Nostrum quo ad facilis quo autem omnis ipsam.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1248, 5, 1, '244', 'At aut minus quisquam et.', 3000.00, 0, 0, 'Deserunt quam sit perferendis.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1249, 5, 1, '245', 'Mollitia quia velit soluta.', 4000.00, 0, 4, 'Autem et sint mollitia laboriosam velit.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1250, 5, 1, '246', 'Nemo velit amet id a velit.', 6000.00, 0, 9, 'Quod et molestiae eum dolorem nesciunt ad.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1251, 5, 1, '247', 'Non quis sequi corporis.', 4000.00, 0, 1, 'Voluptates autem dolore aspernatur aut.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1252, 5, 1, '248', 'Praesentium et et nemo ea.', 3000.00, 0, 3, 'Est iusto enim officiis magni.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1253, 5, 1, '249', 'Modi occaecati hic vel et.', 7000.00, 0, 3, 'Sed voluptatibus sapiente adipisci quidem.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1254, 5, 1, '250', 'Rerum quasi quasi omnis.', 4000.00, 0, 1, 'Ipsa maxime qui fugit esse laborum fugiat.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1255, 5, 1, '251', 'Nobis autem enim repellendus.', 1000.00, 0, 6, 'Est dolorem ut quasi consectetur facere rerum.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1256, 5, 1, '252', 'Ipsum a eius ducimus.', 8000.00, 0, 7, 'Excepturi quia quae iste qui vel et.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1257, 5, 1, '253', 'Et illum quia nesciunt sint.', 8000.00, 0, 8, 'Ut occaecati hic hic non qui dolorem.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1258, 5, 1, '254', 'Dolor hic iste repellendus.', 5000.00, 0, 4, 'Ipsa nostrum velit reprehenderit assumenda.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1259, 5, 1, '255', 'Ea est ipsum nemo fugiat non.', 0.00, 0, 4, 'Labore rerum nemo odio est.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1260, 5, 1, '256', 'Omnis enim omnis laboriosam.', 2000.00, 0, 8, 'Autem natus et ut ut magni.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1261, 5, 1, '257', 'Est est suscipit et ratione.', 3000.00, 0, 7, 'Facere qui fugit assumenda quasi nobis officia.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1262, 5, 1, '258', 'Incidunt quia vitae ea et.', 7000.00, 0, 1, 'Reprehenderit necessitatibus qui occaecati.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1263, 5, 1, '259', 'Quam quia quis voluptas.', 5000.00, 0, 8, 'Voluptatum et perferendis repudiandae est.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1264, 5, 1, '260', 'Est quaerat et enim.', 4000.00, 0, 7, 'Et quibusdam unde sed cumque.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1265, 5, 1, '261', 'Vel eum et sed commodi.', 6000.00, 0, 5, 'Consequatur veniam hic ullam non.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1266, 5, 1, '262', 'Maxime ut iste ducimus enim.', 7000.00, 0, 6, 'Odio et enim molestiae et.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1267, 5, 1, '263', 'Quo nam enim cumque.', 6000.00, 0, 9, 'Doloribus neque ut et perferendis distinctio.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1268, 5, 1, '264', 'Et praesentium quia amet ea.', 6000.00, 0, 0, 'Quibusdam id et cupiditate quia.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1269, 5, 1, '265', 'Tenetur minima qui sit rerum.', 6000.00, 0, 2, 'Nemo culpa illum et.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1270, 5, 1, '266', 'Natus tempore ut id.', 9000.00, 0, 2, 'Odio saepe aut dolore saepe nostrum enim.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1271, 5, 1, '267', 'Fugiat id quo nihil illum.', 5000.00, 0, 2, 'Aliquam assumenda quaerat maiores id dolore.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1272, 5, 1, '268', 'Sed sunt consequatur alias.', 8000.00, 0, 8, 'Qui repellendus aperiam ut ad occaecati et.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1273, 5, 1, '269', 'Corporis ex nam debitis.', 0.00, 0, 2, 'Non voluptatibus reprehenderit aut ipsum maxime.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1274, 5, 1, '270', 'Sed aut rerum enim et optio.', 3000.00, 0, 4, 'Et sed rerum velit officiis ipsa non.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1275, 5, 1, '271', 'Atque deserunt et quia eaque.', 7000.00, 0, 7, 'Temporibus in facilis natus dolores.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1276, 5, 1, '272', 'Sit sit temporibus accusamus.', 2000.00, 0, 7, 'Nesciunt porro laudantium eveniet.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1277, 5, 1, '273', 'Ut consequatur tempore eius.', 6000.00, 0, 7, 'Nesciunt et similique voluptatem voluptate.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1278, 5, 1, '274', 'Nihil in quis reprehenderit.', 8000.00, 0, 9, 'Reprehenderit mollitia dignissimos ut pariatur.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1279, 5, 1, '275', 'Quibusdam dolor sit non aut.', 3000.00, 0, 3, 'Et omnis exercitationem pariatur.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1280, 5, 1, '276', 'Enim dolor culpa vel ullam.', 0.00, 0, 5, 'Quam ipsum natus quibusdam nesciunt hic.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1281, 5, 1, '277', 'Ullam et dignissimos velit.', 6000.00, 0, 8, 'Qui accusamus quia impedit.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1282, 5, 1, '278', 'Vel nisi autem et.', 4000.00, 0, 8, 'Itaque quo non quidem deserunt quisquam est illo.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1283, 5, 1, '279', 'In aut in id numquam ex.', 0.00, 0, 0, 'Maxime totam autem ea et molestias.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1284, 5, 1, '280', 'Et repudiandae in inventore.', 1000.00, 0, 9, 'Mollitia sunt ipsam aliquid aut expedita et.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1285, 5, 1, '281', 'Omnis officiis omnis cum et.', 1000.00, 0, 2, 'Est ut nulla aspernatur fugit.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1286, 5, 1, '282', 'Sit saepe non suscipit ut.', 0.00, 0, 9, 'Consequuntur cum tenetur alias quae.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1287, 5, 1, '283', 'Ut maxime saepe commodi quia.', 1000.00, 0, 5, 'Aliquid et cumque aperiam.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1288, 5, 1, '284', 'Vel sit id non et dolore sed.', 8000.00, 0, 3, 'Voluptatibus numquam autem ut.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1289, 5, 1, '285', 'Est sunt modi hic sed.', 2000.00, 0, 0, 'Magnam id iure possimus minus et qui.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1290, 5, 1, '286', 'Et at quis hic dolores.', 7000.00, 0, 5, 'Aut non iusto odit doloribus magni rerum.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1291, 5, 1, '287', 'Illum magnam optio illum et.', 5000.00, 0, 8, 'Dolor magni ipsam sunt et consequatur.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1292, 5, 1, '288', 'Et eius qui aliquam natus.', 6000.00, 0, 3, 'Et architecto adipisci iusto voluptates.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1293, 5, 1, '289', 'Doloribus nam enim qui.', 7000.00, 0, 7, 'Id et nihil provident accusantium quo.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1294, 5, 1, '290', 'Aut ad cum itaque deserunt.', 0.00, 0, 3, 'Suscipit sit illum omnis sed a.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1295, 5, 1, '291', 'Ipsum rerum odit non rem non.', 8000.00, 0, 0, 'Ea rerum nisi voluptatem.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1296, 5, 1, '292', 'Et harum minus illo ex.', 3000.00, 0, 0, 'Et eaque ut nobis voluptatem ea quae.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1297, 5, 1, '293', 'Quia veniam non ipsam illo.', 1000.00, 0, 1, 'Natus vel fuga omnis aut dolor perspiciatis.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1298, 5, 1, '294', 'Et quae non quasi eos.', 1000.00, 0, 7, 'Non ea aut quis eligendi quas quam dolore.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1299, 5, 1, '295', 'Sunt quisquam eos illo quia.', 5000.00, 0, 7, 'Tempora non atque natus tenetur unde ex eos.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1300, 5, 1, '296', 'Repellendus et nemo velit.', 8000.00, 0, 1, 'Rerum sunt unde eos qui iure possimus.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1301, 5, 1, '297', 'Unde ipsum est quia et.', 3000.00, 0, 0, 'Odio est quo impedit illum vel possimus corrupti.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1302, 5, 1, '298', 'Ad deleniti quas quidem.', 2000.00, 0, 9, 'Vel recusandae eum iste ratione ipsum qui.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1303, 5, 1, '299', 'Aperiam delectus sequi et.', 8000.00, 0, 4, 'A molestias vel non occaecati numquam qui.', 'www///', '1', 3, 'ninguno', NULL, NULL),
	(1304, 5, 1, '300', 'Libero neque beatae quidem.', 4000.00, 0, 9, 'Sapiente beatae omnis at quidem.', 'www///', '1', 3, 'ninguno', NULL, NULL);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;

-- Volcando estructura para tabla devian.productos_similar_comparar
CREATE TABLE IF NOT EXISTS `productos_similar_comparar` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `producto_id` bigint(20) unsigned DEFAULT NULL,
  `tipo` varchar(1) CHARACTER SET latin1 NOT NULL DEFAULT 'C',
  `producto_id_cs` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `producto_sc_producto_id_cs__foreign` (`producto_id_cs`),
  KEY `producto_sc_producto_id_foreign` (`producto_id`),
  CONSTRAINT `producto_sc_producto_id_cs__foreign` FOREIGN KEY (`producto_id_cs`) REFERENCES `productos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `producto_sc_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='tabla para referenciar id de producto y hacer  comparaciones con otros productos de la misma gama o intercambiables. Tambièn para hacer sugerencias de productos similares o accesorios. el atributo TIPO indicara si es comparaciòn o sugerencia. C/S';

-- Volcando datos para la tabla devian.productos_similar_comparar: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `productos_similar_comparar` DISABLE KEYS */;
/*!40000 ALTER TABLE `productos_similar_comparar` ENABLE KEYS */;

-- Volcando estructura para tabla devian.producto_has_image
CREATE TABLE IF NOT EXISTS `producto_has_image` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `producto_id` bigint(20) NOT NULL DEFAULT '0',
  `path` varchar(300) CHARACTER SET latin1 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `path` (`path`),
  KEY `producto_id` (`producto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla devian.producto_has_image: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `producto_has_image` DISABLE KEYS */;
INSERT INTO `producto_has_image` (`id`, `producto_id`, `path`, `created_at`, `updated_at`) VALUES
	(1, 39, 'productoImagenes/1626220847DSC00729.JPG', '2021-07-14 00:00:47', '2021-07-14 00:00:47'),
	(2, 39, 'productoImagenes/1626220847DSC00730.JPG', '2021-07-14 00:00:47', '2021-07-14 00:00:47'),
	(3, 39, 'productoImagenes/1626220847DSC00731.JPG', '2021-07-14 00:00:47', '2021-07-14 00:00:47'),
	(4, 39, 'productoImagenes/1626220847DSC00732.JPG', '2021-07-14 00:00:47', '2021-07-14 00:00:47'),
	(5, 39, 'productoImagenes/1626220847DSC00733.JPG', '2021-07-14 00:00:47', '2021-07-14 00:00:47'),
	(6, 39, 'productoImagenes/1626220847DSC00734.JPG', '2021-07-14 00:00:47', '2021-07-14 00:00:47');
/*!40000 ALTER TABLE `producto_has_image` ENABLE KEYS */;

-- Volcando estructura para tabla devian.tipo_documentos
CREATE TABLE IF NOT EXISTS `tipo_documentos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET latin1 NOT NULL,
  `operacion` char(1) CHARACTER SET latin1 NOT NULL,
  `descripcion` longtext CHARACTER SET latin1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla devian.tipo_documentos: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_documentos` DISABLE KEYS */;
INSERT INTO `tipo_documentos` (`id`, `nombre`, `operacion`, `descripcion`, `created_at`, `updated_at`) VALUES
	(1, 'Factura', '1', '<p>Facturas de Compras<br></p>', '2021-07-29 17:15:20', '2021-08-12 22:59:49'),
	(2, 'Boleta', '1', NULL, '2021-07-29 17:15:15', '2021-07-29 17:15:16'),
	(3, 'Ticket', '1', NULL, '2021-07-29 17:15:40', '2021-07-29 17:15:40'),
	(4, 'RNC', '0', '<p>-ñ-<br></p>', '2021-08-11 09:51:11', '2021-08-12 17:22:33'),
	(5, 'CEDULA', '0', NULL, '2021-08-12 00:08:45', '2021-08-12 00:08:46'),
	(10, 'CEDULA', '2', '<p>Documento Cédula para clientes<br></p>', '2021-08-12 23:00:46', '2021-08-12 23:00:46');
/*!40000 ALTER TABLE `tipo_documentos` ENABLE KEYS */;

-- Volcando estructura para tabla devian.unidad_medidas
CREATE TABLE IF NOT EXISTS `unidad_medidas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) CHARACTER SET latin1 NOT NULL,
  `prefijo` varchar(5) CHARACTER SET latin1 DEFAULT NULL,
  `estado` char(1) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla devian.unidad_medidas: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `unidad_medidas` DISABLE KEYS */;
INSERT INTO `unidad_medidas` (`id`, `nombre`, `prefijo`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 'Unidad', 'Und', '1', NULL, NULL),
	(2, 'Caja', 'Cja', '1', NULL, NULL),
	(3, 'Paquete', 'Pqt', '1', NULL, NULL);
/*!40000 ALTER TABLE `unidad_medidas` ENABLE KEYS */;

-- Volcando estructura para tabla devian.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provincia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla devian.users: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `lname`, `ciudad`, `provincia`, `direccion`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Albert', 'Chamelo', 'Huston', 'West Java', 'Av. Ceballo 189, house b-18', 'albert@gmail.com', NULL, '$2y$10$7G4TEBObz73qlVAyGIdUOe0Di5BMTqhhBYw7WguPN7xCam1RhyaAa', NULL, '2021-07-06 02:59:04', '2021-07-06 02:59:04'),
	(2, 'albert', 'charmelo', 'dfdfd', 'West Java', 'fdg fgd d fdfd f', 'albertcharmelo@gmail.com', NULL, '$2y$10$NWqtRaZF4.cqE3UjBmOYnO2A3w5gnCorP2PRdvNJPyJgpJ2yx6dq2', NULL, '2021-07-10 21:23:10', '2021-07-10 21:23:10');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Volcando estructura para tabla devian.valoraciones
CREATE TABLE IF NOT EXISTS `valoraciones` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `producto_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `fecha` timestamp NOT NULL,
  `puntos` int(1) unsigned NOT NULL,
  `texto` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `valoracion_user_id__foreign` (`user_id`),
  KEY `valoracion_producto_id_foreign` (`producto_id`),
  CONSTRAINT `valoracion_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `valoracion_user_id__foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla devian.valoraciones: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `valoraciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `valoraciones` ENABLE KEYS */;

-- Volcando estructura para tabla devian.ventas
CREATE TABLE IF NOT EXISTS `ventas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cliente_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `tipo_identificacion` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_venta` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_venta` datetime NOT NULL,
  `impuesto` decimal(4,2) NOT NULL,
  `total` decimal(15,2) NOT NULL,
  `estado` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ventas_user_id_foreign` (`user_id`),
  KEY `ventas_cliente_id_foreign` (`cliente_id`),
  CONSTRAINT `ventas_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `personas` (`id`),
  CONSTRAINT `ventas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla devian.ventas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
