-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-04-2019 a las 17:52:07
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
  `ID` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `TITULO` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `DESCB` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `DESCG` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `FOTO` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `COMENTARIO` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `CREADOR` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `FECHA` date NOT NULL,
  `PRECIO` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`ID`, `TITULO`, `DESCB`, `DESCG`, `FOTO`, `COMENTARIO`, `CREADOR`, `FECHA`, `PRECIO`) VALUES
('act01', 'excursion', '', '', 'exc01', 'com02', 'samu', '2019-06-06', 300);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `combo`
--

CREATE TABLE `combo` (
  `ID` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `CREADOR` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `VIAJE` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `ACTIVIDAD` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `PRECIO` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `ID` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `ESCRITOR` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `COMENTARIO` varchar(500) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`ID`, `ESCRITOR`, `COMENTARIO`) VALUES
('com01', 'adri', 'Me ha gustado mucho'),
('com02', 'samu', 'Lo recomiendo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `IDUSUARIO` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `TIPO` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `IDCOMPRA` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencias`
--

CREATE TABLE `experiencias` (
  `ID` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `TITULO` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `DESCB` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `DESCG` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `FOTO` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `COMENTARIO` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `CREADOR` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `FECHAINI` date DEFAULT NULL,
  `FECHAFIN` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `experiencias`
--

INSERT INTO `experiencias` (`ID`, `TITULO`, `DESCB`, `DESCG`, `FOTO`, `COMENTARIO`, `CREADOR`, `FECHAINI`, `FECHAFIN`) VALUES
('exp01', 'caribe', 'playas bonitas', 'Viajamos dees el 31 de junio hasta el 6 de juio...', 'foto1', 'com01', 'adri', '0000-00-00', '2018-07-06'),
('ruben1553553013', 'Viaje maravillo', 'RealicÃ© un viaje genial con mis amigos y lo comparto', 'Hace unos meses realicÃ© uno de los viajes mas bonitos de mi vida, y no puedo evitar pensar en que el siguiente siga siendo asÃ­ de bueno.', NULL, NULL, 'ruben', NULL, NULL),
('ruben1553553075', 'China', 'China es un paÃ­s Ãºnico', 'Recomiendo encarecidamente a cualquiera que visite China, es un lugar genial, con una cultura muy rica.', NULL, NULL, 'ruben', NULL, NULL),
('ruben1553553133', 'Que pasa en Can', 'Hay una hora menos que en la peninsula', 'En Canarias se vive con una hora menos con respecto a la peninsula, pero si estÃ¡s preocupado por tener jetlag, no te afecta casi nada.', NULL, NULL, 'ruben', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto`
--

CREATE TABLE `foto` (
  `ID` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `NOMBRE` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `IMAGEN` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `foto`
--

INSERT INTO `foto` (`ID`, `NOMBRE`, `IMAGEN`) VALUES
('exc01', 'excursion2', ''),
('foto1', 'caribe', 0x6361726962652e6a7067);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intercombo`
--

CREATE TABLE `intercombo` (
  `IDACT` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `IDCOMBO` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intercomentario`
--

CREATE TABLE `intercomentario` (
  `ID` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `IDCOMENT` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `TIPO` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intereses`
--

CREATE TABLE `intereses` (
  `IDUSUARIO` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `IDINTERES` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `TIPO` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interfoto`
--

CREATE TABLE `interfoto` (
  `ID` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `IDFOTO` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `TIPO` varchar(15) COLLATE utf8_spanish_ci NOT NULL
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
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `NICK` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `NOMBRE` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `APELLIDOS` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `PASSWORD` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `MAIL` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `TELEFONO` int(12) NOT NULL,
  `TIPO` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `PUNTOS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`NICK`, `NOMBRE`, `APELLIDOS`, `PASSWORD`, `MAIL`, `TELEFONO`, `TIPO`, `PUNTOS`) VALUES
('adri', 'adri', 'agudo', 'adri', 'adri@gmail.com', 651234123, 'admin', 0),
('ruben', 'ruben', 'ruben', 'ruben', 'ruben', 0, '', 0),
('samu', 'samu', 'solo', 'samu', 'samu@gmail.com', 651232133, 'admin', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

CREATE TABLE `viaje` (
  `ID` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
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
-- Volcado de datos para la tabla `viaje`
--

INSERT INTO `viaje` (`ID`, `TITULO`, `DESCB`, `DESCG`, `FOTO`, `COMENTARIO`, `CREADOR`, `FECHAINI`, `FECHAFIN`, `PRECIO`) VALUES
('via01', 'caribe', '', '', 'foto1', 'com01', 'adri', '0000-00-00', '0000-00-00', 0);

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
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD KEY `IDUSUARIO` (`IDUSUARIO`);

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
-- Indices de la tabla `intereses`
--
ALTER TABLE `intereses`
  ADD KEY `IDUSUARIO` (`IDUSUARIO`);

--
-- Indices de la tabla `interfoto`
--
ALTER TABLE `interfoto`
  ADD KEY `ID` (`ID`,`IDFOTO`,`TIPO`),
  ADD KEY `TIPO` (`TIPO`),
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
  ADD CONSTRAINT `actividad_ibfk_1` FOREIGN KEY (`FOTO`) REFERENCES `foto` (`ID`),
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
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`IDUSUARIO`) REFERENCES `usuario` (`NICK`);

--
-- Filtros para la tabla `experiencias`
--
ALTER TABLE `experiencias`
  ADD CONSTRAINT `experiencias_ibfk_1` FOREIGN KEY (`FOTO`) REFERENCES `foto` (`ID`),
  ADD CONSTRAINT `experiencias_ibfk_2` FOREIGN KEY (`CREADOR`) REFERENCES `usuario` (`NICK`),
  ADD CONSTRAINT `experiencias_ibfk_3` FOREIGN KEY (`COMENTARIO`) REFERENCES `comentario` (`ID`);

--
-- Filtros para la tabla `intercombo`
--
ALTER TABLE `intercombo`
  ADD CONSTRAINT `intercombo_ibfk_1` FOREIGN KEY (`IDCOMBO`) REFERENCES `combo` (`ID`),
  ADD CONSTRAINT `intercombo_ibfk_2` FOREIGN KEY (`IDACT`) REFERENCES `actividad` (`ID`);

--
-- Filtros para la tabla `intercomentario`
--
ALTER TABLE `intercomentario`
  ADD CONSTRAINT `intercomentario_ibfk_1` FOREIGN KEY (`IDCOMENT`) REFERENCES `comentario` (`ID`);

--
-- Filtros para la tabla `intereses`
--
ALTER TABLE `intereses`
  ADD CONSTRAINT `intereses_ibfk_1` FOREIGN KEY (`IDUSUARIO`) REFERENCES `usuario` (`NICK`);

--
-- Filtros para la tabla `interfoto`
--
ALTER TABLE `interfoto`
  ADD CONSTRAINT `interfoto_ibfk_1` FOREIGN KEY (`IDFOTO`) REFERENCES `foto` (`ID`);

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
  ADD CONSTRAINT `viaje_ibfk_1` FOREIGN KEY (`FOTO`) REFERENCES `foto` (`ID`),
  ADD CONSTRAINT `viaje_ibfk_2` FOREIGN KEY (`CREADOR`) REFERENCES `usuario` (`NICK`),
  ADD CONSTRAINT `viaje_ibfk_3` FOREIGN KEY (`COMENTARIO`) REFERENCES `comentario` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
