<?php 
@session_start();

$nome_usuario = $_SESSION['nome_usuario'];
$email_usuario = $_SESSION['email_usuario'];

require_once("../../conexao.php");
$pagina = 'acesso';
$txtbuscar = @$_POST['txtbuscar'];

echo '
<table class="table table-sm mt-3">
	<thead class="thead-light">
		<tr>
			<th scope="col">Nome</th>
			<th scope="col">Email</th>
			<th scope="col">Senha</th>
			<th scope="col">Início Acesso</th>
			<th scope="col">Fim Acesso</th>
			<th scope="col">Renovado</th>
			<th scope="col">Ações</th>
		</tr>
	</thead>
<tbody>';

	
	
	if($txtbuscar == ''){
		$res = $pdo->query("SELECT * from usuarios WHERE renovado != 'Paciente' AND usuario != '$email_usuario' order by id desc");
	}else{
		$txtbuscar = '%'.@$_POST['txtbuscar'].'%';
		$res = $pdo->query("SELECT * from usuarios where nome LIKE '$txtbuscar' AND  renovado != 'Paciente' AND usuario != '$email_usuario' order by id desc");

	}
	
	$dados = $res->fetchAll(PDO::FETCH_ASSOC);

	for ($i=0; $i < count($dados); $i++) { 
			foreach ($dados[$i] as $key => $value) {
			}

			$id = $dados[$i]['id'];	
			$nome = $dados[$i]['nome'];
			$usuario = $dados[$i]['usuario'];
			$senha = $dados[$i]['senha'];
			$senha_original = $dados[$i]['senha_original'];
			$data_inicio_acesso = $dados[$i]['data_inicio_acesso'];
			$data_fim_acesso = $dados[$i]['data_fim_acesso'];
			$renovado = $dados[$i]['renovado'];

			$data_inicio_acesso2 = implode('/', array_reverse(explode('-', $data_inicio_acesso)));
			$data_fim_acesso2 = implode('/', array_reverse(explode('-', $data_fim_acesso)));

echo ' 
		<tr>
			<td>'.$nome.'</td>
			<td>'.$usuario.'</td>
			<td>'.$senha_original.'</td>
			<td>'.$data_inicio_acesso2.'</td>
			<td>'.$data_fim_acesso2.'</td>';	
		
			if($renovado == "Nao"){
				echo '<td><span class="text-danger">Não</span></td>';
			}elseif ($renovado == "Sim") {
				echo '<td><span class="text-primary">Sim</span></td>';
			};
				

			
		echo '
			<td>
			<a title="Renovar Acesso" href="index.php?acao='.$pagina.'&funcao=liberar&id='.$id.'"><i class="fas fa-lock-open text-primary"></i></i></i></a>
			<a title="Bloquear Acesso" href="index.php?acao='.$pagina.'&funcao=bloquear&id='.$id.'"><i class="fas fa-lock text-muted"></i></i></a>
			<a title="Excluir Proffissional" href="index.php?acao='.$pagina.'&funcao=excluir&id='.$id.'"><i class="fas fa-trash-alt text-danger"></i></i></a>
			
			</td>
			</tr>	';
		}
		echo  '
	</tbody>
</table> ';
?>
