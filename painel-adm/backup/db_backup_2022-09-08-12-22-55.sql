DROP TABLE IF EXISTS atendimentos;

CREATE TABLE `atendimentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(60) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO atendimentos VALUES("1","Consulta Pediatra","120.00");
INSERT INTO atendimentos VALUES("2","Exame","60.00");
INSERT INTO atendimentos VALUES("3","Cirúrgia Estética","2500.00");


DROP TABLE IF EXISTS cargos;

CREATE TABLE `cargos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO cargos VALUES("1","Balconista");
INSERT INTO cargos VALUES("2","Caixa");
INSERT INTO cargos VALUES("3","Faxineira");
INSERT INTO cargos VALUES("4","Enfermeira");
INSERT INTO cargos VALUES("7","Recepcionista");
INSERT INTO cargos VALUES("8","Tesoureiro");
INSERT INTO cargos VALUES("10","MÃ©dico");
INSERT INTO cargos VALUES("11","FarmÃ¡ceutico");


DROP TABLE IF EXISTS chamadas;

CREATE TABLE `chamadas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paciente` varchar(40) NOT NULL,
  `consultorio` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO chamadas VALUES("1","Pablo Silva","105","Aguardando");


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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

INSERT INTO consultas VALUES("1","0000-00-00","00:00:00","2","3",NULL,"2500.00","Sim",NULL,NULL,NULL,NULL);
INSERT INTO consultas VALUES("2","2020-03-17","12:00:00","1","1","2","120.00","Sim",NULL,NULL,NULL,NULL);
INSERT INTO consultas VALUES("3","2020-03-17","18:00:00","2","2","2","60.00","Sim","Finalizada",NULL,NULL,NULL);
INSERT INTO consultas VALUES("4","2020-03-17","19:00:00","2","1","2","120.00","Sim",NULL,NULL,NULL,NULL);
INSERT INTO consultas VALUES("5","2020-03-19","15:00:00","4","1","2","120.00","Sim","Finalizada",NULL,NULL,NULL);
INSERT INTO consultas VALUES("6","2020-03-19","12:00:00","3","2","2","60.00","Sim","Aguardando",NULL,NULL,NULL);
INSERT INTO consultas VALUES("7","2020-03-19","14:00:00","4","1","2","120.00","Sim","Aguardando",NULL,NULL,NULL);
INSERT INTO consultas VALUES("8","2020-03-19","16:00:00","4","2","2","60.00","Sim","Aguardando",NULL,NULL,NULL);
INSERT INTO consultas VALUES("9","2020-03-19","08:00:00","2","1","2","120.00","Sim","Aguardando",NULL,NULL,NULL);
INSERT INTO consultas VALUES("10","2020-03-19","16:00:00","2","2","1","60.00","Sim","Aguardando",NULL,NULL,NULL);
INSERT INTO consultas VALUES("11","2020-03-19","11:00:00","1","1","1","120.00","Sim","Aguardando",NULL,NULL,NULL);
INSERT INTO consultas VALUES("12","2020-03-19","18:00:00","3","1","1","120.00","Sim","Aguardando",NULL,NULL,NULL);
INSERT INTO consultas VALUES("13","2020-03-19","11:00:00","3","2","2","60.00","NÃ£o",NULL,NULL,NULL,NULL);
INSERT INTO consultas VALUES("14","2020-03-23","15:00:00","1","3","2","2500.00","Sim","Finalizada",NULL,NULL,NULL);
INSERT INTO consultas VALUES("15","2020-03-23","12:00:00","3","1","1","120.00","Sim","Finalizada",NULL,NULL,NULL);
INSERT INTO consultas VALUES("16","2020-03-23","15:00:00","4","1","1","120.00","Sim","Finalizada",NULL,NULL,NULL);
INSERT INTO consultas VALUES("17","2020-03-23","11:00:00","2","1","2","120.00","Sim","Aguardando","6",NULL,NULL);
INSERT INTO consultas VALUES("18","2020-03-23","14:00:00","2","3","2","2500.00","Não",NULL,NULL,NULL,NULL);
INSERT INTO consultas VALUES("19","2020-03-23","13:00:00","4","3","2","2500.00","Sim","Aguardando",NULL,NULL,NULL);
INSERT INTO consultas VALUES("20","2020-03-23","13:00:00","4","1","1","120.00","Sim","Consultando",NULL,NULL,NULL);
INSERT INTO consultas VALUES("21","2020-03-23","18:00:00","1","1","1","120.00","Sim","Aguardando","6",NULL,NULL);
INSERT INTO consultas VALUES("22","2020-03-24","14:00:00","1","1","2","120.00","Sim","Aguardando",NULL,NULL,NULL);
INSERT INTO consultas VALUES("23","2020-03-24","16:00:00","2","2","2","60.00","Sim","Aguardando",NULL,NULL,NULL);
INSERT INTO consultas VALUES("24","2020-03-24","12:00:00","3","3","1","2500.00","Sim","Aguardando","3",NULL,"Sim");
INSERT INTO consultas VALUES("25","2020-03-24","11:00:00","4","1","1","120.00","Sim","Finalizada","6","Sim","Sim");
INSERT INTO consultas VALUES("26","2020-03-25","13:00:00","2","1","1","120.00","Sim","Finalizada",NULL,NULL,NULL);
INSERT INTO consultas VALUES("27","2020-03-25","11:00:00","4","1","1","120.00","Sim","Finalizada",NULL,NULL,NULL);
INSERT INTO consultas VALUES("28","2020-03-25","15:00:00","1","1","1","120.00","Sim","Consultando",NULL,NULL,NULL);
INSERT INTO consultas VALUES("29","2020-03-25","19:00:00","1","1","1","120.00","Não",NULL,NULL,NULL,NULL);
INSERT INTO consultas VALUES("30","2020-03-25","15:00:00","2","1","2","120.00","Sim","Aguardando",NULL,NULL,NULL);
INSERT INTO consultas VALUES("31","2020-03-25","14:00:00","1","3","1","2500.00","Sim","Aguardando",NULL,NULL,NULL);


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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

INSERT INTO contas_pagar VALUES("1","Luz","980.00","2020-03-17","2020-03-17","Sim","000.000.000-00","conta2.jpg");
INSERT INTO contas_pagar VALUES("2","Agua","680.00","2020-03-17","2020-03-17","Sim","000.000.000-00","conta3.jpg");
INSERT INTO contas_pagar VALUES("3","Conta de Telefone","690.00","2020-03-18",NULL,"Não","000.000.000-00","conta.jpg");
INSERT INTO contas_pagar VALUES("5","Telefone","1200.00","2020-03-17","2020-03-17","Sim","000.000.000-00","conta.jpg");
INSERT INTO contas_pagar VALUES("6","Vidraçaria","1800.00","2020-03-17",NULL,"Não","000.000.000-00","sem-foto.png");
INSERT INTO contas_pagar VALUES("7","Compra de Cadeiras","1200.00","2020-03-17",NULL,"Não","000.000.000-00","conta2.jpg");
INSERT INTO contas_pagar VALUES("8","Compra de Remédios","16.00","2020-03-18","2020-03-18","Sim","000.000.000-00","sem-foto.png");
INSERT INTO contas_pagar VALUES("9","Compra de Remédios","24.00","2020-03-18",NULL,"Não","999.999.999-80","sem-foto.png");
INSERT INTO contas_pagar VALUES("10","Compra de Remédios","16.00","2020-03-18",NULL,"Não","777.777.777-80","sem-foto.png");
INSERT INTO contas_pagar VALUES("11","Compra de Materiais","400.00","2020-03-19","2020-03-19","Sim","000.000.000-00","sem-foto.png");
INSERT INTO contas_pagar VALUES("13","Compra de RemÃ©dios","30.00","2020-03-19","2020-03-19","Sim","000.000.000-00","sem-foto.png");
INSERT INTO contas_pagar VALUES("14","Pagamento Eletrecista","400.00","2020-03-19","2020-03-19","Sim","000.000.000-00","sem-foto.png");
INSERT INTO contas_pagar VALUES("15","Compra de RemÃ©dios","18.00","2020-03-19",NULL,"NÃ£o","777.777.777-80","sem-foto.png");
INSERT INTO contas_pagar VALUES("16","Luz","980.00","2020-03-25",NULL,"Não","000.000.000-00","sem-foto.png");


DROP TABLE IF EXISTS contas_receber;

CREATE TABLE `contas_receber` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `vencimento` date NOT NULL,
  `data_baixa` date DEFAULT NULL,
  `forma_pgto` varchar(25) DEFAULT NULL,
  `tipo_pgto` varchar(30) DEFAULT NULL,
  `tesoureiro` varchar(30) DEFAULT NULL,
  `id_consulta` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

INSERT INTO contas_receber VALUES("1","3","2500.00","2020-03-17","2020-03-17","Dinheiro","A Vista","000.000.000-00","1");
INSERT INTO contas_receber VALUES("2","1","120.00","2020-03-17","2020-03-17","Dinheiro","A Vista","000.000.000-00","2");
INSERT INTO contas_receber VALUES("3","2","60.00","2020-03-17","2020-03-17","Convênio","Unimed","000.000.000-00","3");
INSERT INTO contas_receber VALUES("4","1","120.00","2020-03-17","2020-03-17","Convênio","Unimed","000.000.000-00","4");
INSERT INTO contas_receber VALUES("5","1","120.00","2020-03-19","2020-03-19","Dinheiro","A Vista","000.000.000-00","5");
INSERT INTO contas_receber VALUES("6","2","60.00","2020-03-19","2020-03-19","Dinheiro","A Vista","000.000.000-00","6");
INSERT INTO contas_receber VALUES("7","1","120.00","2020-03-19","2020-03-19","Dinheiro","A Vista","000.000.000-00","7");
INSERT INTO contas_receber VALUES("8","2","60.00","2020-03-19","2020-03-19","Dinheiro","A Vista","000.000.000-00","8");
INSERT INTO contas_receber VALUES("9","1","120.00","2020-03-19","2020-03-19","Dinheiro","A Vista","000.000.000-00","9");
INSERT INTO contas_receber VALUES("10","2","60.00","2020-03-19","2020-03-19","Dinheiro","A Vista","000.000.000-00","10");
INSERT INTO contas_receber VALUES("11","1","120.00","2020-03-19","2020-03-19","Dinheiro","A Vista","000.000.000-00","11");
INSERT INTO contas_receber VALUES("12","1","120.00","2020-03-19","2020-03-19","ConvÃªnio","Unimed","000.000.000-00","12");
INSERT INTO contas_receber VALUES("13","2","60.00","2020-03-19",NULL,NULL,NULL,NULL,"13");
INSERT INTO contas_receber VALUES("14","3","2500.00","2020-03-23","2020-03-23","Dinheiro","A Vista","000.000.000-00","14");
INSERT INTO contas_receber VALUES("15","1","120.00","2020-03-23","2020-03-23","Convênio","Unimed","000.000.000-00","15");
INSERT INTO contas_receber VALUES("16","1","120.00","2020-03-23","2020-03-23","Dinheiro","A Vista","000.000.000-00","16");
INSERT INTO contas_receber VALUES("17","1","120.00","2020-03-23","2020-03-23","Dinheiro","A Vista","000.000.000-00","17");
INSERT INTO contas_receber VALUES("18","3","2500.00","2020-03-23",NULL,NULL,NULL,NULL,"18");
INSERT INTO contas_receber VALUES("19","3","2500.00","2020-03-23","2020-03-23","Dinheiro","A Vista","000.000.000-00","19");
INSERT INTO contas_receber VALUES("20","1","120.00","2020-03-23","2020-03-23","Dinheiro","A Vista","000.000.000-00","20");
INSERT INTO contas_receber VALUES("21","1","120.00","2020-03-23","2020-03-23","Dinheiro","Unimed","000.000.000-00","21");
INSERT INTO contas_receber VALUES("22","1","120.00","2020-03-24","2020-03-24","Dinheiro","A Vista","000.000.000-00","22");
INSERT INTO contas_receber VALUES("23","2","60.00","2020-03-24","2020-03-24","Dinheiro","A Vista","000.000.000-00","23");
INSERT INTO contas_receber VALUES("24","3","2500.00","2020-03-24","2020-03-24","Dinheiro","A Vista","000.000.000-00","24");
INSERT INTO contas_receber VALUES("25","1","120.00","2020-03-24","2020-03-24","Dinheiro","A Vista","000.000.000-00","25");
INSERT INTO contas_receber VALUES("26","1","120.00","2020-03-25","2020-03-25","Dinheiro","A Vista","000.000.000-00","26");
INSERT INTO contas_receber VALUES("27","1","120.00","2020-03-25","2020-03-25","Dinheiro","A Vista","000.000.000-00","27");
INSERT INTO contas_receber VALUES("28","1","120.00","2020-03-25","2020-03-25","Convênio","Unimed","000.000.000-00","28");
INSERT INTO contas_receber VALUES("29","1","120.00","2020-03-25",NULL,NULL,NULL,NULL,"29");
INSERT INTO contas_receber VALUES("30","1","120.00","2020-03-25","2020-03-25","Dinheiro","A Vista","000.000.000-00","30");
INSERT INTO contas_receber VALUES("31","3","2500.00","2020-03-25","2020-03-25","Dinheiro","A Vista","000.000.000-00","31");


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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

INSERT INTO entradas_remedios VALUES("8","1","3","3.00","2","777.777.777-80","Dipirona Líquida","2020-03-18");
INSERT INTO entradas_remedios VALUES("9","2","4","4.00","2","777.777.777-80","Dipirona Comprimido","2020-03-18");
INSERT INTO entradas_remedios VALUES("10","2","4","4.00","2","777.777.777-80","Dipirona Comprimido","2020-03-18");
INSERT INTO entradas_remedios VALUES("11","2","12","2.00","2","999.999.999-80","Dipirona Comprimido","2020-03-18");
INSERT INTO entradas_remedios VALUES("12","1","8","2.00","2","777.777.777-80","Dipirona Líquida","2020-03-18");
INSERT INTO entradas_remedios VALUES("13","4","6","5.00","2","777.777.777-80","Aspirina","2020-03-19");
INSERT INTO entradas_remedios VALUES("14","4","6","3.00","2","777.777.777-80","Aspirina","2020-03-19");


DROP TABLE IF EXISTS especializacoes;

CREATE TABLE `especializacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO especializacoes VALUES("1","Pediatra");
INSERT INTO especializacoes VALUES("3","Ortopedista");
INSERT INTO especializacoes VALUES("4","Clínico Geral");
INSERT INTO especializacoes VALUES("5","Cirúrgião");


DROP TABLE IF EXISTS fornecedores;

CREATE TABLE `fornecedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(35) NOT NULL,
  `remedios` varchar(350) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO fornecedores VALUES("2","Matheus Silva","(33) 33333-3333","mateus@hotmail.com","Dipirona, Aspirina");


DROP TABLE IF EXISTS funcionarios;

CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(35) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `cargo` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

INSERT INTO funcionarios VALUES("1","Paula Campos","333.333.333-33","(33) 33333-3333","paula@hotmail.com","Medico");
INSERT INTO funcionarios VALUES("2","Marcia Silva","555.555.555-55","(55) 55555-5555","marcia@hotmail.com","Medico");
INSERT INTO funcionarios VALUES("3","Marcos Silva","444.444.444-44","(44) 44444-4444","marcos@hotmail.com","Recepcionista");
INSERT INTO funcionarios VALUES("4","Patricia Carla","999.999.999-99","(99) 99999-9999","patricia@hotmail.com","Recepcionista");
INSERT INTO funcionarios VALUES("5","Kamila Silva","555.555.555-52","(66) 66666-6666","kamila@hotmail.com","Tesoureiro");
INSERT INTO funcionarios VALUES("6","Pedro Freitas","000.000.000-00","(88) 88888-8888","tesoureiro@hotmail.com","Tesoureiro");
INSERT INTO funcionarios VALUES("10","Thiago Paulo","444.445.666-66","(66) 66666-6666","thiago@hotmail.com","Balconista");
INSERT INTO funcionarios VALUES("11","Marcela Santos","544.545.445-45","(55) 55555-5555","marcelas@hotmail.com","Enfermeira");
INSERT INTO funcionarios VALUES("12","Patricia Silva","245.545.454-54","(45) 45454-5454","pat@hotmail.com","Caixa");
INSERT INTO funcionarios VALUES("13","Antonieta","222.222.222-26","(55) 55555-5555","anton@hotmail.com","Faxineira");
INSERT INTO funcionarios VALUES("17","Mauro Santos","999.999.999-80","(55) 55555-5555","mauro@hotmail.com","Farmáceutico");
INSERT INTO funcionarios VALUES("18","Gabriel Silva","777.777.777-80","(33) 33333-3344","gabriel@hotmail.com","FarmÃ¡ceutico");


DROP TABLE IF EXISTS medicos;

CREATE TABLE `medicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `especialidade` int(11) NOT NULL,
  `crm` varchar(20) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `turno` varchar(15) NOT NULL,
  `consultorio` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO medicos VALUES("1","Paula Campos","5","MG4589941","333.333.333-33","(33) 33333-3333","paula@hotmail.com","Manhã","105");
INSERT INTO medicos VALUES("2","Marcia Silva","3","MG855454","555.555.555-55","(55) 55555-5555","marcia@hotmail.com","Tarde",NULL);


DROP TABLE IF EXISTS movimentacoes;

CREATE TABLE `movimentacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(15) NOT NULL,
  `movimento` varchar(30) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `tesoureiro` varchar(20) NOT NULL,
  `data` date NOT NULL,
  `id_movimento` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

INSERT INTO movimentacoes VALUES("1","Entrada","Consulta","2500.00","000.000.000-00","2020-03-17","1");
INSERT INTO movimentacoes VALUES("2","Entrada","Consulta","60.00","000.000.000-00","2020-03-17","3");
INSERT INTO movimentacoes VALUES("6","Saída","Pagamento Conta","1800.00","000.000.000-00","2020-03-17","6");
INSERT INTO movimentacoes VALUES("7","Entrada","Consulta","120.00","000.000.000-00","2020-03-17","4");
INSERT INTO movimentacoes VALUES("8","Saída","Pagamento Conta","1200.00","000.000.000-00","2020-03-17","7");
INSERT INTO movimentacoes VALUES("9","Saída","Pgto Funcionário","500.00","000.000.000-00","2020-03-17","7");
INSERT INTO movimentacoes VALUES("10","Saída","Pagamento Conta","1200.00","000.000.000-00","2020-03-17","5");
INSERT INTO movimentacoes VALUES("11","Saída","Pagamento Conta","16.00","000.000.000-00","2020-03-18","8");
INSERT INTO movimentacoes VALUES("12","SaÃ­da","Pagamento Conta","400.00","000.000.000-00","2020-03-19","11");
INSERT INTO movimentacoes VALUES("13","Entrada","Consulta","60.00","000.000.000-00","2020-03-19","6");
INSERT INTO movimentacoes VALUES("14","Entrada","Consulta","120.00","000.000.000-00","2020-03-19","5");
INSERT INTO movimentacoes VALUES("15","Entrada","Consulta","120.00","000.000.000-00","2020-03-19","12");
INSERT INTO movimentacoes VALUES("16","Entrada","Consulta","120.00","000.000.000-00","2020-03-19","11");
INSERT INTO movimentacoes VALUES("17","Entrada","Consulta","60.00","000.000.000-00","2020-03-19","10");
INSERT INTO movimentacoes VALUES("18","Entrada","Consulta","120.00","000.000.000-00","2020-03-19","9");
INSERT INTO movimentacoes VALUES("19","Entrada","Consulta","60.00","000.000.000-00","2020-03-19","8");
INSERT INTO movimentacoes VALUES("20","Entrada","Consulta","120.00","000.000.000-00","2020-03-19","7");
INSERT INTO movimentacoes VALUES("21","SaÃ­da","Pagamento Conta","400.00","000.000.000-00","2020-03-19","14");
INSERT INTO movimentacoes VALUES("22","SaÃ­da","Pagamento Conta","30.00","000.000.000-00","2020-03-19","13");
INSERT INTO movimentacoes VALUES("23","Entrada","Consulta","120.00","000.000.000-00","2020-03-23","16");
INSERT INTO movimentacoes VALUES("24","Entrada","Consulta","120.00","000.000.000-00","2020-03-23","15");
INSERT INTO movimentacoes VALUES("25","Entrada","Consulta","2500.00","000.000.000-00","2020-03-23","14");
INSERT INTO movimentacoes VALUES("26","Entrada","Consulta","120.00","000.000.000-00","2020-03-23","17");
INSERT INTO movimentacoes VALUES("27","Entrada","Consulta","120.00","000.000.000-00","2020-03-23","21");
INSERT INTO movimentacoes VALUES("28","Entrada","Consulta","120.00","000.000.000-00","2020-03-23","20");
INSERT INTO movimentacoes VALUES("29","Entrada","Consulta","2500.00","000.000.000-00","2020-03-23","19");
INSERT INTO movimentacoes VALUES("30","Entrada","Consulta","120.00","000.000.000-00","2020-03-24","25");
INSERT INTO movimentacoes VALUES("31","Entrada","Consulta","2500.00","000.000.000-00","2020-03-24","24");
INSERT INTO movimentacoes VALUES("32","Entrada","Consulta","60.00","000.000.000-00","2020-03-24","23");
INSERT INTO movimentacoes VALUES("33","Entrada","Consulta","120.00","000.000.000-00","2020-03-24","22");
INSERT INTO movimentacoes VALUES("34","Entrada","Consulta","120.00","000.000.000-00","2020-03-25","28");
INSERT INTO movimentacoes VALUES("35","Entrada","Consulta","120.00","000.000.000-00","2020-03-25","27");
INSERT INTO movimentacoes VALUES("36","Entrada","Consulta","120.00","000.000.000-00","2020-03-25","26");
INSERT INTO movimentacoes VALUES("37","Entrada","Consulta","120.00","000.000.000-00","2020-03-25","30");
INSERT INTO movimentacoes VALUES("38","Entrada","Consulta","2500.00","000.000.000-00","2020-03-25","31");


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
  `sexo` varchar(15) NOT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `obs` varchar(350) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO pacientes VALUES("1","Pablo Silva","456.666.666-66","MG45555555","(33) 33333-3333","pablo@hotmail.com","2018-02-14","2","Solteiro","Feminino","Rua A","Diabético");
INSERT INTO pacientes VALUES("2","Hugo Vasconcelos","023.555.466-94","MG45555655","(99) 99999-9999","hugo@hotmail.com","2018-02-14","2","Solteiro","Masculino","Rua A","Saúde Normal");
INSERT INTO pacientes VALUES("3","MaurÃ­cio Silva Santos","123.456.788-88","MG 102459872","(22) 22222-2222","mauri@hotmail.com","1980-02-20","40","Solteiro","Masculino","Rua Almeida Campos 150","Tem DiabÃ©ts, Fez duas cirÃºrgias cardÃ­acas, atualmente apressenta um quadro normal, sem queixas de dores! Na ultima consulta paciente queixou de dores na cabeça.");
INSERT INTO pacientes VALUES("4","Paloma Silva Ribeiro","456.889.487-88","MG 102459876","(33) 33333-3333","paloma@hotmail.com","1985-02-20","35","Solteiro","Feminino","Rua Almeida Campos 150","Apresenta um bom estado de saÃºde!");


DROP TABLE IF EXISTS pagamentos;

CREATE TABLE `pagamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `funcionario` varchar(35) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `tesoureiro` varchar(35) NOT NULL,
  `data` date NOT NULL,
  `nome_funcionario` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO pagamentos VALUES("3","245.545.454-54","1500.00","000.000.000-00","2020-03-18","Patricia Silva");
INSERT INTO pagamentos VALUES("4","544.545.445-45","2500.00","000.000.000-00","2020-03-17","Marcela Santos");
INSERT INTO pagamentos VALUES("5","333.333.333-33","20000.00","000.000.000-00","2020-03-14","Paula Campos");
INSERT INTO pagamentos VALUES("7","000.000.000-00","500.00","000.000.000-00","2020-03-17","Pedro Freitas");


DROP TABLE IF EXISTS prescricao;

CREATE TABLE `prescricao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_consulta` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `remedio` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

INSERT INTO prescricao VALUES("1","15","1","Dipirona Liquida");
INSERT INTO prescricao VALUES("3","15","3","Outro RemÃ©dio");
INSERT INTO prescricao VALUES("4","15","4","Teste");
INSERT INTO prescricao VALUES("5","15","5","testes");
INSERT INTO prescricao VALUES("6","15","6","testess");
INSERT INTO prescricao VALUES("7","15","7","aaa");
INSERT INTO prescricao VALUES("8","25","1","Dipirona");
INSERT INTO prescricao VALUES("18","21","1","Dipirona");
INSERT INTO prescricao VALUES("19","25","2","Aspirina");


DROP TABLE IF EXISTS receitas;

CREATE TABLE `receitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_consulta` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `remedio` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO receitas VALUES("1","25","1","Dipirona Liquida 200 ML dsfdaxxx");
INSERT INTO receitas VALUES("3","25","2","Soro xxxxxxxxx");
INSERT INTO receitas VALUES("4","24","1","RemÃ©dio do Item 1 da Receita");
INSERT INTO receitas VALUES("5","24","2","RemÃ©dio do Item 2 da Receita");
INSERT INTO receitas VALUES("7","24","3","RemÃ©dio do Item 3 da Receita");
INSERT INTO receitas VALUES("8","25","3","RemÃ©dio X ");


DROP TABLE IF EXISTS recepcionistas;

CREATE TABLE `recepcionistas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(35) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `turno` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO recepcionistas VALUES("1","Marcos Silva","444.444.444-44","(44) 44444-4444","marcos@hotmail.com","Tarde");
INSERT INTO recepcionistas VALUES("2","Patricia Carla","999.999.999-99","(99) 99999-9999","patricia@hotmail.com","Tarde");


DROP TABLE IF EXISTS remedios;

CREATE TABLE `remedios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `estoque` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO remedios VALUES("2","Dipirona Comprimido","25 Comprimidos","17");
INSERT INTO remedios VALUES("4","Aspirina","13 Capsulas","9");
INSERT INTO remedios VALUES("5","Dipirona LÃ­quida","200 ML",NULL);


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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO saidas_remedios VALUES("1","2","1","11","777.777.777-80","Dipirona Comprimido","2020-03-18");
INSERT INTO saidas_remedios VALUES("3","4","3","11","777.777.777-80","Aspirina","2020-03-19");
INSERT INTO saidas_remedios VALUES("4","2","5","11","777.777.777-80","Dipirona Comprimido","2020-03-19");


DROP TABLE IF EXISTS tesoureiros;

CREATE TABLE `tesoureiros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(35) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `turno` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO tesoureiros VALUES("1","Kamila Silva","555.555.555-52","(66) 66666-6666","kamila@hotmail.com","Manhã");
INSERT INTO tesoureiros VALUES("2","Pedro Freitas","000.000.000-00","(88) 88888-8888","tesoureiro@hotmail.com","Manhã");


DROP TABLE IF EXISTS usuarios;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `senha_original` varchar(25) NOT NULL,
  `nivel` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

INSERT INTO usuarios VALUES("11","Hugo Vasconcelos","contato@hugocursos.com.br","202cb962ac59075b964b07152d234b70","123","admin");
INSERT INTO usuarios VALUES("43","Paula Campos","paula@hotmail.com","d86641a4189b19defacd72ed661d6a88","33333333333","Medico");
INSERT INTO usuarios VALUES("44","Marcia Silva","marcia@hotmail.com","9079b6ee1d5ca04ab00e44e877a222ee","55555555555","Medico");
INSERT INTO usuarios VALUES("45","Marcos Silva","marcos@hotmail.com","da9d3427a781fc66847d855ed67c7ae7","44444444444","Recepcionista");
INSERT INTO usuarios VALUES("46","Patricia Carla","patricia@hotmail.com","473a9b0f3477d9422fe57bfae5cdf290","99999999999","Recepcionista");
INSERT INTO usuarios VALUES("47","Kamila Silva","kamila@hotmail.com","0b77553896d72e86d1816efa903e9e96","55555555552","Tesoureiro");
INSERT INTO usuarios VALUES("48","Pedro Freitas","tesoureiro@hotmail.com","645a8aca5a5b84527c57ee2f153f1946","00000000000","Tesoureiro");
INSERT INTO usuarios VALUES("51","Mauro Santos","mauro@hotmail.com","50a05d3e1fe1ab80905f1ebf4b69dcfe","99999999980","Farmáceutico");
INSERT INTO usuarios VALUES("52","Gabriel Silva","gabriel@hotmail.com","f50fc87845a98fe31ae10920065cbc0c","77777777780","FarmÃ¡ceutico");
INSERT INTO usuarios VALUES("54","Tela","tela@tela","c6f057b86584942e415435ffb1fa93d4","000","Tela");
INSERT INTO usuarios VALUES("55","Gustavo ","gustavo@4wsites.com.br","202cb962ac59075b964b07152d234b70","123","admin");


