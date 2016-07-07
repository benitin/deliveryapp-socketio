-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-07-2016 a las 01:49:02
-- Versión del servidor: 10.1.8-MariaDB
-- Versión de PHP: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `m17pedidos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `login` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `login`, `password`, `direccion`, `telefono`, `estado`) VALUES
(1, 'UAGRM', 'uagrm@uagrm.edu.bo', '*55DC98515159244E06DCD9E6333FD4C6CFA627C1', 'Av. Bush, 2do Anillo', '10101010', 1),
(2, 'SOE', 'soe@uagrm.edu.bo', '*503AEC0250EF85490F03842F0FCD8BAA5E61A057', 'Calle Nuflo de Chavez', '20202020', 1),
(3, 'Fair Play', 'fairplay@fairplay.com', '*D8603E744A6776371599FDD8E97A708B5086DCD3', 'Calle Colon S/N', '30303030', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntoentrega`
--

CREATE TABLE `puntoentrega` (
  `id` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `latitud` decimal(14,10) NOT NULL,
  `longitud` decimal(14,10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `puntoentrega`
--

INSERT INTO `puntoentrega` (`id`, `idCliente`, `nombre`, `direccion`, `latitud`, `longitud`) VALUES
(1, 1, 'Oficina Central', 'Av. Bush, 2do Anillo', '-17.7792786000', '-63.1900349000'),
(2, 1, 'CDP', 'C/Mexico, 1er Anillo', '-17.7785775000', '-63.1899428000'),
(3, 2, 'Oficina Central', 'Calle Nuflo de Chavez', '-17.7859889000', '-63.1804854000'),
(4, 3, 'Oficina Central', 'Calle Colon S/N', '-17.7849733000', '-63.1844612000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `test`
--

INSERT INTO `test` (`id`, `fecha`) VALUES
(1, '2016-07-04 19:06:12'),
(2, '2016-07-06 18:41:58'),
(3, '2016-07-06 18:45:05'),
(4, '2016-07-06 18:49:59'),
(5, '2016-07-06 18:50:19'),
(6, '2016-07-06 19:14:15'),
(7, '2016-07-06 19:30:46');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `puntoentrega`
--
ALTER TABLE `puntoentrega`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `puntoentrega`
--
ALTER TABLE `puntoentrega`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
