<?php 

require_once("../../conexao.php");

$id = $_POST['id'];

//BUSCAR A DATA DO FIM DA ASSINATURA
$res = $pdo->prepare("SELECT * from usuarios where id = :id");

$res->bindValue(":id", $id);
$res->execute();
$dados = $res->fetchAll(PDO::FETCH_ASSOC);

$data_fim_acesso = $dados[0]['data_fim_acesso'];

$agora = date('Y-m-d');

$agora_format = date('Y-m-d');
$agora_format = strtotime($agora_format);
$data_fim_acesso_format = strtotime($data_fim_acesso);


if($data_fim_acesso_format <= $agora_format){

    $data_fim_acesso_format = explode('-', $agora);
    //ADICIONAR MAIS UM MES A DATA DO FIM DA ASSINATURA
    $mes_renovado = str_pad($mes_renovado = $data_fim_acesso_format[1] + 1 , 2 , '0' , STR_PAD_LEFT);
    $data_fim_acesso_renovado = $data_fim_acesso_format[0]."-".$mes_renovado."-".$data_fim_acesso_format[2];


}else{ 
    $data_fim_acesso_format = explode('-', $data_fim_acesso);
    //ADICIONAR MAIS UM MES A DATA DO FIM DA ASSINATURA
    $mes_renovado = str_pad($mes_renovado = $data_fim_acesso_format[1] + 1 , 2 , '0' , STR_PAD_LEFT);
    $data_fim_acesso_renovado = $data_fim_acesso_format[0]."-".$mes_renovado."-".$data_fim_acesso_format[2];
}


$res = $pdo->prepare("UPDATE usuarios set renovado = :renovado, data_fim_acesso = :data_fim_acesso where id = :id ");

$res->bindValue(":id", $id);
$res->bindValue(":data_fim_acesso", $data_fim_acesso_renovado);
$res->bindValue(":renovado", 'Sim');


$res->execute();

echo "Editado com Sucesso!!";




?>