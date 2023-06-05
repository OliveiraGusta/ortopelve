<?php
@session_start();
$nome_medico = $_SESSION['nome_usuario'];

$pagina = 'receber';
$pagina_ajax = 'receber';
$agora = date('Y-m-d');

//SUBTRAIR MENOS UM MES A DATA DO INICIO DA BUSCA

$agora_format = explode('-', $agora);
///Data do inicio da busca
$data_inicio_busca = $agora_format[0]."-".
//Mes alterado
$mes_inicio_busca = str_pad($mes_inicio_busca = $agora_format[1] - 1 , 2 , '0' , STR_PAD_LEFT)."-".
//Ano do inicio da busca
$agora_format[2]; ?>



<h4>Área de Contas à Receber </h4>
<span class="text-muted">Listagem dos pagamentos que você tem a receber das suas consultas.</span><br><br>

<div class="row botao-novo">
    <div class="col-md-12">

        <a id="btn-novo" data-toggle="modal" data-target="#modal"></a>

    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6 col-sm-12">
        <div class="float-left">
            <form method="post">
                <select onChange="submit();" class="form-control-sm" id="exampleFormControlSelect1" name="itens-pagina">

                    <?php

                    if (isset($_POST['itens-pagina'])) {
                        $item_paginado = $_POST['itens-pagina'];
                    } elseif (isset($_GET['itens'])) {
                        $item_paginado = $_GET['itens'];
                    }

                    ?>

                    <option value="<?php echo @$item_paginado ?>"><?php echo @$item_paginado ?> Registros</option>

                    <?php if (@$item_paginado != $opcao1) { ?>
                    <option value="<?php echo $opcao1 ?>"><?php echo $opcao1 ?> Registros</option>
                    <?php } ?>

                    <?php if (@$item_paginado != $opcao2) { ?>
                    <option value="<?php echo $opcao2 ?>"><?php echo $opcao2 ?> Registros</option>
                    <?php } ?>

                    <?php if (@$item_paginado != $opcao3) { ?>
                    <option value="<?php echo $opcao3 ?>"><?php echo $opcao3 ?> Registros</option>
                    <?php } ?>

                </select>
            </form>
        </div>

    </div>


    <?php

    //DEFINIR O NUMERO DE ITENS POR PÁGINA
    if (isset($_POST['itens-pagina'])) {
        $itens_por_pagina = $_POST['itens-pagina'];
        @$_GET['pagina'] = 0;
    } elseif (isset($_GET['itens'])) {
        $itens_por_pagina = $_GET['itens'];
    } else {
        $itens_por_pagina = $opcao1;

    }

    ?>


    <div class="col-md-6 col-sm-12">

        <div class="float-right mr-4">
            <form id="frm" class="form-inline my-2 my-lg-0" method="post">

                <input class="form-control form-control-sm mr-sm-2" type="hidden" name="dataInicialPost"
                    id="dataInicialPost">
                <input class="form-control form-control-sm mr-sm-2" type="hidden" name="dataFinalPost"
                    id="dataFinalPost">
                <select data-width="280px" class="form-control form-control-sm mr-2 sel2" name="cb-paciente"
                    id="cb-paciente">

                    <option value="todos">Todos os Pacientes</option>
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
    echo '<option '.$cpf.' value="'.$cpf.'">'.$nome.' - '.$cpf.'</option>';
}
?>
                </select>
                <input type="hidden" id="pag" name="pag" value="<?php echo @$_GET['pagina'] ?>">
                <input type="hidden" id="itens" name="itens" value="<?php echo @$itens_por_pagina; ?>">
                <input type="hidden" id="id_consulta" name="id_consulta" value="<?php echo @$_GET['id'] ?>">
                <input class="form-control form-control-sm mr-sm-2" type="date" name="dataInicial" id="dataInicial"
                    value="<?php echo $data_inicio_busca ?>">

                <input class="form-control form-control-sm mr-sm-2" type="date" name="dataFinal" id="dataFinal"
                    value="<?php echo $agora ?>">

                <button  style="display: none" class="btn btn-outline-secondary btn-sm my-2 my-sm-0" name="btn-buscar" id="btn-buscar"><i
                        class="fas fa-search"></i></button>
            </form>
        </div>

    </div>


</div>


<div id="listar">

</div>



<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <?php if (@$_GET['funcao'] == 'editar') {

                        $nome_botao = 'Editar';
                        $id_reg = $_GET['id'];
                        $id_consulta = $_GET['id_consulta'];



                        echo 'Edição de Contas a Receber';
                    } else {
                        $nome_botao = 'Salvar';

                    } ?>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <form method="post">



                    <div class="form-group">

                        <input type="hidden" id="id" name="id" value="<?php echo @$id_reg ?>" required>


                        <input type="hidden" id="id_consulta" name="id_consulta" value="<?php echo @$id_consulta ?>"
                            required>


                        <label for="exampleFormControlInput1">Forma de Pagamento</label>

                        <select class="form-control" id="" name="forma">
                            <option value="Depois">Pagar Depois</option>
                            <option value="Dinheiro">Dinheiro</option>

                            <option value="Cartão">Cartão</option>
                            <option value="Convênio">Convênio</option>
                            <option value="PIX">PIX</option>

                        </select>


                    </div>



                    <div class="form-group">
                        <label for="exampleFormControlInput1">Bandeira / Cônvenio</label>
                        <input type="text" class="form-control" id="tipo" placeholder="Descreva o Tipo de Pagamento "
                            name="tipo" required>
                    </div>

                    <label for="exampleFormControlInput1">Data da Consulta</label>
                    <input class="form-control form-control-sm mr-sm-2" type="date" name="data-pagamento" id="data"
                    value="<?php echo $agora ?>">




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



<!--CHAMADA DA MODAL NOVO -->
<?php
if (@$_GET['funcao'] == 'novo' && @$item_paginado == '') {

    ?>
<script>
$('#btn-novo').click();
</script>
<?php } ?>


<!--CHAMADA DA MODAL EDITAR -->
<?php
if (@$_GET['funcao'] == 'editar' && @$item_paginado == '') {

    ?>
<script>
$('#btn-novo').click();
</script>
<?php } ?>



<!--CHAMADA DA MODAL DELETAR -->
<?php
if (@$_GET['funcao'] == 'excluir' && @$item_paginado == '') {
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



<script>
$('#modal-deletar').modal("show");
</script>


<!--MASCARAS -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script src="../js/mascaras.js"></script>





<!--AJAX PARA INSERÇÃO DOS DADOS -->
<script type="text/javascript">
$(document).ready(function() {
    var pag = "<?= $pagina ?>";
    $('#Salvar').click(function(event) {
        event.preventDefault();

        $.ajax({
            url: pag + "/inserir.php",
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(mensagem) {

                $('#mensagem').removeClass()

                if (mensagem == 'Cadastrado com Sucesso!!') {

                    $('#mensagem').addClass('mensagem-sucesso')

                    $('#nome').val('')
                    $('#cpf').val('')
                    $('#telefone').val('')
                    $('#crm').val('')
                    $('#email').val('')

                    $('#txtbuscar').val('')
                    $('#btn-buscar').click();

                    //$('#btn-fechar').click();




                } else {

                    $('#mensagem').addClass('mensagem-erro')
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

    var pag = "<?= $pagina ?>";
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


<!--AJAX PARA LISTAR OS DADOS -->
<script type="text/javascript">
$(document).ready(function() {

    var pag = "<?= $pagina ?>";

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
$('#txtbuscar').change(function() {
    $('#btn-buscar').click();
    document.getElementById('tipo').value = document.getElementById('txtbuscar').value;
})
</script>

<!--AJAX PARA BUSCAR OS DADOS PELA PACINTE -->
<script type="text/javascript">
$('#cb-paciente').change(function() {
    $('#btn-buscar').click();
    document.getElementById('tipo').value = document.getElementById('cb-paciente').value;
})
</script>



<!--AJAX PARA BUSCAR OS DADOS PELA DATA INICIAL -->
<script type="text/javascript">
$('#dataInicial').change(function() {
    $('#btn-buscar').click();
    document.getElementById('dataInicialPost').value = document.getElementById('dataInicial').value;
})
</script>


<!--AJAX PARA BUSCAR OS DADOS PELA DATA FINAL -->
<script type="text/javascript">
$('#dataFinal').change(function() {
    $('#btn-buscar').click();
    document.getElementById('dataFinalPost').value = document.getElementById('dataFinal').value;
})
</script>





<!--AJAX PARA EDIÇÃO DOS DADOS -->
<script type="text/javascript">
$(document).ready(function() {
    var pag = "<?= $pagina ?>";
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


                    $('#txtbuscar').val('')
                    $('#btn-buscar').click();

                    $('#btn-fechar').click();




                } else {

                    $('#mensagem').addClass('mensagem-erro')
                }

                $('#mensagem').text(mensagem)

            },

        })
    })
})
</script>



<!--AJAX PARA EXCLUSÃO DOS DADOS -->
<script type="text/javascript">
$(document).ready(function() {
    var pag = "<?= $pagina ?>";
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



<!--AJAX PARA BUSCAR OS DADOS PELA TXT -->
<script type="text/javascript">
$('#txtbuscar').change(function() {
    $('#btn-buscar').click();
})
</script>