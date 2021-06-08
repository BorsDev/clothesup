-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2021 at 06:25 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clothes_up`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ADM_ID` int(20) NOT NULL,
  `ADM_PHOTO` varchar(120) NOT NULL,
  `ADM_FNAME` varchar(120) NOT NULL,
  `ADM_LNAME` varchar(120) NOT NULL,
  `ADM_UNAME` varchar(120) NOT NULL,
  `ADM_EMAIL` varchar(120) NOT NULL,
  `ADM_PHONE_NUMBER` varchar(120) NOT NULL,
  `ADM_WA_NUMBER` varchar(120) NOT NULL,
  `ADM_PASSWORD` varchar(120) NOT NULL,
  `ADM_CREATE_TIME` timestamp NOT NULL DEFAULT current_timestamp(),
  `ADM_UPDATE_TIME` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ADM_ID`, `ADM_PHOTO`, `ADM_FNAME`, `ADM_LNAME`, `ADM_UNAME`, `ADM_EMAIL`, `ADM_PHONE_NUMBER`, `ADM_WA_NUMBER`, `ADM_PASSWORD`, `ADM_CREATE_TIME`, `ADM_UPDATE_TIME`) VALUES
(1, 'bors.jpg', 'Bors', 'Bors', 'Bors.HB', 'bors@hypebeast.com', '+62-812-3456-7890', '+62-812-3456-7890', 'dummy', '2021-05-12 17:39:52', '2021-05-12 17:39:52'),
(2, 'tomy.jpg', 'Tomy', 'Tomy', 'Tomy.HB', 'Tomy@hypebeast.com', '+62-0812-2345-6777', '+62-0812-2345-6777', 'dummy', '2021-05-12 21:29:32', '2021-05-12 21:29:32'),
(3, 'user.png', 'Zurz', 'LMZ', 'ZURZLMZ', 'Zurz@gmail.com', '812-2345-5556', '812-2345-5556', '$2y$10$Obt5u1XK3JgWkpxQ4earReB1cwVlUdzkNvQNBO9vM5.eQbO6qyFzi', '2021-05-15 23:39:30', '2021-05-15 23:39:30'),
(4, 'user.png', 'Tommy', 'Yap', 'TommyYap', 'TommyYap@gmail.com', '81534101720', '81534101720', '$2y$10$rfKNwUHmAupKrIzZcFDb9Oi4J8mhy8v5/WTJd7HuAPAyBkSMwF4Pm', '2021-05-27 03:10:15', '2021-05-27 03:10:15');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `BRAND_ID` int(20) NOT NULL,
  `BRAND_NAME` varchar(120) NOT NULL,
  `TIME_CREATED` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `create_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`BRAND_ID`, `BRAND_NAME`, `TIME_CREATED`, `create_id`) VALUES
(1, 'Adidas', '2021-05-24 19:18:10', 1),
(2, 'Nike', '2021-05-22 03:44:21', 1),
(3, 'Alibaba', '2021-05-22 04:25:09', 3),
(4, 'Converse', '2021-05-24 14:18:21', 3);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `CART_ID` int(20) NOT NULL,
  `U_ID` int(20) NOT NULL,
  `CART_STATUS` varchar(100) NOT NULL,
  `TIME_CREATED` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`CART_ID`, `U_ID`, `CART_STATUS`, `TIME_CREATED`) VALUES
(6, 9, 'PENDING', '2021-06-04 20:30:16');

-- --------------------------------------------------------

--
-- Table structure for table `cart_container`
--

CREATE TABLE `cart_container` (
  `CART_ID` int(20) NOT NULL,
  `P_ID` int(20) NOT NULL,
  `P_B_QTY` int(20) NOT NULL,
  `TIME_CREATED` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_container`
--

INSERT INTO `cart_container` (`CART_ID`, `P_ID`, `P_B_QTY`, `TIME_CREATED`) VALUES
(6, 1, 7, '2021-06-05 21:34:22'),
(6, 2, 4, '2021-06-07 00:40:48');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CAT_ID` int(20) NOT NULL,
  `CAT_NAME` varchar(120) NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `creator_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CAT_ID`, `CAT_NAME`, `time_created`, `creator_id`) VALUES
(1, 'T-Shirt', '2021-05-21 22:35:33', 1),
(2, 'Long Shirt', '2021-05-21 21:42:12', 1),
(4, 'Shoes', '2021-05-21 16:49:55', 3),
(5, 'Accessories', '2021-05-21 17:11:02', 3),
(6, 'Jacket', '2021-05-24 14:17:51', 3);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `P_ID` int(20) NOT NULL,
  `P_NAME` varchar(120) NOT NULL,
  `P_PHOTO` varchar(120) NOT NULL,
  `P_PRICE` int(20) NOT NULL,
  `P_QTY` int(20) NOT NULL,
  `P_DESC` varchar(1000) NOT NULL,
  `BRAND_ID` int(32) NOT NULL,
  `CAT_ID` int(20) NOT NULL,
  `INPUT_BY_ID` int(20) NOT NULL,
  `INPUT_TIME` timestamp NOT NULL DEFAULT current_timestamp(),
  `EDITED_BY_ID` int(20) NOT NULL,
  `EDIT_TIME` timestamp NOT NULL DEFAULT current_timestamp(),
  `S_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`P_ID`, `P_NAME`, `P_PHOTO`, `P_PRICE`, `P_QTY`, `P_DESC`, `BRAND_ID`, `CAT_ID`, `INPUT_BY_ID`, `INPUT_TIME`, `EDITED_BY_ID`, `EDIT_TIME`, `S_ID`) VALUES
(1, 'Pocket Logo (Black)', 'photo1.png', 200, 54, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, sapiente illo. Sit error voluptas repellat rerum quidem, soluta enim perferendis voluptates laboriosam. Distinctio, officia quis dolore quos sapiente tempore alias.', 1, 1, 1, '2021-05-12 10:59:57', 3, '2021-05-21 15:59:29', 1),
(2, 'Chest Text (Black)', 'photo2.png', 200, 20, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, sapiente illo. Sit error voluptas repellat rerum quidem, soluta enim perferendis voluptates laboriosam. Distinctio, officia quis dolore quos sapiente tempore alias.', 1, 1, 1, '2021-05-12 10:59:57', 1, '2021-05-16 10:59:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `S_ID` int(20) NOT NULL,
  `S_NAME` varchar(120) NOT NULL,
  `S_EMAIL` varchar(120) NOT NULL,
  `S_ADDRESS` varchar(225) NOT NULL,
  `S_PHONE_NUMBER` varchar(20) NOT NULL,
  `S_WA_NUMBER` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`S_ID`, `S_NAME`, `S_EMAIL`, `S_ADDRESS`, `S_PHONE_NUMBER`, `S_WA_NUMBER`) VALUES
(1, 'Asiong', 'asiong@gmail.com', 'batam center', '+62-0812-3456-7899', '+62-0812-3456-7899'),
(2, 'Along', 'along@gmail.com', 'batam center', '+62-812-3456-7899', '+62-812-3456-7899');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `U_ID` int(20) NOT NULL,
  `U_FNAME` varchar(120) NOT NULL,
  `U_LNAME` varchar(120) NOT NULL,
  `U_EMAIL` varchar(120) NOT NULL,
  `U_PNUM` varchar(120) NOT NULL,
  `U_PASS` varchar(120) NOT NULL,
  `U_CREATE_TIME` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`U_ID`, `U_FNAME`, `U_LNAME`, `U_EMAIL`, `U_PNUM`, `U_PASS`, `U_CREATE_TIME`) VALUES
(9, 'Tommy', 'Yap', 'TommyYap@gmail.com', '81534101720', '$2y$10$U/.xIvHWhDph04ChhqRDqOdo7CanZilFCVlNpiZ8QVwVAnTZ1jMY6', '2021-05-27 05:51:00'),
(10, 'Bobby', 'Bade', 'bobby@gmail.com', '+62-815-3410-1720', '$2y$10$Av8O3jViyQiugqRYv48YF..9wr041WzFvykf67PKkZdVEJdPt1ft6', '2021-05-27 15:33:53'),
(11, 'Mia', 'Mia', 'mia@gmail.com', '+62-812-3456-7899', '$2y$10$xQ5.gfyzgBVMe7iAFEHW4OkD7s.eSK3EryQI13xADt.9vyFv2p1l2', '2021-05-27 22:21:54'),
(12, 'Suryanto', 'ngz', 'suryantongz@gmail.com', '81534101720', '$2y$10$eBOJ.tvEYUe8speIqY/wQu0QpV1vxqHaKKst16hbFt6pdAAGcTZJm', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ADM_ID`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`BRAND_ID`),
  ADD KEY `create_id` (`create_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CART_ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CAT_ID`),
  ADD KEY `creator_id` (`creator_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`P_ID`),
  ADD KEY `CAT_ID` (`CAT_ID`),
  ADD KEY `INPUT_BY_ID` (`INPUT_BY_ID`),
  ADD KEY `EDITED_BY_ID` (`EDITED_BY_ID`),
  ADD KEY `S_ID` (`S_ID`),
  ADD KEY `BRAND_ID` (`BRAND_ID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`S_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`U_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ADM_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `BRAND_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `CART_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CAT_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `P_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `S_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `U_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brand`
--
ALTER TABLE `brand`
  ADD CONSTRAINT `brand_ibfk_1` FOREIGN KEY (`create_id`) REFERENCES `admin` (`ADM_ID`);

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `admin` (`ADM_ID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`BRAND_ID`) REFERENCES `brand` (`BRAND_ID`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`CAT_ID`) REFERENCES `category` (`CAT_ID`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`INPUT_BY_ID`) REFERENCES `admin` (`ADM_ID`),
  ADD CONSTRAINT `product_ibfk_4` FOREIGN KEY (`EDITED_BY_ID`) REFERENCES `admin` (`ADM_ID`),
  ADD CONSTRAINT `product_ibfk_5` FOREIGN KEY (`S_ID`) REFERENCES `supplier` (`S_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
