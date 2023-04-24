DROP TABLE IF EXISTS atendimentos;

CREATE TABLE `atendimentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(60) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `email_med` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



DROP TABLE IF EXISTS cargos;

CREATE TABLE `cargos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO cargos VALUES("1","Medico");
INSERT INTO cargos VALUES("2","Farmaceutico");
INSERT INTO cargos VALUES("3","Faxineira");
INSERT INTO cargos VALUES("4","Tesoureiro");
INSERT INTO cargos VALUES("5","Enfermeira");
INSERT INTO cargos VALUES("6","Balconista");
INSERT INTO cargos VALUES("7","Caixa");
INSERT INTO cargos VALUES("8","Recepcionista");


DROP TABLE IF EXISTS chamadas;

CREATE TABLE `chamadas` (
  `id` int(11) NOT NULL,
  `paciente` varchar(40) NOT NULL,
  `consultorio` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



DROP TABLE IF EXISTS consultas;

CREATE TABLE `consultas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `receita` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=178 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



DROP TABLE IF EXISTS contas_pagar;

CREATE TABLE `contas_pagar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(40) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `vencimento` date NOT NULL,
  `pagamento` date DEFAULT NULL,
  `pago` varchar(5) NOT NULL,
  `funcionario` varchar(20) NOT NULL,
  `foto` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



DROP TABLE IF EXISTS contas_receber;

CREATE TABLE `contas_receber` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `vencimento` date NOT NULL,
  `data_baixa` date DEFAULT NULL,
  `forma_pgto` varchar(25) DEFAULT NULL,
  `tipo_pgto` varchar(30) DEFAULT NULL,
  `paciente` varchar(30) DEFAULT NULL,
  `tesoureiro` varchar(30) DEFAULT NULL,
  `id_consulta` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=170 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



DROP TABLE IF EXISTS entradas_remedios;

CREATE TABLE `entradas_remedios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `remedio` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `fornecedor` int(11) NOT NULL,
  `farmaceutico` varchar(20) NOT NULL,
  `nome_remedio` varchar(100) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



DROP TABLE IF EXISTS especializacoes;

CREATE TABLE `especializacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



DROP TABLE IF EXISTS exercicios;

CREATE TABLE `exercicios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_exercicio` varchar(300) NOT NULL,
  `des_exercicio` varchar(300) NOT NULL,
  `arquivo_exercicio` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO exercicios VALUES("1","Adução de quadril","Paciente em ortostatismo (em pé) com MMII lateralizados. Realizar agachamento jogando bumbum para trás e levemente o tronco para frente, na subida elevar uma das pernas alternadamente.","Exercicio-1.gif");
INSERT INTO exercicios VALUES("2","Glúteos,  coordenação e estabilização de tronco associado a MMII e MMSS","Paciente em posição de 4 apoios (joelhos e mãos apoiados), elevar e esticar perna esquerda com braço direito e perna direita com braço esquerdo alternadamente.","Exercicio-2.gif");
INSERT INTO exercicios VALUES("3","Agachamento","Paciente em ortostatismo (em pé) com MMII lateralizados. Realizar agachamento jogando o bumbum para trás e levemente o tronco para frente e retorna a posição inicial.","Exercicio-3.gif");
INSERT INTO exercicios VALUES("4","Adução de quadril","Paciente em decúbito lateral (deitado de lado) realizar elevação de MI.","Exercicio-4.gif");
INSERT INTO exercicios VALUES("5","Afundo","Paciente com posição inicial ortostática, realizar agachamento unilateral descendo com uma das pernas e joelho quase tocando ao chão. (Alternar)","Exercicio-5.gif");
INSERT INTO exercicios VALUES("6","Elevação de glúteos","Paciente em posição de 4 apoios (joelhos e mãos apoiados) elevar MI com joelho dobrado (sem esticar) alternadamente.","Exercicio-6.gif");
INSERT INTO exercicios VALUES("7","Abdômen e resistência","Paciente em decúbito dorsal (barriga para cima) dobrar os joelhos a 45° pés alto, esticar e dobrar MMII","Exercicio-7.gif");
INSERT INTO exercicios VALUES("8","Elevação de glúteos","Paciente em posição de 4 apoios (joelhos e mãos apoiados) elevar MI com joelho dobrado (sem esticar) alternadamente.","Exercicio-8.gif");
INSERT INTO exercicios VALUES("9","Elevação Pélvica","Paciente em decúbito dorsal (barriga para cima), mãos ao lado do quadril, joelhos dobrados e pé no chão.  Realizar o movimento de elevação do quadril.","Exercicio-9.gif");
INSERT INTO exercicios VALUES("10","Elevação de glúteos","Paciente em posição de 4 apoios (joelhos e mãos apoiados) elevar MI esticando o joelho e retornando a posição inicial, alternadamente","Exercicio-10.gif");
INSERT INTO exercicios VALUES("11","Agachamento","Paciente em ortostatismo (em pé) com MMII lateralizados, co  pés apontados para fora. \nRealizar agachamento jogando o bumbum para trás e levemente o tronco para frente e retorna a posição inicial.","Exercicio-11.gif");
INSERT INTO exercicios VALUES("12","Assoalho Pélvico.","Contração e relaxamento.","Exercicio-12.gif");
INSERT INTO exercicios VALUES("13","Prancha com extensão de MMSS","Paciente em prono, apoiar dedos dos pés e mãos no chão, iniciar descida com cotovelos com braços alternados, e estender novamente, retornando a posição inicial","Exercicio-13.gif");
INSERT INTO exercicios VALUES("14","Elevação de MMSS a partir de 180°","Elevação de MMSS a partir de 180° com mãos viradas para cima. Elevar MMSS acima da cabeça em sincronia.","Exercicio-14.gif");
INSERT INTO exercicios VALUES("15","Flexão de MMSS com apoios de joelho","Posição prono e MMSS flexionados com as mãos em paralelo ao tronco, realizar extensão e Flexão de cotovelos","Exercicio-15.gif");
INSERT INTO exercicios VALUES("16","Flexão de MMSS com apoio da parede","Nas pontas dos pés, mãos apoiados na parece (com a distância dos braços), realizar a Flexão e extensão dos cotovelos (mãos na altura dos ombros).","Exercicio-16.gif");
INSERT INTO exercicios VALUES("17","Flexão de MMSS sem apoios de joelho","Posição prono e MMSS flexionados com as mãos em paralelo ao tronco, realizar extensão e Flexão de cotovelos","Exercicio-17.gif");
INSERT INTO exercicios VALUES("18","Triceps na cadeira","De costas para a cadeira, posicionar as mãos em apoio para realizar flexão e extensão de MMSS de forma que os joelhos não participem da ação, apenas com apoio.","Exercicio-18.gif");
INSERT INTO exercicios VALUES("19","Flexão de MMSS com apoio de um banco ou cadeira a 45","Nas pontas dos pés, mãos apoiados na parece (com a distância dos braços), realizar a Flexão e extensão dos cotovelos (mãos na altura dos ombros)","Exercicio-19.gif");
INSERT INTO exercicios VALUES("20","Equilíbrio, coordenação e força de CORE","Em posição inicial em prancha, realizar elevação de MI e MS em sincronia e alternadamente (nível alto de dificuldade,  começar com posição e aos poucos evoluir para elevação de membros","Exercicio-20.gif");
INSERT INTO exercicios VALUES("29","Descanso","Faça um descanso entre os exercícios.","Exercicio-21.gif");


DROP TABLE IF EXISTS exercicios_pacientes;

CREATE TABLE `exercicios_pacientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_exercicio` varchar(300) NOT NULL,
  `repeticoes` varchar(50) DEFAULT NULL,
  `series` varchar(90) DEFAULT NULL,
  `obs` varchar(90) DEFAULT NULL,
  `id_paciente` int(30) DEFAULT NULL,
  `id_medico` int(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



DROP TABLE IF EXISTS ficha_proctologia;

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
  `afa_proc` varchar(90) DEFAULT NULL,
  `perfect_proc` varchar(50) DEFAULT NULL,
  `elasticidade_proc` varchar(50) DEFAULT NULL,
  `coordenacao_proc` varchar(50) DEFAULT NULL,
  `relaxamento_do_pr_a_manobra_de_evacuacao_proc` varchar(50) DEFAULT NULL,
  `pontos_dolorosos_proc` varchar(50) DEFAULT NULL,
  `teste_de_esforco_proc` varchar(50) DEFAULT NULL,
  `reflexo_clitoriano_bulbocavernoso_proc` varchar(50) DEFAULT NULL,
  `reflexo_ceigel_cremasterico` varchar(50) DEFAULT NULL,
  `marcha_proc` varchar(50) DEFAULT NULL,
  `outros_dados_proc` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`fkcpf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

INSERT INTO ficha_proctologia VALUES("111.111.111-11","Teste 1",NULL,NULL,NULL,NULL,NULL,NULL,NULL,"está igual",NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,"Sim",NULL,NULL,NULL,NULL,"Presente",NULL,NULL,"presente","a tosse","Normal","Normal","Normal","Normal",NULL,NULL,NULL,NULL,"presente",NULL,NULL,"sem perdas",NULL,NULL,NULL,NULL);


DROP TABLE IF EXISTS ficha_uroginecologia;

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
  `numero_de_trocas_urogine` varchar(90) DEFAULT NULL,
  PRIMARY KEY (`fkcpf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

INSERT INTO ficha_uroginecologia VALUES("111.111.111-11","Teste 1",NULL,NULL,NULL,NULL,"urgencia","hesitacao",NULL,NULL,NULL,"Não se aplica",NULL,"Não se aplica",NULL,NULL,NULL,NULL,"Não se aplica",NULL,"Não se aplica",NULL);


DROP TABLE IF EXISTS fornecedores;

CREATE TABLE `fornecedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(35) NOT NULL,
  `remedios` varchar(350) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



DROP TABLE IF EXISTS funcionarios;

CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(35) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `cargo` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO funcionarios VALUES("3","Kamila Santos","555.555.566-65","(66) 66666-6666","kamila@hotmail.com","Balconista");
INSERT INTO funcionarios VALUES("4","Marilio Antonio","555.556.666-66","(33) 33333-3333","marilio@hotmail.com","FarmÃ¡ceutico");
INSERT INTO funcionarios VALUES("5","Gabriel Silva","444.444.444-44","(44) 44444-4444","gabriel@hotmail.com","FarmÃ¡ceutico");
INSERT INTO funcionarios VALUES("6","Marta Campos","555.555.555-56","(66) 66666-6666","marta@hotmail.com","Enfermeira");
INSERT INTO funcionarios VALUES("7","AmÃ©lia Silva","777.777.899-55","(22) 22222-2222","amelia@hotmail.com","Faxineira");
INSERT INTO funcionarios VALUES("8","Marcos Silva","111.111.111-11","(66) 66666-6666","marcos@hotmail.com","Recepcionista");
INSERT INTO funcionarios VALUES("11","Gomes Silva","444.444.444-44","(44) 44444-4444","gomes@hotmail.com","Recepcionista");
INSERT INTO funcionarios VALUES("12","Allan Machado","666.666.666-66","(55) 55555-5555","alan@hotmail.com","Tesoureiro");
INSERT INTO funcionarios VALUES("13","Diego Campos","999.999.999-93","(99) 99999-9999","tesoureiro@4wsites.com.br","Tesoureiro");
INSERT INTO funcionarios VALUES("44","Suporte","156.465.4","(54) 64654-6","Suporte@4wsites.com","Medico");


DROP TABLE IF EXISTS horarios;

CREATE TABLE `horarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `horario` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO horarios VALUES("1","07:00:00");
INSERT INTO horarios VALUES("2","07:30:00");
INSERT INTO horarios VALUES("3","08:00:00");
INSERT INTO horarios VALUES("4","08:30:00");
INSERT INTO horarios VALUES("5","09:00:00");
INSERT INTO horarios VALUES("6","09:30:00");
INSERT INTO horarios VALUES("7","10:00:00");
INSERT INTO horarios VALUES("8","10:30:00");
INSERT INTO horarios VALUES("9","11:00:00");
INSERT INTO horarios VALUES("10","11:30:00");
INSERT INTO horarios VALUES("11","13:00:00");
INSERT INTO horarios VALUES("12","13:30:00");
INSERT INTO horarios VALUES("13","14:00:00");
INSERT INTO horarios VALUES("14","14:30:00");
INSERT INTO horarios VALUES("15","15:00:00");
INSERT INTO horarios VALUES("16","15:30:00");
INSERT INTO horarios VALUES("17","16:00:00");
INSERT INTO horarios VALUES("18","16:30:00");
INSERT INTO horarios VALUES("19","17:00:00");
INSERT INTO horarios VALUES("21","17:30:00");
INSERT INTO horarios VALUES("22","18:00:00");
INSERT INTO horarios VALUES("23","19:00:00");
INSERT INTO horarios VALUES("24","19:30:00");
INSERT INTO horarios VALUES("25","20:00:00");
INSERT INTO horarios VALUES("26","20:30:00");
INSERT INTO horarios VALUES("27","21:00:00");
INSERT INTO horarios VALUES("28","21:30:00");
INSERT INTO horarios VALUES("29","22:00:00");
INSERT INTO horarios VALUES("30","22:30:00");
INSERT INTO horarios VALUES("31","23:00:00");
INSERT INTO horarios VALUES("32","12:30:00");
INSERT INTO horarios VALUES("33","00:00:00");
INSERT INTO horarios VALUES("34","00:30:00");
INSERT INTO horarios VALUES("35","01:00:00");
INSERT INTO horarios VALUES("36","01:30:00");
INSERT INTO horarios VALUES("37","02:00:00");
INSERT INTO horarios VALUES("38","02:30:00");
INSERT INTO horarios VALUES("39","22:30:00");
INSERT INTO horarios VALUES("40","03:00:00");
INSERT INTO horarios VALUES("41","23:30:00");
INSERT INTO horarios VALUES("42","03:30:00");
INSERT INTO horarios VALUES("43","04:00:00");
INSERT INTO horarios VALUES("44","04:30:00");
INSERT INTO horarios VALUES("45","05:00:00");
INSERT INTO horarios VALUES("46","05:30:00");
INSERT INTO horarios VALUES("47","06:00:00");
INSERT INTO horarios VALUES("48","06:30:00");


DROP TABLE IF EXISTS medicos;

CREATE TABLE `medicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) DEFAULT NULL,
  `especialidade` varchar(30) DEFAULT NULL,
  `crm` varchar(20) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `consultorio` varchar(30) DEFAULT NULL,
  `novo` char(10) DEFAULT NULL,
  `nome_foto` varchar(50) DEFAULT NULL,
  `path_foto` varchar(100) DEFAULT NULL,
  `endereco_medico` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



DROP TABLE IF EXISTS movimentacoes;

CREATE TABLE `movimentacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(15) NOT NULL,
  `movimento` varchar(30) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `tesoureiro` varchar(20) NOT NULL,
  `cpf_paciente` varchar(250) NOT NULL,
  `data` date NOT NULL,
  `id_movimento` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



DROP TABLE IF EXISTS pacientes;

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `uso_frequente` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=152 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



DROP TABLE IF EXISTS pagamentos;

CREATE TABLE `pagamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `funcionario` varchar(35) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `tesoureiro` varchar(35) NOT NULL,
  `data` date NOT NULL,
  `nome_funcionario` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



DROP TABLE IF EXISTS prescricao;

CREATE TABLE `prescricao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_consulta` int(11) NOT NULL,
  `data_evolucao` date NOT NULL,
  `evolucao` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



DROP TABLE IF EXISTS receitas;

CREATE TABLE `receitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_consulta` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `remedio` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



DROP TABLE IF EXISTS recepcionistas;

CREATE TABLE `recepcionistas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(35) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `turno` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO recepcionistas VALUES("1","Gomes Silva","444.444.444-44","(44) 44444-4444","gomes@hotmail.com","ManhÃ£");


DROP TABLE IF EXISTS remedios;

CREATE TABLE `remedios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `estoque` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



DROP TABLE IF EXISTS responsaveis;

CREATE TABLE `responsaveis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paciente` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `data_nasc` date NOT NULL,
  `cpf` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



DROP TABLE IF EXISTS saidas_remedios;

CREATE TABLE `saidas_remedios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `remedio` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `funcionario` int(11) NOT NULL,
  `farmaceutico` varchar(20) NOT NULL,
  `nome_remedio` varchar(100) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



DROP TABLE IF EXISTS tesoureiros;

CREATE TABLE `tesoureiros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(35) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO tesoureiros VALUES("1","Allan Machado","666.666.666-66","(55) 55555-5555","alan@hotmail.com");
INSERT INTO tesoureiros VALUES("2","Diego Campos","999.999.999-93","(99) 99999-9999","tesoureiro@hotmail.com");


DROP TABLE IF EXISTS triagens;

CREATE TABLE `triagens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paciente` int(11) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `obs` longtext NOT NULL,
  `urgencia` varchar(50) NOT NULL,
  `finalizada` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



DROP TABLE IF EXISTS usuarios;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `senha_original` varchar(25) NOT NULL,
  `nivel` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=355 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO usuarios VALUES("54","Tela","tela@tela","c6f057b86584942e415435ffb1fa93d4","000","Tela");
INSERT INTO usuarios VALUES("61","Diego Campos","tesoureiro@4wsites.com.br","202cb962ac59075b964b07152d234b70","123","Tesoureiro");
INSERT INTO usuarios VALUES("70","Gustavo","gustavo@4wsites.com.br","202cb962ac59075b964b07152d234b70","123","admin");
INSERT INTO usuarios VALUES("268","Suporte","Suporte@4wsites.com","202cb962ac59075b964b07152d234b70","123","Medico");


