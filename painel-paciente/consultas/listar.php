<?php 
@session_start();
require_once("../../conexao.php");
$pagina = 'consultas';

$txtbuscar = @$_POST['txtbuscar'];
$dataInicial = @$_POST['dataInicial'];
$dataFinal = @$_POST['dataFinal'];
$cpf_paciente = @$_POST['cb-paciente'];

$email_medico = $_SESSION['email_medico'];
$id_medico= $_SESSION['id_medico'];
$nome_medico = $_SESSION['medico_resp'];

$nome_paciente = $_SESSION['nome_usuario'];
$email_paciente = $_SESSION['email_usuario'];





echo '
<table class="table mt-3">
<thead class="thead-light">
<tr>
<th scope="col">Paciente</th>
<th scope="col">Data</th>
<th scope="col">Hora</th>

<th scope="col">Atendimento</th>
<th scope="col">Status</th>

</tr>
</thead>
<tbody>';

	$res_espec = $pdo->query("SELECT * from medicos where email = '$email_medico'");
							$dados_espec = $res_espec->fetchAll(PDO::FETCH_ASSOC);

							for ($i=0; $i < count($dados_espec); $i++) { 
								foreach ($dados_espec[$i] as $key => $value) {
								}

								$id_medico = $dados_espec[$i]['id'];	
								$consultorio = $dados_espec[$i]['consultorio'];
								$nome_medico = $dados_espec[$i]['nome'];

}

	
$res_paciente = $pdo->query("SELECT * from pacientes where email = '$email_paciente'");
					$dados_paciente = $res_paciente->fetchAll(PDO::FETCH_ASSOC);

					for ($i=0; $i < count($dados_paciente); $i++) { 
						foreach ($dados_paciente[$i] as $key => $value) {
						}

						$id_paciente = $dados_paciente[$i]['id'];	
						$nome_paciente_filtro = $dados_paciente[$i]['nome'];
}




		$res = $pdo->query("SELECT * from consultas where medico = '$id_medico' and paciente = '$id_paciente' and pgto_confirmado = 'Sim' order by hora asc");
		
	
	
$dados = $res->fetchAll(PDO::FETCH_ASSOC);


for ($i=0; $i < count($dados); $i++) { 
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

	if($linhas > 0){

		$nome_paciente = $dados_valor[0]['nome'];	

	}


	//BUSCAR O TIPO DE ATENDIMENTO
	$res_med = $pdo->query("SELECT * from atendimentos where id = '$tipo_atendimento' AND  email_med = '$email_medico' ");
	$dados_med = $res_med->fetchAll(PDO::FETCH_ASSOC);
	$linhas = count($dados_med);

	if($linhas > 0){

		$atendimento = $dados_med[0]['descricao'];	

	}


	echo '
	<tr>


	<td><a class="text-dark" href="index.php?acao='.$pagina.'&funcao=editar&id='.$paciente.'">'.$nome_paciente.'</a></td>
	<td>'.$data2.'</td>
	<td>'.$hora.'</td>
	
	<td>'.$atendimento.'</td>
	
	<td>';

	if($status != 'Finalizada'){
		echo 'Não Finalizada';
	}else{
		echo '
		<span class="text-danger">Finalizada 
		</span></td>
		';
	}

	echo '
	<td>


	<big>';

	echo'
	</big>
	</td>
	</tr>
	';

	

}

echo  '
</tbody>
</table> ';




?>