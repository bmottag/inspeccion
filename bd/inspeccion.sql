-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-03-2018 a las 13:28:20
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inspeccion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `param_rol`
--

CREATE TABLE `param_rol` (
  `id_rol` int(1) NOT NULL,
  `rol_name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `param_rol`
--

INSERT INTO `param_rol` (`id_rol`, `rol_name`, `description`) VALUES
(1, 'SUPER ADMIN', 'Con acceso a todo el sistema');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `log_user` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `fk_id_rol` int(1) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `movil` varchar(12) NOT NULL,
  `password` varchar(50) NOT NULL,
  `state` int(1) NOT NULL DEFAULT '0' COMMENT '0: newUser; 1:active; 2:inactive',
  `photo` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `param_rol`
--
ALTER TABLE `param_rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `log_user` (`log_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_id_rol` (`fk_id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `param_rol`
--
ALTER TABLE `param_rol`
  MODIFY `id_rol` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
