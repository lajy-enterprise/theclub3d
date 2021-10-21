-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 20-10-2021 a las 23:23:21
-- Versión del servidor: 5.7.35-0ubuntu0.18.04.2
-- Versión de PHP: 7.2.24-0ubuntu0.18.04.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `3DClub`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Modelado 3d', 'Modelado-3d', 'default.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category_post`
--

CREATE TABLE `category_post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `category_post`
--

INSERT INTO `category_post` (`id`, `category_id`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-10-03 00:27:58', '2021-10-03 00:27:58'),
(2, 1, 2, '2021-10-03 00:30:37', '2021-10-03 00:30:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_07_25_200346_create_roles_table', 1),
(5, '2020_07_28_073326_create_tags_table', 1),
(6, '2020_07_29_035202_create_categories_table', 1),
(7, '2020_07_30_104533_create_posts_table', 1),
(8, '2020_07_30_104632_create_post_tag_table', 1),
(9, '2020_07_30_104906_create_category_post_table', 1),
(10, '2020_08_02_171528_create_subscribers_table', 1),
(11, '2020_08_03_052105_create_jobs_table', 1),
(12, '2020_08_03_140518_create_post_user_table', 1),
(13, '2020_08_04_093330_create_comments_table', 1),
(14, '2021_09_17_003656_add_news_cols_to_users', 1),
(15, '2021_10_03_014123_add_news_cols_to_tags', 2),
(16, '2021_10_03_164401_add_news_cols_to_posts', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci,
  `view_count` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `is_approved` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_post` tinyint(1) NOT NULL DEFAULT '1',
  `scad` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `slug`, `image`, `body`, `view_count`, `status`, `is_approved`, `created_at`, `updated_at`, `is_post`, `scad`) VALUES
(1, 3, '3D Art', '3d-art', '3d-art-2021-10-02-6158c0cd9840f.png', '<p>&nbsp;arte en 3d que no te puedes perder.!</p>', 2, 1, 1, '2021-10-03 00:27:57', '2021-10-20 19:25:19', 1, NULL),
(2, 3, 'Nuestros Precios', 'nuestros-precios', 'nuestros-precios-2021-10-02-6158c16d623bb.png', '<p>Con los mejores precios del mercado</p>', 2, 1, 1, '2021-10-03 00:30:37', '2021-10-20 19:25:51', 1, NULL),
(8, 1, 'tool-1110', 'tool-1110', 'tool-1110-2021-10-20-617049af58b78.jpg', '<p>tool-1110</p>', 1, 0, 1, '2021-10-20 15:54:07', '2021-10-20 15:58:20', 0, 'tool-1110-2021-10-20-617049af69f0a.scad'),
(9, 1, 'tool-1111', 'tool-1111', 'tool-1111-2021-10-20-61705204ce4a4.jpg', '<p>tool-1111</p>', 1, 0, 1, '2021-10-20 16:29:40', '2021-10-20 20:07:49', 0, 'tool-1111-2021-10-20-61705204d637a.scad'),
(10, 1, 'tool-1112', 'tool-1112', 'tool-1112-2021-10-20-61705535293ba.jpg', '<p>tool-1112</p>', 0, 0, 1, '2021-10-20 16:43:17', '2021-10-20 16:43:17', 0, 'tool-1112-2021-10-20-6170553530c68.scad'),
(11, 1, 'tool-1113', 'tool-1113', 'tool-1113-2021-10-20-617057a4b1b19.jpg', '<p>tool-1113</p>', 0, 0, 1, '2021-10-20 16:53:40', '2021-10-20 16:55:11', 0, 'tool-1113-2021-10-20-617057a4b2000.scad'),
(12, 1, 'tool-1114', 'tool-1114', 'tool-1114-2021-10-20-617057e5349d4.jpg', '<p>tool-1114</p>', 0, 0, 1, '2021-10-20 16:54:45', '2021-10-20 16:54:45', 0, 'tool-1114-2021-10-20-617057e53529e.scad'),
(13, 1, 'tool-1115', 'tool-1115', 'tool-1115-2021-10-20-617058ab36717.jpg', '<p>tool-1115</p>', 0, 0, 1, '2021-10-20 16:58:03', '2021-10-20 16:58:03', 0, 'tool-1115-2021-10-20-617058ab36cf3.scad'),
(14, 1, 'tool-1116', 'tool-1116', 'tool-1116-2021-10-20-61705a264e288.jpg', '<p>tool-1116</p>', 0, 0, 1, '2021-10-20 17:04:22', '2021-10-20 17:04:22', 0, 'tool-1116-2021-10-20-61705a265842c.scad'),
(15, 1, 'tool-1117', 'tool-1117', 'tool-1117-2021-10-20-61705b2001b76.jpg', '<p>tool-1117</p>', 0, 0, 1, '2021-10-20 17:08:32', '2021-10-20 17:08:32', 0, 'tool-1117-2021-10-20-61705b200208a.scad'),
(16, 1, 'tool-1118', 'tool-1118', 'tool-1118-2021-10-20-61705dab9c196.jpg', '<p>tool-1118</p>', 0, 0, 1, '2021-10-20 17:19:23', '2021-10-20 17:19:23', 0, 'tool-1118-2021-10-20-61705dab9c61b.scad'),
(17, 1, 'tool-1119', 'tool-1119', 'tool-1119-2021-10-20-61705df189814.jpg', '<p>tool-1119</p>', 0, 0, 1, '2021-10-20 17:20:33', '2021-10-20 17:20:33', 0, 'tool-1119-2021-10-20-61705df189cf3.scad'),
(18, 1, 'tool-1120', 'tool-1120', 'tool-1120-2021-10-20-61705e5a18f98.jpg', '<p>tool-1120</p>', 1, 0, 1, '2021-10-20 17:22:18', '2021-10-20 21:30:46', 0, 'tool-1120-2021-10-20-61705e5a194cb.scad'),
(19, 1, 'tool-1121', 'tool-1121', 'tool-1121-2021-10-20-61705ed4740f0.jpg', '<p>tool-1121</p>', 0, 0, 1, '2021-10-20 17:24:20', '2021-10-20 17:24:20', 0, 'tool-1121-2021-10-20-61705ed4745c0.scad'),
(20, 1, 'tool-1122', 'tool-1122', 'tool-1122-2021-10-20-61705f9bc1db9.jpg', '<p>tool-1122</p>', 0, 0, 1, '2021-10-20 17:27:39', '2021-10-20 17:27:39', 0, 'tool-1122-2021-10-20-61705f9bc2315.scad'),
(21, 1, 'tool-1123', 'tool-1123', 'tool-1123-2021-10-20-617061ecd392e.jpg', '<p>tool-1123</p>', 0, 0, 1, '2021-10-20 17:37:32', '2021-10-20 17:37:32', 0, 'tool-1123-2021-10-20-617061ecd3e58.scad'),
(22, 1, 'tool-1124', 'tool-1124', 'tool-1124-2021-10-20-617065c139849.jpg', '<p>tool-1124</p>', 0, 0, 1, '2021-10-20 17:53:53', '2021-10-20 17:53:53', 0, 'tool-1124-2021-10-20-617065c14065d.scad'),
(23, 1, 'tool-1125', 'tool-1125', 'tool-1125-2021-10-20-6170661727752.jpg', '<p>tool-1125</p>', 0, 0, 1, '2021-10-20 17:55:19', '2021-10-20 17:55:19', 0, 'tool-1125-2021-10-20-6170661727b0e.scad'),
(24, 1, 'tool-1126', 'tool-1126', 'tool-1126-2021-10-20-6170678aaab57.jpg', '<p>tool-1126</p>', 0, 0, 1, '2021-10-20 17:57:04', '2021-10-20 18:01:30', 0, 'tool-1126-2021-10-20-6170678aaafec.scad'),
(25, 1, 'tool-1127', 'tool-1127', 'tool-1127-2021-10-20-617067fa6157c.jpg', '<p>tool-1127</p>', 0, 0, 1, '2021-10-20 18:03:22', '2021-10-20 18:03:22', 0, 'tool-1127-2021-10-20-617067fa61b80.scad'),
(26, 1, 'tool-1129', 'tool-1129', 'tool-1129-2021-10-20-6170696d76723.jpg', '<p>tool-1129</p>', 0, 0, 1, '2021-10-20 18:09:33', '2021-10-20 18:09:33', 0, 'tool-1129-2021-10-20-6170696d76c1e.scad'),
(27, 1, 'tool-1130', 'tool-1130', 'tool-1130-2021-10-20-61706a0fa9f37.jpg', '<p>tool-1130</p>', 1, 0, 1, '2021-10-20 18:12:15', '2021-10-20 19:32:40', 0, 'tool-1130-2021-10-20-61706a0faa3cd.scad'),
(28, 1, 'tool-1131', 'tool-1131', 'tool-1131-2021-10-20-61706a5be1272.jpg', '<p>tool-1131</p>', 1, 0, 1, '2021-10-20 18:13:31', '2021-10-20 20:28:57', 0, 'tool-1131-2021-10-20-61706a5be17c6.scad'),
(29, 1, 'tool-1132', 'tool-1132', 'tool-1132-2021-10-20-61706ab2008d9.jpg', '<p>tool-1132</p>', 0, 0, 1, '2021-10-20 18:14:58', '2021-10-20 18:14:58', 0, 'tool-1132-2021-10-20-61706ab200e92.scad'),
(30, 1, 'tool-1134', 'tool-1134', 'tool-1134-2021-10-20-61706c002b0be.jpg', '<p>tool-1134</p>', 1, 0, 1, '2021-10-20 18:20:32', '2021-10-20 19:26:57', 0, 'tool-1134-2021-10-20-61706c002b588.scad'),
(31, 1, 'tool-1135', 'tool-1135', 'tool-1135-2021-10-20-61706c8819535.jpg', '<p>tool-1135</p>', 1, 0, 1, '2021-10-20 18:22:48', '2021-10-20 21:00:16', 0, 'tool-1135-2021-10-20-61706c88199ee.scad'),
(32, 1, 'tool-1136', 'tool-1136', 'tool-1136-2021-10-20-61706d2a25636.jpg', '<p>tool-1136</p>', 0, 0, 1, '2021-10-20 18:25:30', '2021-10-20 18:25:30', 0, 'tool-1136-2021-10-20-61706d2a25a9f.scad'),
(33, 1, 'tool-1137', 'tool-1137', 'tool-1137-2021-10-20-61706e80252ce.png', '<p>tool-1137</p>', 0, 0, 1, '2021-10-20 18:31:12', '2021-10-20 18:31:12', 0, 'tool-1137-2021-10-20-61706e802593a.scad'),
(34, 1, 'tool-1138', 'tool-1138', 'tool-1138-2021-10-20-61706ee8513e8.jpg', '<p>tool-1138</p>', 0, 0, 1, '2021-10-20 18:32:56', '2021-10-20 18:32:56', 0, 'tool-1138-2021-10-20-61706ee8517e2.scad'),
(36, 1, 'tool-1140', 'tool-1140', 'tool-1140-2021-10-20-61706f65b27bb.jpg', '<p>tool-1140</p>', 1, 0, 1, '2021-10-20 18:35:01', '2021-10-20 19:37:53', 0, 'tool-1140-2021-10-20-61706f65b85e0.scad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post_tag`
--

CREATE TABLE `post_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(28, 8, 1, '2021-10-20 15:54:07', '2021-10-20 15:54:07'),
(29, 8, 2, '2021-10-20 15:54:07', '2021-10-20 15:54:07'),
(30, 8, 3, '2021-10-20 15:54:07', '2021-10-20 15:54:07'),
(31, 8, 4, '2021-10-20 15:54:07', '2021-10-20 15:54:07'),
(32, 9, 1, '2021-10-20 16:29:41', '2021-10-20 16:29:41'),
(33, 9, 2, '2021-10-20 16:29:41', '2021-10-20 16:29:41'),
(34, 9, 3, '2021-10-20 16:29:41', '2021-10-20 16:29:41'),
(35, 9, 4, '2021-10-20 16:29:41', '2021-10-20 16:29:41'),
(36, 9, 5, '2021-10-20 16:29:41', '2021-10-20 16:29:41'),
(37, 9, 6, '2021-10-20 16:29:41', '2021-10-20 16:29:41'),
(38, 10, 1, '2021-10-20 16:43:18', '2021-10-20 16:43:18'),
(39, 10, 2, '2021-10-20 16:43:18', '2021-10-20 16:43:18'),
(40, 10, 3, '2021-10-20 16:43:18', '2021-10-20 16:43:18'),
(41, 10, 4, '2021-10-20 16:43:18', '2021-10-20 16:43:18'),
(42, 10, 6, '2021-10-20 16:43:18', '2021-10-20 16:43:18'),
(43, 11, 1, '2021-10-20 16:53:40', '2021-10-20 16:53:40'),
(44, 11, 2, '2021-10-20 16:53:40', '2021-10-20 16:53:40'),
(45, 11, 3, '2021-10-20 16:53:40', '2021-10-20 16:53:40'),
(46, 11, 4, '2021-10-20 16:53:40', '2021-10-20 16:53:40'),
(47, 11, 6, '2021-10-20 16:53:40', '2021-10-20 16:53:40'),
(48, 12, 1, '2021-10-20 16:54:45', '2021-10-20 16:54:45'),
(49, 12, 2, '2021-10-20 16:54:45', '2021-10-20 16:54:45'),
(50, 12, 3, '2021-10-20 16:54:45', '2021-10-20 16:54:45'),
(51, 12, 4, '2021-10-20 16:54:45', '2021-10-20 16:54:45'),
(52, 12, 5, '2021-10-20 16:54:45', '2021-10-20 16:54:45'),
(53, 12, 6, '2021-10-20 16:54:45', '2021-10-20 16:54:45'),
(54, 11, 5, '2021-10-20 16:55:11', '2021-10-20 16:55:11'),
(55, 13, 1, '2021-10-20 16:58:03', '2021-10-20 16:58:03'),
(56, 13, 2, '2021-10-20 16:58:03', '2021-10-20 16:58:03'),
(57, 13, 3, '2021-10-20 16:58:03', '2021-10-20 16:58:03'),
(58, 13, 4, '2021-10-20 16:58:03', '2021-10-20 16:58:03'),
(59, 13, 5, '2021-10-20 16:58:03', '2021-10-20 16:58:03'),
(60, 13, 6, '2021-10-20 16:58:03', '2021-10-20 16:58:03'),
(61, 14, 1, '2021-10-20 17:04:22', '2021-10-20 17:04:22'),
(62, 14, 2, '2021-10-20 17:04:22', '2021-10-20 17:04:22'),
(63, 14, 3, '2021-10-20 17:04:22', '2021-10-20 17:04:22'),
(64, 14, 4, '2021-10-20 17:04:22', '2021-10-20 17:04:22'),
(65, 14, 6, '2021-10-20 17:04:22', '2021-10-20 17:04:22'),
(66, 15, 1, '2021-10-20 17:08:32', '2021-10-20 17:08:32'),
(67, 15, 2, '2021-10-20 17:08:32', '2021-10-20 17:08:32'),
(68, 15, 3, '2021-10-20 17:08:32', '2021-10-20 17:08:32'),
(69, 15, 4, '2021-10-20 17:08:32', '2021-10-20 17:08:32'),
(70, 15, 5, '2021-10-20 17:08:32', '2021-10-20 17:08:32'),
(71, 16, 1, '2021-10-20 17:19:23', '2021-10-20 17:19:23'),
(72, 16, 2, '2021-10-20 17:19:23', '2021-10-20 17:19:23'),
(73, 16, 3, '2021-10-20 17:19:23', '2021-10-20 17:19:23'),
(74, 16, 4, '2021-10-20 17:19:23', '2021-10-20 17:19:23'),
(75, 16, 5, '2021-10-20 17:19:23', '2021-10-20 17:19:23'),
(76, 17, 1, '2021-10-20 17:20:33', '2021-10-20 17:20:33'),
(77, 17, 2, '2021-10-20 17:20:33', '2021-10-20 17:20:33'),
(78, 17, 3, '2021-10-20 17:20:33', '2021-10-20 17:20:33'),
(79, 17, 4, '2021-10-20 17:20:33', '2021-10-20 17:20:33'),
(80, 17, 5, '2021-10-20 17:20:33', '2021-10-20 17:20:33'),
(81, 18, 1, '2021-10-20 17:22:18', '2021-10-20 17:22:18'),
(82, 18, 2, '2021-10-20 17:22:18', '2021-10-20 17:22:18'),
(83, 18, 3, '2021-10-20 17:22:18', '2021-10-20 17:22:18'),
(84, 18, 4, '2021-10-20 17:22:18', '2021-10-20 17:22:18'),
(85, 18, 5, '2021-10-20 17:22:18', '2021-10-20 17:22:18'),
(86, 18, 7, '2021-10-20 17:22:18', '2021-10-20 17:22:18'),
(87, 19, 1, '2021-10-20 17:24:20', '2021-10-20 17:24:20'),
(88, 19, 2, '2021-10-20 17:24:20', '2021-10-20 17:24:20'),
(89, 19, 3, '2021-10-20 17:24:20', '2021-10-20 17:24:20'),
(90, 19, 4, '2021-10-20 17:24:20', '2021-10-20 17:24:20'),
(91, 19, 5, '2021-10-20 17:24:20', '2021-10-20 17:24:20'),
(92, 19, 6, '2021-10-20 17:24:20', '2021-10-20 17:24:20'),
(93, 19, 7, '2021-10-20 17:24:20', '2021-10-20 17:24:20'),
(94, 20, 1, '2021-10-20 17:27:39', '2021-10-20 17:27:39'),
(95, 20, 2, '2021-10-20 17:27:39', '2021-10-20 17:27:39'),
(96, 20, 3, '2021-10-20 17:27:39', '2021-10-20 17:27:39'),
(97, 20, 4, '2021-10-20 17:27:39', '2021-10-20 17:27:39'),
(98, 21, 1, '2021-10-20 17:37:32', '2021-10-20 17:37:32'),
(99, 21, 2, '2021-10-20 17:37:32', '2021-10-20 17:37:32'),
(100, 21, 3, '2021-10-20 17:37:32', '2021-10-20 17:37:32'),
(101, 21, 4, '2021-10-20 17:37:32', '2021-10-20 17:37:32'),
(102, 21, 6, '2021-10-20 17:37:32', '2021-10-20 17:37:32'),
(103, 21, 32, '2021-10-20 17:37:32', '2021-10-20 17:37:32'),
(104, 22, 8, '2021-10-20 17:53:53', '2021-10-20 17:53:53'),
(105, 22, 9, '2021-10-20 17:53:53', '2021-10-20 17:53:53'),
(106, 22, 10, '2021-10-20 17:53:53', '2021-10-20 17:53:53'),
(107, 23, 8, '2021-10-20 17:55:19', '2021-10-20 17:55:19'),
(108, 23, 9, '2021-10-20 17:55:19', '2021-10-20 17:55:19'),
(109, 23, 10, '2021-10-20 17:55:19', '2021-10-20 17:55:19'),
(110, 23, 12, '2021-10-20 17:55:19', '2021-10-20 17:55:19'),
(111, 24, 4, '2021-10-20 17:57:04', '2021-10-20 17:57:04'),
(112, 24, 33, '2021-10-20 18:01:30', '2021-10-20 18:01:30'),
(113, 24, 34, '2021-10-20 18:01:30', '2021-10-20 18:01:30'),
(114, 25, 4, '2021-10-20 18:03:22', '2021-10-20 18:03:22'),
(115, 25, 33, '2021-10-20 18:03:22', '2021-10-20 18:03:22'),
(116, 26, 33, '2021-10-20 18:09:33', '2021-10-20 18:09:33'),
(117, 27, 8, '2021-10-20 18:12:15', '2021-10-20 18:12:15'),
(118, 27, 9, '2021-10-20 18:12:15', '2021-10-20 18:12:15'),
(119, 27, 30, '2021-10-20 18:12:15', '2021-10-20 18:12:15'),
(120, 27, 31, '2021-10-20 18:12:15', '2021-10-20 18:12:15'),
(121, 28, 8, '2021-10-20 18:13:31', '2021-10-20 18:13:31'),
(122, 28, 9, '2021-10-20 18:13:31', '2021-10-20 18:13:31'),
(123, 28, 28, '2021-10-20 18:13:31', '2021-10-20 18:13:31'),
(124, 28, 29, '2021-10-20 18:13:31', '2021-10-20 18:13:31'),
(125, 28, 30, '2021-10-20 18:13:31', '2021-10-20 18:13:31'),
(126, 28, 31, '2021-10-20 18:13:31', '2021-10-20 18:13:31'),
(127, 29, 2, '2021-10-20 18:14:58', '2021-10-20 18:14:58'),
(128, 29, 3, '2021-10-20 18:14:58', '2021-10-20 18:14:58'),
(129, 29, 4, '2021-10-20 18:14:58', '2021-10-20 18:14:58'),
(130, 29, 6, '2021-10-20 18:14:58', '2021-10-20 18:14:58'),
(131, 29, 7, '2021-10-20 18:14:58', '2021-10-20 18:14:58'),
(132, 30, 2, '2021-10-20 18:20:32', '2021-10-20 18:20:32'),
(133, 30, 3, '2021-10-20 18:20:32', '2021-10-20 18:20:32'),
(134, 30, 4, '2021-10-20 18:20:32', '2021-10-20 18:20:32'),
(135, 30, 6, '2021-10-20 18:20:32', '2021-10-20 18:20:32'),
(136, 30, 7, '2021-10-20 18:20:32', '2021-10-20 18:20:32'),
(137, 31, 2, '2021-10-20 18:22:48', '2021-10-20 18:22:48'),
(138, 31, 3, '2021-10-20 18:22:48', '2021-10-20 18:22:48'),
(139, 31, 4, '2021-10-20 18:22:48', '2021-10-20 18:22:48'),
(140, 31, 6, '2021-10-20 18:22:48', '2021-10-20 18:22:48'),
(141, 31, 7, '2021-10-20 18:22:48', '2021-10-20 18:22:48'),
(142, 32, 2, '2021-10-20 18:25:30', '2021-10-20 18:25:30'),
(143, 32, 3, '2021-10-20 18:25:30', '2021-10-20 18:25:30'),
(144, 32, 7, '2021-10-20 18:25:30', '2021-10-20 18:25:30'),
(145, 32, 12, '2021-10-20 18:25:30', '2021-10-20 18:25:30'),
(146, 32, 14, '2021-10-20 18:25:30', '2021-10-20 18:25:30'),
(147, 32, 23, '2021-10-20 18:25:30', '2021-10-20 18:25:30'),
(148, 33, 2, '2021-10-20 18:31:12', '2021-10-20 18:31:12'),
(149, 33, 3, '2021-10-20 18:31:12', '2021-10-20 18:31:12'),
(150, 33, 25, '2021-10-20 18:31:12', '2021-10-20 18:31:12'),
(151, 33, 34, '2021-10-20 18:31:12', '2021-10-20 18:31:12'),
(152, 33, 35, '2021-10-20 18:31:12', '2021-10-20 18:31:12'),
(153, 33, 36, '2021-10-20 18:31:12', '2021-10-20 18:31:12'),
(154, 34, 2, '2021-10-20 18:32:56', '2021-10-20 18:32:56'),
(155, 34, 3, '2021-10-20 18:32:56', '2021-10-20 18:32:56'),
(156, 34, 4, '2021-10-20 18:32:56', '2021-10-20 18:32:56'),
(157, 34, 10, '2021-10-20 18:32:56', '2021-10-20 18:32:56'),
(158, 34, 11, '2021-10-20 18:32:56', '2021-10-20 18:32:56'),
(159, 34, 35, '2021-10-20 18:32:56', '2021-10-20 18:32:56'),
(160, 36, 5, '2021-10-20 18:35:01', '2021-10-20 18:35:01'),
(161, 36, 7, '2021-10-20 18:35:01', '2021-10-20 18:35:01'),
(162, 36, 37, '2021-10-20 18:36:24', '2021-10-20 18:36:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post_user`
--

CREATE TABLE `post_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', NULL, NULL),
(2, 'User', 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tipo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `created_at`, `updated_at`, `tipo`, `descripcion`) VALUES
(1, 'name', 'name', '2021-10-03 05:09:21', '2021-10-03 05:09:21', 'text', 'un nombre'),
(2, 'height', 'height', '2021-10-03 05:10:48', '2021-10-03 05:10:48', 'number', 'un alto'),
(3, 'long', 'long', '2021-10-03 05:11:12', '2021-10-03 05:11:12', 'number', 'una longuitud'),
(4, 'thicknessb', 'thicknessb', '2021-10-03 05:11:40', '2021-10-03 05:11:40', 'number', 'no se que es pero decia 7'),
(5, 'thicknessn', 'thicknessn', '2021-10-03 05:12:08', '2021-10-03 05:12:08', 'number', 'tampoco se que es pero decia 2'),
(6, 'font', 'font', '2021-10-03 05:13:50', '2021-10-03 05:13:50', 'select', 'selecciona una fuente'),
(7, 'text1', 'text1', '2021-10-03 05:14:52', '2021-10-03 05:14:52', 'text', 'pues un texto'),
(8, 'x', 'x', '2021-10-03 05:15:30', '2021-10-03 05:15:30', 'number', 'eje x'),
(9, 'z', 'z', '2021-10-03 05:15:52', '2021-10-03 05:15:52', 'number', 'eje z'),
(10, 'hoyo_agua', 'hoyo-agua', '2021-10-03 05:16:14', '2021-10-03 05:16:14', 'number', 'hoyos en el agua.!???'),
(11, 'hoyos', 'hoyos', '2021-10-03 05:16:39', '2021-10-03 05:16:39', 'number', 'cantidad de hoyos sera.!???'),
(12, 'dist_pared', 'dist-pared', '2021-10-03 05:17:15', '2021-10-03 20:34:54', 'number', 'sera distancia de pared??'),
(14, 'thicknes', 'thicknes', '2021-10-03 05:19:45', '2021-10-03 20:34:05', 'number', 'no se que es un thickness'),
(23, 'dist_base', 'dist-base', '2021-10-03 17:27:53', '2021-10-20 18:26:22', 'number', 'cosa distancia creo'),
(24, 'svg', 'svg', '2021-10-03 17:33:29', '2021-10-19 21:52:07', 'file', 'subir un archivo svg'),
(25, 'letter', 'letter', '2021-10-03 17:34:03', '2021-10-03 17:34:03', 'text', 'Letra de el diseño'),
(27, 'long', 'long', '2021-10-03 20:12:21', '2021-10-03 20:12:21', 'number', 'longitud'),
(28, 'base', 'base', '2021-10-03 20:12:49', '2021-10-03 20:12:49', 'number', 'tmaño de la base'),
(29, 'split', 'split', '2021-10-03 20:19:13', '2021-10-03 20:19:13', 'number', 'split'),
(30, 'k', 'k', '2021-10-03 20:19:51', '2021-10-03 20:19:51', 'file', 'archivo svg'),
(31, 'y', 'y', '2021-10-03 20:21:27', '2021-10-03 20:21:27', 'number', 'eje y???'),
(32, 'text2', 'text2', '2021-10-20 17:35:45', '2021-10-20 17:35:45', 'text', 'texto 2'),
(33, 'sc', 'sc', '2021-10-20 17:58:29', '2021-10-20 17:58:29', 'file', 'ondas spotyfy en svg'),
(34, 'thicknessc', 'thicknessc', '2021-10-20 17:59:37', '2021-10-20 17:59:37', 'number', 'thicknessc'),
(35, 'dist_p', 'dist-p', '2021-10-20 18:28:04', '2021-10-20 18:28:04', 'number', 'dist_p'),
(36, 'dist_b', 'dist-b', '2021-10-20 18:28:58', '2021-10-20 18:28:58', 'number', 'dist_p'),
(37, 'dist', 'dist', '2021-10-20 18:35:31', '2021-10-20 18:35:31', 'number', 'dist');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) DEFAULT '2',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `about` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fecha_nacimiento` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genero` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `username`, `email`, `email_verified_at`, `password`, `image`, `about`, `remember_token`, `created_at`, `updated_at`, `fecha_nacimiento`, `genero`) VALUES
(1, 1, 'Mehedi Hasan', 'admin', 'admin@gmail.com', NULL, '$2y$10$onVn66oLODHhcVhgfTj/he5exeglpU4.eNiRJeZD0Z6F3otQdxiJS', 'mehedi-hasan-2021-10-18-616e313c8472f.jpg', 'Soy el Administrador mas cool', 'mHWLWnp8X5Rz6R0scznCikik1jq8Gm4tQxBNa5C0uNnLIJAhHgMsent93BSO', NULL, '2021-10-19 01:45:16', '2021-09-19', '3'),
(2, 2, 'Zannatun Nyma', 'author', 'author@gmail.com', NULL, '$2y$10$PMOIXtW30wSem4cRAkjZxO8a8mQrSNRAWbK8yiMCjj3LcxZjMFMUi', 'default.png', NULL, 'hWHVSqaWXlYmbvt7pqNdpMBcPyhiAziKd4feznWLNJB5j8EXBd87zNV4BtTM', NULL, NULL, '2021-09-19', '3'),
(3, 1, 'Luis Arroyo', 'Lajy', 'master.angelus.1@gmail.com', NULL, '$2y$10$oRpdODFtSDp/B2uCNlmEVup0Zp7bQp.qyqWxSs8Dk/R4EiGySwZKK', 'default.png', NULL, '9sSQspaaW8GrLsrGcZ90a0SgIgq9v9Av37zAVs5WspXWUVgKauX01AJU4IIY', '2021-10-02 21:54:55', '2021-10-02 21:54:55', '1995-02-23', '3'),
(9, 2, NULL, 'prueba', 'prueba@gmail.com', NULL, '$2y$10$nlHFKhdYvJyFo6l.HsH32O2TS5G2mFH/OkV04BPQjVwnSlgvdmp5O', 'default.png', NULL, NULL, '2021-10-15 06:49:23', '2021-10-15 06:49:23', '2021-10-02', '2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `category_post`
--
ALTER TABLE `category_post`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `post_user`
--
ALTER TABLE `post_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_user_post_id_foreign` (`post_id`),
  ADD KEY `post_user_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `category_post`
--
ALTER TABLE `category_post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;
--
-- AUTO_INCREMENT de la tabla `post_user`
--
ALTER TABLE `post_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `post_user`
--
ALTER TABLE `post_user`
  ADD CONSTRAINT `post_user_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
