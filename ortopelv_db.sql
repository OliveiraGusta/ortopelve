-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 05, 2023 at 10:33 PM
-- Server version: 10.4.29-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ortopelv_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `atendimentos`
--

CREATE TABLE `atendimentos` (
  `id` int(11) NOT NULL,
  `descricao` varchar(60) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `email_med` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `atendimentos`
--

INSERT INTO `atendimentos` (`id`, `descricao`, `valor`, `email_med`) VALUES
(52, 'Serviço', '100.00', 'cliente@4wsites.com'),
(53, 'Sessão ', '200.00', 'erikapedros@hotmail.com'),
(54, 'Sessão Pélvica Desc  150', '150.00', 'erikapedros@hotmail.com'),
(55, 'Consulta de avaliação Pélvica', '250.00', 'erikapedros@hotmail.com'),
(56, 'Sessão 180', '180.00', 'erikapedros@hotmail.com'),
(57, 'Consulta x', '450.00', 'victor@gmail.com'),
(58, 'teste', '50.00', 'povoas1@outlook.com'),
(60, 'nome2', '12.00', 'teste10@teste.com.br'),
(61, 'Atendimento Bradesco ', '93.89', 'isabela_srangel@hotmail.com'),
(62, 'Atendimento particukar', '140.00', 'isabela_srangel@hotmail.com'),
(63, 'Avaliação ', '400.00', 'bia.n2012@hotmail.com'),
(64, 'Consulta', '250.00', 'bia.n2012@hotmail.com'),
(65, 'Consulta Santo André ', '280.00', 'bia.n2012@hotmail.com'),
(66, 'Consulta Unimed', '300.00', 'bia.n2012@hotmail.com'),
(67, 'Palestra igreja', '800.00', 'bia.n2012@hotmail.com'),
(68, 'Palestra escola', '400.00', 'bia.n2012@hotmail.com'),
(69, 'Ebook', '50.00', 'bia.n2012@hotmail.com'),
(70, 'Caminhada assitida', '100.00', 'wanderson.feitosa211@gmail.com'),
(71, 'Sessão promo', '100.00', 'erikapedros@hotmail.com'),
(72, 'Fisioterapia Pélvica ', '200.00', 'drjoaovitormagalhaes@gmail.com'),
(73, 'Avaliação Fisioterapia Pélvica ', '200.00', 'drjoaovitormagalhaes@gmail.com'),
(74, 'ATENDIMENTO', '140.00', 'dramarcia.fisiopelvica@gmail.com'),
(75, 'PLANO DE 5 ATENDIMENTOS', '550.00', 'dramarcia.fisiopelvica@gmail.com'),
(76, 'PLANO DE 10 ATENDIMENTOS', '1100.00', 'dramarcia.fisiopelvica@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `cargos`
--

CREATE TABLE `cargos` (
  `id` int(11) NOT NULL,
  `nome` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cargos`
--

INSERT INTO `cargos` (`id`, `nome`) VALUES
(1, 'Medico'),
(2, 'Farmaceutico'),
(3, 'Faxineira'),
(4, 'Tesoureiro'),
(5, 'Enfermeira'),
(6, 'Balconista'),
(7, 'Caixa'),
(8, 'Recepcionista');

-- --------------------------------------------------------

--
-- Table structure for table `chamadas`
--

CREATE TABLE `chamadas` (
  `id` int(11) NOT NULL,
  `paciente` varchar(40) NOT NULL,
  `consultorio` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `consultas`
--

CREATE TABLE `consultas` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `paciente` int(11) NOT NULL,
  `tipo_atendimento` int(11) NOT NULL,
  `medico` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `pgto_confirmado` varchar(5) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `atestado` int(11) DEFAULT NULL,
  `prescricao` varchar(10) DEFAULT NULL,
  `receita` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `consultas`
--

INSERT INTO `consultas` (`id`, `data`, `hora`, `paciente`, `tipo_atendimento`, `medico`, `valor`, `pgto_confirmado`, `status`, `atestado`, `prescricao`, `receita`) VALUES
(193, '2023-03-07', '08:00:00', 156, 53, 41, '200.00', 'Sim', 'Finalizada', NULL, 'Sim', NULL),
(194, '2023-03-07', '09:00:00', 157, 53, 41, '200.00', 'Sim', 'Finalizada', NULL, 'Sim', NULL),
(196, '2023-03-02', '08:00:00', 156, 53, 41, '200.00', 'Sim', 'Finalizada', NULL, 'Sim', NULL),
(197, '2023-03-02', '09:00:00', 157, 53, 41, '200.00', 'Sim', 'Finalizada', NULL, NULL, NULL),
(201, '2023-03-09', '07:00:00', 155, 54, 41, '150.00', 'Sim', 'Finalizada', NULL, NULL, NULL),
(202, '2023-03-09', '08:00:00', 156, 53, 41, '200.00', 'Sim', 'Finalizada', NULL, 'Sim', NULL),
(203, '2023-03-09', '09:00:00', 157, 53, 41, '200.00', 'Sim', 'Finalizada', NULL, NULL, NULL),
(204, '2023-03-07', '10:00:00', 161, 53, 41, '200.00', 'Sim', 'Finalizada', NULL, NULL, NULL),
(205, '2023-03-09', '10:00:00', 161, 53, 41, '200.00', 'Sim', 'Finalizada', NULL, NULL, NULL),
(206, '2023-03-14', '10:00:00', 161, 53, 41, '200.00', 'Sim', 'Finalizada', NULL, NULL, NULL),
(207, '2023-03-14', '07:00:00', 155, 56, 41, '180.00', 'Sim', 'Finalizada', NULL, NULL, NULL),
(208, '2023-03-14', '08:00:00', 156, 53, 41, '200.00', 'Sim', 'Finalizada', NULL, 'Sim', NULL),
(209, '2023-03-14', '09:00:00', 157, 53, 41, '200.00', 'Sim', 'Finalizada', NULL, NULL, NULL),
(212, '2023-03-16', '10:00:00', 161, 53, 41, '200.00', 'Sim', 'Finalizada', NULL, NULL, NULL),
(213, '2023-03-16', '09:00:00', 157, 53, 41, '200.00', 'Sim', 'Finalizada', NULL, 'Sim', NULL),
(214, '2023-03-22', '16:00:00', 161, 55, 41, '250.00', 'Não', NULL, NULL, NULL, NULL),
(215, '2023-03-23', '12:50:00', 162, 57, 48, '450.00', 'Não', NULL, NULL, NULL, NULL),
(216, '2023-04-04', '07:00:00', 155, 56, 41, '180.00', 'Sim', 'Finalizada', NULL, 'Sim', NULL),
(217, '2023-04-04', '08:00:00', 156, 53, 41, '200.00', 'Sim', 'Finalizada', NULL, 'Sim', NULL),
(218, '2023-04-04', '10:00:00', 161, 53, 41, '200.00', 'Sim', 'Finalizada', NULL, 'Sim', NULL),
(219, '2023-04-04', '09:00:00', 164, 53, 41, '200.00', 'Sim', 'Finalizada', NULL, 'Sim', NULL),
(220, '2023-04-06', '10:00:00', 161, 53, 41, '200.00', 'Sim', 'Finalizada', NULL, 'Sim', NULL),
(222, '2023-04-20', '10:00:00', 157, 53, 41, '200.00', 'Não', NULL, NULL, NULL, NULL),
(223, '2023-04-21', '00:00:00', 176, 70, 79, '100.00', 'Sim', 'Consultando', 50, NULL, 'Sim'),
(224, '2023-04-11', '07:00:00', 155, 56, 41, '180.00', 'Sim', 'Finalizada', NULL, 'Sim', NULL),
(225, '2023-04-18', '07:00:00', 155, 56, 41, '180.00', 'Sim', 'Finalizada', NULL, NULL, NULL),
(226, '2023-04-25', '07:30:00', 155, 56, 41, '180.00', 'Sim', 'Finalizada', NULL, NULL, NULL),
(227, '2023-04-18', '09:00:00', 157, 53, 41, '200.00', 'Sim', 'Finalizada', NULL, NULL, NULL),
(228, '2023-04-11', '10:00:00', 161, 53, 41, '200.00', 'Sim', 'Finalizada', NULL, NULL, NULL),
(229, '2023-04-13', '10:00:00', 161, 53, 41, '200.00', 'Sim', 'Finalizada', NULL, NULL, NULL),
(230, '2023-04-06', '11:00:00', 165, 53, 41, '200.00', 'Sim', 'Finalizada', NULL, NULL, NULL),
(231, '2023-04-10', '11:00:00', 165, 53, 41, '200.00', 'Sim', 'Finalizada', NULL, NULL, NULL),
(232, '2023-04-11', '09:00:00', 165, 53, 41, '200.00', 'Sim', 'Finalizada', NULL, NULL, NULL),
(233, '2023-04-13', '11:00:00', 165, 53, 41, '200.00', 'Sim', 'Finalizada', NULL, NULL, NULL),
(234, '2023-04-15', '11:00:00', 164, 53, 41, '200.00', 'Sim', 'Finalizada', NULL, NULL, NULL),
(235, '2023-04-20', '09:00:00', 164, 53, 41, '200.00', 'Sim', 'Finalizada', NULL, NULL, NULL),
(236, '2023-04-06', '14:30:00', 163, 71, 41, '100.00', 'Sim', 'Finalizada', NULL, NULL, NULL),
(237, '2023-04-11', '14:30:00', 163, 71, 41, '100.00', 'Sim', 'Finalizada', NULL, NULL, NULL),
(238, '2023-04-18', '14:30:00', 163, 71, 41, '100.00', 'Sim', 'Finalizada', NULL, NULL, NULL),
(239, '2023-04-20', '14:30:00', 163, 71, 41, '100.00', 'Sim', 'Finalizada', NULL, NULL, NULL),
(240, '2023-04-04', '18:30:00', 177, 71, 41, '100.00', 'Sim', 'Aguardando', NULL, NULL, NULL),
(241, '2023-04-11', '18:30:00', 177, 71, 41, '100.00', 'Sim', 'Aguardando', NULL, NULL, NULL),
(242, '2023-04-13', '18:30:00', 177, 71, 41, '100.00', 'Sim', 'Aguardando', NULL, NULL, NULL),
(243, '2023-04-17', '18:30:00', 177, 71, 41, '100.00', 'Sim', 'Aguardando', NULL, NULL, NULL),
(244, '2023-04-18', '18:30:00', 177, 71, 41, '100.00', 'Sim', 'Aguardando', NULL, NULL, NULL),
(245, '2023-04-25', '09:00:00', 157, 53, 41, '200.00', 'Sim', 'Aguardando', NULL, NULL, NULL),
(246, '2023-04-20', '17:00:00', 179, 73, 81, '200.00', 'Não', NULL, NULL, NULL, NULL),
(247, '2023-04-25', '17:00:00', 179, 73, 81, '200.00', 'Não', NULL, NULL, NULL, NULL),
(248, '2023-04-25', '17:00:00', 179, 72, 81, '200.00', 'Não', NULL, NULL, NULL, NULL),
(249, '2023-01-10', '07:00:00', 155, 54, 41, '150.00', 'Não', NULL, NULL, NULL, NULL),
(250, '2023-01-10', '08:00:00', 157, 56, 41, '180.00', 'Não', NULL, NULL, NULL, NULL),
(251, '2023-05-04', '08:00:00', 161, 53, 41, '200.00', 'Não', NULL, NULL, NULL, NULL),
(252, '2023-05-04', '09:00:00', 165, 53, 41, '200.00', 'Não', NULL, NULL, NULL, NULL),
(253, '2023-05-09', '10:00:00', 165, 53, 41, '200.00', 'Sim', 'Aguardando', NULL, NULL, NULL),
(254, '2023-05-09', '09:00:00', 161, 53, 41, '200.00', 'Sim', 'Aguardando', NULL, NULL, NULL),
(255, '2023-05-09', '08:00:00', 164, 53, 41, '200.00', 'Sim', 'Aguardando', NULL, NULL, NULL),
(256, '2023-05-11', '10:00:00', 165, 53, 41, '200.00', 'Sim', 'Aguardando', NULL, NULL, NULL),
(257, '2023-05-11', '09:00:00', 161, 53, 41, '200.00', 'Sim', 'Aguardando', NULL, NULL, NULL),
(258, '2023-05-16', '07:00:00', 155, 53, 41, '200.00', 'Sim', 'Aguardando', NULL, NULL, NULL),
(259, '2023-05-16', '08:00:00', 161, 53, 41, '200.00', 'Sim', 'Aguardando', NULL, NULL, NULL),
(260, '2023-05-16', '09:00:00', 165, 53, 41, '200.00', 'Sim', 'Aguardando', NULL, NULL, NULL),
(261, '2023-05-18', '10:00:00', 165, 53, 41, '200.00', 'Sim', 'Aguardando', NULL, NULL, NULL),
(262, '2023-05-18', '08:00:00', 161, 53, 41, '200.00', 'Sim', 'Aguardando', NULL, NULL, NULL),
(263, '2023-05-23', '09:00:00', 157, 53, 41, '200.00', 'Sim', 'Aguardando', NULL, NULL, NULL),
(264, '2023-05-23', '07:00:00', 155, 53, 41, '200.00', 'Sim', 'Aguardando', NULL, NULL, NULL),
(265, '2023-05-23', '08:00:00', 161, 53, 41, '200.00', 'Sim', 'Aguardando', NULL, NULL, NULL),
(266, '2023-05-23', '10:00:00', 164, 53, 41, '200.00', 'Sim', 'Aguardando', NULL, NULL, NULL),
(267, '2023-05-23', '11:00:00', 165, 53, 41, '200.00', 'Sim', 'Aguardando', NULL, NULL, NULL),
(268, '2023-05-25', '10:00:00', 165, 53, 41, '200.00', 'Sim', 'Aguardando', NULL, NULL, NULL),
(269, '2023-05-25', '09:00:00', 157, 53, 41, '200.00', 'Sim', 'Aguardando', NULL, NULL, NULL),
(270, '2023-05-30', '09:00:00', 157, 53, 41, '200.00', 'Sim', 'Aguardando', NULL, NULL, NULL),
(271, '2023-05-30', '08:00:00', 164, 53, 41, '200.00', 'Sim', 'Aguardando', NULL, NULL, NULL),
(272, '2023-05-30', '10:00:00', 165, 53, 41, '200.00', 'Sim', 'Aguardando', NULL, NULL, NULL),
(273, '2023-05-30', '07:00:00', 155, 53, 41, '200.00', 'Sim', 'Aguardando', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contas_pagar`
--

CREATE TABLE `contas_pagar` (
  `id` int(11) NOT NULL,
  `descricao` varchar(40) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `vencimento` date NOT NULL,
  `pagamento` date DEFAULT NULL,
  `pago` varchar(5) NOT NULL,
  `funcionario` varchar(20) NOT NULL,
  `foto` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contas_receber`
--

CREATE TABLE `contas_receber` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `vencimento` date NOT NULL,
  `data_baixa` date DEFAULT NULL,
  `forma_pgto` varchar(25) DEFAULT NULL,
  `tipo_pgto` varchar(30) DEFAULT NULL,
  `paciente` varchar(30) DEFAULT NULL,
  `tesoureiro` varchar(30) DEFAULT NULL,
  `id_consulta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `contas_receber`
--

INSERT INTO `contas_receber` (`id`, `descricao`, `valor`, `vencimento`, `data_baixa`, `forma_pgto`, `tipo_pgto`, `paciente`, `tesoureiro`, `id_consulta`) VALUES
(185, '53', '200.00', '2023-03-07', '2023-03-14', 'PIX', '', '574.754.908-15', '457.246.228-31', 193),
(186, '53', '200.00', '2023-03-07', '2023-03-08', 'Dinheiro', '', '049.591.168-20', '457.246.228-31', 194),
(187, '54', '150.00', '2023-03-02', '2023-03-08', 'PIX', '', '124.457.858-47', '457.246.228-31', 195),
(188, '53', '200.00', '2023-03-02', '2023-03-14', 'PIX', '', '574.754.908-15', '457.246.228-31', 196),
(189, '53', '200.00', '2023-03-02', '2023-03-08', 'Dinheiro', '', '049.591.168-20', '457.246.228-31', 197),
(190, '53', '200.00', '2023-03-06', '2023-03-08', 'Dinheiro', '', '049.591.168-20', '457.246.228-31', 198),
(191, '53', '200.00', '2023-03-06', '2023-03-14', 'PIX', '', '574.754.908-15', '457.246.228-31', 199),
(192, '54', '150.00', '2023-03-06', '2023-03-08', 'PIX', '', '124.457.858-47', '457.246.228-31', 200),
(193, '54', '150.00', '2023-03-09', '2023-03-14', 'PIX', '', '124.457.858-47', '457.246.228-31', 201),
(194, '53', '200.00', '2023-03-09', '2023-03-14', 'PIX', '', '574.754.908-15', '457.246.228-31', 202),
(195, '53', '200.00', '2023-03-09', '2023-03-14', 'Dinheiro', '', '049.591.168-20', '457.246.228-31', 203),
(196, '53', '200.00', '2023-03-07', '2023-03-14', 'PIX', '', '006.188.908-31', '457.246.228-31', 204),
(197, '53', '200.00', '2023-03-09', '2023-03-14', 'PIX', '', '006.188.908-31', '457.246.228-31', 205),
(198, '53', '200.00', '2023-03-14', '2023-03-19', 'PIX', '', '006.188.908-31', '457.246.228-31', 206),
(199, '56', '180.00', '2023-03-14', '2023-03-14', 'PIX', '', '124.457.858-47', '457.246.228-31', 207),
(200, '53', '200.00', '2023-03-14', '2023-03-19', 'PIX', '', '574.754.908-15', '457.246.228-31', 208),
(201, '53', '200.00', '2023-03-14', '2023-03-14', 'Dinheiro', '', '049.591.168-20', '457.246.228-31', 209),
(202, '55', '250.00', '2023-03-15', '2023-03-19', 'PIX', '', '006.188.908-31', '457.246.228-31', 210),
(203, '55', '250.00', '2023-03-15', '2023-03-19', 'PIX', '', '574.754.908-15', '457.246.228-31', 211),
(204, '53', '200.00', '2023-03-16', '2023-03-19', 'PIX', '', '006.188.908-31', '457.246.228-31', 212),
(205, '53', '200.00', '2023-03-16', '2023-03-19', 'Dinheiro', '', '049.591.168-20', '457.246.228-31', 213),
(207, '57', '450.00', '2023-03-23', NULL, NULL, NULL, '457.246.228-31', '777.784.789-49', 214),
(208, '57', '450.00', '2023-03-23', NULL, NULL, NULL, '457.246.228-31', '777.784.789-49', 215),
(209, '56', '180.00', '2023-04-04', '2023-04-04', 'PIX', '', '124.457.858-47', '457.246.228-31', 216),
(210, '53', '200.00', '2023-04-04', '2023-04-06', 'PIX', '', '574.754.908-15', '457.246.228-31', 217),
(211, '53', '200.00', '2023-04-04', '2023-04-06', 'PIX', '', '006.188.908-31', '457.246.228-31', 218),
(212, '53', '200.00', '2023-04-04', '2023-04-06', 'PIX', '', '558.166.128-67', '457.246.228-31', 219),
(213, '53', '200.00', '2023-04-06', '2023-04-06', 'PIX', '', '006.188.908-31', '457.246.228-31', 220),
(214, '53', '200.00', '2023-04-20', '2023-04-20', 'Dinheiro', '', '049.591.168-20', '457.246.228-31', 221),
(218, '70', '100.00', '2023-04-21', '2023-04-21', 'PIX', 'Do brasil', '891.234.902-18', '123.890.389-92', 223),
(219, '56', '180.00', '2023-04-11', '2023-04-25', 'PIX', '', '124.457.858-47', '457.246.228-31', 224),
(220, '56', '180.00', '2023-04-18', '2023-04-25', 'PIX', '', '124.457.858-47', '457.246.228-31', 225),
(221, '56', '180.00', '2023-04-25', '2023-04-25', 'PIX', '', '124.457.858-47', '457.246.228-31', 226),
(222, '53', '200.00', '2023-04-18', '2023-04-25', 'Dinheiro', '', '049.591.168-20', '457.246.228-31', 227),
(223, '53', '200.00', '2023-04-11', '2023-04-25', 'Dinheiro', '', '006.188.908-31', '457.246.228-31', 228),
(224, '53', '200.00', '2023-04-13', '2023-04-25', 'PIX', '', '006.188.908-31', '457.246.228-31', 229),
(225, '53', '200.00', '2023-04-06', '2023-04-25', 'Cartão', '', '112.946.818-69', '457.246.228-31', 230),
(226, '53', '200.00', '2023-04-10', '2023-04-25', 'Cartão', '', '112.946.818-69', '457.246.228-31', 231),
(227, '53', '200.00', '2023-04-11', '2023-04-25', 'Cartão', '', '112.946.818-69', '457.246.228-31', 232),
(228, '53', '200.00', '2023-04-13', '2023-04-25', 'Cartão', '', '112.946.818-69', '457.246.228-31', 233),
(229, '53', '200.00', '2023-04-15', '2023-04-25', 'PIX', '', '558.166.128-67', '457.246.228-31', 234),
(230, '53', '200.00', '2023-04-20', '2023-04-25', 'PIX', '', '558.166.128-67', '457.246.228-31', 235),
(231, '71', '100.00', '2023-04-06', '2023-04-25', 'PIX', '', '408.866.078-17', '457.246.228-31', 236),
(232, '71', '100.00', '2023-04-11', '2023-04-25', 'PIX', '', '408.866.078-17', '457.246.228-31', 237),
(233, '71', '100.00', '2023-04-18', '2023-04-25', 'PIX', '', '408.866.078-17', '457.246.228-31', 238),
(234, '71', '100.00', '2023-04-20', '2023-04-25', 'PIX', '', '408.866.078-17', '457.246.228-31', 239),
(235, '71', '100.00', '2023-04-04', '2023-04-25', 'PIX', '', '057.588.738-96', '457.246.228-31', 240),
(236, '71', '100.00', '2023-04-11', '2023-04-25', 'PIX', '', '057.588.738-96', '457.246.228-31', 241),
(237, '71', '100.00', '2023-04-13', '2023-04-25', 'PIX', '', '057.588.738-96', '457.246.228-31', 242),
(238, '71', '100.00', '2023-04-17', '2023-04-25', 'PIX', '', '057.588.738-96', '457.246.228-31', 243),
(239, '71', '100.00', '2023-04-18', '2023-04-25', 'PIX', '', '057.588.738-96', '457.246.228-31', 244),
(240, '53', '200.00', '2023-04-25', '2023-04-25', 'Dinheiro', '', '049.591.168-20', '457.246.228-31', 245),
(241, '73', '200.00', '2023-04-20', NULL, NULL, NULL, '000.000.000-00', '026.587.812-88', 246),
(243, '72', '200.00', '2023-04-25', NULL, NULL, NULL, '000.000.000-00', '026.587.812-88', 248),
(244, '54', '150.00', '2023-01-10', NULL, NULL, NULL, '124.457.858-47', '457.246.228-31', 249),
(245, '56', '180.00', '2023-01-10', NULL, NULL, NULL, '049.591.168-20', '457.246.228-31', 250),
(246, '53', '200.00', '2023-05-04', NULL, NULL, NULL, '006.188.908-31', '457.246.228-31', 251),
(247, '53', '200.00', '2023-05-04', NULL, NULL, NULL, '112.946.818-69', '457.246.228-31', 252),
(248, '53', '200.00', '2023-05-09', '2023-06-05', 'PIX', '', '112.946.818-69', '457.246.228-31', 253),
(249, '53', '200.00', '2023-05-09', '2023-06-05', 'PIX', '', '006.188.908-31', '457.246.228-31', 254),
(250, '53', '200.00', '2023-05-09', '2023-06-05', 'PIX', '', '558.166.128-67', '457.246.228-31', 255),
(251, '53', '200.00', '2023-05-11', '2023-06-05', 'PIX', '', '112.946.818-69', '457.246.228-31', 256),
(252, '53', '200.00', '2023-05-11', '2023-06-05', 'PIX', '', '006.188.908-31', '457.246.228-31', 257),
(253, '53', '200.00', '2023-05-16', '2023-06-05', 'PIX', '', '124.457.858-47', '457.246.228-31', 258),
(254, '53', '200.00', '2023-05-16', '2023-06-05', 'PIX', '', '006.188.908-31', '457.246.228-31', 259),
(255, '53', '200.00', '2023-05-16', '2023-06-05', 'PIX', '', '112.946.818-69', '457.246.228-31', 260),
(256, '53', '200.00', '2023-05-18', '2023-06-05', 'PIX', '', '112.946.818-69', '457.246.228-31', 261),
(257, '53', '200.00', '2023-05-18', '2023-06-05', 'PIX', '', '006.188.908-31', '457.246.228-31', 262),
(258, '53', '200.00', '2023-05-23', '2023-06-05', 'PIX', '', '049.591.168-20', '457.246.228-31', 263),
(259, '53', '200.00', '2023-05-23', '2023-06-05', 'PIX', '', '124.457.858-47', '457.246.228-31', 264),
(260, '53', '200.00', '2023-05-23', '2023-06-05', 'PIX', '', '006.188.908-31', '457.246.228-31', 265),
(261, '53', '200.00', '2023-05-23', '2023-06-05', 'PIX', '', '558.166.128-67', '457.246.228-31', 266),
(262, '53', '200.00', '2023-05-23', '2023-06-05', 'PIX', '', '112.946.818-69', '457.246.228-31', 267),
(263, '53', '200.00', '2023-05-25', '2023-06-05', 'PIX', '', '112.946.818-69', '457.246.228-31', 268),
(264, '53', '200.00', '2023-05-25', '2023-06-05', 'PIX', '', '049.591.168-20', '457.246.228-31', 269),
(265, '53', '200.00', '2023-05-30', '2023-06-05', 'PIX', '', '049.591.168-20', '457.246.228-31', 270),
(266, '53', '200.00', '2023-05-30', '2023-06-05', 'PIX', '', '558.166.128-67', '457.246.228-31', 271),
(267, '53', '200.00', '2023-05-30', '2023-06-05', 'PIX', '', '112.946.818-69', '457.246.228-31', 272),
(268, '53', '200.00', '2023-05-30', '2023-06-05', 'PIX', '', '124.457.858-47', '457.246.228-31', 273);

-- --------------------------------------------------------

--
-- Table structure for table `entradas_remedios`
--

CREATE TABLE `entradas_remedios` (
  `id` int(11) NOT NULL,
  `remedio` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `fornecedor` int(11) NOT NULL,
  `farmaceutico` varchar(20) NOT NULL,
  `nome_remedio` varchar(100) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `especializacoes`
--

CREATE TABLE `especializacoes` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exercicios`
--

CREATE TABLE `exercicios` (
  `id` int(11) NOT NULL,
  `nome_exercicio` varchar(300) NOT NULL,
  `des_exercicio` varchar(300) NOT NULL,
  `arquivo_exercicio` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `exercicios`
--

INSERT INTO `exercicios` (`id`, `nome_exercicio`, `des_exercicio`, `arquivo_exercicio`) VALUES
(1, 'Adução de quadril', 'Paciente em ortostatismo (em pé) com MMII lateralizados. Realizar agachamento jogando bumbum para trás e levemente o tronco para frente, na subida elevar uma das pernas alternadamente.', 'Exercicio-1.gif'),
(2, 'Glúteos,  coordenação e estabilização de tronco associado a MMII e MMSS', 'Paciente em posição de 4 apoios (joelhos e mãos apoiados), elevar e esticar perna esquerda com braço direito e perna direita com braço esquerdo alternadamente.', 'Exercicio-2.gif'),
(3, 'Agachamento', 'Paciente em ortostatismo (em pé) com MMII lateralizados. Realizar agachamento jogando o bumbum para trás e levemente o tronco para frente e retorna a posição inicial.', 'Exercicio-3.gif'),
(4, 'Adução de quadril', 'Paciente em decúbito lateral (deitado de lado) realizar elevação de MI.', 'Exercicio-4.gif'),
(5, 'Afundo', 'Paciente com posição inicial ortostática, realizar agachamento unilateral descendo com uma das pernas e joelho quase tocando ao chão. (Alternar)', 'Exercicio-5.gif'),
(6, 'Elevação de glúteos', 'Paciente em posição de 4 apoios (joelhos e mãos apoiados) elevar MI com joelho dobrado (sem esticar) alternadamente.', 'Exercicio-6.gif'),
(7, 'Abdômen e resistência', 'Paciente em decúbito dorsal (barriga para cima) dobrar os joelhos a 45° pés alto, esticar e dobrar MMII', 'Exercicio-7.gif'),
(8, 'Elevação de glúteos', 'Paciente em posição de 4 apoios (joelhos e mãos apoiados) elevar MI com joelho dobrado (sem esticar) alternadamente.', 'Exercicio-8.gif'),
(9, 'Elevação Pélvica', 'Paciente em decúbito dorsal (barriga para cima), mãos ao lado do quadril, joelhos dobrados e pé no chão.  Realizar o movimento de elevação do quadril.', 'Exercicio-9.gif'),
(10, 'Elevação de glúteos', 'Paciente em posição de 4 apoios (joelhos e mãos apoiados) elevar MI esticando o joelho e retornando a posição inicial, alternadamente', 'Exercicio-10.gif'),
(11, 'Agachamento', 'Paciente em ortostatismo (em pé) com MMII lateralizados, co  pés apontados para fora. \r\nRealizar agachamento jogando o bumbum para trás e levemente o tronco para frente e retorna a posição inicial.', 'Exercicio-11.gif'),
(12, 'Assoalho Pélvico.', 'Contração e relaxamento.', 'Exercicio-12.gif'),
(13, 'Prancha com extensão de MMSS', 'Paciente em prono, apoiar dedos dos pés e mãos no chão, iniciar descida com cotovelos com braços alternados, e estender novamente, retornando a posição inicial', 'Exercicio-13.gif'),
(14, 'Elevação de MMSS a partir de 180°', 'Elevação de MMSS a partir de 180° com mãos viradas para cima. Elevar MMSS acima da cabeça em sincronia.', 'Exercicio-14.gif'),
(15, 'Flexão de MMSS com apoios de joelho', 'Posição prono e MMSS flexionados com as mãos em paralelo ao tronco, realizar extensão e Flexão de cotovelos', 'Exercicio-15.gif'),
(16, 'Flexão de MMSS com apoio da parede', 'Nas pontas dos pés, mãos apoiados na parece (com a distância dos braços), realizar a Flexão e extensão dos cotovelos (mãos na altura dos ombros).', 'Exercicio-16.gif'),
(17, 'Flexão de MMSS sem apoios de joelho', 'Posição prono e MMSS flexionados com as mãos em paralelo ao tronco, realizar extensão e Flexão de cotovelos', 'Exercicio-17.gif'),
(18, 'Triceps na cadeira', 'De costas para a cadeira, posicionar as mãos em apoio para realizar flexão e extensão de MMSS de forma que os joelhos não participem da ação, apenas com apoio.', 'Exercicio-18.gif'),
(19, 'Flexão de MMSS com apoio de um banco ou cadeira a 45', 'Nas pontas dos pés, mãos apoiados na parece (com a distância dos braços), realizar a Flexão e extensão dos cotovelos (mãos na altura dos ombros)', 'Exercicio-19.gif'),
(20, 'Equilíbrio, coordenação e força de CORE', 'Em posição inicial em prancha, realizar elevação de MI e MS em sincronia e alternadamente (nível alto de dificuldade,  começar com posição e aos poucos evoluir para elevação de membros', 'Exercicio-20.gif'),
(29, 'Descanso', 'Faça um descanso entre os exercícios.', 'Exercicio-21.gif');

-- --------------------------------------------------------

--
-- Table structure for table `exercicios_pacientes`
--

CREATE TABLE `exercicios_pacientes` (
  `id` int(11) NOT NULL,
  `nome_exercicio` varchar(300) NOT NULL,
  `repeticoes` varchar(50) DEFAULT NULL,
  `series` varchar(90) DEFAULT NULL,
  `obs` varchar(90) DEFAULT NULL,
  `feito` varchar(3) DEFAULT NULL,
  `id_paciente` int(30) DEFAULT NULL,
  `id_medico` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `exercicios_pacientes`
--

INSERT INTO `exercicios_pacientes` (`id`, `nome_exercicio`, `repeticoes`, `series`, `obs`, `feito`, `id_paciente`, `id_medico`) VALUES
(31, 'Agachamento', '10', '3', 'fazer a contração perineal quando for abaixar, realizando a expiração', 'Sim', 156, 41),
(32, 'Agachamento', '10', '3', 'fazer a contração perineal quando for abaixar, realizando a expiração', 'Sim', 156, 41),
(33, 'Assoalho Pélvico.', '15', '3', 'contrações rápidas (3 x dia)', 'Sim', 156, 41);

-- --------------------------------------------------------

--
-- Table structure for table `ficha_ortopedia`
--

CREATE TABLE `ficha_ortopedia` (
  `fkcpf` varchar(220) NOT NULL,
  `nome` varchar(220) NOT NULL,
  `historia_molestia_progressa_ortopedia` varchar(220) DEFAULT NULL,
  `historia_molestia_atual_ortopedia` varchar(220) DEFAULT NULL,
  `historia_molestia_sintomas_ortopedia` varchar(220) DEFAULT NULL,
  `inspecao_ortopedia` varchar(220) DEFAULT NULL,
  `obs_inspecao_ortopedia` varchar(220) DEFAULT NULL,
  `ombro_flexaoD_ortopedia` varchar(220) DEFAULT NULL,
  `ombro_flexaoE_ortopedia` varchar(220) DEFAULT NULL,
  `ombro_extensaoE_ortopedia` varchar(220) DEFAULT NULL,
  `ombro_extensaoD_ortopedia` varchar(220) DEFAULT NULL,
  `ombro_abducaoE_ortopedia` varchar(220) DEFAULT NULL,
  `ombro_abducaoD_ortopedia` varchar(220) DEFAULT NULL,
  `ombro_aducaoE_ortopedia` varchar(220) DEFAULT NULL,
  `ombro_aducaoD_ortopedia` varchar(220) DEFAULT NULL,
  `ombro_rotacaoInternaE_ortopedia` varchar(220) DEFAULT NULL,
  `ombro_rotacaoInternaD_ortopedia` varchar(220) DEFAULT NULL,
  `ombro_rotacaoExternaE_ortopedia` varchar(220) DEFAULT NULL,
  `ombro_rotacaoExternaD_ortopedia` varchar(220) DEFAULT NULL,
  `cotovelo_flexaoE_ortopedia` varchar(220) DEFAULT NULL,
  `cotovelo_flexaoD_ortopedia` varchar(220) DEFAULT NULL,
  `cotovelo_extensaoE_ortopedia` varchar(220) DEFAULT NULL,
  `cotovelo_extensaoD_ortopedia` varchar(220) DEFAULT NULL,
  `cotovelo_pronocaoE_ortopedia` varchar(220) DEFAULT NULL,
  `cotovelo_pronocaoD_ortopedia` varchar(220) DEFAULT NULL,
  `cotovelo_supinacaoE_ortopedia` varchar(220) DEFAULT NULL,
  `cotovelo_supinacaoD_ortopedia` varchar(220) DEFAULT NULL,
  `punho_flexaoE_ortopedia` varchar(220) DEFAULT NULL,
  `punho_flexaoD_ortopedia` varchar(220) DEFAULT NULL,
  `punho_extensaoE_ortopedia` varchar(220) DEFAULT NULL,
  `punho_extensaoD_ortopedia` varchar(220) DEFAULT NULL,
  `punho_desvioUlnarE_ortopedia` varchar(220) DEFAULT NULL,
  `punho_desvioUlnarD_ortopedia` varchar(220) DEFAULT NULL,
  `punho_desvioRadialE_ortopedia` varchar(220) DEFAULT NULL,
  `punho_desvioRadialD_ortopedia` varchar(220) DEFAULT NULL,
  `tronco_flexaoE_ortopedia` varchar(220) DEFAULT NULL,
  `tronco_flexaoD_ortopedia` varchar(220) DEFAULT NULL,
  `tronco_rotacaoE_ortopedia` varchar(220) DEFAULT NULL,
  `tronco_rotacaoD_ortopedia` varchar(220) DEFAULT NULL,
  `tronco_extensaoE_ortopedia` varchar(220) DEFAULT NULL,
  `tronco_extensaoD_ortopedia` varchar(220) DEFAULT NULL,
  `quadril_flexaoE_ortopedia` varchar(220) DEFAULT NULL,
  `quadril_flexaoD_ortopedia` varchar(220) DEFAULT NULL,
  `quadril_extensaoE_ortopedia` varchar(220) DEFAULT NULL,
  `quadril_extensaoD_ortopedia` varchar(220) DEFAULT NULL,
  `quadril_abducaoE_ortopedia` varchar(220) DEFAULT NULL,
  `quadril_abducaoD_ortopedia` varchar(220) DEFAULT NULL,
  `quadril_aducaoE_ortopedia` varchar(220) DEFAULT NULL,
  `quadril_aducaoD_ortopedia` varchar(220) DEFAULT NULL,
  `quadril_rotacaoInternaE_ortopedia` varchar(220) DEFAULT NULL,
  `quadril_rotacaoInternaD_ortopedia` varchar(220) DEFAULT NULL,
  `quadril_rotacaoExternaE_ortopedia` varchar(220) DEFAULT NULL,
  `quadril_rotacaoExternaD_ortopedia` varchar(220) DEFAULT NULL,
  `joelho_flexaoE_ortopedia` varchar(220) DEFAULT NULL,
  `joelho_flexaoD_ortopedia` varchar(220) DEFAULT NULL,
  `joelho_extensaoE_ortopedia` varchar(220) DEFAULT NULL,
  `joelho_extensaoD_ortopedia` varchar(220) DEFAULT NULL,
  `tornozelo_dorsiflexaoE_ortopedia` varchar(220) DEFAULT NULL,
  `tornozelo_dorsiflexaoD_ortopedia` varchar(220) DEFAULT NULL,
  `tornozelo_plantiflexaoE_ortopedia` varchar(220) DEFAULT NULL,
  `tornozelo_plantiflexaoD_ortopedia` varchar(220) DEFAULT NULL,
  `estilrradialE_ortopedia` varchar(220) DEFAULT NULL,
  `estilrradialD_ortopedia` varchar(220) DEFAULT NULL,
  `bicipitalE_ortopedia` varchar(220) DEFAULT NULL,
  `bicipitalD_ortopedia` varchar(220) DEFAULT NULL,
  `tricipitalE_ortopedia` varchar(220) DEFAULT NULL,
  `tricipitalD_ortopedia` varchar(220) DEFAULT NULL,
  `patelarE_ortopedia` varchar(220) DEFAULT NULL,
  `patelarD_ortopedia` varchar(220) DEFAULT NULL,
  `aquileuE_ortopedia` varchar(220) DEFAULT NULL,
  `aquileuD_ortopedia` varchar(220) DEFAULT NULL,
  `babisnkiE_ortopedia` varchar(220) DEFAULT NULL,
  `babisnkiD_ortopedia` varchar(220) DEFAULT NULL,
  `cutaneoAbdominalE_ortopedia` varchar(220) DEFAULT NULL,
  `cutaneoAbdominalD_ortopedia` varchar(220) DEFAULT NULL,
  `sinaisDeAutotismoMedularE_ortopedia` varchar(220) DEFAULT NULL,
  `sinaisDeAutotismoMedularD_ortopedia` varchar(220) DEFAULT NULL,
  `impulsoExtensorE_ortopedia` varchar(220) DEFAULT NULL,
  `impulsoExtensorD_ortopedia` varchar(220) DEFAULT NULL,
  `tripliceFlexaoE_ortopedia` varchar(220) DEFAULT NULL,
  `tripliceFlexaoD_ortopedia` varchar(220) DEFAULT NULL,
  `sincinesiasE_ortopedia` varchar(220) DEFAULT NULL,
  `sincinesiasD_ortopedia` varchar(220) DEFAULT NULL,
  `decubito1_ortopedia` varchar(220) DEFAULT NULL,
  `decubito2_ortopedia` varchar(220) DEFAULT NULL,
  `decubito3_ortopedia` varchar(220) DEFAULT NULL,
  `decubito4_ortopedia` varchar(220) DEFAULT NULL,
  `decubito5_ortopedia` varchar(220) DEFAULT NULL,
  `cardiopulmonar_ortopedia` varchar(220) DEFAULT NULL,
  `genitoUrinaria_ortopedia` varchar(220) DEFAULT NULL,
  `outros_ortopedia` varchar(220) DEFAULT NULL,
  `examesComplementares_ortopedia` varchar(220) DEFAULT NULL,
  `objetivo_ortopedia` varchar(220) DEFAULT NULL,
  `conduta_ortopedia` varchar(220) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ficha_ortopedia`
--

INSERT INTO `ficha_ortopedia` (`fkcpf`, `nome`, `historia_molestia_progressa_ortopedia`, `historia_molestia_atual_ortopedia`, `historia_molestia_sintomas_ortopedia`, `inspecao_ortopedia`, `obs_inspecao_ortopedia`, `ombro_flexaoD_ortopedia`, `ombro_flexaoE_ortopedia`, `ombro_extensaoE_ortopedia`, `ombro_extensaoD_ortopedia`, `ombro_abducaoE_ortopedia`, `ombro_abducaoD_ortopedia`, `ombro_aducaoE_ortopedia`, `ombro_aducaoD_ortopedia`, `ombro_rotacaoInternaE_ortopedia`, `ombro_rotacaoInternaD_ortopedia`, `ombro_rotacaoExternaE_ortopedia`, `ombro_rotacaoExternaD_ortopedia`, `cotovelo_flexaoE_ortopedia`, `cotovelo_flexaoD_ortopedia`, `cotovelo_extensaoE_ortopedia`, `cotovelo_extensaoD_ortopedia`, `cotovelo_pronocaoE_ortopedia`, `cotovelo_pronocaoD_ortopedia`, `cotovelo_supinacaoE_ortopedia`, `cotovelo_supinacaoD_ortopedia`, `punho_flexaoE_ortopedia`, `punho_flexaoD_ortopedia`, `punho_extensaoE_ortopedia`, `punho_extensaoD_ortopedia`, `punho_desvioUlnarE_ortopedia`, `punho_desvioUlnarD_ortopedia`, `punho_desvioRadialE_ortopedia`, `punho_desvioRadialD_ortopedia`, `tronco_flexaoE_ortopedia`, `tronco_flexaoD_ortopedia`, `tronco_rotacaoE_ortopedia`, `tronco_rotacaoD_ortopedia`, `tronco_extensaoE_ortopedia`, `tronco_extensaoD_ortopedia`, `quadril_flexaoE_ortopedia`, `quadril_flexaoD_ortopedia`, `quadril_extensaoE_ortopedia`, `quadril_extensaoD_ortopedia`, `quadril_abducaoE_ortopedia`, `quadril_abducaoD_ortopedia`, `quadril_aducaoE_ortopedia`, `quadril_aducaoD_ortopedia`, `quadril_rotacaoInternaE_ortopedia`, `quadril_rotacaoInternaD_ortopedia`, `quadril_rotacaoExternaE_ortopedia`, `quadril_rotacaoExternaD_ortopedia`, `joelho_flexaoE_ortopedia`, `joelho_flexaoD_ortopedia`, `joelho_extensaoE_ortopedia`, `joelho_extensaoD_ortopedia`, `tornozelo_dorsiflexaoE_ortopedia`, `tornozelo_dorsiflexaoD_ortopedia`, `tornozelo_plantiflexaoE_ortopedia`, `tornozelo_plantiflexaoD_ortopedia`, `estilrradialE_ortopedia`, `estilrradialD_ortopedia`, `bicipitalE_ortopedia`, `bicipitalD_ortopedia`, `tricipitalE_ortopedia`, `tricipitalD_ortopedia`, `patelarE_ortopedia`, `patelarD_ortopedia`, `aquileuE_ortopedia`, `aquileuD_ortopedia`, `babisnkiE_ortopedia`, `babisnkiD_ortopedia`, `cutaneoAbdominalE_ortopedia`, `cutaneoAbdominalD_ortopedia`, `sinaisDeAutotismoMedularE_ortopedia`, `sinaisDeAutotismoMedularD_ortopedia`, `impulsoExtensorE_ortopedia`, `impulsoExtensorD_ortopedia`, `tripliceFlexaoE_ortopedia`, `tripliceFlexaoD_ortopedia`, `sincinesiasE_ortopedia`, `sincinesiasD_ortopedia`, `decubito1_ortopedia`, `decubito2_ortopedia`, `decubito3_ortopedia`, `decubito4_ortopedia`, `decubito5_ortopedia`, `cardiopulmonar_ortopedia`, `genitoUrinaria_ortopedia`, `outros_ortopedia`, `examesComplementares_ortopedia`, `objetivo_ortopedia`, `conduta_ortopedia`) VALUES
('016.527.298-87', 'Absalão Pereira de Araújo', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '(I) Independente.', '(I) Independente.', '(I) Independente.', '(I) Independente.', '(I) Independente.', '', '', '', '', '', ''),
('844.065.188-00', 'Cândido de Castro Santos', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('044.200.656-05', 'Carolina Costa', '', '', '', 'Coluna Vertical', '', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', NULL, '', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(0) Ausencia de Contração.', '(A) Aumentado: hiperreflexia.', '(A) Aumentado: hiperreflexia.', '(A) Aumentado: hiperreflexia.', '(A) Aumentado: hiperreflexia.', '(A) Aumentado: hiperreflexia.', '(A) Aumentado: hiperreflexia.', '(A) Aumentado: hiperreflexia.', '(A) Aumentado: hiperreflexia.', '(A) Aumentado: hiperreflexia.', '(A) Aumentado: hiperreflexia.', '(A) Aumentado: hiperreflexia.', '(A) Aumentado: hiperreflexia.', '(A) Aumentado: hiperreflexia.', '(A) Aumentado: hiperreflexia.', '(A) Aumentado: hiperreflexia.', '(A) Aumentado: hiperreflexia.', '(A) Aumentado: hiperreflexia.', '(A) Aumentado: hiperreflexia.', '(A) Aumentado: hiperreflexia.', '(A) Aumentado: hiperreflexia.', '(A) Aumentado: hiperreflexia.', '(A) Aumentado: hiperreflexia.', '(I) Independente.', '(I) Independente.', '(I) Independente.', '(I) Independente.', '(I) Independente.', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ficha_proctologia`
--

CREATE TABLE `ficha_proctologia` (
  `fkcpf` varchar(300) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `queixa_prin_proc` varchar(300) DEFAULT NULL,
  `antecedentes_pessoais_proc` varchar(300) DEFAULT NULL,
  `antecedentes_cirurgicos_proc` varchar(300) DEFAULT NULL,
  `antecedentes_familiares_proc` varchar(300) DEFAULT NULL,
  `historia_proctologica` varchar(300) DEFAULT NULL,
  `tempo_sintomas` varchar(300) DEFAULT NULL,
  `tempo_ajuda` varchar(300) DEFAULT NULL,
  `sintomas_estado` varchar(300) DEFAULT NULL,
  `perdas_proc` varchar(300) DEFAULT NULL,
  `frequencia_dos_acidentes` varchar(300) DEFAULT NULL,
  `quantidade_da_perda` varchar(300) DEFAULT NULL,
  `protecoes_proc` varchar(300) DEFAULT NULL,
  `frequencia_evacuatoria` varchar(300) DEFAULT NULL,
  `manobra_evacuar` varchar(300) DEFAULT NULL,
  `medicacoes_em_uso_proc` varchar(300) DEFAULT NULL,
  `partos_proc` varchar(300) DEFAULT NULL,
  `complicacoes_puerperais_proc` varchar(300) DEFAULT NULL,
  `cirurgias_ginecologicas_proc` varchar(300) DEFAULT NULL,
  `antecedentes_urologicos_proc` varchar(300) DEFAULT NULL,
  `habitos_vida_proc` varchar(300) DEFAULT NULL,
  `uso_frequente_proc` varchar(300) DEFAULT NULL,
  `restricao_do_consumo_de_liquidos_proc` varchar(300) DEFAULT NULL,
  `renda_familiar` varchar(300) DEFAULT NULL,
  `cicatrizes_proc` varchar(300) DEFAULT NULL,
  `trofismo_perianal` varchar(300) DEFAULT NULL,
  `trofismo_mmii_proc` varchar(300) DEFAULT NULL,
  `contracao_voluntaria_proc` varchar(300) DEFAULT NULL,
  `abertura_vulvo_vaginal_proc` varchar(300) DEFAULT NULL,
  `abertura_anal_proc` varchar(300) DEFAULT NULL,
  `apneia_proc` varchar(300) DEFAULT NULL,
  `contracao_do_eae` varchar(300) DEFAULT NULL,
  `corpo_perineal_proc` varchar(300) DEFAULT NULL,
  `tonus_do_eae_proc` varchar(300) DEFAULT NULL,
  `puborretal_proc` varchar(300) DEFAULT NULL,
  `mmii_proc` varchar(300) DEFAULT NULL,
  `fibrose_proc` varchar(300) DEFAULT NULL,
  `afa_proc` varchar(90) DEFAULT NULL,
  `perfect_proc` varchar(300) DEFAULT NULL,
  `elasticidade_proc` varchar(300) DEFAULT NULL,
  `coordenacao_proc` varchar(300) DEFAULT NULL,
  `relaxamento_do_pr_a_manobra_de_evacuacao_proc` varchar(300) DEFAULT NULL,
  `pontos_dolorosos_proc` varchar(300) DEFAULT NULL,
  `teste_de_esforco_proc` varchar(300) DEFAULT NULL,
  `reflexo_clitoriano_bulbocavernoso_proc` varchar(300) DEFAULT NULL,
  `reflexo_ceigel_cremasterico` varchar(300) DEFAULT NULL,
  `marcha_proc` varchar(300) DEFAULT NULL,
  `outros_dados_proc` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ficha_proctologia`
--

INSERT INTO `ficha_proctologia` (`fkcpf`, `nome`, `queixa_prin_proc`, `antecedentes_pessoais_proc`, `antecedentes_cirurgicos_proc`, `antecedentes_familiares_proc`, `historia_proctologica`, `tempo_sintomas`, `tempo_ajuda`, `sintomas_estado`, `perdas_proc`, `frequencia_dos_acidentes`, `quantidade_da_perda`, `protecoes_proc`, `frequencia_evacuatoria`, `manobra_evacuar`, `medicacoes_em_uso_proc`, `partos_proc`, `complicacoes_puerperais_proc`, `cirurgias_ginecologicas_proc`, `antecedentes_urologicos_proc`, `habitos_vida_proc`, `uso_frequente_proc`, `restricao_do_consumo_de_liquidos_proc`, `renda_familiar`, `cicatrizes_proc`, `trofismo_perianal`, `trofismo_mmii_proc`, `contracao_voluntaria_proc`, `abertura_vulvo_vaginal_proc`, `abertura_anal_proc`, `apneia_proc`, `contracao_do_eae`, `corpo_perineal_proc`, `tonus_do_eae_proc`, `puborretal_proc`, `mmii_proc`, `fibrose_proc`, `afa_proc`, `perfect_proc`, `elasticidade_proc`, `coordenacao_proc`, `relaxamento_do_pr_a_manobra_de_evacuacao_proc`, `pontos_dolorosos_proc`, `teste_de_esforco_proc`, `reflexo_clitoriano_bulbocavernoso_proc`, `reflexo_ceigel_cremasterico`, `marcha_proc`, `outros_dados_proc`) VALUES
('000.000.000-00', 'Valdinar Melo', '', '', '', '', '', '', '', 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', '', '', 'sem perdas', '', '', '', ''),
('006.188.908-31', 'Antonio Souza de Queiroz', '', '', '', '', '', '', '', 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', '', '', 'sem perdas', '', '', '', ''),
('016.527.298-87', 'Absalão Pereira de Araújo', '', '', '', '', '', '', '', 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', '', '', 'sem perdas', '', '', '', ''),
('026.587.812-88', 'Valdinar Melo', '', '', '', '', '', '', '', 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('033.138.361-60', 'Taynara Nascimento Canedo', '', '', '', '', '', '', '', 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('044.200.656-05', 'Carolina Costa', '', '', '', '', '', '', '', 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', '', '', 'sem perdas', '', '', '', ''),
('049.591.168-20', 'Walter Joaquim', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', '', '', 'sem perdas', '', '', '', ''),
('057.588.738-96', 'Regis Siola de Souza', '', '', '', '', '', '', '', 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('060.654.707-08', 'NANY SANT\'ANNA ARAÚJO', '', '', '', '', '', '', '', 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('074.474.128-99', 'Nivea', '', '', '', '', '', '', '', 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('112.946.818-69', 'Paulo Jorge de Oliveira', '', '', '', '', '', '', '', 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', '', '', 'sem perdas', '', '', '', ''),
('124.457.858-47', 'Roberto Alves de Almeida', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', '', '', 'sem perdas', '', '', '', ''),
('351.088.028-54', 'Jacqueline Félix ', '', '', '', '', '', '', '', 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('408.866.078-17', 'Bruno Inácio Nunes', '', '', '', '', '', '', '', 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', '', '', 'sem perdas', '', '', '', ''),
('457.246.228-31', 'Maria', '', '', '', '', '', '', '', 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('558.166.128-67', 'Mariana Lacivita de Goes Coelho', '', '', '', '', '', '', '', 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', '', '', 'sem perdas', '', '', '', ''),
('574.754.908-15', 'Gilmar Frimaio', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('891.234.902-18', 'Francemir F Silva', 'Precoce', 'O pai também era', 'o pai fez cirurgia', 'o pai que eu falei antes', '', 'quando comecei a ter relacções', '', 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', 'internas', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', 'PERFECT', 'boa', 'presente', NULL, '', 'sem perdas', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ficha_uroginecologia`
--

CREATE TABLE `ficha_uroginecologia` (
  `fkcpf` varchar(300) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `queixa_prin_urogine` varchar(300) DEFAULT NULL,
  `antecedentes_pessoais_urogine` varchar(300) DEFAULT NULL,
  `antecedentes_cirurgicos_urogine` varchar(300) DEFAULT NULL,
  `antecedentes_familiares_urogine` varchar(300) DEFAULT NULL,
  `fase_de_enchimento_urogine` varchar(300) DEFAULT NULL,
  `fase_de_esvaziamento_urogine` varchar(300) DEFAULT NULL,
  `outros_fase_de_esvaziamento_urogine` varchar(300) DEFAULT NULL,
  `sensibilidade_fase_de_esvaziamento_urogine` varchar(300) DEFAULT NULL,
  `itu_fase_de_esvaziamento_urogine` varchar(300) DEFAULT NULL,
  `perdas_urogine` varchar(300) DEFAULT NULL,
  `outras_circunstancias_perdas_urogine` varchar(300) DEFAULT NULL,
  `perdas_durante_o_esforco_urogine` varchar(300) DEFAULT NULL,
  `outras_perdas_durante_o_esforco_urogine` varchar(300) DEFAULT NULL,
  `qualidade_da_perda_urinariao_urogine` varchar(300) DEFAULT NULL,
  `quanto_tempo_iniciou_os_sintomas_urogine` varchar(300) DEFAULT NULL,
  `quanto_tempo_demorou_para_procurar_ajuda_medica_urogine` varchar(300) DEFAULT NULL,
  `desde_que_comecaram_os_sintomas_o_seu_estado_urogine` varchar(300) DEFAULT NULL,
  `frequencia_urinaria_urogine` varchar(300) DEFAULT NULL,
  `protecoes_urogine` varchar(300) DEFAULT NULL,
  `numero_de_trocas_urogine` varchar(300) DEFAULT NULL,
  `corpo_perineal_uroginecologia` varchar(300) DEFAULT NULL,
  `tonus_do_eae_uroginecologia` varchar(300) DEFAULT NULL,
  `puborretal_uroginecologia` varchar(300) DEFAULT NULL,
  `mmii_uroginecologia` varchar(300) DEFAULT NULL,
  `fibrose_uroginecologia` varchar(300) DEFAULT NULL,
  `afa_uroginecologia` varchar(300) DEFAULT NULL,
  `perfect_uroginecologia` varchar(300) DEFAULT NULL,
  `elasticidade_uroginecologia` varchar(300) DEFAULT NULL,
  `coordenacao_uroginecologia` varchar(300) DEFAULT NULL,
  `relaxamento_do_pr_a_manobra_de_evacuacao_uroginecologia` varchar(300) DEFAULT NULL,
  `pontos_dolorosos_uroginecologia` varchar(300) DEFAULT NULL,
  `gestacoes_uroginecologia` varchar(300) DEFAULT NULL,
  `partos_uroginecologia` varchar(300) DEFAULT NULL,
  `abortos_uroginecologia` varchar(300) DEFAULT NULL,
  `parto1_uroginecologia` varchar(300) DEFAULT NULL,
  `idade_materna1_uroginecologia` varchar(300) DEFAULT NULL,
  `peso_da_crianca1_uroginecologia` varchar(300) DEFAULT NULL,
  `parto2_uroginecologia` varchar(300) DEFAULT NULL,
  `idade_materna2_uroginecologia` varchar(300) DEFAULT NULL,
  `peso_da_crianca2_uroginecologia` varchar(300) DEFAULT NULL,
  `parto3_uroginecologia` varchar(300) DEFAULT NULL,
  `idade_materna3_uroginecologia` varchar(300) DEFAULT NULL,
  `peso_da_crianca3_uroginecologia` varchar(300) DEFAULT NULL,
  `realizou_episiotomia_uroginecologia` varchar(300) DEFAULT NULL,
  `forceps_uroginecologia` varchar(300) DEFAULT NULL,
  `complicacoes_obstetricas_uroginecologia` varchar(300) DEFAULT NULL,
  `data_da_ultima_menstruacao_uroginecologia` varchar(300) DEFAULT NULL,
  `data_da_ultima_menstruação_uroginecologia` varchar(300) DEFAULT NULL,
  `menopausa_uroginecologia` varchar(300) DEFAULT NULL,
  `metodo_anticoncepcional_uroginecologia` varchar(300) DEFAULT NULL,
  `terapia_de_reposicao_hormonal_uroginecologia` varchar(300) DEFAULT NULL,
  `complicacoes_ginecologicas_uroginecologia` varchar(300) DEFAULT NULL,
  `realizou_cirurgia_ginecologica_uroginecologia` varchar(300) DEFAULT NULL,
  `auto_conhecimento_vaginal_uroginecologia` varchar(300) DEFAULT NULL,
  `vida_sexual_uroginecologia` varchar(300) DEFAULT NULL,
  `perdeu_a_virgindade_uroginecologia` varchar(300) DEFAULT NULL,
  `com_quem_perdeu_a_virgindade_uroginecologia` varchar(300) DEFAULT NULL,
  `experiencia_a_virgindade_uroginecologia` varchar(300) DEFAULT NULL,
  `abuso_sexual_uroginecologia` varchar(300) DEFAULT NULL,
  `permissao_abuso_sexual_uroginecologia` varchar(300) DEFAULT NULL,
  `relato_abuso_sexual_uroginecologia` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ficha_uroginecologia`
--

INSERT INTO `ficha_uroginecologia` (`fkcpf`, `nome`, `queixa_prin_urogine`, `antecedentes_pessoais_urogine`, `antecedentes_cirurgicos_urogine`, `antecedentes_familiares_urogine`, `fase_de_enchimento_urogine`, `fase_de_esvaziamento_urogine`, `outros_fase_de_esvaziamento_urogine`, `sensibilidade_fase_de_esvaziamento_urogine`, `itu_fase_de_esvaziamento_urogine`, `perdas_urogine`, `outras_circunstancias_perdas_urogine`, `perdas_durante_o_esforco_urogine`, `outras_perdas_durante_o_esforco_urogine`, `qualidade_da_perda_urinariao_urogine`, `quanto_tempo_iniciou_os_sintomas_urogine`, `quanto_tempo_demorou_para_procurar_ajuda_medica_urogine`, `desde_que_comecaram_os_sintomas_o_seu_estado_urogine`, `frequencia_urinaria_urogine`, `protecoes_urogine`, `numero_de_trocas_urogine`, `corpo_perineal_uroginecologia`, `tonus_do_eae_uroginecologia`, `puborretal_uroginecologia`, `mmii_uroginecologia`, `fibrose_uroginecologia`, `afa_uroginecologia`, `perfect_uroginecologia`, `elasticidade_uroginecologia`, `coordenacao_uroginecologia`, `relaxamento_do_pr_a_manobra_de_evacuacao_uroginecologia`, `pontos_dolorosos_uroginecologia`, `gestacoes_uroginecologia`, `partos_uroginecologia`, `abortos_uroginecologia`, `parto1_uroginecologia`, `idade_materna1_uroginecologia`, `peso_da_crianca1_uroginecologia`, `parto2_uroginecologia`, `idade_materna2_uroginecologia`, `peso_da_crianca2_uroginecologia`, `parto3_uroginecologia`, `idade_materna3_uroginecologia`, `peso_da_crianca3_uroginecologia`, `realizou_episiotomia_uroginecologia`, `forceps_uroginecologia`, `complicacoes_obstetricas_uroginecologia`, `data_da_ultima_menstruacao_uroginecologia`, `data_da_ultima_menstruação_uroginecologia`, `menopausa_uroginecologia`, `metodo_anticoncepcional_uroginecologia`, `terapia_de_reposicao_hormonal_uroginecologia`, `complicacoes_ginecologicas_uroginecologia`, `realizou_cirurgia_ginecologica_uroginecologia`, `auto_conhecimento_vaginal_uroginecologia`, `vida_sexual_uroginecologia`, `perdeu_a_virgindade_uroginecologia`, `com_quem_perdeu_a_virgindade_uroginecologia`, `experiencia_a_virgindade_uroginecologia`, `abuso_sexual_uroginecologia`, `permissao_abuso_sexual_uroginecologia`, `relato_abuso_sexual_uroginecologia`) VALUES
('000.000.000-00', 'Valdinar Melo', '', '', '', '', 'urgencia', 'hesitacao', '', '', '', 'Não se aplica', '', 'Não se aplica', NULL, '', '', '', 'Não se aplica', '', 'Não se aplica', '', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', 'sim', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sim', 'sim', 'laceração', '', NULL, '', '', '', '', '', 'sim', '', '', '', '', 'sim', 'sim', ''),
('006.188.908-31', 'Antonio Souza de Queiroz', 'Teste2', 'Teste2', 'Teste2', 'Teste2', 'urgencia', 'hesitacao', 'Teste2', 'Teste2', 'Teste2', 'urge-incontinencia', 'Teste2', 'defasadas', NULL, 'Teste2', 'Teste2', 'Teste2', 'piorou', 'Teste2', 'Não se aplica', '', 'Hipertonico', 'Hipotonico', 'Normal', 'Hipertonico', 'Teste2', 'Teste2', 'Teste2', '', 'presente', 'sim', 'Teste2', 'Teste2', 'Teste2Teste2', 'Teste2', 'Teste2', 'Teste2', 'Teste2', 'Teste2', 'Teste2', 'Teste2', 'Teste2', 'Teste2', 'Teste2', '', '', '', '2023-03-07', NULL, '2023-03-03', '', '', '', 'Teste2', 'nao', '', 'Teste2', 'Teste2', 'Teste2', 'nao', 'nao', 'Teste2'),
('016.527.298-87', 'Absalão Pereira de Araújo', '', '', '', '', 'urgencia', 'hesitacao', '', '', '', 'Não se aplica', '', 'Não se aplica', NULL, '', '', '', 'Não se aplica', '', 'Não se aplica', '', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', 'sim', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sim', 'sim', 'laceração', '', NULL, '', '', '', '', '', 'sim', '', '', '', '', 'sim', 'sim', ''),
('026.587.812-88', 'Valdinar Melo', '', '', '', '', 'urgencia', 'hesitacao', '', '', '', 'Não se aplica', '', 'Não se aplica', NULL, '', '', '', 'Não se aplica', '', 'Não se aplica', '', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', 'sim', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sim', 'sim', 'laceração', '', NULL, '', '', '', '', '', 'sim', '', '', '', '', 'sim', 'sim', ''),
('033.138.361-60', 'Taynara Nascimento Canedo', 'DOR PELVE IRRADIA PAR PERNA ESQUERDA', 'G2P1C0N1', '', '', 'urgencia', 'hesitacao', '', '', '', 'Não se aplica', '', 'aumento das perdas no período menstrua', NULL, '', 'A PARTIR DE 20 SEM', '', 'Não se aplica', '1X NOTURNA', 'Não se aplica', '', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', 'sim', '', '2', '1', '0', 'NORMAL', '', '', '', '', '', '', '', '', 'nao', 'nao', 'laceração', 'NOV DE 2022', NULL, 'NAO', '', '', '10 MESES SEM ATIVIDADE FISICA ', '', 'sim', '', '', '', '', 'nao', 'nao', ''),
('044.200.656-05', 'Carolina Costa', '', '', '', '', 'urgencia', 'hesitacao', '', '', '', 'Não se aplica', '', 'Não se aplica', NULL, '', '', '', 'Não se aplica', '', 'Não se aplica', '', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', 'sim', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sim', 'sim', 'laceração', '', NULL, '', '', '', '', '', 'sim', '', '', '', '', 'sim', 'sim', ''),
('049.591.168-20', 'Walter Joaquim', '', '', '', '', 'urgencia', 'hesitacao', '', '', '', 'Não se aplica', '', 'Não se aplica', NULL, '', '', '', 'Não se aplica', '', 'Não se aplica', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('057.588.738-96', 'Regis Siola de Souza', '', '', '', '', 'urgencia', 'hesitacao', '', '', '', 'Não se aplica', '', 'Não se aplica', NULL, '', '', '', 'Não se aplica', '', 'Não se aplica', '', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', 'sim', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sim', 'sim', 'laceração', '', NULL, '', '', '', '', '', 'sim', '', '', '', '', 'sim', 'sim', ''),
('060.654.707-08', 'NANY SANT\'ANNA ARAÚJO', 'DOR NO PREVENTIVO E NAS RELAÇÕES SEXUAIS', '', '', '', 'urgencia', 'hesitacao', '', '', 'NÃO', 'Não se aplica', '', 'Não se aplica', NULL, '', '', '', 'Não se aplica', '', 'Não se aplica', '', 'Hipertonico', 'Normal', 'Normal', 'Normal', 'NÃO', '3', '3/5/8//8 +++', '', 'presente', 'sim', 'SIM, AP LADO D', '', '', '', '', '', '', '', '', '', '', '', '', 'sim', 'sim', 'laceração', '2023-01-28', NULL, '', 'NÃO', 'NÃO', 'DGPP', 'NÃO', 'sim', 'ATIVA', '', '', '', 'nao', 'sim', ''),
('112.946.818-69', 'Paulo Jorge de Oliveira', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', 'Não se aplica', '', 'Não se aplica', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0001-01-01', NULL, '0001-01-01', '', '', '', '', '', '', '', '', '', '', '', ''),
('124.457.858-47', 'Roberto Alves de Almeida', '', '', '', '', 'urgencia', 'hesitacao', '', '', '', 'Não se aplica', '', 'Não se aplica', NULL, '', '', '', 'Não se aplica', '', 'Não se aplica', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('351.088.028-54', 'Jacqueline Félix ', '', '', '', '', 'urgencia', 'hesitacao', '', '', '', 'Não se aplica', '', 'Não se aplica', NULL, '', '', '', 'Não se aplica', '', 'Não se aplica', '', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', 'sim', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sim', 'sim', 'laceração', '', NULL, '', '', '', '', '', 'sim', '', '', '', '', 'sim', 'sim', ''),
('408.866.078-17', 'Bruno Inácio Nunes', '', '', '', '', '', '', '', '', '', 'Não se aplica', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0001-01-01', NULL, '0001-01-01', '', '', '', '', '', '', '', '', '', '', '', ''),
('457.246.228-31', 'Maria', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('558.166.128-67', 'Mariana Lacivita de Goes Coelho', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', ''),
('574.754.908-15', 'Gilmar Frimaio', '', '', '', '', 'urgencia', 'hesitacao', '', '', '', 'Não se aplica', '', 'Não se aplica', NULL, '', '', '', 'Não se aplica', '', 'Não se aplica', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('891.234.902-18', 'Francemir F Silva', '', '', '', '', 'urgencia', 'hesitacao', '', '', '', 'Não se aplica', '', 'Não se aplica', NULL, '', '', '', 'Não se aplica', '', 'Não se aplica', '', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', 'sim', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sim', 'sim', 'laceração', '', NULL, '', '', '', '', '', 'sim', '', '', '', '', 'sim', 'sim', '');

-- --------------------------------------------------------

--
-- Table structure for table `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(35) NOT NULL,
  `remedios` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(35) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `cargo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `nome`, `cpf`, `telefone`, `email`, `cargo`) VALUES
(3, 'Kamila Santos', '555.555.566-65', '(66) 66666-6666', 'kamila@hotmail.com', 'Balconista'),
(4, 'Marilio Antonio', '555.556.666-66', '(33) 33333-3333', 'marilio@hotmail.com', 'FarmÃ¡ceutico'),
(5, 'Gabriel Silva', '444.444.444-44', '(44) 44444-4444', 'gabriel@hotmail.com', 'FarmÃ¡ceutico'),
(6, 'Marta Campos', '555.555.555-56', '(66) 66666-6666', 'marta@hotmail.com', 'Enfermeira'),
(7, 'AmÃ©lia Silva', '777.777.899-55', '(22) 22222-2222', 'amelia@hotmail.com', 'Faxineira'),
(8, 'Marcos Silva', '111.111.111-11', '(66) 66666-6666', 'marcos@hotmail.com', 'Recepcionista'),
(11, 'Gomes Silva', '444.444.444-44', '(44) 44444-4444', 'gomes@hotmail.com', 'Recepcionista'),
(12, 'Allan Machado', '666.666.666-66', '(55) 55555-5555', 'alan@hotmail.com', 'Tesoureiro'),
(13, 'Diego Campos', '999.999.999-93', '(99) 99999-9999', 'tesoureiro@4wsites.com.br', 'Tesoureiro'),
(50, 'Erika Cristina Pedros', '457.246.228-31', '(11) 99210-6063', 'erikapedros@hotmail.com', 'Medico'),
(52, 'André Luiz', '100.100.100-10', '(11) 99876-9876', 'amgohn@hotmail.com', 'Medico'),
(53, 'Edson Póvoas', '558.853.305-49', '(11) 94521-2992', 'povoas1@outlook.com', 'Medico'),
(68, 'teste 10', '10', '(10', 'teste10@teste.com.br', 'Medico'),
(69, 'Teste1', '123.456.888-88', '(45) 6', 'teste5@teste5.com', 'Medico'),
(70, 'Karen Nunes Sonda ', '443.602.028-22', '(11) 98470-4783', 'karensonda_01@hotmail.com', 'Medico'),
(71, 'GIRLAINE ', '012.016.796-48', '(55) 38991-3242', 'girlainemassis@yahoo.com.br', 'Medico'),
(72, 'Isabela Rangel Silva honorio', '103.945.487-95', '(22) 99894-2381', 'isabela_srangel@hotmail.com', 'Medico'),
(73, 'Edson p', '074.474.128-99', '(11) 94521-2992', 'consultoria.2013@outlook.com', 'Medico'),
(74, 'MARCELO WINTER', '054.114.229-14', '(47) 99984-849', 'marcelo.winter@hotmail.com', 'Medico'),
(75, 'Beatriz', '296.189.138-80', '(11) 98740-2488', 'bia.n2012@hotmail.com', 'Medico'),
(76, 'Rute', '095.426.836-93', '(62) 99181-8730', 'rute_frc@hotmail.com', 'Medico'),
(77, 'Wanderson Feitosa da Silva', '123.890.389-92', '(61) 99999-9999', 'wanderson.feitosa211@gmail.com', 'Medico'),
(78, 'Ane Gleice', '041.857.865-65', '(71) 99133-8715', 'anegleice.souza@gmail.com', 'Medico'),
(79, 'João Vítor', '026.587.812-88', '(95) 98111-6721', 'drjoaovitormagalhaes@gmail.com', 'Medico'),
(80, 'marcos gomes de mattos', '378.260.928-09', '(19) 98442-6583', 'marcos_mattos10@hotmail.com', 'Medico'),
(81, 'DEBORA SANTOS ATAIDE', '019.995.781-98', '(62) 98193-0007', 'deborataide@hotmail.com', 'Medico'),
(82, 'Carolina Costa', '044.200.656-05', '(62) 98414-7776', 'fisiopelvicapravoce@gmail.com', 'Medico');

-- --------------------------------------------------------

--
-- Table structure for table `horarios`
--

CREATE TABLE `horarios` (
  `id` int(11) NOT NULL,
  `horario` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `horarios`
--

INSERT INTO `horarios` (`id`, `horario`) VALUES
(1, '07:00:00'),
(2, '07:30:00'),
(3, '08:00:00'),
(4, '08:30:00'),
(5, '09:00:00'),
(6, '09:30:00'),
(7, '10:00:00'),
(8, '10:30:00'),
(9, '11:00:00'),
(10, '11:30:00'),
(11, '13:00:00'),
(12, '13:30:00'),
(13, '14:00:00'),
(14, '14:30:00'),
(15, '15:00:00'),
(16, '15:30:00'),
(17, '16:00:00'),
(18, '16:30:00'),
(19, '17:00:00'),
(21, '17:30:00'),
(22, '18:00:00'),
(23, '19:00:00'),
(24, '19:30:00'),
(25, '20:00:00'),
(26, '20:30:00'),
(27, '21:00:00'),
(28, '21:30:00'),
(29, '22:00:00'),
(30, '22:30:00'),
(31, '23:00:00'),
(32, '12:30:00'),
(33, '00:00:00'),
(34, '00:30:00'),
(35, '01:00:00'),
(36, '01:30:00'),
(37, '02:00:00'),
(38, '02:30:00'),
(39, '22:30:00'),
(40, '03:00:00'),
(41, '23:30:00'),
(42, '03:30:00'),
(43, '04:00:00'),
(44, '04:30:00'),
(45, '05:00:00'),
(46, '05:30:00'),
(47, '06:00:00'),
(48, '06:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `medicos`
--

CREATE TABLE `medicos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `especialidade` varchar(30) DEFAULT NULL,
  `crm` varchar(20) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `consultorio` varchar(30) DEFAULT NULL,
  `novo` char(10) DEFAULT NULL,
  `nome_foto` varchar(50) DEFAULT NULL,
  `path_foto` varchar(100) DEFAULT NULL,
  `endereco_medico` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `medicos`
--

INSERT INTO `medicos` (`id`, `nome`, `especialidade`, `crm`, `cpf`, `telefone`, `email`, `consultorio`, `novo`, `nome_foto`, `path_foto`, `endereco_medico`) VALUES
(41, 'Erika Cristina Pedros', '1', 'crefito-3/ 276930-F', '457.246.228-31', '(11) 99210-6063', 'erikapedros@hotmail.com', NULL, 'n', NULL, NULL, ''),
(43, 'André Luiz', '1', '123123', '100.100.100-10', '(11) 99876-9876', 'amgohn@hotmail.com', NULL, 'n', NULL, NULL, 'Rua do Teste, 100'),
(59, 'teste 10', '1', '10', '10', '(10', 'teste10@teste.com.br', NULL, 'n', NULL, NULL, '10'),
(62, 'Saúde Pelve', '1', 'CREFITO11/ 140486-F', '732.978.951-87', '(62) 99251-7435', 'thaiscristine@saudepelve.com.br', NULL, 'n', NULL, NULL, 'Rua03 nº1022 sala 511 Ed West Office - Setor Oeste. Goiânia-GO'),
(63, 'Teste1', '1', '123456', '123.456.888-88', '(45) 6', 'teste5@teste5.com', NULL, 'n', NULL, NULL, '123'),
(64, 'Karen Nunes Sonda ', '1', '275478', '443.602.028-22', '(11) 98470-4783', 'karensonda_01@hotmail.com', NULL, 'n', NULL, NULL, 'Rua São João Del Rei 299'),
(65, 'Milena Bezerra ', '1', '251185-F', '842.305.925-15', '(71) 99907-0812', 'milenabezerra.fisio@hotmail.com', NULL, 'n', NULL, NULL, 'Rua Arthur de Azevedo, 1459, Salvador-BA'),
(66, 'Raquel Correa', '1', NULL, NULL, NULL, 'dra.raquelcorrea@gmail.com', NULL, 's', NULL, NULL, NULL),
(67, 'GIRLAINE ', '1', '62546F', '012.016.796-48', '(55) 38991-3242', 'girlainemassis@yahoo.com.br', NULL, 'n', NULL, NULL, 'Av. Saudade, 230'),
(68, 'Isabela Rangel Silva honorio', '1', 'CREFITO2 103695F', '103.945.487-95', '(22) 99894-2381', 'isabela_srangel@hotmail.com', NULL, 'n', NULL, NULL, 'Rua José de Almeida 14 pq Julião nogueira Campos dos Goytacazes -RJ'),
(69, 'Thaisy', '1', NULL, NULL, NULL, 'thaisyfisiopelve@gmail.com', NULL, 's', NULL, NULL, NULL),
(70, 'Bianca Costa', '1', NULL, NULL, NULL, 'biancascosta@hotmail.com.br', NULL, 's', NULL, NULL, NULL),
(71, 'Marilene Barbosa de Sousa Matos', '1', NULL, NULL, NULL, 'fisioterapeutamarimatos@hotmail.com', NULL, 's', NULL, NULL, NULL),
(72, 'Erica Dias', '1', NULL, NULL, NULL, 'ericadias-jip@hotmail.com', NULL, 's', NULL, NULL, NULL),
(73, 'Edson p', '1', '12234', '074.474.128-99', '(11) 94521-2992', 'consultoria.2013@outlook.com', NULL, 'n', NULL, NULL, 'ruasassas'),
(74, 'Amanda Rodrigues ', '1', '204053F', '037.046.081-22', '(61) 99977-2921', 'amanda.fisioterapia06@gmail.com', NULL, 'n', NULL, NULL, 'QI 31 Bloco A sala 114'),
(75, 'MARCELO WINTER', '1', '117399-F ', '054.114.229-14', '(47) 99984-849', 'marcelo.winter@hotmail.com', NULL, 'n', NULL, NULL, 'Rua Brusque,  644 - centro - guabruba / sc'),
(76, 'Beatriz', '1', '3314467f', '296.189.138-80', '(11) 98740-2488', 'bia.n2012@hotmail.com', NULL, 'n', NULL, NULL, 'Rua Ipanema, 458'),
(77, 'Rute', '1', '323827-F', '095.426.836-93', '(62) 99181-8730', 'rute_frc@hotmail.com', NULL, 'n', NULL, NULL, 'Rua 6-A, 340, Setor Aeroporto. Goiânia-GO'),
(78, 'Adriana Azevedo ', '1', '255364', '801.726.015-68', '(71) 99340-4690', 'adriana.azevedo.fisio@gmail.com', NULL, 'n', NULL, NULL, 'Tv da esperança , centro , Candeias/BA'),
(79, 'Wanderson Feitosa da Silva', '1', '2', '123.890.389-92', '(61) 99999-9999', 'wanderson.feitosa211@gmail.com', NULL, 'n', NULL, NULL, 'Casa do caralhjo'),
(80, 'Ane Gleice', '1', '217441', '041.857.865-65', '(71) 99133-8715', 'anegleice.souza@gmail.com', NULL, 'n', NULL, NULL, 'Salvador '),
(81, 'João Vítor', '1', '317921.1.F', '026.587.812-88', '(95) 98111-6721', 'drjoaovitormagalhaes@gmail.com', NULL, 'n', NULL, NULL, 'Rua Amajari 660 São Vicente '),
(82, 'marcos gomes de mattos', '1', '247333-F', '378.260.928-09', '(19) 98442-6583', 'marcos_mattos10@hotmail.com', NULL, 'n', NULL, NULL, 'rua 18 particular'),
(83, 'Marcia Arosteguy', '1', '345577F', '035.953.757-00', '(21) 97620-7536', 'dramarcia.fisiopelvica@gmail.com', NULL, 'n', NULL, NULL, 'RUA DOZE DE FEVEREIRO 357 S 208'),
(84, 'DEBORA SANTOS ATAIDE', '1', '155799', '019.995.781-98', '(62) 98193-0007', 'deborataide@hotmail.com', NULL, 'n', NULL, NULL, 'RUA 261 B N500 APTO 2701 SETOR LESTE UNIVERSITARIO'),
(85, 'Robson ', '1', '123456', '123.456.789-01', '(11) 99999-9999', 'roliveira.nascimento82@gmail.com', NULL, 'n', NULL, NULL, 'Verão 50'),
(86, 'Jhonny', '1', NULL, NULL, NULL, 'Jhonny@gmail.com', NULL, 's', NULL, NULL, NULL),
(87, 'Carolina Costa', '1', 'Crefito 53434F', '044.200.656-05', '(62) 98414-7776', 'fisiopelvicapravoce@gmail.com', NULL, 'n', NULL, NULL, 'Rua 66 n. 84 Apto 1302');

-- --------------------------------------------------------

--
-- Table structure for table `movimentacoes`
--

CREATE TABLE `movimentacoes` (
  `id` int(11) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `movimento` varchar(30) NOT NULL,
  `aguardando_pagamento` varchar(10) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `tesoureiro` varchar(20) NOT NULL,
  `cpf_paciente` varchar(250) DEFAULT NULL,
  `data` date NOT NULL,
  `id_movimento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `movimentacoes`
--

INSERT INTO `movimentacoes` (`id`, `tipo`, `movimento`, `aguardando_pagamento`, `valor`, `tesoureiro`, `cpf_paciente`, `data`, `id_movimento`) VALUES
(74, 'Entrada', 'Consulta', 'Sim', '200.00', '457.246.228-31', '574.754.908-15', '2023-03-08', 185),
(75, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '049.591.168-20', '2023-03-08', 186),
(76, 'Entrada', 'Consulta', 'Sim', '200.00', '457.246.228-31', '574.754.908-15', '2023-03-08', 188),
(77, 'Entrada', 'Consulta', 'Sim', '200.00', '457.246.228-31', '574.754.908-15', '2023-03-08', 191),
(78, 'Entrada', 'Consulta', 'Sim', '200.00', '457.246.228-31', '574.754.908-15', '2023-03-08', 185),
(79, 'Entrada', 'Consulta', 'Nao', '150.00', '457.246.228-31', '124.457.858-47', '2023-03-08', 187),
(80, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '049.591.168-20', '2023-03-08', 189),
(81, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '049.591.168-20', '2023-03-08', 190),
(82, 'Entrada', 'Consulta', 'Nao', '150.00', '457.246.228-31', '124.457.858-47', '2023-03-08', 192),
(83, 'Entrada', 'Consulta', 'Sim', '200.00', '457.246.228-31', '006.188.908-31', '2023-03-08', 196),
(84, 'Entrada', 'Consulta', 'Sim', '200.00', '457.246.228-31', '574.754.908-15', '2023-03-09', 194),
(85, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '574.754.908-15', '2023-03-14', 185),
(86, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '574.754.908-15', '2023-03-14', 188),
(87, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '574.754.908-15', '2023-03-14', 191),
(88, 'Entrada', 'Consulta', 'Nao', '150.00', '457.246.228-31', '124.457.858-47', '2023-03-14', 193),
(89, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '574.754.908-15', '2023-03-14', 194),
(90, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '049.591.168-20', '2023-03-14', 195),
(91, 'Entrada', 'Consulta', 'Sim', '200.00', '457.246.228-31', '006.188.908-31', '2023-03-14', 196),
(92, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '006.188.908-31', '2023-03-14', 196),
(93, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '006.188.908-31', '2023-03-14', 197),
(94, 'Entrada', 'Consulta', 'Nao', '180.00', '457.246.228-31', '124.457.858-47', '2023-03-14', 199),
(95, 'Entrada', 'Consulta', 'Sim', '200.00', '457.246.228-31', '006.188.908-31', '2023-03-14', 198),
(96, 'Entrada', 'Consulta', 'Sim', '200.00', '457.246.228-31', '574.754.908-15', '2023-03-14', 200),
(97, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '049.591.168-20', '2023-03-14', 201),
(98, 'Entrada', 'Consulta', 'Sim', '250.00', '457.246.228-31', '006.188.908-31', '2023-03-15', 202),
(99, 'Entrada', 'Consulta', 'Sim', '200.00', '457.246.228-31', '006.188.908-31', '2023-03-16', 204),
(100, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '006.188.908-31', '2023-03-19', 198),
(101, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '574.754.908-15', '2023-03-19', 200),
(102, 'Entrada', 'Consulta', 'Nao', '250.00', '457.246.228-31', '006.188.908-31', '2023-03-19', 202),
(103, 'Entrada', 'Consulta', 'Nao', '250.00', '457.246.228-31', '574.754.908-15', '2023-03-19', 203),
(104, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '006.188.908-31', '2023-03-19', 204),
(105, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '049.591.168-20', '2023-03-19', 205),
(106, 'Entrada', 'Consulta', 'Nao', '180.00', '457.246.228-31', '124.457.858-47', '2023-04-04', 209),
(107, 'Entrada', 'Consulta', 'Sim', '200.00', '457.246.228-31', '574.754.908-15', '2023-04-04', 210),
(108, 'Entrada', 'Consulta', 'Sim', '200.00', '457.246.228-31', '574.754.908-15', '2023-04-04', 210),
(109, 'Entrada', 'Consulta', 'Sim', '200.00', '457.246.228-31', '006.188.908-31', '2023-04-04', 211),
(110, 'Entrada', 'Consulta', 'Sim', '200.00', '457.246.228-31', '558.166.128-67', '2023-04-04', 212),
(111, 'Entrada', 'Consulta', 'Sim', '200.00', '457.246.228-31', '574.754.908-15', '2023-04-06', 210),
(112, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '574.754.908-15', '2023-04-06', 210),
(113, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '006.188.908-31', '2023-04-06', 211),
(114, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '558.166.128-67', '2023-04-06', 212),
(115, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '006.188.908-31', '2023-04-06', 213),
(116, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '049.591.168-20', '2023-04-20', 214),
(117, 'Entrada', 'Consulta', 'Sim', '100.00', '123.890.389-92', '891.234.902-18', '2023-04-21', 218),
(118, 'Entrada', 'Consulta', 'Nao', '100.00', '123.890.389-92', '891.234.902-18', '2023-04-21', 218),
(119, 'Entrada', 'Consulta', 'Nao', '180.00', '457.246.228-31', '124.457.858-47', '2023-04-25', 219),
(120, 'Entrada', 'Consulta', 'Nao', '180.00', '457.246.228-31', '124.457.858-47', '2023-04-25', 220),
(121, 'Entrada', 'Consulta', 'Nao', '180.00', '457.246.228-31', '124.457.858-47', '2023-04-25', 221),
(122, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '112.946.818-69', '2023-04-25', 226),
(123, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '049.591.168-20', '2023-04-25', 222),
(124, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '006.188.908-31', '2023-04-25', 223),
(125, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '006.188.908-31', '2023-04-25', 224),
(126, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '112.946.818-69', '2023-04-25', 225),
(127, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '112.946.818-69', '2023-04-25', 227),
(128, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '112.946.818-69', '2023-04-25', 228),
(129, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '558.166.128-67', '2023-04-25', 229),
(130, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '558.166.128-67', '2023-04-25', 230),
(131, 'Entrada', 'Consulta', 'Nao', '100.00', '457.246.228-31', '408.866.078-17', '2023-04-25', 231),
(132, 'Entrada', 'Consulta', 'Nao', '100.00', '457.246.228-31', '408.866.078-17', '2023-04-25', 232),
(133, 'Entrada', 'Consulta', 'Nao', '100.00', '457.246.228-31', '408.866.078-17', '2023-04-25', 233),
(134, 'Entrada', 'Consulta', 'Nao', '100.00', '457.246.228-31', '408.866.078-17', '2023-04-25', 234),
(135, 'Entrada', 'Consulta', 'Sim', '100.00', '457.246.228-31', '057.588.738-96', '2023-04-25', 235),
(136, 'Entrada', 'Consulta', 'Nao', '100.00', '457.246.228-31', '057.588.738-96', '2023-04-25', 235),
(137, 'Entrada', 'Consulta', 'Nao', '100.00', '457.246.228-31', '057.588.738-96', '2023-04-25', 236),
(138, 'Entrada', 'Consulta', 'Nao', '100.00', '457.246.228-31', '057.588.738-96', '2023-04-25', 237),
(139, 'Entrada', 'Consulta', 'Nao', '100.00', '457.246.228-31', '057.588.738-96', '2023-04-25', 238),
(140, 'Entrada', 'Consulta', 'Nao', '100.00', '457.246.228-31', '057.588.738-96', '2023-04-25', 239),
(141, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '049.591.168-20', '2023-04-25', 240),
(142, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '112.946.818-69', '2023-06-05', 248),
(143, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '006.188.908-31', '2023-06-05', 249),
(144, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '558.166.128-67', '2023-06-05', 250),
(145, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '112.946.818-69', '2023-06-05', 251),
(146, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '006.188.908-31', '2023-06-05', 252),
(147, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '124.457.858-47', '2023-06-05', 253),
(148, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '006.188.908-31', '2023-06-05', 254),
(149, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '112.946.818-69', '2023-06-05', 255),
(150, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '112.946.818-69', '2023-06-05', 256),
(151, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '006.188.908-31', '2023-06-05', 257),
(152, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '049.591.168-20', '2023-06-05', 258),
(153, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '124.457.858-47', '2023-06-05', 259),
(154, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '006.188.908-31', '2023-06-05', 260),
(155, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '558.166.128-67', '2023-06-05', 261),
(156, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '112.946.818-69', '2023-06-05', 262),
(157, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '112.946.818-69', '2023-06-05', 263),
(158, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '049.591.168-20', '2023-06-05', 264),
(159, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '049.591.168-20', '2023-06-05', 265),
(160, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '049.591.168-20', '2023-06-05', 265),
(161, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '558.166.128-67', '2023-06-05', 266),
(162, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '112.946.818-69', '2023-06-05', 267),
(163, 'Entrada', 'Consulta', 'Nao', '200.00', '457.246.228-31', '124.457.858-47', '2023-06-05', 268);

-- --------------------------------------------------------

--
-- Table structure for table `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(35) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `rg` varchar(20) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(35) NOT NULL,
  `data_nasc` date NOT NULL,
  `idade` int(11) NOT NULL,
  `civil` varchar(15) NOT NULL,
  `sexo_nascimento` varchar(30) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `obs` varchar(350) DEFAULT NULL,
  `medico_resp` varchar(50) DEFAULT NULL,
  `peso` varchar(30) DEFAULT NULL,
  `altura` varchar(30) DEFAULT NULL,
  `imc` varchar(30) DEFAULT NULL,
  `medico_old` varchar(30) DEFAULT NULL,
  `tipo_cirurgia` varchar(50) DEFAULT NULL,
  `queixa_prin` varchar(300) DEFAULT NULL,
  `antecedentes_cirurgicos` varchar(300) DEFAULT NULL,
  `antecedentes_familiares` varchar(300) DEFAULT NULL,
  `medicacoes` varchar(300) DEFAULT NULL,
  `antecedentes_urologicos` varchar(300) DEFAULT NULL,
  `queixas_urinarias` varchar(300) DEFAULT NULL,
  `perdas_aos_esforcos` varchar(300) DEFAULT NULL,
  `perdas_esforcos` varchar(300) DEFAULT NULL,
  `circunstancias_das_perdas` varchar(300) DEFAULT NULL,
  `uso_de_protecao` varchar(300) DEFAULT NULL,
  `funcao_sexual` varchar(300) DEFAULT NULL,
  `SHIM` varchar(300) DEFAULT NULL,
  `habitos_vida` varchar(300) DEFAULT NULL,
  `antecedentes_neurologicos` varchar(300) DEFAULT NULL,
  `consumo_liquidos` varchar(300) DEFAULT NULL,
  `cicatrizes` varchar(300) DEFAULT NULL,
  `trofismo_genital` varchar(300) DEFAULT NULL,
  `trofismo_mmii` varchar(300) DEFAULT NULL,
  `contracao_voluntaria` varchar(300) DEFAULT NULL,
  `musculos_acessorios` varchar(300) DEFAULT NULL,
  `tonus_do_corpo_perinea` varchar(300) DEFAULT NULL,
  `tonus_do_eae` varchar(300) DEFAULT NULL,
  `tonus_de_mmii` varchar(300) DEFAULT NULL,
  `forca_muscular` varchar(300) DEFAULT NULL,
  `sensibilidade` varchar(300) DEFAULT NULL,
  `corpo_perineal_urologia` varchar(300) DEFAULT NULL,
  `tonus_do_eae_urologia` varchar(300) DEFAULT NULL,
  `puborretal_urologia` varchar(300) DEFAULT NULL,
  `mmii_urologia` varchar(300) DEFAULT NULL,
  `fibrose_urologia` varchar(300) DEFAULT NULL,
  `afa_urologia` varchar(300) DEFAULT NULL,
  `perfect_urologia` varchar(300) DEFAULT NULL,
  `elasticidade_urologia` varchar(300) DEFAULT NULL,
  `coordenacao_urologia` varchar(300) DEFAULT NULL,
  `relaxamento_do_pr_a_manobra_de_evacuacao_urologia` varchar(300) DEFAULT NULL,
  `pontos_dolorosos` varchar(300) DEFAULT NULL,
  `pergunta1_urologia` varchar(50) DEFAULT NULL,
  `pergunta2_urologia` varchar(50) DEFAULT NULL,
  `pergunta3_urologia` varchar(50) DEFAULT NULL,
  `pergunta4_urologia` varchar(50) DEFAULT NULL,
  `pergunta5_urologia` varchar(50) DEFAULT NULL,
  `sexo_identifica` varchar(50) DEFAULT NULL,
  `identidade_genero` varchar(50) DEFAULT NULL,
  `pronome_paciente` varchar(50) DEFAULT NULL,
  `antecedentes_pessoais` varchar(300) DEFAULT NULL,
  `tipos_queixa_urina` varchar(300) DEFAULT NULL,
  `uso_frequente` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pacientes`
--

INSERT INTO `pacientes` (`id`, `nome`, `cpf`, `rg`, `telefone`, `email`, `data_nasc`, `idade`, `civil`, `sexo_nascimento`, `endereco`, `obs`, `medico_resp`, `peso`, `altura`, `imc`, `medico_old`, `tipo_cirurgia`, `queixa_prin`, `antecedentes_cirurgicos`, `antecedentes_familiares`, `medicacoes`, `antecedentes_urologicos`, `queixas_urinarias`, `perdas_aos_esforcos`, `perdas_esforcos`, `circunstancias_das_perdas`, `uso_de_protecao`, `funcao_sexual`, `SHIM`, `habitos_vida`, `antecedentes_neurologicos`, `consumo_liquidos`, `cicatrizes`, `trofismo_genital`, `trofismo_mmii`, `contracao_voluntaria`, `musculos_acessorios`, `tonus_do_corpo_perinea`, `tonus_do_eae`, `tonus_de_mmii`, `forca_muscular`, `sensibilidade`, `corpo_perineal_urologia`, `tonus_do_eae_urologia`, `puborretal_urologia`, `mmii_urologia`, `fibrose_urologia`, `afa_urologia`, `perfect_urologia`, `elasticidade_urologia`, `coordenacao_urologia`, `relaxamento_do_pr_a_manobra_de_evacuacao_urologia`, `pontos_dolorosos`, `pergunta1_urologia`, `pergunta2_urologia`, `pergunta3_urologia`, `pergunta4_urologia`, `pergunta5_urologia`, `sexo_identifica`, `identidade_genero`, `pronome_paciente`, `antecedentes_pessoais`, `tipos_queixa_urina`, `uso_frequente`) VALUES
(155, 'Roberto Alves de Almeida', '124.457.858-47', '', '(11) 97222-0496', '', '1970-02-10', 53, 'Casado', NULL, '', '', 'Erika Cristina Pedros', '', '', '', '', '', '', '', '', '', '', 'Não se aplica', 'Não se aplica', 'Não se aplica', '', 'nenhum', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Não se aplica', '', '', NULL, 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', NULL, 'Normal', '', '', '', '', '', '', '', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', 'Hetero', 'masculino', '', '', 'Não se aplica', ''),
(156, 'Gilmar Frimaio', '574.754.908-15', '', '(11) 99930-5174', 'gilmar@sealtech.com.br', '1954-07-12', 68, 'Casado', NULL, '', '', 'Erika Cristina Pedros', '', '', 'BP', '', '', '', '', '', '', '', 'Não se aplica', 'Não se aplica', 'Não se aplica', '', 'nenhum', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Não se aplica', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', 'Hetero', 'masculino', 'ele/dele', '', 'Não se aplica', ''),
(157, 'Walter Joaquim', '049.591.168-20', '', '(11) 98504-1817', 'walterjoaquim01@gmail.com', '1936-05-31', 86, 'Casado', NULL, '', '', 'Erika Cristina Pedros', '', '', '', '', '', 'Incontinência Urinaria pós prostatectomia (IUE nas trocas de postura)', '', '', '', '', 'Não se aplica', 'Não se aplica', 'Não se aplica', '', 'nenhum', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Não se aplica', '', '', NULL, 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Muito Alta', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', 'Hetero', 'masculino', 'ele/dele', '', 'Não se aplica', ''),
(161, 'Antonio Souza de Queiroz', '006.188.908-31', '', '(11) 97131-3778', 'elainevensiguer@gmail.com', '1955-12-28', 67, 'Casado', NULL, '', '', 'Erika Cristina Pedros', '', '', '', '', 'Prostatectomia Radical', 'Incontinência Urinária pós prostatectomia', 'ppr', '', '', '', 'urge-incontinencia', 'pequenos', 'Não se aplica', '', 'nenhum', 'sem', '22-25 Sem Disfunção Eréti', '', NULL, 'Não se aplica', '', 'normal', NULL, 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', NULL, 'Normal', 'Normal', 'Normal', 'Normal', '', '', '2.2.2.', '', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', 'Hetero', 'masculino', 'ele/dele', 'CA prostático', 'Não se aplica', ''),
(163, 'Bruno Inácio Nunes', '408.866.078-17', '48.068.684-1', '(11) 95165-4109', 'bruno_nunes3@hotmail.com', '1991-10-03', 31, 'Solteiro', NULL, '', 'Cirurgia joelho direito (lca) e dor contralateral , identificado pela compensação do membro lesado. ', 'Erika Cristina Pedros', '', '', '', '', 'Lá joelho D', '', '', '', '', '', 'Não se aplica', 'Não se aplica', 'Não se aplica', '', 'nenhum', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Não se aplica', '', '', NULL, 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', NULL, 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', 'sim', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', 'Hetero', '', '', '', 'Não se aplica', ''),
(164, 'Mariana Lacivita de Goes Coelho', '558.166.128-67', '', '', 'tamara.lgoes@gmail.com', '2013-02-22', 10, 'Solteiro', NULL, '', 'hipoatividade detrusor', 'Erika Cristina Pedros', '', '', '', '', '', '', '', '', '', '', 'Não se aplica', 'Não se aplica', 'Não se aplica', '', 'nenhum', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Não se aplica', '', '', NULL, 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', NULL, 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', 'sim', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', '', '', '', '', 'Não se aplica', ''),
(165, 'Paulo Jorge de Oliveira', '112.946.818-69', '18.353.162-01', '(11) 96267-4604', 'paulo28jorge08@gmail.com', '1968-08-28', 54, 'Casado', NULL, '', '', 'Erika Cristina Pedros', '', '', '', 'Dr. Filipe', 'Prostatectomia Radical', 'Pré cirúrgico', '', '', '', '', 'Não se aplica', 'Não se aplica', 'Não se aplica', '', 'nenhum', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Não se aplica', '', '', NULL, 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', NULL, 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', 'sim', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', 'Hetero', 'masculino', 'ele/dele', '', 'Não se aplica', ''),
(175, 'Jacqueline Félix ', '351.088.028-54', '', '', '', '1987-12-08', 35, 'Casado', NULL, '', 'Pre op. Endometriose.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'Beatriz', '', '167', 'BP', 'Dr Rogers', '', '', '', '', '', '', 'Não se aplica', 'Não se aplica', 'Não se aplica', '', 'nenhum', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Não se aplica', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', 'sim', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', 'Hetero ', 'Fem', 'Ela', '', 'Não se aplica', ''),
(176, 'Francemir F Silva', '891.234.902-18', '89.273.711-09', '(61) 99201-9155', '32dplay@gmail.com', '2001-09-18', 21, 'Viúvo', NULL, 'Quadra 204 Conjunto 6', '', 'Wanderson Feitosa da Silva', '40', '190', 'BP', '', '', '', '', '', '', '', 'Não se aplica', 'Não se aplica', 'Não se aplica', '', 'nenhum', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Não se aplica', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', 'sim', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', 'Gay', '', '', '', 'Não se aplica', ''),
(177, 'Regis Siola de Souza', '057.588.738-96', '', '(11) 99987-3331', '', '1963-04-16', 60, 'Casado', NULL, '', 'Tendinopatia (cotovelo de tenista)', 'Erika Cristina Pedros', '', '', 'BP', '', '', '', '', '', '', '', 'Não se aplica', 'Não se aplica', 'Não se aplica', '', 'nenhum', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Não se aplica', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', 'sim', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', 'Hetero', 'masculino', 'ele/dele', '', 'Não se aplica', ''),
(178, 'João Vítor ', '026.587.812-88', '', '', '', '1999-02-25', 24, 'Solteiro', NULL, '', '', 'João Vítor', '', '', 'BP', '', '', '', '', '', '', '', 'Não se aplica', 'Não se aplica', 'Não se aplica', '', 'nenhum', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Não se aplica', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', 'sim', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', '', '', '', '', 'Não se aplica', ''),
(179, 'Valdinar Melo ', '000.000.000-00', '', '(95) 98116-6155', '', '2023-04-25', 0, 'Casado', NULL, '', 'Disfunção Erétil + IU de urgência. Pós Prostatectomia (2 meses), dando sequência a fisioterapia pélvica iniciada no local da cirurgia. ', 'João Vítor', '', '', '', 'Thiago Silva', 'Prostatectomia por laparoscopia ', 'Disfunção Erétil ', '', '', '', '', 'Urgencia', 'Não se aplica', 'Não se aplica', '', 'nenhum', 'Ativa ', ' não se aplica', '', NULL, 'Não se aplica', '', '', NULL, 'Presente', 'Ausente', 'Normal', 'Normal', 'Normal', 'Grau 4 com fibrilação em 3s', NULL, 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', 'sim', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', 'Hétero ', 'Masculino ', 'Ele ', '', 'Não se aplica', ''),
(180, 'NANY SANT\'ANNA ARAÚJO', '060.654.707-08', '', '(21) 96520-1191', 'nanyaraujo@id.uff.br', '1991-07-11', 31, 'Casado', NULL, 'RUA CABO CLODOALDO URSOLANO 20 JARDIM BANGU', '\"DOR DURANTE O PREVENTIVO E AS RELAÇÕES SEXUAIS', 'Marcia Arosteguy', '73', '1,62', 'S', 'DRA CARLA', '', '', '', '', '', '', 'Não se aplica', 'Não se aplica', 'Não se aplica', '', 'nenhum', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Não se aplica', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', 'sim', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', 'HETERO', 'FEMININO', 'ELA', '', 'Não se aplica', ''),
(181, 'Absalão Pereira de Araújo', '016.527.298-87', '', '(11) 43621-381', '', '1931-04-18', 92, 'Casado', NULL, '', '', 'Erika Cristina Pedros', '', '', '', '', '', 'Incontinência Urinária', 'braquioterapia ', '', 'Paciente queixa-se de quando vem a vontade de urinar, não consegue segurar.\r\nInforma que o medico cardiologista orientou a tomar pouca água por conta de inchaço e (agua no pulmão) está fazendo uso de lasix\r\nvascular: ', '', 'Não se aplica', 'Não se aplica', 'Não se aplica', '', 'nenhum', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Não se aplica', '', '', NULL, 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', NULL, 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', 'sim', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', 'Hetero', 'masculino', 'ele/dele', '', 'Não se aplica', ''),
(183, 'Cândido de Castro Santos', '844.065.188-00', '', '(77) 99131-4523', '', '1948-04-14', 75, 'Solteiro', NULL, 'BA-172 Km10 São Félix Coribe-BA', 'IU pós-PRT', 'Saúde Pelve', '75', '175', '', 'Dr. Urano', 'PTR', '', '', '', '', '', 'Não se aplica', 'Não se aplica', 'Não se aplica', '', 'nenhum', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Não se aplica', '', '', NULL, 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', NULL, 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', 'sim', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', 'heterossexual ', 'Masculino ', 'ele ', '', 'Não se aplica', ''),
(184, 'Carolina Costa', '044.200.656-05', '', '', '', '1979-02-13', 44, 'Casado', NULL, '', 'Incontinência Urinária', 'Carolina Costa', '', '', '', '', '', '', '', '', '', '', 'Não se aplica', 'Não se aplica', 'Não se aplica', '', 'nenhum', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Não se aplica', '', '', NULL, 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', NULL, 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', 'sim', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', 'Hetero', '', '', '', 'Não se aplica', '');

-- --------------------------------------------------------

--
-- Table structure for table `pagamentos`
--

CREATE TABLE `pagamentos` (
  `id` int(11) NOT NULL,
  `funcionario` varchar(35) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `tesoureiro` varchar(35) NOT NULL,
  `data` date NOT NULL,
  `nome_funcionario` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescricao`
--

CREATE TABLE `prescricao` (
  `id` int(11) NOT NULL,
  `id_consulta` int(11) NOT NULL,
  `data_evolucao` date NOT NULL,
  `evolucao` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `prescricao`
--

INSERT INTO `prescricao` (`id`, `id_consulta`, `data_evolucao`, `evolucao`) VALUES
(26, 193, '2023-03-07', 'fortalecimento (kots) 20\' intensidade 24 , laser perineal, biofeedback'),
(28, 196, '2023-03-02', 'fortalecimento (kots) 20\' intensidade 24 , laser perineal, biofeedback'),
(31, 194, '2023-03-02', 'eletro, neuromodulação.'),
(32, 194, '2023-03-07', 'eletro, neuromodulação.'),
(33, 202, '2023-03-09', 'Laser,kots, circulatório'),
(37, 208, '2023-03-14', 'fortalecimento (kots) 20\' intensidade 30 , laser perineal 2J (infra), biofeedback'),
(38, 213, '2023-03-16', 'neuromodulação sacral 10hz, 250us, 20\' - fortalecimento kots 10\' - radiofrequência perineal '),
(40, 216, '2023-04-04', 'fortalecimento (kots) 20\' intensidade 24 , laser perineal infra 2J, RADIOFREQUÊNCIA 5\''),
(41, 217, '2023-04-04', 'fortalecimento (kots) 20\' intensidade 30 , laser perineal 2J (infra), biofeedback e radiofrequencia'),
(42, 219, '2023-04-04', 'Realizada EENM parasacral, 10 hZ, 700us, 20\' + biofeedback'),
(43, 218, '2023-04-04', 'neuromodulação sacral 10hz, 250us, 20\' - fortalecimento kots 10\' - radiofrequência perineal '),
(44, 220, '2023-04-06', 'fortalecimento (kots) 20\' intensidade 30 , laser perineal 2J (infra), biofeedback'),
(45, 224, '2023-04-18', 'fortalecimento kots 10\' - radiofrequência perineal ');

-- --------------------------------------------------------

--
-- Table structure for table `receitas`
--

CREATE TABLE `receitas` (
  `id` int(11) NOT NULL,
  `id_consulta` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `remedio` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `receitas`
--

INSERT INTO `receitas` (`id`, `id_consulta`, `item`, `remedio`) VALUES
(14, 223, 1, 'Tadalafila'),
(15, 223, 2, 'Paracetamol'),
(16, 223, 3, 'Ibuprofeno'),
(17, 223, 4, 'génerico'),
(18, 223, 5, 'Xarope');

-- --------------------------------------------------------

--
-- Table structure for table `recepcionistas`
--

CREATE TABLE `recepcionistas` (
  `id` int(11) NOT NULL,
  `nome` varchar(35) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `turno` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `recepcionistas`
--

INSERT INTO `recepcionistas` (`id`, `nome`, `cpf`, `telefone`, `email`, `turno`) VALUES
(1, 'Gomes Silva', '444.444.444-44', '(44) 44444-4444', 'gomes@hotmail.com', 'ManhÃ£');

-- --------------------------------------------------------

--
-- Table structure for table `remedios`
--

CREATE TABLE `remedios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `estoque` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `responsaveis`
--

CREATE TABLE `responsaveis` (
  `id` int(11) NOT NULL,
  `paciente` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `data_nasc` date NOT NULL,
  `cpf` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `saidas_remedios`
--

CREATE TABLE `saidas_remedios` (
  `id` int(11) NOT NULL,
  `remedio` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `funcionario` int(11) NOT NULL,
  `farmaceutico` varchar(20) NOT NULL,
  `nome_remedio` varchar(100) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tesoureiros`
--

CREATE TABLE `tesoureiros` (
  `id` int(11) NOT NULL,
  `nome` varchar(35) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tesoureiros`
--

INSERT INTO `tesoureiros` (`id`, `nome`, `cpf`, `telefone`, `email`) VALUES
(1, 'Allan Machado', '666.666.666-66', '(55) 55555-5555', 'alan@hotmail.com'),
(2, 'Diego Campos', '999.999.999-93', '(99) 99999-9999', 'tesoureiro@hotmail.com'),
(7, 'Erika Cristina Pedros', '457.246.228-31', '(11) 99210-6063', 'erikapedros@hotmail.com'),
(9, 'André Luiz', '100.100.100-10', '(11) 99876-9876', 'amgohn@hotmail.com'),
(10, 'Edson Póvoas', '558.853.305-49', '', 'povoas1@outlook.com'),
(18, 'Lucas', '455.073.638-03', '(45) 73473-4734', 'lucas344@gmail.com'),
(19, 'fabiana teste', '558.857.532-32', '(11) 94521-2992', 'gaedni@outlook.com'),
(20, 'fabiana teste', '558.857.532-32', '(11) 94521-2992', 'gaedni@outlook.com'),
(21, 'fabiana teste', '558.857.532-32', '(11) 94521-2992', 'gaedni@outlook.com'),
(22, 'fabiana teste', '558.857.532-32', '(11) 94521-2992', 'gaedni@outlook.com'),
(23, 'Edson Póvoas', '558.853.305-49', '(11) 94521-2992', 'povoas1@outlook.com'),
(24, 'Edson Póvoas', '558.853.305-49', '(11) 94521-2992', 'povoas1@outlook.com'),
(25, 'teste 10', '10', '(10', 'teste10@teste.com.br'),
(26, 'Teste1', '123.456.888-88', '(45) 6', 'teste5@teste5.com'),
(27, 'Karen Nunes Sonda ', '443.602.028-22', '(11) 98470-4783', 'karensonda_01@hotmail.com'),
(28, 'GIRLAINE ', '012.016.796-48', '(55) 38991-3242', 'girlainemassis@yahoo.com.br'),
(29, 'Isabela Rangel Silva honorio', '103.945.487-95', '(22) 99894-2381', 'isabela_srangel@hotmail.com'),
(30, 'Edson p', '074.474.128-99', '(11) 94521-2992', 'consultoria.2013@outlook.com'),
(31, 'MARCELO WINTER', '054.114.229-14', '(47) 99984-849', 'marcelo.winter@hotmail.com'),
(32, 'Beatriz', '296.189.138-80', '(11) 98740-2488', 'bia.n2012@hotmail.com'),
(33, 'Rute', '095.426.836-93', '(62) 99181-8730', 'rute_frc@hotmail.com'),
(34, 'Wanderson Feitosa da Silva', '123.890.389-92', '(61) 99999-9999', 'wanderson.feitosa211@gmail.com'),
(35, 'Ane Gleice', '041.857.865-65', '(71) 99133-8715', 'anegleice.souza@gmail.com'),
(36, 'João Vítor', '026.587.812-88', '(95) 98111-6721', 'drjoaovitormagalhaes@gmail.com'),
(37, 'marcos gomes de mattos', '378.260.928-09', '(19) 98442-6583', 'marcos_mattos10@hotmail.com'),
(38, 'DEBORA SANTOS ATAIDE', '019.995.781-98', '(62) 98193-0007', 'deborataide@hotmail.com'),
(39, 'Carolina Costa', '044.200.656-05', '(62) 98414-7776', 'fisiopelvicapravoce@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `triagens`
--

CREATE TABLE `triagens` (
  `id` int(11) NOT NULL,
  `paciente` int(11) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `obs` longtext NOT NULL,
  `urgencia` varchar(50) NOT NULL,
  `finalizada` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `senha_original` varchar(25) NOT NULL,
  `data_inicio_acesso` date DEFAULT NULL,
  `data_fim_acesso` date DEFAULT NULL,
  `renovado` varchar(10) DEFAULT NULL,
  `nivel` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha`, `senha_original`, `data_inicio_acesso`, `data_fim_acesso`, `renovado`, `nivel`) VALUES
(355, 'Erika Cristina Pedros', 'erikapedros@hotmail.com', '872592f305ab665df7d08f489849ec9e', 'rafa141518', '2023-03-17', '2023-12-20', 'Sim', 'Medico'),
(367, 'Gilmar Frimaio', 'gilmar@sealtech.com.br', 'aada8253db52460053db34c5927f2b5d', '57475490815', '2023-03-17', NULL, 'Paciente', 'Paciente'),
(369, 'Juliana', 'profjulianadonascimento@gmail.com', '0c54fc31a3aa17d8b32e65037ab44f9b', 'Cadu2017', '2023-03-17', '2023-07-05', 'Sim', 'Medico'),
(370, 'André Luiz', 'amgohn@hotmail.com', '4297f44b13955235245b2497399d7a93', '123123', '2023-03-17', '2023-06-05', 'Sim', 'Medico'),
(373, 'Adminstrador de Acesso', 'acesso@ortopelve.com.br', '21232f297a57a5a743894a0e4a801fc3', 'admin', '2023-03-17', '2023-02-17', 'Nao', 'Acesso'),
(386, 'Suporte - Admin', 'suporte@4wsites.com.br', 'd3b1d8fed081c63125a77fd876168a74', 'admin@ortopelve', NULL, NULL, NULL, 'admin'),
(394, 'Saúde Pelve', 'thaiscristine@saudepelve.com.br', 'ba7f8456541d707dfe2a881624097ba5', 'thais123', '2023-04-11', '2023-12-11', 'Sim', 'Medico'),
(396, 'Karen Nunes Sonda ', 'karensonda_01@hotmail.com', '56c22c8b00f755ccb7e3d632408bbd03', 'Winchester950842', '2023-04-11', '2023-06-11', 'Nao', 'Medico'),
(397, 'Milena Bezerra ', 'milenabezerra.fisio@hotmail.com', 'd10a85b8c8d8579c0c349c5819e95f00', '080322', '2023-04-18', '2023-06-18', 'Nao', 'Medico'),
(398, 'Raquel Correa', 'dra.raquelcorrea@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', '2023-04-18', '2023-06-18', 'Nao', 'Medico'),
(399, 'GIRLAINE ', 'girlainemassis@yahoo.com.br', 'e28462d01a15106d18ed582ca9bc5f2f', 'laninha', '2023-04-18', '2023-06-18', 'Nao', 'Medico'),
(400, 'Isabela Rangel Silva honorio', 'isabela_srangel@hotmail.com', 'e003f891cfbe17054f23874d7dc7f0f4', 'isabela22', '2023-04-18', '2023-06-18', 'Nao', 'Medico'),
(401, 'Thaisy', 'thaisyfisiopelve@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', '2023-04-18', '2023-06-18', 'Nao', 'Medico'),
(402, 'Bianca Costa', 'biancascosta@hotmail.com.br', 'e10adc3949ba59abbe56e057f20f883e', '123456', '2023-04-18', '2023-06-18', 'Nao', 'Medico'),
(403, 'Marilene Barbosa de Sousa Matos', 'fisioterapeutamarimatos@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', '2023-04-18', '2023-06-18', 'Nao', 'Medico'),
(404, 'Erica Dias', 'ericadias-jip@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', '2023-04-18', '2023-06-18', 'Nao', 'Medico'),
(406, 'Amanda Rodrigues ', 'amanda.fisioterapia06@gmail.com', 'd301cdb4e4ffb4bf34320a622c836b2e', '0606fisio', '2023-04-19', '2023-06-19', 'Nao', 'Medico'),
(407, 'MARCELO WINTER', 'marcelo.winter@hotmail.com', '05df1dca2589a7d505bacff11e009523', 'eviver5372', '2023-04-20', '2023-06-20', 'Nao', 'Medico'),
(408, 'Beatriz', 'bia.n2012@hotmail.com', '7778dec03f4ef27573bb4968db57691c', 'bia2903', '2023-04-20', '2023-06-20', 'Nao', 'Medico'),
(409, 'Rute', 'rute_frc@hotmail.com', '6cad086aca15f7861bd048a791013488', '240115', '2023-04-20', '2023-06-20', 'Nao', 'Medico'),
(410, 'Adriana Azevedo ', 'adriana.azevedo.fisio@gmail.com', 'df83a2fcc497b09668d81003506c39c5', 'doisfilhos', '2023-04-20', '2023-06-20', 'Nao', 'Medico'),
(412, 'Ane Gleice', 'anegleice.souza@gmail.com', 'cc054614767fa60a677f1e997fc9393f', '91338715', '2023-04-21', '2023-06-21', 'Nao', 'Medico'),
(413, 'João Vítor', 'drjoaovitormagalhaes@gmail.com', 'ff6e62203e0da7874571dba2330d4999', '@PelvicFloor47699900', '2023-04-25', '2023-06-25', 'Nao', 'Medico'),
(414, 'marcos gomes de mattos', 'marcos_mattos10@hotmail.com', 'b06c3f5e4e7eb615da32f127bbe2de7e', 'Alegria1011%', '2023-04-26', '2023-06-26', 'Nao', 'Medico'),
(415, 'Marcia Arosteguy', 'dramarcia.fisiopelvica@gmail.com', 'a8e584699152895df920bb2b65816f1e', 'M@rshy50', '2023-04-28', '2023-06-28', 'Nao', 'Medico'),
(416, 'DEBORA SANTOS ATAIDE', 'deborataide@hotmail.com', '5203ad3485c5d608e0b9a023f70acbec', 'herma1988', '2023-05-03', '2023-07-03', 'Nao', 'Medico'),
(417, 'Robson ', 'roliveira.nascimento82@gmail.com', 'eb5a790b34e06e2ce3346fa2ca5d6abb', '123456*', '2023-05-03', '2023-07-03', 'Nao', 'Medico'),
(419, 'Carolina Costa', 'fisiopelvicapravoce@gmail.com', '32a226c1b4cac51fd5cb9cb9b388e47d', 'ca13ro14fra24', '2023-05-23', '2023-07-23', 'Nao', 'Medico');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atendimentos`
--
ALTER TABLE `atendimentos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chamadas`
--
ALTER TABLE `chamadas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contas_pagar`
--
ALTER TABLE `contas_pagar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contas_receber`
--
ALTER TABLE `contas_receber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entradas_remedios`
--
ALTER TABLE `entradas_remedios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `especializacoes`
--
ALTER TABLE `especializacoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exercicios`
--
ALTER TABLE `exercicios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exercicios_pacientes`
--
ALTER TABLE `exercicios_pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ficha_proctologia`
--
ALTER TABLE `ficha_proctologia`
  ADD PRIMARY KEY (`fkcpf`);

--
-- Indexes for table `ficha_uroginecologia`
--
ALTER TABLE `ficha_uroginecologia`
  ADD PRIMARY KEY (`fkcpf`);

--
-- Indexes for table `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movimentacoes`
--
ALTER TABLE `movimentacoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescricao`
--
ALTER TABLE `prescricao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receitas`
--
ALTER TABLE `receitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recepcionistas`
--
ALTER TABLE `recepcionistas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `remedios`
--
ALTER TABLE `remedios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `responsaveis`
--
ALTER TABLE `responsaveis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saidas_remedios`
--
ALTER TABLE `saidas_remedios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tesoureiros`
--
ALTER TABLE `tesoureiros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `triagens`
--
ALTER TABLE `triagens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atendimentos`
--
ALTER TABLE `atendimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;

--
-- AUTO_INCREMENT for table `contas_pagar`
--
ALTER TABLE `contas_pagar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `contas_receber`
--
ALTER TABLE `contas_receber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269;

--
-- AUTO_INCREMENT for table `entradas_remedios`
--
ALTER TABLE `entradas_remedios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `especializacoes`
--
ALTER TABLE `especializacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exercicios`
--
ALTER TABLE `exercicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `exercicios_pacientes`
--
ALTER TABLE `exercicios_pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `movimentacoes`
--
ALTER TABLE `movimentacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `pagamentos`
--
ALTER TABLE `pagamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prescricao`
--
ALTER TABLE `prescricao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `receitas`
--
ALTER TABLE `receitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `recepcionistas`
--
ALTER TABLE `recepcionistas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `remedios`
--
ALTER TABLE `remedios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `responsaveis`
--
ALTER TABLE `responsaveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `saidas_remedios`
--
ALTER TABLE `saidas_remedios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tesoureiros`
--
ALTER TABLE `tesoureiros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `triagens`
--
ALTER TABLE `triagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=420;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
