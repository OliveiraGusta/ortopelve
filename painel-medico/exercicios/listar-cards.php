<?php 

require_once("../../conexao.php");
$pagina = 'exercicios';

$txtbuscar = @$_POST['data'];
$cbmedicos = @$_POST['medico'];

if($txtbuscar == ''){
	$txtbuscar = date('Y-m-d');

}

if($cbmedicos == ''){
	$res = $pdo->query("SELECT * from medicos order by nome asc");
	$dados = $res->fetchAll(PDO::FETCH_ASSOC);
	$linhas = count($dados);
	if($linhas > 0){
	$cbmedicos = $dados[0]['id'];
	}

}




echo "<div class='row mx-1'>";
echo '
<table class="table mt-3">
<thead class="thead-light">
<tr>
	<th scope="col">Paciente</th>
	<th scope="col">Exercicios</th>
	<th scope="col">Repetiçoes</th>
	<th scope="col">Series</th>
	<th scope="col">Observações</th>
	<th scope="col">Ações</th>
</tr>
</thead>
<tbody>';


$query = $pdo->query("SELECT * from exercicios_pacientes where id_medico = '$cbmedicos'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
for($i=0; $i < @count($res); $i++){
	foreach ($res[$i] as $key => $value){	}
		$nome_exercicio = $res[$i]['nome_exercicio'];
		$repeticoes	= $res[$i]['repeticoes'];
		$series = $res[$i]['series'];
		$obs = $res[$i]['obs'];
		$id_paciente = $res[$i]['id_paciente'];
		$id_medico = $res[$i]['id_medico'];
		
		
		

		$query2 = $pdo->query("SELECT * FROM pacientes where id = '$id_paciente'");
		$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
		$nome_paciente = $res2[0]['nome'];


		echo '
		<tr>

		<td>'.$nome_paciente.'</td>
		<td>'.$nome_exercicio.'</td>
		<td>'.$repeticoes.'</td>
		<td>'.$series.'</td>
		<td>'.$obs.'</td>
		
	<td>
	<big>
	<a href="index.php?acao='.$pagina.'&funcao=excluir&id='.$id_paciente.'&nome_exercicio='.$nome_exercicio.'"><i class="far fa-trash-alt text-danger"></i></a>
	</big></td>
	';
	
}
	
	echo  '
		</tbody>
	</table> ';
	
?>