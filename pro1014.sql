-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 24, 2022 at 10:39 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pro1014`
--

-- --------------------------------------------------------

--
-- Table structure for table `combo`
--

CREATE TABLE `combo` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `combo`
--

INSERT INTO `combo` (`id`, `status`) VALUES
(1, 1),
(2, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isAdmin` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hire_date` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `email`, `password`, `name`, `image`, `isAdmin`, `salary`, `hire_date`, `status`) VALUES
(1, 'cuzin2k3@gmail.com', '12', 'Đỗ Hữu Nhật', 'img_parallax.jpg', NULL, '6000000', '2022-11-13', '0'),
(2, 'duongbeo@beo.com', '12345', 'Nguyễn Văn Tuấn', 'aee19d3455b89031a5d6213caf8acbec.jpg', NULL, '121212121212', '2022-11-07', '0'),
(3, '', '', 'Đặng Hải Dương', 'fluidicon.png', NULL, '100', '2022-11-14', '1'),
(4, 'admin@bruno.me', 'admin', 'administrator', 'banhmichuot3.jpg', 'admin', '2130012301', '2022-11-01', '1'),
(5, 'duongbeo@beo.com', '123456', 'Đặng Hải Dương', 'img_parallax.jpg', NULL, '123123123123', '2022-11-14', '1');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `star` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'id khach'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `star`, `note`, `order_id`, `user_id`) VALUES
(1, '5', 'asdasd', 3, 2),
(2, '5', 'ád', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `list_combo`
--

CREATE TABLE `list_combo` (
  `id` int(11) NOT NULL,
  `combo_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `list_combo`
--

INSERT INTO `list_combo` (`id`, `combo_id`, `service_id`) VALUES
(1, 1, 1),
(2, 2, 3),
(3, 2, 4),
(4, 3, 7),
(5, 3, 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'người đặt',
  `time` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `time`, `status`) VALUES
(36, 46, '2022-11-24 09:40:00', 0),
(37, 46, '2022-11-24 09:40:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `service_id` int(11) DEFAULT NULL,
  `combo_id` int(11) DEFAULT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'người làm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`id`, `order_id`, `service_id`, `combo_id`, `employee_id`) VALUES
(49, 36, 7, NULL, 1),
(50, 36, 8, NULL, 1),
(51, 37, 7, NULL, 3),
(52, 37, 9, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdAt` datetime NOT NULL,
  `updateAt` datetime NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `image`, `createdAt`, `updateAt`, `content`) VALUES
(1, 'Phá cách với kiểu tóc nam Side Part vuốt rủ và học cách vuốt trong tích tắc', 'small_side_part_vuot_ru_6dce22fce7.jpg', '2022-11-23 20:26:31', '2022-11-23 20:26:31', '<div class=\"content__shortDescription\" style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; padding-right: 50px; padding-bottom: 32px; padding-left: 50px; text-align: center; color: rgb(0, 0, 0); font-family: &quot;be vietnam pro&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 300;\"><div style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000;\"><p style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; margin-bottom: 1em;\"><i style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000;\"><span style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; font-weight: bolder;\">Nếu bạn đã chán ngấy các kiểu tóc nam ngắn gọn, đơn giản, tại sao không thử ngay Side Part vuốt rủ để khác biệt hơn. Học ngay cách tạo kiểu tóc nam Hàn Quốc này trong tích tắc.</span></i></p></div></div><div class=\"content__description\" style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; color: rgb(0, 0, 0); font-family: &quot;be vietnam pro&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 300;\"><div style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000;\"><h2 style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; margin-bottom: 0.5em; font-size: inherit; color: rgba(0, 0, 0, 0.85);\"><span style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; font-weight: bolder;\">Side Part vuốt rủ hợp với ai?</span></h2><p style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; margin-bottom: 1em;\">Kiểu tóc nam này rất phù hợp cho những bạn yêu thích<span style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; font-weight: bolder;\">&nbsp;</span><a href=\"/\" style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; color: rgb(24, 144, 255); outline: none; cursor: pointer; transition: color 0.3s ease 0s; touch-action: manipulation;\" target=\"_blank\"><span style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; font-weight: bolder;\">phong cách lãng tử Hàn Quốc</span></a><span style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; font-weight: bolder;\">.</span>&nbsp;Và nó đặc biệt hợp với những bạn có khuôn mặt hơi vuông và dài hoặc trái xoan. Bởi nó sẽ giúp khuôn mặt trở nên mềm mại hơn. Đối với những bạn tóc mỏng thì còn giúp tóc bạn trông dày dặn hơn.</p><p style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; margin-bottom: 1em;\">Side Part còn được biết tới với một tên gọi khác đó là tóc rẽ ngôi. Hiện nay có khá nhiều những mẫu tóc Side Part khác nhau. Nhưng tiêu biểu nhất chỉ có những biến thể như: Side Part Classic, Side Part hiện đại, Undercut Side Part, Side Part Pompadour,….</p><figure class=\"image\" style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; margin-bottom: 1em;\"><img src=\"https://blog.30shine.com/wp-content/uploads/2019/02/kieu-toc-nam-sp-ru3.jpg\" alt=\"kiểu tóc nam\" srcset=\"https://blog.30shine.com/wp-content/uploads/2019/02/kieu-toc-nam-sp-ru3.jpg 660w, https://blog.30shine.com/wp-content/uploads/2019/02/kieu-toc-nam-sp-ru3-300x186.jpg 300w\" sizes=\"100vw\" width=\"660\" style=\"border-width: 0px; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; display: inline; width: 100%;\"></figure><p style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; margin-bottom: 1em;\">Trong chủ đề này, BrunoBarber sẽ không phân loại những kiểu Side Part. Thay vào đó &nbsp;sẽ đi thẳng vào “<i style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000;\">cách tạo kiểu tóc Side Part vuốt rủ</i>”. Và&nbsp;<span style=\"font-family: &quot;be vietnam pro&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 300;\">BrunoBarber</span>&nbsp;cũng sẽ hướng dẫn các bạn cách vuốt kiểu tóc nam này vô cùng đơn giản. Đảm bảo bạn sẽ đẹp trai ngay trong tích tắc.</p><h2 style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; margin-bottom: 0.5em; font-size: inherit; color: rgba(0, 0, 0, 0.85);\"><span style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; font-weight: bolder;\">Chuẩn bị</span></h2><p style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; margin-bottom: 1em;\">Tuy nhiên, trước khi tạo kiểu việc chuẩn bị dụng cụ là vô cùng cần thiết. Nếu thiếu những vật dụng này, các bạn sẽ rất khó tạo kiểu tóc nam này.</p><figure class=\"image\" style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; margin-bottom: 1em;\"><img src=\"https://blog.30shine.com/wp-content/uploads/2019/02/kieu-toc-nam-sp-ru5.jpg\" alt=\"kiểu tóc nam\" srcset=\"https://blog.30shine.com/wp-content/uploads/2019/02/kieu-toc-nam-sp-ru5.jpg 600w, https://blog.30shine.com/wp-content/uploads/2019/02/kieu-toc-nam-sp-ru5-150x150.jpg 150w, https://blog.30shine.com/wp-content/uploads/2019/02/kieu-toc-nam-sp-ru5-300x300.jpg 300w, https://blog.30shine.com/wp-content/uploads/2019/02/kieu-toc-nam-sp-ru5-55x55.jpg 55w, https://blog.30shine.com/wp-content/uploads/2019/02/kieu-toc-nam-sp-ru5-65x65.jpg 65w\" sizes=\"100vw\" width=\"600\" style=\"border-width: 0px; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; display: inline; width: 100%;\"></figure><h3 style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; margin-bottom: 0.5em; font-size: inherit; color: rgba(0, 0, 0, 0.85);\"><span style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; font-weight: bolder;\">Các dụng cụ cần có:</span></h3><ul style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; list-style-position: initial; list-style-image: initial; margin-bottom: 1em; padding-left: 40px;\"><li style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000;\">Lược</li><li style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000;\">Máy sấy</li><li style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000;\">Xịt tạo phồng</li><li style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000;\">Sáp tạo kiểu</li><li style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000;\">Gôm</li></ul><h2 style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; margin-bottom: 0.5em; font-size: inherit; color: rgba(0, 0, 0, 0.85);\"><span style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; font-weight: bolder;\">Cách vuốt kiểu tóc nam Side Part rủ</span></h2><h3 style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; margin-bottom: 0.5em; font-size: inherit; color: rgba(0, 0, 0, 0.85);\"><span style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; font-weight: bolder;\">Bước 1: Gội và dùng Pre-styling tạo độ phồng cho tóc</span></h3><p style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; margin-bottom: 1em;\">Khi được gội qua dầu gội thì tóc cũng trở nên mềm hơn. Vì thế sẽ dễ ép side và tạo nếp hơn. Tiếp theo các bạn hãy xịt pre-styling cho mái tóc. Mục đích của việc này là giúp kích thích sự dẻo dai của các sợi tóc, tăng độ phồng tóc để giúp cho kiểu tóc trông hoàn thiện hơn. Ngoài ra Pre-styling cũng giúp tăng độ bám của sáp trên tóc, tăng thời gian giữ nếp.</p><figure class=\"image\" style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; margin-bottom: 1em;\"><img src=\"https://blog.30shine.com/wp-content/uploads/2019/02/kieu-toc-nam-sp-ru6.jpg\" alt=\"kiểu tóc nam\" srcset=\"https://blog.30shine.com/wp-content/uploads/2019/02/kieu-toc-nam-sp-ru6.jpg 1170w, https://blog.30shine.com/wp-content/uploads/2019/02/kieu-toc-nam-sp-ru6-300x180.jpg 300w, https://blog.30shine.com/wp-content/uploads/2019/02/kieu-toc-nam-sp-ru6-768x460.jpg 768w, https://blog.30shine.com/wp-content/uploads/2019/02/kieu-toc-nam-sp-ru6-1024x614.jpg 1024w\" sizes=\"100vw\" width=\"1170\" style=\"border-width: 0px; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; display: inline; width: 100%;\"></figure><h4 style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; margin-bottom: 0.5em; font-size: inherit; color: rgba(0, 0, 0, 0.85);\"><span style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; font-weight: bolder;\">Lưu ý:</span></h4><ul style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; list-style-position: initial; list-style-image: initial; margin-bottom: 1em; padding-left: 40px;\"><li style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000;\">Dùng chai xịt Pre-styling và xịt đều lên mái tóc</li><li style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000;\">Dùng tay đánh tơi tóc để dung dịch ngấm đều hơn</li><li style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000;\">Sử dụng lược để hất nhẹ từng mảng tóc lên cao hơn</li><li style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000;\">Dùng máy sấy để “Di” theo từng đừng chải của lược.</li></ul><h3 style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; margin-bottom: 0.5em; font-size: inherit; color: rgba(0, 0, 0, 0.85);\"><span style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; font-weight: bolder;\">Bước 2: Sử dụng sáp vuốt tóc</span></h3><p style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; margin-bottom: 1em;\">Sau khi đã Pre-styling xong và mái tóc đã đạt một độ phồng nhất định, các bạn chuyển sang bước vuốt sáp. Bạn lấy khoảng 1 đốt ngón tay sáp ra tay (có thể chia làm nhiều phần nhỏ). Sau đó đánh thật đều, chú ý xoa mạnh và đều tay để sáp được tan nhanh hơn. &nbsp;Tiếp theo đưa thẳng lên tóc để cho các sợi tóc được cố định bằng chất sáp, đồng thời tạo một lớp màng liên kết giữa chúng.</p><h3 style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; margin-bottom: 0.5em; font-size: inherit; color: rgba(0, 0, 0, 0.85);\"><span style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; font-weight: bolder;\">Bước 3: Vuốt tạo kiểu</span></h3><figure class=\"image\" style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; margin-bottom: 1em;\"><img src=\"https://blog.30shine.com/wp-content/uploads/2019/02/kieu-toc-nam-sp-ru4.jpg\" alt=\"kiểu tóc nam\" srcset=\"https://blog.30shine.com/wp-content/uploads/2019/02/kieu-toc-nam-sp-ru4.jpg 1200w, https://blog.30shine.com/wp-content/uploads/2019/02/kieu-toc-nam-sp-ru4-300x157.jpg 300w, https://blog.30shine.com/wp-content/uploads/2019/02/kieu-toc-nam-sp-ru4-768x402.jpg 768w, https://blog.30shine.com/wp-content/uploads/2019/02/kieu-toc-nam-sp-ru4-1024x536.jpg 1024w\" sizes=\"100vw\" width=\"1200\" style=\"border-width: 0px; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; display: inline; width: 100%;\"></figure><p style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; margin-bottom: 1em;\">Đây là công đoạn có thể nói là quan trọng nhất. Bởi chỉ cần một chút sai sót thôi là&nbsp;<i style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000;\">kiểu tóc side part vuốt rủ</i>&nbsp;của bạn sẽ dễ bị chuyển thành tóc dựng thông thường. Khi đã hoàn thành bước 2, các bạn hãy dùng lược thẳng hoặc tay để chia ngôi. Sau đó hãy kẻ một đường dọc từ trước về sau để chia đôi mái tóc theo tỉ lệ 2/8 (hoặc bất cứ tỉ lệ nào mà bạn thích, 3/7 hoặc 4/6….). Tiếp đến dùng lược hoặc tay để ép side (tóc mai), chải gọn những phần tóc phía trước và các phần viền. Cuối cùng là xịt gôm bảo vệ tóc (nếu muốn).</p><p style=\"border-width: 0px; border-style: solid; border-color: rgba(229,231,235,var(--tw-border-opacity)); --tw-border-opacity:1; --tw-shadow:0 0 #0000; --tw-ring-inset:var(--tw-empty, ); --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgba(59, 130, 246, 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; margin-bottom: 1em;\">Trên đây&nbsp;<span style=\"font-family: &quot;be vietnam pro&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 300;\">BrunoBarber</span>&nbsp;đã hướng dẫn các bạn cách vuốt kiểu tóc nam Side Part rủ vô cùng đơn giản. Với những bước nhanh gọn này chắc chắn các bạn sẽ có một mái tóc như ý. Bạn sẽ đẹp trai ngời ngời như vừa bước ra khỏi&nbsp;<span style=\"font-family: &quot;be vietnam pro&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 300;\">BrunoBarber</span>.</p></div></div>');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `price`, `status`) VALUES
(7, 'Dịch Vụ 1', '1', 1),
(8, 'Dịch Vụ 2', '2', 1),
(9, 'Dịch Vụ 3', '3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `phone_number` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `phone_number`, `status`) VALUES
(46, '0583034270', 1);

-- --------------------------------------------------------

--
-- Table structure for table `work_time`
--

CREATE TABLE `work_time` (
  `id` int(11) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_time`
--

INSERT INTO `work_time` (`id`, `time`) VALUES
(1, '09:00:00'),
(2, '09:40:00'),
(3, '10:20:00'),
(4, '11:00:00'),
(5, '11:40:00'),
(6, '12:20:00'),
(8, '13:00:00'),
(10, '13:40:00'),
(11, '14:20:00'),
(12, '15:00:00'),
(13, '15:40:00'),
(14, '16:20:00'),
(16, '17:00:00'),
(17, '17:40:00'),
(18, '18:20:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `combo`
--
ALTER TABLE `combo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_combo`
--
ALTER TABLE `list_combo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_time`
--
ALTER TABLE `work_time`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `combo`
--
ALTER TABLE `combo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `list_combo`
--
ALTER TABLE `list_combo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `work_time`
--
ALTER TABLE `work_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
