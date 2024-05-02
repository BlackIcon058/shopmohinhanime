-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2024 at 05:50 AM
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
-- Database: `shopmohinhanime`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `status`) VALUES
(16, 'SPECIAL', 1),
(17, 'ONMYOJI', 1),
(18, 'ESTREAM', 1),
(19, 'ANIPLEX', 1),
(20, 'ALTER', 1),
(21, 'BANDAISPIRITS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_code` varchar(255) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `order_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `customer_id`, `order_code`, `order_date`, `order_status`) VALUES
(64, 16, '292742', '03/04/2024 09:12:32am', 1),
(65, 16, '11012', '03/04/2024 09:17:45am', 2),
(66, 18, '663203', '03/04/2024 04:04:13pm', 2),
(67, 18, '509498', '03/04/2024 04:07:11pm', 2),
(68, 21, '433822', '03/04/2024 04:59:42pm', 2),
(69, 22, '24611', '03/04/2024 09:40:46pm', 3),
(70, 22, '806970', '03/04/2024 09:45:06pm', 1),
(71, 22, '365958', '04/04/2024 12:57:34am', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detall_id` int(11) NOT NULL,
  `order_code` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `phone` varchar(1000) NOT NULL,
  `fee_shipping` varchar(3000) NOT NULL,
  `product_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_detall_id`, `order_code`, `product_id`, `product_quantity`, `name`, `address`, `country`, `zipcode`, `phone`, `fee_shipping`, `product_price`) VALUES
(49, '292742', 27, 1, 'Jennie Nguyen', '55 An Dương Vương, phường 16, quận Long Biên, Thành phố Hà Nội', 'null', 'null', '0389938946', 'free', 50),
(50, '11012', 27, 1, 'Jennie Nguyen', '55 An Dương Vương, phường 16, quận 8, Thành phố Hồ Chí Minh', 'null', 'null', '0389938935', 'free', 50),
(51, '663203', 27, 2, 'hoanguyen', '50 An Dương Vương, phường 16, quận 8, Thành phố Đà Nẵng', 'null', 'null', '0389938935', 'free', 50),
(52, '663203', 28, 2, 'hoanguyen', '50 An Dương Vương, phường 16, quận 8, Thành phố Đà Nẵng', 'null', 'null', '0389938935', 'free', 50),
(53, '663203', 29, 1, 'hoanguyen', '50 An Dương Vương, phường 16, quận 8, Thành phố Đà Nẵng', 'null', 'null', '0389938935', 'free', 50),
(54, '509498', 30, 1, 'hoa333', '99 An Dương Vương, phường 16, quận 8, Thành phố Đà Nẵng', 'null', 'null', '0795921369', 'free', 80),
(55, '509498', 32, 2, 'hoa333', '99 An Dương Vương, phường 16, quận 8, Thành phố Đà Nẵng', 'null', 'null', '0795921369', 'free', 15),
(56, '433822', 27, 1, 'cus66', '72 Long Tri Street, Ban Long, Chau Thanh, Tien Giang', 'null', 'null', '0389938947', 'free', 50),
(57, '433822', 32, 3, 'cus66', '72 Long Tri Street, Ban Long, Chau Thanh, Tien Giang', 'null', 'null', '0389938947', 'free', 15),
(58, '24611', 27, 3, 'Hoa Nguyen', '72 Long Tri Street, Ban Long, Chau Thanh, Đồng Nai', 'null', 'null', '0389938935', 'free', 50),
(59, '24611', 29, 2, 'Hoa Nguyen', '72 Long Tri Street, Ban Long, Chau Thanh, Đồng Nai', 'null', 'null', '0389938935', 'free', 50),
(60, '806970', 32, 3, 'cus99', '72 Long Tri Street, Ban Long, Chau Thanh, Tien Giang', 'null', 'null', '0389938456', 'free', 15),
(61, '365958', 27, 1, 'Nguyen Van A', '72 Long Tri Street, Ban Long, Chau Thanh, Tien Giang', 'null', 'null', '0389948946', 'free', 50);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL,
  `category_name` int(11) NOT NULL,
  `provider_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `MRP` float DEFAULT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `product_sold` int(11) DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `category_name`, `provider_id`, `product_name`, `MRP`, `price`, `qty`, `product_sold`, `img`, `description`, `status`) VALUES
(27, 16, 3, 'Chainsaw Man 1/7 Scale Figure eStream', 0, 50, 96, 5, 'pre-order-chainsaw-man-chainsaw-man-17-scale-figure-estream4580769940534-216785_1024x1024.jpg', 'Series: Chainsaw Man\r\nCharacter: Chainsaw Man\r\nMaterial: PVC\r\nProduct Type: 1/7 scale figure\r\nManufacturer: eStream\r\nDimensions (approx.): Approximately H281mm x W241mm x D256mm\r\n*Pre - Order* Close Date: 10/10/2022\r\nRelease Date (Manufacturer): Aug-2023\r', 1),
(28, 16, 3, 'Keqing (Piercing Thunderbolt Ver.) 1/7 Scale Figure Apex', 0, 50, 100, 0, 'Nekotwo-Genshin-Impact---Keqing-_Piercing-Thunderbolt-Ver._1-7-Scale-Figure-Apex-1673504053_360x.jpg', 'Series: Genshin Impact \\n Character: Keqing (Piercing Thunderbolt Ver.) \\n Material: PVC & ABS \\n Product Type: Scale Figure \\n Manufacturer: miHoYo x APEX Innovation \\n Dimensions (approx.): H320mm*L190mm*W220 \\n *Official Product* A special card will be', 1),
(29, 16, 3, 'Suguru Geto 1/4 Scale Figure', 0, 50, 98, 2, 'pre-order-jujutsu-kaisen-suguru-geto-14-scale-figure-freeing4570001511295-347978_360x.jpg', 'Series: Jujutsu Kaisen \\n Character: Suguru Geto \\n Material: PVC & ABS \\n Product Type: 1/4 Scale Figure \\n Manufacturer: FREEing \\n Dimensions (approx.): Approximately 500mm in height. \\n *Pre - Order* Close Date: 11/14/2022 \\n Release Date (Manufacture', 1);
(30, 16, 3, 'EEEELeague of Legends - Jinx 1/7 Scale Figure Myethos', 0, 80, 3333, 0, '41E_2BzvfHwlL_540x.jpg', 'Sản phẩm mới nhất!', 1),
(31, 16, 3, 'League of Legends - Jinx 1/7 Scale Figure Myethos', 0, 50, 100, 0, 'pre-order-chainsaw-man-chainsaw-man-17-scale-figure-estream4580769940534-216785_1024x1024.jpg', 'Sản phẩm mới nhất!', 1),
(32, 17, 4, 'Elementalist Lux Non-Scale Figure GSC', 0, 15, 100, 0, 'Nekotwo-League-of-Legends---Elementalist-Lux-Non-Scale-Figure-GSC-1679527904_1024x1024.jpg', 'Sản phẩm mới nhất', 1),
(33, 16, 4, 'Rimuru Tempest (Ultimate Ver.) 1/7 Scale Figure Estream', 0, 25, 100, 0, 'Nekotwo-_Pre-order_--Slime-Isekai---Rimuru-Tempest-_Ultimate-Ver._-1-7-Scale-Figure-Estream-1691731941526_1024x1024.jpg', 'Sản phẩm mới nhất!', 1),
(34, 18, 6, 'Kento Nanami 1/7 Scale Figure eStream', 0, 15, 120, 0, 'pre-order-jujutsu-kaisen-kento-nanami-17-scale-figure-estream4580769940404-599232_1024x1024.jpg', 'Sản phẩm mới nhất!', 1),
(35, 18, 3, 'Kurumi Tokizaki (Pigeon Blood Ruby Dress Ver.) 1/7 Scale Figure Estream', 0, 50, 100, 0, 'pre-order-date-a-barrett-kurumi-tokizaki-pigeon-blood-ruby-dress-ver-17-scale-figure-estream-963090_1024x1024.jpg', 'Sản phẩm mới nhất!', 1),
(36, 19, 3, 'Caster/Muarsaki Shikibu 1/7 Scale Figure Alter', 0, 50, 100, 1, 'pre-order-fategrand-order-castermuarsaki-shikibu-17-scale-figure-alter-660908_1024x1024.jpg', 'Sản phẩm mới nhất!', 0),
(37, 18, 3, 'Hatsune Miku (2022 Chinese New Year Ver.) 1/7 Scale Figue FuRyu', 0, 50, 100, 0, 'pre-order-hatsune-miku-fnex-poppro-hatsune-miku-2022-chinese-new-year-ver-17-scale-figure-furyu-383255_360x.jpg', 'Sản phẩm mới nhất!', 1),
(38, 17, 3, 'Genshin Impact - Barbara Pegg - 1/7 (Kotobukiya)', 0, 50, 100, 1, 'Nekotwo-_Pre-order_-Genshin-Impact---Barbara-_Shining-Idol_1-7-Scale-Figure-Kotobukiya-1675583070_360x.jpg', 'Sản phẩm mới nhất!', 0),
(42, 17, 5, 'samsung galaxy a201', 0, 51, 100, 1, '51PA2ae57kL_540x.jpg', 'adsd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `providers`
--

CREATE TABLE `providers` (
  `provider_id` int(11) NOT NULL,
  `provider_name` varchar(255) NOT NULL,
  `address` varchar(500) NOT NULL,
  `contact_information` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `providers`
--

INSERT INTO `providers` (`provider_id`, `provider_name`, `address`, `contact_information`) VALUES
(3, 'Toranoana', '29 an duong vuong, q1, tphcm', 'toranoana@gmail.com'),
(4, 'Mandarake', '30 an duong vuong, q2, tphcm', 'mandarake@gmail.com'),
(5, 'Neowing', 'hanoi', 'neowing@gmail.com'),
(6, 'Chara-ani', 'hanoi', 'charaani@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(8, 'admin', 'admin@gmail.com', '123456', 1),
(11, 'user', 'user@gmail.com', '123456', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_registers`
--

CREATE TABLE `user_registers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(500) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `password` varchar(300) NOT NULL,
  `dateofbirth` timestamp NULL DEFAULT NULL,
  `sex` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_registers`
--

INSERT INTO `user_registers` (`id`, `name`, `email`, `address`, `phone`, `password`, `dateofbirth`, `sex`, `status`) VALUES
(12, 'quan1222', 'quan22@gmail.com', 'Quan 8, Ho Chi Minh', '0389938922', 'e10adc3949ba59abbe56e057f20f883e', '2024-03-31 17:00:00', 1, 1),
(13, 'hoa123', 'hoa12@gmail.com', 'Quan 8, Ho Chi Minh', '0389938933', 'e10adc3949ba59abbe56e057f20f883e', '2024-03-31 17:00:00', 1, 1),
(14, 'hoa2222', 'hoa2222@gmail.com', '72 Long Tri Street, Ban Long Commue', '0389938922', 'e10adc3949ba59abbe56e057f20f883e', '2024-03-31 17:00:00', 1, 1),
(15, 'thu123', 'thu@gmail.com', '72 Long Tri Street, Ban Long Commue', '0389938947', 'e10adc3949ba59abbe56e057f20f883e', '2024-03-31 17:00:00', 0, 1),
(16, 'Jennie Nguyen', 'hquan20020915@gmail.com', '55 An Dương Vương, phường 16, quận 8, Thành phố Hồ Chí Minh', '0389938946', '$2y$10$5yUIITERP6t7l.I3M4bxDuHPbYfcLdBG6D3ISOlR.O7BcVryYk1DO', '0000-00-00 00:00:00', 1, 1),
(18, 'hoa333', 'hoa333@gmail.com', '99 An Dương Vương, phường 16, quận 8, Thành phố Đà Nẵng', '0795921369', '$2y$10$2wpOSLXnfkX.OOjHn2Mbz.uPnnSwy56Vo6/aMoDs6viiy/IA.1SQC', '0000-00-00 00:00:00', 0, 1),
(19, 'cus123', 'cus123@gmail.com', '54 An Dương Vương, Phường 22, Quận 5, Thành Phố Hồ Chí Minh', '0389948946', '$2y$10$8CbAxhrHHauukjYi9mciSOLKk4Vd4vX1VnR0ULBE/RiL0Vp0DeBei', '0000-00-00 00:00:00', 1, 1),
(21, 'cus66', 'cus66@gmail.com', '72 Long Tri Street, Ban Long, Chau Thanh, Tien Giang', '0389938947', '$2y$10$TXsKF7lVETRbmrBg3IOluO3BVgfnNIVUwJ1H/nq1YDC2vq7.cLbvi', '2024-03-31 17:00:00', 1, 1),
(22, 'cus99', 'cus99@gmail.com', '72 Long Tri Street, Ban Long, Chau Thanh, Tien Giang', '0389938456', '$2y$10$w6gw7Y5vM9PmGuuZnFPYBeOzgN9oXzYkcVWnxCadwR3bfRTkZh3HC', '0000-00-00 00:00:00', 1, 1),
(23, 'cus23', 'cus23123@gmail.com', '83 Long Tri Street, Ban Long Commue', '0389938946', '$2y$10$mh94uslqDbNOLj8Cy3BTTOW/Uj3y2nVik0Pe4hsMV03bQr7SryxEa', '2024-04-02 17:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vnpay`
--

CREATE TABLE `vnpay` (
  `id_vnpay` int(11) NOT NULL,
  `vnp_amount` varchar(50) NOT NULL,
  `vnp_bankcode` varchar(50) NOT NULL,
  `vnp_banktranno` varchar(50) NOT NULL,
  `vnp_cardtype` varchar(50) NOT NULL,
  `vnp_orderinfo` varchar(100) NOT NULL,
  `vnp_paydate` varchar(50) NOT NULL,
  `vnp_responsecode` varchar(50) NOT NULL,
  `vnp_tmncode` varchar(50) NOT NULL,
  `vnp_transactionno` varchar(50) NOT NULL,
  `order_code` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `vnpay`
--

INSERT INTO `vnpay` (`id_vnpay`, `vnp_amount`, `vnp_bankcode`, `vnp_banktranno`, `vnp_cardtype`, `vnp_orderinfo`, `vnp_paydate`, `vnp_responsecode`, `vnp_tmncode`, `vnp_transactionno`, `order_code`) VALUES
(18, '50', 'NCB', 'VNP14364390', 'ATM', 'Thanh toán đơn hàng đặt tại Website FigureShop.', '20240403091210', '00', 'M6VA80FI', '14364390', '292742'),
(19, '110', 'NCB', 'VNP14365065', 'ATM', 'Thanh toán đơn hàng đặt tại Website FigureShop.', '20240403160701', '00', 'M6VA80FI', '14365065', '509498'),
(20, '95', 'NCB', 'VNP14365182', 'ATM', 'Thanh toán đơn hàng đặt tại Website FigureShop.', '20240403165939', '00', 'M6VA80FI', '14365182', '433822'),
(21, '45', 'NCB', 'VNP14365407', 'ATM', 'Thanh toán đơn hàng đặt tại Website FigureShop.', '20240403214420', '00', 'M6VA80FI', '14365407', '806970');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_code` (`order_code`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detall_id`),
  ADD KEY `order_code` (`order_code`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `category_name` (`category_name`),
  ADD KEY `supplier_id` (`provider_id`);

--
-- Indexes for table `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`provider_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_registers`
--
ALTER TABLE `user_registers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vnpay`
--
ALTER TABLE `vnpay`
  ADD PRIMARY KEY (`id_vnpay`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detall_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `providers`
--
ALTER TABLE `providers`
  MODIFY `provider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_registers`
--
ALTER TABLE `user_registers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `vnpay`
--
ALTER TABLE `vnpay`
  MODIFY `id_vnpay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_code`) REFERENCES `order` (`order_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_name`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`provider_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
