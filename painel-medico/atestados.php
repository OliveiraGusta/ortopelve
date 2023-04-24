<?php

@session_start();
$nome_medico = $_SESSION['nome_usuario'];

$pagina = 'atestados';
$pagina_ajax = 'atestados';
$agora = date('Y-m-d');
//SUBTRAIR MENOS UM MES A DATA DO INICIO DA BUSCA
$agora_format = explode('-', $agora);

///Data do inicio da busca: jogar na variavel $data_inicio_busca
$data_inicio_busca = $agora_format[0]."-".
//Mes alterado
$mes_inicio_busca = str_pad($mes_inicio_busca = $agora_format[1] - 1 , 2 , '0' , STR_PAD_LEFT)."-".
//Ano do inicio da busca
$agora_format[2]; ?>

<h4>Área de Atestados</h4>
<span class="text-muted">Listagem dos atestados que você passou para seus pacientes após uma consulta.</span><br>

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

                    for ($i = 0; $i < count($dados); $i++) {
                        foreach ($dados[$i] as $key => $value) {
                        }
                        $cpf = $dados[$i]['cpf'];
                        $nome = $dados[$i]['nome'];
                        $id = $dados[$i]['id'];

                        $cpf_get = @$_GET['cpf'];
                        if ($cpf_get == $cpf) {
                            $selec = 'selected';
                        } else {
                            $selec = '';
                        }

                        echo '<option ' . $cpf . ' value="' . $cpf . '">' . $nome . ' - ' . $cpf . '</option>';

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

                <button  style="display: none"  class="btn btn-outline-secondary btn-sm my-2 my-sm-0" name="btn-buscar" id="btn-buscar"><i
                        class="fas fa-search"></i></button>
            </form>
        </div>

    </div>


</div>


<div id="listar">

</div>


<!--AJAX PARA BUSCAR OS DADOS -->
<script type="text/javascript">
    $(document).ready(function () {

        var pag = "<?= $pagina ?>";
        $('#btn-buscar').click(function (event) {
            event.preventDefault();

            $.ajax({
                url: pag + "/listar.php",
                method: "post",
                data: $('form').serialize(),
                dataType: "html",
                success: function (result) {
                    $('#listar').html(result)

                },


            })

        })


    })
</script>








<!--AJAX PARA LISTAR OS DADOS -->
<script type="text/javascript">
    $(document).ready(function () {

        var pag = "<?= $pagina ?>";

        $.ajax({
            url: pag + "/listar.php",
            method: "post",
            data: $('#frm').serialize(),
            dataType: "html",
            success: function (result) {
                $('#listar').html(result)

            },


        })
    })
</script>



<!--AJAX PARA BUSCAR OS DADOS PELA TXT -->
<script type="text/javascript">
    $('#txtbuscar').change(function () {
        $('#btn-buscar').click();
        document.getElementById('tipo').value = document.getElementById('txtbuscar').value;
    })
</script>

<!--AJAX PARA BUSCAR OS DADOS PELA PACINTE -->
<script type="text/javascript">
    $('#cb-paciente').change(function () {
        $('#btn-buscar').click();
        document.getElementById('tipo').value = document.getElementById('cb-paciente').value;
    })
</script>



<!--AJAX PARA BUSCAR OS DADOS PELA DATA INICIAL -->
<script type="text/javascript">
    $('#dataInicial').change(function () {
        $('#btn-buscar').click();
        document.getElementById('dataInicialPost').value = document.getElementById('dataInicial').value;
    })
</script>


<!--AJAX PARA BUSCAR OS DADOS PELA DATA FINAL -->
<script type="text/javascript">
    $('#dataFinal').change(function () {
        $('#btn-buscar').click();
        document.getElementById('dataFinalPost').value = document.getElementById('dataFinal').value;
    })
</script>





<!--AJAX PARA EDIÇÃO DO STATUS DA CONSULTA PARA CONSULTANDO -->
<script type="text/javascript">
    $(document).ready(function () {
        var pag = "<?= $pagina ?>";
        $('#btn-consultando').click(function (event) {
            event.preventDefault();

            $.ajax({
                url: pag + "/consultando.php",
                method: "post",
                data: $('form').serialize(),
                dataType: "text",
                success: function (mensagem) {

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
    $(document).ready(function () {
        var pag = "<?= $pagina ?>";
        $('#btn-finalizar').click(function (event) {
            event.preventDefault();

            $.ajax({
                url: pag + "/finalizar.php",
                method: "post",
                data: $('form').serialize(),
                dataType: "text",
                success: function (mensagem) {

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
    $(document).ready(function () {
        var pag = "<?= $pagina ?>";
        $('#Editar').click(function (event) {
            event.preventDefault();

            $.ajax({
                url: pag + "/editar.php",
                method: "post",
                data: $('form').serialize(),
                dataType: "text",
                success: function (mensagem) {

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
    $(document).ready(function () {
        var pag = "<?= $pagina ?>";
        $('#btn-atestado').click(function (event) {
            event.preventDefault();

            $.ajax({
                url: pag + "/atestado.php",
                method: "post",
                data: $('form').serialize(),
                dataType: "text",
                success: function (mensagem) {

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