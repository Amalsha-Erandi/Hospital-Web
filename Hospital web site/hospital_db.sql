-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 26, 2025 at 05:51 AM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital.db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `doctor` varchar(100) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `reg_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `name`, `email`, `phone`, `doctor`, `appointment_date`, `appointment_time`, `reg_date`) VALUES
(2, 'Amalsha', 'amalsha@gmail.com', '071456734', 'Dr. Gunasekara', '2025-02-26', '03:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE IF NOT EXISTS `doctors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `specialty` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `specialty`, `email`, `phone`) VALUES
(1, 'nimal', 'Neurologist', 'nimal5@gmail.com', '0711894235');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_queries`
--

DROP TABLE IF EXISTS `feedback_queries`;
CREATE TABLE IF NOT EXISTS `feedback_queries` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `type` enum('feedback','query') NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `feedback_queries`
--

INSERT INTO `feedback_queries` (`id`, `name`, `email`, `type`, `message`, `submitted_at`) VALUES
(1, 'Amalsha', 'Amalsha5@gmail.com', 'feedback', 'Good', '2025-02-26 05:47:05');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `id` int NOT NULL AUTO_INCREMENT,
  `s_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `s_position` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `s_email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `s_phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`s_email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `s_name`, `s_position`, `s_email`, `s_phone`) VALUES
(2, 'namidu', 'IT support', 'Nami@gmail.com', '077895623');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` enum('admin','staff','patient') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'Amalsha', 'amalsha100@gmail.com', '$2y$10$k8qlXlPO6FxdTShCkqBEteZJtVdzdqeA7RJXhS/CzW2Y8.RR4PxIm', 'admin'),
(2, 'Ama', 'namia@gmail.com', '$2y$10$jBhR/ot0CD7Rq6k9LW2GIu5gxxrgHLAlWHDOz4yyW2PEZDmCHTvtO', 'admin'),
(3, 'amalsha', 'namipp@gmail.com', '$2y$10$SzDKumsZH2PzWQxZK8WQ1OU3YqGwQKn/T8WmK7pYQrOCySr85ecka', 'patient'),
(4, 'amalsha', 'namiS@gmail.com', '$2y$10$GR081I1q3bYTbwNEgKAe1OiBlHHjOjhxIkPbP8yIoiQ7gh2s8RB8y', 'staff'),
(5, 'amalsha', 'erandi3@gmail.com', '$2y$10$PY015KnvyDYqeehLBKYpLeyTrzlunU3HzJIdF3C/PbbRCDeFqcoAS', 'staff'),
(6, 'Amalsha', 'erandi5@gmail.com', '$2y$10$291BqOH5yIb4JN29WLyPne1ByXggikyXATlApN7X7KpLpPGq7ZJWO', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
