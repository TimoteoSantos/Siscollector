-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Fev-2021 às 17:29
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `coletor_de_dados`
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `auditoria`
--

INSERT INTO `auditoria` (`id`, `usuario`, `descricao`, `data`) VALUES
(1, 'admin', 'zerou o sistema', '2021-02-23 13:17:16');

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
  `coleta` int(2) DEFAULT 0,
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `coletor_exportar`
--

DROP TABLE IF EXISTS `coletor_exportar`;
CREATE TABLE IF NOT EXISTS `coletor_exportar` (
  `referencia` varchar(255) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `descricao` varchar(255) CHARACTER SET utf8 NOT NULL,
  `local_estoque` int(2) DEFAULT 0,
  `local_loja` int(2) DEFAULT 0,
  `diferenca_vendas` int(2) DEFAULT 0,
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
  `local_estoque` int(2) DEFAULT 0,
  `local_loja` int(2) DEFAULT 0,
  `fabricante` varchar(255) DEFAULT NULL,
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `chave_sessao` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sessao` (`chave_sessao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `config`
--

DROP TABLE IF EXISTS `config`;
CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `arquivo` text DEFAULT NULL,
  `conf` int(3) DEFAULT NULL,
  `camera` varchar(255) DEFAULT NULL,
  `tempo` int(10) DEFAULT NULL,
  `diferenca` int(5) DEFAULT 0,
  `estoque_loja` int(2) DEFAULT 0,
  `sessao` int(11) DEFAULT 0,
  `vendas_sim` int(2) DEFAULT 0,
  `total_venda` int(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `config`
--

INSERT INTO `config` (`id`, `arquivo`, `conf`, `camera`, `tempo`, `diferenca`, `estoque_loja`, `sessao`, `vendas_sim`, `total_venda`) VALUES
(11, '/util', 1, NULL, NULL, 0, 0, 0, 0, NULL),
(31, NULL, NULL, NULL, NULL, 0, 0, 1, 0, NULL),
(60, NULL, 3, NULL, 30000, 0, 0, 0, 0, NULL);

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
  `status` int(2) NOT NULL DEFAULT 1,
  `quantidade` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_sessao`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

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
  `sexo` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `senha`, `tipo`, `sexo`) VALUES
(56, 'admin', '$2y$10$Z1Jcu.Aww7.iXbaIvRi2IubhA9MzhgB17jkVqt47R3OKLGGLqYj6S', 'adm', 'F');

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
  `data_hora` datetime DEFAULT NULL,
  `retirar` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restrições para despejos de tabelas
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
