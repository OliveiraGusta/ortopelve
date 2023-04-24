<?php 

require_once("conexao.php");
require_once("config.php");

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Ortopelve</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="css/login.css">

    <!--REFERENCIA PARA O FAVICON -->
    <link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon/favicon2.ico" type="image/x-icon">


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
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
                    <img class="logo" src="img/logo-rel.jpg" alt="Ortopelve">
                    <p class="text-muted">Já tem conta? <a class="login-links" href="./index.php">ENTRE AGORA!
                        </a></p>
                </div>

                <div class=" mt-5">
                    <span class="text-muted"> Bem-vindo(a) a plataforma da OrtoPelve.</span><br>
                    <h4>Cadastre-se e tenha 2 meses de acesso gratuito!</h4>
                </div>

                <div class="login-form mt-4">
                    <form action="cadastro.php" method="post">

                        <div class="form-group">
                            <input class="form-control" type="text" name="nome" placeholder="Insira seu nome"  maxlength="50" required>
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="email" name="usuario" placeholder="Insira seu e-mail" maxlength="50"
                                required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Insira a sua senha" name="senha">
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Confirme a sua Senha"
                                name="confirmar-senha">
                        </div>


						<button class="btn btn-primary btn-lg" type="submit" name="btn-login">CADASTRAR</button>
						<br>
                       <p> Ao me cadastrar concordo com os termos e <a href="https://www.ortopelve.com.br/privacy"  target="_blank">politicas de privacidade</a></p>


                    </form>
                </div>
            </div>
        </div>



        <div id="right-cadastro" class="col-md-6">
            <img class="profissionais-login" src="./img/profissionais-registrar.png" alt=""></img>
        </div>


    </div>

</body>

</html>