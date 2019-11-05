-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.27-0ubuntu0.18.04.1 - (Ubuntu)
-- OS do Servidor:               Linux
-- HeidiSQL Versão:              10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para fsys
CREATE DATABASE IF NOT EXISTS `fsys` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `fsys`;

-- Copiando estrutura para tabela fsys.categories
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela fsys.categories: ~7 rows (aproximadamente)
DELETE FROM `categories`;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `category`, `applicable`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Salário', 'IN', 1, '2019-11-04 08:42:19', NULL, NULL),
	(2, 'Alimentação', 'OUT', 1, '2019-11-04 08:42:20', NULL, NULL),
	(3, 'Beleza', 'OUT', 1, '2019-11-04 08:42:20', NULL, NULL),
	(4, 'Educação', 'OUT', 1, '2019-11-04 08:42:20', NULL, NULL),
	(5, 'Lazer', 'OUT', 1, '2019-11-04 08:42:20', NULL, NULL),
	(6, 'Saude', 'OUT', 1, '2019-11-04 08:42:20', NULL, NULL),
	(7, 'Transporte', 'OUT', 1, '2019-11-04 08:42:20', NULL, NULL),
	(8, 'Teste', 'IN', 2, '2019-11-04 09:59:23', NULL, NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Copiando estrutura para tabela fsys.category_users
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela fsys.category_users: ~17 rows (aproximadamente)
DELETE FROM `category_users`;
/*!40000 ALTER TABLE `category_users` DISABLE KEYS */;
INSERT INTO `category_users` (`id`, `id_user`, `id_category`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 1, 1, '2019-11-04 08:42:19', NULL, NULL),
	(2, 1, 2, 1, '2019-11-04 08:42:20', NULL, NULL),
	(3, 1, 3, 1, '2019-11-04 08:42:20', NULL, NULL),
	(4, 1, 4, 1, '2019-11-04 08:42:20', NULL, NULL),
	(5, 1, 5, 1, '2019-11-04 08:42:20', NULL, NULL),
	(6, 1, 6, 1, '2019-11-04 08:42:20', NULL, NULL),
	(7, 1, 7, 1, '2019-11-04 08:42:20', NULL, NULL),
	(8, 2, 1, 2, '2019-11-04 09:54:19', NULL, NULL),
	(9, 2, 2, 2, '2019-11-04 09:54:19', NULL, NULL),
	(10, 2, 3, 2, '2019-11-04 09:54:19', NULL, NULL),
	(11, 2, 4, 2, '2019-11-04 09:54:19', NULL, NULL),
	(12, 2, 5, 2, '2019-11-04 09:54:19', NULL, NULL),
	(13, 2, 6, 2, '2019-11-04 09:54:19', NULL, NULL),
	(14, 2, 7, 2, '2019-11-04 09:54:19', NULL, NULL),
	(15, 2, 8, 2, '2019-11-04 10:08:08', NULL, NULL),
	(16, 1, 8, 1, '2019-11-04 10:11:48', NULL, '2019-11-04 10:34:54'),
	(17, 1, 8, 1, '2019-11-04 10:34:33', NULL, '2019-11-04 10:34:54');
/*!40000 ALTER TABLE `category_users` ENABLE KEYS */;

-- Copiando estrutura para tabela fsys.historics
CREATE TABLE IF NOT EXISTS `historics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` decimal(8,2) NOT NULL,
  `id_category` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_historics_created_by` (`created_by`),
  KEY `fk_historics_id_category` (`id_category`),
  CONSTRAINT `fk_historics_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_historics_id_category` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela fsys.historics: ~0 rows (aproximadamente)
DELETE FROM `historics`;
/*!40000 ALTER TABLE `historics` DISABLE KEYS */;
/*!40000 ALTER TABLE `historics` ENABLE KEYS */;

-- Copiando estrutura para tabela fsys.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='geração de tokens para reset de senha de usuário';

-- Copiando dados para a tabela fsys.password_resets: ~0 rows (aproximadamente)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Copiando estrutura para tabela fsys.pay_methods
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

-- Copiando dados para a tabela fsys.pay_methods: ~2 rows (aproximadamente)
DELETE FROM `pay_methods`;
/*!40000 ALTER TABLE `pay_methods` DISABLE KEYS */;
INSERT INTO `pay_methods` (`id`, `pay_method`, `applicable`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Dinheiro', 'WALLET', NULL, '2019-11-03 21:21:45', NULL, NULL),
	(2, 'Débito', 'ACCOUNT', NULL, '2019-11-03 21:21:45', NULL, NULL),
	(3, 'Crédito', 'CREDIT', NULL, '2019-11-03 21:21:45', NULL, NULL);
/*!40000 ALTER TABLE `pay_methods` ENABLE KEYS */;

-- Copiando estrutura para tabela fsys.pay_method_historics
CREATE TABLE IF NOT EXISTS `pay_method_historics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_historic` int(11) NOT NULL DEFAULT '0',
  `id_pay_method` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pay_method_historics_id_historics` (`id_historic`),
  KEY `fk_pay_method_historics_id_pay_methods` (`id_pay_method`),
  KEY `fk_pay_method_historics_id_users` (`created_by`),
  CONSTRAINT `fk_pay_method_historics_id_historics` FOREIGN KEY (`id_historic`) REFERENCES `historics` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_pay_method_historics_id_pay_methods` FOREIGN KEY (`id_pay_method`) REFERENCES `pay_methods` (`id`),
  CONSTRAINT `fk_pay_method_historics_id_users` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='relation between historics and pay_methods';

-- Copiando dados para a tabela fsys.pay_method_historics: ~0 rows (aproximadamente)
DELETE FROM `pay_method_historics`;
/*!40000 ALTER TABLE `pay_method_historics` DISABLE KEYS */;
/*!40000 ALTER TABLE `pay_method_historics` ENABLE KEYS */;

-- Copiando estrutura para tabela fsys.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela fsys.users: ~2 rows (aproximadamente)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Marcela Cunha Montini', 'teste@teste.com', '$2y$10$Z1lcDnPQwEth2fngqe/ulOcVMYPZ7IBZ387Z6j5BBEEjNZMnYcxm.', '2019-11-04 08:42:19', NULL, NULL),
	(2, 'Felipe Mat', 'teste2@teste.com', '$2y$10$6mNI.Iyx2HlJag/s4r9I6uT/z398cLl4tdLO1h0PmNz3yCkProaU.', '2019-11-04 09:54:19', NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
