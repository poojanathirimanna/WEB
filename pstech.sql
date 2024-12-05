-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2024 at 01:03 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pstech`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`, `added_at`) VALUES
(4, 2, 4, 2, '2024-09-25 06:54:56'),
(5, 2, 8, 1, '2024-09-25 06:58:02');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`) VALUES
(1, 'Laptops', '2024-09-24 20:45:35'),
(2, 'RAM', '2024-09-24 20:45:35'),
(3, 'Processors', '2024-09-24 20:45:35'),
(4, 'Graphic Cards', '2024-09-24 20:45:35'),
(5, 'Motherboards', '2024-09-24 20:45:35');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `address` text NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_price`, `address`, `payment_method`, `order_date`) VALUES
(1, 1, 5920000.00, '31', 'Bank Transfer', '2024-09-25 08:10:41'),
(2, 1, 7400000.00, '2342423', 'Bank Transfer', '2024-09-25 08:12:47'),
(3, 1, 1480000.00, '432342342', 'Bank Transfer', '2024-09-25 08:14:54'),
(4, 5, 2965000.00, '121213', 'Bank Transfer', '2024-09-25 09:28:19'),
(5, 6, 4457500.00, '12121qe123122', 'Credit Card', '2024-09-25 09:34:34'),
(6, 6, 1480000.00, '123123123', 'Bank Transfer', '2024-09-25 10:14:07');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock`, `category_id`, `image`, `created_at`) VALUES
(1, 'Lenovo Legion 9 16IRX9', 'Lenovo Legion 9 16IRX9 i9-14900HX RTX 4090', 1480000.00, 10, 1, '../IMAGES/2470-20240731213957-Legion_9_16IRX9_CT1_01.png', '2024-09-24 22:15:31'),
(2, 'MSI Raider GE78 HX', 'MSI Raider GE78 HX i9 14th GEN RTX 4090', 1640000.00, 5, 1, '../IMAGES/2514-20240911100418-download.png', '2024-09-24 22:15:31'),
(3, 'Lenovo LOQ 15IRX9', 'Lenovo LOQ 15IRX9 i7 13th GEN HX + RTX 4050 6GB', 1485000.00, 8, 1, '../IMAGES/2325-20240915183705-2469-20240731211810-2071-20240713154531-LOQ_15IRX9_CT1_03.png', '2024-09-24 22:15:31'),
(4, 'ASUS ROG Strix SCAR 16', 'ASUS ROG Strix SCAR 16 (2024) G634JZR i9 14TH GEN RTX 4080', 1485000.00, 6, 1, '../IMAGES/780-20240801152045-Yoga_Book_9_13IMU9_CT2_05.png', '2024-09-24 22:15:31'),
(5, 'Lenovo YOGA Book 9 13IMU9', 'Lenovo YOGA Book 9 13IMU9 Ultra 7 14TH GEN with AI Boost', 1485000.00, 4, 1, '../IMAGES/1421-20240311143728-h732 (2).png', '2024-09-24 22:15:31'),
(7, 'ASUS Vivobook S 15 OLED X1P', 'ASUS Vivobook S 15 OLED X1P', 479000.00, 12, 1, '../IMAGES/2287-20240208151203-kv-pd.png', '2024-09-24 23:01:15'),
(8, 'TEAM TFORCE VULCAN 32GB D5 INTEL 5600MHZ - BLK', '32GB DDR5 RAM for Intel systems, 5600MHz, Black edition', 35500.00, 10, 2, '../IMAGES/TEAM TFORCE VULCAN 32GB D5 INTEL 5600MHZ - BLK.png', '2024-09-24 23:39:31'),
(9, 'G.SKILL TridentZ RGB NEO 16GB (2 x 8GB) 3600Mhz', 'G.SKILL TridentZ RGB NEO 16GB, 3600MHz DDR4 RAM', 32000.00, 15, 2, '../IMAGES/G.SKILL TridentZ RGB NEO 16GB (2 x 8GB) 3600Mhz.png', '2024-09-24 23:39:31'),
(10, 'CORSAIR VENGEANCE RGB 16GB (1X16GB) DDR5 5600MHZ MEMORY', '16GB DDR5 RAM, 5600MHz with RGB lighting', 21000.00, 12, 2, '../IMAGES/CORSAIR VENGEANCE RGB 16GB (1X16GB) DDR5 5600MHZ MEMORY.png', '2024-09-24 23:39:31'),
(11, 'ADATA XPG LANCER BLADE 16GB 5600MHZ DDR5 RAM', 'ADATA XPG LANCER BLADE 16GB DDR5 RAM, 5600MHz', 19000.00, 8, 2, '../IMAGES/ADATA XPG LANCER BLADE 16GB 5600MHZ DDR5 RAM.png', '2024-09-24 23:39:31'),
(12, 'PNY XLR8 3200MHZ 16GB RAM', 'PNY XLR8 16GB DDR4 RAM, 3200MHz', 12500.00, 10, 2, '../IMAGES/PNY XLR8 3200MHZ 16GB RAM.png', '2024-09-24 23:39:31'),
(13, 'Team TFORCE VULCAN Z 16GB 3200', 'Team TFORCE VULCAN Z 16GB DDR4 RAM, 3200MHz', 13000.00, 12, 2, '../IMAGES/Team TFORCE VULCAN Z 16GB 3200.png', '2024-09-24 23:39:31'),
(14, 'MSI Cyborg 15 A13VEK I7 13TH GEN RTX 4050 6GB', 'cyborg', 350000.00, 4, 1, '../IMAGES/MSI Cyborg 15 A13VEK I7 13TH GEN RTX 4050 6GB.png', '2024-09-24 23:58:50'),
(19, '16gb', 'cyborg', 44.00, 6, 2, '../IMAGES/ADATA XPG LANCER BLADE 16GB 5600MHZ DDR5 RAM.png', '2024-09-25 00:49:32'),
(22, 'MSI RTX 4080 SUPER GAMING SLIM 16GB', 'MSI RTX 4080 SUPER GAMING SLIM 16GB Graphics Card', 529000.00, 10, 3, '../IMAGES/rtx4080.png', '2024-09-25 05:44:38'),
(23, 'ASUS STRIX GAMING GeForce RTX 4090 24GB GDDR6X', 'ASUS STRIX GAMING GeForce RTX 4090 24GB GDDR6X Graphics Card', 980000.00, 5, 3, '../IMAGES/1242-20240511055118-h732.png', '2024-09-25 05:44:38'),
(24, 'ASUS ROG Strix RTX 4070 SUPER 12GB GDDR6X', 'ASUS ROG Strix RTX 4070 SUPER 12GB GDDR6X Graphics Card', 385000.00, 15, 3, '../IMAGES/978-20240511055352-h732 (1).png', '2024-09-25 05:44:38'),
(25, 'MSI RTX 3060 VENTUS 2X 12GB', 'MSI RTX 3060 VENTUS 2X 12GB Graphics Card', 136500.00, 20, 3, '../IMAGES/msirtx3060.png', '2024-09-25 05:44:38'),
(26, 'ASUS DUAL GTX 1650 4GB GDDR6', 'ASUS DUAL GTX 1650 4GB GDDR6 Graphics Card', 67000.00, 25, 3, '../IMAGES/asusdualgtx16504gb.png', '2024-09-25 05:44:38'),
(27, 'ASUS Dual Radeon RX 7600 V2 8GB GDDR6', 'ASUS Dual Radeon RX 7600 V2 8GB GDDR6 Graphics Card', 129000.00, 30, 3, '..//IMAGES/ASUS Dual Radeon RX 7600 V2 8GB GDDR6.png', '2024-09-25 05:44:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Poojana Thirimanna', 'psthirimanna@gmail.com', '$2y$10$RTV1LN4j.ObARzzttHDqEuddPMRPVlpSXW6l4oS2/p1BP8AHD8IX.', 'user', '2024-09-24 16:55:25'),
(2, 'dushan', 'dush2001@gmail.com', '$2y$10$MmcTPnyBmffOzaLAYZBrzeEhDJ4HpeAcqEuAvsFL3kcKabSbnz8Bq', 'admin', '2024-09-24 17:13:58'),
(5, 'alex', 'alex@gmail.com', '$2y$10$a20vR76UswPqZjISntAM3OaLCZ3bFySXg/61Bv3deFyQMXDdczMti', 'user', '2024-09-25 09:27:49'),
(6, 'sethmi', 'sethmialwis19@gmail.com', '$2y$10$HvRXj5jC99Z68yBY3Eg0NuvXgychdb1x3Kv29Fv5czmCulpM4oBYK', 'user', '2024-09-25 09:31:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
