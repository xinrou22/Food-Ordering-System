-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2022 at 09:43 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fos_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `fname`, `username`, `email`, `contact`, `password`) VALUES
(1, 'Chou Xin Rou', 'admin', 'admin@gmail.com', '0123456789', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `category_list`
--

CREATE TABLE `category_list` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_list`
--

INSERT INTO `category_list` (`id`, `title`, `image`) VALUES
(1, 'Burger', '625a6e1619756.jpg'),
(2, 'Pizza', '625a6e72ccaf5.jpg'),
(3, 'Sandwich', '625a6e9134421.jpg'),
(4, 'Pasta', '625a6eb1ee25e.jpg'),
(5, 'Dessert', '625a6ecae220d.jpg'),
(6, 'Drinks', '625a6ed76b978.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `menu_list`
--

CREATE TABLE `menu_list` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_id` int(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_list`
--

INSERT INTO `menu_list` (`id`, `title`, `about`, `price`, `category_id`, `image`) VALUES
(1, 'Sandwich', 'Roast Beef Sandwich	Roast Beef Sandwich Recipe with Horseradish Cream is absolutely loaded up with flavor, from the thinly sliced roast beef to the roasted potatoes, to the horseradish cream, if you want delicious, then this is the sandwich for you.', '10.00', 3, '625a6f142b95c.jpg'),
(2, 'Detroit-Style Pizza', 'A thick, square-cut pizza with a crunchy, fried bottom layer of crust overflowing with delicious melted cheese. The result of this unique pizza style is a gooey, doughy center with a crunchy outer crust and caramelized cheese hugging its edges.', '12.00', 2, '625a6f561ede2.jpg'),
(3, 'Pasta Puttanesca', 'Pasta Puttanesca is made with canned tomato paste and crushed tomatoes, canned anchovies, canned olives and capers.', '10.00', 4, '625a6f93e6416.jpg'),
(4, 'Garlicky Kale, Sausage, and Tomato Pasta', 'This dish combines juicy tomatoes with hearty whole-wheat pasta, sausage, and kale.', '10.00', 4, '625a700dbede5.jpg'),
(5, 'Ham Burger', 'Burger with Ham, Pineapple and lots of Cheese.', '8.00', 1, '625a703e6f7d8.jpg'),
(6, 'Cheeseburger', 'A cheeseburger is a hamburger topped with cheese. Traditionally, the slice of cheese is placed on top of the meat patty.', '6.00', 1, '625a7063bcb6d.jpeg'),
(7, 'Smoky BBQ Pizza', '', '15.00', 2, '625a70e75010b.jpg'),
(8, 'Chocolate Cake', '', '8.00', 5, '625a711d0b2c0.jpg'),
(9, 'Iced Lemon Tea	', '', '8.00', 6, '625a71366714c.jpg'),
(10, 'Chocolate Milk	', '', '8.00', 6, '625a7150d7a08.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `username`, `password`, `email`, `contact`, `address`) VALUES
(1, 'Eian Wen Hui', 'user1', '123456', 'user1@gmail.com', '01234567899', 'No7881, Taman Bunga, Kuala Lumpur'),
(2, 'Michelle Cheng Jin Ying', 'user2', '123456', 'user2@gmail.com', '0145678945', 'No81 Taman Intan, Kuala Lumpur');

-- --------------------------------------------------------

--
-- Table structure for table `users_orders`
--

CREATE TABLE `users_orders` (
  `o_id` int(255) NOT NULL,
  `u_id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_orders`
--

INSERT INTO `users_orders` (`o_id`, `u_id`, `title`, `quantity`, `price`, `status`, `date`, `remark`) VALUES
(1, 1, 'Ham Burger', 5, '8.00', 'in process', '2022-04-16 07:34:52', ''),
(2, 1, 'Cheeseburger', 1, '6.00', 'closed', '2022-04-16 07:34:52', ''),
(3, 1, 'Detroit-Style Pizza', 2, '12.00', 'rejected', '2022-04-16 07:34:52', 'Sold Out'),
(4, 1, 'Smoky BBQ Pizza', 1, '15.00', NULL, '2022-04-16 07:34:52', ''),
(5, 1, 'Iced Lemon Tea	', 1, '8.00', NULL, '2022-04-16 07:34:52', ''),
(6, 1, 'Chocolate Milk	', 1, '8.00', NULL, '2022-04-16 07:34:52', ''),
(7, 2, 'Pasta Puttanesca', 1, '10.00', NULL, '2022-04-16 07:38:06', ''),
(8, 2, 'Garlicky Kale, Sausage, and Tomato Pasta', 2, '10.00', NULL, '2022-04-16 07:38:06', ''),
(9, 2, 'Chocolate Cake', 1, '8.00', 'in process', '2022-04-16 07:38:06', ''),
(10, 2, 'Cheeseburger', 1, '6.00', 'closed', '2022-04-16 07:38:06', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category_list`
--
ALTER TABLE `category_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_list`
--
ALTER TABLE `menu_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_orders`
--
ALTER TABLE `users_orders`
  ADD PRIMARY KEY (`o_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category_list`
--
ALTER TABLE `category_list`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu_list`
--
ALTER TABLE `menu_list`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_orders`
--
ALTER TABLE `users_orders`
  MODIFY `o_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
