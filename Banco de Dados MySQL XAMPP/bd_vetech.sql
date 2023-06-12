-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06/06/2023 às 03:41
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_vetech`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cad_vet`
--

CREATE TABLE `cad_vet` (
  `cod_vet` int(11) NOT NULL,
  `nome_vet` varchar(64) NOT NULL,
  `email_vet` varchar(64) NOT NULL,
  `senha_vet` varchar(255) NOT NULL,
  `data_cad_vet` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `solicit_atend`
--

CREATE TABLE `solicit_atend` (
  `id_solicit` int(11) NOT NULL,
  `nome_pet` varchar(20) NOT NULL,
  `idade_pet` int(2) NOT NULL,
  `sexo_pet` enum('Macho','Femea') NOT NULL,
  `email_ctt_pet` varchar(255) NOT NULL,
  `resumo_ocorr_pet` varchar(255) NOT NULL,
  `data_solicit` date NOT NULL DEFAULT current_timestamp(),
  `atendido_pet` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cad_vet`
--
ALTER TABLE `cad_vet`
  ADD PRIMARY KEY (`cod_vet`);

--
-- Índices de tabela `solicit_atend`
--
ALTER TABLE `solicit_atend`
  ADD PRIMARY KEY (`id_solicit`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cad_vet`
--
ALTER TABLE `cad_vet`
  MODIFY `cod_vet` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `solicit_atend`
--
ALTER TABLE `solicit_atend`
  MODIFY `id_solicit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
