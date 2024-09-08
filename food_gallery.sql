-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 08, 2024 at 10:01 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int NOT NULL,
  `nama` varchar(25) NOT NULL,
  `description` text,
  `image_url` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `nama`, `description`, `image_url`, `price`) VALUES
(1, 'Nasi Goreng', 'Nasi goreng dengan campuran ayam dan telur', 'images/nasi_goreng.jpeg', 25000.00),
(2, 'Sate Ayam', 'Sate ayam bumbu kacang dengan lontong', 'images/sate_ayam.jpeg', 30000.00),
(3, 'Rendang', 'Rendang daging sapi khas Padang', 'images/rendang.jpeg', 45000.00),
(4, 'Mie Ayam', 'Mie ayam dengan pangsit dan sawi', 'images/mie_ayam.jpeg', 15000.00),
(5, 'Ayam Geprek', 'Ayam goreng tepung dengan sambal pedas', 'images/ayam_geprek.jpeg', 20000.00),
(6, 'Nasi Kuning', 'Nasi Kuning tumpeng masbro', 'images/nasi_kuning.jpeg', 8000.00),
(7, 'Udang Goreng Tepung', 'Udang Goreng Tepung Ala Chef Juna', 'images/udang_goreng.jpeg', 20000.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
