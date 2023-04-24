<?php 
@session_start();

$nome_paciente = $_SESSION['nome_usuario'];
$id_medico= $_SESSION['id_medico'];
$nome_medico = $_SESSION['medico_resp'];
$email_paciente = $_SESSION['email_usuario'];
$email_medico = $_SESSION['email_medico'];
 

require_once("../../conexao.php");
$pagina = 'pacientes';
$txtbuscar = @$_POST['txtbuscar'];

echo '
<table class="table table-sm mt-3">
	<thead class="thead-light">
		<tr>
			<th scope="col">Nome</th>
			<th scope="col">CPF</th>
			<th scope="col">Telefone</th>
			<th scope="col">Idade</th>
			<th scope="col">Ação</th>
		</tr>
	</thead>
	<tbody>';

	
	    $itens_por_pagina = $_POST['itens'];

	//PEGAR A PÁGINA ATUAL
		$pagina_pag = intval(@$_POST['pag']);
		
		$limite = $pagina_pag * $itens_por_pagina;

		//CAMINHO DA PAGINAÇÃO
		$caminho_pag = 'index.php?acao='.$pagina.'&';

	if($txtbuscar == ''){
		$res = $pdo->query("SELECT * from pacientes WHERE medico_resp = '$nome_medico' and email = '$email_paciente' order by id desc LIMIT $limite, $itens_por_pagina");
	}else{
		$txtbuscar = '%'.@$_POST['txtbuscar'].'%';
		$res = $pdo->query("SELECT * from pacientes where nome LIKE '$txtbuscar' or cpf LIKE '$txtbuscar' AND  medico_resp = '$nome_medico' order by id desc");

	}
	
	$dados = $res->fetchAll(PDO::FETCH_ASSOC);



	for ($i=0; $i < count($dados); $i++) { 
			foreach ($dados[$i] as $key => $value) {
			}

			$id = $dados[$i]['id'];	
			$nome = $dados[$i]['nome'];
			$cpf = $dados[$i]['cpf'];
			$telefone = $dados[$i]['telefone'];
			$email = $dados[$i]['email'];
			$substituicao = array(
					'(' => '',
					')' => '',
					'-' => '',
					' ' => ''
				);
			$telefone_formatado = strtr($telefone, $substituicao);

			$idade = $dados[$i]['idade'];


			$res_todos2 = $pdo->query("SELECT * from responsaveis where paciente = '$id' ");
			$dados_total2 = $res_todos2->fetchAll(PDO::FETCH_ASSOC);
			if(count($dados_total2) > 0){
				$classe_resp = 'text-info';
			}else{
				$classe_resp = 'text-muted';
			}


			$res_todos2 = $pdo->query("SELECT * from triagens where paciente = '$id' order by id desc");
			$dados_total2 = $res_todos2->fetchAll(PDO::FETCH_ASSOC);
			if(count($dados_total2) > 0){
				$id_triagem = $dados_total2[0]['id'];
				$classe_rel = '';
			}	
			else{
				$classe_rel = 'd-none';
			}
		
echo ' 
		<tr>
			<td>'.$nome.'</td>
			<td>'.$cpf.'</td>
			<td>'.$telefone.'</td>
			<td>'.$idade.'</td>
			
			<td>
				<a title="Ver minha Ficha" href="index.php?acao='.$pagina.'&funcao=editar&id='.$id.'"><i class="fas fa-address-book text-info"></i></a>
				
	</tbody>
</table> ';
		}
?>