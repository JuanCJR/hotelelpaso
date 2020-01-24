-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-01-2020 a las 02:29:14
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hoteldb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disponibilidad`
--

CREATE TABLE `disponibilidad` (
  `idDisponibilidad` int(11) DEFAULT NULL,
  `idTipoHabitacion` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `disponibles` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `disponibilidad`
--

INSERT INTO `disponibilidad` (`idDisponibilidad`, `idTipoHabitacion`, `total`, `disponibles`) VALUES
(1, 1, 20, 15),
(2, 2, 20, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservaciones`
--

CREATE TABLE `reservaciones` (
  `idReservaciones` int(11) NOT NULL,
  `idTipoHabitacion` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `costo` int(11) DEFAULT NULL,
  `noches` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reservaciones`
--

INSERT INTO `reservaciones` (`idReservaciones`, `idTipoHabitacion`, `idUsuario`, `costo`, `noches`) VALUES
(1579828790, 1, 1, 50, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipohabitacion`
--

CREATE TABLE `tipohabitacion` (
  `idTipoHabitacion` int(11) NOT NULL,
  `tipoHabitacion` tinytext DEFAULT NULL,
  `precio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipohabitacion`
--

INSERT INTO `tipohabitacion` (`idTipoHabitacion`, `tipoHabitacion`, `precio`) VALUES
(1, 'Suite', 50),
(2, 'Simple', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `idTipoUsuario` int(11) NOT NULL,
  `tipoUsuario` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`idTipoUsuario`, `tipoUsuario`) VALUES
(1, 'administrador'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `Nombre` tinytext DEFAULT NULL,
  `Apellido` tinytext DEFAULT NULL,
  `ci` tinytext DEFAULT NULL,
  `correo` tinytext DEFAULT NULL,
  `idTipoUsuario` int(11) DEFAULT NULL,
  `contrasena` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `Nombre`, `Apellido`, `ci`, `correo`, `idTipoUsuario`, `contrasena`) VALUES
(1, 'Juan', 'Jimenez', '992756106', 'j@gmail.com', 2, '1234'),
(2, 'Junco', 'kun', '1323213', 'junco@tkm.com', 2, '1234'),
(3, 'jj@gmail.com', 'j', '3', 'j@gmail.com', 2, '123445345435'),
(4, 'j', 'j', '223123213', 'jjwwwj@gmail.com', 2, '324312'),
(5, 'j', 'j', '223123213', 'jjwwwj@gmail.com', 2, '324312'),
(6, 'j', 'j', '223123213', 'jjwwwj@gmail.com', 2, '324312'),
(7, 'j', 'j', '223123213', 'jjwwwj@gmail.com', 2, '324312'),
(8, 'j', 'j', '223123213', 'jjwwwj@gmail.com', 2, '324312'),
(9, 'j', 'j', '223123213', 'jjwwwj@gmail.com', 2, '324312'),
(10, 'Juan', 'Jimenez', '992756106', 'asda@gmail.com', 2, '14123214'),
(11, 'Jimenez', 'asdasd', '992756109', 'JQJ@gmail.com', 2, '1323123123'),
(12, 'Juan', 'Jimenez', '992756106', 'jd@gmail.com', 2, '1224312412'),
(13, 'Juan', 'Jimenez', '992756106', 'as@gmail.com', 2, '12312312421'),
(14, 'Jimenez', '232', '992756109', 'h@gmail.com', 2, '1223124'),
(15, 'Jimenez', 'd', '992756109', 'juancarlo14071@gmail.com', 2, '1232134124124'),
(16, 'Jimenez', 'sdd', '992756109', 'gabyjnsr@gmail.com', 2, '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `disponibilidad`
--
ALTER TABLE `disponibilidad`
  ADD KEY `idTipoHabitacion` (`idTipoHabitacion`);

--
-- Indices de la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  ADD PRIMARY KEY (`idReservaciones`),
  ADD KEY `idTipoHabitacion` (`idTipoHabitacion`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `tipohabitacion`
--
ALTER TABLE `tipohabitacion`
  ADD PRIMARY KEY (`idTipoHabitacion`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`idTipoUsuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idTipoUsuario` (`idTipoUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  MODIFY `idReservaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1579828791;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `idTipoUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `disponibilidad`
--
ALTER TABLE `disponibilidad`
  ADD CONSTRAINT `disponibilidad_ibfk_1` FOREIGN KEY (`idTipoHabitacion`) REFERENCES `tipohabitacion` (`idTipoHabitacion`);

--
-- Filtros para la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  ADD CONSTRAINT `reservaciones_ibfk_1` FOREIGN KEY (`idTipoHabitacion`) REFERENCES `tipohabitacion` (`idTipoHabitacion`),
  ADD CONSTRAINT `reservaciones_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idTipoUsuario`) REFERENCES `tipousuario` (`idTipoUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
