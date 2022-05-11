-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-02-2022 a las 22:10:49
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ciitesg`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `idAutor` int(5) NOT NULL,
  `nomAutor` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `primerApellidoA` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `segundoApellidoA` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nacionalidad` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`idAutor`, `nomAutor`, `primerApellidoA`, `segundoApellidoA`, `nacionalidad`) VALUES
(1, 'Juan', 'Pérez', 'López', 'Mexicana'),
(2, 'Leithold', 'Jasson', 'n/a', 'EU');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `idCarrera` int(5) NOT NULL,
  `nomCarrera` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descCarrera` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`idCarrera`, `nomCarrera`, `descCarrera`) VALUES
(1, 'Sistemas Computacionales', 'Ingeniería en Sistemas Computacionales'),
(2, 'Alimentarias', 'Ingeniería en Industrias Alimentarias'),
(3, 'Mecatrónica', 'Ingeniería en Mecatrónica'),
(4, 'Industrial', 'Ingeniería Industrial'),
(5, 'Gestión', 'Nueva carrera'),
(6, 'Tronco', 'Aplica a todas las carreras'),
(8, 'N/A', 'Fuera del área académica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centroinformacion`
--

CREATE TABLE `centroinformacion` (
  `idCentroi` int(5) NOT NULL,
  `nombreCentroi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dircentroi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descCentroi` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `centroinformacion`
--

INSERT INTO `centroinformacion` (`idCentroi`, `nombreCentroi`, `dircentroi`, `descCentroi`) VALUES
(1, 'Centro de Información ITESG', 'Carretera Guanajuato a Puentecillas km 10.5 Predio El Carmen', 'Trabajo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colecciones`
--

CREATE TABLE `colecciones` (
  `idColeccion` int(5) NOT NULL,
  `nomColeccion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descColeccion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `idCentroi` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `colecciones`
--

INSERT INTO `colecciones` (`idColeccion`, `nomColeccion`, `descColeccion`, `idCentroi`) VALUES
(1, 'Acervo', 'Textos escolares, obras literarias, legislación.', 1),
(2, 'Tesis', 'De Licenciatura.', 1),
(3, 'Revistas', 'Divulgación científica.', 1),
(4, 'Digital', 'CD Rom: complementos de libros, libros digitales, ', 1),
(5, 'Didácticos', 'Ajedrez, scrable.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editoriales`
--

CREATE TABLE `editoriales` (
  `idEditorial` int(5) NOT NULL,
  `nomEditorial` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `paisEditorial` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `descEditorial` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `editoriales`
--

INSERT INTO `editoriales` (`idEditorial`, `nomEditorial`, `paisEditorial`, `descEditorial`) VALUES
(1, 'Omega', 'México', 'Alfa Omega'),
(2, 'Prentice Hall', 'EU', 'AlgoO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `idLibro` int(5) NOT NULL,
  `fechaLibro` date NOT NULL,
  `tipoLibro` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `noAdquiLibro` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `noClasificLibro` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `noEjemplarL` int(5) NOT NULL,
  `tomoLibro` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `descLibro` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `estatusLibro` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `disponibleLibro` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `edicionLibro` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `idColeccion` int(5) NOT NULL,
  `idTitulo` int(5) NOT NULL,
  `idEditorial` int(5) NOT NULL,
  `idCarrera` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`idLibro`, `fechaLibro`, `tipoLibro`, `noAdquiLibro`, `noClasificLibro`, `noEjemplarL`, `tomoLibro`, `descLibro`, `estatusLibro`, `disponibleLibro`, `edicionLibro`, `idColeccion`, `idTitulo`, `idEditorial`, `idCarrera`) VALUES
(1, '2022-02-01', 'Adquirido', '0', '0', 1, '1', 'Fundamento de química', 'Recepción', 'Si', '1', 1, 1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro_autor`
--

CREATE TABLE `libro_autor` (
  `idLibroAutor` int(5) NOT NULL,
  `idLibro` int(5) NOT NULL,
  `idAutor` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `libro_autor`
--

INSERT INTO `libro_autor` (`idLibroAutor`, `idLibro`, `idAutor`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `idPermiso` int(5) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `pw` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `idCentroi` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`idPermiso`, `nombre`, `usuario`, `tipo`, `pw`, `foto`, `idCentroi`) VALUES
(1, 'Luz', 'LEI', 'Administrador', '12345678', 'images/FotoPerfil.png', 1),
(2, 'Ejemplo', 'Ejemplo', 'Editor', '159753', 'images/El.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `idSolicitud` int(5) NOT NULL,
  `folioSolicitud` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fechaSolicitud` date NOT NULL,
  `tipoSolicitud` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `estatusSolicitud` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `vigenciaSolicitud` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudusuario`
--

CREATE TABLE `solicitudusuario` (
  `idSolUsuario` int(5) NOT NULL,
  `idSolicitud` int(5) NOT NULL,
  `idUsuario` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titulos`
--

CREATE TABLE `titulos` (
  `idTitulo` int(5) NOT NULL,
  `nomTitulo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descTitulo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `consecutivoT` int(5) NOT NULL,
  `existenciaT` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `titulos`
--

INSERT INTO `titulos` (`idTitulo`, `nomTitulo`, `descTitulo`, `consecutivoT`, `existenciaT`) VALUES
(1, 'Química 1', 'Fundamentos de química', 1, 0),
(2, 'Algebra', 'Fundamentos de álgebra', 2, 0),
(3, 'Mecánica', 'Mecánica de materiales', 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(5) NOT NULL,
  `nomUsuario` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `paternoUsuario` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `maternoUsuario` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `noControl` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tipoUsuario` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `idCarrera` int(5) NOT NULL,
  `mailUsuario` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `curpUsuario` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `telUsuario` int(10) NOT NULL,
  `estatusUsuario` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dirUsuario` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `idCentroi` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nomUsuario`, `paternoUsuario`, `maternoUsuario`, `noControl`, `tipoUsuario`, `idCarrera`, `mailUsuario`, `curpUsuario`, `telUsuario`, `estatusUsuario`, `dirUsuario`, `idCentroi`) VALUES
(1, 'Luz', 'Zendejas', 'Chávez', '336', 'Estudiante', 1, 'lzendejas@itesg.edu.mx', 'dfdfdfvfdg', 1851201, 'Regular', 'Carr. Gto. Marfil km 10.5', 1),
(2, 'Sandra', 'Salas', 'Torres', '337', 'Editor', 6, 'difusion@itesg.edu.mx', 'ABC123', 2147483647, 'Regular', 'Guanajuato, Gto.', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`idAutor`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`idCarrera`);

--
-- Indices de la tabla `centroinformacion`
--
ALTER TABLE `centroinformacion`
  ADD PRIMARY KEY (`idCentroi`);

--
-- Indices de la tabla `colecciones`
--
ALTER TABLE `colecciones`
  ADD PRIMARY KEY (`idColeccion`),
  ADD KEY `idCentroi` (`idCentroi`);

--
-- Indices de la tabla `editoriales`
--
ALTER TABLE `editoriales`
  ADD PRIMARY KEY (`idEditorial`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`idLibro`),
  ADD KEY `idColeccion` (`idColeccion`),
  ADD KEY `idTitulo` (`idTitulo`),
  ADD KEY `idEditorial` (`idEditorial`),
  ADD KEY `idCarrera` (`idCarrera`);

--
-- Indices de la tabla `libro_autor`
--
ALTER TABLE `libro_autor`
  ADD PRIMARY KEY (`idLibroAutor`),
  ADD KEY `idLibro` (`idLibro`),
  ADD KEY `idAutor` (`idAutor`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`idPermiso`),
  ADD KEY `idCentroi` (`idCentroi`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`idSolicitud`);

--
-- Indices de la tabla `solicitudusuario`
--
ALTER TABLE `solicitudusuario`
  ADD PRIMARY KEY (`idSolUsuario`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idSolicitud` (`idSolicitud`);

--
-- Indices de la tabla `titulos`
--
ALTER TABLE `titulos`
  ADD PRIMARY KEY (`idTitulo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idCentroi` (`idCentroi`),
  ADD KEY `idCarrera` (`idCarrera`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `idAutor` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `idCarrera` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `centroinformacion`
--
ALTER TABLE `centroinformacion`
  MODIFY `idCentroi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `colecciones`
--
ALTER TABLE `colecciones`
  MODIFY `idColeccion` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `editoriales`
--
ALTER TABLE `editoriales`
  MODIFY `idEditorial` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `idLibro` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `libro_autor`
--
ALTER TABLE `libro_autor`
  MODIFY `idLibroAutor` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `idPermiso` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `idSolicitud` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `solicitudusuario`
--
ALTER TABLE `solicitudusuario`
  MODIFY `idSolUsuario` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `titulos`
--
ALTER TABLE `titulos`
  MODIFY `idTitulo` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `colecciones`
--
ALTER TABLE `colecciones`
  ADD CONSTRAINT `colecciones_ibfk_1` FOREIGN KEY (`idCentroi`) REFERENCES `centroinformacion` (`idCentroi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`idColeccion`) REFERENCES `colecciones` (`idColeccion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `libros_ibfk_2` FOREIGN KEY (`idTitulo`) REFERENCES `titulos` (`idTitulo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `libros_ibfk_3` FOREIGN KEY (`idEditorial`) REFERENCES `editoriales` (`idEditorial`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `libros_ibfk_4` FOREIGN KEY (`idCarrera`) REFERENCES `carreras` (`idCarrera`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `libro_autor`
--
ALTER TABLE `libro_autor`
  ADD CONSTRAINT `libro_autor_ibfk_1` FOREIGN KEY (`idLibro`) REFERENCES `libros` (`idLibro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `libro_autor_ibfk_2` FOREIGN KEY (`idAutor`) REFERENCES `autores` (`idAutor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`idCentroi`) REFERENCES `centroinformacion` (`idCentroi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `solicitudusuario`
--
ALTER TABLE `solicitudusuario`
  ADD CONSTRAINT `solicitudusuario_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitudusuario_ibfk_2` FOREIGN KEY (`idSolicitud`) REFERENCES `solicitudes` (`idSolicitud`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idCentroi`) REFERENCES `centroinformacion` (`idCentroi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`idCarrera`) REFERENCES `carreras` (`idCarrera`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
