-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 25/10/2024 às 16:41
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
-- Estrutura para tabela `tabela_usuario`
--

DROP TABLE IF EXISTS `tabela_usuario`;
CREATE TABLE IF NOT EXISTS `tabela_usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT COMMENT 'Identificação do usuario',
  `Nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Nome do usuario',
  `Senha` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Senha do usuario (Hash)',
  `Email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Email do usuario',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Data de criação da conta',
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Esta tabela é a tabela usuario principal';

--
-- Despejando dados para a tabela `tabela_usuario`
--

INSERT INTO `tabela_usuario` (`id_usuario`, `Nome`, `Senha`, `Email`, `data_criacao`) VALUES
(1, 'Murilo', '$2y$10$ANqug8MvOGNCPmAP2hIAku8avcc4QAJekuKwOJ0BO4jIh8MJ9ZEaW', 'murilo@murilo.com', '2024-10-18 22:30:26'),
(2, 'Murilo', '$2y$10$FPqvUZKRA66MzWJDl9gCROmWi5HAqkW819E.kk7Sr9Uczu1AQDomG', 'murilo@murilo2.com', '2024-10-18 22:32:52'),
(3, 'Dutra', '$2y$10$eh7//ZhRZU1jeVKJ.QexaOpYno4XT.2DDWdO8SlpS0K9wFQsXhvOO', 'dutra@dutra.com', '2024-10-18 22:41:46'),
(4, 'teste', '$2y$10$Bcj9tgPZbk9zXIw.eILGK.2Vlh5a7yKaK3Tw4cTC6HIf5RiBT7lb.', 'teste@teste.com', '2024-10-18 23:38:10'),
(5, 'Murilo', '$2y$10$6hQG3/hXRuKBNOxJN9jYROXYjqOX.F02IOOmy7/UZixCYPUT1m8.y', 'a@a.com', '2024-10-19 10:26:01'),
(6, 'sukuna', '$2y$10$zbcRr4x4aD9Uj5MRf4lES.uE5Zva7XeyFteiCbPhf.5pQ8s/utPRS', 'sukuna@sukuna.com', '2024-10-24 08:25:33');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
