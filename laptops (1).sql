-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2022 at 10:55 PM
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
-- Database: `laptops`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `img`, `created_at`, `updated_at`) VALUES
(2, 'Kids', 'Kins Clothing', 'The Latest Varity of Kinds Clothing her with us', 'public/files/jvJYqkcLsI8DA6BIP8I5wv7ZQrOzbEIgzbSQ63m9.jpg', '2021-02-28 12:47:49', '2022-04-18 21:10:07'),
(3, 'Men', 'Mens wear', 'Men Clothing and shoes for Hard working and long time heavy usage', 'public/files/kjFT2Uu0OTXpBaH0MIZRaHizORtDOB644zq9aXlH.jpg', '2022-04-18 20:51:49', '2022-04-18 20:51:49'),
(4, 'Woman', 'Woman\'s Clothing', 'Beautiful clothing for woman\'s', 'public/files/FcmKebQfJEcmWqNFYYxzgjprHT555T3riJwp32ZS.jpg', '2022-04-18 20:52:38', '2022-04-18 20:52:38');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_02_15_143229_create_categories_table', 1),
(5, '2021_02_18_193811_create_sub_categories_table', 1),
(6, '2021_02_20_174725_create_products_table', 1),
(7, '2021_05_08_153341_create_orders_table', 2),
(8, '2021_05_15_220801_create_sliders_table', 3),
(10, '2021_05_15_220916_create_slider_table', 4),
(11, '2021_05_15_223852_rename_slider_table', 5),
(12, '2022_04_19_192137_add_order_method', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `cart` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `method` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `cart`, `created_at`, `updated_at`, `status`, `method`) VALUES
(20, 1, 'O:8:\"App\\Cart\":3:{s:5:\"items\";a:1:{i:6;a:5:{s:2:\"id\";i:6;s:4:\"name\";s:40:\"TIE IT UP KAFTAN DRESS - OLIVE LE 699.00\";s:5:\"price\";s:6:\"850.00\";s:8:\"quantity\";i:1;s:5:\"image\";s:57:\"public/files/ptACOgspPCSEmQvmKnsWoC9IG0pITq5y0qj9A9E5.jpg\";}}s:8:\"quantity\";i:1;s:11:\"total_price\";d:850;}', '2022-04-19 01:29:55', '2022-04-19 01:29:55', 1, 0),
(22, 1, 'O:8:\"App\\Cart\":3:{s:5:\"items\";a:1:{i:5;a:5:{s:2:\"id\";i:5;s:4:\"name\";s:50:\"Opio Shop LET IT BE SHEER KAFTAN - BLUSH LE 650.00\";s:5:\"price\";s:6:\"650.00\";s:8:\"quantity\";s:1:\"1\";s:5:\"image\";s:57:\"public/files/EVzIo6f8Y63oiWgLavwbnoVqY1P4EMcwJ5BE3M6k.jpg\";}}s:8:\"quantity\";i:1;s:11:\"total_price\";d:650;}', '2022-04-19 17:32:06', '2022-04-19 17:32:06', 0, 0),
(23, 1, 'O:8:\"App\\Cart\":3:{s:5:\"items\";a:1:{i:10;a:5:{s:2:\"id\";i:10;s:4:\"name\";s:12:\"Denim jacket\";s:5:\"price\";s:6:\"750.00\";s:8:\"quantity\";i:1;s:5:\"image\";s:57:\"public/files/sb3GZJIObgOLM4lCasoOcaiaHspFwes0MbYkaWb4.jpg\";}}s:8:\"quantity\";i:1;s:11:\"total_price\";d:750;}', '2022-04-19 17:32:57', '2022-04-19 18:50:30', 1, 0),
(24, 1, 'O:8:\"App\\Cart\":3:{s:5:\"items\";a:1:{i:6;a:5:{s:2:\"id\";i:6;s:4:\"name\";s:40:\"TIE IT UP KAFTAN DRESS - OLIVE LE 699.00\";s:5:\"price\";s:6:\"850.00\";s:8:\"quantity\";i:1;s:5:\"image\";s:57:\"public/files/ptACOgspPCSEmQvmKnsWoC9IG0pITq5y0qj9A9E5.jpg\";}}s:8:\"quantity\";i:1;s:11:\"total_price\";d:850;}', '2022-04-19 17:37:12', '2022-04-19 18:50:26', 1, 0),
(25, 4, 'O:8:\"App\\Cart\":3:{s:5:\"items\";a:1:{i:13;a:5:{s:2:\"id\";i:13;s:4:\"name\";s:7:\"Croocks\";s:5:\"price\";s:6:\"200.00\";s:8:\"quantity\";s:1:\"1\";s:5:\"image\";s:57:\"public/files/0KZOx0yBqy4rEVsh48F0tgC6LGPJ5EpzuELJ3uzG.jpg\";}}s:8:\"quantity\";i:1;s:11:\"total_price\";d:200;}', '2022-04-19 18:53:12', '2022-04-19 18:53:12', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@admin.com', '$2y$10$MqpuzoraQDcGyTH1kqnJ8uWjFx3RKXj00C9hJlqpjV0o5f5HDSzau', '2021-04-23 14:26:34');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `price_stock` decimal(10,2) DEFAULT NULL,
  `stock` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_price` decimal(10,2) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deal` tinyint(4) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `img`, `price`, `price_stock`, `stock`, `discount_price`, `description`, `is_deal`, `category_id`, `sub_category_id`, `created_at`, `updated_at`) VALUES
(3, 'FLORAL BELTED KIMONO', 'public/files/QamxMrdhOaaKuSoWyfWh6Ro6ub2pK1TFxsaIwxUs.jpg', '600.00', NULL, '50', NULL, 'We are loving this floral vibes lately! Wear alone while lounging or layer over jeans and a tee for a totally boho look.\r\nTrue to size, if in between sizes go one size up. The model is wearing size small and she is 178 cm\r\n\r\nProduct Details:\r\n- Long Sleeves\r\n- Lightweight woven fabric\r\n- Open Front\r\n- Printed\r\n- Dry clean\r\n\r\nSKU: 111FL010330413-01\r\nBrand	Dell\r\nModel	Dell G5 5500\r\nColor	Interstellar Dark\r\nDisplay	15.6\'\' FHD 1920x1080 144Hz\r\nCPU	Intel Core i7 i7-10750H\r\nMemory	16GB RAM\r\nGraphics Card	GTX 1660Ti\r\nVideo Memory	6GB\r\nStorage (SSD)	512GB NVMe\r\nOperating System	Windows 10\r\nKeyboard	English Keyboard\r\nسياسة الشحن', NULL, 4, 6, '2021-02-28 12:03:26', '2022-04-18 21:28:46'),
(5, 'Opio Shop LET IT BE SHEER KAFTAN - BLUSH LE 650.00', 'public/files/EVzIo6f8Y63oiWgLavwbnoVqY1P4EMcwJ5BE3M6k.jpg', '650.00', NULL, '20', NULL, 'This lightweight long sleeve kimono is all about sophistication. It features soft fabric and adjustable waist belt that flatters every figure.\r\nRelaxed and loose fit.The model is wearing One Size, and she is 175 cm.\r\nKaftan length : 128 cm\r\n\r\nProduct Details:\r\n- Open-front design\r\n- Dropped shoulders\r\n- Long sleeves\r\n- Relaxed fit\r\n- Dry clean', NULL, 4, 6, '2022-04-18 21:30:02', '2022-04-18 21:30:02'),
(6, 'TIE IT UP KAFTAN DRESS - OLIVE LE 699.00', 'public/files/ptACOgspPCSEmQvmKnsWoC9IG0pITq5y0qj9A9E5.jpg', '850.00', NULL, '15', NULL, 'This slashed shoulders dress is made of rich linen material featuring a tassel belt for flattering the body. It can be worn as a dress or a tunic with favourite jeans or leggings.\r\nRelaxed fit. The model is wearing One size and she is 178 cm\r\n\r\nProduct Details:\r\n- Open shoulder\r\n- Maxi length,\r\n- Belted\r\n- Crew neckline\r\n- Long sleeves\r\n- Dry clean\r\n\r\nSKU: 117FL015135811-08', NULL, 4, 6, '2022-04-18 21:30:52', '2022-04-18 21:30:52'),
(7, 'JADE SATIN CAPE LE 660.00', 'public/files/kXdDRxm6RJjMuslSsyP02RHqoZVbI39eNkg6nTI0.jpg', '660.00', NULL, '30', NULL, 'Go for easy-breezy style with this blue satin printed cape.\r\nRelaxed fit. The model is wearing One size and she is 178 cm.\r\n\r\nProduct Details:\r\n- Hip Length\r\n- Satin fabric\r\n- Open front\r\n- Sleeve opening\r\n- Dry Clean\r\n\r\nSKU: 001FL015132706-08', NULL, 4, 6, '2022-04-18 21:31:38', '2022-04-18 21:31:38'),
(8, 'CASABLANCA KAFTAN - BLACK', 'public/files/ivPTtfTcvQ1O3hGoFbfVjmqFdPXRNBxewP0xXelt.jpg', '699.00', NULL, '50', NULL, 'Designed to be comfy chic, Keep it simple and stylish with this relaxed fit printed kaftan . Pair with a basic top, denim and mule for a smart casual vibe or pair with heels for a cocktail party.\r\nRelaxed and loose fit.The model is wearing One Size, and she is 175 cm.\r\nKaftan length : 115 cm\r\n\r\nProduct Details:\r\n- Open-front design\r\n- Dropped shoulders\r\n- Long sleeves\r\n- Relaxed fit\r\n- Dry clean', NULL, 4, 6, '2022-04-18 21:32:21', '2022-04-18 21:32:21'),
(9, 'Twill shacket', 'public/files/cYLEAuoQTPbBPfiD0IXMSwbRR1Yu6GJe5Lg3LzEw.jpg', '800.00', NULL, '20', NULL, 'Shacket in twill with a collar, buttons down the front and a yoke at the back. Flap chest pockets with a button, and long sleeves with buttoned cuffs.', NULL, 3, 8, '2022-04-18 21:33:11', '2022-04-19 02:09:34'),
(10, 'Denim jacket', 'public/files/sb3GZJIObgOLM4lCasoOcaiaHspFwes0MbYkaWb4.jpg', '750.00', NULL, '20', NULL, 'Conscious\r\nStraight-cut jacket in sturdy cotton denim with a collar, buttons down the front and long sleeves with buttoned cuffs. Chest pocket, patch front pockets and one inner pocket.', NULL, 3, 8, '2022-04-18 21:33:54', '2022-04-19 02:10:26'),
(11, 'Long coach jacket', 'public/files/9ajtZmLnZzSqvj9FRPgDCoKcyCUnM1ZomU7sSYem.jpg', '1200.00', NULL, '20', NULL, 'Long jacket in windproof, water-repellent fabric with a collar and press-studs down the front. Long sleeves with covered elastication at the cuffs, diagonal welt front pockets with a concealed press-stud and one inner pocket with a press-stud. Fleece lining.', NULL, 3, 9, '2022-04-18 21:34:33', '2022-04-19 02:10:11'),
(12, 'Teddy cargo gilet', 'public/files/SzK9nQp3L7prLkZKARJJKivTmghTl7Z8o0nVUfDk.jpg', '850.00', NULL, '200', NULL, 'Gilet in warm teddy with trims in the same colour. V-neck, zip down the front and open front pockets with concealed press-studs. Lined.', NULL, 3, 9, '2022-04-18 21:35:10', '2022-04-19 02:09:54'),
(13, 'Croocks', 'public/files/0KZOx0yBqy4rEVsh48F0tgC6LGPJ5EpzuELJ3uzG.jpg', '200.00', NULL, '10', NULL, 'Crooks', NULL, 3, 5, '2022-04-19 02:10:57', '2022-04-19 02:10:57');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `created_at`, `updated_at`) VALUES
(9, 'public/slider/QQW4YlJR9cZydsVAIbuhzN1GgXdWHr3Kr2jM5jwG.jpg', '2022-04-18 23:48:32', '2022-04-18 23:48:32'),
(10, 'public/slider/w3dM6WJ4BFbgjwitgdYvcjFbsXrcCpXjMiqRSq9y.jpg', '2022-04-18 23:49:59', '2022-04-18 23:49:59'),
(11, 'public/slider/ZLDTHtsgILLzIFfJ9TiEcVrPmtIhrIs1AnjtSwW3.jpg', '2022-04-18 23:50:05', '2022-04-18 23:50:05');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `slug`, `img`, `parent_id`, `created_at`, `updated_at`) VALUES
(5, 'Shoes', 'Shoes\' for men', 'public/files/P2ZDyuCbc7Mey4rZdFad1281WpH12hGCWk1PwxzW.jpg', 3, '2022-04-18 20:53:06', '2022-04-18 20:53:06'),
(6, 'dresses', 'Dresses\' for womans', 'public/files/w5OU6289beahoEKI1xTrClaErahYzgrA7JwCLG9O.jpg', 4, '2022-04-18 20:53:32', '2022-04-18 20:53:32'),
(7, 'Jackets -kides', 'Little Jackets', 'public/files/x9tiO6rXCmaJFbsUgbrqNITGJVDFtnfJ0uHJAzHM.jpg', 2, '2022-04-18 21:25:23', '2022-04-18 21:40:23'),
(8, 'T-shirts', 'T-shirts collection', 'public/files/inQ5ba3GDXx3FtPvWmQ8l8JrCXuaOBIVCm6NBWBi.jpg', 3, '2022-04-18 21:35:34', '2022-04-18 21:35:34'),
(9, 'Jackets -men', 'Men', 'public/files/SFl1bOYahFzLhDj3x5xjsCqyb0TmIc7Wo7rflfyR.jpg', 3, '2022-04-18 21:42:38', '2022-04-18 21:42:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `address`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '2021-02-21 21:42:27', '$2y$10$PAA6iAVAfzNFGCXE2yRf8OBiUXdYGOthqJrgA.9HtZv1.B24Lo.pm', '01111809770', 'behind oil change', 1, NULL, '2021-02-21 21:42:27', '2021-02-21 21:42:27'),
(4, 'Ahmed', 'Mahmoud@mahmoud', NULL, '$2y$10$44yzToNn6H6CqochScARzumFxNfCr2kXZ.cjzvAcsI7/pNISL/3qe', NULL, NULL, 0, NULL, '2022-04-19 18:52:38', '2022-04-19 18:52:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
