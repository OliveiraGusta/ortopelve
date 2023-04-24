<?php
@session_start();
$nome_medico = $_SESSION['nome_usuario'];

$pagina = 'receitas';
$pagina_ajax = 'receitas';
$agora = date('Y-m-d');
$nome_medico = $_SESSION['medico_resp'];


?>
<h4>Área de Receitas</h4>
<span class="text-muted">Receitas que passou seu Profissional (<b><?php echo $nome_medico ?></b>) após uma consulta.</span><br>

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


