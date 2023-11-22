-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 23-10-2023 a las 21:03:24
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `consultoria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idiomas`
--

CREATE TABLE `idiomas` (
  `id_idioma` bigint(20) UNSIGNED NOT NULL,
  `nombre_idioma` varchar(255) NOT NULL,
  `imagen_idioma` varchar(255) DEFAULT NULL,
  `tipo_idioma` enum('NATIVO','EXTRANJERO') NOT NULL,
  `estado_idioma` enum('ACTIVO','INACTIVO','ELIMINADO') NOT NULL DEFAULT 'ACTIVO',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `idiomas`
--

INSERT INTO `idiomas` (`id_idioma`, `nombre_idioma`, `imagen_idioma`, `tipo_idioma`, `estado_idioma`, `created_at`, `updated_at`) VALUES
(1, 'AYMARA', '1698033326.png', 'NATIVO', 'ACTIVO', '2023-10-23 03:48:22', '2023-10-23 07:55:26'),
(2, 'INGLES', '1698033365.jpg', 'EXTRANJERO', 'ACTIVO', '2023-10-23 03:48:22', '2023-10-23 07:56:05'),
(3, 'CASTELLANO', '1698033399.jpg', 'EXTRANJERO', 'ACTIVO', '2023-10-23 03:48:22', '2023-10-23 07:56:39'),
(4, 'QUECHUA', '1698033422.png', 'NATIVO', 'ACTIVO', '2023-10-23 03:48:22', '2023-10-23 07:57:02'),
(5, 'CHINO MANDARIN', '1698033452.jpg', 'EXTRANJERO', 'ACTIVO', '2023-10-23 03:48:22', '2023-10-23 07:57:32'),
(6, 'PORTUGUES', '1698033479.png', 'EXTRANJERO', 'ACTIVO', '2023-10-23 03:48:22', '2023-10-23 07:57:59'),
(7, 'FRANCES', '1698033510.jpg', 'EXTRANJERO', 'ACTIVO', '2023-10-23 03:48:22', '2023-10-23 07:58:30'),
(8, 'ITALIANO', '1698033543.png', 'EXTRANJERO', 'ACTIVO', '2023-10-23 03:48:22', '2023-10-23 07:59:03'),
(9, 'ALEMAN', '1698033566.png', 'EXTRANJERO', 'ACTIVO', '2023-10-23 03:48:22', '2023-10-23 07:59:26'),
(10, 'GUARANI', '1698033628.png', 'NATIVO', 'ACTIVO', '2023-10-23 03:48:22', '2023-10-23 08:00:28'),
(11, 'URU PUKINA', '1698033621.png', 'NATIVO', 'ACTIVO', '2023-10-23 03:48:22', '2023-10-23 08:00:21'),
(12, 'RUSO', '1698033613.png', 'EXTRANJERO', 'ACTIVO', '2023-10-23 03:48:22', '2023-10-23 08:00:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_10_02_023440_create_roles_table', 1),
(5, '2023_10_02_023505_create_idiomas_table', 1),
(6, '2023_10_02_023507_create_users_table', 1),
(7, '2023_10_11_014351_create_solicituds_table', 1),
(8, '2023_10_11_014910_create_pagos_table', 1),
(9, '2023_10_11_014934_create_solicitud_pagos_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id_pago` bigint(20) UNSIGNED NOT NULL,
  `nombre_pago` varchar(255) NOT NULL,
  `descripcion_pago` varchar(255) NOT NULL,
  `tipo_pago` enum('EFECTIVO','DEPOSITO','TRANSFERENCIA') NOT NULL,
  `info_numero_pago` varchar(255) DEFAULT NULL,
  `numero_pago` varchar(255) DEFAULT NULL,
  `qr_imagen_pago` varchar(255) DEFAULT NULL,
  `estado_pago` enum('ACTIVO','INACTIVO','ELIMINADO') NOT NULL DEFAULT 'ACTIVO',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id_pago`, `nombre_pago`, `descripcion_pago`, `tipo_pago`, `info_numero_pago`, `numero_pago`, `qr_imagen_pago`, `estado_pago`, `created_at`, `updated_at`) VALUES
(1, 'Pago por oficina', 'Dirigirse a la oficina de traducion de Idiomas', 'EFECTIVO', NULL, NULL, NULL, 'ACTIVO', '2023-10-23 03:48:22', '2023-10-23 08:00:52'),
(2, 'Deposito bancario', 'Deposito por Banco union', 'DEPOSITO', 'Nombres Paterno Materno CI: 11111111', '100000000000000000', NULL, 'ACTIVO', '2023-10-23 08:01:31', '2023-10-23 08:01:31'),
(3, 'Pago QR', 'Transferencia bancaria por QR', 'TRANSFERENCIA', NULL, NULL, '1698033726.png', 'ACTIVO', '2023-10-23 08:02:06', '2023-10-23 08:02:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_role` bigint(20) UNSIGNED NOT NULL,
  `nombre_rol` varchar(255) NOT NULL,
  `estado_rol` enum('ACTIVO','INACTIVO','ELIMINADO') NOT NULL DEFAULT 'ACTIVO',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_role`, `nombre_rol`, `estado_rol`, `created_at`, `updated_at`) VALUES
(1, 'ADMINISTRADOR', 'ACTIVO', '2023-10-23 03:48:22', '2023-10-23 03:48:22'),
(2, 'COORDINADOR', 'ACTIVO', '2023-10-23 03:48:22', '2023-10-23 03:48:22'),
(3, 'TRADUCTOR', 'ACTIVO', '2023-10-23 03:48:22', '2023-10-23 03:48:22'),
(4, 'USUARIO', 'ACTIVO', '2023-10-23 03:48:22', '2023-10-23 03:48:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicituds`
--

CREATE TABLE `solicituds` (
  `id_solicitud` bigint(20) UNSIGNED NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_asignado` bigint(20) UNSIGNED DEFAULT NULL,
  `id_idioma` bigint(20) UNSIGNED NOT NULL,
  `codigo_solicitud` varchar(255) DEFAULT NULL,
  `titulo_solicitud` varchar(255) NOT NULL,
  `descripcion_solicitud` text NOT NULL,
  `documento_solicitud` varchar(255) NOT NULL,
  `documento_solicitud_fin` varchar(255) DEFAULT NULL,
  `descripcion_solicitud_fin` text DEFAULT NULL,
  `estado_solicitud` enum('ACTIVO','INACTIVO','ELIMINADO','ENTREGADO','CANCELADO') NOT NULL DEFAULT 'ACTIVO',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `solicituds`
--

INSERT INTO `solicituds` (`id_solicitud`, `id`, `id_asignado`, `id_idioma`, `codigo_solicitud`, `titulo_solicitud`, `descripcion_solicitud`, `documento_solicitud`, `documento_solicitud_fin`, `descripcion_solicitud_fin`, `estado_solicitud`, `created_at`, `updated_at`) VALUES
(1, 4, 3, 1, NULL, 'Traduccion a Aymara', 'Aymara', '1698035033.pdf', NULL, NULL, 'ACTIVO', '2023-10-23 08:23:53', '2023-10-23 08:25:51'),
(2, 4, 3, 2, NULL, 'Traduccion a Ingles', 'Ingles', '1698035044.pdf', '1698035534.pdf', 'Traduccion Ingles', 'ENTREGADO', '2023-10-23 08:24:04', '2023-10-23 08:32:14'),
(3, 4, NULL, 4, NULL, 'Traduccion a Quechua', 'Quechua', '1698035089.pdf', NULL, NULL, 'ACTIVO', '2023-10-23 08:24:49', '2023-10-23 22:49:06'),
(4, 4, 3, 6, NULL, 'Traduccion a Portugues', 'Portugues', '1698086785.pdf', NULL, NULL, 'ACTIVO', '2023-10-23 22:46:25', '2023-10-23 23:01:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_pagos`
--

CREATE TABLE `solicitud_pagos` (
  `id_solicitud_pagos` bigint(20) UNSIGNED NOT NULL,
  `id_solicitud` bigint(20) UNSIGNED NOT NULL,
  `id_pago` bigint(20) UNSIGNED DEFAULT NULL,
  `comprobante_pago` varchar(255) DEFAULT NULL,
  `estado` enum('PAGADO','PENDIENTE') NOT NULL DEFAULT 'PENDIENTE',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `solicitud_pagos`
--

INSERT INTO `solicitud_pagos` (`id_solicitud_pagos`, `id_solicitud`, `id_pago`, `comprobante_pago`, `estado`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'EFECTIVO', 'PENDIENTE', '2023-10-23 08:23:53', '2023-10-23 08:36:14'),
(2, 2, NULL, NULL, 'PENDIENTE', '2023-10-23 08:24:04', '2023-10-23 08:24:04'),
(3, 3, NULL, NULL, 'PENDIENTE', '2023-10-23 08:24:49', '2023-10-23 08:24:49'),
(4, 4, 2, '1698087730.png', 'PAGADO', '2023-10-23 22:46:25', '2023-10-23 23:02:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_role` bigint(20) UNSIGNED NOT NULL,
  `ci` varchar(255) NOT NULL,
  `expedido` varchar(255) NOT NULL,
  `paterno` varchar(255) NOT NULL,
  `materno` varchar(255) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `estado_civil` varchar(255) NOT NULL,
  `profesion` varchar(255) NOT NULL,
  `imagen_perfil` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('ACTIVO','INACTIVO','ELIMINADO') NOT NULL DEFAULT 'ACTIVO',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `id_role`, `ci`, `expedido`, `paterno`, `materno`, `nombres`, `fecha_nacimiento`, `email`, `estado_civil`, `profesion`, `imagen_perfil`, `username`, `password`, `status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '12345678', 'LP', 'Admin', 'Admin', 'Admin', '2001-12-01', 'admin@gmail.com', 'CASADO/A', 'DEV', '1698034737.png', 'admin', '$2y$10$WBxNbOxkvno6.kHMb1z/nuMHcQSByNtt.KZaYI92A32rkWncO0Zae', 'ACTIVO', NULL, '2023-10-23 03:48:22', '2023-10-23 08:18:57', NULL),
(2, 2, '11111111', 'LP', 'Paterno', 'Materno', 'Coordinador', '1999-01-01', 'coordinador@gmail.com', 'CASADO/A', 'Lic en Idiomas', NULL, 'coordinador', '$2y$10$oYYLzLGyjasNQOfuorqkau4LpbQkmxPN54lsTmGMqAFLB99kwP6p6', 'ACTIVO', NULL, '2023-10-23 07:51:53', '2023-10-23 07:51:53', NULL),
(3, 3, '22222222', 'LP', 'Paterno', 'Materno', 'Traductor', '1998-01-01', 'traductor@gmail.com', 'SOLTERO/A', 'Lic en Idiomas', NULL, 'traductor', '$2y$10$TxAZ40cd.HV6IdN1v6SCu.nQsjZ3fFLtci2QAukJnglHl5xHDMTAq', 'ACTIVO', NULL, '2023-10-23 07:52:36', '2023-10-23 08:06:50', NULL),
(4, 4, '33333333', 'LP', 'Paterno', 'Materno', 'Usuario', '1997-01-01', 'usuario@gmail.com', 'SOLTERO/A', 'Estudiante', NULL, 'usuario', '$2y$10$qmMFENjNLM5ydhXK9bNvleoOH1TA3yCXICNDev55IytVDRdzD3f/a', 'ACTIVO', NULL, '2023-10-23 07:54:24', '2023-10-23 07:54:50', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `idiomas`
--
ALTER TABLE `idiomas`
  ADD PRIMARY KEY (`id_idioma`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id_pago`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Indices de la tabla `solicituds`
--
ALTER TABLE `solicituds`
  ADD PRIMARY KEY (`id_solicitud`),
  ADD UNIQUE KEY `solicituds_codigo_solicitud_unique` (`codigo_solicitud`),
  ADD KEY `solicituds_id_foreign` (`id`),
  ADD KEY `solicituds_id_asignado_foreign` (`id_asignado`),
  ADD KEY `solicituds_id_idioma_foreign` (`id_idioma`);

--
-- Indices de la tabla `solicitud_pagos`
--
ALTER TABLE `solicitud_pagos`
  ADD PRIMARY KEY (`id_solicitud_pagos`),
  ADD KEY `solicitud_pagos_id_solicitud_foreign` (`id_solicitud`),
  ADD KEY `solicitud_pagos_id_pago_foreign` (`id_pago`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_ci_unique` (`ci`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_id_role_foreign` (`id_role`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `idiomas`
--
ALTER TABLE `idiomas`
  MODIFY `id_idioma` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_pago` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `solicituds`
--
ALTER TABLE `solicituds`
  MODIFY `id_solicitud` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `solicitud_pagos`
--
ALTER TABLE `solicitud_pagos`
  MODIFY `id_solicitud_pagos` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `solicituds`
--
ALTER TABLE `solicituds`
  ADD CONSTRAINT `solicituds_id_asignado_foreign` FOREIGN KEY (`id_asignado`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `solicituds_id_foreign` FOREIGN KEY (`id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `solicituds_id_idioma_foreign` FOREIGN KEY (`id_idioma`) REFERENCES `idiomas` (`id_idioma`);

--
-- Filtros para la tabla `solicitud_pagos`
--
ALTER TABLE `solicitud_pagos`
  ADD CONSTRAINT `solicitud_pagos_id_pago_foreign` FOREIGN KEY (`id_pago`) REFERENCES `pagos` (`id_pago`),
  ADD CONSTRAINT `solicitud_pagos_id_solicitud_foreign` FOREIGN KEY (`id_solicitud`) REFERENCES `solicituds` (`id_solicitud`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
