-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 30-11-2022 a las 16:47:01
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clinica_dental`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `idCita` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `fechaCita` date NOT NULL,
  `motivoCita` text COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`idCita`, `idUser`, `fechaCita`, `motivoCita`) VALUES
(1, 3, '2022-08-17', 'Empaste en muela 42'),
(3, 3, '2022-10-05', 'Revisi&oacute;n anual'),
(5, 3, '2023-06-21', 'Empaste muela 24'),
(8, 3, '2022-03-10', 'Revisi&oacute;n de empaste'),
(10, 3, '2022-11-25', 'Endodoncia en muela 22'),
(11, 2, '2022-11-03', 'Revisi&oacute;n de empaste'),
(12, 4, '2022-10-31', 'Endodoncia en muela 40'),
(15, 3, '2022-12-10', 'Revisi&oacute;n de empaste'),
(16, 3, '2023-07-16', ' Revisi&oacute;n Endodoncia en muela 39'),
(18, 20, '2023-04-21', 'Revisi&oacute;n anual'),
(19, 5, '2023-07-21', 'Revisi&oacute;n anual'),
(20, 7, '2022-11-18', 'Revisi&oacute;n de empaste'),
(22, 20, '2022-11-03', 'Revisi&oacute;n de empaste'),
(23, 7, '2023-04-21', 'Endodoncia en muela 25'),
(24, 11, '2022-12-11', 'Empaste en muela 45'),
(25, 3, '2023-07-21', 'Revisi&oacute;n anual'),
(26, 2, '2023-07-20', 'Revisi&oacute;n anual');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `idNoticia` int(11) NOT NULL,
  `titulo` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `imagen` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL,
  `texto` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`idNoticia`, `titulo`, `imagen`, `texto`, `fecha`, `idUser`) VALUES
(2, '¿Qué es el Día Mundial de un Futuro Libre de Caries?', 'img_2.jpeg', 'La caries dental es considerada la enfermedad crónica más común en el mundo, aun así, volamos deja claro que en buena parte es previsible. Según la Organización Mundial de la Salud (OMS), entre el 60 y el 90% de niños en edad escolar de todo el mundo y casi el 100% de los adultos sufren de caries, lo cual esto puede afectar drásticamente la calidad de vida de los pacientes, sea por dolor o malestar, y la pérdida de días o disminución de la participación en la escuela y al trabajo. Además, exige un gran impacto económico a causa de un tratamiento que acostumbra a ser de precio elevado, que continúa siendo inasequible para muchos de los pacientes que lo sufren.', '2022-11-03', 1),
(9, 'Adquisici&oacute;n de nuevo material inform&aacute;tico', 'img_9.jpeg', 'Se ha procedido a la renovaci&oacute;n de todo nuestro material inform&aacute;tico.', '2022-08-05', 23),
(10, 'Renovaci&oacute;n de Material', 'img_10.jpeg', 'Tenemos el placer de anunciar que hemos renovado todo nuestro material con equipos de la m&aacute;s alta gama para una mayor comodidad y mejor atenci&oacute;n a nuestros pacientes.', '2022-07-05', 23),
(11, 'ATM o Articulaci&oacute;n Temporomandibular', 'img_11.jpeg', 'Seguro que si visit&aacute;is habitualmente vuestro odont&oacute;logo, habr&eacute;is le&iacute;do m&aacute;s de una vez las siglas ATM. Estas hacen referencia a la articulaci&oacute;n temporomandibular, aquella que nos permite llevar a cabo todos los movimientos masticatorios. En primer lugar, ATM o Articulaci&oacute;n Temporomandibular es la articulaci&oacute;n que une la mand&iacute;bula al cr&aacute;neo. Al permitirnos realizar todos los movimientos laterales, de ascenso, descenso, protusi&oacute;n y retusi&oacute;n, una complicaci&oacute;n en esta zona bucal tiene consecuencias en el habla, la masticaci&oacute;n e incluso cuando tenemos que tragar.', '2022-08-18', 1),
(12, 'Aceite y sus beneficios para nuestros dientes', 'img_12.jpeg', 'Siempre se ha dicho que la dieta mediterr&aacute;nea es de las mejores del mundo y no solo por su variedad, tambi&eacute;n porque tiene propiedades beneficiosas para la salud y esto incluye nuestra boca.\r\n\r\nUno de los puntos diferenciales de la dieta mediterr&aacute;nea es el uso del aceite de oliva, y de hecho los cient&iacute;ficos apuntan al hecho de que precisamente es el acetite, el que aporta beneficios a nuestros dientes y enc&iacute;as.\r\n\r\nConcretamente los estudios han hablado que el consumo del aceite previene la aparici&oacute;n de caries y periodontitis.', '2022-10-27', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_data`
--

CREATE TABLE `users_data` (
  `idUser` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidos` varchar(90) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fnac` date NOT NULL,
  `direccion` text COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `sexo` enum('femenino','masculino','otros') COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `users_data`
--

INSERT INTO `users_data` (`idUser`, `nombre`, `apellidos`, `email`, `telefono`, `fnac`, `direccion`, `sexo`) VALUES
(1, 'Administrador', 'Principal', 'admin@mymail.com', '625124785', '1992-10-14', 'Rue del Percebe,13 - Madrid', 'masculino'),
(2, 'Juan', 'Perez Blanco', 'j.p.blanco@mymail.com', '656321589', '1985-12-15', 'Plaza de la Esperanza, 24 - Madrid', 'masculino'),
(3, 'Ana', 'Otero Prieto', 'ana.otero.p@mymail.com', '675845180', '1995-05-04', 'Plaza Castilla, 1 - 1&ordm; Izquierda - Madrid', 'femenino'),
(4, 'Alice', 'Johnson James', 'alice.j.j@mymail.com', '699254178', '2001-03-25', 'Plaza Castilla, 1 - 1&ordm; Izquierda.\r\nMadrid', 'femenino'),
(5, 'Eva', 'Azul', 'eva.azul@mymail.com', '655254784', '2000-09-26', 'Calle Principal, n&ordm; 5, 6&ordm; F - Salamanca', 'femenino'),
(7, 'Gustavo', 'Costas Blanco', 'gus.costas@mymail.com', '678543177', '1975-04-01', 'Plaza de Castilla 25, Madrid', 'masculino'),
(8, 'Anne', 'Mar Azul', 'anne.m.a@mymail.com', '656134098', '2004-06-25', 'Plaza de Castilla 25, Madrid', 'femenino'),
(9, 'Ana', 'Perez Martin', 'ana.perex@mymail.com', '654678888', '1999-06-05', 'Plaza de Castilla 25, Madrid', 'femenino'),
(11, 'Manuel', 'Garcia Blanco', 'manu.garcia@mymail.com', '695873128', '1995-02-27', 'Paseo de la Castellana, 25 7&ordm; F - Madrid.', 'masculino'),
(14, 'Juan Jose', 'Martin Ruiz', 'juanjo.martin@mymail.com', '655847125', '1997-09-20', 'Plaza Castilla, 1 - 1&ordm; Derecha - Madrid', 'masculino'),
(19, 'Mario', 'Cortes Montes', 'mario.c.m@mymail.com', '661897456', '1988-11-03', 'Plaza Castilla, 1 - 18&ordm; Derecha - Madrid', 'masculino'),
(20, 'Monica', 'Cruz Azul', 'monica.cruz@mymail.com', '758741257', '1975-05-02', 'Plaza de Castilla 13, 12 F. - M&aacute;laga', 'femenino'),
(21, 'Maria', 'Cal Vazquez', 'maria.cal.v@mymail.com', '696587417', '1997-06-25', 'Gran V&iacute;a 125. 8&ordm; F - Madrid', 'femenino'),
(22, 'Miguel', 'Lopez Blanco', 'miguel.lopez@mymail.com', '662587963', '1971-09-06', 'Plaza Castilla, 5 - 18&ordm; Derecha - Madrid', 'masculino'),
(23, 'El Otro', 'Administrador de Sistema', 'otro.admin@mymail.com', '661254908', '2005-06-30', 'Plaza de Castilla 13, 22 G. - Madrid', 'femenino'),
(27, 'Ana', 'Prieto Alonso', 'ana.p.a@mymail.com', '986273720', '2004-11-09', '', 'femenino'),
(28, 'Antia', 'Otero Prieto', 'antia.o.p@mymail.com', '915263879', '2004-11-09', 'Plaza Castilla, 1 - 11&ordm; Izquierda.', 'femenino'),
(29, 'Mateo', 'Blanco Kas', 'casillasvolding@mymail.com', '632432136', '1932-02-06', 'Calle de la Castilla y Leon, n&ordm; 3322 38&ordm; H - Sevilla', 'masculino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_login`
--

CREATE TABLE `users_login` (
  `idLogin` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `usuario` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `rol` enum('admin','user') COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `users_login`
--

INSERT INTO `users_login` (`idLogin`, `idUser`, `usuario`, `password`, `rol`) VALUES
(1, 1, 'admin', '$2y$10$TFnpZvB.uQfioLLRBJd5rukDA/VH/XAyKlHtvGm0GdYAaHo6vxQGu', 'admin'),
(2, 2, 'juan', '$2y$10$17yn/le8p7NqqUnDr1ghBOM3NRL6sL1n6yqiaimaWxQ0v3Sl0vORK', 'user'),
(3, 3, 'ana', '$2y$10$0kUCIZx.w/eahnxsZx9u/up6ovLhnVIQkhcJuE6Xm1wgekb3OgCuO', 'user'),
(4, 4, 'alice', '$2y$10$qeW5coo6jTu/m0KVLVuX0eSfhfxe2jJ/Q2EwadlQy4CKbuWURYNj6', 'user'),
(5, 5, 'eva', '$2y$10$gUhUvCynPajQXSO9O4o8.e4hYIeQ3vRVNamyKXVoRZA5yMc5zfOBy', 'user'),
(7, 7, 'gus', '$2y$10$r9XdJykg.pPiee8zpeg8VuyL6eQQOJ/XJCHn5/7dqNN1Ok2qAgte2', 'user'),
(8, 8, 'hanne', '$2y$10$g008DLtyYKtiZoOReD1c5eg66v3KTbhzkvqlsKtQpxwGJwq5r/Uoq', 'user'),
(9, 9, 'ana2', '$2y$10$q/NwUlcX/6kI.KCBnXDHdecWeJQc4keUUo5QEzJ03JdolDEVulxaK', 'user'),
(11, 11, 'manu', '$2y$10$7EOii0vnSPwh67QqJsBOwOt1y2yrtiafEJdbz30dZGsklbYAfGIX6', 'user'),
(14, 14, 'Juanjo', '$2y$10$mulpEXNoFWy2TOkmJn0mKuGOSXhGdUsaPDfFuHUnVwkCmZXwaRHzq', 'user'),
(19, 19, 'Mario', '$2y$10$tBjHVp3tkOsE3bl2q6qLp.0B9ASzBR6jDwzCgKyjngw4L1ZmmTQRm', 'user'),
(20, 20, 'moni', '$2y$10$Boma3o6ZmrQ1frnwNn99c.IdoPs5lgqI43iOSb9RiOn9jMCan4G6m', 'user'),
(21, 21, 'maria', '$2y$10$f1qMeY4ZugGX8Aj.RnPScOuXIdsX5EyZvMKENzRqgbeC/qFbsZ2f.', 'user'),
(22, 22, 'miguel', '$2y$10$3PTrAQ55S72rihP3Xex0FutlAFeT/U3MLMO1IgkqXgYTHe5aMKYki', 'user'),
(23, 23, 'admin_2', '$2y$10$bNKLbXA5T7j6JiDj95lDjO1covmS8Bcs4gtSmsckYZbYRYNmigmr2', 'admin'),
(27, 27, 'ana23', '$2y$10$2G.6FftB9ZjxL.7Wr0C/s.x.3fD3lE3mJz4ssZAgPj0B4RDZNxFtG', 'user'),
(28, 28, 'antia', '$2y$10$vQ/t/DcRgkTvZdO5xDi8OOtJ4uWG8JxQNwh0YA1hgwO2FJXsnKnPG', 'user'),
(29, 29, 'mateito', '$2y$10$UdNSn4.Na3yXaI7R2mvq2uVHAXQqDNps7yNOIuqSz3sGP9q8YRsjm', 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`idCita`),
  ADD KEY `idUser_citas_fk` (`idUser`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`idNoticia`),
  ADD UNIQUE KEY `titulo` (`titulo`),
  ADD KEY `idUser_noticias_fk` (`idUser`);

--
-- Indices de la tabla `users_data`
--
ALTER TABLE `users_data`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `users_login`
--
ALTER TABLE `users_login`
  ADD PRIMARY KEY (`idLogin`),
  ADD UNIQUE KEY `idUser` (`idUser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `idCita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `idNoticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `users_data`
--
ALTER TABLE `users_data`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `users_login`
--
ALTER TABLE `users_login`
  MODIFY `idLogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `idUser_citas_fk` FOREIGN KEY (`idUser`) REFERENCES `users_data` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `idUser_noticias_fk` FOREIGN KEY (`idUser`) REFERENCES `users_data` (`idUser`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `users_login`
--
ALTER TABLE `users_login`
  ADD CONSTRAINT `idUser_login_fk` FOREIGN KEY (`idUser`) REFERENCES `users_data` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
