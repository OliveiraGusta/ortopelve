<?php
//verficações para o Login
require_once("../conexao.php");
require_once("../config.php");

@session_start();
$data_fim_acesso = $_SESSION['data_fim_acesso'];
$data_fim_acesso2 = implode('/', array_reverse(explode('-', $data_fim_acesso)));
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Acesso Bloqueado</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/login.css">

    <!--REFERENCIA PARA O FAVICON -->
    <link rel="shortcut icon" href="../img/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../img/favicon/favicon2.ico" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>


</head>

<body>
    <div class="show" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Seu plano expirou</h4>
                </div>
                <div class="modal-body">
                    <span class="text-muted">Atenção, <br>  Seu plano plano expirou dia <b> <?php echo $data_fim_acesso2 ?></b> Atualize seus dados para que possa voltar a utilizar o Sistema Ortopelve e
                        evitar o cancelamento permanente da sua conta</span><br><br>
                    <span class="text-muted">Caso já tenha realizado o pagamento aguarde alguns minutos ou entre contato com o suporte.</span><br>
                    <br>
                    <div class="row ">

                        <div class="col-md-4 ">
                            <label for="exampleFormControlInput1">Ir para área de pagamentos</label><br>
                            <a href="https://sistema.ortopelve.com.br/register.php" type="button"
                                class="btn btn-success"><i class="fas fa-money-bill-alt"></i> Assinar Ortopelve</a><br>
                        </div>

                        <div class="col-md-4">
                            <label for="exampleFormControlInput1">Voltar ao inicio </label><br>
                            <a href="../index.php" type="button" class="btn btn-primary"><i class="fas fa-home"></i></i> Inicio</a>
                        </div>

                        <div class="col-md-4">

                            <label for="exampleFormControlInput1">Entre em contato com o suporte</label><br>
                            <a href="mailto:cliente@ortopelve.com.br" type="button" target="_blank"
                                class="btn btn-secondary"><i class="fas fa-info-circle"></i> Suporte</a>
                        </div>
                    </div>
                    <p class="text-muted"> <br>Críticas, sugestões, dúvidas ou elogios? Fale com a gente pelo <a href="mailto:cliente@ortopelve.com.br">cliente@ortopelve.com.br</a></p>
                </div>

            </div>
        </div>
    </div>
</body>