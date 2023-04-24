<?php
//verficações para o Login
require_once("../conexao.php");
require_once("../config.php");

@session_start();

$email_medico = $_SESSION['email_usuario'];
$id_medico = $_SESSION['id_medico'];

$res = $pdo->prepare("SELECT * from medicos where email = :email_medico and novo = 's' ");

$res->bindValue(":email_medico", $email_medico);
$res->execute();

$dados = $res->fetchAll(PDO::FETCH_ASSOC);
$linhas = count($dados);

if ($linhas > 0) {

    ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Novo Profissional</title>

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

    <div id="cadastro-page" class="row">


        <div id="left-cadastro" class="col-md-6 mt-6">
            <div>


                <div class="row justify-content-between align-items-center">
                    <img class="logo" src="../img/logo-rel.jpg" alt="Ortopelve">
                    <p class="text-muted"><b><?php
                            $nome_botao = 'Editar';

                            //BUSCAR DADOS DO REGISTRO A SER EDITADO
                            $res = $pdo->query("select * from medicos where id = '$id_medico'");
                            $dados = $res->fetchAll(PDO::FETCH_ASSOC);
                            $nome = $dados[0]['nome'];
                            $crm = $dados[0]['crm'];
                            $cpf = $dados[0]['cpf'];
                            $telefone = $dados[0]['telefone'];
                            $email = $dados[0]['email'];
                            $endereco_medico = $dados[0]['endereco_medico'];

                            echo 'Cadastro Profissional 2/2';
                            ?></b></p>
                </div>

                <div class=" mt-5">
                    <span class="text-muted">Segundo passo Cadastro Profissional</span><br>
                    <h4>Para usar a plataforma da OrtoPelve.</h4>
                </div>

                <div class="login-form mt-4">
                    <form method="post" action="./medicos/editar.php" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="hidden" id="id" name="id" value="<?php echo @$id_medico ?>" required>
                                    <input type="hidden" id="nome" name="nome" value="<?php echo @$nome ?>" required>
                                    <input type="hidden" id="email" name="email" value="<?php echo @$email ?>" required>

                                    <input type="hidden" id="cpf_antigo" name="cpf_antigo" value="<?php echo @$cpf ?>"
                                        required>
                                    <label for="exampleFormControlInput1">CRM / Crefito</label>
                                    <input type="text" class="form-control" id="crm" name="crm"
                                        placeholder="Insira o CRM ou Crefito" required value="<?php echo @$crm ?>">
                                </div>

                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <!--<label for="inputAddress">Foto (*png, *jpg)</label>
                                        <div class="custom-file">

                                            <input type="file" name="foto" id="foto">

                                        </div>-->
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">CPF</label>
                                        <input type="text" class="form-control" id="cpf" name="cpf"
                                            placeholder="Insira o CPF" required value="<?php echo @$cpf ?>">
                                    </div>
                                </div>

                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Endereço</label>
                                    <input type="text" class="form-control" id="endereco_medico" name="endereco_medico"
                                        placeholder="Insira seu endereço" value="<?php echo @$endereco_medico ?>">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Telefone</label>
                                    <input type="text" class="form-control" id="telefone" name="telefone"
                                        placeholder="Insira o Telefone" value="<?php echo @$telefone ?>">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Finalizar Cadastro</button>
                        <a href="../index.php"  class="btn" style="color:#e8e8e8 ">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>



        <div id="right-cadastro" class="col-md-6">
            <img class="profissionais-login" src="../img/profissionais-registrar.png" alt=""></img>
        </div>


    </div>




</body>

<!--MASCARAS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script src="../js/mascaras.js"></script>

<?php } else {
    echo "<script language='javascript'>window.location='index.php'; </script>";
} ?>