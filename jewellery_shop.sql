-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2026 at 01:24 PM
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
-- Database: `jewellery_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `name`, `phone`, `address`, `email`, `password`) VALUES
(1, 'vansh', '8282828280', 'pune', NULL, NULL),
(3, 'shital', '3333444455', 'Mumbai', NULL, NULL),
(4, 'vaishnavi ', '9999999999', 'pune', NULL, NULL),
(5, 'aarti', '88888888', 'satara', NULL, NULL),
(8, 'aadhya', '88898989898', 'nanded', 'aadhya@gmail.com', '$2y$10$jnCp9AXccdudHeG/7.dUQuPGDOxiyM1jcDX4/uh6JEcrur4mztXAC'),
(9, 'santosh ', NULL, NULL, 'sk@gamil.com', '$2y$10$VwN5Tgb81OVnVr7mNtt.9ONgpNHT9er3gnfwfJCu0TkOE6X1KFLua'),
(10, 'swati', '4444444444', 'mumbai', 'swati@gmail.com', '$2y$10$EUEkxePGLz5QneDAvo.Hg.r6Dgpae3c7EsuH0/FA.r.AFvoZVHEqm'),
(11, 'vanshika', NULL, NULL, 'vanshika@gmail.com', '$2y$10$YDMOFqgJxtQja9UZKdRFROup0iirKOj8/PVbYd71mDYJcSMFjwFnq'),
(12, 'vaishali', NULL, NULL, 'vaishali@gmail.com', '$2y$10$669iLwWHQ07gdcv4v933EOq9vJseXZdMfVs36pEhLU57vLVG8ikE.'),
(13, 'sumit ', '99999999999', 'thane', 'sumit@gmail.com', '$2y$10$mM8YtYw8H6zfeJSN2adSGOPsMcAf2zn/1BgiRaftuTtkeYPMSVpGa'),
(14, 'neha', NULL, NULL, 'neha@gmail.com', '$2y$10$it/aWpndd7giYRhY6ie14uylwvOUPD1B5eWf83.9EIXk.US0/kLiy'),
(15, 'veda', NULL, NULL, 'veda@gmail.com', '$2y$10$stzhW/LBS2oUzdtJvmhyK.GO43QBRtFsF9d1dc5BqpUvWqJUrp8te'),
(16, 'abc', NULL, NULL, 'abc@gmail.com', '$2y$10$1GljkcuanKMOQENcUlAqXOvK/IMLCrdyCKSneMetu9duz0sHUfxC6');

-- --------------------------------------------------------

--
-- Table structure for table `jewellery_items`
--

CREATE TABLE `jewellery_items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(100) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jewellery_items`
--

INSERT INTO `jewellery_items` (`item_id`, `item_name`, `category`, `price`, `stock`) VALUES
(1, '', '', 0.00, 0),
(2, '', '', 0.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_email` varchar(100) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_email`, `product_id`, `product_name`, `price`, `order_date`) VALUES
(1, 'your_email@gmail.com', NULL, 'Gold Ring', 5000.00, '2026-04-20 17:59:36'),
(2, 'your_email@gmail.com', NULL, 'Gold Ring', 5000.00, '2026-04-20 17:59:37'),
(3, 'swati@gmail.com', 8, 'chain', 18000.00, '2026-04-20 18:00:03'),
(4, 'vaishali@gmail.com', 8, 'chain', 18000.00, '2026-04-23 13:19:52'),
(5, 'swati@gmail.com', 16, 'Nath', 2600.00, '2026-04-24 07:13:54'),
(6, 'abc@gmail.com', 8, 'chain', 18000.00, '2026-05-12 09:02:15');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `stock`) VALUES
(7, 'Gold Ring', 15000, NULL),
(8, 'chain', 18000, 6),
(9, 'jhumka', 40000, NULL),
(10, 'earings', 60000, NULL),
(11, 'pendant', 20000, NULL),
(12, 'Bugadi', 4500, NULL),
(13, 'Mangalsutra', 50000, NULL),
(14, 'pendant', 5400, NULL),
(15, 'Bugadi', 3600, NULL),
(16, 'Nath', 2600, NULL),
(17, 'Bangles', 5500, NULL),
(18, 'Nath', 4900, NULL),
(19, 'Payal', 3600, NULL),
(20, 'Thusi', 6000, NULL),
(21, 'Payal', 3000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`) VALUES
(1, 6, 'jhumka.jpeg'),
(2, 7, 'goldrind.jpg'),
(3, 8, 'chain.jpeg'),
(4, 9, 'jhumka1.jpeg'),
(5, 10, 'jhumka2.jpeg'),
(6, 11, 'pendant.jpeg'),
(7, 12, 'bugadi1.jpg'),
(8, 13, 'mangalsutra1.jpeg'),
(9, 14, 'pendant2.jpeg'),
(10, 15, 'bugadi2,jpeg.jpg'),
(11, 16, 'nath1.jpeg'),
(12, 17, 'bangles1.jpeg'),
(13, 18, 'nath2.jpeg'),
(14, 19, 'payal.jpeg'),
(15, 20, 'thusi.jpeg'),
(16, 21, 'payal.jpeg'),
(17, 22, 'chain.jpeg'),
(18, 23, 'chain.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sale_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `sale_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `customer_email` varchar(100) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `customer_email`, `product_id`, `created_at`) VALUES
(1, 'swati@gmail.com', 5, '2026-04-19 11:06:47'),
(2, 'swati@gmail.com', 7, '2026-04-19 19:27:38'),
(3, 'vanshika@gmail.com', 9, '2026-04-19 19:51:28'),
(4, 'swati@gmail.com', 19, '2026-04-21 17:15:13'),
(5, 'vaishali@gmail.com', 7, '2026-04-23 13:28:24'),
(6, 'swati@gmail.com', 16, '2026-04-23 16:55:42'),
(7, 'swati@gmail.com', 17, '2026-04-23 17:08:04'),
(8, 'swati@gmail.com', 8, '2026-04-24 06:53:49'),
(9, 'veda@gmail.com', 7, '2026-05-12 08:13:19'),
(10, 'abc@gmail.com', 9, '2026-05-12 09:01:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `jewellery_items`
--
ALTER TABLE `jewellery_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `jewellery_items`
--
ALTER TABLE `jewellery_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
