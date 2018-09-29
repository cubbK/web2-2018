-- --------------------------------------------------------
-- Värd:                         127.0.0.1
-- Serverversion:                5.6.38 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for php-mini-task
CREATE DATABASE IF NOT EXISTS `php-mini-task` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `php-mini-task`;

-- Dumping structure for tabell php-mini-task.Author
CREATE TABLE IF NOT EXISTS `Author` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for tabell php-mini-task.Book
CREATE TABLE IF NOT EXISTS `Book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for tabell php-mini-task.Book_Author
CREATE TABLE IF NOT EXISTS `Book_Author` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) DEFAULT '0',
  `book_id` int(11) DEFAULT '0',
  KEY `id` (`id`),
  KEY `FK_Book_Author_Author` (`author_id`),
  KEY `FK_Book_Author_Book` (`book_id`),
  CONSTRAINT `FK_Book_Author_Author` FOREIGN KEY (`author_id`) REFERENCES `Author` (`id`),
  CONSTRAINT `FK_Book_Author_Book` FOREIGN KEY (`book_id`) REFERENCES `Book` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
