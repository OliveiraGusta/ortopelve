<?php 
@session_start();
require_once("../../conexao.php");
$pagina = 'pagar';

$txtbuscar = @$_POST['txtbuscar'];
$dataInicial = @$_POST['dataInicial'];
$dataFinal = @$_POST['dataFinal'];
$cpf_paciente = @$_POST['cb-paciente'];
$email_medico = $_SESSION['email_usuario'];

$itens_por_pagina = $_POST['itens'];



echo '
<table class="table table-sm mt-3 tabelas">
<thead class="thead-light">
<tr>
<th scope="col">Descrição</th>
<th scope="col">Data</th>
<th scope="col">Valor</th>
<th scope="col">Pago</th>
<th scope="col">Foto</th>

<th scope="col">Ações</th>
</tr>
</thead>
<tbody>';


//PEGAR A PÁGINA ATUAL
$pagina_pag = intval(@$_POST['pag']);
		
$limite = $pagina_pag * $itens_por_pagina;
//CAMINHO DA PAGINAÇÃO
$caminho_pag = 'index.php?acao='.$pagina.'&';

$res_espec = $pdo->query("SELECT * from medicos where email = '$email_medico'");
$dados_espec = $res_espec->fetchAll(PDO::FETCH_ASSOC);

for ($i=0; $i < count($dados_espec); $i++) { 
	foreach ($dados_espec[$i] as $key => $value) {
	}

	$id_medico = $dados_espec[$i]['id'];	
	$cpf_medico = $dados_espec[$i]['cpf'];
	$nome_medico = $dados_espec[$i]['nome'];

}




$res = $pdo->query("SELECT * from contas_pagar where funcionario = '$cpf_medico' and (vencimento >= '$dataInicial' and vencimento <= '$dataFinal') order by id desc LIMIT $limite, $itens_por_pagina");
	
$dados = $res->fetchAll(PDO::FETCH_ASSOC);


	//TOTALIZAR OS REGISTROS PARA PAGINAÇÃO
$res_todos = $pdo->query("SELECT * from contas_pagar");
$dados_total = $res_todos->fetchAll(PDO::FETCH_ASSOC);
$num_total = count($dados_total);

		//DEFINIR O TOTAL DE PAGINAS
$num_paginas = ceil($num_total/$itens_por_pagina);


for ($i=0; $i < count($dados); $i++) { 
	foreach ($dados[$i] as $key => $value) {
	}

	$id = $dados[$i]['id'];	
	$descricao = $dados[$i]['descricao'];
	$valor = $dados[$i]['valor'];
	$pago = $dados[$i]['pago'];
	$vencimento = $dados[$i]['vencimento'];
	$funcionario = $dados[$i]['funcionario'];
	$foto = $dados[$i]['foto'];
	$data2 = implode('/', array_reverse(explode('-', $vencimento)));




	echo '
	<tr>


	<td>'.$descricao.'</td>
	<td>'.$data2.'</td>
	<td>'.$valor.'</td>
	<td>'.$pago.'</td>
	<td><a href="img/'.$foto.'" target="_blank"><img src="img/'.$foto.'" width="50px"></a></td>

	<td>';


	if($pago != 'Sim'){
		echo 
	'<a title="Dar Baixa no Pagamento" href="index.php?acao='.$pagina.'&funcao=baixar&id='.$id.'"><i class="fas fa-check-square text-success"></i></a>

	 <a title="Excluir Conta" href="index.php?acao='.$pagina.'&funcao=excluir&id='.$id.'"><i class="far fa-trash-alt text-danger"></i></a>
	';

}
	echo '</td></tr>';


	

}

echo  '
</tbody>
</table> ';


if($txtbuscar == ''){


	echo '
	<!--ÁREA DA PÁGINAÇÃO -->
	<nav class="paginacao" aria-label="Page navigation example">
	<ul class="pagination">
	<li class="page-item">
	<a class="btn btn-outline-dark btn-sm mr-1" href="'.$caminho_pag.'pagina=0&itens='.$itens_por_pagina.'" aria-label="Previous">
	<span aria-hidden="true">&laquo;</span>
	<span class="sr-only">Previous</span>
	</a>
	</li>';

	for($i=0;$i<$num_paginas;$i++){
		$estilo = "";
		if($pagina_pag == $i)
			$estilo = "active";

		echo '
		<li class="page-item"><a class="btn btn-outline-dark btn-sm mr-1 '.$estilo.'" href="'.$caminho_pag.'pagina='.$i.'&itens='.$itens_por_pagina.'">'.($i+1).'</a></li>';
	} 

	echo '<li class="page-item">
	<a class="btn btn-outline-dark btn-sm" href="'.$caminho_pag.'pagina='.($num_paginas-1).'&itens='.$itens_por_pagina.'" aria-label="Next">
	<span aria-hidden="true">&raquo;</span>
	<span class="sr-only">Next</span>
	</a>
	</li>
	</ul>
	</nav>




	';

}


?>