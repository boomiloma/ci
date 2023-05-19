-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.27-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for realtime_message
CREATE DATABASE IF NOT EXISTS `realtime_message` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `realtime_message`;

-- Dumping structure for table realtime_message.message
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `read_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumping data for table realtime_message.message: ~2 rows (approximately)
INSERT INTO `message` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `read_status`) VALUES
	(1, 'test', 'test@test.com', 'test', 'test', '2023-05-19 10:53:56', 0),
	(2, 'sdfsd', 'test@yopmail.com', 'test', 'test', '2023-05-19 10:54:11', 1);

-- Dumping structure for table realtime_message.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `team` varchar(50) NOT NULL DEFAULT 'grey',
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `role` enum('captain','players') DEFAULT 'players',
  `taken_by` tinyint(4) DEFAULT NULL,
  `selectable` tinyint(4) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table realtime_message.users: ~16 rows (approximately)
INSERT INTO `users` (`id`, `team`, `first_name`, `last_name`, `email`, `password`, `profile_photo`, `role`, `taken_by`, `selectable`, `active`, `created_at`) VALUES
	(1, 'blue', 'Iqbal', 'Khan', 'iqbal@league.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'captain', 0, 1, 1, '2018-07-06 14:28:30'),
	(2, 'red', 'Sushil', 'Gupta', 'sushil@league.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'captain', 0, 0, 1, '2018-07-06 14:28:30'),
	(3, 'red', 'Boominathan', 'Elango', NULL, NULL, NULL, 'players', 2, NULL, 0, '0000-00-00 00:00:00'),
	(4, 'red', 'AbuBackar', 'Siddique', NULL, NULL, NULL, 'players', 2, NULL, 0, '0000-00-00 00:00:00'),
	(5, 'blue', 'Sandeep', 'Singh', NULL, NULL, NULL, 'players', 1, NULL, 0, '0000-00-00 00:00:00'),
	(6, 'blue', 'Azaz', ' Ali', NULL, NULL, NULL, 'players', 1, NULL, 0, '0000-00-00 00:00:00'),
	(7, 'red', 'Mohd', 'Shaniyaz', NULL, NULL, NULL, 'players', 2, NULL, 0, '0000-00-00 00:00:00'),
	(8, 'red', 'Mohd', 'Mehndi', NULL, NULL, NULL, 'players', 2, NULL, 0, '0000-00-00 00:00:00'),
	(9, 'blue', 'Mohd', 'Farmood', NULL, NULL, NULL, 'players', 1, NULL, 0, '0000-00-00 00:00:00'),
	(10, 'blue', 'Anupam', 'Kumar', NULL, NULL, NULL, 'players', 1, NULL, 0, '0000-00-00 00:00:00'),
	(11, 'blue', 'Rakesh', 'Pant', NULL, NULL, NULL, 'players', 1, NULL, 0, '0000-00-00 00:00:00'),
	(12, 'red', 'Purnesh', 'Kumar', NULL, NULL, NULL, 'players', 2, NULL, 0, '0000-00-00 00:00:00'),
	(13, 'blue', 'Pavan', 'Kumar', NULL, NULL, NULL, 'players', 1, NULL, 0, '0000-00-00 00:00:00'),
	(14, 'blue', 'Manish', NULL, NULL, NULL, NULL, 'players', 1, NULL, 0, '0000-00-00 00:00:00'),
	(15, 'red', 'Atul', 'Priy', NULL, NULL, NULL, 'players', 2, NULL, 0, '0000-00-00 00:00:00'),
	(16, 'red', 'Shwetab', 'Singh', NULL, NULL, NULL, 'players', 2, NULL, 0, '0000-00-00 00:00:00');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
