<?php
$notificacoes = 1;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Painel Administrativo</title>

    <meta charset="UTF-8">
    <meta name="vierport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/painel.css">
    <link rel="shortcut icon" href="../img/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../img/favicon/favicon.ico" type="image/x-icon">
    <script src="https://kit.fontawesome.com/fdc765080b.js" crossorigin="anonymous"></script>

</head>

<body>
    <nav class="navbar bg-light">
        <div class="col-md-12 mt-3">
            <img class="float-start" src="../img/logo-horizontal.png">
            <li class="float-end nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Administrador - Gustavo Oliveira
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="../index.php">Sair</a>
                </div>
            </li>
        </div>
    </nav>


    <div class="container-fluid mt-4">
        <div class="d-flex align-items-start center mb-4">
            <div class="nav flex-column nav-pills me-5" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                <div class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home"
                    type="button" role="tab" aria-controls="v-pills-home" aria-selected="true"><i
                        class="fa-solid fa-hospital pacientes"></i> Home</div>
                        
                    

                <div class="nav-link" id="v-pills-pacientes-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-pacientes" type="button" role="tab" aria-controls="v-pills-pacientes"
                    aria-selected="false"><i class="fa-solid fa-syringe pacientes"></i> Lista de Paciente
                </div>


                <div class="nav-link" id="v-pills-financeiro-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-financeiro" type="button" role="tab" aria-controls="v-pills-financeiro"
                    aria-selected="false"> <i class="fa-solid fa-money-check-dollar pacientes"></i> Controle
                    Financeiro</div>
                <?php if($notificacoes > 0) {?>
                <div class="nav-link" id="v-pills-notificacao-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-notificacao" type="button" role="tab" aria-controls="v-pills-notificacao"
                    aria-selected="false">
                    <i class="fa-solid fa-bell pacientes"></i> Mensagens <span class="badge text-bg-dark">
                        <?php echo  $notificacoes;?>
                    </span>
                </div>
                <?php } ?>

            </div>

            <div class="tab-content" id="v-pills-tabContent">

                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                    aria-labelledby="v-pills-home-tab" tabindex="0"> <?php 
            include_once("home.php");
            ?></div>


                

                <div class="tab-pane fade" id="v-pills-pacientes" role="tabpanel"
                    aria-labelledby="v-pills-pacientes-tab" tabindex="0"><?php 
            include_once("medicos.php");?></div>

                <div class="tab-pane fade" id="v-pills-financeiro" role="tabpanel"
                    aria-labelledby="v-pills-financeiro-tab" tabindex="0">Teste - Financeiro</div>

                <div class="tab-pane fade" id="v-pills-notificacao" role="tabpanel"
                    aria-labelledby="v-pills-notificacao-tab" tabindex="0">Teste - Notificacoes</div>

            </div>
        </div>
    </div>


    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>