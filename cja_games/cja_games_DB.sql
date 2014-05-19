-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-05-2014 a las 08:46:01
-- Versión del servidor: 5.1.60-community
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cja_games`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin_users`
--

CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `enabled` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carts`
--

CREATE TABLE IF NOT EXISTS `carts` (
  `id` int(11) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carts_products`
--

CREATE TABLE IF NOT EXISTS `carts_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cart_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_id` (`cart_id`),
  KEY `prodd` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) DEFAULT NULL,
  `enable` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `description`, `enable`, `name`) VALUES
(11, 'aventura,selva,etc', 1, 'Aventura'),
(12, 'disparos,soldados,batalla.', 1, 'Guerra'),
(13, 'Carros,motos,etc', 1, 'Carreras'),
(14, 'Futbol,Baseball,Basket,etc.', 1, 'Deportes'),
(15, 'Educacion,etc', 1, 'Educativos'),
(16, 'Habilidad,Viveza,etc', 1, 'Estrategia'),
(17, 'Suspenso,terror,etc', 1, 'Horror'),
(18, 'Libre,pelea,etc', 1, 'Lucha');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `enabled` int(11) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_state` (`state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `cities`
--

INSERT INTO `cities` (`id`, `enabled`, `name`, `state_id`) VALUES
(1, 1, 'ciudad universitaria', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `credit_cards`
--

CREATE TABLE IF NOT EXISTS `credit_cards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expiration_date` datetime DEFAULT NULL,
  `name_on_card` varchar(30) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `type` enum('MasterCard','Visa','American Express') DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) DEFAULT NULL,
  `enabled` int(1) DEFAULT '0',
  `image` varchar(250) DEFAULT NULL,
  `in_stock` int(11) DEFAULT '0',
  `name` varchar(100) DEFAULT NULL,
  `price` decimal(18,0) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `description`, `enabled`, `image`, `in_stock`, `name`, `price`, `category_id`) VALUES
(23, 'Forma parte de F.E.A.R, un grupo militar especialista en misiones asociadas a fenÃ³menos paranormal', 1, 'Games_Categories/Horror/Fear/game_0.jpg', 196, 'Fear', '300', 17),
(40, 'robots', 1, 'Games_Categories/Aventura/Mini Robot Wars/game_0.jpg', 12, 'Mini Robot Wars', '12', 11),
(41, 'disparos', 1, 'Games_Categories/Guerra/AngryBot/game_0.jpg', 24, 'AngryBot', '67', 12),
(42, 'lucha libre', 1, 'Games_Categories/Lucha/Smack Dowm/game_0.jpg', 23, 'Smack Dowm', '134', 18),
(44, 'Carros, velocidad, rapidez.', 1, 'Games_Categories/Aventura/GTA IV/game_0.jpg', 23, 'GTA IV', '55', 11),
(45, 'Carros, velocidad, rapidez.', 1, 'Games_Categories/Carreras/TopSpeed/game_0.jpg', 123, 'TopSpeed', '56', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_promotions`
--

CREATE TABLE IF NOT EXISTS `products_promotions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `promotion_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product` (`product_id`),
  KEY `campaing` (`promotion_id`),
  KEY `pro` (`promotion_id`),
  KEY `prod` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_users`
--

CREATE TABLE IF NOT EXISTS `products_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id_` (`product_id`),
  KEY `user` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promotions`
--

CREATE TABLE IF NOT EXISTS `promotions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `begin_date` datetime DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `promotions`
--

INSERT INTO `promotions` (`id`, `begin_date`, `description`, `end_date`, `name`) VALUES
(1, '2014-05-13 12:26:00', '20 % Descuento', '2014-05-20 12:26:00', 'Descuento2'),
(2, '2014-05-13 12:28:00', '10% De Descuento', '2014-07-13 12:28:00', 'Descuento1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `enabled` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `states`
--

INSERT INTO `states` (`id`, `enabled`, `name`) VALUES
(1, 1, 'caracas'),
(2, 1, 'Miranda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `sexo` tinyint(1) DEFAULT NULL,
  `email` varchar(250) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(70) NOT NULL,
  `confirm_password` varchar(30) NOT NULL,
  `mailing_address` varchar(250) DEFAULT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `activate` tinyint(1) NOT NULL,
  `img_perfil` varchar(150) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `cart_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `city_id` (`city_id`),
  KEY `cart_id_d` (`cart_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=128 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `sexo`, `email`, `username`, `password`, `confirm_password`, `mailing_address`, `register_date`, `activate`, `img_perfil`, `city_id`, `cart_id`) VALUES
(126, 'adrian suarez', 'ad', 0, 'adrian_suarez666@hotmail.com', 'adr', '4ce1835254d61ab84fe6a4190c97ae2d5fe83b9d', '1', 'ccs', '2014-05-15 05:25:01', 1, 'Users/adr/perfil.png', 1, NULL),
(127, 'asd', 'asd', 0, 'a@hotmail.com', 'a', '4ce1835254d61ab84fe6a4190c97ae2d5fe83b9d', '1', 'ccs', '2014-05-19 07:27:53', 1, 'Users/a/perfil.jpg', 1, NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carts_products`
--
ALTER TABLE `carts_products`
  ADD CONSTRAINT `cart_id` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `prodd` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `id_state` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `credit_cards`
--
ALTER TABLE `credit_cards`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `products_promotions`
--
ALTER TABLE `products_promotions`
  ADD CONSTRAINT `pro` FOREIGN KEY (`promotion_id`) REFERENCES `promotions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `prod` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `products_users`
--
ALTER TABLE `products_users`
  ADD CONSTRAINT `product_id_` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `cart_id_d` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `city_id` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
