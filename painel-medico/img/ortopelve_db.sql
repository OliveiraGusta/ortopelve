-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Fev-2023 às 04:48
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ortopelve_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendimentos`
--

CREATE TABLE `atendimentos` (
  `id` int(11) NOT NULL,
  `descricao` varchar(60) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `email_med` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `atendimentos`
--

INSERT INTO `atendimentos` (`id`, `descricao`, `valor`, `email_med`) VALUES
(14, 'Bruto', '157.00', 'murilo@4wsites.com.br'),
(17, 'teste3', '99999999.99', 'ccc@gmail.com'),
(18, 'teste3', '5.57', 'Erika@4wsites.com.br'),
(19, 'teste', '5.01', 'medico@4wsites.com.br'),
(20, 'Consulta de avaliação ', '250.00', 'erikapedros@hotmail.com'),
(21, 'Sessão Pélvica ', '180.00', 'erikapedros@hotmail.com'),
(22, 'saf', '6262.00', 'Suporte@4wsites.com'),
(23, 'Fisioterapia', '165.00', 'erikapedros@hotmail.com'),
(24, 'Sessão Pélvica Desc  150', '150.00', 'erikapedros@hotmail.com'),
(25, 'Pilates Clínico 1x sem', '18.00', 'e.vidaaocorpo@gmail.com'),
(26, 'Fisioterapia Ortopédica', '40.00', 'e.vidaaocorpo@gmail.com'),
(27, 'Fisioterapia Pélvica', '100.00', 'e.vidaaocorpo@gmail.com'),
(28, 'Fisioterapia Neurológica ', '50.00', 'e.vidaaocorpo@gmail.com'),
(29, 'Pilates Clínico 2x sem', '20.00', 'e.vidaaocorpo@gmail.com'),
(30, 'Pilates Total Pass', '29.00', 'e.vidaaocorpo@gmail.com'),
(31, 'Avaliação Pélvica', '120.00', 'e.vidaaocorpo@gmail.com'),
(32, 'Avaliação Pilates', '0.00', 'e.vidaaocorpo@gmail.com'),
(33, 'Avaliação Ortopedia', '80.00', 'e.vidaaocorpo@gmail.com'),
(34, 'Avaliação Neurológica', '100.00', 'e.vidaaocorpo@gmail.com'),
(35, 'Avaliação Respiratória', '80.00', 'e.vidaaocorpo@gmail.com'),
(36, 'Laserterapia ', '65.00', 'e.vidaaocorpo@gmail.com'),
(37, 'Consultoria de Aleitamento', '250.00', 'e.vidaaocorpo@gmail.com'),
(38, 'Acupuntura e Dry Needling', '40.00', 'e.vidaaocorpo@gmail.com'),
(39, 'Massagem Relaxante (meio corpo)', '60.00', 'e.vidaaocorpo@gmail.com'),
(40, 'Massagem Relaxante (corpo inteiro)', '80.00', 'e.vidaaocorpo@gmail.com'),
(41, 'Massagem Modeladora (meio corpo)', '80.00', 'e.vidaaocorpo@gmail.com'),
(42, 'Massagem Modeladora (corpo todo)', '100.00', 'e.vidaaocorpo@gmail.com'),
(43, 'Drenagem Linfática (meio corpo)', '70.00', 'e.vidaaocorpo@gmail.com'),
(44, 'Drenagem Linfática (corpo todo)', '100.00', 'e.vidaaocorpo@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargos`
--

CREATE TABLE `cargos` (
  `id` int(11) NOT NULL,
  `nome` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `cargos`
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
-- Estrutura da tabela `chamadas`
--

CREATE TABLE `chamadas` (
  `id` int(11) NOT NULL,
  `paciente` varchar(40) NOT NULL,
  `consultorio` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `consultas`
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
-- Extraindo dados da tabela `consultas`
--

INSERT INTO `consultas` (`id`, `data`, `hora`, `paciente`, `tipo_atendimento`, `medico`, `valor`, `pgto_confirmado`, `status`, `atestado`, `prescricao`, `receita`) VALUES
(95, '2022-10-16', '22:30:00', 20, 18, 31, '5.57', 'Não', NULL, NULL, NULL, NULL),
(96, '2022-10-17', '00:00:00', 20, 18, 31, '5.57', 'Não', NULL, NULL, NULL, NULL),
(101, '2022-12-01', '01:00:00', 43, 19, 27, '5.01', 'Sim', 'Aguardando', NULL, NULL, NULL),
(102, '2022-12-17', '11:00:00', 80, 21, 34, '180.00', 'Sim', 'Aguardando', NULL, NULL, NULL),
(103, '2022-12-23', '01:00:00', 79, 22, 33, '6262.00', 'Sim', 'Consultando', NULL, 'Sim', NULL),
(104, '2022-12-26', '11:00:00', 80, 21, 34, '180.00', 'Sim', 'Aguardando', NULL, 'Sim', NULL),
(106, '2023-01-10', '07:30:00', 82, 24, 34, '150.00', 'Sim', 'Aguardando', NULL, 'Sim', NULL),
(107, '2023-01-10', '09:00:00', 83, 21, 34, '180.00', 'Sim', 'Aguardando', NULL, NULL, NULL),
(108, '2023-01-13', '06:00:00', 81, 20, 34, '250.00', 'Sim', 'Aguardando', NULL, 'Sim', NULL),
(109, '2023-01-16', '09:00:00', 84, 29, 37, '20.00', 'Não', NULL, NULL, NULL, NULL),
(110, '2023-01-17', '09:00:00', 83, 21, 34, '180.00', 'Sim', 'Aguardando', NULL, NULL, NULL),
(111, '2023-01-17', '07:30:00', 82, 24, 34, '150.00', 'Sim', 'Finalizada', NULL, NULL, NULL),
(112, '2023-01-19', '07:00:00', 111, 20, 34, '250.00', 'Sim', 'Aguardando', NULL, NULL, NULL),
(113, '2023-01-14', '10:00:00', 118, 21, 34, '180.00', 'Sim', 'Aguardando', NULL, NULL, NULL),
(114, '2023-01-21', '10:00:00', 118, 21, 34, '180.00', 'Sim', 'Finalizada', NULL, 'Sim', NULL),
(115, '2023-01-23', '07:00:00', 84, 29, 37, '20.00', 'Não', NULL, NULL, NULL, NULL),
(116, '2023-01-23', '10:00:00', 100, 29, 37, '20.00', 'Não', NULL, NULL, NULL, NULL),
(117, '2023-01-24', '10:00:00', 100, 29, 37, '20.00', 'Sim', 'Aguardando', NULL, NULL, NULL),
(118, '2023-01-26', '07:00:00', 111, 21, 34, '180.00', 'Sim', 'Aguardando', NULL, 'Sim', NULL),
(119, '2023-02-02', '07:00:00', 111, 21, 34, '180.00', 'Sim', 'Aguardando', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas_pagar`
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

--
-- Extraindo dados da tabela `contas_pagar`
--

INSERT INTO `contas_pagar` (`id`, `descricao`, `valor`, `vencimento`, `pagamento`, `pago`, `funcionario`, `foto`) VALUES
(18, 'teste', '5.74', '2022-10-13', NULL, 'Não', '', 'Exercicio-1.mp4'),
(19, 'tgest', '1111.00', '2022-12-01', '2022-12-01', 'Sim', '', 'sem-foto.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas_receber`
--

CREATE TABLE `contas_receber` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `vencimento` date NOT NULL,
  `data_baixa` date DEFAULT NULL,
  `forma_pgto` varchar(25) DEFAULT NULL,
  `tipo_pgto` varchar(30) DEFAULT NULL,
  `tesoureiro` varchar(30) DEFAULT NULL,
  `id_consulta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `contas_receber`
--

INSERT INTO `contas_receber` (`id`, `descricao`, `valor`, `vencimento`, `data_baixa`, `forma_pgto`, `tipo_pgto`, `tesoureiro`, `id_consulta`) VALUES
(66, '14', '157.00', '2022-09-21', '2022-09-21', 'Dinheiro', 'nbank', NULL, 66),
(67, '16', '5.57', '2022-09-24', '2022-09-24', 'Convênio', 'cERT', NULL, 67),
(68, '17', '99999999.99', '2022-09-24', '2022-09-24', 'Convênio', 'convenio??', NULL, 68),
(69, '17', '99999999.99', '2022-09-24', NULL, NULL, NULL, NULL, 69),
(70, '17', '99999999.99', '2022-09-24', NULL, NULL, NULL, NULL, 70),
(71, '17', '99999999.99', '2022-09-24', NULL, NULL, NULL, NULL, 71),
(72, '17', '99999999.99', '2022-09-24', NULL, NULL, NULL, NULL, 72),
(73, '17', '99999999.99', '2022-09-24', NULL, NULL, NULL, NULL, 73),
(74, '18', '5.57', '2022-10-13', '2022-10-13', 'Cartão', 'convenio??', NULL, 74),
(75, '18', '5.57', '2022-10-15', NULL, NULL, NULL, NULL, 75),
(76, '18', '5.57', '2022-10-15', NULL, NULL, NULL, NULL, 76),
(77, '18', '5.57', '2022-10-15', NULL, NULL, NULL, NULL, 77),
(78, '18', '5.57', '2022-10-15', NULL, NULL, NULL, NULL, 78),
(79, '18', '5.57', '2022-10-15', NULL, NULL, NULL, NULL, 79),
(80, '18', '5.57', '2022-10-15', NULL, NULL, NULL, NULL, 80),
(81, '18', '5.57', '2022-10-15', NULL, NULL, NULL, NULL, 81),
(82, '18', '5.57', '2022-10-15', NULL, NULL, NULL, NULL, 82),
(83, '18', '5.57', '0000-00-00', NULL, NULL, NULL, NULL, 83),
(84, '18', '5.57', '0000-00-00', NULL, NULL, NULL, NULL, 84),
(85, '18', '5.57', '0000-00-00', NULL, NULL, NULL, NULL, 85),
(86, '18', '5.57', '0000-00-00', NULL, NULL, NULL, NULL, 86),
(87, '18', '5.57', '0000-00-00', NULL, NULL, NULL, NULL, 87),
(88, '18', '5.57', '0000-00-00', NULL, NULL, NULL, NULL, 88),
(89, '18', '5.57', '0000-00-00', NULL, NULL, NULL, NULL, 89),
(90, '18', '5.57', '0000-00-00', NULL, NULL, NULL, NULL, 90),
(91, '18', '5.57', '0000-00-00', NULL, NULL, NULL, NULL, 91),
(92, '18', '5.57', '0000-00-00', NULL, NULL, NULL, NULL, 92),
(93, '18', '5.57', '0000-00-00', NULL, NULL, NULL, NULL, 93),
(94, '18', '5.57', '0000-00-00', NULL, NULL, NULL, NULL, 94),
(95, '18', '5.57', '2022-10-16', NULL, NULL, NULL, NULL, 95),
(96, '18', '5.57', '2022-10-17', NULL, NULL, NULL, NULL, 96),
(97, '18', '5.57', '0000-00-00', NULL, NULL, NULL, NULL, 97),
(98, '18', '5.57', '0000-00-00', NULL, NULL, NULL, NULL, 98),
(99, '18', '5.57', '2022-10-25', NULL, NULL, NULL, NULL, 99),
(100, '18', '5.57', '2022-10-25', NULL, NULL, NULL, NULL, 100),
(101, '19', '5.01', '2022-12-01', '2022-12-01', 'Dinheiro', 'pix', NULL, 101),
(102, '21', '180.00', '2022-12-17', '2022-12-12', 'Cartão', '', NULL, 102),
(103, '22', '6262.00', '2022-12-23', '2022-12-23', 'Cartão', '4654', NULL, 103),
(104, '21', '180.00', '2022-12-26', '2022-12-23', 'Cartão', '', NULL, 104),
(105, '24', '150.00', '2023-01-12', NULL, NULL, NULL, NULL, 105),
(106, '24', '150.00', '2023-01-10', '2023-01-13', 'Dinheiro', 'Dinheiro', NULL, 106),
(107, '21', '180.00', '2023-01-10', '2023-01-13', 'Dinheiro', 'Dinheiro', NULL, 107),
(108, '20', '250.00', '2023-01-13', '2023-01-13', 'Dinheiro', '55', NULL, 108),
(109, '29', '20.00', '2023-01-16', NULL, NULL, NULL, NULL, 109),
(110, '21', '180.00', '2023-01-17', '2023-01-17', 'Dinheiro', '', NULL, 110),
(111, '24', '150.00', '2023-01-17', '2023-01-17', 'Dinheiro', '', NULL, 111),
(112, '20', '250.00', '2023-01-19', '2023-01-26', 'PIX', '', NULL, 112),
(113, '21', '180.00', '2023-01-14', '2023-01-21', 'PIX', '', NULL, 113),
(114, '21', '180.00', '2023-01-21', '2023-01-21', 'PIX', '', NULL, 114),
(115, '29', '20.00', '2023-01-23', NULL, NULL, NULL, NULL, 115),
(116, '29', '20.00', '2023-01-23', NULL, NULL, NULL, NULL, 116),
(117, '29', '20.00', '2023-01-24', '2023-01-24', 'Dinheiro', 'cheque', NULL, 117),
(118, '21', '180.00', '2023-01-26', '2023-01-26', 'PIX', '', NULL, 118),
(119, '21', '180.00', '2023-02-02', '2023-02-02', 'PIX', '', NULL, 119);

-- --------------------------------------------------------

--
-- Estrutura da tabela `entradas_remedios`
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
-- Estrutura da tabela `especializacoes`
--

CREATE TABLE `especializacoes` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `exercicios`
--

CREATE TABLE `exercicios` (
  `id` int(11) NOT NULL,
  `nome_exercicio` varchar(300) NOT NULL,
  `des_exercicio` varchar(300) NOT NULL,
  `arquivo_exercicio` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `exercicios`
--

INSERT INTO `exercicios` (`id`, `nome_exercicio`, `des_exercicio`, `arquivo_exercicio`) VALUES
(7, 'Adução de quadril', 'Paciente em ortostatismo (em pé) com MMII lateralizados. Realizar agachamento jogando bumbum para trás e levemente o tronco para frente, na subida elevar uma das pernas alternadamente.', 'Exercicio-1.gif'),
(8, 'Glúteos,  coordenação e estabilização de tronco associado a MMII e MMSS', 'Paciente em posição de 4 apoios (joelhos e mãos apoiados), elevar e esticar perna esquerda com braço direito e perna direita com braço esquerdo alternadamente.', 'Exercicio-2.gif'),
(11, 'Agachamento', 'Paciente em ortostatismo (em pé) com MMII lateralizados. Realizar agachamento jogando o bumbum para trás e levemente o tronco para frente e retorna a posição inicial.', 'Exercicio-3.gif'),
(12, 'Adução de quadril', 'Paciente em decúbito lateral (deitado de lado) realizar elevação de MI.', 'Exercicio-4.gif'),
(13, 'Afundo', 'Paciente com posição inicial ortostática, realizar agachamento unilateral descendo com uma das pernas e joelho quase tocando ao chão. (Alternar)', 'Exercicio-5.gif'),
(14, 'Elevação de glúteos', 'Paciente em posição de 4 apoios (joelhos e mãos apoiados) elevar MI com joelho dobrado (sem esticar) alternadamente.', 'Exercicio-6.gif'),
(15, 'Abdômen e resistência', 'Paciente em decúbito dorsal (barriga para cima) dobrar os joelhos a 45° pés alto, esticar e dobrar MMII', 'Exercicio-7.gif'),
(16, 'Elevação de glúteos', 'Paciente em posição de 4 apoios (joelhos e mãos apoiados) elevar MI com joelho dobrado (sem esticar) alternadamente.', 'Exercicio-8.gif'),
(17, 'Elevação Pélvica', 'Paciente em decúbito dorsal (barriga para cima), mãos ao lado do quadril, joelhos dobrados e pé no chão.  Realizar o movimento de elevação do quadril.', 'Exercicio-9.gif'),
(18, 'Elevação de glúteos', 'Paciente em posição de 4 apoios (joelhos e mãos apoiados) elevar MI esticando o joelho e retornando a posição inicial, alternadamente', 'Exercicio-10.gif'),
(19, 'Agachamento', 'Paciente em ortostatismo (em pé) com MMII lateralizados, co  pés apontados para fora. \r\nRealizar agachamento jogando o bumbum para trás e levemente o tronco para frente e retorna a posição inicial.', 'Exercicio-11.gif'),
(20, 'Assoalho Pélvico.', 'Contração e relaxamento.', 'Exercicio-12.gif'),
(21, 'Prancha com extensão de MMSS', 'Paciente em prono, apoiar dedos dos pés e mãos no chão, iniciar descida com cotovelos com braços alternados, e estender novamente, retornando a posição inicial', 'Exercicio-13.gif'),
(22, 'Elevação de MMSS a partir de 180°', 'Elevação de MMSS a partir de 180° com mãos viradas para cima. Elevar MMSS acima da cabeça em sincronia.', 'Exercicio-14.gif'),
(23, 'Flexão de MMSS com apoios de joelho', 'Posição prono e MMSS flexionados com as mãos em paralelo ao tronco, realizar extensão e Flexão de cotovelos', 'Exercicio-15.gif'),
(24, 'Flexão de MMSS com apoio da parede', 'Nas pontas dos pés, mãos apoiados na parece (com a distância dos braços), realizar a Flexão e extensão dos cotovelos (mãos na altura dos ombros).', 'Exercicio-16.gif'),
(25, 'Flexão de MMSS sem apoios de joelho', 'Posição prono e MMSS flexionados com as mãos em paralelo ao tronco, realizar extensão e Flexão de cotovelos', 'Exercicio-17.gif'),
(26, 'Triceps na cadeira', 'De costas para a cadeira, posicionar as mãos em apoio para realizar flexão e extensão de MMSS de forma que os joelhos não participem da ação, apenas com apoio.', 'Exercicio-18.gif'),
(27, 'Flexão de MMSS com apoio de um banco ou cadeira a 45', 'Nas pontas dos pés, mãos apoiados na parece (com a distância dos braços), realizar a Flexão e extensão dos cotovelos (mãos na altura dos ombros)', 'Exercicio-19.gif'),
(28, 'Equilíbrio, coordenação e força de CORE', 'Em posição inicial em prancha, realizar elevação de MI e MS em sincronia e alternadamente (nível alto de dificuldade,  começar com posição e aos poucos evoluir para elevação de membros', 'Exercicio-20.gif');

-- --------------------------------------------------------

--
-- Estrutura da tabela `exercicios_pacientes`
--

CREATE TABLE `exercicios_pacientes` (
  `id` int(11) NOT NULL,
  `nome_exercicio` varchar(300) NOT NULL,
  `repeticoes` int(11) DEFAULT NULL,
  `id_paciente` int(30) NOT NULL,
  `id_medico` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `exercicios_pacientes`
--

INSERT INTO `exercicios_pacientes` (`id`, `nome_exercicio`, `repeticoes`, `id_paciente`, `id_medico`) VALUES
(20, 'Adução de quadril', 3, 79, 33);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ficha_proctologia`
--

CREATE TABLE `ficha_proctologia` (
  `fkcpf` varchar(50) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `queixa_prin_proc` varchar(100) DEFAULT NULL,
  `antecedentes_pessoais_proc` varchar(100) DEFAULT NULL,
  `antecedentes_cirurgicos_proc` varchar(100) DEFAULT NULL,
  `antecedentes_familiares_proc` varchar(100) DEFAULT NULL,
  `historia_proctologica` varchar(100) DEFAULT NULL,
  `tempo_sintomas` varchar(100) DEFAULT NULL,
  `tempo_ajuda` varchar(100) DEFAULT NULL,
  `sintomas_estado` varchar(100) DEFAULT NULL,
  `perdas_proc` varchar(100) DEFAULT NULL,
  `frequencia_dos_acidentes` varchar(100) DEFAULT NULL,
  `quantidade_da_perda` varchar(100) DEFAULT NULL,
  `protecoes_proc` varchar(100) DEFAULT NULL,
  `frequencia_evacuatoria` varchar(100) DEFAULT NULL,
  `manobra_evacuar` varchar(100) DEFAULT NULL,
  `medicacoes_em_uso_proc` varchar(100) DEFAULT NULL,
  `partos_proc` varchar(100) DEFAULT NULL,
  `complicacoes_puerperais_proc` varchar(100) DEFAULT NULL,
  `cirurgias_ginecologicas_proc` varchar(100) DEFAULT NULL,
  `antecedentes_urologicos_proc` varchar(100) DEFAULT NULL,
  `habitos_vida_proc` varchar(100) DEFAULT NULL,
  `uso_frequente_proc` varchar(100) DEFAULT NULL,
  `restricao_do_consumo_de_liquidos_proc` varchar(100) DEFAULT NULL,
  `renda_familiar` varchar(100) DEFAULT NULL,
  `cicatrizes_proc` varchar(100) DEFAULT NULL,
  `trofismo_perianal` varchar(100) DEFAULT NULL,
  `trofismo_mmii_proc` varchar(100) DEFAULT NULL,
  `contracao_voluntaria_proc` varchar(100) DEFAULT NULL,
  `abertura_vulvo_vaginal_proc` varchar(100) DEFAULT NULL,
  `abertura_anal_proc` varchar(100) DEFAULT NULL,
  `apneia_proc` varchar(100) DEFAULT NULL,
  `contracao_do_eae` varchar(100) DEFAULT NULL,
  `corpo_perineal_proc` varchar(100) DEFAULT NULL,
  `tonus_do_eae_proc` varchar(50) DEFAULT NULL,
  `puborretal_proc` varchar(50) DEFAULT NULL,
  `mmii_proc` varchar(50) DEFAULT NULL,
  `fibrose_proc` varchar(50) DEFAULT NULL,
  `afa_proc` varchar(50) NOT NULL,
  `perfect_proc` varchar(50) DEFAULT NULL,
  `elasticidade_proc` varchar(50) DEFAULT NULL,
  `coordenacao_proc` varchar(50) NOT NULL,
  `relaxamento_do_pr_a_manobra_de_evacuacao_proc` varchar(50) DEFAULT NULL,
  `pontos_dolorosos_proc` varchar(50) DEFAULT NULL,
  `teste_de_esforco_proc` varchar(50) DEFAULT NULL,
  `reflexo_clitoriano_bulbocavernoso_proc` varchar(50) DEFAULT NULL,
  `reflexo_ceigel_cremasterico` varchar(50) DEFAULT NULL,
  `marcha_proc` varchar(50) DEFAULT NULL,
  `outros_dados_proc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

--
-- Extraindo dados da tabela `ficha_proctologia`
--

INSERT INTO `ficha_proctologia` (`fkcpf`, `nome`, `queixa_prin_proc`, `antecedentes_pessoais_proc`, `antecedentes_cirurgicos_proc`, `antecedentes_familiares_proc`, `historia_proctologica`, `tempo_sintomas`, `tempo_ajuda`, `sintomas_estado`, `perdas_proc`, `frequencia_dos_acidentes`, `quantidade_da_perda`, `protecoes_proc`, `frequencia_evacuatoria`, `manobra_evacuar`, `medicacoes_em_uso_proc`, `partos_proc`, `complicacoes_puerperais_proc`, `cirurgias_ginecologicas_proc`, `antecedentes_urologicos_proc`, `habitos_vida_proc`, `uso_frequente_proc`, `restricao_do_consumo_de_liquidos_proc`, `renda_familiar`, `cicatrizes_proc`, `trofismo_perianal`, `trofismo_mmii_proc`, `contracao_voluntaria_proc`, `abertura_vulvo_vaginal_proc`, `abertura_anal_proc`, `apneia_proc`, `contracao_do_eae`, `corpo_perineal_proc`, `tonus_do_eae_proc`, `puborretal_proc`, `mmii_proc`, `fibrose_proc`, `afa_proc`, `perfect_proc`, `elasticidade_proc`, `coordenacao_proc`, `relaxamento_do_pr_a_manobra_de_evacuacao_proc`, `pontos_dolorosos_proc`, `teste_de_esforco_proc`, `reflexo_clitoriano_bulbocavernoso_proc`, `reflexo_ceigel_cremasterico`, `marcha_proc`, `outros_dados_proc`) VALUES
('000.000.000-00', 'Walter Joaquim', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('013.578.708-41', 'Marcus Vinicius Vieira', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('049.591.168-20', 'Walter Joaqueim', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('068.967.648-48', 'Nilma Maria Alves Bonfim', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('077.177.818-08', 'Taeko sanommiya', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('111.111.1', 'Teste 1', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('113.894.638-93', 'Mônica Aparecida Pego Beneti', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('116.450.438-00', 'Luciene Nobrega de Sousa', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('121.212.444', 'afas', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('124.457.858-47', 'Roberto Alves Almeida', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('127.460.738-89', 'Regina Lucia Campos de Oliveira', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('131.262.178-85', 'Maria joselira f de Oliveira', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('140.621.158-32', 'Luciana Bezerra Peixoto', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('167.829.068-80', 'Rita de Cassia dos Santos Aguiar', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('170.696.738-17', 'Anderson corte', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('172.405.458-90', 'Andreia Aparecida de Abreu Carlos', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('178.408.428-01', 'Marlene Araújo Lula da Silva', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('182.456.568-2', 'Ricardo Espigado', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('183.527.728-48', 'Patrícia Schinittd Teixeira Lemos ', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('183.593.998-83', 'ivanir medeiros ', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('194.381.278-01', 'Adriana de Jesus Santos', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('214.528.918-69', 'Carolina Sanchez', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('214.538.918-69', 'Carolina Sanchez', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('222.222.2', 'Teste 2', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('230.469.987-9', 'Gabrielly Sousa silva', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('232.399.348-84', 'Jessica de Oliveira dos Santos', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('251.868.898-65', 'Rosivania Andrelina de Lima', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('252.788.418-00', 'Fernanda Tomageski Chanquini', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('267.902.838-46', 'Nelcineia Viana Lipe', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('276.088.818-52', 'Andreia Conceição Siqueira ', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('289.273.678-12', 'Renata Soares', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('290.347.648-93', 'Rodrigo alves vicente ', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('296.827.078-89', 'Erika Pedros', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('297.415.238-40', 'Rose Rosa Rodrigues Monteiro ', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('304.105.198-20', 'Daniele Alves Campos da Silva', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('323.963.108-36', 'Paula karina de oliveira da silva', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('327.523.648-22', 'Liliam candido corte', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('328.832.458', 'Eder Barbosa da Silva', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('330.648.598-54', 'claudinei alves dos santos junior ', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('354.345', 'teste', 'dfhdf', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('354.535.198-00', 'Carlos Eduardo Carvalho Silva', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('360.161.408-13', 'Renata Alves de Lima', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('362.121.378-38', 'aline da silva martins ziwian', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('364.706.208-17', 'nayara moya rios do vale ', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('378.765.098-94', 'TESTE', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('383.888.383', 'Novo', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('415.559.388-25', 'Pamela Gaspar Favacho ', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('420.450.118-44', 'Cristina Garcia Santos', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('420.961.828-40', 'Gabriela Maria de Souza Amorim', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('463.757.708-07', 'Emelly Pereira Souza', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('466.574.718-07', 'Elivelton Pereira da Silva', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('483.929.788-62', 'sabrina da mata souza', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('492.812.448-02', 'Ingrid graciano Silva lobo ', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('492.980.022-89', 'Ryan dos santos', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('492.980.228-94', 'Ryan dos santos ', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('524.245.242-42', 'teste', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('574.754.908-15', 'Gilmar Frimário', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('745.457', 'Alex Santos', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('771.415.808-59', 'Irene Costa Gomes', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('915.646.858-68', 'José Antônio Vallentim de Souza', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', ''),
('950.099.735-53', 'Nedison Gricelidia dos Santos', '', '', '', '', '', '', NULL, 'está igual', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sim', '', '', '', '', 'Presente', '0', '0', 'presente', 'a tosse', 'Normal', 'Normal', 'Normal', 'Normal', '', '', '', '', 'presente', NULL, '', 'sem perdas', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ficha_uroginecologia`
--

CREATE TABLE `ficha_uroginecologia` (
  `fkcpf` varchar(50) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `queixa_prin_urogine` varchar(90) DEFAULT NULL,
  `antecedentes_pessoais_urogine` varchar(90) DEFAULT NULL,
  `antecedentes_cirurgicos_urogine` varchar(90) DEFAULT NULL,
  `antecedentes_familiares_urogine` varchar(90) DEFAULT NULL,
  `fase_de_enchimento_urogine` varchar(90) DEFAULT NULL,
  `fase_de_esvaziamento_urogine` varchar(90) DEFAULT NULL,
  `outros_fase_de_esvaziamento_urogine` varchar(90) DEFAULT NULL,
  `sensibilidade_fase_de_esvaziamento_urogine` varchar(90) DEFAULT NULL,
  `itu_fase_de_esvaziamento_urogine` varchar(90) DEFAULT NULL,
  `perdas_urogine` varchar(90) DEFAULT NULL,
  `outras_circunstancias_perdas_urogine` varchar(90) DEFAULT NULL,
  `perdas_durante_o_esforco_urogine` varchar(90) DEFAULT NULL,
  `outras_perdas_durante_o_esforco_urogine` varchar(90) DEFAULT NULL,
  `qualidade_da_perda_urinariao_urogine` varchar(90) DEFAULT NULL,
  `quanto_tempo_iniciou_os_sintomas_urogine` varchar(90) DEFAULT NULL,
  `quanto_tempo_demorou_para_procurar_ajuda_medica_urogine` varchar(90) DEFAULT NULL,
  `desde_que_comecaram_os_sintomas_o_seu_estado_urogine` varchar(90) DEFAULT NULL,
  `frequencia_urinaria_urogine` varchar(90) DEFAULT NULL,
  `protecoes_urogine` varchar(90) DEFAULT NULL,
  `numero_de_trocas_urogine` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

--
-- Extraindo dados da tabela `ficha_uroginecologia`
--

INSERT INTO `ficha_uroginecologia` (`fkcpf`, `nome`, `queixa_prin_urogine`, `antecedentes_pessoais_urogine`, `antecedentes_cirurgicos_urogine`, `antecedentes_familiares_urogine`, `fase_de_enchimento_urogine`, `fase_de_esvaziamento_urogine`, `outros_fase_de_esvaziamento_urogine`, `sensibilidade_fase_de_esvaziamento_urogine`, `itu_fase_de_esvaziamento_urogine`, `perdas_urogine`, `outras_circunstancias_perdas_urogine`, `perdas_durante_o_esforco_urogine`, `outras_perdas_durante_o_esforco_urogine`, `qualidade_da_perda_urinariao_urogine`, `quanto_tempo_iniciou_os_sintomas_urogine`, `quanto_tempo_demorou_para_procurar_ajuda_medica_urogine`, `desde_que_comecaram_os_sintomas_o_seu_estado_urogine`, `frequencia_urinaria_urogine`, `protecoes_urogine`, `numero_de_trocas_urogine`) VALUES
('222.222.2', 'Teste 2', 'Teste 2', 'Teste 2', 'Teste 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(35) NOT NULL,
  `remedios` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id`, `nome`, `telefone`, `email`, `remedios`) VALUES
(1, 'Pablo Silva', '(66) 66666-6666', 'pablo@hotmail.com', 'RemÃ©dios em geral');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
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
-- Extraindo dados da tabela `funcionarios`
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
(37, 'Gustavo', '641.464.562-15', '999999999', 'gustavo2@4wsites.com.br', 'Medico'),
(38, 'Murilo', '378765098412', '119999999999999', 'murilo@4wsites.com.br', 'Medico'),
(39, 'Gustavo Oliveira', '272.727.272-72', '(11) 11116-9999', 'medico@4wsites.com.br', 'Medico'),
(40, 'carol', '272.727.272-72', '1111116999999', 'ccc@gmail.com', 'Medico'),
(41, 'carol', '272.727.272-72', '1111116999999', 'ccc@gmail.com', 'Medico'),
(42, 'gustavo', '378.765.098-94', '(12) 12212-1212', 'medico2@4wsites.com.br', 'Medico'),
(43, 'Erika Campos', '123.456.789-10', '(11) 99996-2796', 'Erika@4wsites.com.br', 'Medico'),
(44, 'Suporte', '156.465.4', '(54) 64654-6', 'Suporte@4wsites.com', 'Medico');

-- --------------------------------------------------------

--
-- Estrutura da tabela `horarios`
--

CREATE TABLE `horarios` (
  `id` int(11) NOT NULL,
  `horario` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `horarios`
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
(32, '23:30:00'),
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
-- Estrutura da tabela `medicos`
--

CREATE TABLE `medicos` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `especialidade` varchar(30) DEFAULT NULL,
  `crm` varchar(20) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `turno` varchar(15) DEFAULT NULL,
  `consultorio` varchar(30) DEFAULT NULL,
  `novo` char(10) DEFAULT NULL,
  `nome_foto` varchar(50) DEFAULT NULL,
  `path_foto` varchar(100) DEFAULT NULL,
  `endereco_medico` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `medicos`
--

INSERT INTO `medicos` (`id`, `nome`, `especialidade`, `crm`, `cpf`, `telefone`, `email`, `turno`, `consultorio`, `novo`, `nome_foto`, `path_foto`, `endereco_medico`) VALUES
(33, 'Suporte', '1', '15156', '156.465.4', '(54) 64654-6', 'Suporte@4wsites.com', '', NULL, 'n', 'sem-foto.png', NULL, 'tsdeet'),
(34, 'Erika Cristina Pedros ', '1', 'crefito-3/ 276930-F', '296.827.078-89', '(11) 99210-6063', 'erikapedros@hotmail.com', NULL, NULL, 'n', 'sem-foto.png', NULL, 'fsaf'),
(36, 'Alex Santos', '1', '32424', '121.212.', '(44) 44444-4444', 'gustavo@teste6.com', NULL, NULL, 'n', 'sem-foto.png', NULL, ''),
(37, 'Espaço Vida ao Corpo', '1', '291609-F', '395.804.768-88', '(11) 99656-1291', 'e.vidaaocorpo@gmail.com', NULL, NULL, 'n', '1642020339892 (4).jpg', NULL, 'Av. Nossa Senhora das Vitórias, 256 - 1° andar');

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentacoes`
--

CREATE TABLE `movimentacoes` (
  `id` int(11) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `movimento` varchar(30) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `tesoureiro` varchar(20) NOT NULL,
  `data` date NOT NULL,
  `id_movimento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `movimentacoes`
--

INSERT INTO `movimentacoes` (`id`, `tipo`, `movimento`, `valor`, `tesoureiro`, `data`, `id_movimento`) VALUES
(38, 'Entrada', 'Consulta', '5.57', '', '2022-09-24', 67),
(39, 'Entrada', 'Consulta', '99999999.99', '', '2022-09-24', 68),
(40, 'Entrada', 'Consulta', '5.57', '', '2022-10-13', 74),
(41, 'Entrada', 'Consulta', '5.01', '', '2022-12-01', 101);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pacientes`
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
  `queixa_prin` varchar(50) DEFAULT NULL,
  `antecedentes_cirurgicos` varchar(50) DEFAULT NULL,
  `antecedentes_familiares` varchar(50) DEFAULT NULL,
  `medicacoes` varchar(50) DEFAULT NULL,
  `antecedentes_urologicos` varchar(50) DEFAULT NULL,
  `queixas_urinarias` varchar(50) DEFAULT NULL,
  `perdas_aos_esforcos` varchar(50) DEFAULT NULL,
  `perdas_esforcos` varchar(50) DEFAULT NULL,
  `circunstancias_das_perdas` varchar(50) DEFAULT NULL,
  `uso_de_protecao` varchar(50) NOT NULL,
  `funcao_sexual` varchar(50) DEFAULT NULL,
  `SHIM` varchar(50) DEFAULT NULL,
  `habitos_vida` varchar(50) DEFAULT NULL,
  `antecedentes_neurologicos` varchar(50) DEFAULT NULL,
  `consumo_liquidos` varchar(50) DEFAULT NULL,
  `cicatrizes` varchar(50) DEFAULT NULL,
  `trofismo_genital` varchar(50) DEFAULT NULL,
  `trofismo_mmii` varchar(50) NOT NULL,
  `contracao_voluntaria` varchar(50) DEFAULT NULL,
  `musculos_acessorios` varchar(50) DEFAULT NULL,
  `tonus_do_corpo_perinea` varchar(50) DEFAULT NULL,
  `tonus_do_eae` varchar(50) DEFAULT NULL,
  `tonus_de_mmii` varchar(50) DEFAULT NULL,
  `forca_muscular` varchar(50) DEFAULT NULL,
  `sensibilidade` varchar(50) NOT NULL,
  `pontos_dolorosos` varchar(50) DEFAULT NULL,
  `pergunta1_urologia` varchar(50) DEFAULT NULL,
  `pergunta2_urologia` varchar(50) DEFAULT NULL,
  `pergunta3_urologia` varchar(50) DEFAULT NULL,
  `pergunta4_urologia` varchar(50) DEFAULT NULL,
  `pergunta5_urologia` varchar(50) DEFAULT NULL,
  `sexo_identifica` varchar(50) DEFAULT NULL,
  `identidade_genero` varchar(50) DEFAULT NULL,
  `pronome_paciente` varchar(50) DEFAULT NULL,
  `antecedentes_pessoais` varchar(100) DEFAULT NULL,
  `tipos_queixa_urina` varchar(100) DEFAULT NULL,
  `uso_frequente` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `pacientes`
--

INSERT INTO `pacientes` (`id`, `nome`, `cpf`, `rg`, `telefone`, `email`, `data_nasc`, `idade`, `civil`, `sexo_nascimento`, `endereco`, `obs`, `medico_resp`, `peso`, `altura`, `imc`, `medico_old`, `tipo_cirurgia`, `queixa_prin`, `antecedentes_cirurgicos`, `antecedentes_familiares`, `medicacoes`, `antecedentes_urologicos`, `queixas_urinarias`, `perdas_aos_esforcos`, `perdas_esforcos`, `circunstancias_das_perdas`, `uso_de_protecao`, `funcao_sexual`, `SHIM`, `habitos_vida`, `antecedentes_neurologicos`, `consumo_liquidos`, `cicatrizes`, `trofismo_genital`, `trofismo_mmii`, `contracao_voluntaria`, `musculos_acessorios`, `tonus_do_corpo_perinea`, `tonus_do_eae`, `tonus_de_mmii`, `forca_muscular`, `sensibilidade`, `pontos_dolorosos`, `pergunta1_urologia`, `pergunta2_urologia`, `pergunta3_urologia`, `pergunta4_urologia`, `pergunta5_urologia`, `sexo_identifica`, `identidade_genero`, `pronome_paciente`, `antecedentes_pessoais`, `tipos_queixa_urina`, `uso_frequente`) VALUES
(79, 'teste', '524.245.242-42', '', '(11) 99996-2796', '', '0000-00-00', 0, 'Solteiro', NULL, '', '', 'Suporte', '', '', '', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', '', '', '', '', 'Gotejamento', ''),
(80, 'Jessica de Oliveira dos Santos', '232.399.348-84', '474526537', '(11) 93000-1117', 'oliveiras.jessica@yahoo.com.br', '1991-04-25', 31, 'Casado', NULL, '', 'Vaginismo (tratamento em 2021) agora gestante (preparação de parto)', 'Erika Cristina Pedros ', '', '', 'BP', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', 'Hetero', 'feminino', 'ela/dela', '', 'Gotejamento', ''),
(81, 'Erika Pedros', '296.827.078-89', '', '(11) 99210-6063', 'erikpedros@hotmail.com', '1982-05-18', 40, 'Solteiro', NULL, 'Rua Municipal, 507    Apt 13', '', 'Erika Cristina Pedros ', '', '', '', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', '', '', '', '', 'Gotejamento', ''),
(82, 'Roberto Alves Almeida', '124.457.858-47', '', '(11) 97222-0496', '', '1970-02-10', 52, 'Solteiro', NULL, '', '', 'Erika Cristina Pedros ', '', '', 'BP', 'Dr. Oséas', 'Prostatectomia Radical', 'Incontinência Urinária pós prostatectomia', '', '', '', '', 'Urgencia', 'pequenos', 'defasadas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', '', '', '', 'CA prostático', 'Gotejamento', ''),
(83, 'Walter Joaqueim', '049.591.168-20', '', '(11) 98504-1817', '', '1936-05-31', 86, 'Solteiro', NULL, '', '', 'Erika Cristina Pedros ', '', '', 'BP', '', 'Prostatectomia Radical', '', '', '', '', '', 'Urgencia', 'moderados', 'sincrônicas', '', 'fraldas', '', '5-7 Disfunção Erétil Grave', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', '', '', '', '', 'Gotejamento', ''),
(84, 'Rita de Cassia dos Santos Aguiar', '167.829.068-80', '236904899', '(11) 98162-2436', 'ritaaguiar636@gmail.com', '1974-02-16', 48, 'Casado', NULL, 'Rua São Pedro, 90 - Apto 164 - Diadema', 'Disfunção Postural ', 'Espaço Vida ao Corpo', '80', '156', 'BP', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', 'Hetero', '48', '', '', 'Gotejamento', ''),
(85, 'Claudinei alves dos santos junior ', '330.648.598-54', '', '(11) 94397-7885', 'claudineijunior@iclood.com', '1983-01-07', 40, 'Solteiro', NULL, 'rua riguete feitor 48- Apto 22A', '', 'Espaço Vida ao Corpo', '', '', '', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', 'hetero', '', '', '', 'Gotejamento', ''),
(86, 'Gabrielly Sousa silva', '230.469.998-79', '', '(11) 95428-7749', 'sousagabrielly26@gmail.com', '2002-04-12', 20, 'Solteiro', NULL, 'rua delfino facchina', '', 'Espaço Vida ao Corpo', '78', '1,60', '', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', 'hetero', '', 'ela', '', 'Gotejamento', ''),
(87, 'Aline da silva martins ziwian', '362.121.378-38', '', '(11) 98499-6259', 'alineziwian@gmail.com', '1988-10-21', 34, 'Casado', NULL, 'cursino 6485 ap 93 A ', '', 'Espaço Vida ao Corpo', '64', '1,59', '', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', 'hetero', 'feminino', '', '', 'Gotejamento', ''),
(88, 'Cristina Garcia Santos', '420.450.118-44', '488513650', '(11) 96226-1524', '', '1993-07-08', 29, 'Casado', NULL, 'Av alda, 623 - apto 13', 'Disfunção Postural + Condromalácia Patelar Bilateral', 'Espaço Vida ao Corpo', '', '', 'BP', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', 'Hetero', '30', '', '', 'Gotejamento', ''),
(89, 'Carlos Eduardo Carvalho Silva', '354.535.198-00', '', '(11) 97049-7975', '', '1988-02-05', 34, 'Solteiro', NULL, '', 'Fratura', 'Espaço Vida ao Corpo', '', '', 'BP', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', '', '', '', '', 'Gotejamento', ''),
(90, 'Elivelton Pereira da Silva', '466.574.718-07', '', '(11) 95441-7607', '', '1997-03-19', 25, 'Solteiro', NULL, 'Avenida Nossa Senhora das Graças', 'Lesão cronica de menisco lateral esquerdo', 'Espaço Vida ao Corpo', '', '', 'BP', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', '', '', '', '', 'Gotejamento', ''),
(91, 'Renata Alves de Lima', '360.161.408-13', '450027004', '(11) 96163-3700', '', '1988-09-21', 34, 'Solteiro', NULL, 'Avenida Dom Pedro I, 1219 - Vila Conceição - Diadema', 'Cervicalgia', 'Espaço Vida ao Corpo', '', '', 'BP', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', '', '', '', '', 'Gotejamento', ''),
(92, 'Mônica Aparecida Pego Beneti', '113.894.638-93', '283023570', '(11) 96249-9246', '', '1966-09-05', 56, 'Casado', NULL, 'Rua Cambará, 135 - Casa 04 - Campanario - Diadema', 'Fratura rádio distal D', 'Espaço Vida ao Corpo', '', '', '', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', '', '', '', '', 'Gotejamento', ''),
(93, 'Nedison Gricelidia dos Santos', '950.099.735-53', '', '(11) 98693-2797', '', '1979-12-04', 43, 'Casado', NULL, 'Rua Acácio, 205 - Campanário - Diadema', 'Abaulamento discal L4-L5 L5-S1', 'Espaço Vida ao Corpo', '', '', 'BP', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', '', '', '', '', 'Gotejamento', ''),
(94, 'Marlene Araújo Lula da Silva', '178.408.428-01', '', '(11) 98105-1313', 'marleneara@gmail.com', '1972-08-28', 50, 'Casado', NULL, '', 'IUE ', 'Erika Cristina Pedros ', '', '', 'BP', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', '', '', '', '', 'Gotejamento', ''),
(95, 'Pamela Gaspar Favacho ', '415.559.388-25', '', '(11) 94546-5833', 'favacho.pamela@gmail.com', '1992-12-22', 30, 'Solteiro', NULL, 'Rua das manjubas, 58', '', 'Espaço Vida ao Corpo', '', '', 'BP', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', '', '', '', '', 'Gotejamento', ''),
(96, 'Luciana Bezerra Peixoto', '140.621.158-32', '', '(11) 99396-6387', 'luciana.peixoto@hotmail.com', '1975-04-06', 47, 'Solteiro', NULL, 'Rua Biquara, 66 Eldorado Diadema', '', 'Espaço Vida ao Corpo', '', '', 'BP', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', '', '', '', '', 'Gotejamento', ''),
(97, 'Gabriela Maria de Souza Amorim', '420.961.828-40', '467683116', '(11) 95934-9424', '', '1995-02-28', 27, 'Solteiro', NULL, '', 'Dor cervical e torácica', 'Espaço Vida ao Corpo', '', '', 'BP', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', '', '', '', '', 'Gotejamento', ''),
(98, 'Fernanda Tomageski Chanquini', '252.788.418-00', '', '(11) 98912-2770', '', '1975-08-11', 47, 'Solteiro', NULL, 'Rua : Santo André 55 apto 74 Bloco B Centro-Santo André', '', 'Espaço Vida ao Corpo', '', '', 'BP', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', 'hetero', 'feminino', 'Ela', '', 'Gotejamento', ''),
(99, 'Rosivania Andrelina de Lima', '251.868.898-65', '284499560', '(11) 94030-9962', '', '1977-07-05', 45, 'Casado', NULL, 'Rua Bilac, 49 - Apto 351A', 'Urgência Miccional + Bexiga hiperativa', 'Espaço Vida ao Corpo', '', '', '', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', '', '', '', '', 'Gotejamento', ''),
(100, 'Irene Costa Gomes', '771.415.808-59', '69540469', '(11) 98219-5017', '', '1957-01-30', 65, 'Casado', NULL, 'Rua François Bunel, 306 - 04193-310', 'Artrose bilateral de joelhos + Incontinência urinária', 'Espaço Vida ao Corpo', '', '', 'BP', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', '', '', '', '', 'Gotejamento', ''),
(101, 'Daniele Alves Campos da Silva', '304.105.198-20', '443203350', '(11) 98787-7319', '', '1982-07-19', 40, 'Casado', NULL, 'Rua São Francisco de Assis, 131 - 09911-000', 'Lombalgia + Ansiedade', 'Espaço Vida ao Corpo', '', '', 'BP', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', '', '', '', '', 'Gotejamento', ''),
(102, 'Luciene Nobrega de Sousa', '116.450.438-00', '', '(11) 99751-5274', '', '1971-10-20', 51, 'Casado', NULL, 'Rua 21 de Abril, 91 - Vila Dirce - 09912-150', 'Alteração Postural', 'Espaço Vida ao Corpo', '', '', '', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', '', '', '', '', 'Gotejamento', ''),
(103, 'Nilma Maria Alves Bonfim', '068.967.648-48', '174263880', '(11) 96847-9788', '', '1966-06-06', 56, 'Casado', NULL, 'Rua Eça de Queiroz, 266 - 09931-040', 'Lombociatalgia D + Bursite Trocanterica B\r\nQP: Movimentar-se', 'Espaço Vida ao Corpo', '', '', 'BP', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', '', '', '', '', 'Gotejamento', ''),
(104, 'Regina Lucia Campos de Oliveira', '127.460.738-89', '', '(11) 99692-9890', '', '1969-03-28', 53, 'Casado', NULL, 'Rua Professor Evandro C. Esquivel, 235 - 09911-360', 'Lombalgia E', 'Espaço Vida ao Corpo', '', '', 'BP', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', '', '', '', '', 'Gotejamento', ''),
(105, 'Nayara moya rios do vale ', '364.706.208-17', '429992282', '(11) 96639-6639', '', '1988-04-27', 34, 'Solteiro', NULL, 'av bandeirantes apt 115', '', 'Espaço Vida ao Corpo', '', '', '', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', 'Hetero', '', '', '', 'Gotejamento', ''),
(106, 'Rose Rosa Rodrigues Monteiro ', '297.415.238-40', '', '(11) 97407-1780', 'roserorodrigues@hotmail.com', '1982-02-22', 40, 'Solteiro', NULL, 'R alfa, 241 0997-1640 ', '', 'Espaço Vida ao Corpo', '', '', 'BP', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', 'hetero ', '', 'ela ', '', 'Gotejamento', ''),
(107, 'Taeko sanommiya', '077.177.818-08', '1656324508', '(11) 98674-6488', '', '1964-06-26', 58, 'Solteiro', NULL, 'av sao jose 406 ', '', 'Espaço Vida ao Corpo', '', '', 'BP', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', 'hetero', 'faminino ', 'ela', '', 'Gotejamento', ''),
(108, 'Andreia Conceição Siqueira ', '276.088.818-52', '', '(11) 95441-7607', 'ddeia_siqueira@yahoo.com.br', '1979-07-17', 43, 'Casado', NULL, 'Rua Dr Gustavo da Veiga, 19 A - Vila Império - São Paulo-SP', '', 'Espaço Vida ao Corpo', '', '', 'BP', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', 'hetero', 'feminino', 'ela', '', 'Gotejamento', ''),
(109, 'Renata Soares', '289.273.678-12', '', '(11) 99835-6863', '', '1979-10-14', 43, 'Solteiro', NULL, 'Av Alda 858 AP 193 torre 2', '', 'Espaço Vida ao Corpo', '', '', 'BP', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', 'hetero', 'feminino', 'ela', '', 'Gotejamento', ''),
(110, 'Paula karina de oliveira da silva', '323.963.108-36', '', '(11) 97954-5313', 'pkoliveira@gmail.com', '1985-10-01', 37, 'Solteiro', NULL, 'Rua sao genaro 21 Diadema Centro ', '', 'Espaço Vida ao Corpo', '73kg', '1,67', 'BP', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', 'Hetero', 'Feminino', 'Ela', '', 'Gotejamento', ''),
(111, 'José Antomio Valentim ', '951.646.858-68', '', '(11) 99930-3097', '', '1953-05-05', 69, 'Casado', NULL, '', '', 'Erika Cristina Pedros ', '', '', '', 'Dr. Eder Gouveia', 'Prostatectomia Radical', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', '', '', '', '', 'Gotejamento', ''),
(112, 'ivanir medeiros ', '183.593.998-83', '', '(11) 98634-2709', '', '1953-11-10', 69, 'Casado', NULL, 'rua visconde ', '', 'Espaço Vida ao Corpo', '', '', 'BP', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', '', '', '', '', 'Gotejamento', ''),
(113, 'Nelcineia Viana Lipe', '267.902.838-46', '', '(11) 96121-0434', 'neia.lipe@hotmail.com', '1978-12-31', 44, 'Solteiro', NULL, 'Rua Marechal Deodoro 187 Centro -Diadema', '', 'Espaço Vida ao Corpo', '', '', 'BP', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', '', '', '', '', 'Gotejamento', ''),
(114, 'sabrina da mata souza', '483.929.788-62', '', '(11) 98796-0396', 'sabrina.damata13@gmail.com', '2002-12-15', 20, 'Solteiro', NULL, 'rua antonio pott n°91', '', 'Espaço Vida ao Corpo', '', '', 'BP', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', '', '', '', '', 'Gotejamento', ''),
(115, 'Patrícia Schinittd Teixeira Lemos ', '183.527.728-48', '', '(11) 95916-0916', 'patischinittd@gmail.com', '1979-09-21', 43, 'Solteiro', NULL, '', '', 'Espaço Vida ao Corpo', '', '', 'BP', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', '', 'Feminino ', 'Ela ', '', 'Gotejamento', ''),
(116, 'Rodrigo alves vicente ', '290.347.648-93', '34106885', '(11) 98283-8305', 'rodrigoalvesvicente@gmail.com', '1981-08-09', 41, 'Casado', NULL, 'Rua manoel da nobrega 454', '', 'Espaço Vida ao Corpo', '90', '1,76', 'BP', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', 'Hetero', 'Homem', 'Ele', '', 'Gotejamento', ''),
(117, 'Emelly Pereira Souza', '463.757.708-07', '', '(11) 97976-7655', 'emellysouza_@hotmail.com', '1997-12-17', 25, 'Solteiro', NULL, 'Rua Divino, 6', '', 'Espaço Vida ao Corpo', '', '', 'BP', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', 'hetero', 'feminino', 'ela', '', 'Gotejamento', ''),
(118, 'Marcus Vinicius Vieira', '013.578.708-41', '139866322', '(11) 99388-3615', 'femily.vieira21@gmail.com', '1960-02-15', 62, 'Casado', NULL, '', 'DE + EP', 'Erika Cristina Pedros ', '', '', '', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', 'Hetero', '', '', '', 'Gotejamento', ''),
(119, 'Ricardo Espigado', '182.456.568-2', '', '(11) 99622-1723', 'ricardoespigado@hotmail.com', '1975-05-07', 47, 'Solteiro', NULL, 'Frei Lourenço de Alcântara ', '', 'Espaço Vida ao Corpo', '', '', 'BP', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', '', '', '', '', 'Gotejamento', ''),
(120, 'Liliam candido corte', '327.523.648-22', '', '(11) 98264-7591', 'liliamcandidocorte@gmail.com', '1983-12-23', 39, 'Solteiro', NULL, 'Av alda 623', '', 'Espaço Vida ao Corpo', '', '', 'BP', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', 'Hetero', '', 'Ela', '', 'Gotejamento', ''),
(121, 'Anderson corte', '170.696.738-17', '', '(11) 99220-2471', '', '1973-12-16', 49, 'Solteiro', NULL, 'Rua coimbra 215', '', 'Espaço Vida ao Corpo', '', '', 'BP', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', 'Hetero', '', 'Ele', '', 'Gotejamento', ''),
(122, 'Ingrid graciano Silva lobo ', '492.812.448-02', '', '(11) 96068-1242', 'Ingridgracianosilva@gmail.com', '1999-06-24', 23, 'Solteiro', NULL, 'Rua Araraquara 240 apt 32 ', '', 'Espaço Vida ao Corpo', '', '', 'BP', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', 'hetero', 'feminino ', 'ela', '', 'Gotejamento', ''),
(123, 'Adriana de Jesus Santos', '194.381.278-01', '', '(11) 99964-7384', 'marmitinhasdri@gmail.com', '1977-06-28', 45, 'Solteiro', NULL, 'Rua Paris, 100, Centro Diadema, 09920-350', '', 'Espaço Vida ao Corpo', '', '', 'BP', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', 'hetero', 'feminino', 'ela', '', 'Gotejamento', ''),
(124, 'Andreia Aparecida de Abreu Carlos', '172.405.458-90', '', '(11) 96685-7089', 'andreiaabreu.40@gmail.com', '1973-07-31', 49, 'Casado', NULL, 'Rua Francisco Manoel da Silva, 224', '', 'Espaço Vida ao Corpo', '', '', 'BP', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', 'hetero', 'feminino ', 'ela ', '', 'Gotejamento', ''),
(125, 'Gilmar Frimário', '574.754.908-15', '', '', '', '1954-07-12', 68, 'Casado', NULL, '', '', 'Erika Cristina Pedros ', '', '', 'BP', '', '', '', '', '', '', '', 'Urgencia', 'pequenos', 'sincrônicas', '', 'Gotejamento', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Sim', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', 'Hetero', '', '', '', 'Gotejamento', ''),
(126, 'Teste 1', '111.111.1', 'Teste 1Teste 1Teste ', '(11) 1111', 'Teste 1Teste 1@Teste 1Teste 1', '1988-02-02', 35, 'Solteiro', NULL, 'Teste 1', 'Teste 1', 'Suporte', 'Teste 1', 'Teste 1Teste 1', 'BP', 'Teste 1', 'Teste 1', '', '', '', '', '', 'Não se aplica', 'Não se aplica', 'Não se aplica', '', 'nenhum', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Não se aplica', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', 'Teste 1', '', 'Teste 1', '', 'Não se aplica', ''),
(127, 'Teste 2', '222.222.2', '', '(22) 2222', 'Teste 2@Teste 2Teste 2', '1958-04-10', 64, 'Solteiro', NULL, 'Teste 2Teste 2', 'Teste 2', 'Suporte', 'Teste 2', 'Teste 2', 'BP', 'Teste 2', 'Teste 2', '', '', '', '', '', 'Não se aplica', 'Não se aplica', 'Não se aplica', '', 'nenhum', '', '22-25 Sem Disfunção Eréti', '', NULL, 'Não se aplica', '', '', '', 'Presente', 'Abdominais', 'Normal', 'Normal', 'Normal', '', '', '', 'Muito Baixa', 'Quase nunca ou nunca', 'Quase nunca ou nunca', 'Extremamente difícil', 'Quase nunca ou nunca', 'Teste 2', '', 'Teste 2', '', 'Não se aplica', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos`
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
-- Estrutura da tabela `prescricao`
--

CREATE TABLE `prescricao` (
  `id` int(11) NOT NULL,
  `id_consulta` int(11) NOT NULL,
  `item` varchar(500) NOT NULL,
  `remedio` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `receitas`
--

CREATE TABLE `receitas` (
  `id` int(11) NOT NULL,
  `id_consulta` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `remedio` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `recepcionistas`
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
-- Extraindo dados da tabela `recepcionistas`
--

INSERT INTO `recepcionistas` (`id`, `nome`, `cpf`, `telefone`, `email`, `turno`) VALUES
(1, 'Gomes Silva', '444.444.444-44', '(44) 44444-4444', 'gomes@hotmail.com', 'ManhÃ£');

-- --------------------------------------------------------

--
-- Estrutura da tabela `remedios`
--

CREATE TABLE `remedios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `estoque` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `responsaveis`
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
-- Estrutura da tabela `saidas_remedios`
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
-- Estrutura da tabela `tesoureiros`
--

CREATE TABLE `tesoureiros` (
  `id` int(11) NOT NULL,
  `nome` varchar(35) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `turno` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `tesoureiros`
--

INSERT INTO `tesoureiros` (`id`, `nome`, `cpf`, `telefone`, `email`, `turno`) VALUES
(1, 'Allan Machado', '666.666.666-66', '(55) 55555-5555', 'alan@hotmail.com', 'Tarde'),
(2, 'Diego Campos', '999.999.999-93', '(99) 99999-9999', 'tesoureiro@hotmail.com', 'Manhã');

-- --------------------------------------------------------

--
-- Estrutura da tabela `triagens`
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
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `senha_original` varchar(25) NOT NULL,
  `nivel` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha`, `senha_original`, `nivel`) VALUES
(54, 'Tela', 'tela@tela', 'c6f057b86584942e415435ffb1fa93d4', '000', 'Tela'),
(61, 'Diego Campos', 'tesoureiro@4wsites.com.br', '202cb962ac59075b964b07152d234b70', '123', 'Tesoureiro'),
(70, 'Gustavo', 'admin', '202cb962ac59075b964b07152d234b70', '123', 'admin'),
(268, 'Suporte', 'Suporte@4wsites.com', '202cb962ac59075b964b07152d234b70', '123', 'Medico'),
(272, 'Erika Cristina Pedros ', 'erikapedros@hotmail.com', '872592f305ab665df7d08f489849ec9e', 'rafa141518', 'Medico'),
(285, 'Alex Santos', 'gustavo@teste6.com', '202cb962ac59075b964b07152d234b70', '123', 'Medico'),
(286, 'TESTE', 'pacienete@gmail.com', '374d4fd0564ae623e870a2857be53641', 'pacienete@gmail.com', 'Paciente'),
(287, 'Espaço Vida ao Corpo', 'e.vidaaocorpo@gmail.com', '7008c6aa97f01933b41e8ce4cf6df6cf', 'fisioepilates12', 'Medico'),
(288, 'Marcus Vinicius Vieira', 'femely.vieira21@gmail.com', '1217fdfd1949c373c2b56f1ae24eb7ae', 'femely.vieira21@gmail.com', 'Paciente'),
(289, 'Marcus Vinicius Vieira ', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 'Paciente'),
(290, 'Marcus Vinicius Vieira ', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 'Paciente'),
(291, 'Adriana de Jesus Santos', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 'Paciente'),
(292, 'Ryan dos santos', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 'Paciente'),
(293, 'Ryan dos santos ', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 'Paciente'),
(294, 'aline da silva martins ziwian', 'alineziwian@gmail.com', 'dec0320734c4057797a5123614d134d7', 'alineziwian@gmail.com', 'Paciente'),
(295, 'Maria joselira f de Oliveira', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 'Paciente'),
(296, 'Cristina Garcia Santos', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 'Paciente'),
(297, 'Carolina Sanchez', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 'Paciente'),
(298, 'Carolina Sanchez', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 'Paciente'),
(299, 'Carlos Eduardo Carvalho Silva', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 'Paciente'),
(300, 'Carolina Sanchez', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 'Paciente'),
(301, 'Elivelton Pereira da Silva', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 'Paciente'),
(302, 'Eder Barbosa da Silva', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 'Paciente'),
(303, 'Renata Alves de Lima', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 'Paciente'),
(304, 'Mônica Aparecida Pego Beneti', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 'Paciente'),
(305, 'Mônica Aparecida Pego Beneti', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 'Paciente'),
(306, 'Nedison Gricelidia dos Santos', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 'Paciente'),
(307, 'Marlene Araújo Lula da Silva', 'marleneara@gmail.com', 'eb8d37fffe88190671dbb2f8c3d081c8', 'marleneara@gmail.com', 'Paciente'),
(308, 'Novo', 'teste', '698dc19d489c4e4db73e28a713eab07b', 'teste', 'Paciente'),
(309, 'Pamela Gaspar Favacho ', 'favacho.pamela@gmail.com', '26047a36a1b90df96da8781e1c4128ce', 'favacho.pamela@gmail.com', 'Paciente'),
(310, 'Gabriela Maria de Souza Amorim', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 'Paciente'),
(311, 'Fernanda Tomageski Chanquini', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 'Paciente'),
(312, 'Rosivania Andrelina de Lima', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 'Paciente'),
(313, 'Irene Costa Gomes', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 'Paciente'),
(314, 'Daniele Alves Campos da Silva', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 'Paciente'),
(315, 'Luciene Nobrega de Sousa', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 'Paciente'),
(316, 'Nilma Maria Alves Bonfim', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 'Paciente'),
(317, 'nayara moya rios do vale ', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 'Paciente'),
(318, 'Taeko sanommiya', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 'Paciente'),
(319, 'Renata Soares', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 'Paciente'),
(320, 'José Antomio Valentim ', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 'Paciente'),
(321, 'ivanir medeiros ', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 'Paciente'),
(322, 'Nelcineia Viana Lipe', 'neia.lipe@hotmail.com', '28b1a94092762ca5355d0b898991c356', 'neia.lipe@hotmail.com', 'Paciente'),
(323, 'Emelly Pereira Souza', 'emellysouza_@hotmail.com', '9acbadb438b681d65f19322ff85a860f', 'emellysouza_@hotmail.com', 'Paciente'),
(324, 'Marcus Vinicius Vieira', 'femily.vieira21@gmail.com', 'f54bac857b40d22d699e8e3957a2457d', 'femily.vieira21@gmail.com', 'Paciente'),
(325, 'Anderson corte', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 'Paciente'),
(326, 'Adriana de Jesus Santos', 'marmitinhasdri@gmail.com', '5f5386b9d60fca9a36176fe1477bde8c', 'marmitinhasdri@gmail.com', 'Paciente'),
(327, 'Gilmar Frimário', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 'Paciente'),
(328, 'Teste 2', 'Teste 2@Teste 2Teste 2', 'dc6695aa38ae2db116c27fe5d2e2f3b8', 'Teste 2@Teste 2Teste 2', 'Paciente');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `atendimentos`
--
ALTER TABLE `atendimentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `chamadas`
--
ALTER TABLE `chamadas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `contas_receber`
--
ALTER TABLE `contas_receber`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `entradas_remedios`
--
ALTER TABLE `entradas_remedios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `especializacoes`
--
ALTER TABLE `especializacoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `exercicios`
--
ALTER TABLE `exercicios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `exercicios_pacientes`
--
ALTER TABLE `exercicios_pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `ficha_proctologia`
--
ALTER TABLE `ficha_proctologia`
  ADD PRIMARY KEY (`fkcpf`);

--
-- Índices para tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `movimentacoes`
--
ALTER TABLE `movimentacoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `prescricao`
--
ALTER TABLE `prescricao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `receitas`
--
ALTER TABLE `receitas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `recepcionistas`
--
ALTER TABLE `recepcionistas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `remedios`
--
ALTER TABLE `remedios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `responsaveis`
--
ALTER TABLE `responsaveis`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `saidas_remedios`
--
ALTER TABLE `saidas_remedios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tesoureiros`
--
ALTER TABLE `tesoureiros`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `triagens`
--
ALTER TABLE `triagens`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `atendimentos`
--
ALTER TABLE `atendimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de tabela `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT de tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `contas_receber`
--
ALTER TABLE `contas_receber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT de tabela `entradas_remedios`
--
ALTER TABLE `entradas_remedios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `especializacoes`
--
ALTER TABLE `especializacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `exercicios`
--
ALTER TABLE `exercicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `exercicios_pacientes`
--
ALTER TABLE `exercicios_pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de tabela `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de tabela `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `movimentacoes`
--
ALTER TABLE `movimentacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de tabela `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT de tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `prescricao`
--
ALTER TABLE `prescricao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `receitas`
--
ALTER TABLE `receitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `recepcionistas`
--
ALTER TABLE `recepcionistas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `remedios`
--
ALTER TABLE `remedios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `responsaveis`
--
ALTER TABLE `responsaveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `saidas_remedios`
--
ALTER TABLE `saidas_remedios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tesoureiros`
--
ALTER TABLE `tesoureiros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `triagens`
--
ALTER TABLE `triagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=329;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
