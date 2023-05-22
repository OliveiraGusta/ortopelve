<?php 

require_once("../../conexao.php");

$id = $_POST['id'];

$res = $pdo->query("select * from pacientes where id = '$id'");
	$dados = $res->fetchAll(PDO::FETCH_ASSOC);
	$nome = $dados[0]['nome'];
	$fkcpf = $dados[0]['cpf'];


$res = $pdo->prepare("DELETE from pacientes where id = :id ");
$res->bindValue(":id", $id);
$res->execute();

$res = $pdo->prepare("DELETE from ficha_proctologia where fkcpf = :fkcpf ");
$res->bindValue(":fkcpf", $fkcpf);
$res->execute();

$res = $pdo->prepare("DELETE from ficha_uroginecologia where fkcpf = :fkcpf ");
$res->bindValue(":fkcpf", $fkcpf);
$res->execute();

$res = $pdo->prepare("DELETE from ficha_ortopedia where fkcpf = :fkcpf ");
$res->bindValue(":fkcpf", $fkcpf);
$res->execute();

?>