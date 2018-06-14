-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               10.1.26-MariaDB-0+deb9u1 - Debian 9.1
-- Операционная система:         debian-linux-gnu
-- HeidiSQL Версия:              9.5.0.5226
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных test_project
CREATE DATABASE IF NOT EXISTS `test_project` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `test_project`;

-- Дамп структуры для таблица test_project.items
CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rubric_id` int(11) NOT NULL,
  `header` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Дамп данных таблицы test_project.items: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` (`id`, `rubric_id`, `header`, `slug`) VALUES
	(1, 2, 'Intel Core i3', 'intel_core_i3'),
	(2, 2, 'Intel Core i5', 'intel_core_i5');
/*!40000 ALTER TABLE `items` ENABLE KEYS */;

-- Дамп структуры для таблица test_project.pages
CREATE TABLE IF NOT EXISTS `pages` (
  `column_1` int(11) NOT NULL AUTO_INCREMENT,
  `header` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`column_1`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Дамп данных таблицы test_project.pages: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` (`column_1`, `header`, `slug`) VALUES
	(1, 'О компании', 'about');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;

-- Дамп структуры для таблица test_project.rubrics
CREATE TABLE IF NOT EXISTS `rubrics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `header` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Дамп данных таблицы test_project.rubrics: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `rubrics` DISABLE KEYS */;
INSERT INTO `rubrics` (`id`, `header`, `slug`) VALUES
	(1, 'mainboards', 'mainboards'),
	(2, 'processors', 'processors');
/*!40000 ALTER TABLE `rubrics` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
