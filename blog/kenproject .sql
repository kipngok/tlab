-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2021 at 11:26 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kenproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(255) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'WHISKY', '2020-11-09 14:32:58', '2020-11-09 17:32:58'),
(3, 'CHAMPAGNES', '2020-11-10 16:55:21', '2020-11-10 19:55:21'),
(4, 'VODKA', '2020-11-10 16:55:42', '2020-11-10 19:55:42'),
(5, 'BEER', '2020-11-10 16:55:59', '2020-11-10 19:55:59'),
(6, 'WINES', '2020-11-10 16:56:18', '2020-11-10 19:56:18'),
(7, 'COGNAC', '2020-11-10 16:56:41', '2020-11-10 19:56:41'),
(8, 'BRANDY', '2020-11-10 16:57:44', '2020-11-10 19:57:44'),
(9, 'LIQUEUR', '2020-11-10 16:58:13', '2020-11-10 19:58:13'),
(10, 'TEQUILA', '2020-11-10 16:58:28', '2020-11-10 19:58:28'),
(11, 'GIN', '2020-11-10 16:58:42', '2020-11-10 19:58:42'),
(12, 'RUM', '2020-11-10 16:59:03', '2020-11-10 19:59:03'),
(13, 'ICT', '2020-11-16 09:44:51', '2020-11-16 12:44:51'),
(14, 'Tests', '2021-01-28 04:10:13', '2021-01-28 07:10:13'),
(15, 'terry', '2021-03-17 12:02:26', '2021-03-17 13:02:26');

-- --------------------------------------------------------

--
-- Table structure for table `codes`
--

CREATE TABLE `codes` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `status` varchar(11) NOT NULL DEFAULT 'active',
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `consumed_by` varchar(255) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `cost_valid` int(11) DEFAULT NULL,
  `cost_used` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `companys`
--

CREATE TABLE `companys` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `kra_pin` varchar(255) DEFAULT NULL,
  `image` longblob NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companys`
--

INSERT INTO `companys` (`id`, `company_name`, `contact`, `email`, `kra_pin`, `image`, `created_at`, `updated_at`) VALUES
(7, 'EABLs', '0700819032', NULL, NULL, 0x38653663303639373934616233316362303236383833373535373232623831612e6a7067, '2020-11-10 21:38:55', '2020-11-10 21:38:55');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `cost_valid` int(11) DEFAULT 0,
  `cost_invalid` int(11) DEFAULT 0,
  `cost_used` int(11) DEFAULT 0,
  `notification` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `code_id` int(11) DEFAULT NULL,
  `invalid_code` varchar(255) DEFAULT NULL,
  `consumed_by` int(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Complete',
  `cod_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_desc` varchar(255) DEFAULT NULL,
  `volume_size` varchar(255) DEFAULT NULL,
  `company_id` int(25) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_desc`, `volume_size`, `company_id`, `category_id`, `updated_at`, `created_at`) VALUES
(18, 'Vodka', 'Spirit', '800ml', 7, 1, '2020-11-09', '2020-11-09'),
(20, 'Cyprus Altar Wine', 'Medium sweet flavor,', '750 ml', 7, 6, '2020-11-10', '2020-11-10'),
(21, 'Johnnie-walker-black-lable', '40% alcohol content', '750 ml', 7, 1, '2020-11-10', '2020-11-10'),
(22, 'Smirnoff Vodka Red', 'Beers, Wines & Spirits', '700ml', 7, 4, '2020-11-10', '2020-11-10'),
(23, 'Imperial Blue Whiskey', 'Blend of Indian grain spirits and impoted scotch malts', '750ml', 7, 1, '2020-11-10', '2020-11-10'),
(24, 'Konyagi', '40% alcohol content', '350ML', 7, 4, '2020-11-12', '2020-11-11'),
(25, 'TEQUILA VILLA LOBOS', '10 YEAR AGED TEQUILA* Villa Lobos Los Hombres', '700ML', 7, 1, '2020-11-12', '2020-11-12'),
(28, 'Mercy', 'asergtryh', '300ml', 7, 1, '2020-12-01', '2020-12-01'),
(29, 'Altar Wine', '4% alcohol content', '800ml', 7, 6, '2020-12-04', '2020-12-04'),
(30, 'Johnnie-walker-black-lable', '42% alcohol content', '800ml', 7, 4, '2020-12-23', '2020-12-23'),
(31, 'Test product', 'Testing testing', '600ml', 7, 1, '2021-01-25', '2021-01-25'),
(32, 'Testproduct', '40% alcohol content', '250ml', 7, 14, '2021-01-28', '2021-01-28'),
(33, 'Johnnie-walker-black-lable', '40% alcohol content', '600ml', 7, 1, '2021-01-28', '2021-01-28'),
(34, 'Njuguna', 'Tetst', '250ml', 7, 1, '2021-02-19', '2021-02-19'),
(35, 'mwai', 'Nyawira', '600ml', 7, 15, '2021-03-17', '2021-03-17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` int(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `is_admin`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', 1, NULL, '$2y$10$Q/EyeHBypOOntP0hzz0H3uXoPAojL48PMGK8lc6lYx6Q6HkENXa5i', 'KZyGROLIqfsww9wQVETtVBz5Agnl1VdCfkUp1pZwugM7JzEGfMxT8QpyxQER', '2020-10-16 06:23:40', '2020-11-10 22:35:03'),
(2, 'Karis', 'karis@mburu.gmail.com', NULL, NULL, '$2y$10$pF3hZJYMIafPevQhmgI/duxW8NDrn8G7y6GrpP5sg/.QS/IYBV8bi', NULL, '2021-03-21 05:28:05', '2021-03-21 05:28:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companys`
--
ALTER TABLE `companys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_notification_codes_id` (`code_id`),
  ADD KEY `cod_id` (`cod_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `codes`
--
ALTER TABLE `codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `companys`
--
ALTER TABLE `companys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`cod_id`) REFERENCES `codes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
