-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-04-2017 a las 21:55:44
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fallosdepartamentos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('administrador', '1', 1490991347);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('administrador', 1, 'Administrador principal del sitio. Jefe de TICS.', NULL, NULL, 1490991338, 1491074230),
('usuarios-departamentos', 1, 'Todos los usuarios de los departamentos que tienen permitido acceder al sistema.', NULL, NULL, 1491074211, 1491074211);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('administrador', 'usuarios-departamentos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_user`
--

CREATE TABLE `datos_user` (
  `idDatos` int(11) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `genero` enum('masculino','femenino') NOT NULL DEFAULT 'masculino',
  `direccion_principal` varchar(100) DEFAULT NULL,
  `telefono` char(10) DEFAULT NULL,
  `idUser` int(11) NOT NULL,
  `idDepartamento` int(11) NOT NULL,
  `estado` enum('validado','no validado') NOT NULL DEFAULT 'no validado'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `datos_user`
--

INSERT INTO `datos_user` (`idDatos`, `apellidos`, `nombres`, `fecha_nacimiento`, `genero`, `direccion_principal`, `telefono`, `idUser`, `idDepartamento`, `estado`) VALUES
(1, 'Salimas Ordoñez', 'Ramon', '1980-02-06', 'masculino', 'Tolita 2', '0992141458', 3, 3, 'validado'),
(2, 'Cazares', 'Frixon', '1978-03-02', 'masculino', 'Tolita 1', '0992365874', 2, 2, 'no validado'),
(3, 'Bolaños', 'Maria', '1970-02-03', 'masculino', 'Judiciales', '0992141474', 4, 4, 'no validado'),
(4, 'Quinteros', 'Gustavo', '1982-04-02', 'masculino', 'Olmedo y Ricauter', '0992258474', 5, 5, 'no validado'),
(5, 'Caicedo', 'Arturo', '1971-03-04', 'masculino', 'Codesa', '0992857413', 6, 6, 'validado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `idDepartamento` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`idDepartamento`, `nombre`) VALUES
(1, 'Recursos Humanos'),
(2, 'Financiero'),
(3, 'Médico'),
(4, 'Emprendimiento'),
(5, 'Investigación'),
(6, 'Seguridad'),
(7, 'Publicidad'),
(8, 'Bienestar Estudiantil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dispositivo`
--

CREATE TABLE `dispositivo` (
  `idDispositivo` int(11) NOT NULL,
  `serie` char(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `idDepartamento` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dispositivo`
--

INSERT INTO `dispositivo` (`idDispositivo`, `serie`, `nombre`, `marca`, `idDepartamento`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(2, '205B', 'Monitor 25''', 'LG', 1, 1, '2017-03-31 17:01:26', 1, '2017-04-01 13:26:52'),
(3, '120T2', 'Impresora', 'Epson', 3, 1, '2017-03-31 17:02:21', 1, '2017-03-31 17:02:21'),
(4, '510e', 'Plotter', 'HP', 5, 1, '2017-03-31 21:22:51', 1, '2017-03-31 21:22:51'),
(5, '50rt', 'Monitor 21''', 'Samsung', 3, 1, '2017-03-31 21:34:45', 1, '2017-04-01 13:27:02'),
(6, '80UQ', 'Teclado Inalambrico', 'Quasad', 5, 1, '2017-03-31 21:35:26', 1, '2017-03-31 21:35:26'),
(7, '90L', 'Mouse Inalambrico', 'Maxwell', 3, 1, '2017-03-31 21:36:08', 1, '2017-03-31 21:36:08'),
(8, '900h', 'CPU', 'HP', 3, 1, '2017-03-31 21:44:05', 1, '2017-03-31 21:44:05'),
(9, '09IY', 'Monitor', 'Diggio', 1, 1, '2017-03-31 21:45:20', 1, '2017-03-31 21:45:20'),
(10, '40k', 'Televisor Smart', 'LG', 7, 1, '2017-03-31 21:46:12', 1, '2017-03-31 21:46:12'),
(11, '205BS', 'Impresora', 'HP', 4, 1, '2017-03-31 21:46:31', 1, '2017-03-31 21:46:31'),
(12, '90Q', 'GPS', 'JVC', 6, 1, '2017-03-31 21:47:08', 1, '2017-03-31 21:47:08'),
(13, '108UG', 'Router Inalambrico', 'Trendet', 3, 1, '2017-03-31 23:54:48', 1, '2017-03-31 23:54:48'),
(14, '135B', 'Monitor', 'Samsung 22''', 2, 1, '2017-03-31 23:57:26', 1, '2017-03-31 23:57:26'),
(15, '401E', 'CPU', 'HP', 2, 1, '2017-04-01 12:15:07', 1, '2017-04-01 12:15:07'),
(16, '90I', 'Audifonos', 'Beats', 2, 1, '2017-04-01 12:15:40', 1, '2017-04-01 12:15:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fallos`
--

CREATE TABLE `fallos` (
  `idFallos` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `respuesta` varchar(200) DEFAULT NULL,
  `estado` enum('atendido','no atendido') NOT NULL DEFAULT 'no atendido',
  `idDispositivo` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fallos`
--

INSERT INTO `fallos` (`idFallos`, `descripcion`, `respuesta`, `estado`, `idDispositivo`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'El monitor no enciende, la ultima vez que encendió la imagen estaba distorsionada.', 'El monitor fue arreglado mediante un cambio de repuesto.', 'atendido', 2, 2, '2017-03-31 18:11:52', 1, '2017-03-31 19:24:12'),
(2, 'La impresora no quiere reconocer los cartuchos.', 'Se reemplazaron los cartuchos con unos nuevos', 'atendido', 3, 2, '2017-03-31 19:54:00', 1, '2017-03-31 21:16:30'),
(3, 'El dispositivo no funciona!', 'Necesitaba una actualizacion de Drivers', 'atendido', 4, 2, '2017-03-31 21:23:29', 1, '2017-03-31 21:27:02'),
(4, 'El router no enciende.', 'Se va a reemplazar con otro dispositivo', 'atendido', 13, 3, '2017-03-31 23:55:17', 1, '2017-03-31 23:58:54'),
(5, 'EL monitor no enciende', 'El monitor será reemplazada con otro!', 'atendido', 14, 2, '2017-03-31 23:57:43', 1, '2017-04-01 12:21:19'),
(6, 'El monitor tiene fallas al encender nuevamente!', 'Ya no tiene solucion, será reemplazado', 'atendido', 14, 2, '2017-04-01 00:07:28', 1, '2017-04-01 12:21:39'),
(7, 'Tiene problemas de brillo', 'Era un problema de configuracion, ya fue configurado correctamente.', 'atendido', 5, 3, '2017-04-01 00:38:43', 1, '2017-04-01 12:22:04'),
(8, 'Los audífonos no están sonando correctamente por lo que no se pueden hacer las videoconferencias.', 'Será reemplazado con otro par de audifonos.', 'atendido', 16, 2, '2017-04-01 12:16:18', 1, '2017-04-01 12:22:38'),
(9, 'Las coordenadas están totalmente equivocadas.', 'El dipositivo necesitaba un respuesto que ya fue reemplazado!', 'atendido', 12, 6, '2017-04-01 12:45:09', 1, '2017-04-01 14:41:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1490937318),
('m140209_132017_init', 1490937327),
('m140403_174025_create_account_table', 1490937328),
('m140504_113157_update_tables', 1490937332),
('m140504_130429_create_token_table', 1490937333),
('m140506_102106_rbac_init', 1490937470),
('m140830_171933_fix_ip_field', 1490937333),
('m140830_172703_change_account_table_name', 1490937334),
('m141222_110026_update_ip_field', 1490937334),
('m141222_135246_alter_username_length', 1490937335),
('m150614_103145_update_social_account_table', 1490937337),
('m150623_212711_fix_username_notnull', 1490937337),
('m151218_234654_add_timezone_to_profile', 1490937337),
('m160929_103127_add_last_login_at_to_user_table', 1490937338);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profile`
--

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `timezone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`, `timezone`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `social_account`
--

CREATE TABLE `social_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `token`
--

CREATE TABLE `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `token`
--

INSERT INTO `token` (`user_id`, `code`, `created_at`, `type`) VALUES
(1, 'TYyZHJYW7I_dddxW4T7WiOjPhDFYY0qq', 1490937898, 0),
(2, 'qBorgm04k70hhxH46j4qKpiDh7JKjrKP', 1491001256, 0),
(3, 'tDDJN2Zz58qfTSbOxPOm8JC-s7A6cxm6', 1491014876, 0),
(4, 'oqB2Md2LGnQFKTH8qWOtHQgk-MG3QtjS', 1491021881, 0),
(5, 'T_EkdVJdu1ACdNLZ9JL9P7_ozBYymCqQ', 1491023776, 0),
(6, '7CxB_0WuTtM2jQEpQDTAYcQxMfhZVrSH', 1491067548, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  `last_login_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`, `last_login_at`) VALUES
(1, 'admin', 'ejemplo@gmail.com', '$2y$12$XVeRzs9tQ/O0P9g.lxIjquTzWhVCjId9xB/nx.BBsMvuS9tdR6jyu', 'njgX1RwB0ZCr6OZJkAR-B4sWjEOfPGt-', NULL, NULL, NULL, '127.0.0.1', 1490937898, 1490937898, 0, 1491074083),
(2, 'financiero', 'financiero@hotmail.com', '$2y$10$noS.mYTuV9rlNYnPDD/Q9ujuNfwltrngYZZnp0ixtKXXy85NEO8q.', '3EIzXPmKiQbsDpjtUqfFA_fYnksppXRE', 1491001281, NULL, NULL, '127.0.0.1', 1491001256, 1491001256, 0, 1491066785),
(3, 'medico', 'medico@hotmail.com', '$2y$10$eguJj/GcAbT.kDVFduaxLO5lhEE/41T.pm9IRj0aJPq0/joiUI5WS', 'A8cRacADCNWqNT5jVysMvZPmTosdzUYf', 1491014923, NULL, NULL, '127.0.0.1', 1491014876, 1491014876, 0, 1491076377),
(4, 'emprendimiento', 'emprendimiento@hotmail.com', '$2y$10$KH8ALBk2LOc32WdmwEOuz.hWwazT2flzlmJa23HuFGjqYCrIFMaJi', 'Aj6y-wDQwzbimeTT7sgRAM-qQZMOBZLO', 1491021890, NULL, NULL, '127.0.0.1', 1491021881, 1491021881, 0, 1491021901),
(5, 'investigacion', 'investigacion@hotmail.com', '$2y$10$.Wsd5cZ5G5XmLf3tP3N7WOiTPwBftG503jKM0UAKd8doRVTg2ovFK', 'Itnw2dnhI2ltRsvWOcJHgmxS6a6ZdtUM', 1491023791, NULL, NULL, '127.0.0.1', 1491023776, 1491023776, 0, 1491023795),
(6, 'seguridad', 'seguridad@hotmail.com', '$2y$10$I377BrZ.fFVkUjaPoPXx7e3hv5G0ywqFSEomQH5JyldKKTiVhz3Xe', 'At0vrrr2GTfE6rgVeeeDvN-q2GrjSDux', 1491067569, NULL, NULL, '127.0.0.1', 1491067548, 1491067548, 0, 1491075734);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indices de la tabla `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indices de la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indices de la tabla `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indices de la tabla `datos_user`
--
ALTER TABLE `datos_user`
  ADD PRIMARY KEY (`idDatos`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idDepartamento` (`idDepartamento`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`idDepartamento`);

--
-- Indices de la tabla `dispositivo`
--
ALTER TABLE `dispositivo`
  ADD PRIMARY KEY (`idDispositivo`),
  ADD KEY `dispositivo_ibfk_1` (`created_by`),
  ADD KEY `dispositivo_ibfk_2` (`updated_by`),
  ADD KEY `dispositivo_ibfk_3` (`idDepartamento`);

--
-- Indices de la tabla `fallos`
--
ALTER TABLE `fallos`
  ADD PRIMARY KEY (`idFallos`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `idDispositivo` (`idDispositivo`);

--
-- Indices de la tabla `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indices de la tabla `social_account`
--
ALTER TABLE `social_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_unique` (`provider`,`client_id`),
  ADD UNIQUE KEY `account_unique_code` (`code`),
  ADD KEY `fk_user_account` (`user_id`);

--
-- Indices de la tabla `token`
--
ALTER TABLE `token`
  ADD UNIQUE KEY `token_unique` (`user_id`,`code`,`type`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_unique_username` (`username`),
  ADD UNIQUE KEY `user_unique_email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datos_user`
--
ALTER TABLE `datos_user`
  MODIFY `idDatos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `idDepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `dispositivo`
--
ALTER TABLE `dispositivo`
  MODIFY `idDispositivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `fallos`
--
ALTER TABLE `fallos`
  MODIFY `idFallos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `social_account`
--
ALTER TABLE `social_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `datos_user`
--
ALTER TABLE `datos_user`
  ADD CONSTRAINT `datos_user_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `datos_user_ibfk_2` FOREIGN KEY (`idDepartamento`) REFERENCES `departamento` (`idDepartamento`);

--
-- Filtros para la tabla `dispositivo`
--
ALTER TABLE `dispositivo`
  ADD CONSTRAINT `dispositivo_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `dispositivo_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `dispositivo_ibfk_3` FOREIGN KEY (`idDepartamento`) REFERENCES `departamento` (`idDepartamento`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `fallos`
--
ALTER TABLE `fallos`
  ADD CONSTRAINT `fallos_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fallos_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fallos_ibfk_3` FOREIGN KEY (`idDispositivo`) REFERENCES `dispositivo` (`idDispositivo`);

--
-- Filtros para la tabla `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `social_account`
--
ALTER TABLE `social_account`
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
