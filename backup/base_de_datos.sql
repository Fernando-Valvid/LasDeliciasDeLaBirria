-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 06, 2022 at 11:55 PM
-- Server version: 5.7.32
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_date` date DEFAULT NULL,
  `arrived_date` date DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `order_date`, `arrived_date`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'Pending', 1, '2022-03-16 16:20:53', '2022-03-16 16:57:30'),
(2, NULL, NULL, 'Active', 1, '2022-03-16 16:58:14', '2022-03-16 16:58:14'),
(3, NULL, NULL, 'Pending', 2, '2022-03-16 23:28:03', '2022-03-17 00:23:57'),
(4, NULL, NULL, 'Pending', 2, '2022-03-17 00:25:25', '2022-03-17 00:26:40'),
(5, NULL, NULL, 'Pending', 2, '2022-03-17 00:26:54', '2022-03-17 00:35:36'),
(6, NULL, NULL, 'Pending', 2, '2022-03-17 00:35:48', '2022-03-17 02:27:49'),
(7, NULL, NULL, 'Active', 2, '2022-03-17 02:27:58', '2022-03-17 02:27:58');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `topping` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Sin salsa',
  `discount` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`id`, `cart_id`, `product_id`, `quantity`, `topping`, `discount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'Salsa de piña con habanero', 0, '2022-03-16 16:57:09', '2022-03-16 16:57:09'),
(2, 1, 2, 1, 'Salsa macha', 0, '2022-03-16 16:57:15', '2022-03-16 16:57:15'),
(8, 3, 1, 3, 'Salsa tradicional estilo Tijuana', 0, '2022-03-17 00:23:22', '2022-03-17 00:23:22'),
(9, 3, 8, 1, NULL, 0, '2022-03-17 00:23:32', '2022-03-17 00:23:32'),
(10, 4, 1, 3, 'Salsa tradicional estilo Tijuana', 0, '2022-03-17 00:26:15', '2022-03-17 00:26:15'),
(12, 5, 1, 2, 'Salsa tradicional estilo Tijuana', 0, '2022-03-17 00:34:47', '2022-03-17 00:34:47'),
(13, 5, 4, 1, 'Salsa de arandanos con semillas', 0, '2022-03-17 00:34:56', '2022-03-17 00:34:56'),
(14, 5, 8, 1, NULL, 0, '2022-03-17 00:35:01', '2022-03-17 00:35:01'),
(15, 6, 1, 1, 'Salsa tradicional estilo Tijuana', 0, '2022-03-17 02:27:21', '2022-03-17 02:27:21'),
(16, 6, 4, 1, NULL, 0, '2022-03-17 02:27:26', '2022-03-17 02:27:26');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Birria', 'Birrias', NULL, '2022-03-16 16:27:13', '2022-03-16 16:27:13'),
(2, 'Tacos', 'Tacos', NULL, '2022-03-16 16:27:22', '2022-03-16 16:27:22'),
(3, 'Combos', 'Combos', NULL, '2022-03-16 16:27:30', '2022-03-16 16:27:30'),
(4, 'A la plancha', 'A la plancha', NULL, '2022-03-16 16:27:37', '2022-03-16 16:27:37'),
(5, 'Bebidas', 'Bebidas', NULL, '2022-03-16 16:27:47', '2022-03-16 16:27:47'),
(6, 'Topping', 'Toppings', NULL, '2022-03-16 16:27:55', '2022-03-16 16:27:55');

-- --------------------------------------------------------

--
-- Table structure for table `combinaciones`
--

CREATE TABLE `combinaciones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grupos_id` int(11) NOT NULL,
  `nombre_topping` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `combinaciones`
--

INSERT INTO `combinaciones` (`id`, `grupos_id`, `nombre_topping`, `created_at`, `updated_at`) VALUES
(7, 1, 'Salsa tradicional estilo Tijuana', '2022-03-16 22:24:55', '2022-03-16 22:24:55'),
(8, 2, 'Salsa de arandanos con semillas', '2022-03-16 22:31:33', '2022-03-16 22:31:33'),
(9, 3, 'Salsa macha', '2022-03-16 22:31:57', '2022-03-16 22:31:57');

-- --------------------------------------------------------

--
-- Table structure for table `detalles`
--

CREATE TABLE `detalles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `venta_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grupos`
--

CREATE TABLE `grupos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grupos`
--

INSERT INTO `grupos` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Salsas picantes', '2022-03-16 16:29:24', '2022-03-16 16:34:54'),
(2, 'Salsas extravagantes', '2022-03-16 16:29:31', '2022-03-16 16:29:31'),
(3, 'Salsas raras', '2022-03-16 16:29:37', '2022-03-16 16:29:37');

-- --------------------------------------------------------

--
-- Table structure for table `horarios`
--

CREATE TABLE `horarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inicio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `horarios`
--

INSERT INTO `horarios` (`id`, `dia`, `inicio`, `fin`, `created_at`, `updated_at`) VALUES
(1, 'Lunes', 'Cerrado', 'Cerrado', '2022-03-16 17:16:01', '2022-03-16 17:16:01'),
(2, 'Martes', '10:00 am.', '16:00 pm.', '2022-03-16 17:16:01', '2022-03-16 17:16:01'),
(3, 'Miercoles', '10:00 am.', '16:00 pm.', '2022-03-16 17:16:41', '2022-03-16 17:16:41'),
(4, 'Jueves', '10:00 am.', '16:00 pm.', '2022-03-16 17:16:41', '2022-03-16 17:16:41'),
(5, 'Viernes', 'Cerrado', 'Cerrado', '2022-03-16 17:17:26', '2022-03-17 02:29:37'),
(6, 'Sabado', '09:00 am.', '18:00 pm.', '2022-03-16 17:17:26', '2022-03-16 17:17:26'),
(7, 'Domingo', '09:00 am.', '18:00 pm.', '2022-03-16 17:18:10', '2022-03-16 17:18:10');

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
(4, '2021_06_30_203153_create_categories_table', 1),
(5, '2021_07_14_034504_create_ventas_table', 1),
(6, '2021_07_14_034554_create_detalles_table', 1),
(7, '2021_07_14_035737_create_productos_table', 1),
(8, '2021_07_14_061341_create_product_images_table', 1),
(9, '2021_07_29_153826_create_carts_table', 1),
(10, '2021_07_29_153854_create_cart_details_table', 1),
(11, '2021_12_06_225343_create_horarios_table', 1),
(12, '2022_03_16_012153_create_grupos_table', 1),
(13, '2022_03_16_012443_create_combinaciones_table', 1),
(14, '2022_03_16_082754_agregar_campo_grupos_id', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_description` text COLLATE utf8mb4_unicode_ci,
  `price` double(8,2) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `grupos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `name`, `description`, `long_description`, `price`, `category_id`, `created_at`, `updated_at`, `grupos_id`) VALUES
(1, 'Taco de Birria', 'Taco de Birria estilo Tijuana', 'Exquisito taco de birria de res preparado al tradicional estilo Tijuana, carne maciza, suave y jugosa, una bocanada de todo el sabor de la region; Incluye: Verdura (Cebolla y Cilantro) y una salsa gourmet.', 38.00, 1, '2022-03-16 16:37:17', '2022-03-16 16:37:26', 1),
(2, 'QuesaBirria', 'QuesaBirria', 'Una exquisita quesabirria preparada al tradicional estilo Tijuana, con queso Mozarrella y tortilla de harina o de maiz, acompañada de un delicioso vaso de consome de jugo de carne. Una bocanada de sabor', 60.00, 1, '2022-03-16 16:39:43', '2022-03-16 16:55:53', 2),
(3, 'Plato de Birria', 'Plaç', 'Plato de birria al tradicional estilo Tijuana - 473 ml. - Exquisita birria, carne maciza, suave y jugosa, una bocanada del sabor de la region; Incluye: Verdura (Cebolla y cilantro) y salsa gourmet a elegir.', 90.00, 1, '2022-03-16 16:41:27', '2022-03-16 21:28:00', 1),
(4, 'Taco Generoso', 'Taco generoso', 'Taco de carne al gusto 100% natural (libre de soya), sazonado con ingredientes secretos. Incluye: Verdura (Cebolla y cilantro) y salsa gourmet a elegir.', 38.00, 2, '2022-03-16 16:42:58', '2022-03-16 22:33:31', 2),
(5, 'Gringa al gusto', 'Gringa al gusto', 'Gringa preparada al gusto (Suadero, carne enchilada o la tradicioanl al pastor) gratinada con queso mozarella y emparedado en tortillas de harina, disfrutala!!', 99.00, 4, '2022-03-16 16:44:45', '2022-03-16 22:03:46', 1),
(6, 'Gringa de birria', 'Gringa de birria estilo Tijuana', 'Exquisita gringa de birria de res al tradicional estilo Tijuana, carne suave y jugosa, una bocanada del sabor de la region. Incluye: Verdura (Cebolla y cilantro) y salsa gourmet a elegir.', 99.00, 4, '2022-03-16 16:46:12', '2022-03-16 22:18:40', 3),
(7, 'Coca cola de 400ml', 'Coca Cola de 400ml.', 'Coca cola de 400 ml.', 16.00, 5, '2022-03-16 16:46:46', '2022-03-16 16:46:46', 0),
(8, 'Coca Cola de 1.35L', 'Coca Cola de 1.35L.', 'Coca cola de 1.35L.', 35.00, 5, '2022-03-16 16:47:07', '2022-03-16 16:47:07', 0),
(9, 'Coca Cola de 2.25L', 'Coca Cola de 2.25L', 'Coca cola de 2.25L.', 53.00, 5, '2022-03-16 16:47:36', '2022-03-16 16:47:36', 0),
(10, 'Salsa tradicional estilo Tijuana', 'Salsa tradicional estilo Tijuana', 'Salsa tradicional estilo Tijuana', 0.00, 6, '2022-03-16 16:48:22', '2022-03-16 16:48:22', 0),
(11, 'Salsa de arandanos con semillas', 'Salsa de arandanos con semillas', 'Salsa de arandanos con semillas', 0.00, 6, '2022-03-16 16:48:45', '2022-03-16 16:48:45', 0),
(12, 'Salsa macha', 'Salsa macha', 'Salsa macha', 0.00, 6, '2022-03-16 16:49:02', '2022-03-16 16:49:02', 0),
(13, 'Salsa de piña con habanero', 'salsa de piña con habanero', 'Salsa de piña con habanero', 0.00, 6, '2022-03-16 16:49:19', '2022-03-16 16:49:19', 0),
(14, 'Un kilo de birria', 'Un kilo de birria', 'Birria de res preparada al tradicional estilo Tijuana - Un kilo - carne maciza, suave y jugosa, una bocanada del sabor de la region; Incluye: Dos litros de consome, verdura (Cebolla y cilantro) y salsa gourmet a elegir.', 610.00, 1, '2022-03-16 23:56:02', '2022-03-16 23:57:10', 0),
(15, 'Birria en consome (Un litro)', 'Birria de res en su consomé (Litro)', 'Exquisita birria de res en consome - Un litro - BIRRIA preparada la tradicional estilo Tijuana, carne maciza, suave y jugosa, una bocanada del sabor de la region; Incluye: Verdura (Cebolla y cilantro) y salsa gourmet a elegir.', 135.00, 1, '2022-03-16 23:59:10', '2022-03-16 23:59:10', 0),
(16, 'Un litro de consome de birria', 'Un litro de conseme de birria', 'Un litro de delicioso consome de birria con jugo de carne - BIRRIA preparada al tradicional estilo Tijuana, una bocanada del sabor de la region; Incluye: Verdura (Cebolla y cilantro) y salsa gourmet a elegir.', 90.00, 1, '2022-03-17 00:01:08', '2022-03-17 00:01:08', 0),
(17, 'BirriaFlautas 10\"', 'BirriaFlautas 10\"', 'Flauta de birria (10 pulgadas de crujiente sabor), la combinacion perfecta de la tradicional birria estilo Tijuana en tortilla doradita, un festival de sabor en tu boca.', 42.00, 1, '2022-03-17 00:03:02', '2022-03-17 00:03:02', 0),
(18, 'Birria Ramen', 'Birria Ramen (Un litro)', 'Carne de birria y sopa ramen en su consome de jugo de carne, la fusion de dos culturas (Japon y México), como en las grandes ciudades de estados Unidos (Nueva York y Los Angeles), ahora en NEZA. No te puedes perder esta exquisitez.', 158.00, 1, '2022-03-17 00:05:14', '2022-03-17 00:05:14', 0),
(19, 'Sidral Mundet Manzana 1.35L', 'Sidral Mundet Manzana 1.35L', 'Sidral Mundet Manzana 1.35L', 28.00, 5, '2022-03-17 00:06:25', '2022-03-17 00:06:25', 0),
(20, 'Sidral Mundet Mandarina 2L', 'Sidral Mundet Mandarina 2L', 'Sidral Mundet Mandarina 2L', 30.00, 5, '2022-03-17 00:07:17', '2022-03-17 00:07:17', 0),
(21, 'Sidral Mundet Pera 2L', 'Sidral Mundet Pera 2L', 'Sidral Mundet Pera 2L', 30.00, 5, '2022-03-17 00:07:55', '2022-03-17 00:07:55', 0),
(22, 'Sidral Mundet Ciruela 2L', 'Sidral Mundet Ciruela 2L', 'Sidral Mundet Ciruela 2L', 30.00, 5, '2022-03-17 00:08:55', '2022-03-17 00:08:55', 0),
(23, 'Combo Plebe', 'COMBOPLEBE', 'Kilo de birria (maciza)*1 + Sidral Mundet Mandarina 2L.*1\r\nExquisita birria de res - Un kilo - Birria preparada al tradicional estilo Tijuana, carne maciza, suave y jugosa, una bocanada del sabor de la region; Incluye: Dos litros de consome, verdura (Cebolla y cilantro), salsa gourmet a elegir, mas un refrescante Sidral Mundet de Mandarina 2L.', 620.00, 3, '2022-03-17 00:11:24', '2022-03-17 00:11:24', 0),
(24, 'Prueba', 'Prueba de un producto', 'Prueba de un producto que contiene distintas cosas', 50.00, 1, '2022-03-17 02:28:59', '2022-03-17 02:28:59', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `image`, `featured`, `product_id`, `created_at`, `updated_at`) VALUES
(1, '6231be0052e2dTacoDeBirria.jpg', 0, 1, '2022-03-16 16:37:52', '2022-03-16 16:37:52'),
(2, '6231be7df2a11QuesaBirria.jpg', 0, 2, '2022-03-16 16:39:57', '2022-03-16 16:39:57'),
(3, '6231bf46e3d35PlatoBirria.jpg', 0, 3, '2022-03-16 16:43:18', '2022-03-16 16:43:18'),
(4, '6231fef625a0aTacoGeneroso.jpg', 0, 4, '2022-03-16 21:15:02', '2022-03-16 21:15:02'),
(5, '6231ff02a4dbdGringa.png', 0, 5, '2022-03-16 21:15:14', '2022-03-16 21:15:14'),
(6, '6231ff0db3da1BirriaGringa.jpg', 0, 6, '2022-03-16 21:15:25', '2022-03-16 21:15:25'),
(7, '6231ff1723316CocaCola400ml.png', 0, 7, '2022-03-16 21:15:35', '2022-03-16 21:15:35'),
(8, '6231ff20b20c5CocaCola2.25l.png', 0, 9, '2022-03-16 21:15:44', '2022-03-16 21:15:44'),
(9, '6231ff2936592CocaCola1.35l.png', 0, 8, '2022-03-16 21:15:53', '2022-03-16 21:15:53'),
(10, '623225079567bkiloBirria.jpg', 0, 14, '2022-03-16 23:57:27', '2022-03-16 23:57:27'),
(12, '6232258f082aaLitroConsomeBirria.jpg', 0, 15, '2022-03-16 23:59:43', '2022-03-16 23:59:43'),
(13, '623225f05f0d3LitroConsome.jpg', 0, 16, '2022-03-17 00:01:20', '2022-03-17 00:01:20'),
(14, '623226601f124BirriaFlautas.jpg', 0, 17, '2022-03-17 00:03:12', '2022-03-17 00:03:12'),
(15, '623226e4b6bd0BirriaRamen.jpg', 0, 18, '2022-03-17 00:05:24', '2022-03-17 00:05:24'),
(16, '6232273b335dcSidralMundet1.35l.png', 0, 19, '2022-03-17 00:06:51', '2022-03-17 00:06:51'),
(17, '623227613905bMundetMandarina2l.png', 0, 20, '2022-03-17 00:07:29', '2022-03-17 00:07:29'),
(18, '62322787bc860MundetPera2l.png', 0, 21, '2022-03-17 00:08:07', '2022-03-17 00:08:07'),
(19, '623227c3a5614MundetCiruela2l.png', 0, 22, '2022-03-17 00:09:07', '2022-03-17 00:09:07'),
(20, '62322858bf193COMBOPlebe.jpg', 0, 23, '2022-03-17 00:11:36', '2022-03-17 00:11:36');

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
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jorge', 'jorge4escamilla@gmail.com', NULL, '$2y$10$2syDar/4EBzTz1SZFFlhMe9oWSa/aoxBU3mAszi8K7kaV.usOiKk.', 1, NULL, '2022-03-16 16:20:53', '2022-03-16 16:20:53'),
(2, 'Angelica', 'angie@gmail.com', NULL, '$2y$10$0ZzD8ydlv3ddgNawoKf0y.ImSeAgloZVDgHB3PicjFOjhrvZBj6n.', 0, NULL, '2022-03-16 23:28:03', '2022-03-16 23:28:03');

-- --------------------------------------------------------

--
-- Table structure for table `ventas`
--

CREATE TABLE `ventas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `combinaciones`
--
ALTER TABLE `combinaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detalles`
--
ALTER TABLE `detalles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `combinaciones`
--
ALTER TABLE `combinaciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `detalles`
--
ALTER TABLE `detalles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
