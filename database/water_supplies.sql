-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2025 at 07:43 AM
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
-- Database: `water_supplies`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `img` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `title`, `description`, `img`) VALUES
(1, 'Shortly About Us', 'There are many variations of passages of available but the majority have alteration in some form by inject humour or random words which dont look even slightly they will believe you. proident.\r\n\r\n', 'upload/about_us/about-img.png');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `product` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `delivery_status` varchar(50) NOT NULL,
  `delivery_address` varchar(5000) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `order_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `customer_name`, `status`, `product`, `price`, `payment_method`, `delivery_status`, `delivery_address`, `qty`, `order_date`) VALUES
(1, 'John Doe', 'Pending', 'Laptop', 899.99, 'Credit Card', 'Processing', '', '', '2024-01-15 10:30:00'),
(2, 'Jane Smith', 'Completed', 'Smartphone', 499.50, 'PayPal', 'Delivered', '', '', '2024-01-14 14:00:00'),
(3, 'Michael Johnson', 'Cancelled', 'Headphones', 99.99, 'Debit Card', 'Cancelled', '', '', '2024-01-12 08:45:00'),
(4, 'Emily Davis', 'Pending', 'Smartwatch', 199.99, 'Cash on Delivery', 'Shipped', '', '', '2024-01-16 12:15:00'),
(5, 'Chris Brown', 'Completed', 'Tablet', 299.99, 'Credit Card', 'Delivered', '', '', '2024-01-13 09:20:00'),
(6, 'Sarah Wilson', 'Pending', 'Gaming Console', 599.99, 'Bank Transfer', 'Processing', '', '', '2024-01-17 16:00:00'),
(7, 'David Miller', 'Shipped', 'Camera', 749.99, 'Credit Card', 'Shipped', '', '', '2024-01-18 18:30:00'),
(8, 'Sophia Taylor', 'Completed', 'External Hard Drive', 129.99, 'PayPal', 'Delivered', '', '', '2024-01-19 20:45:00'),
(9, 'James Anderson', 'Cancelled', 'Wireless Keyboard', 59.99, 'Debit Card', 'Cancelled', '', '', '2024-01-20 22:10:00'),
(10, 'Olivia Martinez', 'Pending', 'Monitor', 349.99, 'Cash on Delivery', 'Processing', '', '', '2024-01-21 11:05:00'),
(11, 'demo order', 'Pending', 'Premium Water Bottle', 10.00, 'Credit Card', 'Processing', '', '', '2025-01-30 20:37:29'),
(12, 'paresh solanki', 'Pending', 'Premium Water Bottle', 10.00, 'Cash on Delivery', 'Processing', '', '', '2025-01-30 20:50:36'),
(13, 'paresh solanki', 'Pending', 'Premium Water Bottle', 10.00, 'Online', 'Processing', '', '', '2025-01-30 20:50:57'),
(14, 'raj', 'Pending', '10 Litre Gallon', 100.00, 'Cash on Delivery', 'Processing', '', '', '2025-01-30 20:59:04'),
(15, 'paresh solanki 123', 'Pending', '10 Litre Gallon', 100.00, 'Cash on Delivery', 'Processing', 'palitana sarvoday', '', '2025-01-30 21:01:19'),
(16, 'paresh solanki 123', 'Pending', '10 Litre Gallon', 100.00, 'Cash on Delivery', 'Processing', 'palitana sarvoday', '', '2025-01-30 21:01:57'),
(17, 'paresh solanki 123', 'Pending', '10 Litre Gallon', 100.00, 'Cash on Delivery', 'Processing', 'palitana sarvoday', '', '2025-01-30 21:02:09'),
(18, 'paresh solanki 100', 'Pending', '10 Litre Gallon', 10000.00, 'Cash on Delivery', 'Processing', 'palitana sarvoday', '100', '2025-01-30 21:10:19'),
(19, 'paresh solanki 100', 'Pending', '10 Litre Gallon', 10000.00, 'Cash on Delivery', 'Processing', 'palitana sarvoday', '100', '2025-01-30 21:11:40'),
(20, 'demo order', 'Pending', '10 Litre Gallon', 200.00, 'Online', 'Processing', 'palitana sarvoday', '2', '2025-01-30 21:12:04'),
(21, 'Spm Shop', 'Pending', '10 Litre Gallon', 1000.00, 'Online', 'Processing', 'Jaiya manaji nearest bapashitaram madhi', '10', '2025-01-30 21:21:06'),
(22, 'Spm Shop', 'Pending', '10 Litre Gallon', 1000.00, 'Online', 'Processing', 'Jaiya manaji nearest bapashitaram madhi', '10', '2025-01-30 21:21:48'),
(23, 'Spm Shop', 'Pending', '10 Litre Gallon', 1000.00, 'Online', 'Processing', 'Jaiya manaji nearest bapashitaram madhi', '10', '2025-01-30 21:22:06'),
(24, 'Spm Shop paresh', 'Pending', '10 Litre Gallon', 1000.00, 'Online', 'Processing', 'Jaiya manaji nearest bapashitaram madhi', '10', '2025-01-30 21:33:05'),
(25, 'Spm Shop demo', 'Pending', '10 Litre Gallon', 1200.00, 'Online', 'Processing', 'Jaiya manaji nearest bapashitaram madhi', '12', '2025-01-30 21:35:27');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gmail` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `gmail`, `message`) VALUES
(3, 'admin', 'admin@gmail.com', 'hello'),
(4, 'jaynit', 'makwanajayu92@gmail.com', 'hello'),
(22, 'jaynit', 'madhur.water@gmail.com', 'my insta id is jayu__92'),
(23, 'jaynit', 'makwanajaynit351@gmail.com', 'jayu__92');

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `id` int(11) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_phone` varchar(255) NOT NULL,
  `contact_address` text NOT NULL,
  `contact_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`id`, `contact_name`, `contact_email`, `contact_phone`, `contact_address`, `contact_image`) VALUES
(1, 'John Doe', 'johndoe@example.com', '+91 234567890', '123 Main Street, City, Country', 'upload/contact_details/about-3-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gmail` varchar(150) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `gmail`, `password`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', 'admin'),
(2, 'user', 'user@gmail.com', 'user', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `img` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `img`) VALUES
(67, 'Great taste fresh & consistent', 'There are many variations of passages of available but majority have alteration in some by inject humour or random words.', 'upload/news/blog1.png');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `product` varchar(200) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `status`, `price`, `product`, `order_date`) VALUES
(1, 'John Doe', 'pending', 150.00, 'abc', '2025-01-20 22:30:00'),
(2, 'Jane Smith', 'Pending', 350.75, '', '2025-01-22 18:15:00'),
(3, 'Robert Johnson', 'pending', 245.50, '', '2025-01-23 19:45:00'),
(4, 'Emily Davis', 'Completed', 120.00, '', '2025-01-25 17:00:00'),
(5, 'Michael Brown', 'approve', 99.99, '', '2025-01-29 00:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `biography` text DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `full_name`, `username`, `biography`, `role`, `status`, `email`, `phone`, `website`, `address`, `profile_picture`) VALUES
(1, 'John Doe5', 'johndoe123', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vel ipsum a lacus pulvinar pharetra.', 'Graphic Designer', 'Active', 'johndoe@example.com', '+1234567890', 'https://johndoe.com', '1234 Elm Street, Springfield, USA', 'user_icon.jpg'),
(2, 'John Doe', 'johndoe123', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vel ipsum a lacus pulvinar pharetra.', 'Graphic Designer', 'Active', 'johndoe@example.com', '+1234567890', 'https://johndoe.com', '1234 Elm Street, Springfield, USA', 'about-3-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `img` varchar(500) NOT NULL,
  `price` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `img`, `price`) VALUES
(13, '10 Litre Gallon', 'Sed quia magni eos qui lorem ratione volup tatem.', 'upload/services/water-gallon.svg', '100'),
(14, '20 Litre Gallon', 'Sed quia magni eos qui lorem ratione volup tatem.', 'upload/services/big-bottle-of-water.svg', '100'),
(15, '1 Litre Gallon', 'Sed quia magni eos qui lorem ratione volup tatem.', 'upload/services/water-bottle.svg', '100'),
(16, 'Water Bottles Set', 'Sed quia magni eos qui lorem ratione volup tatem.', 'upload/services/water-bottle(2).svg', '100'),
(17, '2 Litre Gallon', 'Sed quia magni eos qui lorem ratione volup tatem.', 'upload/services/water-bottle(1).svg', '100'),
(18, '5 Litre Gallon', 'Sed quia magni eos qui lorem ratione volup tatem.', 'upload/services/big-bottle-of-water-with-handle.svg', '100');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
