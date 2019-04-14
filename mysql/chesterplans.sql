-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-04-2019 a las 23:35:45
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

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`ID`, `TITULO`, `DESCB`, `DESCG`, `FOTO`, `COMENTARIO`, `CREADOR`, `FECHA`, `PRECIO`) VALUES
('adri1555273544', 'Paseo en canoa', 'Divertido viaje en canoa por el rio', 'Ven con nosotros a disfrutar de un viaje en canoa por el rio, con un instructor que te ayudará en todo lo que necesites.\r\nEl equipamiento está incluido.', NULL, NULL, 'adri', '2019-04-29', 60),
('adri1555273688', 'Salto en paracaidas', 'Un paseo por las nubes... hacia el suelo.', 'Salta con nosotros desde un avión y prepárate para el mayor subidón de adrenalina de tu vida.\r\nNo te arrepentirás y seguro que te quedarás con ganas de repetir.', NULL, NULL, 'adri', '2019-05-05', 120),
('adri1555273770', 'Paseo a caballo', 'Date un relajante paseo a caballo por el campo.', 'Si te apetece un plan fuera de lo común no dudes en dar un paseo a caballo con nosotros. No hace falta que te traigas el caballo, lo ponemos nosotros. Solo tienes que traer ganas de divertirte.', NULL, NULL, 'adri', '2019-04-27', 40),
('adri1555273875', 'Vuelta en deportivo', 'Prueba la mayor experiencia de velocidad', 'Te ofrecemos un par de vueltas en un circuito profesional, con un deportivo de alta gama.\r\nPodrás disfrutar de la sensación de velocidad que ofrece esta experiencia.', NULL, NULL, 'adri', '2019-05-24', 100),
('adri1555273947', 'Bolera', 'Dos pases para la bolera', 'Ven a divertirte en un día de bolera sin igual.\r\nTe ofrecemos dos pases de día completo en la bolera, con los que podrás disfrutar de unas partidas de bolos con quien tu mas quieras.', NULL, NULL, 'adri', '2019-06-07', 30),
('adri1555274092', 'Degustación de vino', 'Cata de vinos profesional', 'En esta cata de vinos podrás ser un gourmet de los mejores caldos de la península.\r\nTendrás a tu disposición, además, a varios expertos que te guiarán en la cata.\r\nNo te lo pierdas.', NULL, NULL, 'adri', '2019-04-16', 90),
('adri1555274178', 'Cine para dos', 'Ven al cine con quién tu más quieras... o ven dos veces.', 'Ofrecemos dos entradas de cine para el cine que desees. No desaproveches esta oportunidad de ver tus películas preferidas a muy buen precio.', NULL, NULL, 'adri', '2019-06-20', 15);

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

--
-- Volcado de datos para la tabla `combo`
--

INSERT INTO `combo` (`ID`, `CREADOR`, `VIAJE`, `ACTIVIDAD`, `PRECIO`, `NOMBREVIAJE`) VALUES
('asdf1234', 'adri', 'adri1555275879', NULL, 450, 'Granada'),
('ckasiend254424', 'adri', 'adri1555275802', NULL, 1500, 'Antipodas'),
('cmb45678', 'adri', 'adri1555276268', NULL, 800, 'Berlín');

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
-- Estructura de tabla para la tabla `experiencias`
--

CREATE TABLE `experiencias` (
  `ID` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `TITULO` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `DESCB` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `DESCG` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `FOTO` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `COMENTARIO` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `CREADOR` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `FECHAINI` date DEFAULT NULL,
  `FECHAFIN` date DEFAULT NULL,
  `likes` int(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `experiencias`
--

INSERT INTO `experiencias` (`ID`, `TITULO`, `DESCB`, `DESCG`, `FOTO`, `COMENTARIO`, `CREADOR`, `FECHAINI`, `FECHAFIN`, `likes`) VALUES
('andrea1555275491', 'No os perdáis el concierto', 'Os recomiendo el mejor concierto que podeis ver en Madrid', 'No os lo perdais', NULL, NULL, 'andrea', NULL, NULL, 3),
('ari1555275216', 'Me encanta Madrid', 'De Madrid al cielo', 'Madrid es una ciudad impresionante a la hora de hacer turismo. Ni en un mes de vacaciones podrías visitar todo.', NULL, NULL, 'ari', NULL, NULL, 1),
('esti1555275416', 'Nada como Bilbao', 'Me encanta Bilbao, es increible', 'No hay sitio como Bilbao. La comida es genial, y el ambiente es buenisimo. Lo recomiendo encarecidamente a todo el mundo.', NULL, NULL, 'esti', NULL, NULL, 2),
('lucia1555275309', 'Nueva York', 'Nueva York es increible y quiero volver', 'Estuve en Nueva York el mes pasado, y no tengo suficientes palabras para describir lo muchísimo que me gustó.', NULL, NULL, 'lucia', NULL, NULL, 1),
('ruben1555274337', 'Mis paseos por el Retiro', 'En esta entrada describo mis paseos por el parque del Retiro', 'Ir por el parque del Retiro es una gozada. Da igual la época del año en que vayas, siempre es digno de ver. Con suerte hasta te puedes encontrar con una ardilla.', NULL, NULL, 'ruben', NULL, NULL, 3),
('ruben1555274459', 'Hice senderismo', 'Describo mi experiencia como senderista', 'Me fui a la Pedriza, a realizar una ruta de senderismo.\r\nFue una experiencia dura, porque no estaba acostumbrado a tanta caminata, pero valió la pena.', NULL, NULL, 'ruben', NULL, NULL, 1),
('ruben1555274937', 'Me perdí en el bosque', 'Me perdí en el bosque cuando era pequeño', 'Cuando era niño me adentré demasiado en el bosque, y cuando quise volver no encontraba el camino.\r\nAl final todo salió bien y me encontraron.', NULL, NULL, 'ruben', NULL, NULL, 2),
('samu1555275043', 'Visité la Alhambra', 'Fui a Granada y visite la Alhambra', 'En Granada está la conocida Alhambra, que es su monumento mas famoso. Me encantó el patio de los leones.', NULL, NULL, 'samu', NULL, NULL, 2),
('samu1555275108', 'Mi viaje a Barcelona', 'Estuve en Barcelona y me gustó', 'Barcelona es una ciudad maravillosa. No esperaba que me fuese a gustar tanto, pero lo hizo.', NULL, NULL, 'samu', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto`
--

CREATE TABLE `foto` (
  `ID` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `NOMBRE` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `IMAGEN` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intercombo`
--

CREATE TABLE `intercombo` (
  `IDACT` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `IDCOMBO` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `intercombo`
--

INSERT INTO `intercombo` (`IDACT`, `IDCOMBO`) VALUES
('adri1555273544', 'asdf1234'),
('adri1555273688', 'asdf1234'),
('adri1555273947', 'ckasiend254424'),
('adri1555273947', 'cmb45678'),
('adri1555274092', 'asdf1234'),
('adri1555274092', 'ckasiend254424'),
('adri1555274178', 'cmb45678');

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
  `ID` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `IDFOTO` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
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
-- Estructura de tabla para la tabla `megustas`
--

CREATE TABLE `megustas` (
  `nickusuario` varchar(50) NOT NULL,
  `idexperiencia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `megustas`
--

INSERT INTO `megustas` (`nickusuario`, `idexperiencia`) VALUES
('adri', 'andrea1555275491'),
('adri', 'ari1555275216'),
('adri', 'lucia1555275309'),
('adri', 'ruben1555274337'),
('adri', 'ruben1555274937'),
('ruben', 'andrea1555275491'),
('ruben', 'esti1555275416'),
('ruben', 'ruben1555274337'),
('ruben', 'samu1555275043'),
('ruben', 'ruben1555274459'),
('ruben', 'samu1555275108'),
('andrea', 'andrea1555275491'),
('andrea', 'esti1555275416'),
('andrea', 'ruben1555274337'),
('andrea', 'ruben1555274937'),
('andrea', 'samu1555275043');

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
  `PUNTOS` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`NICK`, `NOMBRE`, `APELLIDOS`, `PASSWORD`, `MAIL`, `TELEFONO`, `TIPO`, `PUNTOS`) VALUES
('adri', 'adrian', 'agudo', '$2y$10$Q50hSqbXSdPrjkP4qqp8Wu9Smhv6GKKF3vd4DmJfXRpNbVWAeIttu', 'adrian@ucm.es', 12356, 'empresa', 0),
('andrea', 'andrea', 'lopez', '$2y$10$pEDRdScx5C/FOCvi7n7HRupynF53zp3cocaNLmN/Nj1BFD3NTwTHK', 'andrea@ucm.es', 7864432, 'basico', 3),
('ari', 'arantxa', 'brock', '$2y$10$T4gbIRvuvcxEjPPSmFJwHO0vQaEz/LUvaF0fJuNIJiM8KDbGHX6h.', 'ari@ucm.es', 2871832, 'basico', 1),
('esti', 'estibaliz', 'busto', '$2y$10$E5XdhwV6cdwQgBK4Ql1I/eTSlqxjCKMIRX7Xq3cekGAC6LMxK3Aoa', 'esti@ucm.es', 1234567, 'basico', 2),
('lucia', 'lucia', 'perez', '$2y$10$qvFhXAG64Bs5UvK4/Uxdf.v3F650czIC/9838MT/S2Oq2MlZ2THoa', 'lucia@ucm.es', 4597527, 'basico', 1),
('luis', 'luis', 'lopez', '$2y$10$L9hqJprd/90/QZroZX0EleuU0F6ImH0meivp1FrPn5X6oS.M1pp5a', 'luis@ucm.es', 85748914, 'basico', 0),
('manu', 'manuel', 'garcia', '$2y$10$id.hUVT8pDkTmAwf1dSKNeixdJvnZzkj0gSWdFp0HJVSxRyQmrmM6', 'manu@ucm.es', 75823482, 'basico', 0),
('nati', 'natalia', 'bermudez', '$2y$10$HFnM5G0hZ5T0qnOu.d50o.vubyKq7rcxriLudrFWrbS7m7yt3m4RG', 'nati@ucm.es', 3578185, 'basico', 0),
('pepe', 'pepe', 'garcia', '$2y$10$R62FJCRvyyA23UjM/KPUrewjBBW/WWTdS0Lympu6UPDErCDf8OKxy', 'pepe@ucm.es', 2147483647, 'basico', 0),
('ruben', 'ruben', 'peña', '$2y$10$oL23XtllYFgoYUDoS9dVV.6TaJgHtByRB1uvoJGPRFUxUrZ3/tM52', 'ruben@ucm.es', 1234567, 'basico', 6),
('samu', 'samuel', 'solo', '$2y$10$ZE0610vX9z7ZgkPbZGk5ue.pri7URRIqIMgz1ZHBKUhrNRq/Fqeee', 'samu@ucm.es', 4567891, 'basico', 3);

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
-- Volcado de datos para la tabla `viaje`
--

INSERT INTO `viaje` (`ID`, `TITULO`, `DESCB`, `DESCG`, `FOTO`, `COMENTARIO`, `CREADOR`, `FECHAINI`, `FECHAFIN`, `PRECIO`) VALUES
('adri1555275802', 'Antipodas', 'Viaja a las Antípodas', 'No puedes desaprovechar la oportunidad de viajar con nosotros a las Antípodas.', NULL, NULL, 'adri', '2019-04-11', '2019-04-29', 730),
('adri1555275879', 'Granada', 'Viaje a Granada por todo lo alto', 'Viaja con nosotros y ven a ver la maravillosa Alhambra con una buena cervecita.', NULL, NULL, 'adri', '2019-04-21', '2019-04-24', 110),
('adri1555275938', 'Marruecos', 'Un viaje exótico a Marruecos', 'Te lo pasarás genial en este viaje. Es una oportunidad que no puedes perder.', NULL, NULL, 'adri', '2019-05-04', '2019-05-22', 230),
('adri1555276145', 'París', 'Viaja a la ciudad del amor', 'Te ofrecemos el mejor precio para pasar un par de semanas románticas en París.', NULL, NULL, 'adri', '2019-05-04', '2019-05-27', 435),
('adri1555276268', 'Berlín', 'Un mes por Berlín', 'Mejor precio imposible. No dudes en obtener esta oferta.', NULL, NULL, 'adri', '2019-06-15', '2019-07-20', 463),
('adri1555276343', 'Rio de Janeiro', 'Viaja al paraiso', 'No se nos ocurre mejor viaje para tomarse un merecido descanso.', NULL, NULL, 'adri', '2019-04-29', '2019-05-03', 860);

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
-- Indices de la tabla `megustas`
--
ALTER TABLE `megustas`
  ADD KEY `nickusuario` (`nickusuario`),
  ADD KEY `idexperiencia` (`idexperiencia`);

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
