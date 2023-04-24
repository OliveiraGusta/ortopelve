<?php 
@session_start();
require_once("../../conexao.php");
$pagina = 'exercicios';

$txtbuscar = @$_POST['txtbuscar'];
$cbmedicos = @$_POST['cbmedicos'];
$id_pac = $_SESSION['id_paciente'];
$id_paciente = $_SESSION['id_paciente'];


if($cbmedicos == ''){
	$res = $pdo->query("SELECT * from medicos order by nome asc");
	$dados = $res->fetchAll(PDO::FETCH_ASSOC);
	$linhas = count($dados);
	if($linhas > 0){
	$cbmedicos = $dados[0]['id'];
	}

}


$classebtn = 'btn-success';

echo '<div class="quadro quadroExercicio">';



//APLICAR ESSA LOGICA EM UMA LISTAGEM DE EXERCICOS

//[X] LISTAR EXERCICOS
$res_e = $pdo->query("SELECT * from exercicios");
$dados_e = $res_e->fetchAll(PDO::FETCH_ASSOC);
$linhas_e = count($dados_e);

for($i=0; $i < $linhas_e; $i++){
foreach ($dados_e[$i] as $key => $value){	}

// [X] LISTAGEM DAS INFORMAÇÕES NA COLUMNA
$nome_exercicio = $dados_e[$i]['nome_exercicio'];
$des_exercicio = $dados_e[$i]['des_exercicio'];
$arquivo_exercicio = $dados_e[$i]['arquivo_exercicio'];




// [] CONSULTAR NO BANCO DE DADOS SE O EXERCICO JA FOI EMPREGADO


$res_valor = $pdo->query("SELECT * from exercicios_pacientes where id_paciente = '$id_pac' and id_medico = '$cbmedicos' and nome_exercicio = '$nome_exercicio'");
	$dados_valor = $res_valor->fetchAll(PDO::FETCH_ASSOC);
	$linhas = count($dados_valor);

	if($linhas > 0){

		$classebtn = 'btn-danger';
		$disabled = 'disabled';

	}else{
		$classebtn = 'btn-success';
		$disabled = '';
	}



	

echo "<div class='row mx-1'>";
echo "<div class='col-lg-6 col-md-6 col-sm-6 mb-2'>";
		echo "<div class='card shadow h-100'>";
			echo "<div class='card-body '>";
				echo "<div class='row no-gutters align-items-center py-1'>";
				echo "<div class='col-auto' align='center'>";
					echo "<div class='col mr-2'>";
					echo "<img class='col-auto mb-10' src='../exercicios/$arquivo_exercicio' width='250px'>";	
					echo "<div class='text-xs font-weight-bold  text-primary text-uppercase'>".$nome_exercicio."</div><br>";
					echo "<div class='text-xs text-secondary'>".$des_exercicio." </div><br>";
					echo '<button class="btn btn-success mr-2 mb-2" id="btn-hora" onclick="exercicio()"><i class="fas fa-dumbbell"></i></button>';
					echo "</div>";
					echo "</div>";
				echo "</div>";
			echo "</div>";
		echo "</div>";
	echo "</div>";

	}

echo "</div>";

echo '
</div>
';




?>



<script >
	function exercicio() {
	
		var id_paciente = document.getElementById("txtidpac").value; //ID PACIENTE
		var id = document.getElementById("id").value;	 //ID PACIENTE
		var data = document.getElementById("txtbuscar").value; //DATA 
		var medico = document.getElementById("cbmedicos").value; //ID MEDICO


			document.getElementById('data').value = data;
			document.getElementById('medico').value = medico;

			if(id_paciente == ''){
				document.getElementById('txtid').value = id;
			}else{
				document.getElementById('txtid').value = id_paciente;
			}
			



			if (id == '' && id_paciente == ''){
				alert('Escolha o Paciente');
			}else{
				$("#modal").modal("show");
				document.getElementById("mensagem").style.display = "none";
			}
		
	}
</script>




