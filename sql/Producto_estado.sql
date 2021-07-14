CREATE TABLE `producto_estado` (
	`id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
	`descripcion` VARCHAR(30) NOT NULL DEFAULT '' COLLATE 'latin1_swedish_ci',
	PRIMARY KEY (`id`)
)
COMMENT='Registra los diferentes tipo de estados para el codificador de productos'
COLLATE='utf8mb4_unicode_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1
;


ALTER TABLE `productos`
	CHANGE COLUMN `estado` `estado` BIGINT(20) UNSIGNED NOT NULL AFTER `garantia`,
	ADD CONSTRAINT `productos_estado_foreign` FOREIGN KEY (`estado`) REFERENCES `producto_estado` (`id`);