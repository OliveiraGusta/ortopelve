<?php 
@session_start();

require_once("../../conexao.php");
$pagina = 'movimentacoes';

$txtbuscar = @$_POST['txtbuscar'];
$dataInicial = @$_POST['dataInicial'];
$dataFinal = @$_POST['dataFinal'];
$cpf_paciente = @$_POST['cb-paciente'];

$agora = date('Y-m-d');


$email_usuario = $_SESSION['email_usuario'];
$nome_medico = $_SESSION['nome_usuario'];

$total_entradas = 0;
$total_saidas = 0;


//PEGAR CPF DO MEDICO
$res_medico = $pdo->query("select * from medicos where email = '$email_usuario'");
$dados_medico = $res_medico->fetchAll(PDO::FETCH_ASSOC);
$cpf_medico = $dados_medico[0]['cpf'];


 
echo '
<table class="table table-sm mt-3 tabelas">
<thead class="thead-light">
<tr>
<th scope="col">Nome</th>
<th scope="col">Tipo</th>
<th scope="col">Movimento</th>
<th scope="col">Aguardando Pagamento</th>
<th scope="col">Valor</th>
<th scope="col">Data</th>
<th scope="col">Ações</th>


</tr>
</thead>
<tbody>';

	$txtbuscar = '%'.@$_POST['txtbuscar'].'%';


if($cpf_paciente == "todos" ){
	$res = $pdo->query("SELECT * from movimentacoes where tesoureiro LIKE '$cpf_medico' and tipo LIKE '$txtbuscar' and (data >= '$dataInicial' and data <= '$dataFinal') order by id desc");
}else{
	$res = $pdo->query("SELECT * from movimentacoes where tesoureiro LIKE '$cpf_medico' and cpf_paciente = '$cpf_paciente' and tipo LIKE '$txtbuscar' and (data >= '$dataInicial' and data <= '$dataFinal') order by id desc");}


	$dados = $res->fetchAll(PDO::FETCH_ASSOC);


for ($i=0; $i < count($dados); $i++) { 
	foreach ($dados[$i] as $key => $value) {
	}

	$id = $dados[$i]['id'];	
	$tipo = $dados[$i]['tipo'];
	$valor = $dados[$i]['valor'];
	$data = $dados[$i]['data'];
	$cpf_paciente_movimentacao = $dados[$i]['cpf_paciente'];	
	$aguardando_pagamento = $dados[$i]['aguardando_pagamento'];
	$movimento = $dados[$i]['movimento'];
	$data2 = implode('/', array_reverse(explode('-', $data)));


	if($tipo == 'Entrada'){
		@$total_entradas = $total_entradas + $valor;
	}else{
		@$total_saidas = $total_saidas + $valor;
	}

	if($aguardando_pagamento == 'Sim'){
		$aguardando_pagamento2 = "Sim";
	}else{
		$aguardando_pagamento2 = "Não";
	}
 
	echo '
	<tr>';
	
	if($cpf_paciente_movimentacao != NULL){
	//PEGAR CPF DO PACIENTE
	$res_nome_paciente = $pdo->query("SELECT * from pacientes where cpf = '$cpf_paciente_movimentacao'");
	$dados_nome_paciente = $res_nome_paciente->fetchAll(PDO::FETCH_ASSOC);
	$nome_paciente = $dados_nome_paciente[0]['nome'];

}else{

	//PEGAR NOME DA SAIDA
	$nome_paciente = 'Pagamento Conta';


}
	echo '<td>'.$nome_paciente.'</td>

	<td>'.$tipo.'</td>
	<td>'.$movimento.'</td>
	<td>'.$aguardando_pagamento2.'</td>

	
	<td>R$ '.$valor.'</td>
	<td>'.$data2.'</td>
	<td><a title="Excluir Movimentação" href="index.php?acao='.$pagina.'&funcao=excluir&id='.$id.'"><i class="far fa-trash-alt text-danger"></i></a></td>
	
	</tr>';

}


@$total = $total_entradas - $total_saidas;

$total = number_format($total, 2, ',', '.'); 
$total_entradas = number_format($total_entradas, 2, ',', '.'); 
$total_saidas = number_format($total_saidas, 2, ',', '.'); 

echo  '
</tbody>
	</table>
		<div class="row">
			<div class="col-md-9">
				<div class="float-left totalpago"><span class="mr-4 text-success">Total Entradas: R$ '.$total_entradas.'</span>
				<span class="text-danger">Total Saídas: R$ '.$total_saidas.'</span>
		</div>
	</div>

<div class="col-md-3">';
	if($total > 0){
		echo '
	<div class="float-right text-success totalpago">Total: R$ '.$total.'</div>';
	}else{
		echo '
	<div class="float-right text-danger totalpago">Total: R$ '.$total.'</div>';
	}

echo '
	</div>
</div>
 ';





?>