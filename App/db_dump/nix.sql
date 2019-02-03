-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.7.20 - MySQL Community Server (GPL)
-- Операционная система:         Win32
-- HeidiSQL Версия:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных nix
CREATE DATABASE IF NOT EXISTS `nix` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `nix`;

-- Дамп структуры для таблица nix.attribute
CREATE TABLE IF NOT EXISTS `attribute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы nix.attribute: ~7 rows (приблизительно)
/*!40000 ALTER TABLE `attribute` DISABLE KEYS */;
INSERT INTO `attribute` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Тип подключения', '2019-01-26 20:44:12', '2019-01-26 20:44:11'),
	(2, 'Тип наушников', '2019-01-26 20:47:38', '2019-01-26 20:47:38'),
	(3, 'Акустическое оформление', '2019-01-26 20:47:38', '2019-01-26 20:47:38'),
	(4, 'Импеданс, ОМ', '2019-01-26 20:49:32', '2019-01-26 20:49:32'),
	(5, 'Диапазон частот, Гц', '2019-01-26 20:57:30', '2019-01-26 20:57:33'),
	(6, 'Чувствительность, ДБ', '2019-01-26 20:59:07', '2019-01-26 20:59:07'),
	(7, 'Длина кабеля, М', '2019-01-26 20:59:07', '2019-01-26 20:59:07');
/*!40000 ALTER TABLE `attribute` ENABLE KEYS */;

-- Дамп структуры для таблица nix.attribute_value
CREATE TABLE IF NOT EXISTS `attribute_value` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attribute_id` int(11) DEFAULT NULL,
  `value` varchar(100) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_attribute_value_products` (`product_id`),
  KEY `FK_attribute_value_attribute` (`attribute_id`),
  CONSTRAINT `FK_attribute_value_attribute` FOREIGN KEY (`attribute_id`) REFERENCES `attribute` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_attribute_value_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы nix.attribute_value: ~7 rows (приблизительно)
/*!40000 ALTER TABLE `attribute_value` DISABLE KEYS */;
INSERT INTO `attribute_value` (`id`, `attribute_id`, `value`, `product_id`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Проводные', 2, '2019-01-26 22:11:10', '2019-01-26 22:11:11'),
	(2, 5, '20-20000 ', 2, '2019-01-26 22:11:56', '2019-01-26 22:11:56'),
	(3, 4, '32 ', 2, '2019-01-26 22:12:20', '2019-01-26 22:12:21'),
	(4, 6, '99', 2, '2019-01-26 22:12:48', '2019-01-26 22:12:48'),
	(5, 2, 'Портативные,накладные', 2, '2019-01-26 22:13:44', '2019-01-26 22:13:44'),
	(6, 3, 'Закрытые', 2, '2019-01-26 22:14:41', '2019-01-26 22:14:42'),
	(7, 7, '3', 2, '2019-01-26 22:21:19', '2019-01-26 22:21:21');
/*!40000 ALTER TABLE `attribute_value` ENABLE KEYS */;

-- Дамп структуры для таблица nix.brands
CREATE TABLE IF NOT EXISTS `brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы nix.brands: ~6 rows (приблизительно)
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Sony', NULL, NULL),
	(2, 'PHILIPS', NULL, NULL),
	(4, 'Marshall', '2019-01-05 17:47:54', '2019-01-05 17:47:54'),
	(5, 'Grado', '2019-01-05 17:47:54', '2019-01-05 17:47:54'),
	(6, 'Apple', '2019-01-06 09:44:17', '2019-01-06 09:44:17'),
	(7, 'Sennheiser', '2019-01-06 13:00:02', '2019-01-06 13:00:02');
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;

-- Дамп структуры для таблица nix.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы nix.categories: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Полноразмерные наушники', '2019-01-03 10:28:21', '2019-01-03 10:28:21'),
	(2, 'Внутриканальные наушники', '2019-01-03 10:28:21', '2019-01-03 10:28:21'),
	(3, 'Наушники-капельки', '2019-01-05 17:38:29', '2019-01-05 17:38:29'),
	(4, 'Беспроводные наушники', '2019-01-05 19:19:49', '2019-01-05 19:19:49');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Дамп структуры для таблица nix.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `stars` enum('1','2','3','4','5') NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы nix.comments: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`id`, `message`, `date`, `created_at`, `updated_at`, `stars`, `user_id`, `product_id`) VALUES
	(1, 'Really cool Earphones', '2019-01-01', '2019-01-15 23:47:48', '2019-01-15 23:47:48', '2', 9, 2),
	(2, 'WOW!Really COOL', '2019-01-02', '2019-01-16 00:14:01', '2019-01-16 00:14:01', '5', 8, 2);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Дамп структуры для таблица nix.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `status` varchar(60) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `orders_users_fk_2` (`user_id`),
  CONSTRAINT `orders_users_fk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы nix.orders: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
	(4, 8, 'cart', '2019-01-22 21:28:40', '2019-01-22 21:28:40'),
	(5, 9, 'order', '2019-01-24 19:25:57', '2019-01-24 19:25:57'),
	(6, 9, 'order', '2019-02-03 11:21:40', '2019-02-03 12:26:04');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Дамп структуры для таблица nix.orders_products
CREATE TABLE IF NOT EXISTS `orders_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы nix.orders_products: ~11 rows (приблизительно)
/*!40000 ALTER TABLE `orders_products` DISABLE KEYS */;
INSERT INTO `orders_products` (`id`, `order_id`, `product_id`, `quantity`) VALUES
	(20, 1, 1, 12),
	(21, 1, 5, 15),
	(22, 1, 4, 12),
	(29, 4, 2, 7),
	(38, 5, 6, 2),
	(39, 5, 5, 3),
	(40, 5, 2, 1),
	(41, 6, 5, 3),
	(42, 6, 3, 2),
	(43, 7, 2, 1),
	(44, 7, 3, 1);
/*!40000 ALTER TABLE `orders_products` ENABLE KEYS */;

-- Дамп структуры для таблица nix.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `products_brands_fk1` (`brand_id`),
  KEY `products_categories_fk2` (`category_id`),
  CONSTRAINT `products_brands_fk1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `products_categories_fk2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы nix.products: ~6 rows (приблизительно)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `category_id`, `brand_id`, `name`, `price`, `quantity`, `image`, `description`, `created_at`, `updated_at`) VALUES
	(1, 1, 5, 'PS1000e', 1695, -542, 'https://images-na.ssl-images-amazon.com/images/I/61i6nJPskCL._SX425_.jpg', 'This hybrid design has an inner sleeve of hand-crafted mahogany made by using the new series \'e\' curing process. Its outer housing, machined from aluminum then chrome-plated, utilizes a special processing and casting method to increase the porosity of the alloy. This combination of wood and metal insures that the earphone chamber has no \'ringing\' which might obscure detail or add coloration. The way the wood and metal housing moves air and reacts to sound vibrations is virtually unaffected by transient distortions. Grado has also designed the cable for the PS1000e; the twelve-conductor cable design uses UHPLC (Ultra-High Purity, Long Crystal) copper, improves control and stability of the total range of the frequency spectrum. The PS1000e also has a new 50mm driver and a newly re-configured voice coil and diaphragm design, resulting in unsurpassed speed and accuracy responses.', '2019-01-05 17:51:26', '2019-01-05 17:51:26'),
	(2, 1, 4, 'MAJOR III ', 80, 126, 'https://images-na.ssl-images-amazon.com/images/I/819aPY4UzVL._SL1500_.jpg', 'jor III is the next chapter in the revolutionary history of Marshall.\r\nThis modern go-to classic has been re-engineered for a cleaner more refined design, while the silhouette stays true to its original form. Sticking to the basics, the Major III is covered in time tested durable vinyl covering and proudly stamped with the iconic script logo, all giving a firm nod to the legacy of Marshall.\r\nSlimmed down ergonomic 3D hinges add a more streamlined look, while thicker loop wires with reinforced rubber dampers contribute to a solid build quality unsurpassed by others. This combined with its on-ear cushions and plush straight fit headband provide hours of comfortable listening.\r\nMajor III turns up the performance with custom tuned 40 mm dynamic drivers for enhanced bass response, smooth mids and crystal clear highs that will immediately remind you why this headphone is an icon in the making.', '2019-01-05 21:40:16', '2019-01-05 21:40:16'),
	(3, 4, 2, 'SHB8750NC/27', 70, 63, 'https://images-na.ssl-images-amazon.com/images/I/41gzKAS3CCL.jpg', 'Enjoy your media experience with these Philips SHB8750NC Bluetooth Noise-Canceling Headphones. They reduce outside distractions by up to 97 percent with no wires and no compromise.\r\n\r\n', '2019-01-06 06:00:10', '2019-01-06 06:00:10'),
	(4, 3, 6, 'Apple EarPods with Remote and Mic ', 39, -23, 'https://i.citrus.ua/imgcache/size_1000/uploads/shop/a/7/a78cd2b1f0203bfc9a46da10aa9d2725.jpg', '\r\nUnlike traditional, circular earbuds, the design of the EarPods is defined by the geometry of the ear. Which makes them more comfortable for more people than any other earbud-style headphones.\r\n\r\nThe speakers inside the EarPods have been engineered to maximise sound output and minimise sound loss, which means you get high-quality audio.\r\n\r\nThe Apple EarPods with Remote and Mic also include a built-in remote that lets you adjust the volume, control the playback of music and video, and answer or end calls with a pinch of the cord.', '2019-01-06 09:46:15', '2019-01-06 09:46:15'),
	(5, 2, 7, 'Sennheiser IE 4', 90, 50, 'https://assets.sennheiser.com/img/13900/product_detail_x2_desktop_IE4_2.jpg', 'Эти наушники для персонального мониторинга отличаются выдающимися звуковыми характеристиками и высокой динамикой. Наушники комплектуются сменными ушными вставками трёх размеров, что позволяет осуществлять индивидуальную подгонку наушников под ушной канал. В результате наушники хорошо защищают от воздействия окружающего шума и имеют хорошую отдачу по НЧ.\r\nПодробнее: https://rozetka.com.ua/sennheiser_ie_4/p86130/', '2019-01-06 13:05:59', '2019-01-06 13:05:59'),
	(6, 1, 5, 'Heretic Anthem', 1695, 93, '', '12312', '2019-01-15 07:26:30', '2019-01-15 07:26:30');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Дамп структуры для таблица nix.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `password` varchar(120) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы nix.users: ~15 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `login`, `password`, `email`, `created_at`, `updated_at`) VALUES
	(8, 'asd', '$2y$10$bIbzEMZIiu8EWWKbLoaReefRN0QlBKNGhWGPgRlAOuHgAo7nYMa5u', 'starsettime@gmail.com', '2019-01-15 08:19:15', '2019-01-15 08:19:15'),
	(9, 'rainsxng1', '$2y$10$gszuvnhT7ORlInBTP7DUhuFoMtAzZV4V3xIEhRmSU6HQCkdXdM/42', 'starsettime@gmail.com', '2019-01-15 20:25:02', '2019-01-31 22:46:44'),
	(32, 'xxx', '$2y$10$AofU/T51/MUKUhkNf9McrOd.WeTZwUdMBjqswNIpwaeJF11s8qhui', 'starsettime@gmail.com', '2019-01-27 20:59:32', '2019-01-27 20:59:32'),
	(33, 'asdqwewqwqe', '$2y$10$20Dy4CMO.7Z.dy6lWlc5p.53ebNY4OeTuJcPM//tfkPWqdCj4hl5m', 'starsettime@gmail.com', '2019-01-27 21:12:13', '2019-01-27 21:12:13'),
	(34, 'dsd', '$2y$10$N7mUsfM/XHVqMNeUF4acd.qK.bn1k9FHE02zW4ghYBLUKDjXScKiu', 'asdasa@xn--b1aa7c1ab.xn--p1ag', '2019-01-27 21:20:30', '2019-01-27 21:20:30'),
	(35, 'dsd1', '$2y$10$m.0qNLJPSDBm83Y9g5f4s.emJJ5ZvNSZ.HtyiyfgFVk.TzX8xqAku', 'asdasa@xn--b1aa7c1ab.xn--p1ag', '2019-01-27 21:20:53', '2019-01-27 21:20:53'),
	(36, 'wqeqwe', '$2y$10$xdlgFc/de/psw.KLMFNVauHMYrljDyJgrfst/ZE.MVRpvWPpEzyUS', 'asd@xn--b1aa6cc5ac.xn--p1ag', '2019-01-27 21:22:27', '2019-01-27 21:22:27'),
	(37, 'wqeqwe1', '$2y$10$Vx3hAoMNpJQMAEErsVWpYujQF/go09LwHUCYO5uFsfko/MS08SlfW', 'asd@adsasd.asd', '2019-01-27 21:22:38', '2019-01-27 21:22:38'),
	(38, 'wqeweqzxc', '$2y$10$clhdtb.mPiV/AaFaWV2BP.SLLDUQYMajCoMn.LZx4/QoZdqmwWkH6', 'starsettime@gmail.com', '2019-01-27 21:54:35', '2019-01-27 21:54:35'),
	(39, 'wqeweqzxcx', '$2y$10$27aC7iqRWZPvT4yyJbFVb.cuySeEJ5iZdFuSY/hbLP8g.xQ1yduj2', 'starsettime@gmail.com', '2019-01-27 21:54:42', '2019-01-27 21:54:42'),
	(40, 'oewi', '$2y$10$C5yqQNjH1doD/5j0txvw9.h3pyljc6Dw6/GbkF316kg1AtjMJVSUa', 'starsettime@xn--b1a9a0c.com', '2019-01-27 22:01:59', '2019-01-27 22:01:59'),
	(41, 'oewi1', '$2y$10$dRaIYK/rmGOALHlqjoNL/eplf15Kknd/M1qKC9aUON5WoVRdJhE.q', 'starsettime@xn--b1a9a0c.com', '2019-01-27 22:02:08', '2019-01-27 22:02:08'),
	(42, 'oewi12', '$2y$10$.pGMvLcikT8xliWxwE0CGOezOJQ.V7lqZvk/ZBFZpYbBWFHcj1xzG', 'starsettime@xn--b1a9av.com', '2019-01-27 22:02:32', '2019-01-27 22:02:32'),
	(43, 'rainsxngaas', '$2y$10$7ZE2oIHod.AP.2wTKdtEX.OYpy6HUR3Ob5UW4JfbSBsVds2xO7a6i', 'starsettime@xn--b1a9av.com', '2019-01-27 22:03:18', '2019-01-27 22:03:18'),
	(44, 'sadhj', '$2y$10$LV18iGsB3qOaDf/VShi5gOGsdK7OG5mDTowS86CA3cZhPhHToorXe', 'starsettime@gmail.com', '2019-01-29 18:39:34', '2019-01-29 18:39:34');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
