-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2024 at 04:26 PM
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
(66, 18, '663203', '03/04/2024 04:04:13pm', 2),
(67, 18, '509498', '03/04/2024 04:07:11pm', 2),
(68, 21, '433822', '03/04/2024 04:59:42pm', 2),
(69, 22, '24611', '03/04/2024 09:40:46pm', 3),
(70, 22, '806970', '03/04/2024 09:45:06pm', 2),
(71, 22, '365958', '04/04/2024 12:57:34am', 1),
(72, 22, '350673', '05/04/2024 11:39:21am', 1),
(73, 22, '177871', '05/04/2024 05:15:23pm', 1),
(111, 31, '525599', '11/05/2024 04:25:54pm', 2),
(112, 32, '330552', '11/05/2024 08:04:33pm', 3),
(113, 32, '256639', '11/05/2024 08:06:21pm', 2);

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
(54, '509498', 30, 1, 'hoa333', '99 An Dương Vương, phường 16, quận 8, Thành phố Đà Nẵng', 'null', 'null', '0795921369', 'free', 80),
(55, '509498', 32, 2, 'hoa333', '99 An Dương Vương, phường 16, quận 8, Thành phố Đà Nẵng', 'null', 'null', '0795921369', 'free', 15),
(56, '433822', 27, 1, 'cus66', '72 Long Tri Street, Ban Long, Chau Thanh, Tien Giang', 'null', 'null', '0389938947', 'free', 50),
(57, '433822', 32, 3, 'cus66', '72 Long Tri Street, Ban Long, Chau Thanh, Tien Giang', 'null', 'null', '0389938947', 'free', 15),
(60, '806970', 32, 3, 'cus99', '72 Long Tri Street, Ban Long, Chau Thanh, Tien Giang', 'null', 'null', '0389938456', 'free', 15),
(62, '350673', 27, 1, 'cus99', '72 Long Tri Street, Ban Long, Chau Thanh, Tien Giang', 'null', 'null', '0389938456', 'free', 50),
(63, '177871', 27, 1, 'cus99', '72 Long Tri Street, Ban Long, Chau Thanh, Tien Giang', 'null', 'null', '0389938456', 'free', 50),
(101, '525599', 37, 1, 'honey', 'honey', 'null', 'null', '0123456788', 'free', 3467000),
(102, '330552', 28, 1, 'quyenbanhbeo', 'nhà 4 mặt tiền, quận 6, tphcm', 'null', 'null', '0987654321', 'free', 7564000),
(103, '330552', 53, 1, 'quyenbanhbeo', 'nhà 4 mặt tiền, quận 6, tphcm', 'null', 'null', '0987654321', 'free', 1243000),
(104, '256639', 33, 1, 'quyenbanhbeo', 'nhà 4 mặt tiền, quận 6, tphcm', 'null', 'null', '0987654321', 'free', 3461000),
(105, '256639', 38, 2, 'quyenbanhbeo', 'nhà 4 mặt tiền, quận 6, tphcm', 'null', 'null', '0987654321', 'free', 4361000);

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
(27, 16, 3, 'Chainsaw Man 1/7 Scale Figure eStream', 0, 7834000, 96, 5, '51PA2ae57kL_540x.jpg', 'Series: Chainsaw Man <br> Character: Chainsaw Man<br> Material: PVC <br> Product Type: 1/7 scale figure <br> Manufacturer: eStream <br> Dimensions (approx.): Approximately H281mm x W241mm x D256mm <br> *Pre - Order* Close Date: 10/10/2022', 1),
(28, 16, 3, 'Keqing (Piercing Thunderbolt Ver.) 1/7 Scale Figure Apex', 0, 7564000, 100, 0, 'Nekotwo-Genshin-Impact---Keqing-_Piercing-Thunderbolt-Ver._1-7-Scale-Figure-Apex-1673504053_360x.jpg', 'Series: Genshin Impact <br> Character: Keqing (Piercing Thunderbolt Ver.) <br> Material: PVC & ABS <br> Product Type: Scale Figure <br> Manufacturer: miHoYo x APEX Innovation <br> Dimensions (approx.): H320mm*L190mm*W220', 1),
(29, 16, 3, 'Suguru Geto 1/4 Scale Figure', 0, 3465000, 98, 2, 'pre-order-jujutsu-kaisen-suguru-geto-14-scale-figure-freeing4570001511295-347978_360x.jpg', 'Series: Jujutsu Kaisen <br> Character: Suguru Geto <br> Material: PVC & ABS <br> Product Type: 1/4 Scale Figure <br> Manufacturer: FREEing <br> Dimensions (approx.): Approximately 500mm in height. <br> *Pre - Order* Close Date: 11/14/2022', 1),
(31, 16, 3, 'League of Legends - Jinx 1/7 Scale Figure Myethos', 0, 5478000, 100, 0, '41E_2BzvfHwlL_540x.jpg', 'Series: League of Legends <br> Character:  Jinx <br> Material: PVC & ABS <br> Product Type: 1/7 Scale Figure <br> Manufacturer: Myethos <br> Dimensions (approx.): Approximately 345mm in height <br> *Pre - Order* Close Date: 11/28/2021\r\n', 1),
(32, 17, 4, 'Elementalist Lux Non-Scale Figure GSC', 0, 7576000, 97, 3, 'Nekotwo-League-of-Legends---Elementalist-Lux-Non-Scale-Figure-GSC-1679527904_1024x1024.jpg', 'Series: League of Legends <br> Character: lementalist Lux <br> Material: PVC & ABS <br> Product Type: Non-Scale Figure <br> Manufacturer: Good Smile Arts Shanghai <br> Dimensions (approx.): 340mm in height  <br> Limited In Stock In the US\r\n', 1),
(33, 16, 4, 'Rimuru Tempest (Ultimate Ver.) 1/7 Scale Figure Estream', 0, 3461000, 99, 1, 'Nekotwo-_Pre-order_--Slime-Isekai---Rimuru-Tempest-_Ultimate-Ver._-1-7-Scale-Figure-Estream-1691731941526_1024x1024.jpg', 'Series: That Time I Got Reincarnated as a Slime <br> Character:  Rimuru Tempest <br> Material: PVC & ABS <br> Product Type: Scale Figure <br> Manufacturer: Estream <br> Dimensions (approx.): 35.4cm in height <br> *Pre - Order* Close Date: 04/28/2021\r\n', 1),
(34, 16, 6, 'Kento Nanami 1/7 Scale Figure eStream', 0, 1575000, 120, 0, 'pre-order-jujutsu-kaisen-kento-n.jpg', 'Series: Jujutsu Kaisen <br> Character: Kento Nanami <br> Material: PVC <br> Product Type: 1/7 Scale Figure <br> Manufacturer: eStream <br> Dimensions (approx.):  Approximately 280mm high <br>  *Pre - Order* Close Date: 12/05/2022 <br> Release Date (Manufa', 1),
(35, 16, 3, 'Kurumi Tokizaki (Pigeon Blood Ruby Dress Ver.) 1/7 Scale Figure Estream', 0, 4688000, 100, 1, 'pre-order-date-a-barrett-kurumi-tokizaki-pigeon-blood-ruby-dress-ver-17-scale-figure-estream-963090_1024x1024.jpg', 'Series: Date a Barrett <br> Character: Kurumi Tokizaki (Pigeon Blood Ruby Dress Ver.) <br> Material: PVC <br> Product Type: 1/7 Scale Figure\\r\\nManufacturer: Estream <br> Dimensions (approx.): Size （est）：TBD <br> *Pre - Order* Close Date: 12/19/2021', 1),
(36, 19, 3, 'Caster/Muarsaki Shikibu 1/7 Scale Figure Alter', 0, 74564000, 100, 1, 'pre-order-fategrand-order-castermuarsaki-shikibu-17-scale-figure-alter-660908_1024x1024.jpg', 'Series:  FATE/GRAND ORDER <br> Character: Caster/Muarsaki Shikibu <br> Material: PVC & ABS <br> Product Type: 1/7 Scale Figure <br>  Manufacturer: Alter <br> Dimensions (approx.): 290mm <br> *Pre - Order* Close Date: 03/13/2022 <br> Release Date: Jan-2023', 1),
(37, 18, 3, 'Hatsune Miku (2022 Chinese New Year Ver.) 1/7 Scale Figue FuRyu', 0, 3467000, 99, 1, 'pre-order-hatsune-miku-fnex-poppro-hatsune-miku-2022-chinese-new-year-ver-17-scale-figure-furyu-383255_360x.jpg', 'Approximately 305mm in height.PKG <br> Size (est): W290 x D260 x H350mm\r\n', 1),
(38, 17, 3, 'Genshin Impact - Barbara Pegg - 1/7 (Kotobukiya)', 0, 4361000, 98, 3, 'Nekotwo-_Pre-order_-Genshin-Impact---Barbara-_Shining-Idol_1-7-Scale-Figure-Kotobukiya-1675583070_360x.jpg', 'Series: Genshin Impact <br> Character: Barbara (Shining Idol) <br> Material: PVC & ABS <br> Product Type: Scale Figure <br> Manufacturer: miHoYo x Kotobukiya <br> Dimensions (approx.): Approximately 270mm in height <br> *Official Product* Limited U.S. In\r', 1),
(42, 17, 5, 'Triumplant Excalibur', 0, 3464500, 100, 1, '51PA2ae57kL_540x.jpg', 'Franchise: Fate/Stay Night <br> Brand: Good Smile Company <br> Release Date: 20. Nov 2012 <br> Type: General <br> Dimensions: H=250 mm (9.75 in) Scale 1/7 <br> Material: PVC\r\n', 1),
(44, 21, 5, 'MORSTORM & AniMester ONMYOJI Senhime 1/4 Scale Figure AniMester', 0, 9876000, 15, 0, 'pre-order-onmyoji-honkaku-gensou.jpg', 'Senhime Material: Pvc <br> Product Type: 1/4 Scale Figure <br> Manufacturer: AniMester <br> Dimensions (approx.): TBD <br> *Pre - Order* Close Date: 06/21/2022 <br> Release Date: Jan-2023', 1),
(45, 18, 6, 'Aki Hayakawa 1/7 Scale Figure eStream', 0, 8765000, 15, 0, 'Aki-Hayakawa-17-Scale-Figure-eStream.jpg', 'Series: Chainsaw Man <br> Character: Aki Hayakawa <br> Material: PVC & ABS <br> Product Type: 1/7 Scale Figure <br> Manufacturer: eStream <br> Dimensions (approx.): Approximately H288mm <br> *Pre - Order* Close Date: 2023-04-09 <br> Release Date (Manufact', 1),
(46, 20, 6, 'Onmyoji - Suzuka Gozen 1/4 Scale Figure AniMester', 0, 7654000, 15, 0, 'pre-order-onmyoji-suzuka-gozen-1.jpg', 'Series: Onmyoji <br> Character: Suzuka Gozen <br> Material: PVC & ABS <br> Product Type: 1/4 Scale Figure <br> Manufacturer: AniMester <br>Dimensions (approx.): 430mm <br> *Pre - Order* Close Date: 02/15/2022 <br> Release Date: Jun-2022', 1),
(47, 20, 4, 'LIV: LUMINANCE GENERIC FINAL (NORMAL EDITION & DELUXE EDITION) 1/7 Scale Figure', 0, 6543000, 15, 0, 'pre-order-punishing-gray-raven-l.jpg', 'Series: PUNISHING: GRAY RAVEN <br> Character: LIV: LUMINANCE GENERIC FINAL (NORMAL EDITION & DELUXE EDITION) <br> Material: PVC <br> Product Type: 1/7 Scale Figure <br> Manufacturer: UNKNOWN MODEL <br> Dimensions (approx.): Approximately 14.96 inches (38c', 1),
(48, 19, 4, 'Ganyu (Plenilune Gaze Ver.) 1/7 Scale Figure Apex', 0, 5432000, 15, 0, 'pre-order-genshin-impact-ganyu-p.jpg', 'Series: Genshin Impact <br> Character: Ganyu <br> Material: PVC & ABS <br> Product Type: 1/7 Scale Figure <br> Manufacturer: miHoYo x APEX Innovation <br> Dimensions (approx.): H220mm*L130mm*W130 <br> *Official Product* Limited In Stock In the US', 1),
(49, 18, 3, 'Xiao (Guardian Yaksha Ver.) 1/7 Scale Figure Apex', 0, 4321000, 15, 0, 'Nekotwo-_Pre-order_-Genshin-Impa.jpg', 'Series: Genshin Impact <br> Character: Xiao (Guardian Yaksha Ver.) <br> Material: PVC&ABS <br> Product Type: 1/7 Scale Figure <br> Manufacturer: Apex <br> Dimensions (approx.): Approximately 28cm L  x 28cm W x 27cm H <br> *Official Product*', 1),
(50, 18, 4, 'Satoru Gojo 1/7 Scale Figure Animester', 0, 3219000, 15, 0, 'Satoru-Gojo-17-Scale-Figure-Animester.jpg', 'Series: Jujutsu Kaisen <br> Character: Satoru Gojo <br> Material: Polystone, ABS <br> Product Type: 1/7 Scale Figure <br> Manufacturer: Animester <br> Dimensions (approx.): Approximately 275mm in Height <br> *Official Product*', 1),
(51, 21, 3, 'Chainsaw Man - Hayakawa Aki - 1/7 (Myethos)', 0, 2198000, 15, 0, 'Chainsaw-Man-Hayakawa-Aki-17-(Myethos).jpg', 'Series: Chainsaw Man <br> Character: Hayakawa Aki <br> Material: PVC & ABS <br> Product Type: 1/7 Scale Figure <br> Manufacturer: Myethos <br> Dimensions (approx.): Approximately H195mm <br> *Pre - Order* Close Date: 2023-02-26 <br> Release Date (Manufact', 1),
(52, 17, 3, 'Genshin Impact - Kamisato Ayaka - 1/7 - Frostflake Heron Ver. (Apex Innovation)', 0, 1987000, 15, 0, 'Genshin-Impact-Kamisato-Ayaka-17-Frostflake-Heron-Ver-(Apex-Innovation).jpg', 'Series: Genshin Impact <br> Character: Kamisato Ayaka(Frostflake Heron Ver.) <br> Material: PVC & ABS <br> Product Type: 1/7 Scale Figure <br> Manufacturer: Apex Innovation <br> Dimensions (approx.): Approximately H290mm <br> Release Date (Manufacturer): ', 1),
(53, 20, 3, 'Fate/Grand Order - Saber Alter - 1/7 - Dress ver.(Alter)', 0, 1243000, 15, 0, 'FateGrand-Order-Saber-Alter-17-Dress-ver.(Alter).jpg', 'Franchise: Fate/Grand Order <br> Brand: Alter <br> Release Date: 30. Jul 2021 <br> Type: General <br> Dimensions: H=230 mm (8.97 in) Scale 1/7 <br> Material: ABS, PVC', 1);

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
(18, 'hoa333', 'hoa333@gmail.com', '99 An Dương Vương, phường 16, quận 8, Thành phố Đà Nẵng', '0795921369', '$2y$10$2wpOSLXnfkX.OOjHn2Mbz.uPnnSwy56Vo6/aMoDs6viiy/IA.1SQC', '0000-00-00 00:00:00', 0, 1),
(19, 'cus123', 'cus123@gmail.com', '54 An Dương Vương, Phường 22, Quận 5, Thành Phố Hồ Chí Minh', '0389948946', '$2y$10$8CbAxhrHHauukjYi9mciSOLKk4Vd4vX1VnR0ULBE/RiL0Vp0DeBei', '0000-00-00 00:00:00', 1, 1),
(21, 'cus66', 'cus66@gmail.com', '72 Long Tri Street, Ban Long, Chau Thanh, Tien Giang', '0389938947', '$2y$10$TXsKF7lVETRbmrBg3IOluO3BVgfnNIVUwJ1H/nq1YDC2vq7.cLbvi', '2024-03-31 17:00:00', 1, 1),
(22, 'cus99', 'cus99@gmail.com', '72 Long Tri Street, Ban Long, Chau Thanh, Tien Giang', '0389938456', '$2y$10$w6gw7Y5vM9PmGuuZnFPYBeOzgN9oXzYkcVWnxCadwR3bfRTkZh3HC', '0000-00-00 00:00:00', 1, 1),
(23, 'cus23', 'cus23123@gmail.com', '83 Long Tri Street, Ban Long Commue', '0389938946', '$2y$10$mh94uslqDbNOLj8Cy3BTTOW/Uj3y2nVik0Pe4hsMV03bQr7SryxEa', '2024-04-02 17:00:00', 0, 1),
(26, 'quan123', 'admi1232n@localhost.com', 'Tien Giang', '0928957546', '$2y$10$io/gIcUlWNPEcCwZYIkHGemL/MSlAL1NJngMsvQVlAgBvS3ULN.rm', '0000-00-00 00:00:00', 1, 1),
(27, 'aha123', 'aha@gmail.com', 'Tien Giang', '0928957546', '$2y$10$Gb5Acc3kSu5X4mw2MbiS2euhj3R8suNpmtE/pfA6HGsAL4GK.ojqu', '0000-00-00 00:00:00', 1, 1),
(28, 'quan2323', 'hquan2220020915@gmail.com', 'Tien Giang', '0928957546', '$2y$10$31A.3w.6C4wIrkAmydHi2eNIPfHzIff6Ep44VXYbvnfO5gq1zP2pG', '0000-00-00 00:00:00', 1, 1),
(30, 'quan520222', 'hquan2002220915@gmail.com', 'Tien Giang', '0928957546', '$2y$10$BO.o0n704RdEXW7Pm2mGieoVVo25XSV3uelwFH7xIrPNiKlM9ZbIO', '0000-00-00 00:00:00', 1, 1),
(31, 'honey', 'honey@gmail.com', 'honey', '0123456788', '$2y$10$OcAeGZXvAWx2jO7RluE3Xe2WaOzC5hMyFfBV6QtYZQJ3Q44fbGvt2', '0000-00-00 00:00:00', 1, 1),
(32, 'quyenbanhbeo', 'quyenbanhbeo@gmail.com', '0987654321', '0987654321', '$2y$10$dejmHZWhrNvASq9has.aPOLEerexnfI4dOtByQ3DpLw0CTtVY6pPe', '0000-00-00 00:00:00', 1, 1),
(33, 'pthv', 'pthv@gmail.com', '2 căn nhà và sắp có xe hơi mấy tỉ', '0987654322', '$2y$10$0M5bG6ckdPiKgMtiH5cyGubI6ojpnrlaImbwIwMyEbPPDNCAIAkzq', '0000-00-00 00:00:00', 0, 1),
(34, 'ptpb', 'ptpb@gmail.com', 'but kind', '0987654312', '$2y$10$UOdwVnWUN4QJxQ1mPJWQt.hXkFl95ZgvvQqwaP8xI3PodYCgQu4fi', NULL, 0, 0);

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
(21, '45', 'NCB', 'VNP14365407', 'ATM', 'Thanh toán đơn hàng đặt tại Website FigureShop.', '20240403214420', '00', 'M6VA80FI', '14365407', '806970'),
(22, '50', 'NCB', 'VNP14367498', 'ATM', 'Thanh toán đơn hàng đặt tại Website FigureShop.', '20240405113910', '00', 'M6VA80FI', '14367498', '350673'),
(23, '50', 'NCB', 'VNP14368034', 'ATM', 'Thanh toán đơn hàng đặt tại Website FigureShop.', '20240405171519', '00', 'M6VA80FI', '14368034', '177871'),
(24, '50', 'NCB', 'VNP14409968', 'ATM', 'Thanh toán đơn hàng đặt tại Website FigureShop.', '20240510181816', '00', 'M6VA80FI', '14409968', '814141'),
(25, '50', 'NCB', 'VNP14409969', 'ATM', 'Thanh toán đơn hàng đặt tại Website FigureShop.', '20240510181846', '00', 'M6VA80FI', '14409969', '136791'),
(26, '50', 'NCB', 'VNP14409972', 'ATM', 'Thanh toán đơn hàng đặt tại Website FigureShop.', '20240510182111', '00', 'M6VA80FI', '14409972', '126918'),
(27, '150', 'NCB', 'VNP14409979', 'ATM', 'Thanh toán đơn hàng đặt tại Website FigureShop.', '20240510182633', '00', 'M6VA80FI', '14409979', '66888'),
(28, '15', 'NCB', 'VNP14410001', 'ATM', 'Thanh toán đơn hàng đặt tại Website FigureShop.', '20240510191812', '00', 'M6VA80FI', '14410001', '716435'),
(29, '50', 'NCB', 'VNP14410005', 'ATM', 'Thanh toán đơn hàng đặt tại Website FigureShop.', '20240510192944', '00', 'M6VA80FI', '14410005', '46219'),
(30, '50', 'NCB', 'VNP14410007', 'ATM', 'Thanh toán đơn hàng đặt tại Website FigureShop.', '20240510193208', '00', 'M6VA80FI', '14410007', '821513'),
(31, '15', 'NCB', 'VNP14410022', 'ATM', 'Thanh toán đơn hàng đặt tại Website FigureShop.', '20240510202637', '00', 'M6VA80FI', '14410022', '539374'),
(32, '50', 'NCB', 'VNP14410024', 'ATM', 'Thanh toán đơn hàng đặt tại Website FigureShop.', '20240510202811', '00', 'M6VA80FI', '14410024', '274798'),
(33, '50', 'NCB', 'VNP14410030', 'ATM', 'Thanh toán đơn hàng đặt tại Website FigureShop.', '20240510203839', '00', 'M6VA80FI', '14410030', '887667'),
(34, '50', 'NCB', 'VNP14410070', 'ATM', 'Thanh toán đơn hàng đặt tại Website FigureShop.', '20240510214309', '00', 'M6VA80FI', '14410070', '597752'),
(35, '50', 'NCB', 'VNP14410091', 'ATM', 'Thanh toán đơn hàng đặt tại Website FigureShop.', '20240510220743', '00', 'M6VA80FI', '14410091', '936976'),
(36, '50', 'NCB', 'VNP14410095', 'ATM', 'Thanh toán đơn hàng đặt tại Website FigureShop.', '20240510221016', '00', 'M6VA80FI', '14410095', '796893'),
(37, '50000', 'NCB', 'VNP14410246', 'ATM', 'Thanh toán đơn hàng đặt tại Website FigureShop.', '20240511005712', '00', 'M6VA80FI', '14410246', '456872'),
(38, '150000', 'NCB', 'VNP14410255', 'ATM', 'Thanh toán đơn hàng đặt tại Website FigureShop.', '20240511010429', '00', 'M6VA80FI', '14410255', '697218'),
(39, '3467000', 'NCB', 'VNP14410718', 'ATM', 'Thanh toán đơn hàng đặt tại Website FigureShop.', '20240511162538', '00', 'M6VA80FI', '14410718', '525599'),
(40, '12183000', 'NCB', 'VNP14410832', 'ATM', 'Thanh toán đơn hàng đặt tại Website FigureShop.', '20240511200550', '00', 'M6VA80FI', '14410832', '256639');

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
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

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
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detall_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `vnpay`
--
ALTER TABLE `vnpay`
  MODIFY `id_vnpay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
