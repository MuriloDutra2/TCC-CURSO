-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 02/10/2024 às 09:09
-- Versão do servidor: 8.3.0
-- Versão do PHP: 8.2.18

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

DROP TABLE IF EXISTS `tabela ingressos`;
CREATE TABLE IF NOT EXISTS `tabela ingressos` (
  `id_ingresso` char(10) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL COMMENT 'id do usuario que comprou os ingressos',
  `ingressos_comprados` int NOT NULL COMMENT 'ingressos comprados do usuario',
  `id_usuario` int DEFAULT NULL COMMENT 'id integrado com o usuario',
  PRIMARY KEY (`id_ingresso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabela de ingressos';

-- --------------------------------------------------------

--
-- Estrutura para tabela `tabela_filme`
--

DROP TABLE IF EXISTS `tabela_filme`;
CREATE TABLE IF NOT EXISTS `tabela_filme` (
  `id_filme` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT 'ID do filme',
  `nome_filme` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'Nome do filme',
  `ano_filme` int DEFAULT NULL COMMENT 'Ano do filme',
  `topicos_destaque` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'Topicos destaque',
  `image_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `nota_filme` decimal(3,1) DEFAULT NULL,
  PRIMARY KEY (`id_filme`),
  UNIQUE KEY `nome_filme` (`nome_filme`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tabela_filme`
--

INSERT INTO `tabela_filme` (`id_filme`, `nome_filme`, `ano_filme`, `topicos_destaque`, `image_path`, `nota_filme`) VALUES
('1', 'O Filho do Homem', 2024, 'Aventura', 'assets\\image_movie\\filme1.jpg', 7.5),
('10', 'Punhos de aco', 2010, 'Acao\r\nDrama', 'assets\\image_movie\\filme10.jpg', 9.5),
('11', 'Atirando Alto', 2024, 'Drama\r\nComedia', 'assets\\image_movie\\filme11.jpg', 8.0),
('12', 'Olhinhos do Ceu', 2020, 'Comedia\r\nMisterio', 'assets\\image_movie\\filme12.jpg', 9.0),
('13', 'Busca pela Verdade', 2014, 'Suspense\r\nTerror', 'assets\\image_movie\\filme13.jpg', 10.0),
('14', 'A Historia de Mung', 2006, 'Acao\r\nAventura', 'assets\\image_movie\\filme15.jpg', 10.0),
('2', 'A Maldicao do Parque', 2022, 'Suspense', 'assets\\image_movie\\filme2.jpg', 9.5),
('3', 'Noite Eterna Azul', 2021, 'Terror\r\nSuspense', 'assets\\image_movie\\filme3.jpg', 9.5),
('4', 'Mr. Romero', 2000, 'Comedia\r\nAventura', 'assets\\image_movie\\filme4.jpg', 10.0),
('5', 'O Time dos Sonhos', 2024, 'Aventura\r\nComedia', 'assets\\image_movie\\filme5.jpg', 8.0),
('6', 'Olhos Felinos', 2024, 'Terror\r\nSuspense', 'assets\\image_movie\\filme6.jpg', 10.0),
('7', 'Tempos de Morte', 2017, 'Suspense\r\nCrime', 'assets\\image_movie\\filme7.jpg', 8.6),
('8', 'M.D.P. (Meninos de preto)', 2007, 'Comedia\r\nMisterio', 'assets\\image_movie\\filme8.jpg', 8.5),
('9', 'O Desconhecido', 2018, 'Documentario', 'assets\\image_movie\\filme9.jpg', 7.0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tabela_genero`
--

DROP TABLE IF EXISTS `tabela_genero`;
CREATE TABLE IF NOT EXISTS `tabela_genero` (
  `Id_genero` char(10) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL COMMENT 'id do genero',
  `genero_filme` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL COMMENT 'Genero dos filmes',
  `id_filme` int DEFAULT NULL COMMENT 'Id_filme/integrado com tabela_filme',
  PRIMARY KEY (`Id_genero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='esta é a tabela pra controlar os generos do filme';

-- --------------------------------------------------------

--
-- Estrutura para tabela `tabela_qntd_assistida`
--

DROP TABLE IF EXISTS `tabela_qntd_assistida`;
CREATE TABLE IF NOT EXISTS `tabela_qntd_assistida` (
  `id_qntd` char(10) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL COMMENT 'id da quantidade(obrigatorio)',
  `qntd_assistida` int NOT NULL COMMENT 'Quantidade de vezes que o usuuario assitiu o filme',
  `id_filme` int NOT NULL COMMENT 'ID do filmes, integrado com a tabela_filme',
  `id_usuario` int NOT NULL COMMENT 'id do usuario, integrado com a tabela_usuario',
  PRIMARY KEY (`id_qntd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='esta é a tabela qntd assisistida';

-- --------------------------------------------------------

--
-- Estrutura para tabela `tabela_usuario`
--

DROP TABLE IF EXISTS `tabela_usuario`;
CREATE TABLE IF NOT EXISTS `tabela_usuario` (
  `id_usuario` char(10) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL COMMENT 'Identificação do usuario',
  `Nome` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL COMMENT 'Nome do usuario',
  `Senha` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL COMMENT 'Senha do usuario',
  `Email` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL COMMENT 'Email do usuario',
  PRIMARY KEY (`id_usuario`),
  KEY `Nome` (`Nome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Esta tabela é a tabela usuario principal';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
