-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `bbq`;
CREATE TABLE `bbq` (
  `to` char(100) NOT NULL,
  `information` varchar(1000) NOT NULL,
  `from` char(100) NOT NULL,
  `time` char(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `notice`;
CREATE TABLE `notice` (
  `updater` char(10) NOT NULL,
  `notices` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `notice` (`updater`, `notices`) VALUES
('adminer',	'欢迎大家来到星辰表白墙!');

-- 2019-06-27 02:25:18
