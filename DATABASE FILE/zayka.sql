-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2022 at 04:27 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zayka`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(13, 'kunj', 'kunj1234', 'c0c2c5749e0b9a0e761db57b68345c28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(4, 'Pizzaa', 'Food_Category_790.jpg', 'Yes', 'Yes'),
(5, 'Burger', 'Food_Category_344.jpg', 'Yes', 'Yes'),
(9, 'Wraps', 'Food_Category_374.jpg', 'Yes', 'Yes'),
(10, 'Pasta', 'Food_Category_948.jpg', 'Yes', 'Yes'),
(11, 'Sandwich', 'Food_Category_536.jpg', 'Yes', 'Yes'),
(17, 'chinese', 'Food_Category_848.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(5, 'Smoky BBQ Pizza 1   ', 'Best Firewood Pizza in Town.', '90.00', 'Food-Name-8298.jpg', 4, 'Yes', 'Yes'),
(9, 'Chicken Wrap new', 'Crispy flour tortilla loaded with juicy chicken, bacon, lettuce, avocado and cheese drizzled with a delicious spicy Ranch dressing.', '70.00', 'Food-Name-3461.jpg', 9, 'Yes', 'Yes'),
(10, 'Cheeseburger', 'A cheeseburger is a hamburger topped with cheese. Traditionally, the slice of cheese is placed on top of the meat patty.', '40.00', 'Food-Name-433.jpeg', 5, 'Yes', 'Yes'),
(34, 'manchrian', '...', '52.00', 'Food-Name-5994.jpg', 17, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(11, 'Grilled Cheese Sandwich', '3.00', 4, '12.00', '2022-06-08 08:18:43', 'Cancelled', 'okkl', '9712464200', 'patelkunj2021@gmail.com', 'B/3\r\nShaktinagar society\r\nDana road'),
(12, 'Ham Burger', '4.00', 1, '4.00', '2022-06-09 05:52:07', 'On Delivery', 'kunj', '4164632121', 'kunj1234@gmail.com', 'DDIT,nadiad hii  '),
(13, 'Chicken Wrap new', '70.00', 4, '280.00', '2022-06-09 09:12:50', 'Ordered', 'kunj', '1234567890', 'new@gmail.com', 'naidad'),
(14, 'Cheeseburger', '40.00', 1, '40.00', '2022-06-09 09:13:32', 'Ordered', 'kunj', '4164632121', 'patelkunj2021@gmail.com', 'B/3\r\nShaktinagar society\r\nDana road'),
(15, 'Cheeseburger', '40.00', 1, '40.00', '2022-06-09 09:18:21', 'Cancelled', 'fghdh', 'fgjfgjjd', 'kunj1234@gmail.com', 'fdj'),
(16, 'Smoky BBQ Pizza 1   ', '90.00', 1, '90.00', '2022-06-09 12:25:26', 'Delivered', 'random', '1234567809', 'patelkunj2021@gmail.com', 'B/3\r\nShaktinagar society\r\nDana road'),
(17, 'manchurian', '50.00', 1, '50.00', '2022-06-09 03:45:39', 'On Delivery', 'kunj patel', '9712464200', 'patelkunj2021@gmail.com', 'B/3\r\nShaktinagar society\r\nDana road'),
(18, 'Chicken Wrap new', '70.00', 1, '70.00', '2022-06-09 04:11:48', 'Delivered', 'kunj', '9712464200', 'patelkunj2021@gmail.com', 'B/3\r\nShaktinagar society\r\nDana road');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'kunj', '$2y$10$VdVYG5pSfYmCUAcbklcnC.PoOoTSsw6ngkdTr5ZVzaBdyO2EXHA6m', '2022-06-06 09:32:22'),
(2, 'kunj1', '$2y$10$9Mjj6wDmrmnUHGXyPfFNHOMCW567Syt4oe7PYzrdpM7wldCqp0UVS', '2022-06-07 07:37:26'),
(3, 'new1', '$2y$10$Ko5DIifC7mSWnG5mkaijmOXkuuSsJx/pTeYHZNXnMokW6yS884X1u', '2022-06-08 08:16:26'),
(4, 'kunjpatel', '$2y$10$csxcg10TEr80I42zcYhUAuupLjCIHrn1IQh9jHC5BTbw.Cl4IvjwS', '2022-06-09 19:03:38'),
(5, 'user', '$2y$10$OXLGHnDoaQFvpCHrzkp8C.i3ztIwW5/h3wca/IGIIuPrSsqInzCRW', '2022-06-09 19:12:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
