-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Час створення: Лип 18 2018 р., 23:58
-- Версія сервера: 5.7.22-0ubuntu0.16.04.1
-- Версія PHP: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `inetshop`
--

-- --------------------------------------------------------

--
-- Структура таблиці `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `logo_class` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `categories`
--

INSERT INTO `categories` (`id`, `title`, `logo_class`, `updated_at`, `created_at`) VALUES
(1, 'Комп\'ютери', 'fa fa-desktop fa-fw', '2018-07-15 23:34:28', '2018-07-15 23:34:28'),
(2, 'Смартфони', 'fa fa-mobile fa-fw', '2018-07-15 23:36:36', '2018-07-15 23:36:36'),
(3, 'Фотоапарати', 'fa fa-camera fa-fw', '2018-07-15 23:37:15', '2018-07-15 23:37:15'),
(4, 'Аксесуари', 'fa fa-microphone fa-fw', '2018-07-15 23:37:44', '2018-07-15 23:37:44');

-- --------------------------------------------------------

--
-- Структура таблиці `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1531489297),
('m130524_201442_init', 1531489481),
('m180713_120209_create_products_table', 1531686948),
('m180713_120600_create_orders_table', 1531686949),
('m180713_201917_create_categories_table', 1531697322);

-- --------------------------------------------------------

--
-- Структура таблиці `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT '0',
  `buyer_name` varchar(50) NOT NULL,
  `buyer_email` varchar(50) NOT NULL,
  `product_id` int(11) DEFAULT '0',
  `quantity` int(11) DEFAULT '0',
  `order_amount` int(11) DEFAULT '0',
  `status` smallint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `category_id` int(11) DEFAULT '0',
  `price` int(11) DEFAULT '0',
  `vendor` varchar(255) DEFAULT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `available` smallint(1) DEFAULT '1',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `products`
--

INSERT INTO `products` (`id`, `title`, `category_id`, `price`, `vendor`, `description`, `image`, `available`, `updated_at`, `created_at`) VALUES
(1, 'Acer Aspire T3-710 (DT.B1HME.001)', 1, 6555, 'Acer', 'Intel Pentium G4400 (3.3 ГГц) / RAM 4 ГБ / HDD 1 ТБ / Intel HD Graphics 510 / DVD±RW Super Multi / LAN / кардридер / FreeDOS\r\n', 'c93468da13f08b20ca7dc714ce71fd24.jpg', 1, '2018-07-16 13:09:56', '2018-07-16 12:28:05'),
(2, 'Intel Pentium G4400 (3.3 ГГц) / RAM 4 ГБ / SSD 120', 1, 7475, 'Qbox', 'Intel Pentium G4400 (3.3 ГГц) / RAM 4 ГБ / SSD 120 ГБ / Intel HD Graphics 510 / без ОД / LAN / без ОС', '88d4038a03d078d18ddd9818b95bf337.jpg', NULL, '2018-07-16 13:09:10', '2018-07-16 13:01:18'),
(3, 'Samsung Galaxy S9 Plus 64GB Midnight Black + акуст', 2, 31999, 'Samsung', '\r\nАкционный кредит 0.01% на 24 месяца!  Все товары и аксессуары Samsung  Защищенные  Super Amoled\r\nЕкран (6.2", Super AMOLED, 2960х1440) / Samsung Exynos 9810 (4 x 2.7 ГГц + 4 x 1.7 ГГц) / подвійна основна камера: 12 Мп + 12 Мп, фронтальна: 8 Мп / RAM 6 ГБ / 64 ГБ вбудованої пам\'яті + microSD (до 400 ГБ) / 3G / LTE / GPS / підтримання 2 SIM-карток (Nano-SIM) / Android 8.0 (Oreo) / 3500 мА·год\r\nПідтримується встановлення двох SIM-карток або однієї SIM-картки та карти пам\'яті. Слот для другої SIM-картки суміщений зі слотом для карти пам\'яті.', 'dd0e6eaa17fdb1ae67f251002d509ad6.jpg', 1, '2018-07-16 13:11:36', '2018-07-16 13:11:28'),
(4, 'ARTLINE Gaming X39 v17 (X39v17)', 1, 18555, 'Artline', 'Intel Core i5-7400 (3.0 - 3.5 ГГц) / RAM 8 ГБ / HDD 1 ТБ / nVidia GeForce GTX 1050 Ti, 4 ГБ / без ОД / LAN / без ОС', 'cb387f250f165b7cf8b21f421e5c5b93.jpg', 1, '2018-07-16 20:07:05', '2018-07-16 20:06:50'),
(5, 'HP 260 G2 DM (2TP61ES) + клавіатура + миша HP!', 1, 11599, 'HP', 'Intel Core i3-6100U (2.3 ГГц) / RAM 4 ГБ / SSD 256 ГБ / Intel HD Graphics 520 / без ОД / LAN / Wi-Fi / Bluetooth / DOS / клавіатура + миша', 'f1976b72055d73698c7295eca9786fc6.jpg', 1, '2018-07-16 20:07:57', '2018-07-16 20:07:47');

-- --------------------------------------------------------

--
-- Структура таблиці `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'XUHuQIePqmksZGMvnkd6fhO2HV6cUzWK', '$2y$13$cxbWUizBm00psZIAxkqFoOHYvdfxX24h1t6hsIk.J0AJuODA87WOm', NULL, 'wwwlopment@gmail.com', 10, 1531489485, 1531489485);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Індекси таблиці `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблиці `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблиці `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
