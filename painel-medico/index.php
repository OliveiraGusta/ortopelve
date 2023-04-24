<?php

//verficações para o Login
require_once("../conexao.php");
require_once("../config.php");

@session_start();
if (!isset($_SESSION['nome_usuario']) || $_SESSION['nivel_usuario'] != 'Medico') {
    header("location:../index.php");
}

$email_medico = $_SESSION['email_usuario'];
$id_medico = $_SESSION['id_medico'];

//BUSCAR DADOS DO REGISTRO A SER EDITADO
$res = $pdo->query("select * from medicos where id = '$id_medico'");
$dados = $res->fetchAll(PDO::FETCH_ASSOC);
$novo_medico = $dados[0]['novo'];


if ($novo_medico == 's') {
    header("location:./novo-medico.php");
}


$nome_usuario = $_SESSION['nome_usuario'];
$nome_foto = $_SESSION['nome_foto'];
$id_medico = $_SESSION['id_medico'];

$res = $pdo->prepare("SELECT id from medicos where email = :usuario");
$res->bindValue(":usuario", $usuario);
$res->execute();


$agora = date('d/m/Y');
$data_inicio_acesso = $_SESSION['data_inicio_acesso'];
$data_fim_acesso = $_SESSION['data_fim_acesso'];
$renovado = $_SESSION['renovado'];

$agora_format = date('Y-m-d');
$agora_format = strtotime($agora_format);

$data_inicio_acesso_format = strtotime($data_inicio_acesso);
$data_fim_acesso_format = strtotime($data_fim_acesso);

$data_inicio_acesso2 = implode('/', array_reverse(explode('-', $data_inicio_acesso)));
$data_fim_acesso2 = implode('/', array_reverse(explode('-', $data_fim_acesso)));


$notificacoes = 3;

//VARIÁVEIS DOS MENUS
$item1 = 'home';
$item2 = 'consultas';
$item3 = 'consultorio';

//Pacientes
$item4 = 'receitas';
$item5 = 'prescricoes';
$item6 = 'atestados';
$item7 = 'pacientes';
$item8 = 'marcacoes';
//Financeiro
$item9 = 'home_financeiro';
$item10 = 'receber';
$item11 = 'pagar';
$item12 = 'pagamentos';
$item13 = 'movimentacoes';

//Outros
$item14 = 'atendimentos';

//Exercicios
$item15 = 'exercicios';
$item16 = 'rec_exercicios';
$item17 = 'assinatura';



//VERIFICAR QUAL O MENU CLICADO E PASSAR A CLASSE ATIVO
if (@$_GET['acao'] == $item1) {
    $item1ativo = 'active';
} elseif (@$_GET['acao'] == $item2) {
    $item2ativo = 'active';
} elseif (@$_GET['acao'] == $item3) {
    $item3ativo = 'active';
} elseif (@$_GET['acao'] == $item4) {
    $item4ativo = 'active';
} elseif (@$_GET['acao'] == $item5) {
    $item5ativo = 'active';
} elseif (@$_GET['acao'] == $item6) {
    $item6ativo = 'active';
} elseif (@$_GET['acao'] == $item7) {
    $item7ativo = 'active';
} elseif (@$_GET['acao'] == $item8) {
    $item8ativo = 'active';
} elseif (@$_GET['acao'] == $item9) {
    $item9ativo = 'active';
} elseif (@$_GET['acao'] == $item10) {
    $item10ativo = 'active';
} elseif (@$_GET['acao'] == $item11) {
    $item11ativo = 'active';
} elseif (@$_GET['acao'] == $item12) {
    $item12ativo = 'active';
} elseif (@$_GET['acao'] == $item13) {
    $item13ativo = 'active';
} elseif (@$_GET['acao'] == $item14) {
    $item14ativo = 'active';
} elseif (@$_GET['acao'] == $item15) {
    $item15ativo = 'active';
} elseif (@$_GET['acao'] == $item16) {
    $item16ativo = 'active';
} elseif (@$_GET['acao'] == $item17) {
    $item17ativo = 'active';
} else {
    $item1ativo = 'active';
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Painel Profissional</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/painel.css">

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


    <nav class="navbar navbar-light bg-light">
        <div class="col-md-12">
            <img class="float-left" src="../img/logo-painel.png">
                
            <?php
            if ($agora_format > $data_fim_acesso_format) {

                //DATA EXPIROU
                header("location:acesso-bloqueado.php");
            }
                ?>

            <li class="float-right nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Profissional - <?php echo $nome_usuario; ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="../logout.php">Sair</a>
                    <a class="dropdown-item" data-toggle="modal" data-target="#modalSenha">Alterar Senha</a>
                </div>
                <!--</li> <?php


                //BUSCAR FOTO
                $res = $pdo->query("select nome_foto from medicos where id = '$id_medico'");
                $dados = $res->fetchAll(PDO::FETCH_ASSOC);
                $nome_foto = $dados[0]['nome_foto'];

                ?>
            <img id="perfil-icone" class="float-right" src="./img/medico/<?php echo $nome_foto ?>" 
                width="50">-->

        </div>
    </nav>

    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-2 col-sm-12 mb-4">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                    <a class="nav-link <?php echo @$item1ativo ?>" id="v-pills-home-tab"
                        href="index.php?acao=<?php echo $item1 ?>" role="tab" aria-controls="v-pills-home"
                        aria-selected="true"><i class="fas fa-home mr-1"></i>Home</a>
                    <a class="nav-link <?php echo $item14ativo ?>" id="v-pills-messages-tab"
                        href="index.php?acao=<?php echo $item14 ?>" role="tab" aria-controls="v-pills-messages"
                        aria-selected="false"><i class="fas fa-clinic-medical mr-1"></i>Meus Serviços</a>


                    <a class="nav-link <?php echo @$item8ativo ?>" id="v-pills-messages-tab"
                        href="index.php?acao=<?php echo $item8 ?>" role="tab" aria-controls="v-pills-messages"
                        aria-selected="false"><i class="fas fa-calendar-day mr-1"></i>Agendar Consulta</a>

                    <br><span class="border-bottom border-secondary"></span><br>
                    <h5>Pacientes</h5>
                    <a class="nav-link <?php echo @$item7ativo ?>" id="v-pills-messages-tab"
                        href="index.php?acao=<?php echo $item7 ?>" role="tab" aria-controls="v-pills-messages"
                        aria-selected="false"><i class="fas fa-users mr-1"></i>Lista de Pacientes</a>
                    <a class="nav-link <?php echo @$item2ativo ?>" id="link-medicos"
                        href="index.php?acao=<?php echo $item2 ?>" role="tab" aria-controls="v-pills-profile"
                        aria-selected="false"><i class="fas fa-user-md mr-1"></i>Lista de Consultas</a>
                    <a class="nav-link <?php echo @$item4ativo ?>" id="v-pills-messages-tab"
                        href="index.php?acao=<?php echo $item4 ?>" role="tab" aria-controls="v-pills-messages"
                        aria-selected="false"><i class="fas fa-prescription-bottle-alt mr-1"></i>Lista de Receitas</a>
                    <a class="nav-link <?php echo @$item5ativo ?>" id="v-pills-messages-tab"
                        href="index.php?acao=<?php echo $item5 ?>" role="tab" aria-controls="v-pills-messages"
                        aria-selected="false"><i class="fas fa-file-medical mr-1"></i>Lista de Evolução</a>
                    <a class="nav-link <?php echo @$item6ativo ?>" id="v-pills-messages-tab"
                        href="index.php?acao=<?php echo $item6 ?>" role="tab" aria-controls="v-pills-messages"
                        aria-selected="false"><i class="fas fa-clipboard-list mr-1"></i>Lista de Atestados</a>
                    <br><span class="border-bottom border-secondary"></span><br>


                    <h5>Meu Financeiro</h5>
                    <a class="nav-link <?php echo @$item9ativo ?>" id="v-pills-home-tab"
                        href="index.php?acao=<?php echo $item9 ?>" role="tab" aria-controls="v-pills-home"
                        aria-selected="true"><i class="fas fa-home mr-1"></i>Finanças do Mês</a>
                    <a class="nav-link <?php echo @$item10ativo ?>" id="link-medicos"
                        href="index.php?acao=<?php echo $item10 ?>" role="tab" aria-controls="v-pills-profile"
                        aria-selected="false"><i class="fas fa-money-check-alt mr-1"></i>Contas à Receber</a>
                    <a class="nav-link <?php echo @$item11ativo ?>" id="v-pills-messages-tab"
                        href="index.php?acao=<?php echo $item11 ?>" role="tab" aria-controls="v-pills-messages"
                        aria-selected="false"><i class="far fa-money-bill-alt mr-1"></i>Contas à Pagar</a>
                    <a class="nav-link <?php echo @$item13ativo ?>" id="v-pills-messages-tab"
                        href="index.php?acao=<?php echo $item13 ?>" role="tab" aria-controls="v-pills-messages"
                        aria-selected="false"><i class="fas fa-dollar-sign mr-1"></i>Movimentações</a>
                    <br><span class="border-bottom border-secondary"></span><br>

                    <h5>Exercicios</h5>
                    <a class="nav-link <?php echo @$item15ativo ?>" id="v-pills-messages-tab"
                        href="index.php?acao=<?php echo $item15 ?>" role="tab" aria-controls="v-pills-messages"
                        aria-selected="false"><i class="fas fa-dumbbell mr-1"></i>Lista de Exercicios</a>
                    <a class="nav-link <?php echo @$item16ativo ?>" id="v-pills-messages-tab"
                        href="index.php?acao=<?php echo $item16 ?>" role="tab" aria-controls="v-pills-messages"
                        aria-selected="false"><i class="fas fa-dumbbell mr-1"></i>Exercicios recomentados</a>

                    <br><span class="border-bottom border-secondary"></span><br>
                    <h5>Configuração</h5>
                    <a class="nav-link" id="v-pills-messages-tab" class="dropdown-item" data-toggle="modal"
                        data-target="#modalSenha" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i
                            class="fas fa-cog"> </i> Alterar Senha</a>

                    <a class="nav-link <?php echo @$item17ativo; ?> <?php if($agora_format == $data_fim_acesso_format) { echo 'badge-danger'; };?> " id="v-pills-messages-tab"
                        href="index.php?acao=<?php echo $item17 ?>" role="tab" aria-controls="v-pills-messages"
                        aria-selected="false"><i class="fas fa-file-signature"></i> Assinatura</span></a>

                </div>
            </div>
            <div class="col-md-10 col-sm-12">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" role="tabpanel">
                        <?php if (@$_GET['acao'] == $item1) {
                            include_once($item1 . ".php");
                        } elseif (@$_GET['acao'] == $item2) {
                            include_once($item2 . ".php");
                        } elseif (@$_GET['acao'] == $item3) {
                            include_once($item3 . ".php");
                        } elseif (@$_GET['acao'] == $item4) {
                            include_once($item4 . ".php");
                        } elseif (@$_GET['acao'] == $item5) {
                            include_once($item5 . ".php");
                        } elseif (@$_GET['acao'] == $item6) {
                            include_once($item6 . ".php");
                        } elseif (@$_GET['acao'] == $item7) {
                            include_once($item7 . ".php");
                        } elseif (@$_GET['acao'] == $item8) {
                            include_once($item8 . ".php");
                        } elseif (@$_GET['acao'] == $item9) {
                            include_once($item9 . ".php");
                        } elseif (@$_GET['acao'] == $item10) {
                            include_once($item10 . ".php");
                        } elseif (@$_GET['acao'] == $item11) {
                            include_once($item11 . ".php");
                        } elseif (@$_GET['acao'] == $item12) {
                            include_once($item12 . ".php");
                        } elseif (@$_GET['acao'] == $item13) {
                            include_once($item13 . ".php");
                        } elseif (@$_GET['acao'] == $item14) {
                            include_once($item14 . ".php");
                        } elseif (@$_GET['acao'] == $item15) {
                            include_once($item15 . ".php");
                        } elseif (@$_GET['acao'] == $item16) {
                            include_once($item16 . ".php");
                        } elseif (@$_GET['acao'] == $item17) {
                            include_once($item17 . ".php");
                        } else {
                            include_once($item1 . ".php");
                        }
                        ?>
                    </div>



                </div>
            </div>
        </div>
    </div>

</body>

</html>




<!-- Modal -->
<div class="modal fade" id="modalSenha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Alterar Senha
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Senha</label>
                        <input type="password" class="form-control" id="" placeholder="Insira a Senha" name="senha">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Confirmar Senha</label>
                        <input type="password" class="form-control" id="" placeholder="Insira a Senha"
                            name="confirmar-senha">
                    </div>




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                <button type="submit" name="btn-senha" class="btn btn-primary">Alterar</button>
                </form>
            </div>
        </div>
    </div>
</div>




<!--CÓDIGO DO BOTÃO SALVAR -->
<?php
if (isset($_POST['btn-senha'])) {
    $senha = $_POST['senha'];
    $confirmar_senha = $_POST['confirmar-senha'];



    $email_usuario = $_SESSION['email_usuario'];


    $res_usuario = $pdo->query("SELECT * from usuarios where usuario = '$email_usuario'");
    $dados_usuario = $res_usuario->fetchAll(PDO::FETCH_ASSOC);
    $id_adm = $dados_usuario[0]['id'];



    if ($senha == $confirmar_senha) {


        $res = $pdo->prepare("UPDATE usuarios SET senha = :senha, senha_original = :senha_original where id = :id");

        $res->bindValue(":senha", md5($senha));
        $res->bindValue(":senha_original", $senha);
        $res->bindValue(":id", $id_adm);

        $res->execute();


        echo "<script language='javascript'>window.location='../index.php'; </script>";

    } else {
        echo "<script language='javascript'>window.alert('As senhas não coincidem!!'); </script>";
    }
}

?>