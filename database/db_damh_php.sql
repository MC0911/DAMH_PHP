-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2024 at 08:42 AM
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
-- Database: `db_damh_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'manhcuongg', 'cuong@gmail.com', '123456Aa@');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cart_name` varchar(255) NOT NULL,
  `cart_image` varchar(255) NOT NULL,
  `cart_quantity` int(255) NOT NULL,
  `cart_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `cart_name`, `cart_image`, `cart_quantity`, `cart_price`) VALUES
(43, 'Áo thun 123', 'product1.jpg', 3, '100'),
(44, 'Quần thun 111', 'product2.jpg', 4, '70');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Áo'),
(2, 'Quần'),
(3, 'Giày thể thao'),
(5, 'Giày');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_name` varchar(255) NOT NULL,
  `order_address` varchar(255) NOT NULL,
  `order_phonenumber` varchar(11) NOT NULL,
  `order_size` varchar(255) NOT NULL,
  `total_products` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_name`, `order_address`, `order_phonenumber`, `order_size`, `total_products`, `total_price`) VALUES
(1, 'cng', 'qwe@gmail.com', '21231231', 'Medium', 'Áo thun 123 (1) , Áo thun 333 (1) , Quần thể thao 444 (1) ', '300'),
(2, 'qweaaa', 'qweeee@gmail.com', '123123123', 'Big', 'Áo thun 123 (9) , Áo thun 333 (1) , Quần thể thao 444 (1) , Giày thể thao 666 (7) ', '1114'),
(3, 'qweaaa', 'qweeee@gmail.com', '123123123', 'Big', 'Áo thun 123 (9) , Áo thun 333 (1) , Quần thể thao 444 (1) , Giày thể thao 666 (7) ', '15100'),
(4, 'asdasd', 'zxczxczxc', '12312312312', 'Big', 'Áo thun 333 (1) , Quần thể thao 444 (1) ', '200'),
(5, 'Hà Mạnh Cường', '017 Bùi Công Trừng, xã Đông Thạnh, huyện Hóc Môn.', '862727024', 'Large', 'Áo thun 333 (3) , Quần thể thao 444 (4) , Giày thể thao 666 (1) ', '2720'),
(6, 'Hà Mạnh Cường', '017 Bùi Công Trừng, xã Đông Thạnh, huyện Hóc Môn.', '862727024', 'Large', 'Áo thun 123 (4) , Quần thể thao 444 (4) ', '880'),
(7, 'Hà Mạnh Cường', '017 Bùi Công Trừng, xã Đông Thạnh, huyện Hóc Môn.', '862727024', 'Medium', 'Áo thun 123 (3) , Quần thun 111 (4) ', '580');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_category` int(11) NOT NULL,
  `product_desc` varchar(255) DEFAULT NULL,
  `product_img` varchar(255) DEFAULT NULL,
  `product_price` int(11) NOT NULL,
  `product_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_category`, `product_desc`, `product_img`, `product_price`, `product_status`) VALUES
(1, 'Áo thun 123', 1, 'Áo được làm từ ......', 'product1.jpg', 100, 'Hot'),
(2, 'Quần thun 111', 2, 'Quần thun này được sản xuất ....', 'product2.jpg', 70, 'Hot'),
(3, 'Áo thun 333', 1, 'Áo thun này được tài trợ ...', 'product3.png', 80, 'New'),
(4, 'Quần thể thao 444', 2, 'Quần được làm từ chất liệu vải tự nhiên ...', 'product4.png', 120, 'New'),
(9, 'Giày thể thao 666', 3, 'Giày bao chuẩn', 'product8.jpg', 2000, 'New'),
(12, 'Quần sọt', 2, 'Quần juan', 'product7.jpg', 1000, 'Hot'),
(13, 'Quần dài', 2, 'qweasdzxcqweqweqweqweasd xczxcxzcasdqwe qweqweqw easdadzxczxcxzc', 'product6.jpg', 200, 'New'),
(14, 'Giày da 111', 5, 'Giày juan', 'product10.jpg', 10000, 'Hot'),
(15, 'Giày thể thao 333', 3, 'Giày juan', 'product9.jpg', 2000, 'Hot'),
(16, 'Quần dài âu 111', 2, 'Quần juan', 'product5.jpg', 1500, 'Hot');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_phonenumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_address`, `user_phonenumber`) VALUES
(1, 'Hà Mạnh Cường', 'manhcuong@gmail.com', '12345', '017 Bùi Công Trừng, xã Đông Thạnh, huyện Hóc Môn.', 862727024),
(2, 'huy', 'huy@gmail.com', '12345', 'Quận 9, TP.HCM', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `wishlist_user` int(11) NOT NULL,
  `wishlist_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_category` (`product_category`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`),
  ADD KEY `wishlist_product` (`wishlist_product`),
  ADD KEY `wishlist_user` (`wishlist_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`product_category`) REFERENCES `categories` (`category_id`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`wishlist_product`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`wishlist_user`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
