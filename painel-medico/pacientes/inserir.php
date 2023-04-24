<?php 

require_once("../../conexao.php");

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];



$telefone = $_POST['telefone'];
$rg = $_POST['rg'];
$email = $_POST['email'];
$data_nascimento = $_POST['data'];
$civil = $_POST['civil'];
$sexo_nascimento = $_POST['sexo_nascimento'];

$sexo_identifica = $_POST['sexo_identifica'];
$identidade_genero = $_POST['identidade_genero'];
$pronome_paciente = $_POST['pronome_paciente'];

$endereco = $_POST['endereco'];
$obs = $_POST['obs'];
$peso = $_POST['peso'];
$altura = $_POST['altura'];
$imc = $_POST['imc'];
$tipo_cirurgia = $_POST['tipo_cirurgia'];
$medico_old = $_POST['medico_old'];
$medico_resp = $_POST['medico_resp'];

//UROLOGIA
//Historia Clinica
$queixa_prin = $_POST['queixa_prin'];
$antecedentes_pessoais = $_POST['antecedentes_pessoais'];
$antecedentes_cirurgicos = $_POST['antecedentes_cirurgicos'];
$antecedentes_familiares = $_POST['antecedentes_familiares'];
$medicacoes = $_POST['medicacoes'];

$antecedentes_urologicos = $_POST['antecedentes_urologicos'];

$queixas_urinarias = $_POST['queixas_urinarias'];
$perdas_aos_esforcos = $_POST['perdas_aos_esforcos'];
$tipos_queixa_urina = $_POST['tipos_queixa_urina'];
$perdas_esforcos = $_POST['perdas_esforcos'];
$circunstancias_das_perdas = $_POST['circunstancias_das_perdas'];
$uso_de_protecao = $_POST['uso_de_protecao']; 
$funcao_sexual = $_POST['funcao_sexual'];
$SHIM = $_POST['SHIM'];
//$antecedentes_neurologicos = $_POST['antecedentes_neurologicos'];
$habitos_vida = $_POST['habitos_vida'];
$uso_frequente = $_POST['uso_frequente'];
$consumo_liquidos = $_POST['consumo_liquidos'];

//CRIAR TABELA NO BANCO A PARTIR DAQUI 

//Exame Físico
$cicatrizes = $_POST['cicatrizes'];
$trofismo_genital = $_POST['trofismo_genital'];
$trofismo_mmii = $_POST['trofismo_mmii'];	
$contracao_voluntaria = $_POST['contracao_voluntaria'];
$musculos_acessorios = $_POST['musculos_acessorios'];
$tonus_do_corpo_perinea = $_POST['tonus_do_corpo_perinea'];
$tonus_do_eae = $_POST['tonus_do_eae'];
$tonus_de_mmii = $_POST['tonus_de_mmii'];
$forca_muscular = $_POST['forca_muscular'];
$sensibilidade = $_POST['sensibilidade'];


//Palpação
$corpo_perineal_urologia = $_POST['corpo_perineal_urologia'];
$tonus_do_eae_urologia = $_POST['tonus_do_eae_urologia'];
$puborretal_urologia = $_POST['puborretal_urologia'];
$mmii_urologia = $_POST['mmii_urologia'];
$fibrose_urologia = $_POST['fibrose_urologia'];
$afa_urologia = $_POST['afa_urologia'];
$perfect_urologia = $_POST['perfect_urologia'];
$elasticidade_urologia = $_POST['elasticidade_urologia'];
$coordenacao_urologia = $_POST['coordenacao_urologia'];
$relaxamento_do_pr_a_manobra_de_evacuacao_urologia = $_POST['relaxamento_do_pr_a_manobra_de_evacuacao_urologia'];
$pontos_dolorosos = $_POST['pontos_dolorosos'];

//INDICE INTERNACIONAL DE FUNÇÃO ERÉTIL
$pergunta1_urologia = $_POST['pergunta1_urologia'];
$pergunta2_urologia = $_POST['pergunta2_urologia'];
$pergunta3_urologia = $_POST['pergunta3_urologia'];
$pergunta4_urologia = $_POST['pergunta4_urologia']; 
$pergunta5_urologia = $_POST['pergunta5_urologia'];

// FIM UROLOGIA (Funcionando perfeitamente)


//PROCTOLOGIA
$queixa_prin_proc = $_POST['queixa_prin_proc'];
$antecedentes_pessoais_proc = $_POST['antecedentes_pessoais_proc'];
$antecedentes_cirurgicos_proc = $_POST['antecedentes_cirurgicos_proc'];
$antecedentes_familiares_proc = $_POST['antecedentes_familiares_proc'];
$historia_proctologica = $_POST['historia_proctologica'];
$tempo_sintomas = $_POST['tempo_sintomas'];

$tempo_ajuda = $_POST['tempo_ajuda'];
$sintomas_estado = $_POST['sintomas_estado'];
$perdas_proc = $_POST['perdas_proc'];
$frequencia_dos_acidentes = $_POST['frequencia_dos_acidentes'];
$quantidade_da_perda = $_POST['quantidade_da_perda'];
$protecoes_proc = $_POST['protecoes_proc'];
$frequencia_evacuatoria = $_POST['frequencia_evacuatoria'];
$manobra_evacuar = $_POST['manobra_evacuar'];
$medicacoes_em_uso_proc = $_POST['medicacoes_em_uso_proc'];
$partos_proc = $_POST['partos_proc'];

$complicacoes_puerperais_proc = $_POST['complicacoes_puerperais_proc'];
$cirurgias_ginecologicas_proc = $_POST['cirurgias_ginecologicas_proc'];
$antecedentes_urologicos_proc = $_POST['antecedentes_urologicos_proc'];
$habitos_vida_proc = $_POST['habitos_vida_proc'];
$uso_frequente_proc = $_POST['uso_frequente_proc'];
$restricao_do_consumo_de_liquidos_proc = $_POST['restricao_do_consumo_de_liquidos_proc'];
$renda_familiar = $_POST['renda_familiar'];

//Exame Físico
$cicatrizes_proc = $_POST['cicatrizes_proc'];
$trofismo_perianal = $_POST['trofismo_perianal'];
$trofismo_mmii_proc = $_POST['trofismo_mmii_proc'];	
$contracao_voluntaria_proc = $_POST['contracao_voluntaria_proc'];
$abertura_vulvo_vaginal_proc = $_POST['abertura_vulvo_vaginal_proc'];
$abertura_anal_proc = $_POST['abertura_anal_proc'];
$apneia_proc = $_POST['apneia_proc'];
$contracao_do_eae = $_POST['contracao_do_eae'];

// Palpação
$corpo_perineal_proc = $_POST['corpo_perineal_proc'];
$tonus_do_eae_proc = $_POST['tonus_do_eae_proc'];
$puborretal_proc = $_POST['puborretal_proc'];
$mmii_proc = $_POST['mmii_proc'];
$fibrose_proc = $_POST['fibrose_proc'];
$perfect_proc = $_POST['perfect_proc'];
$afa_proc = $_POST['afa_proc'];
$elasticidade_proc = $_POST['elasticidade_proc'];
$coordenacao_proc = $_POST['coordenacao_proc'];
$relaxamento_do_pr_a_manobra_de_evacuacao_proc = $_POST['relaxamento_do_pr_a_manobra_de_evacuacao_proc'];
$pontos_dolorosos_proc = $_POST['pontos_dolorosos_proc'];

//Testes Diagnósticos
$teste_de_esforco_proc = $_POST['teste_de_esforco_proc'];
$reflexo_clitoriano_bulbocavernoso_proc = $_POST['reflexo_clitoriano_bulbocavernoso_proc'];
$reflexo_ceigel_cremasterico = $_POST['reflexo_ceigel_cremasterico'];
$marcha_proc = $_POST['marcha_proc'];
$outros_dados_proc = $_POST['outros_dados_proc'];

//FIM PROCTOLOGIA (Funcionando Pefeitamente)

//Uroginecologia

$queixa_prin_urogine = $_POST['queixa_prin_urogine'];
$antecedentes_pessoais_urogine = $_POST['antecedentes_pessoais_urogine'];
$antecedentes_cirurgicos_urogine = $_POST['antecedentes_cirurgicos_urogine'];
$antecedentes_familiares_urogine = $_POST['antecedentes_familiares_urogine'];

//Sintomas urinários

$fase_de_enchimento_urogine = $_POST['fase_de_enchimento_urogine'];
$fase_de_esvaziamento_urogine = $_POST['fase_de_esvaziamento_urogine'];
$outros_fase_de_esvaziamento_urogine = $_POST['outros_fase_de_esvaziamento_urogine'];
$sensibilidade_fase_de_esvaziamento_urogine = $_POST['sensibilidade_fase_de_esvaziamento_urogine'];
$itu_fase_de_esvaziamento_urogine = $_POST['itu_fase_de_esvaziamento_urogine']; 
$perdas_urogine = $_POST['perdas_urogine'];
$outras_circunstancias_perdas_urogine = $_POST['outras_circunstancias_perdas_urogine']; 
$perdas_durante_o_esforco_urogine = $_POST['perdas_durante_o_esforco_urogine']; 
$outras_perdas_durante_o_esforco_urogine = $_POST['outras_perdas_durante_o_esforco_urogine']; 
$qualidade_da_perda_urinariao_urogine = $_POST['qualidade_da_perda_urinariao_urogine']; 
$quanto_tempo_iniciou_os_sintomas_urogine = $_POST['quanto_tempo_iniciou_os_sintomas_urogine']; 
$quanto_tempo_demorou_para_procurar_ajuda_medica_urogine = $_POST['quanto_tempo_demorou_para_procurar_ajuda_medica_urogine']; 
$desde_que_comecaram_os_sintomas_o_seu_estado_urogine = $_POST['desde_que_comecaram_os_sintomas_o_seu_estado_urogine']; 
$frequencia_urinaria_urogine = $_POST ['frequencia_urinaria_urogine']; 
$protecoes_urogine = $_POST['protecoes_urogine']; 
$numero_de_trocas_urogine = $_POST['numero_de_trocas_urogine'];


//Palpação
$corpo_perineal_uroginecologia = $_POST['corpo_perineal_uroginecologia'];
$tonus_do_eae_uroginecologia = $_POST['tonus_do_eae_uroginecologia'];
$puborretal_uroginecologia = $_POST['puborretal_uroginecologia'];
$mmii_uroginecologia = $_POST['mmii_uroginecologia'];
$fibrose_uroginecologia = $_POST['fibrose_uroginecologia'];
$afa_uroginecologia = $_POST['afa_uroginecologia'];
$perfect_uroginecologia = $_POST['perfect_uroginecologia'];
$elasticidade_uroginecologia = $_POST['elasticidade_uroginecologia'];
$coordenacao_uroginecologia = $_POST['coordenacao_uroginecologia'];
$relaxamento_do_pr_a_manobra_de_evacuacao_uroginecologia = $_POST['relaxamento_do_pr_a_manobra_de_evacuacao_uroginecologia'];
$pontos_dolorosos_uroginecologia = $_POST['pontos_dolorosos_uroginecologia'];


//Obstétrica
$gestacoes_uroginecologia = $_POST['gestacoes_uroginecologia'];
$partos_uroginecologia = $_POST['partos_uroginecologia'];
$abortos_uroginecologia = $_POST['abortos_uroginecologia'];

$parto1_uroginecologia = $_POST['parto1_uroginecologia'];
$idade_materna1_uroginecologia = $_POST['idade_materna1_uroginecologia'];
$peso_da_crianca1_uroginecologia = $_POST['peso_da_crianca1_uroginecologia'];

$parto2_uroginecologia = $_POST['parto2_uroginecologia'];
$idade_materna2_uroginecologia = $_POST['idade_materna2_uroginecologia'];
$peso_da_crianca2_uroginecologia = $_POST['peso_da_crianca2_uroginecologia'];

$parto3_uroginecologia = $_POST['parto3_uroginecologia'];
$idade_materna3_uroginecologia = $_POST['idade_materna3_uroginecologia'];
$peso_da_crianca3_uroginecologia = $_POST['peso_da_crianca3_uroginecologia'];

$realizou_episiotomia_uroginecologia = $_POST['realizou_episiotomia_uroginecologia'];
$forceps_uroginecologia = $_POST['forceps_uroginecologia'];
$complicacoes_obstetricas_uroginecologia = $_POST['complicacoes_obstetricas_uroginecologia'];

//Ginecológia
$data_da_ultima_menstruacao_uroginecologia = $_POST['data_da_ultima_menstruacao_uroginecologia'];
$menopausa_uroginecologia = $_POST['menopausa_uroginecologia'];
$metodo_anticoncepcional_uroginecologia = $_POST['metodo_anticoncepcional_uroginecologia'];
$terapia_de_reposicao_hormonal_uroginecologia = $_POST['terapia_de_reposicao_hormonal_uroginecologia'];
$complicacoes_ginecologicas_uroginecologia = $_POST['complicacoes_ginecologicas_uroginecologia'];
$realizou_cirurgia_ginecologica_uroginecologia = $_POST['realizou_cirurgia_ginecologica_uroginecologia'];

//Sexualidade
$auto_conhecimento_vaginal_uroginecologia = $_POST['auto_conhecimento_vaginal_uroginecologia'];
$vida_sexual_uroginecologia = $_POST['vida_sexual_uroginecologia'];
$perdeu_a_virgindade_uroginecologia = $_POST['perdeu_a_virgindade_uroginecologia'];
$com_quem_perdeu_a_virgindade_uroginecologia = $_POST['com_quem_perdeu_a_virgindade_uroginecologia'];
$experiencia_a_virgindade_uroginecologia = $_POST['experiencia_a_virgindade_uroginecologia'];
$abuso_sexual_uroginecologia = $_POST['abuso_sexual_uroginecologia'];
$permissao_abuso_sexual_uroginecologia = $_POST['permissao_abuso_sexual_uroginecologia'];
$relato_abuso_sexual_uroginecologia = $_POST['relato_abuso_sexual_uroginecologia'];


//CALCULAR A IDADE COM BASE NA DATA SELECIONADA
if($data_nascimento != ''){
	// separando yyyy, mm, ddd
	list($ano, $mes, $dia) = explode('-', $data_nascimento);

    // data atual
	$hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
    // Descobre a unix timestamp da data de nascimento do fulano
	$nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);

    // cálculo
	$idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
}else{
	$idade = 0;
}


//VERIFICAR SE O PACIENTE JÁ ESTÁ CADASTRADO
$res_c = $pdo->query("select * from pacientes where cpf = '$cpf'");
$dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
$linhas = count($dados_c);


if($nome == ''){
	echo "Preencha o Nome!";
	exit();
}

if($cpf == ''){
	echo "Preencha o CPF!";
	exit();
}


	//SALVAR FICHA PRIMARIA E UROLOGIA

if($linhas == 0){
	$res = $pdo->prepare("INSERT into 

		pacientes (nome, cpf, rg, telefone, email, data_nasc, idade, civil,  sexo_identifica,  identidade_genero, pronome_paciente, endereco, obs, peso, altura, imc, tipo_cirurgia, medico_old, medico_resp, queixa_prin, antecedentes_pessoais, antecedentes_cirurgicos, antecedentes_familiares, medicacoes, antecedentes_urologicos, queixas_urinarias, perdas_aos_esforcos, tipos_queixa_urina, perdas_esforcos,circunstancias_das_perdas, uso_de_protecao, funcao_sexual, SHIM, habitos_vida, uso_frequente, consumo_liquidos, cicatrizes, trofismo_genital, trofismo_mmii, contracao_voluntaria, musculos_acessorios, tonus_do_corpo_perinea,  tonus_do_eae, tonus_de_mmii, forca_muscular, sensibilidade, corpo_perineal_urologia, tonus_do_eae_urologia, puborretal_urologia, mmii_urologia, fibrose_urologia, afa_urologia, perfect_urologia, elasticidade_urologia, coordenacao_urologia,  relaxamento_do_pr_a_manobra_de_evacuacao_urologia, pontos_dolorosos, pergunta1_urologia, pergunta2_urologia, pergunta3_urologia, pergunta4_urologia, pergunta5_urologia)
		
		values (:nome, :cpf, :rg, :telefone, :email, :data_nasc, :idade, :civil, :sexo_identifica, :identidade_genero, :pronome_paciente, :endereco, :obs, :peso, :altura, :imc, :tipo_cirurgia, :medico_old, :medico_resp, :queixa_prin, :antecedentes_pessoais, :antecedentes_cirurgicos, :antecedentes_familiares, :medicacoes, :antecedentes_urologicos, :queixas_urinarias, :perdas_aos_esforcos, :tipos_queixa_urina, :perdas_esforcos, :circunstancias_das_perdas, :uso_de_protecao, :funcao_sexual, :SHIM, :habitos_vida, :uso_frequente, :consumo_liquidos, :cicatrizes, :trofismo_genital, :trofismo_mmii, :contracao_voluntaria, :musculos_acessorios,:tonus_do_corpo_perinea, :tonus_do_eae, :tonus_de_mmii, :forca_muscular, :sensibilidade, :corpo_perineal_urologia, :tonus_do_eae_urologia, :puborretal_urologia, :mmii_urologia, :fibrose_urologia, :afa_urologia, :perfect_urologia, :elasticidade_urologia, :coordenacao_urologia, :relaxamento_do_pr_a_manobra_de_evacuacao_urologia, :pontos_dolorosos, :pergunta1_urologia, :pergunta2_urologia, :pergunta3_urologia, :pergunta4_urologia, :pergunta5_urologia)");


		$res->bindValue(":nome", $nome);
		$res->bindValue(":cpf", $cpf);
		$res->bindValue(":telefone", $telefone);
		$res->bindValue(":rg", $rg);
		$res->bindValue(":email", $email);
		$res->bindValue(":data_nasc", $data_nascimento);
		$res->bindValue(":civil", $civil);

		$res->bindValue(":sexo_identifica", $sexo_identifica);
		$res->bindValue(":identidade_genero", $identidade_genero);
		$res->bindValue(":pronome_paciente", $pronome_paciente);

		$res->bindValue(":endereco", $endereco);
		$res->bindValue(":idade", $idade);
		$res->bindValue(":obs", $obs);
		$res->bindValue(":peso", $peso);
		$res->bindValue(":altura", $altura);
		$res->bindValue(":imc", $imc);
		$res->bindValue(":tipo_cirurgia", $tipo_cirurgia);
		$res->bindValue(":medico_old", $medico_old);
		$res->bindValue(":medico_resp", $medico_resp);
		
		//Historia Clinica
		$res->bindValue(":queixa_prin", $queixa_prin);
		$res->bindValue(":antecedentes_pessoais", $antecedentes_pessoais);
		$res->bindValue(":antecedentes_cirurgicos", $antecedentes_cirurgicos);
		$res->bindValue(":antecedentes_familiares", $antecedentes_familiares);
		$res->bindValue(":medicacoes", $medicacoes);
		$res->bindValue(":antecedentes_urologicos", $antecedentes_urologicos);
		$res->bindValue(":queixas_urinarias", $queixas_urinarias);
		$res->bindValue(":perdas_aos_esforcos", $perdas_aos_esforcos);
		$res->bindValue(":tipos_queixa_urina", $tipos_queixa_urina);
		$res->bindValue(":perdas_esforcos", $perdas_esforcos);
		$res->bindValue(":circunstancias_das_perdas", $circunstancias_das_perdas);
		$res->bindValue("uso_de_protecao", $uso_de_protecao);
		$res->bindValue(":funcao_sexual", $funcao_sexual);
		$res->bindValue(":SHIM", $SHIM);
		//$res->bindValue(":antecedentes_neurologicos", $antecedentes_neurologicos);
		$res->bindValue(":habitos_vida", $habitos_vida);
		$res->bindValue(":uso_frequente", $uso_frequente);
		$res->bindValue(":consumo_liquidos", $consumo_liquidos);

		//Exame Físico
		$res->bindValue(":cicatrizes", $cicatrizes);
		$res->bindValue(":trofismo_genital", $trofismo_genital);
		$res->bindValue(":trofismo_mmii", $trofismo_mmii);
		$res->bindValue(":contracao_voluntaria", $contracao_voluntaria);
		$res->bindValue(":musculos_acessorios", $musculos_acessorios);
		$res->bindValue(":tonus_do_corpo_perinea", $tonus_do_corpo_perinea);
		$res->bindValue(":tonus_do_eae", $tonus_do_eae);
		$res->bindValue(":tonus_de_mmii", $tonus_de_mmii);
		$res->bindValue(":forca_muscular", $forca_muscular);
		$res->bindValue(":sensibilidade", $sensibilidade);

		//Palpação
		$res->bindValue(":corpo_perineal_urologia", $corpo_perineal_urologia);
		$res->bindValue(":tonus_do_eae_urologia", $tonus_do_eae_urologia);
		$res->bindValue(":puborretal_urologia", $puborretal_urologia);
		$res->bindValue(":mmii_urologia", $mmii_urologia);
		$res->bindValue(":fibrose_urologia", $fibrose_urologia);
		$res->bindValue(":afa_urologia", $afa_urologia);
		$res->bindValue(":perfect_urologia", $perfect_urologia);
		$res->bindValue(":elasticidade_urologia", $elasticidade_urologia);
		$res->bindValue(":coordenacao_urologia", $coordenacao_urologia);
		$res->bindValue(":relaxamento_do_pr_a_manobra_de_evacuacao_urologia", $relaxamento_do_pr_a_manobra_de_evacuacao_urologia);


		$res->bindValue(":pontos_dolorosos", $pontos_dolorosos);

		//INDICE INTERNACIONAL DE FUNÇÃO ERÉTIL
		$res->bindValue(":pergunta1_urologia", $pergunta1_urologia);
		$res->bindValue(":pergunta2_urologia", $pergunta2_urologia);
		$res->bindValue(":pergunta3_urologia", $pergunta3_urologia);
		$res->bindValue(":pergunta4_urologia", $pergunta4_urologia);
		$res->bindValue(":pergunta5_urologia", $pergunta5_urologia);
		//^^^^^^^^^^^^^^^^^^^^^^^^^ FUNCIONANDO ^^^^^^^^^^^^^^^^^^^^^^^^^


		$res->execute();


	//SALVAR FICHA PROCTOLOGIA

	$res = $pdo->prepare("INSERT into
			ficha_proctologia (nome, fkcpf, queixa_prin_proc, antecedentes_pessoais_proc, antecedentes_cirurgicos_proc, antecedentes_familiares_proc, historia_proctologica, tempo_sintomas, tempo_ajuda, sintomas_estado, perdas_proc, frequencia_dos_acidentes, quantidade_da_perda,protecoes_proc, frequencia_evacuatoria, manobra_evacuar, medicacoes_em_uso_proc, partos_proc, complicacoes_puerperais_proc, cirurgias_ginecologicas_proc, antecedentes_urologicos_proc, habitos_vida_proc, uso_frequente_proc, restricao_do_consumo_de_liquidos_proc, renda_familiar, cicatrizes_proc,trofismo_perianal,trofismo_mmii_proc, contracao_voluntaria_proc, abertura_vulvo_vaginal_proc, abertura_anal_proc, apneia_proc, contracao_do_eae, corpo_perineal_proc, tonus_do_eae_proc, puborretal_proc, mmii_proc, fibrose_proc, perfect_proc, afa_proc, elasticidade_proc, coordenacao_proc, pontos_dolorosos_proc, teste_de_esforco_proc, reflexo_clitoriano_bulbocavernoso_proc, reflexo_ceigel_cremasterico, marcha_proc, outros_dados_proc)
			values (:nome, :cpf, :queixa_prin_proc, :antecedentes_pessoais_proc, :antecedentes_cirurgicos_proc, :antecedentes_familiares_proc, :historia_proctologica, :tempo_sintomas, :tempo_ajuda, :sintomas_estado, :perdas_proc, :frequencia_dos_acidentes, :quantidade_da_perda, :protecoes_proc, :frequencia_evacuatoria, :manobra_evacuar, :medicacoes_em_uso_proc, :partos_proc, :complicacoes_puerperais_proc, :cirurgias_ginecologicas_proc, :antecedentes_urologicos_proc, :habitos_vida_proc, :uso_frequente_proc, :restricao_do_consumo_de_liquidos_proc, :renda_familiar, :cicatrizes_proc, :trofismo_perianal, :trofismo_mmii_proc, :contracao_voluntaria_proc, :abertura_vulvo_vaginal_proc, :abertura_anal_proc, :apneia_proc, :contracao_do_eae, :corpo_perineal_proc, :tonus_do_eae_proc, :puborretal_proc, :mmii_proc, :fibrose_proc, :perfect_proc, :afa_proc, :elasticidade_proc, :coordenacao_proc, :pontos_dolorosos_proc, :teste_de_esforco_proc, :reflexo_clitoriano_bulbocavernoso_proc, :reflexo_ceigel_cremasterico, :marcha_proc, :outros_dados_proc)");

			$res->bindValue(":nome", $nome);
			$res->bindValue(":cpf", $cpf);
			$res->bindValue(":queixa_prin_proc", $queixa_prin_proc);
			$res->bindValue(":antecedentes_pessoais_proc", $antecedentes_pessoais_proc);
			$res->bindValue(":antecedentes_cirurgicos_proc", $antecedentes_cirurgicos_proc);
			$res->bindValue(":antecedentes_familiares_proc", $antecedentes_familiares_proc);
			$res->bindValue(":historia_proctologica", $historia_proctologica);
			$res->bindValue(":tempo_sintomas", $tempo_sintomas);
			$res->bindValue(":tempo_ajuda", $tempo_ajuda);
			$res->bindValue(":sintomas_estado", $sintomas_estado);
			$res->bindValue(":perdas_proc", $perdas_proc);
			$res->bindValue(":frequencia_dos_acidentes", $frequencia_dos_acidentes);
			$res->bindValue(":quantidade_da_perda", $quantidade_da_perda);
			$res->bindValue(":protecoes_proc", $protecoes_proc);
			$res->bindValue(":frequencia_evacuatoria", $frequencia_evacuatoria);
			$res->bindValue(":manobra_evacuar", $manobra_evacuar);
			$res->bindValue(":medicacoes_em_uso_proc", $medicacoes_em_uso_proc);
			$res->bindValue(":partos_proc", $partos_proc);
			$res->bindValue(":complicacoes_puerperais_proc", $complicacoes_puerperais_proc);
			$res->bindValue(":cirurgias_ginecologicas_proc", $cirurgias_ginecologicas_proc);
			$res->bindValue(":antecedentes_urologicos_proc", $antecedentes_urologicos_proc);
			$res->bindValue(":habitos_vida_proc", $habitos_vida_proc);
			$res->bindValue(":uso_frequente_proc", $uso_frequente_proc);
			$res->bindValue(":restricao_do_consumo_de_liquidos_proc", $restricao_do_consumo_de_liquidos_proc);
			$res->bindValue(":renda_familiar", $renda_familiar);

			//Exame Físico
			$res->bindValue(":cicatrizes_proc", $cicatrizes_proc);
			$res->bindValue(":trofismo_perianal", $trofismo_perianal);
			$res->bindValue(":trofismo_mmii_proc", $trofismo_mmii_proc);
			$res->bindValue(":contracao_voluntaria_proc", $contracao_voluntaria_proc);
			$res->bindValue(":abertura_vulvo_vaginal_proc", $abertura_vulvo_vaginal_proc);
			$res->bindValue(":abertura_anal_proc", $abertura_anal_proc);
			$res->bindValue(":apneia_proc", $apneia_proc);
			$res->bindValue(":contracao_do_eae", $contracao_do_eae);
			$res->bindValue(":corpo_perineal_proc", $corpo_perineal_proc);
			$res->bindValue(":tonus_do_eae_proc", $tonus_do_eae_proc);
			$res->bindValue(":puborretal_proc", $puborretal_proc);
			$res->bindValue(":mmii_proc", $mmii_proc);
			$res->bindValue(":fibrose_proc", $fibrose_proc);
			$res->bindValue(":perfect_proc", $perfect_proc);
			$res->bindValue(":afa_proc", $afa_proc);
			$res->bindValue(":elasticidade_proc", $elasticidade_proc);
			$res->bindValue(":coordenacao_proc", $coordenacao_proc);
			/*$res->bindValue(":relaxamento_do_pr_a_manobra_de_evacuacao_proc", $relaxamento_do_pr_a_manobra_de_evacuacao_proc);*/
			$res->bindValue(":pontos_dolorosos_proc", $pontos_dolorosos_proc);

			$res->bindValue(":teste_de_esforco_proc", $teste_de_esforco_proc);
			$res->bindValue(":reflexo_clitoriano_bulbocavernoso_proc", $reflexo_clitoriano_bulbocavernoso_proc);
			$res->bindValue(":reflexo_ceigel_cremasterico", $reflexo_ceigel_cremasterico);
			$res->bindValue(":marcha_proc", $marcha_proc);
			$res->bindValue(":outros_dados_proc", $outros_dados_proc);
			//^^^^^^^^^^^^^^^^^^^^^^^^^ FUNCIONANDO ^^^^^^^^^^^^^^^^^^^^^^^^^

			$res->execute();




//SALVAR FICHA UROGINECOLOGIA
$res = $pdo->prepare("INSERT into
ficha_uroginecologia (nome, fkcpf, queixa_prin_urogine, antecedentes_pessoais_urogine, antecedentes_cirurgicos_urogine, antecedentes_familiares_urogine, fase_de_enchimento_urogine, fase_de_esvaziamento_urogine, outros_fase_de_esvaziamento_urogine, sensibilidade_fase_de_esvaziamento_urogine, itu_fase_de_esvaziamento_urogine, perdas_urogine, outras_circunstancias_perdas_urogine, perdas_durante_o_esforco_urogine, qualidade_da_perda_urinariao_urogine, quanto_tempo_iniciou_os_sintomas_urogine, quanto_tempo_demorou_para_procurar_ajuda_medica_urogine, desde_que_comecaram_os_sintomas_o_seu_estado_urogine, frequencia_urinaria_urogine, protecoes_urogine, numero_de_trocas_urogine, corpo_perineal_uroginecologia, tonus_do_eae_uroginecologia, puborretal_uroginecologia, mmii_uroginecologia, fibrose_uroginecologia, afa_uroginecologia, perfect_uroginecologia, elasticidade_uroginecologia, coordenacao_uroginecologia,  relaxamento_do_pr_a_manobra_de_evacuacao_uroginecologia, pontos_dolorosos_uroginecologia, gestacoes_uroginecologia, partos_uroginecologia, abortos_uroginecologia, parto1_uroginecologia, idade_materna1_uroginecologia, peso_da_crianca1_uroginecologia , parto2_uroginecologia, idade_materna2_uroginecologia, peso_da_crianca2_uroginecologia, parto3_uroginecologia, idade_materna3_uroginecologia, peso_da_crianca3_uroginecologia, realizou_episiotomia_uroginecologia,  forceps_uroginecologia, complicacoes_obstetricas_uroginecologia, data_da_ultima_menstruacao_uroginecologia, menopausa_uroginecologia, metodo_anticoncepcional_uroginecologia, terapia_de_reposicao_hormonal_uroginecologia, complicacoes_ginecologicas_uroginecologia, realizou_cirurgia_ginecologica_uroginecologia, auto_conhecimento_vaginal_uroginecologia, vida_sexual_uroginecologia, perdeu_a_virgindade_uroginecologia, com_quem_perdeu_a_virgindade_uroginecologia, experiencia_a_virgindade_uroginecologia, abuso_sexual_uroginecologia, permissao_abuso_sexual_uroginecologia,relato_abuso_sexual_uroginecologia )

values (:nome, :cpf, :queixa_prin_urogine, :antecedentes_pessoais_urogine, :antecedentes_cirurgicos_urogine, :antecedentes_familiares_urogine, :fase_de_enchimento_urogine, :fase_de_esvaziamento_urogine, :outros_fase_de_esvaziamento_urogine, :sensibilidade_fase_de_esvaziamento_urogine, :itu_fase_de_esvaziamento_urogine, :perdas_urogine,:outras_circunstancias_perdas_urogine, :perdas_durante_o_esforco_urogine, :qualidade_da_perda_urinariao_urogine, :quanto_tempo_iniciou_os_sintomas_urogine, :quanto_tempo_demorou_para_procurar_ajuda_medica_urogine, :desde_que_comecaram_os_sintomas_o_seu_estado_urogine, :frequencia_urinaria_urogine, :protecoes_urogine, :numero_de_trocas_urogine, :corpo_perineal_uroginecologia, :tonus_do_eae_uroginecologia, :puborretal_uroginecologia, :mmii_uroginecologia, :fibrose_uroginecologia, :afa_uroginecologia, :perfect_uroginecologia, :elasticidade_uroginecologia, :coordenacao_uroginecologia, :relaxamento_do_pr_a_manobra_de_evacuacao_uroginecologia, :pontos_dolorosos_uroginecologia, :gestacoes_uroginecologia, :partos_uroginecologia, :abortos_uroginecologia, :parto1_uroginecologia, :idade_materna1_uroginecologia, :peso_da_crianca1_uroginecologia , :parto2_uroginecologia, :idade_materna2_uroginecologia, :peso_da_crianca2_uroginecologia, :parto3_uroginecologia, :idade_materna3_uroginecologia, :peso_da_crianca3_uroginecologia, :realizou_episiotomia_uroginecologia,  :forceps_uroginecologia, :complicacoes_obstetricas_uroginecologia, :data_da_ultima_menstruacao_uroginecologia, :menopausa_uroginecologia, :metodo_anticoncepcional_uroginecologia, :terapia_de_reposicao_hormonal_uroginecologia, :complicacoes_ginecologicas_uroginecologia, :realizou_cirurgia_ginecologica_uroginecologia, :auto_conhecimento_vaginal_uroginecologia, :vida_sexual_uroginecologia, :perdeu_a_virgindade_uroginecologia, :com_quem_perdeu_a_virgindade_uroginecologia, :experiencia_a_virgindade_uroginecologia, :abuso_sexual_uroginecologia, :permissao_abuso_sexual_uroginecologia, :relato_abuso_sexual_uroginecologia)");

		$res->bindValue(":nome", $nome);
		$res->bindValue(":cpf", $cpf);
		$res->bindValue(":queixa_prin_urogine", $queixa_prin_urogine);
		$res->bindValue(":antecedentes_pessoais_urogine", $antecedentes_pessoais_urogine);
		$res->bindValue(":antecedentes_cirurgicos_urogine", $antecedentes_cirurgicos_urogine);
		$res->bindValue(":antecedentes_familiares_urogine", $antecedentes_familiares_urogine);
		$res->bindValue(":fase_de_enchimento_urogine", $fase_de_enchimento_urogine);
		$res->bindValue(":fase_de_esvaziamento_urogine", $fase_de_esvaziamento_urogine);
		$res->bindValue(":outros_fase_de_esvaziamento_urogine", $outros_fase_de_esvaziamento_urogine);
		$res->bindValue(":sensibilidade_fase_de_esvaziamento_urogine", $sensibilidade_fase_de_esvaziamento_urogine);
		$res->bindValue(":itu_fase_de_esvaziamento_urogine", $itu_fase_de_esvaziamento_urogine);
		$res->bindValue(":perdas_urogine", $perdas_urogine);
		$res->bindValue(":outras_circunstancias_perdas_urogine", $outras_circunstancias_perdas_urogine);
		$res->bindValue(":perdas_durante_o_esforco_urogine", $perdas_durante_o_esforco_urogine);
		$res->bindValue(":qualidade_da_perda_urinariao_urogine", $qualidade_da_perda_urinariao_urogine);
		$res->bindValue(":quanto_tempo_iniciou_os_sintomas_urogine", $quanto_tempo_iniciou_os_sintomas_urogine);
		$res->bindValue(":quanto_tempo_demorou_para_procurar_ajuda_medica_urogine", $quanto_tempo_demorou_para_procurar_ajuda_medica_urogine);
		$res->bindValue(":desde_que_comecaram_os_sintomas_o_seu_estado_urogine", $desde_que_comecaram_os_sintomas_o_seu_estado_urogine);
		$res->bindValue(":frequencia_urinaria_urogine", $frequencia_urinaria_urogine);
		$res->bindValue(":protecoes_urogine", $protecoes_urogine);
		$res->bindValue(":numero_de_trocas_urogine", $numero_de_trocas_urogine);
		
		//Palpação
		$res->bindValue(":corpo_perineal_uroginecologia", $corpo_perineal_uroginecologia);
		$res->bindValue(":tonus_do_eae_uroginecologia", $tonus_do_eae_uroginecologia);
		$res->bindValue(":puborretal_uroginecologia", $puborretal_uroginecologia);
		$res->bindValue(":mmii_uroginecologia", $mmii_uroginecologia);
		$res->bindValue(":fibrose_uroginecologia", $fibrose_uroginecologia);
		$res->bindValue(":afa_uroginecologia", $afa_uroginecologia);
		$res->bindValue(":perfect_uroginecologia", $perfect_uroginecologia);
		$res->bindValue(":elasticidade_uroginecologia", $elasticidade_uroginecologia);
		$res->bindValue(":coordenacao_uroginecologia", $coordenacao_uroginecologia);
		$res->bindValue(":relaxamento_do_pr_a_manobra_de_evacuacao_uroginecologia", $relaxamento_do_pr_a_manobra_de_evacuacao_uroginecologia);
		$res->bindValue(":pontos_dolorosos_uroginecologia", $pontos_dolorosos_uroginecologia);

		//Obstétrica
		$res->bindValue(":gestacoes_uroginecologia", $gestacoes_uroginecologia);
		$res->bindValue(":partos_uroginecologia", $partos_uroginecologia);
		$res->bindValue(":abortos_uroginecologia", $abortos_uroginecologia);

		$res->bindValue(":parto1_uroginecologia", $parto1_uroginecologia);
		$res->bindValue(":idade_materna1_uroginecologia", $idade_materna1_uroginecologia);
		$res->bindValue(":peso_da_crianca1_uroginecologia", $peso_da_crianca1_uroginecologia);
		
		$res->bindValue(":parto2_uroginecologia", $parto2_uroginecologia);
		$res->bindValue(":idade_materna2_uroginecologia", $idade_materna2_uroginecologia);
		$res->bindValue(":peso_da_crianca2_uroginecologia", $peso_da_crianca2_uroginecologia);
		
		$res->bindValue(":parto3_uroginecologia", $parto3_uroginecologia);
		$res->bindValue(":idade_materna3_uroginecologia", $idade_materna3_uroginecologia);
		$res->bindValue(":peso_da_crianca3_uroginecologia", $peso_da_crianca3_uroginecologia);

		$res->bindValue(":realizou_episiotomia_uroginecologia", $realizou_episiotomia_uroginecologia);
		$res->bindValue(":forceps_uroginecologia", $forceps_uroginecologia);
		$res->bindValue(":complicacoes_obstetricas_uroginecologia", $complicacoes_obstetricas_uroginecologia);
		
		//Ginecológia
		$res->bindValue(":data_da_ultima_menstruacao_uroginecologia", $data_da_ultima_menstruacao_uroginecologia);
		$res->bindValue(":menopausa_uroginecologia", $menopausa_uroginecologia);
		$res->bindValue(":metodo_anticoncepcional_uroginecologia", $metodo_anticoncepcional_uroginecologia);
		$res->bindValue(":terapia_de_reposicao_hormonal_uroginecologia", $terapia_de_reposicao_hormonal_uroginecologia);
		$res->bindValue(":complicacoes_ginecologicas_uroginecologia", $complicacoes_ginecologicas_uroginecologia);
		$res->bindValue(":realizou_cirurgia_ginecologica_uroginecologia", $realizou_cirurgia_ginecologica_uroginecologia);

		//Sexualidade
		$res->bindValue(":auto_conhecimento_vaginal_uroginecologia", $auto_conhecimento_vaginal_uroginecologia);
		$res->bindValue(":vida_sexual_uroginecologia", $vida_sexual_uroginecologia);
		$res->bindValue(":perdeu_a_virgindade_uroginecologia", $perdeu_a_virgindade_uroginecologia);
		$res->bindValue(":com_quem_perdeu_a_virgindade_uroginecologia", $com_quem_perdeu_a_virgindade_uroginecologia);
		$res->bindValue(":experiencia_a_virgindade_uroginecologia", $experiencia_a_virgindade_uroginecologia);
		$res->bindValue(":abuso_sexual_uroginecologia", $abuso_sexual_uroginecologia);
		$res->bindValue(":permissao_abuso_sexual_uroginecologia", $permissao_abuso_sexual_uroginecologia);
		$res->bindValue(":relato_abuso_sexual_uroginecologia", $relato_abuso_sexual_uroginecologia);

		//^^^^^^^^^^^^^^^^^^^^^^^^^ FUNCIONANDO ^^^^^^^^^^^^^^^^^^^^^^^^^

		$res->execute();

	echo "Cadastrado com Sucesso!";

}else{
	echo "Paciente já possui cadastro!";
}

?>