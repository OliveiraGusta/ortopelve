<?php
@session_start();

$nome_paciente = $_SESSION['nome_usuario'];
$id_medico= $_SESSION['id_medico'];
$nome_medico = $_SESSION['medico_resp'];

$pagina = 'consultas'; 
$pagina_ajax = 'consultas';
$agora = date('Y-m-d');

?>
<h4>Área de Consultas</h4>
<span class="text-muted">Aqui você tem todo controle das suas consultas já agendadas.</span><br>

<div class="row botao-novo">
    <div class="col-md-12">


    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6 col-sm-12">
        <div class="float-left">

        </div>

    </div>


    <div class="col-md-6 col-sm-12">
        <div class="float-right mr-4">
            
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



<!--CHAMADA DA MODAL CONSULTANDO -->
<?php 
if(@$_GET['funcao'] == 'consultando'){ 
	$id = $_GET['id'];
	?>

<div class="modal" id="modal-consultando" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Status Consultando</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <p>Deseja realmente Mudar o Status para Consultando?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-fechar">Cancelar</button>
                <form method="post">
                    <input type="hidden" id="id" name="id" value="<?php echo @$id ?>" required>

                    <button type="button" id="btn-consultando" name="btn-consultando"
                        class="btn btn-success">Alterar</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php } ?>



<script>
$('#modal-consultando').modal("show");
</script>






<!--CHAMADA DA MODAL FINALIZADA -->
<?php 
if(@$_GET['funcao'] == 'finalizar'){ 
	$id = $_GET['id'];
	?>

<div class="modal" id="modal-finalizar" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Status Finalizada</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <p>Deseja realmente Mudar o Status para Finalizada?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-fechar">Cancelar</button>
                <form method="post">
                    <input type="hidden" id="id" name="id" value="<?php echo @$id ?>" required>

                    <button type="button" id="btn-finalizar" name="btn-finalizar"
                        class="btn btn-success">Alterar</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php } ?>



<script>
$('#modal-finalizar').modal("show");
</script>







<!--CHAMADA DA MODAL RELATÓRIO DE ATESTADO -->
<?php 
if(@$_GET['funcao'] == 'atestado'){ 
	$id = $_GET['id'];
	?>

<div class="modal" id="modal-atestado" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Gerar Atestado para
				<?php
				if(@$_GET['funcao'] == 'atestado'){ 

				//BUSCAR ID DO PACIENTE PELA CONSULTA
				$resEvolucao = $pdo->query("select * from consultas where id = '$id'");
				$dadosEvolucao = $resEvolucao->fetchAll(PDO::FETCH_ASSOC);
				$id_paciente_evolucao = $dadosEvolucao[0]['paciente'];


				//BUSCAR NOME DO PACIENTE PELO ID
				$resEvolucao = $pdo->query("select * from pacientes where id = '$id_paciente_evolucao'");
				$dadosEvolucao = $resEvolucao->fetchAll(PDO::FETCH_ASSOC);
				$nome_paciente_evolucao = $dadosEvolucao[0]['nome'];
				$cpf_paciente_evolucao = $dadosEvolucao[0]['cpf'];

				echo @$nome_paciente_evolucao." - ".@$cpf_paciente_evolucao;
				 }?></h5>

				</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post">
                    <input class="form-control form-control-sm mr-sm-2" type="hidden" name="dataFinalPost"
                        id="dataFinalPost">


                    <div class="form-group">
                        <label for="exampleFormControlInput1">Dias</label>
                        <input class="form-control form-control-sm mr-sm-2" type="text" name="dias" id="dias" required>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-fechar">Cancelar</button>

                <input type="hidden" id="id" name="id" value="<?php echo @$id ?>" required>

                <button type="button" id="btn-atestado" name="btn-atestado" class="btn btn-success">Gerar</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php } ?>


<script>
$('#modal-atestado').modal("show");
</script>



<!--CHAMADA DA MODAL RELATÓRIO DE PRESCRICAO, NOVO EVOLUCAO -->
<?php 
if(@$_GET['funcao'] == 'prescricao'){ 
	$id = $_GET['id'];

	?>

<div class="modal" id="modal-prescricao" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Gerar Evolução para 
				<?php
				if(@$_GET['funcao'] == 'prescricao'){ 

				//BUSCAR ID DO PACIENTE PELA CONSULTA
				$resEvolucao = $pdo->query("select * from consultas where id = '$id'");
				$dadosEvolucao = $resEvolucao->fetchAll(PDO::FETCH_ASSOC);
				$id_paciente_evolucao = $dadosEvolucao[0]['paciente'];


				//BUSCAR NOME DO PACIENTE PELO ID
				$resEvolucao = $pdo->query("select * from pacientes where id = '$id_paciente_evolucao'");
				$dadosEvolucao = $resEvolucao->fetchAll(PDO::FETCH_ASSOC);
				$nome_paciente_evolucao = $dadosEvolucao[0]['nome'];
				$cpf_paciente_evolucao = $dadosEvolucao[0]['cpf'];

				echo @$nome_paciente_evolucao." - ".$cpf_paciente_evolucao;
				 }?>
				</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post">
                    <input class="form-control form-control-sm mr-sm-2" type="hidden" name="dataFinalPost"
                        id="dataFinalPost">

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Data</label>
                                <input class="form-control form-control-sm mr-sm-2" type="date" name="data_evolucao"
                                    id="data_evolucao" required>
                            </div>


                        </div>

                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Evolução</label>
                                <input class="form-control form-control-sm mr-sm-2" type="text" name="evolucao"
                                    id="evolucao" required>
                            </div>
                        </div>
                    </div>





                    <div id="listar-prescricao">

                    </div>


                    <div id="mensagem" class="">

                    </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-fechar">Cancelar</button>

                <input type="hidden" id="id_consulta" name="id_consulta" value="<?php echo @$id ?>" required>

                <button type="button" id="btn-prescricao" name="btn-prescricao" class="btn btn-success">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php } ?>


<script>
$('#modal-prescricao').modal("show");
</script>


<!--CHAMADA DA MODAL RELATÓRIO DE RECEITA -->
<?php 
if(@$_GET['funcao'] == 'receita'){ 
	$id = $_GET['id'];
	?>

<div class="modal" id="modal-receita" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Gerar Receita para 
					<?php
				if(@$_GET['funcao'] == 'receita'){ 

				//BUSCAR ID DO PACIENTE PELA CONSULTA
				$resEvolucao = $pdo->query("select * from consultas where id = '$id'");
				$dadosEvolucao = $resEvolucao->fetchAll(PDO::FETCH_ASSOC);
				$id_paciente_evolucao = $dadosEvolucao[0]['paciente'];


				//BUSCAR NOME DO PACIENTE PELO ID
				$resEvolucao = $pdo->query("select * from pacientes where id = '$id_paciente_evolucao'");
				$dadosEvolucao = $resEvolucao->fetchAll(PDO::FETCH_ASSOC);
				$nome_paciente_evolucao = $dadosEvolucao[0]['nome'];
				$cpf_paciente_evolucao = $dadosEvolucao[0]['cpf'];

				echo @$nome_paciente_evolucao." - ".$cpf_paciente_evolucao;
				 }?></h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post">
                    <input class="form-control form-control-sm mr-sm-2" type="hidden" name="dataFinalPost"
                        id="dataFinalPost">

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Item</label>
                                <input class="form-control form-control-sm mr-sm-2" type="number" name="item_receita"
                                    id="item_receita" required>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Remédio</label>
                                <input class="form-control form-control-sm mr-sm-2" type="text" name="remedio"
                                    id="remedio" required>
                            </div>
                        </div>
                    </div>





                    <div id="listar-receita">

                    </div>


                    <div id="mensagem" class="">

                    </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-fechar">Cancelar</button>

                <input type="hidden" id="id_consulta" name="id_consulta" value="<?php echo @$id ?>" required>

                <button type="button" id="btn-receita" name="btn-receita" class="btn btn-success">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php } ?>


<script>
$('#modal-receita').modal("show");
</script>


<?php 
if(@$_GET['funcao'] == 'editar'){ 
	$id_reg = $_GET['id'];
	?>
<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
					<?php if(@$_GET['funcao'] == 'editar'){

						$nome_botao = 'Editar';

					//BUSCAR DADOS DO REGISTRO A SER EDITADO
						$res = $pdo->query("select * from pacientes where id = '$id_reg'");
						$dados = $res->fetchAll(PDO::FETCH_ASSOC);
						$nome = $dados[0]['nome'];
						$cpf = $dados[0]['cpf'];
						$rg = $dados[0]['rg'];
						$telefone = $dados[0]['telefone'];
						$email = $dados[0]['email'];
						$data = $dados[0]['data_nasc'];
						$idade = $dados[0]['idade'];
						$civil = $dados[0]['civil'];
						$sexo_identifica = $dados[0]['sexo_identifica'];
						$endereco = $dados[0]['endereco'];
						$obs = $dados[0]['obs'];


						echo 'Dados do Paciente';
					}else{
						$nome_botao = 'Salvar';
						echo 'Dados do Paciente';
					} ?>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <form method="post">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">

                                <input type="hidden" id="id" name="id" value="<?php echo @$id_reg ?>" required>

                                <input type="hidden" id="campo_antigo" name="campo_antigo" value="<?php echo @$cpf ?>"
                                    required>


                                <label for="exampleFormControlInput1">Nome</label>
                                <input type="text" class="form-control" id="nome" placeholder="Insira o Nome "
                                    name="nome" value="<?php echo @$nome ?>" disabled>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">CPF</label>
                                <input type="text" class="form-control" id="cpf" placeholder="Insira o CPF " name="cpf"
                                    value="<?php echo @$cpf ?>" disabled>
                            </div>
                        </div>

                    </div>



                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">RG</label>
                                <input type="text" class="form-control" id="rg" placeholder="Insira o RG " name="rg"
                                    value="<?php echo @$rg ?>" disabled>
                            </div>

                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Telefone</label>
                                <input type="text" class="form-control" id="telefone" placeholder="Insira o Telefone "
                                    name="telefone" value="<?php echo @$telefone ?>" disabled>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Email</label>
                                <input type="email" class="form-control" id="telefone" placeholder="Insira o Email "
                                    name="email" value="<?php echo @$email ?>" disabled>
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-4">
                            <label for="exampleFormControlSelect1">Estado Civil</label>
                            <input type="text" class="form-control" id="civil" placeholder="Insira o Email "
                                name="civil" value="<?php echo @$civil ?>" disabled>
                        </div>
                        <div class="col-md-4">
                            <label for="exampleFormControlSelect1">Se identifica como</label>
                            <input type="text" class="form-control" id="sexo_identifica" placeholder="Se identifica como? " name="sexo_identifica"
                                value="<?php echo @$sexo_identifica ?>" disabled>

                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Idade</label>
                                <input type="text" class="form-control" id="idade" placeholder="Insira o Email "
                                    name="idade" value="<?php echo @$idade ?>" disabled>
                            </div>
                        </div>



                    </div>







                    <div id="mensagem" class="">

                    </div>

            </div>
            <div class="modal-footer">
                <button id="btn-fechar" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                <button type="submit" name="<?php echo $nome_botao ?>" id="<?php echo $nome_botao ?>"
                    class="btn btn-primary"><?php echo $nome_botao ?></button>

            </div>
            </form>
        </div>
    </div>
</div>


<?php 	} ?>

<script>
$('#modal').modal("show");
</script>






<!--AJAX PARA BUSCAR OS DADOS -->
<script type="text/javascript">
$(document).ready(function() {

    var pag = "<?=$pagina?>";
    $('#btn-buscar').click(function(event) {
        event.preventDefault();

        $.ajax({
            url: pag + "/listar.php",
            method: "post",
            data: $('form').serialize(),
            dataType: "html",
            success: function(result) {
                $('#listar').html(result)

            },


        })

    })


})
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
$(document).ready(function() {

    var pag = "<?=$pagina?>";

    $.ajax({
        url: pag + "/listar.php",
        method: "post",
        data: $('#frm').serialize(),
        dataType: "html",
        success: function(result) {
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

<!--AJAX PARA BUSCAR OS DADOS PELA PACINTE -->
<script type="text/javascript">
	$('#cb-paciente').change(function(){
		$('#btn-buscar').click();
		document.getElementById('tipo').value = document.getElementById('cb-paciente').value;
	})
</script>



<!--AJAX PARA BUSCAR OS DADOS PELA DATA INICIAL -->
<script type="text/javascript">
	$('#dataInicial').change(function(){
		$('#btn-buscar').click();
		document.getElementById('dataInicialPost').value = document.getElementById('dataInicial').value;
	})
</script>


<!--AJAX PARA BUSCAR OS DADOS PELA DATA FINAL -->
<script type="text/javascript">
	$('#dataFinal').change(function(){
		$('#btn-buscar').click();
		document.getElementById('dataFinalPost').value = document.getElementById('dataFinal').value;
	})
</script>

<!--AJAX PARA EDIÇÃO DO STATUS DA CONSULTA PARA CONSULTANDO -->
<script type="text/javascript">
$(document).ready(function() {
    var pag = "<?=$pagina?>";
    $('#btn-consultando').click(function(event) {
        event.preventDefault();

        $.ajax({
            url: pag + "/consultando.php",
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(mensagem) {

                $('#mensagem').removeClass()

                if (mensagem == 'Editado com Sucesso!!') {

                    $('#mensagem').addClass('mensagem-sucesso')
                    $('#btn-fechar').click();
                    $('#btn-buscar').click();

                } else {

                    $('#mensagem').addClass('mensagem-erro')
                }

                $('#mensagem').text(mensagem)

            },

        })
    })
})
</script>




<!--AJAX PARA EDIÇÃO DO STATUS DA CONSULTA PARA FINALIZADA -->
<script type="text/javascript">
$(document).ready(function() {
    var pag = "<?=$pagina?>";
    $('#btn-finalizar').click(function(event) {
        event.preventDefault();

        $.ajax({
            url: pag + "/finalizar.php",
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(mensagem) {

                $('#mensagem').removeClass()

                if (mensagem == 'Editado com Sucesso!!') {

                    $('#mensagem').addClass('mensagem-sucesso')
                    $('#btn-fechar').click();
                    $('#btn-buscar').click();





                } else {

                    $('#mensagem').addClass('mensagem-erro')
                }

                $('#mensagem').text(mensagem)

            },

        })
    })
})
</script>




<!--AJAX PARA EDIÇÃO DAS OBS DO PACIENTE -->
<script type="text/javascript">
$(document).ready(function() {
    var pag = "<?=$pagina?>";
    $('#Editar').click(function(event) {
        event.preventDefault();

        $.ajax({
            url: pag + "/editar.php",
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(mensagem) {

                $('#mensagem').removeClass()

                if (mensagem == 'Editado com Sucesso!!') {

                    $('#mensagem').addClass('mensagem-sucesso')
                    $('#btn-fechar').click();
                    $('#btn-buscar').click();





                } else {

                    $('#mensagem').addClass('mensagem-erro')
                }

                $('#mensagem').text(mensagem)

            },

        })
    })
})
</script>






<!--AJAX PARA LANÇAR OS DIAS DE ATESTADO -->
<script type="text/javascript">
$(document).ready(function() {
    var pag = "<?=$pagina?>";
    $('#btn-atestado').click(function(event) {
        event.preventDefault();

        $.ajax({
            url: pag + "/atestado.php",
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(mensagem) {

                $('#mensagem').removeClass()

                if (mensagem == 'Editado com Sucesso!!') {

                    $('#mensagem').addClass('mensagem-sucesso')
                    $('#btn-fechar').click();
                    $('#btn-buscar').click();





                } else {

                    $('#mensagem').addClass('mensagem-erro')
                }

                $('#mensagem').text(mensagem)

            },

        })
    })
})
</script>






<!--AJAX PARA LANÇAR PRESCRIÇÃO -->
<script type="text/javascript">
$(document).ready(function() {
    var pag = "<?=$pagina?>";
    $('#btn-prescricao').click(function(event) {
        event.preventDefault();

        $.ajax({
            url: pag + "/prescricao.php",
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(mensagem) {

                $('#btn-buscar').click();
                document.getElementById('remedio').value = '';
                document.getElementById('item').value = document.getElementById('num_item')
                    .value;
                document.getElementById('remedio').focus();

            },

        })
    })
})
</script>






<!--AJAX PARA LISTAR OS DADOS DA PRESCRICAO-->
<script type="text/javascript">
$(document).ready(function() {

    var pag = "<?=$pagina?>";

    $.ajax({
        url: pag + "/listar-prescricao.php",
        method: "post",
        data: $('#frm').serialize(),
        dataType: "html",
        success: function(result) {
            $('#listar-prescricao').html(result);
            document.getElementById('item').value = document.getElementById('num_item').value;

        },


    })
})
</script>







<!--AJAX PARA BUSCAR OS DADOS DA PRESCRICAO -->
<script type="text/javascript">
$(document).ready(function() {

    var pag = "<?=$pagina?>";
    $('#btn-buscar').click(function(event) {
        event.preventDefault();

        $.ajax({
            url: pag + "/listar-prescricao.php",
            method: "post",
            data: $('form').serialize(),
            dataType: "html",
            success: function(result) {
                $('#listar-prescricao').html(result)
                document.getElementById('item').value = document.getElementById('num_item')
                    .value;
            },


        })

    })


})
</script>









<!--AJAX PARA LANÇAR RECEITA -->
<script type="text/javascript">
$(document).ready(function() {
    var pag = "<?=$pagina?>";
    $('#btn-receita').click(function(event) {
        event.preventDefault();

        $.ajax({
            url: pag + "/receita.php",
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(mensagem) {

                $('#btn-buscar').click();
                document.getElementById('remedio').value = '';
                document.getElementById('item_receita').value = document.getElementById(
                    'num_item_receita').value;
                document.getElementById('remedio').focus();

            },

        })
    })
})
</script>






<!--AJAX PARA LISTAR OS DADOS DA receita-->
<script type="text/javascript">
$(document).ready(function() {

    var pag = "<?=$pagina?>";

    $.ajax({
        url: pag + "/listar-receita.php",
        method: "post",
        data: $('#frm').serialize(),
        dataType: "html",
        success: function(result) {
            $('#listar-receita').html(result);
            document.getElementById('item_receita').value = document.getElementById(
                'num_item_receita').value;

        },


    })
})
</script>







<!--AJAX PARA BUSCAR OS DADOS DA RECEITA -->
<script type="text/javascript">
$(document).ready(function() {

    var pag = "<?=$pagina?>";
    $('#btn-buscar').click(function(event) {
        event.preventDefault();

        $.ajax({
            url: pag + "/listar-receita.php",
            method: "post",
            data: $('form').serialize(),
            dataType: "html",
            success: function(result) {
                $('#listar-receita').html(result)
                document.getElementById('item_receita').value = document.getElementById(
                    'num_item_receita').value;
            },


        })

    })


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

 