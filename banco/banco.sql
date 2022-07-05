-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 05-Jul-2022 às 19:56
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `paytour`
--
CREATE DATABASE IF NOT EXISTS `paytour` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `paytour`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curriculos`
--

DROP TABLE IF EXISTS `curriculos`;
CREATE TABLE IF NOT EXISTS `curriculos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cargoDesejado` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `escolaridade` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `observacoes` text COLLATE utf8_unicode_ci NOT NULL,
  `arquivo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dataEnvio` datetime NOT NULL,
  `ipUsuario` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='cadastro de curriculos dos usuarios';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
