-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2022 at 08:57 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` tinyint(3) UNSIGNED NOT NULL COMMENT 'Идентификатор записи',
  `author` varchar(30) NOT NULL COMMENT 'Имя автора отзыва',
  `text` mediumtext NOT NULL COMMENT 'Текст отзыва',
  `status` int(1) UNSIGNED NOT NULL COMMENT 'Статус отзыва (1 - проверен, 0 - не проверен)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `author`, `text`, `status`) VALUES
(2, 'Василий', 'Всё плохо', 0),
(3, 'Николай', 'Всё так себе', 1),
(14, 'Аркадий', 'Всё хорошо', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` tinyint(3) UNSIGNED NOT NULL COMMENT 'Идентификатор пользователя',
  `login` varchar(30) NOT NULL COMMENT 'Логин пользователя',
  `password` varchar(30) NOT NULL COMMENT 'Пароль пользователя'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `login`, `password`) VALUES
(1, 'admin', 'password');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор записи', AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор пользователя', AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
