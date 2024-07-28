-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 28, 2024 at 03:14 PM
-- Server version: 5.7.33
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nama`) VALUES
(2, 'Fotocopy'),
(3, 'Print');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `totalHarga` decimal(15,2) NOT NULL,
  `salesId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `itemId`, `quantity`, `totalHarga`, `salesId`) VALUES
(1, 3, 1, '2000.00', 1),
(4, 3, 5, '10000.00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `kategoriId` int(11) NOT NULL,
  `namaItem` varchar(255) NOT NULL,
  `hargaSatuan` decimal(15,2) NOT NULL,
  `satuan` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `kategoriId`, `namaItem`, `hargaSatuan`, `satuan`) VALUES
(1, 2, 'Warna', '2000.00', 'pcs'),
(2, 2, 'Hitam', '300.00', 'pcs'),
(3, 3, 'Warna', '2000.00', 'pcs'),
(4, 3, 'Hitam', '400.00', 'pcs');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `total` decimal(15,2) NOT NULL,
  `bayar` decimal(15,2) NOT NULL,
  `tanggal` datetime NOT NULL,
  `memberId` int(11) DEFAULT NULL,
  `adminId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `total`, `bayar`, `tanggal`, `memberId`, `adminId`) VALUES
(1, '2000.00', '2000.00', '2024-07-21 06:39:08', NULL, 4),
(3, '10000.00', '10000.00', '2024-07-21 17:37:58', 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `alamat` text,
  `image` varchar(255) DEFAULT NULL,
  `roleId` int(11) NOT NULL,
  `token` varchar(32) DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `email`, `telepon`, `alamat`, `image`, `roleId`, `token`, `createdAt`, `updatedAt`) VALUES
(4, 'Vaisya Govinanda S.', 'ExRyze', '$2y$10$TOl00BvCanNnuSc9c6t5YObqXppbONAwtuzEOr2ZHQBH8TgbHZBpCQA1sx@Ed3fV$357', 'vaisyagovinandas@gmail.com', '', '', '668de3ae10b6b.png', 1, '7d8904d7710cd0307f09a0c2c32bb18c', '2024-06-24 01:06:47', '2024-07-10 01:28:14'),
(5, 'User', 'User', '$2y$10$tlD9rxBM8FthTns3j5LNyO04ylgQf8ZvGc4zYAdnKvWr1oCnZWEIiQA1sx@Ed3fV$357', NULL, NULL, NULL, NULL, 2, '14a20e42ca6f253186cc2d2c66826e86', '2024-07-21 17:14:13', '2024-07-21 17:14:13'),
(7, 'Test', 'Test', '$2y$10$WeWfA3uEQfMNuxzXJCAgt.RhFdnEzFdjBu3293yhASinjINefdveSQA1sx@Ed3fV$357', NULL, NULL, NULL, NULL, 2, NULL, '2024-07-21 17:19:25', '2024-07-21 17:19:25'),
(8, 'Admin', 'Admin', '$2y$10$zekhFHua3n.8a9pEgn0M8O73PtJuNPG6tVo/UURRR3LUk1XpQr6.2QA1sx@Ed3fV$357', NULL, NULL, NULL, NULL, 1, '67b3dac8e2860fdaf5dad985aaaa3a2c', '2024-07-21 17:19:43', '2024-07-21 17:19:43'),
(9, 'testing', 'Ex', '$2y$10$JdtupNL9FqDPUospiwDLzuAOvNQUmlDuIke9sk/YBIIPTtsC2HrK2QA1sx@Ed3fV$357', NULL, NULL, NULL, NULL, 2, 'b256737e366f2671cfcaeb8c7dbd1d98', '2024-07-27 05:12:53', '2024-07-27 05:12:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salesId` (`salesId`),
  ADD KEY `typeId` (`itemId`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groupId` (`kategoriId`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`memberId`),
  ADD KEY `adminId` (`adminId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `roleId` (`roleId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `details_ibfk_1` FOREIGN KEY (`itemId`) REFERENCES `items` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `details_ibfk_2` FOREIGN KEY (`salesId`) REFERENCES `sales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`kategoriId`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`memberId`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`adminId`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roleId`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
