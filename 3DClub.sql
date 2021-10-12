-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 12-10-2021 a las 18:15:36
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
(1, 3, '3D Art', '3d-art', '3d-art-2021-10-02-6158c0cd9840f.png', '<p>&nbsp;arte en 3d que no te puedes perder.!</p>', 0, 1, 1, '2021-10-03 00:27:57', '2021-10-03 00:27:57', 1, NULL),
(2, 3, 'Nuestros Precios', 'nuestros-precios', 'nuestros-precios-2021-10-02-6158c16d623bb.png', '<p>Con los mejores precios del mercado</p>', 0, 1, 1, '2021-10-03 00:30:37', '2021-10-03 00:30:37', 1, NULL),
(3, 3, '1111', '1111', '1111-2021-10-03-6159e26047c1c.jpg', '<p>Nombre en un rectangulo solido</p>', 2, 0, 1, '2021-10-03 21:03:28', '2021-10-12 07:04:53', 0, '1111-2021-10-03-6159e260484b5.scad'),
(4, 3, 'cosa', 'cosa', 'cosa-2021-10-04-615a5932e8e97.jpg', '<p style=\"text-align: center;\">gcfytcjgcdtzxgvhb</p>', 2, 0, 1, '2021-10-04 05:30:27', '2021-10-12 03:45:33', 0, 'cosa-2021-10-04-615a593308dc9.scad'),
(5, 3, 'una prueba para ver 1117', 'una-prueba-para-ver-1117', 'una-prueba-para-ver-1117-2021-10-12-6164f5178cb68.jpg', '<p>1117</p>', 2, 0, 1, '2021-10-12 06:38:16', '2021-10-12 19:43:32', 0, 'una-prueba-para-ver-1117-2021-10-12-6164f5179e122.scad'),
(6, 3, 'otra prueba', 'otra-prueba', 'otra-prueba-2021-10-12-6165b1f253f0b.jpg', '<p>todas estas pruebas se deben borrar</p>', 0, 0, 1, '2021-10-12 20:04:02', '2021-10-12 20:04:02', 0, 'otra-prueba-2021-10-12-6165b1f25a4e3.scad');

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
(1, 3, 1, '2021-10-03 21:03:28', '2021-10-03 21:03:28'),
(2, 3, 2, '2021-10-03 21:03:28', '2021-10-03 21:03:28'),
(3, 3, 3, '2021-10-03 21:03:28', '2021-10-03 21:03:28'),
(4, 3, 4, '2021-10-03 21:03:28', '2021-10-03 21:03:28'),
(5, 3, 5, '2021-10-03 21:03:28', '2021-10-03 21:03:28'),
(6, 3, 6, '2021-10-03 21:03:28', '2021-10-03 21:03:28'),
(7, 4, 1, '2021-10-04 05:30:28', '2021-10-04 05:30:28'),
(8, 4, 2, '2021-10-04 05:30:28', '2021-10-04 05:30:28'),
(9, 4, 3, '2021-10-04 05:30:28', '2021-10-04 05:30:28'),
(10, 4, 4, '2021-10-04 05:30:28', '2021-10-04 05:30:28'),
(11, 4, 5, '2021-10-04 05:30:28', '2021-10-04 05:30:28'),
(12, 4, 6, '2021-10-04 05:30:28', '2021-10-04 05:30:28'),
(13, 4, 28, '2021-10-04 05:30:28', '2021-10-04 05:30:28'),
(14, 5, 1, '2021-10-12 06:38:16', '2021-10-12 06:38:16'),
(15, 5, 2, '2021-10-12 06:38:16', '2021-10-12 06:38:16'),
(16, 5, 3, '2021-10-12 06:38:16', '2021-10-12 06:38:16'),
(17, 5, 5, '2021-10-12 06:38:16', '2021-10-12 06:38:16'),
(18, 5, 6, '2021-10-12 06:38:16', '2021-10-12 06:38:16'),
(19, 6, 2, '2021-10-12 20:04:02', '2021-10-12 20:04:02'),
(20, 6, 3, '2021-10-12 20:04:02', '2021-10-12 20:04:02'),
(21, 6, 5, '2021-10-12 20:04:02', '2021-10-12 20:04:02'),
(22, 6, 7, '2021-10-12 20:04:02', '2021-10-12 20:04:02');

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
(7, 'text1', 'text1', '2021-10-03 05:14:52', '2021-10-03 05:14:52', 'tetx', 'pues un texto'),
(8, 'x', 'x', '2021-10-03 05:15:30', '2021-10-03 05:15:30', 'number', 'eje x'),
(9, 'z', 'z', '2021-10-03 05:15:52', '2021-10-03 05:15:52', 'number', 'eje z'),
(10, 'hoyo_agua', 'hoyo-agua', '2021-10-03 05:16:14', '2021-10-03 05:16:14', 'number', 'hoyos en el agua.!???'),
(11, 'hoyos', 'hoyos', '2021-10-03 05:16:39', '2021-10-03 05:16:39', 'number', 'cantidad de hoyos sera.!???'),
(12, 'dist_pared', 'dist-pared', '2021-10-03 05:17:15', '2021-10-03 20:34:54', 'number', 'sera distancia de pared??'),
(14, 'thicknes', 'thicknes', '2021-10-03 05:19:45', '2021-10-03 20:34:05', 'number', 'no se que es un thickness'),
(23, 'dist_', 'dist', '2021-10-03 17:27:53', '2021-10-03 17:27:53', 'number', 'cosa distancia creo'),
(24, 'sc', 'sc', '2021-10-03 17:33:29', '2021-10-03 17:33:29', 'file', 'subir un archivo'),
(25, 'letter', 'letter', '2021-10-03 17:34:03', '2021-10-03 17:34:03', 'text', 'Letra de el diseño'),
(27, 'long', 'long', '2021-10-03 20:12:21', '2021-10-03 20:12:21', 'number', 'longitud'),
(28, 'base', 'base', '2021-10-03 20:12:49', '2021-10-03 20:12:49', 'number', 'tmaño de la base'),
(29, 'split', 'split', '2021-10-03 20:19:13', '2021-10-03 20:19:13', 'number', 'split'),
(30, 'k', 'k', '2021-10-03 20:19:51', '2021-10-03 20:19:51', 'file', 'archivo svg'),
(31, 'y', 'y', '2021-10-03 20:21:27', '2021-10-03 20:21:27', 'number', 'eje y???');

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
(1, 1, 'Mehedi Hasan', 'admin', 'admin@gmail.com', NULL, '$2y$10$onVn66oLODHhcVhgfTj/he5exeglpU4.eNiRJeZD0Z6F3otQdxiJS', 'default.png', NULL, NULL, NULL, NULL, '2021-09-19', '3'),
(2, 2, 'Zannatun Nyma', 'author', 'author@gmail.com', NULL, '$2y$10$PMOIXtW30wSem4cRAkjZxO8a8mQrSNRAWbK8yiMCjj3LcxZjMFMUi', 'default.png', NULL, 'Zhor8JBKHvz61VQHjPJL0GE0gFoNi2ZsuXNswXCtZivGfCE39rXNOvfwt6CI', NULL, NULL, '2021-09-19', '3'),
(3, 1, 'Luis Arroyo', 'Lajy', 'master.angelus.1@gmail.com', NULL, '$2y$10$oRpdODFtSDp/B2uCNlmEVup0Zp7bQp.qyqWxSs8Dk/R4EiGySwZKK', 'default.png', NULL, '9sSQspaaW8GrLsrGcZ90a0SgIgq9v9Av37zAVs5WspXWUVgKauX01AJU4IIY', '2021-10-02 21:54:55', '2021-10-02 21:54:55', '1995-02-23', '3');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
