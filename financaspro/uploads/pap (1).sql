-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Abr-2025 às 19:43
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pap`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbutilizadores`
--

CREATE TABLE `tbutilizadores` (
  `id` int(10) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(32) NOT NULL,
  `tipo` int(1) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbutilizadores`
--

INSERT INTO `tbutilizadores` (`id`, `nome`, `email`, `password`, `tipo`) VALUES
(9, 'Edson', 'fernandoedson858@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 2),
(10, 'admin', 'admin@mail.com', '21232f297a57a5a743894a0e4a801fc3', 1),
(11, 'paidele', 'paidelelevanofur@gaymail.com', '80302ccd7fb35bc274ab5e875bef4105', 2),
(12, 'luqueta', 'luquetabct@gmail.com', '58aa0b83bd3d885190ed8e3e2947b070', 2),
(13, 'genium', 'genium@mail.com', 'e950a9f00bca8c0389481cdc15a8163c', 2),
(15, 'Edson', 'edson123@gmail.com', '6b2ff88fd561949a005c3ae420aaef6e', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbutilizadores`
--
ALTER TABLE `tbutilizadores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbutilizadores`
--
ALTER TABLE `tbutilizadores`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
