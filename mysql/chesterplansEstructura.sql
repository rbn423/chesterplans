-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-05-2019 a las 18:16:29
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

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
  `ID` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `TITULO` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `DESCB` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `DESCG` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `FOTO` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `COMENTARIO` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `CREADOR` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `FECHA` date NOT NULL,
  `PRECIO` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amigos`
--

CREATE TABLE `amigos` (
  `AMIGOA` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `AMIGOB` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `combo`
--

CREATE TABLE `combo` (
  `ID` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `CREADOR` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `VIAJE` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `ACTIVIDAD` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `PRECIO` float NOT NULL,
  `NOMBREVIAJE` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `ID` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ESCRITOR` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `COMENTARIO` varchar(500) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `IDUSUARIO` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `TIPO` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `IDCOMPRA` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuentos`
--

CREATE TABLE `descuentos` (
  `id` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `porcentaje` int(11) NOT NULL,
  `tipo` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `puntos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencias`
--

CREATE TABLE `experiencias` (
  `ID` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `TITULO` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `DESCB` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `DESCG` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `COMENTARIO` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `CREADOR` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `FECHAINI` date DEFAULT NULL,
  `FECHAFIN` date DEFAULT NULL,
  `likes` int(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto`
--

CREATE TABLE `foto` (
  `ID` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `NOMBRE` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `IMAGEN` mediumblob NOT NULL,
  `TIPO` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intercombo`
--

CREATE TABLE `intercombo` (
  `IDACT` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `IDCOMBO` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intercomentario`
--

CREATE TABLE `intercomentario` (
  `ID` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `IDCOMENT` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `TIPO` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interdescuentos`
--

CREATE TABLE `interdescuentos` (
  `descuentoid` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nick` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intereses`
--

CREATE TABLE `intereses` (
  `IDUSUARIO` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `IDINTERES` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `TIPO` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interfoto`
--

CREATE TABLE `interfoto` (
  `IDPUBLICACION` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `IDFOTO` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista`
--

CREATE TABLE `lista` (
  `ID` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `USUARIOS` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `IDACTIVIDAD` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `IDCOMBO` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `IDVIAJE` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `megustas`
--

CREATE TABLE `megustas` (
  `nickusuario` varchar(50) NOT NULL,
  `idexperiencia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `emisor` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `receptor` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `NICK` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `NOMBRE` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `APELLIDOS` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `PASSWORD` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `MAIL` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `TELEFONO` int(12) NOT NULL,
  `TIPO` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `PUNTOS` int(11) NOT NULL DEFAULT '0',
  `FOTO` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

CREATE TABLE `viaje` (
  `ID` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `TITULO` varchar(30) CHARACTER SET utf32 COLLATE utf32_spanish_ci NOT NULL,
  `DESCB` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `DESCG` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `FOTO` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `COMENTARIO` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `CREADOR` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
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
-- Indices de la tabla `amigos`
--
ALTER TABLE `amigos`
  ADD PRIMARY KEY (`AMIGOA`,`AMIGOB`);

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
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`IDUSUARIO`,`IDCOMPRA`),
  ADD KEY `IDUSUARIO` (`IDUSUARIO`);

--
-- Indices de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `experiencias`
--
ALTER TABLE `experiencias`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `COMENTARIO` (`COMENTARIO`),
  ADD KEY `CREADOR` (`CREADOR`);

--
-- Indices de la tabla `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- Indices de la tabla `intercombo`
--
ALTER TABLE `intercombo`
  ADD KEY `IDACT` (`IDACT`,`IDCOMBO`),
  ADD KEY `IDCOMBO` (`IDCOMBO`);

--
-- Indices de la tabla `intercomentario`
--
ALTER TABLE `intercomentario`
  ADD KEY `ID` (`ID`,`IDCOMENT`,`TIPO`),
  ADD KEY `IDCOMENT` (`IDCOMENT`);

--
-- Indices de la tabla `interdescuentos`
--
ALTER TABLE `interdescuentos`
  ADD PRIMARY KEY (`nick`,`descuentoid`);

--
-- Indices de la tabla `intereses`
--
ALTER TABLE `intereses`
  ADD PRIMARY KEY (`IDUSUARIO`,`IDINTERES`),
  ADD KEY `IDUSUARIO` (`IDUSUARIO`);

--
-- Indices de la tabla `interfoto`
--
ALTER TABLE `interfoto`
  ADD KEY `ID` (`IDPUBLICACION`,`IDFOTO`),
  ADD KEY `IDFOTO` (`IDFOTO`);

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
-- Indices de la tabla `megustas`
--
ALTER TABLE `megustas`
  ADD KEY `nickusuario` (`nickusuario`),
  ADD KEY `idexperiencia` (`idexperiencia`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`emisor`,`receptor`);

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
  ADD CONSTRAINT `actividad_ibfk_2` FOREIGN KEY (`CREADOR`) REFERENCES `usuario` (`NICK`) ON DELETE CASCADE,
  ADD CONSTRAINT `actividad_ibfk_3` FOREIGN KEY (`COMENTARIO`) REFERENCES `comentario` (`ID`) ON DELETE CASCADE;

--
-- Filtros para la tabla `combo`
--
ALTER TABLE `combo`
  ADD CONSTRAINT `combo_ibfk_1` FOREIGN KEY (`CREADOR`) REFERENCES `usuario` (`NICK`) ON DELETE CASCADE,
  ADD CONSTRAINT `combo_ibfk_2` FOREIGN KEY (`VIAJE`) REFERENCES `viaje` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `combo_ibfk_3` FOREIGN KEY (`ACTIVIDAD`) REFERENCES `actividad` (`ID`) ON DELETE CASCADE;

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`IDUSUARIO`) REFERENCES `usuario` (`NICK`) ON DELETE CASCADE;

--
-- Filtros para la tabla `experiencias`
--
ALTER TABLE `experiencias`
  ADD CONSTRAINT `experiencias_ibfk_2` FOREIGN KEY (`CREADOR`) REFERENCES `usuario` (`NICK`) ON DELETE CASCADE,
  ADD CONSTRAINT `experiencias_ibfk_3` FOREIGN KEY (`COMENTARIO`) REFERENCES `comentario` (`ID`) ON DELETE CASCADE;

--
-- Filtros para la tabla `intercombo`
--
ALTER TABLE `intercombo`
  ADD CONSTRAINT `intercombo_ibfk_1` FOREIGN KEY (`IDCOMBO`) REFERENCES `combo` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `intercombo_ibfk_2` FOREIGN KEY (`IDACT`) REFERENCES `actividad` (`ID`) ON DELETE CASCADE;

--
-- Filtros para la tabla `intercomentario`
--
ALTER TABLE `intercomentario`
  ADD CONSTRAINT `intercomentario_ibfk_1` FOREIGN KEY (`IDCOMENT`) REFERENCES `comentario` (`ID`) ON DELETE CASCADE;

--
-- Filtros para la tabla `intereses`
--
ALTER TABLE `intereses`
  ADD CONSTRAINT `intereses_ibfk_1` FOREIGN KEY (`IDUSUARIO`) REFERENCES `usuario` (`NICK`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `viaje_ibfk_2` FOREIGN KEY (`CREADOR`) REFERENCES `usuario` (`NICK`) ON DELETE CASCADE,
  ADD CONSTRAINT `viaje_ibfk_3` FOREIGN KEY (`COMENTARIO`) REFERENCES `comentario` (`ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
