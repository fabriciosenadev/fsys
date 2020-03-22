-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.29-0ubuntu0.18.04.1 - (Ubuntu)
-- OS do Servidor:               Linux
-- HeidiSQL Versão:              11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para fsys
DROP DATABASE IF EXISTS `fsys`;
CREATE DATABASE IF NOT EXISTS `fsys` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `fsys`;

-- Copiando estrutura para tabela fsys.categories
DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `applicable` enum('IN','OUT') COLLATE utf8_unicode_ci NOT NULL COMMENT 'IN = ENTRADA, OUT= SAIDA',
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_categories_created_by` (`created_by`),
  CONSTRAINT `fk_categories_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela fsys.categories: ~0 rows (aproximadamente)
DELETE FROM `categories`;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Copiando estrutura para tabela fsys.category_users
DROP TABLE IF EXISTS `category_users`;
CREATE TABLE IF NOT EXISTS `category_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_category_users_created_by` (`created_by`),
  KEY `fk_category_users_id_category` (`id_category`),
  KEY `fk_category_users_id_user` (`id_user`),
  CONSTRAINT `fk_category_users_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_category_users_id_category` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_category_users_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela fsys.category_users: ~0 rows (aproximadamente)
DELETE FROM `category_users`;
/*!40000 ALTER TABLE `category_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `category_users` ENABLE KEYS */;

-- Copiando estrutura para tabela fsys.descriptions
DROP TABLE IF EXISTS `descriptions`;
CREATE TABLE IF NOT EXISTS `descriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_descriptions_id_user` (`created_by`),
  CONSTRAINT `fk_descriptions_id_user` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela fsys.descriptions: ~0 rows (aproximadamente)
DELETE FROM `descriptions`;
/*!40000 ALTER TABLE `descriptions` DISABLE KEYS */;
/*!40000 ALTER TABLE `descriptions` ENABLE KEYS */;

-- Copiando estrutura para tabela fsys.historics
DROP TABLE IF EXISTS `historics`;
CREATE TABLE IF NOT EXISTS `historics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `id_description` int(11) DEFAULT NULL,
  `status` enum('PAID','RECEIVED','PENDING') COLLATE utf8_unicode_ci NOT NULL,
  `id_category` int(11) DEFAULT NULL,
  `id_value` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_historics_created_by` (`created_by`),
  KEY `fk_historics_id_category` (`id_category`),
  KEY `fk_historics_id_values` (`id_value`),
  KEY `fk_historics_id_description` (`id_description`),
  CONSTRAINT `fk_historics_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_historics_id_category` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_historics_id_description` FOREIGN KEY (`id_description`) REFERENCES `descriptions` (`id`),
  CONSTRAINT `fk_historics_id_values` FOREIGN KEY (`id_value`) REFERENCES `values` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela fsys.historics: ~0 rows (aproximadamente)
DELETE FROM `historics`;
/*!40000 ALTER TABLE `historics` DISABLE KEYS */;
/*!40000 ALTER TABLE `historics` ENABLE KEYS */;

-- Copiando estrutura para tabela fsys.houses
DROP TABLE IF EXISTS `houses`;
CREATE TABLE IF NOT EXISTS `houses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `house` varchar(50) NOT NULL,
  `status` enum('EMPTY','BUSY') NOT NULL COMMENT 'A CASA PODE ESTAR OCUPADA OU VAZIA',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela fsys.houses: ~0 rows (aproximadamente)
DELETE FROM `houses`;
/*!40000 ALTER TABLE `houses` DISABLE KEYS */;
/*!40000 ALTER TABLE `houses` ENABLE KEYS */;

-- Copiando estrutura para tabela fsys.house_users
DROP TABLE IF EXISTS `house_users`;
CREATE TABLE IF NOT EXISTS `house_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_house` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_house_users_id_houses` (`id_house`),
  KEY `fk_house_users_id_users` (`id_user`),
  CONSTRAINT `fk_house_users_id_houses` FOREIGN KEY (`id_house`) REFERENCES `houses` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_house_users_id_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela fsys.house_users: ~0 rows (aproximadamente)
DELETE FROM `house_users`;
/*!40000 ALTER TABLE `house_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `house_users` ENABLE KEYS */;

-- Copiando estrutura para tabela fsys.pay_methods
DROP TABLE IF EXISTS `pay_methods`;
CREATE TABLE IF NOT EXISTS `pay_methods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pay_method` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `applicable` enum('WALLET','ACCOUNT','CREDIT') COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pay_method_created_by` (`created_by`),
  CONSTRAINT `fk_pay_method_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela fsys.pay_methods: ~3 rows (aproximadamente)
DELETE FROM `pay_methods`;
/*!40000 ALTER TABLE `pay_methods` DISABLE KEYS */;
INSERT INTO `pay_methods` (`id`, `pay_method`, `applicable`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Dinheiro', 'WALLET', NULL, '2019-11-03 21:21:45', NULL, NULL),
	(2, 'Débito', 'ACCOUNT', NULL, '2019-11-03 21:21:45', NULL, NULL),
	(3, 'Crédito', 'CREDIT', NULL, '2019-11-03 21:21:45', NULL, NULL);
/*!40000 ALTER TABLE `pay_methods` ENABLE KEYS */;

-- Copiando estrutura para tabela fsys.pay_method_historics
DROP TABLE IF EXISTS `pay_method_historics`;
CREATE TABLE IF NOT EXISTS `pay_method_historics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_historic` int(11) DEFAULT NULL,
  `id_pay_method` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pay_method_historics_id_historics` (`id_historic`),
  KEY `fk_pay_method_historics_id_pay_methods` (`id_pay_method`),
  KEY `fk_pay_method_historics_id_users` (`created_by`),
  CONSTRAINT `fk_pay_method_historics_id_historics` FOREIGN KEY (`id_historic`) REFERENCES `historics` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_pay_method_historics_id_pay_methods` FOREIGN KEY (`id_pay_method`) REFERENCES `pay_methods` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_pay_method_historics_id_users` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='relation between historics and pay_methods';

-- Copiando dados para a tabela fsys.pay_method_historics: ~0 rows (aproximadamente)
DELETE FROM `pay_method_historics`;
/*!40000 ALTER TABLE `pay_method_historics` DISABLE KEYS */;
/*!40000 ALTER TABLE `pay_method_historics` ENABLE KEYS */;

-- Copiando estrutura para tabela fsys.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela fsys.users: ~0 rows (aproximadamente)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Copiando estrutura para tabela fsys.user_password_resets
DROP TABLE IF EXISTS `user_password_resets`;
CREATE TABLE IF NOT EXISTS `user_password_resets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_user_password_resets_id_user` (`id_user`),
  CONSTRAINT `fk_user_password_resets_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='geração de tokens para reset de senha de usuário';

-- Copiando dados para a tabela fsys.user_password_resets: ~0 rows (aproximadamente)
DELETE FROM `user_password_resets`;
/*!40000 ALTER TABLE `user_password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_password_resets` ENABLE KEYS */;

-- Copiando estrutura para tabela fsys.values
DROP TABLE IF EXISTS `values`;
CREATE TABLE IF NOT EXISTS `values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` decimal(8,2) NOT NULL DEFAULT '0.00',
  `value_installment` decimal(8,2) DEFAULT NULL,
  `installments` int(11) DEFAULT NULL,
  `current_installment` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_values_id_users` (`created_by`),
  CONSTRAINT `fk_values_id_users` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela fsys.values: ~0 rows (aproximadamente)
DELETE FROM `values`;
/*!40000 ALTER TABLE `values` DISABLE KEYS */;
/*!40000 ALTER TABLE `values` ENABLE KEYS */;

-- Copiando estrutura para view fsys.v_historic
DROP VIEW IF EXISTS `v_historic`;
-- Criando tabela temporária para evitar erros de dependência de VIEW
CREATE TABLE `v_historic` (
	`id` INT(11) NOT NULL,
	`date` DATE NULL,
	`id_description` INT(11) NULL,
	`status` ENUM('PAID','RECEIVED','PENDING') NOT NULL COLLATE 'utf8_unicode_ci',
	`id_value` INT(11) NULL,
	`id_category` INT(11) NULL,
	`category` VARCHAR(50) NOT NULL COLLATE 'utf8_unicode_ci',
	`applicable` ENUM('IN','OUT') NOT NULL COMMENT 'IN = ENTRADA, OUT= SAIDA' COLLATE 'utf8_unicode_ci',
	`description` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`value` DECIMAL(8,2) NOT NULL,
	`value_installment` DECIMAL(8,2) NULL,
	`installments` INT(11) NULL,
	`current_installment` INT(11) NULL,
	`pay_method` VARCHAR(50) NULL COLLATE 'utf8_unicode_ci',
	`pm_applicable` ENUM('WALLET','ACCOUNT','CREDIT') NULL COLLATE 'utf8_unicode_ci',
	`id_pay_method` INT(11) NULL,
	`created_by` INT(11) NULL,
	`created_at` TIMESTAMP NULL
) ENGINE=MyISAM;

-- Copiando estrutura para view fsys.v_historic
-- DROP VIEW IF EXISTS `v_historic`;
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS `v_historic`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_historic` AS select `h`.`id` AS `id`,`h`.`date` AS `date`,`h`.`id_description` AS `id_description`,`h`.`status` AS `status`,`h`.`id_value` AS `id_value`,`h`.`id_category` AS `id_category`,`c`.`category` AS `category`,`c`.`applicable` AS `applicable`,`d`.`description` AS `description`,`v`.`value` AS `value`,`v`.`value_installment` AS `value_installment`,`v`.`installments` AS `installments`,`v`.`current_installment` AS `current_installment`,`pm`.`pay_method` AS `pay_method`,`pm`.`applicable` AS `pm_applicable`,`pmh`.`id_pay_method` AS `id_pay_method`,`h`.`created_by` AS `created_by`,`h`.`created_at` AS `created_at` from (((((`historics` `h` join `categories` `c` on((`c`.`id` = `h`.`id_category`))) join `values` `v` on((`v`.`id` = `h`.`id_value`))) join `descriptions` `d` on((`d`.`id` = `h`.`id_description`))) left join `pay_method_historics` `pmh` on((`pmh`.`id_historic` = `h`.`id`))) left join `pay_methods` `pm` on((`pm`.`id` = `pmh`.`id_pay_method`))) where isnull(`h`.`deleted_at`);

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
