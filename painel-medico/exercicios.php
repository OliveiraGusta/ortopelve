<?php 
@session_start();

$pagina = 'exercicios'; 

//RECUPERAR O ID DO PACIENTE
if(isset($_GET['id'])){
	$id_paciente = $_GET['id'];
	
}

$nome_medico = $_SESSION['nome_usuario'];
$email_med = $_SESSION['email_usuario'];
?>

<input type="hidden" id="txtidpac" name="txtidpac" value="<?php echo @$id_paciente; ?>">

<h4>Lista de Exercicios </h4>
<span class="text-muted">Recomende exercicios aos seus pacientes</span><br>

<div class="row mt-4 mb-3">
    <div class="col-md-6 col-sm-12">
        <form id="frm" class="form-inline my-2 my-lg-0" method="post">

            <label class="mr-1" for="exampleFormControlSelect1"><small>Paciente</small></label>
            <select data-width="280px" class="form-control form-control-sm mr-2 sel2" name="cb-paciente"
                id="cb-paciente">

                <option value="">Selecione o Paciente</option>

                <?php 
				//TRAZER TODOS OS REGISTROS DE PACIENTES
				$res = $pdo->query("SELECT * from pacientes WHERE medico_resp = '$nome_medico'  order by nome asc ");
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

					echo '<option '.$selec.' value="'.$id.'">'.$nome.' - '.$cpf.'</option>';

				}
				?>
            </select>



        </form>
    </div>





    <div class="col-md-6 col-sm-12">

        <div class="float-right mr-1">
            <form id="frm" class="form-inline my-2 my-lg-0" method="post">

                <input type="hidden" id="pag" name="pag" value="<?php echo @$_GET['pagina'] ?>">

                <input type="hidden" id="itens" name="itens" value="<?php echo @$itens_por_pagina; ?>">


                <label class="mr-1" for="exampleFormControlSelect1"><small>Profissional</small></label>
                <select data-width="140px" class="form-control form-control-sm mr-2 sel2" id="cbmedicos"
                    name="cbmedicos">

                    <?php 

					//TRAZER TODOS OS REGISTROS DE PROFISSIONAL
                    
					$res = $pdo->query("SELECT * from medicos WHERE nome = '$nome_medico' order by nome asc");
					$dados = $res->fetchAll(PDO::FETCH_ASSOC);

					for ($i=0; $i < count($dados); $i++) { 
						foreach ($dados[$i] as $key => $value) {
						}

						$id = $dados[$i]['id'];	
						$nome = $dados[$i]['nome'];


						echo '<option value="'.$id.'">'.$nome.'</option>';


					}
					?>
                </select>


                <input class="form-control form-control-sm mr-sm-2 mx-2" type="hidden" name="txtbuscar" id="txtbuscar"
                    value="<?php echo $agora ?>">

                <button  style="display: none"  class="btn btn-outline-secondary btn-sm my-2 my-sm-0" name="btn-buscar" id="btn-buscar"><i
                        class="fas fa-search"></i></button>
            </form>
        </div>

    </div>


</div>


 
        <div id="listar" class="mt-4">


        </div>
  

 


<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Recomendar exercício?
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <form method="post">

                    <div class="form-group">

                        <input type="hidden" id="id" name="id" required>
                        <input type="hidden" id="txtid" name="txtid" required>
                        <input type="hidden" id="medico" name="medico" required>
                        <input type="hidden" id="data" name="data" required>
                        <input type="hidden" id="hora" name="hora" required>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Exercício</label>
                            <select class="form-control" id="exercicios" name="exercicios">

                                <?php 
								//TRAZER TODOS OS REGISTROS DE Exercicio
								$res = $pdo->query("SELECT * from exercicios");
								$dados = $res->fetchAll(PDO::FETCH_ASSOC);

								for ($i=0; $i < count($dados); $i++) { 
									foreach ($dados[$i] as $key => $value) {
									}

									$id_exercicio = $dados[$i]['id'];	
									$nome_exercicio = $dados[$i]['nome_exercicio'];															
									echo '<option value='.$id_exercicio.'>'.$nome_exercicio.'</option>';									
								}
								
								?>
                            </select>
                            <br>
                            <label for="exampleFormControlInput1">Repetições</label>
                            <input type="number" class="form-control" id="repeticoes" name="repeticoes" min="1"
                                max="100">

                            <label for="exampleFormControlInput1">Séries</label>
                            <input type="number" class="form-control" id="series" name="series" min="1"
                                max="100">

                            <label for="exampleFormControlInput1">Observação</label>
                            <textarea class="form-control" id="obs" name="obs"
                            maxlength="350"></textarea>
                        </div>

                        <div id="mensagem" class="">

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button id="btn-fechar" type="button" class="btn btn-secondary"
                            data-dismiss="modal">Cancelar</button>

                        <button type="submit" name="btn-salvar" id="btn-salvar" class="btn btn-primary">Salvar</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

</div>






<!--CHAMADA DA MODAL DELETAR -->
<div class="modal" id="modal-deletar-consulta" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Deletar exercicio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Deseja realmente excluir essa exercicio?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                    id="btn-cancelar-excluir">Cancelar</button>
                <form method="post">
                    <input type="hidden" id="id-del-con" name="id" required>
                    <button type="button" id="btn-deletar" name="btn-deletar" class="btn btn-danger">Excluir</button>
                </form>
            </div>
        </div>
    </div>
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
                    <button type="button" id="btn-deletar" name="btn-deletar" class="btn btn-danger">Excluir</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php } ?>





<!--AJAX PARA INSERÇÃO DOS DADOS -->
<script type="text/javascript">
$(document).ready(function() {
    var pag = "<?=$pagina?>";
    $('#btn-salvar').click(function(event) {
        event.preventDefault();
        $.ajax({
            url: pag + "/inserir.php",
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(mensagem) {

                $('#mensagem').removeClass()


                if (mensagem == 'Cadastrado com Sucesso!!') {

                    document.getElementById("mensagem").style.display = "block";

                    $('#mensagem').addClass('mensagem-sucesso')                  
                    $('#btn-buscar').click();
                    $('#btn-fechar').click();


                } else {

                    $('#mensagem').addClass('mensagem-erro');
                    $('#btn-buscar').click();
                    $('#btn-fechar').click();

                }

                $('#mensagem').text(mensagem)

            },

        })
    })
})
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
                var medico = document.getElementById("cbmedicos").value;
                var data = document.getElementById("txtbuscar").value
                listarCards(data, medico)

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



<!--AJAX PARA BUSCAR OS DADOS PELA DATA AO ALTERAR -->
<script type="text/javascript">
$('#txtbuscar').change(function() {
    $('#btn-buscar').click();
})
</script>

<!--AJAX PARA BUSCAR OS DADOS PELA COMBOBOX AO ALTERAR -->
<script type="text/javascript">
$('#cbmedicos').change(function() {
    $('#btn-buscar').click();
})
</script>





<script type="text/javascript">
$('#cb-paciente').on('change', function(e) {
    var id_pac = $(this).val();
    document.getElementById("txtid").value = id_pac;
    document.getElementById("txtidpac").value = id_pac;
});
</script>





<!--MASCARAS -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script>
$(document).ready(function() {

    $('#txtbuscar-paciente').mask('000.000.000-00');
    var medico = document.getElementById("cbmedicos").value;
    var data = document.getElementById("txtbuscar").value
    listarCards(data, medico)

});
</script>



<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(document).ready(function() {
    $('.sel2').select2({
        placeholder: "Selecione um Paciente",
    });

});
</script>



<!--AJAX PARA LISTAR OS DADOS -->
<script type="text/javascript">
function listarCards(data, medico) {
    var pag = "<?=$pagina?>";

    $.ajax({
        url: pag + "/listar-cards.php",
        method: "post",
        data: {
            data,
            medico
        },
        dataType: "html",
        success: function(result) {
            $('#listar-cards').html(result)

        },


    })
}
</script>


<script type="text/javascript">
function deletarConsulta(id) {
    document.getElementById("id-del-con").value = id;
    $('#modal-deletar-consulta').modal("show");
}
</script>





<!--AJAX PARA EXCLUSÃO DOS DADOS -->
<script type="text/javascript">
$(document).ready(function() {
    var pag = "<?=$pagina?>";
    $('#btn-deletar').click(function(event) {
        event.preventDefault();

        $.ajax({
            url: pag + "/excluir.php",
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(mensagem) {


                $('#btn-buscar').click();
                $('#btn-cancelar-excluir').click();

            },

        })
    })
})
</script>