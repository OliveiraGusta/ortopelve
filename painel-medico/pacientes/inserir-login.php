<?php 

require_once("../../conexao.php");

$email = $_POST['email'];
$senha = $_POST['senha_paciente'];
$id_pac = $_POST['id'];
$nome = $_POST['nome_pac'];



if($senha == ''){
	echo "Insira a senha!!";
	exit();
}

$res = $pdo->prepare("SELECT * from usuarios where usuario = :usuario");

$res->bindValue(":usuario", $email);
$res->execute();

$dados = $res->fetchAll(PDO::FETCH_ASSOC);
$linhas = count($dados);


if($linhas > 0){
	
	$senha_cript = md5($senha);

	$res = $pdo->query("UPDATE usuarios set senha_original = '$senha', senha = '$senha_cript' where usuario = '$email'");

	echo "Atualizado Login do Paciente";

}else{
		$res = $pdo->prepare(" INSERT into usuarios (nome, usuario, senha, senha_original, nivel) values (:nome, :usuario, :senha, :senha_original, :nivel)");

		$res->bindValue(":nome", $nome);
		$res->bindValue(":usuario", $email);

		$res->bindValue(":senha", md5($senha));
		$res->bindValue(":senha_original", $senha);
		$res->bindValue(":nivel", 'Paciente');
		$res->execute();

		$res->execute();

	echo "Criado Login do Paciente";
	}



//SALVAR TAMBÉM NA TABELA DE USUÁRIOS






	




?>