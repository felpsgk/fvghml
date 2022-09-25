-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
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
-- Estrutura da tabela `intercorrencia`
--

CREATE TABLE `intercorrencia` (
  `id` int(11) NOT NULL,
  `medico` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `dia` date NOT NULL,
  `hora` time NOT NULL,
  `tipo` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `numeroAt` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'não',
  `descricao` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `soluc` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `enf` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `chamado` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'não'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `intercorrencia`
--

INSERT INTO `intercorrencia` (`id`, `medico`, `dia`, `hora`, `tipo`, `numeroAt`, `descricao`, `soluc`, `enf`, `chamado`) VALUES
(1, '', '2022-09-25', '10:09:35', 'ATRASO', 'não', 'medico atrasou devido a chuva', 'pacientes perdidos foram reagendados. horarios livres foram fechados. Medico sem intervalo', 'LUIZ', 'não'),
(2, 'Pedro Neiva Alves Correa', '2022-09-25', '12:15:00', 'Atraso', '', 'gsdagsdggsdagsdggsdagsdggsdagsdg', 'gsdagsdggsdagsdggsdagsdggsdagsdggsdagsdg', 'luiz', ''),
(3, 'Pedro Neiva Alves Correa', '2022-09-25', '12:30:00', 'Lentidão', '', 'gsdagsdggsaagsdggsdagsdggsdagsdg', 'gsdagsdggsdagsdggsdagsdggsdagsdggsdagsdg', 'luiz', ''),
(4, 'Pedro Neiva Alves Correa', '2022-09-25', '12:30:00', 'Atraso', '', 'asdasd', 'asdasd', 'luiz', ''),
(5, 'Pedro Neiva Alves Correa', '2022-09-25', '13:00:00', 'Lentidão', '', 'ubigvugubigvugubigvugubigvugubigvugubigvugubigvugubigvugubigvugubigvugubigvug', 'ubigvugubigvugubigvugubigvugubigvugubigvugubigvugubigvugubigvugubigvugubigvugubigvugubigvug', 'luiz', ''),
(6, 'Pedro Neiva Alves Correa', '2022-09-25', '13:00:00', 'Erro', 'não', 'ubigvugubigvugubigvugubigvugubigvugubigvugubigvugubigvugubigvugubigvugubigvug', 'ubigvugubigvugubigvugubigvugubigvugubigvugubigvugubigvugubigvugubigvugubigvugubigvugubigvug', 'luiz', 'não'),
(7, 'Pedro Neiva Alves Correa', '2022-09-25', '15:00:00', 'Atraso', 'não', 'ele se atrasou', 'Remanejei horarios', 'luiz', 'não');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `intercorrencia`
--
ALTER TABLE `intercorrencia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `intercorrencia`
--
ALTER TABLE `intercorrencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
