-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25/09/2024 às 10:40
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `c-street`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tabela ingressos`
--

CREATE TABLE `tabela ingressos` (
  `id_ingresso` char(10) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL COMMENT 'id do usuario que comprou os ingressos',
  `ingressos_comprados` int(10) NOT NULL COMMENT 'ingressos comprados do usuario',
  `id_usuario` int(10) DEFAULT NULL COMMENT 'id integrado com o usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabela de ingressos';

-- --------------------------------------------------------

--
-- Estrutura para tabela `tabela_filme`
--

CREATE TABLE `tabela_filme` (
  `id_filme` char(10) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL COMMENT 'ID do filmes',
  `nome_filme` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL COMMENT 'Nome do filme',
  `ano_filme` int(10) DEFAULT NULL COMMENT 'Ano do filme',
  `topicos_destaque` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL COMMENT 'Topicos destaque'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tabela_filme`
--

INSERT INTO `tabela_filme` (`id_filme`, `nome_filme`, `ano_filme`, `topicos_destaque`) VALUES
('1', 'O Filho do Homem', 2024, 'Aventura'),
('10', 'Punhos de aco', 2010, 'Acao\r\nDrama'),
('11', 'Atirando Alto', 2024, 'Drama\r\nComedia'),
('12', 'Olhinhos do Ceu', 2020, 'Comedia\r\nMisterio'),
('13', 'Busca pela Verdade', 2014, 'Suspense\r\nTerror'),
('14', 'A Historia de Mung', 2006, 'Acao\r\nAventura'),
('2', 'A Maldicao do Parque', 2022, 'Suspense'),
('3', 'Noite Eterna Azul', 2021, 'Terror\r\nSuspense'),
('4', 'Mr. Romero', 2000, 'Comedia\r\nAventura'),
('5', 'O Time dos Sonhos', 2024, 'Aventura\r\nComedia'),
('6', 'Olhos Felinos', 2024, 'Terror\r\nSuspense'),
('7', 'Tempos de Morte', 2017, 'Suspense\r\nCrime'),
('8', 'M.D.P. (Meninos de preto)', 2007, 'Comedia\r\nMisterio'),
('9', 'O Desconhecido', 2018, 'Documentario');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tabela_genero`
--

CREATE TABLE `tabela_genero` (
  `Id_genero` char(10) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL COMMENT 'id do genero',
  `genero_filme` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL COMMENT 'Genero dos filmes',
  `id_filme` int(10) DEFAULT NULL COMMENT 'Id_filme/integrado com tabela_filme'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='esta é a tabela pra controlar os generos do filme';

-- --------------------------------------------------------

--
-- Estrutura para tabela `tabela_qntd_assistida`
--

CREATE TABLE `tabela_qntd_assistida` (
  `id_qntd` char(10) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL COMMENT 'id da quantidade(obrigatorio)',
  `qntd_assistida` int(10) NOT NULL COMMENT 'Quantidade de vezes que o usuuario assitiu o filme',
  `id_filme` int(10) NOT NULL COMMENT 'ID do filmes, integrado com a tabela_filme',
  `id_usuario` int(10) NOT NULL COMMENT 'id do usuario, integrado com a tabela_usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='esta é a tabela qntd assisistida';

-- --------------------------------------------------------

--
-- Estrutura para tabela `tabela_usuario`
--

CREATE TABLE `tabela_usuario` (
  `id_usuario` char(10) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL COMMENT 'Identificação do usuario',
  `Nome` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL COMMENT 'Nome do usuario',
  `Senha` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL COMMENT 'Senha do usuario',
  `Email` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL COMMENT 'Email do usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Esta tabela é a tabela usuario principal';

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tabela ingressos`
--
ALTER TABLE `tabela ingressos`
  ADD PRIMARY KEY (`id_ingresso`);

--
-- Índices de tabela `tabela_filme`
--
ALTER TABLE `tabela_filme`
  ADD PRIMARY KEY (`id_filme`),
  ADD UNIQUE KEY `nome_filme` (`nome_filme`);

--
-- Índices de tabela `tabela_genero`
--
ALTER TABLE `tabela_genero`
  ADD PRIMARY KEY (`Id_genero`);

--
-- Índices de tabela `tabela_qntd_assistida`
--
ALTER TABLE `tabela_qntd_assistida`
  ADD PRIMARY KEY (`id_qntd`);

--
-- Índices de tabela `tabela_usuario`
--
ALTER TABLE `tabela_usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `Nome` (`Nome`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
