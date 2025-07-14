-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 14-07-2025 a las 19:54:53
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `examen_practico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id_perfil` int(11) NOT NULL,
  `dsc_perfil` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id_perfil`, `dsc_perfil`) VALUES
(1, 'Admin'),
(2, 'RH'),
(3, 'DG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `id_perfil` int(11) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `primer_apellido` varchar(100) DEFAULT NULL,
  `contrasenia` varchar(100) DEFAULT NULL,
  `visible` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `id_perfil`, `usuario`, `nombre`, `primer_apellido`, `contrasenia`, `visible`) VALUES
(1, 1, 'AGUSTIN', 'AGUSTIN', 'GONZÁLEZ', '', 1),
(2, 2, 'eaburto', 'EDUARDO', 'GONZÁLEZ', '', 1),
(3, 3, 'jlrendonb', 'JOSÉ LUIS', 'GONZÁLEZ', '', 1),
(4, 2, 'salvador.garcia', 'SALVADOR', 'GRANADOS', '', 1),
(5, 1, 'jglezlezo', 'JOSETTE', 'GUTIÉRREZ', '', 1),
(6, 2, 'zulema.lira', 'ZULEMA', 'HERNÁNDEZ', '', 1),
(7, 3, 'mcamila', 'MARIANA CAMILA', 'HERNÁNDEZ', '', 1),
(8, 2, 'agenriquez', 'ANA GUADALUPE', 'HERNÁNDEZ', '', 1),
(9, 1, 'lgrabriel', 'LUIS GABRIEL', 'HERNÁNDEZ', '', 1),
(10, 2, 'jacostap', 'JUAN ANTONIO', 'HERNÁNDEZ', 'd8578edf8458ce06fbc5bb76a58c5ca4', 1),
(11, 3, 'aguilar.jorge', 'JORGE', 'HUETT', '', 1),
(12, 2, 'ralfonzo', 'RICARDO DANIEL', 'JASSO', '', 1),
(13, 1, 'ialvarezp', 'IRAZEMA DEL ROCÍO', 'JIMÉNEZ', '', 1),
(14, 2, 'jmazavala', 'JUAN MANUEL', 'JUÁREZ', '', 1),
(15, 3, 'rantonio', 'ROCÍO', 'LANDÍN', '', 1),
(16, 2, 'karroyo', 'KAREN MONSERRAT', 'LARA', '', 1),
(17, 1, 'mascencio', 'MARÍA YOSSELÍN', 'LÓPEZ', '', 1),
(18, 2, 'dayalasa', 'DAVID', 'LOYA', '', 1),
(19, 3, 'aayalaserr', 'ALEJANDRO', 'LUÉVANOS', '', 1),
(20, 2, 'lebalderas', 'LETICIA', 'LUGO', '', 1),
(21, 1, 'elimdalet', 'ELIM DALET', 'MAGAÑA', '', 1),
(22, 2, 'sbeltranl', 'SERGIO KARLO', 'MAGDALENO', '', 1),
(23, 3, 'dcabreras', 'DULCE MARÍA TERESITA', 'MARES', '', 1),
(24, 2, 'ccampos', 'CLAUDIA LORENA', 'MARTÍNEZ', 'c4ca4238a0b923820dcc509a6f75849b', 1),
(25, 3, 'Enrique', 'Enrique ', 'Delgado', '827ccb0eea8a706c4c34a16891f84e7b', 0),
(26, 1, 'Edgar', 'Edgar', 'Delgado', 'a152e841783914146e4bcd4f39100686', 1),
(27, 2, 'ee', 'ee', 'ee', '08a4415e9d594ff960030b921d42b91e', 0);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_usuarios_login`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_usuarios_login` (
`id_usuario` int(11)
,`id_perfil` int(11)
,`dsc_perfil` varchar(50)
,`nombre_completo` varchar(201)
,`usuario` varchar(50)
,`contrasenia` varchar(100)
,`visible` tinyint(1)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_usuarios_login`
--
DROP TABLE IF EXISTS `vw_usuarios_login`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_usuarios_login`  AS SELECT `u`.`id_usuario` AS `id_usuario`, `u`.`id_perfil` AS `id_perfil`, `p`.`dsc_perfil` AS `dsc_perfil`, concat(`u`.`nombre`,' ',`u`.`primer_apellido`) AS `nombre_completo`, `u`.`usuario` AS `usuario`, `u`.`contrasenia` AS `contrasenia`, `u`.`visible` AS `visible` FROM (`usuarios` `u` left join `perfiles` `p` on(`u`.`id_perfil` = `p`.`id_perfil`)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
