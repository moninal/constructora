-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-10-2023 a las 00:26:37
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `constructora`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `idactividad` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`idactividad`, `descripcion`) VALUES
(1, 'SOLICITAR APROBACION PARA ACCESO DE CAMINO'),
(3, 'TRASPASO DE TITULARIDAD'),
(4, 'RECTIFICACIÓN DE ÁREA'),
(5, 'CONTINUIDAD DE TRAMITES'),
(6, 'DESMEBRACIÓN DE PREDIOS'),
(7, 'INMATRIULACIÓN DE PREDIOS'),
(8, 'RECTIFICACIÓN DE ÁREA Y SUBDIVISIÓN DE PREDIOS'),
(9, 'SUBDIVISIÓN DE PREDIOS'),
(10, 'ACUMULACIÓN DE PREDIOS'),
(11, 'SUBDIVIÓN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alquiler`
--

CREATE TABLE `alquiler` (
  `idalquiler` int(11) NOT NULL,
  `idequipo` int(11) NOT NULL,
  `entrega` varchar(250) NOT NULL,
  `fechaalquiler` date NOT NULL,
  `fechaentrega` date NOT NULL,
  `totaldias` int(11) NOT NULL,
  `dias` varchar(500) NOT NULL,
  `montopago` decimal(10,2) NOT NULL,
  `montoadelanto` decimal(10,2) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 0 COMMENT 'activo:0 inactivo=1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alquiler`
--

INSERT INTO `alquiler` (`idalquiler`, `idequipo`, `entrega`, `fechaalquiler`, `fechaentrega`, `totaldias`, `dias`, `montopago`, `montoadelanto`, `estado`) VALUES
(12, 3, 'JOSESITO BUENO', '2023-09-14', '2023-09-16', 4, '2023-09-15, 2023-09-18, 2023-09-19, 2023-09-20', 220.00, 100.00, 1),
(13, 4, 'pedrito el escamoso', '2023-09-14', '2023-09-29', 6, '2023-09-21, 2023-09-22, 2023-09-26, 2023-09-25, 2023-09-27, 2023-09-28', 170.00, 10.00, 0),
(14, 2, 'JOSESITO BUENO', '2023-09-15', '2023-10-07', 14, '2023-09-18, 2023-09-25, 2023-09-27, 2023-09-28, 2023-09-29, 2023-09-30, 2023-09-23, 2023-09-22, 2023-09-21, 2023-09-20, 2023-09-19, 2023-09-26, 2023-09-17, 2023-09-24', 1100.00, 20.00, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cabadelanto`
--

CREATE TABLE `cabadelanto` (
  `idadelanto` int(11) NOT NULL,
  `idalquiler` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `fechareg` date NOT NULL,
  `glosa` varchar(500) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 0 COMMENT 'activo:0 inactivo:1 cancelado:2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cabadelanto`
--

INSERT INTO `cabadelanto` (`idadelanto`, `idalquiler`, `total`, `fechareg`, `glosa`, `estado`) VALUES
(2, 12, 320.00, '2023-09-14', '', 1),
(3, 13, 180.00, '2023-09-16', 'FALTA UN DIA', 2),
(4, 14, 1120.00, '2023-09-15', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `idciudad` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 0 COMMENT '0:activo 1:inactivo\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`idciudad`, `descripcion`, `estado`) VALUES
(1, 'LA BANDA DE SHILCAYO', 0),
(3, 'MORALES', 0),
(4, 'SAN ROQUE', 0),
(5, 'SAN ANTONIO DE CUMBAZA', 0),
(6, 'UNION', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detadelanto`
--

CREATE TABLE `detadelanto` (
  `iddetadelanto` int(11) NOT NULL,
  `idadelanto` int(11) NOT NULL,
  `fechareg` date NOT NULL,
  `monto` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detadelanto`
--

INSERT INTO `detadelanto` (`iddetadelanto`, `idadelanto`, `fechareg`, `monto`) VALUES
(18, 2, '2023-09-15', 80.00),
(19, 2, '2023-09-15', 93.00),
(20, 2, '2023-09-15', 94.00),
(23, 4, '2023-09-16', 80.00),
(28, 2, '2023-09-16', 13.00),
(29, 2, '2023-09-16', 40.00),
(44, 3, '2023-09-16', 10.00),
(45, 3, '2023-09-16', 170.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detproyecto`
--

CREATE TABLE `detproyecto` (
  `iddetproyecto` int(11) NOT NULL,
  `idproyecto` int(11) NOT NULL,
  `idactividad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detproyecto`
--

INSERT INTO `detproyecto` (`iddetproyecto`, `idproyecto`, `idactividad`) VALUES
(23, 3, 3),
(24, 3, 4),
(25, 3, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `idequipo` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `monto` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`idequipo`, `descripcion`, `monto`) VALUES
(2, 'EQUIPO 01 WK0084', 80.00),
(3, 'EQUIPO 02 WK0085', 80.00),
(4, 'NIVEL', 30.00);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('andyvasquezmahoma@gmail.com', '$2y$10$Yo5VA10LUK5s3pg9E7oDHO7dLV7VE2rP0UGrwN2HA1Ht3PANmjE1e', '2022-09-01 21:40:29'),
('andyvasquezmahoma@gmail.com', '$2y$10$Yo5VA10LUK5s3pg9E7oDHO7dLV7VE2rP0UGrwN2HA1Ht3PANmjE1e', '2022-09-01 21:40:29');

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
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `idproyecto` int(11) NOT NULL,
  `propietario` varchar(200) NOT NULL,
  `idciudad` int(11) NOT NULL,
  `idactividad` int(11) DEFAULT NULL,
  `detalleactividad` varchar(700) DEFAULT NULL,
  `detalleavance` varchar(700) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 0 COMMENT '0:pendiente 1:terminado 2: inactivo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`idproyecto`, `propietario`, `idciudad`, `idactividad`, `detalleactividad`, `detalleavance`, `estado`) VALUES
(3, 'PENA, JOSE', 1, NULL, 'asd', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `tipo`) VALUES
(1, 'andy vasquez mahoma', 'andyvasquezmahoma@gmail.com', NULL, '$2y$10$qy2jUmNslYETwxsvTOyiJuoGIykRtvKv7Fc0N4Dcvdilck.PeuoX.', 'zAxn5k1P6HwUFOsMh8FU8iFYFWPaIF5hDPrrvzOPGPw6LdY4SpT5m3jdMm32', '2022-09-01 21:39:48', '2022-09-01 21:39:48', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`idactividad`);

--
-- Indices de la tabla `alquiler`
--
ALTER TABLE `alquiler`
  ADD PRIMARY KEY (`idalquiler`),
  ADD KEY `idequipo_alquiler_equipo` (`idequipo`);

--
-- Indices de la tabla `cabadelanto`
--
ALTER TABLE `cabadelanto`
  ADD PRIMARY KEY (`idadelanto`),
  ADD KEY `idalquiler_alquiler_cabadelanto` (`idalquiler`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`idciudad`);

--
-- Indices de la tabla `detadelanto`
--
ALTER TABLE `detadelanto`
  ADD PRIMARY KEY (`iddetadelanto`),
  ADD KEY `idadelanto_cabadelanto_detadelanto` (`idadelanto`);

--
-- Indices de la tabla `detproyecto`
--
ALTER TABLE `detproyecto`
  ADD PRIMARY KEY (`iddetproyecto`),
  ADD KEY `idproyecto_proyecto_detproyecto` (`idproyecto`),
  ADD KEY `idactividad_actividad_detproyecto` (`idactividad`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`idequipo`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`idproyecto`),
  ADD KEY `idciudad_ciudad_proyecto` (`idciudad`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `idactividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `alquiler`
--
ALTER TABLE `alquiler`
  MODIFY `idalquiler` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `cabadelanto`
--
ALTER TABLE `cabadelanto`
  MODIFY `idadelanto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `idciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `detadelanto`
--
ALTER TABLE `detadelanto`
  MODIFY `iddetadelanto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `detproyecto`
--
ALTER TABLE `detproyecto`
  MODIFY `iddetproyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `idequipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `idproyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alquiler`
--
ALTER TABLE `alquiler`
  ADD CONSTRAINT `idequipo_alquiler_equipo` FOREIGN KEY (`idequipo`) REFERENCES `equipo` (`idequipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cabadelanto`
--
ALTER TABLE `cabadelanto`
  ADD CONSTRAINT `idalquiler_alquiler_cabadelanto` FOREIGN KEY (`idalquiler`) REFERENCES `alquiler` (`idalquiler`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detadelanto`
--
ALTER TABLE `detadelanto`
  ADD CONSTRAINT `idadelanto_cabadelanto_detadelanto` FOREIGN KEY (`idadelanto`) REFERENCES `cabadelanto` (`idadelanto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detproyecto`
--
ALTER TABLE `detproyecto`
  ADD CONSTRAINT `idactividad_actividad_detproyecto` FOREIGN KEY (`idactividad`) REFERENCES `actividad` (`idactividad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idproyecto_proyecto_detproyecto` FOREIGN KEY (`idproyecto`) REFERENCES `proyecto` (`idproyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD CONSTRAINT `idactividad_actividad_proyecto` FOREIGN KEY (`idactividad`) REFERENCES `actividad` (`idactividad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idciudad_ciudad_proyecto` FOREIGN KEY (`idciudad`) REFERENCES `ciudad` (`idciudad`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
