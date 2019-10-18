-- --------------------------------------------------------
-- Servidor:                     localhost
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
DROP DATABASE IF EXISTS `fsys`;
CREATE DATABASE IF NOT EXISTS `fsys` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela fsys.categories: ~3 rows (aproximadamente)
DELETE FROM `categories`;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `category`, `applicable`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'salary', 'IN', NULL, NULL, NULL, NULL);
INSERT INTO `categories` (`id`, `category`, `applicable`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(2, 'transportation', 'OUT', NULL, NULL, NULL, NULL);
INSERT INTO `categories` (`id`, `category`, `applicable`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(3, 'supermarket', 'OUT', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Copiando estrutura para tabela fsys.historics
DROP TABLE IF EXISTS `historics`;
CREATE TABLE IF NOT EXISTS `historics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_category` int(11) NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `id_method` int(11) NOT NULL,
  `value` decimal(8,2) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_historics_created_by` (`created_by`),
  CONSTRAINT `fk_historics_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela fsys.historics: ~0 rows (aproximadamente)
DELETE FROM `historics`;
/*!40000 ALTER TABLE `historics` DISABLE KEYS */;
/*!40000 ALTER TABLE `historics` ENABLE KEYS */;

-- Copiando estrutura para tabela fsys.pay_methods
DROP TABLE IF EXISTS `pay_methods`;
CREATE TABLE IF NOT EXISTS `pay_methods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `method` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
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
INSERT INTO `pay_methods` (`id`, `method`, `applicable`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'money', 'WALLET', NULL, NULL, NULL, NULL);
INSERT INTO `pay_methods` (`id`, `method`, `applicable`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(2, 'debit card', 'ACCOUNT', NULL, NULL, NULL, NULL);
INSERT INTO `pay_methods` (`id`, `method`, `applicable`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(3, 'credit card', 'CREDIT', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `pay_methods` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela fsys.users: ~0 rows (aproximadamente)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'teste', 'teste@teste.com', '123', NULL, NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
