-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 11, 2024 lúc 05:31 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopmohinhanime`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
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
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `status`) VALUES
(16, 'special', 1),
(17, 'onmyoji', 1),
(18, 'estream', 1),
(19, 'aniplex', 1),
(20, 'alter', 1),
(21, 'bandaispirits', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
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
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_code` varchar(255) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `order_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`order_id`, `customer_id`, `order_code`, `order_date`, `order_status`) VALUES
(64, 16, '292742', '03/04/2024 09:12:32am', 1),
(65, 16, '11012', '03/04/2024 09:17:45am', 2),
(66, 18, '663203', '03/04/2024 04:04:13pm', 2),
(67, 18, '509498', '03/04/2024 04:07:11pm', 2),
(68, 21, '433822', '03/04/2024 04:59:42pm', 2),
(69, 22, '24611', '03/04/2024 09:40:46pm', 3),
(70, 22, '806970', '03/04/2024 09:45:06pm', 1),
(71, 22, '365958', '04/04/2024 12:57:34am', 1),
(72, 22, '350673', '05/04/2024 11:39:21am', 1),
(73, 22, '177871', '05/04/2024 05:15:23pm', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
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
-- Đang đổ dữ liệu cho bảng `order_detail`
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
(61, '365958', 27, 1, 'Nguyen Van A', '72 Long Tri Street, Ban Long, Chau Thanh, Tien Giang', 'null', 'null', '0389948946', 'free', 50),
(62, '350673', 27, 1, 'cus99', '72 Long Tri Street, Ban Long, Chau Thanh, Tien Giang', 'null', 'null', '0389938456', 'free', 50),
(63, '177871', 27, 1, 'cus99', '72 Long Tri Street, Ban Long, Chau Thanh, Tien Giang', 'null', 'null', '0389938456', 'free', 50);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
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
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`p_id`, `category_name`, `provider_id`, `product_name`, `MRP`, `price`, `qty`, `product_sold`, `img`, `description`, `status`) VALUES
(27, 16, 3, 'Chainsaw Man 1/7 Scale Figure eStream', 0, 50, 96, 5, '51PA2ae57kL_540x.jpg', 'San pham moi nhat!', 0),
(28, 16, 3, 'Keqing (Piercing Thunderbolt Ver.) 1/7 Scale Figure Apex', 0, 50, 100, 0, 'Nekotwo-Genshin-Impact---Keqing-_Piercing-Thunderbolt-Ver._1-7-Scale-Figure-Apex-1673504053_360x.jpg', 'San pham moi nhat!', 1),
(29, 16, 3, 'Suguru Geto 1/4 Scale Figure', 0, 50, 98, 2, 'pre-order-jujutsu-kaisen-suguru-geto-14-scale-figure-freeing4570001511295-347978_360x.jpg', 'Sản phẩm mới nhất!', 0),
(31, 16, 3, 'League of Legends - Jinx 1/7 Scale Figure Myethos', 0, 50, 100, 0, 'pre-order-chainsaw-man-chainsaw-man-17-scale-figure-estream4580769940534-216785_1024x1024.jpg', 'Sản phẩm mới nhất!', 1),
(32, 17, 4, 'Elementalist Lux Non-Scale Figure GSC', 0, 15, 100, 0, 'Nekotwo-League-of-Legends---Elementalist-Lux-Non-Scale-Figure-GSC-1679527904_1024x1024.jpg', 'Sản phẩm mới nhất', 1),
(33, 16, 4, 'Rimuru Tempest (Ultimate Ver.) 1/7 Scale Figure Estream', 0, 25, 100, 0, 'Nekotwo-_Pre-order_--Slime-Isekai---Rimuru-Tempest-_Ultimate-Ver._-1-7-Scale-Figure-Estream-1691731941526_1024x1024.jpg', 'Sản phẩm mới nhất!', 1),
(34, 16, 6, 'Kento Nanami 1/7 Scale Figure eStream', 0, 15, 120, 0, 'pre-order-jujutsu-kaisen-kento-nanami-17-scale-figure-estream4580769940404-599232_1024x1024.jpg', 'Sản phẩm mới nhất!', 1),
(35, 16, 3, 'Kurumi Tokizaki (Pigeon Blood Ruby Dress Ver.) 1/7 Scale Figure Estream', 0, 50, 100, 1, 'pre-order-date-a-barrett-kurumi-tokizaki-pigeon-blood-ruby-dress-ver-17-scale-figure-estream-963090_1024x1024.jpg', 'Sản phẩm mới nhất!', 0),
(36, 19, 3, 'Caster/Muarsaki Shikibu 1/7 Scale Figure Alter', 0, 50, 100, 1, 'pre-order-fategrand-order-castermuarsaki-shikibu-17-scale-figure-alter-660908_1024x1024.jpg', 'Sản phẩm mới nhất!', 0),
(37, 18, 3, 'Hatsune Miku (2022 Chinese New Year Ver.) 1/7 Scale Figue FuRyu', 0, 50, 100, 0, 'pre-order-hatsune-miku-fnex-poppro-hatsune-miku-2022-chinese-new-year-ver-17-scale-figure-furyu-383255_360x.jpg', 'Sản phẩm mới nhất!', 1),
(38, 17, 3, 'Genshin Impact - Barbara Pegg - 1/7 (Kotobukiya)', 0, 50, 100, 1, 'Nekotwo-_Pre-order_-Genshin-Impact---Barbara-_Shining-Idol_1-7-Scale-Figure-Kotobukiya-1675583070_360x.jpg', 'Sản phẩm mới nhất!', 0),
(42, 17, 5, 'samsung galaxy a201', 0, 51, 100, 1, '51PA2ae57kL_540x.jpg', 'adsd', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `providers`
--

CREATE TABLE `providers` (
  `provider_id` int(11) NOT NULL,
  `provider_name` varchar(255) NOT NULL,
  `address` varchar(500) NOT NULL,
  `contact_information` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `providers`
--

INSERT INTO `providers` (`provider_id`, `provider_name`, `address`, `contact_information`) VALUES
(3, 'Toranoana', '29 an duong vuong, q1, tphcm', 'toranoana@gmail.com'),
(4, 'Mandarake', '30 an duong vuong, q2, tphcm', 'mandarake@gmail.com'),
(5, 'Neowing', 'hanoi', 'neowing@gmail.com'),
(6, 'Chara-ani', 'hanoi', 'charaani@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(8, 'admin', 'admin@gmail.com', '123456', 1),
(11, 'user', 'user@gmail.com', '123456', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_registers`
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
-- Đang đổ dữ liệu cho bảng `user_registers`
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
(30, 'quan520222', 'hquan2002220915@gmail.com', 'Tien Giang', '0928957546', '$2y$10$BO.o0n704RdEXW7Pm2mGieoVVo25XSV3uelwFH7xIrPNiKlM9ZbIO', '0000-00-00 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vnpay`
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
-- Đang đổ dữ liệu cho bảng `vnpay`
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
(38, '150000', 'NCB', 'VNP14410255', 'ATM', 'Thanh toán đơn hàng đặt tại Website FigureShop.', '20240511010429', '00', 'M6VA80FI', '14410255', '697218');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_code` (`order_code`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detall_id`),
  ADD KEY `order_code` (`order_code`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `category_name` (`category_name`),
  ADD KEY `supplier_id` (`provider_id`);

--
-- Chỉ mục cho bảng `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`provider_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_registers`
--
ALTER TABLE `user_registers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vnpay`
--
ALTER TABLE `vnpay`
  ADD PRIMARY KEY (`id_vnpay`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detall_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `providers`
--
ALTER TABLE `providers`
  MODIFY `provider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `user_registers`
--
ALTER TABLE `user_registers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `vnpay`
--
ALTER TABLE `vnpay`
  MODIFY `id_vnpay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_code`) REFERENCES `order` (`order_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_name`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`provider_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
