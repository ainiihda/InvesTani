-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.19 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for psbo
CREATE DATABASE IF NOT EXISTS `psbo` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `psbo`;

-- Dumping structure for table psbo.admins
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table psbo.admins: ~2 rows (approximately)
DELETE FROM `admins`;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` (`id`, `username`, `name`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin', '$2y$10$LavtrAGbW8mkig1yCMCvDepvIbAQ3TZZLIRx2W0YN2oVGKhyNy5Jq', NULL, '2018-06-18 23:50:02', '2018-06-18 23:50:02'),
	(4, 'velia_aime11', 'Velia deby rahmawati', '$2y$10$deN/cIa4wEbyV4zyKZfYveNHIt9pzrl8eC9zEGUmajy0xU1yadbM.', NULL, '2018-06-19 13:43:12', '2018-06-23 08:34:06'),
	(5, 'yes', 'vhe', '$2y$10$LfdtlBOvXNrSv1gpqe3dWOJbShe56ukB5P5.4SzchNJyqmqOR2JBW', NULL, '2018-06-23 08:36:05', '2018-06-23 08:36:05');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;

-- Dumping structure for table psbo.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table psbo.categories: ~0 rows (approximately)
DELETE FROM `categories`;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(1, 'tanah', NULL, NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table psbo.investasis
CREATE TABLE IF NOT EXISTS `investasis` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `proyek_id` int(10) unsigned NOT NULL,
  `no_rekening` int(11) DEFAULT NULL,
  `jml_investasi` int(11) NOT NULL,
  `jml_keuntungan` int(11) NOT NULL,
  `konfirmasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `investasis_user_id_foreign` (`user_id`),
  KEY `investasis_proyek_id_foreign` (`proyek_id`),
  CONSTRAINT `investasis_proyek_id_foreign` FOREIGN KEY (`proyek_id`) REFERENCES `proyeks` (`id`),
  CONSTRAINT `investasis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table psbo.investasis: ~5 rows (approximately)
DELETE FROM `investasis`;
/*!40000 ALTER TABLE `investasis` DISABLE KEYS */;
INSERT INTO `investasis` (`id`, `user_id`, `proyek_id`, `no_rekening`, `jml_investasi`, `jml_keuntungan`, `konfirmasi`, `status`, `created_at`, `updated_at`) VALUES
	(9, 1, 2, 333333, 80000, 96000, 'foto/jEeDiOAR0GovqJDnnud0ZE1syWUsNxyhTXbiBE9x.png', 3, '2018-06-19 15:12:32', '2018-06-26 08:23:25'),
	(10, 1, 3, 123412, 200000, 240000, 'foto/eaEqN6wS75jJ3OaEhvyrUZgKBoW700JOhhuCdwLh.png', 4, '2018-06-21 15:30:01', '2018-06-23 06:26:07'),
	(11, 1, 4, 123412, 3000, 3300, NULL, 4, '2018-06-23 06:20:11', '2018-06-23 08:02:07'),
	(12, 1, 3, 333333, 40000, 48000, 'foto/TMAXpNQPsTV3U2yl30lZwQnBnjXnGVXqCKBdjStG.png', 3, '2018-06-23 08:13:11', '2018-06-23 08:19:32'),
	(13, 1, 3, 33333, 12000, 14400, 'foto/NYEGcqKpIVG6ue2Zp6tVvNZmRSLpjdX0cDD5a4df.png', 3, '2018-06-26 08:18:02', '2018-06-26 10:04:37'),
	(14, 1, 3, NULL, 10000, 12000, NULL, 0, '2018-06-26 08:33:36', '2018-06-26 08:33:36'),
	(15, 1, 3, NULL, 10000, 1200088, NULL, 0, '2018-06-26 08:33:45', '2018-06-26 08:33:45'),
	(16, 1, 3, NULL, 10000, 12000, NULL, 0, '2018-06-26 08:36:10', '2018-06-26 08:36:10'),
	(17, 1, 3, NULL, 900000, 1080000, NULL, 0, '2018-06-26 08:40:21', '2018-06-26 08:40:21'),
	(18, 1, 3, 33333, 12000, 14400, 'foto/MTq6APx0VBlSQ8zUg2sYiZM0DkE8vuAcF6S75lka.png', 3, '2018-06-26 10:03:49', '2018-06-26 10:07:28'),
	(19, 1, 2, 123412, 10000, 12000, 'foto/0opQEomqKZNqGDrEUmM5x6s5dhFpFO3wmHcBAD7Z.png', 2, '2018-06-26 10:06:20', '2018-06-26 10:06:43');
/*!40000 ALTER TABLE `investasis` ENABLE KEYS */;

-- Dumping structure for table psbo.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table psbo.migrations: ~6 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(29, '2014_10_12_000000_create_users_table', 1),
	(30, '2014_10_12_100000_create_password_resets_table', 1),
	(31, '2018_04_03_030822_create_categories_table', 1),
	(32, '2018_04_23_080100_create_proyeks_table', 1),
	(33, '2018_04_25_132735_create_investasis_table', 1),
	(34, '2018_06_06_135947_create_admins_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table psbo.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table psbo.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table psbo.proyeks
CREATE TABLE IF NOT EXISTS `proyeks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target_investasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_investasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `foto1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keuntungan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `bukti` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `proyeks_user_id_foreign` (`user_id`),
  KEY `proyeks_category_id_foreign` (`category_id`),
  CONSTRAINT `proyeks_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `proyeks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table psbo.proyeks: ~3 rows (approximately)
DELETE FROM `proyeks`;
/*!40000 ALTER TABLE `proyeks` DISABLE KEYS */;
INSERT INTO `proyeks` (`id`, `user_id`, `category_id`, `nama`, `deskripsi`, `lokasi`, `target_investasi`, `min_investasi`, `deadline`, `foto1`, `foto2`, `foto3`, `foto4`, `keuntungan`, `status`, `bukti`, `created_at`, `updated_at`) VALUES
	(2, 1, 1, 'ciluk behehehehe', 'sgzxgdzgx', 'bogor', '12000', '10000', '2008-11-11', 'foto/q9lpUZ2ROkA9n9QqStyNmnKMnNl2FNR6dMjKpg1f.png', 'foto/iinsHcPk14nQUiW0k5AWbZy3YoJHmKM2J4CYw0YB.jpeg', 'foto/lLGpsG7Yos7cWARHUvo02NE4fxBGGLrEu6XWQYdh.png', 'foto/dCGtclQDPLzru1FtQpHAr5bxTYIuK1nYJDRzQxQX.png', '20', 0, 'foto/clodywXMWmE58vzSrpV8P02XqQamSMUu6b7vwGhr.png', '2018-06-19 13:05:01', '2018-06-20 14:31:53'),
	(3, 1, 1, 'ciluk bahh', 'jcnjmkcnlkcn', 'bogor', '12000', '1200', '2008-11-11', 'foto/BCcoO6LCmSPvnOMuMUbVhwmwEYdrUByfqYj3ZWh3.jpeg', 'foto/iDMLeUgsAXef3VYEbSWGPS2VlJ9OCfItusLVukQT.png', 'foto/mTaLFrOczSGbrg27i2oIu3X6zcjeDIUaYvlR9lXn.png', 'foto/O6VflmkkZ3isxIJVELg23PtoirdSoRO57Nvuvit3.jpeg', '20', 0, 'foto/8PTQn0dlyG1BOC8h3XqjMyffMZVpTz4zvqpZJZ51.png', '2018-06-21 13:46:48', '2018-06-23 06:26:07'),
	(4, 1, 1, 'coba lagi', 'djwkdjkswld', 'banjar', '12000', '1200', '2008-11-11', 'foto/ZIde8LOa587mMItuGRCZNUaOJYf1MD8VrMIo1tmf.jpeg', 'foto/ih5u0CeFnw4ktgtesM4OXYaB6g4KhO85wmAB6sWf.png', 'foto/LcosGHwFT1w3YMq3YEQcv7PIJp3421NXimQ82aA6.png', 'foto/LoT2373CwnRibz6SANYvnFreKfvM0in4q4qWjJHT.jpeg', '10', 2, 'foto/B3FHVLNPnDqN8Hj0DMpX3wXc8Rvzqt10EjwyFgWL.png', '2018-06-21 13:48:48', '2018-06-23 08:02:06'),
	(5, 1, 1, 'iseng', 'cek aja', 'jakarta', '1200000', '12000', '2018-06-28', 'foto/RKmfEY19unogqxrOmHKQja9ceX2dmxZtabYgO068.png', 'foto/vHAkjcxSRpkq2ybbHQPJ1D30kaDc41OcsFveEsMu.png', 'foto/0NAZOjYMJxdgmd8bFl9gpDseNGCViHwKafqaleou.png', 'foto/1NM0t1MBsWqVum2MmrQdz6cXfpzf9q4TqfeqPgQK.png', '20', 0, '0', '2018-06-26 11:19:10', '2018-06-26 11:19:10');
/*!40000 ALTER TABLE `proyeks` ENABLE KEYS */;

-- Dumping structure for table psbo.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table psbo.users: ~0 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`, `no_telp`, `tempat_lahir`, `tanggal_lahir`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'veliadhe', 'velia deby', 'veliaaime@gmail.com', '$2y$10$XU9gvvtJMO2CDSVL15ofK.e517A0cgMCRYcLvrA8QkqBObXOOZ7v.', '083863770057', 'banjarnegara', '11 september 1998', 0, 'rzSP94Oq9mIBihPw7Sv9PrlsEstaVnrgnpvrSq44a99VPPafypPbBrRlusK5', '2018-06-08 05:52:49', '2018-06-08 05:52:49');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
