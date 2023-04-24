<?php 

require_once("../../conexao.php");

$id = $_POST['id'];


//TENTATIVA DE EXCLUSAO AUTOMATIZADA
/*$res_info = $pdo->query("select * from medicos where id = '$id'");
$dados_info = $res_info->fetchAll(PDO::FETCH_ASSOC);
$nome_usuario = $dados_info[0]['nome'];
$usuario_email = $dados_info[0]['email'];


$res_fun = $pdo->prepare("DELETE from funcionarios where nome = :nome");
$res_fun->bindValue(":nome", $nome_usuario);
$res_fun->execute();

$res_med = $pdo->prepare("DELETE from medicos where email = :email");
$res_med->bindValue(":email", $usuario_email);
$res_med->execute();*/

$res = $pdo->prepare("DELETE from usuarios where id = :id");
$res->bindValue(":id", $id);
$res ->execute();


?>