<?php 

require_once("../../conexao.php");

$id = $_POST['id'];
$agora = date('Y-m-d');

$res = $pdo->prepare("UPDATE usuarios set renovado = :renovado, data_fim_acesso = :data_fim_acesso where id = :id ");

$res->bindValue(":id", $id);
$res->bindValue(":renovado", 'Nao');
$res->bindValue(":data_fim_acesso", $agora);


$res->execute();

echo "Editado com Sucesso!!";




?>