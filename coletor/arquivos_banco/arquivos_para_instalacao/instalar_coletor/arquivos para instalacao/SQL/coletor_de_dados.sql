-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Out-2020 às 20:18
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
) ENGINE=InnoDB AUTO_INCREMENT=223 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `auditoria`
--

INSERT INTO `auditoria` (`id`, `usuario`, `descricao`, `data`) VALUES
(1, 'admin', 'zerou o sistema', '2020-03-08 04:31:21'),
(2, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 1 PRODUTO N?O CADASTRADO QUANTIDADE = 374', '2020-03-08 04:43:38'),
(3, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 84949 PRODUTO N?O CADASTRADO QUANTIDADE = 3', '2020-03-08 04:43:41'),
(4, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 2 PRODUTO N?O CADASTRADO QUANTIDADE = 7', '2020-03-08 04:43:43'),
(5, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 3 PRODUTO N?O CADASTRADO QUANTIDADE = 5', '2020-03-08 04:43:45'),
(6, 'admin', 'Excluiu dados processados e importados', '2020-03-10 04:37:19'),
(7, 'admin', 'Excluiu produtos de pesquisa', '2020-03-10 04:37:26'),
(8, 'admin', 'Excluiu dados processados e importados', '2020-03-11 09:22:26'),
(9, 'admin', 'Excluiu o usu?rio Timoteo', '2020-03-11 12:52:39'),
(10, 'admin', 'Excluiu o usu?rio Erica', '2020-03-11 12:52:41'),
(11, 'admin', 'Excluiu o usu?rio Marcia', '2020-03-11 12:52:44'),
(12, 'admin', 'Excluiu o usu?rio Mercia', '2020-03-11 12:52:46'),
(13, 'admin', 'Excluiu o usu?rio Sidnei', '2020-03-11 12:52:48'),
(14, 'admin', 'Excluiu dados processados e importados', '2020-03-11 12:53:55'),
(15, 'admin', 'Excluiu produtos de pesquisa', '2020-03-11 15:10:54'),
(16, 'admin', 'Excluiu produtos de pesquisa', '2020-03-11 15:11:13'),
(17, 'admin', 'Excluiu dados processados e importados', '2020-03-11 15:30:05'),
(18, 'admin', 'Excluiu dados processados e importados', '2020-03-11 15:51:29'),
(19, 'admin', 'Excluiu dados processados e importados', '2020-03-11 16:09:15'),
(20, 'admin', 'Excluiu produtos de pesquisa', '2020-03-11 16:09:22'),
(21, 'admin', 'Excluiu dados processados e importados', '2020-03-11 18:29:05'),
(22, 'admin', 'Excluiu dados processados e importados', '2020-03-11 18:33:00'),
(23, 'admin', 'Excluiu produtos de pesquisa', '2020-03-12 14:50:11'),
(24, 'admin', 'Excluiu dados processados e importados', '2020-03-12 14:50:17'),
(25, 'admin', 'Excluiu dados processados e importados', '2020-03-13 09:59:55'),
(26, 'admin', 'Excluiu produtos de pesquisa', '2020-03-13 09:59:58'),
(27, 'admin', 'Excluiu dados processados e importados', '2020-03-13 10:44:00'),
(28, 'admin', 'Excluiu dados processados e importados', '2020-03-13 10:47:22'),
(29, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 043917996349 MAQ WAHL DETAILER QUANTIDADE = 18', '2020-03-13 11:00:03'),
(30, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 049774998670 PRODUTO NAO CADASTRADO QUANTIDADE = 1', '2020-03-13 11:00:09'),
(31, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 070330717565 APARELHO BARBEAR BIC COMFORT 3 SENSIVEL QUANTIDADE = 1', '2020-03-13 11:00:10'),
(32, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7891060825305 TESOURA MUNDIAL FLEX REF:163-5 QUANTIDADE = 1', '2020-03-13 11:00:11'),
(33, 'admin', 'Excluiu produtos de pesquisa', '2020-03-13 13:34:54'),
(34, 'admin', 'Excluiu dados processados e importados', '2020-03-13 13:40:28'),
(35, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7899934700239 MAQ WAHL ICON (NOVA) QUANTIDADE = 3', '2020-03-13 15:13:32'),
(36, 'admin', 'Excluiu dados processados e importados', '2020-03-13 15:24:08'),
(37, 'admin', 'Excluiu dados processados e importados', '2020-03-13 15:24:31'),
(38, 'admin', 'Excluiu o usu?rio alicia', '2020-03-13 18:03:18'),
(39, 'admin', 'Excluiu o usu?rio timoteo', '2020-03-13 18:03:20'),
(40, 'admin', 'Excluiu o usu?rio erica', '2020-03-13 18:05:13'),
(41, 'admin', 'Excluiu o endere?o da c?mera', '2020-03-14 08:47:58'),
(42, 'admin', 'Excluiu dados processados e importados', '2020-03-14 08:49:52'),
(43, 'timoteo', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 2 ESMALTE FUSION QUANTIDADE = 3', '2020-03-14 08:50:18'),
(44, 'timoteo', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 1 DIVERSOS QUANTIDADE = 2444', '2020-03-14 08:50:39'),
(45, 'admin', 'Excluiu dados processados e importados', '2020-03-14 08:51:12'),
(46, 'timoteo', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 2 ESMALTE FUSION QUANTIDADE = 1', '2020-03-14 08:56:25'),
(47, 'timoteo', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 1 DIVERSOS QUANTIDADE = 1', '2020-03-14 08:56:48'),
(48, 'admin', 'Excluiu dados processados e importados', '2020-03-14 09:08:40'),
(49, 'admin', 'Excluiu dados processados e importados', '2020-03-14 10:11:41'),
(50, 'mercia', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 1 DIVERSOS QUANTIDADE = 1', '2020-03-14 10:13:34'),
(51, 'mercia', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7898911689185 AMOLECEDOR CUTICULA REPOS CREME 500GR QUANTIDADE = 52', '2020-03-14 10:17:28'),
(52, 'mercia', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7890658620120 PRODUTO NAO CADASTRADO QUANTIDADE = 2', '2020-03-14 10:24:46'),
(53, 'mercia', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 789622994251 PRODUTO NAO CADASTRADO QUANTIDADE = 6', '2020-03-14 10:28:18'),
(54, 'timoteo', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7899572803200 CR TRAT LOLA MORTE SUBITA 450GR QUANTIDADE = 1', '2020-03-14 10:35:31'),
(55, 'timoteo', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7898170656089 COND VITISS VIOLETA 300ML QUANTIDADE = 1', '2020-03-14 10:35:33'),
(56, 'timoteo', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7898170655082 SH VITISS VIOLETA 300ML QUANTIDADE = 1', '2020-03-14 10:35:35'),
(57, 'timoteo', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7898170655044 SH VITISS JABORANDI 300ML QUANTIDADE = 7', '2020-03-14 10:35:41'),
(58, 'timoteo', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7898170657031 CR TRAT VITISS TUTANO 250GR QUANTIDADE = 4', '2020-03-14 10:35:43'),
(59, 'timoteo', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7898170657048 CR TRAT VITISS ANDIROBA 250GR QUANTIDADE = 5', '2020-03-14 10:35:45'),
(60, 'timoteo', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7898170657024 CR TRAT VITISS QUERATINA 250GR QUANTIDADE = 5', '2020-03-14 10:35:47'),
(61, 'timoteo', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7898170657079 CR TRAT VITISS ARGAN 250GR QUANTIDADE = 2', '2020-03-14 10:35:48'),
(62, 'timoteo', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7898170657529 CR TRAT VITISS QUERATINA 500GR QUANTIDADE = 3', '2020-03-14 10:35:51'),
(63, 'timoteo', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7898170657604 CR TRAT VITISS BOMBA 500GR QUANTIDADE = 2', '2020-03-14 10:35:53'),
(64, 'timoteo', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7898170657543 CR TRAT VITISS ANDIROBA 500GR QUANTIDADE = 3', '2020-03-14 10:35:54'),
(65, 'timoteo', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7898170657512 CR TRAT VITISS QUIABO 500GR QUANTIDADE = 3', '2020-03-14 10:35:56'),
(66, 'timoteo', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7898170657536 CR TRAT VITISS TUTANO 500GR QUANTIDADE = 1', '2020-03-14 10:35:58'),
(67, 'timoteo', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7891350033687 PRODUTO NAO CADASTRADO QUANTIDADE = 3', '2020-03-14 10:40:41'),
(68, 'mercia', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7897462700431 COND BONNAHAIR BRILHO MOLHADO 500ML QUANTIDADE = 4', '2020-03-14 10:49:09'),
(69, 'timoteo', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7896013561073 PRODUTO NAO CADASTRADO QUANTIDADE = 5', '2020-03-14 10:58:29'),
(70, 'timoteo', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7896013544517 TINT MAXTON 1.0 100GR QUANTIDADE = 2', '2020-03-14 11:05:59'),
(71, 'mercia', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 789891599983 PRODUTO NAO CADASTRADO QUANTIDADE = 7', '2020-03-14 11:18:03'),
(72, 'timoteo', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7899109004308 SH BIOVEGETAIS MAXIMA HIDRATACAO 300ML QUANTIDADE = 6', '2020-03-14 11:31:17'),
(73, 'mercia', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7898136150019 ALGODAO NATHALYA 25GR QUANTIDADE = 160', '2020-03-14 12:10:52'),
(74, 'timoteo', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 78989579532069 PRODUTO NAO CADASTRADO QUANTIDADE = 7', '2020-03-14 16:39:11'),
(75, 'timoteo', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7896116113429 SECADOR TAIFF TITANIUM TRIBAL 2100W QUANTIDADE = 3', '2020-03-14 16:47:20'),
(76, 'timoteo', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7897169281479 CABINE LED MEGA BELL PRETO QUANTIDADE = 2', '2020-03-14 16:59:15'),
(77, 'timoteo', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7891010031350 LAVANDA JOHNSONS 200ML QUANTIDADE = 9', '2020-03-14 18:43:25'),
(78, 'timoteo', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7896622119452 PRODUTO NAO CADASTRADO QUANTIDADE = 3', '2020-03-14 18:48:56'),
(79, 'mercia', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7898028778809 PRODUTO NAO CADASTRADO QUANTIDADE = 4', '2020-03-14 19:29:39'),
(80, 'mercia', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7898825778809 PRODUTO NAO CADASTRADO QUANTIDADE = 4', '2020-03-14 19:30:21'),
(81, 'mercia', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 6295125034281 PRODUTO NAO CADASTRADO QUANTIDADE = 6', '2020-03-14 19:34:35'),
(82, 'mercia', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 6295125034274 PRODUTO NAO CADASTRADO QUANTIDADE = 6', '2020-03-14 19:35:02'),
(83, 'timoteo', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7897169211872 LUVA SANTA CLARA BLACK P REF.1187 QUANTIDADE = 1', '2020-03-14 19:46:57'),
(84, 'timoteo', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7897517920012 FIO DENTAL BELLIZ KESS REF.2001 QUANTIDADE = 40', '2020-03-14 19:54:19'),
(85, 'timoteo', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7897517919962 FIO DENTAL BELLIZ KESS REF.1996 QUANTIDADE = 8', '2020-03-14 19:55:27'),
(86, 'ericka', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7896964214066 PRODUTO NAO CADASTRADO QUANTIDADE = 2', '2020-03-14 19:58:42'),
(87, 'ericka', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7896964214044 PRODUTO NAO CADASTRADO QUANTIDADE = 4', '2020-03-14 20:01:51'),
(88, 'ericka', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7896964214044 PRODUTO NAO CADASTRADO QUANTIDADE = 4', '2020-03-14 20:02:07'),
(89, 'ericka', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7896964214075 PRODUTO NAO CADASTRADO QUANTIDADE = 2', '2020-03-14 20:04:06'),
(90, 'ericka', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7896964214097 PRODUTO NAO CADASTRADO QUANTIDADE = 2', '2020-03-14 20:05:04'),
(91, 'ericka', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7898864214037 PRODUTO NAO CADASTRADO QUANTIDADE = 2', '2020-03-14 20:05:54'),
(92, 'ericka', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7896964214037 PRODUTO NAO CADASTRADO QUANTIDADE = 2', '2020-03-14 20:06:26'),
(93, 'ericka', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7898964214082 BATOM OMNA ELECTRA QUANTIDADE = 3', '2020-03-14 20:20:43'),
(94, 'timoteo', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7898312324487 PINCEL PRO ART REF.T-1110 QUANTIDADE = 5', '2020-03-14 20:20:55'),
(95, 'ericka', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7898100047024 PO COMPACTO OMNA MAIS MEDIO QUANTIDADE = 6', '2020-03-14 20:23:33'),
(96, 'ericka', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7899596531899 SOMBRA ZANPHY GLITTER HOLOGRAFICA LINHA VIBE QUANTIDADE = 4', '2020-03-14 20:41:50'),
(97, 'timoteo', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7896229912237 PRODUTO NAO CADASTRADO QUANTIDADE = 4', '2020-03-14 20:55:22'),
(98, 'alicia', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7898398463506 COND PRO-THESS POS QUIMICA 300ML QUANTIDADE = 4', '2020-03-14 20:58:04'),
(99, 'alicia', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7898497187709 PRODUTO NAO CADASTRADO QUANTIDADE = 5', '2020-03-14 21:07:32'),
(100, 'alicia', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7898497187709 PRODUTO NAO CADASTRADO QUANTIDADE = 5', '2020-03-14 21:07:36'),
(101, 'mercia', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7898658624197 COND SKAFE KERAFORM LISO DO SEU JEITO 500GR QUANTIDADE = 5', '2020-03-14 21:09:03'),
(102, 'mercia', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7898170655167 SH VITISS MATIZADOR 200ML QUANTIDADE = 5', '2020-03-14 21:10:40'),
(103, 'mercia', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7898170655167 SH VITISS MATIZADOR 200ML QUANTIDADE = 3', '2020-03-14 21:10:52'),
(104, 'ericka', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7898100044751 PRODUTO NAO CADASTRADO QUANTIDADE = 6', '2020-03-15 08:13:37'),
(105, 'ericka', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7898100047551 PRODUTO NAO CADASTRADO QUANTIDADE = 6', '2020-03-15 08:14:12'),
(106, 'daniele', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7896013565833 PRODUTO NAO CADASTRADO QUANTIDADE = 9', '2020-03-15 08:29:14'),
(107, 'timoteo', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7899596529827 PRODUTO NAO CADASTRADO QUANTIDADE = 6', '2020-03-15 08:36:10'),
(108, 'timoteo', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7898634211281 KIT SOMBRA SOMBRANCELHAS MAX LOVE REF:02 QUANTIDADE = 7', '2020-03-15 08:38:44'),
(109, 'timoteo', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7908060100803 CANETA DELINEADORA JASMYNE 1,2GR QUANTIDADE = 19', '2020-03-15 08:39:25'),
(110, 'ericka', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7899596520855 BATOM ZANPHY 2EM1 N? 05 QUANTIDADE = 2', '2020-03-15 08:43:25'),
(111, 'ericka', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7896032624238 LAPIS OLHOS TRACTA SNOW WHITE BRANCO QUANTIDADE = 4', '2020-03-15 08:50:40'),
(112, 'ericka', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7896032624054 LAPIS OLHOS TRACTA DARK BLACK QUANTIDADE = 9', '2020-03-15 08:53:33'),
(113, 'ericka', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7896032692213 LAPIS OLHOS TRACTA PRETO QUANTIDADE = 10', '2020-03-15 08:55:02'),
(114, 'mercia', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 78961500117301 PRODUTO NAO CADASTRADO QUANTIDADE = 6', '2020-03-15 09:21:34'),
(115, 'mercia', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7896150005032 PO DESCOLORANTE YAMA ACTIVE 20GR QUANTIDADE = 28', '2020-03-15 09:23:50'),
(116, 'alicia', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 2820605219403 PRODUTO NAO CADASTRADO QUANTIDADE = 4', '2020-03-15 09:24:05'),
(117, 'alicia', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7896605219236 SH OURIBEL JABORANDI 500ML QUANTIDADE = 6', '2020-03-15 09:25:52'),
(118, 'alicia', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7896115113116 DEFRIZANTE SOFT HAIR BLOND 400ML QUANTIDADE = 6', '2020-03-15 09:27:27'),
(119, 'ericka', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7899536102509 PINCEL ZALIKE MAQUIAGEM REF.8218 QUANTIDADE = 5', '2020-03-15 09:27:39'),
(120, 'alicia', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7896013569084 CR TRAT SEMPRE BELLA MACADAMIA 1KG QUANTIDADE = 7', '2020-03-15 09:30:54'),
(121, 'mercia', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7896278102100 PRODUTO NAO CADASTRADO QUANTIDADE = 1', '2020-03-15 09:31:04'),
(122, 'mercia', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7896729102100 PRODUTO NAO CADASTRADO QUANTIDADE = 1', '2020-03-15 09:31:19'),
(123, 'ericka', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7898300744013 PRODUTO NAO CADASTRADO QUANTIDADE = 1', '2020-03-15 09:33:51'),
(124, 'ericka', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7897214700054 GRAMPO DARMA PRETO N7 100UN QUANTIDADE = 55', '2020-03-15 09:39:21'),
(125, 'daniele', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7897169201439 NAVALHETE INOX SANTA CLARA REF.143 QUANTIDADE = 19', '2020-03-15 09:40:09'),
(126, 'alicia', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 202 PARAFINA TROPICAL 40GR QUANTIDADE = 3', '2020-03-15 09:40:14'),
(127, 'ericka', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 17897517917330 PRODUTO NAO CADASTRADO QUANTIDADE = 36', '2020-03-15 09:42:57'),
(128, 'ericka', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7897169201927 PRODUTO NAO CADASTRADO QUANTIDADE = 1', '2020-03-15 09:44:33'),
(129, 'ericka', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7897517932367 PRODUTO NAO CADASTRADO QUANTIDADE = 6', '2020-03-15 09:45:51'),
(130, 'alicia', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7898522372346 CERA DEPILFLAX HORTELA 100G QUANTIDADE = 8', '2020-03-15 09:46:39'),
(131, 'ericka', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7897385001592 PRODUTO NAO CADASTRADO QUANTIDADE = 800', '2020-03-15 09:48:09'),
(132, 'ericka', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7896025523005 MALETA MARCO BONI MANICURE REF.2016 QUANTIDADE = 1', '2020-03-15 10:02:14'),
(133, 'mercia', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7896417700632 ACETONA INFA 90ML QUANTIDADE = 35', '2020-03-15 10:05:17'),
(134, 'ericka', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 39 PRODUTO NAO CADASTRADO QUANTIDADE = 25', '2020-03-15 10:05:19'),
(135, 'ericka', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 39 PRODUTO NAO CADASTRADO QUANTIDADE = 25', '2020-03-15 10:05:30'),
(136, 'daniele', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7791293032467 DES REXONA AERO COTTON DRY 150ML QUANTIDADE = 6', '2020-03-15 10:08:27'),
(137, 'daniele', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7791293022567 DES REXONA AERO V8 150ML QUANTIDADE = 4', '2020-03-15 10:10:22'),
(138, 'ericka', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7893300521145 HAIR SPRAY KARINA EXTRA FORTE 250ML QUANTIDADE = 3', '2020-03-15 10:12:51'),
(139, 'alicia', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7898395842472 PRODUTO NAO CADASTRADO QUANTIDADE = 1', '2020-03-15 10:15:25'),
(140, 'alicia', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7896279114233 COND MURIEL BOMBA CABELOS NORMAIS 300ML QUANTIDADE = 1', '2020-03-15 10:25:14'),
(141, 'mercia', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7898369001889 PRODUTO NAO CADASTRADO QUANTIDADE = 1', '2020-03-15 10:32:45'),
(142, 'daniele', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7891350033687 PRODUTO NAO CADASTRADO QUANTIDADE = 6', '2020-03-15 10:35:07'),
(143, 'daniele', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7891350033687 PRODUTO NAO CADASTRADO QUANTIDADE = 18', '2020-03-15 10:35:20'),
(144, 'alicia', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7896279113366 SH MURIEL UMIDILIZ KIDS 250ML QUANTIDADE = 5', '2020-03-15 10:47:08'),
(145, 'alicia', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7896085471766 PRODUTO NAO CADASTRADO QUANTIDADE = 2', '2020-03-15 10:49:04'),
(146, 'alicia', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7896085870668 KIT ORIGEM SH COND COM ONDA 300ML QUANTIDADE = 7', '2020-03-15 11:16:14'),
(147, 'alicia', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7898623955530 SH SALON LINE MICELAR 300M QUANTIDADE = 1', '2020-03-15 11:17:29'),
(148, 'alicia', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7898868604176 PRODUTO NAO CADASTRADO QUANTIDADE = 5', '2020-03-15 11:37:46'),
(149, 'alicia', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7898868604190 PRODUTO NAO CADASTRADO QUANTIDADE = 3', '2020-03-15 11:38:31'),
(150, 'mercia', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7898524349599 CR TRAT SALON LINE MAIONESE VEGANA AZEITE 500ML QUANTIDADE = 4', '2020-03-15 11:39:18'),
(151, 'daniele', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 789650995 PRODUTO NAO CADASTRADO QUANTIDADE = 6', '2020-03-15 11:40:29'),
(152, 'ericka', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7898398462886 PRODUTO NAO CADASTRADO QUANTIDADE = 1', '2020-03-15 11:45:56'),
(153, 'ericka', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7898398462886 PRODUTO NAO CADASTRADO QUANTIDADE = 1', '2020-03-15 11:47:20'),
(154, 'ericka', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7898398462894 PRODUTO NAO CADASTRADO QUANTIDADE = 1', '2020-03-15 11:47:42'),
(155, 'mercia', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7891182016223 TINT KOLESTON 20 110GR QUANTIDADE = 9', '2020-03-15 11:48:11'),
(156, 'ericka', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 26 UNHA POSTICA GOLD FINGER REF.AB-1527 QUANTIDADE = 17', '2020-03-15 11:50:18'),
(157, 'ericka', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 26 UNHA POSTICA GOLD FINGER REF.AB-1527 QUANTIDADE = 17', '2020-03-15 11:50:35'),
(158, 'ericka', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 1 DIVERSOS QUANTIDADE = 16', '2020-03-15 11:50:47'),
(159, 'daniele', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7896852615881 TINT AMEND MAGNIFIC 66.60 125GR QUANTIDADE = 55', '2020-03-15 11:51:24'),
(160, 'alicia', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7908038601516 FOREVER LISS SH COND ESPECIAL COCONOUT 600ML QUANTIDADE = 3', '2020-03-15 11:52:18'),
(161, 'mercia', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7898610371480 TINT HASKELL TONALIZANTE 610 QUANTIDADE = 7', '2020-03-15 11:54:42'),
(162, 'daniele', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7896013544159 TINT MAXTON 4.0 100GR QUANTIDADE = 5', '2020-03-15 11:54:45'),
(163, 'ericka', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7896711141735 PRODUTO NAO CADASTRADO QUANTIDADE = 5', '2020-03-15 12:04:48'),
(164, 'ericka', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7896711141735 PRODUTO NAO CADASTRADO QUANTIDADE = 5', '2020-03-15 12:05:22'),
(165, 'timoteo', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 78974627000400 PRODUTO NAO CADASTRADO QUANTIDADE = 4', '2020-03-15 12:09:58'),
(166, 'ericka', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7896727934116 PRODUTO NAO CADASTRADO QUANTIDADE = 1', '2020-03-15 12:12:12'),
(167, 'alicia', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7896522031171 SH CAPICILIN POS QUIMICA 250ML QUANTIDADE = 4', '2020-03-15 12:18:14'),
(168, 'admin', 'Excluiu dados processados e importados', '2020-03-16 11:50:36'),
(169, 'timoteo', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 1111 PRODUTO NAO CADASTRADO QUANTIDADE = 7', '2020-03-16 15:02:02'),
(170, 'timoteo', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 50155 PRODUTO NAO CADASTRADO QUANTIDADE = 1', '2020-03-16 15:05:01'),
(171, 'timoteo', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 20155 PRODUTO NAO CADASTRADO QUANTIDADE = 1', '2020-03-16 15:07:48'),
(172, 'timoteo', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 20111 PRODUTO NAO CADASTRADO QUANTIDADE = 1', '2020-03-16 15:08:00'),
(173, 'timoteo', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 201555 PRODUTO NAO CADASTRADO QUANTIDADE = 1', '2020-03-16 15:08:02'),
(174, 'timoteo', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 201111111 PRODUTO NAO CADASTRADO QUANTIDADE = 1', '2020-03-16 15:08:55'),
(175, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 6546544 PRODUTO NAO CADASTRADO QUANTIDADE = 321', '2020-03-16 16:09:42'),
(176, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 654654564 PRODUTO NAO CADASTRADO QUANTIDADE = 1', '2020-03-16 16:09:44'),
(177, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 20164654 PRODUTO NAO CADASTRADO QUANTIDADE = 1', '2020-03-16 16:09:45'),
(178, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 20111 PRODUTO NAO CADASTRADO QUANTIDADE = 1', '2020-03-16 16:09:47'),
(179, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 2222 PRODUTO NAO CADASTRADO QUANTIDADE = 1111', '2020-03-16 16:09:48'),
(180, 'admin', 'Excluiu produtos de pesquisa', '2020-08-12 14:33:41'),
(181, 'admin', 'Excluiu dados processados e importados', '2020-08-12 14:33:53'),
(182, 'admin', 'Excluiu produtos de pesquisa', '2020-08-12 14:54:57'),
(183, 'admin', 'Excluiu dados processados e importados', '2020-08-12 14:55:10'),
(184, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7896014183043 TINT CASTING 200 112GR QUANTIDADE = 19', '2020-08-12 15:03:33'),
(185, 'admin', 'Excluiu o endereço da câmera', '2020-08-12 15:29:16'),
(186, 'admin', 'Excluiu produtos de pesquisa', '2020-08-12 16:35:21'),
(187, 'admin', 'Excluiu dados processados e importados', '2020-08-12 16:35:25'),
(188, 'admin', 'Excluiu o endereço da câmera', '2020-08-22 08:40:37'),
(189, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 2011 PRODUTO NAO CADASTRADO QUANTIDADE = 1', '2020-08-22 08:40:51'),
(190, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 2012 PRODUTO NAO CADASTRADO QUANTIDADE = 1', '2020-08-22 08:40:52'),
(191, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 123 TINT NUTRISSE COR INTENSA 3.16 122ML QUANTIDADE = 1', '2020-08-22 08:40:53'),
(192, 'admin', 'Excluiu o endereço da câmera', '2020-08-22 08:42:44'),
(193, 'admin', 'Excluiu o endereço da câmera', '2020-08-22 08:43:06'),
(194, 'admin', 'Excluiu o endereço da câmera', '2020-08-22 08:43:39'),
(195, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 123 TINT NUTRISSE COR INTENSA 3.16 122ML QUANTIDADE = 1', '2020-08-22 08:43:49'),
(196, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 2 PRODUTO NAO CADASTRADO QUANTIDADE = 2', '2020-08-22 08:43:50'),
(197, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 1234 CR TRAT ELSEVE REP TOTAL 5 QUIMICA 300GR QUANTIDADE = 1', '2020-08-22 08:43:52'),
(198, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 2 PRODUTO NAO CADASTRADO QUANTIDADE = 2', '2020-08-22 08:58:11'),
(199, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 20 PRODUTO NAO CADASTRADO QUANTIDADE = 2', '2020-08-22 09:00:17'),
(200, 'admin', 'Excluiu o usuário alicia', '2020-08-22 09:02:39'),
(201, 'admin', 'Excluiu o usuário mercia', '2020-08-22 09:02:45'),
(202, 'admin', 'Excluiu o usuário daniele', '2020-08-22 09:02:47'),
(203, 'admin', 'Excluiu o usuário timoteo', '2020-08-22 09:02:49'),
(204, 'admin', 'Excluiu o usuário ericka', '2020-08-22 09:02:51'),
(205, 'admin', 'Excluiu o endereço da câmera', '2020-08-26 13:25:54'),
(206, 'admin', 'Excluiu o endereço da câmera', '2020-08-26 13:26:31'),
(207, 'admin', 'Excluiu dados processados e importados', '2020-08-31 09:17:05'),
(208, 'admin', 'Excluiu produtos de pesquisa', '2020-09-16 13:48:55'),
(209, 'admin', 'Excluiu o endereço da câmera', '2020-09-18 22:42:28'),
(210, 'admin', 'Excluiu o endereço da câmera', '2020-09-18 22:43:33'),
(211, 'admin', 'Excluiu o endereço da câmera', '2020-09-18 22:47:55'),
(212, 'admin', 'Excluiu o endereço da câmera', '2020-09-22 22:48:54'),
(213, 'admin', 'Ecluiu as diferencas da coleta', '2020-09-22 22:58:04'),
(214, 'admin', 'Excluiu dados processados e importados', '2020-09-25 22:43:33'),
(215, 'admin', 'Excluiu o endereço da câmera', '2020-10-10 17:49:23'),
(216, 'admin', 'Fonte: coletor_mobile EXCLUIU O PRODUTO 7899026462564 TINT NUTRISSE COR INTENSA 3.16 122ML QUANTIDADE = 5', '2020-10-10 17:49:42'),
(217, 'admin', 'Excluiu a coleta de admin', '2020-10-10 19:45:41'),
(218, 'admin', 'Ecluiu as diferencas da coleta', '2020-10-10 19:53:10'),
(219, 'admin', 'Ecluiu as diferencas da coleta', '2020-10-10 19:53:31'),
(220, 'admin', 'Excluiu dados processados e importados', '2020-10-10 19:56:03'),
(221, 'admin', 'Excluiu produtos de pesquisa', '2020-10-10 19:56:21'),
(222, 'admin', 'Excluiu produtos de pesquisa', '2020-10-10 20:00:09');

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
('7899026462564', 'TINT NUTRISSE COR INTENSA 3.16 122ML', 10.99, 1, 'GARNIER', 'TINTURA', 1, 1),
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `coletor_exportar`
--

INSERT INTO `coletor_exportar` (`referencia`, `quantidade`, `descricao`, `local_estoque`, `local_loja`, `diferenca_vendas`, `id`) VALUES
('2012', 2, 'PRODUTO NAO CADASTRADO', 0, 1, 0, 1),
('7899026462564', 3, 'TINT NUTRISSE COR INTENSA 3.16 122ML', 0, 1, 0, 2);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `coletor_importar`
--

INSERT INTO `coletor_importar` (`referencia`, `quantidade`, `descricao`, `usuario`, `hora`, `local_estoque`, `local_loja`, `fabricante`, `id`) VALUES
('2012', 2, 'PRODUTO NAO CADASTRADO', 'admin', '2020-10-10 20:02:09', 0, 1, NULL, 1),
('7899026462564', 3, 'TINT NUTRISSE COR INTENSA 3.16 122ML', 'admin', '2020-10-10 20:05:32', 0, 1, 'GARNIER', 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `config`
--

INSERT INTO `config` (`id`, `arquivo`, `conf`, `camera`, `tempo`, `diferenca`, `estoque_loja`) VALUES
(3, '/util', 1, NULL, NULL, 0, 0),
(10, NULL, 2, '192.168.1.254:37791/coletor_de_dados', NULL, 0, 0),
(14, NULL, 3, NULL, 600000, 0, 0),
(16, NULL, 15, NULL, NULL, 0, 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id`, `referencia`, `descricao`, `quantidade`) VALUES
(2, 2011, '2', 5),
(3, 2010, '1', 4),
(4, 1, '1', 10),
(5, 2011, '1', 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
