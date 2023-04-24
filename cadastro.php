<?php

require_once("conexao.php");
@session_start();

$agora = date('Y-m-d');

$data_fim_acesso_format = explode('-', $agora);
$mes_renovado = str_pad($mes_renovado = $data_fim_acesso_format[1] + 2, 2, '0', STR_PAD_LEFT);
$data_fim_acesso_renovado = $data_fim_acesso_format[0] . "-" . $mes_renovado . "-" . $data_fim_acesso_format[2];

if (empty($_POST['nome']) || empty($_POST['usuario']) || empty($_POST['senha'])) {
	@session_destroy();
	header("location:tela-cadastro.php");
}


$nome = $_POST['nome'];
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$res = $pdo->prepare("SELECT * from usuarios where usuario = :usuario");
$res->bindValue(":usuario", $usuario);
$res->execute();

$dados = $res->fetchAll(PDO::FETCH_ASSOC);
$linhas = count($dados);

if ($linhas > 0) {
	@session_destroy();
	echo "<script language='javascript'>window.alert('Usuario já existente'); </script>";
	echo "<script language='javascript'>window.location='tela-cadastro.php'; </script>";

} else {

	if ($_POST['senha'] != $_POST['confirmar-senha']) {
		@session_destroy();
		echo "<script language='javascript'>window.alert('As senhas precisam ser iguais'); </script>";
		echo "<script language='javascript'>window.location='tela-cadastro.php'; </script>";
	} else {


		//INSERIR NA TABELA MEDICOS
		$res = $pdo->prepare("INSERT into medicos (nome, especialidade, email, novo) values (:nome, :especialidade, :email, :novo)");
		$res->bindValue(":nome", $nome);
		$res->bindValue(":especialidade", '1');
		$res->bindValue(":email", $usuario);
		$res->bindValue(":novo", 's');
		$res->execute();

		//INSERIR NA TABELA USUARIOS
		$res = $pdo->prepare("INSERT into usuarios (nome, usuario, senha, senha_original, data_inicio_acesso, data_fim_acesso,renovado, nivel) values (:nome, :usuario, :senha, :senha_original, :data_inicio_acesso, :data_fim_acesso, :renovado, :nivel)");
		$res->bindValue(":nome", $nome);
		$res->bindValue(":usuario", $usuario);
		$res->bindValue(":senha", md5($senha));
		$res->bindValue(":senha_original", $senha);
		$res->bindValue(":data_inicio_acesso", $agora);
		$res->bindValue(":data_fim_acesso", $data_fim_acesso_renovado);
		$res->bindValue(":renovado", 'Nao');
		$res->bindValue(":nivel", 'Medico');
		$res->execute();

		//SALVAR TAMBÉM NA TABELA DE FUNCIONÁRIOS
		$res = $pdo->prepare("INSERT into funcionarios (nome, email, cargo) values (:nome, :email, :cargo)");
		$res->bindValue(":nome", $nome);
		$res->bindValue(":email", $usuario);
		$res->bindValue(":cargo", 'Medico');
		$res->execute();

		echo "<script language='javascript'>window.alert('Novo usuario foi cadastrado!!'); </script>";
		echo "<script language='javascript'>window.location='index.php'; </script>";
	}
}