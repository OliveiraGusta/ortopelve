<?php 
@session_start();
require_once("../../conexao.php");
$pagina = 'receber';

$txtbuscar = @$_POST['txtbuscar'];
$dataInicial = @$_POST['dataInicial'];
$dataFinal = @$_POST['dataFinal'];
$email_medico = $_SESSION['email_usuario'];
$cpf_paciente = @$_POST['cb-paciente'];

$itens_por_pagina = $_POST['itens'];



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
		


	if($cpf_paciente != "todos"){
		$res = $pdo->query("SELECT * from contas_receber where tesoureiro LIKE '$cpf_medico' and paciente = '$cpf_paciente' and (vencimento >= '$dataInicial' and vencimento <= '$dataFinal') order by id asc");
	}else{
		$res = $pdo->query("SELECT * from contas_receber where tesoureiro LIKE '$cpf_medico' and (vencimento >= '$dataInicial' and vencimento <= '$dataFinal') order by id asc");
	}


	$dados = $res->fetchAll(PDO::FETCH_ASSOC);

	//TOTALIZAR OS REGISTROS PARA PAGINAÇÃO
		$res_todos = $pdo->query("SELECT * from contas_receber");
		$dados_total = $res_todos->fetchAll(PDO::FETCH_ASSOC);
		$num_total = count($dados_total);

		//DEFINIR O TOTAL DE PAGINAS
		$num_paginas = ceil($num_total/$itens_por_pagina);

		if(@count($dados) > 0){



echo '
<table class="table table-sm mt-3 tabelas">
	<thead class="thead-light">
		<tr>
		<th scope="col">Paciente</th>
			<th scope="col">Descrição</th>
			<th scope="col">Valor</th>
			<th scope="col">Vencimento</th>
			<th scope="col">Forma PGTO</th>
		
			<th scope="col">Baixa</th>
		</tr>
	</thead>
	<tbody>';

	
	    


	for ($i=0; $i < count($dados); $i++) { 
			foreach ($dados[$i] as $key => $value) {
			}

			$id = $dados[$i]['id'];	
			$descricao = $dados[$i]['descricao'];
			$valor = $dados[$i]['valor'];
			$vencimento = $dados[$i]['vencimento'];
			$data_baixa = $dados[$i]['data_baixa'];
			$forma_pgto = $dados[$i]['forma_pgto'];
			$tipo_pgto = $dados[$i]['tipo_pgto'];
			$cpf_paciente_r = $dados[$i]['paciente'];
			$id_consulta = $dados[$i]['id_consulta'];

			$data2 = implode('/', array_reverse(explode('-', $vencimento)));

			if($forma_pgto == ''){
				$forma_pgto = 'Pendente';
			}


			//RECUPERAR O ID DO PACIENTE
			$res_p = $pdo->query("select * from consultas where id = '$id_consulta'");
			$dados_p = $res_p->fetchAll(PDO::FETCH_ASSOC);
			$id_paciente= $dados_p[0]['paciente'];


			if($cpf_paciente_r == ""){
				$nome_paciente= 'Erro ao procurar nome';

				}else{
				//RECUPERAR O CPF DO PACIENTE
				$res_cpf = $pdo->query("select * from pacientes where cpf = '$cpf_paciente_r'");
				$dados_cpf = $res_cpf->fetchAll(PDO::FETCH_ASSOC);
				$nome_paciente= $dados_cpf[0]['nome'];
				}
			
			
			//RECUPERAR O NOME DO ATENDIMENTO
			$res_desc = $pdo->query("select * from atendimentos where id = '$descricao'");
			$dados_desc = $res_desc->fetchAll(PDO::FETCH_ASSOC);
			$atendimento= $dados_desc[0]['descricao'];

echo '
		<tr>

			<td>'.$nome_paciente.'</td>
			<td>'.$atendimento.'</td>
			<td>'.$valor.'</td>
			<td>'.$data2.'</td>
			
			<td>'.$forma_pgto.'</td>
			';


			if($forma_pgto != 'Pendente'){
					if($forma_pgto == 'Depois'){echo '<td>
				<a href="index.php?acao=receber&funcao=editar&id='.$id.'&id_consulta='.$id_consulta.'"><i class="fas fa-check-circle text-success" title="Dar Baixa" ></i></a>
				<a title="Excluir Conta" href="index.php?acao='.$pagina.'&funcao=excluir&id='.$id.'"><i class="far fa-trash-alt text-danger"></i></a>';
				
				}else{
					echo '<td>
				Já Pago!<a title="Excluir Conta" href="index.php?acao='.$pagina.'&funcao=excluir&id='.$id.'"><i class="far fa-trash-alt text-danger"></i></a>
				
			</td>';
				}

			
				
			}else{
				
				echo '<td>
				
				<a href="index.php?acao=receber&funcao=editar&id='.$id.'&id_consulta='.$id_consulta.'"><i class="fas fa-check-circle text-success" title="Dar Baixa" ></i></a>
				<a href="index.php?acao=receber&funcao=editar&id='.$id.'&id_consulta='.$id_consulta.'"><i class="fas fa-comments-dollar text-danger" title="Pagar Depois"></i></a>
				<a title="Excluir Conta" href="index.php?acao='.$pagina.'&funcao=excluir&id='.$id.'"><i class="far fa-trash-alt text-danger"></i></a>
			</td>';
			}

			
		echo 	
		'</tr>';

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


}else{
	echo '<br><p>Não existem contas a receber nessa data!</p>';
}


?>