<?php 
@session_start();

$nome_usuario = $_SESSION['nome_usuario'];
$email_usuario = $_SESSION['email_usuario'];

//BUSCAR O CPF DO USUÁRIO LOGADO (NESSE CASO UM TESOUREIRO)
$res_excluir = $pdo->query("select * from funcionarios where email = '$email_usuario'");
$dados_excluir = $res_excluir->fetchAll(PDO::FETCH_ASSOC);
$cpf_medico = $dados_excluir[0]['cpf'];

$pagina = 'movimentacoes';
$pagina_ajax = 'movimentacoes';
$agora = date('Y-m-d');
//SUBTRAIR MENOS UM MES A DATA DO INICIO DA BUSCA

$agora_format = explode('-', $agora);
///Data do inicio da busca
$data_inicio_busca = $agora_format[0]."-".
//Mes alterado
$mes_inicio_busca = str_pad($mes_inicio_busca = $agora_format[1] - 1 , 2 , '0' , STR_PAD_LEFT)."-".
//Ano do inicio da busca
$agora_format[2]; ?>



<style type="text/css">
	.carregando{
		color:#ff0000;
		display:none;
	}
</style>

<h4>Relatório de Movimentações Financeiras </h4>
<span class="text-muted">Listagem de Entradas e Saídas, sinta-se a vontade para filtrar por período ou tipo.</span><br>

<div class="row botao-novo">
	<div class="col-md-12">
		
	</div>
</div>

<div class="row mt-4">
	<div class="col-md-3 col-sm-12">
		<div class="float-left">
			<form action="rel/rel_mov_class.php" method="POST" target="_blank">
				<i class="fas fa-book text-info"></i>
				<input class="form-control form-control-sm mr-sm-2" type="hidden" name="dataInicialPost" id="dataInicialPost" >
				<input class="form-control form-control-sm mr-sm-2" type="hidden" name="dataFinalPost" id="dataFinalPost">
				<input class="form-control form-control-sm mr-sm-2" type="hidden" name="tipo" id="tipo">
				<input class="form-control form-control-sm mr-sm-2" type="hidden" name="cpf_medicoPost" id="cpf_medicoPost">
				<input class="form-control form-control-sm mr-sm-2" type="hidden" name="cb-paciente-pdf" id="cb-paciente-pdf">
				<button class="botao-link text-info">Relatório</button>
			</form>

			
		</div>

	</div>


	<div class="col-md-9 col-sm-12">

		<div class="float-right mr-4">
			<form id="frm" class="form-inline my-2 my-lg-0" method="post">
			<form id="frm" class="form-inline my-2 my-lg-0" method="post">
			<select data-width="280px" class="form-control form-control-sm mr-2 sel2" name="cb-paciente" id="cb-paciente">
				
				<option value="todos">Todos os Registros</option>
				<?php 
				//TRAZER TODOS OS REGISTROS DE PACIENTES
				$res = $pdo->query("SELECT * from pacientes WHERE medico_resp = '$nome_usuario'  order by nome asc ");
				$dados = $res->fetchAll(PDO::FETCH_ASSOC);

				for ($i=0; $i < count($dados); $i++) { 
					foreach ($dados[$i] as $key => $value) {
					}
					$cpf = $dados[$i]['cpf'];	
					$nome = $dados[$i]['nome'];
					$id = $dados[$i]['id'];

					$cpf_get = @$_GET['cpf'];
					if($cpf_get == $cpf){
						$selec = 'selected';
					}else{
						$selec = '';
					}

					echo '<option '.$cpf.' value="'.$cpf.'">'.$nome.' - '.$cpf.'</option>';

				}
				?>
			</select>

				<input type="hidden" id="pag"  name="pag" value="<?php echo @$_GET['pagina'] ?>">

				<input type="hidden" id="itens"  name="itens" value="<?php echo @$itens_por_pagina; ?>">
				<input type="hidden" id="endereco_medico"  name="endereco_medico" value="<?php echo @$endereco_medico; ?>">


				<select class="form-control form-control-sm mr-4" id="txtbuscar" name="txtbuscar">

					<option value="">Entradas e Saídas</option>
					<option value="Entrada">Entradas</option>

					<option value="Saída">Saídas</option>

				</select>

				<input class="form-control form-control-sm mr-sm-2" type="date" name="dataInicial" id="dataInicial" value="<?php echo $data_inicio_busca ?>">

				<input class="form-control form-control-sm mr-sm-2" type="date" name="dataFinal" id="dataFinal" value="<?php echo $agora ?>">



				<input type="hidden" class="form-control form-control-sm mr-sm-2" name="cpf_medico" id="cpf_medico" value="<?php echo $cpf_medico ?>">

				<button style="display: none" class="btn btn-outline-secondary btn-sm my-2 my-sm-0" name="btn-buscar" id="btn-buscar"><i class="fas fa-search"></i></button>
				
			</form>
		</div>
		
	</div>

	
</div>


<div id="listar">
	
</div>



<!--CHAMADA DA MODAL DELETAR -->
<?php 
if(@$_GET['funcao'] == 'excluir' && @$item_paginado == ''){ 
	$id = $_GET['id'];
	?>

    <div class="modal" id="modal-deletar" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Excluir Registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <p>Deseja realmente Excluir este Registro?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        id="btn-cancelar-excluir">Cancelar</button>
                    <form method="post">
                        <input type="hidden" id="id" name="id" value="<?php echo @$id ?>" required>

                        <button type="button" id="btn-deletar" name="btn-deletar"
                            class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php } ?>

	<script>
    $('#modal-deletar').modal("show");
    </script>




<!--AJAX PARA BUSCAR OS DADOS -->
<script type="text/javascript">
	$(document).ready(function(){

		var pag = "<?=$pagina?>";
		$('#btn-buscar').click(function(event){
			event.preventDefault();	

			$.ajax({
				url: pag + "/listar.php",
				method: "post",
				data: $('form').serialize(),
				dataType: "html",
				success: function(result){
					$('#listar').html(result)

				},


			})

		})


	})
</script>




<!--AJAX PARA LISTAR OS DADOS -->
<script type="text/javascript">
	$(document).ready(function(){

		var pag = "<?=$pagina?>";

		$.ajax({
			url: pag + "/listar.php",
			method: "post",
			data: $('#frm').serialize(),
			dataType: "html",
			success: function(result){
				$('#listar').html(result)

			},


		})
	})
</script>


<!--AJAX PARA BUSCAR OS DADOS PELA TXT -->
<script type="text/javascript">
	$('#txtbuscar').change(function(){
		$('#btn-buscar').click();
		document.getElementById('tipo').value = document.getElementById('txtbuscar').value;
	})
</script>

<!--AJAX PARA BUSCAR OS DADOS PELA PACIENTE -->
<script type="text/javascript">
	$('#cb-paciente').change(function(){
		$('#btn-buscar').click();
		document.getElementById('cb-paciente-pdf').value = document.getElementById('cb-paciente').value;
	})
</script>







<!--AJAX PARA ENVIAR OS DADOS DA DATA INICIAL -->
<script type="text/javascript">
	$('#dataInicial').change(function(){
		$('#btn-buscar').click();
		document.getElementById('dataInicialPost').value = document.getElementById('dataInicial').value;
	})
</script>


<!--AJAX PARA ENVIAR OS DADOS DA DATA FINAL -->
<script type="text/javascript">
	$('#dataFinal').change(function(){
		$('#btn-buscar').click();
		document.getElementById('dataFinalPost').value = document.getElementById('dataFinal').value;
	})
</script>


<!--AJAX PARA ENVIAR OS DADOS DO NOME DO MEDICO -->
<script type="text/javascript">
	$('#cpf_medico').change(function(){
		$('#btn-buscar').click();
		document.getElementById('cpf_medicoPost').value = document.getElementById('cpf_medico').value;
	})
</script>







<!--AJAX PARA EXCLUSÃO DOS DADOS -->
<script type="text/javascript">
    $(document).ready(function() {
        var pag = "<?=$pagina_ajax?>";
        $('#btn-deletar').click(function(event) {
            event.preventDefault();

            $.ajax({
                url: pag + "/excluir.php",
                method: "post",
                data: $('form').serialize(),
                dataType: "text",
                success: function(mensagem) {

                    $('#txtbuscar').val('')
                    $('#btn-cancelar-excluir').click();

                    $('#btn-buscar').click();
                    $('#btn-fechar').click();


                },

            })
        })
    })
</script>

 