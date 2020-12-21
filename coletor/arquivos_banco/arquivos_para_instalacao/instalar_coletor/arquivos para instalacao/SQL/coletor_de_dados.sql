-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19-Dez-2020 às 10:27
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coletor_de_dados`
--
CREATE DATABASE IF NOT EXISTS `coletor_de_dados` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `coletor_de_dados`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `auditoria`
--

DROP TABLE IF EXISTS `auditoria`;
CREATE TABLE IF NOT EXISTS `auditoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `auditoria`
--

INSERT INTO `auditoria` (`id`, `usuario`, `descricao`, `data`) VALUES
(1, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 3 PRODUTO NAO CADASTRADO QUANTIDADE = 18', '2020-12-19 09:54:31'),
(2, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 6 PRODUTO NAO CADASTRADO QUANTIDADE = 30', '2020-12-19 09:54:32'),
(3, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 20 PRODUTO NAO CADASTRADO QUANTIDADE = 2', '2020-12-19 09:54:33'),
(4, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 3 PRODUTO NAO CADASTRADO QUANTIDADE = 6', '2020-12-19 09:59:07'),
(5, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 2012 PRODUTO NAO CADASTRADO QUANTIDADE = 1', '2020-12-19 09:59:09'),
(6, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 1 PRODUTO NAO CADASTRADO QUANTIDADE = 1', '2020-12-19 09:59:10'),
(7, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 3 PRODUTO NAO CADASTRADO QUANTIDADE = 3', '2020-12-19 09:59:35'),
(8, 'admin', 'Excluiu a coleta de admin', '2020-12-19 10:14:06');

-- --------------------------------------------------------

--
-- Estrutura da tabela `coletar`
--

DROP TABLE IF EXISTS `coletar`;
CREATE TABLE IF NOT EXISTS `coletar` (
  `referencia` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `preco` double(6,2) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `fabricante` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `grupo` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `coleta` int(2) DEFAULT '0',
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `coletar`
--

INSERT INTO `coletar` (`referencia`, `descricao`, `preco`, `quantidade`, `fabricante`, `grupo`, `coleta`, `id`) VALUES
('7899026462564', 'TINT NUTRISSE COR INTENSA 3.16 122ML', 10.99, 1, 'GARNIER', 'TINTURA', 0, 1),
('7899026462571', 'TINT NUTRISSE COR INTENSA 4.0 122GR', 11.49, 1, 'GARNIER', 'TINTURA', 0, 2),
('7899026462632', 'TINT NUTRISSE COR INTENSA 6.35 122GR', 10.99, 1, 'GARNIER', 'TINTURA', 0, 3),
('7899026462656', 'TINT NUTRISSE COR INTENSA 6.6 122GR', 10.99, 1, 'GARNIER', 'TINTURA', 0, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `coletor_exportar`
--

DROP TABLE IF EXISTS `coletor_exportar`;
CREATE TABLE IF NOT EXISTS `coletor_exportar` (
  `referencia` varchar(255) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `descricao` varchar(255) CHARACTER SET utf8 NOT NULL,
  `local_estoque` int(2) DEFAULT '0',
  `local_loja` int(2) DEFAULT '0',
  `diferenca_vendas` int(2) DEFAULT '0',
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `local_estoque` int(2) DEFAULT '0',
  `local_loja` int(2) DEFAULT '0',
  `fabricante` varchar(255) DEFAULT NULL,
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `chave_sessao` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sessao` (`chave_sessao`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `coletor_importar`
--

INSERT INTO `coletor_importar` (`referencia`, `quantidade`, `descricao`, `usuario`, `hora`, `local_estoque`, `local_loja`, `fabricante`, `id`, `chave_sessao`) VALUES
('3', 3, 'PRODUTO NAO CADASTRADO', 'admin', '2020-12-19 10:15:05', 0, 0, NULL, 74, 37),
('5', 5, 'PRODUTO NAO CADASTRADO', 'admin', '2020-12-19 10:15:47', 0, 0, NULL, 75, NULL),
('10', 3, 'PRODUTO NAO CADASTRADO', 'admin', '2020-12-19 10:15:58', 0, 0, NULL, 76, NULL),
('9', 6, 'PRODUTO NAO CADASTRADO', 'admin', '2020-12-19 10:16:06', 0, 0, NULL, 77, NULL),
('5', 5, 'PRODUTO NAO CADASTRADO', 'admin', '2020-12-19 10:26:44', 0, 0, NULL, 78, 38);

-- --------------------------------------------------------

--
-- Estrutura da tabela `config`
--

DROP TABLE IF EXISTS `config`;
CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `arquivo` text,
  `conf` int(3) DEFAULT NULL,
  `camera` varchar(255) DEFAULT NULL,
  `tempo` int(10) DEFAULT NULL,
  `diferenca` int(5) DEFAULT '0',
  `estoque_loja` int(2) DEFAULT '0',
  `sessao` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `config`
--

INSERT INTO `config` (`id`, `arquivo`, `conf`, `camera`, `tempo`, `diferenca`, `estoque_loja`, `sessao`) VALUES
(12, NULL, NULL, NULL, NULL, 0, 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `diferenca`
--

DROP TABLE IF EXISTS `diferenca`;
CREATE TABLE IF NOT EXISTS `diferenca` (
  `id` bigint(15) NOT NULL AUTO_INCREMENT,
  `referencia` bigint(15) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `quantidade_sistema` int(10) DEFAULT NULL,
  `quantidade_coletada` int(10) DEFAULT NULL,
  `fabricante` varchar(255) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `grupo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pdf`
--

DROP TABLE IF EXISTS `pdf`;
CREATE TABLE IF NOT EXISTS `pdf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa` varchar(255) DEFAULT NULL,
  `fornecedor` varchar(255) NOT NULL,
  `fabricante` varchar(255) DEFAULT 'sem fabricante',
  `grupo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sessao`
--

DROP TABLE IF EXISTS `sessao`;
CREATE TABLE IF NOT EXISTS `sessao` (
  `id_sessao` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `quantidade` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_sessao`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sessao`
--

INSERT INTO `sessao` (`id_sessao`, `nome`, `status`, `quantidade`) VALUES
(37, 'SHAMPOO', 1, 20),
(38, 'COND', 1, 50),
(39, 'CR PENTEAR', 1, 60);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(220) NOT NULL,
  `senha` varchar(220) NOT NULL,
  `tipo` varchar(30) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `senha`, `tipo`) VALUES
(56, 'admin', '$2y$10$Z1Jcu.Aww7.iXbaIvRi2IubhA9MzhgB17jkVqt47R3OKLGGLqYj6S', 'adm');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

DROP TABLE IF EXISTS `vendas`;
CREATE TABLE IF NOT EXISTS `vendas` (
  `id` bigint(15) NOT NULL AUTO_INCREMENT,
  `referencia` bigint(15) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `coletor_importar`
--
ALTER TABLE `coletor_importar`
  ADD CONSTRAINT `fk_sessao` FOREIGN KEY (`chave_sessao`) REFERENCES `sessao` (`id_sessao`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
