<?php
    require_once("conexao.php");
    @session_start();


if(empty($_POST['usuario']) || empty($_POST['senha'])){
    header("location:login.php");
}

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$res = $pdo->prepare ("SELECT * FROM usuarios WHERE usuario = :usuario AND senha = :senha ");

$res->bindParam(":usuario", $usuario ); 
$res->bindParam(":senha", $senha);
$res->execute();

$dados = $res->fetchAll(PDO::FETCH_ASSOC);
$linhas = count($dados);

if($linhas > 0){
    $_SESSION['nome_usuario'] = $dados[0]['nome'];
    $_SESSION['nome_usuario'] = $dados[0]['nivel'];
    header("location:painel-adm/index.php");
}else{
    echo "
    <script language='javascript'>window.alert('Desculpe, não encontramos uma conta com essas credenciais. Tente novamente ou crie um nova conta.')</script>";
    echo " <script language='javascript'>window.location='index.php'</script>";
    

}


?>