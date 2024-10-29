-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 29/10/2024 às 15:06
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
  `url_filme` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `classificacao` varchar(255) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'pode ser Principal novo ou popular',
  PRIMARY KEY (`id_filme`),
  UNIQUE KEY `nome_filme` (`nome_filme`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tabela_filme`
--

INSERT INTO `tabela_filme` (`id_filme`, `nome_filme`, `ano_filme`, `topicos_destaque`, `image_path`, `nota_filme`, `url_filme`, `classificacao`) VALUES
('1', 'O Filho do Homem', 2024, 'Aventura', 'assets\\image_movie\\filme1.jpg', 7.5, 'filho_do_homem.php', 'novo'),
('10', 'Punhos de aco', 2010, 'Acao\r\nDrama', 'assets\\image_movie\\filme10.jpg', 9.5, 'punhos_de_aco.php', 'popular'),
('11', 'Atirando Alto', 2024, 'Drama\r\nComedia', 'assets\\image_movie\\filme11.jpg', 8.0, 'atirando_alto.php', 'novo'),
('12', 'Olhinhos do Ceu', 2020, 'Comedia\r\nMisterio', 'assets\\image_movie\\filme12.jpg', 9.0, 'olhinhos_de_ceu.php', 'principal'),
('13', 'Busca pela Verdade', 2014, 'Suspense\r\nTerror', 'assets\\image_movie\\filme13.jpg', 10.0, 'busca_pela_verdade.php', 'principal'),
('14', 'A Historia de Mung', 2006, 'Acao\r\nAventura', 'assets\\image_movie\\filme15.jpg', 10.0, 'historia_de_mung.php', 'popular'),
('2', 'A Maldicao do Parque', 2022, 'Suspense', 'assets\\image_movie\\filme2.jpg', 9.5, 'maldicao_do_parque.html', 'principal'),
('3', 'Noite Eterna Azul', 2021, 'Terror\r\nSuspense', 'assets\\image_movie\\filme3.jpg', 9.5, 'noite_eterna_azul.php', 'principal'),
('4', 'Mr. Romero', 2000, 'Comedia\r\nAventura', 'assets\\image_movie\\filme4.jpg', 10.0, 'mr_romero.php', 'popular'),
('5', 'O Time dos Sonhos', 2024, 'Aventura\r\nComedia', 'assets\\image_movie\\filme5.jpg', 8.0, 'time_dos_sonhos.php', 'novo'),
('6', 'Olhos Felinos', 2024, 'Terror\r\nSuspense', 'assets\\image_movie\\filme6.jpg', 10.0, 'olhos_felinos.php', 'novo'),
('7', 'Tempos de Morte', 2017, 'Suspense\r\nCrime', 'assets\\image_movie\\filme7.jpg', 8.6, 'tempo_de_morte.php', 'principal'),
('8', 'M.D.P. (Meninos de preto)', 2007, 'Comedia\r\nMisterio', 'assets\\image_movie\\filme8.jpg', 8.5, 'mdp.php', 'popular'),
('9', 'O Desconhecido', 2018, 'Documentario', 'assets\\image_movie\\filme9.jpg', 7.0, 'desconhecido.php', 'principal');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
