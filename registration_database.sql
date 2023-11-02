-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 18, 2023 at 06:36 AM
-- Server version: 10.10.2-MariaDB
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`) VALUES
(1, '', '', '$2y$10$i9PbEptt0SRh1IGGp0xVD.o99SrC4IWxCxIOa8Nd7//5j0kIMNwMm'),
(2, 'Shubham Shah', 'falgunidemo', '$2y$10$yfvX4DBMzdfbGo/q38bHT.HzcDTOkWk.ODiEzyRHlzegLnpl/Qt7C'),
(3, 'John Doe', 'john@example.com', '$2y$10$xiDUAAv/DxdZuKbjdfT1WO/dnUAcmgeY7ok9/NDC1MWi66saeGyRu'),
(4, 'Shubham Shah', 'sh@gmail.com', '$2y$10$pBGTqAw32EiR1/VjKItaHuON36HfYwW.Vk0YIHUarMWAnAaXJWoZy'),
(5, 'ssss', 'abc', '$2y$10$LvC/iCVOezp0u417VfeW4udny0AkW7I9Y5mvuUfYMso3LFPjlT2Rm');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
