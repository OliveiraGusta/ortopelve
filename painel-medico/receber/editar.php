<?php 

require_once("../../conexao.php");
@session_start();

$tipo = $_POST['tipo'];
$forma = $_POST['forma'];


$id = $_POST['id'];
$id_consulta = $_POST['id_consulta'];

$email_usuario = $_SESSION['email_usuario'];
$nome_medico = $_SESSION['nome_usuario'];


//PEGAR CPF DO MEDICO
$res_medico = $pdo->query("select * from medicos where email = '$email_usuario'");
$dados_medico = $res_medico->fetchAll(PDO::FETCH_ASSOC);
$cpf_medico = $dados_medico[0]['cpf'];


$res = $pdo->prepare("UPDATE contas_receber set data_baixa = curDate(), forma_pgto = :forma, tipo_pgto = :tipo where id = :id ");

$res->bindValue(":forma", $forma);
$res->bindValue(":tipo", $tipo);
$res->bindValue(":id", $id);
$res->execute();



$res = $pdo->query("UPDATE consultas set pgto_confirmado = 'Sim', status = 'Aguardando' where id = '$id_consulta' ");


//LANÇAR NA TABELA DE MOVIMENTAÇÕES

//BUSCAR O VALOR DA CONSULTA FEITA
$res_valor = $pdo->query("select * from contas_receber where id = '$id'");
$dados_valor  = $res_valor ->fetchAll(PDO::FETCH_ASSOC);
$valor = $dados_valor [0]['valor'];
$cpf_paciente = $dados_valor[0]['paciente'];


if($forma == "Depois"){
    $res = $pdo->prepare("INSERT into movimentacoes (tipo, movimento, aguardando_pagamento, valor, data, tesoureiro, cpf_paciente, id_movimento) values (:tipo, :movimento, :aguardando_pagamento, :valor,  curDate(), :tesoureiro, :cpf_paciente, :id_movimento)");

    $res->bindValue(":tipo", 'Entrada');
    $res->bindValue(":movimento", 'Consulta');
    $res->bindValue(":aguardando_pagamento", 'Sim');
    $res->bindValue(":valor", $valor);
    $res->bindValue(":tesoureiro", $cpf_medico);
    $res->bindValue(":cpf_paciente", $cpf_paciente);
    $res->bindValue(":id_movimento", $id);
    
    $res->execute();
}else{
    $res = $pdo->prepare("INSERT into movimentacoes (tipo, movimento, aguardando_pagamento, valor, data, tesoureiro, cpf_paciente, id_movimento) values (:tipo, :movimento, :aguardando_pagamento, :valor,  curDate(), :tesoureiro, :cpf_paciente, :id_movimento)");
    
    $res->bindValue(":tipo", 'Entrada');
    $res->bindValue(":movimento", 'Consulta');
    $res->bindValue(":aguardando_pagamento", 'Nao');
    $res->bindValue(":valor", $valor);
    $res->bindValue(":tesoureiro", $cpf_medico);
    $res->bindValue(":cpf_paciente", $cpf_paciente);
    $res->bindValue(":id_movimento", $id);

$res->execute();
}



echo "Editado com Sucesso!!";

?>