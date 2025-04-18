-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2025 at 01:58 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freshfarm`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`, `description`) VALUES
(1, 'Vegetables', 'Fresh and organic veggies'),
(2, 'Fruits', 'Seasonal and organic fruits'),
(3, 'Dairy', 'Milk, butter, and cheese'),
(4, 'Grains', 'Rice, wheat, and other organic grains.');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `pick_up_location` text NOT NULL,
  `status` enum('Pending','Completed','Cancelled') DEFAULT 'Pending',
  `payment` varchar(120) NOT NULL,
  `total_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `product_id`, `quantity`, `customer_id`, `order_date`, `pick_up_location`, `status`, `payment`, `total_price`) VALUES
(14, 3, 2, 4, '2025-03-04 11:30:59', 'Hadapsar', 'Pending', 'paytm', 120.00),
(15, 4, 1, 4, '2025-03-04 11:30:59', 'Hadapsar', 'Pending', 'paytm', 80.00),
(16, 1, 2, 4, '2025-03-10 19:04:25', 'Kothrud', 'Pending', 'cod', 80.00),
(17, 2, 2, 4, '2025-03-10 19:04:25', 'Kothrud', 'Pending', 'cod', 320.00),
(18, 32, 1, 11, '2025-03-07 19:45:38', 'Hinjewadi', 'Pending', 'paytm', 100.00),
(19, 22, 1, 9, '2025-03-07 20:38:50', 'Hinjewadi', 'Pending', 'paytm', 40.00),
(20, 27, 1, 9, '2025-03-07 20:38:50', 'Hinjewadi', 'Pending', 'paytm', 120.00),
(21, 2, 3, 4, '2025-03-10 11:55:21', 'Wakad', 'Pending', 'cod', 480.00),
(22, 31, 3, 11, '2025-03-10 12:07:21', 'Kothrud', 'Pending', 'paytm', 270.00),
(23, 26, 1, 11, '2025-03-10 15:12:23', 'Hinjewadi', 'Pending', 'paytm', 60.00),
(24, 25, 1, 11, '2025-03-10 15:12:23', 'Hinjewadi', 'Pending', 'paytm', 30.00),
(25, 20, 6, 4, '2025-03-28 18:20:02', 'Baner', 'Pending', 'paytm', 480.00);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_method` enum('COD','UPI') NOT NULL,
  `payment_status` enum('Pending','Paid') DEFAULT 'Pending',
  `payment_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `order_id`, `payment_method`, `payment_status`, `payment_date`) VALUES
(1, 1, 'UPI', '', '2024-02-01 00:00:00'),
(2, 2, 'COD', 'Pending', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `photo_url` varchar(255) DEFAULT NULL,
  `product_expiry` date DEFAULT NULL,
  `product_type` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `farmer_id`, `category_id`, `name`, `description`, `price`, `quantity`, `photo_url`, `product_expiry`, `product_type`) VALUES
(1, 1, 1, 'Organic Carrots', '                                                                                Fresh organic carrots from the farm.                                                                                ', 40.00, 300, 'carrots.jpeg', '2025-02-07', 'Vegetables'),
(2, 1, 2, 'Mangoes', 'Sweet Alphonso mangoes.                                        ', 160.00, 10, 'mangoes.webp', '2025-02-28', 'Fruits'),
(3, 2, 3, 'Fresh Milk', 'Pure cow milk from organic dairy.', 60.00, 200, 'milk.jpg', NULL, ''),
(4, 2, 4, 'Brown Rice', 'Organic brown rice with high nutrition.', 80.00, 75, 'rice.jpg', NULL, 'Grains'),
(20, 2, 1, 'chillies', '                                                                                Best Organic Chilles                                                                                ', 80.00, 50, 'green_chillies.jpg', '2025-04-18', 'Vegetables'),
(21, 2, 1, 'tomato', 'fresh tomatos', 20.00, 10, 'tomato.png', '2025-03-26', 'Vegetables'),
(22, 2, 1, 'onion', 'Best Onions Direct from tingare farms', 40.00, 20, 'onion.jpg', '2025-03-31', 'Vegetables'),
(23, 2, 4, 'Toor Dal', 'without polish dal', 140.00, 40, 'tur dal.jpg', '2025-03-31', 'grains'),
(25, 9, 1, 'Lady Finger', 'fresh lady finger from patil farms', 30.00, 50, 'ladyfinger.jpg', '2025-03-21', 'Vegetables'),
(26, 9, 2, 'Watermelon', 'Freshly Watermelons From Patil Farms', 60.00, 20, 'watermelon.jpg', '2025-03-20', 'fruits'),
(27, 9, 2, 'Grapes', 'Fresh Grapes From Nashik', 120.00, 40, 'grapes.jpg', '2025-03-20', 'F'),
(28, 9, 4, 'Toor', 'Unpolished Dal', 120.00, 50, 'tur dal.jpg', '2025-03-31', 'grains'),
(29, 9, 1, 'lemon', 'fresh', 40.00, 10, 'lemon.jpg', '2025-03-13', 'Vegetables'),
(30, 9, 4, 'moog ', 'direct from framers', 100.00, 40, 'moog dal.jpg', '2025-03-28', 'grains'),
(31, 10, 4, 'chana dal', 'direct from farm', 90.00, 30, 'chana-dal.jpg', '2025-03-21', 'grains'),
(32, 10, 4, 'bajari', 'direct from farms', 100.00, 60, 'bajari.webp', '2025-03-24', 'grains'),
(33, 10, 4, 'urad dal', 'direct from farms', 70.00, 40, 'urad dal.jpg', '2025-03-29', 'gra'),
(34, 10, 4, 'Basmati Rice', 'direct from farms', 120.00, 60, 'soft-basmati-rice.webp', '2027-03-30', 'grains'),
(35, 9, 2, 'mango', 'fresh', 120.00, 10, 'tomato.png', '2025-03-20', 'fruit');

-- --------------------------------------------------------

--
-- Table structure for table `sales_report`
--

CREATE TABLE `sales_report` (
  `report_id` int(11) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `month` varchar(20) NOT NULL,
  `total_sales` decimal(10,2) NOT NULL,
  `generated_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_report`
--

INSERT INTO `sales_report` (`report_id`, `farmer_id`, `month`, `total_sales`, `generated_date`) VALUES
(1, 1, '2024-01', 5000.00, '2024-02-01'),
(2, 2, '2024-01', 7000.00, '2024-02-01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL DEFAULT 'Other',
  `user_type` enum('Farmer','Customer') NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `address`, `gender`, `user_type`, `phone_number`, `email`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Rahul', 'Sharma', 'Village 1, Maharashtra ', 'Male', 'Farmer', '9850794592', 'rahul@example.com ', 'rahul123', '7c6a180b36896a0a8c02787eeafb0e4c', '2025-02-06 09:43:27', '2025-02-07 06:16:41'),
(2, 'Amit', 'Patel', 'amit@example.com   ', 'Male', 'Farmer', '1234', '  ', 'amit_farm', '6cb75f652a9b52798eb6cf2201057c73', '2025-02-06 09:43:27', '2025-02-06 11:55:43'),
(3, 'Anand', 'Jadhav', 'A503 Varad Vrundavan KhopdeNagar Katraj', 'Male', 'Customer', '9156884592', 'itsmeanand80@gmail.com', 'anand', '81dc9bdb52d04dc20036dbd8313ed055', '2025-01-21 15:39:39', '2025-02-06 09:47:30'),
(4, 'Priya', 'Singh', 'City 1, Mumbai', 'Female', 'Customer', '9998877665', 'priya@example.com', 'priya_buyer', '819b0643d6b89dc9b579fdfc9094f28e', '2025-02-06 09:43:27', '2025-02-06 09:47:40'),
(7, 'Rohan', 'Kumar', 'City 2, Pune', 'Male', 'Customer', '7788996655', 'rohan@example.com', 'rohan_buyer', '34cc93ece0ba9e3f6f235d4af979b16c', '2025-02-06 09:43:27', NULL),
(8, 'Pooja', 'Jadhav', 'ABC', 'Female', 'Farmer', '123', 'abc@gmail.com', 'pooja123', '202cb962ac59075b964b07152d234b70', '2025-02-19 05:42:36', NULL),
(9, 'kunal', 'patil', 'vrundavan colony', 'Male', 'Farmer', '4545454544', 'kp@gmail.com', 'kp', '9f70a90999ba173c32186f1d70722b91', '2025-03-07 00:30:54', '2025-03-07 00:35:44'),
(10, 'aditya ', 'pawar', 'supa', 'Male', 'Farmer', '55555555', 'adi@abc.com', 'aditya', '8b019af0a1de935cc5e76d804967d51a', '2025-03-07 00:53:54', NULL),
(11, 'jayesh', 'patil', 'pune', 'Male', 'Customer', '985647855', 'jp@abc.com', 'jp', '7a7e28631835bd778c21885df4822ca0', '2025-03-07 08:44:03', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `farmer_id` (`farmer_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `sales_report`
--
ALTER TABLE `sales_report`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `farmer_id` (`farmer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `sales_report`
--
ALTER TABLE `sales_report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`farmer_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `sales_report`
--
ALTER TABLE `sales_report`
  ADD CONSTRAINT `sales_report_ibfk_1` FOREIGN KEY (`farmer_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
