<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="vierport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">  
    <title>Ortopelve</title>
</head>
<body>
    <div class="login-form">
        <form action="" method="post">
            <div class="logo">
                <img src="img\logo-quadrado.png" alt="Logo Ortopelve">
            </div>
            <h2 class="text-center"> 
            Médico / Fisioterapeuta</h2>
            <h3 class="text-center"> 
            Entre no Sistema</h3>

            <div class=" ">
                <input class="form-control" type="email" name="usuario" 
                placeholder="E-mail" required> 
            </div>

            <div class="form-group">
                <input class="form-control" type="password" name="senha" 
                placeholder="Senha" required> 
            </div>

            <div class="form-group d-grid gap-2">
                <button class="btn btn-primary" type="submit" name="btn-login"> 
                    Entrar </button>
            </div>

            <div class="clearfix">
                <label class="float-start checkbox-inline">
                <input type="checkbox">
                Lembrar-me
            </label>
            <a href="#" class="float-end">Recuperar Senha</a>
            </div>

        </form> 




<!-- JavaScript Boostrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>    
</body>
</html>