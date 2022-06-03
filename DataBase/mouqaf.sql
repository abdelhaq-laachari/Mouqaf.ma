-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2022 at 10:11 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mouqaf`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(3) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Electrician'),
(2, 'Plumbing'),
(3, 'Gardner'),
(4, 'Window Repair'),
(5, 'Power Washing'),
(6, ' Smart Home Installation'),
(7, 'painter');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(3) NOT NULL,
  `idPost` int(3) NOT NULL,
  `idWorker` int(3) NOT NULL,
  `proposal` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `idPost`, `idWorker`, `proposal`, `created_at`) VALUES
(28, 165, 41, 'i can', '2022-06-02 17:57:19'),
(29, 165, 41, 'i can', '2022-06-02 18:00:15'),
(30, 166, 41, 'sasssa', '2022-06-02 18:55:36');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `idPost` int(3) NOT NULL,
  `idClient` int(11) NOT NULL,
  `idCategory` int(3) NOT NULL,
  `post_title` varchar(250) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `images` varchar(250) NOT NULL,
  `city` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`idPost`, `idClient`, `idCategory`, `post_title`, `description`, `images`, `city`, `created_at`) VALUES
(165, 37, 7, 'Ratione qui culpa c', 'Et consequat Veniam', '1654192569bathroom.jpg', 'Qui fugiat perspicia', '2022-06-02 17:56:09'),
(166, 37, 7, 'Tenetur suscipit vol', 'Sed ullamco magni nu', '', 'Voluptas fugit culp', '2022-06-02 18:49:57'),
(167, 37, 5, 'Nesciunt quam dicta', 'Ea est ut pariatur ', '1654198785light.jpg', 'Duis omnis sunt ipsa', '2022-06-02 19:39:45');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(3) NOT NULL,
  `idUser` int(3) NOT NULL,
  `idComment` int(3) NOT NULL,
  `topic` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `idUser`, `idComment`, `topic`) VALUES
(1, 37, 29, 'scam comment');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `avatar` varchar(250) NOT NULL,
  `phone` int(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` varchar(10) NOT NULL,
  `city` varchar(30) NOT NULL,
  `signed_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `avatar`, `phone`, `email`, `password`, `role`, `city`, `signed_at`) VALUES
(32, 'abdelhaq', 'laachari', 'admin3.jpg', 1010101, 'admin@youcode.com', '1234', 'admin', 'youcode', '2022-06-02'),
(37, 'eric', 'parker', '', 0, 'eric@email.com', '$2y$10$I/eqk7r7VXjhxumbvWeJu.OVXCb.ND0DcQfcTJuNzD3InA.lzSLvS', 'client', 'safi', '2022-06-02'),
(38, 'alex', 'stark', '', 0, 'alex@email.com', '$2y$10$gbz1.5j31Fhy0f8gri2lO.uOtpnNJVAdGAEd54yo7zmKWfwFlg.AS', 'client', 'casablanca', '2022-06-03'),
(39, 'Aut alias id error e', 'Eum eu lorem similiq', '', 0, 'bobedigita@mailinator.com', '$2y$10$xJkq.d6P5ENsP6b0of7jvuHSdyrBFO4lpzcA3r63OfSxlfvE5zOCC', 'client', 'Error sint qui debi', '2022-06-02'),
(40, 'abdelhaq', 'laachari', 'admin1.jpg', 123, 'client@email.com', '1234', 'client', 'safi', '2022-06-04'),
(41, 'Nostrum reprehenderi', 'Dolor sint quam expl', '', 0, 'worker@email.com', '$2y$10$YE1sISgWIILboZPjIhWJF.cfM0AGC4eksQY24NfqKWNjWr3xMAHqW', 'worker', 'Est et labore iste ', '2022-06-02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idWorker` (`idWorker`),
  ADD KEY `comments_ibfk_1` (`idPost`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`idPost`),
  ADD KEY `idCategory` (`idCategory`),
  ADD KEY `posts_ibfk_1` (`idClient`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idComment` (`idComment`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `idPost` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`idPost`) REFERENCES `posts` (`idPost`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`idWorker`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`idCategory`) REFERENCES `categories` (`id`);

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_2` FOREIGN KEY (`idComment`) REFERENCES `comments` (`id`),
  ADD CONSTRAINT `reports_ibfk_3` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
