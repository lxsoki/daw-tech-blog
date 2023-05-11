-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2023 at 08:45 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo1`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `userId`, `title`, `content`, `created_at`) VALUES
(3, 1, 'title 1', 'test content                    ', '2023-03-15 20:22:45'),
(4, 1, 'title 2', 'test content 2', '2023-04-19 19:22:45'),
(5, 2, 'title 3', 'test content 3', '2023-04-17 19:22:45'),
(6, 2, 'title 4', 'test content 4', '2023-04-17 19:22:45'),
(7, 2, 'title 5', 'test content 5', '2023-04-02 19:22:45'),
(8, 1, 'title 6', 'test content 6', '2023-04-10 19:22:45'),
(9, 2, 'title 7', 'test content 7', '2023-03-14 10:22:45'),
(10, 1, 'title 8', 'test content 8', '2023-04-09 09:22:45'),
(11, 1, 'title 9', 'test content 9', '2023-04-14 08:22:45'),
(12, 1, 'new test', 'hello there bla bla bla                    ', '2023-05-01 19:47:11'),
(13, 1, 'heyyy', 'thereee                    ', '2023-05-01 19:54:25'),
(14, 1, 'a', '                    a', '2023-05-03 06:48:50'),
(15, 1, 'b', 'b', '2023-05-03 06:49:09'),
(16, 1, 'a', 'v', '2023-05-03 06:51:36'),
(17, 1, 'a', 'b', '2023-05-03 06:53:41'),
(18, 1, 'rewrw', 'ww', '2023-05-03 06:54:45'),
(19, 1, 'a', 'b', '2023-05-03 06:56:06'),
(20, 1, 'fd', 'asss', '2023-05-03 06:56:14'),
(21, 1, '77', '88', '2023-05-03 07:13:34'),
(25, 1, 'qqq', 'aa', '2023-05-03 11:09:36'),
(27, 8, 'test5 title', 'test5 content', '2023-05-03 11:49:41'),
(31, 8, 'ceau', 'text1234text1234text1234text1234text1234text1234text1234text1234text1234text1234text1234text1234text1234text1234text1234text1234text1234text1234text1234text1234text1234text1234text1234text1234text1234text1234text1234text1234text1234text1234text1234text1234text1234text1234text1234text1234text1234text1234text1234text1234text123', '2023-05-10 11:22:39'),
(32, 8, '77', '444', '2023-05-07 17:42:01'),
(33, 6, 'hay', 'there lol', '2023-05-09 13:14:29'),
(34, 10, 'my first post', 'bla bla test 1234 works?', '2023-05-10 09:57:06'),
(35, 8, 'still works?', 'yes and edited ;)a', '2023-05-10 18:39:28'),
(36, 8, 'aaaaaaaaaaa', 'aaaaaaaaaaaaaaa', '2023-05-10 18:39:35');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `articleId` int(11) NOT NULL,
  `comment` varchar(10000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentId`, `userId`, `articleId`, `comment`, `created_at`) VALUES
(1, 8, 31, 'nice comment :)', '2023-05-09 13:53:18'),
(2, 8, 31, 'aaa', '2023-05-10 17:55:57'),
(3, 8, 31, '??', '2023-05-10 17:56:55'),
(4, 8, 31, 'lol', '2023-05-10 17:58:23'),
(5, 0, 31, 'aaaaaaaaaaa', '2023-05-10 18:08:37'),
(7, 8, 35, 'first!!', '2023-05-10 18:17:38'),
(8, 8, 35, 'second?', '2023-05-10 18:18:44'),
(9, 8, 35, 'aaaaaaaaaaa', '2023-05-10 18:19:27'),
(10, 6, 31, 'ok?', '2023-05-10 18:56:04'),
(11, 6, 31, '5', '2023-05-10 18:58:44'),
(12, 8, 35, 'hey :)', '2023-05-11 06:41:37'),
(13, 8, 33, 'hey there!', '2023-05-11 06:41:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'test', 'test@email.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'test2', 'test2@email.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(6, 'test3', 'test3@email.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(7, 'test4', 'test4@email.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(8, 'test5', 'test5@email.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(9, 'test6', 'test6@email.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(10, 'test7', 'test7@email.com', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
