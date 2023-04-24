<?php
@session_start();

$pagina = 'rec_exercicios';

//RECUPERAR O ID DO PACIENTE
if (isset($_GET['id'])) {
    $id_paciente = $_GET['id'];
}

$nome_medico = $_SESSION['nome_usuario'];
$email_med = $_SESSION['email_usuario'];
?>

<input type="hidden" id="txtidpac" name="txtidpac" value="<?php echo @$id_paciente; ?>">

<h4>Exercicios Recomendados</h4>
<span class="text-muted">Listagem de todos os exercicios que você recomendou aos seus pacientes</span><br>

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

        <div class="float-right mr-4">
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

                    for ($i = 0; $i < count($dados); $i++) {
                        foreach ($dados[$i] as $key => $value) {
                        }

                        $id = $dados[$i]['id'];
                        $nome = $dados[$i]['nome'];

                        echo '<option value="' . $id . '">' . $nome . '</option>';

                    }
                    ?>
                </select>


            
                <input class="form-control form-control-sm mr-sm-2 mx-2" type="hidden" name="txtbuscar" id="txtbuscar"
                    value="<?php echo $agora ?>">

                <button style="display: none"  class="btn btn-outline-secondary btn-sm my-2 my-sm-0" name="btn-buscar" id="btn-buscar"><i
                        class="fas fa-search"></i></button>
            </form>
        </div>

    </div>


</div>

<small>
    <div id="listar-cards" class="mt-4">

    </div>
</small>



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


<!--CHAMADA DA MODAL REALIZAR EXERCICIO -->
<div class="modal" id="modal-realizar-exercicio" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Marcar como Realizado? </h5>
                <button type="button" class="realizar" data-dismiss="modal" aria-label="Realizar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Deseja realmente fazer a marcação desse exercicio?<br>O Paciente em seu login pode tambem realizar
                    essa marcação</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                    id="btn-cancelar-exercicio">Cancelar</button>
                <form method="post">
                    <input type="hidden" id="id-rel-exe" name="id_2" required>

                    <button type="button" id="btn-realizar" name="btn-realizar" class="btn btn-sucess">Realizar</button>
                </form>
            </div>
        </div>
    </div>
</div>





<!--AJAX PARA INSERÇÃO DOS DADOS -->
<script type="text/javascript">
$(document).ready(function() {
    var pag = "<?= $pagina ?>";
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
    console.log("Deletar: "+ id);
    $('#modal-deletar-consulta').modal("show");
}
</script>

<script type="text/javascript">
function realizarExercicio(id) {
    document.getElementById("id-rel-exe").value = id;
    console.log("Exer: "+ id);
    $('#modal-realizar-exercicio').modal("show");
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

<!--AJAX PARA REALIZAR EXERCICO -->
<script type="text/javascript">
$(document).ready(function() {
    var pag = "<?=$pagina?>";
    $('#btn-realizar').click(function(event) {
        event.preventDefault();

        $.ajax({
            url: pag + "/editar.php",
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(mensagem) {

              
                $('#btn-buscar').click();
                $('#btn-cancelar-exercicio').click();

            },

        })
    })
})
</script>

