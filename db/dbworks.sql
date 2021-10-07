-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 05, 2018 at 02:34 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbworks`
--

-- --------------------------------------------------------

--
-- Table structure for table `anuncios`
--

CREATE TABLE `anuncios` (
  `id` int(11) NOT NULL,
  `name` varchar(60) COLLATE utf8_bin NOT NULL,
  `address` varchar(80) COLLATE utf8_bin NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) COLLATE utf8_bin NOT NULL,
  `descricao` varchar(500) COLLATE utf8_bin NOT NULL,
  `situacao` varchar(30) COLLATE utf8_bin NOT NULL,
  `tempoAtivo` date NOT NULL,
  `valor` varchar(15) COLLATE utf8_bin NOT NULL,
  `categoria` varchar(40) COLLATE utf8_bin NOT NULL,
  `categoria2` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `idUsuario` int(11) NOT NULL,
  `FKusuarioID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `anuncios`
--

INSERT INTO `anuncios` (`id`, `name`, `address`, `lat`, `lng`, `type`, `descricao`, `situacao`, `tempoAtivo`, `valor`, `categoria`, `categoria2`, `idUsuario`, `FKusuarioID`) VALUES
(6, 'Three Blue Ducks', '43 Macpherson Street, Bronte, NSW', -33.906357, 151.263763, 'restaurant', '', '', '0000-00-00', '', '', '', 0, 0),
(9, 'formatar pc', 'rua b', -30.009953, -51.142933, 'qualquer 1', 'formate meu pc', 'ativo', '2018-04-19', '40', '', '', 0, 41),
(10, 'formatar notebook', 'rua aleatoria', -30.022757, -51.160931, 'qualquer 1', 'faça qualquer coisa', 'ativo', '2018-04-27', '42', '', '', 0, 0),
(24, 'Varrer chao', 'any', -30.007696, -51.150471, 'qualquer 1', 'varrer meu pÃ¡tio', 'inativa', '2018-04-28', '15', '', '', 0, 41),
(191, '324324', 'any', -30.034647, -51.217659, 'qualquer 1', '234234', 'ativo', '2018-04-28', '234234', 'casa_e_jardim', 'instalar', 0, 0),
(192, '32423', 'any', -30.034647, -51.217659, 'qualquer 1', '23423', 'ativo', '2018-04-28', '234243', 'autos', 'eletrica', 0, 0),
(193, '34234', 'any', -30.034647, -51.217659, 'qualquer 1', '23423', 'ativo', '2018-04-28', '23423', 'casa_e_jardim', '', 0, 41),
(159, 'aqui', 'any', -30.041185, -51.134918, 'qualquer 1', 'HASGDYAHSSD', 'ativo', '2018-04-28', '3242434', 'servicos', 'autos', 0, 0),
(181, '32423', 'any', -30.034647, -51.217659, 'qualquer 1', '23423', 'ativo', '2018-04-28', '34234', 'autos', '', 0, 0),
(182, '342', 'any', -30.034647, -51.217659, 'qualquer 1', '23423', 'ativo', '2018-04-28', '23423', 'informatica', '', 0, 0),
(183, '435345', 'any', -30.034647, -51.217659, 'qualquer 1', '345345', 'ativo', '2018-04-28', '34534', 'saude', 'cuidador', 0, 41),
(180, 'kk', 'any', -30.034647, -51.217659, 'qualquer 1', 'iodhas', 'ativo', '2018-04-28', '243', 'autos', '', 0, 0),
(154, 'cato', 'any', -30.040739, -51.204010, 'qualquer 1', 'asdasd', 'ativo', '2018-04-28', '222', 'casa_e_jardim', 'saude', 0, 0),
(169, 'troca minhas plantas', 'any', -29.982918, -51.166504, 'qualquer 1', '231123', 'inativa', '2018-04-28', '123123324', 'casa_e_jardim', 'trocar', 0, 41),
(190, '234234', 'any', -30.034647, -51.217659, 'qualquer 1', '234234', 'ativo', '2018-04-28', '234234', 'autos', '', 0, 0),
(171, 'cuidar minha vo', 'any', -30.050695, -51.215427, 'qualquer 1', 'cuide minha vo', 'ativo', '2018-04-28', '122', 'saude', 'passeador', 0, 0),
(176, 'de banho no meu cao', 'any', -30.088728, -51.243408, 'qualquer 1', 'banho no cachorro sujo', 'ativo', '2018-04-28', '15', 'pets', '', 0, 0),
(194, 'Teste', 'any', -30.078621, -51.163483, 'qualquer 1', '12121212', 'ativo', '2018-04-28', '1212', 'informatica', '', 0, 0),
(195, 'Teste', 'any', -30.078621, -51.163483, 'qualquer 1', '12121212', 'ativo', '2018-04-28', '1212', 'informatica', '', 0, 0),
(206, '1212', 'any', -30.073509, -50.967136, 'qualquer 1', '12121', 'ativo', '2018-04-28', '12121', 'servicos', '', 0, 41),
(197, 'asdasdad', 'any', -30.061850, -51.127796, 'qualquer 1', 'adadada', 'ativo', '2018-04-28', 'asdadadad', 'informatica', '', 0, 0),
(198, 'asdad', 'any', -30.118101, -51.102894, 'qualquer 1', 'asdadad', 'ativo', '2018-04-28', '12121', 'autos', '', 0, 0),
(199, 'qweqwe', 'any', -30.072939, -51.063114, 'qualquer 1', 'qweqwe', 'ativo', '2018-04-28', '121212', 'autos', '', 0, 0),
(200, 'qweqwe', 'any', -30.072939, -51.063114, 'qualquer 1', 'qweqwe', 'inatva', '2018-04-28', '121212', 'autos', '', 0, 0),
(205, 'asdasdas', 'any', -30.117807, -51.208271, 'qualquer 1', 'asdadad', 'ativo', '2018-04-28', '12121', 'informatica', '', 0, 41),
(202, 'Teste', 'any', -30.019213, -51.045132, 'qualquer 1', 'sasasasas', 'ativo', '2018-04-28', '121212', 'informatica', '', 0, 41),
(203, 'Arrumar meu carro', 'any', -30.016195, -51.102806, 'qualquer 1', 'aajljdlkajdlajsdlk', 'ativo', '2018-04-28', '50', 'eventos', '', 0, 41),
(204, 'Arrumar meu carro', 'any', -30.016195, -51.102806, 'qualquer 1', 'aajljdlkajdlajsdlk', 'ativo', '2018-04-28', '50', 'eventos', '', 0, 41),
(207, 'ad', 'any', -30.074095, -50.983360, 'qualquer 1', 'asdad', 'ativo', '2018-04-28', '323', 'casa_e_jardim', '', 0, 41),
(208, 'asdasd', 'any', -30.118107, -51.102837, 'qualquer 1', 'asdsad', 'ativo', '2018-04-28', '12121', 'casa_e_jardim', 'cortar', 0, 0),
(209, 'adasd', 'any', -30.118059, -51.102825, 'qualquer 1', 'asdad', 'ativo', '2018-04-28', '1212', 'informatica', '', 0, 41),
(210, '', 'any', -30.082125, -51.103043, 'qualquer 1', 'asdasd', 'ativo', '2018-04-28', '12121', 'autos', '', 0, 41),
(211, 'asdad', 'any', -30.111818, -51.012188, 'qualquer 1', 'asdad', 'ativo', '2018-04-28', '1212121212', 'casa_e_jardim', '', 0, 41),
(212, 'asdad', 'any', -30.118107, -51.102837, 'qualquer 1', 'asdasd', 'ativo', '2018-04-28', '11', 'casa_e_jardim', '', 0, 41),
(213, 'sdsadasd', 'any', -30.042040, -51.081650, 'qualquer 1', 'dasdasda', 'ativo', '2018-04-28', '12121', 'informatica', 'formatar', 0, 41);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` bigint(20) UNSIGNED NOT NULL,
  `Nome` varchar(45) COLLATE utf8_bin NOT NULL,
  `Telefone` varchar(20) COLLATE utf8_bin NOT NULL,
  `Email` varchar(40) COLLATE utf8_bin NOT NULL,
  `Login` varchar(30) COLLATE utf8_bin NOT NULL,
  `Senha` varchar(100) COLLATE utf8_bin NOT NULL,
  `Reputacao` decimal(2,1) DEFAULT NULL,
  `QtdServicos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `Nome`, `Telefone`, `Email`, `Login`, `Senha`, `Reputacao`, `QtdServicos`) VALUES
(41, 'Wagner neves', '65656565', 'wns.wagner@gmail.com', 'uyggjhjh', '202cb962ac59075b964b07152d234b70', NULL, NULL),
(42, 'alguem', '33554488', 'alguem@hotmail.com', 'alguem', '202cb962ac59075b964b07152d234b70', NULL, NULL),
(43, 'vitor', '23423423', 'prov@prov.com', 'prov', '202cb962ac59075b964b07152d234b70', NULL, NULL),
(44, 'vit', '22224444', 'vit@hotmail.com', 'vitor', '202cb962ac59075b964b07152d234b70', NULL, NULL),
(45, 'Ricardo', '21212122', 'ricardo@gmail.com', '', '202cb962ac59075b964b07152d234b70', NULL, NULL),
(46, 'Robertal', 'sasas', 'teste@teste.com', '', '202cb962ac59075b964b07152d234b70', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `idUsuario` (`idUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
