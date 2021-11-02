-- Adminer 4.8.1 MySQL 8.0.27 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

CREATE DATABASE `fms` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `fms`;

DROP TABLE IF EXISTS `files`;
CREATE TABLE `files` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `is_public` int NOT NULL,
  `uploader` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `files` (`id`, `name`, `description`, `file`, `is_public`, `uploader`) VALUES
(20,	'Dummy name ',	'Dummy description ',	'1635835477.pdf',	1,	3),
(21,	'There are many variations of passages of Lorem Ipsum available',	'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock',	'1635835628.pdf',	0,	3),
(22,	'Lorem ipsum dolor sit amet',	'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',	'1635835751.jpeg',	1,	5),
(23,	'At vero eos et accusamus et iusto',	'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled',	'1635835802.pdf',	1,	5);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `type` int NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `users` (`id`, `username`, `email`, `type`, `password`) VALUES
(3,	'admin',	'admin@coderex.com',	1,	'21232f297a57a5a743894a0e4a801fc3'),
(4,	'userone',	'userone@coderex.com',	0,	'150b2d9625d095772a7e9f66dc3f2715'),
(5,	'usertwo',	'usertwo@coderex.com',	1,	'da56bde451870e7edbb6a65f2045d142');

-- 2021-11-02 08:32:23
