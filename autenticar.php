<?php 

require_once("conexao.php");
@session_start();

if(empty($_POST['usuario']) || empty($_POST['senha'])){
	header("location:index.php");
}


$usuario = $_POST['usuario'];
$senha = md5($_POST['senha']);


$res = $pdo->prepare("SELECT * from usuarios where usuario = :usuario and senha = :senha ");

$res->bindValue(":usuario", $usuario);
$res->bindValue(":senha", $senha);
$res->execute();

$dados = $res->fetchAll(PDO::FETCH_ASSOC);
$linhas = count($dados);


if($linhas > 0){
	$_SESSION['nome_usuario'] = $dados[0]['nome'];
	$_SESSION['email_usuario'] = $dados[0]['usuario'];
	$_SESSION['nivel_usuario'] = $dados[0]['nivel'];
	$_SESSION['data_inicio_acesso'] = $dados[0]['data_inicio_acesso'];
	$_SESSION['data_fim_acesso'] = $dados[0]['data_fim_acesso'];
	$_SESSION['renovado'] = $dados[0]['renovado'];


	if($_SESSION['nivel_usuario'] == 'admin'){
		header("location:painel-adm/index.php");
		exit();
	}

	if($_SESSION['nivel_usuario'] == 'Medico'){
		$res = $pdo->prepare("SELECT * from medicos where email = :usuario");
	
		$res->bindValue(":usuario", $usuario);
		$res->execute();
		$dados = $res->fetchAll(PDO::FETCH_ASSOC);
		$_SESSION['id_medico'] = $dados[0]['id'];
		$_SESSION['novo'] = $dados[0]['novo'];
		$_SESSION['nome_foto'] = $dados[0]['nome_foto'];

		
		header("location:painel-medico/novo-medico.php");
		exit();
	}

	if($_SESSION['nivel_usuario'] == 'Recepcionista'){
		header("location:painel-atend/index.php");
		exit();
	}


	if($_SESSION['nivel_usuario'] == 'Paciente'){

		$res = $pdo->prepare("SELECT * from pacientes where email = :usuario");
		$res->bindValue(":usuario", $usuario);
		$res->execute();

		$dados = $res->fetchAll(PDO::FETCH_ASSOC);
		
		$_SESSION['medico_resp'] = $dados[0]['medico_resp'];
		$_SESSION['id_paciente'] = $dados[0]['id'];

		$nome_medico = $_SESSION['medico_resp'];

		$res = $pdo->prepare("SELECT * from medicos where nome = :medico_resp");
		$res->bindValue(":medico_resp", $nome_medico);
		$res->execute();

		$_SESSION['id_medico'] = $dados[0]['id'];

		header("location:painel-paciente/index.php");
		exit();
	}

	if($_SESSION['nivel_usuario'] == 'Acesso'){
		header("location:painel-acesso/index.php");
		exit();
	}

	if($_SESSION['nivel_usuario'] == 'Tesoureiro'){
		header("location:painel-tesouraria/index.php");
		exit();
	}


	if($_SESSION['nivel_usuario'] == 'Farmaceutico'){
		header("location:painel-farmacia/index.php");
		exit();
	}


	if($_SESSION['nivel_usuario'] == 'Tela'){
		header("location:tela.php");
		exit();
	}

	
}else{
	echo "<script language='javascript'>window.alert('Dados Incorretos!!'); </script>";
	echo "<script language='javascript'>window.location='index.php'; </script>";
	
}


 ?>