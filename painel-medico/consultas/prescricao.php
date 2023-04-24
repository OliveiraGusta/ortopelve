<?php 

require_once("../../conexao.php");
$id = $_POST['id_consulta'];
$data_evolucao = $_POST['data_evolucao'];
$evolucao = $_POST['evolucao'];


$res = $pdo->prepare("INSERT into prescricao (id_consulta, data_evolucao, evolucao) values (:id_consulta, :data_evolucao, :evolucao)");

	$res->bindValue(":id_consulta", $id);
	$res->bindValue(":data_evolucao", $data_evolucao);
	$res->bindValue(":evolucao", $evolucao);

	

	$res->execute();



//atualizar o campo prescricao na tabela consulta
	$res = $pdo->query("UPDATE consultas SET prescricao = 'Sim' where id = '$id' ");


echo "Salvo com Sucesso!!";





?>