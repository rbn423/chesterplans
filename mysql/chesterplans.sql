-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-03-2019 a las 14:57:04
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `chesterplans`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `ID` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `TITULO` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `DESCB` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `DESCG` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `FOTO` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `COMENTARIO` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `CREADOR` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `FECHA` date NOT NULL,
  `PRECIO` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `combo`
--

CREATE TABLE `combo` (
  `ID` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `CREADOR` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `VIAJE` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `ACTIVIDAD` varchar(5) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `ID` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `ESCRITOR` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `COMENTARIO` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencias`
--

CREATE TABLE `experiencias` (
  `ID` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `TITULO` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `DESCB` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `DESCG` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `FOTO` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `COMENTARIO` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `CREADOR` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `FECHAINI` date NOT NULL,
  `FECHAFIN` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto`
--

CREATE TABLE `foto` (
  `ID` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `NOMBRE` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `IMAGEN` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista`
--

CREATE TABLE `lista` (
  `ID` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `USUARIOS` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `IDACTIVIDAD` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `IDCOMBO` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `IDVIAJE` varchar(5) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `NICK` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `NOMBRE` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `APELLIDOS` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `PASSWORD` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `MAIL` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `TELEFONO` int(12) NOT NULL,
  `TIPO` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

CREATE TABLE `viaje` (
  `ID` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `TITULO` varchar(15) CHARACTER SET utf32 COLLATE utf32_spanish_ci NOT NULL,
  `DESCB` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `DESCG` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `FOTO` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `COMENTARIO` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `CREADOR` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `FECHAINI` date NOT NULL,
  `FECHAFIN` date NOT NULL,
  `PRECIO` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`),
  ADD KEY `FOTO` (`FOTO`),
  ADD KEY `COMENTARIO` (`COMENTARIO`),
  ADD KEY `CREADOR` (`CREADOR`);

--
-- Indices de la tabla `combo`
--
ALTER TABLE `combo`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`,`CREADOR`,`VIAJE`,`ACTIVIDAD`),
  ADD KEY `CREADOR` (`CREADOR`),
  ADD KEY `VIAJE` (`VIAJE`),
  ADD KEY `ACTIVIDAD` (`ACTIVIDAD`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`),
  ADD KEY `ESCRITOR` (`ESCRITOR`);

--
-- Indices de la tabla `experiencias`
--
ALTER TABLE `experiencias`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FOTO` (`FOTO`),
  ADD KEY `COMENTARIO` (`COMENTARIO`),
  ADD KEY `CREADOR` (`CREADOR`);

--
-- Indices de la tabla `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- Indices de la tabla `lista`
--
ALTER TABLE `lista`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`,`USUARIOS`),
  ADD KEY `USUARIOS` (`USUARIOS`),
  ADD KEY `IDACTIVIDAD` (`IDACTIVIDAD`,`IDCOMBO`,`IDVIAJE`),
  ADD KEY `IDVIAJE` (`IDVIAJE`),
  ADD KEY `IDCOMBO` (`IDCOMBO`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`NICK`),
  ADD KEY `NICK` (`NICK`);

--
-- Indices de la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`),
  ADD KEY `FOTO` (`FOTO`),
  ADD KEY `COMENTARIO` (`COMENTARIO`),
  ADD KEY `CREADOR` (`CREADOR`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD CONSTRAINT `actividad_ibfk_1` FOREIGN KEY (`FOTO`) REFERENCES `foto` (`id`),
  ADD CONSTRAINT `actividad_ibfk_2` FOREIGN KEY (`CREADOR`) REFERENCES `usuario` (`NICK`),
  ADD CONSTRAINT `actividad_ibfk_3` FOREIGN KEY (`COMENTARIO`) REFERENCES `comentario` (`ID`);

--
-- Filtros para la tabla `combo`
--
ALTER TABLE `combo`
  ADD CONSTRAINT `combo_ibfk_1` FOREIGN KEY (`CREADOR`) REFERENCES `usuario` (`NICK`),
  ADD CONSTRAINT `combo_ibfk_2` FOREIGN KEY (`VIAJE`) REFERENCES `viaje` (`ID`),
  ADD CONSTRAINT `combo_ibfk_3` FOREIGN KEY (`ACTIVIDAD`) REFERENCES `actividad` (`ID`);

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`ESCRITOR`) REFERENCES `usuario` (`NICK`);

--
-- Filtros para la tabla `experiencias`
--
ALTER TABLE `experiencias`
  ADD CONSTRAINT `experiencias_ibfk_1` FOREIGN KEY (`FOTO`) REFERENCES `foto` (`id`),
  ADD CONSTRAINT `experiencias_ibfk_2` FOREIGN KEY (`CREADOR`) REFERENCES `usuario` (`NICK`),
  ADD CONSTRAINT `experiencias_ibfk_3` FOREIGN KEY (`COMENTARIO`) REFERENCES `comentario` (`ID`);

--
-- Filtros para la tabla `lista`
--
ALTER TABLE `lista`
  ADD CONSTRAINT `lista_ibfk_1` FOREIGN KEY (`USUARIOS`) REFERENCES `usuario` (`NICK`),
  ADD CONSTRAINT `lista_ibfk_3` FOREIGN KEY (`IDVIAJE`) REFERENCES `viaje` (`ID`),
  ADD CONSTRAINT `lista_ibfk_4` FOREIGN KEY (`IDCOMBO`) REFERENCES `combo` (`ID`),
  ADD CONSTRAINT `lista_ibfk_5` FOREIGN KEY (`IDACTIVIDAD`) REFERENCES `actividad` (`ID`);

--
-- Filtros para la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD CONSTRAINT `viaje_ibfk_1` FOREIGN KEY (`FOTO`) REFERENCES `foto` (`id`),
  ADD CONSTRAINT `viaje_ibfk_2` FOREIGN KEY (`CREADOR`) REFERENCES `usuario` (`NICK`),
  ADD CONSTRAINT `viaje_ibfk_3` FOREIGN KEY (`COMENTARIO`) REFERENCES `comentario` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
