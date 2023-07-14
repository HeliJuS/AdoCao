-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13/07/2023 às 23:56
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `adocao`
--
CREATE DATABASE IF NOT EXISTS `adocao` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `adocao`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `dados`
--

CREATE TABLE `dados` (
  `id` int(11) NOT NULL,
  `nomePet` varchar(255) NOT NULL,
  `imagemPet` varchar(50) NOT NULL,
  `tipoPet` varchar(255) NOT NULL,
  `idadePet` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `dados`
--

INSERT INTO `dados` (`id`, `nomePet`, `imagemPet`, `tipoPet`, `idadePet`, `descricao`) VALUES
(8, 'nina', '../img/88249115.jpg', 'Gato', '12 anos', 'Muito dócil'),
(9, 'Amora', '../img/images.jfif', 'Gato', '5 anos', 'Muito dócil e de pedigree'),
(11, 'Mimosa', '../img/images (2).jfif', 'Vaca', '12 meses ', 'Vaca leiteira '),
(12, 'Meg', '../img/licensed-image.jfif', 'Cachorro', '2 anos', 'Meg é inteligente e brincalhona, ama fazer bagunça e trazer diversão para todos.');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `dados`
--
ALTER TABLE `dados`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `dados`
--
ALTER TABLE `dados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
