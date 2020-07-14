-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 21-Fev-2018 às 04:15
-- Versão do servidor: 10.0.32-MariaDB-0+deb8u1
-- PHP Version: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `portal`
--
-- Estrutura da tabela `escala`
--

CREATE TABLE IF NOT EXISTS `escala` (
`id` bigint(20) NOT NULL,
  `nome` varchar(70) NOT NULL,
  `cel` varchar(50) NOT NULL,
  `dt_plantao` date NOT NULL,
  `hora_ent` varchar(8) NOT NULL,
  `hora_sai` varchar(8) NOT NULL,
  `setor` varchar(100) NOT NULL,
  `funcao` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49418 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `escala`
--

INSERT INTO `escala` (`id`, `nome`, `cel`, `dt_plantao`, `hora_ent`, `hora_sai`, `setor`, `funcao`) VALUES
(39582, 'Fabio Brito Pinto', '021 12 00000-0000', '2020-10-10', '08:00', '17:59', 'Data Center', 'Analista Datacenter');


