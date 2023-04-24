<?php

@session_start();
$nome_medico = $_SESSION['medico_resp'];


$pagina = 'atestados';
$pagina_ajax = 'atestados';
$agora = date('Y-m-d');

?>
<h4>Área de Atestados</h4>
<span class="text-muted">Listagem dos atestados que você passou após uma consulta com <b><?php echo $nome_medico?></b></span><br>

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