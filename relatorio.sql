-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1a
-- Tempo de geração: 26-Set-2022 às 00:09
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `hnrtco66_fvghml`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `relatorio`
--

CREATE TABLE `relatorio` (
  `id` int(11) NOT NULL,
  `dia` date NOT NULL,
  `enfResponsaveis` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `tiResponsaveis` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `qtdIntercorrencias` int(11) NOT NULL,
  `qtdAtrasos` int(11) NOT NULL,
  `qtdFaltas` int(11) NOT NULL,
  `totalHorarios` int(11) NOT NULL,
  `totalClientes` int(11) NOT NULL,
  `totalSSucesso` int(11) NOT NULL,
  `totalNAtendidos` int(11) NOT NULL,
  `totalAbsent` int(11) NOT NULL,
  `totalLivre` int(11) NOT NULL,
  `totalVoucher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `relatorio`
--

INSERT INTO `relatorio` (`id`, `dia`, `enfResponsaveis`, `tiResponsaveis`, `qtdIntercorrencias`, `qtdAtrasos`, `qtdFaltas`, `totalHorarios`, `totalClientes`, `totalSSucesso`, `totalNAtendidos`, `totalAbsent`, `totalLivre`, `totalVoucher`) VALUES
(1, '2022-09-25', 'Luiz -- 10h as 22h // . -- .', 'Felipe -- 7h as 19h // . -- .', 7, 4, 0, 350, 325, 20, 3, 2, 0, 0),
(3, '2022-09-26', 'Luiz -- 10h as 22h // Ana -- 7h as 19h', 'Matheus -- 7h as 19h // Bruno -- 10h as 22h', 0, 0, 0, 292, 203, 3, 2, 26, 16, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `relatorio`
--
ALTER TABLE `relatorio`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `relatorio`
--
ALTER TABLE `relatorio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
