<?php

$pagina_ajax = 'acesso';
$pagina = 'acesso';

?>

<h4>Acesso dos Profissionais</h4>
<span class="text-muted">Aqui você libera, bloqueia e exclui a conta dos profissionais que se cadastraram no sistema.</span><br>



<div class="row mt-4">
    <div class="col-md-6 col-sm-12">
        <div class="float-left">

        </div>

    </div>


    <div class="col-md-6 col-sm-12">
        <div class="float-right mr-4">
            <form id="frm" class="form-inline my-2 my-lg-0" method="post">

                <input type="hidden" id="pag" name="pag" value="<?php echo @$_GET['pagina'] ?>">

                <input class="form-control form-control-sm mr-sm-2" type="search" placeholder="Nome ou CPF"
                    aria-label="Search" name="txtbuscar" id="txtbuscar">
                <button class="btn btn-outline-secondary btn-sm my-2 my-sm-0" name="btn-buscar" id="btn-buscar"><i
                        class="fas fa-search"></i></button>
            </form>
        </div>

    </div>


</div>
<div id="listar">
</div>





<!--CHAMADA DA MODAL NOVO -->
<?php
    if (@$_GET['funcao'] == 'novo' && @$item_paginado == '') {

        ?>
<script>
$('#btn-novo').click();
</script>
<?php } ?>


<!--CHAMADA DA MODAL LIBERAR -->
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

<!--CHAMADA DA MODAL CRIAR LIBERAR -->
<?php
    if (@$_GET['funcao'] == 'liberar' && @$item_paginado == '') {
        $id = $_GET['id'];
        ?>

<div class="modal" id="modal-liberar" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                
            <h5 class="modal-title" id="exampleModalLabel">
                Renovar Acesso para
            <?php
                $id_reg = $_GET['id'];

                $res = $pdo->query("select * from usuarios where id = '$id_reg'");
                $dados = $res->fetchAll(PDO::FETCH_ASSOC);
                $nome_user = $dados[0]['nome'];
                $usuario_email = $dados[0]['usuario'];
                ?>

                <?php echo $nome_user ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Deseja realmente renovar <b>+1 mês de acesso</b> para <?php echo $nome_user ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                    id="btn-cancelar-excluir">Cancelar</button>
                <form method="post">
                    <input type="hidden" id="id" name="id" value="<?php echo @$id ?>" required>
                    <input type="hidden" id="nome_user" name="nome_user" value="<?php echo @$nome_user ?>" required>
                    <input type="hidden" id="usuario_email" name="usuario_email" value="<?php echo @$usuario_email ?>" required>
            
                    <button type="button" id="btn-liberar" name="btn-liberar" class="btn btn-primary">Renovar Acesso</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php } ?>

<script>
$('#modal-liberar').modal("show");
</script>


<!--CHAMADA DA MODAL BLOQUEAR -->
<?php
    if (@$_GET['funcao'] == 'bloquear' && @$item_paginado == '') {
        $id = $_GET['id'];
        ?>

<div class="modal" id="modal-bloquear" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                
            <h5 class="modal-title" id="exampleModalLabel">
                Bloquear Acesso para
            <?php
            
                $id_reg = $_GET['id'];

                $res = $pdo->query("select * from usuarios where id = '$id_reg'");
                $dados = $res->fetchAll(PDO::FETCH_ASSOC);
                $nome_user = $dados[0]['nome'];
                ?>

                <?php echo $nome_user ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Deseja realmente <b>bloquear</b> o acesso para <?php echo $nome_user ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                    id="btn-cancelar-excluir">Cancelar</button>
                <form method="post">
                    <input type="hidden" id="id" name="id" value="<?php echo @$id ?>" required>

                    <button type="button" id="btn-bloquear" name="btn-bloquear" class="btn btn-danger">Bloquear Acesso</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php } ?>

<script>
$('#modal-bloquear').modal("show");
</script>


<script>
$('#modal-deletar').modal("show");
</script>


<!--MASCARAS -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script src="../js/mascaras.js"></script>


<!--AJAX PARA INSERÇÃO DOS DADOS -->
<script type="text/javascript">
$(document).ready(function() {
    var pag = "<?= $pagina_ajax ?>";
    $('#Salvar').click(function(event) {
        event.preventDefault();

        $.ajax({
            url: pag + "/inserir.php",
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(mensagem) {

                $('#mensagem').removeClass()

                if (mensagem == 'Cadastrado com Sucesso!') {

                    $('#mensagem').addClass('mensagem-sucesso')

                    $('#nome').val('')
                    $('#cpf').val('')
                    $('#telefone').val('')
                    $('#crm').val('')
                    $('#email').val('')

                    $('#txtbuscar').val('')
                    $('#btn-buscar').click();
                    $('#btn-fechar').click();

                } else {

                    $('#mensagem').addClass('mensagem-erro');
                    $('#btn-buscar').click();
                  
                }

                $('#mensagem').text(mensagem);
                $('#btn-buscar').click();
                $('#btn-fechar').click();

            },

        })
    })
})
</script>



<!--AJAX PARA BUSCAR OS DADOS -->
<script type="text/javascript">
$(document).ready(function() {

    var pag = "<?= $pagina_ajax ?>";
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

    var pag = "<?= $pagina_ajax ?>";

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
$('#txtbuscar').keyup(function() {
    $('#btn-buscar').click();
})
</script>




<!--AJAX PARA EDIÇÃO DOS DADOS -->
<script type="text/javascript">
$(document).ready(function() {
    var pag = "<?= $pagina_ajax ?>";
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

                    $('#mensagem').addClass('mensagem-erro');
                    $('#btn-buscar').click();
                    $('#btn-fechar').click();

                }

                $('#mensagem').text(mensagem);
                $('#btn-buscar').click();
                $('#btn-fechar').click();


            },

        })
    })
})
</script>



<!--AJAX PARA EXCLUSÃO DOS DADOS -->
<script type="text/javascript">
$(document).ready(function() {
    var pag = "<?= $pagina_ajax ?>";
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

<!--AJAX PARA LIBERAR USUARIO -->
<script type="text/javascript">
$(document).ready(function() {
    var pag = "<?= $pagina_ajax ?>";
    $('#btn-liberar').click(function(event) {
        event.preventDefault();

        $.ajax({
            url: pag + "/liberar.php",
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

<!--AJAX PARA BLOQUEAR USUARIO -->
<script type="text/javascript">
$(document).ready(function() {
    var pag = "<?= $pagina_ajax ?>";
    $('#btn-bloquear').click(function(event) {
        event.preventDefault();

        $.ajax({
            url: pag + "/bloquear.php",
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


<!--AJAX PARA INSERÇÃO DOS DADOS -->
<script type="text/javascript">
$(document).ready(function() {
    var pag = "<?= $pagina_ajax ?>";
    $('#btn-resp').click(function(event) {
        event.preventDefault();

        $.ajax({
            url: pag + "/inserir-resp.php",
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(mensagem) {

                $('#mensagem').removeClass()

                if (mensagem == 'Cadastrado com Sucesso!!') {

                    $('#mensagem_resp').addClass('mensagem-sucesso')

                    $('#nome').val('')
                    $('#cpf').val('')

                    $('#txtbuscar').val('')
                    $('#btn-buscar').click();

                    $('#btn-fechar_resp').click();
                    $('#btn-buscar').click();

                } else {

                    $('#mensagem_resp').addClass('mensagem-erro')
                }

                $('#mensagem_resp').text(mensagem)

            },

        })
    })
})
</script>


<!--AJAX PARA INSERÇÃO DOS DADOS PARA CRIAR LOGIN -->
<script type="text/javascript">
$(document).ready(function() {
    var pag = "<?= $pagina_ajax ?>";
    $('#btn-login').click(function(event) {
        event.preventDefault();

        $.ajax({
            url: pag + "/inserir-login.php",
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(mensagem) {

                $('#mensagem').removeClass()

                if (mensagem == 'Cadastrado com Sucesso!!') {

                    $('#mensagem_login').addClass('mensagem-sucesso')

                    $('#email').val('')
                    $('#senha_paciente').val('')
                    $('#nome_pac').val('')

                    $('#txtbuscar').val('')
                    $('#btn-buscar').click();

                    $('#btn-fechar_login').click();
                    $('#btn-buscar').click();

                } else {

                    $('#mensagem_login').addClass('mensagem-erro')
                }

                $('#mensagem_login').text(mensagem)

            },

        })
    })
})
</script>