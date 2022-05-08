-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 08-Maio-2022 às 21:15
-- Versão do servidor: 8.0.29
-- versão do PHP: 8.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `atenasystem`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alune`
--

CREATE TABLE `alune` (
  `id` int NOT NULL,
  `nome` varchar(255) COLLATE utf8_bin NOT NULL,
  `cod_sala` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `id` int NOT NULL,
  `nome` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `monitore`
--

CREATE TABLE `monitore` (
  `id` int NOT NULL,
  `nome` varchar(255) COLLATE utf8_bin NOT NULL,
  `usuario` varchar(255) COLLATE utf8_bin NOT NULL,
  `senha` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `presenca`
--

CREATE TABLE `presenca` (
  `id` int NOT NULL,
  `cod_alune` int NOT NULL,
  `cod_sala` int NOT NULL,
  `cod_tutore` int NOT NULL,
  `cod_monitore` int NOT NULL,
  `aula` int NOT NULL,
  `presente` enum('S','N','J') CHARACTER SET utf8mb3 COLLATE utf8_bin NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sala`
--

CREATE TABLE `sala` (
  `id` int NOT NULL,
  `nome` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tutore`
--

CREATE TABLE `tutore` (
  `id` int NOT NULL,
  `nome` varchar(255) COLLATE utf8_bin NOT NULL,
  `cod_disciplina` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alune`
--
ALTER TABLE `alune`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `monitore`
--
ALTER TABLE `monitore`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `presenca`
--
ALTER TABLE `presenca`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tutore`
--
ALTER TABLE `tutore`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alune`
--
ALTER TABLE `alune`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `monitore`
--
ALTER TABLE `monitore`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `presenca`
--
ALTER TABLE `presenca`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `sala`
--
ALTER TABLE `sala`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tutore`
--
ALTER TABLE `tutore`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
