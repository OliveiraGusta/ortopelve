<?php
@session_start();
require_once("../../conexao.php");
$pagina = 'consultas';

$txtbuscar = @$_POST['txtbuscar'];
$dataInicial = @$_POST['dataInicial'];
$dataFinal = @$_POST['dataFinal'];
$cpf_paciente = @$_POST['cb-paciente'];
$email_medico = $_SESSION['email_usuario'];



echo '
<table class="table mt-3">
<thead class="thead-light">
<tr>
<th scope="col">Paciente</th>
<th scope="col">Data</th>
<th scope="col">Hora</th>

<th scope="col">Atendimento</th>
<th scope="col">Status</th>
<th scope="col">Relatórios</th>
</tr>
</thead>
<tbody>';

$res_espec = $pdo->query("SELECT * from medicos where email = '$email_medico'");
$dados_espec = $res_espec->fetchAll(PDO::FETCH_ASSOC);

for ($i = 0; $i < count($dados_espec); $i++) {
	foreach ($dados_espec[$i] as $key => $value) {
	}

	$id_medico = $dados_espec[$i]['id'];
	$consultorio = $dados_espec[$i]['consultorio'];
	$nome_medico = $dados_espec[$i]['nome'];

}

$res_paciente = $pdo->query("SELECT * from pacientes where cpf = '$cpf_paciente'");
$dados_paciente = $res_paciente->fetchAll(PDO::FETCH_ASSOC);

for ($i = 0; $i < count($dados_paciente); $i++) {
	foreach ($dados_paciente[$i] as $key => $value) {
	}

	$id_paciente = $dados_paciente[$i]['id'];
	$nome_paciente_filtro = $dados_paciente[$i]['nome'];
}


if ($cpf_paciente != "todos") {
	$res = $pdo->query("SELECT * from consultas where (data >= '$dataInicial' and data <= '$dataFinal') and medico = '$id_medico' and paciente = '$id_paciente' and pgto_confirmado = 'Sim' order by hora asc");
} else {
	$res = $pdo->query("SELECT * from consultas where (data >= '$dataInicial' and data <= '$dataFinal') and medico = '$id_medico' and pgto_confirmado = 'Sim' order by hora asc");
}


$dados = $res->fetchAll(PDO::FETCH_ASSOC);


for ($i = 0; $i < count($dados); $i++) {
	foreach ($dados[$i] as $key => $value) {
	}

	$id = $dados[$i]['id'];
	$paciente = $dados[$i]['paciente'];
	$hora = $dados[$i]['hora'];
	$data = $dados[$i]['data'];
	$tipo_atendimento = $dados[$i]['tipo_atendimento'];
	$medico = $dados[$i]['medico'];
	$status = $dados[$i]['status'];
	$atestado = $dados[$i]['atestado'];
	$data2 = implode('/', array_reverse(explode('-', $data)));


	//BUSCAR O NOME DO PACIENTE
	$res_valor = $pdo->query("SELECT * from pacientes where id = '$paciente'");
	$dados_valor = $res_valor->fetchAll(PDO::FETCH_ASSOC);
	$linhas = count($dados_valor);

	if ($linhas > 0) {

		$nome_paciente = $dados_valor[0]['nome'];

	}


	//BUSCAR O TIPO DE ATENDIMENTO
	$res_med = $pdo->query("SELECT * from atendimentos where id = '$tipo_atendimento' AND  email_med = '$email_medico' ");
	$dados_med = $res_med->fetchAll(PDO::FETCH_ASSOC);
	$linhas = count($dados_med);

	if ($linhas > 0) {

		$atendimento = $dados_med[0]['descricao'];
	}


	echo '
	<tr>


	<td><a class="text-dark" href="index.php?acao=' . $pagina . '&funcao=editar&id=' . $paciente . '">' . $nome_paciente . '</a></td>
	<td>' . $data2 . '</td>
	<td>' . $hora . '</td>
	
	<td>' . $atendimento . '</td>
	
	<td>';

	if ($status != 'Finalizada') {
		echo '
	<a href="index.php?acao=' . $pagina . '&funcao=consultando&id=' . $id . '"><i class="fas fa-user-check text-info" title="Status Consultando"></i></a>
	<a title="Concluir Consulta" href="index.php?acao=' . $pagina . '&funcao=finalizar&id=' . $id . '"><i class="fas fa-check-circle text-success" ></i></a>
	<a title="Excluir Consulta" href="index.php?acao=' . $pagina . '&funcao=excluir&id=' . $id . '"><i class="far fa-trash-alt text-danger"></i></a>
	
	';
	} else {
		echo '
		<span class="text-danger">Finalizada <a title="Excluir Consulta" href="index.php?acao=' . $pagina . '&funcao=excluir&id=' . $id . '"><i class="far fa-trash-alt text-danger"></i></a></span></td>
		';
	}

	echo '
	<td>


	<big>';

	if ($atestado == null) {
		echo '<a href="index.php?acao=' . $pagina . '&funcao=atestado&id=' . $id . '"><i class="fas fa-file-medical text-warning" title="Gerar Atestado"></i></a>
		
		';
	}


	echo '
	<a href="index.php?acao=' . $pagina . '&funcao=receita&id=' . $id . '"><i class="fas fa-file-medical-alt text-info" title="Gerar Receita"></i></a>';

	if ($status == 'Finalizada') {
		echo '
			<a href="index.php?acao=' . $pagina . '&funcao=prescricao&id=' . $id . '"><i class="fas fa-chart-line text-secondary" title="Gerar Evolução"></i></a>';
	}
	;
	echo '
	</big>
	</td>
	</tr>
	';



}

echo '
</tbody>
</table> ';