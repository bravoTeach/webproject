-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2024 at 06:48 AM
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
-- Database: `array_dashboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `userid` varchar(1000) NOT NULL,
  `pass` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `userid`, `pass`) VALUES
(3, 'jibran', '123'),
(4, 'talal', 'talal12');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(11) NOT NULL,
  `amount` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip` varchar(100) NOT NULL,
  `name_on_card` varchar(100) NOT NULL,
  `ccnum` bigint(20) NOT NULL,
  `expmonth` int(2) NOT NULL,
  `expyear` year(4) NOT NULL,
  `cvv` int(3) NOT NULL,
  `token` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(100) NOT NULL,
  `total_amount` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_detail`
--

CREATE TABLE `invoice_detail` (
  `id` int(100) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `order_name` varchar(100) NOT NULL,
  `order_date` date NOT NULL,
  `order_price` varchar(100) NOT NULL,
  `invoice_id` varchar(100) NOT NULL,
  `total_amount` varchar(100) NOT NULL,
  `cus_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `placeorder`
--

CREATE TABLE `placeorder` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `required` varchar(100) NOT NULL,
  `height` varchar(100) NOT NULL,
  `width` varchar(100) NOT NULL,
  `fabric` varchar(100) NOT NULL,
  `placement` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `ins` varchar(10000) NOT NULL,
  `image` varchar(100) NOT NULL,
  `image1` varchar(100) NOT NULL,
  `urgent` varchar(100) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `user` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `edit` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `placeorder`
--

INSERT INTO `placeorder` (`id`, `name`, `required`, `height`, `width`, `fabric`, `placement`, `color`, `ins`, `image`, `image1`, `urgent`, `date`, `user`, `email`, `status`, `edit`) VALUES
(276, 'jibran ahmed', 'Others', '43', '89', 'wool', 'bags', '78', 'uiphuih', 'cap - Copy - Copy.png', '', '', '2024-05-02 18:05:47.381341', 'jibran', 'jibranahmed1752@gmail.com', 'in process', 0),
(277, 'jibran', 'Others', '59', '89', 'milliskin', 'bags', 'nn', 'nnnnn', 'cap - Copy - Copy (2).png', '', '', '2024-05-02 18:13:56.256892', 'jibran', 'jibranahmed1752@gmail.com', 'in process', 0);

-- --------------------------------------------------------

--
-- Table structure for table `placequote`
--

CREATE TABLE `placequote` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `required` varchar(100) NOT NULL,
  `height` varchar(100) NOT NULL,
  `width` varchar(100) NOT NULL,
  `fabric` varchar(100) NOT NULL,
  `placement` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `ins` varchar(10000) NOT NULL,
  `image` varchar(100) NOT NULL,
  `image1` varchar(100) NOT NULL,
  `urgent` varchar(100) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `user` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `edit` int(100) NOT NULL,
  `order_status` varchar(100) NOT NULL DEFAULT 'quote'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `placequote`
--

INSERT INTO `placequote` (`id`, `name`, `required`, `height`, `width`, `fabric`, `placement`, `color`, `ins`, `image`, `image1`, `urgent`, `date`, `user`, `email`, `status`, `edit`, `order_status`) VALUES
(204, 'jibran', 'Others', '59', '89', 'milliskin', 'bags', 'nn', 'nnnnn', 'cap - Copy - Copy (2).png', '', '', '2024-05-02 18:01:29.285382', '', 'jibranahmed1752@gmail.com', 'release', 0, 'order'),
(205, 'jibran ahmed', 'Others', '43', '89', 'wool', 'bags', '78', 'uiphuih', 'cap - Copy - Copy.png', '', '', '2024-05-02 18:05:15.797694', '', 'jibranahmed1752@gmail.com', 'in process', 0, 'order');

-- --------------------------------------------------------

--
-- Table structure for table `placevector`
--

CREATE TABLE `placevector` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `required` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `ins` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `image1` varchar(100) NOT NULL,
  `urgent` varchar(100) NOT NULL,
  `date` timestamp(6) NULL DEFAULT current_timestamp(6),
  `user` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `edit` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `release_order`
--

CREATE TABLE `release_order` (
  `id` int(11) NOT NULL,
  `orderid` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image1` varchar(100) NOT NULL,
  `stich` varchar(100) NOT NULL,
  `ordername` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'remaining',
  `user` varchar(100) NOT NULL,
  `rec_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `release_order`
--

INSERT INTO `release_order` (`id`, `orderid`, `email`, `price`, `image1`, `stich`, `ordername`, `status`, `user`, `rec_date`) VALUES
(159, 107, 'jibranahmed1752@gmail.com', '12000', 'gloves4 - Copy.png', '400', '', 'paid', '', '2023-04-05'),
(160, 107, 'jibranahmed1752@gmail.com', '12000', 'gloves5 - Copy.png', '400', '', 'paid', '', '2023-04-05');

-- --------------------------------------------------------

--
-- Table structure for table `release_quote`
--

CREATE TABLE `release_quote` (
  `id` int(11) NOT NULL,
  `orderid` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image1` varchar(100) NOT NULL,
  `stich` varchar(100) NOT NULL,
  `ordername` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'remaining',
  `user` varchar(100) NOT NULL,
  `rec_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `release_quote`
--

INSERT INTO `release_quote` (`id`, `orderid`, `email`, `price`, `image1`, `stich`, `ordername`, `status`, `user`, `rec_date`) VALUES
(1, 4, 'jibranahmed1752@gmail.com  ', '32000', '../upload/cap - Copy.png', '', '', 'paid', '', '2023-04-05'),
(2, 4, 'jibranahmed1752@gmail.com  ', '32000', '../upload/cap2.png', '', '', 'paid', '', '2023-04-05'),
(286, 204, 'jibranahmed1752@gmail.com', '12000', 'cap - Copy - Copy.png', '400', '', 'remaining', '', '2024-05-02'),
(287, 204, 'jibranahmed1752@gmail.com', '12000', 'cap6.png', '400', '', 'remaining', '', '2024-05-02'),
(288, 204, 'jibranahmed1752@gmail.com', '12000', 'gloves - Copy.png', '400', '', 'remaining', '', '2024-05-02');

-- --------------------------------------------------------

--
-- Table structure for table `release_vector`
--

CREATE TABLE `release_vector` (
  `id` int(11) NOT NULL,
  `orderid` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image1` varchar(100) NOT NULL,
  `stich` varchar(100) NOT NULL,
  `ordername` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'remaining',
  `user` varchar(100) NOT NULL,
  `rec_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `release_vector`
--

INSERT INTO `release_vector` (`id`, `orderid`, `email`, `price`, `image1`, `stich`, `ordername`, `status`, `user`, `rec_date`) VALUES
(2000, 67, 'jibranahmed1752@gmail.com  ', 'jibran', '../upload/cap.png', '', '', 'paid', '', '2023-04-05'),
(2001, 67, 'jibranahmed1752@gmail.com  ', 'jibran', '../upload/cap2.png', '', '', 'paid', '', '2023-04-05');

-- --------------------------------------------------------

--
-- Table structure for table `sales_signup`
--

CREATE TABLE `sales_signup` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `asi` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `phone2` varchar(100) NOT NULL,
  `cell` varchar(100) NOT NULL,
  `fax` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `email2` varchar(100) NOT NULL,
  `email3` varchar(100) NOT NULL,
  `email4` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `ref` varchar(1000) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `name`, `company`, `asi`, `type`, `phone`, `phone2`, `cell`, `fax`, `email`, `email2`, `email3`, `email4`, `address`, `city`, `state`, `zip`, `country`, `user`, `pass`, `ref`, `date`) VALUES
(103, 'jibran', 'jibran', '', '', '03122321752', '', '', '', 'jibranahmed1752@gmail.com', '', '', '', '', '', '', '', '', 'jibran', '123456', '', '2024-03-13 11:05:39.871539');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_detail`
--
ALTER TABLE `invoice_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `placeorder`
--
ALTER TABLE `placeorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `placequote`
--
ALTER TABLE `placequote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `placevector`
--
ALTER TABLE `placevector`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `release_order`
--
ALTER TABLE `release_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `release_quote`
--
ALTER TABLE `release_quote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `release_vector`
--
ALTER TABLE `release_vector`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_signup`
--
ALTER TABLE `sales_signup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `invoice_detail`
--
ALTER TABLE `invoice_detail`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `placeorder`
--
ALTER TABLE `placeorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;

--
-- AUTO_INCREMENT for table `placequote`
--
ALTER TABLE `placequote`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT for table `placevector`
--
ALTER TABLE `placevector`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT for table `release_order`
--
ALTER TABLE `release_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=568;

--
-- AUTO_INCREMENT for table `release_quote`
--
ALTER TABLE `release_quote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=289;

--
-- AUTO_INCREMENT for table `release_vector`
--
ALTER TABLE `release_vector`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2193;

--
-- AUTO_INCREMENT for table `sales_signup`
--
ALTER TABLE `sales_signup`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
