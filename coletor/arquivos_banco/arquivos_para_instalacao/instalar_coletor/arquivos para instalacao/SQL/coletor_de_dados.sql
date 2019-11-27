-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27-Nov-2019 às 11:08
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 5.6.38

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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `auditoria`
--

INSERT INTO `auditoria` (`id`, `usuario`, `descricao`, `data`) VALUES
(1, 'admin', 'zerou o sistema', '2019-09-18 11:01:02'),
(2, 'admin', 'Excluiu o endereço da câmera', '2019-09-18 14:25:47'),
(3, 'admin', 'Excluiu o endereço da câmera', '2019-09-18 14:30:15'),
(4, 'admin', 'Excluiu o endereço da câmera', '2019-09-18 14:30:17'),
(5, 'admin', 'Excluiu o endereço da câmera', '2019-09-18 14:31:24'),
(6, 'admin', 'Excluiu o endereço da câmera', '2019-09-18 14:31:45'),
(7, 'admin', 'Excluiu o endereço da câmera', '2019-09-18 15:25:47'),
(8, 'admin', 'Excluiu exluiu ', '2019-09-18 15:38:50'),
(9, 'admin', 'Excluiu exluiu ', '2019-09-18 15:39:05'),
(10, 'admin', 'Excluiu exluiu ', '2019-09-18 15:46:04'),
(11, 'admin', 'Excluiu dados processados e importados', '2019-11-16 17:32:42'),
(12, 'admin', 'Excluiu produtos de pesquisa', '2019-11-16 17:32:48'),
(13, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 2015 PRODUTO N?O CADASTRADO QUANTIDADE = 8', '2019-11-16 17:43:59'),
(14, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 2013 PRODUTO N?O CADASTRADO QUANTIDADE = 5', '2019-11-16 17:44:05'),
(15, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 2012 PRODUTO N?O CADASTRADO QUANTIDADE = 1', '2019-11-16 17:44:07'),
(16, 'admin', 'Excluiu o usuário marcia', '2019-11-16 17:47:04'),
(17, 'admin', 'Excluiu o usuário erica', '2019-11-16 17:47:06'),
(18, 'admin', 'Excluiu o usuário mercia', '2019-11-16 17:47:08'),
(19, 'admin', 'Excluiu o usuário timoteo', '2019-11-16 17:47:10'),
(20, 'admin', 'Excluiu dados processados e importados', '2019-11-18 15:30:22'),
(21, 'admin', 'Excluiu dados processados e importados', '2019-11-19 12:12:24'),
(22, 'admin', 'Ecluiu as diferencas da coleta', '2019-11-19 12:12:47'),
(23, 'admin', 'Excluiu dados processados e importados', '2019-11-19 12:13:59'),
(24, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 2012 PALITO PARA UNHA QUANTIDADE = 2', '2019-11-19 12:15:43'),
(25, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 2012 PALITO PARA UNHA QUANTIDADE = 21', '2019-11-19 12:15:45'),
(26, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 3 ESMALTE NOVO BEAUTY QUANTIDADE = 1', '2019-11-19 12:16:11'),
(27, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 1 DIVERSOS QUANTIDADE = 2', '2019-11-19 12:16:13'),
(28, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 2 ESMALTE FUSION QUANTIDADE = 1', '2019-11-19 12:16:15'),
(29, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 2012 PALITO PARA UNHA QUANTIDADE = 1', '2019-11-19 12:16:24'),
(30, 'admin', 'Excluiu produtos de pesquisa', '2019-11-21 09:53:26'),
(31, 'admin', 'Excluiu dados processados e importados', '2019-11-27 10:45:52'),
(32, 'admin', 'Excluiu dados processados e importados', '2019-11-27 10:48:45'),
(33, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 2016 PRODUTO N?O CADASTRADO QUANTIDADE = 2', '2019-11-27 10:50:10'),
(34, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 2014 LIXA CAPRICHOSA PEQUENA QUANTIDADE = 2', '2019-11-27 10:50:11'),
(35, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 2013 LIXA CAPRICHOSA FINA QUANTIDADE = 1', '2019-11-27 10:50:13'),
(36, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 2012 PALITO PARA UNHA QUANTIDADE = 2', '2019-11-27 10:50:15'),
(37, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 2012 PALITO PARA UNHA QUANTIDADE = 1', '2019-11-27 10:50:17'),
(38, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 2012 PALITO PARA UNHA QUANTIDADE = 2', '2019-11-27 10:51:11'),
(39, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 204 PRODUTO N?O CADASTRADO QUANTIDADE = 1', '2019-11-27 10:51:45'),
(40, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 2013 LIXA CAPRICHOSA FINA QUANTIDADE = 2', '2019-11-27 10:53:21'),
(41, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 2012 PALITO PARA UNHA QUANTIDADE = 1', '2019-11-27 10:55:15'),
(42, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 204 PRODUTO N?O CADASTRADO QUANTIDADE = 2', '2019-11-27 10:56:12'),
(43, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 111 PRODUTO N?O CADASTRADO QUANTIDADE = 1', '2019-11-27 10:56:45'),
(44, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 5555 PRODUTO N?O CADASTRADO QUANTIDADE = 1', '2019-11-27 10:57:04'),
(45, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 20156 PRODUTO N?O CADASTRADO QUANTIDADE = 1', '2019-11-27 10:59:48'),
(46, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 202020 PRODUTO N?O CADASTRADO QUANTIDADE = 1', '2019-11-27 11:00:07'),
(47, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 2015 LIXA UNHA GROSSA QUANTIDADE = 2', '2019-11-27 11:00:09'),
(48, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 2012 PALITO PARA UNHA QUANTIDADE = 1', '2019-11-27 11:03:26'),
(49, 'admin', 'Excluiu dados processados e importados', '2019-11-27 11:07:59'),
(50, 'admin', 'Excluiu produtos de pesquisa', '2019-11-27 11:08:07');

-- --------------------------------------------------------

--
-- Estrutura da tabela `coletar`
--

DROP TABLE IF EXISTS `coletar`;
CREATE TABLE IF NOT EXISTS `coletar` (
  `referencia` bigint(20) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `preco` double(6,2) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `fabricante` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `grupo` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `coleta` int(2) DEFAULT '0',
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `coletor_exportar`
--

DROP TABLE IF EXISTS `coletor_exportar`;
CREATE TABLE IF NOT EXISTS `coletor_exportar` (
  `referencia` bigint(15) NOT NULL,
  `quantidade` int(8) NOT NULL,
  `descricao` varchar(255) CHARACTER SET utf8 NOT NULL,
  `local_estoque` int(11) DEFAULT '0',
  `local_loja` int(11) DEFAULT '0',
  `id` bigint(100) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `coletor_importar`
--

DROP TABLE IF EXISTS `coletor_importar`;
CREATE TABLE IF NOT EXISTS `coletor_importar` (
  `referencia` bigint(15) NOT NULL,
  `quantidade` int(100) NOT NULL,
  `descricao` varchar(100) CHARACTER SET utf8 NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `hora` datetime DEFAULT NULL,
  `local_estoque` int(1) DEFAULT '0',
  `local_loja` int(2) DEFAULT '0',
  `id` bigint(100) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `diferenca` int(5) NOT NULL DEFAULT '0',
  `estoque_loja` int(2) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `config`
--

INSERT INTO `config` (`id`, `arquivo`, `conf`, `camera`, `tempo`, `diferenca`, `estoque_loja`) VALUES
(2, NULL, 15, NULL, NULL, 0, 1),
(3, '/util', 1, NULL, NULL, 0, 0),
(4, NULL, 5, NULL, NULL, 1, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `diferenca`
--

INSERT INTO `diferenca` (`id`, `referencia`, `descricao`, `quantidade_sistema`, `quantidade_coletada`, `fabricante`, `status`, `grupo`) VALUES
(1, 2, 'ESMALTE FUSION', 1036, 10, 'FUSION', 'coletado', 'ACESSORIOS P/MANICURE\r');

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
-- Indexes for dumped tables
--

--
-- Indexes for table `coletar`
--
ALTER TABLE `coletar` ADD FULLTEXT KEY `descricao_indice` (`descricao`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
