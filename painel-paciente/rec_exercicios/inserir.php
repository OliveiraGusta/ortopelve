<?php 

require_once("../../conexao.php");

$id_paciente = $_POST['txtid'];
$id_exercicio = $_POST['exercicios'];
$repeticoes = $_POST['repeticoes'];
$medico = $_POST['medico'];


$query = $pdo->query("SELECT * from exercicios where id = '$id_exercicio'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
for($i=0; $i < @count($res); $i++){
	foreach ($res[$i] as $key => $value){	}
		$nome_exercicio = $res[$i]['nome_exercicio'];
    }



$res = $pdo->prepare("INSERT into exercicios_pacientes (nome_exercicio, repeticoes, id_paciente, id_medico) values (:nome_exercicio, :repeticoes, :id_paciente, :id_medico)");

$res->bindValue(":nome_exercicio", $nome_exercicio);
$res->bindValue(":repeticoes", $repeticoes);
$res->bindValue(":id_paciente", $id_paciente);
$res->bindValue(":id_medico", $medico);
$res->execute();

echo "Cadastrado com Sucesso!!";


?>


