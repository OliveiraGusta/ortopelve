<?php 

require_once("../../conexao.php");
require_once("../../config.php");
@session_start();


$nome = $_POST['nome'];
$crm = $_POST['crm'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$id = $_POST['id'];
$cpf_antigo = $_POST['cpf_antigo'];
$endereco_medico = $_POST['endereco_medico'];


/*//SCRIPT PARA FOTO NO BANCO
$caminho = '../img/medico/' .$_FILES['foto']['name'];
    if ($_FILES['foto']['name'] == ""){
      $imagem = "sem-foto.png";
    }else{
      $imagem = $_FILES['foto']['name']; 
    }
    
    $imagem_temp = $_FILES['foto']['tmp_name']; 
    move_uploaded_file($imagem_temp, $caminho);*/


$cpf_limpo = preg_replace('/[^0-9]/', '', $cpf_antigo);


$res = $pdo->prepare("UPDATE medicos set nome = :nome, crm = :crm, cpf = :cpf, telefone = :telefone, email = :email, endereco_medico = :endereco_medico, novo = :novo where id = :id ");

$res->bindValue(":nome", $nome);
$res->bindValue(":crm", $crm);
$res->bindValue(":cpf", $cpf);
$res->bindValue(":telefone", $telefone);
$res->bindValue(":email", $email);
$res->bindValue(":endereco_medico", $endereco_medico);
$res->bindValue(":novo", 'n');
$res->bindValue(":id", $id);
$res->execute();


//SALVAR TAMBÉM NA TABELA DE TESOUREIRO
$res = $pdo->prepare("INSERT into tesoureiros (nome, cpf, telefone, email ) values (:nome, :cpf, :telefone, :email )");
$res->bindValue(":nome", $nome);
$res->bindValue(":cpf", $cpf);
$res->bindValue(":telefone", $telefone);
$res->bindValue(":email", $email);

$res->execute();


//EDITAR TAMBÉM NA TABELA DE USUÁRIOS
$res = $pdo->prepare("UPDATE usuarios set nome = :nome, usuario = :usuario, senha = :senha, senha_original = :senha_original, nivel = :nivel where senha_original = :cpf ");
$res->bindValue(":nome", $nome);
$res->bindValue(":usuario", $email);

//preg replace mantem os valores definidos e remove quaisquer outros, nesse caso pontos e traços do cpf, só vai ficar numeros de 0 a 9
$cpf_sem_traco = preg_replace('/[^0-9]/', '', $cpf);

$res->bindValue(":senha", md5($cpf_sem_traco));
$res->bindValue(":senha_original", $cpf_sem_traco);
$res->bindValue(":nivel", 'Medico');
$res->bindValue(":cpf", $cpf_limpo);

$res->execute();


//SALVAR TAMBÉM NA TABELA DE TESOUREIRO
$res = $pdo->prepare("INSERT into funcionarios (nome, cpf, telefone, email, cargo ) values (:nome, :cpf, :telefone, :email, :cargo)");
$res->bindValue(":nome", $nome);
$res->bindValue(":cpf", $cpf);
$res->bindValue(":telefone", $telefone);
$res->bindValue(":email", $email);
$res->bindValue(":cargo", 'Medico');

$res->execute();


header("location:../index.php");
exit();




?>