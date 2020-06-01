-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2020 at 10:18 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electroshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Laptops'),
(3, 'Cameras'),
(4, 'Mice');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`) VALUES
(1, 'Apple'),
(2, 'Samsung'),
(3, 'Nikon'),
(4, 'Sony'),
(5, 'Canon'),
(6, 'Fujifilm'),
(7, 'Lenovo'),
(9, 'Acer'),
(10, 'Asus'),
(11, 'HP'),
(12, 'Logitech'),
(13, 'Dell');

-- --------------------------------------------------------

--
-- Table structure for table `navigation`
--

CREATE TABLE `navigation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `href` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `navigation`
--

INSERT INTO `navigation` (`id`, `name`, `href`) VALUES
(1, 'Home', '/index.php'),
(2, 'Shop', '/shop.php'),
(3, 'About Us', '/about.php'),
(4, 'Contact', '/contact.php'),
(5, 'Website Documentation', '/documentation.php'),
(6, 'Website Author', '/author.php');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `alt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `category_id`, `company_id`, `image`, `alt`) VALUES
(5, 'Canon EOS 550D', '1299', 3, 5, 'canon_eos_550d.png', 'Canon EOS 550D'),
(6, 'Fujifilm x100s', '499', 3, 6, 'fujifilm_x100s.png', 'Fujifilm x100s'),
(7, 'Nikon D800', '1899', 3, 3, 'nikon_d800.png', 'Nikon D800'),
(8, 'Nikon D3300', '599', 3, 3, 'nikon_d3300.png', 'Nikon D3300'),
(9, 'Nikon D5100', '799', 3, 3, 'nikon_d5100.png', 'Nikon D5100'),
(10, 'Samsung NX200', '599', 3, 2, 'samsung_nx200.png', 'Samsung NX200'),
(11, 'Samsung x21', '369', 3, 2, 'samsung_x21.png', 'Samsung x21'),
(12, 'Sony a700', '1099', 3, 4, 'sony_a700.png', 'Sony a700'),
(13, 'Sony RX10', '1789', 3, 4, 'sony_rx10.png', 'Sony RX10'),
(14, 'Asus Glide', '29', 4, 10, 'asus_glide.png', 'Asus Glide'),
(15, 'Asus Glide 2', '59', 4, 10, 'asus_glide2.png', 'Asus Glide 2'),
(16, 'Logitech P2', '18', 4, 12, 'logitech_p2.png', 'Logitech P2'),
(17, 'Logitech P3', '39', 4, 12, 'logitech_p3.png', 'Logitech P3'),
(18, 'Acer T1011', '879', 1, 9, 'acer_t1011.png', 'Acer T1011'),
(19, 'Asus Z5', '1199', 1, 10, 'asus_z5.png', 'Asus Z5'),
(20, 'Dell Inspire', '659', 1, 13, 'dell_inspire.png', 'Dell Inspire'),
(21, 'HP Pavilion', '549', 1, 11, 'hp_pavilion.png', 'HP Pavilion'),
(22, 'MacBook Pro 2018', '1999', 1, 1, 'macbook_pro_2018.png', 'MacBook Pro 2018'),
(23, 'Samsung RT13', '1199', 1, 2, 'samsung_rt13.png', 'Samsung RT13'),
(24, 'Samsung Space', '1579', 1, 2, 'samsung_space.png', 'Samsung Space'),
(25, 'Sony Surface', '689', 1, 4, 'sony_surface.png', 'Sony Surface');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created`, `role`) VALUES
(1, 'Test', 'test@gmail.com', '098f6bcd4621d373cade4e832627b4f6', '2020-05-21 15:23:04', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navigation`
--
ALTER TABLE `navigation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category` (`category_id`),
  ADD KEY `fk_company` (`company_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `navigation`
--
ALTER TABLE `navigation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_company` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
