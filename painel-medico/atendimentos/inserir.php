<?php 

require_once("../../conexao.php");
@session_start();

$email_med = $_SESSION['email_usuario'];

$descricao = $_POST['descricao'];
$valor = $_POST['valor'];
$valor = str_replace(',', '.', $valor);


	//VERIFICAR SE O Atendimento  JÁ ESTÁ CADASTRADO
$res_c = $pdo->query("select * from atendimentos where descricao = '$descricao' and email_med = '$email_med'");
$dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
$linhas = count($dados_c);


if($descricao == ''){
	echo "Preencha a Descrição!!";
	exit();
}

if($linhas == 0){
	$res = $pdo->prepare("INSERT into atendimentos (descricao, valor, email_med) values (:descricao, :valor, :email_med)");

	$res->bindValue(":descricao", $descricao);
	$res->bindValue(":valor", $valor);
	$res->bindValue(":email_med", $email_med);
	

	$res->execute();


	echo "Cadastrado com Sucesso!";

}else{
	echo "Este Registro já está cadastrado!";
}

?>