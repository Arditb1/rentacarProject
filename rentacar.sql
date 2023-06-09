-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2023 at 07:29 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentacar`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `whichcar` varchar(255) DEFAULT NULL,
  `car_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `customer_id`, `first_name`, `last_name`, `email`, `phone_number`, `whichcar`, `car_id`, `start_date`, `end_date`) VALUES
(18, 0, 'Bleon', 'Berisha', 'bleonberisha@gmail.com', '049724008', 'Audi - A6 - 3', 3, '2023-06-01', '2023-06-10'),
(19, NULL, 'Ardit', 'Berisha', 'arditberisha2303@gmail.com', '049751026', 'GOLF 7 2.0', NULL, '2023-06-02', '2023-06-10'),
(20, NULL, 'Gentrit', 'Shala', 'gshala2001@gmail.com', '044555667', 'Huracan', NULL, '2023-06-03', '2023-06-08');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `make` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `rental_price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `make`, `model`, `rental_price`, `image`, `year`, `color`) VALUES
(2, 'VW', 'GOLF 7 2.0', '25.00', '../car_images/Car Pictures/golf7-removebg-preview.png', 2012, 'RED'),
(3, 'Audi', 'A6', '50.00', '../car_images/Car Pictures/audi.png', 2018, 'Black'),
(4, 'VW', 'Jetta', '25.00', '../car_images/Car Pictures/jetta-removebg-preview (1).png', 2010, 'Gray'),
(5, 'BMW', '530d', '70.00', '../car_images/Car Pictures/bmw 530d.png', 2020, 'Gray'),
(6, 'Lamborghini', 'Huracan', '500.00', '../car_images/Car Pictures/lambo.png', 2021, 'White'),
(7, 'Renault', 'Clio', '15.00', '../car_images/Car Pictures/clio.png', 2010, 'Black');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'Ardit', 'arditberisha2303@gmail.com', 'hi', '2023-05-29 01:14:23'),
(2, 'Ardit', 'arditberisha2303@gmail.com', 'hi', '2023-05-29 01:14:28'),
(3, 'Bleon', 'bleonberisha@gmail.com', 'Hello', '2023-05-29 01:14:50'),
(4, 'Eren Pllava', 'erenpllava@gmail.com', 'Pershendetje', '2023-05-29 01:16:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` int(11) DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `phone_number`, `password`, `user_type`) VALUES
(1, 'Bleon', 'Berisha', 'bleonberisha@gmail.com', '049111112', 'bleonberisha', 2),
(3, 'Ardit', 'Berisha', 'arditberisha2303@gmail.com', '49751026', 'arditberisha', 2),
(4, 'Eren', 'Pllava', 'erenpllava@gmail.com', '49123456', 'erenpllava', 2),
(5, 'Gentrit', 'Shala', 'gshala@gmail.com', '49222222', 'gentriti', 2),
(9, 'Admin', 'Admin', 'admin@example.com', '123456798', 'admin', 1),
(13, 'Dafina', 'Duraku', 'dafinaduraku@gmail.com', '049123456', '$2y$10$iVBJHxTVDpjskmubBwu2He1vhc1eexEsCpq7cfNOHEP2K4JgCAXXS', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_number` (`phone_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
