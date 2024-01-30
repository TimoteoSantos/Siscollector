-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 30-Jan-2024 às 14:52
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=16384 DEFAULT CHARSET=latin1;

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
  `hora` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2470 DEFAULT CHARSET=latin1;

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
  `referencia_ordem` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sessao` (`chave_sessao`)
) ENGINE=InnoDB AUTO_INCREMENT=5257 DEFAULT CHARSET=latin1;

--
-- Acionadores `coletor_importar`
--
DROP TRIGGER IF EXISTS `trig_atualizar_campo_destino`;
DELIMITER $$
CREATE TRIGGER `trig_atualizar_campo_destino` BEFORE INSERT ON `coletor_importar` FOR EACH ROW SET NEW.referencia_ordem = NEW.referencia
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `trig_atualizar_campo_destino_update`;
DELIMITER $$
CREATE TRIGGER `trig_atualizar_campo_destino_update` BEFORE UPDATE ON `coletor_importar` FOR EACH ROW SET NEW.referencia_ordem = NEW.referencia
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `config`
--

DROP TABLE IF EXISTS `config`;
CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `arquivo` text,
  `conf` int(3) DEFAULT '0',
  `camera` varchar(255) DEFAULT NULL,
  `tempo` int(10) DEFAULT NULL,
  `diferenca` int(5) DEFAULT '0',
  `estoque_loja` int(2) DEFAULT '0',
  `sessao` int(11) DEFAULT '0',
  `vendas_sim` int(2) DEFAULT '0',
  `total_venda` int(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=171 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `senha`, `tipo`, `sexo`) VALUES
(58, 'timoteo', '$2y$10$jdXJgZvaCO8BqJZyx4/TdOlq2JhzFUlT71oOjFST6tofBPv31z9si', 'adm', 'M');

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
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `coletor_importar`
--
ALTER TABLE `coletor_importar`
  ADD CONSTRAINT `fk_sessao` FOREIGN KEY (`chave_sessao`) REFERENCES `sessao` (`id_sessao`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
