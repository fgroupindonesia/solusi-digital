-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.6-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_fgi_sistem_solusi_digital_v1
DROP DATABASE IF EXISTS `db_fgi_sistem_solusi_digital_v1`;
CREATE DATABASE IF NOT EXISTS `db_fgi_sistem_solusi_digital_v1` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_fgi_sistem_solusi_digital_v1`;

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_apps
DROP TABLE IF EXISTS `table_apps`;
CREATE TABLE IF NOT EXISTS `table_apps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username_owned` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `apps_name` varchar(50) DEFAULT NULL,
  `descriptions` varchar(50) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `best_screenshot` varchar(50) DEFAULT NULL,
  `privacy_url` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_apps: ~0 rows (approximately)
DELETE FROM `table_apps`;

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_campaign_virtualvisitors
DROP TABLE IF EXISTS `table_campaign_virtualvisitors`;
CREATE TABLE IF NOT EXISTS `table_campaign_virtualvisitors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_campaign_virtualvisitors: ~0 rows (approximately)
DELETE FROM `table_campaign_virtualvisitors`;
INSERT INTO `table_campaign_virtualvisitors` (`id`, `name`, `code`, `username`, `date_created`) VALUES
	(25, 'akhir september 2024', 'QPG6', 'cinta', '2024-09-08 09:04:01');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_cs_map_wa_chat_rotator
DROP TABLE IF EXISTS `table_cs_map_wa_chat_rotator`;
CREATE TABLE IF NOT EXISTS `table_cs_map_wa_chat_rotator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `cs_number` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `region` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_cs_map_wa_chat_rotator: ~2 rows (approximately)
DELETE FROM `table_cs_map_wa_chat_rotator`;
INSERT INTO `table_cs_map_wa_chat_rotator` (`id`, `order_id`, `cs_number`, `country`, `city`, `region`, `date_created`) VALUES
	(3, 3, '89999', 'Indonesia', 'Bandung City', 'Java', '2025-03-21 08:09:42'),
	(4, 3, '089999', 'Indonesia', 'Unknown', 'Unknown', '2025-03-21 08:12:49');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_cs_record_wa_chat_rotator
DROP TABLE IF EXISTS `table_cs_record_wa_chat_rotator`;
CREATE TABLE IF NOT EXISTS `table_cs_record_wa_chat_rotator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `total_cs_numbers` int(11) DEFAULT NULL,
  `last_index` int(11) DEFAULT NULL,
  `date_modified` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_cs_record_wa_chat_rotator: ~1 rows (approximately)
DELETE FROM `table_cs_record_wa_chat_rotator`;
INSERT INTO `table_cs_record_wa_chat_rotator` (`id`, `order_id`, `total_cs_numbers`, `last_index`, `date_modified`) VALUES
	(1, 3, 2, 0, '2025-03-22 09:31:42');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_cs_schedule_wa_chat_rotator
DROP TABLE IF EXISTS `table_cs_schedule_wa_chat_rotator`;
CREATE TABLE IF NOT EXISTS `table_cs_schedule_wa_chat_rotator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `cs_number` varchar(50) DEFAULT NULL,
  `day_mode` enum('all','custom') DEFAULT NULL,
  `days_selected` varchar(200) DEFAULT NULL,
  `hour_open` varchar(5) DEFAULT NULL,
  `hour_closed` varchar(5) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_cs_schedule_wa_chat_rotator: ~3 rows (approximately)
DELETE FROM `table_cs_schedule_wa_chat_rotator`;
INSERT INTO `table_cs_schedule_wa_chat_rotator` (`id`, `order_id`, `cs_number`, `day_mode`, `days_selected`, `hour_open`, `hour_closed`, `date_created`) VALUES
	(1, 1, '084444', 'custom', 'null', '08:00', '12:00', '2025-03-22 01:44:02'),
	(3, 3, '089999', 'custom', '["senin","selasa","rabu","sabtu","minggu"]', '07:00', '20:00', '2025-03-22 02:34:23'),
	(4, 3, '08123455', 'custom', '["selasa","rabu","sabtu"]', '07:00', '22:00', '2025-03-22 03:39:50');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_cs_wa_chat_rotator
DROP TABLE IF EXISTS `table_cs_wa_chat_rotator`;
CREATE TABLE IF NOT EXISTS `table_cs_wa_chat_rotator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `cs_number` varchar(50) DEFAULT NULL,
  `client_target_device` enum('all','android','iphone','laptop') DEFAULT 'all',
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_cs_wa_chat_rotator: ~2 rows (approximately)
DELETE FROM `table_cs_wa_chat_rotator`;
INSERT INTO `table_cs_wa_chat_rotator` (`id`, `order_id`, `cs_number`, `client_target_device`, `date_created`) VALUES
	(18, 3, '089999', 'all', '2025-03-22 03:39:58'),
	(19, 3, '08123455', 'all', '2025-03-22 03:39:58');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_data_virtualvisitors
DROP TABLE IF EXISTS `table_data_virtualvisitors`;
CREATE TABLE IF NOT EXISTS `table_data_virtualvisitors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `campaign_id` int(11) DEFAULT NULL,
  `client_name` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `product_bought` varchar(50) DEFAULT NULL,
  `product_url` text DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `theme_display` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_data_virtualvisitors: ~6 rows (approximately)
DELETE FROM `table_data_virtualvisitors`;
INSERT INTO `table_data_virtualvisitors` (`id`, `order_id`, `campaign_id`, `client_name`, `gender`, `city`, `product_bought`, `product_url`, `username`, `theme_display`, `date_created`) VALUES
	(55, -1, NULL, 'Ujang', 'Lelaki', 'Bandung', 'Kerupuk', 'http://www.kerupuk.com', 'cinta', 'default', '2024-09-01 08:30:23'),
	(56, -1, NULL, 'Sandiono', 'Lelaki', 'Bandung', 'Kerupuk', 'http://www.kerupuk.com', 'cinta', 'default', '2024-09-01 08:51:06'),
	(57, -1, NULL, 'Eko', 'Lelaki', 'Bandung', 'Kerupuk', 'http://www.kerupuk.com', 'cinta', 'default', '2024-09-01 08:51:07'),
	(58, -1, NULL, 'Budi', 'Lelaki', 'Bandung', 'Kerupuk', 'http://www.kerupuk.com', 'cinta', 'default', '2024-09-01 08:51:07'),
	(59, -1, NULL, 'Didin', 'Lelaki', 'Bandung', 'Kerupuk', 'http://www.kerupuk.com', 'cinta', 'default', '2024-09-01 08:51:07'),
	(60, -1, NULL, 'Ujang', 'Lelaki', 'Bandung', 'Kerupuk', 'http://www.kerupuk.com', 'cinta', 'default', '2024-09-01 08:51:07');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_deposits
DROP TABLE IF EXISTS `table_deposits`;
CREATE TABLE IF NOT EXISTS `table_deposits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `amount` int(20) NOT NULL DEFAULT 0,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_deposits: ~9 rows (approximately)
DELETE FROM `table_deposits`;
INSERT INTO `table_deposits` (`id`, `username`, `status`, `amount`, `date_created`) VALUES
	(18, 'kuya', 'cancel', 500000, '2024-08-13 07:56:53'),
	(19, 'cinta', 'purchased', 100000, '2024-08-14 01:08:16'),
	(24, 'cinta', 'purchased', 200000, '2024-09-09 18:38:03'),
	(25, 'cinta', 'purchased', 200000, '2024-09-11 02:30:44'),
	(26, 'coba', 'pending', 100000, '2025-03-08 10:43:08'),
	(27, 'coba', 'pending', 200000, '2025-03-08 11:01:11'),
	(28, 'coba', 'pending', 200000, '2025-03-08 11:02:16'),
	(29, 'coba', 'pending', 100000, '2025-03-08 11:05:44'),
	(30, 'coba', 'pending', 100000, '2025-03-09 02:33:47'),
	(31, 'aziz', 'pending', 500000, '2025-03-19 02:25:54');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_layananmanual
DROP TABLE IF EXISTS `table_layananmanual`;
CREATE TABLE IF NOT EXISTS `table_layananmanual` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_layanan` varchar(50) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `attachment` varchar(200) DEFAULT NULL,
  `username_owned` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` enum('pending','cancelled','completed','in progress') DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_layananmanual: ~1 rows (approximately)
DELETE FROM `table_layananmanual`;
INSERT INTO `table_layananmanual` (`id`, `jenis_layanan`, `quantity`, `attachment`, `username_owned`, `user_id`, `status`, `date_created`) VALUES
	(7, 'format-os-laptop', 22, NULL, 'coba', 22, 'pending', '2025-03-10 01:54:31'),
	(8, 'ketik-dokumen-indonesia', 444, '250310/250310020133_layananmanual.png', 'coba', 22, 'pending', '2025-03-10 02:01:33');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_order_comment
DROP TABLE IF EXISTS `table_order_comment`;
CREATE TABLE IF NOT EXISTS `table_order_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `social_media` varchar(50) NOT NULL DEFAULT '0',
  `url` text NOT NULL,
  `title` varchar(50) NOT NULL DEFAULT '0',
  `package` varchar(50) NOT NULL DEFAULT '0',
  `gender` varchar(50) NOT NULL DEFAULT '0',
  `notes` text NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_comment: ~0 rows (approximately)
DELETE FROM `table_order_comment`;

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_order_follow_marketplace
DROP TABLE IF EXISTS `table_order_follow_marketplace`;
CREATE TABLE IF NOT EXISTS `table_order_follow_marketplace` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marketplace` varchar(50) NOT NULL DEFAULT '0',
  `url` text NOT NULL,
  `shop_name` varchar(50) NOT NULL DEFAULT '0',
  `package` varchar(50) NOT NULL DEFAULT '0',
  `gender` varchar(50) NOT NULL DEFAULT '0',
  `notes` text NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_follow_marketplace: ~0 rows (approximately)
DELETE FROM `table_order_follow_marketplace`;

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_order_format_os
DROP TABLE IF EXISTS `table_order_format_os`;
CREATE TABLE IF NOT EXISTS `table_order_format_os` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model` varchar(50) DEFAULT NULL,
  `descriptions` varchar(50) DEFAULT NULL,
  `delivery` varchar(50) DEFAULT NULL,
  `contact_person_name` varchar(50) DEFAULT NULL,
  `contact_person_wa` varchar(50) DEFAULT NULL,
  `contact_type` varchar(50) DEFAULT NULL,
  `package` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_format_os: ~0 rows (approximately)
DELETE FROM `table_order_format_os`;

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_order_jasa
DROP TABLE IF EXISTS `table_order_jasa`;
CREATE TABLE IF NOT EXISTS `table_order_jasa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `order_client_reff` varchar(50) DEFAULT NULL,
  `order_type` enum('comment','view','follow_marketplace','pembuatanaplikasi','rating','subscriber','upgrade_fituraplikasi','virtualvisitors','wishlist_marketplace','format_os','ketik_document','upload_aplikasi','wa_chat_rotator','landing_page') DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_jasa: ~4 rows (approximately)
DELETE FROM `table_order_jasa`;
INSERT INTO `table_order_jasa` (`id`, `order_id`, `order_client_reff`, `order_type`, `status`, `username`, `date_created`) VALUES
	(34, 5, 'x1moqr', 'wishlist_marketplace', 'paid', 'cinta', '2024-09-08 08:57:21'),
	(35, 10, 'vd2vw9', 'view', 'pending', 'cinta', '2024-09-11 03:48:04'),
	(37, 2, 'sxg7bz', 'wa_chat_rotator', 'pending', 'aziz', '2025-03-19 01:53:34'),
	(38, 3, 'cvfy4o', 'wa_chat_rotator', 'paid', 'aziz', '2025-03-19 01:57:45');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_order_ketik_document
DROP TABLE IF EXISTS `table_order_ketik_document`;
CREATE TABLE IF NOT EXISTS `table_order_ketik_document` (
  `id` int(11) NOT NULL,
  `document_name` varchar(50) DEFAULT NULL,
  `total_pages` int(11) DEFAULT NULL,
  `package` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date_limit` date DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_ketik_document: ~0 rows (approximately)
DELETE FROM `table_order_ketik_document`;

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_order_pembuatanaplikasi
DROP TABLE IF EXISTS `table_order_pembuatanaplikasi`;
CREATE TABLE IF NOT EXISTS `table_order_pembuatanaplikasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_base` varchar(50) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `package` varchar(50) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_pembuatanaplikasi: ~0 rows (approximately)
DELETE FROM `table_order_pembuatanaplikasi`;

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_order_rating
DROP TABLE IF EXISTS `table_order_rating`;
CREATE TABLE IF NOT EXISTS `table_order_rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `social_media` varchar(50) NOT NULL DEFAULT '0',
  `url` text NOT NULL,
  `business_name` varchar(50) NOT NULL DEFAULT '',
  `package` varchar(50) NOT NULL DEFAULT '',
  `gender` varchar(50) NOT NULL DEFAULT '',
  `notes` text NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_rating: ~0 rows (approximately)
DELETE FROM `table_order_rating`;

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_order_subscriber
DROP TABLE IF EXISTS `table_order_subscriber`;
CREATE TABLE IF NOT EXISTS `table_order_subscriber` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `social_media` varchar(50) DEFAULT NULL,
  `url` text DEFAULT NULL,
  `account_name` varchar(50) DEFAULT NULL,
  `package` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_subscriber: ~0 rows (approximately)
DELETE FROM `table_order_subscriber`;
INSERT INTO `table_order_subscriber` (`id`, `social_media`, `url`, `account_name`, `package`, `gender`, `username`, `date_created`) VALUES
	(2, 'tiktok, youtube', 'asd', 'asd', 'hemat', 'lelaki', 'udin', '2024-08-12 21:48:06'),
	(3, 'instagram', 'sss', 'sss', 'bisnis', 'perempuan', 'cinta', '2024-08-16 01:05:25');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_order_upgrade_fituraplikasi
DROP TABLE IF EXISTS `table_order_upgrade_fituraplikasi`;
CREATE TABLE IF NOT EXISTS `table_order_upgrade_fituraplikasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_base` varchar(50) DEFAULT NULL,
  `url` text DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `package` varchar(50) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_upgrade_fituraplikasi: ~0 rows (approximately)
DELETE FROM `table_order_upgrade_fituraplikasi`;

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_order_view
DROP TABLE IF EXISTS `table_order_view`;
CREATE TABLE IF NOT EXISTS `table_order_view` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `social_media` varchar(50) DEFAULT NULL,
  `url` text NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `package` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `question` text DEFAULT NULL,
  `valid_answer` varchar(50) DEFAULT NULL,
  `answer_a` varchar(50) DEFAULT NULL,
  `answer_b` varchar(50) DEFAULT NULL,
  `answer_c` varchar(50) DEFAULT NULL,
  `answer_d` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_view: ~0 rows (approximately)
DELETE FROM `table_order_view`;
INSERT INTO `table_order_view` (`id`, `social_media`, `url`, `title`, `package`, `gender`, `question`, `valid_answer`, `answer_a`, `answer_b`, `answer_c`, `answer_d`, `username`, `date_created`) VALUES
	(10, 'tiktok', 'asd', 'asd', 'hemat', 'lelaki', 'asd', 'd', 'asd', 'asd', 'asd', 'asd', 'cinta', '2024-09-11 03:48:03');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_order_virtualvisitors
DROP TABLE IF EXISTS `table_order_virtualvisitors`;
CREATE TABLE IF NOT EXISTS `table_order_virtualvisitors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `website` varchar(50) DEFAULT NULL,
  `url` text DEFAULT NULL,
  `business_name` varchar(75) DEFAULT NULL,
  `package` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_virtualvisitors: ~0 rows (approximately)
DELETE FROM `table_order_virtualvisitors`;

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_order_wa_chat_rotator
DROP TABLE IF EXISTS `table_order_wa_chat_rotator`;
CREATE TABLE IF NOT EXISTS `table_order_wa_chat_rotator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `package` enum('gratis','bisnis','developer','vip') DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `rotator_mode` enum('random','order','schedule','origin','device') DEFAULT 'random',
  `custom_name` varchar(50) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `identifier_mode` enum('button contains','link contains','all buttons','all links','manual') DEFAULT 'manual',
  `identifier_tag` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_wa_chat_rotator: ~2 rows (approximately)
DELETE FROM `table_order_wa_chat_rotator`;
INSERT INTO `table_order_wa_chat_rotator` (`id`, `package`, `username`, `rotator_mode`, `custom_name`, `message`, `identifier_mode`, `identifier_tag`, `date_created`) VALUES
	(2, 'developer', 'aziz', 'origin', NULL, 'saya mau pesan merpati', NULL, NULL, '2025-03-19 01:53:34'),
	(3, 'developer', 'aziz', 'schedule', 'Salju', 'saya mau pesan pesawat sss di bulan salju', 'link contains', 'Coba 2', '2025-03-19 01:57:45');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_order_wishlist_marketplace
DROP TABLE IF EXISTS `table_order_wishlist_marketplace`;
CREATE TABLE IF NOT EXISTS `table_order_wishlist_marketplace` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marketplace` varchar(50) DEFAULT NULL,
  `url` text DEFAULT NULL,
  `shop_name` varchar(50) DEFAULT NULL,
  `package` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_wishlist_marketplace: ~0 rows (approximately)
DELETE FROM `table_order_wishlist_marketplace`;
INSERT INTO `table_order_wishlist_marketplace` (`id`, `marketplace`, `url`, `shop_name`, `package`, `gender`, `notes`, `username`, `date_created`) VALUES
	(5, '', '', '', NULL, 'lelaki', '', 'cinta', '2024-09-08 08:57:20');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_packages
DROP TABLE IF EXISTS `table_packages`;
CREATE TABLE IF NOT EXISTS `table_packages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `quota` int(11) DEFAULT NULL,
  `base_price` int(11) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `order_type` enum('comment','view','follow_marketplace','pembuatanaplikasi','rating','subscriber','upgrade_fituraplikasi','virtualvisitors','wishlist_marketplace','format_os','ketik_document','upload_aplikasi','wa_chat_rotator','landing_page') DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_packages: ~17 rows (approximately)
DELETE FROM `table_packages`;
INSERT INTO `table_packages` (`id`, `name`, `quota`, `base_price`, `total_price`, `order_type`, `date_created`) VALUES
	(21, 'hemat', 1000, 200, 200000, 'comment', '2024-09-08 16:16:56'),
	(22, 'bisnis', 2000, 300, 600000, 'comment', '2024-09-08 16:18:00'),
	(23, 'hemat', 100, 400, 40000, 'view', '2024-09-08 16:21:56'),
	(24, 'bisnis', 300, 400, 120000, 'view', '2024-09-08 16:22:09'),
	(25, 'hemat', 200, 400, 80000, 'follow_marketplace', '2024-09-08 16:23:05'),
	(26, 'bisnis', 300, 500, 150000, 'follow_marketplace', '2024-09-08 16:23:18'),
	(27, 'hemat', 40, 300, 12000, 'subscriber', '2024-09-08 16:23:36'),
	(28, 'bisnis', 200, 1500, 300000, 'subscriber', '2024-09-08 16:23:56'),
	(29, 'hemat', 300, 200, 60000, 'wishlist_marketplace', '2024-09-08 16:24:36'),
	(30, 'bisnis', 400, 500, 200000, 'wishlist_marketplace', '2024-09-08 16:24:52'),
	(31, 'hemat', 300, 400, 120000, 'virtualvisitors', '2024-09-08 16:25:55'),
	(32, 'bisnis', 4000, 300, 1200000, 'virtualvisitors', '2024-09-08 16:26:07'),
	(33, 'hemat', 300, 500, 150000, 'rating', '2024-09-08 16:28:50'),
	(34, 'bisnis', 4000, 200, 800000, 'rating', '2024-09-08 16:29:04'),
	(35, 'developer', 100, 5000, 500000, 'wa_chat_rotator', '2025-03-18 16:45:21'),
	(36, 'bisnis', 20, 7500, 150000, 'wa_chat_rotator', '2025-03-18 16:41:45'),
	(37, 'gratis', 2, 0, 0, 'wa_chat_rotator', '2025-03-18 16:47:13');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_request_team_transfer
DROP TABLE IF EXISTS `table_request_team_transfer`;
CREATE TABLE IF NOT EXISTS `table_request_team_transfer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_request_team_transfer: ~0 rows (approximately)
DELETE FROM `table_request_team_transfer`;

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_ticketing
DROP TABLE IF EXISTS `table_ticketing`;
CREATE TABLE IF NOT EXISTS `table_ticketing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `category` varchar(50) NOT NULL DEFAULT '0',
  `details` varchar(200) NOT NULL DEFAULT '0',
  `status` varchar(50) DEFAULT NULL,
  `screenshot` varchar(75) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_ticketing: ~0 rows (approximately)
DELETE FROM `table_ticketing`;

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_users
DROP TABLE IF EXISTS `table_users`;
CREATE TABLE IF NOT EXISTS `table_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `sex` varchar(50) DEFAULT NULL,
  `occupation` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `propic` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `whatsapp` varchar(50) DEFAULT NULL,
  `balance` int(20) DEFAULT 0,
  `points` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_users: ~3 rows (approximately)
DELETE FROM `table_users`;
INSERT INTO `table_users` (`id`, `username`, `pass`, `fullname`, `sex`, `occupation`, `email`, `propic`, `role`, `whatsapp`, `balance`, `points`, `date_created`) VALUES
	(18, 'cinta', 'cinta', 'as', 'male', NULL, 'cinta@gmail.com', 'default-female.png', 'team', '2222', 0, NULL, '2024-10-01 03:48:41'),
	(19, 'aziz', 'aziz', 'asd', 'male', NULL, 'aziz@gmail.com', 'default-male.png', 'client', '123', 0, NULL, '2024-10-01 04:06:01'),
	(20, 'gugum', 'gugum', 'Gumuruh', 'male', NULL, 'gumuruh@fgroupindonesia.com', 'default-male.png', 'admin', '09123', 0, NULL, '2024-10-01 04:06:38'),
	(21, 'udin', 'udin', 'udin markopolo', 'male', NULL, 'udin@home.com', 'default-male.png', 'client', '123', 0, NULL, '2024-10-01 04:07:51'),
	(22, 'coba', 'coba', 'coba', 'female', NULL, 'coba@gmail.com', 'default-female.png', 'client', '0828282', 0, NULL, '2025-03-08 10:40:03');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_web_wa_chat_rotator
DROP TABLE IF EXISTS `table_web_wa_chat_rotator`;
CREATE TABLE IF NOT EXISTS `table_web_wa_chat_rotator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_web_wa_chat_rotator: ~2 rows (approximately)
DELETE FROM `table_web_wa_chat_rotator`;
INSERT INTO `table_web_wa_chat_rotator` (`id`, `order_id`, `url`, `date_created`) VALUES
	(20, 3, 'situs0mantap.com', '2025-03-22 03:39:58'),
	(21, 3, 'situskeren.com', '2025-03-22 03:39:58');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
