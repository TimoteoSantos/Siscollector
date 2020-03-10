-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Mar-2020 às 21:27
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `coletor_de_dados`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `coletor_importar`
--

DROP TABLE IF EXISTS `coletor_importar`;
CREATE TABLE IF NOT EXISTS `coletor_importar` (
  `referencia` varchar(255) CHARACTER SET utf8 NOT NULL,
  `quantidade` int(11) NOT NULL,
  `descricao` varchar(255) CHARACTER SET utf8 NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `hora` datetime DEFAULT NULL,
  `local_estoque` int(2) DEFAULT 0,
  `local_loja` int(2) DEFAULT 0,
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `coletor_importar`
--

INSERT INTO `coletor_importar` (`referencia`, `quantidade`, `descricao`, `usuario`, `hora`, `local_estoque`, `local_loja`, `id`) VALUES
('04', 1, 'PRODUTO NaO CADASTRADO', 'admin', '2020-03-10 21:19:11', 0, 1, 1),
('2011', 1, 'PRODUTO NAO CADASTRADO', 'admin', '2020-03-10 21:23:51', 0, 1, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
