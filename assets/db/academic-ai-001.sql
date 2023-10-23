-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-10-2023 a las 13:59:56
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `academic-ai-001`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `question`
--

CREATE TABLE `question` (
  `id` bigint(20) NOT NULL,
  `subject_id` bigint(20) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `question`
--

INSERT INTO `question` (`id`, `subject_id`, `description`, `creation_date`) VALUES
(1, 2, 'Describa varios sistemas de numeración antiguos y compare su practicidad', '0000-00-00 00:00:00'),
(2, 2, '¿Los sistemas de numeración antiguos hubieran permitido la evolución de las matemáticas?', '0000-00-00 00:00:00'),
(3, 2, '¿Qué es un sistema de numeración?', '0000-00-00 00:00:00'),
(4, 2, '¿Cuáles son los sistemas numéricos usados en informática?', '0000-00-00 00:00:00'),
(5, 2, '¿Cuál es el sistema numérico predominante en los dispositivos electrónicos, entre ellos el computador?', '0000-00-00 00:00:00'),
(6, 2, '¿Cuáles son los pasos para convertir de una base a otra?', '0000-00-00 00:00:00'),
(7, 2, '¿Cuál es el sistema de numeración más importante?', '0000-00-00 00:00:00'),
(8, 2, '¿Qué resultado entrega la siguiente expresión? 111011112 - 100111102<= 7A16', '0000-00-00 00:00:00'),
(9, 2, '¿Cuál es el valor de verdad de esta expresión? (3-522 >7+42)(9343<78-205) ', '0000-00-00 00:00:00'),
(10, 2, '¿Cuántos números primos hay entre 1 y 25, entre 26 y 50, 51 y 75, 76 y 100? ¿Cómo se comporta el patrón, disminuyen o aumentan en cada intervalo?', '0000-00-00 00:00:00'),
(11, 2, '¿Cómo se aplican los sistemas numéricos en las ciencias computacionales?', '0000-00-00 00:00:00'),
(12, 2, '¿Qué importancia tiene la lógica matemática en la informática? ¿Cómo se aplica ésta en computación?', '0000-00-00 00:00:00'),
(13, 2, '¿En lógica proposicional, qué es una tautología, una contradicción y una indeterminación?', '0000-00-00 00:00:00'),
(14, 2, '¿Qué métodos de demostración existen en lógica proposicional para saber si una proposición es una tautología, una contradicción y una indeterminación?', '0000-00-00 00:00:00'),
(15, 2, 'Indicar si la siguiente expresión es una tautología, contradicción o incertidumbre:', '0000-00-00 00:00:00'),
(16, 2, 'Indicar si la siguiente expresión es una tautología, contradicción o incertidumbre: (v) Y (No (f) O (f)) ', '0000-00-00 00:00:00'),
(17, 2, 'Indicar si la siguiente expresión es verdadera, falsa o no tiene sentido: (f) O No (No (\"a\">\"b\")) Y (5*-8<0)', '0000-00-00 00:00:00'),
(18, 2, 'Determine el valor de verdad de la siguiente expresión si:a=(f), b=(v), c=(v); No(a) Y No(b O (c No(a))) ', '0000-00-00 00:00:00'),
(19, 2, 'Falso o verdadero; justifique. Sabiendo que p(qr) es falsa, entonces el valor de verdad de [p(qr)] es verdadero', '0000-00-00 00:00:00'),
(20, 2, 'Falso o verdadero; justifique. Sabiendo que r es falsa y p(qr) es verdadera, entonces el valor de verdad de r(qp) es falso', '0000-00-00 00:00:00'),
(21, 2, 'Falso o verdadero; justifique. Si la proposición qp es falsa, entonces la proposición pq es verdadera', '0000-00-00 00:00:00'),
(22, 2, 'Falso o verdadero', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `question_selected`
--

CREATE TABLE `question_selected` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `subject_id` bigint(20) NOT NULL,
  `questions` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `question_selected`
--

INSERT INTO `question_selected` (`id`, `user_id`, `subject_id`, `questions`, `creation_date`) VALUES
(1, 2, 1, '17,12', '2023-10-23 07:28:16'),
(2, 2, 2, '1,5', '2023-10-23 07:54:45'),
(3, 3, 2, '17,5', '2023-10-23 07:56:47'),
(4, 3, 1, '19,14', '2023-10-23 08:13:16'),
(5, 5, 2, '18,20', '2023-10-23 08:19:06'),
(6, 5, 4, '9,20', '2023-10-23 08:28:21'),
(7, 5, 1, '2,11', '2023-10-23 08:54:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subject`
--

CREATE TABLE `subject` (
  `id` bigint(20) NOT NULL,
  `description` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `subject`
--

INSERT INTO `subject` (`id`, `description`, `creation_date`) VALUES
(1, 'Lógica de programación', '2023-09-25 19:59:49'),
(2, 'Lógica matemática / Matemáticas discretas', '2023-09-25 19:59:49'),
(3, 'Sistemas de información', '2023-09-25 19:59:58'),
(4, 'Cálculo I', '2023-10-15 22:24:27'),
(5, 'Programación web', '2023-10-22 19:28:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `code` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `code`, `first_name`, `last_name`, `creation_date`) VALUES
(1, '473492', 'Emmanuel ', 'Agudelo Gaviria', '2023-09-25 19:53:50'),
(2, '289167', 'Juan Felipe', 'Agudelo Valencia', '2023-09-25 19:53:50'),
(3, '478167', 'Jorman Andrés', 'Arboleda Aguirre', '2023-09-25 19:53:50'),
(4, '469761', 'Yorman Andrey', 'Eusse Giraldo', '2023-09-25 19:53:50'),
(5, '255584', 'Saray Dahiana', 'Garcia Usme', '2023-09-25 19:53:50'),
(6, '437022', 'Juan Jose', 'Gonzalez Cardona', '2023-09-25 19:53:50'),
(7, '356568', 'Andrea Carolina', 'Herrera Villa', '2023-09-25 19:53:50'),
(8, '470075', 'Juan Manuel', 'Hoyos Aguirre', '2023-09-25 19:53:50'),
(9, '470149', 'David ', 'Jimenez Gonzalez', '2023-09-25 19:53:50'),
(10, '288410', 'Vanesa ', 'Jiménez Toro', '2023-09-25 19:53:50'),
(11, '479509', 'JHON ARBEY', 'MONTOYA TEJADA', '2023-09-25 19:53:50'),
(12, '306509', 'Alejandro ', 'Ortiz Castaño', '2023-09-25 19:53:50'),
(13, '475625', 'Santiago ', 'Perez Cardona', '2023-09-25 19:53:50'),
(14, '457092', 'Edwin Enrique', 'Plata Jimenez', '2023-09-25 19:53:50'),
(15, '470092', 'Juan Sebastian', 'Pulgarin Patiño', '2023-09-25 19:53:50'),
(16, '350495', 'Estiven ', 'Quintero Avendaño', '2023-09-25 19:53:50'),
(17, '467862', 'Jarrison Alexander', 'Quintero Castillo', '2023-09-25 19:53:50'),
(18, '478320', 'Emmanuel ', 'Quintero Valencia', '2023-09-25 19:53:50'),
(19, '441534', 'Juan David', 'Quinto Cuesta', '2023-09-25 19:53:50'),
(20, '475328', 'Jhoyder Andres', 'Ramírez Guerrero', '2023-09-25 19:53:50'),
(21, '470070', 'Santiago Jose', 'Reina Pantoja', '2023-09-25 19:53:50'),
(22, '352387', 'Jonier Julian', 'Rodriguez Morales', '2023-09-25 19:53:50'),
(23, '359929', 'Jorge Andres', 'Rojas Henao', '2023-09-25 19:53:50'),
(24, '470018', 'ARLEN STIVEN', 'RUIZ PRESIGA', '2023-09-25 19:53:50'),
(25, '462594', 'Victor Manuel', 'Salas Martinez', '2023-09-25 19:53:50'),
(26, '304095', 'Laura Ximena', 'Zapata Múnera', '2023-09-25 19:53:50'),
(27, '473928', 'Daniel ', 'Alvarez Moncada', '2023-09-25 19:53:50'),
(28, '476589', 'Ana Sofia', 'Arango Cano', '2023-09-25 19:53:50'),
(29, '349484', 'Jeferson Arley', 'Ardila Cardona', '2023-09-25 19:53:50'),
(30, '467807', 'Jhonatan ', 'Atehortua Montoya', '2023-09-25 19:53:50'),
(31, '251626', 'Camilo ', 'Barrientos Barrientos', '2023-09-25 19:53:50'),
(32, '456156', 'Santiago ', 'Betancourt Piedrahita', '2023-09-25 19:53:50'),
(33, '353582', 'Jimmy Andres', 'Bustamante Gomez', '2023-09-25 19:53:50'),
(34, '470112', 'Carlos Augusto', 'Duque Calle', '2023-09-25 19:53:50'),
(35, '348086', 'Juan Pablo', 'Galeano Bonilla', '2023-09-25 19:53:50'),
(36, '251992', 'Dany Yuliana', 'Garces Sanchez', '2023-09-25 19:53:50'),
(37, '160992', 'Carlos Andres', 'Giraldo Gonzalez', '2023-09-25 19:53:50'),
(38, '472567', 'Luis Alberto', 'Gomez Orrego', '2023-09-25 19:53:50'),
(39, '304343', 'Sebastian ', 'Herrera Argumedo', '2023-09-25 19:53:50'),
(40, '155412', 'Juan Pablo', 'Herrera Cuartas', '2023-09-25 19:53:50'),
(41, '470109', 'Cristian ', 'Higuera Restrepo', '2023-09-25 19:53:50'),
(42, '350134', 'Sara ', 'Jaramillo Florez', '2023-09-25 19:53:50'),
(43, '464398', 'Juan Pablo', 'Ortiz Gomez', '2023-09-25 19:53:50'),
(44, '289974', 'Alvaro Andres', 'Pelaez Castaño', '2023-09-25 19:53:50'),
(45, '281413', 'Victor Manuel', 'Quiroz Ibarra', '2023-09-25 19:53:50'),
(46, '463782', 'Jhorman ', 'Romaña Lemus', '2023-09-25 19:53:50'),
(47, '470037', 'Sebastian ', 'Rosario Guisao', '2023-09-25 19:53:50'),
(48, '461188', 'Erica Johana', 'Valoyes Vivas', '2023-09-25 19:53:50'),
(50, '467135', 'Yenny Tatiana', 'Barrera Guzman', '2023-09-25 19:53:50'),
(51, '466783', 'Miguel Angel', 'Bedoya Vasquez', '2023-09-25 19:53:50'),
(52, '444007', 'Thomas ', 'Calle Durango', '2023-09-25 19:53:50'),
(53, '438219', 'José Fernando', 'Cardona Bedoya', '2023-09-25 19:53:50'),
(55, '474278', 'Kelly Yohana', 'Garcia Arroyave', '2023-09-25 19:53:50'),
(56, '474795', 'Daniel ', 'Giraldo Hurtado', '2023-09-25 19:53:50'),
(57, '460741', 'Juan Jose', 'Mazo Bedoya', '2023-09-25 19:53:50'),
(63, '451401', 'Santiago ', 'Quiroz Higuita', '2023-09-25 19:53:50'),
(65, '472563', 'Julián Esteban', 'Serna Varela', '2023-09-25 19:53:50'),
(66, '480996', 'Neider ', 'Uribe Valencia', '2023-09-25 19:53:50'),
(67, '469663', 'Alejandro ', 'Urrego Cifuentes', '2023-09-25 19:53:50'),
(68, '281748', 'Diego Alejandro', 'Vahos Sanchez', '2023-09-25 19:53:50'),
(69, '467944', 'Miguel Angel', 'Velez Gomez', '2023-09-25 19:53:50'),
(70, '476398', 'Julian Santiago', 'Villegas Castaño', '2023-09-25 19:53:50'),
(74, '463324', 'Pablo José', 'Bedoya Chica', '2023-09-25 19:53:50'),
(77, '259278', 'Víctor Manuel', 'Florez Taborda', '2023-09-25 19:53:50'),
(78, '470151', 'Miguel Angel', 'Garcia Metaute', '2023-09-25 19:53:50'),
(79, '349571', 'Deysi Lorena', 'Gomez Orrego', '2023-09-25 19:53:50'),
(80, '101010', 'Sandra Milena', 'Gonzalez Madrid', '2023-09-25 19:53:50'),
(82, '473621', 'Anderson Javier', 'Largo Ortiz', '2023-09-25 19:53:50'),
(83, '396179', 'Viviana ', 'Moreno Sierra', '2023-09-25 19:53:50'),
(87, '478712', 'Laura Vanesa', 'Uribe Franco', '2023-09-25 19:53:50');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `frg_subject_id` (`subject_id`);

--
-- Indices de la tabla `question_selected`
--
ALTER TABLE `question_selected`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_user_id` (`user_id`),
  ADD KEY `idx_subject_id` (`subject_id`);

--
-- Indices de la tabla `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_description` (`description`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_code` (`code`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `question`
--
ALTER TABLE `question`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `question_selected`
--
ALTER TABLE `question_selected`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `subject`
--
ALTER TABLE `subject`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
