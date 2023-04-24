<?php 
@session_start();
require_once("../../conexao.php");
$pagina = 'consultas';

$id = $_POST['id_consulta'];


//ATUALIZAR ITEM DA PRESCRICAO
$res = $pdo->query("SELECT * from prescricao where id_consulta = '$id' order by id desc");
$dados = $res->fetchAll(PDO::FETCH_ASSOC);
$item = @$dados[0]['data'];



echo '
<table class="table table-sm tabelas mt-3">
<thead class="thead-light">
<tr>
<th scope="col">Data</th>
<th scope="col">Evolução</th>
<th scope="col">Excluir</th>
</tr>
</thead>
<tbody>';


$email_medico = $_SESSION['email_usuario'];


$res_espec = $pdo->query("SELECT * from prescricao where id_consulta = '$id'");
$dados_espec = $res_espec->fetchAll(PDO::FETCH_ASSOC);


for ($i=0; $i < count($dados_espec); $i++) { 
	foreach ($dados_espec[$i] as $key => $value) {
	}

	$data_evolucao = $dados_espec[$i]['data_evolucao'];	
  	$data2 = implode('/', array_reverse(explode('-', $data_evolucao)));
	$evolucao = $dados_espec[$i]['evolucao'];
	$id_prescricao = $dados_espec[$i]['id'];

	echo '
	<tr>


	<td>'.$data2.'</td>
	<td>'.$evolucao.'</td>
	
	
	
	<td>';

	if($i == (count($dados_espec) -1 )){
		echo '

		<form method="post">
		<input type="hidden" id="id_prescricao"  name="id_prescricao" value="'.$id_prescricao.'">

		<button id="'.$id_prescricao.'" name="btn-excluir-prescricao" class="botao-link"><i class="far fa-trash-alt text-danger"></i></button>

		</form>';

	}

	echo '
	
	</td>
	
	</tr>


	
	';

	

}

echo  '
</tbody>
</table> ';




?>





<!--AJAX PARA EXCLUSÃO DOS DADOS -->
<script type="text/javascript">
	$(document).ready(function(){
		var pag = "<?=$pagina?>";
		var idpresc = "<?=$id_prescricao?>";
		$('#' + idpresc).click(function(event){
			event.preventDefault();
			
			$.ajax({
				url: pag + "/excluir-prescricao.php",
				method: "post",
				data: $('form').serialize(),
				dataType: "text",
				success: function(mensagem){

					
					$('#btn-buscar').click();
					document.getElementById('item').value = document.getElementById('num_item').value;
					document.getElementById('remedio').focus();

				},
				
			})
		})
	})
</script>