<?php

@session_start();

$email_usuario = $_SESSION['email_usuario'];
$agora = date('d/m/Y');



//PEGAR CPF DO MEDICO
$res_medico = $pdo->query("select * from medicos where email = '$email_usuario'");
$dados_medico = $res_medico->fetchAll(PDO::FETCH_ASSOC);
$cpf_medico = $dados_medico[0]['cpf'];


$res = $pdo->query("SELECT * from movimentacoes WHERE tesoureiro LIKE '$cpf_medico' and MONTH(movimentacoes.data) = MONTH(CURRENT_DATE())");
$dados = $res->fetchAll(PDO::FETCH_ASSOC);

$total_entradas = 0;
$total_saidas = 0;

for ($i = 0; $i < count($dados); $i++) {
	foreach ($dados[$i] as $key => $value) {
	}

	$id = $dados[$i]['id'];
	$tipo = $dados[$i]['tipo'];
	$valor = $dados[$i]['valor'];
	

	if ($tipo == 'Entrada') {
		@$total_entradas = $total_entradas + $valor;
	} else {
		@$total_saidas = $total_saidas + $valor;
	}

}

@$total = @$total_entradas - @$total_saidas;
$total = number_format($total, 2, ',', '.');
$total_entradas = number_format($total_entradas, 2, ',', '.');
$total_saidas = number_format($total_saidas, 2, ',', '.');

?>
<h4>Relatório Financeiros do Mês</h4>
<span class="text-muted">Entradas, Saídas e o Balanço juntos.</span><br><br>
<div class="area_cards">
	<div class="row">

		<div class="col-sm-12 col-lg-4 col-md-6 col-sm-6 mb-4">
			<div class="card card-stats">
				<div class="card-body ">
					<div class="row">
						<div class="col-5 col-md-4">
							<div class="icone-card text-center text-success">
								<i class="far fa-money-bill-alt"></i>
							</div>
						</div>
						<div class="col-7 col-md-8">
							<div class="numbers">
								<p class="titulo-card">Total Entradas</p>
								<p class="subtitulo-card"><small><small>R$
											<?php echo @$total_entradas ?>
										</small></small>
								<p>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer rodape-card">
					Entradas do Mês

				</div>
			</div>
		</div>


		<div class="col-lg-4 col-md-6 col-sm-6 mb-4">
			<div class="card card-stats">
				<div class="card-body ">
					<div class="row">
						<div class="col-5 col-md-4">
							<div class="icone-card text-center text-danger">
								<i class="far fa-money-bill-alt"></i>
							</div>
						</div>
						<div class="col-7 col-md-8">
							<div class="numbers">
								<p class="titulo-card">Total Saídas</p>
								<p class="subtitulo-card"><small><small>R$
											<?php echo @$total_saidas ?>
										</small></small>
								<p>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer rodape-card">
					Saídas do Mês

				</div>
			</div>
		</div>


		<div class="col-lg-4 col-md-6 col-sm-6 mb-4">
			<div class="card card-stats">
				<div class="card-body ">
					<div class="row">
						<div class="col-5 col-md-4">
							<?php
							if ($total > 0) {
								echo '<div class="icone-card text-center text-success">';
							} else {
								echo '<div class="icone-card text-center text-danger">';
							}
							?>


							<i class="fas fa-coins"></i>
						</div>
					</div>
					<div class="col-7 col-md-8">
						<div class="numbers">
							<p class="titulo-card">Saldo Total</p>
							<p class="subtitulo-card"><small><small>R$
										<?php echo @$total ?>
									</small></small>
							<p>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer rodape-card">

				Total do Mês
			</div>
		</div>
	</div>

</div>
</div>











<div class="mt-4">
	<span class="text-muted">Ultimas Movimentações Mensais de
		<?php
		$agoraF = explode('/', $agora);

		switch ($agoraF[1]) {
			case 01:
				echo "Janeiro";
				break;
			case 02:
				echo "Fevereiro";
				break;
			case 03:
				echo "Março";
				break;
			case 04:
				echo "Abril";
				break;
			case 05:
				echo "Maio";
				break;
			case 06:
				echo "Junho";
				break;
			case 07:
				echo "Julho";
				break;
		}

		switch ($agoraF[1]) {
			/*
			case 08:
				echo "Agosto";
				break;
			case 09:
				echo "Setembro";
				break;
				*/
			case 10:
				echo "Outubro";
				break;
			case 11:
				echo "Novembro";
				break;
			case 12:
				echo "Dezembro";
				break;
		}
		?>
	</span>
	<table class="table table-sm mt-3 tabelas">
		<thead class="thead-light">
			<tr>
				<th scope="col">Tipo</th>
				<th scope="col">Movimento</th>
				<th scope="col">Aguardando Pagamento</th>
				<th scope="col">Data</th>
				<th scope="col">Valor</th>



			</tr>
		</thead>
		<tbody>



			<?php
			$res = $pdo->query("SELECT * from movimentacoes WHERE tesoureiro LIKE '$cpf_medico' and MONTH(movimentacoes.data) = MONTH(CURRENT_DATE()) order by id desc");

			$dados = $res->fetchAll(PDO::FETCH_ASSOC);

			for ($i = 0; $i < count($dados); $i++) {
				foreach ($dados[$i] as $key => $value) {
				}

				$id = $dados[$i]['id'];
				$tipo = $dados[$i]['tipo'];
				$valor = $dados[$i]['valor'];
				$data = $dados[$i]['data'];
				$movimento = $dados[$i]['movimento'];
				$tesoureiro = $dados[$i]['tesoureiro'];
				$data2 = implode('/', array_reverse(explode('-', $data)));
				$aguardando_pagamento = $dados[$i]['aguardando_pagamento'];
	
	if($aguardando_pagamento == 'Sim'){
		$aguardando_pagamento2 = "Sim";
	}else{
		$aguardando_pagamento2 = "Não";
	}
	


				?>
				<tr>


					<td>
						<?php echo $tipo ?>
					</td>

					<td>
						<?php echo $movimento ?>
					</td>
					
					<td>
						<?php echo $aguardando_pagamento2 ?>
					</td>
					
					<td>
						<?php echo $data2 ?>
					</td>
					<td>R$
						<?php echo $valor ?>
					</td>



				</tr>
			<?php } ?>


		</tbody>
	</table>

</div>

</div>